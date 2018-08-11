<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
	<body>
			<div class="row">
				<div class="col-md-12">
					<center><h3>Tax Invoice</h3></center>
				</div>
				
			</div>
		<div class="container" style="border: 1px solid black;">
		<div>
			<div class="row">
				<div class="col-md-2">
					<img src="{{ asset('companylogo/wli-logo.jpg')}}" width="100%">
				</div>
				<div class="col-md-4" style="line-height: 5px; border-right: 1px solid black;">
					<h4>{{ $company->companyname }}</h4>
					<p style="font-size: 14px;"><strong>Regd. Office</strong>:  {{ $company->address }}</p>
					<p style="font-size: 14px;"><strong>Tel :</strong> {{ $company->phone }}</p>
					<p style="font-size: 14px;"><strong>Website :</strong>{{ $company->website }}</p>
				</div>
				<div class="col-md-6" style="line-height: 3px; margin-top: 12px;">
					<div class="row">
						<div class="col-md-6" style="">
						<p><strong>Bill No. </strong> {{ $invoice->invoiceno }}</p>
						</div>
						<div class="col-md-6">
							<p><strong>Bill Date : </strong>{{ $invoice->created_at->format('d-m-Y') }}</p>
						</div>
						<div class="col-md-12">
							<p><strong>Executive Name : </strong>{{ Auth::user()->name }}</p>

							<p><strong>PO No. : </strong>NA</p>
							<p><strong>PO Date. : </strong>NA</p>
						</div>
					</div>
					
				</div>
			</div>
			<div class="row" style="border-top: 1px solid black;">
				<div class="col-md-6" style="line-height: 5px;border-right: 1px solid black;">
					<div style=" margin-top: 10px">
						<p><strong>Buyer Name : </strong>{{ $client->name }}</p>
						<p><strong>GSTIN of Buyer : </strong> {{ $client->gstin }}</p>
						<p><strong>Address : </strong>{{ $client->address }}<br>
						<p><strong>City : </strong> {{ $client->city }} - {{ $client->zip }}</p>
						<p><strong>Pan Number : </strong> {{ strtoupper($client->pan) }}</p>
					</div>
				</div>
				<div class="col-md-6">
					<div>
						<p><strong>Contact Person : </strong>Neeraj Kumar</p>
						<p><strong>Mobile Number : </strong>{{ $company->mobile }}</p>
						<p><strong>Phone Number : </strong>{{ $company->phone }}</p>
					</div>
				</div>
			</div>
			<div class="row" style="border-top: 1px solid black;height: 5px;">
				
			</div>
			<div class="row"style="border-top: 1px solid black;">
				<div class="col-md-1" style="border-right: 1px solid black;">
					<p><strong><center>S.No.</center></strong></p>
				</div>
				<div class="col-md-4" style="border-right: 1px solid black;">
					<p><strong><center>Description</center></strong></p>
				</div>
				<div class="col-md-2" style="border-right: 1px solid black;">
					<p><strong><center>HSN/SAC</center></strong></p>
				</div>
				<div class="col-md-1" style="border-right: 1px solid black;">
					<p><strong><center>Qty</center></strong></p>
				</div>
				<div class="col-md-1" style="border-right: 1px solid black;">
					<p><strong><center>Rate</center></strong></p>
				</div>
				
				<div class="col-md-3">
					<p><strong><center>Amount (Rs)</center></strong></p>
				</div>
			</div>
			<div class="row" style="border-top: 1px solid black;">
				<div class="col-md-1" style="border-right: 1px solid black;">
					<p><strong><center>1</center></strong></p>
				</div>
				<div class="col-md-4" style="border-right: 1px solid black;">
					@foreach($products as $product)
					<p style="margin-top: 10px;">{{ $product->productname }}</p>
					@endforeach
					<div style="text-align: right;">
						<P>CGST 9.00 %</P>
						<P>SGST 9.00 %</P>
					</div>
					
				</div>
				<div class="col-md-2" style="border-right: 1px solid black;">
					<p><strong><center>N/A</center></strong></p>
				</div>
				<div class="col-md-1" style="border-right: 1px solid black;">
					@foreach($products as $product)
					<p><strong><center>{{ $product->qty }}</center></strong></p>
					@endforeach
				</div>
				<div class="col-md-1" style="border-right: 1px solid black;">
					@foreach($products as $product)
					<p><strong><center>{{ $product->price }}</center></strong></p>
					@endforeach
				</div>
				
				<div class="col-md-3">
					@foreach($products as $product)
					<p><strong><center>{{ $product->qty * $product->price }}.00</center></strong></p>
					@endforeach
					<p><strong><center>{{ $invoice->tax }}</center></strong></p>
					<p><strong><center>{{ $invoice->tax }}</center></strong></p>
				</div>
			</div>
			<div class="row"style="border-top: 1px solid black;">
				<div class="col-md-1" style="border-right: 1px solid black;">
					<p><strong><center></center></strong></p>
				</div>
				<div class="col-md-4" style="border-right: 1px solid black;">
					<p><strong><center>Total</center></strong></p>
				</div>
				<div class="col-md-2" style="border-right: 1px solid black;">
					<p></p>
				</div>
				<div class="col-md-1" style="border-right: 1px solid black;">
					<p><strong><center>1</center></strong></p>
				</div>
				<div class="col-md-1" style="border-right: 1px solid black;">
					
				</div>
				
				<div class="col-md-3">
					<p><strong><center>{{ $invoice->total }}</center></strong></p>
				</div>
			</div>
			<div class="row"style="border-top: 1px solid black;">
				<div class="col-md-12" style="border-right: 1px solid black;">
					<p style="float: right">E. & O.E.</p>
					<p>Amount Chargable(in words)</p>
					<p><strong>{{ $priceinword }}</strong></p>
					<p>Remarks</p>
					{{-- <p><strong>Bill No.- 100039986 ,CD-KEY No.- 111021-PDUXZW-269902 </strong></p> --}}
					<div style="border: 1px solid black; padding: 13px 0px 0px 13px; width: 40%">
						<p><strong>Company GSTIN :</strong> {{ $company->gstin }}</p>
						<p><strong>Company PAN :</strong>  {{ $company->pan }}</p>
						<p><strong>Company CIN :</strong>  {{ $company->cin }}</p>
					</div>
					<div class="row">
						<div class="col-md-2">
						<p><strong>Declaration :-</strong></p>	
						</div>
						<div class="col-md-10">
							<p>1) We declare that this invoice shows the actual price of the supplies described and that all particulars are true and correct . </p>
							<p>2) Tax on this invoice is not payable on reverse charge basis.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-2" style="border: 1px solid black;">
				<strong><p><center>NEFT Details</center></p></strong>
			</div>
			<div class="col-md-10" style="border: 1px solid black;">
				<p><strong><center>{{ $company->neft }}</center></strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="border: 1px solid black;border-radius: 5px;">
				<p><center><strong>Beneficiary Name - {{ $company->companyname }}</strong> </center> </p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2" style="border: 1px solid black;border-radius: 5px;">
				<p><strong><center>Cheque No./ Cash</center></strong></p>
			</div>
			<div class="col-md-3" style="border: 1px solid black;border-radius: 5px;">
				<p><strong><center></center></strong></p>
			</div>
			<div class="col-md-2" style="border: 1px solid black;border-radius: 5px;">
				<p><strong><center>Bank Name</center></strong></p>
			</div>
			<div class="col-md-5" style="border: 1px solid black;border-radius: 5px;">
				<p><strong><center></center></strong></p>
			</div>
			<div class="col-md-2" style="border: 1px solid black;border-radius: 5px;">
				<p><strong><center>Amount</center></strong></p>
			</div>
			<div class="col-md-3" style="border: 1px solid black;border-radius: 5px;">
				<p><strong><center></center></strong></p>
			</div>
			<div class="col-md-2" style="border: 1px solid black;border-radius: 5px;">
				<p><strong><center>Branch</center></strong></p>
			</div>
			<div class="col-md-5" style="border: 1px solid black;border-radius: 5px;">
				<p><strong><center></center></strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="border: 1px solid black; border-radius: 5px;">
				<div class="row">
					<div class="col-md-8">
						<p>Term & Conditions :</p>
				<ol style="font-size: 10px;">
					<li> Failure to furnish your correct GSTIN will result in loss of input tax credit. Since Revision of GST Returns is not allowed, you will
 get credit of input taxes only for future bills, issued subsequent to furnishing your GSTIN. The company shall not be responsible for
 any credit of input taxes lost due to non-furnishing of correct GSTIN</li>
 <li> Payment against this invoice should be made by NEFT/ ''Account Payee'' Cheque/Bank Draft in the
 	<br>
 name of WEBTEL ELECTROSOFT P LTD. payable at New Delhi ONLY
</li>
<li>
	Cheque return charges Rs. 500.00 extra.
</li>
<li>
	 Interest @ 1.50% p.m. will be levied on payment delayed beyond 30 days.
</li>
<li> All disputes to be settled in Delhi Courts only.</li>
				</ol>
					</div>
					<div class="col-md-4">
						</strong> For <strong>{{ $company->companyname }}</strong>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						
						<p><center>Authrized Signature</center></p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="height: 100px;">
				<center><strong>This bill is computerized and does not require any company stamp</strong></center>
				<center><button onclick="myFunction()">Print</button></center>
			</div>
		</div>
	</div>
</body>
			
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script>
function myFunction() {
    window.print();
}
</script>
</body>
</html>