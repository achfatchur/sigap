<?php
ob_start();
//require_once 'vendor/autoload.php';
include('database.php'); 
require_once'vendor/tbs_class.php';
require_once'vendor/tbs_plugin_opentbs.php';
$TBS = new clsTinyButStrong; 
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
$sql = mysqli_query($con, "SELECT solved_sma.id,solved_sma.nip, pegawai.nama, m_bpjs.golongan, solved_sma.hari_tua,solved_sma.pph21, solved_sma.j_pensiun, solved_sma.tahun, bulan.bulan,solved_sma.iuran_bpjs FROM solved_sma INNER JOIN pegawai ON solved_sma.nip = pegawai.nip INNER JOIN m_bpjs ON solved_sma.golongan_bpjs = m_bpjs.id INNER JOIN bulan ON solved_sma.bulan = bulan.id order by solved_sma.id desc");	
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
$TBS->Show(OPENTBS_DOWNLOAD, $dateyear.' Laporan BPJS SMA.xlsx');
exit();
?>