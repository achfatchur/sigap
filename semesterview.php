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
$semester_view = new semester_view();

// Run the page
$semester_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$semester_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$semester_view->isExport()) { ?>
<script>
var fsemesterview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fsemesterview = currentForm = new ew.Form("fsemesterview", "view");
	loadjs.done("fsemesterview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$semester_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $semester_view->ExportOptions->render("body") ?>
<?php $semester_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $semester_view->showPageHeader(); ?>
<?php
$semester_view->showMessage();
?>
<form name="fsemesterview" id="fsemesterview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="semester">
<input type="hidden" name="modal" value="<?php echo (int)$semester_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($semester_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $semester_view->TableLeftColumnClass ?>"><span id="elh_semester_id"><?php echo $semester_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $semester_view->id->cellAttributes() ?>>
<span id="el_semester_id">
<span<?php echo $semester_view->id->viewAttributes() ?>><?php echo $semester_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($semester_view->nama->Visible) { // nama ?>
	<tr id="r_nama">
		<td class="<?php echo $semester_view->TableLeftColumnClass ?>"><span id="elh_semester_nama"><?php echo $semester_view->nama->caption() ?></span></td>
		<td data-name="nama" <?php echo $semester_view->nama->cellAttributes() ?>>
<span id="el_semester_nama">
<span<?php echo $semester_view->nama->viewAttributes() ?>><?php echo $semester_view->nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$semester_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$semester_view->isExport()) { ?>
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
$semester_view->terminate();
?>