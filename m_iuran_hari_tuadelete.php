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
$m_iuran_hari_tua_delete = new m_iuran_hari_tua_delete();

// Run the page
$m_iuran_hari_tua_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_iuran_hari_tua_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_iuran_hari_tuadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fm_iuran_hari_tuadelete = currentForm = new ew.Form("fm_iuran_hari_tuadelete", "delete");
	loadjs.done("fm_iuran_hari_tuadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_iuran_hari_tua_delete->showPageHeader(); ?>
<?php
$m_iuran_hari_tua_delete->showMessage();
?>
<form name="fm_iuran_hari_tuadelete" id="fm_iuran_hari_tuadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_iuran_hari_tua">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($m_iuran_hari_tua_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($m_iuran_hari_tua_delete->unit->Visible) { // unit ?>
		<th class="<?php echo $m_iuran_hari_tua_delete->unit->headerCellClass() ?>"><span id="elh_m_iuran_hari_tua_unit" class="m_iuran_hari_tua_unit"><?php echo $m_iuran_hari_tua_delete->unit->caption() ?></span></th>
<?php } ?>
<?php if ($m_iuran_hari_tua_delete->value->Visible) { // value ?>
		<th class="<?php echo $m_iuran_hari_tua_delete->value->headerCellClass() ?>"><span id="elh_m_iuran_hari_tua_value" class="m_iuran_hari_tua_value"><?php echo $m_iuran_hari_tua_delete->value->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$m_iuran_hari_tua_delete->RecordCount = 0;
$i = 0;
while (!$m_iuran_hari_tua_delete->Recordset->EOF) {
	$m_iuran_hari_tua_delete->RecordCount++;
	$m_iuran_hari_tua_delete->RowCount++;

	// Set row properties
	$m_iuran_hari_tua->resetAttributes();
	$m_iuran_hari_tua->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$m_iuran_hari_tua_delete->loadRowValues($m_iuran_hari_tua_delete->Recordset);

	// Render row
	$m_iuran_hari_tua_delete->renderRow();
?>
	<tr <?php echo $m_iuran_hari_tua->rowAttributes() ?>>
<?php if ($m_iuran_hari_tua_delete->unit->Visible) { // unit ?>
		<td <?php echo $m_iuran_hari_tua_delete->unit->cellAttributes() ?>>
<span id="el<?php echo $m_iuran_hari_tua_delete->RowCount ?>_m_iuran_hari_tua_unit" class="m_iuran_hari_tua_unit">
<span<?php echo $m_iuran_hari_tua_delete->unit->viewAttributes() ?>><?php echo $m_iuran_hari_tua_delete->unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_iuran_hari_tua_delete->value->Visible) { // value ?>
		<td <?php echo $m_iuran_hari_tua_delete->value->cellAttributes() ?>>
<span id="el<?php echo $m_iuran_hari_tua_delete->RowCount ?>_m_iuran_hari_tua_value" class="m_iuran_hari_tua_value">
<span<?php echo $m_iuran_hari_tua_delete->value->viewAttributes() ?>><?php echo $m_iuran_hari_tua_delete->value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$m_iuran_hari_tua_delete->Recordset->moveNext();
}
$m_iuran_hari_tua_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_iuran_hari_tua_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$m_iuran_hari_tua_delete->showPageFooter();
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
$m_iuran_hari_tua_delete->terminate();
?>