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
$absen_detil_view = new absen_detil_view();

// Run the page
$absen_detil_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$absen_detil_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$absen_detil_view->isExport()) { ?>
<script>
var fabsen_detilview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fabsen_detilview = currentForm = new ew.Form("fabsen_detilview", "view");
	loadjs.done("fabsen_detilview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$absen_detil_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $absen_detil_view->ExportOptions->render("body") ?>
<?php $absen_detil_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $absen_detil_view->showPageHeader(); ?>
<?php
$absen_detil_view->showMessage();
?>
<form name="fabsen_detilview" id="fabsen_detilview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="absen_detil">
<input type="hidden" name="modal" value="<?php echo (int)$absen_detil_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($absen_detil_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $absen_detil_view->TableLeftColumnClass ?>"><span id="elh_absen_detil_id"><?php echo $absen_detil_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $absen_detil_view->id->cellAttributes() ?>>
<span id="el_absen_detil_id">
<span<?php echo $absen_detil_view->id->viewAttributes() ?>><?php echo $absen_detil_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($absen_detil_view->pid->Visible) { // pid ?>
	<tr id="r_pid">
		<td class="<?php echo $absen_detil_view->TableLeftColumnClass ?>"><span id="elh_absen_detil_pid"><?php echo $absen_detil_view->pid->caption() ?></span></td>
		<td data-name="pid" <?php echo $absen_detil_view->pid->cellAttributes() ?>>
<span id="el_absen_detil_pid">
<span<?php echo $absen_detil_view->pid->viewAttributes() ?>><?php echo $absen_detil_view->pid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($absen_detil_view->pegawai->Visible) { // pegawai ?>
	<tr id="r_pegawai">
		<td class="<?php echo $absen_detil_view->TableLeftColumnClass ?>"><span id="elh_absen_detil_pegawai"><?php echo $absen_detil_view->pegawai->caption() ?></span></td>
		<td data-name="pegawai" <?php echo $absen_detil_view->pegawai->cellAttributes() ?>>
<span id="el_absen_detil_pegawai">
<span<?php echo $absen_detil_view->pegawai->viewAttributes() ?>><?php echo $absen_detil_view->pegawai->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($absen_detil_view->jenjang->Visible) { // jenjang ?>
	<tr id="r_jenjang">
		<td class="<?php echo $absen_detil_view->TableLeftColumnClass ?>"><span id="elh_absen_detil_jenjang"><?php echo $absen_detil_view->jenjang->caption() ?></span></td>
		<td data-name="jenjang" <?php echo $absen_detil_view->jenjang->cellAttributes() ?>>
<span id="el_absen_detil_jenjang">
<span<?php echo $absen_detil_view->jenjang->viewAttributes() ?>><?php echo $absen_detil_view->jenjang->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($absen_detil_view->masuk->Visible) { // masuk ?>
	<tr id="r_masuk">
		<td class="<?php echo $absen_detil_view->TableLeftColumnClass ?>"><span id="elh_absen_detil_masuk"><?php echo $absen_detil_view->masuk->caption() ?></span></td>
		<td data-name="masuk" <?php echo $absen_detil_view->masuk->cellAttributes() ?>>
<span id="el_absen_detil_masuk">
<span<?php echo $absen_detil_view->masuk->viewAttributes() ?>><?php echo $absen_detil_view->masuk->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($absen_detil_view->absen->Visible) { // absen ?>
	<tr id="r_absen">
		<td class="<?php echo $absen_detil_view->TableLeftColumnClass ?>"><span id="elh_absen_detil_absen"><?php echo $absen_detil_view->absen->caption() ?></span></td>
		<td data-name="absen" <?php echo $absen_detil_view->absen->cellAttributes() ?>>
<span id="el_absen_detil_absen">
<span<?php echo $absen_detil_view->absen->viewAttributes() ?>><?php echo $absen_detil_view->absen->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($absen_detil_view->ijin->Visible) { // ijin ?>
	<tr id="r_ijin">
		<td class="<?php echo $absen_detil_view->TableLeftColumnClass ?>"><span id="elh_absen_detil_ijin"><?php echo $absen_detil_view->ijin->caption() ?></span></td>
		<td data-name="ijin" <?php echo $absen_detil_view->ijin->cellAttributes() ?>>
<span id="el_absen_detil_ijin">
<span<?php echo $absen_detil_view->ijin->viewAttributes() ?>><?php echo $absen_detil_view->ijin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($absen_detil_view->terlambat->Visible) { // terlambat ?>
	<tr id="r_terlambat">
		<td class="<?php echo $absen_detil_view->TableLeftColumnClass ?>"><span id="elh_absen_detil_terlambat"><?php echo $absen_detil_view->terlambat->caption() ?></span></td>
		<td data-name="terlambat" <?php echo $absen_detil_view->terlambat->cellAttributes() ?>>
<span id="el_absen_detil_terlambat">
<span<?php echo $absen_detil_view->terlambat->viewAttributes() ?>><?php echo $absen_detil_view->terlambat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($absen_detil_view->sakit->Visible) { // sakit ?>
	<tr id="r_sakit">
		<td class="<?php echo $absen_detil_view->TableLeftColumnClass ?>"><span id="elh_absen_detil_sakit"><?php echo $absen_detil_view->sakit->caption() ?></span></td>
		<td data-name="sakit" <?php echo $absen_detil_view->sakit->cellAttributes() ?>>
<span id="el_absen_detil_sakit">
<span<?php echo $absen_detil_view->sakit->viewAttributes() ?>><?php echo $absen_detil_view->sakit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($absen_detil_view->pulang_cepat->Visible) { // pulang_cepat ?>
	<tr id="r_pulang_cepat">
		<td class="<?php echo $absen_detil_view->TableLeftColumnClass ?>"><span id="elh_absen_detil_pulang_cepat"><?php echo $absen_detil_view->pulang_cepat->caption() ?></span></td>
		<td data-name="pulang_cepat" <?php echo $absen_detil_view->pulang_cepat->cellAttributes() ?>>
<span id="el_absen_detil_pulang_cepat">
<span<?php echo $absen_detil_view->pulang_cepat->viewAttributes() ?>><?php echo $absen_detil_view->pulang_cepat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($absen_detil_view->piket->Visible) { // piket ?>
	<tr id="r_piket">
		<td class="<?php echo $absen_detil_view->TableLeftColumnClass ?>"><span id="elh_absen_detil_piket"><?php echo $absen_detil_view->piket->caption() ?></span></td>
		<td data-name="piket" <?php echo $absen_detil_view->piket->cellAttributes() ?>>
<span id="el_absen_detil_piket">
<span<?php echo $absen_detil_view->piket->viewAttributes() ?>><?php echo $absen_detil_view->piket->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($absen_detil_view->inval->Visible) { // inval ?>
	<tr id="r_inval">
		<td class="<?php echo $absen_detil_view->TableLeftColumnClass ?>"><span id="elh_absen_detil_inval"><?php echo $absen_detil_view->inval->caption() ?></span></td>
		<td data-name="inval" <?php echo $absen_detil_view->inval->cellAttributes() ?>>
<span id="el_absen_detil_inval">
<span<?php echo $absen_detil_view->inval->viewAttributes() ?>><?php echo $absen_detil_view->inval->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($absen_detil_view->lembur->Visible) { // lembur ?>
	<tr id="r_lembur">
		<td class="<?php echo $absen_detil_view->TableLeftColumnClass ?>"><span id="elh_absen_detil_lembur"><?php echo $absen_detil_view->lembur->caption() ?></span></td>
		<td data-name="lembur" <?php echo $absen_detil_view->lembur->cellAttributes() ?>>
<span id="el_absen_detil_lembur">
<span<?php echo $absen_detil_view->lembur->viewAttributes() ?>><?php echo $absen_detil_view->lembur->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($absen_detil_view->penyesuaian->Visible) { // penyesuaian ?>
	<tr id="r_penyesuaian">
		<td class="<?php echo $absen_detil_view->TableLeftColumnClass ?>"><span id="elh_absen_detil_penyesuaian"><?php echo $absen_detil_view->penyesuaian->caption() ?></span></td>
		<td data-name="penyesuaian" <?php echo $absen_detil_view->penyesuaian->cellAttributes() ?>>
<span id="el_absen_detil_penyesuaian">
<span<?php echo $absen_detil_view->penyesuaian->viewAttributes() ?>><?php echo $absen_detil_view->penyesuaian->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$absen_detil_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$absen_detil_view->isExport()) { ?>
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
$absen_detil_view->terminate();
?>