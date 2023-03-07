<?php
ob_start();
//require_once 'vendor/autoload.php';
include('database.php'); 
require_once'vendor/tbs_class.php';
require_once'vendor/tbs_plugin_opentbs.php';
$TBS = new clsTinyButStrong; 
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
$sql = mysqli_query($con, "SELECT solved_all_unit.id, solved_all_unit.nip, pegawai.nama,
solved_all_unit.hari_tua, solved_all_unit.pph21, solved_all_unit.j_pensiun,
solved_all_unit.tahun, bulan.bulan, tpendidikan.name
FROM solved_all_unit INNER JOIN
pegawai ON solved_all_unit.nip = pegawai.nip INNER JOIN
bulan ON solved_all_unit.bulan = bulan.id INNER JOIN
tpendidikan ON solved_all_unit.unit = tpendidikan.nourut
where solved_all_unit.unit='2'
ORDER BY solved_all_unit.id DESC");	
$data = [];
while($row = mysqli_fetch_array($sql))
{     
    $data[] = array(
                'tahun'=>$row['tahun'],
                'bulan'=>$row['bulan'],
                'nama'=>$row['nama'],
				'nip'=>$row['nip'],
                'hari_tua'=>number_format($row['hari_tua'],0,',','.'),
                'j_pensiun'=>number_format($row['j_pensiun'],0,',','.'),
                'pph21'=>number_format($row['pph21'],0,',','.'),
        		);   
}
$template = 'template_export_pajak.xlsx';
$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
$TBS->MergeBlock('data', $data);
$dateyear = date("F Y");
$TBS->Show(OPENTBS_DOWNLOAD, $dateyear.' Laporan Pajak SD.xlsx');
exit();
?>