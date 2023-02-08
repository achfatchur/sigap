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
$generate_pertahun_smp_view = new generate_pertahun_smp_view();

// Run the page
$generate_pertahun_smp_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$generate_pertahun_smp_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$generate_pertahun_smp_view->isExport()) { ?>
<script>
var fgenerate_pertahun_smpview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fgenerate_pertahun_smpview = currentForm = new ew.Form("fgenerate_pertahun_smpview", "view");
	loadjs.done("fgenerate_pertahun_smpview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$generate_pertahun_smp_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $generate_pertahun_smp_view->ExportOptions->render("body") ?>
<?php $generate_pertahun_smp_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $generate_pertahun_smp_view->showPageHeader(); ?>
<?php
$generate_pertahun_smp_view->showMessage();
?>
<form name="fgenerate_pertahun_smpview" id="fgenerate_pertahun_smpview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="generate_pertahun_smp">
<input type="hidden" name="modal" value="<?php echo (int)$generate_pertahun_smp_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($generate_pertahun_smp_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $generate_pertahun_smp_view->TableLeftColumnClass ?>"><span id="elh_generate_pertahun_smp_id"><?php echo $generate_pertahun_smp_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $generate_pertahun_smp_view->id->cellAttributes() ?>>
<span id="el_generate_pertahun_smp_id">
<span<?php echo $generate_pertahun_smp_view->id->viewAttributes() ?>><?php echo $generate_pertahun_smp_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($generate_pertahun_smp_view->profesi->Visible) { // profesi ?>
	<tr id="r_profesi">
		<td class="<?php echo $generate_pertahun_smp_view->TableLeftColumnClass ?>"><span id="elh_generate_pertahun_smp_profesi"><?php echo $generate_pertahun_smp_view->profesi->caption() ?></span></td>
		<td data-name="profesi" <?php echo $generate_pertahun_smp_view->profesi->cellAttributes() ?>>
<span id="el_generate_pertahun_smp_profesi">
<span<?php echo $generate_pertahun_smp_view->profesi->viewAttributes() ?>><?php echo $generate_pertahun_smp_view->profesi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($generate_pertahun_smp_view->tahun->Visible) { // tahun ?>
	<tr id="r_tahun">
		<td class="<?php echo $generate_pertahun_smp_view->TableLeftColumnClass ?>"><span id="elh_generate_pertahun_smp_tahun"><?php echo $generate_pertahun_smp_view->tahun->caption() ?></span></td>
		<td data-name="tahun" <?php echo $generate_pertahun_smp_view->tahun->cellAttributes() ?>>
<span id="el_generate_pertahun_smp_tahun">
<span<?php echo $generate_pertahun_smp_view->tahun->viewAttributes() ?>><?php echo $generate_pertahun_smp_view->tahun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($generate_pertahun_smp_view->bulan->Visible) { // bulan ?>
	<tr id="r_bulan">
		<td class="<?php echo $generate_pertahun_smp_view->TableLeftColumnClass ?>"><span id="elh_generate_pertahun_smp_bulan"><?php echo $generate_pertahun_smp_view->bulan->caption() ?></span></td>
		<td data-name="bulan" <?php echo $generate_pertahun_smp_view->bulan->cellAttributes() ?>>
<span id="el_generate_pertahun_smp_bulan">
<span<?php echo $generate_pertahun_smp_view->bulan->viewAttributes() ?>><?php echo $generate_pertahun_smp_view->bulan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($generate_pertahun_smp_view->bulan2->Visible) { // bulan2 ?>
	<tr id="r_bulan2">
		<td class="<?php echo $generate_pertahun_smp_view->TableLeftColumnClass ?>"><span id="elh_generate_pertahun_smp_bulan2"><?php echo $generate_pertahun_smp_view->bulan2->caption() ?></span></td>
		<td data-name="bulan2" <?php echo $generate_pertahun_smp_view->bulan2->cellAttributes() ?>>
<span id="el_generate_pertahun_smp_bulan2">
<span<?php echo $generate_pertahun_smp_view->bulan2->viewAttributes() ?>><?php echo $generate_pertahun_smp_view->bulan2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$generate_pertahun_smp_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$generate_pertahun_smp_view->isExport()) { ?>
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
$generate_pertahun_smp_view->terminate();
?>