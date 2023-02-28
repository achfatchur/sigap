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
$solved_smp_view = new solved_smp_view();

// Run the page
$solved_smp_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$solved_smp_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$solved_smp_view->isExport()) { ?>
<script>
var fsolved_smpview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fsolved_smpview = currentForm = new ew.Form("fsolved_smpview", "view");
	loadjs.done("fsolved_smpview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$solved_smp_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $solved_smp_view->ExportOptions->render("body") ?>
<?php $solved_smp_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $solved_smp_view->showPageHeader(); ?>
<?php
$solved_smp_view->showMessage();
?>
<form name="fsolved_smpview" id="fsolved_smpview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="solved_smp">
<input type="hidden" name="modal" value="<?php echo (int)$solved_smp_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($solved_smp_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $solved_smp_view->TableLeftColumnClass ?>"><span id="elh_solved_smp_id"><?php echo $solved_smp_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $solved_smp_view->id->cellAttributes() ?>>
<span id="el_solved_smp_id">
<span<?php echo $solved_smp_view->id->viewAttributes() ?>><?php echo $solved_smp_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smp_view->nip->Visible) { // nip ?>
	<tr id="r_nip">
		<td class="<?php echo $solved_smp_view->TableLeftColumnClass ?>"><span id="elh_solved_smp_nip"><?php echo $solved_smp_view->nip->caption() ?></span></td>
		<td data-name="nip" <?php echo $solved_smp_view->nip->cellAttributes() ?>>
<span id="el_solved_smp_nip">
<span<?php echo $solved_smp_view->nip->viewAttributes() ?>><?php echo $solved_smp_view->nip->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smp_view->total_gaji->Visible) { // total_gaji ?>
	<tr id="r_total_gaji">
		<td class="<?php echo $solved_smp_view->TableLeftColumnClass ?>"><span id="elh_solved_smp_total_gaji"><?php echo $solved_smp_view->total_gaji->caption() ?></span></td>
		<td data-name="total_gaji" <?php echo $solved_smp_view->total_gaji->cellAttributes() ?>>
<span id="el_solved_smp_total_gaji">
<span<?php echo $solved_smp_view->total_gaji->viewAttributes() ?>><?php echo $solved_smp_view->total_gaji->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smp_view->j_pensiun->Visible) { // j_pensiun ?>
	<tr id="r_j_pensiun">
		<td class="<?php echo $solved_smp_view->TableLeftColumnClass ?>"><span id="elh_solved_smp_j_pensiun"><?php echo $solved_smp_view->j_pensiun->caption() ?></span></td>
		<td data-name="j_pensiun" <?php echo $solved_smp_view->j_pensiun->cellAttributes() ?>>
<span id="el_solved_smp_j_pensiun">
<span<?php echo $solved_smp_view->j_pensiun->viewAttributes() ?>><?php echo $solved_smp_view->j_pensiun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smp_view->hari_tua->Visible) { // hari_tua ?>
	<tr id="r_hari_tua">
		<td class="<?php echo $solved_smp_view->TableLeftColumnClass ?>"><span id="elh_solved_smp_hari_tua"><?php echo $solved_smp_view->hari_tua->caption() ?></span></td>
		<td data-name="hari_tua" <?php echo $solved_smp_view->hari_tua->cellAttributes() ?>>
<span id="el_solved_smp_hari_tua">
<span<?php echo $solved_smp_view->hari_tua->viewAttributes() ?>><?php echo $solved_smp_view->hari_tua->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smp_view->pph21->Visible) { // pph21 ?>
	<tr id="r_pph21">
		<td class="<?php echo $solved_smp_view->TableLeftColumnClass ?>"><span id="elh_solved_smp_pph21"><?php echo $solved_smp_view->pph21->caption() ?></span></td>
		<td data-name="pph21" <?php echo $solved_smp_view->pph21->cellAttributes() ?>>
<span id="el_solved_smp_pph21">
<span<?php echo $solved_smp_view->pph21->viewAttributes() ?>><?php echo $solved_smp_view->pph21->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smp_view->golongan_bpjs->Visible) { // golongan_bpjs ?>
	<tr id="r_golongan_bpjs">
		<td class="<?php echo $solved_smp_view->TableLeftColumnClass ?>"><span id="elh_solved_smp_golongan_bpjs"><?php echo $solved_smp_view->golongan_bpjs->caption() ?></span></td>
		<td data-name="golongan_bpjs" <?php echo $solved_smp_view->golongan_bpjs->cellAttributes() ?>>
<span id="el_solved_smp_golongan_bpjs">
<span<?php echo $solved_smp_view->golongan_bpjs->viewAttributes() ?>><?php echo $solved_smp_view->golongan_bpjs->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smp_view->iuran_bpjs->Visible) { // iuran_bpjs ?>
	<tr id="r_iuran_bpjs">
		<td class="<?php echo $solved_smp_view->TableLeftColumnClass ?>"><span id="elh_solved_smp_iuran_bpjs"><?php echo $solved_smp_view->iuran_bpjs->caption() ?></span></td>
		<td data-name="iuran_bpjs" <?php echo $solved_smp_view->iuran_bpjs->cellAttributes() ?>>
<span id="el_solved_smp_iuran_bpjs">
<span<?php echo $solved_smp_view->iuran_bpjs->viewAttributes() ?>><?php echo $solved_smp_view->iuran_bpjs->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smp_view->bulan->Visible) { // bulan ?>
	<tr id="r_bulan">
		<td class="<?php echo $solved_smp_view->TableLeftColumnClass ?>"><span id="elh_solved_smp_bulan"><?php echo $solved_smp_view->bulan->caption() ?></span></td>
		<td data-name="bulan" <?php echo $solved_smp_view->bulan->cellAttributes() ?>>
<span id="el_solved_smp_bulan">
<span<?php echo $solved_smp_view->bulan->viewAttributes() ?>><?php echo $solved_smp_view->bulan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smp_view->tahun->Visible) { // tahun ?>
	<tr id="r_tahun">
		<td class="<?php echo $solved_smp_view->TableLeftColumnClass ?>"><span id="elh_solved_smp_tahun"><?php echo $solved_smp_view->tahun->caption() ?></span></td>
		<td data-name="tahun" <?php echo $solved_smp_view->tahun->cellAttributes() ?>>
<span id="el_solved_smp_tahun">
<span<?php echo $solved_smp_view->tahun->viewAttributes() ?>><?php echo $solved_smp_view->tahun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smp_view->type_peg->Visible) { // type_peg ?>
	<tr id="r_type_peg">
		<td class="<?php echo $solved_smp_view->TableLeftColumnClass ?>"><span id="elh_solved_smp_type_peg"><?php echo $solved_smp_view->type_peg->caption() ?></span></td>
		<td data-name="type_peg" <?php echo $solved_smp_view->type_peg->cellAttributes() ?>>
<span id="el_solved_smp_type_peg">
<span<?php echo $solved_smp_view->type_peg->viewAttributes() ?>><?php echo $solved_smp_view->type_peg->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smp_view->unit->Visible) { // unit ?>
	<tr id="r_unit">
		<td class="<?php echo $solved_smp_view->TableLeftColumnClass ?>"><span id="elh_solved_smp_unit"><?php echo $solved_smp_view->unit->caption() ?></span></td>
		<td data-name="unit" <?php echo $solved_smp_view->unit->cellAttributes() ?>>
<span id="el_solved_smp_unit">
<span<?php echo $solved_smp_view->unit->viewAttributes() ?>><?php echo $solved_smp_view->unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smp_view->tanggal->Visible) { // tanggal ?>
	<tr id="r_tanggal">
		<td class="<?php echo $solved_smp_view->TableLeftColumnClass ?>"><span id="elh_solved_smp_tanggal"><?php echo $solved_smp_view->tanggal->caption() ?></span></td>
		<td data-name="tanggal" <?php echo $solved_smp_view->tanggal->cellAttributes() ?>>
<span id="el_solved_smp_tanggal">
<span<?php echo $solved_smp_view->tanggal->viewAttributes() ?>><?php echo $solved_smp_view->tanggal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$solved_smp_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$solved_smp_view->isExport()) { ?>
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
$solved_smp_view->terminate();
?>