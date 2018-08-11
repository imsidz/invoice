@extends('layouts.admin')

@section('head')
<title>Clients</title>
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
            <h1 class="m-0 text-dark">Recycle Bin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Recycle Bin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
    
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

                    <th width="5%">Restore</th>
                    <th width="10%">Delete</th>
                  </tr>
                  @forelse($clients as $client)
                  <tr>
                  	<td>{{ $client->companyname }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->zip }}</td>
                    <td>{{ $client->gstin }}</td>
                    <td>{{ $client->pan }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->website }}</td>
                    <td>{!! Form::open(['method' => 'POST', 'route' => ['client.restore.post', $client->id]]) !!}
                    
                            {!! Form::submit("Restore", ['class' => 'btn btn-success']) !!}

                    {!! Form::close() !!}</td>
                    <td>{!! Form::open(['method' => 'DELETE', 'route' => ['client.parmanent.delete', $client->id]]) !!}
                    
                            {!! Form::submit("Delete", ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}</td>
                  </tr>
                  @empty

                  @endforelse
                </table>
               	<div style="padding-left: 40px;">
               		{{-- {!! $clients->render() !!} --}}
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

@endpush