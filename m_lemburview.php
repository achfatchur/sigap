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
$m_lembur_view = new m_lembur_view();

// Run the page
$m_lembur_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_lembur_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_lembur_view->isExport()) { ?>
<script>
var fm_lemburview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fm_lemburview = currentForm = new ew.Form("fm_lemburview", "view");
	loadjs.done("fm_lemburview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$m_lembur_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $m_lembur_view->ExportOptions->render("body") ?>
<?php $m_lembur_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $m_lembur_view->showPageHeader(); ?>
<?php
$m_lembur_view->showMessage();
?>
<form name="fm_lemburview" id="fm_lemburview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_lembur">
<input type="hidden" name="modal" value="<?php echo (int)$m_lembur_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($m_lembur_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $m_lembur_view->TableLeftColumnClass ?>"><span id="elh_m_lembur_id"><?php echo $m_lembur_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $m_lembur_view->id->cellAttributes() ?>>
<span id="el_m_lembur_id">
<span<?php echo $m_lembur_view->id->viewAttributes() ?>><?php echo $m_lembur_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_lembur_view->jenjang_id->Visible) { // jenjang_id ?>
	<tr id="r_jenjang_id">
		<td class="<?php echo $m_lembur_view->TableLeftColumnClass ?>"><span id="elh_m_lembur_jenjang_id"><?php echo $m_lembur_view->jenjang_id->caption() ?></span></td>
		<td data-name="jenjang_id" <?php echo $m_lembur_view->jenjang_id->cellAttributes() ?>>
<span id="el_m_lembur_jenjang_id">
<span<?php echo $m_lembur_view->jenjang_id->viewAttributes() ?>><?php echo $m_lembur_view->jenjang_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_lembur_view->jabatan_id->Visible) { // jabatan_id ?>
	<tr id="r_jabatan_id">
		<td class="<?php echo $m_lembur_view->TableLeftColumnClass ?>"><span id="elh_m_lembur_jabatan_id"><?php echo $m_lembur_view->jabatan_id->caption() ?></span></td>
		<td data-name="jabatan_id" <?php echo $m_lembur_view->jabatan_id->cellAttributes() ?>>
<span id="el_m_lembur_jabatan_id">
<span<?php echo $m_lembur_view->jabatan_id->viewAttributes() ?>><?php echo $m_lembur_view->jabatan_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_lembur_view->value_perjam->Visible) { // value_perjam ?>
	<tr id="r_value_perjam">
		<td class="<?php echo $m_lembur_view->TableLeftColumnClass ?>"><span id="elh_m_lembur_value_perjam"><?php echo $m_lembur_view->value_perjam->caption() ?></span></td>
		<td data-name="value_perjam" <?php echo $m_lembur_view->value_perjam->cellAttributes() ?>>
<span id="el_m_lembur_value_perjam">
<span<?php echo $m_lembur_view->value_perjam->viewAttributes() ?>><?php echo $m_lembur_view->value_perjam->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$m_lembur_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_lembur_view->isExport()) { ?>
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
$m_lembur_view->terminate();
?>