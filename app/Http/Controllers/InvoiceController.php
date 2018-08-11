<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use PDF;
use DB;
use Mail;
use App\Client;
use App\Product;
use App\Invoice;
use App\Company;
use App\EmailClient;
use Carbon\Carbon;
use Spatie\Browsershot\Browsershot;
use App\Mail\SendInvoice;

class InvoiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$clients = Client::get();
        $invoices = Invoice::latest()->paginate('25');
        // foreach($invoices as $invoice){
        //     $products = Product::whereHas('invoices', function ($query) use ($invoice){
        //                 $query->where('id', $invoice->id);
        //             })->get();
        //     foreach ($products as $product) {
        //         $qty = $product->qty;
        //         $price = $product->price;
        //         $subt[] = $qty * $price;
        //     }

        // }
        // $subtotal = array_sum($subt);

        // $tax = $subtotal / 100 * 9;

        // $total = $subtotal + $tax + $tax;

    	return view('invoice.index', compact('clients', 'invoices', 'subtotal', 'tax', 'total'));
    }

    public function post(Request $request){



        //fetch latest invoice id

        $invid = Invoice::latest()->first();
        
        if ($invid == null) {
           $invoiceid = '158';
        }else{
            $invoiceid = '158' + $invid->id;
        }

        //create invoice 

        $invoice = new Invoice;
        $invoice->invoiceno = 'WLI/' . Carbon::now()->format('y') . '/' . $invoiceid;
        //Attach Client
        $invoice->client_id = $request->client;
        $invoice->save();

        //Create Products
        $data = Input::get(); //this is the post from top.
        
        $num_elements = 0;
        


        while($num_elements < count($data['productname'])){
            $product = new Product;
            $product->productname = $data['productname'][$num_elements];
            $product->qty = $data['qty'][$num_elements];
            $product->price = $data['price'][$num_elements];
            $product->invoice_id = $invoice->id;
            $product->save();
            
            
            if ($invoice->subtotal === null) {
                $invoice->subtotal = $product->qty * $product->price;
                $invoice->save();
            }else{
                $invoice->subtotal = $product->qty * $product->price + $invoice->subtotal;
                $invoice->save();
            }
            
            $num_elements++;

        
        }
        
        $invoice->tax = $invoice->subtotal / 100 * 9;
        $invoice->total = $invoice->subtotal + $invoice->tax + $invoice->tax;
        $invoice->save();

        $company = Company::where('active', '1')->first();

        $client = Client::whereHas('invoices', function ($query) use($invoice){
                    $query->where('id', $invoice->id);
                })->first();

        $emails = EmailClient::whereHas('client', function ($query) use($client){
                       $query->where('id', $client->id);
                 })->pluck("email");

        $products = Product::whereHas('invoice', function ($query) use($invoice){
                    $query->where('id', $invoice->id);
                })->get(); 
        
        $number = $invoice->total;
               $no = round($number);
               $point = round($number - $no, 2) * 100;
               $hundred = null;
               $digits_1 = strlen($no);
               $i = 0;
               $str = array();
               $words = array('0' => '', '1' => 'one', '2' => 'two',
                '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                '7' => 'seven', '8' => 'eight', '9' => 'nine',
                '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                '13' => 'thirteen', '14' => 'fourteen',
                '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
                '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                '60' => 'sixty', '70' => 'seventy',
                '80' => 'eighty', '90' => 'ninety');
               $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
               while ($i < $digits_1) {
                 $divider = ($i == 2) ? 10 : 100;
                 $number = floor($no % $divider);
                 $no = floor($no / $divider);
                 $i += ($divider == 10) ? 1 : 2;
                 if ($number) {
                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                    $str [] = ($number < 21) ? $words[$number] .
                        " " . $digits[$counter] . $plural . " " . $hundred
                        :
                        $words[floor($number / 10) * 10]
                        . " " . $words[$number % 10] . " "
                        . $digits[$counter] . $plural . " " . $hundred;
                 } else $str[] = null;
              }
              $str = array_reverse($str);
              $result = implode('', $str);
              $points = ($point) ?
                "." . $words[$point / 10] . " " . 
                      $words[$point = $point % 10] : '';
              
            $priceinword = $result . "Rupees  " . $points . " Paise";

        $pdf = PDF::loadView('invoice.pdf', compact('invoice', 'company', 'client', 'products', 'priceinword'));

        $name = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        
        $invoiceno = str_replace('/', '-', $invoice->invoiceno);
        $pdf->save(public_path().'/pdf/invoice/' . $invoiceno . '.pdf');

        return back()->with('status', 'Invoice Generated');

    }

    public function print($id){

        

        $invoice = Invoice::find($id);

        $company = Company::where('active', '1')->first();

        $client = Client::whereHas('invoices', function ($query) use($id){
                    $query->where('id', $id);
                })->first();

        $products = Product::whereHas('invoice', function ($query) use($id){
                    $query->where('id', $id);
                })->get();

        $number = $invoice->total;
               $no = round($number);
               $point = round($number - $no, 2) * 100;
               $hundred = null;
               $digits_1 = strlen($no);
               $i = 0;
               $str = array();
               $words = array('0' => '', '1' => 'one', '2' => 'two',
                '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                '7' => 'seven', '8' => 'eight', '9' => 'nine',
                '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                '13' => 'thirteen', '14' => 'fourteen',
                '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
                '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                '60' => 'sixty', '70' => 'seventy',
                '80' => 'eighty', '90' => 'ninety');
               $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
               while ($i < $digits_1) {
                 $divider = ($i == 2) ? 10 : 100;
                 $number = floor($no % $divider);
                 $no = floor($no / $divider);
                 $i += ($divider == 10) ? 1 : 2;
                 if ($number) {
                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                    $str [] = ($number < 21) ? $words[$number] .
                        " " . $digits[$counter] . $plural . " " . $hundred
                        :
                        $words[floor($number / 10) * 10]
                        . " " . $words[$number % 10] . " "
                        . $digits[$counter] . $plural . " " . $hundred;
                 } else $str[] = null;
              }
              $str = array_reverse($str);
              $result = implode('', $str);
              $points = ($point) ?
                "." . $words[$point / 10] . " " . 
                      $words[$point = $point % 10] : '';
              
            $priceinword = $result . "Rupees  " . $points . " Paise";


        return view('invoice.print', compact('invoice', 'company', 'client', 'products', 'priceinword'));
    }

    public function sendinvoice($id){


        $invoice = Invoice::find($id);

        $company = Company::where('active', '1')->first();

        $client = Client::whereHas('invoices', function ($query) use($id){
                    $query->where('id', $id);
                })->first();

        $emails = EmailClient::whereHas('client', function ($query) use($client){
                       $query->where('id', $client->id);
                 })->pluck("email");

        $products = Product::whereHas('invoice', function ($query) use($id){
                    $query->where('id', $id);
                })->get(); 
        
        $number = $invoice->total;
               $no = round($number);
               $point = round($number - $no, 2) * 100;
               $hundred = null;
               $digits_1 = strlen($no);
               $i = 0;
               $str = array();
               $words = array('0' => '', '1' => 'one', '2' => 'two',
                '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                '7' => 'seven', '8' => 'eight', '9' => 'nine',
                '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                '13' => 'thirteen', '14' => 'fourteen',
                '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
                '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                '60' => 'sixty', '70' => 'seventy',
                '80' => 'eighty', '90' => 'ninety');
               $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
               while ($i < $digits_1) {
                 $divider = ($i == 2) ? 10 : 100;
                 $number = floor($no % $divider);
                 $no = floor($no / $divider);
                 $i += ($divider == 10) ? 1 : 2;
                 if ($number) {
                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                    $str [] = ($number < 21) ? $words[$number] .
                        " " . $digits[$counter] . $plural . " " . $hundred
                        :
                        $words[floor($number / 10) * 10]
                        . " " . $words[$number % 10] . " "
                        . $digits[$counter] . $plural . " " . $hundred;
                 } else $str[] = null;
              }
              $str = array_reverse($str);
              $result = implode('', $str);
              $points = ($point) ?
                "." . $words[$point / 10] . " " . 
                      $words[$point = $point % 10] : '';
              
            $priceinword = $result . "Rupees  " . $points . " Paise";

            $mail = Mail::to($emails)->send(new SendInvoice($priceinword,$number,$products,$invoice,$company,$client));
           
            
            return back()->with('status', 'Mail Sent Success');
    }

    public function cancleinvoice($id){
        $invoice = Invoice::find($id);
        $invoice->canclestatus = 1;
        $invoice->save();
        return back()->with('status', 'Invoice No ' . $invoice->invoiceno . 'Has Been Cancled');
    }
}
