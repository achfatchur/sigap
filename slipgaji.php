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
$slipgaji = new slipgaji();

// Run the page
$slipgaji->run();

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
	$jenjang = CurrentUserInfo("jenjang_id");
	$status = CurrentUserInfo("status");
	$id_gaji = $_GET['id'];
	$table = $_GET['table'];
	$gaji = ExecuteRow ("SELECT * FROM ".$table." WHERE id ='".$id_gaji."'");
	$bulan = ExecuteScalar("select `bulan` from bulan where id='".$gaji["bulan"]."'");
	//$m_p = ExecuteScalar("SELECT id FROM m_penyesuaian WHERE bulan = '".$gaji['bulan']."' AND tahun = '".$gaji['tahun']."'");
	//$penyesuaian = ExecuteRow("SELECT * FROM penyesuaian WHERE nip ='".$nip."' AND m_id ='".$m_p."'");
	$nama_lengkap = ExecuteRow("select * from pegawai where nip='".$nip."'");
	$jabatan_v = ExecuteScalar("SELECT nama_jabatan FROM jabatan WHERE id = '".$jabatan."'");
	$jenjang_v = ExecuteScalar("SELECT name FROM tpendidikan WHERE nourut = '".$jenjang."'");
?>
	<html>
		<div class="d-print-none mt-4">
			<div class="text-right">
				<a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i>print</a>
			</div>
		</div>
		<head>
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<style>
			table{    
			width: 100%;    
			}

			.borderTable{
			border-collapse: collapse;
			}

			body{    
			padding: 10px;
			font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
			margin: 0;
			}

			hr.rounded {
				border-top: 8px solid #bbb;
				border-radius: 5px;
			}

			@page {
			margin-top: 0.5cm;
			margin-bottom: 0.2cm;
			margin-left: 0.3cm;
			margin-right: 0.3cm;
			}

			@media print{
			* {-webkit-print-color-adjust:exact;}
			}
		</style>
		</head>
		<body>
			<table>
				<tr>    
				<td style="text-align: right;">
					<img style="width: 100px;" src="download.png">
				</td>
				<td style="text-align: center;">
					<h4 class="text-end" style="font-size: 15px;">SLIP HR Pengurus Yayasan</h4>
					<p class="text-end" style="font-size: 12px;">
						TP. WACHID HASYIM PUSAT SURABAYA 
						<br>
						Jl. Sidotopo Wetan Baru No.37, Surabaya, Jawa Timur. 0812-3177-7223
					</p>
				</td>    
				</tr> 
			</table>
			<hr class="rounded">
			<table style="margin-top: 2px;" cellspacing="0" border="1" class="borderTable">
				<tr>
				<td colspan="2" style="padding: 10px;">
					<table style="margin: 5px; margin-top: 5px;">
						<b style="font-size: 15px;"><u>Data Penerima</u></b>   
						<p style="font-size: 12px;">

						<br>BULAN : <?=$bulan?> <?=$gaji['tahun']?>
						<br>NIP : <?=$nama_lengkap['nip']?>
						<br>NAMA : <?=$nama_lengkap['nama']?>  

					</table>
					</p>
					</td>
				</tr> 
				<tr>
				<td style="width: 50%;max-width: 50%;min-width: 50%;padding: 10px;">
					<b style="font-size: 15px;"><u>PENGHASILAN</u></b>
					<br>
					<p style="font-size: 12px;">
					<br> Gaji Pokok = RP <?=number_format($gaji['gaji_pokok'],0,',','.')?>
					<br><b>Total Penyesuaian = <?=number_format($gaji['gaji_pokok'],0,',','.')?></b>
					</p>
					<h2 style="text-align: right;padding: 15px; font-size: 20px;">Total Penghasilan <u>Rp. <?= number_format($gaji['gaji_pokok'],0,',','.');?></u></h2>
				</td>
				<td style="width: 50%;max-width: 50%;min-width: 50%;padding: 10px;">
					<b style="font-size: 15px;"><u>POTONGAN</u></b>
					<br>
					<p style="font-size: 12px;">
					<br><b>Potongan : <?=number_format($gaji['potongan'],0,',','.');?></b>
					<br><b>Total Potongan Potongan = <?=number_format($gaji['potongan'],0,',','.')?></b>

					</p>
					<h2 style="text-align: right;padding: 10px; font-size: 20px;">Total Potongan <u>Rp. <?= number_format($gaji['potongan'],0,',','.');?></u></h2>
				</td>
				</tr> 
				<tr>
					<td colspan="2" style="padding: 10px;">
						<b style="text-align: center;padding: 10px; font-size: 15px;">    
						Penerimaan Bersih = <u><?=number_format($gaji['total'],0,',','.')?></u>
						</b>            
					</td>
				</tr> 
			</table>
			<p style="margin: 20px;margin-top: 30px;text-align: center;font-size: 12px;">
				<b>
				Surabaya, Bendahara
				<br><br><br><br><br><br><br><br>
				<u>H.M.KHUDARTONO</u>
				</b>    
			</p>
		</body>
	</html>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		window.print();
		window.onafterprint = window.close;
	</script>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php
$slipgaji->terminate();
?>