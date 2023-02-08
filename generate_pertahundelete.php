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
$generate_pertahun_delete = new generate_pertahun_delete();

// Run the page
$generate_pertahun_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$generate_pertahun_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fgenerate_pertahundelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fgenerate_pertahundelete = currentForm = new ew.Form("fgenerate_pertahundelete", "delete");
	loadjs.done("fgenerate_pertahundelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $generate_pertahun_delete->showPageHeader(); ?>
<?php
$generate_pertahun_delete->showMessage();
?>
<form name="fgenerate_pertahundelete" id="fgenerate_pertahundelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="generate_pertahun">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($generate_pertahun_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($generate_pertahun_delete->profesi->Visible) { // profesi ?>
		<th class="<?php echo $generate_pertahun_delete->profesi->headerCellClass() ?>"><span id="elh_generate_pertahun_profesi" class="generate_pertahun_profesi"><?php echo $generate_pertahun_delete->profesi->caption() ?></span></th>
<?php } ?>
<?php if ($generate_pertahun_delete->tahun->Visible) { // tahun ?>
		<th class="<?php echo $generate_pertahun_delete->tahun->headerCellClass() ?>"><span id="elh_generate_pertahun_tahun" class="generate_pertahun_tahun"><?php echo $generate_pertahun_delete->tahun->caption() ?></span></th>
<?php } ?>
<?php if ($generate_pertahun_delete->bulan2->Visible) { // bulan2 ?>
		<th class="<?php echo $generate_pertahun_delete->bulan2->headerCellClass() ?>"><span id="elh_generate_pertahun_bulan2" class="generate_pertahun_bulan2"><?php echo $generate_pertahun_delete->bulan2->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$generate_pertahun_delete->RecordCount = 0;
$i = 0;
while (!$generate_pertahun_delete->Recordset->EOF) {
	$generate_pertahun_delete->RecordCount++;
	$generate_pertahun_delete->RowCount++;

	// Set row properties
	$generate_pertahun->resetAttributes();
	$generate_pertahun->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$generate_pertahun_delete->loadRowValues($generate_pertahun_delete->Recordset);

	// Render row
	$generate_pertahun_delete->renderRow();
?>
	<tr <?php echo $generate_pertahun->rowAttributes() ?>>
<?php if ($generate_pertahun_delete->profesi->Visible) { // profesi ?>
		<td <?php echo $generate_pertahun_delete->profesi->cellAttributes() ?>>
<span id="el<?php echo $generate_pertahun_delete->RowCount ?>_generate_pertahun_profesi" class="generate_pertahun_profesi">
<span<?php echo $generate_pertahun_delete->profesi->viewAttributes() ?>><?php echo $generate_pertahun_delete->profesi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($generate_pertahun_delete->tahun->Visible) { // tahun ?>
		<td <?php echo $generate_pertahun_delete->tahun->cellAttributes() ?>>
<span id="el<?php echo $generate_pertahun_delete->RowCount ?>_generate_pertahun_tahun" class="generate_pertahun_tahun">
<span<?php echo $generate_pertahun_delete->tahun->viewAttributes() ?>><?php echo $generate_pertahun_delete->tahun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($generate_pertahun_delete->bulan2->Visible) { // bulan2 ?>
		<td <?php echo $generate_pertahun_delete->bulan2->cellAttributes() ?>>
<span id="el<?php echo $generate_pertahun_delete->RowCount ?>_generate_pertahun_bulan2" class="generate_pertahun_bulan2">
<span<?php echo $generate_pertahun_delete->bulan2->viewAttributes() ?>><?php echo $generate_pertahun_delete->bulan2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$generate_pertahun_delete->Recordset->moveNext();
}
$generate_pertahun_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $generate_pertahun_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$generate_pertahun_delete->showPageFooter();
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
$generate_pertahun_delete->terminate();
?>