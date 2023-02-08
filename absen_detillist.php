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
$absen_detil_list = new absen_detil_list();

// Run the page
$absen_detil_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$absen_detil_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$absen_detil_list->isExport()) { ?>
<script>
var fabsen_detillist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fabsen_detillist = currentForm = new ew.Form("fabsen_detillist", "list");
	fabsen_detillist.formKeyCountName = '<?php echo $absen_detil_list->FormKeyCountName ?>';
	loadjs.done("fabsen_detillist");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
	display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
	<div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
		<ul class="nav nav-tabs"></ul>
		<div class="tab-content"><!-- .tab-content -->
			<div class="tab-pane fade active show"></div>
		</div><!-- /.tab-content -->
	</div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script>
loadjs.ready("head", function() {
	ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "right" : "left";
	ew.PREVIEW_SINGLE_ROW = false;
	ew.PREVIEW_OVERLAY = false;
	loadjs("js/ewpreview.js", "preview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$absen_detil_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($absen_detil_list->TotalRecords > 0 && $absen_detil_list->ExportOptions->visible()) { ?>
<?php $absen_detil_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($absen_detil_list->ImportOptions->visible()) { ?>
<?php $absen_detil_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$absen_detil_list->isExport() || Config("EXPORT_MASTER_RECORD") && $absen_detil_list->isExport("print")) { ?>
<?php
if ($absen_detil_list->DbMasterFilter != "" && $absen_detil->getCurrentMasterTable() == "absen") {
	if ($absen_detil_list->MasterRecordExists) {
		include_once "absenmaster.php";
	}
}
?>
<?php } ?>
<?php
$absen_detil_list->renderOtherOptions();
?>
<?php $absen_detil_list->showPageHeader(); ?>
<?php
$absen_detil_list->showMessage();
?>
<?php if ($absen_detil_list->TotalRecords > 0 || $absen_detil->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($absen_detil_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> absen_detil">
<?php if (!$absen_detil_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$absen_detil_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $absen_detil_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $absen_detil_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fabsen_detillist" id="fabsen_detillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="absen_detil">
<?php if ($absen_detil->getCurrentMasterTable() == "absen" && $absen_detil->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="absen">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($absen_detil_list->pid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_absen_detil" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($absen_detil_list->TotalRecords > 0 || $absen_detil_list->isGridEdit()) { ?>
<table id="tbl_absen_detillist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$absen_detil->RowType = ROWTYPE_HEADER;

// Render list options
$absen_detil_list->renderListOptions();

// Render list options (header, left)
$absen_detil_list->ListOptions->render("header", "left");
?>
<?php if ($absen_detil_list->id->Visible) { // id ?>
	<?php if ($absen_detil_list->SortUrl($absen_detil_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $absen_detil_list->id->headerCellClass() ?>"><div id="elh_absen_detil_id" class="absen_detil_id"><div class="ew-table-header-caption"><?php echo $absen_detil_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $absen_detil_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $absen_detil_list->SortUrl($absen_detil_list->id) ?>', 1);"><div id="elh_absen_detil_id" class="absen_detil_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_list->pid->Visible) { // pid ?>
	<?php if ($absen_detil_list->SortUrl($absen_detil_list->pid) == "") { ?>
		<th data-name="pid" class="<?php echo $absen_detil_list->pid->headerCellClass() ?>"><div id="elh_absen_detil_pid" class="absen_detil_pid"><div class="ew-table-header-caption"><?php echo $absen_detil_list->pid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pid" class="<?php echo $absen_detil_list->pid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $absen_detil_list->SortUrl($absen_detil_list->pid) ?>', 1);"><div id="elh_absen_detil_pid" class="absen_detil_pid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_list->pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_list->pid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_list->pid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_list->pegawai->Visible) { // pegawai ?>
	<?php if ($absen_detil_list->SortUrl($absen_detil_list->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $absen_detil_list->pegawai->headerCellClass() ?>"><div id="elh_absen_detil_pegawai" class="absen_detil_pegawai"><div class="ew-table-header-caption"><?php echo $absen_detil_list->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $absen_detil_list->pegawai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $absen_detil_list->SortUrl($absen_detil_list->pegawai) ?>', 1);"><div id="elh_absen_detil_pegawai" class="absen_detil_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_list->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_list->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_list->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_list->jenjang->Visible) { // jenjang ?>
	<?php if ($absen_detil_list->SortUrl($absen_detil_list->jenjang) == "") { ?>
		<th data-name="jenjang" class="<?php echo $absen_detil_list->jenjang->headerCellClass() ?>"><div id="elh_absen_detil_jenjang" class="absen_detil_jenjang"><div class="ew-table-header-caption"><?php echo $absen_detil_list->jenjang->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang" class="<?php echo $absen_detil_list->jenjang->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $absen_detil_list->SortUrl($absen_detil_list->jenjang) ?>', 1);"><div id="elh_absen_detil_jenjang" class="absen_detil_jenjang">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_list->jenjang->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_list->jenjang->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_list->jenjang->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_list->masuk->Visible) { // masuk ?>
	<?php if ($absen_detil_list->SortUrl($absen_detil_list->masuk) == "") { ?>
		<th data-name="masuk" class="<?php echo $absen_detil_list->masuk->headerCellClass() ?>"><div id="elh_absen_detil_masuk" class="absen_detil_masuk"><div class="ew-table-header-caption"><?php echo $absen_detil_list->masuk->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="masuk" class="<?php echo $absen_detil_list->masuk->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $absen_detil_list->SortUrl($absen_detil_list->masuk) ?>', 1);"><div id="elh_absen_detil_masuk" class="absen_detil_masuk">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_list->masuk->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_list->masuk->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_list->masuk->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_list->absen->Visible) { // absen ?>
	<?php if ($absen_detil_list->SortUrl($absen_detil_list->absen) == "") { ?>
		<th data-name="absen" class="<?php echo $absen_detil_list->absen->headerCellClass() ?>"><div id="elh_absen_detil_absen" class="absen_detil_absen"><div class="ew-table-header-caption"><?php echo $absen_detil_list->absen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="absen" class="<?php echo $absen_detil_list->absen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $absen_detil_list->SortUrl($absen_detil_list->absen) ?>', 1);"><div id="elh_absen_detil_absen" class="absen_detil_absen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_list->absen->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_list->absen->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_list->absen->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_list->ijin->Visible) { // ijin ?>
	<?php if ($absen_detil_list->SortUrl($absen_detil_list->ijin) == "") { ?>
		<th data-name="ijin" class="<?php echo $absen_detil_list->ijin->headerCellClass() ?>"><div id="elh_absen_detil_ijin" class="absen_detil_ijin"><div class="ew-table-header-caption"><?php echo $absen_detil_list->ijin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ijin" class="<?php echo $absen_detil_list->ijin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $absen_detil_list->SortUrl($absen_detil_list->ijin) ?>', 1);"><div id="elh_absen_detil_ijin" class="absen_detil_ijin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_list->ijin->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_list->ijin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_list->ijin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_list->terlambat->Visible) { // terlambat ?>
	<?php if ($absen_detil_list->SortUrl($absen_detil_list->terlambat) == "") { ?>
		<th data-name="terlambat" class="<?php echo $absen_detil_list->terlambat->headerCellClass() ?>"><div id="elh_absen_detil_terlambat" class="absen_detil_terlambat"><div class="ew-table-header-caption"><?php echo $absen_detil_list->terlambat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="terlambat" class="<?php echo $absen_detil_list->terlambat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $absen_detil_list->SortUrl($absen_detil_list->terlambat) ?>', 1);"><div id="elh_absen_detil_terlambat" class="absen_detil_terlambat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_list->terlambat->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_list->terlambat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_list->terlambat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_list->sakit->Visible) { // sakit ?>
	<?php if ($absen_detil_list->SortUrl($absen_detil_list->sakit) == "") { ?>
		<th data-name="sakit" class="<?php echo $absen_detil_list->sakit->headerCellClass() ?>"><div id="elh_absen_detil_sakit" class="absen_detil_sakit"><div class="ew-table-header-caption"><?php echo $absen_detil_list->sakit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sakit" class="<?php echo $absen_detil_list->sakit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $absen_detil_list->SortUrl($absen_detil_list->sakit) ?>', 1);"><div id="elh_absen_detil_sakit" class="absen_detil_sakit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_list->sakit->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_list->sakit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_list->sakit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_list->pulang_cepat->Visible) { // pulang_cepat ?>
	<?php if ($absen_detil_list->SortUrl($absen_detil_list->pulang_cepat) == "") { ?>
		<th data-name="pulang_cepat" class="<?php echo $absen_detil_list->pulang_cepat->headerCellClass() ?>"><div id="elh_absen_detil_pulang_cepat" class="absen_detil_pulang_cepat"><div class="ew-table-header-caption"><?php echo $absen_detil_list->pulang_cepat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pulang_cepat" class="<?php echo $absen_detil_list->pulang_cepat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $absen_detil_list->SortUrl($absen_detil_list->pulang_cepat) ?>', 1);"><div id="elh_absen_detil_pulang_cepat" class="absen_detil_pulang_cepat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_list->pulang_cepat->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_list->pulang_cepat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_list->pulang_cepat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_list->piket->Visible) { // piket ?>
	<?php if ($absen_detil_list->SortUrl($absen_detil_list->piket) == "") { ?>
		<th data-name="piket" class="<?php echo $absen_detil_list->piket->headerCellClass() ?>"><div id="elh_absen_detil_piket" class="absen_detil_piket"><div class="ew-table-header-caption"><?php echo $absen_detil_list->piket->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="piket" class="<?php echo $absen_detil_list->piket->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $absen_detil_list->SortUrl($absen_detil_list->piket) ?>', 1);"><div id="elh_absen_detil_piket" class="absen_detil_piket">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_list->piket->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_list->piket->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_list->piket->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_list->inval->Visible) { // inval ?>
	<?php if ($absen_detil_list->SortUrl($absen_detil_list->inval) == "") { ?>
		<th data-name="inval" class="<?php echo $absen_detil_list->inval->headerCellClass() ?>"><div id="elh_absen_detil_inval" class="absen_detil_inval"><div class="ew-table-header-caption"><?php echo $absen_detil_list->inval->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="inval" class="<?php echo $absen_detil_list->inval->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $absen_detil_list->SortUrl($absen_detil_list->inval) ?>', 1);"><div id="elh_absen_detil_inval" class="absen_detil_inval">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_list->inval->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_list->inval->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_list->inval->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_list->lembur->Visible) { // lembur ?>
	<?php if ($absen_detil_list->SortUrl($absen_detil_list->lembur) == "") { ?>
		<th data-name="lembur" class="<?php echo $absen_detil_list->lembur->headerCellClass() ?>"><div id="elh_absen_detil_lembur" class="absen_detil_lembur"><div class="ew-table-header-caption"><?php echo $absen_detil_list->lembur->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="lembur" class="<?php echo $absen_detil_list->lembur->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $absen_detil_list->SortUrl($absen_detil_list->lembur) ?>', 1);"><div id="elh_absen_detil_lembur" class="absen_detil_lembur">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_list->lembur->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_list->lembur->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_list->lembur->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_list->penyesuaian->Visible) { // penyesuaian ?>
	<?php if ($absen_detil_list->SortUrl($absen_detil_list->penyesuaian) == "") { ?>
		<th data-name="penyesuaian" class="<?php echo $absen_detil_list->penyesuaian->headerCellClass() ?>"><div id="elh_absen_detil_penyesuaian" class="absen_detil_penyesuaian"><div class="ew-table-header-caption"><?php echo $absen_detil_list->penyesuaian->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="penyesuaian" class="<?php echo $absen_detil_list->penyesuaian->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $absen_detil_list->SortUrl($absen_detil_list->penyesuaian) ?>', 1);"><div id="elh_absen_detil_penyesuaian" class="absen_detil_penyesuaian">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_list->penyesuaian->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_list->penyesuaian->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_list->penyesuaian->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$absen_detil_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($absen_detil_list->ExportAll && $absen_detil_list->isExport()) {
	$absen_detil_list->StopRecord = $absen_detil_list->TotalRecords;
} else {

	// Set the last record to display
	if ($absen_detil_list->TotalRecords > $absen_detil_list->StartRecord + $absen_detil_list->DisplayRecords - 1)
		$absen_detil_list->StopRecord = $absen_detil_list->StartRecord + $absen_detil_list->DisplayRecords - 1;
	else
		$absen_detil_list->StopRecord = $absen_detil_list->TotalRecords;
}
$absen_detil_list->RecordCount = $absen_detil_list->StartRecord - 1;
if ($absen_detil_list->Recordset && !$absen_detil_list->Recordset->EOF) {
	$absen_detil_list->Recordset->moveFirst();
	$selectLimit = $absen_detil_list->UseSelectLimit;
	if (!$selectLimit && $absen_detil_list->StartRecord > 1)
		$absen_detil_list->Recordset->move($absen_detil_list->StartRecord - 1);
} elseif (!$absen_detil->AllowAddDeleteRow && $absen_detil_list->StopRecord == 0) {
	$absen_detil_list->StopRecord = $absen_detil->GridAddRowCount;
}

// Initialize aggregate
$absen_detil->RowType = ROWTYPE_AGGREGATEINIT;
$absen_detil->resetAttributes();
$absen_detil_list->renderRow();
while ($absen_detil_list->RecordCount < $absen_detil_list->StopRecord) {
	$absen_detil_list->RecordCount++;
	if ($absen_detil_list->RecordCount >= $absen_detil_list->StartRecord) {
		$absen_detil_list->RowCount++;

		// Set up key count
		$absen_detil_list->KeyCount = $absen_detil_list->RowIndex;

		// Init row class and style
		$absen_detil->resetAttributes();
		$absen_detil->CssClass = "";
		if ($absen_detil_list->isGridAdd()) {
		} else {
			$absen_detil_list->loadRowValues($absen_detil_list->Recordset); // Load row values
		}
		$absen_detil->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$absen_detil->RowAttrs->merge(["data-rowindex" => $absen_detil_list->RowCount, "id" => "r" . $absen_detil_list->RowCount . "_absen_detil", "data-rowtype" => $absen_detil->RowType]);

		// Render row
		$absen_detil_list->renderRow();

		// Render list options
		$absen_detil_list->renderListOptions();
?>
	<tr <?php echo $absen_detil->rowAttributes() ?>>
<?php

// Render list options (body, left)
$absen_detil_list->ListOptions->render("body", "left", $absen_detil_list->RowCount);
?>
	<?php if ($absen_detil_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $absen_detil_list->id->cellAttributes() ?>>
<span id="el<?php echo $absen_detil_list->RowCount ?>_absen_detil_id">
<span<?php echo $absen_detil_list->id->viewAttributes() ?>><?php echo $absen_detil_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($absen_detil_list->pid->Visible) { // pid ?>
		<td data-name="pid" <?php echo $absen_detil_list->pid->cellAttributes() ?>>
<span id="el<?php echo $absen_detil_list->RowCount ?>_absen_detil_pid">
<span<?php echo $absen_detil_list->pid->viewAttributes() ?>><?php echo $absen_detil_list->pid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($absen_detil_list->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $absen_detil_list->pegawai->cellAttributes() ?>>
<span id="el<?php echo $absen_detil_list->RowCount ?>_absen_detil_pegawai">
<span<?php echo $absen_detil_list->pegawai->viewAttributes() ?>><?php echo $absen_detil_list->pegawai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($absen_detil_list->jenjang->Visible) { // jenjang ?>
		<td data-name="jenjang" <?php echo $absen_detil_list->jenjang->cellAttributes() ?>>
<span id="el<?php echo $absen_detil_list->RowCount ?>_absen_detil_jenjang">
<span<?php echo $absen_detil_list->jenjang->viewAttributes() ?>><?php echo $absen_detil_list->jenjang->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($absen_detil_list->masuk->Visible) { // masuk ?>
		<td data-name="masuk" <?php echo $absen_detil_list->masuk->cellAttributes() ?>>
<span id="el<?php echo $absen_detil_list->RowCount ?>_absen_detil_masuk">
<span<?php echo $absen_detil_list->masuk->viewAttributes() ?>><?php echo $absen_detil_list->masuk->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($absen_detil_list->absen->Visible) { // absen ?>
		<td data-name="absen" <?php echo $absen_detil_list->absen->cellAttributes() ?>>
<span id="el<?php echo $absen_detil_list->RowCount ?>_absen_detil_absen">
<span<?php echo $absen_detil_list->absen->viewAttributes() ?>><?php echo $absen_detil_list->absen->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($absen_detil_list->ijin->Visible) { // ijin ?>
		<td data-name="ijin" <?php echo $absen_detil_list->ijin->cellAttributes() ?>>
<span id="el<?php echo $absen_detil_list->RowCount ?>_absen_detil_ijin">
<span<?php echo $absen_detil_list->ijin->viewAttributes() ?>><?php echo $absen_detil_list->ijin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($absen_detil_list->terlambat->Visible) { // terlambat ?>
		<td data-name="terlambat" <?php echo $absen_detil_list->terlambat->cellAttributes() ?>>
<span id="el<?php echo $absen_detil_list->RowCount ?>_absen_detil_terlambat">
<span<?php echo $absen_detil_list->terlambat->viewAttributes() ?>><?php echo $absen_detil_list->terlambat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($absen_detil_list->sakit->Visible) { // sakit ?>
		<td data-name="sakit" <?php echo $absen_detil_list->sakit->cellAttributes() ?>>
<span id="el<?php echo $absen_detil_list->RowCount ?>_absen_detil_sakit">
<span<?php echo $absen_detil_list->sakit->viewAttributes() ?>><?php echo $absen_detil_list->sakit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($absen_detil_list->pulang_cepat->Visible) { // pulang_cepat ?>
		<td data-name="pulang_cepat" <?php echo $absen_detil_list->pulang_cepat->cellAttributes() ?>>
<span id="el<?php echo $absen_detil_list->RowCount ?>_absen_detil_pulang_cepat">
<span<?php echo $absen_detil_list->pulang_cepat->viewAttributes() ?>><?php echo $absen_detil_list->pulang_cepat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($absen_detil_list->piket->Visible) { // piket ?>
		<td data-name="piket" <?php echo $absen_detil_list->piket->cellAttributes() ?>>
<span id="el<?php echo $absen_detil_list->RowCount ?>_absen_detil_piket">
<span<?php echo $absen_detil_list->piket->viewAttributes() ?>><?php echo $absen_detil_list->piket->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($absen_detil_list->inval->Visible) { // inval ?>
		<td data-name="inval" <?php echo $absen_detil_list->inval->cellAttributes() ?>>
<span id="el<?php echo $absen_detil_list->RowCount ?>_absen_detil_inval">
<span<?php echo $absen_detil_list->inval->viewAttributes() ?>><?php echo $absen_detil_list->inval->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($absen_detil_list->lembur->Visible) { // lembur ?>
		<td data-name="lembur" <?php echo $absen_detil_list->lembur->cellAttributes() ?>>
<span id="el<?php echo $absen_detil_list->RowCount ?>_absen_detil_lembur">
<span<?php echo $absen_detil_list->lembur->viewAttributes() ?>><?php echo $absen_detil_list->lembur->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($absen_detil_list->penyesuaian->Visible) { // penyesuaian ?>
		<td data-name="penyesuaian" <?php echo $absen_detil_list->penyesuaian->cellAttributes() ?>>
<span id="el<?php echo $absen_detil_list->RowCount ?>_absen_detil_penyesuaian">
<span<?php echo $absen_detil_list->penyesuaian->viewAttributes() ?>><?php echo $absen_detil_list->penyesuaian->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$absen_detil_list->ListOptions->render("body", "right", $absen_detil_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$absen_detil_list->isGridAdd())
		$absen_detil_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$absen_detil->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($absen_detil_list->Recordset)
	$absen_detil_list->Recordset->Close();
?>
<?php if (!$absen_detil_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$absen_detil_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $absen_detil_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $absen_detil_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($absen_detil_list->TotalRecords == 0 && !$absen_detil->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $absen_detil_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$absen_detil_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$absen_detil_list->isExport()) { ?>
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
$absen_detil_list->terminate();
?>