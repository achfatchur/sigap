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
$potongan_tk_delete = new potongan_tk_delete();

// Run the page
$potongan_tk_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$potongan_tk_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpotongan_tkdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpotongan_tkdelete = currentForm = new ew.Form("fpotongan_tkdelete", "delete");
	loadjs.done("fpotongan_tkdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $potongan_tk_delete->showPageHeader(); ?>
<?php
$potongan_tk_delete->showMessage();
?>
<form name="fpotongan_tkdelete" id="fpotongan_tkdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="potongan_tk">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($potongan_tk_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($potongan_tk_delete->datetime->Visible) { // datetime ?>
		<th class="<?php echo $potongan_tk_delete->datetime->headerCellClass() ?>"><span id="elh_potongan_tk_datetime" class="potongan_tk_datetime"><?php echo $potongan_tk_delete->datetime->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->u_by->Visible) { // u_by ?>
		<th class="<?php echo $potongan_tk_delete->u_by->headerCellClass() ?>"><span id="elh_potongan_tk_u_by" class="potongan_tk_u_by"><?php echo $potongan_tk_delete->u_by->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->tahun->Visible) { // tahun ?>
		<th class="<?php echo $potongan_tk_delete->tahun->headerCellClass() ?>"><span id="elh_potongan_tk_tahun" class="potongan_tk_tahun"><?php echo $potongan_tk_delete->tahun->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->bulan->Visible) { // bulan ?>
		<th class="<?php echo $potongan_tk_delete->bulan->headerCellClass() ?>"><span id="elh_potongan_tk_bulan" class="potongan_tk_bulan"><?php echo $potongan_tk_delete->bulan->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->nama->Visible) { // nama ?>
		<th class="<?php echo $potongan_tk_delete->nama->headerCellClass() ?>"><span id="elh_potongan_tk_nama" class="potongan_tk_nama"><?php echo $potongan_tk_delete->nama->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->jenjang_id->Visible) { // jenjang_id ?>
		<th class="<?php echo $potongan_tk_delete->jenjang_id->headerCellClass() ?>"><span id="elh_potongan_tk_jenjang_id" class="potongan_tk_jenjang_id"><?php echo $potongan_tk_delete->jenjang_id->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->jabatan_id->Visible) { // jabatan_id ?>
		<th class="<?php echo $potongan_tk_delete->jabatan_id->headerCellClass() ?>"><span id="elh_potongan_tk_jabatan_id" class="potongan_tk_jabatan_id"><?php echo $potongan_tk_delete->jabatan_id->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->sertif->Visible) { // sertif ?>
		<th class="<?php echo $potongan_tk_delete->sertif->headerCellClass() ?>"><span id="elh_potongan_tk_sertif" class="potongan_tk_sertif"><?php echo $potongan_tk_delete->sertif->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->terlambat->Visible) { // terlambat ?>
		<th class="<?php echo $potongan_tk_delete->terlambat->headerCellClass() ?>"><span id="elh_potongan_tk_terlambat" class="potongan_tk_terlambat"><?php echo $potongan_tk_delete->terlambat->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->value_terlambat->Visible) { // value_terlambat ?>
		<th class="<?php echo $potongan_tk_delete->value_terlambat->headerCellClass() ?>"><span id="elh_potongan_tk_value_terlambat" class="potongan_tk_value_terlambat"><?php echo $potongan_tk_delete->value_terlambat->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->izin->Visible) { // izin ?>
		<th class="<?php echo $potongan_tk_delete->izin->headerCellClass() ?>"><span id="elh_potongan_tk_izin" class="potongan_tk_izin"><?php echo $potongan_tk_delete->izin->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->value_izin->Visible) { // value_izin ?>
		<th class="<?php echo $potongan_tk_delete->value_izin->headerCellClass() ?>"><span id="elh_potongan_tk_value_izin" class="potongan_tk_value_izin"><?php echo $potongan_tk_delete->value_izin->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->izinperjam->Visible) { // izinperjam ?>
		<th class="<?php echo $potongan_tk_delete->izinperjam->headerCellClass() ?>"><span id="elh_potongan_tk_izinperjam" class="potongan_tk_izinperjam"><?php echo $potongan_tk_delete->izinperjam->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->izinperjamvalue->Visible) { // izinperjamvalue ?>
		<th class="<?php echo $potongan_tk_delete->izinperjamvalue->headerCellClass() ?>"><span id="elh_potongan_tk_izinperjamvalue" class="potongan_tk_izinperjamvalue"><?php echo $potongan_tk_delete->izinperjamvalue->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->sakitperjam->Visible) { // sakitperjam ?>
		<th class="<?php echo $potongan_tk_delete->sakitperjam->headerCellClass() ?>"><span id="elh_potongan_tk_sakitperjam" class="potongan_tk_sakitperjam"><?php echo $potongan_tk_delete->sakitperjam->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->sakitperjamvalue->Visible) { // sakitperjamvalue ?>
		<th class="<?php echo $potongan_tk_delete->sakitperjamvalue->headerCellClass() ?>"><span id="elh_potongan_tk_sakitperjamvalue" class="potongan_tk_sakitperjamvalue"><?php echo $potongan_tk_delete->sakitperjamvalue->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->pulcep->Visible) { // pulcep ?>
		<th class="<?php echo $potongan_tk_delete->pulcep->headerCellClass() ?>"><span id="elh_potongan_tk_pulcep" class="potongan_tk_pulcep"><?php echo $potongan_tk_delete->pulcep->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->value_pulcep->Visible) { // value_pulcep ?>
		<th class="<?php echo $potongan_tk_delete->value_pulcep->headerCellClass() ?>"><span id="elh_potongan_tk_value_pulcep" class="potongan_tk_value_pulcep"><?php echo $potongan_tk_delete->value_pulcep->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->tidakhadirjam->Visible) { // tidakhadirjam ?>
		<th class="<?php echo $potongan_tk_delete->tidakhadirjam->headerCellClass() ?>"><span id="elh_potongan_tk_tidakhadirjam" class="potongan_tk_tidakhadirjam"><?php echo $potongan_tk_delete->tidakhadirjam->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->tidakhadirjamvalue->Visible) { // tidakhadirjamvalue ?>
		<th class="<?php echo $potongan_tk_delete->tidakhadirjamvalue->headerCellClass() ?>"><span id="elh_potongan_tk_tidakhadirjamvalue" class="potongan_tk_tidakhadirjamvalue"><?php echo $potongan_tk_delete->tidakhadirjamvalue->caption() ?></span></th>
<?php } ?>
<?php if ($potongan_tk_delete->totalpotongan->Visible) { // totalpotongan ?>
		<th class="<?php echo $potongan_tk_delete->totalpotongan->headerCellClass() ?>"><span id="elh_potongan_tk_totalpotongan" class="potongan_tk_totalpotongan"><?php echo $potongan_tk_delete->totalpotongan->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$potongan_tk_delete->RecordCount = 0;
$i = 0;
while (!$potongan_tk_delete->Recordset->EOF) {
	$potongan_tk_delete->RecordCount++;
	$potongan_tk_delete->RowCount++;

	// Set row properties
	$potongan_tk->resetAttributes();
	$potongan_tk->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$potongan_tk_delete->loadRowValues($potongan_tk_delete->Recordset);

	// Render row
	$potongan_tk_delete->renderRow();
?>
	<tr <?php echo $potongan_tk->rowAttributes() ?>>
<?php if ($potongan_tk_delete->datetime->Visible) { // datetime ?>
		<td <?php echo $potongan_tk_delete->datetime->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_datetime" class="potongan_tk_datetime">
<span<?php echo $potongan_tk_delete->datetime->viewAttributes() ?>><?php echo $potongan_tk_delete->datetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->u_by->Visible) { // u_by ?>
		<td <?php echo $potongan_tk_delete->u_by->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_u_by" class="potongan_tk_u_by">
<span<?php echo $potongan_tk_delete->u_by->viewAttributes() ?>><?php echo $potongan_tk_delete->u_by->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->tahun->Visible) { // tahun ?>
		<td <?php echo $potongan_tk_delete->tahun->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_tahun" class="potongan_tk_tahun">
<span<?php echo $potongan_tk_delete->tahun->viewAttributes() ?>><?php echo $potongan_tk_delete->tahun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->bulan->Visible) { // bulan ?>
		<td <?php echo $potongan_tk_delete->bulan->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_bulan" class="potongan_tk_bulan">
<span<?php echo $potongan_tk_delete->bulan->viewAttributes() ?>><?php echo $potongan_tk_delete->bulan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->nama->Visible) { // nama ?>
		<td <?php echo $potongan_tk_delete->nama->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_nama" class="potongan_tk_nama">
<span<?php echo $potongan_tk_delete->nama->viewAttributes() ?>><?php echo $potongan_tk_delete->nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->jenjang_id->Visible) { // jenjang_id ?>
		<td <?php echo $potongan_tk_delete->jenjang_id->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_jenjang_id" class="potongan_tk_jenjang_id">
<span<?php echo $potongan_tk_delete->jenjang_id->viewAttributes() ?>><?php echo $potongan_tk_delete->jenjang_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->jabatan_id->Visible) { // jabatan_id ?>
		<td <?php echo $potongan_tk_delete->jabatan_id->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_jabatan_id" class="potongan_tk_jabatan_id">
<span<?php echo $potongan_tk_delete->jabatan_id->viewAttributes() ?>><?php echo $potongan_tk_delete->jabatan_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->sertif->Visible) { // sertif ?>
		<td <?php echo $potongan_tk_delete->sertif->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_sertif" class="potongan_tk_sertif">
<span<?php echo $potongan_tk_delete->sertif->viewAttributes() ?>><?php echo $potongan_tk_delete->sertif->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->terlambat->Visible) { // terlambat ?>
		<td <?php echo $potongan_tk_delete->terlambat->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_terlambat" class="potongan_tk_terlambat">
<span<?php echo $potongan_tk_delete->terlambat->viewAttributes() ?>><?php echo $potongan_tk_delete->terlambat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->value_terlambat->Visible) { // value_terlambat ?>
		<td <?php echo $potongan_tk_delete->value_terlambat->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_value_terlambat" class="potongan_tk_value_terlambat">
<span<?php echo $potongan_tk_delete->value_terlambat->viewAttributes() ?>><?php echo $potongan_tk_delete->value_terlambat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->izin->Visible) { // izin ?>
		<td <?php echo $potongan_tk_delete->izin->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_izin" class="potongan_tk_izin">
<span<?php echo $potongan_tk_delete->izin->viewAttributes() ?>><?php echo $potongan_tk_delete->izin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->value_izin->Visible) { // value_izin ?>
		<td <?php echo $potongan_tk_delete->value_izin->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_value_izin" class="potongan_tk_value_izin">
<span<?php echo $potongan_tk_delete->value_izin->viewAttributes() ?>><?php echo $potongan_tk_delete->value_izin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->izinperjam->Visible) { // izinperjam ?>
		<td <?php echo $potongan_tk_delete->izinperjam->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_izinperjam" class="potongan_tk_izinperjam">
<span<?php echo $potongan_tk_delete->izinperjam->viewAttributes() ?>><?php echo $potongan_tk_delete->izinperjam->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->izinperjamvalue->Visible) { // izinperjamvalue ?>
		<td <?php echo $potongan_tk_delete->izinperjamvalue->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_izinperjamvalue" class="potongan_tk_izinperjamvalue">
<span<?php echo $potongan_tk_delete->izinperjamvalue->viewAttributes() ?>><?php echo $potongan_tk_delete->izinperjamvalue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->sakitperjam->Visible) { // sakitperjam ?>
		<td <?php echo $potongan_tk_delete->sakitperjam->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_sakitperjam" class="potongan_tk_sakitperjam">
<span<?php echo $potongan_tk_delete->sakitperjam->viewAttributes() ?>><?php echo $potongan_tk_delete->sakitperjam->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->sakitperjamvalue->Visible) { // sakitperjamvalue ?>
		<td <?php echo $potongan_tk_delete->sakitperjamvalue->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_sakitperjamvalue" class="potongan_tk_sakitperjamvalue">
<span<?php echo $potongan_tk_delete->sakitperjamvalue->viewAttributes() ?>><?php echo $potongan_tk_delete->sakitperjamvalue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->pulcep->Visible) { // pulcep ?>
		<td <?php echo $potongan_tk_delete->pulcep->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_pulcep" class="potongan_tk_pulcep">
<span<?php echo $potongan_tk_delete->pulcep->viewAttributes() ?>><?php echo $potongan_tk_delete->pulcep->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->value_pulcep->Visible) { // value_pulcep ?>
		<td <?php echo $potongan_tk_delete->value_pulcep->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_value_pulcep" class="potongan_tk_value_pulcep">
<span<?php echo $potongan_tk_delete->value_pulcep->viewAttributes() ?>><?php echo $potongan_tk_delete->value_pulcep->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->tidakhadirjam->Visible) { // tidakhadirjam ?>
		<td <?php echo $potongan_tk_delete->tidakhadirjam->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_tidakhadirjam" class="potongan_tk_tidakhadirjam">
<span<?php echo $potongan_tk_delete->tidakhadirjam->viewAttributes() ?>><?php echo $potongan_tk_delete->tidakhadirjam->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->tidakhadirjamvalue->Visible) { // tidakhadirjamvalue ?>
		<td <?php echo $potongan_tk_delete->tidakhadirjamvalue->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_tidakhadirjamvalue" class="potongan_tk_tidakhadirjamvalue">
<span<?php echo $potongan_tk_delete->tidakhadirjamvalue->viewAttributes() ?>><?php echo $potongan_tk_delete->tidakhadirjamvalue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($potongan_tk_delete->totalpotongan->Visible) { // totalpotongan ?>
		<td <?php echo $potongan_tk_delete->totalpotongan->cellAttributes() ?>>
<span id="el<?php echo $potongan_tk_delete->RowCount ?>_potongan_tk_totalpotongan" class="potongan_tk_totalpotongan">
<span<?php echo $potongan_tk_delete->totalpotongan->viewAttributes() ?>><?php echo $potongan_tk_delete->totalpotongan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$potongan_tk_delete->Recordset->moveNext();
}
$potongan_tk_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $potongan_tk_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$potongan_tk_delete->showPageFooter();
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
$potongan_tk_delete->terminate();
?>