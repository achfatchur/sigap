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
$yayasan_delete = new yayasan_delete();

// Run the page
$yayasan_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$yayasan_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fyayasandelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fyayasandelete = currentForm = new ew.Form("fyayasandelete", "delete");
	loadjs.done("fyayasandelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $yayasan_delete->showPageHeader(); ?>
<?php
$yayasan_delete->showMessage();
?>
<form name="fyayasandelete" id="fyayasandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="yayasan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($yayasan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($yayasan_delete->id_pegawai->Visible) { // id_pegawai ?>
		<th class="<?php echo $yayasan_delete->id_pegawai->headerCellClass() ?>"><span id="elh_yayasan_id_pegawai" class="yayasan_id_pegawai"><?php echo $yayasan_delete->id_pegawai->caption() ?></span></th>
<?php } ?>
<?php if ($yayasan_delete->gaji_pokok->Visible) { // gaji_pokok ?>
		<th class="<?php echo $yayasan_delete->gaji_pokok->headerCellClass() ?>"><span id="elh_yayasan_gaji_pokok" class="yayasan_gaji_pokok"><?php echo $yayasan_delete->gaji_pokok->caption() ?></span></th>
<?php } ?>
<?php if ($yayasan_delete->potongan->Visible) { // potongan ?>
		<th class="<?php echo $yayasan_delete->potongan->headerCellClass() ?>"><span id="elh_yayasan_potongan" class="yayasan_potongan"><?php echo $yayasan_delete->potongan->caption() ?></span></th>
<?php } ?>
<?php if ($yayasan_delete->total->Visible) { // total ?>
		<th class="<?php echo $yayasan_delete->total->headerCellClass() ?>"><span id="elh_yayasan_total" class="yayasan_total"><?php echo $yayasan_delete->total->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$yayasan_delete->RecordCount = 0;
$i = 0;
while (!$yayasan_delete->Recordset->EOF) {
	$yayasan_delete->RecordCount++;
	$yayasan_delete->RowCount++;

	// Set row properties
	$yayasan->resetAttributes();
	$yayasan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$yayasan_delete->loadRowValues($yayasan_delete->Recordset);

	// Render row
	$yayasan_delete->renderRow();
?>
	<tr <?php echo $yayasan->rowAttributes() ?>>
<?php if ($yayasan_delete->id_pegawai->Visible) { // id_pegawai ?>
		<td <?php echo $yayasan_delete->id_pegawai->cellAttributes() ?>>
<span id="el<?php echo $yayasan_delete->RowCount ?>_yayasan_id_pegawai" class="yayasan_id_pegawai">
<span<?php echo $yayasan_delete->id_pegawai->viewAttributes() ?>><?php echo $yayasan_delete->id_pegawai->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($yayasan_delete->gaji_pokok->Visible) { // gaji_pokok ?>
		<td <?php echo $yayasan_delete->gaji_pokok->cellAttributes() ?>>
<span id="el<?php echo $yayasan_delete->RowCount ?>_yayasan_gaji_pokok" class="yayasan_gaji_pokok">
<span<?php echo $yayasan_delete->gaji_pokok->viewAttributes() ?>><?php echo $yayasan_delete->gaji_pokok->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($yayasan_delete->potongan->Visible) { // potongan ?>
		<td <?php echo $yayasan_delete->potongan->cellAttributes() ?>>
<span id="el<?php echo $yayasan_delete->RowCount ?>_yayasan_potongan" class="yayasan_potongan">
<span<?php echo $yayasan_delete->potongan->viewAttributes() ?>><?php echo $yayasan_delete->potongan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($yayasan_delete->total->Visible) { // total ?>
		<td <?php echo $yayasan_delete->total->cellAttributes() ?>>
<span id="el<?php echo $yayasan_delete->RowCount ?>_yayasan_total" class="yayasan_total">
<span<?php echo $yayasan_delete->total->viewAttributes() ?>><?php echo $yayasan_delete->total->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$yayasan_delete->Recordset->moveNext();
}
$yayasan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $yayasan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$yayasan_delete->showPageFooter();
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
$yayasan_delete->terminate();
?>