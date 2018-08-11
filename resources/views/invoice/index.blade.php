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

                <p>Invoice</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer" data-toggle="modal" data-target="#addmovie">Create New Invoice <i class="fa fa-arrow-circle-right"></i></a>
              <!-- Modal -->
				<div class="modal fade" id="addmovie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Add New Invoice</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        {!! Form::open(['method' => 'POST', 'route' => 'invoice.post', 'files' => 'true']) !!}
				            
                    <div class="form-group{{ $errors->has('client') ? ' has-error' : '' }}">
                        {!! Form::label('client', 'Select Client') !!}
                        <select class="form-control" id="sel1" name="client">
                          @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->companyname }}</option>
                          @endforeach
                        </select>
                        <small class="text-danger">{{ $errors->first('client') }}</small>
                    </div>
      
          <button id="add-more" name="add-more" class="btn btn-primary">Add More Field</button>

  <div id="field">
    <div id="field0">
    
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Product Name</label>
            <input type="text" name="productname[]" class="form-control" required="required">
          </div>
          <div class="col-md-1">
            <label>Qty</label>
            <input type="number" name="qty[]" class="form-control" required="required">
          </div>
          <div class="col-md-2">
            <label>Price</label>
            <input type="number" name="price[]" class="form-control" required="required">
          </div>
        </div>
      </div>
    </div>
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
                    <th>Invoice Number</th>
                    <th>Client</th>
                    <th>Subtotal</th>
                    <th>Tax</th>
                    <th>Total</th>

                    <th width="5%">Print</th>
                    <th width="5%">Cancle</th>
                    <th width="10%">Delete</th>
                  </tr>
                  @forelse($invoices as $invoice)
                  <tr>
                    <td>{{ $invoice->invoiceno }}</td>
                    <td><a href="#">{{ $invoice->client->companyname }}</a> </td>
                    <td>
                        {{ $invoice->subtotal }}.00
                    </td>
                    <td>
                      CGST 9% = Rs.{{ $invoice->tax }}
                      <br>
                      SGST 9% = Rs.{{ $invoice->tax }}
                    </td>
                    <td>
                      {{ $invoice->total }}
                    </td>
                    <td>
                      <a href="#" onClick="MyWindow=window.open('{{ url('print/' . $invoice->id) }}','MyWindow',width=800,height=600); return false;" class="btn btn-info">Print</a>
                    </td>
                    <td>
                      {!! Form::open(['method' => 'POST', 'route' => ['invoice.cancle', $invoice->id]]) !!}
                      
                              {!! Form::submit("Cancle", ['class' => 'btn btn-warning']) !!}
                      {!! Form::close() !!}
                    </td>
                    <td>{!! Form::open(['method' => 'POST', 'route' => ['invoice.send', $invoice->id]]) !!}
                    
                            {!! Form::submit("Send", ['class' => 'btn btn-success']) !!}
                    
                    {!! Form::close() !!}</td>
                  </tr>
                  @empty
                  @endforelse
                </table>
               	<div style="padding-left: 40px;">
               		{!! $invoices->render() !!}
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
<script type="text/javascript">
  $(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = ' <div id="field'+ next +'" name="field'+ next +'"><div class="form-group">        <div class="row">          <div class="col-md-4">            <label>Product Name</label>            <input type="text" name="productname[]" class="form-control" required="required">          </div>          <div class="col-md-1">            <label>Qty</label>            <input type="number" name="qty[]" class="form-control" required="required">          </div>          <div class="col-md-2">            <label>Price</label>            <input type="number" name="price[]" class="form-control" required="required">          </div>          <div class="col-md-3">                             </div>        </div>      </div></div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button>';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });

});
</script>
@endpush