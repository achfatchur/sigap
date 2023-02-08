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
$tunjangan_khusus_delete = new tunjangan_khusus_delete();

// Run the page
$tunjangan_khusus_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tunjangan_khusus_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftunjangan_khususdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ftunjangan_khususdelete = currentForm = new ew.Form("ftunjangan_khususdelete", "delete");
	loadjs.done("ftunjangan_khususdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tunjangan_khusus_delete->showPageHeader(); ?>
<?php
$tunjangan_khusus_delete->showMessage();
?>
<form name="ftunjangan_khususdelete" id="ftunjangan_khususdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tunjangan_khusus">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tunjangan_khusus_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tunjangan_khusus_delete->unit->Visible) { // unit ?>
		<th class="<?php echo $tunjangan_khusus_delete->unit->headerCellClass() ?>"><span id="elh_tunjangan_khusus_unit" class="tunjangan_khusus_unit"><?php echo $tunjangan_khusus_delete->unit->caption() ?></span></th>
<?php } ?>
<?php if ($tunjangan_khusus_delete->jabatan->Visible) { // jabatan ?>
		<th class="<?php echo $tunjangan_khusus_delete->jabatan->headerCellClass() ?>"><span id="elh_tunjangan_khusus_jabatan" class="tunjangan_khusus_jabatan"><?php echo $tunjangan_khusus_delete->jabatan->caption() ?></span></th>
<?php } ?>
<?php if ($tunjangan_khusus_delete->value->Visible) { // value ?>
		<th class="<?php echo $tunjangan_khusus_delete->value->headerCellClass() ?>"><span id="elh_tunjangan_khusus_value" class="tunjangan_khusus_value"><?php echo $tunjangan_khusus_delete->value->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tunjangan_khusus_delete->RecordCount = 0;
$i = 0;
while (!$tunjangan_khusus_delete->Recordset->EOF) {
	$tunjangan_khusus_delete->RecordCount++;
	$tunjangan_khusus_delete->RowCount++;

	// Set row properties
	$tunjangan_khusus->resetAttributes();
	$tunjangan_khusus->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tunjangan_khusus_delete->loadRowValues($tunjangan_khusus_delete->Recordset);

	// Render row
	$tunjangan_khusus_delete->renderRow();
?>
	<tr <?php echo $tunjangan_khusus->rowAttributes() ?>>
<?php if ($tunjangan_khusus_delete->unit->Visible) { // unit ?>
		<td <?php echo $tunjangan_khusus_delete->unit->cellAttributes() ?>>
<span id="el<?php echo $tunjangan_khusus_delete->RowCount ?>_tunjangan_khusus_unit" class="tunjangan_khusus_unit">
<span<?php echo $tunjangan_khusus_delete->unit->viewAttributes() ?>><?php echo $tunjangan_khusus_delete->unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tunjangan_khusus_delete->jabatan->Visible) { // jabatan ?>
		<td <?php echo $tunjangan_khusus_delete->jabatan->cellAttributes() ?>>
<span id="el<?php echo $tunjangan_khusus_delete->RowCount ?>_tunjangan_khusus_jabatan" class="tunjangan_khusus_jabatan">
<span<?php echo $tunjangan_khusus_delete->jabatan->viewAttributes() ?>><?php echo $tunjangan_khusus_delete->jabatan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tunjangan_khusus_delete->value->Visible) { // value ?>
		<td <?php echo $tunjangan_khusus_delete->value->cellAttributes() ?>>
<span id="el<?php echo $tunjangan_khusus_delete->RowCount ?>_tunjangan_khusus_value" class="tunjangan_khusus_value">
<span<?php echo $tunjangan_khusus_delete->value->viewAttributes() ?>><?php echo $tunjangan_khusus_delete->value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tunjangan_khusus_delete->Recordset->moveNext();
}
$tunjangan_khusus_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tunjangan_khusus_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tunjangan_khusus_delete->showPageFooter();
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
$tunjangan_khusus_delete->terminate();
?>