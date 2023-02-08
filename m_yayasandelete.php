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
$m_yayasan_delete = new m_yayasan_delete();

// Run the page
$m_yayasan_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_yayasan_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_yayasandelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fm_yayasandelete = currentForm = new ew.Form("fm_yayasandelete", "delete");
	loadjs.done("fm_yayasandelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_yayasan_delete->showPageHeader(); ?>
<?php
$m_yayasan_delete->showMessage();
?>
<form name="fm_yayasandelete" id="fm_yayasandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_yayasan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($m_yayasan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($m_yayasan_delete->bulan->Visible) { // bulan ?>
		<th class="<?php echo $m_yayasan_delete->bulan->headerCellClass() ?>"><span id="elh_m_yayasan_bulan" class="m_yayasan_bulan"><?php echo $m_yayasan_delete->bulan->caption() ?></span></th>
<?php } ?>
<?php if ($m_yayasan_delete->tahun->Visible) { // tahun ?>
		<th class="<?php echo $m_yayasan_delete->tahun->headerCellClass() ?>"><span id="elh_m_yayasan_tahun" class="m_yayasan_tahun"><?php echo $m_yayasan_delete->tahun->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$m_yayasan_delete->RecordCount = 0;
$i = 0;
while (!$m_yayasan_delete->Recordset->EOF) {
	$m_yayasan_delete->RecordCount++;
	$m_yayasan_delete->RowCount++;

	// Set row properties
	$m_yayasan->resetAttributes();
	$m_yayasan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$m_yayasan_delete->loadRowValues($m_yayasan_delete->Recordset);

	// Render row
	$m_yayasan_delete->renderRow();
?>
	<tr <?php echo $m_yayasan->rowAttributes() ?>>
<?php if ($m_yayasan_delete->bulan->Visible) { // bulan ?>
		<td <?php echo $m_yayasan_delete->bulan->cellAttributes() ?>>
<span id="el<?php echo $m_yayasan_delete->RowCount ?>_m_yayasan_bulan" class="m_yayasan_bulan">
<span<?php echo $m_yayasan_delete->bulan->viewAttributes() ?>><?php echo $m_yayasan_delete->bulan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_yayasan_delete->tahun->Visible) { // tahun ?>
		<td <?php echo $m_yayasan_delete->tahun->cellAttributes() ?>>
<span id="el<?php echo $m_yayasan_delete->RowCount ?>_m_yayasan_tahun" class="m_yayasan_tahun">
<span<?php echo $m_yayasan_delete->tahun->viewAttributes() ?>><?php echo $m_yayasan_delete->tahun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$m_yayasan_delete->Recordset->moveNext();
}
$m_yayasan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_yayasan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$m_yayasan_delete->showPageFooter();
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
$m_yayasan_delete->terminate();
?>