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
$penyesuaian_view = new penyesuaian_view();

// Run the page
$penyesuaian_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$penyesuaian_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$penyesuaian_view->isExport()) { ?>
<script>
var fpenyesuaianview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpenyesuaianview = currentForm = new ew.Form("fpenyesuaianview", "view");
	loadjs.done("fpenyesuaianview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$penyesuaian_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $penyesuaian_view->ExportOptions->render("body") ?>
<?php $penyesuaian_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $penyesuaian_view->showPageHeader(); ?>
<?php
$penyesuaian_view->showMessage();
?>
<form name="fpenyesuaianview" id="fpenyesuaianview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="penyesuaian">
<input type="hidden" name="modal" value="<?php echo (int)$penyesuaian_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($penyesuaian_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_id"><?php echo $penyesuaian_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $penyesuaian_view->id->cellAttributes() ?>>
<span id="el_penyesuaian_id">
<span<?php echo $penyesuaian_view->id->viewAttributes() ?>><?php echo $penyesuaian_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->m_id->Visible) { // m_id ?>
	<tr id="r_m_id">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_m_id"><?php echo $penyesuaian_view->m_id->caption() ?></span></td>
		<td data-name="m_id" <?php echo $penyesuaian_view->m_id->cellAttributes() ?>>
<span id="el_penyesuaian_m_id">
<span<?php echo $penyesuaian_view->m_id->viewAttributes() ?>><?php echo $penyesuaian_view->m_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->datetime->Visible) { // datetime ?>
	<tr id="r_datetime">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_datetime"><?php echo $penyesuaian_view->datetime->caption() ?></span></td>
		<td data-name="datetime" <?php echo $penyesuaian_view->datetime->cellAttributes() ?>>
<span id="el_penyesuaian_datetime">
<span<?php echo $penyesuaian_view->datetime->viewAttributes() ?>><?php echo $penyesuaian_view->datetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->nip->Visible) { // nip ?>
	<tr id="r_nip">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_nip"><?php echo $penyesuaian_view->nip->caption() ?></span></td>
		<td data-name="nip" <?php echo $penyesuaian_view->nip->cellAttributes() ?>>
<span id="el_penyesuaian_nip">
<span<?php echo $penyesuaian_view->nip->viewAttributes() ?>><?php echo $penyesuaian_view->nip->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->jenjang_id->Visible) { // jenjang_id ?>
	<tr id="r_jenjang_id">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_jenjang_id"><?php echo $penyesuaian_view->jenjang_id->caption() ?></span></td>
		<td data-name="jenjang_id" <?php echo $penyesuaian_view->jenjang_id->cellAttributes() ?>>
<span id="el_penyesuaian_jenjang_id">
<span<?php echo $penyesuaian_view->jenjang_id->viewAttributes() ?>><?php echo $penyesuaian_view->jenjang_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->absen->Visible) { // absen ?>
	<tr id="r_absen">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_absen"><?php echo $penyesuaian_view->absen->caption() ?></span></td>
		<td data-name="absen" <?php echo $penyesuaian_view->absen->cellAttributes() ?>>
<span id="el_penyesuaian_absen">
<span<?php echo $penyesuaian_view->absen->viewAttributes() ?>><?php echo $penyesuaian_view->absen->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->absen_jam->Visible) { // absen_jam ?>
	<tr id="r_absen_jam">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_absen_jam"><?php echo $penyesuaian_view->absen_jam->caption() ?></span></td>
		<td data-name="absen_jam" <?php echo $penyesuaian_view->absen_jam->cellAttributes() ?>>
<span id="el_penyesuaian_absen_jam">
<span<?php echo $penyesuaian_view->absen_jam->viewAttributes() ?>><?php echo $penyesuaian_view->absen_jam->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->izin->Visible) { // izin ?>
	<tr id="r_izin">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_izin"><?php echo $penyesuaian_view->izin->caption() ?></span></td>
		<td data-name="izin" <?php echo $penyesuaian_view->izin->cellAttributes() ?>>
<span id="el_penyesuaian_izin">
<span<?php echo $penyesuaian_view->izin->viewAttributes() ?>><?php echo $penyesuaian_view->izin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->izin_jam->Visible) { // izin_jam ?>
	<tr id="r_izin_jam">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_izin_jam"><?php echo $penyesuaian_view->izin_jam->caption() ?></span></td>
		<td data-name="izin_jam" <?php echo $penyesuaian_view->izin_jam->cellAttributes() ?>>
<span id="el_penyesuaian_izin_jam">
<span<?php echo $penyesuaian_view->izin_jam->viewAttributes() ?>><?php echo $penyesuaian_view->izin_jam->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->sakit->Visible) { // sakit ?>
	<tr id="r_sakit">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_sakit"><?php echo $penyesuaian_view->sakit->caption() ?></span></td>
		<td data-name="sakit" <?php echo $penyesuaian_view->sakit->cellAttributes() ?>>
<span id="el_penyesuaian_sakit">
<span<?php echo $penyesuaian_view->sakit->viewAttributes() ?>><?php echo $penyesuaian_view->sakit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->sakit_jam->Visible) { // sakit_jam ?>
	<tr id="r_sakit_jam">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_sakit_jam"><?php echo $penyesuaian_view->sakit_jam->caption() ?></span></td>
		<td data-name="sakit_jam" <?php echo $penyesuaian_view->sakit_jam->cellAttributes() ?>>
<span id="el_penyesuaian_sakit_jam">
<span<?php echo $penyesuaian_view->sakit_jam->viewAttributes() ?>><?php echo $penyesuaian_view->sakit_jam->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->terlambat->Visible) { // terlambat ?>
	<tr id="r_terlambat">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_terlambat"><?php echo $penyesuaian_view->terlambat->caption() ?></span></td>
		<td data-name="terlambat" <?php echo $penyesuaian_view->terlambat->cellAttributes() ?>>
<span id="el_penyesuaian_terlambat">
<span<?php echo $penyesuaian_view->terlambat->viewAttributes() ?>><?php echo $penyesuaian_view->terlambat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->pulang_cepat->Visible) { // pulang_cepat ?>
	<tr id="r_pulang_cepat">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_pulang_cepat"><?php echo $penyesuaian_view->pulang_cepat->caption() ?></span></td>
		<td data-name="pulang_cepat" <?php echo $penyesuaian_view->pulang_cepat->cellAttributes() ?>>
<span id="el_penyesuaian_pulang_cepat">
<span<?php echo $penyesuaian_view->pulang_cepat->viewAttributes() ?>><?php echo $penyesuaian_view->pulang_cepat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->piket->Visible) { // piket ?>
	<tr id="r_piket">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_piket"><?php echo $penyesuaian_view->piket->caption() ?></span></td>
		<td data-name="piket" <?php echo $penyesuaian_view->piket->cellAttributes() ?>>
<span id="el_penyesuaian_piket">
<span<?php echo $penyesuaian_view->piket->viewAttributes() ?>><?php echo $penyesuaian_view->piket->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->inval->Visible) { // inval ?>
	<tr id="r_inval">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_inval"><?php echo $penyesuaian_view->inval->caption() ?></span></td>
		<td data-name="inval" <?php echo $penyesuaian_view->inval->cellAttributes() ?>>
<span id="el_penyesuaian_inval">
<span<?php echo $penyesuaian_view->inval->viewAttributes() ?>><?php echo $penyesuaian_view->inval->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->lembur->Visible) { // lembur ?>
	<tr id="r_lembur">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_lembur"><?php echo $penyesuaian_view->lembur->caption() ?></span></td>
		<td data-name="lembur" <?php echo $penyesuaian_view->lembur->cellAttributes() ?>>
<span id="el_penyesuaian_lembur">
<span<?php echo $penyesuaian_view->lembur->viewAttributes() ?>><?php echo $penyesuaian_view->lembur->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->voucher->Visible) { // voucher ?>
	<tr id="r_voucher">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_voucher"><?php echo $penyesuaian_view->voucher->caption() ?></span></td>
		<td data-name="voucher" <?php echo $penyesuaian_view->voucher->cellAttributes() ?>>
<span id="el_penyesuaian_voucher">
<span<?php echo $penyesuaian_view->voucher->viewAttributes() ?>><?php echo $penyesuaian_view->voucher->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->total->Visible) { // total ?>
	<tr id="r_total">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_total"><?php echo $penyesuaian_view->total->caption() ?></span></td>
		<td data-name="total" <?php echo $penyesuaian_view->total->cellAttributes() ?>>
<span id="el_penyesuaian_total">
<span<?php echo $penyesuaian_view->total->viewAttributes() ?>><?php echo $penyesuaian_view->total->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($penyesuaian_view->total2->Visible) { // total2 ?>
	<tr id="r_total2">
		<td class="<?php echo $penyesuaian_view->TableLeftColumnClass ?>"><span id="elh_penyesuaian_total2"><?php echo $penyesuaian_view->total2->caption() ?></span></td>
		<td data-name="total2" <?php echo $penyesuaian_view->total2->cellAttributes() ?>>
<span id="el_penyesuaian_total2">
<span<?php echo $penyesuaian_view->total2->viewAttributes() ?>><?php echo $penyesuaian_view->total2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$penyesuaian_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$penyesuaian_view->isExport()) { ?>
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
$penyesuaian_view->terminate();
?>