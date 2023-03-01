<?php
ob_start();
//require_once 'vendor/autoload.php';
include('database.php'); 
require_once'vendor/tbs_class.php';
require_once'vendor/tbs_plugin_opentbs.php';
$TBS = new clsTinyButStrong; 
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
$sql = mysqli_query($con, "SELECT solved_sd.id,solved_sd.nip, pegawai.nama, m_bpjs.golongan, solved_sd.hari_tua,solved_sd.pph21, solved_sd.j_pensiun, solved_sd.tahun, bulan.bulan,solved_sd.iuran_bpjs FROM solved_sd INNER JOIN pegawai ON solved_sd.nip = pegawai.nip INNER JOIN m_bpjs ON solved_sd.golongan_bpjs = m_bpjs.id INNER JOIN bulan ON solved_sd.bulan = bulan.id order by solved_sd.id desc");	
$data = [];
while($row = mysqli_fetch_array($sql))
{     
    $data[] = array(
                'tahun'=>$row['tahun'],
                'bulan'=>$row['bulan'],
                'nama'=>$row['nama'],
				'nip'=>$row['nip'],
                'golongan'=>$row['golongan'],
				'iuran_bpjs'=>number_format($row['iuran_bpjs'],0,',','.'),
        		);   
}
$template = 'template_export_bpjs.xlsx';
$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
$TBS->MergeBlock('data', $data);
$dateyear = date("F Y");
$TBS->Show(OPENTBS_DOWNLOAD, $dateyear.' Laporan BPJS SD.xlsx');
exit();
?>