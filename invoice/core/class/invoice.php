<?php 
class invoice{
	private $db;
	public function __construct($database)
	{   $this->db = $database; }	

	function tampil_data1(){
		$data = @mssql_query("select * from currency");
		while($d = @mssql_fetch_assoc($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}
	function tampil_data2(){
		$data = @mssql_query("select * from language");
		while($d = @mssql_fetch_assoc($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}
	function tampil_data3(){
		$data = @mssql_query("select * from rate");
		while($d = @mssql_fetch_assoc($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}
	function tampil_data4(){
		$data = @mssql_query("select name,fullname from profile");
		while($d = @mssql_fetch_assoc($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}
	function tampil_data5(){
		$data = @mssql_query("select name,logo from profile");
		while($d = @mssql_fetch_assoc($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}
	function tampil_data6(){
		$data = @mssql_query("select name,alamat from profile");
		while($d = @mssql_fetch_assoc($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}	
	function tampil_data7(){
		$data = @mssql_query("select name,alamat2 from profile");
		while($d = @mssql_fetch_assoc($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}
	function tampil_data8(){
		$data = @mssql_query("select top 1 inv_no from inv order by inv_no desc");
		$d = @mssql_fetch_assoc($data);
		return $d;
	}
	function tampil_data9(){
		$data = @mssql_query("select inv_no from inv order by inv_no desc");
		$d = @mssql_num_rows($data);
		return $d;
	}			
	function tampil_data10(){
		$data = @mssql_query("select * from po");
		while($d = @mssql_fetch_assoc($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}
	function tampil_data11($a,$b,$c,$d,$e,$f,$g,$h){
		$data = @mssql_query("insert into inv (inv_no,inv_date,inv_due,toinv,po,subtotal,disc,total) values ('$a','$b','$c','$d','$e','$f','$g','$h')");
	}

		
}
?>