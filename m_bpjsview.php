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
$m_bpjs_view = new m_bpjs_view();

// Run the page
$m_bpjs_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_bpjs_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_bpjs_view->isExport()) { ?>
<script>
var fm_bpjsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fm_bpjsview = currentForm = new ew.Form("fm_bpjsview", "view");
	loadjs.done("fm_bpjsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$m_bpjs_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $m_bpjs_view->ExportOptions->render("body") ?>
<?php $m_bpjs_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $m_bpjs_view->showPageHeader(); ?>
<?php
$m_bpjs_view->showMessage();
?>
<form name="fm_bpjsview" id="fm_bpjsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_bpjs">
<input type="hidden" name="modal" value="<?php echo (int)$m_bpjs_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($m_bpjs_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $m_bpjs_view->TableLeftColumnClass ?>"><span id="elh_m_bpjs_id"><?php echo $m_bpjs_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $m_bpjs_view->id->cellAttributes() ?>>
<span id="el_m_bpjs_id">
<span<?php echo $m_bpjs_view->id->viewAttributes() ?>><?php echo $m_bpjs_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_bpjs_view->jenjang->Visible) { // jenjang ?>
	<tr id="r_jenjang">
		<td class="<?php echo $m_bpjs_view->TableLeftColumnClass ?>"><span id="elh_m_bpjs_jenjang"><?php echo $m_bpjs_view->jenjang->caption() ?></span></td>
		<td data-name="jenjang" <?php echo $m_bpjs_view->jenjang->cellAttributes() ?>>
<span id="el_m_bpjs_jenjang">
<span<?php echo $m_bpjs_view->jenjang->viewAttributes() ?>><?php echo $m_bpjs_view->jenjang->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_bpjs_view->golongan->Visible) { // golongan ?>
	<tr id="r_golongan">
		<td class="<?php echo $m_bpjs_view->TableLeftColumnClass ?>"><span id="elh_m_bpjs_golongan"><?php echo $m_bpjs_view->golongan->caption() ?></span></td>
		<td data-name="golongan" <?php echo $m_bpjs_view->golongan->cellAttributes() ?>>
<span id="el_m_bpjs_golongan">
<span<?php echo $m_bpjs_view->golongan->viewAttributes() ?>><?php echo $m_bpjs_view->golongan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_bpjs_view->value->Visible) { // value ?>
	<tr id="r_value">
		<td class="<?php echo $m_bpjs_view->TableLeftColumnClass ?>"><span id="elh_m_bpjs_value"><?php echo $m_bpjs_view->value->caption() ?></span></td>
		<td data-name="value" <?php echo $m_bpjs_view->value->cellAttributes() ?>>
<span id="el_m_bpjs_value">
<span<?php echo $m_bpjs_view->value->viewAttributes() ?>><?php echo $m_bpjs_view->value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_bpjs_view->golongan_id->Visible) { // golongan_id ?>
	<tr id="r_golongan_id">
		<td class="<?php echo $m_bpjs_view->TableLeftColumnClass ?>"><span id="elh_m_bpjs_golongan_id"><?php echo $m_bpjs_view->golongan_id->caption() ?></span></td>
		<td data-name="golongan_id" <?php echo $m_bpjs_view->golongan_id->cellAttributes() ?>>
<span id="el_m_bpjs_golongan_id">
<span<?php echo $m_bpjs_view->golongan_id->viewAttributes() ?>><?php echo $m_bpjs_view->golongan_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$m_bpjs_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_bpjs_view->isExport()) { ?>
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
$m_bpjs_view->terminate();
?>