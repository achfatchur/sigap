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
$m_karyawan_tk_delete = new m_karyawan_tk_delete();

// Run the page
$m_karyawan_tk_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_karyawan_tk_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_karyawan_tkdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fm_karyawan_tkdelete = currentForm = new ew.Form("fm_karyawan_tkdelete", "delete");
	loadjs.done("fm_karyawan_tkdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_karyawan_tk_delete->showPageHeader(); ?>
<?php
$m_karyawan_tk_delete->showMessage();
?>
<form name="fm_karyawan_tkdelete" id="fm_karyawan_tkdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_karyawan_tk">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($m_karyawan_tk_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($m_karyawan_tk_delete->tahun->Visible) { // tahun ?>
		<th class="<?php echo $m_karyawan_tk_delete->tahun->headerCellClass() ?>"><span id="elh_m_karyawan_tk_tahun" class="m_karyawan_tk_tahun"><?php echo $m_karyawan_tk_delete->tahun->caption() ?></span></th>
<?php } ?>
<?php if ($m_karyawan_tk_delete->bulan->Visible) { // bulan ?>
		<th class="<?php echo $m_karyawan_tk_delete->bulan->headerCellClass() ?>"><span id="elh_m_karyawan_tk_bulan" class="m_karyawan_tk_bulan"><?php echo $m_karyawan_tk_delete->bulan->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$m_karyawan_tk_delete->RecordCount = 0;
$i = 0;
while (!$m_karyawan_tk_delete->Recordset->EOF) {
	$m_karyawan_tk_delete->RecordCount++;
	$m_karyawan_tk_delete->RowCount++;

	// Set row properties
	$m_karyawan_tk->resetAttributes();
	$m_karyawan_tk->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$m_karyawan_tk_delete->loadRowValues($m_karyawan_tk_delete->Recordset);

	// Render row
	$m_karyawan_tk_delete->renderRow();
?>
	<tr <?php echo $m_karyawan_tk->rowAttributes() ?>>
<?php if ($m_karyawan_tk_delete->tahun->Visible) { // tahun ?>
		<td <?php echo $m_karyawan_tk_delete->tahun->cellAttributes() ?>>
<span id="el<?php echo $m_karyawan_tk_delete->RowCount ?>_m_karyawan_tk_tahun" class="m_karyawan_tk_tahun">
<span<?php echo $m_karyawan_tk_delete->tahun->viewAttributes() ?>><?php echo $m_karyawan_tk_delete->tahun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_karyawan_tk_delete->bulan->Visible) { // bulan ?>
		<td <?php echo $m_karyawan_tk_delete->bulan->cellAttributes() ?>>
<span id="el<?php echo $m_karyawan_tk_delete->RowCount ?>_m_karyawan_tk_bulan" class="m_karyawan_tk_bulan">
<span<?php echo $m_karyawan_tk_delete->bulan->viewAttributes() ?>><?php echo $m_karyawan_tk_delete->bulan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$m_karyawan_tk_delete->Recordset->moveNext();
}
$m_karyawan_tk_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_karyawan_tk_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$m_karyawan_tk_delete->showPageFooter();
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
$m_karyawan_tk_delete->terminate();
?>