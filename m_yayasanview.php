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
$m_yayasan_view = new m_yayasan_view();

// Run the page
$m_yayasan_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_yayasan_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_yayasan_view->isExport()) { ?>
<script>
var fm_yayasanview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fm_yayasanview = currentForm = new ew.Form("fm_yayasanview", "view");
	loadjs.done("fm_yayasanview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$m_yayasan_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $m_yayasan_view->ExportOptions->render("body") ?>
<?php $m_yayasan_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $m_yayasan_view->showPageHeader(); ?>
<?php
$m_yayasan_view->showMessage();
?>
<form name="fm_yayasanview" id="fm_yayasanview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_yayasan">
<input type="hidden" name="modal" value="<?php echo (int)$m_yayasan_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($m_yayasan_view->bulan->Visible) { // bulan ?>
	<tr id="r_bulan">
		<td class="<?php echo $m_yayasan_view->TableLeftColumnClass ?>"><span id="elh_m_yayasan_bulan"><?php echo $m_yayasan_view->bulan->caption() ?></span></td>
		<td data-name="bulan" <?php echo $m_yayasan_view->bulan->cellAttributes() ?>>
<span id="el_m_yayasan_bulan">
<span<?php echo $m_yayasan_view->bulan->viewAttributes() ?>><?php echo $m_yayasan_view->bulan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_yayasan_view->tahun->Visible) { // tahun ?>
	<tr id="r_tahun">
		<td class="<?php echo $m_yayasan_view->TableLeftColumnClass ?>"><span id="elh_m_yayasan_tahun"><?php echo $m_yayasan_view->tahun->caption() ?></span></td>
		<td data-name="tahun" <?php echo $m_yayasan_view->tahun->cellAttributes() ?>>
<span id="el_m_yayasan_tahun">
<span<?php echo $m_yayasan_view->tahun->viewAttributes() ?>><?php echo $m_yayasan_view->tahun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_yayasan_view->import_file->Visible) { // import_file ?>
	<tr id="r_import_file">
		<td class="<?php echo $m_yayasan_view->TableLeftColumnClass ?>"><span id="elh_m_yayasan_import_file"><?php echo $m_yayasan_view->import_file->caption() ?></span></td>
		<td data-name="import_file" <?php echo $m_yayasan_view->import_file->cellAttributes() ?>>
<span id="el_m_yayasan_import_file">
<span<?php echo $m_yayasan_view->import_file->viewAttributes() ?>><?php echo GetFileViewTag($m_yayasan_view->import_file, $m_yayasan_view->import_file->getViewValue(), FALSE) ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("yayasan", explode(",", $m_yayasan->getCurrentDetailTable())) && $yayasan->DetailView) {
?>
<?php if ($m_yayasan->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("yayasan", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "yayasangrid.php" ?>
<?php } ?>
</form>
<?php
$m_yayasan_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_yayasan_view->isExport()) { ?>
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
$m_yayasan_view->terminate();
?>