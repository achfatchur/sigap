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
$m_tu_sma_delete = new m_tu_sma_delete();

// Run the page
$m_tu_sma_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_tu_sma_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_tu_smadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fm_tu_smadelete = currentForm = new ew.Form("fm_tu_smadelete", "delete");
	loadjs.done("fm_tu_smadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_tu_sma_delete->showPageHeader(); ?>
<?php
$m_tu_sma_delete->showMessage();
?>
<form name="fm_tu_smadelete" id="fm_tu_smadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_tu_sma">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($m_tu_sma_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($m_tu_sma_delete->tahun->Visible) { // tahun ?>
		<th class="<?php echo $m_tu_sma_delete->tahun->headerCellClass() ?>"><span id="elh_m_tu_sma_tahun" class="m_tu_sma_tahun"><?php echo $m_tu_sma_delete->tahun->caption() ?></span></th>
<?php } ?>
<?php if ($m_tu_sma_delete->bulan->Visible) { // bulan ?>
		<th class="<?php echo $m_tu_sma_delete->bulan->headerCellClass() ?>"><span id="elh_m_tu_sma_bulan" class="m_tu_sma_bulan"><?php echo $m_tu_sma_delete->bulan->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$m_tu_sma_delete->RecordCount = 0;
$i = 0;
while (!$m_tu_sma_delete->Recordset->EOF) {
	$m_tu_sma_delete->RecordCount++;
	$m_tu_sma_delete->RowCount++;

	// Set row properties
	$m_tu_sma->resetAttributes();
	$m_tu_sma->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$m_tu_sma_delete->loadRowValues($m_tu_sma_delete->Recordset);

	// Render row
	$m_tu_sma_delete->renderRow();
?>
	<tr <?php echo $m_tu_sma->rowAttributes() ?>>
<?php if ($m_tu_sma_delete->tahun->Visible) { // tahun ?>
		<td <?php echo $m_tu_sma_delete->tahun->cellAttributes() ?>>
<span id="el<?php echo $m_tu_sma_delete->RowCount ?>_m_tu_sma_tahun" class="m_tu_sma_tahun">
<span<?php echo $m_tu_sma_delete->tahun->viewAttributes() ?>><?php echo $m_tu_sma_delete->tahun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_tu_sma_delete->bulan->Visible) { // bulan ?>
		<td <?php echo $m_tu_sma_delete->bulan->cellAttributes() ?>>
<span id="el<?php echo $m_tu_sma_delete->RowCount ?>_m_tu_sma_bulan" class="m_tu_sma_bulan">
<span<?php echo $m_tu_sma_delete->bulan->viewAttributes() ?>><?php echo $m_tu_sma_delete->bulan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$m_tu_sma_delete->Recordset->moveNext();
}
$m_tu_sma_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_tu_sma_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$m_tu_sma_delete->showPageFooter();
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
$m_tu_sma_delete->terminate();
?>