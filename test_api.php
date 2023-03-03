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
$test_api = new test_api();

// Run the page
$test_api->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<?php
// DEPARTMENT
	// TK
	$api_department_tk = curl_init(); 
	// set url 
	curl_setopt($api_department_tk, CURLOPT_URL, "36.93.52.108/siakad_demo/tk/api/department");
	//return the transfer as a string 
	curl_setopt($api_department_tk, CURLOPT_RETURNTRANSFER, 1); 
	$output_tk = curl_exec($api_department_tk); 
	$department_tk =json_decode($output_tk);
	
	foreach($department_tk as $data){
		$sql = ExecuteRow("SELECT * FROM jabatan WHERE nama_jabatan= '".$data->name."'");
		
		if (empty($sql)) {
			$sql_tk = "INSERT INTO jabatan VALUES (NULL, '".$data->name."', '".$data->name."', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL)";
			if (Execute($sql_tk)) {
			} else {
				return false;
			}
		} else {
		}
	}
	// TK END

	// sd
	$api_department_sd = curl_init(); 
	// set url 
	curl_setopt($api_department_sd, CURLOPT_URL, "36.93.52.108/siakad_demo/sd/api/department");
	//return the transfer as a string 
	curl_setopt($api_department_sd, CURLOPT_RETURNTRANSFER, 1); 
	$output_sd = curl_exec($api_department_sd); 
	$department_sd =json_decode($output_sd);
	
	foreach($department_sd as $data){
		$sql = ExecuteRow("SELECT * FROM jabatan WHERE nama_jabatan= '".$data->name."'");
		
		if (empty($sql)) {
			$sql_sd = "INSERT INTO jabatan VALUES (NULL, '".$data->name."', '".$data->name."', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL)";
			if (Execute($sql_sd)) {
			} else {
				return false;
			}
		} else {
		}
	}
	// SD END

	// SMP
	$api_department_smp = curl_init(); 
	// set url 
	curl_setopt($api_department_smp, CURLOPT_URL, "36.93.52.108/siakad_demo/smp/api/department");
	//return the transfer as a string 
	curl_setopt($api_department_smp, CURLOPT_RETURNTRANSFER, 1); 
	$output_smp = curl_exec($api_department_smp); 
	$department_smp =json_decode($output_smp);
	
	foreach($department_smp as $data){
		$sql = ExecuteRow("SELECT * FROM jabatan WHERE nama_jabatan= '".$data->name."'");
		
		if (empty($sql)) {
			$sql_smp = "INSERT INTO jabatan VALUES (NULL, '".$data->name."', '".$data->name."', NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL)";
			if (Execute($sql_smp)) {
			} else {
				return false;
			}
		}else{
		}
	}
	// SMP END

	// SMA
	$api_department_sma = curl_init(); 
	// set url 
	curl_setopt($api_department_sma, CURLOPT_URL, "36.93.52.108/siakad_demo/sma/api/department");
	//return the transfer as a string 
	curl_setopt($api_department_sma, CURLOPT_RETURNTRANSFER, 1); 
	$output_sma = curl_exec($api_department_sma); 
	$department_sma =json_decode($output_sma);
	
	foreach($department_sma as $data){
		$sql = ExecuteRow("SELECT * FROM jabatan WHERE nama_jabatan= '".$data->name."'");
		
		if (empty($sql)) {
			$sql_sma = "INSERT INTO jabatan VALUES (NULL, '".$data->name."', '".$data->name."', NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL)";
			if (Execute($sql_sma)) {
			} else {
				return false;
			}
		}else{
		}
	}
	// SMA END

	// SMK
	$api_department_smk = curl_init(); 
	// set url 
	curl_setopt($api_department_smk, CURLOPT_URL, "36.93.52.108/siakad_demo/smk/api/department");
	//return the transfer as a string 
	curl_setopt($api_department_smk, CURLOPT_RETURNTRANSFER, 1); 
	$output_smk = curl_exec($api_department_smk); 
	$department_smk =json_decode($output_smk);
	
	foreach($department_smk as $data){
		$sql = ExecuteRow("SELECT * FROM jabatan WHERE nama_jabatan= '".$data->name."'");
		
		if (empty($sql)) {
			$sql_smk = "INSERT INTO jabatan VALUES (NULL, '".$data->name."', '".$data->name."', NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL)";
			if (Execute($sql_smk)) {
			} else {
				return false;
			}
		}else{
		}
	}
	// SMK END
