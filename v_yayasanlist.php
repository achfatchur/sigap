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
$v_yayasan_list = new v_yayasan_list();

// Run the page
$v_yayasan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_yayasan_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$v_yayasan_list->isExport()) { ?>
<script>
var fv_yayasanlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fv_yayasanlist = currentForm = new ew.Form("fv_yayasanlist", "list");
	fv_yayasanlist.formKeyCountName = '<?php echo $v_yayasan_list->FormKeyCountName ?>';
	loadjs.done("fv_yayasanlist");
});
var fv_yayasanlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fv_yayasanlistsrch = currentSearchForm = new ew.Form("fv_yayasanlistsrch");

	// Dynamic selection lists
	// Filters

	fv_yayasanlistsrch.filterList = <?php echo $v_yayasan_list->getFilterList() ?>;
	loadjs.done("fv_yayasanlistsrch");
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
<?php if (!$v_yayasan_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v_yayasan_list->TotalRecords > 0 && $v_yayasan_list->ExportOptions->visible()) { ?>
<?php $v_yayasan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v_yayasan_list->ImportOptions->visible()) { ?>
<?php $v_yayasan_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v_yayasan_list->SearchOptions->visible()) { ?>
<?php $v_yayasan_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v_yayasan_list->FilterOptions->visible()) { ?>
<?php $v_yayasan_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v_yayasan_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v_yayasan_list->isExport() && !$v_yayasan->CurrentAction) { ?>
<form name="fv_yayasanlistsrch" id="fv_yayasanlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fv_yayasanlistsrch-search-panel" class="<?php echo $v_yayasan_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v_yayasan">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $v_yayasan_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($v_yayasan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($v_yayasan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $v_yayasan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($v_yayasan_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($v_yayasan_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($v_yayasan_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($v_yayasan_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $v_yayasan_list->showPageHeader(); ?>
<?php
$v_yayasan_list->showMessage();
?>
<?php if ($v_yayasan_list->TotalRecords > 0 || $v_yayasan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v_yayasan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v_yayasan">
<?php if (!$v_yayasan_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$v_yayasan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v_yayasan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_yayasan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fv_yayasanlist" id="fv_yayasanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v_yayasan">
<div id="gmp_v_yayasan" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($v_yayasan_list->TotalRecords > 0 || $v_yayasan_list->isGridEdit()) { ?>
<table id="tbl_v_yayasanlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v_yayasan->RowType = ROWTYPE_HEADER;

// Render list options
$v_yayasan_list->renderListOptions();

// Render list options (header, left)
$v_yayasan_list->ListOptions->render("header", "left");
?>
<?php if ($v_yayasan_list->id->Visible) { // id ?>
	<?php if ($v_yayasan_list->SortUrl($v_yayasan_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $v_yayasan_list->id->headerCellClass() ?>"><div id="elh_v_yayasan_id" class="v_yayasan_id"><div class="ew-table-header-caption"><?php echo $v_yayasan_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $v_yayasan_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_yayasan_list->SortUrl($v_yayasan_list->id) ?>', 1);"><div id="elh_v_yayasan_id" class="v_yayasan_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_yayasan_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_yayasan_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_yayasan_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_yayasan_list->bulan->Visible) { // bulan ?>
	<?php if ($v_yayasan_list->SortUrl($v_yayasan_list->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $v_yayasan_list->bulan->headerCellClass() ?>"><div id="elh_v_yayasan_bulan" class="v_yayasan_bulan"><div class="ew-table-header-caption"><?php echo $v_yayasan_list->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $v_yayasan_list->bulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_yayasan_list->SortUrl($v_yayasan_list->bulan) ?>', 1);"><div id="elh_v_yayasan_bulan" class="v_yayasan_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_yayasan_list->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_yayasan_list->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_yayasan_list->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_yayasan_list->tahun->Visible) { // tahun ?>
	<?php if ($v_yayasan_list->SortUrl($v_yayasan_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $v_yayasan_list->tahun->headerCellClass() ?>"><div id="elh_v_yayasan_tahun" class="v_yayasan_tahun"><div class="ew-table-header-caption"><?php echo $v_yayasan_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $v_yayasan_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_yayasan_list->SortUrl($v_yayasan_list->tahun) ?>', 1);"><div id="elh_v_yayasan_tahun" class="v_yayasan_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_yayasan_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_yayasan_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_yayasan_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_yayasan_list->m_id->Visible) { // m_id ?>
	<?php if ($v_yayasan_list->SortUrl($v_yayasan_list->m_id) == "") { ?>
		<th data-name="m_id" class="<?php echo $v_yayasan_list->m_id->headerCellClass() ?>"><div id="elh_v_yayasan_m_id" class="v_yayasan_m_id"><div class="ew-table-header-caption"><?php echo $v_yayasan_list->m_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="m_id" class="<?php echo $v_yayasan_list->m_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_yayasan_list->SortUrl($v_yayasan_list->m_id) ?>', 1);"><div id="elh_v_yayasan_m_id" class="v_yayasan_m_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_yayasan_list->m_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_yayasan_list->m_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_yayasan_list->m_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_yayasan_list->id_pegawai->Visible) { // id_pegawai ?>
	<?php if ($v_yayasan_list->SortUrl($v_yayasan_list->id_pegawai) == "") { ?>
		<th data-name="id_pegawai" class="<?php echo $v_yayasan_list->id_pegawai->headerCellClass() ?>"><div id="elh_v_yayasan_id_pegawai" class="v_yayasan_id_pegawai"><div class="ew-table-header-caption"><?php echo $v_yayasan_list->id_pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_pegawai" class="<?php echo $v_yayasan_list->id_pegawai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_yayasan_list->SortUrl($v_yayasan_list->id_pegawai) ?>', 1);"><div id="elh_v_yayasan_id_pegawai" class="v_yayasan_id_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_yayasan_list->id_pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_yayasan_list->id_pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_yayasan_list->id_pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_yayasan_list->gaji_pokok->Visible) { // gaji_pokok ?>
	<?php if ($v_yayasan_list->SortUrl($v_yayasan_list->gaji_pokok) == "") { ?>
		<th data-name="gaji_pokok" class="<?php echo $v_yayasan_list->gaji_pokok->headerCellClass() ?>"><div id="elh_v_yayasan_gaji_pokok" class="v_yayasan_gaji_pokok"><div class="ew-table-header-caption"><?php echo $v_yayasan_list->gaji_pokok->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gaji_pokok" class="<?php echo $v_yayasan_list->gaji_pokok->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_yayasan_list->SortUrl($v_yayasan_list->gaji_pokok) ?>', 1);"><div id="elh_v_yayasan_gaji_pokok" class="v_yayasan_gaji_pokok">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_yayasan_list->gaji_pokok->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_yayasan_list->gaji_pokok->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_yayasan_list->gaji_pokok->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_yayasan_list->potongan->Visible) { // potongan ?>
	<?php if ($v_yayasan_list->SortUrl($v_yayasan_list->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $v_yayasan_list->potongan->headerCellClass() ?>"><div id="elh_v_yayasan_potongan" class="v_yayasan_potongan"><div class="ew-table-header-caption"><?php echo $v_yayasan_list->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $v_yayasan_list->potongan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_yayasan_list->SortUrl($v_yayasan_list->potongan) ?>', 1);"><div id="elh_v_yayasan_potongan" class="v_yayasan_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_yayasan_list->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_yayasan_list->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_yayasan_list->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_yayasan_list->total->Visible) { // total ?>
	<?php if ($v_yayasan_list->SortUrl($v_yayasan_list->total) == "") { ?>
		<th data-name="total" class="<?php echo $v_yayasan_list->total->headerCellClass() ?>"><div id="elh_v_yayasan_total" class="v_yayasan_total"><div class="ew-table-header-caption"><?php echo $v_yayasan_list->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $v_yayasan_list->total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_yayasan_list->SortUrl($v_yayasan_list->total) ?>', 1);"><div id="elh_v_yayasan_total" class="v_yayasan_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_yayasan_list->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_yayasan_list->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_yayasan_list->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_yayasan_list->rekbank->Visible) { // rekbank ?>
	<?php if ($v_yayasan_list->SortUrl($v_yayasan_list->rekbank) == "") { ?>
		<th data-name="rekbank" class="<?php echo $v_yayasan_list->rekbank->headerCellClass() ?>"><div id="elh_v_yayasan_rekbank" class="v_yayasan_rekbank"><div class="ew-table-header-caption"><?php echo $v_yayasan_list->rekbank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rekbank" class="<?php echo $v_yayasan_list->rekbank->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_yayasan_list->SortUrl($v_yayasan_list->rekbank) ?>', 1);"><div id="elh_v_yayasan_rekbank" class="v_yayasan_rekbank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_yayasan_list->rekbank->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_yayasan_list->rekbank->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_yayasan_list->rekbank->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v_yayasan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v_yayasan_list->ExportAll && $v_yayasan_list->isExport()) {
	$v_yayasan_list->StopRecord = $v_yayasan_list->TotalRecords;
} else {

	// Set the last record to display
	if ($v_yayasan_list->TotalRecords > $v_yayasan_list->StartRecord + $v_yayasan_list->DisplayRecords - 1)
		$v_yayasan_list->StopRecord = $v_yayasan_list->StartRecord + $v_yayasan_list->DisplayRecords - 1;
	else
		$v_yayasan_list->StopRecord = $v_yayasan_list->TotalRecords;
}
$v_yayasan_list->RecordCount = $v_yayasan_list->StartRecord - 1;
if ($v_yayasan_list->Recordset && !$v_yayasan_list->Recordset->EOF) {
	$v_yayasan_list->Recordset->moveFirst();
	$selectLimit = $v_yayasan_list->UseSelectLimit;
	if (!$selectLimit && $v_yayasan_list->StartRecord > 1)
		$v_yayasan_list->Recordset->move($v_yayasan_list->StartRecord - 1);
} elseif (!$v_yayasan->AllowAddDeleteRow && $v_yayasan_list->StopRecord == 0) {
	$v_yayasan_list->StopRecord = $v_yayasan->GridAddRowCount;
}

// Initialize aggregate
$v_yayasan->RowType = ROWTYPE_AGGREGATEINIT;
$v_yayasan->resetAttributes();
$v_yayasan_list->renderRow();
while ($v_yayasan_list->RecordCount < $v_yayasan_list->StopRecord) {
	$v_yayasan_list->RecordCount++;
	if ($v_yayasan_list->RecordCount >= $v_yayasan_list->StartRecord) {
		$v_yayasan_list->RowCount++;

		// Set up key count
		$v_yayasan_list->KeyCount = $v_yayasan_list->RowIndex;

		// Init row class and style
		$v_yayasan->resetAttributes();
		$v_yayasan->CssClass = "";
		if ($v_yayasan_list->isGridAdd()) {
		} else {
			$v_yayasan_list->loadRowValues($v_yayasan_list->Recordset); // Load row values
		}
		$v_yayasan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v_yayasan->RowAttrs->merge(["data-rowindex" => $v_yayasan_list->RowCount, "id" => "r" . $v_yayasan_list->RowCount . "_v_yayasan", "data-rowtype" => $v_yayasan->RowType]);

		// Render row
		$v_yayasan_list->renderRow();

		// Render list options
		$v_yayasan_list->renderListOptions();
?>
	<tr <?php echo $v_yayasan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_yayasan_list->ListOptions->render("body", "left", $v_yayasan_list->RowCount);
?>
	<?php if ($v_yayasan_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $v_yayasan_list->id->cellAttributes() ?>>
<span id="el<?php echo $v_yayasan_list->RowCount ?>_v_yayasan_id">
<span<?php echo $v_yayasan_list->id->viewAttributes() ?>><?php echo $v_yayasan_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_yayasan_list->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $v_yayasan_list->bulan->cellAttributes() ?>>
<span id="el<?php echo $v_yayasan_list->RowCount ?>_v_yayasan_bulan">
<span<?php echo $v_yayasan_list->bulan->viewAttributes() ?>><?php echo $v_yayasan_list->bulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_yayasan_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $v_yayasan_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $v_yayasan_list->RowCount ?>_v_yayasan_tahun">
<span<?php echo $v_yayasan_list->tahun->viewAttributes() ?>><?php echo $v_yayasan_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_yayasan_list->m_id->Visible) { // m_id ?>
		<td data-name="m_id" <?php echo $v_yayasan_list->m_id->cellAttributes() ?>>
<span id="el<?php echo $v_yayasan_list->RowCount ?>_v_yayasan_m_id">
<span<?php echo $v_yayasan_list->m_id->viewAttributes() ?>><?php echo $v_yayasan_list->m_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_yayasan_list->id_pegawai->Visible) { // id_pegawai ?>
		<td data-name="id_pegawai" <?php echo $v_yayasan_list->id_pegawai->cellAttributes() ?>>
<span id="el<?php echo $v_yayasan_list->RowCount ?>_v_yayasan_id_pegawai">
<span<?php echo $v_yayasan_list->id_pegawai->viewAttributes() ?>><?php echo $v_yayasan_list->id_pegawai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_yayasan_list->gaji_pokok->Visible) { // gaji_pokok ?>
		<td data-name="gaji_pokok" <?php echo $v_yayasan_list->gaji_pokok->cellAttributes() ?>>
<span id="el<?php echo $v_yayasan_list->RowCount ?>_v_yayasan_gaji_pokok">
<span<?php echo $v_yayasan_list->gaji_pokok->viewAttributes() ?>><?php echo $v_yayasan_list->gaji_pokok->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_yayasan_list->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $v_yayasan_list->potongan->cellAttributes() ?>>
<span id="el<?php echo $v_yayasan_list->RowCount ?>_v_yayasan_potongan">
<span<?php echo $v_yayasan_list->potongan->viewAttributes() ?>><?php echo $v_yayasan_list->potongan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_yayasan_list->total->Visible) { // total ?>
		<td data-name="total" <?php echo $v_yayasan_list->total->cellAttributes() ?>>
<span id="el<?php echo $v_yayasan_list->RowCount ?>_v_yayasan_total">
<span<?php echo $v_yayasan_list->total->viewAttributes() ?>><?php echo $v_yayasan_list->total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_yayasan_list->rekbank->Visible) { // rekbank ?>
		<td data-name="rekbank" <?php echo $v_yayasan_list->rekbank->cellAttributes() ?>>
<span id="el<?php echo $v_yayasan_list->RowCount ?>_v_yayasan_rekbank">
<span<?php echo $v_yayasan_list->rekbank->viewAttributes() ?>><?php echo $v_yayasan_list->rekbank->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v_yayasan_list->ListOptions->render("body", "right", $v_yayasan_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$v_yayasan_list->isGridAdd())
		$v_yayasan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$v_yayasan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v_yayasan_list->Recordset)
	$v_yayasan_list->Recordset->Close();
?>
<?php if (!$v_yayasan_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v_yayasan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v_yayasan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_yayasan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v_yayasan_list->TotalRecords == 0 && !$v_yayasan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v_yayasan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v_yayasan_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$v_yayasan_list->isExport()) { ?>
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
$v_yayasan_list->terminate();
?>