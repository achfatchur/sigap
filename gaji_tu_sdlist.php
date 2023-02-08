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
$gaji_tu_sd_list = new gaji_tu_sd_list();

// Run the page
$gaji_tu_sd_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_tu_sd_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$gaji_tu_sd_list->isExport()) { ?>
<script>
var fgaji_tu_sdlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fgaji_tu_sdlist = currentForm = new ew.Form("fgaji_tu_sdlist", "list");
	fgaji_tu_sdlist.formKeyCountName = '<?php echo $gaji_tu_sd_list->FormKeyCountName ?>';
	loadjs.done("fgaji_tu_sdlist");
});
var fgaji_tu_sdlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fgaji_tu_sdlistsrch = currentSearchForm = new ew.Form("fgaji_tu_sdlistsrch");

	// Dynamic selection lists
	// Filters

	fgaji_tu_sdlistsrch.filterList = <?php echo $gaji_tu_sd_list->getFilterList() ?>;
	loadjs.done("fgaji_tu_sdlistsrch");
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
	ew.PREVIEW_OVERLAY = true;
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
<?php if (!$gaji_tu_sd_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($gaji_tu_sd_list->TotalRecords > 0 && $gaji_tu_sd_list->ExportOptions->visible()) { ?>
<?php $gaji_tu_sd_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_tu_sd_list->ImportOptions->visible()) { ?>
<?php $gaji_tu_sd_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_tu_sd_list->SearchOptions->visible()) { ?>
<?php $gaji_tu_sd_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_tu_sd_list->FilterOptions->visible()) { ?>
<?php $gaji_tu_sd_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$gaji_tu_sd_list->isExport() || Config("EXPORT_MASTER_RECORD") && $gaji_tu_sd_list->isExport("print")) { ?>
<?php
if ($gaji_tu_sd_list->DbMasterFilter != "" && $gaji_tu_sd->getCurrentMasterTable() == "m_tu_sd") {
	if ($gaji_tu_sd_list->MasterRecordExists) {
		include_once "m_tu_sdmaster.php";
	}
}
?>
<?php } ?>
<?php
$gaji_tu_sd_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$gaji_tu_sd_list->isExport() && !$gaji_tu_sd->CurrentAction) { ?>
<form name="fgaji_tu_sdlistsrch" id="fgaji_tu_sdlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fgaji_tu_sdlistsrch-search-panel" class="<?php echo $gaji_tu_sd_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="gaji_tu_sd">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $gaji_tu_sd_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($gaji_tu_sd_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($gaji_tu_sd_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $gaji_tu_sd_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($gaji_tu_sd_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($gaji_tu_sd_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($gaji_tu_sd_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($gaji_tu_sd_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $gaji_tu_sd_list->showPageHeader(); ?>
<?php
$gaji_tu_sd_list->showMessage();
?>
<?php if ($gaji_tu_sd_list->TotalRecords > 0 || $gaji_tu_sd->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($gaji_tu_sd_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> gaji_tu_sd">
<?php if (!$gaji_tu_sd_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$gaji_tu_sd_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $gaji_tu_sd_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $gaji_tu_sd_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fgaji_tu_sdlist" id="fgaji_tu_sdlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="gaji_tu_sd">
<?php if ($gaji_tu_sd->getCurrentMasterTable() == "m_tu_sd" && $gaji_tu_sd->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="m_tu_sd">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($gaji_tu_sd_list->pid->getSessionValue()) ?>">
<input type="hidden" name="fk_tahun" value="<?php echo HtmlEncode($gaji_tu_sd_list->tahun->getSessionValue()) ?>">
<input type="hidden" name="fk_bulan" value="<?php echo HtmlEncode($gaji_tu_sd_list->bulan->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_gaji_tu_sd" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($gaji_tu_sd_list->TotalRecords > 0 || $gaji_tu_sd_list->isGridEdit()) { ?>
<table id="tbl_gaji_tu_sdlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$gaji_tu_sd->RowType = ROWTYPE_HEADER;

// Render list options
$gaji_tu_sd_list->renderListOptions();

// Render list options (header, left)
$gaji_tu_sd_list->ListOptions->render("header", "left");
?>
<?php if ($gaji_tu_sd_list->tahun->Visible) { // tahun ?>
	<?php if ($gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $gaji_tu_sd_list->tahun->headerCellClass() ?>"><div id="elh_gaji_tu_sd_tahun" class="gaji_tu_sd_tahun"><div class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $gaji_tu_sd_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->tahun) ?>', 1);"><div id="elh_gaji_tu_sd_tahun" class="gaji_tu_sd_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_sd_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_sd_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_sd_list->bulan->Visible) { // bulan ?>
	<?php if ($gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $gaji_tu_sd_list->bulan->headerCellClass() ?>"><div id="elh_gaji_tu_sd_bulan" class="gaji_tu_sd_bulan"><div class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $gaji_tu_sd_list->bulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->bulan) ?>', 1);"><div id="elh_gaji_tu_sd_bulan" class="gaji_tu_sd_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_sd_list->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_sd_list->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_sd_list->pegawai->Visible) { // pegawai ?>
	<?php if ($gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $gaji_tu_sd_list->pegawai->headerCellClass() ?>"><div id="elh_gaji_tu_sd_pegawai" class="gaji_tu_sd_pegawai"><div class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $gaji_tu_sd_list->pegawai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->pegawai) ?>', 1);"><div id="elh_gaji_tu_sd_pegawai" class="gaji_tu_sd_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_sd_list->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_sd_list->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_sd_list->potongan->Visible) { // potongan ?>
	<?php if ($gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $gaji_tu_sd_list->potongan->headerCellClass() ?>"><div id="elh_gaji_tu_sd_potongan" class="gaji_tu_sd_potongan"><div class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $gaji_tu_sd_list->potongan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->potongan) ?>', 1);"><div id="elh_gaji_tu_sd_potongan" class="gaji_tu_sd_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_sd_list->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_sd_list->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_sd_list->sub_total->Visible) { // sub_total ?>
	<?php if ($gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->sub_total) == "") { ?>
		<th data-name="sub_total" class="<?php echo $gaji_tu_sd_list->sub_total->headerCellClass() ?>"><div id="elh_gaji_tu_sd_sub_total" class="gaji_tu_sd_sub_total"><div class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->sub_total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sub_total" class="<?php echo $gaji_tu_sd_list->sub_total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->sub_total) ?>', 1);"><div id="elh_gaji_tu_sd_sub_total" class="gaji_tu_sd_sub_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->sub_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_sd_list->sub_total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_sd_list->sub_total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_sd_list->penyesuaian->Visible) { // penyesuaian ?>
	<?php if ($gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->penyesuaian) == "") { ?>
		<th data-name="penyesuaian" class="<?php echo $gaji_tu_sd_list->penyesuaian->headerCellClass() ?>"><div id="elh_gaji_tu_sd_penyesuaian" class="gaji_tu_sd_penyesuaian"><div class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->penyesuaian->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="penyesuaian" class="<?php echo $gaji_tu_sd_list->penyesuaian->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->penyesuaian) ?>', 1);"><div id="elh_gaji_tu_sd_penyesuaian" class="gaji_tu_sd_penyesuaian">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->penyesuaian->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_sd_list->penyesuaian->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_sd_list->penyesuaian->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_sd_list->total->Visible) { // total ?>
	<?php if ($gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->total) == "") { ?>
		<th data-name="total" class="<?php echo $gaji_tu_sd_list->total->headerCellClass() ?>"><div id="elh_gaji_tu_sd_total" class="gaji_tu_sd_total"><div class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $gaji_tu_sd_list->total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->total) ?>', 1);"><div id="elh_gaji_tu_sd_total" class="gaji_tu_sd_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_sd_list->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_sd_list->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_sd_list->voucher->Visible) { // voucher ?>
	<?php if ($gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->voucher) == "") { ?>
		<th data-name="voucher" class="<?php echo $gaji_tu_sd_list->voucher->headerCellClass() ?>"><div id="elh_gaji_tu_sd_voucher" class="gaji_tu_sd_voucher"><div class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->voucher->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher" class="<?php echo $gaji_tu_sd_list->voucher->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->voucher) ?>', 1);"><div id="elh_gaji_tu_sd_voucher" class="gaji_tu_sd_voucher">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->voucher->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_sd_list->voucher->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_sd_list->voucher->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_sd_list->status->Visible) { // status ?>
	<?php if ($gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $gaji_tu_sd_list->status->headerCellClass() ?>"><div id="elh_gaji_tu_sd_status" class="gaji_tu_sd_status"><div class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $gaji_tu_sd_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->status) ?>', 1);"><div id="elh_gaji_tu_sd_status" class="gaji_tu_sd_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_sd_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_sd_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_sd_list->potongan_bendahara->Visible) { // potongan_bendahara ?>
	<?php if ($gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->potongan_bendahara) == "") { ?>
		<th data-name="potongan_bendahara" class="<?php echo $gaji_tu_sd_list->potongan_bendahara->headerCellClass() ?>"><div id="elh_gaji_tu_sd_potongan_bendahara" class="gaji_tu_sd_potongan_bendahara"><div class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->potongan_bendahara->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan_bendahara" class="<?php echo $gaji_tu_sd_list->potongan_bendahara->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_tu_sd_list->SortUrl($gaji_tu_sd_list->potongan_bendahara) ?>', 1);"><div id="elh_gaji_tu_sd_potongan_bendahara" class="gaji_tu_sd_potongan_bendahara">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_sd_list->potongan_bendahara->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_sd_list->potongan_bendahara->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_sd_list->potongan_bendahara->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$gaji_tu_sd_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($gaji_tu_sd_list->ExportAll && $gaji_tu_sd_list->isExport()) {
	$gaji_tu_sd_list->StopRecord = $gaji_tu_sd_list->TotalRecords;
} else {

	// Set the last record to display
	if ($gaji_tu_sd_list->TotalRecords > $gaji_tu_sd_list->StartRecord + $gaji_tu_sd_list->DisplayRecords - 1)
		$gaji_tu_sd_list->StopRecord = $gaji_tu_sd_list->StartRecord + $gaji_tu_sd_list->DisplayRecords - 1;
	else
		$gaji_tu_sd_list->StopRecord = $gaji_tu_sd_list->TotalRecords;
}
$gaji_tu_sd_list->RecordCount = $gaji_tu_sd_list->StartRecord - 1;
if ($gaji_tu_sd_list->Recordset && !$gaji_tu_sd_list->Recordset->EOF) {
	$gaji_tu_sd_list->Recordset->moveFirst();
	$selectLimit = $gaji_tu_sd_list->UseSelectLimit;
	if (!$selectLimit && $gaji_tu_sd_list->StartRecord > 1)
		$gaji_tu_sd_list->Recordset->move($gaji_tu_sd_list->StartRecord - 1);
} elseif (!$gaji_tu_sd->AllowAddDeleteRow && $gaji_tu_sd_list->StopRecord == 0) {
	$gaji_tu_sd_list->StopRecord = $gaji_tu_sd->GridAddRowCount;
}

// Initialize aggregate
$gaji_tu_sd->RowType = ROWTYPE_AGGREGATEINIT;
$gaji_tu_sd->resetAttributes();
$gaji_tu_sd_list->renderRow();
while ($gaji_tu_sd_list->RecordCount < $gaji_tu_sd_list->StopRecord) {
	$gaji_tu_sd_list->RecordCount++;
	if ($gaji_tu_sd_list->RecordCount >= $gaji_tu_sd_list->StartRecord) {
		$gaji_tu_sd_list->RowCount++;

		// Set up key count
		$gaji_tu_sd_list->KeyCount = $gaji_tu_sd_list->RowIndex;

		// Init row class and style
		$gaji_tu_sd->resetAttributes();
		$gaji_tu_sd->CssClass = "";
		if ($gaji_tu_sd_list->isGridAdd()) {
		} else {
			$gaji_tu_sd_list->loadRowValues($gaji_tu_sd_list->Recordset); // Load row values
		}
		$gaji_tu_sd->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$gaji_tu_sd->RowAttrs->merge(["data-rowindex" => $gaji_tu_sd_list->RowCount, "id" => "r" . $gaji_tu_sd_list->RowCount . "_gaji_tu_sd", "data-rowtype" => $gaji_tu_sd->RowType]);

		// Render row
		$gaji_tu_sd_list->renderRow();

		// Render list options
		$gaji_tu_sd_list->renderListOptions();
?>
	<tr <?php echo $gaji_tu_sd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$gaji_tu_sd_list->ListOptions->render("body", "left", $gaji_tu_sd_list->RowCount);
?>
	<?php if ($gaji_tu_sd_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $gaji_tu_sd_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $gaji_tu_sd_list->RowCount ?>_gaji_tu_sd_tahun">
<span<?php echo $gaji_tu_sd_list->tahun->viewAttributes() ?>><?php echo $gaji_tu_sd_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_tu_sd_list->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $gaji_tu_sd_list->bulan->cellAttributes() ?>>
<span id="el<?php echo $gaji_tu_sd_list->RowCount ?>_gaji_tu_sd_bulan">
<span<?php echo $gaji_tu_sd_list->bulan->viewAttributes() ?>><?php echo $gaji_tu_sd_list->bulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_tu_sd_list->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $gaji_tu_sd_list->pegawai->cellAttributes() ?>>
<span id="el<?php echo $gaji_tu_sd_list->RowCount ?>_gaji_tu_sd_pegawai">
<span<?php echo $gaji_tu_sd_list->pegawai->viewAttributes() ?>><?php echo $gaji_tu_sd_list->pegawai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_tu_sd_list->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $gaji_tu_sd_list->potongan->cellAttributes() ?>>
<span id="el<?php echo $gaji_tu_sd_list->RowCount ?>_gaji_tu_sd_potongan">
<span<?php echo $gaji_tu_sd_list->potongan->viewAttributes() ?>><?php echo $gaji_tu_sd_list->potongan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_tu_sd_list->sub_total->Visible) { // sub_total ?>
		<td data-name="sub_total" <?php echo $gaji_tu_sd_list->sub_total->cellAttributes() ?>>
<span id="el<?php echo $gaji_tu_sd_list->RowCount ?>_gaji_tu_sd_sub_total">
<span<?php echo $gaji_tu_sd_list->sub_total->viewAttributes() ?>><?php echo $gaji_tu_sd_list->sub_total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_tu_sd_list->penyesuaian->Visible) { // penyesuaian ?>
		<td data-name="penyesuaian" <?php echo $gaji_tu_sd_list->penyesuaian->cellAttributes() ?>>
<span id="el<?php echo $gaji_tu_sd_list->RowCount ?>_gaji_tu_sd_penyesuaian">
<span<?php echo $gaji_tu_sd_list->penyesuaian->viewAttributes() ?>><?php echo $gaji_tu_sd_list->penyesuaian->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_tu_sd_list->total->Visible) { // total ?>
		<td data-name="total" <?php echo $gaji_tu_sd_list->total->cellAttributes() ?>>
<span id="el<?php echo $gaji_tu_sd_list->RowCount ?>_gaji_tu_sd_total">
<span<?php echo $gaji_tu_sd_list->total->viewAttributes() ?>><?php echo $gaji_tu_sd_list->total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_tu_sd_list->voucher->Visible) { // voucher ?>
		<td data-name="voucher" <?php echo $gaji_tu_sd_list->voucher->cellAttributes() ?>>
<span id="el<?php echo $gaji_tu_sd_list->RowCount ?>_gaji_tu_sd_voucher">
<span<?php echo $gaji_tu_sd_list->voucher->viewAttributes() ?>><?php echo $gaji_tu_sd_list->voucher->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_tu_sd_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $gaji_tu_sd_list->status->cellAttributes() ?>>
<span id="el<?php echo $gaji_tu_sd_list->RowCount ?>_gaji_tu_sd_status">
<span<?php echo $gaji_tu_sd_list->status->viewAttributes() ?>><?php echo $gaji_tu_sd_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_tu_sd_list->potongan_bendahara->Visible) { // potongan_bendahara ?>
		<td data-name="potongan_bendahara" <?php echo $gaji_tu_sd_list->potongan_bendahara->cellAttributes() ?>>
<span id="el<?php echo $gaji_tu_sd_list->RowCount ?>_gaji_tu_sd_potongan_bendahara">
<span<?php echo $gaji_tu_sd_list->potongan_bendahara->viewAttributes() ?>><?php echo $gaji_tu_sd_list->potongan_bendahara->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$gaji_tu_sd_list->ListOptions->render("body", "right", $gaji_tu_sd_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$gaji_tu_sd_list->isGridAdd())
		$gaji_tu_sd_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$gaji_tu_sd->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($gaji_tu_sd_list->Recordset)
	$gaji_tu_sd_list->Recordset->Close();
?>
<?php if (!$gaji_tu_sd_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$gaji_tu_sd_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $gaji_tu_sd_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $gaji_tu_sd_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($gaji_tu_sd_list->TotalRecords == 0 && !$gaji_tu_sd->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $gaji_tu_sd_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$gaji_tu_sd_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$gaji_tu_sd_list->isExport()) { ?>
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
$gaji_tu_sd_list->terminate();
?>