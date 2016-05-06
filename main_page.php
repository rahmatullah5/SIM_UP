<?php 
	include ("_func/connection.php");
	//include ("_func/cookies.php");
	include ("_func/session.php");
	if($_GET['page']!='login'){include("_view/header_ref.php");}
	switch($_GET['page']){
		case 'landing_page':	include ("_view/landing_page.php");	break;
		case 'home':			include ("_view/home.php");			break;
		case 'det':			include ("_view/det.php");			break;
		case 'reg':			include ("_view/register.php");			break;
		case 'login':			include ("_view/login.php");			break;
		case 'keranjang':			include ("_view/keranjang.php");			break;
		case 'checkout':			include ("_view/checkout.php");			break;
		case 'checkout2':			include ("_view/checkout2.php");			break;
		case 'cek':			include ("_view/cek.php");			break;
		case 'lain':			include ("_view/lain.php");			break;
		case 'wishlist':			include ("_view/wishlist.php");	break;
		case 'pesan':			include ("_view/pesan.php");	break;
		case 'bantuan':			include ("_view/bantuan.php");break;
		case 'tentang':			include ("_view/tentang.php");break;
	}
	if($_GET['page']!='login'){include ("_view/footer.php");}
	
?>
