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
$m_reward_delete = new m_reward_delete();

// Run the page
$m_reward_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_reward_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_rewarddelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fm_rewarddelete = currentForm = new ew.Form("fm_rewarddelete", "delete");
	loadjs.done("fm_rewarddelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_reward_delete->showPageHeader(); ?>
<?php
$m_reward_delete->showMessage();
?>
<form name="fm_rewarddelete" id="fm_rewarddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_reward">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($m_reward_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($m_reward_delete->jenjang->Visible) { // jenjang ?>
		<th class="<?php echo $m_reward_delete->jenjang->headerCellClass() ?>"><span id="elh_m_reward_jenjang" class="m_reward_jenjang"><?php echo $m_reward_delete->jenjang->caption() ?></span></th>
<?php } ?>
<?php if ($m_reward_delete->jabatan->Visible) { // jabatan ?>
		<th class="<?php echo $m_reward_delete->jabatan->headerCellClass() ?>"><span id="elh_m_reward_jabatan" class="m_reward_jabatan"><?php echo $m_reward_delete->jabatan->caption() ?></span></th>
<?php } ?>
<?php if ($m_reward_delete->min_jmlh_masuk->Visible) { // min_jmlh_masuk ?>
		<th class="<?php echo $m_reward_delete->min_jmlh_masuk->headerCellClass() ?>"><span id="elh_m_reward_min_jmlh_masuk" class="m_reward_min_jmlh_masuk"><?php echo $m_reward_delete->min_jmlh_masuk->caption() ?></span></th>
<?php } ?>
<?php if ($m_reward_delete->value->Visible) { // value ?>
		<th class="<?php echo $m_reward_delete->value->headerCellClass() ?>"><span id="elh_m_reward_value" class="m_reward_value"><?php echo $m_reward_delete->value->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$m_reward_delete->RecordCount = 0;
$i = 0;
while (!$m_reward_delete->Recordset->EOF) {
	$m_reward_delete->RecordCount++;
	$m_reward_delete->RowCount++;

	// Set row properties
	$m_reward->resetAttributes();
	$m_reward->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$m_reward_delete->loadRowValues($m_reward_delete->Recordset);

	// Render row
	$m_reward_delete->renderRow();
?>
	<tr <?php echo $m_reward->rowAttributes() ?>>
<?php if ($m_reward_delete->jenjang->Visible) { // jenjang ?>
		<td <?php echo $m_reward_delete->jenjang->cellAttributes() ?>>
<span id="el<?php echo $m_reward_delete->RowCount ?>_m_reward_jenjang" class="m_reward_jenjang">
<span<?php echo $m_reward_delete->jenjang->viewAttributes() ?>><?php echo $m_reward_delete->jenjang->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_reward_delete->jabatan->Visible) { // jabatan ?>
		<td <?php echo $m_reward_delete->jabatan->cellAttributes() ?>>
<span id="el<?php echo $m_reward_delete->RowCount ?>_m_reward_jabatan" class="m_reward_jabatan">
<span<?php echo $m_reward_delete->jabatan->viewAttributes() ?>><?php echo $m_reward_delete->jabatan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_reward_delete->min_jmlh_masuk->Visible) { // min_jmlh_masuk ?>
		<td <?php echo $m_reward_delete->min_jmlh_masuk->cellAttributes() ?>>
<span id="el<?php echo $m_reward_delete->RowCount ?>_m_reward_min_jmlh_masuk" class="m_reward_min_jmlh_masuk">
<span<?php echo $m_reward_delete->min_jmlh_masuk->viewAttributes() ?>><?php echo $m_reward_delete->min_jmlh_masuk->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($m_reward_delete->value->Visible) { // value ?>
		<td <?php echo $m_reward_delete->value->cellAttributes() ?>>
<span id="el<?php echo $m_reward_delete->RowCount ?>_m_reward_value" class="m_reward_value">
<span<?php echo $m_reward_delete->value->viewAttributes() ?>><?php echo $m_reward_delete->value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$m_reward_delete->Recordset->moveNext();
}
$m_reward_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_reward_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$m_reward_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$m_reward_delete->terminate();
?>