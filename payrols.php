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
$payrols = new payrols();

// Run the page
$payrols->run();

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
		$jenjang = $_GET['jenjang'];
	}else{
		$tahun = date('Y');
		$bulan = date('m');
		$jenjang = '1';
	}

	if (isset($_POST['update_potongan'])) {
		$id_edit = $_POST['id_edit'];
		$tabel = $_POST['tabel'];
		$tahun = $_POST['tahun'];
		$bulan = $_POST['bulan'];
		$jenjang = $_POST['jenjang'];

		if ($jenjang == 'TK') { 
			$jenjang = '1';
		} elseif ($jenjang == 'SD') { 
			$jenjang = '2';
		} elseif ($jenjang == 'SMP') { 
			$jenjang = '3';
		} elseif ($jenjang == 'SMA') { 
			$jenjang = '4';
		} elseif ($jenjang == 'SMK') { 
			$jenjang = '5';
		}
		
		$potongan_bendahara = $_POST['potongan_bendahara'];
        $querypotong=ExecuteRow("select * from ".$tabel." WHERE id='$id_edit'");
        $calculasi = $querypotong['total']-$potongan_bendahara;
		$myquery = "UPDATE ".$tabel." SET potongan_bendahara='$potongan_bendahara',total='$calculasi' WHERE id='$id_edit'";
		$myResult = Execute($myquery);
		header("location:payrols.php?tahun=".$tahun."&bulan=".$bulan."&jenjang=".$jenjang."&submit=Cari");
	}

	if (isset($_GET['update_status'])) {
		$tahun_s = $_GET['tahun_s'];
		$bulan_s = $_GET['bulan_s'];
		$jenjang_s = $_GET['jenjang_s'];

		if ($jenjang_s == '1') { 
			$tabel = 'gaji_tk';
			$tabel1 = 'gaji_tu_tk';
			$tabel2 = 'gaji_pegawai_tk';
		} elseif ($jenjang_s == '2') { 
			$tabel = 'gaji';
			$tabel1 = 'gaji_tu_sd';
			$tabel2 = 'gaji_pegawai_sd';
		} elseif ($jenjang_s == '3') { 
			$tabel = 'gaji_smp';
			$tabel1 = 'gaji_tu_smp';
			$tabel2 = 'gaji_pegawai_smp';
		} elseif ($jenjang_s == '4') { 
			$tabel = 'gaji_sma';
			$tabel1 = 'gaji_tu_sma';
			$tabel2 = 'gaji_pegawai_sma';
		} elseif ($jenjang_s == '5') { 
			$tabel = 'gaji_smk';
			$tabel1 = 'gaji_tu_smk';
			$tabel2 = 'gaji_pegawai_smk';
		}

		$tabel = Execute("UPDATE ".$tabel." SET status='1' WHERE bulan='$bulan_s' AND tahun='$tahun_s'");
		$tabel1 = Execute("UPDATE ".$tabel1." SET status='1' WHERE bulan='$bulan_s' AND tahun='$tahun_s'");
		$tabel2 = Execute("UPDATE ".$tabel2." SET status='1' WHERE bulan='$bulan_s' AND tahun='$tahun_s'");
		header("location:payrols.php?tahun=".$tahun_s."&bulan=".$bulan_s."&jenjang=".$jenjang_s."&submit=Cari");
		if ($tabel && $tabel2 && $tabel2) { 
		}
		else{
			echo "ERROR, Proses data gagal";
			die;
		}
	}

	if (isset($_POST['update_status_belum_selesai'])) {
		$tahun_s = $_POST['tahun_s'];
		$bulan_s = $_POST['bulan_s'];
		$jenjang_s = $_POST['jenjang_s'];

		if ($jenjang_s == '1') { 
			$tabel = 'gaji_tk';
			$tabel1 = 'gaji_tu_tk';
			$tabel2 = 'gaji_pegawai_tk';
		} elseif ($jenjang_s == '2') { 
			$tabel = 'gaji';
			$tabel1 = 'gaji_tu_sd';
			$tabel2 = 'gaji_pegawai_sd';
		} elseif ($jenjang_s == '3') { 
			$tabel = 'gaji_smp';
			$tabel1 = 'gaji_tu_smp';
			$tabel2 = 'gaji_pegawai_smp';
		} elseif ($jenjang_s == '4') { 
			$tabel = 'gaji_sma';
			$tabel1 = 'gaji_tu_sma';
			$tabel2 = 'gaji_pegawai_sma';
		} elseif ($jenjang_s == '5') { 
			$tabel = 'gaji_smk';
			$tabel1 = 'gaji_tu_smk';
			$tabel2 = 'gaji_pegawai_smk';
		}

		$tabel = Execute("UPDATE ".$tabel." SET status='0' WHERE bulan='$bulan_s' AND tahun='$tahun_s'");
		$tabel1 = Execute("UPDATE ".$tabel1." SET status='0' WHERE bulan='$bulan_s' AND tahun='$tahun_s'");
		$tabel2 = Execute("UPDATE ".$tabel2." SET status='0' WHERE bulan='$bulan_s' AND tahun='$tahun_s'");
		header("location:payrols.php?tahun=".$tahun_s."&bulan=".$bulan_s."&jenjang=".$jenjang_s."&submit=Cari");
		if ($tabel && $tabel2 && $tabel2) { 
		}
		else{
			echo "ERROR, Proses data gagal";
			die;
		}
	}
	
	if ($jenjang == '1') { 
		$tabel = 'gaji_tk';
		$tabel1 = 'gaji_tu_tk';
		$tabel2 = 'gaji_pegawai_tk';
	} elseif ($jenjang == '2') { 
		$tabel = 'gaji';
		$tabel1 = 'gaji_tu_sd';
		$tabel2 = 'gaji_pegawai_sd';
	} elseif ($jenjang == '3') { 
		$tabel = 'gaji_smp';
		$tabel1 = 'gaji_tu_smp';
		$tabel2 = 'gaji_pegawai_smp';
	} elseif ($jenjang == '4') { 
		$tabel = 'gaji_sma';
		$tabel1 = 'gaji_tu_sma';
		$tabel2 = 'gaji_pegawai_sma';
	} elseif ($jenjang == '5') { 
		$tabel = 'gaji_smk';
		$tabel1 = 'gaji_tu_smk';
		$tabel2 = 'gaji_pegawai_smk';
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
				<label class="sr-only" for="inlineFormInputGroup">Jenjang</label>
				<select class="custom-select form-control mb-2" id="inlineFormCustomSelect" name="jenjang">
					<option value="1" <?= ($jenjang == 1) ? 'selected' : '' ?>>TK</option>
					<option value="2" <?= ($jenjang == 2) ? 'selected' : '' ?>>SD</option>
					<option value="3" <?= ($jenjang == 3) ? 'selected' : '' ?>>SMP</option>
					<option value="4" <?= ($jenjang == 4) ? 'selected' : '' ?>>SMA</option>
					<option value="5" <?= ($jenjang == 5) ? 'selected' : '' ?>>SMK</option>
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
			<div class="form-row align-items-center">
				<div class="col-auto">
		<?php if ($jenjang == '1'){?>	
			<a href="exp_guru_tk.php"class="btn btn-danger mb-2" target="_self">Export Data Guru</a>
			<a href="exp_tu_tk.php"class="btn btn-danger mb-2" target="_self">Export Data TU</a>
			<a href="exp_pegawai_tk.php"class="btn btn-danger mb-2" target="_self">Export Data pegawai</a>
		<?php } elseif ($jenjang == '2') { ?>
			<a href="exp_guru_sd.php"class="btn btn-danger mb-2" target="_self">Export Data Guru</a>
			<a href="exp_tu_sd.php"class="btn btn-danger mb-2" target="_self">Export Data TU</a>
			<a href="exp_pegawai_sd.php"class="btn btn-danger mb-2" target="_self">Export Data pegawai</a>
		<?php } elseif ($jenjang == '3') { ?>
			<a href="exp_guru_smp.php"class="btn btn-danger mb-2" target="_self">Export Data Guru</a>
			<a href="exp_tu_smp.php"class="btn btn-danger mb-2" target="_self">Export Data TU</a>
			<a href="exp_pegawai_smp.php"class="btn btn-danger mb-2" target="_self">Export Data pegawai</a>
		<?php } elseif ($jenjang == '4') { ?>
			<a href="exp_guru_sma.php"class="btn btn-danger mb-2" target="_self">Export Data Guru</a>
			<a href="exp_tu_sma.php"class="btn btn-danger mb-2" target="_self">Export Data TU</a>
			<a href="exp_karyawan_sma.php"class="btn btn-danger mb-2" target="_self">Export Data pegawai</a>
		<?php } elseif ($jenjang == '5') { ?> 
			<a href="exp_guru_smk.php"class="btn btn-danger mb-2" target="_self">Export Data Guru</a>
			<a href="exp_tu_smk.php"class="btn btn-danger mb-2" target="_self">Export Data TU</a>
			<a href="exp_pegawai_smk.php"class="btn btn-danger mb-2" target="_self">Export Data pegawai</a>
		<?php } ?>		
				</div>
				<input type="submit" class="btn btn-success mb-2" name="update_status" value="Konfirmasi Payroll">	
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
				<div class="col-auto">	
				</div>
				<input type="submit" class="btn btn-success mb-2" name="update_status" value="Konfirmasi Payroll">	
			</div>
			</div>
		</form>
	<?php } ?>
	</div>
