<!DOCTYPE html>
<html>
  <head>
    <title>Testing Mini Project PT Kalbe Farma, Tbk</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<script src="jquery.min.js" type="text/javascript"></script>	
  </head>
  <body>
<?php
$url = 'http://127.0.0.1:5004/backendapi/backend_api.php';
$data = array('param' => 'request');

// use key 'http' even if you send the request to https://...
$options = array(
  'http' => array(
    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
    'method'  => 'PUT',
    'content' => http_build_query($data),
  ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$data= json_decode($result, true);

//echo "$result";

foreach ($data['invoiceno'] as $invoiceno) {
foreach ($invoiceno as $invoicenox => $invno) {
   $invoiceno = $invno;
}}


 if($_POST[submit]=="SIMPAN"){

$urlx = 'http://127.0.0.1:5004/backendapi/backend_api_save.php';
$datax = array('inv_no' => $_POST[invoiceno], 'inv_date' => $_POST[dateinvoice], 'inv_due' => $_POST[due], 'to' => $_POST[to], 'po' => $_POST[po], 'subtotal' => $_POST[tsub], 'disc' => $_POST[tdisc], 'total' => $_POST[grandtotal]);

// use key 'http' even if you send the request to https://...
$options = array(
  'http' => array(
    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
    'method'  => 'POST',
    'content' => http_build_query($datax),
  ),
);
$context  = stream_context_create($options);
$result = file_get_contents($urlx, false, $context);
$data= json_decode($result, true);
//echo "$result";
echo  "<script>location.href='index.php';</script>";
 
 }
?>  
<form action="index.php" method="post" enctype="multipart/form-data">
  
<div id="myModal" class="modal" style="display:none;position: fixed;background-color: rgb(0,0,0);background-color: rgba(0,0,0,0.6);z-index: 1;width: 100%;height: 100%;padding-top: 50px;left: 0;top:0;">
  <div class="modal-content" id="modal-content" style="width:40%;height: 50%;margin: auto;padding: 10px;border: 1px solid #888; background:#FFFFFF; border-radius:.6em;">
  	<div style="width:100%; float:right; text-align:right;">
	<span class="close" id="close"><i class="fa fa-times-circle" style="color:#666;"></i></span><br>
    <h2 align="center" style="margin-top:10px;">PILIH PO</h2><br>
	<div align="center">
	<table border="1" cellpadding="3" cellspacing="1" width="100%">
	<thead>
	<tr><td align="center" bgcolor="#66CCCC"><b>No PO</b></td><td bgcolor="#66CCCC" align="center"><b>Qty</b></td><td bgcolor="#66CCCC" align="center"><b>UOM</b></td><td bgcolor="#66CCCC" align="center"><b>Price</b></td></tr>
	</thead>
	<tbody>
<?php
foreach ($data['po'] as $po => $valpo) {
?>	
	<tr><td><a href="#" id="poclick" onClick="javascript:poclick('<?php echo $valpo['nopo']?>');"><?php echo $valpo['nopo']?></a></td><td><?php echo $valpo['qty']?></td><td><?php echo $valpo['uom']?></td><td><?php echo number_format($valpo['price'])?></td></tr>
<?php }?>	
	</tbody>
	</table>
	</div>
	</div>
  </div>
</div>  	
  
<div align="center" style="width:100;">
    <div class="testbox" style="width:50%;">
	<div align="justify">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr><td width="70%" valign="middle" align="left"><div style="width:60%; text-align:center;"><div style="float:left; text-align:center; border:1px solid #006633; padding-left:15px; padding-right:15px; border-radius:.3em; margin-top:15px; background:#009999; color:#FFFFFF;"><b>UNPAID</b></div> <div style="float:right;"><h2><b>Bill Of Transaction</b></h2></div></div><br><br><br><div style="border:1px solid #999999; padding:5px; font-size:9pt;">Please find attached your invoice. Thank you for timely payment.</div></td><td valign="top" align="center"><span id="logo"></span></td></tr>
	</table><br>
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr><td width="70%" valign="middle" align="left">
	<div style="width:100%;">
	<div style="float:left; width:25%;"><b>Invoice No.</b><br><span style="position:absolute; margin-right:-20px; background:#ddd; padding-left:8px; padding-right:8px; padding-top:5px; padding-bottom:7px; color:#000;"> # </span><input type="text" name="invoiceno" style="padding-left:30px;text-align:left;" value="INV-<?php echo $invoiceno?>"/><input type="hidden" name="invoiceno" value="<?php echo $invoiceno?>"></div> 
	<div style="float:right"><b>Language</b><br>
	<select>
<?php
foreach ($data['language'] as $lang) {
	foreach ($lang as $langx => $vallang) {
?>	
	<option value="<?php echo $langx?>"><?php echo $vallang?></option>
<?php }}?>	
	</select></div>
	</div></td><td><div style="padding-left:10px;"><b>Currency</b><br>
	<select name="currency" id="currency">
<?php
foreach ($data['currency'] as $currency) {
foreach ($currency as $valx  => $val) {
?>	
	<option value="<?php echo $valx?>"><?php echo $val?></option>
<?php }}?>	
	</select></div></td></tr>
	</table>
	<hr style="border-top:2px solid #CCCCCC;">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr><td width="70%" valign="top" align="left">
	<div style="width:65%;">
	<b>From</b><br><div style="width:100%;">
	<textarea rows="4" name="from" id="from" style="padding-right:30px; width:85%;">
<?php
foreach ($data['from'] as $from) {
echo nl2br(htmlentities($from, ENT_QUOTES, 'UTF-8'));
}
?>
	</textarea>
	<span style="position:absolute; margin-left:-30px; color:#000000;"> <b class="tooltip"><a id="resetfrom" onClick="javascript:clearfrom();"><i class="fa fa-times-circle"></i></a><span class="tooltiptext">Reset Text</span></b></span></div>
	<br>
	<b>To</b><br>
	<select name="to" id="to">
	<option>[ PILIH ]</option>
<?php
foreach ($data['to'] as $to) {
foreach ($to as $tox => $valto) {
?>	
	<option value="<?php echo $tox?>"><?php echo $valto?></option>
<?php }}?>	
	</select>
	<span id="to1" style="color:#000000;">No Data</span><br>
	<span id="to2" style="color:#000000;">No Data</span>
	</div>
	</td>
	<td valign="top">
	<div style="padding-left:10px;">
	<b>Date</b><br>
	<div class="day-visited">
          <input type="date" name="dateinvoice" data-date-format="YYYY-MM-DD" required/>
          <i class="fas fa-calendar-alt"></i>
    </div>
	<b>Invoice Due</b><br>
	<select name="due"><option value="Immediately">Immediately</option></select>
	<br>
	<b>Purchase Order Number</b><br>
	<div class="day-visited">
	<input type="text" name="po" id="po" readonly="true" />
	<i class="fa fa-search" id="searchpo"></i>
	</div>
	</div>
	</td>
	</tr>
	</table>
	<hr style="border-top:2px solid #CCCCCC;">
	
	<table border="0" width="100%" cellpadding="4" cellspacing="0" id="tabellist">
	<thead>
	<tr>
	<th style="border-bottom:2px solid #999999; width:55%;" align="left">Name</th><th style="border-bottom:2px solid #999999;" align="right">Quantity</th><th style="border-bottom:2px solid #999999;" align="right">Rate</th><th style="border-bottom:2px solid #999999;" align="right">Amount</th>   
	</tr>
	</thead>
	<tbody>
	<tr>
	<td>
	<textarea id="editor" name="ket[]"></textarea>
	</td><td valign="top"><input type="number" id="qty" name="qty[]" step='0.01' value="0.00" /></td><td valign="top"><input type="number" id="rate" name="rate[]" step='0.01' onChange="javascript:calculate();" />
	<select>
<?php
foreach ($data['rate'] as $rate) {
foreach ($rate as $ratex => $valrate) {
?>	
	<option value="<?php echo $ratex?>"><?php echo $valrate?></option>
<?php }}?>
	</select></td><td valign="top"><div class="amount"><span id="matauang" class="matauang">IDR</span><input type="number" id="amount" name="amount[]" step='0.01' style="text-align:right; padding-left:35px; width:55px;" readonly="true" /></div></td>
	</tr>
	</tbody>
	<tfoot>
	<td style="border-top:2px solid #999999;" colspan="4"><button id="newrow">New Line</button></td>
	</tfoot>   
	</table>
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr><td width="50%"></td><td>
	
	<table border="0" cellpadding="4" cellspacing="0" width="100%">
	<tr><td width="65%" style="border-bottom:2px solid #ccc;"><b>Sub Total</b></td><td style="border-bottom:2px solid #ccc;" align="right"><span id="subtotal" style="font-weight:bold; color:#000000; font-size:11pt;"></span><input type="hidden" id="tsub" name="tsub" /></td></tr>
	<tr><td width="65%" style="border-bottom:2px solid #ccc;"><div style="width:100%;"><a onClick="javascript:clearfrom2();"><i class="fa fa-times-circle" style="position:absolute; margin-left:-25px; margin-top:10px;"></i></a><input type="text" id="discountname" name="discountname" style="width:60%;" /><input type="number" id="discountvalue" name="discountvalue" style="width:25%;" step='0.01' /></div></td><td style="border-bottom:2px solid #ccc;" align="right"><span id="totaldiscount" style="font-weight:bold; color:#000000; font-size:11pt;"></span><input name="tdisc" id="tdisc" type="hidden" value=""></td></tr>
	<tr><td width="65%" style="border-bottom:2px solid #ccc;"><b>Total <span id="matauang2" style="color:#666;" class="matauang">(IDR)</span></b></td><td style="border-bottom:2px solid #ccc;" align="right"><span id="total" style="font-weight:bold; color:#000000; font-size:11pt;"></span><input name="grandtotal" id="grandtotal" type="hidden" value=""></td></tr>
	</table>
	
	</td></tr>
	</table>
	<table border="0" cellpadding="4" cellspacing="0" width="100%">
	<tr><td align="left"><input type="submit" name="submit" value="SIMPAN" style="width:20%;background-color:#0099CC;color:#fff; "></td></tr>
	</table>   
	</div>  
    </div>
	</div>
</form>	
  </body>
</html>
<script type="text/javascript">
var sum = 0;
var disc = 0;
var total = 0;

		document.getElementsByClassName("close")[0].onclick = function() {
			document.getElementById("myModal").style.display = "none";
		}
		window.onclick = function(event) {
			if (event.target == document.getElementById("myModal")) {
				document.getElementById("myModal").style.display = "none";
			}
		}

//document.getElementById("myModal").style.display = "none";

	$('#searchpo').click(function(){
	document.getElementById("myModal").style.display = "block";
	});

	$('#currency').change(function(){
		var curr = $('#currency').val();
		$('.matauang').html(curr);
		$('#matauang2').html(curr);
	});
	$('#to').change(function(){
	
<?php
foreach ($data['logo'] as $logo) {
foreach ($logo as $logox => $vallogo) {
?>	
if($('#to').val()==="<?php echo $logox?>"){
$('#logo').html("<img src='logo/<?php echo $vallogo?>' width='130px;'>");
}else{
}
<?php }}?>
<?php
foreach ($data['alamat1'] as $alamat1) {
foreach ($alamat1 as $alamat1x => $valalamat1) {
?>	
if($('#to').val()==="<?php echo $alamat1x?>"){
$('#to1').html("<?php echo $valalamat1?>");
}else{
}
<?php }}?>	
<?php
foreach ($data['alamat2'] as $alamat2) {
foreach ($alamat2 as $alamat2x => $valalamat2) {
?>	
if($('#to').val()==="<?php echo $alamat2x?>"){
$('#to2').html("<?php echo $valalamat2?>");
}else{
}
<?php }}?>	

	});


$('#subtotal').html(sum.toFixed(2));
$('#tsub').val(sum.toFixed(2));
function clearfrom() {
    document.getElementById("from").value = "";
}
function poclick(po) {
    $('#po').val(po);
	document.getElementById("myModal").style.display = "none";
}
function clearfrom2() {
    document.getElementById("discountname").value = "";
	document.getElementById("discountvalue").value = "";
	$('#totaldiscount').html("");
	$('#tdisc').val("0");
	$('#total').html(sum.toFixed(2));
	$('#grandtotal').val(sum.toFixed(2));	
}
function calculate() {
var qty = document.getElementById("qty").value;
var rate = document.getElementById("rate").value;
    document.getElementById("amount").value = (qty*rate).toFixed(2);
sum +=	qty*rate;
$('#subtotal').html(sum.toFixed(2));
$('#tsub').val(sum.toFixed(2));
$('#total').html((sum - disc).toFixed(2));
$('#grandtotal').val((sum - disc).toFixed(2));
}

//$(document).ready(function(){
var i=1;
	document.getElementById("newrow").onclick = function() {	
	i++;
	//alert('test');
	$('#tabellist tbody tr:last').after('<tr id="row'+i+'"><td><textarea id="editorx'+i+'" name="ket[]"></textarea></td><td valign="top"><input type="number" id="qty'+i+'" name="qty[]" step="0.01" value="0.00" class="qtyrate'+i+'" /></td><td valign="top"><input type="number" id="rate'+i+'" name="rate[]" step="0.01" class="hitung" /><select id="uom'+i+'" name="uom[]"><?php foreach($data['rate'] as $rate){foreach($rate as $ratex => $valrate){?><option value="<?php echo $ratex?>"><?php echo $valrate?></option><?php }}?></select></td><td valign="top"><div class="amount"><span id="matauang'+i+'" class="matauang">'+$('#currency').val()+'</span><input type="number" id="amount'+i+'" name="amount[]" step="0.01" style="text-align:right; padding-left:35px; width:55px;" readonly="true" class="amountrate'+i+'" /></div></td></tr>');
 		
	
//	$('.hitung').keyup(function(){	
//	var ii ;
//	var qtyx;
//	var ratex;
//	for (ii = 0; ii <= i; ii++) {	
//		qtyx = document.getElementById("qty"+i).value;
//		ratex = document.getElementById("rate"+i).value;
//		document.getElementById("amount"+i).value = +qtyx * +ratex;	
//	}	
//	});	
			
			ClassicEditor
            .create( document.querySelector( '#editorx'+i ) )
            .catch( error => {
                console.error( error );
            } );	
	
	}
	
	$(document).on('change', '.hitung', function(){
		var rate = $(this).attr("id");
		var qty = $('.qty'+rate+'').attr("id");
		$('.amount'+rate+'').val(($('#'+qty+'').val() * $('#'+rate+'').val()).toFixed(2));
		sum += $('#'+qty+'').val() * $('#'+rate+'').val();
		
		$('#subtotal').html(sum.toFixed(2));
		$('#tsub').val(sum.toFixed(2));
		$('#total').html((sum - disc).toFixed(2));
		$('#grandtotal').val((sum - disc).toFixed(2));
	});		
	$('#tsub').val(sum.toFixed(2));
	
	
	$('#discountvalue').change(function(){
		disc = (sum * $('#discountvalue').val())/100;
		$('#totaldiscount').html(disc.toFixed(2));
		$('#tdisc').val(disc.toFixed(2));
		$('#total').html((sum - disc).toFixed(2));
		$('#grandtotal').val((sum - disc).toFixed(2));
	});
	
//});

var today = new Date().toISOString().split('T')[0];
document.getElementsByName("dateinvoice")[0].setAttribute('min', today);	
</script>
<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
</script>
	