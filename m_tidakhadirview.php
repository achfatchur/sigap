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
$m_tidakhadir_view = new m_tidakhadir_view();

// Run the page
$m_tidakhadir_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_tidakhadir_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_tidakhadir_view->isExport()) { ?>
<script>
var fm_tidakhadirview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fm_tidakhadirview = currentForm = new ew.Form("fm_tidakhadirview", "view");
	loadjs.done("fm_tidakhadirview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$m_tidakhadir_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $m_tidakhadir_view->ExportOptions->render("body") ?>
<?php $m_tidakhadir_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $m_tidakhadir_view->showPageHeader(); ?>
<?php
$m_tidakhadir_view->showMessage();
?>
<form name="fm_tidakhadirview" id="fm_tidakhadirview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_tidakhadir">
<input type="hidden" name="modal" value="<?php echo (int)$m_tidakhadir_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($m_tidakhadir_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $m_tidakhadir_view->TableLeftColumnClass ?>"><span id="elh_m_tidakhadir_id"><?php echo $m_tidakhadir_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $m_tidakhadir_view->id->cellAttributes() ?>>
<span id="el_m_tidakhadir_id">
<span<?php echo $m_tidakhadir_view->id->viewAttributes() ?>><?php echo $m_tidakhadir_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_tidakhadir_view->jenjang_id->Visible) { // jenjang_id ?>
	<tr id="r_jenjang_id">
		<td class="<?php echo $m_tidakhadir_view->TableLeftColumnClass ?>"><span id="elh_m_tidakhadir_jenjang_id"><?php echo $m_tidakhadir_view->jenjang_id->caption() ?></span></td>
		<td data-name="jenjang_id" <?php echo $m_tidakhadir_view->jenjang_id->cellAttributes() ?>>
<span id="el_m_tidakhadir_jenjang_id">
<span<?php echo $m_tidakhadir_view->jenjang_id->viewAttributes() ?>><?php echo $m_tidakhadir_view->jenjang_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_tidakhadir_view->jabatan_id->Visible) { // jabatan_id ?>
	<tr id="r_jabatan_id">
		<td class="<?php echo $m_tidakhadir_view->TableLeftColumnClass ?>"><span id="elh_m_tidakhadir_jabatan_id"><?php echo $m_tidakhadir_view->jabatan_id->caption() ?></span></td>
		<td data-name="jabatan_id" <?php echo $m_tidakhadir_view->jabatan_id->cellAttributes() ?>>
<span id="el_m_tidakhadir_jabatan_id">
<span<?php echo $m_tidakhadir_view->jabatan_id->viewAttributes() ?>><?php echo $m_tidakhadir_view->jabatan_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_tidakhadir_view->sertif->Visible) { // sertif ?>
	<tr id="r_sertif">
		<td class="<?php echo $m_tidakhadir_view->TableLeftColumnClass ?>"><span id="elh_m_tidakhadir_sertif"><?php echo $m_tidakhadir_view->sertif->caption() ?></span></td>
		<td data-name="sertif" <?php echo $m_tidakhadir_view->sertif->cellAttributes() ?>>
<span id="el_m_tidakhadir_sertif">
<span<?php echo $m_tidakhadir_view->sertif->viewAttributes() ?>><?php echo $m_tidakhadir_view->sertif->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_tidakhadir_view->value->Visible) { // value ?>
	<tr id="r_value">
		<td class="<?php echo $m_tidakhadir_view->TableLeftColumnClass ?>"><span id="elh_m_tidakhadir_value"><?php echo $m_tidakhadir_view->value->caption() ?></span></td>
		<td data-name="value" <?php echo $m_tidakhadir_view->value->cellAttributes() ?>>
<span id="el_m_tidakhadir_value">
<span<?php echo $m_tidakhadir_view->value->viewAttributes() ?>><?php echo $m_tidakhadir_view->value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_tidakhadir_view->perjam_value->Visible) { // perjam_value ?>
	<tr id="r_perjam_value">
		<td class="<?php echo $m_tidakhadir_view->TableLeftColumnClass ?>"><span id="elh_m_tidakhadir_perjam_value"><?php echo $m_tidakhadir_view->perjam_value->caption() ?></span></td>
		<td data-name="perjam_value" <?php echo $m_tidakhadir_view->perjam_value->cellAttributes() ?>>
<span id="el_m_tidakhadir_perjam_value">
<span<?php echo $m_tidakhadir_view->perjam_value->viewAttributes() ?>><?php echo $m_tidakhadir_view->perjam_value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_tidakhadir_view->type->Visible) { // type ?>
	<tr id="r_type">
		<td class="<?php echo $m_tidakhadir_view->TableLeftColumnClass ?>"><span id="elh_m_tidakhadir_type"><?php echo $m_tidakhadir_view->type->caption() ?></span></td>
		<td data-name="type" <?php echo $m_tidakhadir_view->type->cellAttributes() ?>>
<span id="el_m_tidakhadir_type">
<span<?php echo $m_tidakhadir_view->type->viewAttributes() ?>><?php echo $m_tidakhadir_view->type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$m_tidakhadir_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_tidakhadir_view->isExport()) { ?>
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
$m_tidakhadir_view->terminate();
?>