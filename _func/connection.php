<?php
	$hostname = "localhost";
	$database = "db_sim_up";
	$username = "root";
	$password = "";

	//$conn = mysqli_connect($hostname,$username,$password,$database);
mysql_connect("localhost","root","");
mysql_select_db("db_sim_up");
	//cek konesi
	if(mysqli_connect_errno()){
		//echo "Error" . mysqli_connect_error();
	}
	else{
		//echo "string";
	}
	function anti($data){
		$filter=mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		return $filter;
	}
	function ttl($timestamp) {
		$waktu = strtotime($timestamp);
		$tanggal = date("j",$waktu);
		switch(date("n",$waktu)) {
			case 1: $bulan = "Januari"; break;
			case 2: $bulan = "Februari"; break;
			case 3: $bulan = "Maret"; break;
			case 4: $bulan = "April"; break;
			case 5: $bulan = "Mei"; break;
			case 6: $bulan = "Juni"; break;
			case 7: $bulan = "Juli"; break;
			case 8: $bulan = "Agustus"; break;
			case 9: $bulan = "September"; break;
			case 10: $bulan = "Oktober"; break;
			case 11: $bulan = "November"; break;
			case 12: $bulan = "Desember"; break;
		}
		$tahun = date("Y",$waktu);
		return "$tanggal $bulan $tahun";
	}
?>

