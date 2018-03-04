<?php


$resp='{"id":"14cc376c76cb40d4b723256d95537ead","phone":"+918527483275","email":"test@gmail.com","buyer_name":"Shivesh N","amount":"100.00","purpose":"TEST ME","expires_at":null,"status":"Pending","send_sms":false,"send_email":true,"sms_status":null,"email_status":"Pending","shorturl":null,"longurl":"https:\/\/test.instamojo.com\/@deedgood49\/14cc376c76cb40d4b723256d95537ead","redirect_url":"https:\/\/hoproject.000webhostapp.com\/pay\/insta\/\/payment_end.php","webhook":"https:\/\/hoproject.000webhostapp.com\/pay\/insta\/\/payment_hook.php","allow_repeated_payments":false,"customer_id":null,"created_at":"2018-03-04T04:20:24.947712Z","modified_at":"2018-03-04T04:20:24.947729Z"}';


require_once(dirname(__FILE__)."/config.inc.php");

   init();
   
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 
$file=  basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

$server=str_replace($file, '', $actual_link);
 


$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

if($_POST){



	$data=$_POST;



}else 			  {
	
			    $data=  array("purpose" => "TEST ME",
		        "amount" => "100", 
		        "buyer_name" => "Shivesh N",
		        "phone" => "8527483275", 
		        "email" => "test@gmail.com" );

				 }

$data=arr2std($data);


echo '<br>';


		try {
		    $response = $api->paymentRequestCreate(array(
		        "purpose" => $data->purpose,
		        "buyer_name" =>$data->buyer_name,
		        "phone" => $data->phone,
		        "amount" => $data->amount,
		        "send_sms" => true,
		        "send_email" => true,
		        "email" => $data->email,
		        "webhook" => $server."/payment_hook.php",
		        "redirect_url" => $server."/payment_end.php"
		        ));


$response=arr2std($response);


	}
		catch (Exception $e) {

		    print('Using Dummy as Error: ' . $e->getMessage());
		
		    $response=json_decode($resp);
		}


$txnid=$response->id;

echo '<br><br><br>TXNID : '.$txnid;
echo '<br>buyer_name : '.$data->buyer_name;
echo '<br>phone : '.$data->phone;
echo '<br>amount : '.$data->amount;
echo '<br>email : '.$data->email; 

echo '<br><br><br><h1>  <a href="'.$response->longurl.'">PAY Rs. '.$data->amount.'</a> </h1><br>'; 
	


$sql='INSERT INTO `payments`(`txnid`, `buyer_name`, `amount`, `phone`, `email`, `status`, `insta_payment_id`, `insta_req_id`, `datetime`,`extra0`,`extra1`) VALUES ("'.$txnid.'","'.$data->buyer_name.'","'.$data->amount .'","'.$data->phone .'","'.$data->email .'","PENDING","","",NOW(),"{}","'.mysql_escape_string(json_encode($data)).'")';

/*
echo $sql;*/

execute($sql);

?>