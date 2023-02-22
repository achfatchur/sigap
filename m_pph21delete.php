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
$m_pph21_delete = new m_pph21_delete();

// Run the page
$m_pph21_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_pph21_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_pph21delete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fm_pph21delete = currentForm = new ew.Form("fm_pph21delete", "delete");
	loadjs.done("fm_pph21delete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_pph21_delete->showPageHeader(); ?>
<?php
$m_pph21_delete->showMessage();
?>
<form name="fm_pph21delete" id="fm_pph21delete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_pph21">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($m_pph21_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($m_pph21_delete->unit->Visible) { // unit ?>
		<th class="<?php echo $m_pph21_delete->unit->headerCellClass() ?>"><span id="elh_m_pph21_unit" class="m_pph21_unit"><?php echo $m_pph21_delete->unit->caption() ?></span></th>
<?php } ?>
<?php if ($m_pph21_delete->value1->Visible) { // value1 ?>
		<th class="<?php echo $m_pph21_delete->value1->headerCellClass() ?>"><span id="elh_m_pph21_value1" class="m_pph21_value1"><?php echo $m_pph21_delete->value1->caption() ?></span></th>
<?php } ?>
<?php if ($m_pph21_delete->value2->Visible) { // value2 ?>
		<th class="<?php echo $m_pph21_delete->value2->headerCellClass() ?>"><span id="elh_m_pph21_value2" class="m_pph21_value2"><?php echo $m_pph21_delete->value2->caption() ?></span></th>
<?php } ?>
<?php if ($m_pph21_delete->value3->Visible) { // value3 ?>
		<th class="<?php echo $m_pph21_delete->value3->headerCellClass() ?>"><span id="elh_m_pph21_value3" class="m_pph21_value3"><?php echo $m_pph21_delete->value3->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$m_pph21_delete->RecordCount = 0;
$i = 0;
while (!$m_pph21_delete->Recordset->EOF) {
	$m_pph21_delete->RecordCount++;
	$m_pph21_delete->RowCount++;

	// Set row properties
	$m_pph21->resetAttributes();
	$m_pph21->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$m_pph21_delete->loadRowValues($m_pph21_delete->Recordset);

	// Render row
	$m_pph21_delete->renderRow();
?>
	<tr <?php echo $m_pph21->rowAttributes() ?>>
<?php if ($m_pph21_delete->unit->Visible) { // unit ?>
		<td <?php echo $m_pph21_delete->unit->cellAttributes() ?>>
<span id="el<?php echo $m_pph21_delete->RowCount ?>_m_pph21_unit" class="m_pph21_unit">
<span<?php echo $m_pph21_delete->unit->viewAttributes() ?>><?php echo $m_pph21_delete->unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_pph21_delete->value1->Visible) { // value1 ?>
		<td <?php echo $m_pph21_delete->value1->cellAttributes() ?>>
<span id="el<?php echo $m_pph21_delete->RowCount ?>_m_pph21_value1" class="m_pph21_value1">
<span<?php echo $m_pph21_delete->value1->viewAttributes() ?>><?php echo $m_pph21_delete->value1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_pph21_delete->value2->Visible) { // value2 ?>
		<td <?php echo $m_pph21_delete->value2->cellAttributes() ?>>
<span id="el<?php echo $m_pph21_delete->RowCount ?>_m_pph21_value2" class="m_pph21_value2">
<span<?php echo $m_pph21_delete->value2->viewAttributes() ?>><?php echo $m_pph21_delete->value2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_pph21_delete->value3->Visible) { // value3 ?>
		<td <?php echo $m_pph21_delete->value3->cellAttributes() ?>>
<span id="el<?php echo $m_pph21_delete->RowCount ?>_m_pph21_value3" class="m_pph21_value3">
<span<?php echo $m_pph21_delete->value3->viewAttributes() ?>><?php echo $m_pph21_delete->value3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$m_pph21_delete->Recordset->moveNext();
}
$m_pph21_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_pph21_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$m_pph21_delete->showPageFooter();
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
$m_pph21_delete->terminate();
?>