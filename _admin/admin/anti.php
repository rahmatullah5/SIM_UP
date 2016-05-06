<?php 
	function anti_inject($data){
		$filter=mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		return $filter;
	}
	
	function ttl($timestamp) {
		$waktu = strtotime($timestamp);
		$tanggal = date("j",$waktu);
		switch (date("w",$waktu)) {
			case 0: $hari = "Minggu"; break;
			case 1: $hari = "Senin"; break;
			case 2: $hari = "Selasa"; break;
			case 3: $hari = "Rabu"; break;
			case 4: $hari = "Kamis"; break;
			case 5: $hari = "Jumat"; break;
			case 6: $hari = "Sabtu"; break;

		}
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
		return "$hari, $tanggal $bulan $tahun";
	}

?>