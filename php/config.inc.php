<?php
 
	$GLOBALS["mysql_hostname"] = "127.0.0.1";
	$GLOBALS["mysql_username"] = "root";
	$GLOBALS["mysql_password"] = "pass"; 
	$GLOBALS["mysql_database"] = "ecell";
  

	//E_ALL , 0
	$GLOBALS["error"] = 0;//E_ALL & ~E_NOTICE;

  
require('./sdk/Instamojo.php');

     $API_KEY = "e1c21f21aebb9f9aca56d034bef21ddc";
     $AUTH_TOKEN = "e1f84207a518d9a2094d8c32a6658181";
     $url = "https://test.instamojo.com/api/1.1/" ;
     $api = new Instamojo\Instamojo($API_KEY, $AUTH_TOKEN,$url);





function uid($response)
{
	


												$hash=hash('md5', $response->id);
												$uid = substr($hash, 0, 6);


$output='';
												$input=$hash;
										for ($i = strlen($input) - 1; $i >= 0; $i -= 4) {
										  $output .= $input[$i];
						}
						$uid=$output;
						 

												$sql='UPDATE `payments` SET insta_req_id="'.$uid.'" WHERE txnid="'. $response->id.'";';;
												execute($sql);


return $uid;
}



























 
 function arr2std($arr){

 	return json_decode(json_encode($arr));
 }    


function mysqlc()
{



$mysqli = new mysqli($GLOBALS["mysql_hostname"], $GLOBALS["mysql_username"], $GLOBALS["mysql_password"], $GLOBALS["mysql_database"]);
			if( $mysqli->connect_error )
				throw new Exception("MySQL connection could not be established: ".$mysqli->connect_error);


  return $mysqli;

}
function init()
{
	$sql="
CREATE TABLE IF NOT EXISTS `payments` (
  `txnid` varchar(100) NOT NULL,
  `buyer_name` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'PENDING',
  `extra0` text NOT NULL,
  `extra1` text NOT NULL,
  `insta_payment_id` varchar(100) NOT NULL,
  `insta_req_id` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`txnid`),
  UNIQUE KEY `txnid` (`txnid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";


execute($sql);

}
function execute($q){
	$mysqli=mysqlc();
   

$query = $mysqli->query( $q); 
$mysqli->close();
return $query;



}



?>