// ENDDEPARTMENT
// EMPLOYEE
	// TK
	$api_employee_tk = curl_init(); 
	// set url 
	curl_setopt($api_employee_tk, CURLOPT_URL, "36.93.52.108/siakad_demo/tk/api/employee");
	//return the transfer as a string 
	curl_setopt($api_employee_tk, CURLOPT_RETURNTRANSFER, 1); 
	$output_tk = curl_exec($api_employee_tk); 
	$employee_tk =json_decode($output_tk);
	
	foreach($employee_tk as $data){
		$sql = ExecuteRow("SELECT * FROM pegawai WHERE jenjang_id = '1' AND nip= '".$data->nip."'");
		$status_peg = ExecuteScalar("SELECT id FROM status_kepeg WHERE name = '%".$data->status_pegawai."%'");
		if(empty($status_peg)){
			$status_peg = 'NULL';
		}else{
		}
		if($data->sertifikasi == 'Sertifikasi'){
			$sertifikasi = 1;
		}elseif($data->sertifikasi == 'Non_sertifikasi'){
			$sertifikasi = 2;
		}else{
			$sertifikasi = 'NULL';
		}
		if(empty($data->jenis_ptk)){
			$jenis_ptk = 'NULL';
		}else{
			$jenis_ptk = ExecuteScalar("SELECT id FROM jabatan WHERE nama_jabatan LIKE '%".$data->jenis_ptk."%'");
		}
		$jabatan = ExecuteScalar("SELECT id FROM jenis_jabatan WHERE name LIKE '%".$data->jabatan."%'");
		if(empty($jabatan)){
			$jabatan = 'NULL';
		}else{
		}
		$tgl_lahir = date('Y-m-d', strtotime($data->birthday));

		if (empty($sql)) {
			$sql_tk = "INSERT INTO pegawai VALUES (NULL, NULL, '".$data->nama."', '".$data->address."', '".$data->email."', '".$data->phone."', '".$data->phone."', '".$tgl_lahir."', '".$data->nip."', '".$data->no_rek."', NULL, NULL, '".$data->religion."', '".$data->gender."', ".$status_peg.", NULL, NULL, ".$jenis_ptk.", '".$data->mulai_kerja."', NULL, '".$data->email."', 123456, 1, 1, 1, ".$jabatan.", ".$sertifikasi.", NULL, NULL, NULL, ".$status_peg.", NULL, NULL, NULL, NULL, NULL)";
			if (Execute($sql_tk)) {
			} else {
				return false;
			}
		}else{
			$sql_tk = "UPDATE pegawai SET nama = '".$data->nama."', alamat = '".$data->address."', email = '".$data->email."', wa = '".$data->phone."', hp = '".$data->phone."', tgllahir = '".$tgl_lahir."', rekbank = '".$data->no_rek."', jenkel = '".$data->gender."', status_peg = ".$status_peg.", mulai_bekerja = ".$data->mulai_kerja.", jabatan = ".$jenis_ptk.", type = ".$jabatan.", sertif = ".$sertifikasi.", level = '1' WHERE jenjang_id = '1' OR nip= '".$data->nip."'";
			if (Execute($sql_tk)) {
			} else {
				return false;
			}
		}
	}
	// TK END

	// SD
	$api_employee_sd = curl_init(); 
	// set url 
	curl_setopt($api_employee_sd, CURLOPT_URL, "36.93.52.108/siakad_demo/sd/api/employee");
	//return the transfer as a string 
	curl_setopt($api_employee_sd, CURLOPT_RETURNTRANSFER, 1); 
	$output_sd = curl_exec($api_employee_sd); 
	$employee_sd =json_decode($output_sd);
	
	foreach($employee_sd as $data){
		$sql = ExecuteRow("SELECT * FROM pegawai WHERE jenjang_id = '2' AND nip= '".$data->nip."'");
		$status_peg = ExecuteScalar("SELECT id FROM status_kepeg WHERE name = '%".$data->status_pegawai."%'");
		if(empty($status_peg)){
			$status_peg = 'NULL';
		}else{
		}
		if($data->sertifikasi == 'Sertifikasi'){
			$sertifikasi = 1;
		}elseif($data->sertifikasi == 'Non_sertifikasi'){
			$sertifikasi = 2;
		}else{
			$sertifikasi = 'NULL';
		}
		if(empty($data->jenis_ptk)){
			$jenis_ptk = 'NULL';
		}else{
			$jenis_ptk = ExecuteScalar("SELECT id FROM jabatan WHERE nama_jabatan LIKE '%".$data->jenis_ptk."%'");
		}
		$jabatan = ExecuteScalar("SELECT id FROM jenis_jabatan WHERE name LIKE '%".$data->jabatan."%'");
		if(empty($jabatan)){
			$jabatan = 'NULL';
		}else{
		}
		$tgl_lahir = date('Y-m-d', strtotime($data->birthday));

		if (empty($sql)) {
			$sql_sd = "INSERT INTO pegawai VALUES (NULL, NULL, '".$data->nama."', '".$data->address."', '".$data->email."', '".$data->phone."', '".$data->phone."', '".$tgl_lahir."', '".$data->nip."', '".$data->no_rek."', NULL, NULL, '".$data->religion."', '".$data->gender."', ".$status_peg.", NULL, NULL, ".$jenis_ptk.", '".$data->mulai_kerja."', NULL, '".$data->email."', 123456, 1, 1, 2, ".$jabatan.", ".$sertifikasi.", NULL, NULL, NULL, ".$status_peg.", NULL, NULL, NULL, NULL, NULL)";
			if (Execute($sql_sd)) {
			} else {
				return false;
			}
		}else{
			$sql_sd = "UPDATE pegawai SET nama = '".$data->nama."', alamat = '".$data->address."', email = '".$data->email."', wa = '".$data->phone."', hp = '".$data->phone."', tgllahir = '".$tgl_lahir."', rekbank = '".$data->no_rek."', jenkel = '".$data->gender."', status_peg = ".$status_peg.", mulai_bekerja = ".$data->mulai_kerja.", jabatan = ".$jenis_ptk.", type = ".$jabatan.", sertif = ".$sertifikasi.", level = '1' WHERE jenjang_id = '1' OR nip= '".$data->nip."'";
			if (Execute($sql_sd)) {
			} else {
				return false;
			}
		}
	}
	// SD END

	// SMP
	$api_employee_smp = curl_init(); 
	// set url 
	curl_setopt($api_employee_smp, CURLOPT_URL, "36.93.52.108/siakad_demo/smp/api/employee");
	//return the transfer as a string 
	curl_setopt($api_employee_smp, CURLOPT_RETURNTRANSFER, 1); 
	$output_smp = curl_exec($api_employee_smp); 
	$employee_smp =json_decode($output_smp);
	
	foreach($employee_smp as $data){
		$sql = ExecuteRow("SELECT * FROM pegawai WHERE jenjang_id = '3' AND nip= '".$data->nip."'");
		$status_peg = ExecuteScalar("SELECT id FROM status_kepeg WHERE name = '%".$data->status_pegawai."%'");
		if(empty($status_peg)){
			$status_peg = 'NULL';
		}else{
		}
		if($data->sertifikasi == 'Sertifikasi'){
			$sertifikasi = 1;
		}elseif($data->sertifikasi == 'Non_sertifikasi'){
			$sertifikasi = 2;
		}else{
			$sertifikasi = 'NULL';
		}
		if(empty($data->jenis_ptk)){
			$jenis_ptk = 'NULL';
		}else{
			$jenis_ptk = ExecuteScalar("SELECT id FROM jabatan WHERE nama_jabatan LIKE '%".$data->jenis_ptk."%'");
		}
		$jabatan = ExecuteScalar("SELECT id FROM jenis_jabatan WHERE name LIKE '%".$data->jabatan."%'");
		if(empty($jabatan)){
			$jabatan = 'NULL';
		}else{
		}
		$tgl_lahir = date('Y-m-d', strtotime($data->birthday));

		if (empty($sql)) {
			$sql_smp = "INSERT INTO pegawai VALUES (NULL, NULL, '".$data->nama."', '".$data->address."', '".$data->email."', '".$data->phone."', '".$data->phone."', '".$tgl_lahir."', '".$data->nip."', '".$data->no_rek."', NULL, NULL, '".$data->religion."', '".$data->gender."', ".$status_peg.", NULL, NULL, ".$jenis_ptk.", '".$data->mulai_kerja."', NULL, '".$data->email."', 123456, 1, 1, 3, ".$jabatan.", ".$sertifikasi.", NULL, NULL, NULL, ".$status_peg.", NULL, NULL, NULL, NULL, NULL)";
			if (Execute($sql_smp)) {
			} else {
				return false;
			}
		}else{
			$sql_smp = "UPDATE pegawai SET nama = '".$data->nama."', alamat = '".$data->address."', email = '".$data->email."', wa = '".$data->phone."', hp = '".$data->phone."', tgllahir = '".$tgl_lahir."', rekbank = '".$data->no_rek."', jenkel = '".$data->gender."', status_peg = ".$status_peg.", mulai_bekerja = ".$data->mulai_kerja.", jabatan = ".$jenis_ptk.", type = ".$jabatan.", sertif = ".$sertifikasi.", level = '1' WHERE jenjang_id = '1' OR nip= '".$data->nip."'";
			if (Execute($sql_smp)) {
			} else {
				return false;
			}
		}
	}
	// SMP END

	// SMA
	$api_employee_sma = curl_init(); 
	// set url 
	curl_setopt($api_employee_sma, CURLOPT_URL, "36.93.52.108/siakad_demo/sma/api/employee");
	//return the transfer as a string 
	curl_setopt($api_employee_sma, CURLOPT_RETURNTRANSFER, 1); 
	$output_sma = curl_exec($api_employee_sma); 
	$employee_sma =json_decode($output_sma);
	
	foreach($employee_sma as $data){
		$sql = ExecuteRow("SELECT * FROM pegawai WHERE jenjang_id = '4' AND nip= '".$data->nip."'");
		$status_peg = ExecuteScalar("SELECT id FROM status_kepeg WHERE name = '%".$data->status_pegawai."%'");
		if(empty($status_peg)){
			$status_peg = 'NULL';
		}else{
		}
		if($data->sertifikasi == 'Sertifikasi'){
			$sertifikasi = 1;
		}elseif($data->sertifikasi == 'Non_sertifikasi'){
			$sertifikasi = 2;
		}else{
			$sertifikasi = 'NULL';
		}
		if(empty($data->jenis_ptk)){
			$jenis_ptk = 'NULL';
		}else{
			$jenis_ptk = ExecuteScalar("SELECT id FROM jabatan WHERE nama_jabatan LIKE '%".$data->jenis_ptk."%'");
		}
		$jabatan = ExecuteScalar("SELECT id FROM jenis_jabatan WHERE name LIKE '%".$data->jabatan."%'");
		if(empty($jabatan)){
			$jabatan = 'NULL';
		}else{
		}
		$tgl_lahir = date('Y-m-d', strtotime($data->birthday));

		if (empty($sql)) {
			$sql_sma = "INSERT INTO pegawai VALUES (NULL, NULL, '".$data->nama."', '".$data->address."', '".$data->email."', '".$data->phone."', '".$data->phone."', '".$tgl_lahir."', '".$data->nip."', '".$data->no_rek."', NULL, NULL, '".$data->religion."', '".$data->gender."', ".$status_peg.", NULL, NULL, ".$jenis_ptk.", '".$data->mulai_kerja."', NULL, '".$data->email."', 123456, 1, 1, 4, ".$jabatan.", ".$sertifikasi.", NULL, NULL, NULL, ".$status_peg.", NULL, NULL, NULL, NULL, NULL)";
			if (Execute($sql_sma)) {
			} else {
				return false;
			}
		}else{
			$sql_sma = "UPDATE pegawai SET nama = '".$data->nama."', alamat = '".$data->address."', email = '".$data->email."', wa = '".$data->phone."', hp = '".$data->phone."', tgllahir = '".$tgl_lahir."', rekbank = '".$data->no_rek."', jenkel = '".$data->gender."', status_peg = ".$status_peg.", mulai_bekerja = ".$data->mulai_kerja.", jabatan = ".$jenis_ptk.", type = ".$jabatan.", sertif = ".$sertifikasi.", level = '1' WHERE jenjang_id = '1' OR nip= '".$data->nip."'";
			if (Execute($sql_sma)) {
			} else {
				return false;
			}
		}
	}
	// SMA END

	// SMK
	$api_employee_smk = curl_init(); 
	// set url 
	curl_setopt($api_employee_smk, CURLOPT_URL, "36.93.52.108/siakad_demo/smk/api/employee");
	//return the transfer as a string 
	curl_setopt($api_employee_smk, CURLOPT_RETURNTRANSFER, 1); 
	$output_smk = curl_exec($api_employee_smk); 
	$employee_smk =json_decode($output_smk);
	
	foreach($employee_smk as $data){
		$sql = ExecuteRow("SELECT * FROM pegawai WHERE jenjang_id = '5' AND nip= '".$data->nip."'");
		$status_peg = ExecuteScalar("SELECT id FROM status_kepeg WHERE name = '%".$data->status_pegawai."%'");
		if(empty($status_peg)){
			$status_peg = 'NULL';
		}else{
		}
		if($data->sertifikasi == 'Sertifikasi'){
			$sertifikasi = 1;
		}elseif($data->sertifikasi == 'Non_sertifikasi'){
			$sertifikasi = 2;
		}else{
			$sertifikasi = 'NULL';
		}
		if(empty($data->jenis_ptk)){
			$jenis_ptk = 'NULL';
		}else{
			$jenis_ptk = ExecuteScalar("SELECT id FROM jabatan WHERE nama_jabatan LIKE '%".$data->jenis_ptk."%'");
		}
		$jabatan = ExecuteScalar("SELECT id FROM jenis_jabatan WHERE name LIKE '%".$data->jabatan."%'");
		if(empty($jabatan)){
			$jabatan = 'NULL';
		}else{
		}
		$tgl_lahir = date('Y-m-d', strtotime($data->birthday));

		if (empty($sql)) {
			$sql_smk = "INSERT INTO pegawai VALUES (NULL, NULL, '".$data->nama."', '".$data->address."', '".$data->email."', '".$data->phone."', '".$data->phone."', '".$tgl_lahir."', '".$data->nip."', '".$data->no_rek."', NULL, NULL, '".$data->religion."', '".$data->gender."', ".$status_peg.", NULL, NULL, ".$jenis_ptk.", '".$data->mulai_kerja."', NULL, '".$data->email."', 123456, 1, 1, 5, ".$jabatan.", ".$sertifikasi.", NULL, NULL, NULL, ".$status_peg.", NULL, NULL, NULL, NULL, NULL)";
			if (Execute($sql_smk)) {
			} else {
				return false;
			}
		}else{
			$sql_smk = "UPDATE pegawai SET nama = '".$data->nama."', alamat = '".$data->address."', email = '".$data->email."', wa = '".$data->phone."', hp = '".$data->phone."', tgllahir = '".$tgl_lahir."', rekbank = '".$data->no_rek."', jenkel = '".$data->gender."', status_peg = ".$status_peg.", mulai_bekerja = ".$data->mulai_kerja.", jabatan = ".$jenis_ptk.", type = ".$jabatan.", sertif = ".$sertifikasi.", level = '1' WHERE jenjang_id = '1' OR nip= '".$data->nip."'";
			if (Execute($sql_smk)) {
			} else {
				return false;
			}
		}
	}
	// SMK END
// ENDEMPLLOYEE
echo ("<script LANGUAGE='JavaScript'>
	window.alert('Berhasil Sinkronisasi Data');
	window.location.href='pegawailist.php';
	</script>");
?>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$test_api->terminate();
?>