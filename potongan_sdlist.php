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
$potongan_sd_list = new potongan_sd_list();

// Run the page
$potongan_sd_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$potongan_sd_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$potongan_sd_list->isExport()) { ?>
<script>
var fpotongan_sdlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpotongan_sdlist = currentForm = new ew.Form("fpotongan_sdlist", "list");
	fpotongan_sdlist.formKeyCountName = '<?php echo $potongan_sd_list->FormKeyCountName ?>';
	loadjs.done("fpotongan_sdlist");
});
var fpotongan_sdlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpotongan_sdlistsrch = currentSearchForm = new ew.Form("fpotongan_sdlistsrch");

	// Dynamic selection lists
	// Filters

	fpotongan_sdlistsrch.filterList = <?php echo $potongan_sd_list->getFilterList() ?>;
	loadjs.done("fpotongan_sdlistsrch");
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
<?php if (!$potongan_sd_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($potongan_sd_list->TotalRecords > 0 && $potongan_sd_list->ExportOptions->visible()) { ?>
<?php $potongan_sd_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($potongan_sd_list->ImportOptions->visible()) { ?>
<?php $potongan_sd_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($potongan_sd_list->SearchOptions->visible()) { ?>
<?php $potongan_sd_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($potongan_sd_list->FilterOptions->visible()) { ?>
<?php $potongan_sd_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$potongan_sd_list->isExport() || Config("EXPORT_MASTER_RECORD") && $potongan_sd_list->isExport("print")) { ?>
<?php
if ($potongan_sd_list->DbMasterFilter != "" && $potongan_sd->getCurrentMasterTable() == "m_potongan_sd") {
	if ($potongan_sd_list->MasterRecordExists) {
		include_once "m_potongan_sdmaster.php";
	}
}
?>
<?php } ?>
<?php
$potongan_sd_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$potongan_sd_list->isExport() && !$potongan_sd->CurrentAction) { ?>
<form name="fpotongan_sdlistsrch" id="fpotongan_sdlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpotongan_sdlistsrch-search-panel" class="<?php echo $potongan_sd_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="potongan_sd">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $potongan_sd_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($potongan_sd_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($potongan_sd_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $potongan_sd_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($potongan_sd_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($potongan_sd_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($potongan_sd_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($potongan_sd_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $potongan_sd_list->showPageHeader(); ?>
<?php
$potongan_sd_list->showMessage();
?>
<?php if ($potongan_sd_list->TotalRecords > 0 || $potongan_sd->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($potongan_sd_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> potongan_sd">
<?php if (!$potongan_sd_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$potongan_sd_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $potongan_sd_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $potongan_sd_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpotongan_sdlist" id="fpotongan_sdlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="potongan_sd">
<?php if ($potongan_sd->getCurrentMasterTable() == "m_potongan_sd" && $potongan_sd->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="m_potongan_sd">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($potongan_sd_list->pid->getSessionValue()) ?>">
<input type="hidden" name="fk_tahun" value="<?php echo HtmlEncode($potongan_sd_list->tahun->getSessionValue()) ?>">
<input type="hidden" name="fk_bulan" value="<?php echo HtmlEncode($potongan_sd_list->bulan->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_potongan_sd" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($potongan_sd_list->TotalRecords > 0 || $potongan_sd_list->isGridEdit()) { ?>
<table id="tbl_potongan_sdlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$potongan_sd->RowType = ROWTYPE_HEADER;

// Render list options
$potongan_sd_list->renderListOptions();

// Render list options (header, left)
$potongan_sd_list->ListOptions->render("header", "left");
?>
<?php if ($potongan_sd_list->datetime->Visible) { // datetime ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->datetime) == "") { ?>
		<th data-name="datetime" class="<?php echo $potongan_sd_list->datetime->headerCellClass() ?>"><div id="elh_potongan_sd_datetime" class="potongan_sd_datetime"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->datetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="datetime" class="<?php echo $potongan_sd_list->datetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->datetime) ?>', 1);"><div id="elh_potongan_sd_datetime" class="potongan_sd_datetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->datetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->datetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->datetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->u_by->Visible) { // u_by ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->u_by) == "") { ?>
		<th data-name="u_by" class="<?php echo $potongan_sd_list->u_by->headerCellClass() ?>"><div id="elh_potongan_sd_u_by" class="potongan_sd_u_by"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->u_by->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="u_by" class="<?php echo $potongan_sd_list->u_by->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->u_by) ?>', 1);"><div id="elh_potongan_sd_u_by" class="potongan_sd_u_by">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->u_by->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->u_by->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->u_by->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->tahun->Visible) { // tahun ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $potongan_sd_list->tahun->headerCellClass() ?>"><div id="elh_potongan_sd_tahun" class="potongan_sd_tahun"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $potongan_sd_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->tahun) ?>', 1);"><div id="elh_potongan_sd_tahun" class="potongan_sd_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->bulan->Visible) { // bulan ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $potongan_sd_list->bulan->headerCellClass() ?>"><div id="elh_potongan_sd_bulan" class="potongan_sd_bulan"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $potongan_sd_list->bulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->bulan) ?>', 1);"><div id="elh_potongan_sd_bulan" class="potongan_sd_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->nama->Visible) { // nama ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->nama) == "") { ?>
		<th data-name="nama" class="<?php echo $potongan_sd_list->nama->headerCellClass() ?>"><div id="elh_potongan_sd_nama" class="potongan_sd_nama"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama" class="<?php echo $potongan_sd_list->nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->nama) ?>', 1);"><div id="elh_potongan_sd_nama" class="potongan_sd_nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->nama->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->jenjang_id->Visible) { // jenjang_id ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->jenjang_id) == "") { ?>
		<th data-name="jenjang_id" class="<?php echo $potongan_sd_list->jenjang_id->headerCellClass() ?>"><div id="elh_potongan_sd_jenjang_id" class="potongan_sd_jenjang_id"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->jenjang_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang_id" class="<?php echo $potongan_sd_list->jenjang_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->jenjang_id) ?>', 1);"><div id="elh_potongan_sd_jenjang_id" class="potongan_sd_jenjang_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->jenjang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->jenjang_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->jenjang_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->jabatan_id->Visible) { // jabatan_id ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->jabatan_id) == "") { ?>
		<th data-name="jabatan_id" class="<?php echo $potongan_sd_list->jabatan_id->headerCellClass() ?>"><div id="elh_potongan_sd_jabatan_id" class="potongan_sd_jabatan_id"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->jabatan_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jabatan_id" class="<?php echo $potongan_sd_list->jabatan_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->jabatan_id) ?>', 1);"><div id="elh_potongan_sd_jabatan_id" class="potongan_sd_jabatan_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->jabatan_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->jabatan_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->jabatan_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->sertif->Visible) { // sertif ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->sertif) == "") { ?>
		<th data-name="sertif" class="<?php echo $potongan_sd_list->sertif->headerCellClass() ?>"><div id="elh_potongan_sd_sertif" class="potongan_sd_sertif"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->sertif->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sertif" class="<?php echo $potongan_sd_list->sertif->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->sertif) ?>', 1);"><div id="elh_potongan_sd_sertif" class="potongan_sd_sertif">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->sertif->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->sertif->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->sertif->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->terlambat->Visible) { // terlambat ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->terlambat) == "") { ?>
		<th data-name="terlambat" class="<?php echo $potongan_sd_list->terlambat->headerCellClass() ?>"><div id="elh_potongan_sd_terlambat" class="potongan_sd_terlambat"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->terlambat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="terlambat" class="<?php echo $potongan_sd_list->terlambat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->terlambat) ?>', 1);"><div id="elh_potongan_sd_terlambat" class="potongan_sd_terlambat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->terlambat->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->terlambat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->terlambat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->value_terlambat->Visible) { // value_terlambat ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->value_terlambat) == "") { ?>
		<th data-name="value_terlambat" class="<?php echo $potongan_sd_list->value_terlambat->headerCellClass() ?>"><div id="elh_potongan_sd_value_terlambat" class="potongan_sd_value_terlambat"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->value_terlambat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_terlambat" class="<?php echo $potongan_sd_list->value_terlambat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->value_terlambat) ?>', 1);"><div id="elh_potongan_sd_value_terlambat" class="potongan_sd_value_terlambat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->value_terlambat->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->value_terlambat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->value_terlambat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->izin->Visible) { // izin ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->izin) == "") { ?>
		<th data-name="izin" class="<?php echo $potongan_sd_list->izin->headerCellClass() ?>"><div id="elh_potongan_sd_izin" class="potongan_sd_izin"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->izin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="izin" class="<?php echo $potongan_sd_list->izin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->izin) ?>', 1);"><div id="elh_potongan_sd_izin" class="potongan_sd_izin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->izin->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->izin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->izin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->value_izin->Visible) { // value_izin ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->value_izin) == "") { ?>
		<th data-name="value_izin" class="<?php echo $potongan_sd_list->value_izin->headerCellClass() ?>"><div id="elh_potongan_sd_value_izin" class="potongan_sd_value_izin"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->value_izin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_izin" class="<?php echo $potongan_sd_list->value_izin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->value_izin) ?>', 1);"><div id="elh_potongan_sd_value_izin" class="potongan_sd_value_izin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->value_izin->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->value_izin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->value_izin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->izinperjam->Visible) { // izinperjam ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->izinperjam) == "") { ?>
		<th data-name="izinperjam" class="<?php echo $potongan_sd_list->izinperjam->headerCellClass() ?>"><div id="elh_potongan_sd_izinperjam" class="potongan_sd_izinperjam"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->izinperjam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="izinperjam" class="<?php echo $potongan_sd_list->izinperjam->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->izinperjam) ?>', 1);"><div id="elh_potongan_sd_izinperjam" class="potongan_sd_izinperjam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->izinperjam->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->izinperjam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->izinperjam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->izinperjamvalue->Visible) { // izinperjamvalue ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->izinperjamvalue) == "") { ?>
		<th data-name="izinperjamvalue" class="<?php echo $potongan_sd_list->izinperjamvalue->headerCellClass() ?>"><div id="elh_potongan_sd_izinperjamvalue" class="potongan_sd_izinperjamvalue"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->izinperjamvalue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="izinperjamvalue" class="<?php echo $potongan_sd_list->izinperjamvalue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->izinperjamvalue) ?>', 1);"><div id="elh_potongan_sd_izinperjamvalue" class="potongan_sd_izinperjamvalue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->izinperjamvalue->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->izinperjamvalue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->izinperjamvalue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->sakitperjam->Visible) { // sakitperjam ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->sakitperjam) == "") { ?>
		<th data-name="sakitperjam" class="<?php echo $potongan_sd_list->sakitperjam->headerCellClass() ?>"><div id="elh_potongan_sd_sakitperjam" class="potongan_sd_sakitperjam"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->sakitperjam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sakitperjam" class="<?php echo $potongan_sd_list->sakitperjam->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->sakitperjam) ?>', 1);"><div id="elh_potongan_sd_sakitperjam" class="potongan_sd_sakitperjam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->sakitperjam->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->sakitperjam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->sakitperjam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->sakitperjamvalue->Visible) { // sakitperjamvalue ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->sakitperjamvalue) == "") { ?>
		<th data-name="sakitperjamvalue" class="<?php echo $potongan_sd_list->sakitperjamvalue->headerCellClass() ?>"><div id="elh_potongan_sd_sakitperjamvalue" class="potongan_sd_sakitperjamvalue"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->sakitperjamvalue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sakitperjamvalue" class="<?php echo $potongan_sd_list->sakitperjamvalue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->sakitperjamvalue) ?>', 1);"><div id="elh_potongan_sd_sakitperjamvalue" class="potongan_sd_sakitperjamvalue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->sakitperjamvalue->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->sakitperjamvalue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->sakitperjamvalue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->pulcep->Visible) { // pulcep ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->pulcep) == "") { ?>
		<th data-name="pulcep" class="<?php echo $potongan_sd_list->pulcep->headerCellClass() ?>"><div id="elh_potongan_sd_pulcep" class="potongan_sd_pulcep"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->pulcep->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pulcep" class="<?php echo $potongan_sd_list->pulcep->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->pulcep) ?>', 1);"><div id="elh_potongan_sd_pulcep" class="potongan_sd_pulcep">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->pulcep->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->pulcep->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->pulcep->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->value_pulcep->Visible) { // value_pulcep ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->value_pulcep) == "") { ?>
		<th data-name="value_pulcep" class="<?php echo $potongan_sd_list->value_pulcep->headerCellClass() ?>"><div id="elh_potongan_sd_value_pulcep" class="potongan_sd_value_pulcep"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->value_pulcep->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_pulcep" class="<?php echo $potongan_sd_list->value_pulcep->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->value_pulcep) ?>', 1);"><div id="elh_potongan_sd_value_pulcep" class="potongan_sd_value_pulcep">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->value_pulcep->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->value_pulcep->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->value_pulcep->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->tidakhadirjam->Visible) { // tidakhadirjam ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->tidakhadirjam) == "") { ?>
		<th data-name="tidakhadirjam" class="<?php echo $potongan_sd_list->tidakhadirjam->headerCellClass() ?>"><div id="elh_potongan_sd_tidakhadirjam" class="potongan_sd_tidakhadirjam"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->tidakhadirjam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tidakhadirjam" class="<?php echo $potongan_sd_list->tidakhadirjam->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->tidakhadirjam) ?>', 1);"><div id="elh_potongan_sd_tidakhadirjam" class="potongan_sd_tidakhadirjam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->tidakhadirjam->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->tidakhadirjam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->tidakhadirjam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->tidakhadirjamvalue->Visible) { // tidakhadirjamvalue ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->tidakhadirjamvalue) == "") { ?>
		<th data-name="tidakhadirjamvalue" class="<?php echo $potongan_sd_list->tidakhadirjamvalue->headerCellClass() ?>"><div id="elh_potongan_sd_tidakhadirjamvalue" class="potongan_sd_tidakhadirjamvalue"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->tidakhadirjamvalue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tidakhadirjamvalue" class="<?php echo $potongan_sd_list->tidakhadirjamvalue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->tidakhadirjamvalue) ?>', 1);"><div id="elh_potongan_sd_tidakhadirjamvalue" class="potongan_sd_tidakhadirjamvalue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->tidakhadirjamvalue->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->tidakhadirjamvalue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->tidakhadirjamvalue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_list->totalpotongan->Visible) { // totalpotongan ?>
	<?php if ($potongan_sd_list->SortUrl($potongan_sd_list->totalpotongan) == "") { ?>
		<th data-name="totalpotongan" class="<?php echo $potongan_sd_list->totalpotongan->headerCellClass() ?>"><div id="elh_potongan_sd_totalpotongan" class="potongan_sd_totalpotongan"><div class="ew-table-header-caption"><?php echo $potongan_sd_list->totalpotongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="totalpotongan" class="<?php echo $potongan_sd_list->totalpotongan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $potongan_sd_list->SortUrl($potongan_sd_list->totalpotongan) ?>', 1);"><div id="elh_potongan_sd_totalpotongan" class="potongan_sd_totalpotongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_list->totalpotongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_list->totalpotongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_list->totalpotongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$potongan_sd_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($potongan_sd_list->ExportAll && $potongan_sd_list->isExport()) {
	$potongan_sd_list->StopRecord = $potongan_sd_list->TotalRecords;
} else {

	// Set the last record to display
	if ($potongan_sd_list->TotalRecords > $potongan_sd_list->StartRecord + $potongan_sd_list->DisplayRecords - 1)
		$potongan_sd_list->StopRecord = $potongan_sd_list->StartRecord + $potongan_sd_list->DisplayRecords - 1;
	else
		$potongan_sd_list->StopRecord = $potongan_sd_list->TotalRecords;
}
$potongan_sd_list->RecordCount = $potongan_sd_list->StartRecord - 1;
if ($potongan_sd_list->Recordset && !$potongan_sd_list->Recordset->EOF) {
	$potongan_sd_list->Recordset->moveFirst();
	$selectLimit = $potongan_sd_list->UseSelectLimit;
	if (!$selectLimit && $potongan_sd_list->StartRecord > 1)
		$potongan_sd_list->Recordset->move($potongan_sd_list->StartRecord - 1);
} elseif (!$potongan_sd->AllowAddDeleteRow && $potongan_sd_list->StopRecord == 0) {
	$potongan_sd_list->StopRecord = $potongan_sd->GridAddRowCount;
}

