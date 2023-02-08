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
$m_semeter_delete = new m_semeter_delete();

// Run the page
$m_semeter_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_semeter_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_semeterdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fm_semeterdelete = currentForm = new ew.Form("fm_semeterdelete", "delete");
	loadjs.done("fm_semeterdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_semeter_delete->showPageHeader(); ?>
<?php
$m_semeter_delete->showMessage();
?>
<form name="fm_semeterdelete" id="fm_semeterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_semeter">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($m_semeter_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($m_semeter_delete->smtr->Visible) { // smtr ?>
		<th class="<?php echo $m_semeter_delete->smtr->headerCellClass() ?>"><span id="elh_m_semeter_smtr" class="m_semeter_smtr"><?php echo $m_semeter_delete->smtr->caption() ?></span></th>
<?php } ?>
<?php if ($m_semeter_delete->bulan->Visible) { // bulan ?>
		<th class="<?php echo $m_semeter_delete->bulan->headerCellClass() ?>"><span id="elh_m_semeter_bulan" class="m_semeter_bulan"><?php echo $m_semeter_delete->bulan->caption() ?></span></th>
<?php } ?>
<?php if ($m_semeter_delete->detil_smtr->Visible) { // detil_smtr ?>
		<th class="<?php echo $m_semeter_delete->detil_smtr->headerCellClass() ?>"><span id="elh_m_semeter_detil_smtr" class="m_semeter_detil_smtr"><?php echo $m_semeter_delete->detil_smtr->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$m_semeter_delete->RecordCount = 0;
$i = 0;
while (!$m_semeter_delete->Recordset->EOF) {
	$m_semeter_delete->RecordCount++;
	$m_semeter_delete->RowCount++;

	// Set row properties
	$m_semeter->resetAttributes();
	$m_semeter->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$m_semeter_delete->loadRowValues($m_semeter_delete->Recordset);

	// Render row
	$m_semeter_delete->renderRow();
?>
	<tr <?php echo $m_semeter->rowAttributes() ?>>
<?php if ($m_semeter_delete->smtr->Visible) { // smtr ?>
		<td <?php echo $m_semeter_delete->smtr->cellAttributes() ?>>
<span id="el<?php echo $m_semeter_delete->RowCount ?>_m_semeter_smtr" class="m_semeter_smtr">
<span<?php echo $m_semeter_delete->smtr->viewAttributes() ?>><?php echo $m_semeter_delete->smtr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_semeter_delete->bulan->Visible) { // bulan ?>
		<td <?php echo $m_semeter_delete->bulan->cellAttributes() ?>>
<span id="el<?php echo $m_semeter_delete->RowCount ?>_m_semeter_bulan" class="m_semeter_bulan">
<span<?php echo $m_semeter_delete->bulan->viewAttributes() ?>><?php echo $m_semeter_delete->bulan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_semeter_delete->detil_smtr->Visible) { // detil_smtr ?>
		<td <?php echo $m_semeter_delete->detil_smtr->cellAttributes() ?>>
<span id="el<?php echo $m_semeter_delete->RowCount ?>_m_semeter_detil_smtr" class="m_semeter_detil_smtr">
<span<?php echo $m_semeter_delete->detil_smtr->viewAttributes() ?>><?php echo $m_semeter_delete->detil_smtr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$m_semeter_delete->Recordset->moveNext();
}
$m_semeter_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_semeter_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$m_semeter_delete->showPageFooter();
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
$m_semeter_delete->terminate();
?>