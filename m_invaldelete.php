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
$m_inval_delete = new m_inval_delete();

// Run the page
$m_inval_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_inval_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_invaldelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fm_invaldelete = currentForm = new ew.Form("fm_invaldelete", "delete");
	loadjs.done("fm_invaldelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_inval_delete->showPageHeader(); ?>
<?php
$m_inval_delete->showMessage();
?>
<form name="fm_invaldelete" id="fm_invaldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_inval">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($m_inval_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($m_inval_delete->jenjang_id->Visible) { // jenjang_id ?>
		<th class="<?php echo $m_inval_delete->jenjang_id->headerCellClass() ?>"><span id="elh_m_inval_jenjang_id" class="m_inval_jenjang_id"><?php echo $m_inval_delete->jenjang_id->caption() ?></span></th>
<?php } ?>
<?php if ($m_inval_delete->jabatan_id->Visible) { // jabatan_id ?>
		<th class="<?php echo $m_inval_delete->jabatan_id->headerCellClass() ?>"><span id="elh_m_inval_jabatan_id" class="m_inval_jabatan_id"><?php echo $m_inval_delete->jabatan_id->caption() ?></span></th>
<?php } ?>
<?php if ($m_inval_delete->value->Visible) { // value ?>
		<th class="<?php echo $m_inval_delete->value->headerCellClass() ?>"><span id="elh_m_inval_value" class="m_inval_value"><?php echo $m_inval_delete->value->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$m_inval_delete->RecordCount = 0;
$i = 0;
while (!$m_inval_delete->Recordset->EOF) {
	$m_inval_delete->RecordCount++;
	$m_inval_delete->RowCount++;

	// Set row properties
	$m_inval->resetAttributes();
	$m_inval->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$m_inval_delete->loadRowValues($m_inval_delete->Recordset);

	// Render row
	$m_inval_delete->renderRow();
?>
	<tr <?php echo $m_inval->rowAttributes() ?>>
<?php if ($m_inval_delete->jenjang_id->Visible) { // jenjang_id ?>
		<td <?php echo $m_inval_delete->jenjang_id->cellAttributes() ?>>
<span id="el<?php echo $m_inval_delete->RowCount ?>_m_inval_jenjang_id" class="m_inval_jenjang_id">
<span<?php echo $m_inval_delete->jenjang_id->viewAttributes() ?>><?php echo $m_inval_delete->jenjang_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_inval_delete->jabatan_id->Visible) { // jabatan_id ?>
		<td <?php echo $m_inval_delete->jabatan_id->cellAttributes() ?>>
<span id="el<?php echo $m_inval_delete->RowCount ?>_m_inval_jabatan_id" class="m_inval_jabatan_id">
<span<?php echo $m_inval_delete->jabatan_id->viewAttributes() ?>><?php echo $m_inval_delete->jabatan_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_inval_delete->value->Visible) { // value ?>
		<td <?php echo $m_inval_delete->value->cellAttributes() ?>>
<span id="el<?php echo $m_inval_delete->RowCount ?>_m_inval_value" class="m_inval_value">
<span<?php echo $m_inval_delete->value->viewAttributes() ?>><?php echo $m_inval_delete->value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$m_inval_delete->Recordset->moveNext();
}
$m_inval_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_inval_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$m_inval_delete->showPageFooter();
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
$m_inval_delete->terminate();
?>