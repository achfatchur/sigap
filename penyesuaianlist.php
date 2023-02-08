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
$penyesuaian_list = new penyesuaian_list();

// Run the page
$penyesuaian_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$penyesuaian_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$penyesuaian_list->isExport()) { ?>
<script>
var fpenyesuaianlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpenyesuaianlist = currentForm = new ew.Form("fpenyesuaianlist", "list");
	fpenyesuaianlist.formKeyCountName = '<?php echo $penyesuaian_list->FormKeyCountName ?>';
	loadjs.done("fpenyesuaianlist");
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
<?php if (!$penyesuaian_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($penyesuaian_list->TotalRecords > 0 && $penyesuaian_list->ExportOptions->visible()) { ?>
<?php $penyesuaian_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($penyesuaian_list->ImportOptions->visible()) { ?>
<?php $penyesuaian_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$penyesuaian_list->isExport() || Config("EXPORT_MASTER_RECORD") && $penyesuaian_list->isExport("print")) { ?>
<?php
if ($penyesuaian_list->DbMasterFilter != "" && $penyesuaian->getCurrentMasterTable() == "m_penyesuaian") {
	if ($penyesuaian_list->MasterRecordExists) {
		include_once "m_penyesuaianmaster.php";
	}
}
?>
<?php } ?>
<?php
$penyesuaian_list->renderOtherOptions();
?>
<?php $penyesuaian_list->showPageHeader(); ?>
<?php
$penyesuaian_list->showMessage();
?>
<?php if ($penyesuaian_list->TotalRecords > 0 || $penyesuaian->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($penyesuaian_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> penyesuaian">
<?php if (!$penyesuaian_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$penyesuaian_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $penyesuaian_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $penyesuaian_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpenyesuaianlist" id="fpenyesuaianlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="penyesuaian">
<?php if ($penyesuaian->getCurrentMasterTable() == "m_penyesuaian" && $penyesuaian->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="m_penyesuaian">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($penyesuaian_list->m_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_penyesuaian" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($penyesuaian_list->TotalRecords > 0 || $penyesuaian_list->isGridEdit()) { ?>
<table id="tbl_penyesuaianlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$penyesuaian->RowType = ROWTYPE_HEADER;

// Render list options
$penyesuaian_list->renderListOptions();

// Render list options (header, left)
$penyesuaian_list->ListOptions->render("header", "left");
?>
<?php if ($penyesuaian_list->nip->Visible) { // nip ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->nip) == "") { ?>
		<th data-name="nip" class="<?php echo $penyesuaian_list->nip->headerCellClass() ?>"><div id="elh_penyesuaian_nip" class="penyesuaian_nip"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->nip->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nip" class="<?php echo $penyesuaian_list->nip->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->nip) ?>', 1);"><div id="elh_penyesuaian_nip" class="penyesuaian_nip">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->nip->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->nip->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->nip->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_list->jenjang_id->Visible) { // jenjang_id ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->jenjang_id) == "") { ?>
		<th data-name="jenjang_id" class="<?php echo $penyesuaian_list->jenjang_id->headerCellClass() ?>"><div id="elh_penyesuaian_jenjang_id" class="penyesuaian_jenjang_id"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->jenjang_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang_id" class="<?php echo $penyesuaian_list->jenjang_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->jenjang_id) ?>', 1);"><div id="elh_penyesuaian_jenjang_id" class="penyesuaian_jenjang_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->jenjang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->jenjang_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->jenjang_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_list->absen->Visible) { // absen ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->absen) == "") { ?>
		<th data-name="absen" class="<?php echo $penyesuaian_list->absen->headerCellClass() ?>"><div id="elh_penyesuaian_absen" class="penyesuaian_absen"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->absen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="absen" class="<?php echo $penyesuaian_list->absen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->absen) ?>', 1);"><div id="elh_penyesuaian_absen" class="penyesuaian_absen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->absen->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->absen->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->absen->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_list->absen_jam->Visible) { // absen_jam ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->absen_jam) == "") { ?>
		<th data-name="absen_jam" class="<?php echo $penyesuaian_list->absen_jam->headerCellClass() ?>"><div id="elh_penyesuaian_absen_jam" class="penyesuaian_absen_jam"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->absen_jam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="absen_jam" class="<?php echo $penyesuaian_list->absen_jam->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->absen_jam) ?>', 1);"><div id="elh_penyesuaian_absen_jam" class="penyesuaian_absen_jam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->absen_jam->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->absen_jam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->absen_jam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_list->izin->Visible) { // izin ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->izin) == "") { ?>
		<th data-name="izin" class="<?php echo $penyesuaian_list->izin->headerCellClass() ?>"><div id="elh_penyesuaian_izin" class="penyesuaian_izin"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->izin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="izin" class="<?php echo $penyesuaian_list->izin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->izin) ?>', 1);"><div id="elh_penyesuaian_izin" class="penyesuaian_izin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->izin->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->izin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->izin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_list->izin_jam->Visible) { // izin_jam ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->izin_jam) == "") { ?>
		<th data-name="izin_jam" class="<?php echo $penyesuaian_list->izin_jam->headerCellClass() ?>"><div id="elh_penyesuaian_izin_jam" class="penyesuaian_izin_jam"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->izin_jam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="izin_jam" class="<?php echo $penyesuaian_list->izin_jam->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->izin_jam) ?>', 1);"><div id="elh_penyesuaian_izin_jam" class="penyesuaian_izin_jam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->izin_jam->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->izin_jam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->izin_jam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_list->sakit->Visible) { // sakit ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->sakit) == "") { ?>
		<th data-name="sakit" class="<?php echo $penyesuaian_list->sakit->headerCellClass() ?>"><div id="elh_penyesuaian_sakit" class="penyesuaian_sakit"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->sakit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sakit" class="<?php echo $penyesuaian_list->sakit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->sakit) ?>', 1);"><div id="elh_penyesuaian_sakit" class="penyesuaian_sakit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->sakit->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->sakit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->sakit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_list->sakit_jam->Visible) { // sakit_jam ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->sakit_jam) == "") { ?>
		<th data-name="sakit_jam" class="<?php echo $penyesuaian_list->sakit_jam->headerCellClass() ?>"><div id="elh_penyesuaian_sakit_jam" class="penyesuaian_sakit_jam"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->sakit_jam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sakit_jam" class="<?php echo $penyesuaian_list->sakit_jam->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->sakit_jam) ?>', 1);"><div id="elh_penyesuaian_sakit_jam" class="penyesuaian_sakit_jam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->sakit_jam->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->sakit_jam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->sakit_jam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_list->terlambat->Visible) { // terlambat ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->terlambat) == "") { ?>
		<th data-name="terlambat" class="<?php echo $penyesuaian_list->terlambat->headerCellClass() ?>"><div id="elh_penyesuaian_terlambat" class="penyesuaian_terlambat"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->terlambat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="terlambat" class="<?php echo $penyesuaian_list->terlambat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->terlambat) ?>', 1);"><div id="elh_penyesuaian_terlambat" class="penyesuaian_terlambat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->terlambat->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->terlambat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->terlambat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_list->pulang_cepat->Visible) { // pulang_cepat ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->pulang_cepat) == "") { ?>
		<th data-name="pulang_cepat" class="<?php echo $penyesuaian_list->pulang_cepat->headerCellClass() ?>"><div id="elh_penyesuaian_pulang_cepat" class="penyesuaian_pulang_cepat"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->pulang_cepat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pulang_cepat" class="<?php echo $penyesuaian_list->pulang_cepat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->pulang_cepat) ?>', 1);"><div id="elh_penyesuaian_pulang_cepat" class="penyesuaian_pulang_cepat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->pulang_cepat->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->pulang_cepat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->pulang_cepat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_list->piket->Visible) { // piket ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->piket) == "") { ?>
		<th data-name="piket" class="<?php echo $penyesuaian_list->piket->headerCellClass() ?>"><div id="elh_penyesuaian_piket" class="penyesuaian_piket"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->piket->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="piket" class="<?php echo $penyesuaian_list->piket->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->piket) ?>', 1);"><div id="elh_penyesuaian_piket" class="penyesuaian_piket">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->piket->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->piket->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->piket->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_list->inval->Visible) { // inval ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->inval) == "") { ?>
		<th data-name="inval" class="<?php echo $penyesuaian_list->inval->headerCellClass() ?>"><div id="elh_penyesuaian_inval" class="penyesuaian_inval"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->inval->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="inval" class="<?php echo $penyesuaian_list->inval->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->inval) ?>', 1);"><div id="elh_penyesuaian_inval" class="penyesuaian_inval">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->inval->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->inval->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->inval->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_list->lembur->Visible) { // lembur ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->lembur) == "") { ?>
		<th data-name="lembur" class="<?php echo $penyesuaian_list->lembur->headerCellClass() ?>"><div id="elh_penyesuaian_lembur" class="penyesuaian_lembur"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->lembur->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="lembur" class="<?php echo $penyesuaian_list->lembur->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->lembur) ?>', 1);"><div id="elh_penyesuaian_lembur" class="penyesuaian_lembur">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->lembur->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->lembur->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->lembur->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_list->voucher->Visible) { // voucher ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->voucher) == "") { ?>
		<th data-name="voucher" class="<?php echo $penyesuaian_list->voucher->headerCellClass() ?>"><div id="elh_penyesuaian_voucher" class="penyesuaian_voucher"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->voucher->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher" class="<?php echo $penyesuaian_list->voucher->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->voucher) ?>', 1);"><div id="elh_penyesuaian_voucher" class="penyesuaian_voucher">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->voucher->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->voucher->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->voucher->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_list->total->Visible) { // total ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->total) == "") { ?>
		<th data-name="total" class="<?php echo $penyesuaian_list->total->headerCellClass() ?>"><div id="elh_penyesuaian_total" class="penyesuaian_total"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $penyesuaian_list->total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->total) ?>', 1);"><div id="elh_penyesuaian_total" class="penyesuaian_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_list->total2->Visible) { // total2 ?>
	<?php if ($penyesuaian_list->SortUrl($penyesuaian_list->total2) == "") { ?>
		<th data-name="total2" class="<?php echo $penyesuaian_list->total2->headerCellClass() ?>"><div id="elh_penyesuaian_total2" class="penyesuaian_total2"><div class="ew-table-header-caption"><?php echo $penyesuaian_list->total2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total2" class="<?php echo $penyesuaian_list->total2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $penyesuaian_list->SortUrl($penyesuaian_list->total2) ?>', 1);"><div id="elh_penyesuaian_total2" class="penyesuaian_total2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_list->total2->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_list->total2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_list->total2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$penyesuaian_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($penyesuaian_list->ExportAll && $penyesuaian_list->isExport()) {
	$penyesuaian_list->StopRecord = $penyesuaian_list->TotalRecords;
} else {

	// Set the last record to display
	if ($penyesuaian_list->TotalRecords > $penyesuaian_list->StartRecord + $penyesuaian_list->DisplayRecords - 1)
		$penyesuaian_list->StopRecord = $penyesuaian_list->StartRecord + $penyesuaian_list->DisplayRecords - 1;
	else
		$penyesuaian_list->StopRecord = $penyesuaian_list->TotalRecords;
}
$penyesuaian_list->RecordCount = $penyesuaian_list->StartRecord - 1;
if ($penyesuaian_list->Recordset && !$penyesuaian_list->Recordset->EOF) {
	$penyesuaian_list->Recordset->moveFirst();
	$selectLimit = $penyesuaian_list->UseSelectLimit;
	if (!$selectLimit && $penyesuaian_list->StartRecord > 1)
		$penyesuaian_list->Recordset->move($penyesuaian_list->StartRecord - 1);
} elseif (!$penyesuaian->AllowAddDeleteRow && $penyesuaian_list->StopRecord == 0) {
	$penyesuaian_list->StopRecord = $penyesuaian->GridAddRowCount;
}

// Initialize aggregate
$penyesuaian->RowType = ROWTYPE_AGGREGATEINIT;
$penyesuaian->resetAttributes();
$penyesuaian_list->renderRow();
while ($penyesuaian_list->RecordCount < $penyesuaian_list->StopRecord) {
	$penyesuaian_list->RecordCount++;
	if ($penyesuaian_list->RecordCount >= $penyesuaian_list->StartRecord) {
		$penyesuaian_list->RowCount++;

		// Set up key count
		$penyesuaian_list->KeyCount = $penyesuaian_list->RowIndex;

		// Init row class and style
		$penyesuaian->resetAttributes();
		$penyesuaian->CssClass = "";
		if ($penyesuaian_list->isGridAdd()) {
		} else {
			$penyesuaian_list->loadRowValues($penyesuaian_list->Recordset); // Load row values
		}
		$penyesuaian->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$penyesuaian->RowAttrs->merge(["data-rowindex" => $penyesuaian_list->RowCount, "id" => "r" . $penyesuaian_list->RowCount . "_penyesuaian", "data-rowtype" => $penyesuaian->RowType]);

		// Render row
		$penyesuaian_list->renderRow();

		// Render list options
		$penyesuaian_list->renderListOptions();
?>
	<tr <?php echo $penyesuaian->rowAttributes() ?>>
<?php

// Render list options (body, left)
$penyesuaian_list->ListOptions->render("body", "left", $penyesuaian_list->RowCount);
?>
	<?php if ($penyesuaian_list->nip->Visible) { // nip ?>
		<td data-name="nip" <?php echo $penyesuaian_list->nip->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_nip">
<span<?php echo $penyesuaian_list->nip->viewAttributes() ?>><?php echo $penyesuaian_list->nip->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($penyesuaian_list->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id" <?php echo $penyesuaian_list->jenjang_id->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_jenjang_id">
<span<?php echo $penyesuaian_list->jenjang_id->viewAttributes() ?>><?php echo $penyesuaian_list->jenjang_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($penyesuaian_list->absen->Visible) { // absen ?>
		<td data-name="absen" <?php echo $penyesuaian_list->absen->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_absen">
<span<?php echo $penyesuaian_list->absen->viewAttributes() ?>><?php echo $penyesuaian_list->absen->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($penyesuaian_list->absen_jam->Visible) { // absen_jam ?>
		<td data-name="absen_jam" <?php echo $penyesuaian_list->absen_jam->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_absen_jam">
<span<?php echo $penyesuaian_list->absen_jam->viewAttributes() ?>><?php echo $penyesuaian_list->absen_jam->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($penyesuaian_list->izin->Visible) { // izin ?>
		<td data-name="izin" <?php echo $penyesuaian_list->izin->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_izin">
<span<?php echo $penyesuaian_list->izin->viewAttributes() ?>><?php echo $penyesuaian_list->izin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($penyesuaian_list->izin_jam->Visible) { // izin_jam ?>
		<td data-name="izin_jam" <?php echo $penyesuaian_list->izin_jam->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_izin_jam">
<span<?php echo $penyesuaian_list->izin_jam->viewAttributes() ?>><?php echo $penyesuaian_list->izin_jam->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($penyesuaian_list->sakit->Visible) { // sakit ?>
		<td data-name="sakit" <?php echo $penyesuaian_list->sakit->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_sakit">
<span<?php echo $penyesuaian_list->sakit->viewAttributes() ?>><?php echo $penyesuaian_list->sakit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($penyesuaian_list->sakit_jam->Visible) { // sakit_jam ?>
		<td data-name="sakit_jam" <?php echo $penyesuaian_list->sakit_jam->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_sakit_jam">
<span<?php echo $penyesuaian_list->sakit_jam->viewAttributes() ?>><?php echo $penyesuaian_list->sakit_jam->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($penyesuaian_list->terlambat->Visible) { // terlambat ?>
		<td data-name="terlambat" <?php echo $penyesuaian_list->terlambat->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_terlambat">
<span<?php echo $penyesuaian_list->terlambat->viewAttributes() ?>><?php echo $penyesuaian_list->terlambat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($penyesuaian_list->pulang_cepat->Visible) { // pulang_cepat ?>
		<td data-name="pulang_cepat" <?php echo $penyesuaian_list->pulang_cepat->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_pulang_cepat">
<span<?php echo $penyesuaian_list->pulang_cepat->viewAttributes() ?>><?php echo $penyesuaian_list->pulang_cepat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($penyesuaian_list->piket->Visible) { // piket ?>
		<td data-name="piket" <?php echo $penyesuaian_list->piket->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_piket">
<span<?php echo $penyesuaian_list->piket->viewAttributes() ?>><?php echo $penyesuaian_list->piket->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($penyesuaian_list->inval->Visible) { // inval ?>
		<td data-name="inval" <?php echo $penyesuaian_list->inval->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_inval">
<span<?php echo $penyesuaian_list->inval->viewAttributes() ?>><?php echo $penyesuaian_list->inval->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($penyesuaian_list->lembur->Visible) { // lembur ?>
		<td data-name="lembur" <?php echo $penyesuaian_list->lembur->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_lembur">
<span<?php echo $penyesuaian_list->lembur->viewAttributes() ?>><?php echo $penyesuaian_list->lembur->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($penyesuaian_list->voucher->Visible) { // voucher ?>
		<td data-name="voucher" <?php echo $penyesuaian_list->voucher->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_voucher">
<span<?php echo $penyesuaian_list->voucher->viewAttributes() ?>><?php echo $penyesuaian_list->voucher->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($penyesuaian_list->total->Visible) { // total ?>
		<td data-name="total" <?php echo $penyesuaian_list->total->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_total">
<span<?php echo $penyesuaian_list->total->viewAttributes() ?>><?php echo $penyesuaian_list->total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($penyesuaian_list->total2->Visible) { // total2 ?>
		<td data-name="total2" <?php echo $penyesuaian_list->total2->cellAttributes() ?>>
<span id="el<?php echo $penyesuaian_list->RowCount ?>_penyesuaian_total2">
<span<?php echo $penyesuaian_list->total2->viewAttributes() ?>><?php echo $penyesuaian_list->total2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$penyesuaian_list->ListOptions->render("body", "right", $penyesuaian_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$penyesuaian_list->isGridAdd())
		$penyesuaian_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$penyesuaian->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($penyesuaian_list->Recordset)
	$penyesuaian_list->Recordset->Close();
?>
<?php if (!$penyesuaian_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$penyesuaian_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $penyesuaian_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $penyesuaian_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($penyesuaian_list->TotalRecords == 0 && !$penyesuaian->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $penyesuaian_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$penyesuaian_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$penyesuaian_list->isExport()) { ?>
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
$penyesuaian_list->terminate();
?>