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
$potongan_smk_view = new potongan_smk_view();

// Run the page
$potongan_smk_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$potongan_smk_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$potongan_smk_view->isExport()) { ?>
<script>
var fpotongan_smkview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpotongan_smkview = currentForm = new ew.Form("fpotongan_smkview", "view");
	loadjs.done("fpotongan_smkview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$potongan_smk_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $potongan_smk_view->ExportOptions->render("body") ?>
<?php $potongan_smk_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $potongan_smk_view->showPageHeader(); ?>
<?php
$potongan_smk_view->showMessage();
?>
<form name="fpotongan_smkview" id="fpotongan_smkview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="potongan_smk">
<input type="hidden" name="modal" value="<?php echo (int)$potongan_smk_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($potongan_smk_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_id"><?php echo $potongan_smk_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $potongan_smk_view->id->cellAttributes() ?>>
<span id="el_potongan_smk_id">
<span<?php echo $potongan_smk_view->id->viewAttributes() ?>><?php echo $potongan_smk_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->datetime->Visible) { // datetime ?>
	<tr id="r_datetime">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_datetime"><?php echo $potongan_smk_view->datetime->caption() ?></span></td>
		<td data-name="datetime" <?php echo $potongan_smk_view->datetime->cellAttributes() ?>>
<span id="el_potongan_smk_datetime">
<span<?php echo $potongan_smk_view->datetime->viewAttributes() ?>><?php echo $potongan_smk_view->datetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->u_by->Visible) { // u_by ?>
	<tr id="r_u_by">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_u_by"><?php echo $potongan_smk_view->u_by->caption() ?></span></td>
		<td data-name="u_by" <?php echo $potongan_smk_view->u_by->cellAttributes() ?>>
<span id="el_potongan_smk_u_by">
<span<?php echo $potongan_smk_view->u_by->viewAttributes() ?>><?php echo $potongan_smk_view->u_by->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->month->Visible) { // month ?>
	<tr id="r_month">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_month"><?php echo $potongan_smk_view->month->caption() ?></span></td>
		<td data-name="month" <?php echo $potongan_smk_view->month->cellAttributes() ?>>
<span id="el_potongan_smk_month">
<span<?php echo $potongan_smk_view->month->viewAttributes() ?>><?php echo $potongan_smk_view->month->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->tahun->Visible) { // tahun ?>
	<tr id="r_tahun">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_tahun"><?php echo $potongan_smk_view->tahun->caption() ?></span></td>
		<td data-name="tahun" <?php echo $potongan_smk_view->tahun->cellAttributes() ?>>
<span id="el_potongan_smk_tahun">
<span<?php echo $potongan_smk_view->tahun->viewAttributes() ?>><?php echo $potongan_smk_view->tahun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->bulan->Visible) { // bulan ?>
	<tr id="r_bulan">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_bulan"><?php echo $potongan_smk_view->bulan->caption() ?></span></td>
		<td data-name="bulan" <?php echo $potongan_smk_view->bulan->cellAttributes() ?>>
<span id="el_potongan_smk_bulan">
<span<?php echo $potongan_smk_view->bulan->viewAttributes() ?>><?php echo $potongan_smk_view->bulan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->nama->Visible) { // nama ?>
	<tr id="r_nama">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_nama"><?php echo $potongan_smk_view->nama->caption() ?></span></td>
		<td data-name="nama" <?php echo $potongan_smk_view->nama->cellAttributes() ?>>
<span id="el_potongan_smk_nama">
<span<?php echo $potongan_smk_view->nama->viewAttributes() ?>><?php echo $potongan_smk_view->nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->jenjang_id->Visible) { // jenjang_id ?>
	<tr id="r_jenjang_id">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_jenjang_id"><?php echo $potongan_smk_view->jenjang_id->caption() ?></span></td>
		<td data-name="jenjang_id" <?php echo $potongan_smk_view->jenjang_id->cellAttributes() ?>>
<span id="el_potongan_smk_jenjang_id">
<span<?php echo $potongan_smk_view->jenjang_id->viewAttributes() ?>><?php echo $potongan_smk_view->jenjang_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->jabatan_id->Visible) { // jabatan_id ?>
	<tr id="r_jabatan_id">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_jabatan_id"><?php echo $potongan_smk_view->jabatan_id->caption() ?></span></td>
		<td data-name="jabatan_id" <?php echo $potongan_smk_view->jabatan_id->cellAttributes() ?>>
<span id="el_potongan_smk_jabatan_id">
<span<?php echo $potongan_smk_view->jabatan_id->viewAttributes() ?>><?php echo $potongan_smk_view->jabatan_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->sertif->Visible) { // sertif ?>
	<tr id="r_sertif">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_sertif"><?php echo $potongan_smk_view->sertif->caption() ?></span></td>
		<td data-name="sertif" <?php echo $potongan_smk_view->sertif->cellAttributes() ?>>
<span id="el_potongan_smk_sertif">
<span<?php echo $potongan_smk_view->sertif->viewAttributes() ?>><?php echo $potongan_smk_view->sertif->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->terlambat->Visible) { // terlambat ?>
	<tr id="r_terlambat">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_terlambat"><?php echo $potongan_smk_view->terlambat->caption() ?></span></td>
		<td data-name="terlambat" <?php echo $potongan_smk_view->terlambat->cellAttributes() ?>>
<span id="el_potongan_smk_terlambat">
<span<?php echo $potongan_smk_view->terlambat->viewAttributes() ?>><?php echo $potongan_smk_view->terlambat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->value_terlambat->Visible) { // value_terlambat ?>
	<tr id="r_value_terlambat">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_value_terlambat"><?php echo $potongan_smk_view->value_terlambat->caption() ?></span></td>
		<td data-name="value_terlambat" <?php echo $potongan_smk_view->value_terlambat->cellAttributes() ?>>
<span id="el_potongan_smk_value_terlambat">
<span<?php echo $potongan_smk_view->value_terlambat->viewAttributes() ?>><?php echo $potongan_smk_view->value_terlambat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->izin->Visible) { // izin ?>
	<tr id="r_izin">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_izin"><?php echo $potongan_smk_view->izin->caption() ?></span></td>
		<td data-name="izin" <?php echo $potongan_smk_view->izin->cellAttributes() ?>>
<span id="el_potongan_smk_izin">
<span<?php echo $potongan_smk_view->izin->viewAttributes() ?>><?php echo $potongan_smk_view->izin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->value_izin->Visible) { // value_izin ?>
	<tr id="r_value_izin">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_value_izin"><?php echo $potongan_smk_view->value_izin->caption() ?></span></td>
		<td data-name="value_izin" <?php echo $potongan_smk_view->value_izin->cellAttributes() ?>>
<span id="el_potongan_smk_value_izin">
<span<?php echo $potongan_smk_view->value_izin->viewAttributes() ?>><?php echo $potongan_smk_view->value_izin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->sakit->Visible) { // sakit ?>
	<tr id="r_sakit">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_sakit"><?php echo $potongan_smk_view->sakit->caption() ?></span></td>
		<td data-name="sakit" <?php echo $potongan_smk_view->sakit->cellAttributes() ?>>
<span id="el_potongan_smk_sakit">
<span<?php echo $potongan_smk_view->sakit->viewAttributes() ?>><?php echo $potongan_smk_view->sakit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->value_sakit->Visible) { // value_sakit ?>
	<tr id="r_value_sakit">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_value_sakit"><?php echo $potongan_smk_view->value_sakit->caption() ?></span></td>
		<td data-name="value_sakit" <?php echo $potongan_smk_view->value_sakit->cellAttributes() ?>>
<span id="el_potongan_smk_value_sakit">
<span<?php echo $potongan_smk_view->value_sakit->viewAttributes() ?>><?php echo $potongan_smk_view->value_sakit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->tidakhadir->Visible) { // tidakhadir ?>
	<tr id="r_tidakhadir">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_tidakhadir"><?php echo $potongan_smk_view->tidakhadir->caption() ?></span></td>
		<td data-name="tidakhadir" <?php echo $potongan_smk_view->tidakhadir->cellAttributes() ?>>
<span id="el_potongan_smk_tidakhadir">
<span<?php echo $potongan_smk_view->tidakhadir->viewAttributes() ?>><?php echo $potongan_smk_view->tidakhadir->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->value_tidakhadir->Visible) { // value_tidakhadir ?>
	<tr id="r_value_tidakhadir">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_value_tidakhadir"><?php echo $potongan_smk_view->value_tidakhadir->caption() ?></span></td>
		<td data-name="value_tidakhadir" <?php echo $potongan_smk_view->value_tidakhadir->cellAttributes() ?>>
<span id="el_potongan_smk_value_tidakhadir">
<span<?php echo $potongan_smk_view->value_tidakhadir->viewAttributes() ?>><?php echo $potongan_smk_view->value_tidakhadir->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->pulcep->Visible) { // pulcep ?>
	<tr id="r_pulcep">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_pulcep"><?php echo $potongan_smk_view->pulcep->caption() ?></span></td>
		<td data-name="pulcep" <?php echo $potongan_smk_view->pulcep->cellAttributes() ?>>
<span id="el_potongan_smk_pulcep">
<span<?php echo $potongan_smk_view->pulcep->viewAttributes() ?>><?php echo $potongan_smk_view->pulcep->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->value_pulcep->Visible) { // value_pulcep ?>
	<tr id="r_value_pulcep">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_value_pulcep"><?php echo $potongan_smk_view->value_pulcep->caption() ?></span></td>
		<td data-name="value_pulcep" <?php echo $potongan_smk_view->value_pulcep->cellAttributes() ?>>
<span id="el_potongan_smk_value_pulcep">
<span<?php echo $potongan_smk_view->value_pulcep->viewAttributes() ?>><?php echo $potongan_smk_view->value_pulcep->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->tidakhadirjam->Visible) { // tidakhadirjam ?>
	<tr id="r_tidakhadirjam">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_tidakhadirjam"><?php echo $potongan_smk_view->tidakhadirjam->caption() ?></span></td>
		<td data-name="tidakhadirjam" <?php echo $potongan_smk_view->tidakhadirjam->cellAttributes() ?>>
<span id="el_potongan_smk_tidakhadirjam">
<span<?php echo $potongan_smk_view->tidakhadirjam->viewAttributes() ?>><?php echo $potongan_smk_view->tidakhadirjam->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->tidakhadirjamvalue->Visible) { // tidakhadirjamvalue ?>
	<tr id="r_tidakhadirjamvalue">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_tidakhadirjamvalue"><?php echo $potongan_smk_view->tidakhadirjamvalue->caption() ?></span></td>
		<td data-name="tidakhadirjamvalue" <?php echo $potongan_smk_view->tidakhadirjamvalue->cellAttributes() ?>>
<span id="el_potongan_smk_tidakhadirjamvalue">
<span<?php echo $potongan_smk_view->tidakhadirjamvalue->viewAttributes() ?>><?php echo $potongan_smk_view->tidakhadirjamvalue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->sakitperjam->Visible) { // sakitperjam ?>
	<tr id="r_sakitperjam">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_sakitperjam"><?php echo $potongan_smk_view->sakitperjam->caption() ?></span></td>
		<td data-name="sakitperjam" <?php echo $potongan_smk_view->sakitperjam->cellAttributes() ?>>
<span id="el_potongan_smk_sakitperjam">
<span<?php echo $potongan_smk_view->sakitperjam->viewAttributes() ?>><?php echo $potongan_smk_view->sakitperjam->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->sakitperjamvalue->Visible) { // sakitperjamvalue ?>
	<tr id="r_sakitperjamvalue">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_sakitperjamvalue"><?php echo $potongan_smk_view->sakitperjamvalue->caption() ?></span></td>
		<td data-name="sakitperjamvalue" <?php echo $potongan_smk_view->sakitperjamvalue->cellAttributes() ?>>
<span id="el_potongan_smk_sakitperjamvalue">
<span<?php echo $potongan_smk_view->sakitperjamvalue->viewAttributes() ?>><?php echo $potongan_smk_view->sakitperjamvalue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->izinperjam->Visible) { // izinperjam ?>
	<tr id="r_izinperjam">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_izinperjam"><?php echo $potongan_smk_view->izinperjam->caption() ?></span></td>
		<td data-name="izinperjam" <?php echo $potongan_smk_view->izinperjam->cellAttributes() ?>>
<span id="el_potongan_smk_izinperjam">
<span<?php echo $potongan_smk_view->izinperjam->viewAttributes() ?>><?php echo $potongan_smk_view->izinperjam->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->izinperjamvalue->Visible) { // izinperjamvalue ?>
	<tr id="r_izinperjamvalue">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_izinperjamvalue"><?php echo $potongan_smk_view->izinperjamvalue->caption() ?></span></td>
		<td data-name="izinperjamvalue" <?php echo $potongan_smk_view->izinperjamvalue->cellAttributes() ?>>
<span id="el_potongan_smk_izinperjamvalue">
<span<?php echo $potongan_smk_view->izinperjamvalue->viewAttributes() ?>><?php echo $potongan_smk_view->izinperjamvalue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->totalpotongan->Visible) { // totalpotongan ?>
	<tr id="r_totalpotongan">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_totalpotongan"><?php echo $potongan_smk_view->totalpotongan->caption() ?></span></td>
		<td data-name="totalpotongan" <?php echo $potongan_smk_view->totalpotongan->cellAttributes() ?>>
<span id="el_potongan_smk_totalpotongan">
<span<?php echo $potongan_smk_view->totalpotongan->viewAttributes() ?>><?php echo $potongan_smk_view->totalpotongan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($potongan_smk_view->pid->Visible) { // pid ?>
	<tr id="r_pid">
		<td class="<?php echo $potongan_smk_view->TableLeftColumnClass ?>"><span id="elh_potongan_smk_pid"><?php echo $potongan_smk_view->pid->caption() ?></span></td>
		<td data-name="pid" <?php echo $potongan_smk_view->pid->cellAttributes() ?>>
<span id="el_potongan_smk_pid">
<span<?php echo $potongan_smk_view->pid->viewAttributes() ?>><?php echo $potongan_smk_view->pid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$potongan_smk_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$potongan_smk_view->isExport()) { ?>
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
$potongan_smk_view->terminate();
?>