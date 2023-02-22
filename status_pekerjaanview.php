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
$status_pekerjaan_view = new status_pekerjaan_view();

// Run the page
$status_pekerjaan_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$status_pekerjaan_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$status_pekerjaan_view->isExport()) { ?>
<script>
var fstatus_pekerjaanview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fstatus_pekerjaanview = currentForm = new ew.Form("fstatus_pekerjaanview", "view");
	loadjs.done("fstatus_pekerjaanview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$status_pekerjaan_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $status_pekerjaan_view->ExportOptions->render("body") ?>
<?php $status_pekerjaan_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $status_pekerjaan_view->showPageHeader(); ?>
<?php
$status_pekerjaan_view->showMessage();
?>
<form name="fstatus_pekerjaanview" id="fstatus_pekerjaanview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="status_pekerjaan">
<input type="hidden" name="modal" value="<?php echo (int)$status_pekerjaan_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($status_pekerjaan_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $status_pekerjaan_view->TableLeftColumnClass ?>"><span id="elh_status_pekerjaan_id"><?php echo $status_pekerjaan_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $status_pekerjaan_view->id->cellAttributes() ?>>
<span id="el_status_pekerjaan_id">
<span<?php echo $status_pekerjaan_view->id->viewAttributes() ?>><?php echo $status_pekerjaan_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($status_pekerjaan_view->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $status_pekerjaan_view->TableLeftColumnClass ?>"><span id="elh_status_pekerjaan_name"><?php echo $status_pekerjaan_view->name->caption() ?></span></td>
		<td data-name="name" <?php echo $status_pekerjaan_view->name->cellAttributes() ?>>
<span id="el_status_pekerjaan_name">
<span<?php echo $status_pekerjaan_view->name->viewAttributes() ?>><?php echo $status_pekerjaan_view->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$status_pekerjaan_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$status_pekerjaan_view->isExport()) { ?>
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
$status_pekerjaan_view->terminate();
?>