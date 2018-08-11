<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

class RecycleController extends Controller
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
    	$clients = Client::onlyTrashed()->paginate('20');
    	return view('recycle.index', compact('clients'));
    }

    public function clientrestore($id){
    	$client = Client::onlyTrashed()->find($id);
    	$client->restore();
    	return back()->with('status', 'Client ' . $client->companyname . ' Restored Success');
    }

    public function clientparmadelete($id){
    	$client = Client::onlyTrashed()->find($id);
    	$client->forceDelete();
    	return back()->with('warning', 'Client ' . $client->companyname . ' Deleted Success');
    }

    
}
