<?php
ob_start();
//require_once 'vendor/autoload.php';
include('database.php'); 
require_once'vendor/tbs_class.php';
require_once'vendor/tbs_plugin_opentbs.php';
$TBS = new clsTinyButStrong; 
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
$sql = mysqli_query($con, "SELECT solved_all_unit.id, solved_all_unit.nip, pegawai.nama, m_bpjs.golongan,solved_all_unit.hari_tua, solved_all_unit.pph21, solved_all_unit.j_pensiun, solved_all_unit.tahun, bulan.bulan, solved_all_unit.iuran_bpjs, tpendidikan.name FROM solved_all_unit INNER JOIN pegawai ON solved_all_unit.nip = pegawai.nip INNER JOIN m_bpjs ON solved_all_unit.golongan_bpjs = m_bpjs.id INNER JOIN bulan ON solved_all_unit.bulan = bulan.id INNER JOIN tpendidikan ON solved_all_unit.unit = tpendidikan.nourut ORDER BY solved_all_unit.id DESC");	
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
        'unit'=>$row['name'],
        		);   
}
$template = 'template_pajak_all.xlsx';
$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
$TBS->MergeBlock('data', $data);
$dateyear = date("F Y");
$TBS->Show(OPENTBS_DOWNLOAD, $dateyear.' Laporan Pajak All Unit.xlsx');
exit();
?>