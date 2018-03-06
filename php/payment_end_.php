<?php

	require_once(dirname(__FILE__)."/config.inc.php");


$resp='{"id":"14cc376c76cb40d4b723256d95537ead","phone":"+918527483275","email":"test@gmail.com","buyer_name":"Shivesh N","amount":"100.00","purpose":"TEST ME","expires_at":null,"status":"Completed","send_sms":false,"send_email":true,"sms_status":null,"email_status":"Sent","shorturl":null,"longurl":"https:\/\/test.instamojo.com\/@deedgood49\/14cc376c76cb40d4b723256d95537ead","redirect_url":"https:\/\/hoproject.000webhostapp.com\/pay\/insta\/\/payment_end.php","webhook":"https:\/\/hoproject.000webhostapp.com\/pay\/insta\/\/payment_hook.php","payments":[{"payment_id":"MOJO8304005N11134614","status":"Credit","currency":"INR","amount":"100.00","buyer_name":"Shivesh N","buyer_phone":"+918527483275","buyer_email":"test@gmail.com","shipping_address":null,"shipping_city":null,"shipping_state":null,"shipping_zip":null,"shipping_country":null,"quantity":1,"unit_price":"100.00","fees":"1.90","link_slug":null,"link_title":null,"discount_code":null,"discount_amount_off":null,"variants":[],"custom_fields":[],"affiliate_id":null,"affiliate_commission":"0","payment_request":"https:\/\/test.instamojo.com\/api\/1.1\/payment-requests\/14cc376c76cb40d4b723256d95537ead\/","instrument_type":"NETBANKING","failure":null,"created_at":"2018-03-04T04:20:45.815214Z"}],"allow_repeated_payments":false,"customer_id":null,"created_at":"2018-03-04T04:20:24.947712Z","modified_at":"2018-03-04T04:21:12.422369Z"}';



try {
    $response = $api->paymentRequestStatus($_GET['payment_request_id']);

 

$response=arr2std($response);

if(sizeof($response->payments)>0){

	if($response->payments[0]->status=="Credit"){

?>
<h1>SUCCESS</h1>
<?php
		 
	}

}



}
catch (Exception $e) {
	 $response=json_decode($resp);
    print('Using DUmmy as Error: ' . $e->getMessage());
}


    print_r(json_encode($response));
?>