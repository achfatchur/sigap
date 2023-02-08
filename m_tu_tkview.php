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
$m_tu_tk_view = new m_tu_tk_view();

// Run the page
$m_tu_tk_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_tu_tk_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_tu_tk_view->isExport()) { ?>
<script>
var fm_tu_tkview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fm_tu_tkview = currentForm = new ew.Form("fm_tu_tkview", "view");
	loadjs.done("fm_tu_tkview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$m_tu_tk_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $m_tu_tk_view->ExportOptions->render("body") ?>
<?php $m_tu_tk_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $m_tu_tk_view->showPageHeader(); ?>
<?php
$m_tu_tk_view->showMessage();
?>
<form name="fm_tu_tkview" id="fm_tu_tkview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_tu_tk">
<input type="hidden" name="modal" value="<?php echo (int)$m_tu_tk_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($m_tu_tk_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $m_tu_tk_view->TableLeftColumnClass ?>"><span id="elh_m_tu_tk_id"><?php echo $m_tu_tk_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $m_tu_tk_view->id->cellAttributes() ?>>
<span id="el_m_tu_tk_id">
<span<?php echo $m_tu_tk_view->id->viewAttributes() ?>><?php echo $m_tu_tk_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_tu_tk_view->datetime->Visible) { // datetime ?>
	<tr id="r_datetime">
		<td class="<?php echo $m_tu_tk_view->TableLeftColumnClass ?>"><span id="elh_m_tu_tk_datetime"><?php echo $m_tu_tk_view->datetime->caption() ?></span></td>
		<td data-name="datetime" <?php echo $m_tu_tk_view->datetime->cellAttributes() ?>>
<span id="el_m_tu_tk_datetime">
<span<?php echo $m_tu_tk_view->datetime->viewAttributes() ?>><?php echo $m_tu_tk_view->datetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_tu_tk_view->createby->Visible) { // createby ?>
	<tr id="r_createby">
		<td class="<?php echo $m_tu_tk_view->TableLeftColumnClass ?>"><span id="elh_m_tu_tk_createby"><?php echo $m_tu_tk_view->createby->caption() ?></span></td>
		<td data-name="createby" <?php echo $m_tu_tk_view->createby->cellAttributes() ?>>
<span id="el_m_tu_tk_createby">
<span<?php echo $m_tu_tk_view->createby->viewAttributes() ?>><?php echo $m_tu_tk_view->createby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_tu_tk_view->tahun->Visible) { // tahun ?>
	<tr id="r_tahun">
		<td class="<?php echo $m_tu_tk_view->TableLeftColumnClass ?>"><span id="elh_m_tu_tk_tahun"><?php echo $m_tu_tk_view->tahun->caption() ?></span></td>
		<td data-name="tahun" <?php echo $m_tu_tk_view->tahun->cellAttributes() ?>>
<span id="el_m_tu_tk_tahun">
<span<?php echo $m_tu_tk_view->tahun->viewAttributes() ?>><?php echo $m_tu_tk_view->tahun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_tu_tk_view->bulan->Visible) { // bulan ?>
	<tr id="r_bulan">
		<td class="<?php echo $m_tu_tk_view->TableLeftColumnClass ?>"><span id="elh_m_tu_tk_bulan"><?php echo $m_tu_tk_view->bulan->caption() ?></span></td>
		<td data-name="bulan" <?php echo $m_tu_tk_view->bulan->cellAttributes() ?>>
<span id="el_m_tu_tk_bulan">
<span<?php echo $m_tu_tk_view->bulan->viewAttributes() ?>><?php echo $m_tu_tk_view->bulan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("gaji_tu_tk", explode(",", $m_tu_tk->getCurrentDetailTable())) && $gaji_tu_tk->DetailView) {
?>
<?php if ($m_tu_tk->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("gaji_tu_tk", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "gaji_tu_tkgrid.php" ?>
<?php } ?>
</form>
<?php
$m_tu_tk_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_tu_tk_view->isExport()) { ?>
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
$m_tu_tk_view->terminate();
?>