<?php
namespace PHPMaker2020\sigap;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Filter for 'Last Month' (example)
function GetLastMonthFilter($FldExpression, $dbid = 0) {
	$today = getdate();
	$lastmonth = mktime(0, 0, 0, $today['mon']-1, 1, $today['year']);
	$val = date("Y|m", $lastmonth);
	$wrk = $FldExpression . " BETWEEN " .
		QuotedValue(DateValue("month", $val, 1, $dbid), DATATYPE_DATE, $dbid) .
		" AND " .
		QuotedValue(DateValue("month", $val, 2, $dbid), DATATYPE_DATE, $dbid);
	return $wrk;
}

// Filter for 'Starts With A' (example)
function GetStartsWithAFilter($FldExpression, $dbid = 0) {
	return $FldExpression . Like("'A%'", $dbid);
}

// Global user functions
// Database Connecting event
function Database_Connecting(&$info) {

	// Example:
	//var_dump($info);
	//if ($info["id"] == "DB" && CurrentUserIP() == "127.0.0.1") { // Testing on local PC
	//	$info["host"] = "locahost";
	//	$info["user"] = "root";
	//	$info["pass"] = "";
	//}

}

// Database Connected event
function Database_Connected(&$conn) {

	// Example:
	//if ($conn->info["id"] == "DB")
	//	$conn->Execute("Your SQL");

}

function MenuItem_Adding($item) {

	//var_dump($item);
	// Return FALSE if menu item not allowed

	return TRUE;
}

function Menu_Rendering($menu) {

	// Change menu items here
	//$id_user = CurrentUserInfo("jabatan");

   $id_user = CurrentUserInfo("nip");

	//$query = ExecuteRow("SELECT * FROM transaction_event WHERE user_id= '".$id_user."'");
	$query = ExecuteRow("SELECT * FROM pegawai where nip='".$id_user."'");
	if(CurrentUserLevel() == '1'){    
	if ($menu->Id == "menu") { // Sidebar menu
		$menu->Clear(); // Clear all menu items
	 if ($query['jenjang_id'] == '1') {   
	 	if ($query['type'] == '1') {
		$menu->addMenuItem(1, "HOME", "HOME", "home.php");
		$menu->addMenuItem(1, "Slip Gaji GURU TK", "Slip Gaji GURU TK", "v_totalgajitklist.php");   
		}elseif($query['type'] == '2') {
		$menu->addMenuItem(1, "HOME", "HOME", "home.php");
		$menu->addMenuItem(1, "Slip Gaji TU TK", "Slip Gaji TU TK", "v_totalgajitutklist.php");
		}else{
		$menu->addMenuItem(1, "HOME", "HOME", "home.php");
		$menu->addMenuItem(1, "Slip Gaji KARYAWAN TK", "Slip Gaji KARYAWAN TK", "v_totalgajikaryawantklist.php");
		}
		}elseif ($query['jenjang_id'] == '2') {
			if ($query['type'] == '1') {
				$menu->addMenuItem(1, "HOME", "HOME", "home.php");
				$menu->addMenuItem(1, "Slip Gaji GURU SD", "Slip Gaji GURU SD", "v_totalgajilist.php");   
				}elseif($query['type'] == '2') {
				$menu->addMenuItem(1, "HOME", "HOME", "home.php");
				$menu->addMenuItem(1, "Slip Gaji TU SD", "Slip Gaji TU SD", "v_totalgajitulist.php");
				}else{
				$menu->addMenuItem(1, "HOME", "HOME", "home.php");
				$menu->addMenuItem(1, "Slip Gaji KARYAWAN SD", "Slip Gaji KARYAWAN SD", "v_totalgajikakryawanlist.php");
				}	
		}elseif ($query['jenjang_id'] == '3'){
			if ($query['type'] == '1') {
				$menu->addMenuItem(1, "HOME", "HOME", "home.php");
				$menu->addMenuItem(1, "Slip Gaji GURU SMP", "Slip Gaji GURU SMP", "v_totalgajismplist.php");   
				}elseif($query['type'] == '2') {
				$menu->addMenuItem(1, "HOME", "HOME", "home.php");
				$menu->addMenuItem(1, "Slip Gaji TU SMP", "Slip Gaji TU SMP", "v_totalgajitusmplist.php");
				}else{
				$menu->addMenuItem(1, "HOME", "HOME", "home.php");
				$menu->addMenuItem(1, "Slip Gaji KARYAWAN SMP", "Slip Gaji KARYAWAN SMP", "v_totalgajikaryawansmplist.php");
				}
		}elseif ($query['jenjang_id'] == '4'){
			if ($query['type'] == '1') {
				$menu->addMenuItem(1, "HOME", "HOME", "home.php");
				$menu->addMenuItem(1, "Slip Gaji GURU SMA", "Slip Gaji GURU SMA", "v_totalgajismalist.php");   
				}elseif($query['type'] == '2') {
				$menu->addMenuItem(1, "HOME", "HOME", "home.php");
				$menu->addMenuItem(1, "Slip Gaji TU SMA", "Slip Gaji TU SMA", "v_totalgajitusmalist.php");
				}else{
				$menu->addMenuItem(1, "HOME", "HOME", "home.php");
				$menu->addMenuItem(1, "Slip Gaji KARYAWAN SMA", "Slip Gaji KARYAWAN SMA", "v_totalgajikaryawansmalist.php");
				}
		}else{
			if ($query['type'] == '1') {
				$menu->addMenuItem(1, "HOME", "HOME", "home.php");
				$menu->addMenuItem(1, "Slip Gaji GURU SMK", "Slip Gaji GURU SMK", "v_totalgajismklist.php");   
				}elseif($query['type'] == '2') {
				$menu->addMenuItem(1, "HOME", "HOME", "home.php");
				$menu->addMenuItem(1, "Slip Gaji TU SMK", "Slip Gaji TU SMK", "v_totalgajitusmklist.php");
				}else{
				$menu->addMenuItem(1, "HOME", "HOME", "home.php");
				$menu->addMenuItem(1, "Slip Gaji KARYAWAN SMK", "Slip Gaji KARYAWAN SMK", "v_totalgajikaryawansmklist.php");
				}
		}
	}
}
}

function Menu_Rendered($menu) {

	// Clean up here
}

// Page Loading event
function Page_Loading() {

	//echo "Page Loading";
}

// Page Rendering event
function Page_Rendering() {

	//echo "Page Rendering";
}

// Page Unloaded event
function Page_Unloaded() {

	//echo "Page Unloaded";
}

// AuditTrail Inserting event
function AuditTrail_Inserting(&$rsnew) {

	//var_dump($rsnew);
	return TRUE;
}

// Personal Data Downloading event
function PersonalData_Downloading(&$row) {

	//echo "PersonalData Downloading";
}

// Personal Data Deleted event
function PersonalData_Deleted($row) {

	//echo "PersonalData Deleted";
}
?>