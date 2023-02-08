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
$semester_delete = new semester_delete();

// Run the page
$semester_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$semester_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsemesterdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fsemesterdelete = currentForm = new ew.Form("fsemesterdelete", "delete");
	loadjs.done("fsemesterdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $semester_delete->showPageHeader(); ?>
<?php
$semester_delete->showMessage();
?>
<form name="fsemesterdelete" id="fsemesterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="semester">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($semester_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($semester_delete->nama->Visible) { // nama ?>
		<th class="<?php echo $semester_delete->nama->headerCellClass() ?>"><span id="elh_semester_nama" class="semester_nama"><?php echo $semester_delete->nama->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$semester_delete->RecordCount = 0;
$i = 0;
while (!$semester_delete->Recordset->EOF) {
	$semester_delete->RecordCount++;
	$semester_delete->RowCount++;

	// Set row properties
	$semester->resetAttributes();
	$semester->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$semester_delete->loadRowValues($semester_delete->Recordset);

	// Render row
	$semester_delete->renderRow();
?>
	<tr <?php echo $semester->rowAttributes() ?>>
<?php if ($semester_delete->nama->Visible) { // nama ?>
		<td <?php echo $semester_delete->nama->cellAttributes() ?>>
<span id="el<?php echo $semester_delete->RowCount ?>_semester_nama" class="semester_nama">
<span<?php echo $semester_delete->nama->viewAttributes() ?>><?php echo $semester_delete->nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$semester_delete->Recordset->moveNext();
}
$semester_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $semester_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$semester_delete->showPageFooter();
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
$semester_delete->terminate();
?>