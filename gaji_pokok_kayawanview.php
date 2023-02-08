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
$gaji_pokok_kayawan_view = new gaji_pokok_kayawan_view();

// Run the page
$gaji_pokok_kayawan_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_pokok_kayawan_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$gaji_pokok_kayawan_view->isExport()) { ?>
<script>
var fgaji_pokok_kayawanview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fgaji_pokok_kayawanview = currentForm = new ew.Form("fgaji_pokok_kayawanview", "view");
	loadjs.done("fgaji_pokok_kayawanview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$gaji_pokok_kayawan_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $gaji_pokok_kayawan_view->ExportOptions->render("body") ?>
<?php $gaji_pokok_kayawan_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $gaji_pokok_kayawan_view->showPageHeader(); ?>
<?php
$gaji_pokok_kayawan_view->showMessage();
?>
<form name="fgaji_pokok_kayawanview" id="fgaji_pokok_kayawanview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="gaji_pokok_kayawan">
<input type="hidden" name="modal" value="<?php echo (int)$gaji_pokok_kayawan_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($gaji_pokok_kayawan_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $gaji_pokok_kayawan_view->TableLeftColumnClass ?>"><span id="elh_gaji_pokok_kayawan_id"><?php echo $gaji_pokok_kayawan_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $gaji_pokok_kayawan_view->id->cellAttributes() ?>>
<span id="el_gaji_pokok_kayawan_id">
<span<?php echo $gaji_pokok_kayawan_view->id->viewAttributes() ?>><?php echo $gaji_pokok_kayawan_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_pokok_kayawan_view->jenjang_id->Visible) { // jenjang_id ?>
	<tr id="r_jenjang_id">
		<td class="<?php echo $gaji_pokok_kayawan_view->TableLeftColumnClass ?>"><span id="elh_gaji_pokok_kayawan_jenjang_id"><?php echo $gaji_pokok_kayawan_view->jenjang_id->caption() ?></span></td>
		<td data-name="jenjang_id" <?php echo $gaji_pokok_kayawan_view->jenjang_id->cellAttributes() ?>>
<span id="el_gaji_pokok_kayawan_jenjang_id">
<span<?php echo $gaji_pokok_kayawan_view->jenjang_id->viewAttributes() ?>><?php echo $gaji_pokok_kayawan_view->jenjang_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_pokok_kayawan_view->jabatan_id->Visible) { // jabatan_id ?>
	<tr id="r_jabatan_id">
		<td class="<?php echo $gaji_pokok_kayawan_view->TableLeftColumnClass ?>"><span id="elh_gaji_pokok_kayawan_jabatan_id"><?php echo $gaji_pokok_kayawan_view->jabatan_id->caption() ?></span></td>
		<td data-name="jabatan_id" <?php echo $gaji_pokok_kayawan_view->jabatan_id->cellAttributes() ?>>
<span id="el_gaji_pokok_kayawan_jabatan_id">
<span<?php echo $gaji_pokok_kayawan_view->jabatan_id->viewAttributes() ?>><?php echo $gaji_pokok_kayawan_view->jabatan_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($gaji_pokok_kayawan_view->value->Visible) { // value ?>
	<tr id="r_value">
		<td class="<?php echo $gaji_pokok_kayawan_view->TableLeftColumnClass ?>"><span id="elh_gaji_pokok_kayawan_value"><?php echo $gaji_pokok_kayawan_view->value->caption() ?></span></td>
		<td data-name="value" <?php echo $gaji_pokok_kayawan_view->value->cellAttributes() ?>>
<span id="el_gaji_pokok_kayawan_value">
<span<?php echo $gaji_pokok_kayawan_view->value->viewAttributes() ?>><?php echo $gaji_pokok_kayawan_view->value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$gaji_pokok_kayawan_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$gaji_pokok_kayawan_view->isExport()) { ?>
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
$gaji_pokok_kayawan_view->terminate();
?>