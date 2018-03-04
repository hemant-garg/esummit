<?php


$json='{"payment_id":"MOJO8304005N11134614","status":"Credit","shorturl":"","longurl":"https:\/\/test.instamojo.com\/@deedgood49\/14cc376c76cb40d4b723256d95537ead","purpose":"TEST ME","amount":"100.00","fees":"1.90","currency":"INR","buyer":"test@gmail.com","buyer_name":"Shivesh N","buyer_phone":"+918527483275","payment_request_id":"14cc376c76cb40d4b723256d95537ead","mac":"eec01a7152b5a85fb3d1b6fb80c8272556d87eac"}
';
if($_POST)
	$data=$_POST;
else
	$data=json_decode($json);

	require_once(dirname(__FILE__)."/config.inc.php");

$data=arr2std($data);


	var_dump($_POST);


	$sql='UPDATE `payments` SET  `status`="'.$data->status .'",`extra0`="'.mysql_escape_string(json_encode($data)).'" ,`insta_payment_id`="'.$data->payment_id .'",
	`insta_req_id`="'.$data->payment_request_id .'" WHERE `txnid`="'.$data->payment_request_id.'";';


echo $sql;
execute($sql);
	file_put_contents('xx.txt', json_encode($_POST));


?>