<br>
<br><br>
	<table id="example" class="table table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>Jenjang Unit</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>No Rekening</th>
				<th>Sub Total Gaji</th>
				<th>Jumlah Potongan</th>
				<th>Total Gaji</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
				<?php
					if ($jenjang == '1') { 
						$tabel = 'gaji_tk';
						$tabel1 = 'gaji_tu_tk';
						$tabel2 = 'gaji_pegawai_tk';
						} elseif ($jenjang == '2') { 
							$tabel = 'gaji';
							$tabel1 = 'gaji_tu_sd';
							$tabel2 = 'gaji_pegawai_sd';
						} elseif ($jenjang == '3') { 
							$tabel = 'gaji_smp';
							$tabel1 = 'gaji_tu_smp';
							$tabel2 = 'gaji_pegawai_smp';
						} elseif ($jenjang == '4') { 
							$tabel = 'gaji_sma';
							$tabel1 = 'gaji_tu_sma';
							$tabel2 = 'gaji_pegawai_sma';
						} elseif ($jenjang == '5') { 
							$tabel = 'gaji_smk';
							$tabel1 = 'gaji_tu_smk';
							$tabel2 = 'gaji_pegawai_smk';
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
				<td><?=$pegawai['rekbank']?></td>
				<td>Rp. <?= number_format($data['total']+$data['potongan_bendahara'] ,0,',','.');?></td>
				<td>Rp. <?= number_format($data['potongan_bendahara'],0,',','.');?></td>
				<td>Rp. <?= number_format($data['total'],0,',','.');?></td>
				<td>
					<?php if($data['status'] == '1'){ ?>
						<p style="text-shadow: 1px 1px 2px red, 0 0 1em blue, 0 0 0.2em blue;">Dipublikasi<p>
					<?php }else{ ?>
						<a href="" class="btn btn-info" data-toggle="modal" data-target="#modal<?php echo $data['id']; ?>">Beri Potongan</a>
					<?php } ?>
					<div class="modal fade" id="modal<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Potongan Bendahara</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<form role="form" action="<?php echo CurrentPageName() ?>" method="post">
								<?php if ($Page->CheckToken) { ?>
								<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
								<?php } ?>
										<input type="hidden" name="jenjang" value="<?=$jenjang?>">
										<input type="hidden" name="bulan" value="<?=$bulan?>">
										<input type="hidden" name="tahun" value="<?=$tahun?>">
										<input type="hidden" name="tabel" value="<?=$tabel?>">
										<input type="hidden" name="id_edit" value="<?=$data['id']?>">
										<div class="form-group">
											<label for="exampleFormControlInput1">Potongan Bendahara</label>
											<input type="number" class="form-control" value="<?php echo $data['potongan_bendahara']; ?>" name="potongan_bendahara" placeholder="Potongan">
										</div>
								</div>
								<div class="modal-footer">
									<input type="submit" name="update_potongan" value="Update" class="btn btn-primary mb-2">
								</div>
									</form>
							</div>
						</div>
					</div>
				</td>
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
				<td><?=$pegawai1['rekbank']?></td>
				<td>Rp. <?= number_format($data1['total']+$data1['potongan_bendahara'] ,0,',','.');?></td>
				<td>Rp. <?= number_format($data1['potongan_bendahara'],0,',','.');?></td>
				<td>Rp. <?= number_format($data1['total'],0,',','.');?></td>
				<td>
					<?php if($data1['status'] == '1'){ ?>
						<p style="text-shadow: 1px 1px 2px red, 0 0 1em blue, 0 0 0.2em blue;">Dipublikasi<p>
					<?php }else{ ?>
						<a href="" class="btn btn-info" data-toggle="modal" data-target="#modal<?php echo $data1['id']; ?>">Beri Potongan</a>
					<?php } ?>
					<div class="modal fade" id="modal<?php echo $data1['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Potongan Bendahara</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<form role="form" action="<?php echo CurrentPageName() ?>" method="post">
								<?php if ($Page->CheckToken) { ?>
								<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
								<?php } ?>
										<input type="hidden" name="jenjang" value="<?=$jenjang?>">
										<input type="hidden" name="bulan" value="<?=$bulan?>">
										<input type="hidden" name="tahun" value="<?=$tahun?>">
										<input type="hidden" name="tabel" value="<?=$tabel1?>">
										<input type="hidden" name="id_edit" value="<?=$data1['id']?>">
										<div class="form-group">
											<label for="exampleFormControlInput1">Potongan Bendahara</label>
											<input type="number" class="form-control" value="<?php echo $data1['potongan_bendahara']; ?>" name="potongan_bendahara" placeholder="Potongan">
										</div>
								</div>
								<div class="modal-footer">
									<input type="submit" name="update_potongan" value="Update" class="btn btn-primary mb-2">
								</div>
									</form>
							</div>
						</div>
					</div>
				</td>
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
				<td><?=$pegawai2['rekbank']?></td>
				<td>Rp. <?= number_format($data2['total']+$data2['potongan_bendahara'] ,0,',','.');?></td>
				<td>Rp. <?= number_format($data2['potongan_bendahara'],0,',','.');?></td>
				<td>Rp. <?= number_format($data2['total'],0,',','.');?></td>
				<td>
					<?php if($data2['status'] == '1'){ ?>
						<p style="text-shadow: 1px 1px 2px red, 0 0 1em blue, 0 0 0.2em blue;">Dipublikasi<p>
					<?php }else{ ?>
						<a href="" class="btn btn-info" data-toggle="modal" data-target="#modal<?php echo $data2['id']; ?>">Beri Potongan</a>
					<?php } ?>
					<div class="modal fade" id="modal<?php echo $data2['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Potongan Bendahara</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<form role="form" action="<?php echo CurrentPageName() ?>" method="post">
								<?php if ($Page->CheckToken) { ?>
								<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
								<?php } ?>
										<input type="hidden" name="jenjang" value="<?=$jenjang?>">
										<input type="hidden" name="bulan" value="<?=$bulan?>">
										<input type="hidden" name="tahun" value="<?=$tahun?>">
										<input type="hidden" name="tabel" value="<?=$tabel2?>">
										<input type="hidden" name="id_edit" value="<?=$data2['id']?>">
										<div class="form-group">
											<label for="exampleFormControlInput1">Potongan Bendahara</label>
											<input type="number" class="form-control" value="<?php echo $data2['potongan_bendahara']; ?>" name="potongan_bendahara" placeholder="Potongan">
										</div>
								</div>
								<div class="modal-footer">
									<input type="submit" name="update_potongan" value="Update" class="btn btn-primary mb-2">
								</div>
									</form>
							</div>
						</div>
					</div>
				</td>
			</tr>
				<?php	
					}
					}else{ 
					} ?>
		</tbody>
		<tfoot>
			<tr>
				<th>Jenjang Unit</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>No Rekening</th>
				<th>Sub Total Gaji</th>
				<th>Jumlah Potongan</th>
				<th>Total Gaji</th>
				<th>Aksi</th>
			</tr>
		</tfoot>
	</table>
<br><br>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
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
$payrols->terminate();
?>