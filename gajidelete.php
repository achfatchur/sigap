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
$gaji_delete = new gaji_delete();

// Run the page
$gaji_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fgajidelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fgajidelete = currentForm = new ew.Form("fgajidelete", "delete");
	loadjs.done("fgajidelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $gaji_delete->showPageHeader(); ?>
<?php
$gaji_delete->showMessage();
?>
<form name="fgajidelete" id="fgajidelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="gaji">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($gaji_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($gaji_delete->pegawai->Visible) { // pegawai ?>
		<th class="<?php echo $gaji_delete->pegawai->headerCellClass() ?>"><span id="elh_gaji_pegawai" class="gaji_pegawai"><?php echo $gaji_delete->pegawai->caption() ?></span></th>
<?php } ?>
<?php if ($gaji_delete->sub_total->Visible) { // sub_total ?>
		<th class="<?php echo $gaji_delete->sub_total->headerCellClass() ?>"><span id="elh_gaji_sub_total" class="gaji_sub_total"><?php echo $gaji_delete->sub_total->caption() ?></span></th>
<?php } ?>
<?php if ($gaji_delete->potongan->Visible) { // potongan ?>
		<th class="<?php echo $gaji_delete->potongan->headerCellClass() ?>"><span id="elh_gaji_potongan" class="gaji_potongan"><?php echo $gaji_delete->potongan->caption() ?></span></th>
<?php } ?>
<?php if ($gaji_delete->penyesuaian->Visible) { // penyesuaian ?>
		<th class="<?php echo $gaji_delete->penyesuaian->headerCellClass() ?>"><span id="elh_gaji_penyesuaian" class="gaji_penyesuaian"><?php echo $gaji_delete->penyesuaian->caption() ?></span></th>
<?php } ?>
<?php if ($gaji_delete->total->Visible) { // total ?>
		<th class="<?php echo $gaji_delete->total->headerCellClass() ?>"><span id="elh_gaji_total" class="gaji_total"><?php echo $gaji_delete->total->caption() ?></span></th>
<?php } ?>
<?php if ($gaji_delete->voucher->Visible) { // voucher ?>
		<th class="<?php echo $gaji_delete->voucher->headerCellClass() ?>"><span id="elh_gaji_voucher" class="gaji_voucher"><?php echo $gaji_delete->voucher->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$gaji_delete->RecordCount = 0;
$i = 0;
while (!$gaji_delete->Recordset->EOF) {
	$gaji_delete->RecordCount++;
	$gaji_delete->RowCount++;

	// Set row properties
	$gaji->resetAttributes();
	$gaji->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$gaji_delete->loadRowValues($gaji_delete->Recordset);

	// Render row
	$gaji_delete->renderRow();
?>
	<tr <?php echo $gaji->rowAttributes() ?>>
<?php if ($gaji_delete->pegawai->Visible) { // pegawai ?>
		<td <?php echo $gaji_delete->pegawai->cellAttributes() ?>>
<span id="el<?php echo $gaji_delete->RowCount ?>_gaji_pegawai" class="gaji_pegawai">
<span<?php echo $gaji_delete->pegawai->viewAttributes() ?>><?php echo $gaji_delete->pegawai->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gaji_delete->sub_total->Visible) { // sub_total ?>
		<td <?php echo $gaji_delete->sub_total->cellAttributes() ?>>
<span id="el<?php echo $gaji_delete->RowCount ?>_gaji_sub_total" class="gaji_sub_total">
<span<?php echo $gaji_delete->sub_total->viewAttributes() ?>><?php echo $gaji_delete->sub_total->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gaji_delete->potongan->Visible) { // potongan ?>
		<td <?php echo $gaji_delete->potongan->cellAttributes() ?>>
<span id="el<?php echo $gaji_delete->RowCount ?>_gaji_potongan" class="gaji_potongan">
<span<?php echo $gaji_delete->potongan->viewAttributes() ?>><?php echo $gaji_delete->potongan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gaji_delete->penyesuaian->Visible) { // penyesuaian ?>
		<td <?php echo $gaji_delete->penyesuaian->cellAttributes() ?>>
<span id="el<?php echo $gaji_delete->RowCount ?>_gaji_penyesuaian" class="gaji_penyesuaian">
<span<?php echo $gaji_delete->penyesuaian->viewAttributes() ?>><?php echo $gaji_delete->penyesuaian->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gaji_delete->total->Visible) { // total ?>
		<td <?php echo $gaji_delete->total->cellAttributes() ?>>
<span id="el<?php echo $gaji_delete->RowCount ?>_gaji_total" class="gaji_total">
<span<?php echo $gaji_delete->total->viewAttributes() ?>><?php echo $gaji_delete->total->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gaji_delete->voucher->Visible) { // voucher ?>
		<td <?php echo $gaji_delete->voucher->cellAttributes() ?>>
<span id="el<?php echo $gaji_delete->RowCount ?>_gaji_voucher" class="gaji_voucher">
<span<?php echo $gaji_delete->voucher->viewAttributes() ?>><?php echo $gaji_delete->voucher->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$gaji_delete->Recordset->moveNext();
}
$gaji_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $gaji_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$gaji_delete->showPageFooter();
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
$gaji_delete->terminate();
?>