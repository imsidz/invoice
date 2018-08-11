<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('company', [
	'uses'	=>	'CompanyController@index',
	'as'	=>	'company.index'
]);

Route::put('company/{id}', [
	'uses'	=>	'CompanyController@post',
	'as'	=>	'company.post'
]);

Route::get('client', [
	'uses'	=>	'ClientController@index',
	'as'	=>	'client.index'
]);

Route::post('client', [
	'uses'	=>	'ClientController@post',
	'as'	=>	'client.post'
]);

Route::put('client/{id}', [
	'uses'	=>	'ClientController@edit',
	'as'	=>	'client.edit'
]);

Route::delete('client/{id}', [
	'uses'	=>	'ClientController@delete',
	'as'	=>	'client.delete'
]);

Route::get('recycle', [
	'uses'	=>	'RecycleController@index',
	'as'	=>	'recycle.index'
]);

Route::post('recycle/client/{id}', [
	'uses'	=>	'RecycleController@clientrestore',
	'as'	=>	'client.restore.post'
]);

Route::delete('recycle/client/{id}', [
	'uses'	=>	'RecycleController@clientparmadelete',
	'as'	=>	'client.parmanent.delete'
]);

Route::get('invoice', [
	'uses'	=>	'InvoiceController@index',
	'as'	=>	'invoice.index'
]);

Route::post('invoice', [
	'uses'	=>	'InvoiceController@post',
	'as'	=>	'invoice.post'
]);

Route::post('invoicecancle/{id}', [
	'uses'	=>	'InvoiceController@cancleinvoice',
	'as'	=>	'invoice.cancle'
]);

Route::get('print/{invoiceno}', [
	'uses'	=>	'InvoiceController@print',
	'as'	=>	'invoice.print'
]);

Route::post('sendinvoice/{invoiceid}', [
	'uses'	=>	'InvoiceController@sendinvoice',
	'as'	=>	'invoice.send'
]);