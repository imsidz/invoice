@extends('layouts.admin')

@section('head')
<title>Clients</title>
<style type="text/css">
  .select2-selection__choice{
    background-color: #007BFE!important;
  }
</style>
@endsection

@section('content')
<style type="text/css">
		label{
			color: black;
		}
	</style>
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Clients</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{-- {{ count($count)}} --}}</h3>

                <p>Client</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer" data-toggle="modal" data-target="#addmovie">Add New Client <i class="fa fa-arrow-circle-right"></i></a>
              <!-- Modal -->
				<div class="modal fade" id="addmovie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Add New Client</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        {!! Form::open(['method' => 'POST', 'route' => 'client.post', 'files' => 'true']) !!}
				            <div class="form-group{{ $errors->has('companyname') ? ' has-error' : '' }}">
				                {!! Form::label('companyname', 'Company Name') !!}
				                {!! Form::text('companyname', null, ['class' => 'form-control', 'required' => 'required']) !!}
				                <small class="text-danger">{{ $errors->first('companyname') }}</small>
				            </div>

				            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
				                {!! Form::label('address', 'Address') !!}
				                {!! Form::text('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
				                <small class="text-danger">{{ $errors->first('address') }}</small>
				            </div>

				            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
				                {!! Form::label('city', 'City') !!}
				                {!! Form::text('city', null, ['class' => 'form-control', 'required' => 'required']) !!}
				                <small class="text-danger">{{ $errors->first('city') }}</small>
				            </div>

				            <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
				                {!! Form::label('zip', 'Zip Code') !!}
				                {!! Form::text('zip', null, ['class' => 'form-control', 'required' => 'required']) !!}
				                <small class="text-danger">{{ $errors->first('zip') }}</small>
				            </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label>Enter Your Phone Number</label>
                          <select class="form-control phone" multiple="multiple" data-placeholder="Add Your Phone"
                                  style="width: 100%;" name="phone[]">
                           
                              <option value=""></option>
                           
                           
                          </select>
                        </div>

                      <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label>Enter Your Email</label>
                          <select class="form-control phone" multiple="multiple" data-placeholder="Enter Your Email"
                                  style="width: 100%;" name="email[]">
                           
                              <option value=""></option>
                            
                           
                          </select>
                        </div>

				            <div class="form-group{{ $errors->has('gstin') ? ' has-error' : '' }}">
				                {!! Form::label('gstin', 'GSTIN Number') !!}
				                {!! Form::text('gstin', null, ['class' => 'form-control', 'required' => 'required']) !!}
				                <small class="text-danger">{{ $errors->first('gstin') }}</small>
				            </div>

				            <div class="form-group{{ $errors->has('pan') ? ' has-error' : '' }}">
				                {!! Form::label('pan', 'Pan Number') !!}
				                {!! Form::text('pan', null, ['class' => 'form-control', 'required' => 'required']) !!}
				                <small class="text-danger">{{ $errors->first('pan') }}</small>
				            </div>

				            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
				                {!! Form::label('name', 'Name') !!}
				                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
				                <small class="text-danger">{{ $errors->first('name') }}</small>
				            </div>


				            <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
				                {!! Form::label('website', 'Website') !!}
				                {!! Form::text('website', null, ['class' => 'form-control', 'required' => 'required']) !!}
				                <small class="text-danger">{{ $errors->first('website') }}</small>
				            </div>
                    
				      </div>
				      <div class="modal-footer">
				      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      		<div class="btn-group float-left">
				                
				                {!! Form::submit("Submit", ['class' => 'btn btn-success']) !!}
				            </div>
				        
				        {!! Form::close() !!}
				        
				      </div>
				    </div>
				  </div>
				</div>
            </div>
          </div>
         
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
          
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Clients Lists</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>Company name</th>
                    <th>Address</th>
                    <th>Zip</th>
                    <th>GSTIN</th>
                    <th>Pan</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Website</th>

                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  @forelse($clients as $client)
                  <tr>
                    <td>{{ $client->companyname }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->zip }}</td>
                    <td>{{ $client->gstin }}</td>
                    <td>{{ $client->pan }}</td>
                    <td>{{ $client->name }}</td>
                    <td>
                      <ol>
                        @foreach($client->phones as $phone)
                        <li>
                          {{ $phone->phone }}
                        </li>
                        @endforeach
                      </ol>
                    </td>
                    <td>
                      <ol>
                        @foreach($client->emails as $email)
                        <li>
                          {{ $email->email }}
                        </li>
                        @endforeach
                      </ol>
                    </td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->website }}</td>
                    <td><button class="btn btn-warning" data-toggle="modal" data-target="#edit-{{ $client->id }}">Edit</button></td>
                    <div class="modal fade" id="edit-{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Add New Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {!! Form::model($client, ['method' => 'PUT', 'route' => ['client.edit', $client->id], 'files' => 'true']) !!}
                    <div class="form-group{{ $errors->has('companyname') ? ' has-error' : '' }}">
                        {!! Form::label('companyname', 'Company Name') !!}
                        {!! Form::text('companyname', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('companyname') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        {!! Form::label('address', 'Address') !!}
                        {!! Form::text('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        {!! Form::label('city', 'City') !!}
                        {!! Form::text('city', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('city') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                        {!! Form::label('zip', 'Zip Code') !!}
                        {!! Form::text('zip', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('zip') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('gstin') ? ' has-error' : '' }}">
                        {!! Form::label('gstin', 'GSTIN Number') !!}
                        {!! Form::text('gstin', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('gstin') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('pan') ? ' has-error' : '' }}">
                        {!! Form::label('pan', 'Pan Number') !!}
                        {!! Form::text('pan', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('pan') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        {!! Form::label('phone', 'Phone Number') !!}
                        {!! Form::number('phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'Email address') !!}
                        {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                        {!! Form::label('website', 'Website') !!}
                        {!! Form::text('website', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('website') }}</small>
                    </div>
                    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <div class="btn-group float-left">
                        
                        {!! Form::submit("Submit", ['class' => 'btn btn-success']) !!}
                    </div>
                
                {!! Form::close() !!}
                
              </div>
            </div>
          </div>
        </div>
                    <td>
                      {!! Form::open(['method' => 'DELETE', 'route' => ['client.delete', $client->id], 'class' => 'form-horizontal']) !!}
                      
                              {!! Form::submit("Delete", ['class' => 'btn btn-danger']) !!}
                      
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <h1><center>Empty</center></h1>
                  </tr>
                  @endforelse
                </table>
               	<div style="padding-left: 40px;">
               		{!! $clients->render() !!}
               	</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@push('scripts')
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.phone').select2({
        tags: true
    })

  })
</script>
@endpush