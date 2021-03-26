<?php
require '../core/init.php';

//echo "$ada";

$APIS=json_decode(file_get_contents("php://input"));
//echo $APIS;
//if(!isset($APIS)){
//	$hasilapi = array('Error'=>'Request API not set');
//}else{
//	$request=$APIS->param;
//	if($request=="request"){
$arr1 = array();
foreach($invoice->tampil_data1() as $q1){
	array_push($arr1, array( $q1[currency] => $q1[name_curr] ));		 
}		 
$arr2 = array();
foreach($invoice->tampil_data2() as $q2){
	array_push($arr2, array( $q2[lang] => $q2[name_lang] ));		 
}
$arr3 = array();
foreach($invoice->tampil_data3() as $q3){
	array_push($arr3, array( $q3[rate] => $q3[name_rate] ));		 
}	
$arr4 = array();
foreach($invoice->tampil_data4() as $q4){
	array_push($arr4, array( $q4[name] => $q4[fullname] ));		 
}
$arr5 = array();
foreach($invoice->tampil_data5() as $q5){
	array_push($arr5, array( $q5[name] => $q5[logo] ));		 
}
$arr6 = array();
foreach($invoice->tampil_data6() as $q6){
	array_push($arr6, array( $q6[name] => $q6[alamat] ));		 
}
$arr7 = array();
foreach($invoice->tampil_data7() as $q7){
	array_push($arr7, array( $q7[name] => $q7[alamat2] ));		 
}

$ada = $invoice->tampil_data9();
if($ada > 0){
$arr8 = array();
	array_push($arr8, array( 'inv' => sprintf("%03d", ($ada+1)) ));
}else{
$arr8 = array();
	array_push($arr8, array( 'inv' => sprintf("%03d", '1') ));		 
}
$arr10 = array();
foreach($invoice->tampil_data10() as $q10){
	array_push($arr10, array( 'nopo' => $q10[nopo],'qty' => $q10[qty],'uom' => $q10[uom],'price' => $q10[price] ));		 
}

	$hasilapi = array(

	'currency'=> $arr1,
//foreach((array) $invoice->tampil_data1() as $q1){

//echo $q1[currency]."=>".$q1[name_curr].",";
//	'IDR'=>'Rupiah Indonesia - IDR'	
//	),
	'language'=> $arr2,
	'rate'=> $arr3,
	'to'=> $arr4,
	'from'=> array('from'=>'Muhammad Hermawan, HP:081360755115, Cikarang Utara'),
	'logo'=> $arr5,
	'alamat1'=> $arr6,
	'alamat2'=> $arr7,
	'invoiceno'=> $arr8,
	'po'=> $arr10,
	);
	//}else{
	//$hasilapi = array('Error'=>'Param Request Not Found');
	//}	
//}
echo json_encode($hasilapi);
?>