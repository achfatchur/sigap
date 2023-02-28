<?php
ob_start();
//require_once 'vendor/autoload.php';
include('database.php'); 
require_once'vendor/tbs_class.php';
require_once'vendor/tbs_plugin_opentbs.php';
$TBS = new clsTinyButStrong; 
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
$sql = mysqli_query($con, "SELECT gaji_karyawan_smp.pegawai, gaji_karyawan_smp.tahun, pegawai.nama, gaji_karyawan_smp.total,bulan.bulan, gaji_karyawan_smp.pid FROM gaji_karyawan_smp INNER JOIN pegawai ON gaji_karyawan_smp.pegawai = pegawai.nip INNER JOIN bulan ON gaji_karyawan_smp.bulan = bulan.id order by gaji_karyawan_smp.pid DESC");	
$data = [];
while($row = mysqli_fetch_array($sql))
{     
    $data[] = array(
                'tahun'=>$row['tahun'],
                'bulan'=>$row['bulan'],
                'nama'=>$row['nama'],
				'nip'=>$row['pegawai'],
				'total'=>number_format($row['total'],0,',','.'),
        		);   
}
$template = 'templateimport.xlsx';
$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
$TBS->MergeBlock('data', $data);
$dateyear = date("F Y");
$TBS->Show(OPENTBS_DOWNLOAD, $dateyear.' Laporan Gaji Pegawai SMP.xlsx');
exit();
?>