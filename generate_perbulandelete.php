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
$generate_perbulan_delete = new generate_perbulan_delete();

// Run the page
$generate_perbulan_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$generate_perbulan_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fgenerate_perbulandelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fgenerate_perbulandelete = currentForm = new ew.Form("fgenerate_perbulandelete", "delete");
	loadjs.done("fgenerate_perbulandelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $generate_perbulan_delete->showPageHeader(); ?>
<?php
$generate_perbulan_delete->showMessage();
?>
<form name="fgenerate_perbulandelete" id="fgenerate_perbulandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="generate_perbulan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($generate_perbulan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($generate_perbulan_delete->id->Visible) { // id ?>
		<th class="<?php echo $generate_perbulan_delete->id->headerCellClass() ?>"><span id="elh_generate_perbulan_id" class="generate_perbulan_id"><?php echo $generate_perbulan_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($generate_perbulan_delete->tahun->Visible) { // tahun ?>
		<th class="<?php echo $generate_perbulan_delete->tahun->headerCellClass() ?>"><span id="elh_generate_perbulan_tahun" class="generate_perbulan_tahun"><?php echo $generate_perbulan_delete->tahun->caption() ?></span></th>
<?php } ?>
<?php if ($generate_perbulan_delete->bulan->Visible) { // bulan ?>
		<th class="<?php echo $generate_perbulan_delete->bulan->headerCellClass() ?>"><span id="elh_generate_perbulan_bulan" class="generate_perbulan_bulan"><?php echo $generate_perbulan_delete->bulan->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$generate_perbulan_delete->RecordCount = 0;
$i = 0;
while (!$generate_perbulan_delete->Recordset->EOF) {
	$generate_perbulan_delete->RecordCount++;
	$generate_perbulan_delete->RowCount++;

	// Set row properties
	$generate_perbulan->resetAttributes();
	$generate_perbulan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$generate_perbulan_delete->loadRowValues($generate_perbulan_delete->Recordset);

	// Render row
	$generate_perbulan_delete->renderRow();
?>
	<tr <?php echo $generate_perbulan->rowAttributes() ?>>
<?php if ($generate_perbulan_delete->id->Visible) { // id ?>
		<td <?php echo $generate_perbulan_delete->id->cellAttributes() ?>>
<span id="el<?php echo $generate_perbulan_delete->RowCount ?>_generate_perbulan_id" class="generate_perbulan_id">
<span<?php echo $generate_perbulan_delete->id->viewAttributes() ?>><?php echo $generate_perbulan_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($generate_perbulan_delete->tahun->Visible) { // tahun ?>
		<td <?php echo $generate_perbulan_delete->tahun->cellAttributes() ?>>
<span id="el<?php echo $generate_perbulan_delete->RowCount ?>_generate_perbulan_tahun" class="generate_perbulan_tahun">
<span<?php echo $generate_perbulan_delete->tahun->viewAttributes() ?>><?php echo $generate_perbulan_delete->tahun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($generate_perbulan_delete->bulan->Visible) { // bulan ?>
		<td <?php echo $generate_perbulan_delete->bulan->cellAttributes() ?>>
<span id="el<?php echo $generate_perbulan_delete->RowCount ?>_generate_perbulan_bulan" class="generate_perbulan_bulan">
<span<?php echo $generate_perbulan_delete->bulan->viewAttributes() ?>><?php echo $generate_perbulan_delete->bulan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$generate_perbulan_delete->Recordset->moveNext();
}
$generate_perbulan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $generate_perbulan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$generate_perbulan_delete->showPageFooter();
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
$generate_perbulan_delete->terminate();
?>