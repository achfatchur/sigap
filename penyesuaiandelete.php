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
$penyesuaian_delete = new penyesuaian_delete();

// Run the page
$penyesuaian_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$penyesuaian_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpenyesuaiandelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpenyesuaiandelete = currentForm = new ew.Form("fpenyesuaiandelete", "delete");
	loadjs.done("fpenyesuaiandelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $penyesuaian_delete->showPageHeader(); ?>
<?php
$penyesuaian_delete->showMessage();
?>
<form name="fpenyesuaiandelete" id="fpenyesuaiandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="penyesuaian">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($penyesuaian_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($penyesuaian_delete->nip->Visible) { // nip ?>
		<th class="<?php echo $penyesuaian_delete->nip->headerCellClass() ?>"><span id="elh_penyesuaian_nip" class="penyesuaian_nip"><?php echo $penyesuaian_delete->nip->caption() ?></span></th>
<?php } ?>
<?php if ($penyesuaian_delete->jenjang_id->Visible) { // jenjang_id ?>
		<th class="<?php echo $penyesuaian_delete->jenjang_id->headerCellClass() ?>"><span id="elh_penyesuaian_jenjang_id" class="penyesuaian_jenjang_id"><?php echo $penyesuaian_delete->jenjang_id->caption() ?></span></th>
<?php } ?>
<?php if ($penyesuaian_delete->absen->Visible) { // absen ?>
		<th class="<?php echo $penyesuaian_delete->absen->headerCellClass() ?>"><span id="elh_penyesuaian_absen" class="penyesuaian_absen"><?php echo $penyesuaian_delete->absen->caption() ?></span></th>
<?php } ?>
<?php if ($penyesuaian_delete->absen_jam->Visible) { // absen_jam ?>
		<th class="<?php echo $penyesuaian_delete->absen_jam->headerCellClass() ?>"><span id="elh_penyesuaian_absen_jam" class="penyesuaian_absen_jam"><?php echo $penyesuaian_delete->absen_jam->caption() ?></span></th>
<?php } ?>
<?php if ($penyesuaian_delete->izin->Visible) { // izin ?>
		<th class="<?php echo $penyesuaian_delete->izin->headerCellClass() ?>"><span id="elh_penyesuaian_izin" class="penyesuaian_izin"><?php echo $penyesuaian_delete->izin->caption() ?></span></th>
<?php } ?>
<?php if ($penyesuaian_delete->izin_jam->Visible) { // izin_jam ?>
		<th class="<?php echo $penyesuaian_delete->izin_jam->headerCellClass() ?>"><span id="elh_penyesuaian_izin_jam" class="penyesuaian_izin_jam"><?php echo $penyesuaian_delete->izin_jam->caption() ?></span></th>
<?php } ?>
<?php if ($penyesuaian_delete->sakit->Visible) { // sakit ?>
		<th class="<?php echo $penyesuaian_delete->sakit->headerCellClass() ?>"><span id="elh_penyesuaian_sakit" class="penyesuaian_sakit"><?php echo $penyesuaian_delete->sakit->caption() ?></span></th>
<?php } ?>
<?php if ($penyesuaian_delete->sakit_jam->Visible) { // sakit_jam ?>
		<th class="<?php echo $penyesuaian_delete->sakit_jam->headerCellClass() ?>"><span id="elh_penyesuaian_sakit_jam" class="penyesuaian_sakit_jam"><?php echo $penyesuaian_delete->sakit_jam->caption() ?></span></th>
<?php } ?>
<?php if ($penyesuaian_delete->terlambat->Visible) { // terlambat ?>
		<th class="<?php echo $penyesuaian_delete->terlambat->headerCellClass() ?>"><span id="elh_penyesuaian_terlambat" class="penyesuaian_terlambat"><?php echo $penyesuaian_delete->terlambat->caption() ?></span></th>
<?php } ?>
<?php if ($penyesuaian_delete->pulang_cepat->Visible) { // pulang_cepat ?>
		<th class="<?php echo $penyesuaian_delete->pulang_cepat->headerCellClass() ?>"><span id="elh_penyesuaian_pulang_cepat" class="penyesuaian_pulang_cepat"><?php echo $penyesuaian_delete->pulang_cepat->caption() ?></span></th>
<?php } ?>
<?php if ($penyesuaian_delete->piket->Visible) { // piket ?>
		<th class="<?php echo $penyesuaian_delete->piket->headerCellClass() ?>"><span id="elh_penyesuaian_piket" class="penyesuaian_piket"><?php echo $penyesuaian_delete->piket->caption() ?></span></th>
<?php } ?>
<?php if ($penyesuaian_delete->inval->Visible) { // inval ?>
		<th class="<?php echo $penyesuaian_delete->inval->headerCellClass() ?>"><span id="elh_penyesuaian_inval" class="penyesuaian_inval"><?php echo $penyesuaian_delete->inval->caption() ?></span></th>
<?php } ?>
<?php if ($penyesuaian_delete->lembur->Visible) { // lembur ?>
		<th class="<?php echo $penyesuaian_delete->lembur->headerCellClass() ?>"><span id="elh_penyesuaian_lembur" class="penyesuaian_lembur"><?php echo $penyesuaian_delete->lembur->caption() ?></span></th>
<?php } ?>
<?php if ($penyesuaian_delete->voucher->Visible) { // voucher ?>
		<th class="<?php echo $penyesuaian_delete->voucher->headerCellClass() ?>"><span id="elh_penyesuaian_voucher" class="penyesuaian_voucher"><?php echo $penyesuaian_delete->voucher->caption() ?></span></th>
<?php } ?>
<?php if ($penyesuaian_delete->total->Visible) { // total ?>
		<th class="<?php echo $penyesuaian_delete->total->headerCellClass() ?>"><span id="elh_penyesuaian_total" class="penyesuaian_total"><?php echo $penyesuaian_delete->total->caption() ?></span></th>
<?php } ?>
<?php if ($penyesuaian_delete->total2->Visible) { // total2 ?>
		<th class="<?php echo $penyesuaian_delete->total2->headerCellClass() ?>"><span id="elh_penyesuaian_total2" class="penyesuaian_total2"><?php echo $penyesuaian_delete->total2->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$penyesuaian_delete->RecordCount = 0;
$i = 0;
while (!$penyesuaian_delete->Recordset->EOF) {
	$penyesuaian_delete->RecordCount++;
	$penyesuaian_delete->RowCount++;

	// Set row properties
	$penyesuaian->resetAttributes();
	$penyesuaian->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$penyesuaian_delete->loadRowValues($penyesuaian_delete->Recordset);

	// Render row
	$penyesuaian_delete->renderRow();
?>
	<tr <?php echo $penyesuaian->rowAttributes() ?>>
<?php if ($penyesuaian_delete->nip->Visible) { // nip ?>
		<td <?php echo $penyesuaian_delete->nip->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_nip" class="penyesuaian_nip">
<span<?php echo $penyesuaian_delete->nip->viewAttributes() ?>><?php echo $penyesuaian_delete->nip->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($penyesuaian_delete->jenjang_id->Visible) { // jenjang_id ?>
		<td <?php echo $penyesuaian_delete->jenjang_id->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_jenjang_id" class="penyesuaian_jenjang_id">
<span<?php echo $penyesuaian_delete->jenjang_id->viewAttributes() ?>><?php echo $penyesuaian_delete->jenjang_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($penyesuaian_delete->absen->Visible) { // absen ?>
		<td <?php echo $penyesuaian_delete->absen->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_absen" class="penyesuaian_absen">
<span<?php echo $penyesuaian_delete->absen->viewAttributes() ?>><?php echo $penyesuaian_delete->absen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($penyesuaian_delete->absen_jam->Visible) { // absen_jam ?>
		<td <?php echo $penyesuaian_delete->absen_jam->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_absen_jam" class="penyesuaian_absen_jam">
<span<?php echo $penyesuaian_delete->absen_jam->viewAttributes() ?>><?php echo $penyesuaian_delete->absen_jam->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($penyesuaian_delete->izin->Visible) { // izin ?>
		<td <?php echo $penyesuaian_delete->izin->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_izin" class="penyesuaian_izin">
<span<?php echo $penyesuaian_delete->izin->viewAttributes() ?>><?php echo $penyesuaian_delete->izin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($penyesuaian_delete->izin_jam->Visible) { // izin_jam ?>
		<td <?php echo $penyesuaian_delete->izin_jam->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_izin_jam" class="penyesuaian_izin_jam">
<span<?php echo $penyesuaian_delete->izin_jam->viewAttributes() ?>><?php echo $penyesuaian_delete->izin_jam->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($penyesuaian_delete->sakit->Visible) { // sakit ?>
		<td <?php echo $penyesuaian_delete->sakit->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_sakit" class="penyesuaian_sakit">
<span<?php echo $penyesuaian_delete->sakit->viewAttributes() ?>><?php echo $penyesuaian_delete->sakit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($penyesuaian_delete->sakit_jam->Visible) { // sakit_jam ?>
		<td <?php echo $penyesuaian_delete->sakit_jam->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_sakit_jam" class="penyesuaian_sakit_jam">
<span<?php echo $penyesuaian_delete->sakit_jam->viewAttributes() ?>><?php echo $penyesuaian_delete->sakit_jam->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($penyesuaian_delete->terlambat->Visible) { // terlambat ?>
		<td <?php echo $penyesuaian_delete->terlambat->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_terlambat" class="penyesuaian_terlambat">
<span<?php echo $penyesuaian_delete->terlambat->viewAttributes() ?>><?php echo $penyesuaian_delete->terlambat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($penyesuaian_delete->pulang_cepat->Visible) { // pulang_cepat ?>
		<td <?php echo $penyesuaian_delete->pulang_cepat->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_pulang_cepat" class="penyesuaian_pulang_cepat">
<span<?php echo $penyesuaian_delete->pulang_cepat->viewAttributes() ?>><?php echo $penyesuaian_delete->pulang_cepat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($penyesuaian_delete->piket->Visible) { // piket ?>
		<td <?php echo $penyesuaian_delete->piket->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_piket" class="penyesuaian_piket">
<span<?php echo $penyesuaian_delete->piket->viewAttributes() ?>><?php echo $penyesuaian_delete->piket->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($penyesuaian_delete->inval->Visible) { // inval ?>
		<td <?php echo $penyesuaian_delete->inval->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_inval" class="penyesuaian_inval">
<span<?php echo $penyesuaian_delete->inval->viewAttributes() ?>><?php echo $penyesuaian_delete->inval->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($penyesuaian_delete->lembur->Visible) { // lembur ?>
		<td <?php echo $penyesuaian_delete->lembur->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_lembur" class="penyesuaian_lembur">
<span<?php echo $penyesuaian_delete->lembur->viewAttributes() ?>><?php echo $penyesuaian_delete->lembur->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($penyesuaian_delete->voucher->Visible) { // voucher ?>
		<td <?php echo $penyesuaian_delete->voucher->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_voucher" class="penyesuaian_voucher">
<span<?php echo $penyesuaian_delete->voucher->viewAttributes() ?>><?php echo $penyesuaian_delete->voucher->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($penyesuaian_delete->total->Visible) { // total ?>
		<td <?php echo $penyesuaian_delete->total->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_total" class="penyesuaian_total">
<span<?php echo $penyesuaian_delete->total->viewAttributes() ?>><?php echo $penyesuaian_delete->total->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($penyesuaian_delete->total2->Visible) { // total2 ?>
		<td <?php echo $penyesuaian_delete->total2->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_delete->RowCount ?>_penyesuaian_total2" class="penyesuaian_total2">
<span<?php echo $penyesuaian_delete->total2->viewAttributes() ?>><?php echo $penyesuaian_delete->total2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$penyesuaian_delete->Recordset->moveNext();
}
$penyesuaian_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $penyesuaian_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$penyesuaian_delete->showPageFooter();
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
$penyesuaian_delete->terminate();
?>