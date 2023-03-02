<?php
ob_start();
//require_once 'vendor/autoload.php';
include('database.php'); 
require_once'vendor/tbs_class.php';
require_once'vendor/tbs_plugin_opentbs.php';
$TBS = new clsTinyButStrong; 
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
$sql = mysqli_query($con, "SELECT bulan.bulan, tpendidikan.name, pegawai.nama, solved_all_unit.nip,solved_all_unit.tahun, pegawai.rekbank, jenis_jabatan.name, solved_all_unit.type_peg,solved_all_unit.total_gaji, tpendidikan1.name FROM solved_all_unit INNER JOIN pegawai ON solved_all_unit.nip = pegawai.nip INNER JOIN tpendidikan ON solved_all_unit.unit = tpendidikan.nourut INNER JOIN bulan ON solved_all_unit.bulan = bulan.id INNER JOIN jenis_jabatan ON solved_all_unit.type_peg = jenis_jabatan.id INNER JOIN tpendidikan tpendidikan1 ON solved_all_unit.unit = tpendidikan1.nourut ORDER BY solved_all_unit.id DESC");	
$data = [];
while($row = mysqli_fetch_array($sql))
{     
    $data[] = array(
                'tahun'=>$row['tahun'],
                'bulan'=>$row['bulan'],
                'nama'=>$row['nama'],
				'nip'=>$row['nip'],
                'unit'=>$row['name'],
				'total'=>number_format($row['total_gaji'],0,',','.'),
        		);   
}
$template = 'template_gaji_all.xlsx';
$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
$TBS->MergeBlock('data', $data);
$dateyear = date("F Y");
$TBS->Show(OPENTBS_DOWNLOAD, $dateyear.' Laporan Gaji All Unit.xlsx');
exit();
?>