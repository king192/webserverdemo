<?php
ini_set('soap.wsdl_cache', 0);
ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 0);
// exit();
// $url = 'http://localhost/t/ws/test_server.wsdl';
$url = 'http://test.test/webserverdemo/api/webserver/webServerInterface.php?wsdl';    //两种url都可以
// $url = 'http://121.40.197.117/api/webserver/webServerInterface.php?wsdl';    //两种url都可以
$client = new SoapClient($url);
$params = array('date'=>"4");

//$params = array('ids'=>"1");
//setSaveShop
$res1 = $client->__soapCall('getlist',array('parameters'=>$params));
$res2 = $client->__soapCall('setSaveShop',array('parameters'=>$params));
$res3 = $client->__soapCall('delShop',array('parameters'=>$params));
var_dump($res1);

var_dump($res2);

var_dump($res3);