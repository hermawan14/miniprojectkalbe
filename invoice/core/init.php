<?php 
ob_start(); // Added to avoid a common error of 'header already sent'

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {
 $pageURL .= "s";
 $pageURL .= "://";
 $pageURL .= $_SERVER["SERVER_ADDR"];
 }else{
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  //$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["SCRIPT_NAME"];
		$pageURL .= $_SERVER["SERVER_ADDR"].":".$_SERVER["SERVER_PORT"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_ADDR"];
	 }
 }	 
 return $pageURL;
}

//session_start();
require_once 'connect/database.php';
function my_autoload($class)
{ $filename = 'class/'.$class.'.php';
	include_once $filename;
}
spl_autoload_register('my_autoload');
try {
	
    $invoice 		= new invoice($db);
	
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>