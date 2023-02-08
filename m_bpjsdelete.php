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
$m_bpjs_delete = new m_bpjs_delete();

// Run the page
$m_bpjs_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_bpjs_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_bpjsdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fm_bpjsdelete = currentForm = new ew.Form("fm_bpjsdelete", "delete");
	loadjs.done("fm_bpjsdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_bpjs_delete->showPageHeader(); ?>
<?php
$m_bpjs_delete->showMessage();
?>
<form name="fm_bpjsdelete" id="fm_bpjsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_bpjs">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($m_bpjs_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($m_bpjs_delete->jenjang->Visible) { // jenjang ?>
		<th class="<?php echo $m_bpjs_delete->jenjang->headerCellClass() ?>"><span id="elh_m_bpjs_jenjang" class="m_bpjs_jenjang"><?php echo $m_bpjs_delete->jenjang->caption() ?></span></th>
<?php } ?>
<?php if ($m_bpjs_delete->golongan->Visible) { // golongan ?>
		<th class="<?php echo $m_bpjs_delete->golongan->headerCellClass() ?>"><span id="elh_m_bpjs_golongan" class="m_bpjs_golongan"><?php echo $m_bpjs_delete->golongan->caption() ?></span></th>
<?php } ?>
<?php if ($m_bpjs_delete->value->Visible) { // value ?>
		<th class="<?php echo $m_bpjs_delete->value->headerCellClass() ?>"><span id="elh_m_bpjs_value" class="m_bpjs_value"><?php echo $m_bpjs_delete->value->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$m_bpjs_delete->RecordCount = 0;
$i = 0;
while (!$m_bpjs_delete->Recordset->EOF) {
	$m_bpjs_delete->RecordCount++;
	$m_bpjs_delete->RowCount++;

	// Set row properties
	$m_bpjs->resetAttributes();
	$m_bpjs->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$m_bpjs_delete->loadRowValues($m_bpjs_delete->Recordset);

	// Render row
	$m_bpjs_delete->renderRow();
?>
	<tr <?php echo $m_bpjs->rowAttributes() ?>>
<?php if ($m_bpjs_delete->jenjang->Visible) { // jenjang ?>
		<td <?php echo $m_bpjs_delete->jenjang->cellAttributes() ?>>
<span id="el<?php echo $m_bpjs_delete->RowCount ?>_m_bpjs_jenjang" class="m_bpjs_jenjang">
<span<?php echo $m_bpjs_delete->jenjang->viewAttributes() ?>><?php echo $m_bpjs_delete->jenjang->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_bpjs_delete->golongan->Visible) { // golongan ?>
		<td <?php echo $m_bpjs_delete->golongan->cellAttributes() ?>>
<span id="el<?php echo $m_bpjs_delete->RowCount ?>_m_bpjs_golongan" class="m_bpjs_golongan">
<span<?php echo $m_bpjs_delete->golongan->viewAttributes() ?>><?php echo $m_bpjs_delete->golongan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_bpjs_delete->value->Visible) { // value ?>
		<td <?php echo $m_bpjs_delete->value->cellAttributes() ?>>
<span id="el<?php echo $m_bpjs_delete->RowCount ?>_m_bpjs_value" class="m_bpjs_value">
<span<?php echo $m_bpjs_delete->value->viewAttributes() ?>><?php echo $m_bpjs_delete->value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$m_bpjs_delete->Recordset->moveNext();
}
$m_bpjs_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_bpjs_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$m_bpjs_delete->showPageFooter();
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
$m_bpjs_delete->terminate();
?>