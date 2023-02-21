<?php
namespace PHPMaker2020\sigap;

use PhpOffice\PhpSpreadsheet\Worksheet\Row;

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
$export_tu_sma = new export_tu_sma();

// Run the page
$export_tu_sma->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<?php 
include_once "vendor/tbs_class.php";
include_once "vendor/tbs_plugin_opentbs.php";
$TBS = new clsTinyButStrong; 
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
$sql = ExecuteRow("SELECT * FROM gaji_sma INNER JOIN pegawai ON pegawai.nip = gaji_sma.pegawai ORDER BY gaji_sma.id DESC limit 1");

	
$data = [];
foreach($sql as $row)
{     
    $data[] = array(
                'nama'=>$row['nama'],
				'nip'=>$row['pegawai'],
				'total'=>$row['total'],
        		);   
}
$template = 'templateimport.xlsx';
$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
$TBS->MergeBlock('data', $data);

$TBS->Show(OPENTBS_DOWNLOAD, 'hasil_contoh.xlsx');
exit();
?>
<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$export_tu_sma->terminate();
?>