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
$gajismk_detil_delete = new gajismk_detil_delete();

// Run the page
$gajismk_detil_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gajismk_detil_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fgajismk_detildelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fgajismk_detildelete = currentForm = new ew.Form("fgajismk_detildelete", "delete");
	loadjs.done("fgajismk_detildelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $gajismk_detil_delete->showPageHeader(); ?>
<?php
$gajismk_detil_delete->showMessage();
?>
<form name="fgajismk_detildelete" id="fgajismk_detildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="gajismk_detil">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($gajismk_detil_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($gajismk_detil_delete->pegawai_id->Visible) { // pegawai_id ?>
		<th class="<?php echo $gajismk_detil_delete->pegawai_id->headerCellClass() ?>"><span id="elh_gajismk_detil_pegawai_id" class="gajismk_detil_pegawai_id"><?php echo $gajismk_detil_delete->pegawai_id->caption() ?></span></th>
<?php } ?>
<?php if ($gajismk_detil_delete->jabatan_id->Visible) { // jabatan_id ?>
		<th class="<?php echo $gajismk_detil_delete->jabatan_id->headerCellClass() ?>"><span id="elh_gajismk_detil_jabatan_id" class="gajismk_detil_jabatan_id"><?php echo $gajismk_detil_delete->jabatan_id->caption() ?></span></th>
<?php } ?>
<?php if ($gajismk_detil_delete->masakerja->Visible) { // masakerja ?>
		<th class="<?php echo $gajismk_detil_delete->masakerja->headerCellClass() ?>"><span id="elh_gajismk_detil_masakerja" class="gajismk_detil_masakerja"><?php echo $gajismk_detil_delete->masakerja->caption() ?></span></th>
<?php } ?>
<?php if ($gajismk_detil_delete->jumngajar->Visible) { // jumngajar ?>
		<th class="<?php echo $gajismk_detil_delete->jumngajar->headerCellClass() ?>"><span id="elh_gajismk_detil_jumngajar" class="gajismk_detil_jumngajar"><?php echo $gajismk_detil_delete->jumngajar->caption() ?></span></th>
<?php } ?>
<?php if ($gajismk_detil_delete->ijin->Visible) { // ijin ?>
		<th class="<?php echo $gajismk_detil_delete->ijin->headerCellClass() ?>"><span id="elh_gajismk_detil_ijin" class="gajismk_detil_ijin"><?php echo $gajismk_detil_delete->ijin->caption() ?></span></th>
<?php } ?>
<?php if ($gajismk_detil_delete->tunjangan_wkosis->Visible) { // tunjangan_wkosis ?>
		<th class="<?php echo $gajismk_detil_delete->tunjangan_wkosis->headerCellClass() ?>"><span id="elh_gajismk_detil_tunjangan_wkosis" class="gajismk_detil_tunjangan_wkosis"><?php echo $gajismk_detil_delete->tunjangan_wkosis->caption() ?></span></th>
<?php } ?>
<?php if ($gajismk_detil_delete->nominal_baku->Visible) { // nominal_baku ?>
		<th class="<?php echo $gajismk_detil_delete->nominal_baku->headerCellClass() ?>"><span id="elh_gajismk_detil_nominal_baku" class="gajismk_detil_nominal_baku"><?php echo $gajismk_detil_delete->nominal_baku->caption() ?></span></th>
<?php } ?>
<?php if ($gajismk_detil_delete->baku->Visible) { // baku ?>
		<th class="<?php echo $gajismk_detil_delete->baku->headerCellClass() ?>"><span id="elh_gajismk_detil_baku" class="gajismk_detil_baku"><?php echo $gajismk_detil_delete->baku->caption() ?></span></th>
<?php } ?>
<?php if ($gajismk_detil_delete->kehadiran->Visible) { // kehadiran ?>
		<th class="<?php echo $gajismk_detil_delete->kehadiran->headerCellClass() ?>"><span id="elh_gajismk_detil_kehadiran" class="gajismk_detil_kehadiran"><?php echo $gajismk_detil_delete->kehadiran->caption() ?></span></th>
<?php } ?>
<?php if ($gajismk_detil_delete->prestasi->Visible) { // prestasi ?>
		<th class="<?php echo $gajismk_detil_delete->prestasi->headerCellClass() ?>"><span id="elh_gajismk_detil_prestasi" class="gajismk_detil_prestasi"><?php echo $gajismk_detil_delete->prestasi->caption() ?></span></th>
<?php } ?>
<?php if ($gajismk_detil_delete->jumlahgaji->Visible) { // jumlahgaji ?>
		<th class="<?php echo $gajismk_detil_delete->jumlahgaji->headerCellClass() ?>"><span id="elh_gajismk_detil_jumlahgaji" class="gajismk_detil_jumlahgaji"><?php echo $gajismk_detil_delete->jumlahgaji->caption() ?></span></th>
<?php } ?>
<?php if ($gajismk_detil_delete->jumgajitotal->Visible) { // jumgajitotal ?>
		<th class="<?php echo $gajismk_detil_delete->jumgajitotal->headerCellClass() ?>"><span id="elh_gajismk_detil_jumgajitotal" class="gajismk_detil_jumgajitotal"><?php echo $gajismk_detil_delete->jumgajitotal->caption() ?></span></th>
<?php } ?>
<?php if ($gajismk_detil_delete->potongan1->Visible) { // potongan1 ?>
		<th class="<?php echo $gajismk_detil_delete->potongan1->headerCellClass() ?>"><span id="elh_gajismk_detil_potongan1" class="gajismk_detil_potongan1"><?php echo $gajismk_detil_delete->potongan1->caption() ?></span></th>
<?php } ?>
<?php if ($gajismk_detil_delete->potongan2->Visible) { // potongan2 ?>
		<th class="<?php echo $gajismk_detil_delete->potongan2->headerCellClass() ?>"><span id="elh_gajismk_detil_potongan2" class="gajismk_detil_potongan2"><?php echo $gajismk_detil_delete->potongan2->caption() ?></span></th>
<?php } ?>
<?php if ($gajismk_detil_delete->jumlahterima->Visible) { // jumlahterima ?>
		<th class="<?php echo $gajismk_detil_delete->jumlahterima->headerCellClass() ?>"><span id="elh_gajismk_detil_jumlahterima" class="gajismk_detil_jumlahterima"><?php echo $gajismk_detil_delete->jumlahterima->caption() ?></span></th>
<?php } ?>
<?php if ($gajismk_detil_delete->jp->Visible) { // jp ?>
		<th class="<?php echo $gajismk_detil_delete->jp->headerCellClass() ?>"><span id="elh_gajismk_detil_jp" class="gajismk_detil_jp"><?php echo $gajismk_detil_delete->jp->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$gajismk_detil_delete->RecordCount = 0;
$i = 0;
while (!$gajismk_detil_delete->Recordset->EOF) {
	$gajismk_detil_delete->RecordCount++;
	$gajismk_detil_delete->RowCount++;

	// Set row properties
	$gajismk_detil->resetAttributes();
	$gajismk_detil->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$gajismk_detil_delete->loadRowValues($gajismk_detil_delete->Recordset);

	// Render row
	$gajismk_detil_delete->renderRow();
?>
	<tr <?php echo $gajismk_detil->rowAttributes() ?>>
<?php if ($gajismk_detil_delete->pegawai_id->Visible) { // pegawai_id ?>
		<td <?php echo $gajismk_detil_delete->pegawai_id->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_pegawai_id" class="gajismk_detil_pegawai_id">
<span<?php echo $gajismk_detil_delete->pegawai_id->viewAttributes() ?>><?php echo $gajismk_detil_delete->pegawai_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gajismk_detil_delete->jabatan_id->Visible) { // jabatan_id ?>
		<td <?php echo $gajismk_detil_delete->jabatan_id->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_jabatan_id" class="gajismk_detil_jabatan_id">
<span<?php echo $gajismk_detil_delete->jabatan_id->viewAttributes() ?>><?php echo $gajismk_detil_delete->jabatan_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gajismk_detil_delete->masakerja->Visible) { // masakerja ?>
		<td <?php echo $gajismk_detil_delete->masakerja->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_masakerja" class="gajismk_detil_masakerja">
<span<?php echo $gajismk_detil_delete->masakerja->viewAttributes() ?>><?php echo $gajismk_detil_delete->masakerja->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gajismk_detil_delete->jumngajar->Visible) { // jumngajar ?>
		<td <?php echo $gajismk_detil_delete->jumngajar->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_jumngajar" class="gajismk_detil_jumngajar">
<span<?php echo $gajismk_detil_delete->jumngajar->viewAttributes() ?>><?php echo $gajismk_detil_delete->jumngajar->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gajismk_detil_delete->ijin->Visible) { // ijin ?>
		<td <?php echo $gajismk_detil_delete->ijin->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_ijin" class="gajismk_detil_ijin">
<span<?php echo $gajismk_detil_delete->ijin->viewAttributes() ?>><?php echo $gajismk_detil_delete->ijin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gajismk_detil_delete->tunjangan_wkosis->Visible) { // tunjangan_wkosis ?>
		<td <?php echo $gajismk_detil_delete->tunjangan_wkosis->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_tunjangan_wkosis" class="gajismk_detil_tunjangan_wkosis">
<span<?php echo $gajismk_detil_delete->tunjangan_wkosis->viewAttributes() ?>><?php echo $gajismk_detil_delete->tunjangan_wkosis->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gajismk_detil_delete->nominal_baku->Visible) { // nominal_baku ?>
		<td <?php echo $gajismk_detil_delete->nominal_baku->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_nominal_baku" class="gajismk_detil_nominal_baku">
<span<?php echo $gajismk_detil_delete->nominal_baku->viewAttributes() ?>><?php echo $gajismk_detil_delete->nominal_baku->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gajismk_detil_delete->baku->Visible) { // baku ?>
		<td <?php echo $gajismk_detil_delete->baku->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_baku" class="gajismk_detil_baku">
<span<?php echo $gajismk_detil_delete->baku->viewAttributes() ?>><?php echo $gajismk_detil_delete->baku->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gajismk_detil_delete->kehadiran->Visible) { // kehadiran ?>
		<td <?php echo $gajismk_detil_delete->kehadiran->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_kehadiran" class="gajismk_detil_kehadiran">
<span<?php echo $gajismk_detil_delete->kehadiran->viewAttributes() ?>><?php echo $gajismk_detil_delete->kehadiran->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gajismk_detil_delete->prestasi->Visible) { // prestasi ?>
		<td <?php echo $gajismk_detil_delete->prestasi->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_prestasi" class="gajismk_detil_prestasi">
<span<?php echo $gajismk_detil_delete->prestasi->viewAttributes() ?>><?php echo $gajismk_detil_delete->prestasi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gajismk_detil_delete->jumlahgaji->Visible) { // jumlahgaji ?>
		<td <?php echo $gajismk_detil_delete->jumlahgaji->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_jumlahgaji" class="gajismk_detil_jumlahgaji">
<span<?php echo $gajismk_detil_delete->jumlahgaji->viewAttributes() ?>><?php echo $gajismk_detil_delete->jumlahgaji->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gajismk_detil_delete->jumgajitotal->Visible) { // jumgajitotal ?>
		<td <?php echo $gajismk_detil_delete->jumgajitotal->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_jumgajitotal" class="gajismk_detil_jumgajitotal">
<span<?php echo $gajismk_detil_delete->jumgajitotal->viewAttributes() ?>><?php echo $gajismk_detil_delete->jumgajitotal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gajismk_detil_delete->potongan1->Visible) { // potongan1 ?>
		<td <?php echo $gajismk_detil_delete->potongan1->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_potongan1" class="gajismk_detil_potongan1">
<span<?php echo $gajismk_detil_delete->potongan1->viewAttributes() ?>><?php echo $gajismk_detil_delete->potongan1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gajismk_detil_delete->potongan2->Visible) { // potongan2 ?>
		<td <?php echo $gajismk_detil_delete->potongan2->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_potongan2" class="gajismk_detil_potongan2">
<span<?php echo $gajismk_detil_delete->potongan2->viewAttributes() ?>><?php echo $gajismk_detil_delete->potongan2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gajismk_detil_delete->jumlahterima->Visible) { // jumlahterima ?>
		<td <?php echo $gajismk_detil_delete->jumlahterima->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_jumlahterima" class="gajismk_detil_jumlahterima">
<span<?php echo $gajismk_detil_delete->jumlahterima->viewAttributes() ?>><?php echo $gajismk_detil_delete->jumlahterima->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($gajismk_detil_delete->jp->Visible) { // jp ?>
		<td <?php echo $gajismk_detil_delete->jp->cellAttributes() ?>>
<span id="el<?php echo $gajismk_detil_delete->RowCount ?>_gajismk_detil_jp" class="gajismk_detil_jp">
<span<?php echo $gajismk_detil_delete->jp->viewAttributes() ?>><?php echo $gajismk_detil_delete->jp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$gajismk_detil_delete->Recordset->moveNext();
}
$gajismk_detil_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $gajismk_detil_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$gajismk_detil_delete->showPageFooter();
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
$gajismk_detil_delete->terminate();
?>