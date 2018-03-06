<?php

if($_GET["pass"]=="ecell123")
	{

 
	require_once(dirname(__FILE__)."/config.inc.php");

/*
$json_string =execute("SELECT * FROM `payments` WHERE 1");

$array = json_decode($json_string, true);*/
$array=execute("SELECT * FROM `payments` WHERE 1 order by datetime desc");


?>

<table border="1" cellpadding="10">
    <thead><tr><th>TXN ID</th><th>Payment ID</th><th>Time</th><th>Name</th><th>Phone</th><th>E-Mail</th><th>Amount</th><th>Status</th></tr></thead>
    <tbody>
    <?php foreach($array as $key => $value): ?>
        <tr>
 <td><?php echo $value['txnid']; ?></td>
 <td><?php echo $value['insta_payment_id']; ?></td>
 <td><?php echo $value['datetime']; ?></td>
 <td><?php echo $value['buyer_name']; ?></td>
 <td><?php echo $value['phone']; ?></td>
 <td><?php echo $value['email']; ?></td>
 <td><?php echo $value['amount']; ?></td>
 <td><?php echo $value['status']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<?php

}	
else{
	
	echo "Not Authorized";
}

?>
