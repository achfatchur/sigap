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
$status_pekerjaan_delete = new status_pekerjaan_delete();

// Run the page
$status_pekerjaan_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$status_pekerjaan_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fstatus_pekerjaandelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fstatus_pekerjaandelete = currentForm = new ew.Form("fstatus_pekerjaandelete", "delete");
	loadjs.done("fstatus_pekerjaandelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $status_pekerjaan_delete->showPageHeader(); ?>
<?php
$status_pekerjaan_delete->showMessage();
?>
<form name="fstatus_pekerjaandelete" id="fstatus_pekerjaandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="status_pekerjaan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($status_pekerjaan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($status_pekerjaan_delete->name->Visible) { // name ?>
		<th class="<?php echo $status_pekerjaan_delete->name->headerCellClass() ?>"><span id="elh_status_pekerjaan_name" class="status_pekerjaan_name"><?php echo $status_pekerjaan_delete->name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$status_pekerjaan_delete->RecordCount = 0;
$i = 0;
while (!$status_pekerjaan_delete->Recordset->EOF) {
	$status_pekerjaan_delete->RecordCount++;
	$status_pekerjaan_delete->RowCount++;

	// Set row properties
	$status_pekerjaan->resetAttributes();
	$status_pekerjaan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$status_pekerjaan_delete->loadRowValues($status_pekerjaan_delete->Recordset);

	// Render row
	$status_pekerjaan_delete->renderRow();
?>
	<tr <?php echo $status_pekerjaan->rowAttributes() ?>>
<?php if ($status_pekerjaan_delete->name->Visible) { // name ?>
		<td <?php echo $status_pekerjaan_delete->name->cellAttributes() ?>>
<span id="el<?php echo $status_pekerjaan_delete->RowCount ?>_status_pekerjaan_name" class="status_pekerjaan_name">
<span<?php echo $status_pekerjaan_delete->name->viewAttributes() ?>><?php echo $status_pekerjaan_delete->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$status_pekerjaan_delete->Recordset->moveNext();
}
$status_pekerjaan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $status_pekerjaan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$status_pekerjaan_delete->showPageFooter();
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
$status_pekerjaan_delete->terminate();
?>