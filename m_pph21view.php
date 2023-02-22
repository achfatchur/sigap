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
$m_pph21_view = new m_pph21_view();

// Run the page
$m_pph21_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_pph21_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_pph21_view->isExport()) { ?>
<script>
var fm_pph21view, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fm_pph21view = currentForm = new ew.Form("fm_pph21view", "view");
	loadjs.done("fm_pph21view");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$m_pph21_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $m_pph21_view->ExportOptions->render("body") ?>
<?php $m_pph21_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $m_pph21_view->showPageHeader(); ?>
<?php
$m_pph21_view->showMessage();
?>
<form name="fm_pph21view" id="fm_pph21view" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_pph21">
<input type="hidden" name="modal" value="<?php echo (int)$m_pph21_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($m_pph21_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $m_pph21_view->TableLeftColumnClass ?>"><span id="elh_m_pph21_id"><?php echo $m_pph21_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $m_pph21_view->id->cellAttributes() ?>>
<span id="el_m_pph21_id">
<span<?php echo $m_pph21_view->id->viewAttributes() ?>><?php echo $m_pph21_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_pph21_view->unit->Visible) { // unit ?>
	<tr id="r_unit">
		<td class="<?php echo $m_pph21_view->TableLeftColumnClass ?>"><span id="elh_m_pph21_unit"><?php echo $m_pph21_view->unit->caption() ?></span></td>
		<td data-name="unit" <?php echo $m_pph21_view->unit->cellAttributes() ?>>
<span id="el_m_pph21_unit">
<span<?php echo $m_pph21_view->unit->viewAttributes() ?>><?php echo $m_pph21_view->unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_pph21_view->value1->Visible) { // value1 ?>
	<tr id="r_value1">
		<td class="<?php echo $m_pph21_view->TableLeftColumnClass ?>"><span id="elh_m_pph21_value1"><?php echo $m_pph21_view->value1->caption() ?></span></td>
		<td data-name="value1" <?php echo $m_pph21_view->value1->cellAttributes() ?>>
<span id="el_m_pph21_value1">
<span<?php echo $m_pph21_view->value1->viewAttributes() ?>><?php echo $m_pph21_view->value1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_pph21_view->value2->Visible) { // value2 ?>
	<tr id="r_value2">
		<td class="<?php echo $m_pph21_view->TableLeftColumnClass ?>"><span id="elh_m_pph21_value2"><?php echo $m_pph21_view->value2->caption() ?></span></td>
		<td data-name="value2" <?php echo $m_pph21_view->value2->cellAttributes() ?>>
<span id="el_m_pph21_value2">
<span<?php echo $m_pph21_view->value2->viewAttributes() ?>><?php echo $m_pph21_view->value2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_pph21_view->value3->Visible) { // value3 ?>
	<tr id="r_value3">
		<td class="<?php echo $m_pph21_view->TableLeftColumnClass ?>"><span id="elh_m_pph21_value3"><?php echo $m_pph21_view->value3->caption() ?></span></td>
		<td data-name="value3" <?php echo $m_pph21_view->value3->cellAttributes() ?>>
<span id="el_m_pph21_value3">
<span<?php echo $m_pph21_view->value3->viewAttributes() ?>><?php echo $m_pph21_view->value3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$m_pph21_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_pph21_view->isExport()) { ?>
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
$m_pph21_view->terminate();
?>