<?php
include("webServerInterface.class.php");
include_once '../../config.inc.php';
include_once 'commonWebServer.php';
$server = new SoapServer('webServerInterface.wsdl', array('soap_version' => SOAP_1_2));
$server->setClass("webServerInterface");
$server->handle();