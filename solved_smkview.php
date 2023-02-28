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
$solved_smk_view = new solved_smk_view();

// Run the page
$solved_smk_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$solved_smk_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$solved_smk_view->isExport()) { ?>
<script>
var fsolved_smkview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fsolved_smkview = currentForm = new ew.Form("fsolved_smkview", "view");
	loadjs.done("fsolved_smkview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$solved_smk_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $solved_smk_view->ExportOptions->render("body") ?>
<?php $solved_smk_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $solved_smk_view->showPageHeader(); ?>
<?php
$solved_smk_view->showMessage();
?>
<form name="fsolved_smkview" id="fsolved_smkview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="solved_smk">
<input type="hidden" name="modal" value="<?php echo (int)$solved_smk_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($solved_smk_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $solved_smk_view->TableLeftColumnClass ?>"><span id="elh_solved_smk_id"><?php echo $solved_smk_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $solved_smk_view->id->cellAttributes() ?>>
<span id="el_solved_smk_id">
<span<?php echo $solved_smk_view->id->viewAttributes() ?>><?php echo $solved_smk_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smk_view->nip->Visible) { // nip ?>
	<tr id="r_nip">
		<td class="<?php echo $solved_smk_view->TableLeftColumnClass ?>"><span id="elh_solved_smk_nip"><?php echo $solved_smk_view->nip->caption() ?></span></td>
		<td data-name="nip" <?php echo $solved_smk_view->nip->cellAttributes() ?>>
<span id="el_solved_smk_nip">
<span<?php echo $solved_smk_view->nip->viewAttributes() ?>><?php echo $solved_smk_view->nip->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smk_view->total_gaji->Visible) { // total_gaji ?>
	<tr id="r_total_gaji">
		<td class="<?php echo $solved_smk_view->TableLeftColumnClass ?>"><span id="elh_solved_smk_total_gaji"><?php echo $solved_smk_view->total_gaji->caption() ?></span></td>
		<td data-name="total_gaji" <?php echo $solved_smk_view->total_gaji->cellAttributes() ?>>
<span id="el_solved_smk_total_gaji">
<span<?php echo $solved_smk_view->total_gaji->viewAttributes() ?>><?php echo $solved_smk_view->total_gaji->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smk_view->j_pensiun->Visible) { // j_pensiun ?>
	<tr id="r_j_pensiun">
		<td class="<?php echo $solved_smk_view->TableLeftColumnClass ?>"><span id="elh_solved_smk_j_pensiun"><?php echo $solved_smk_view->j_pensiun->caption() ?></span></td>
		<td data-name="j_pensiun" <?php echo $solved_smk_view->j_pensiun->cellAttributes() ?>>
<span id="el_solved_smk_j_pensiun">
<span<?php echo $solved_smk_view->j_pensiun->viewAttributes() ?>><?php echo $solved_smk_view->j_pensiun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smk_view->hari_tua->Visible) { // hari_tua ?>
	<tr id="r_hari_tua">
		<td class="<?php echo $solved_smk_view->TableLeftColumnClass ?>"><span id="elh_solved_smk_hari_tua"><?php echo $solved_smk_view->hari_tua->caption() ?></span></td>
		<td data-name="hari_tua" <?php echo $solved_smk_view->hari_tua->cellAttributes() ?>>
<span id="el_solved_smk_hari_tua">
<span<?php echo $solved_smk_view->hari_tua->viewAttributes() ?>><?php echo $solved_smk_view->hari_tua->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smk_view->pph21->Visible) { // pph21 ?>
	<tr id="r_pph21">
		<td class="<?php echo $solved_smk_view->TableLeftColumnClass ?>"><span id="elh_solved_smk_pph21"><?php echo $solved_smk_view->pph21->caption() ?></span></td>
		<td data-name="pph21" <?php echo $solved_smk_view->pph21->cellAttributes() ?>>
<span id="el_solved_smk_pph21">
<span<?php echo $solved_smk_view->pph21->viewAttributes() ?>><?php echo $solved_smk_view->pph21->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smk_view->golongan_bpjs->Visible) { // golongan_bpjs ?>
	<tr id="r_golongan_bpjs">
		<td class="<?php echo $solved_smk_view->TableLeftColumnClass ?>"><span id="elh_solved_smk_golongan_bpjs"><?php echo $solved_smk_view->golongan_bpjs->caption() ?></span></td>
		<td data-name="golongan_bpjs" <?php echo $solved_smk_view->golongan_bpjs->cellAttributes() ?>>
<span id="el_solved_smk_golongan_bpjs">
<span<?php echo $solved_smk_view->golongan_bpjs->viewAttributes() ?>><?php echo $solved_smk_view->golongan_bpjs->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smk_view->iuran_bpjs->Visible) { // iuran_bpjs ?>
	<tr id="r_iuran_bpjs">
		<td class="<?php echo $solved_smk_view->TableLeftColumnClass ?>"><span id="elh_solved_smk_iuran_bpjs"><?php echo $solved_smk_view->iuran_bpjs->caption() ?></span></td>
		<td data-name="iuran_bpjs" <?php echo $solved_smk_view->iuran_bpjs->cellAttributes() ?>>
<span id="el_solved_smk_iuran_bpjs">
<span<?php echo $solved_smk_view->iuran_bpjs->viewAttributes() ?>><?php echo $solved_smk_view->iuran_bpjs->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smk_view->bulan->Visible) { // bulan ?>
	<tr id="r_bulan">
		<td class="<?php echo $solved_smk_view->TableLeftColumnClass ?>"><span id="elh_solved_smk_bulan"><?php echo $solved_smk_view->bulan->caption() ?></span></td>
		<td data-name="bulan" <?php echo $solved_smk_view->bulan->cellAttributes() ?>>
<span id="el_solved_smk_bulan">
<span<?php echo $solved_smk_view->bulan->viewAttributes() ?>><?php echo $solved_smk_view->bulan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smk_view->tahun->Visible) { // tahun ?>
	<tr id="r_tahun">
		<td class="<?php echo $solved_smk_view->TableLeftColumnClass ?>"><span id="elh_solved_smk_tahun"><?php echo $solved_smk_view->tahun->caption() ?></span></td>
		<td data-name="tahun" <?php echo $solved_smk_view->tahun->cellAttributes() ?>>
<span id="el_solved_smk_tahun">
<span<?php echo $solved_smk_view->tahun->viewAttributes() ?>><?php echo $solved_smk_view->tahun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smk_view->type_peg->Visible) { // type_peg ?>
	<tr id="r_type_peg">
		<td class="<?php echo $solved_smk_view->TableLeftColumnClass ?>"><span id="elh_solved_smk_type_peg"><?php echo $solved_smk_view->type_peg->caption() ?></span></td>
		<td data-name="type_peg" <?php echo $solved_smk_view->type_peg->cellAttributes() ?>>
<span id="el_solved_smk_type_peg">
<span<?php echo $solved_smk_view->type_peg->viewAttributes() ?>><?php echo $solved_smk_view->type_peg->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smk_view->unit->Visible) { // unit ?>
	<tr id="r_unit">
		<td class="<?php echo $solved_smk_view->TableLeftColumnClass ?>"><span id="elh_solved_smk_unit"><?php echo $solved_smk_view->unit->caption() ?></span></td>
		<td data-name="unit" <?php echo $solved_smk_view->unit->cellAttributes() ?>>
<span id="el_solved_smk_unit">
<span<?php echo $solved_smk_view->unit->viewAttributes() ?>><?php echo $solved_smk_view->unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($solved_smk_view->tanggal->Visible) { // tanggal ?>
	<tr id="r_tanggal">
		<td class="<?php echo $solved_smk_view->TableLeftColumnClass ?>"><span id="elh_solved_smk_tanggal"><?php echo $solved_smk_view->tanggal->caption() ?></span></td>
		<td data-name="tanggal" <?php echo $solved_smk_view->tanggal->cellAttributes() ?>>
<span id="el_solved_smk_tanggal">
<span<?php echo $solved_smk_view->tanggal->viewAttributes() ?>><?php echo $solved_smk_view->tanggal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$solved_smk_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$solved_smk_view->isExport()) { ?>
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
$solved_smk_view->terminate();
?>