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
$laporan_pajak_unit = new laporan_pajak_unit();

// Run the page
$laporan_pajak_unit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>
	input[type="radio"] {
		-ms-transform: scale(1.5); /* IE 9 */
		-webkit-transform: scale(1.5); /* Chrome, Safari, Opera */
		transform: scale(1.5);
	}

	.right {
		position: absolute;
		right: 0px;
		width: 500px;
		padding: 10px;
	}
</style>
<?php 
	if (isset($_GET['submit'])) {
		$tahun = $_GET['tahun'];
		$bulan = $_GET['bulan'];
		//$jenjang = $_GET['jenjang'];
	}else{
		$tahun = date('Y');
		$bulan = date('m');
		//$jenjang = '1';
	}


	
	if(CurrentUserLevel() == '8'){ 
		$tabel = 'gaji_tk';
		$tabel1 = 'gaji_tu_tk';
		$tabel2 = 'gaji_karyawan_tk';
		$jenjang ='1';
	} elseif (CurrentUserLevel() == '9') { 
		$tabel = 'gaji';
		$tabel1 = 'gaji_tu_sd';
		$tabel2 = 'gaji_karyawan_sd';
		$jenjang ='2';
	} elseif (CurrentUserLevel() == '10') { 
		$tabel = 'gaji_smp';
		$tabel1 = 'gaji_tu_smp';
		$tabel2 = 'gaji_karyawan_smp';
		$jenjang ='3';
	} elseif (CurrentUserLevel() == '11') { 
		$tabel = 'gaji_sma';
		$tabel1 = 'gaji_tu_sma';
		$tabel2 = 'gaji_karyawan_sma';
		$jenjang ='4';
	} elseif (CurrentUserLevel() == '12') { 
		$tabel = 'gaji_smk';
		$tabel1 = 'gaji_tu_smk';
		$tabel2 = 'gaji_karyawan_smk';
		$jenjang ='5';
	}
?>	
	<form method="get" action="">
		<div class="form-row align-items-center">
			<div class="col-auto">
			<label class="sr-only" for="inlineFormInput">Tahun</label>
			<input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Tahun" name="tahun" value="<?=$tahun?>">
			</div>
			<div class="col-auto">
			<label class="sr-only" for="inlineFormInputGroup">Bulan</label>
			<select class="custom-select form-control mb-2" id="inlineFormCustomSelect" name="bulan">
				<option value="1" <?= ($bulan == 1) ? 'selected' : '' ?>>Januari</option>
				<option value="2" <?= ($bulan == 2) ? 'selected' : '' ?>>Februari</option>
				<option value="3" <?= ($bulan == 3) ? 'selected' : '' ?>>Maret</option>
				<option value="4" <?= ($bulan == 4) ? 'selected' : '' ?>>April</option>
				<option value="5" <?= ($bulan == 5) ? 'selected' : '' ?>>Mei</option>
				<option value="6" <?= ($bulan == 6) ? 'selected' : '' ?>>Juni</option>
				<option value="7" <?= ($bulan == 7) ? 'selected' : '' ?>>Juli</option>
				<option value="8" <?= ($bulan == 8) ? 'selected' : '' ?>>Agustus</option>
				<option value="9" <?= ($bulan == 9) ? 'selected' : '' ?>>September</option>
				<option value="10" <?= ($bulan == 10) ? 'selected' : '' ?>>Oktober</option>
				<option value="11" <?= ($bulan == 11) ? 'selected' : '' ?>>November</option>
				<option value="12" <?= ($bulan == 12) ? 'selected' : '' ?>>Desember</option>
			</select>
			</div>
			<div class="col-auto">
			<input type="submit" class="btn btn-primary mb-2" name="submit" value="Cari">
			<button class="btn btn-primary mb-2" onclick="location.reload();">Refresh</button>
			</div>
	</form>
	<?php
		$total_status = ExecuteScalar("SELECT count(*) FROM ".$tabel." WHERE bulan = '".$bulan."' AND tahun = '".$tahun."' AND status = '0'");
		$total_isi = ExecuteScalar("SELECT count(*) FROM ".$tabel." WHERE bulan = '".$bulan."' AND tahun = '".$tahun."'");
		$total_status1 = ExecuteScalar("SELECT count(*) FROM ".$tabel1." WHERE bulan = '".$bulan."' AND tahun = '".$tahun."' AND status = '0'");
		$total_isi1 = ExecuteScalar("SELECT count(*) FROM ".$tabel1." WHERE bulan = '".$bulan."' AND tahun = '".$tahun."'");
		$total_status2 = ExecuteScalar("SELECT count(*) FROM ".$tabel2." WHERE bulan = '".$bulan."' AND tahun = '".$tahun."' AND status = '0'");
		$total_isi2 = ExecuteScalar("SELECT count(*) FROM ".$tabel2." WHERE bulan = '".$bulan."' AND tahun = '".$tahun."'");
	if($total_status == $total_isi && $total_status1 == $total_isi1 && $total_status2 == $total_isi2){ ?>
		<form method="get" action="">
			<input type="hidden" name="tahun_s" value="<?=$tahun?>">
			<input type="hidden" name="bulan_s" value="<?=$bulan?>">
			<input type="hidden" name="jenjang_s" value="<?=$jenjang?>">
<?php // bisa dijadikan kondisi untuk button export?>
			</div>
		</form>
	<?php }else{ ?>
		<form role="form" action="<?php echo CurrentPageName() ?>" method="post">
		<?php if ($Page->CheckToken) { ?>
		<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
		<?php } ?>
			<input type="hidden" name="tahun_s" value="<?=$tahun?>">
			<input type="hidden" name="bulan_s" value="<?=$bulan?>">
			<input type="hidden" name="jenjang_s" value="<?=$jenjang?>">
			<div class="form-row align-items-center">	
			</div>
		</form>
	<?php } ?>
	</div>
