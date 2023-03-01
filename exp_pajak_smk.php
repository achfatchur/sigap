<?php
ob_start();
//require_once 'vendor/autoload.php';
include('database.php'); 
require_once'vendor/tbs_class.php';
require_once'vendor/tbs_plugin_opentbs.php';
$TBS = new clsTinyButStrong; 
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
$sql = mysqli_query($con, "SELECT solved_smk.id,solved_smk.nip, pegawai.nama, m_bpjs.golongan, solved_smk.hari_tua,solved_smk.pph21, solved_smk.j_pensiun, solved_smk.tahun, bulan.bulan,solved_smk.iuran_bpjs FROM solved_smk INNER JOIN pegawai ON solved_smk.nip = pegawai.nip INNER JOIN m_bpjs ON solved_smk.golongan_bpjs = m_bpjs.id INNER JOIN bulan ON solved_smk.bulan = bulan.id order by solved_smk.id desc");	
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
$TBS->Show(OPENTBS_DOWNLOAD, $dateyear.' Laporan Pajak SMKK.xlsx');
exit();
?>