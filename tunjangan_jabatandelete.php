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
$tunjangan_jabatan_delete = new tunjangan_jabatan_delete();

// Run the page
$tunjangan_jabatan_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tunjangan_jabatan_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftunjangan_jabatandelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ftunjangan_jabatandelete = currentForm = new ew.Form("ftunjangan_jabatandelete", "delete");
	loadjs.done("ftunjangan_jabatandelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tunjangan_jabatan_delete->showPageHeader(); ?>
<?php
$tunjangan_jabatan_delete->showMessage();
?>
<form name="ftunjangan_jabatandelete" id="ftunjangan_jabatandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tunjangan_jabatan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tunjangan_jabatan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tunjangan_jabatan_delete->unit->Visible) { // unit ?>
		<th class="<?php echo $tunjangan_jabatan_delete->unit->headerCellClass() ?>"><span id="elh_tunjangan_jabatan_unit" class="tunjangan_jabatan_unit"><?php echo $tunjangan_jabatan_delete->unit->caption() ?></span></th>
<?php } ?>
<?php if ($tunjangan_jabatan_delete->jabatan->Visible) { // jabatan ?>
		<th class="<?php echo $tunjangan_jabatan_delete->jabatan->headerCellClass() ?>"><span id="elh_tunjangan_jabatan_jabatan" class="tunjangan_jabatan_jabatan"><?php echo $tunjangan_jabatan_delete->jabatan->caption() ?></span></th>
<?php } ?>
<?php if ($tunjangan_jabatan_delete->value->Visible) { // value ?>
		<th class="<?php echo $tunjangan_jabatan_delete->value->headerCellClass() ?>"><span id="elh_tunjangan_jabatan_value" class="tunjangan_jabatan_value"><?php echo $tunjangan_jabatan_delete->value->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tunjangan_jabatan_delete->RecordCount = 0;
$i = 0;
while (!$tunjangan_jabatan_delete->Recordset->EOF) {
	$tunjangan_jabatan_delete->RecordCount++;
	$tunjangan_jabatan_delete->RowCount++;

	// Set row properties
	$tunjangan_jabatan->resetAttributes();
	$tunjangan_jabatan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tunjangan_jabatan_delete->loadRowValues($tunjangan_jabatan_delete->Recordset);

	// Render row
	$tunjangan_jabatan_delete->renderRow();
?>
	<tr <?php echo $tunjangan_jabatan->rowAttributes() ?>>
<?php if ($tunjangan_jabatan_delete->unit->Visible) { // unit ?>
		<td <?php echo $tunjangan_jabatan_delete->unit->cellAttributes() ?>>
<span id="el<?php echo $tunjangan_jabatan_delete->RowCount ?>_tunjangan_jabatan_unit" class="tunjangan_jabatan_unit">
<span<?php echo $tunjangan_jabatan_delete->unit->viewAttributes() ?>><?php echo $tunjangan_jabatan_delete->unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tunjangan_jabatan_delete->jabatan->Visible) { // jabatan ?>
		<td <?php echo $tunjangan_jabatan_delete->jabatan->cellAttributes() ?>>
<span id="el<?php echo $tunjangan_jabatan_delete->RowCount ?>_tunjangan_jabatan_jabatan" class="tunjangan_jabatan_jabatan">
<span<?php echo $tunjangan_jabatan_delete->jabatan->viewAttributes() ?>><?php echo $tunjangan_jabatan_delete->jabatan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tunjangan_jabatan_delete->value->Visible) { // value ?>
		<td <?php echo $tunjangan_jabatan_delete->value->cellAttributes() ?>>
<span id="el<?php echo $tunjangan_jabatan_delete->RowCount ?>_tunjangan_jabatan_value" class="tunjangan_jabatan_value">
<span<?php echo $tunjangan_jabatan_delete->value->viewAttributes() ?>><?php echo $tunjangan_jabatan_delete->value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tunjangan_jabatan_delete->Recordset->moveNext();
}
$tunjangan_jabatan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tunjangan_jabatan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tunjangan_jabatan_delete->showPageFooter();
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
$tunjangan_jabatan_delete->terminate();
?>