// Initialize aggregate
$potongan_sd->RowType = ROWTYPE_AGGREGATEINIT;
$potongan_sd->resetAttributes();
$potongan_sd_list->renderRow();
while ($potongan_sd_list->RecordCount < $potongan_sd_list->StopRecord) {
	$potongan_sd_list->RecordCount++;
	if ($potongan_sd_list->RecordCount >= $potongan_sd_list->StartRecord) {
		$potongan_sd_list->RowCount++;

		// Set up key count
		$potongan_sd_list->KeyCount = $potongan_sd_list->RowIndex;

		// Init row class and style
		$potongan_sd->resetAttributes();
		$potongan_sd->CssClass = "";
		if ($potongan_sd_list->isGridAdd()) {
		} else {
			$potongan_sd_list->loadRowValues($potongan_sd_list->Recordset); // Load row values
		}
		$potongan_sd->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$potongan_sd->RowAttrs->merge(["data-rowindex" => $potongan_sd_list->RowCount, "id" => "r" . $potongan_sd_list->RowCount . "_potongan_sd", "data-rowtype" => $potongan_sd->RowType]);

		// Render row
		$potongan_sd_list->renderRow();

		// Render list options
		$potongan_sd_list->renderListOptions();
?>
	<tr <?php echo $potongan_sd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$potongan_sd_list->ListOptions->render("body", "left", $potongan_sd_list->RowCount);
?>
	<?php if ($potongan_sd_list->datetime->Visible) { // datetime ?>
		<td data-name="datetime" <?php echo $potongan_sd_list->datetime->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_datetime">
<span<?php echo $potongan_sd_list->datetime->viewAttributes() ?>><?php echo $potongan_sd_list->datetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->u_by->Visible) { // u_by ?>
		<td data-name="u_by" <?php echo $potongan_sd_list->u_by->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_u_by">
<span<?php echo $potongan_sd_list->u_by->viewAttributes() ?>><?php echo $potongan_sd_list->u_by->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $potongan_sd_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_tahun">
<span<?php echo $potongan_sd_list->tahun->viewAttributes() ?>><?php echo $potongan_sd_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $potongan_sd_list->bulan->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_bulan">
<span<?php echo $potongan_sd_list->bulan->viewAttributes() ?>><?php echo $potongan_sd_list->bulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->nama->Visible) { // nama ?>
		<td data-name="nama" <?php echo $potongan_sd_list->nama->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_nama">
<span<?php echo $potongan_sd_list->nama->viewAttributes() ?>><?php echo $potongan_sd_list->nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id" <?php echo $potongan_sd_list->jenjang_id->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_jenjang_id">
<span<?php echo $potongan_sd_list->jenjang_id->viewAttributes() ?>><?php echo $potongan_sd_list->jenjang_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->jabatan_id->Visible) { // jabatan_id ?>
		<td data-name="jabatan_id" <?php echo $potongan_sd_list->jabatan_id->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_jabatan_id">
<span<?php echo $potongan_sd_list->jabatan_id->viewAttributes() ?>><?php echo $potongan_sd_list->jabatan_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->sertif->Visible) { // sertif ?>
		<td data-name="sertif" <?php echo $potongan_sd_list->sertif->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_sertif">
<span<?php echo $potongan_sd_list->sertif->viewAttributes() ?>><?php echo $potongan_sd_list->sertif->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->terlambat->Visible) { // terlambat ?>
		<td data-name="terlambat" <?php echo $potongan_sd_list->terlambat->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_terlambat">
<span<?php echo $potongan_sd_list->terlambat->viewAttributes() ?>><?php echo $potongan_sd_list->terlambat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->value_terlambat->Visible) { // value_terlambat ?>
		<td data-name="value_terlambat" <?php echo $potongan_sd_list->value_terlambat->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_value_terlambat">
<span<?php echo $potongan_sd_list->value_terlambat->viewAttributes() ?>><?php echo $potongan_sd_list->value_terlambat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->izin->Visible) { // izin ?>
		<td data-name="izin" <?php echo $potongan_sd_list->izin->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_izin">
<span<?php echo $potongan_sd_list->izin->viewAttributes() ?>><?php echo $potongan_sd_list->izin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->value_izin->Visible) { // value_izin ?>
		<td data-name="value_izin" <?php echo $potongan_sd_list->value_izin->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_value_izin">
<span<?php echo $potongan_sd_list->value_izin->viewAttributes() ?>><?php echo $potongan_sd_list->value_izin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->izinperjam->Visible) { // izinperjam ?>
		<td data-name="izinperjam" <?php echo $potongan_sd_list->izinperjam->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_izinperjam">
<span<?php echo $potongan_sd_list->izinperjam->viewAttributes() ?>><?php echo $potongan_sd_list->izinperjam->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->izinperjamvalue->Visible) { // izinperjamvalue ?>
		<td data-name="izinperjamvalue" <?php echo $potongan_sd_list->izinperjamvalue->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_izinperjamvalue">
<span<?php echo $potongan_sd_list->izinperjamvalue->viewAttributes() ?>><?php echo $potongan_sd_list->izinperjamvalue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->sakitperjam->Visible) { // sakitperjam ?>
		<td data-name="sakitperjam" <?php echo $potongan_sd_list->sakitperjam->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_sakitperjam">
<span<?php echo $potongan_sd_list->sakitperjam->viewAttributes() ?>><?php echo $potongan_sd_list->sakitperjam->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->sakitperjamvalue->Visible) { // sakitperjamvalue ?>
		<td data-name="sakitperjamvalue" <?php echo $potongan_sd_list->sakitperjamvalue->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_sakitperjamvalue">
<span<?php echo $potongan_sd_list->sakitperjamvalue->viewAttributes() ?>><?php echo $potongan_sd_list->sakitperjamvalue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->pulcep->Visible) { // pulcep ?>
		<td data-name="pulcep" <?php echo $potongan_sd_list->pulcep->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_pulcep">
<span<?php echo $potongan_sd_list->pulcep->viewAttributes() ?>><?php echo $potongan_sd_list->pulcep->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->value_pulcep->Visible) { // value_pulcep ?>
		<td data-name="value_pulcep" <?php echo $potongan_sd_list->value_pulcep->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_value_pulcep">
<span<?php echo $potongan_sd_list->value_pulcep->viewAttributes() ?>><?php echo $potongan_sd_list->value_pulcep->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->tidakhadirjam->Visible) { // tidakhadirjam ?>
		<td data-name="tidakhadirjam" <?php echo $potongan_sd_list->tidakhadirjam->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_tidakhadirjam">
<span<?php echo $potongan_sd_list->tidakhadirjam->viewAttributes() ?>><?php echo $potongan_sd_list->tidakhadirjam->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->tidakhadirjamvalue->Visible) { // tidakhadirjamvalue ?>
		<td data-name="tidakhadirjamvalue" <?php echo $potongan_sd_list->tidakhadirjamvalue->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_tidakhadirjamvalue">
<span<?php echo $potongan_sd_list->tidakhadirjamvalue->viewAttributes() ?>><?php echo $potongan_sd_list->tidakhadirjamvalue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($potongan_sd_list->totalpotongan->Visible) { // totalpotongan ?>
		<td data-name="totalpotongan" <?php echo $potongan_sd_list->totalpotongan->cellAttributes() ?>>
<span id="el<?php echo $potongan_sd_list->RowCount ?>_potongan_sd_totalpotongan">
<span<?php echo $potongan_sd_list->totalpotongan->viewAttributes() ?>><?php echo $potongan_sd_list->totalpotongan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$potongan_sd_list->ListOptions->render("body", "right", $potongan_sd_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$potongan_sd_list->isGridAdd())
		$potongan_sd_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$potongan_sd->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($potongan_sd_list->Recordset)
	$potongan_sd_list->Recordset->Close();
?>
<?php if (!$potongan_sd_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$potongan_sd_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $potongan_sd_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $potongan_sd_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($potongan_sd_list->TotalRecords == 0 && !$potongan_sd->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $potongan_sd_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$potongan_sd_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$potongan_sd_list->isExport()) { ?>
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
$potongan_sd_list->terminate();
?>