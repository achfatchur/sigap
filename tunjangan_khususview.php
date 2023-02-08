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
$tunjangan_khusus_view = new tunjangan_khusus_view();

// Run the page
$tunjangan_khusus_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tunjangan_khusus_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tunjangan_khusus_view->isExport()) { ?>
<script>
var ftunjangan_khususview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ftunjangan_khususview = currentForm = new ew.Form("ftunjangan_khususview", "view");
	loadjs.done("ftunjangan_khususview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tunjangan_khusus_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tunjangan_khusus_view->ExportOptions->render("body") ?>
<?php $tunjangan_khusus_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tunjangan_khusus_view->showPageHeader(); ?>
<?php
$tunjangan_khusus_view->showMessage();
?>
<form name="ftunjangan_khususview" id="ftunjangan_khususview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tunjangan_khusus">
<input type="hidden" name="modal" value="<?php echo (int)$tunjangan_khusus_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tunjangan_khusus_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $tunjangan_khusus_view->TableLeftColumnClass ?>"><span id="elh_tunjangan_khusus_id"><?php echo $tunjangan_khusus_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $tunjangan_khusus_view->id->cellAttributes() ?>>
<span id="el_tunjangan_khusus_id">
<span<?php echo $tunjangan_khusus_view->id->viewAttributes() ?>><?php echo $tunjangan_khusus_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tunjangan_khusus_view->unit->Visible) { // unit ?>
	<tr id="r_unit">
		<td class="<?php echo $tunjangan_khusus_view->TableLeftColumnClass ?>"><span id="elh_tunjangan_khusus_unit"><?php echo $tunjangan_khusus_view->unit->caption() ?></span></td>
		<td data-name="unit" <?php echo $tunjangan_khusus_view->unit->cellAttributes() ?>>
<span id="el_tunjangan_khusus_unit">
<span<?php echo $tunjangan_khusus_view->unit->viewAttributes() ?>><?php echo $tunjangan_khusus_view->unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tunjangan_khusus_view->jabatan->Visible) { // jabatan ?>
	<tr id="r_jabatan">
		<td class="<?php echo $tunjangan_khusus_view->TableLeftColumnClass ?>"><span id="elh_tunjangan_khusus_jabatan"><?php echo $tunjangan_khusus_view->jabatan->caption() ?></span></td>
		<td data-name="jabatan" <?php echo $tunjangan_khusus_view->jabatan->cellAttributes() ?>>
<span id="el_tunjangan_khusus_jabatan">
<span<?php echo $tunjangan_khusus_view->jabatan->viewAttributes() ?>><?php echo $tunjangan_khusus_view->jabatan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tunjangan_khusus_view->value->Visible) { // value ?>
	<tr id="r_value">
		<td class="<?php echo $tunjangan_khusus_view->TableLeftColumnClass ?>"><span id="elh_tunjangan_khusus_value"><?php echo $tunjangan_khusus_view->value->caption() ?></span></td>
		<td data-name="value" <?php echo $tunjangan_khusus_view->value->cellAttributes() ?>>
<span id="el_tunjangan_khusus_value">
<span<?php echo $tunjangan_khusus_view->value->viewAttributes() ?>><?php echo $tunjangan_khusus_view->value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$tunjangan_khusus_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tunjangan_khusus_view->isExport()) { ?>
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
$tunjangan_khusus_view->terminate();
?>