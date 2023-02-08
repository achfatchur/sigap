<?php
namespace PHPMaker2020\sigap;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$test_pdf = new test_pdf();

// Run the page
$test_pdf->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<?php
$nip = CurrentUserInfo("nip");
$jabatan = CurrentUserInfo("jabatan");
$type = CurrentUserInfo("type");
$jenjang = CurrentUserInfo("jenjang");
$nama_lengkap = ExecuteRow("select * from pegawai where nip='".$nip."'");
$jabatan_v = ExecuteScalar("SELECT nama_jabatan FROM jabatan WHERE id = '".$jabatan."'");
$jenjang_v = ExecuteScalar("SELECT name FROM tpendidikan WHERE nourut = '".$jenjang."'");


if ($jenjang == 1){
	if($type == 1){
		$gaji = ExecuteRow ("select from gaji_tk Where pegawai ='".$nip."'");
	}elseif($type == 2){
		$gaji = ExecuteRow ("select from gaji_tu_tk Where pegawai ='".$nip."'");
	}else(
	$gaji = ExecuteRow ("select from gaji_karyawan_tk Where pegawai ='".$nip."'");
	)	

}elseif($jenjang == 2){
	if($type == 1){
		$gaji = ExecuteRow ("select from gaji Where pegawai ='".$nip."'");
	}elseif($type == 2){
		$gaji = ExecuteRow ("select from gaji_tu_sd Where pegawai ='".$nip."'");
	}else(
		$gaji = ExecuteRow ("select from gaji_karyawan_sd Where pegawai ='".$nip."'");
	)
}elseif($jenjang == 3){		
	if($type == 1){
		$gaji = ExecuteRow ("select from gaji_smp Where pegawai ='".$nip."'");
	}elseif($type == 2){
		$gaji = ExecuteRow ("select from gaji_tu_smp Where pegawai ='".$nip."'");
	}else(
		$gaji = ExecuteRow ("select from gaji_karyawan_smp Where pegawai ='".$nip."'");
	)
}elseif($jenjang == 4){	
	if($type == 1){
		$gaji = ExecuteRow ("select from gaji_sma Where pegawai ='".$nip."'");
	}elseif($type == 2){
		$gaji = ExecuteRow ("select from gaji_tu_sma Where pegawai ='".$nip."'");
	}else(
		$gaji = ExecuteRow ("select from gaji_karyawan_sma Where pegawai ='".$nip."'");
	)	
}else{
	if($type == 1){
		$gaji = ExecuteRow ("select from gaji_smk Where pegawai ='".$nip."'");
	}elseif($type == 2){
		$gaji = ExecuteRow ("select from gaji_tu_smk Where pegawai ='".$nip."'");
	}else(
		$gaji = ExecuteRow ("select from gaji_karyawan_smk Where pegawai ='".$nip."'");
	)	
}

?>
<html>
	<style>
		{
		font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
		margin: 0;
		}
		table{    
		width: 100%;    
		}
		.borderTable{
		border-collapse: collapse;
		}
		body{    
		padding: 10px;
		}
		@media screen {
		
		}
	hr.rounded {
  border-top: 10px solid #0000;
  border-radius: 5px;
}
  </style>
  <table>
	<tr>    
	  <td style="text-align: right;">
		<img style="width: 140px;" src="download.jpeg">
	  </td>
	  <td style="text-align: center;">
		  <h4 class="text-end" style="font-size: 25px;">SLIP HR GURU - TU - KARYAWAN & KEAMANAN</h4>
		  <p class="text-end" style="font-size: 20px;">
			TP. WACHID HASYIM PUSAT SURABAYA 
			<br>
			Jl. Sidotopo Wetan Baru No.37, Surabaya, Jawa Timur. 0812-3177-7223
		  </p>
	  </td>    
	</tr> 
  </table>
<hr class="rounded">
  <table style="margin-top: 10px;" cellspacing="0" border="1" class="borderTable">
	<tr>
	  <td colspan="2" style="padding: 10px;">
		<table style="margin: 10px; margin-top: 5px;">
			<b style="font-size: 20px;"><u>Data Penerima</u></b>   
			<p style="font-size: 15px;">

			<br>BULAN : JULI 2022
			<br>NIP : <? '.$nama_lengkap['nip'].';?>
			<br>NAMA : <? '".$nama_lengkap["nama"]."';?>
			<br>JABATAN :  <? '".$jabatan_v."';?>
			<br>UNIT : <? '".$jabatan_v."';?>
			<br>STATUS :
		</table>
	</p>
	  </td>
	</tr> 
	<tr>
	  <td style="width: 50%;max-width: 50%;min-width: 50%;padding: 10px;">
		<b style="font-size: 20px;"><u>PENGHASILAN</u></b>
		<br>
		<p style="font-size: 15px;">
		<br> Jabatan = RP
		<br> Gaji Pokok = RP
		<br> Kehadiran = RP
		<br> Piket = RP
		<br> INVAL/GJ 13 = RP
		<br> Ngaji = RP
		<br> Lain-Lain = RP
		<br> 
		<br> 
		<br> 
		<br>
		</p>
		<h2 style="text-align: right;padding: 15px; font-size: 20px;">Total Penghasilan <u>Rp.100000</u></h2>
	  </td>
	  <td style="width: 50%;max-width: 50%;min-width: 50%;padding: 10px;">
		<b style="font-size: 20px;"><u>POTONGAN</u></b>
		<br>
		<p style="font-size: 15px;">
		<br> Sumbangan Sosial = RP 
		<br> Sumbangan Masjid = RP
		<br> Angs Kop &nbsp; ke =
		<br> Kesej. Guru TP =
		<br> Iuran Wajib KOP =
		<br> Kantin = RP
		<br> TOKO = RP
		<br> UKMS = 
		<br> Pinjaman = RP
		<br> Lain-Lain =
		</p>
		<h2 style="text-align: right;padding: 10px; font-size: 20px;">Total Potongan <u>Rp.100000</u></h2>
	  </td>
	</tr> 
	<tr>
	  <td colspan="2" style="padding: 10px;">
		<b style="text-align: center;padding: 10px; font-size: 20px;">    
		Penerimaan Bersih = <u>Rp. 1000000</u>
	</b>            
	  </td>
	</tr> 
  </table>
  <p style="margin: 20px;margin-top: 30px;text-align: center;font-size: 20px;">
	<b>
	Surabaya, Bendahara
	  <br>
	  <img style="width: 120px;" src="ttd_contoh.png">
	  <br>
	<u>H.M.KHUDARTONO</u>
	</b>    
</p>
</html>
<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$test_pdf->terminate();
?>