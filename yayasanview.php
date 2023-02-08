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
$yayasan_view = new yayasan_view();

// Run the page
$yayasan_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$yayasan_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$yayasan_view->isExport()) { ?>
<script>
var fyayasanview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fyayasanview = currentForm = new ew.Form("fyayasanview", "view");
	loadjs.done("fyayasanview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$yayasan_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $yayasan_view->ExportOptions->render("body") ?>
<?php $yayasan_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $yayasan_view->showPageHeader(); ?>
<?php
$yayasan_view->showMessage();
?>
<form name="fyayasanview" id="fyayasanview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="yayasan">
<input type="hidden" name="modal" value="<?php echo (int)$yayasan_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($yayasan_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $yayasan_view->TableLeftColumnClass ?>"><span id="elh_yayasan_id"><?php echo $yayasan_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $yayasan_view->id->cellAttributes() ?>>
<span id="el_yayasan_id">
<span<?php echo $yayasan_view->id->viewAttributes() ?>><?php echo $yayasan_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($yayasan_view->m_id->Visible) { // m_id ?>
	<tr id="r_m_id">
		<td class="<?php echo $yayasan_view->TableLeftColumnClass ?>"><span id="elh_yayasan_m_id"><?php echo $yayasan_view->m_id->caption() ?></span></td>
		<td data-name="m_id" <?php echo $yayasan_view->m_id->cellAttributes() ?>>
<span id="el_yayasan_m_id">
<span<?php echo $yayasan_view->m_id->viewAttributes() ?>><?php echo $yayasan_view->m_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($yayasan_view->id_pegawai->Visible) { // id_pegawai ?>
	<tr id="r_id_pegawai">
		<td class="<?php echo $yayasan_view->TableLeftColumnClass ?>"><span id="elh_yayasan_id_pegawai"><?php echo $yayasan_view->id_pegawai->caption() ?></span></td>
		<td data-name="id_pegawai" <?php echo $yayasan_view->id_pegawai->cellAttributes() ?>>
<span id="el_yayasan_id_pegawai">
<span<?php echo $yayasan_view->id_pegawai->viewAttributes() ?>><?php echo $yayasan_view->id_pegawai->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($yayasan_view->datetime->Visible) { // datetime ?>
	<tr id="r_datetime">
		<td class="<?php echo $yayasan_view->TableLeftColumnClass ?>"><span id="elh_yayasan_datetime"><?php echo $yayasan_view->datetime->caption() ?></span></td>
		<td data-name="datetime" <?php echo $yayasan_view->datetime->cellAttributes() ?>>
<span id="el_yayasan_datetime">
<span<?php echo $yayasan_view->datetime->viewAttributes() ?>><?php echo $yayasan_view->datetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($yayasan_view->gaji_pokok->Visible) { // gaji_pokok ?>
	<tr id="r_gaji_pokok">
		<td class="<?php echo $yayasan_view->TableLeftColumnClass ?>"><span id="elh_yayasan_gaji_pokok"><?php echo $yayasan_view->gaji_pokok->caption() ?></span></td>
		<td data-name="gaji_pokok" <?php echo $yayasan_view->gaji_pokok->cellAttributes() ?>>
<span id="el_yayasan_gaji_pokok">
<span<?php echo $yayasan_view->gaji_pokok->viewAttributes() ?>><?php echo $yayasan_view->gaji_pokok->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($yayasan_view->potongan->Visible) { // potongan ?>
	<tr id="r_potongan">
		<td class="<?php echo $yayasan_view->TableLeftColumnClass ?>"><span id="elh_yayasan_potongan"><?php echo $yayasan_view->potongan->caption() ?></span></td>
		<td data-name="potongan" <?php echo $yayasan_view->potongan->cellAttributes() ?>>
<span id="el_yayasan_potongan">
<span<?php echo $yayasan_view->potongan->viewAttributes() ?>><?php echo $yayasan_view->potongan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($yayasan_view->total->Visible) { // total ?>
	<tr id="r_total">
		<td class="<?php echo $yayasan_view->TableLeftColumnClass ?>"><span id="elh_yayasan_total"><?php echo $yayasan_view->total->caption() ?></span></td>
		<td data-name="total" <?php echo $yayasan_view->total->cellAttributes() ?>>
<span id="el_yayasan_total">
<span<?php echo $yayasan_view->total->viewAttributes() ?>><?php echo $yayasan_view->total->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$yayasan_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$yayasan_view->isExport()) { ?>
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
$yayasan_view->terminate();
?>