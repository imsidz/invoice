<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\PhoneClient;
use App\EmailClient;

class ClientController extends Controller
{
    public function index (){
        $clients = Client::latest()->paginate('25');
        return view('client.index', compact('clients'));
    }

    public function post(Request $request){
        
        $this->validate($request, [
            'companyname' => 'required|max:191',
            'address' => 'max:191',
            'city' => 'max:191',
            'zip' => 'max:191',
            'gstin' => 'max:191',
            'pan' => 'max:191',
            'name' => 'required|max:191',
            'website' => 'max:191',
        ]);

        $client = new Client;
        $client->companyname = $request->companyname;
        $client->address = $request->address;
        $client->city = $request->city;
        $client->zip = $request->zip;
        $client->gstin = $request->gstin;
        $client->pan = $request->pan;
        $client->name = $request->name;
        $client->website = $request->website;
        $client->save();

        $phones = $request->phone;
        $emails = $request->email;

        if ($phones == !null) {
            foreach ($phones as $p) {
                $ph = new PhoneClient;
                $ph->phone = $p;
                $ph->client_id = $client->id;
                $ph->save();
              
            }
        }
        
        if ($emails == !null) {
            foreach ($emails as $email) {
                $em = new EmailClient;
                $em->email = $email;
                $em->client_id = $client->id;
                $em->save();
            }
        }

        return back()->with('status', 'Client Added Success');
    }

    public function edit(Request $request, $id){
        
        $this->validate($request, [
            'companyname' => 'required|max:191',
            'address' => 'max:191',
            'city' => 'max:191',
            'zip' => 'max:191',
            'gstin' => 'max:191',
            'pan' => 'max:191',
            'name' => 'required|max:191',
            'website' => 'max:191',
        ]);
        
        $client = Client::find($id);

        $client->companyname = $request->companyname;
        $client->address = $request->address;
        $client->city = $request->city;
        $client->zip = $request->zip;
        $client->gstin = $request->gstin;
        $client->pan = $request->pan;
        $client->name = $request->name;
        $client->website = $request->website;
        $client->save();
        
        $phones = $request->phone;
        $emails = $request->email;

        foreach ($client->phones as $phone) {
            $ph = PhoneClient::find($phone->id);
            $ph->delete();
        }

        foreach ($client->emails as $email) {
            $em = EmailClient::find($email->id);
            $em->delete();
        }

        if ($phones == !null) {
            foreach ($phones as $p) {
                $ph = new PhoneClient;
                $ph->phone = $p;
                $ph->client_id = $client->id;
                $ph->save();
              
            }
        }
        
        if ($emails == !null) {
            foreach ($emails as $email) {
                $em = new EmailClient;
                $em->email = $email;
                $em->client_id = $client->id;
                $em->save();
            }
        }
        

        return back()->with('status', 'Client Edit Success');
    }

    public function delete($id){

        $client = Client::find($id);
        $client->delete();

        return back()->with('status', 'Client Deleted Success');
    }
}
