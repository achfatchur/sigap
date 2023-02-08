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
$hapus_barangnew_view = new hapus_barangnew_view();

// Run the page
$hapus_barangnew_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hapus_barangnew_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$hapus_barangnew_view->isExport()) { ?>
<script>
var fhapus_barangnewview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fhapus_barangnewview = currentForm = new ew.Form("fhapus_barangnewview", "view");
	loadjs.done("fhapus_barangnewview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$hapus_barangnew_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hapus_barangnew_view->ExportOptions->render("body") ?>
<?php $hapus_barangnew_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hapus_barangnew_view->showPageHeader(); ?>
<?php
$hapus_barangnew_view->showMessage();
?>
<form name="fhapus_barangnewview" id="fhapus_barangnewview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hapus_barangnew">
<input type="hidden" name="modal" value="<?php echo (int)$hapus_barangnew_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hapus_barangnew_view->id_hapus->Visible) { // id_hapus ?>
	<tr id="r_id_hapus">
		<td class="<?php echo $hapus_barangnew_view->TableLeftColumnClass ?>"><span id="elh_hapus_barangnew_id_hapus"><?php echo $hapus_barangnew_view->id_hapus->caption() ?></span></td>
		<td data-name="id_hapus" <?php echo $hapus_barangnew_view->id_hapus->cellAttributes() ?>>
<span id="el_hapus_barangnew_id_hapus">
<span<?php echo $hapus_barangnew_view->id_hapus->viewAttributes() ?>><?php echo $hapus_barangnew_view->id_hapus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hapus_barangnew_view->kode_barang->Visible) { // kode_barang ?>
	<tr id="r_kode_barang">
		<td class="<?php echo $hapus_barangnew_view->TableLeftColumnClass ?>"><span id="elh_hapus_barangnew_kode_barang"><?php echo $hapus_barangnew_view->kode_barang->caption() ?></span></td>
		<td data-name="kode_barang" <?php echo $hapus_barangnew_view->kode_barang->cellAttributes() ?>>
<span id="el_hapus_barangnew_kode_barang">
<span<?php echo $hapus_barangnew_view->kode_barang->viewAttributes() ?>><?php echo $hapus_barangnew_view->kode_barang->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hapus_barangnew_view->nama_barang->Visible) { // nama_barang ?>
	<tr id="r_nama_barang">
		<td class="<?php echo $hapus_barangnew_view->TableLeftColumnClass ?>"><span id="elh_hapus_barangnew_nama_barang"><?php echo $hapus_barangnew_view->nama_barang->caption() ?></span></td>
		<td data-name="nama_barang" <?php echo $hapus_barangnew_view->nama_barang->cellAttributes() ?>>
<span id="el_hapus_barangnew_nama_barang">
<span<?php echo $hapus_barangnew_view->nama_barang->viewAttributes() ?>><?php echo $hapus_barangnew_view->nama_barang->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hapus_barangnew_view->keterangan->Visible) { // keterangan ?>
	<tr id="r_keterangan">
		<td class="<?php echo $hapus_barangnew_view->TableLeftColumnClass ?>"><span id="elh_hapus_barangnew_keterangan"><?php echo $hapus_barangnew_view->keterangan->caption() ?></span></td>
		<td data-name="keterangan" <?php echo $hapus_barangnew_view->keterangan->cellAttributes() ?>>
<span id="el_hapus_barangnew_keterangan">
<span<?php echo $hapus_barangnew_view->keterangan->viewAttributes() ?>><?php echo $hapus_barangnew_view->keterangan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hapus_barangnew_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$hapus_barangnew_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$hapus_barangnew_view->terminate();
?>