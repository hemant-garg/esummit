<?php
 
$user = "ecell@gmail.com";
$pwd = "Test123";
$recipient = $_GET["recipient"];
$subject = $_GET["subject"];
$body =$_GET["body"];
 
    $tmp = exec("python mailer.py $user $pwd $recipient '$subject' '$body'");
    echo $tmp;

?>