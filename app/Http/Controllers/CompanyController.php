<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

use App\Company;
use App\PhoneCompany;
use App\EmailCompany;

class CompanyController extends Controller
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
        $company = Company::where('active', true)->firstorfail();
        return view('company.index', compact('company'));
    }

    public function post(Request $request, $id){
        
        $this->validate($request, [
            'companyname' => 'required|max:191',
            'phone' => 'max:191',
            'website' => 'max:191',
            'gstin' => 'max:191',
            'pan' => 'max:191',
            'cin' => 'max:191',
            'address' => 'max:191',
            'neft' => 'max:191',
            'image' => 'image',
        ]);

        $company = Company::find($id);
        $company->companyname = $request->companyname;
        $company->website = $request->website;
        $company->gstin = $request->gstin;
        $company->pan = $request->pan;
        $company->cin = $request->cin;
        $company->address = $request->address;
        $company->neft = $request->neft;
        if($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $file->move(public_path().'/images/company/', $name);
            $company->image = $name;
            $thumb = Image::make(public_path().'/images/company/' . $name)->save(public_path().'/images/company/logo/' . $name, 60);
        }
        $company->save();

        $phones = $request->phone;
        $emails = $request->email;

        if ($phones == !null) {
            foreach ($phones as $phone) {
                $p = PhoneCompany::firstOrCreate(['phone' => $phone], ['company_id' => $company->id]);
                $p->save();
            }
        }
        
        if ($emails == !null) {
            foreach ($emails as $email) {
                $e = EmailCompany::firstOrCreate(['email' => $email], ['company_id' => $company->id]);
                $e->save();
            }
        }
        

        return back()->with('status', $company->companyname . ' Has Been Updated Success');
    }
}
