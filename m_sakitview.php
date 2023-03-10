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
$m_sakit_view = new m_sakit_view();

// Run the page
$m_sakit_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_sakit_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_sakit_view->isExport()) { ?>
<script>
var fm_sakitview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fm_sakitview = currentForm = new ew.Form("fm_sakitview", "view");
	loadjs.done("fm_sakitview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$m_sakit_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $m_sakit_view->ExportOptions->render("body") ?>
<?php $m_sakit_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $m_sakit_view->showPageHeader(); ?>
<?php
$m_sakit_view->showMessage();
?>
<form name="fm_sakitview" id="fm_sakitview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_sakit">
<input type="hidden" name="modal" value="<?php echo (int)$m_sakit_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($m_sakit_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $m_sakit_view->TableLeftColumnClass ?>"><span id="elh_m_sakit_id"><?php echo $m_sakit_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $m_sakit_view->id->cellAttributes() ?>>
<span id="el_m_sakit_id">
<span<?php echo $m_sakit_view->id->viewAttributes() ?>><?php echo $m_sakit_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_sakit_view->jenjang_id->Visible) { // jenjang_id ?>
	<tr id="r_jenjang_id">
		<td class="<?php echo $m_sakit_view->TableLeftColumnClass ?>"><span id="elh_m_sakit_jenjang_id"><?php echo $m_sakit_view->jenjang_id->caption() ?></span></td>
		<td data-name="jenjang_id" <?php echo $m_sakit_view->jenjang_id->cellAttributes() ?>>
<span id="el_m_sakit_jenjang_id">
<span<?php echo $m_sakit_view->jenjang_id->viewAttributes() ?>><?php echo $m_sakit_view->jenjang_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_sakit_view->jabatan->Visible) { // jabatan ?>
	<tr id="r_jabatan">
		<td class="<?php echo $m_sakit_view->TableLeftColumnClass ?>"><span id="elh_m_sakit_jabatan"><?php echo $m_sakit_view->jabatan->caption() ?></span></td>
		<td data-name="jabatan" <?php echo $m_sakit_view->jabatan->cellAttributes() ?>>
<span id="el_m_sakit_jabatan">
<span<?php echo $m_sakit_view->jabatan->viewAttributes() ?>><?php echo $m_sakit_view->jabatan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_sakit_view->sertif->Visible) { // sertif ?>
	<tr id="r_sertif">
		<td class="<?php echo $m_sakit_view->TableLeftColumnClass ?>"><span id="elh_m_sakit_sertif"><?php echo $m_sakit_view->sertif->caption() ?></span></td>
		<td data-name="sertif" <?php echo $m_sakit_view->sertif->cellAttributes() ?>>
<span id="el_m_sakit_sertif">
<span<?php echo $m_sakit_view->sertif->viewAttributes() ?>><?php echo $m_sakit_view->sertif->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_sakit_view->perhari->Visible) { // perhari ?>
	<tr id="r_perhari">
		<td class="<?php echo $m_sakit_view->TableLeftColumnClass ?>"><span id="elh_m_sakit_perhari"><?php echo $m_sakit_view->perhari->caption() ?></span></td>
		<td data-name="perhari" <?php echo $m_sakit_view->perhari->cellAttributes() ?>>
<span id="el_m_sakit_perhari">
<span<?php echo $m_sakit_view->perhari->viewAttributes() ?>><?php echo $m_sakit_view->perhari->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_sakit_view->perjam->Visible) { // perjam ?>
	<tr id="r_perjam">
		<td class="<?php echo $m_sakit_view->TableLeftColumnClass ?>"><span id="elh_m_sakit_perjam"><?php echo $m_sakit_view->perjam->caption() ?></span></td>
		<td data-name="perjam" <?php echo $m_sakit_view->perjam->cellAttributes() ?>>
<span id="el_m_sakit_perjam">
<span<?php echo $m_sakit_view->perjam->viewAttributes() ?>><?php echo $m_sakit_view->perjam->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_sakit_view->type->Visible) { // type ?>
	<tr id="r_type">
		<td class="<?php echo $m_sakit_view->TableLeftColumnClass ?>"><span id="elh_m_sakit_type"><?php echo $m_sakit_view->type->caption() ?></span></td>
		<td data-name="type" <?php echo $m_sakit_view->type->cellAttributes() ?>>
<span id="el_m_sakit_type">
<span<?php echo $m_sakit_view->type->viewAttributes() ?>><?php echo $m_sakit_view->type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$m_sakit_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_sakit_view->isExport()) { ?>
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
$m_sakit_view->terminate();
?>