<br>
<br><br>
	<table id="example" class="table table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>Unit</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>Iuran Hari Tua</th>
				<th>Jaminan Pensiun</th>
				<th>PPH21</th>
			</tr>
		</thead>
		<tbody>
				<?php
					if ($jenjang == '1') { 
						$tabel = 'gaji_tk';
						$tabel1 = 'gaji_tu_tk';
						$tabel2 = 'gaji_karyawan_tk';
						} elseif ($jenjang == '2') { 
							$tabel = 'gaji';
							$tabel1 = 'gaji_tu_sd';
							$tabel2 = 'gaji_karyawan_sd';
						} elseif ($jenjang == '3') { 
							$tabel = 'gaji_smp';
							$tabel1 = 'gaji_tu_smp';
							$tabel2 = 'gaji_karyawan_smp';
						} elseif ($jenjang == '4') { 
							$tabel = 'gaji_sma';
							$tabel1 = 'gaji_tu_sma';
							$tabel2 = 'gaji_karyawan_sma';
						} elseif ($jenjang == '5') { 
							$tabel = 'gaji_smk';
							$tabel1 = 'gaji_tu_smk';
							$tabel2 = 'gaji_karyawan_smk';
					}
					$jenjang = ExecuteScalar("SELECT name FROM tpendidikan WHERE nourut = '".$jenjang."'");
					if(ExecuteRows("SELECT * FROM ".$tabel." WHERE bulan = '".$bulan."' AND tahun = '".$tahun."'") != false){
						$rows = ExecuteRows("SELECT * FROM ".$tabel." WHERE bulan = '".$bulan."' AND tahun = '".$tahun."'");
						foreach($rows as $data){
						$pegawai = ExecuteRow("SELECT * FROM pegawai WHERE nip = '".$data['pegawai']."'");
						$jabatan = ExecuteRow("SELECT * FROM jenis_jabatan WHERE id = '".$pegawai['type']."'");
				?>
			<tr>
				<td><?=$jenjang?></td>
				<td><?=$pegawai['nip']?></td>
				<td><?=$pegawai['nama']?> - <?=$jabatan['name']?></td>
				<td>Rp. <?= number_format($data['jaminan_hari_tua'],0,',','.');?></td>
				<td>Rp. <?= number_format($data['jaminan_pensiun'],0,',','.');?></td>
				<td>Rp. <?= number_format($data['total_pph21'],0,',','.');?></td>
			</tr>
				<?php
					} 
					}else{ 
					}
					if(ExecuteRows("SELECT * FROM ".$tabel1." WHERE bulan = '".$bulan."' AND tahun = '".$tahun."'") != false){
					$rows1 = ExecuteRows("SELECT * FROM ".$tabel1." WHERE bulan = '".$bulan."' AND tahun = '".$tahun."'");
					foreach($rows1 as $data1){
					$pegawai1 = ExecuteRow("SELECT * FROM pegawai WHERE nip = '".$data1['pegawai']."'");
					$jabatan1 = ExecuteRow("SELECT * FROM jenis_jabatan WHERE id = '".$pegawai1['type']."'");
					?>
			<tr>
				<td><?=$jenjang?></td>
				<td><?=$pegawai1['nip']?></td>
				<td><?=$pegawai1['nama']?> - <?=$jabatan1['name']?></td>
				<td>Rp. <?= number_format($data1['jaminan_hari_tua'],0,',','.');?></td>
				<td>Rp. <?= number_format($data1['jaminan_pensiun'],0,',','.');?></td>
				<td>Rp. <?= number_format($data1['total_pph21'],0,',','.');?></td>
			</tr>
				<?php	
					}
					}else{ 
					}
					if(ExecuteRows("SELECT * FROM ".$tabel2." WHERE bulan = '".$bulan."' AND tahun = '".$tahun."'") != false){
					$rows2 = ExecuteRows("SELECT * FROM ".$tabel2." WHERE bulan = '".$bulan."' AND tahun = '".$tahun."'");
					foreach($rows2 as $data2){
					$pegawai2 = ExecuteRow("SELECT * FROM pegawai WHERE nip = '".$data2['pegawai']."'");
					$jabatan2 = ExecuteRow("SELECT * FROM jenis_jabatan WHERE id = '".$pegawai2['type']."'");
					?>
			<tr>
				<td><?=$jenjang?></td>
				<td><?=$pegawai2['nip']?></td>
				<td><?=$pegawai2['nama']?> - <?=$jabatan2['name']?></td>
				<td>Rp. <?= number_format($data2['jaminan_hari_tua'],0,',','.');?></td>
				<td>Rp. <?= number_format($data2['jaminan_pensiun'],0,',','.');?></td>
				<td>Rp. <?= number_format($data2['total_pph21'],0,',','.');?></td>
			</tr>
				<?php	
					}
					}else{ 
					} ?>
		</tbody>
		<tfoot>
			<tr>
				<th>Unit</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>Iuran Hari Tua</th>
				<th>Jaminan Pensiun</th>
				<th>PPH21</th>
			</tr>
		</tfoot>
	</table>
<br><br>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script> 
<script>
$(document).ready(function () {
	$('#example').DataTable();
});
</script>


<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$laporan_pajak_unit->terminate();
?>