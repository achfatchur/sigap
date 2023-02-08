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
$m_inval_view = new m_inval_view();

// Run the page
$m_inval_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_inval_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_inval_view->isExport()) { ?>
<script>
var fm_invalview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fm_invalview = currentForm = new ew.Form("fm_invalview", "view");
	loadjs.done("fm_invalview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$m_inval_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $m_inval_view->ExportOptions->render("body") ?>
<?php $m_inval_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $m_inval_view->showPageHeader(); ?>
<?php
$m_inval_view->showMessage();
?>
<form name="fm_invalview" id="fm_invalview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_inval">
<input type="hidden" name="modal" value="<?php echo (int)$m_inval_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($m_inval_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $m_inval_view->TableLeftColumnClass ?>"><span id="elh_m_inval_id"><?php echo $m_inval_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $m_inval_view->id->cellAttributes() ?>>
<span id="el_m_inval_id">
<span<?php echo $m_inval_view->id->viewAttributes() ?>><?php echo $m_inval_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_inval_view->jenjang_id->Visible) { // jenjang_id ?>
	<tr id="r_jenjang_id">
		<td class="<?php echo $m_inval_view->TableLeftColumnClass ?>"><span id="elh_m_inval_jenjang_id"><?php echo $m_inval_view->jenjang_id->caption() ?></span></td>
		<td data-name="jenjang_id" <?php echo $m_inval_view->jenjang_id->cellAttributes() ?>>
<span id="el_m_inval_jenjang_id">
<span<?php echo $m_inval_view->jenjang_id->viewAttributes() ?>><?php echo $m_inval_view->jenjang_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_inval_view->jabatan_id->Visible) { // jabatan_id ?>
	<tr id="r_jabatan_id">
		<td class="<?php echo $m_inval_view->TableLeftColumnClass ?>"><span id="elh_m_inval_jabatan_id"><?php echo $m_inval_view->jabatan_id->caption() ?></span></td>
		<td data-name="jabatan_id" <?php echo $m_inval_view->jabatan_id->cellAttributes() ?>>
<span id="el_m_inval_jabatan_id">
<span<?php echo $m_inval_view->jabatan_id->viewAttributes() ?>><?php echo $m_inval_view->jabatan_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_inval_view->value->Visible) { // value ?>
	<tr id="r_value">
		<td class="<?php echo $m_inval_view->TableLeftColumnClass ?>"><span id="elh_m_inval_value"><?php echo $m_inval_view->value->caption() ?></span></td>
		<td data-name="value" <?php echo $m_inval_view->value->cellAttributes() ?>>
<span id="el_m_inval_value">
<span<?php echo $m_inval_view->value->viewAttributes() ?>><?php echo $m_inval_view->value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$m_inval_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_inval_view->isExport()) { ?>
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
$m_inval_view->terminate();
?>