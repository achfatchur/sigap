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
$m_potongan_sd_delete = new m_potongan_sd_delete();

// Run the page
$m_potongan_sd_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_potongan_sd_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_potongan_sddelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fm_potongan_sddelete = currentForm = new ew.Form("fm_potongan_sddelete", "delete");
	loadjs.done("fm_potongan_sddelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_potongan_sd_delete->showPageHeader(); ?>
<?php
$m_potongan_sd_delete->showMessage();
?>
<form name="fm_potongan_sddelete" id="fm_potongan_sddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_potongan_sd">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($m_potongan_sd_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($m_potongan_sd_delete->tahun->Visible) { // tahun ?>
		<th class="<?php echo $m_potongan_sd_delete->tahun->headerCellClass() ?>"><span id="elh_m_potongan_sd_tahun" class="m_potongan_sd_tahun"><?php echo $m_potongan_sd_delete->tahun->caption() ?></span></th>
<?php } ?>
<?php if ($m_potongan_sd_delete->bulan->Visible) { // bulan ?>
		<th class="<?php echo $m_potongan_sd_delete->bulan->headerCellClass() ?>"><span id="elh_m_potongan_sd_bulan" class="m_potongan_sd_bulan"><?php echo $m_potongan_sd_delete->bulan->caption() ?></span></th>
<?php } ?>
<?php if ($m_potongan_sd_delete->c_by->Visible) { // c_by ?>
		<th class="<?php echo $m_potongan_sd_delete->c_by->headerCellClass() ?>"><span id="elh_m_potongan_sd_c_by" class="m_potongan_sd_c_by"><?php echo $m_potongan_sd_delete->c_by->caption() ?></span></th>
<?php } ?>
<?php if ($m_potongan_sd_delete->datetime->Visible) { // datetime ?>
		<th class="<?php echo $m_potongan_sd_delete->datetime->headerCellClass() ?>"><span id="elh_m_potongan_sd_datetime" class="m_potongan_sd_datetime"><?php echo $m_potongan_sd_delete->datetime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$m_potongan_sd_delete->RecordCount = 0;
$i = 0;
while (!$m_potongan_sd_delete->Recordset->EOF) {
	$m_potongan_sd_delete->RecordCount++;
	$m_potongan_sd_delete->RowCount++;

	// Set row properties
	$m_potongan_sd->resetAttributes();
	$m_potongan_sd->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$m_potongan_sd_delete->loadRowValues($m_potongan_sd_delete->Recordset);

	// Render row
	$m_potongan_sd_delete->renderRow();
?>
	<tr <?php echo $m_potongan_sd->rowAttributes() ?>>
<?php if ($m_potongan_sd_delete->tahun->Visible) { // tahun ?>
		<td <?php echo $m_potongan_sd_delete->tahun->cellAttributes() ?>>
<span id="el<?php echo $m_potongan_sd_delete->RowCount ?>_m_potongan_sd_tahun" class="m_potongan_sd_tahun">
<span<?php echo $m_potongan_sd_delete->tahun->viewAttributes() ?>><?php echo $m_potongan_sd_delete->tahun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_potongan_sd_delete->bulan->Visible) { // bulan ?>
		<td <?php echo $m_potongan_sd_delete->bulan->cellAttributes() ?>>
<span id="el<?php echo $m_potongan_sd_delete->RowCount ?>_m_potongan_sd_bulan" class="m_potongan_sd_bulan">
<span<?php echo $m_potongan_sd_delete->bulan->viewAttributes() ?>><?php echo $m_potongan_sd_delete->bulan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_potongan_sd_delete->c_by->Visible) { // c_by ?>
		<td <?php echo $m_potongan_sd_delete->c_by->cellAttributes() ?>>
<span id="el<?php echo $m_potongan_sd_delete->RowCount ?>_m_potongan_sd_c_by" class="m_potongan_sd_c_by">
<span<?php echo $m_potongan_sd_delete->c_by->viewAttributes() ?>><?php echo $m_potongan_sd_delete->c_by->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_potongan_sd_delete->datetime->Visible) { // datetime ?>
		<td <?php echo $m_potongan_sd_delete->datetime->cellAttributes() ?>>
<span id="el<?php echo $m_potongan_sd_delete->RowCount ?>_m_potongan_sd_datetime" class="m_potongan_sd_datetime">
<span<?php echo $m_potongan_sd_delete->datetime->viewAttributes() ?>><?php echo $m_potongan_sd_delete->datetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$m_potongan_sd_delete->Recordset->moveNext();
}
$m_potongan_sd_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_potongan_sd_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$m_potongan_sd_delete->showPageFooter();
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
$m_potongan_sd_delete->terminate();
?>