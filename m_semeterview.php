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
$m_semeter_view = new m_semeter_view();

// Run the page
$m_semeter_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_semeter_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_semeter_view->isExport()) { ?>
<script>
var fm_semeterview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fm_semeterview = currentForm = new ew.Form("fm_semeterview", "view");
	loadjs.done("fm_semeterview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$m_semeter_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $m_semeter_view->ExportOptions->render("body") ?>
<?php $m_semeter_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $m_semeter_view->showPageHeader(); ?>
<?php
$m_semeter_view->showMessage();
?>
<form name="fm_semeterview" id="fm_semeterview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_semeter">
<input type="hidden" name="modal" value="<?php echo (int)$m_semeter_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($m_semeter_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $m_semeter_view->TableLeftColumnClass ?>"><span id="elh_m_semeter_id"><?php echo $m_semeter_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $m_semeter_view->id->cellAttributes() ?>>
<span id="el_m_semeter_id">
<span<?php echo $m_semeter_view->id->viewAttributes() ?>><?php echo $m_semeter_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_semeter_view->smtr->Visible) { // smtr ?>
	<tr id="r_smtr">
		<td class="<?php echo $m_semeter_view->TableLeftColumnClass ?>"><span id="elh_m_semeter_smtr"><?php echo $m_semeter_view->smtr->caption() ?></span></td>
		<td data-name="smtr" <?php echo $m_semeter_view->smtr->cellAttributes() ?>>
<span id="el_m_semeter_smtr">
<span<?php echo $m_semeter_view->smtr->viewAttributes() ?>><?php echo $m_semeter_view->smtr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_semeter_view->bulan->Visible) { // bulan ?>
	<tr id="r_bulan">
		<td class="<?php echo $m_semeter_view->TableLeftColumnClass ?>"><span id="elh_m_semeter_bulan"><?php echo $m_semeter_view->bulan->caption() ?></span></td>
		<td data-name="bulan" <?php echo $m_semeter_view->bulan->cellAttributes() ?>>
<span id="el_m_semeter_bulan">
<span<?php echo $m_semeter_view->bulan->viewAttributes() ?>><?php echo $m_semeter_view->bulan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_semeter_view->detil_smtr->Visible) { // detil_smtr ?>
	<tr id="r_detil_smtr">
		<td class="<?php echo $m_semeter_view->TableLeftColumnClass ?>"><span id="elh_m_semeter_detil_smtr"><?php echo $m_semeter_view->detil_smtr->caption() ?></span></td>
		<td data-name="detil_smtr" <?php echo $m_semeter_view->detil_smtr->cellAttributes() ?>>
<span id="el_m_semeter_detil_smtr">
<span<?php echo $m_semeter_view->detil_smtr->viewAttributes() ?>><?php echo $m_semeter_view->detil_smtr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$m_semeter_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_semeter_view->isExport()) { ?>
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
$m_semeter_view->terminate();
?>