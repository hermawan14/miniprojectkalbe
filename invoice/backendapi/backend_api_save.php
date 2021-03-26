<?php
require '../core/init.php';


$APIS=json_decode(file_get_contents("php://input"));
//echo "$APIS";
//if(!isset($APIS)){
//	$hasilapi = array('Error'=>'Request API not set');
//}else{
	$inv_no=$_POST[inv_no];
	$inv_date=$_POST[inv_date];
	$inv_due=$_POST[inv_due];
	$to=$_POST[to];
	$po=$_POST[po];
	$subtotal=$_POST[subtotal];
	$disc=$_POST[disc];
	$total=$_POST[total];
	
	$invoice->tampil_data11($inv_no,$inv_date,$inv_due,$to,$po,$subtotal,$disc,$total);
	$hasilapi = array("Success"=>"$inv_no,$inv_date,$inv_due,$to,$po,$subtotal,$disc,$total");
//}
echo json_encode($hasilapi);
?>