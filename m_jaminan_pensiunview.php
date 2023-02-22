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
$m_jaminan_pensiun_view = new m_jaminan_pensiun_view();

// Run the page
$m_jaminan_pensiun_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_jaminan_pensiun_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_jaminan_pensiun_view->isExport()) { ?>
<script>
var fm_jaminan_pensiunview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fm_jaminan_pensiunview = currentForm = new ew.Form("fm_jaminan_pensiunview", "view");
	loadjs.done("fm_jaminan_pensiunview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$m_jaminan_pensiun_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $m_jaminan_pensiun_view->ExportOptions->render("body") ?>
<?php $m_jaminan_pensiun_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $m_jaminan_pensiun_view->showPageHeader(); ?>
<?php
$m_jaminan_pensiun_view->showMessage();
?>
<form name="fm_jaminan_pensiunview" id="fm_jaminan_pensiunview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_jaminan_pensiun">
<input type="hidden" name="modal" value="<?php echo (int)$m_jaminan_pensiun_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($m_jaminan_pensiun_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $m_jaminan_pensiun_view->TableLeftColumnClass ?>"><span id="elh_m_jaminan_pensiun_id"><?php echo $m_jaminan_pensiun_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $m_jaminan_pensiun_view->id->cellAttributes() ?>>
<span id="el_m_jaminan_pensiun_id">
<span<?php echo $m_jaminan_pensiun_view->id->viewAttributes() ?>><?php echo $m_jaminan_pensiun_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_jaminan_pensiun_view->unit->Visible) { // unit ?>
	<tr id="r_unit">
		<td class="<?php echo $m_jaminan_pensiun_view->TableLeftColumnClass ?>"><span id="elh_m_jaminan_pensiun_unit"><?php echo $m_jaminan_pensiun_view->unit->caption() ?></span></td>
		<td data-name="unit" <?php echo $m_jaminan_pensiun_view->unit->cellAttributes() ?>>
<span id="el_m_jaminan_pensiun_unit">
<span<?php echo $m_jaminan_pensiun_view->unit->viewAttributes() ?>><?php echo $m_jaminan_pensiun_view->unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_jaminan_pensiun_view->value->Visible) { // value ?>
	<tr id="r_value">
		<td class="<?php echo $m_jaminan_pensiun_view->TableLeftColumnClass ?>"><span id="elh_m_jaminan_pensiun_value"><?php echo $m_jaminan_pensiun_view->value->caption() ?></span></td>
		<td data-name="value" <?php echo $m_jaminan_pensiun_view->value->cellAttributes() ?>>
<span id="el_m_jaminan_pensiun_value">
<span<?php echo $m_jaminan_pensiun_view->value->viewAttributes() ?>><?php echo $m_jaminan_pensiun_view->value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$m_jaminan_pensiun_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_jaminan_pensiun_view->isExport()) { ?>
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
$m_jaminan_pensiun_view->terminate();
?>