<?php
namespace PHPMaker2020\sigap;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$gaji_tu_sma_view = new gaji_tu_sma_view();

// Run the page
$gaji_tu_sma_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_tu_sma_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$gaji_tu_sma_view->isExport()) { ?>
<script>
var fgaji_tu_smaview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fgaji_tu_smaview = currentForm = new ew.Form("fgaji_tu_smaview", "view");
	loadjs.done("fgaji_tu_smaview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$gaji_tu_sma_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $gaji_tu_sma_view->ExportOptions->render("body") ?>
<?php $gaji_tu_sma_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $gaji_tu_sma_view->showPageHeader(); ?>
<?php
$gaji_tu_sma_view->showMessage();
?>
<form name="fgaji_tu_smaview" id="fgaji_tu_smaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="gaji_tu_sma">
<input type="hidden" name="modal" value="<?php echo (int)$gaji_tu_sma_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($gaji_tu_sma_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_id"><?php echo $gaji_tu_sma_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $gaji_tu_sma_view->id->cellAttributes() ?>>
<span id="el_gaji_tu_sma_id">
<span<?php echo $gaji_tu_sma_view->id->viewAttributes() ?>><?php echo $gaji_tu_sma_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->datetime->Visible) { // datetime ?>
	<tr id="r_datetime">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_datetime"><?php echo $gaji_tu_sma_view->datetime->caption() ?></span></td>
		<td data-name="datetime" <?php echo $gaji_tu_sma_view->datetime->cellAttributes() ?>>
<span id="el_gaji_tu_sma_datetime">
<span<?php echo $gaji_tu_sma_view->datetime->viewAttributes() ?>><?php echo $gaji_tu_sma_view->datetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->month->Visible) { // month ?>
	<tr id="r_month">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_month"><?php echo $gaji_tu_sma_view->month->caption() ?></span></td>
		<td data-name="month" <?php echo $gaji_tu_sma_view->month->cellAttributes() ?>>
<span id="el_gaji_tu_sma_month">
<span<?php echo $gaji_tu_sma_view->month->viewAttributes() ?>><?php echo $gaji_tu_sma_view->month->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->pid->Visible) { // pid ?>
	<tr id="r_pid">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_pid"><?php echo $gaji_tu_sma_view->pid->caption() ?></span></td>
		<td data-name="pid" <?php echo $gaji_tu_sma_view->pid->cellAttributes() ?>>
<span id="el_gaji_tu_sma_pid">
<span<?php echo $gaji_tu_sma_view->pid->viewAttributes() ?>><?php echo $gaji_tu_sma_view->pid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->tahun->Visible) { // tahun ?>
	<tr id="r_tahun">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_tahun"><?php echo $gaji_tu_sma_view->tahun->caption() ?></span></td>
		<td data-name="tahun" <?php echo $gaji_tu_sma_view->tahun->cellAttributes() ?>>
<span id="el_gaji_tu_sma_tahun">
<span<?php echo $gaji_tu_sma_view->tahun->viewAttributes() ?>><?php echo $gaji_tu_sma_view->tahun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->bulan->Visible) { // bulan ?>
	<tr id="r_bulan">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_bulan"><?php echo $gaji_tu_sma_view->bulan->caption() ?></span></td>
		<td data-name="bulan" <?php echo $gaji_tu_sma_view->bulan->cellAttributes() ?>>
<span id="el_gaji_tu_sma_bulan">
<span<?php echo $gaji_tu_sma_view->bulan->viewAttributes() ?>><?php echo $gaji_tu_sma_view->bulan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->pegawai->Visible) { // pegawai ?>
	<tr id="r_pegawai">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_pegawai"><?php echo $gaji_tu_sma_view->pegawai->caption() ?></span></td>
		<td data-name="pegawai" <?php echo $gaji_tu_sma_view->pegawai->cellAttributes() ?>>
<span id="el_gaji_tu_sma_pegawai">
<span<?php echo $gaji_tu_sma_view->pegawai->viewAttributes() ?>><?php echo $gaji_tu_sma_view->pegawai->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->jenjang_id->Visible) { // jenjang_id ?>
	<tr id="r_jenjang_id">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_jenjang_id"><?php echo $gaji_tu_sma_view->jenjang_id->caption() ?></span></td>
		<td data-name="jenjang_id" <?php echo $gaji_tu_sma_view->jenjang_id->cellAttributes() ?>>
<span id="el_gaji_tu_sma_jenjang_id">
<span<?php echo $gaji_tu_sma_view->jenjang_id->viewAttributes() ?>><?php echo $gaji_tu_sma_view->jenjang_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->jabatan_id->Visible) { // jabatan_id ?>
	<tr id="r_jabatan_id">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_jabatan_id"><?php echo $gaji_tu_sma_view->jabatan_id->caption() ?></span></td>
		<td data-name="jabatan_id" <?php echo $gaji_tu_sma_view->jabatan_id->cellAttributes() ?>>
<span id="el_gaji_tu_sma_jabatan_id">
<span<?php echo $gaji_tu_sma_view->jabatan_id->viewAttributes() ?>><?php echo $gaji_tu_sma_view->jabatan_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->type_jabatan->Visible) { // type_jabatan ?>
	<tr id="r_type_jabatan">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_type_jabatan"><?php echo $gaji_tu_sma_view->type_jabatan->caption() ?></span></td>
		<td data-name="type_jabatan" <?php echo $gaji_tu_sma_view->type_jabatan->cellAttributes() ?>>
<span id="el_gaji_tu_sma_type_jabatan">
<span<?php echo $gaji_tu_sma_view->type_jabatan->viewAttributes() ?>><?php echo $gaji_tu_sma_view->type_jabatan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->tambahan->Visible) { // tambahan ?>
	<tr id="r_tambahan">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_tambahan"><?php echo $gaji_tu_sma_view->tambahan->caption() ?></span></td>
		<td data-name="tambahan" <?php echo $gaji_tu_sma_view->tambahan->cellAttributes() ?>>
<span id="el_gaji_tu_sma_tambahan">
<span<?php echo $gaji_tu_sma_view->tambahan->viewAttributes() ?>><?php echo $gaji_tu_sma_view->tambahan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->ijasah->Visible) { // ijasah ?>
	<tr id="r_ijasah">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_ijasah"><?php echo $gaji_tu_sma_view->ijasah->caption() ?></span></td>
		<td data-name="ijasah" <?php echo $gaji_tu_sma_view->ijasah->cellAttributes() ?>>
<span id="el_gaji_tu_sma_ijasah">
<span<?php echo $gaji_tu_sma_view->ijasah->viewAttributes() ?>><?php echo $gaji_tu_sma_view->ijasah->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->sertif->Visible) { // sertif ?>
	<tr id="r_sertif">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_sertif"><?php echo $gaji_tu_sma_view->sertif->caption() ?></span></td>
		<td data-name="sertif" <?php echo $gaji_tu_sma_view->sertif->cellAttributes() ?>>
<span id="el_gaji_tu_sma_sertif">
<span<?php echo $gaji_tu_sma_view->sertif->viewAttributes() ?>><?php echo $gaji_tu_sma_view->sertif->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->lama_kerja->Visible) { // lama_kerja ?>
	<tr id="r_lama_kerja">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_lama_kerja"><?php echo $gaji_tu_sma_view->lama_kerja->caption() ?></span></td>
		<td data-name="lama_kerja" <?php echo $gaji_tu_sma_view->lama_kerja->cellAttributes() ?>>
<span id="el_gaji_tu_sma_lama_kerja">
<span<?php echo $gaji_tu_sma_view->lama_kerja->viewAttributes() ?>><?php echo $gaji_tu_sma_view->lama_kerja->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->gapok->Visible) { // gapok ?>
	<tr id="r_gapok">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_gapok"><?php echo $gaji_tu_sma_view->gapok->caption() ?></span></td>
		<td data-name="gapok" <?php echo $gaji_tu_sma_view->gapok->cellAttributes() ?>>
<span id="el_gaji_tu_sma_gapok">
<span<?php echo $gaji_tu_sma_view->gapok->viewAttributes() ?>><?php echo $gaji_tu_sma_view->gapok->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->kehadiran->Visible) { // kehadiran ?>
	<tr id="r_kehadiran">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_kehadiran"><?php echo $gaji_tu_sma_view->kehadiran->caption() ?></span></td>
		<td data-name="kehadiran" <?php echo $gaji_tu_sma_view->kehadiran->cellAttributes() ?>>
<span id="el_gaji_tu_sma_kehadiran">
<span<?php echo $gaji_tu_sma_view->kehadiran->viewAttributes() ?>><?php echo $gaji_tu_sma_view->kehadiran->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->value_kehadiran->Visible) { // value_kehadiran ?>
	<tr id="r_value_kehadiran">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_value_kehadiran"><?php echo $gaji_tu_sma_view->value_kehadiran->caption() ?></span></td>
		<td data-name="value_kehadiran" <?php echo $gaji_tu_sma_view->value_kehadiran->cellAttributes() ?>>
<span id="el_gaji_tu_sma_value_kehadiran">
<span<?php echo $gaji_tu_sma_view->value_kehadiran->viewAttributes() ?>><?php echo $gaji_tu_sma_view->value_kehadiran->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->lembur->Visible) { // lembur ?>
	<tr id="r_lembur">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_lembur"><?php echo $gaji_tu_sma_view->lembur->caption() ?></span></td>
		<td data-name="lembur" <?php echo $gaji_tu_sma_view->lembur->cellAttributes() ?>>
<span id="el_gaji_tu_sma_lembur">
<span<?php echo $gaji_tu_sma_view->lembur->viewAttributes() ?>><?php echo $gaji_tu_sma_view->lembur->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->value_lembur->Visible) { // value_lembur ?>
	<tr id="r_value_lembur">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_value_lembur"><?php echo $gaji_tu_sma_view->value_lembur->caption() ?></span></td>
		<td data-name="value_lembur" <?php echo $gaji_tu_sma_view->value_lembur->cellAttributes() ?>>
<span id="el_gaji_tu_sma_value_lembur">
<span<?php echo $gaji_tu_sma_view->value_lembur->viewAttributes() ?>><?php echo $gaji_tu_sma_view->value_lembur->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->value_reward->Visible) { // value_reward ?>
	<tr id="r_value_reward">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_value_reward"><?php echo $gaji_tu_sma_view->value_reward->caption() ?></span></td>
		<td data-name="value_reward" <?php echo $gaji_tu_sma_view->value_reward->cellAttributes() ?>>
<span id="el_gaji_tu_sma_value_reward">
<span<?php echo $gaji_tu_sma_view->value_reward->viewAttributes() ?>><?php echo $gaji_tu_sma_view->value_reward->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->piket_count->Visible) { // piket_count ?>
	<tr id="r_piket_count">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_piket_count"><?php echo $gaji_tu_sma_view->piket_count->caption() ?></span></td>
		<td data-name="piket_count" <?php echo $gaji_tu_sma_view->piket_count->cellAttributes() ?>>
<span id="el_gaji_tu_sma_piket_count">
<span<?php echo $gaji_tu_sma_view->piket_count->viewAttributes() ?>><?php echo $gaji_tu_sma_view->piket_count->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->value_piket->Visible) { // value_piket ?>
	<tr id="r_value_piket">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_value_piket"><?php echo $gaji_tu_sma_view->value_piket->caption() ?></span></td>
		<td data-name="value_piket" <?php echo $gaji_tu_sma_view->value_piket->cellAttributes() ?>>
<span id="el_gaji_tu_sma_value_piket">
<span<?php echo $gaji_tu_sma_view->value_piket->viewAttributes() ?>><?php echo $gaji_tu_sma_view->value_piket->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->tugastambahan->Visible) { // tugastambahan ?>
	<tr id="r_tugastambahan">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_tugastambahan"><?php echo $gaji_tu_sma_view->tugastambahan->caption() ?></span></td>
		<td data-name="tugastambahan" <?php echo $gaji_tu_sma_view->tugastambahan->cellAttributes() ?>>
<span id="el_gaji_tu_sma_tugastambahan">
<span<?php echo $gaji_tu_sma_view->tugastambahan->viewAttributes() ?>><?php echo $gaji_tu_sma_view->tugastambahan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->tj_jabatan->Visible) { // tj_jabatan ?>
	<tr id="r_tj_jabatan">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_tj_jabatan"><?php echo $gaji_tu_sma_view->tj_jabatan->caption() ?></span></td>
		<td data-name="tj_jabatan" <?php echo $gaji_tu_sma_view->tj_jabatan->cellAttributes() ?>>
<span id="el_gaji_tu_sma_tj_jabatan">
<span<?php echo $gaji_tu_sma_view->tj_jabatan->viewAttributes() ?>><?php echo $gaji_tu_sma_view->tj_jabatan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->tunjangan2->Visible) { // tunjangan2 ?>
	<tr id="r_tunjangan2">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_tunjangan2"><?php echo $gaji_tu_sma_view->tunjangan2->caption() ?></span></td>
		<td data-name="tunjangan2" <?php echo $gaji_tu_sma_view->tunjangan2->cellAttributes() ?>>
<span id="el_gaji_tu_sma_tunjangan2">
<span<?php echo $gaji_tu_sma_view->tunjangan2->viewAttributes() ?>><?php echo $gaji_tu_sma_view->tunjangan2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->sub_total->Visible) { // sub_total ?>
	<tr id="r_sub_total">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_sub_total"><?php echo $gaji_tu_sma_view->sub_total->caption() ?></span></td>
		<td data-name="sub_total" <?php echo $gaji_tu_sma_view->sub_total->cellAttributes() ?>>
<span id="el_gaji_tu_sma_sub_total">
<span<?php echo $gaji_tu_sma_view->sub_total->viewAttributes() ?>><?php echo $gaji_tu_sma_view->sub_total->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->jaminan_pensiun->Visible) { // jaminan_pensiun ?>
	<tr id="r_jaminan_pensiun">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_jaminan_pensiun"><?php echo $gaji_tu_sma_view->jaminan_pensiun->caption() ?></span></td>
		<td data-name="jaminan_pensiun" <?php echo $gaji_tu_sma_view->jaminan_pensiun->cellAttributes() ?>>
<span id="el_gaji_tu_sma_jaminan_pensiun">
<span<?php echo $gaji_tu_sma_view->jaminan_pensiun->viewAttributes() ?>><?php echo $gaji_tu_sma_view->jaminan_pensiun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->jaminan_hari_tua->Visible) { // jaminan_hari_tua ?>
	<tr id="r_jaminan_hari_tua">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_jaminan_hari_tua"><?php echo $gaji_tu_sma_view->jaminan_hari_tua->caption() ?></span></td>
		<td data-name="jaminan_hari_tua" <?php echo $gaji_tu_sma_view->jaminan_hari_tua->cellAttributes() ?>>
<span id="el_gaji_tu_sma_jaminan_hari_tua">
<span<?php echo $gaji_tu_sma_view->jaminan_hari_tua->viewAttributes() ?>><?php echo $gaji_tu_sma_view->jaminan_hari_tua->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->total_pph21->Visible) { // total_pph21 ?>
	<tr id="r_total_pph21">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_total_pph21"><?php echo $gaji_tu_sma_view->total_pph21->caption() ?></span></td>
		<td data-name="total_pph21" <?php echo $gaji_tu_sma_view->total_pph21->cellAttributes() ?>>
<span id="el_gaji_tu_sma_total_pph21">
<span<?php echo $gaji_tu_sma_view->total_pph21->viewAttributes() ?>><?php echo $gaji_tu_sma_view->total_pph21->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->potongan->Visible) { // potongan ?>
	<tr id="r_potongan">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_potongan"><?php echo $gaji_tu_sma_view->potongan->caption() ?></span></td>
		<td data-name="potongan" <?php echo $gaji_tu_sma_view->potongan->cellAttributes() ?>>
<span id="el_gaji_tu_sma_potongan">
<span<?php echo $gaji_tu_sma_view->potongan->viewAttributes() ?>><?php echo $gaji_tu_sma_view->potongan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->penyesuaian->Visible) { // penyesuaian ?>
	<tr id="r_penyesuaian">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_penyesuaian"><?php echo $gaji_tu_sma_view->penyesuaian->caption() ?></span></td>
		<td data-name="penyesuaian" <?php echo $gaji_tu_sma_view->penyesuaian->cellAttributes() ?>>
<span id="el_gaji_tu_sma_penyesuaian">
<span<?php echo $gaji_tu_sma_view->penyesuaian->viewAttributes() ?>><?php echo $gaji_tu_sma_view->penyesuaian->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->potongan_bendahara->Visible) { // potongan_bendahara ?>
	<tr id="r_potongan_bendahara">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_potongan_bendahara"><?php echo $gaji_tu_sma_view->potongan_bendahara->caption() ?></span></td>
		<td data-name="potongan_bendahara" <?php echo $gaji_tu_sma_view->potongan_bendahara->cellAttributes() ?>>
<span id="el_gaji_tu_sma_potongan_bendahara">
<span<?php echo $gaji_tu_sma_view->potongan_bendahara->viewAttributes() ?>><?php echo $gaji_tu_sma_view->potongan_bendahara->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->total->Visible) { // total ?>
	<tr id="r_total">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_total"><?php echo $gaji_tu_sma_view->total->caption() ?></span></td>
		<td data-name="total" <?php echo $gaji_tu_sma_view->total->cellAttributes() ?>>
<span id="el_gaji_tu_sma_total">
<span<?php echo $gaji_tu_sma_view->total->viewAttributes() ?>><?php echo $gaji_tu_sma_view->total->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->voucher->Visible) { // voucher ?>
	<tr id="r_voucher">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_voucher"><?php echo $gaji_tu_sma_view->voucher->caption() ?></span></td>
		<td data-name="voucher" <?php echo $gaji_tu_sma_view->voucher->cellAttributes() ?>>
<span id="el_gaji_tu_sma_voucher">
<span<?php echo $gaji_tu_sma_view->voucher->viewAttributes() ?>><?php echo $gaji_tu_sma_view->voucher->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_tu_sma_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $gaji_tu_sma_view->TableLeftColumnClass ?>"><span id="elh_gaji_tu_sma_status"><?php echo $gaji_tu_sma_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $gaji_tu_sma_view->status->cellAttributes() ?>>
<span id="el_gaji_tu_sma_status">
<span<?php echo $gaji_tu_sma_view->status->viewAttributes() ?>><?php echo $gaji_tu_sma_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$gaji_tu_sma_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$gaji_tu_sma_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$gaji_tu_sma_view->terminate();
?>