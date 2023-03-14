<?php
ob_start();
//require_once 'vendor/autoload.php';
include('database.php'); 
require_once'vendor/tbs_class.php';
require_once'vendor/tbs_plugin_opentbs.php';
$TBS = new clsTinyButStrong; 
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
$sql = mysqli_query($con, "SELECT tpendidikan.name, pegawai.nip, pegawai.type, pegawai.nama
FROM tpendidikan INNER JOIN
  pegawai ON pegawai.jenjang_id = tpendidikan.nourut
WHERE pegawai.type IS NOT NULL AND pegawai.jenjang_id = 4
ORDER BY pegawai.type ASC");	
//print_r($sql);
//die;
$data = [];
while($row = mysqli_fetch_array($sql))
{     
    $data[] = array(
                'nama'=>$row['nama'],
				'nip'=>$row['nip'],
                'unit'=>$row['name'],
        		);   
}
$template = 'template_unit_sma.xlsx';
$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
$TBS->MergeBlock('data', $data);
$dateyear = date("F Y");
$TBS->Show(OPENTBS_DOWNLOAD, $dateyear.' Template Penyesuaian Unit.xlsx');
exit();
?>