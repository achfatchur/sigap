<?php
ob_start();
//require_once 'vendor/autoload.php';
include('database.php'); 
require_once'vendor/tbs_class.php';
require_once'vendor/tbs_plugin_opentbs.php';
$TBS = new clsTinyButStrong; 
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
$sql = mysqli_query($con, "SELECT bulan.bulan, tpendidikan.name, pegawai.nama, solved_sma.nip,solved_sma.tahun, pegawai.rekbank, jenis_jabatan.name, solved_sma.type_peg,solved_sma.total_gaji FROM solved_sma INNER JOIN pegawai ON solved_sma.nip = pegawai.nip INNER JOIN tpendidikan ON solved_sma.unit = tpendidikan.nourut INNER JOIN bulan ON solved_sma.bulan = bulan.id INNER JOIN jenis_jabatan ON solved_sma.type_peg = jenis_jabatan.id ORDER BY solved_sma.type_peg ASC");	
$data = [];
while($row = mysqli_fetch_array($sql))
{     
    $data[] = array(
                'tahun'=>$row['tahun'],
                'bulan'=>$row['bulan'],
                'nama'=>$row['nama'],
				'nip'=>$row['nip'],
				'total'=>number_format($row['total_gaji'],0,',','.'),
        		);   
}
$template = 'templateimport.xlsx';
$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
$TBS->MergeBlock('data', $data);
$dateyear = date("F Y");
$TBS->Show(OPENTBS_DOWNLOAD, $dateyear.' Laporan Gaji Guru SMA.xlsx');
exit();
?>