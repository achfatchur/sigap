<?php
ob_start();
//require_once 'vendor/autoload.php';
include('database.php'); 
require_once'vendor/tbs_class.php';
require_once'vendor/tbs_plugin_opentbs.php';
$TBS = new clsTinyButStrong; 
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
$sql = mysqli_query($con, "SELECT solved_smp.id,solved_smp.nip, pegawai.nama, m_bpjs.golongan, solved_smp.hari_tua,solved_smp.pph21, solved_smp.j_pensiun, solved_smp.tahun, bulan.bulan,solved_smp.iuran_bpjs FROM solved_smp INNER JOIN pegawai ON solved_smp.nip = pegawai.nip INNER JOIN m_bpjs ON solved_smp.golongan_bpjs = m_bpjs.id INNER JOIN bulan ON solved_smp.bulan = bulan.id order by solved_smp.id desc");	
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
$TBS->Show(OPENTBS_DOWNLOAD, $dateyear.' Laporan Pajak & BPJS SMP.xlsx');
exit();
?>