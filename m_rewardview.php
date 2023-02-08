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
$m_reward_view = new m_reward_view();

// Run the page
$m_reward_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_reward_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_reward_view->isExport()) { ?>
<script>
var fm_rewardview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fm_rewardview = currentForm = new ew.Form("fm_rewardview", "view");
	loadjs.done("fm_rewardview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$m_reward_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $m_reward_view->ExportOptions->render("body") ?>
<?php $m_reward_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $m_reward_view->showPageHeader(); ?>
<?php
$m_reward_view->showMessage();
?>
<form name="fm_rewardview" id="fm_rewardview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_reward">
<input type="hidden" name="modal" value="<?php echo (int)$m_reward_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($m_reward_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $m_reward_view->TableLeftColumnClass ?>"><span id="elh_m_reward_id"><?php echo $m_reward_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $m_reward_view->id->cellAttributes() ?>>
<span id="el_m_reward_id">
<span<?php echo $m_reward_view->id->viewAttributes() ?>><?php echo $m_reward_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_reward_view->jenjang->Visible) { // jenjang ?>
	<tr id="r_jenjang">
		<td class="<?php echo $m_reward_view->TableLeftColumnClass ?>"><span id="elh_m_reward_jenjang"><?php echo $m_reward_view->jenjang->caption() ?></span></td>
		<td data-name="jenjang" <?php echo $m_reward_view->jenjang->cellAttributes() ?>>
<span id="el_m_reward_jenjang">
<span<?php echo $m_reward_view->jenjang->viewAttributes() ?>><?php echo $m_reward_view->jenjang->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_reward_view->jabatan->Visible) { // jabatan ?>
	<tr id="r_jabatan">
		<td class="<?php echo $m_reward_view->TableLeftColumnClass ?>"><span id="elh_m_reward_jabatan"><?php echo $m_reward_view->jabatan->caption() ?></span></td>
		<td data-name="jabatan" <?php echo $m_reward_view->jabatan->cellAttributes() ?>>
<span id="el_m_reward_jabatan">
<span<?php echo $m_reward_view->jabatan->viewAttributes() ?>><?php echo $m_reward_view->jabatan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_reward_view->min_jmlh_masuk->Visible) { // min_jmlh_masuk ?>
	<tr id="r_min_jmlh_masuk">
		<td class="<?php echo $m_reward_view->TableLeftColumnClass ?>"><span id="elh_m_reward_min_jmlh_masuk"><?php echo $m_reward_view->min_jmlh_masuk->caption() ?></span></td>
		<td data-name="min_jmlh_masuk" <?php echo $m_reward_view->min_jmlh_masuk->cellAttributes() ?>>
<span id="el_m_reward_min_jmlh_masuk">
<span<?php echo $m_reward_view->min_jmlh_masuk->viewAttributes() ?>><?php echo $m_reward_view->min_jmlh_masuk->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($m_reward_view->value->Visible) { // value ?>
	<tr id="r_value">
		<td class="<?php echo $m_reward_view->TableLeftColumnClass ?>"><span id="elh_m_reward_value"><?php echo $m_reward_view->value->caption() ?></span></td>
		<td data-name="value" <?php echo $m_reward_view->value->cellAttributes() ?>>
<span id="el_m_reward_value">
<span<?php echo $m_reward_view->value->viewAttributes() ?>><?php echo $m_reward_view->value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$m_reward_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_reward_view->isExport()) { ?>
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
$m_reward_view->terminate();
?>