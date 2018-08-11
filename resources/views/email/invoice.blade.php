<html>

<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
  <table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px #1c006c;">
    <thead>
      <tr>
        <th style="text-align:left;"><img style="max-width: 150px;" src="https://www.weblogixinfotech.com/img/wli-logo.png" alt="Weblogix infotech"></th>
        <th style="text-align:right;font-weight:400;">{{ Carbon\Carbon::now()->format('d-m-Y')}}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="height:35px;"></td>
      </tr>
     
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Name</span> {{ $name }}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email</span>
          	@foreach($emails as $email)
          	{{ $email->email }},
          	@endforeach
          </p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Phone</span>
          	@foreach($phones as $phone)
          	{{ $phone->phone }},
          	@endforeach
          </p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Invoice No.</span> {{ $invoice }}</p>
        </td>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Address</span> {{ $address }}, {{ $city }} - {{ $zip }}</p>
          
        </td>
      </tr>
      <tr>
        <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Items</td>
      </tr>
      <tr>
        <td colspan="2" style="padding:15px;">
        	@foreach($products as $product)
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
            <span style="display:block;font-size:13px;font-weight:normal;">{{ $product->productname }}</span> Rs. {{ $product->price }} 
          </p>
          @endforeach
         
        </td>
      </tr>
    </tbody>
    <tfooter>
      <tr>
        <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
          <strong style="display:block;margin:0 0 10px 0;">Regards</strong>Weblogix Infotech Pvt. Ltd.<br> Pocket A-3/61,1st floor, Rohini-07, New Delhi-110085 India<br><br>
          <b>Mobile:</b> +91-9873674315, +91-9873226969<br>
          <b>Email:</b> info@weblogixinfotech.com
        </td>
      </tr>
    </tfooter>
  </table>
</body>

</html>