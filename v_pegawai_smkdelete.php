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
$v_pegawai_smk_delete = new v_pegawai_smk_delete();

// Run the page
$v_pegawai_smk_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_pegawai_smk_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fv_pegawai_smkdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fv_pegawai_smkdelete = currentForm = new ew.Form("fv_pegawai_smkdelete", "delete");
	loadjs.done("fv_pegawai_smkdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $v_pegawai_smk_delete->showPageHeader(); ?>
<?php
$v_pegawai_smk_delete->showMessage();
?>
<form name="fv_pegawai_smkdelete" id="fv_pegawai_smkdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v_pegawai_smk">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($v_pegawai_smk_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($v_pegawai_smk_delete->nip->Visible) { // nip ?>
		<th class="<?php echo $v_pegawai_smk_delete->nip->headerCellClass() ?>"><span id="elh_v_pegawai_smk_nip" class="v_pegawai_smk_nip"><?php echo $v_pegawai_smk_delete->nip->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->password->Visible) { // password ?>
		<th class="<?php echo $v_pegawai_smk_delete->password->headerCellClass() ?>"><span id="elh_v_pegawai_smk_password" class="v_pegawai_smk_password"><?php echo $v_pegawai_smk_delete->password->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->jenjang_id->Visible) { // jenjang_id ?>
		<th class="<?php echo $v_pegawai_smk_delete->jenjang_id->headerCellClass() ?>"><span id="elh_v_pegawai_smk_jenjang_id" class="v_pegawai_smk_jenjang_id"><?php echo $v_pegawai_smk_delete->jenjang_id->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->jabatan->Visible) { // jabatan ?>
		<th class="<?php echo $v_pegawai_smk_delete->jabatan->headerCellClass() ?>"><span id="elh_v_pegawai_smk_jabatan" class="v_pegawai_smk_jabatan"><?php echo $v_pegawai_smk_delete->jabatan->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->periode_jabatan->Visible) { // periode_jabatan ?>
		<th class="<?php echo $v_pegawai_smk_delete->periode_jabatan->headerCellClass() ?>"><span id="elh_v_pegawai_smk_periode_jabatan" class="v_pegawai_smk_periode_jabatan"><?php echo $v_pegawai_smk_delete->periode_jabatan->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->status_peg->Visible) { // status_peg ?>
		<th class="<?php echo $v_pegawai_smk_delete->status_peg->headerCellClass() ?>"><span id="elh_v_pegawai_smk_status_peg" class="v_pegawai_smk_status_peg"><?php echo $v_pegawai_smk_delete->status_peg->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->type->Visible) { // type ?>
		<th class="<?php echo $v_pegawai_smk_delete->type->headerCellClass() ?>"><span id="elh_v_pegawai_smk_type" class="v_pegawai_smk_type"><?php echo $v_pegawai_smk_delete->type->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->sertif->Visible) { // sertif ?>
		<th class="<?php echo $v_pegawai_smk_delete->sertif->headerCellClass() ?>"><span id="elh_v_pegawai_smk_sertif" class="v_pegawai_smk_sertif"><?php echo $v_pegawai_smk_delete->sertif->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->tambahan->Visible) { // tambahan ?>
		<th class="<?php echo $v_pegawai_smk_delete->tambahan->headerCellClass() ?>"><span id="elh_v_pegawai_smk_tambahan" class="v_pegawai_smk_tambahan"><?php echo $v_pegawai_smk_delete->tambahan->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->lama_kerja->Visible) { // lama_kerja ?>
		<th class="<?php echo $v_pegawai_smk_delete->lama_kerja->headerCellClass() ?>"><span id="elh_v_pegawai_smk_lama_kerja" class="v_pegawai_smk_lama_kerja"><?php echo $v_pegawai_smk_delete->lama_kerja->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->nama->Visible) { // nama ?>
		<th class="<?php echo $v_pegawai_smk_delete->nama->headerCellClass() ?>"><span id="elh_v_pegawai_smk_nama" class="v_pegawai_smk_nama"><?php echo $v_pegawai_smk_delete->nama->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->alamat->Visible) { // alamat ?>
		<th class="<?php echo $v_pegawai_smk_delete->alamat->headerCellClass() ?>"><span id="elh_v_pegawai_smk_alamat" class="v_pegawai_smk_alamat"><?php echo $v_pegawai_smk_delete->alamat->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->_email->Visible) { // email ?>
		<th class="<?php echo $v_pegawai_smk_delete->_email->headerCellClass() ?>"><span id="elh_v_pegawai_smk__email" class="v_pegawai_smk__email"><?php echo $v_pegawai_smk_delete->_email->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->wa->Visible) { // wa ?>
		<th class="<?php echo $v_pegawai_smk_delete->wa->headerCellClass() ?>"><span id="elh_v_pegawai_smk_wa" class="v_pegawai_smk_wa"><?php echo $v_pegawai_smk_delete->wa->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->hp->Visible) { // hp ?>
		<th class="<?php echo $v_pegawai_smk_delete->hp->headerCellClass() ?>"><span id="elh_v_pegawai_smk_hp" class="v_pegawai_smk_hp"><?php echo $v_pegawai_smk_delete->hp->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->tgllahir->Visible) { // tgllahir ?>
		<th class="<?php echo $v_pegawai_smk_delete->tgllahir->headerCellClass() ?>"><span id="elh_v_pegawai_smk_tgllahir" class="v_pegawai_smk_tgllahir"><?php echo $v_pegawai_smk_delete->tgllahir->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->rekbank->Visible) { // rekbank ?>
		<th class="<?php echo $v_pegawai_smk_delete->rekbank->headerCellClass() ?>"><span id="elh_v_pegawai_smk_rekbank" class="v_pegawai_smk_rekbank"><?php echo $v_pegawai_smk_delete->rekbank->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->pendidikan->Visible) { // pendidikan ?>
		<th class="<?php echo $v_pegawai_smk_delete->pendidikan->headerCellClass() ?>"><span id="elh_v_pegawai_smk_pendidikan" class="v_pegawai_smk_pendidikan"><?php echo $v_pegawai_smk_delete->pendidikan->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->jurusan->Visible) { // jurusan ?>
		<th class="<?php echo $v_pegawai_smk_delete->jurusan->headerCellClass() ?>"><span id="elh_v_pegawai_smk_jurusan" class="v_pegawai_smk_jurusan"><?php echo $v_pegawai_smk_delete->jurusan->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->agama->Visible) { // agama ?>
		<th class="<?php echo $v_pegawai_smk_delete->agama->headerCellClass() ?>"><span id="elh_v_pegawai_smk_agama" class="v_pegawai_smk_agama"><?php echo $v_pegawai_smk_delete->agama->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->jenkel->Visible) { // jenkel ?>
		<th class="<?php echo $v_pegawai_smk_delete->jenkel->headerCellClass() ?>"><span id="elh_v_pegawai_smk_jenkel" class="v_pegawai_smk_jenkel"><?php echo $v_pegawai_smk_delete->jenkel->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->mulai_bekerja->Visible) { // mulai_bekerja ?>
		<th class="<?php echo $v_pegawai_smk_delete->mulai_bekerja->headerCellClass() ?>"><span id="elh_v_pegawai_smk_mulai_bekerja" class="v_pegawai_smk_mulai_bekerja"><?php echo $v_pegawai_smk_delete->mulai_bekerja->caption() ?></span></th>
<?php } ?>
<?php if ($v_pegawai_smk_delete->level->Visible) { // level ?>
		<th class="<?php echo $v_pegawai_smk_delete->level->headerCellClass() ?>"><span id="elh_v_pegawai_smk_level" class="v_pegawai_smk_level"><?php echo $v_pegawai_smk_delete->level->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$v_pegawai_smk_delete->RecordCount = 0;
$i = 0;
while (!$v_pegawai_smk_delete->Recordset->EOF) {
	$v_pegawai_smk_delete->RecordCount++;
	$v_pegawai_smk_delete->RowCount++;

	// Set row properties
	$v_pegawai_smk->resetAttributes();
	$v_pegawai_smk->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$v_pegawai_smk_delete->loadRowValues($v_pegawai_smk_delete->Recordset);

	// Render row
	$v_pegawai_smk_delete->renderRow();
?>
	<tr <?php echo $v_pegawai_smk->rowAttributes() ?>>
<?php if ($v_pegawai_smk_delete->nip->Visible) { // nip ?>
		<td <?php echo $v_pegawai_smk_delete->nip->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_nip" class="v_pegawai_smk_nip">
<span<?php echo $v_pegawai_smk_delete->nip->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->nip->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->password->Visible) { // password ?>
		<td <?php echo $v_pegawai_smk_delete->password->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_password" class="v_pegawai_smk_password">
<span<?php echo $v_pegawai_smk_delete->password->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->password->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->jenjang_id->Visible) { // jenjang_id ?>
		<td <?php echo $v_pegawai_smk_delete->jenjang_id->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_jenjang_id" class="v_pegawai_smk_jenjang_id">
<span<?php echo $v_pegawai_smk_delete->jenjang_id->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->jenjang_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->jabatan->Visible) { // jabatan ?>
		<td <?php echo $v_pegawai_smk_delete->jabatan->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_jabatan" class="v_pegawai_smk_jabatan">
<span<?php echo $v_pegawai_smk_delete->jabatan->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->jabatan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->periode_jabatan->Visible) { // periode_jabatan ?>
		<td <?php echo $v_pegawai_smk_delete->periode_jabatan->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_periode_jabatan" class="v_pegawai_smk_periode_jabatan">
<span<?php echo $v_pegawai_smk_delete->periode_jabatan->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->periode_jabatan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->status_peg->Visible) { // status_peg ?>
		<td <?php echo $v_pegawai_smk_delete->status_peg->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_status_peg" class="v_pegawai_smk_status_peg">
<span<?php echo $v_pegawai_smk_delete->status_peg->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->status_peg->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->type->Visible) { // type ?>
		<td <?php echo $v_pegawai_smk_delete->type->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_type" class="v_pegawai_smk_type">
<span<?php echo $v_pegawai_smk_delete->type->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->sertif->Visible) { // sertif ?>
		<td <?php echo $v_pegawai_smk_delete->sertif->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_sertif" class="v_pegawai_smk_sertif">
<span<?php echo $v_pegawai_smk_delete->sertif->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->sertif->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->tambahan->Visible) { // tambahan ?>
		<td <?php echo $v_pegawai_smk_delete->tambahan->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_tambahan" class="v_pegawai_smk_tambahan">
<span<?php echo $v_pegawai_smk_delete->tambahan->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->tambahan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->lama_kerja->Visible) { // lama_kerja ?>
		<td <?php echo $v_pegawai_smk_delete->lama_kerja->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_lama_kerja" class="v_pegawai_smk_lama_kerja">
<span<?php echo $v_pegawai_smk_delete->lama_kerja->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->lama_kerja->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->nama->Visible) { // nama ?>
		<td <?php echo $v_pegawai_smk_delete->nama->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_nama" class="v_pegawai_smk_nama">
<span<?php echo $v_pegawai_smk_delete->nama->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->alamat->Visible) { // alamat ?>
		<td <?php echo $v_pegawai_smk_delete->alamat->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_alamat" class="v_pegawai_smk_alamat">
<span<?php echo $v_pegawai_smk_delete->alamat->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->alamat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->_email->Visible) { // email ?>
		<td <?php echo $v_pegawai_smk_delete->_email->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk__email" class="v_pegawai_smk__email">
<span<?php echo $v_pegawai_smk_delete->_email->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->wa->Visible) { // wa ?>
		<td <?php echo $v_pegawai_smk_delete->wa->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_wa" class="v_pegawai_smk_wa">
<span<?php echo $v_pegawai_smk_delete->wa->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->wa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->hp->Visible) { // hp ?>
		<td <?php echo $v_pegawai_smk_delete->hp->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_hp" class="v_pegawai_smk_hp">
<span<?php echo $v_pegawai_smk_delete->hp->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->hp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->tgllahir->Visible) { // tgllahir ?>
		<td <?php echo $v_pegawai_smk_delete->tgllahir->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_tgllahir" class="v_pegawai_smk_tgllahir">
<span<?php echo $v_pegawai_smk_delete->tgllahir->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->tgllahir->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->rekbank->Visible) { // rekbank ?>
		<td <?php echo $v_pegawai_smk_delete->rekbank->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_rekbank" class="v_pegawai_smk_rekbank">
<span<?php echo $v_pegawai_smk_delete->rekbank->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->rekbank->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->pendidikan->Visible) { // pendidikan ?>
		<td <?php echo $v_pegawai_smk_delete->pendidikan->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_pendidikan" class="v_pegawai_smk_pendidikan">
<span<?php echo $v_pegawai_smk_delete->pendidikan->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->pendidikan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->jurusan->Visible) { // jurusan ?>
		<td <?php echo $v_pegawai_smk_delete->jurusan->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_jurusan" class="v_pegawai_smk_jurusan">
<span<?php echo $v_pegawai_smk_delete->jurusan->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->jurusan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->agama->Visible) { // agama ?>
		<td <?php echo $v_pegawai_smk_delete->agama->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_agama" class="v_pegawai_smk_agama">
<span<?php echo $v_pegawai_smk_delete->agama->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->agama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->jenkel->Visible) { // jenkel ?>
		<td <?php echo $v_pegawai_smk_delete->jenkel->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_jenkel" class="v_pegawai_smk_jenkel">
<span<?php echo $v_pegawai_smk_delete->jenkel->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->jenkel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->mulai_bekerja->Visible) { // mulai_bekerja ?>
		<td <?php echo $v_pegawai_smk_delete->mulai_bekerja->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_mulai_bekerja" class="v_pegawai_smk_mulai_bekerja">
<span<?php echo $v_pegawai_smk_delete->mulai_bekerja->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->mulai_bekerja->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($v_pegawai_smk_delete->level->Visible) { // level ?>
		<td <?php echo $v_pegawai_smk_delete->level->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smk_delete->RowCount ?>_v_pegawai_smk_level" class="v_pegawai_smk_level">
<span<?php echo $v_pegawai_smk_delete->level->viewAttributes() ?>><?php echo $v_pegawai_smk_delete->level->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$v_pegawai_smk_delete->Recordset->moveNext();
}
$v_pegawai_smk_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $v_pegawai_smk_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$v_pegawai_smk_delete->showPageFooter();
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
$v_pegawai_smk_delete->terminate();
?>