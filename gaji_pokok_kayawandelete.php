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
$gaji_pokok_kayawan_delete = new gaji_pokok_kayawan_delete();

// Run the page
$gaji_pokok_kayawan_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_pokok_kayawan_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fgaji_pokok_kayawandelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fgaji_pokok_kayawandelete = currentForm = new ew.Form("fgaji_pokok_kayawandelete", "delete");
	loadjs.done("fgaji_pokok_kayawandelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $gaji_pokok_kayawan_delete->showPageHeader(); ?>
<?php
$gaji_pokok_kayawan_delete->showMessage();
?>
<form name="fgaji_pokok_kayawandelete" id="fgaji_pokok_kayawandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="gaji_pokok_kayawan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($gaji_pokok_kayawan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($gaji_pokok_kayawan_delete->jenjang_id->Visible) { // jenjang_id ?>
		<th class="<?php echo $gaji_pokok_kayawan_delete->jenjang_id->headerCellClass() ?>"><span id="elh_gaji_pokok_kayawan_jenjang_id" class="gaji_pokok_kayawan_jenjang_id"><?php echo $gaji_pokok_kayawan_delete->jenjang_id->caption() ?></span></th>
<?php } ?>
<?php if ($gaji_pokok_kayawan_delete->jabatan_id->Visible) { // jabatan_id ?>
		<th class="<?php echo $gaji_pokok_kayawan_delete->jabatan_id->headerCellClass() ?>"><span id="elh_gaji_pokok_kayawan_jabatan_id" class="gaji_pokok_kayawan_jabatan_id"><?php echo $gaji_pokok_kayawan_delete->jabatan_id->caption() ?></span></th>
<?php } ?>
<?php if ($gaji_pokok_kayawan_delete->value->Visible) { // value ?>
		<th class="<?php echo $gaji_pokok_kayawan_delete->value->headerCellClass() ?>"><span id="elh_gaji_pokok_kayawan_value" class="gaji_pokok_kayawan_value"><?php echo $gaji_pokok_kayawan_delete->value->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$gaji_pokok_kayawan_delete->RecordCount = 0;
$i = 0;
while (!$gaji_pokok_kayawan_delete->Recordset->EOF) {
	$gaji_pokok_kayawan_delete->RecordCount++;
	$gaji_pokok_kayawan_delete->RowCount++;

	// Set row properties
	$gaji_pokok_kayawan->resetAttributes();
	$gaji_pokok_kayawan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$gaji_pokok_kayawan_delete->loadRowValues($gaji_pokok_kayawan_delete->Recordset);

	// Render row
	$gaji_pokok_kayawan_delete->renderRow();
?>
	<tr <?php echo $gaji_pokok_kayawan->rowAttributes() ?>>
<?php if ($gaji_pokok_kayawan_delete->jenjang_id->Visible) { // jenjang_id ?>
		<td <?php echo $gaji_pokok_kayawan_delete->jenjang_id->cellAttributes() ?>>
<span id="el<?php echo $gaji_pokok_kayawan_delete->RowCount ?>_gaji_pokok_kayawan_jenjang_id" class="gaji_pokok_kayawan_jenjang_id">
<span<?php echo $gaji_pokok_kayawan_delete->jenjang_id->viewAttributes() ?>><?php echo $gaji_pokok_kayawan_delete->jenjang_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gaji_pokok_kayawan_delete->jabatan_id->Visible) { // jabatan_id ?>
		<td <?php echo $gaji_pokok_kayawan_delete->jabatan_id->cellAttributes() ?>>
<span id="el<?php echo $gaji_pokok_kayawan_delete->RowCount ?>_gaji_pokok_kayawan_jabatan_id" class="gaji_pokok_kayawan_jabatan_id">
<span<?php echo $gaji_pokok_kayawan_delete->jabatan_id->viewAttributes() ?>><?php echo $gaji_pokok_kayawan_delete->jabatan_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gaji_pokok_kayawan_delete->value->Visible) { // value ?>
		<td <?php echo $gaji_pokok_kayawan_delete->value->cellAttributes() ?>>
<span id="el<?php echo $gaji_pokok_kayawan_delete->RowCount ?>_gaji_pokok_kayawan_value" class="gaji_pokok_kayawan_value">
<span<?php echo $gaji_pokok_kayawan_delete->value->viewAttributes() ?>><?php echo $gaji_pokok_kayawan_delete->value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$gaji_pokok_kayawan_delete->Recordset->moveNext();
}
$gaji_pokok_kayawan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $gaji_pokok_kayawan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$gaji_pokok_kayawan_delete->showPageFooter();
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
$gaji_pokok_kayawan_delete->terminate();
?>