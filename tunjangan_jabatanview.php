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
$tunjangan_jabatan_view = new tunjangan_jabatan_view();

// Run the page
$tunjangan_jabatan_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tunjangan_jabatan_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tunjangan_jabatan_view->isExport()) { ?>
<script>
var ftunjangan_jabatanview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ftunjangan_jabatanview = currentForm = new ew.Form("ftunjangan_jabatanview", "view");
	loadjs.done("ftunjangan_jabatanview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tunjangan_jabatan_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tunjangan_jabatan_view->ExportOptions->render("body") ?>
<?php $tunjangan_jabatan_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tunjangan_jabatan_view->showPageHeader(); ?>
<?php
$tunjangan_jabatan_view->showMessage();
?>
<form name="ftunjangan_jabatanview" id="ftunjangan_jabatanview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tunjangan_jabatan">
<input type="hidden" name="modal" value="<?php echo (int)$tunjangan_jabatan_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tunjangan_jabatan_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $tunjangan_jabatan_view->TableLeftColumnClass ?>"><span id="elh_tunjangan_jabatan_id"><?php echo $tunjangan_jabatan_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $tunjangan_jabatan_view->id->cellAttributes() ?>>
<span id="el_tunjangan_jabatan_id">
<span<?php echo $tunjangan_jabatan_view->id->viewAttributes() ?>><?php echo $tunjangan_jabatan_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tunjangan_jabatan_view->unit->Visible) { // unit ?>
	<tr id="r_unit">
		<td class="<?php echo $tunjangan_jabatan_view->TableLeftColumnClass ?>"><span id="elh_tunjangan_jabatan_unit"><?php echo $tunjangan_jabatan_view->unit->caption() ?></span></td>
		<td data-name="unit" <?php echo $tunjangan_jabatan_view->unit->cellAttributes() ?>>
<span id="el_tunjangan_jabatan_unit">
<span<?php echo $tunjangan_jabatan_view->unit->viewAttributes() ?>><?php echo $tunjangan_jabatan_view->unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tunjangan_jabatan_view->jabatan->Visible) { // jabatan ?>
	<tr id="r_jabatan">
		<td class="<?php echo $tunjangan_jabatan_view->TableLeftColumnClass ?>"><span id="elh_tunjangan_jabatan_jabatan"><?php echo $tunjangan_jabatan_view->jabatan->caption() ?></span></td>
		<td data-name="jabatan" <?php echo $tunjangan_jabatan_view->jabatan->cellAttributes() ?>>
<span id="el_tunjangan_jabatan_jabatan">
<span<?php echo $tunjangan_jabatan_view->jabatan->viewAttributes() ?>><?php echo $tunjangan_jabatan_view->jabatan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tunjangan_jabatan_view->value->Visible) { // value ?>
	<tr id="r_value">
		<td class="<?php echo $tunjangan_jabatan_view->TableLeftColumnClass ?>"><span id="elh_tunjangan_jabatan_value"><?php echo $tunjangan_jabatan_view->value->caption() ?></span></td>
		<td data-name="value" <?php echo $tunjangan_jabatan_view->value->cellAttributes() ?>>
<span id="el_tunjangan_jabatan_value">
<span<?php echo $tunjangan_jabatan_view->value->viewAttributes() ?>><?php echo $tunjangan_jabatan_view->value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$tunjangan_jabatan_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tunjangan_jabatan_view->isExport()) { ?>
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
$tunjangan_jabatan_view->terminate();
?>