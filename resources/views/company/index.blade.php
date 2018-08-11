@extends('layouts.admin')
@section('head')
<title>Company</title>
<style type="text/css">
  .select2-selection__choice{
    background-color: #007BFE!important;
  }
</style>
@endsection

@section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Company Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
              		<button class="btn btn-info pull-right" style="margin-left: 15px;">Add New</button>
              		<button class="btn btn-info pull-right" >Show All</button>
              		 <h3 class="card-title">Company Details</h3>
              	 </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                  
                  {!! Form::model($company, ['method' => 'PUT', 'route' => ['company.post', $company->id], 'files' => true]) !!}
                  
                      <div class="form-group{{ $errors->has('companyname') ? ' has-error' : '' }}">
                          {!! Form::label('companyname', 'Company Name') !!}
                          {!! Form::text('companyname', null, ['class' => 'form-control', 'required' => 'required']) !!}
                          <small class="text-danger">{{ $errors->first('companyname') }}</small>
                      </div>

                      <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label>Enter Your Phone Number</label>
                          <select class="form-control phone" multiple="multiple" data-placeholder="Add Your Phone"
                                  style="width: 100%;" name="phone[]">
                           @foreach($company->phones as $phone)
                              <option value="{{ $phone->phone }}" selected="selected">{{ $phone->phone }}</option>
                            @endforeach
                           
                          </select>
                        </div>

                      <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label>Enter Your Email</label>
                          <select class="form-control phone" multiple="multiple" data-placeholder="Enter Your Email"
                                  style="width: 100%;" name="email[]">
                            @foreach($company->emails as $email)
                              <option value="{{ $email->email }}" selected="selected">{{ $email->email }}</option>
                            @endforeach
                           
                          </select>
                        </div>

                      <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                          {!! Form::label('website', 'Website') !!}
                          {!! Form::text('website', null, ['class' => 'form-control']) !!}
                          <small class="text-danger">{{ $errors->first('website') }}</small>
                      </div>
                  	
                  	<div class="form-group{{ $errors->has('gstin') ? ' has-error' : '' }}">
                  	    {!! Form::label('gstin', 'GISTIN') !!}
                  	    {!! Form::text('gstin', null, ['class' => 'form-control']) !!}
                  	    <small class="text-danger">{{ $errors->first('gstin') }}</small>
                  	</div>

                  	<div class="form-group{{ $errors->has('pan') ? ' has-error' : '' }}">
                  	    {!! Form::label('pan', 'Pan Number') !!}
                  	    {!! Form::text('pan', null, ['class' => 'form-control']) !!}
                  	    <small class="text-danger">{{ $errors->first('pan') }}</small>
                  	</div>

                  	<div class="form-group{{ $errors->has('cin') ? ' has-error' : '' }}">
                  	    {!! Form::label('cin', 'CIN Number') !!}
                  	    {!! Form::text('cin', null, ['class' => 'form-control']) !!}
                  	    <small class="text-danger">{{ $errors->first('cin') }}</small>
                  	</div>

                  	<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                  	    {!! Form::label('address', 'Address') !!}
                  	    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                  	    <small class="text-danger">{{ $errors->first('address') }}</small>
                  	</div>
                     
                  	<div class="form-group{{ $errors->has('neft') ? ' has-error' : '' }}">
                  	    {!! Form::label('neft', 'NEFT Details') !!}
                  	    {!! Form::text('neft', null, ['class' => 'form-control']) !!}
                  	    <small class="text-danger">{{ $errors->first('neft') }}</small>
                  	</div>

                  	<img src="{{asset('images/company/logo/' . $company->image) }}" width="150" align="right">
                  	<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  	    {!! Form::label('image', 'Select Image') !!}
                  	    {!! Form::file('image') !!}
                  	    <p class="help-block">Select Company Logo</p>
                  	    <small class="text-danger">{{ $errors->first('image') }}</small>
                  	</div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  {!! Form::submit("Submit", ['class' => 'btn btn-success']) !!}
                  {!! Form::close() !!}
                </div>
             
            </div>
            <!-- /.card -->

            <!-- Input addon -->
            
          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
        </div>
        <!-- /.row -->
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