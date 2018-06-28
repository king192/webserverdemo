<?php
include("WebServerClient.class.php");
//$c=new webServerInterface();
// exit();
$c=new Client();
//$data=$c->encode('1', $c->sKey);

//print_r();

print_r($c->GetMyCoupon(array()));
//echo '3242';