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
$solved_tk_list = new solved_tk_list();

// Run the page
$solved_tk_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$solved_tk_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$solved_tk_list->isExport()) { ?>
<script>
var fsolved_tklist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fsolved_tklist = currentForm = new ew.Form("fsolved_tklist", "list");
	fsolved_tklist.formKeyCountName = '<?php echo $solved_tk_list->FormKeyCountName ?>';
	loadjs.done("fsolved_tklist");
});
var fsolved_tklistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fsolved_tklistsrch = currentSearchForm = new ew.Form("fsolved_tklistsrch");

	// Dynamic selection lists
	// Filters

	fsolved_tklistsrch.filterList = <?php echo $solved_tk_list->getFilterList() ?>;
	loadjs.done("fsolved_tklistsrch");
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
<?php if (!$solved_tk_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($solved_tk_list->TotalRecords > 0 && $solved_tk_list->ExportOptions->visible()) { ?>
<?php $solved_tk_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($solved_tk_list->ImportOptions->visible()) { ?>
<?php $solved_tk_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($solved_tk_list->SearchOptions->visible()) { ?>
<?php $solved_tk_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($solved_tk_list->FilterOptions->visible()) { ?>
<?php $solved_tk_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$solved_tk_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$solved_tk_list->isExport() && !$solved_tk->CurrentAction) { ?>
<form name="fsolved_tklistsrch" id="fsolved_tklistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fsolved_tklistsrch-search-panel" class="<?php echo $solved_tk_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="solved_tk">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $solved_tk_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($solved_tk_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($solved_tk_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $solved_tk_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($solved_tk_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($solved_tk_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($solved_tk_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($solved_tk_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $solved_tk_list->showPageHeader(); ?>
<?php
$solved_tk_list->showMessage();
?>
<?php if ($solved_tk_list->TotalRecords > 0 || $solved_tk->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($solved_tk_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> solved_tk">
<?php if (!$solved_tk_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$solved_tk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $solved_tk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $solved_tk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsolved_tklist" id="fsolved_tklist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="solved_tk">
<div id="gmp_solved_tk" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($solved_tk_list->TotalRecords > 0 || $solved_tk_list->isGridEdit()) { ?>
<table id="tbl_solved_tklist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$solved_tk->RowType = ROWTYPE_HEADER;

// Render list options
$solved_tk_list->renderListOptions();

// Render list options (header, left)
$solved_tk_list->ListOptions->render("header", "left");
?>
<?php if ($solved_tk_list->id->Visible) { // id ?>
	<?php if ($solved_tk_list->SortUrl($solved_tk_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $solved_tk_list->id->headerCellClass() ?>"><div id="elh_solved_tk_id" class="solved_tk_id"><div class="ew-table-header-caption"><?php echo $solved_tk_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $solved_tk_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $solved_tk_list->SortUrl($solved_tk_list->id) ?>', 1);"><div id="elh_solved_tk_id" class="solved_tk_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $solved_tk_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($solved_tk_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($solved_tk_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($solved_tk_list->nip->Visible) { // nip ?>
	<?php if ($solved_tk_list->SortUrl($solved_tk_list->nip) == "") { ?>
		<th data-name="nip" class="<?php echo $solved_tk_list->nip->headerCellClass() ?>"><div id="elh_solved_tk_nip" class="solved_tk_nip"><div class="ew-table-header-caption"><?php echo $solved_tk_list->nip->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nip" class="<?php echo $solved_tk_list->nip->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $solved_tk_list->SortUrl($solved_tk_list->nip) ?>', 1);"><div id="elh_solved_tk_nip" class="solved_tk_nip">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $solved_tk_list->nip->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($solved_tk_list->nip->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($solved_tk_list->nip->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($solved_tk_list->total_gaji->Visible) { // total_gaji ?>
	<?php if ($solved_tk_list->SortUrl($solved_tk_list->total_gaji) == "") { ?>
		<th data-name="total_gaji" class="<?php echo $solved_tk_list->total_gaji->headerCellClass() ?>"><div id="elh_solved_tk_total_gaji" class="solved_tk_total_gaji"><div class="ew-table-header-caption"><?php echo $solved_tk_list->total_gaji->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_gaji" class="<?php echo $solved_tk_list->total_gaji->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $solved_tk_list->SortUrl($solved_tk_list->total_gaji) ?>', 1);"><div id="elh_solved_tk_total_gaji" class="solved_tk_total_gaji">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $solved_tk_list->total_gaji->caption() ?></span><span class="ew-table-header-sort"><?php if ($solved_tk_list->total_gaji->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($solved_tk_list->total_gaji->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($solved_tk_list->j_pensiun->Visible) { // j_pensiun ?>
	<?php if ($solved_tk_list->SortUrl($solved_tk_list->j_pensiun) == "") { ?>
		<th data-name="j_pensiun" class="<?php echo $solved_tk_list->j_pensiun->headerCellClass() ?>"><div id="elh_solved_tk_j_pensiun" class="solved_tk_j_pensiun"><div class="ew-table-header-caption"><?php echo $solved_tk_list->j_pensiun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="j_pensiun" class="<?php echo $solved_tk_list->j_pensiun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $solved_tk_list->SortUrl($solved_tk_list->j_pensiun) ?>', 1);"><div id="elh_solved_tk_j_pensiun" class="solved_tk_j_pensiun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $solved_tk_list->j_pensiun->caption() ?></span><span class="ew-table-header-sort"><?php if ($solved_tk_list->j_pensiun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($solved_tk_list->j_pensiun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($solved_tk_list->hari_tua->Visible) { // hari_tua ?>
	<?php if ($solved_tk_list->SortUrl($solved_tk_list->hari_tua) == "") { ?>
		<th data-name="hari_tua" class="<?php echo $solved_tk_list->hari_tua->headerCellClass() ?>"><div id="elh_solved_tk_hari_tua" class="solved_tk_hari_tua"><div class="ew-table-header-caption"><?php echo $solved_tk_list->hari_tua->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hari_tua" class="<?php echo $solved_tk_list->hari_tua->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $solved_tk_list->SortUrl($solved_tk_list->hari_tua) ?>', 1);"><div id="elh_solved_tk_hari_tua" class="solved_tk_hari_tua">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $solved_tk_list->hari_tua->caption() ?></span><span class="ew-table-header-sort"><?php if ($solved_tk_list->hari_tua->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($solved_tk_list->hari_tua->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($solved_tk_list->pph21->Visible) { // pph21 ?>
	<?php if ($solved_tk_list->SortUrl($solved_tk_list->pph21) == "") { ?>
		<th data-name="pph21" class="<?php echo $solved_tk_list->pph21->headerCellClass() ?>"><div id="elh_solved_tk_pph21" class="solved_tk_pph21"><div class="ew-table-header-caption"><?php echo $solved_tk_list->pph21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pph21" class="<?php echo $solved_tk_list->pph21->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $solved_tk_list->SortUrl($solved_tk_list->pph21) ?>', 1);"><div id="elh_solved_tk_pph21" class="solved_tk_pph21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $solved_tk_list->pph21->caption() ?></span><span class="ew-table-header-sort"><?php if ($solved_tk_list->pph21->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($solved_tk_list->pph21->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($solved_tk_list->golongan_bpjs->Visible) { // golongan_bpjs ?>
	<?php if ($solved_tk_list->SortUrl($solved_tk_list->golongan_bpjs) == "") { ?>
		<th data-name="golongan_bpjs" class="<?php echo $solved_tk_list->golongan_bpjs->headerCellClass() ?>"><div id="elh_solved_tk_golongan_bpjs" class="solved_tk_golongan_bpjs"><div class="ew-table-header-caption"><?php echo $solved_tk_list->golongan_bpjs->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="golongan_bpjs" class="<?php echo $solved_tk_list->golongan_bpjs->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $solved_tk_list->SortUrl($solved_tk_list->golongan_bpjs) ?>', 1);"><div id="elh_solved_tk_golongan_bpjs" class="solved_tk_golongan_bpjs">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $solved_tk_list->golongan_bpjs->caption() ?></span><span class="ew-table-header-sort"><?php if ($solved_tk_list->golongan_bpjs->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($solved_tk_list->golongan_bpjs->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($solved_tk_list->iuran_bpjs->Visible) { // iuran_bpjs ?>
	<?php if ($solved_tk_list->SortUrl($solved_tk_list->iuran_bpjs) == "") { ?>
		<th data-name="iuran_bpjs" class="<?php echo $solved_tk_list->iuran_bpjs->headerCellClass() ?>"><div id="elh_solved_tk_iuran_bpjs" class="solved_tk_iuran_bpjs"><div class="ew-table-header-caption"><?php echo $solved_tk_list->iuran_bpjs->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="iuran_bpjs" class="<?php echo $solved_tk_list->iuran_bpjs->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $solved_tk_list->SortUrl($solved_tk_list->iuran_bpjs) ?>', 1);"><div id="elh_solved_tk_iuran_bpjs" class="solved_tk_iuran_bpjs">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $solved_tk_list->iuran_bpjs->caption() ?></span><span class="ew-table-header-sort"><?php if ($solved_tk_list->iuran_bpjs->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($solved_tk_list->iuran_bpjs->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($solved_tk_list->bulan->Visible) { // bulan ?>
	<?php if ($solved_tk_list->SortUrl($solved_tk_list->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $solved_tk_list->bulan->headerCellClass() ?>"><div id="elh_solved_tk_bulan" class="solved_tk_bulan"><div class="ew-table-header-caption"><?php echo $solved_tk_list->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $solved_tk_list->bulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $solved_tk_list->SortUrl($solved_tk_list->bulan) ?>', 1);"><div id="elh_solved_tk_bulan" class="solved_tk_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $solved_tk_list->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($solved_tk_list->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($solved_tk_list->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($solved_tk_list->tahun->Visible) { // tahun ?>
	<?php if ($solved_tk_list->SortUrl($solved_tk_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $solved_tk_list->tahun->headerCellClass() ?>"><div id="elh_solved_tk_tahun" class="solved_tk_tahun"><div class="ew-table-header-caption"><?php echo $solved_tk_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $solved_tk_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $solved_tk_list->SortUrl($solved_tk_list->tahun) ?>', 1);"><div id="elh_solved_tk_tahun" class="solved_tk_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $solved_tk_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($solved_tk_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($solved_tk_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($solved_tk_list->type_peg->Visible) { // type_peg ?>
	<?php if ($solved_tk_list->SortUrl($solved_tk_list->type_peg) == "") { ?>
		<th data-name="type_peg" class="<?php echo $solved_tk_list->type_peg->headerCellClass() ?>"><div id="elh_solved_tk_type_peg" class="solved_tk_type_peg"><div class="ew-table-header-caption"><?php echo $solved_tk_list->type_peg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="type_peg" class="<?php echo $solved_tk_list->type_peg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $solved_tk_list->SortUrl($solved_tk_list->type_peg) ?>', 1);"><div id="elh_solved_tk_type_peg" class="solved_tk_type_peg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $solved_tk_list->type_peg->caption() ?></span><span class="ew-table-header-sort"><?php if ($solved_tk_list->type_peg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($solved_tk_list->type_peg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($solved_tk_list->unit->Visible) { // unit ?>
	<?php if ($solved_tk_list->SortUrl($solved_tk_list->unit) == "") { ?>
		<th data-name="unit" class="<?php echo $solved_tk_list->unit->headerCellClass() ?>"><div id="elh_solved_tk_unit" class="solved_tk_unit"><div class="ew-table-header-caption"><?php echo $solved_tk_list->unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="unit" class="<?php echo $solved_tk_list->unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $solved_tk_list->SortUrl($solved_tk_list->unit) ?>', 1);"><div id="elh_solved_tk_unit" class="solved_tk_unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $solved_tk_list->unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($solved_tk_list->unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($solved_tk_list->unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($solved_tk_list->tanggal->Visible) { // tanggal ?>
	<?php if ($solved_tk_list->SortUrl($solved_tk_list->tanggal) == "") { ?>
		<th data-name="tanggal" class="<?php echo $solved_tk_list->tanggal->headerCellClass() ?>"><div id="elh_solved_tk_tanggal" class="solved_tk_tanggal"><div class="ew-table-header-caption"><?php echo $solved_tk_list->tanggal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tanggal" class="<?php echo $solved_tk_list->tanggal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $solved_tk_list->SortUrl($solved_tk_list->tanggal) ?>', 1);"><div id="elh_solved_tk_tanggal" class="solved_tk_tanggal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $solved_tk_list->tanggal->caption() ?></span><span class="ew-table-header-sort"><?php if ($solved_tk_list->tanggal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($solved_tk_list->tanggal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$solved_tk_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($solved_tk_list->ExportAll && $solved_tk_list->isExport()) {
	$solved_tk_list->StopRecord = $solved_tk_list->TotalRecords;
} else {

	// Set the last record to display
	if ($solved_tk_list->TotalRecords > $solved_tk_list->StartRecord + $solved_tk_list->DisplayRecords - 1)
		$solved_tk_list->StopRecord = $solved_tk_list->StartRecord + $solved_tk_list->DisplayRecords - 1;
	else
		$solved_tk_list->StopRecord = $solved_tk_list->TotalRecords;
}
$solved_tk_list->RecordCount = $solved_tk_list->StartRecord - 1;
if ($solved_tk_list->Recordset && !$solved_tk_list->Recordset->EOF) {
	$solved_tk_list->Recordset->moveFirst();
	$selectLimit = $solved_tk_list->UseSelectLimit;
	if (!$selectLimit && $solved_tk_list->StartRecord > 1)
		$solved_tk_list->Recordset->move($solved_tk_list->StartRecord - 1);
} elseif (!$solved_tk->AllowAddDeleteRow && $solved_tk_list->StopRecord == 0) {
	$solved_tk_list->StopRecord = $solved_tk->GridAddRowCount;
}

// Initialize aggregate
$solved_tk->RowType = ROWTYPE_AGGREGATEINIT;
$solved_tk->resetAttributes();
$solved_tk_list->renderRow();
while ($solved_tk_list->RecordCount < $solved_tk_list->StopRecord) {
	$solved_tk_list->RecordCount++;
	if ($solved_tk_list->RecordCount >= $solved_tk_list->StartRecord) {
		$solved_tk_list->RowCount++;

		// Set up key count
		$solved_tk_list->KeyCount = $solved_tk_list->RowIndex;

		// Init row class and style
		$solved_tk->resetAttributes();
		$solved_tk->CssClass = "";
		if ($solved_tk_list->isGridAdd()) {
		} else {
			$solved_tk_list->loadRowValues($solved_tk_list->Recordset); // Load row values
		}
		$solved_tk->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$solved_tk->RowAttrs->merge(["data-rowindex" => $solved_tk_list->RowCount, "id" => "r" . $solved_tk_list->RowCount . "_solved_tk", "data-rowtype" => $solved_tk->RowType]);

		// Render row
		$solved_tk_list->renderRow();

		// Render list options
		$solved_tk_list->renderListOptions();
?>
	<tr <?php echo $solved_tk->rowAttributes() ?>>
<?php

// Render list options (body, left)
$solved_tk_list->ListOptions->render("body", "left", $solved_tk_list->RowCount);
?>
	<?php if ($solved_tk_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $solved_tk_list->id->cellAttributes() ?>>
<span id="el<?php echo $solved_tk_list->RowCount ?>_solved_tk_id">
<span<?php echo $solved_tk_list->id->viewAttributes() ?>><?php echo $solved_tk_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($solved_tk_list->nip->Visible) { // nip ?>
		<td data-name="nip" <?php echo $solved_tk_list->nip->cellAttributes() ?>>
<span id="el<?php echo $solved_tk_list->RowCount ?>_solved_tk_nip">
<span<?php echo $solved_tk_list->nip->viewAttributes() ?>><?php echo $solved_tk_list->nip->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($solved_tk_list->total_gaji->Visible) { // total_gaji ?>
		<td data-name="total_gaji" <?php echo $solved_tk_list->total_gaji->cellAttributes() ?>>
<span id="el<?php echo $solved_tk_list->RowCount ?>_solved_tk_total_gaji">
<span<?php echo $solved_tk_list->total_gaji->viewAttributes() ?>><?php echo $solved_tk_list->total_gaji->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($solved_tk_list->j_pensiun->Visible) { // j_pensiun ?>
		<td data-name="j_pensiun" <?php echo $solved_tk_list->j_pensiun->cellAttributes() ?>>
<span id="el<?php echo $solved_tk_list->RowCount ?>_solved_tk_j_pensiun">
<span<?php echo $solved_tk_list->j_pensiun->viewAttributes() ?>><?php echo $solved_tk_list->j_pensiun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($solved_tk_list->hari_tua->Visible) { // hari_tua ?>
		<td data-name="hari_tua" <?php echo $solved_tk_list->hari_tua->cellAttributes() ?>>
<span id="el<?php echo $solved_tk_list->RowCount ?>_solved_tk_hari_tua">
<span<?php echo $solved_tk_list->hari_tua->viewAttributes() ?>><?php echo $solved_tk_list->hari_tua->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($solved_tk_list->pph21->Visible) { // pph21 ?>
		<td data-name="pph21" <?php echo $solved_tk_list->pph21->cellAttributes() ?>>
<span id="el<?php echo $solved_tk_list->RowCount ?>_solved_tk_pph21">
<span<?php echo $solved_tk_list->pph21->viewAttributes() ?>><?php echo $solved_tk_list->pph21->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($solved_tk_list->golongan_bpjs->Visible) { // golongan_bpjs ?>
		<td data-name="golongan_bpjs" <?php echo $solved_tk_list->golongan_bpjs->cellAttributes() ?>>
<span id="el<?php echo $solved_tk_list->RowCount ?>_solved_tk_golongan_bpjs">
<span<?php echo $solved_tk_list->golongan_bpjs->viewAttributes() ?>><?php echo $solved_tk_list->golongan_bpjs->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($solved_tk_list->iuran_bpjs->Visible) { // iuran_bpjs ?>
		<td data-name="iuran_bpjs" <?php echo $solved_tk_list->iuran_bpjs->cellAttributes() ?>>
<span id="el<?php echo $solved_tk_list->RowCount ?>_solved_tk_iuran_bpjs">
<span<?php echo $solved_tk_list->iuran_bpjs->viewAttributes() ?>><?php echo $solved_tk_list->iuran_bpjs->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($solved_tk_list->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $solved_tk_list->bulan->cellAttributes() ?>>
<span id="el<?php echo $solved_tk_list->RowCount ?>_solved_tk_bulan">
<span<?php echo $solved_tk_list->bulan->viewAttributes() ?>><?php echo $solved_tk_list->bulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($solved_tk_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $solved_tk_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $solved_tk_list->RowCount ?>_solved_tk_tahun">
<span<?php echo $solved_tk_list->tahun->viewAttributes() ?>><?php echo $solved_tk_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($solved_tk_list->type_peg->Visible) { // type_peg ?>
		<td data-name="type_peg" <?php echo $solved_tk_list->type_peg->cellAttributes() ?>>
<span id="el<?php echo $solved_tk_list->RowCount ?>_solved_tk_type_peg">
<span<?php echo $solved_tk_list->type_peg->viewAttributes() ?>><?php echo $solved_tk_list->type_peg->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($solved_tk_list->unit->Visible) { // unit ?>
		<td data-name="unit" <?php echo $solved_tk_list->unit->cellAttributes() ?>>
<span id="el<?php echo $solved_tk_list->RowCount ?>_solved_tk_unit">
<span<?php echo $solved_tk_list->unit->viewAttributes() ?>><?php echo $solved_tk_list->unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($solved_tk_list->tanggal->Visible) { // tanggal ?>
		<td data-name="tanggal" <?php echo $solved_tk_list->tanggal->cellAttributes() ?>>
<span id="el<?php echo $solved_tk_list->RowCount ?>_solved_tk_tanggal">
<span<?php echo $solved_tk_list->tanggal->viewAttributes() ?>><?php echo $solved_tk_list->tanggal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$solved_tk_list->ListOptions->render("body", "right", $solved_tk_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$solved_tk_list->isGridAdd())
		$solved_tk_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$solved_tk->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($solved_tk_list->Recordset)
	$solved_tk_list->Recordset->Close();
?>
<?php if (!$solved_tk_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$solved_tk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $solved_tk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $solved_tk_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($solved_tk_list->TotalRecords == 0 && !$solved_tk->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $solved_tk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$solved_tk_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$solved_tk_list->isExport()) { ?>
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
$solved_tk_list->terminate();
?>