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
$hapus_barangnew_delete = new hapus_barangnew_delete();

// Run the page
$hapus_barangnew_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hapus_barangnew_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fhapus_barangnewdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fhapus_barangnewdelete = currentForm = new ew.Form("fhapus_barangnewdelete", "delete");
	loadjs.done("fhapus_barangnewdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $hapus_barangnew_delete->showPageHeader(); ?>
<?php
$hapus_barangnew_delete->showMessage();
?>
<form name="fhapus_barangnewdelete" id="fhapus_barangnewdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hapus_barangnew">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hapus_barangnew_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hapus_barangnew_delete->id_hapus->Visible) { // id_hapus ?>
		<th class="<?php echo $hapus_barangnew_delete->id_hapus->headerCellClass() ?>"><span id="elh_hapus_barangnew_id_hapus" class="hapus_barangnew_id_hapus"><?php echo $hapus_barangnew_delete->id_hapus->caption() ?></span></th>
<?php } ?>
<?php if ($hapus_barangnew_delete->kode_barang->Visible) { // kode_barang ?>
		<th class="<?php echo $hapus_barangnew_delete->kode_barang->headerCellClass() ?>"><span id="elh_hapus_barangnew_kode_barang" class="hapus_barangnew_kode_barang"><?php echo $hapus_barangnew_delete->kode_barang->caption() ?></span></th>
<?php } ?>
<?php if ($hapus_barangnew_delete->nama_barang->Visible) { // nama_barang ?>
		<th class="<?php echo $hapus_barangnew_delete->nama_barang->headerCellClass() ?>"><span id="elh_hapus_barangnew_nama_barang" class="hapus_barangnew_nama_barang"><?php echo $hapus_barangnew_delete->nama_barang->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hapus_barangnew_delete->RecordCount = 0;
$i = 0;
while (!$hapus_barangnew_delete->Recordset->EOF) {
	$hapus_barangnew_delete->RecordCount++;
	$hapus_barangnew_delete->RowCount++;

	// Set row properties
	$hapus_barangnew->resetAttributes();
	$hapus_barangnew->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hapus_barangnew_delete->loadRowValues($hapus_barangnew_delete->Recordset);

	// Render row
	$hapus_barangnew_delete->renderRow();
?>
	<tr <?php echo $hapus_barangnew->rowAttributes() ?>>
<?php if ($hapus_barangnew_delete->id_hapus->Visible) { // id_hapus ?>
		<td <?php echo $hapus_barangnew_delete->id_hapus->cellAttributes() ?>>
<span id="el<?php echo $hapus_barangnew_delete->RowCount ?>_hapus_barangnew_id_hapus" class="hapus_barangnew_id_hapus">
<span<?php echo $hapus_barangnew_delete->id_hapus->viewAttributes() ?>><?php echo $hapus_barangnew_delete->id_hapus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hapus_barangnew_delete->kode_barang->Visible) { // kode_barang ?>
		<td <?php echo $hapus_barangnew_delete->kode_barang->cellAttributes() ?>>
<span id="el<?php echo $hapus_barangnew_delete->RowCount ?>_hapus_barangnew_kode_barang" class="hapus_barangnew_kode_barang">
<span<?php echo $hapus_barangnew_delete->kode_barang->viewAttributes() ?>><?php echo $hapus_barangnew_delete->kode_barang->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hapus_barangnew_delete->nama_barang->Visible) { // nama_barang ?>
		<td <?php echo $hapus_barangnew_delete->nama_barang->cellAttributes() ?>>
<span id="el<?php echo $hapus_barangnew_delete->RowCount ?>_hapus_barangnew_nama_barang" class="hapus_barangnew_nama_barang">
<span<?php echo $hapus_barangnew_delete->nama_barang->viewAttributes() ?>><?php echo $hapus_barangnew_delete->nama_barang->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hapus_barangnew_delete->Recordset->moveNext();
}
$hapus_barangnew_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hapus_barangnew_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hapus_barangnew_delete->showPageFooter();
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
$hapus_barangnew_delete->terminate();
?>