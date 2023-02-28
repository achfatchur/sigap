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
$solved_smk_delete = new solved_smk_delete();

// Run the page
$solved_smk_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$solved_smk_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsolved_smkdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fsolved_smkdelete = currentForm = new ew.Form("fsolved_smkdelete", "delete");
	loadjs.done("fsolved_smkdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $solved_smk_delete->showPageHeader(); ?>
<?php
$solved_smk_delete->showMessage();
?>
<form name="fsolved_smkdelete" id="fsolved_smkdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="solved_smk">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($solved_smk_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($solved_smk_delete->id->Visible) { // id ?>
		<th class="<?php echo $solved_smk_delete->id->headerCellClass() ?>"><span id="elh_solved_smk_id" class="solved_smk_id"><?php echo $solved_smk_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($solved_smk_delete->nip->Visible) { // nip ?>
		<th class="<?php echo $solved_smk_delete->nip->headerCellClass() ?>"><span id="elh_solved_smk_nip" class="solved_smk_nip"><?php echo $solved_smk_delete->nip->caption() ?></span></th>
<?php } ?>
<?php if ($solved_smk_delete->total_gaji->Visible) { // total_gaji ?>
		<th class="<?php echo $solved_smk_delete->total_gaji->headerCellClass() ?>"><span id="elh_solved_smk_total_gaji" class="solved_smk_total_gaji"><?php echo $solved_smk_delete->total_gaji->caption() ?></span></th>
<?php } ?>
<?php if ($solved_smk_delete->j_pensiun->Visible) { // j_pensiun ?>
		<th class="<?php echo $solved_smk_delete->j_pensiun->headerCellClass() ?>"><span id="elh_solved_smk_j_pensiun" class="solved_smk_j_pensiun"><?php echo $solved_smk_delete->j_pensiun->caption() ?></span></th>
<?php } ?>
<?php if ($solved_smk_delete->hari_tua->Visible) { // hari_tua ?>
		<th class="<?php echo $solved_smk_delete->hari_tua->headerCellClass() ?>"><span id="elh_solved_smk_hari_tua" class="solved_smk_hari_tua"><?php echo $solved_smk_delete->hari_tua->caption() ?></span></th>
<?php } ?>
<?php if ($solved_smk_delete->pph21->Visible) { // pph21 ?>
		<th class="<?php echo $solved_smk_delete->pph21->headerCellClass() ?>"><span id="elh_solved_smk_pph21" class="solved_smk_pph21"><?php echo $solved_smk_delete->pph21->caption() ?></span></th>
<?php } ?>
<?php if ($solved_smk_delete->golongan_bpjs->Visible) { // golongan_bpjs ?>
		<th class="<?php echo $solved_smk_delete->golongan_bpjs->headerCellClass() ?>"><span id="elh_solved_smk_golongan_bpjs" class="solved_smk_golongan_bpjs"><?php echo $solved_smk_delete->golongan_bpjs->caption() ?></span></th>
<?php } ?>
<?php if ($solved_smk_delete->iuran_bpjs->Visible) { // iuran_bpjs ?>
		<th class="<?php echo $solved_smk_delete->iuran_bpjs->headerCellClass() ?>"><span id="elh_solved_smk_iuran_bpjs" class="solved_smk_iuran_bpjs"><?php echo $solved_smk_delete->iuran_bpjs->caption() ?></span></th>
<?php } ?>
<?php if ($solved_smk_delete->bulan->Visible) { // bulan ?>
		<th class="<?php echo $solved_smk_delete->bulan->headerCellClass() ?>"><span id="elh_solved_smk_bulan" class="solved_smk_bulan"><?php echo $solved_smk_delete->bulan->caption() ?></span></th>
<?php } ?>
<?php if ($solved_smk_delete->tahun->Visible) { // tahun ?>
		<th class="<?php echo $solved_smk_delete->tahun->headerCellClass() ?>"><span id="elh_solved_smk_tahun" class="solved_smk_tahun"><?php echo $solved_smk_delete->tahun->caption() ?></span></th>
<?php } ?>
<?php if ($solved_smk_delete->type_peg->Visible) { // type_peg ?>
		<th class="<?php echo $solved_smk_delete->type_peg->headerCellClass() ?>"><span id="elh_solved_smk_type_peg" class="solved_smk_type_peg"><?php echo $solved_smk_delete->type_peg->caption() ?></span></th>
<?php } ?>
<?php if ($solved_smk_delete->unit->Visible) { // unit ?>
		<th class="<?php echo $solved_smk_delete->unit->headerCellClass() ?>"><span id="elh_solved_smk_unit" class="solved_smk_unit"><?php echo $solved_smk_delete->unit->caption() ?></span></th>
<?php } ?>
<?php if ($solved_smk_delete->tanggal->Visible) { // tanggal ?>
		<th class="<?php echo $solved_smk_delete->tanggal->headerCellClass() ?>"><span id="elh_solved_smk_tanggal" class="solved_smk_tanggal"><?php echo $solved_smk_delete->tanggal->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$solved_smk_delete->RecordCount = 0;
$i = 0;
while (!$solved_smk_delete->Recordset->EOF) {
	$solved_smk_delete->RecordCount++;
	$solved_smk_delete->RowCount++;

	// Set row properties
	$solved_smk->resetAttributes();
	$solved_smk->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$solved_smk_delete->loadRowValues($solved_smk_delete->Recordset);

	// Render row
	$solved_smk_delete->renderRow();
?>
	<tr <?php echo $solved_smk->rowAttributes() ?>>
<?php if ($solved_smk_delete->id->Visible) { // id ?>
		<td <?php echo $solved_smk_delete->id->cellAttributes() ?>>
<span id="el<?php echo $solved_smk_delete->RowCount ?>_solved_smk_id" class="solved_smk_id">
<span<?php echo $solved_smk_delete->id->viewAttributes() ?>><?php echo $solved_smk_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($solved_smk_delete->nip->Visible) { // nip ?>
		<td <?php echo $solved_smk_delete->nip->cellAttributes() ?>>
<span id="el<?php echo $solved_smk_delete->RowCount ?>_solved_smk_nip" class="solved_smk_nip">
<span<?php echo $solved_smk_delete->nip->viewAttributes() ?>><?php echo $solved_smk_delete->nip->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($solved_smk_delete->total_gaji->Visible) { // total_gaji ?>
		<td <?php echo $solved_smk_delete->total_gaji->cellAttributes() ?>>
<span id="el<?php echo $solved_smk_delete->RowCount ?>_solved_smk_total_gaji" class="solved_smk_total_gaji">
<span<?php echo $solved_smk_delete->total_gaji->viewAttributes() ?>><?php echo $solved_smk_delete->total_gaji->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($solved_smk_delete->j_pensiun->Visible) { // j_pensiun ?>
		<td <?php echo $solved_smk_delete->j_pensiun->cellAttributes() ?>>
<span id="el<?php echo $solved_smk_delete->RowCount ?>_solved_smk_j_pensiun" class="solved_smk_j_pensiun">
<span<?php echo $solved_smk_delete->j_pensiun->viewAttributes() ?>><?php echo $solved_smk_delete->j_pensiun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($solved_smk_delete->hari_tua->Visible) { // hari_tua ?>
		<td <?php echo $solved_smk_delete->hari_tua->cellAttributes() ?>>
<span id="el<?php echo $solved_smk_delete->RowCount ?>_solved_smk_hari_tua" class="solved_smk_hari_tua">
<span<?php echo $solved_smk_delete->hari_tua->viewAttributes() ?>><?php echo $solved_smk_delete->hari_tua->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($solved_smk_delete->pph21->Visible) { // pph21 ?>
		<td <?php echo $solved_smk_delete->pph21->cellAttributes() ?>>
<span id="el<?php echo $solved_smk_delete->RowCount ?>_solved_smk_pph21" class="solved_smk_pph21">
<span<?php echo $solved_smk_delete->pph21->viewAttributes() ?>><?php echo $solved_smk_delete->pph21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($solved_smk_delete->golongan_bpjs->Visible) { // golongan_bpjs ?>
		<td <?php echo $solved_smk_delete->golongan_bpjs->cellAttributes() ?>>
<span id="el<?php echo $solved_smk_delete->RowCount ?>_solved_smk_golongan_bpjs" class="solved_smk_golongan_bpjs">
<span<?php echo $solved_smk_delete->golongan_bpjs->viewAttributes() ?>><?php echo $solved_smk_delete->golongan_bpjs->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($solved_smk_delete->iuran_bpjs->Visible) { // iuran_bpjs ?>
		<td <?php echo $solved_smk_delete->iuran_bpjs->cellAttributes() ?>>
<span id="el<?php echo $solved_smk_delete->RowCount ?>_solved_smk_iuran_bpjs" class="solved_smk_iuran_bpjs">
<span<?php echo $solved_smk_delete->iuran_bpjs->viewAttributes() ?>><?php echo $solved_smk_delete->iuran_bpjs->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($solved_smk_delete->bulan->Visible) { // bulan ?>
		<td <?php echo $solved_smk_delete->bulan->cellAttributes() ?>>
<span id="el<?php echo $solved_smk_delete->RowCount ?>_solved_smk_bulan" class="solved_smk_bulan">
<span<?php echo $solved_smk_delete->bulan->viewAttributes() ?>><?php echo $solved_smk_delete->bulan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($solved_smk_delete->tahun->Visible) { // tahun ?>
		<td <?php echo $solved_smk_delete->tahun->cellAttributes() ?>>
<span id="el<?php echo $solved_smk_delete->RowCount ?>_solved_smk_tahun" class="solved_smk_tahun">
<span<?php echo $solved_smk_delete->tahun->viewAttributes() ?>><?php echo $solved_smk_delete->tahun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($solved_smk_delete->type_peg->Visible) { // type_peg ?>
		<td <?php echo $solved_smk_delete->type_peg->cellAttributes() ?>>
<span id="el<?php echo $solved_smk_delete->RowCount ?>_solved_smk_type_peg" class="solved_smk_type_peg">
<span<?php echo $solved_smk_delete->type_peg->viewAttributes() ?>><?php echo $solved_smk_delete->type_peg->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($solved_smk_delete->unit->Visible) { // unit ?>
		<td <?php echo $solved_smk_delete->unit->cellAttributes() ?>>
<span id="el<?php echo $solved_smk_delete->RowCount ?>_solved_smk_unit" class="solved_smk_unit">
<span<?php echo $solved_smk_delete->unit->viewAttributes() ?>><?php echo $solved_smk_delete->unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($solved_smk_delete->tanggal->Visible) { // tanggal ?>
		<td <?php echo $solved_smk_delete->tanggal->cellAttributes() ?>>
<span id="el<?php echo $solved_smk_delete->RowCount ?>_solved_smk_tanggal" class="solved_smk_tanggal">
<span<?php echo $solved_smk_delete->tanggal->viewAttributes() ?>><?php echo $solved_smk_delete->tanggal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$solved_smk_delete->Recordset->moveNext();
}
$solved_smk_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $solved_smk_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$solved_smk_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$solved_smk_delete->terminate();
?>