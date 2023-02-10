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
$gaji_smk_list = new gaji_smk_list();

// Run the page
$gaji_smk_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_smk_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$gaji_smk_list->isExport()) { ?>
<script>
var fgaji_smklist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fgaji_smklist = currentForm = new ew.Form("fgaji_smklist", "list");
	fgaji_smklist.formKeyCountName = '<?php echo $gaji_smk_list->FormKeyCountName ?>';
	loadjs.done("fgaji_smklist");
});
var fgaji_smklistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fgaji_smklistsrch = currentSearchForm = new ew.Form("fgaji_smklistsrch");

	// Dynamic selection lists
	// Filters

	fgaji_smklistsrch.filterList = <?php echo $gaji_smk_list->getFilterList() ?>;
	loadjs.done("fgaji_smklistsrch");
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
<?php if (!$gaji_smk_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($gaji_smk_list->TotalRecords > 0 && $gaji_smk_list->ExportOptions->visible()) { ?>
<?php $gaji_smk_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_smk_list->ImportOptions->visible()) { ?>
<?php $gaji_smk_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_smk_list->SearchOptions->visible()) { ?>
<?php $gaji_smk_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_smk_list->FilterOptions->visible()) { ?>
<?php $gaji_smk_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$gaji_smk_list->isExport() || Config("EXPORT_MASTER_RECORD") && $gaji_smk_list->isExport("print")) { ?>
<?php
if ($gaji_smk_list->DbMasterFilter != "" && $gaji_smk->getCurrentMasterTable() == "m_smk") {
	if ($gaji_smk_list->MasterRecordExists) {
		include_once "m_smkmaster.php";
	}
}
?>
<?php } ?>
<?php
$gaji_smk_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$gaji_smk_list->isExport() && !$gaji_smk->CurrentAction) { ?>
<form name="fgaji_smklistsrch" id="fgaji_smklistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fgaji_smklistsrch-search-panel" class="<?php echo $gaji_smk_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="gaji_smk">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $gaji_smk_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($gaji_smk_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($gaji_smk_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $gaji_smk_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($gaji_smk_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($gaji_smk_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($gaji_smk_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($gaji_smk_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $gaji_smk_list->showPageHeader(); ?>
<?php
$gaji_smk_list->showMessage();
?>
<?php if ($gaji_smk_list->TotalRecords > 0 || $gaji_smk->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($gaji_smk_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> gaji_smk">
<?php if (!$gaji_smk_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$gaji_smk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $gaji_smk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $gaji_smk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fgaji_smklist" id="fgaji_smklist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="gaji_smk">
<?php if ($gaji_smk->getCurrentMasterTable() == "m_smk" && $gaji_smk->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="m_smk">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($gaji_smk_list->pid->getSessionValue()) ?>">
<input type="hidden" name="fk_tahun" value="<?php echo HtmlEncode($gaji_smk_list->tahun->getSessionValue()) ?>">
<input type="hidden" name="fk_bulan" value="<?php echo HtmlEncode($gaji_smk_list->bulan->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_gaji_smk" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($gaji_smk_list->TotalRecords > 0 || $gaji_smk_list->isGridEdit()) { ?>
<table id="tbl_gaji_smklist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$gaji_smk->RowType = ROWTYPE_HEADER;

// Render list options
$gaji_smk_list->renderListOptions();

// Render list options (header, left)
$gaji_smk_list->ListOptions->render("header", "left");
?>
<?php if ($gaji_smk_list->tahun->Visible) { // tahun ?>
	<?php if ($gaji_smk_list->SortUrl($gaji_smk_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $gaji_smk_list->tahun->headerCellClass() ?>"><div id="elh_gaji_smk_tahun" class="gaji_smk_tahun"><div class="ew-table-header-caption"><?php echo $gaji_smk_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $gaji_smk_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_smk_list->SortUrl($gaji_smk_list->tahun) ?>', 1);"><div id="elh_gaji_smk_tahun" class="gaji_smk_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_smk_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_smk_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_smk_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_smk_list->bulan->Visible) { // bulan ?>
	<?php if ($gaji_smk_list->SortUrl($gaji_smk_list->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $gaji_smk_list->bulan->headerCellClass() ?>"><div id="elh_gaji_smk_bulan" class="gaji_smk_bulan"><div class="ew-table-header-caption"><?php echo $gaji_smk_list->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $gaji_smk_list->bulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_smk_list->SortUrl($gaji_smk_list->bulan) ?>', 1);"><div id="elh_gaji_smk_bulan" class="gaji_smk_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_smk_list->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_smk_list->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_smk_list->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_smk_list->pegawai->Visible) { // pegawai ?>
	<?php if ($gaji_smk_list->SortUrl($gaji_smk_list->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $gaji_smk_list->pegawai->headerCellClass() ?>"><div id="elh_gaji_smk_pegawai" class="gaji_smk_pegawai"><div class="ew-table-header-caption"><?php echo $gaji_smk_list->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $gaji_smk_list->pegawai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_smk_list->SortUrl($gaji_smk_list->pegawai) ?>', 1);"><div id="elh_gaji_smk_pegawai" class="gaji_smk_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_smk_list->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_smk_list->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_smk_list->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_smk_list->sub_total->Visible) { // sub_total ?>
	<?php if ($gaji_smk_list->SortUrl($gaji_smk_list->sub_total) == "") { ?>
		<th data-name="sub_total" class="<?php echo $gaji_smk_list->sub_total->headerCellClass() ?>"><div id="elh_gaji_smk_sub_total" class="gaji_smk_sub_total"><div class="ew-table-header-caption"><?php echo $gaji_smk_list->sub_total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sub_total" class="<?php echo $gaji_smk_list->sub_total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_smk_list->SortUrl($gaji_smk_list->sub_total) ?>', 1);"><div id="elh_gaji_smk_sub_total" class="gaji_smk_sub_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_smk_list->sub_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_smk_list->sub_total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_smk_list->sub_total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_smk_list->potongan->Visible) { // potongan ?>
	<?php if ($gaji_smk_list->SortUrl($gaji_smk_list->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $gaji_smk_list->potongan->headerCellClass() ?>"><div id="elh_gaji_smk_potongan" class="gaji_smk_potongan"><div class="ew-table-header-caption"><?php echo $gaji_smk_list->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $gaji_smk_list->potongan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_smk_list->SortUrl($gaji_smk_list->potongan) ?>', 1);"><div id="elh_gaji_smk_potongan" class="gaji_smk_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_smk_list->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_smk_list->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_smk_list->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_smk_list->penyesuaian->Visible) { // penyesuaian ?>
	<?php if ($gaji_smk_list->SortUrl($gaji_smk_list->penyesuaian) == "") { ?>
		<th data-name="penyesuaian" class="<?php echo $gaji_smk_list->penyesuaian->headerCellClass() ?>"><div id="elh_gaji_smk_penyesuaian" class="gaji_smk_penyesuaian"><div class="ew-table-header-caption"><?php echo $gaji_smk_list->penyesuaian->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="penyesuaian" class="<?php echo $gaji_smk_list->penyesuaian->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_smk_list->SortUrl($gaji_smk_list->penyesuaian) ?>', 1);"><div id="elh_gaji_smk_penyesuaian" class="gaji_smk_penyesuaian">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_smk_list->penyesuaian->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_smk_list->penyesuaian->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_smk_list->penyesuaian->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_smk_list->potongan_bendahara->Visible) { // potongan_bendahara ?>
	<?php if ($gaji_smk_list->SortUrl($gaji_smk_list->potongan_bendahara) == "") { ?>
		<th data-name="potongan_bendahara" class="<?php echo $gaji_smk_list->potongan_bendahara->headerCellClass() ?>"><div id="elh_gaji_smk_potongan_bendahara" class="gaji_smk_potongan_bendahara"><div class="ew-table-header-caption"><?php echo $gaji_smk_list->potongan_bendahara->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan_bendahara" class="<?php echo $gaji_smk_list->potongan_bendahara->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_smk_list->SortUrl($gaji_smk_list->potongan_bendahara) ?>', 1);"><div id="elh_gaji_smk_potongan_bendahara" class="gaji_smk_potongan_bendahara">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_smk_list->potongan_bendahara->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($gaji_smk_list->potongan_bendahara->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_smk_list->potongan_bendahara->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_smk_list->total->Visible) { // total ?>
	<?php if ($gaji_smk_list->SortUrl($gaji_smk_list->total) == "") { ?>
		<th data-name="total" class="<?php echo $gaji_smk_list->total->headerCellClass() ?>"><div id="elh_gaji_smk_total" class="gaji_smk_total"><div class="ew-table-header-caption"><?php echo $gaji_smk_list->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $gaji_smk_list->total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_smk_list->SortUrl($gaji_smk_list->total) ?>', 1);"><div id="elh_gaji_smk_total" class="gaji_smk_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_smk_list->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_smk_list->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_smk_list->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_smk_list->voucher->Visible) { // voucher ?>
	<?php if ($gaji_smk_list->SortUrl($gaji_smk_list->voucher) == "") { ?>
		<th data-name="voucher" class="<?php echo $gaji_smk_list->voucher->headerCellClass() ?>"><div id="elh_gaji_smk_voucher" class="gaji_smk_voucher"><div class="ew-table-header-caption"><?php echo $gaji_smk_list->voucher->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher" class="<?php echo $gaji_smk_list->voucher->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_smk_list->SortUrl($gaji_smk_list->voucher) ?>', 1);"><div id="elh_gaji_smk_voucher" class="gaji_smk_voucher">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_smk_list->voucher->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_smk_list->voucher->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_smk_list->voucher->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$gaji_smk_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($gaji_smk_list->ExportAll && $gaji_smk_list->isExport()) {
	$gaji_smk_list->StopRecord = $gaji_smk_list->TotalRecords;
} else {

	// Set the last record to display
	if ($gaji_smk_list->TotalRecords > $gaji_smk_list->StartRecord + $gaji_smk_list->DisplayRecords - 1)
		$gaji_smk_list->StopRecord = $gaji_smk_list->StartRecord + $gaji_smk_list->DisplayRecords - 1;
	else
		$gaji_smk_list->StopRecord = $gaji_smk_list->TotalRecords;
}
$gaji_smk_list->RecordCount = $gaji_smk_list->StartRecord - 1;
if ($gaji_smk_list->Recordset && !$gaji_smk_list->Recordset->EOF) {
	$gaji_smk_list->Recordset->moveFirst();
	$selectLimit = $gaji_smk_list->UseSelectLimit;
	if (!$selectLimit && $gaji_smk_list->StartRecord > 1)
		$gaji_smk_list->Recordset->move($gaji_smk_list->StartRecord - 1);
} elseif (!$gaji_smk->AllowAddDeleteRow && $gaji_smk_list->StopRecord == 0) {
	$gaji_smk_list->StopRecord = $gaji_smk->GridAddRowCount;
}

// Initialize aggregate
$gaji_smk->RowType = ROWTYPE_AGGREGATEINIT;
$gaji_smk->resetAttributes();
$gaji_smk_list->renderRow();
while ($gaji_smk_list->RecordCount < $gaji_smk_list->StopRecord) {
	$gaji_smk_list->RecordCount++;
	if ($gaji_smk_list->RecordCount >= $gaji_smk_list->StartRecord) {
		$gaji_smk_list->RowCount++;

		// Set up key count
		$gaji_smk_list->KeyCount = $gaji_smk_list->RowIndex;

		// Init row class and style
		$gaji_smk->resetAttributes();
		$gaji_smk->CssClass = "";
		if ($gaji_smk_list->isGridAdd()) {
		} else {
			$gaji_smk_list->loadRowValues($gaji_smk_list->Recordset); // Load row values
		}
		$gaji_smk->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$gaji_smk->RowAttrs->merge(["data-rowindex" => $gaji_smk_list->RowCount, "id" => "r" . $gaji_smk_list->RowCount . "_gaji_smk", "data-rowtype" => $gaji_smk->RowType]);

		// Render row
		$gaji_smk_list->renderRow();

		// Render list options
		$gaji_smk_list->renderListOptions();
?>
	<tr <?php echo $gaji_smk->rowAttributes() ?>>
<?php

// Render list options (body, left)
$gaji_smk_list->ListOptions->render("body", "left", $gaji_smk_list->RowCount);
?>
	<?php if ($gaji_smk_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $gaji_smk_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $gaji_smk_list->RowCount ?>_gaji_smk_tahun">
<span<?php echo $gaji_smk_list->tahun->viewAttributes() ?>><?php echo $gaji_smk_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_smk_list->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $gaji_smk_list->bulan->cellAttributes() ?>>
<span id="el<?php echo $gaji_smk_list->RowCount ?>_gaji_smk_bulan">
<span<?php echo $gaji_smk_list->bulan->viewAttributes() ?>><?php echo $gaji_smk_list->bulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_smk_list->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $gaji_smk_list->pegawai->cellAttributes() ?>>
<span id="el<?php echo $gaji_smk_list->RowCount ?>_gaji_smk_pegawai">
<span<?php echo $gaji_smk_list->pegawai->viewAttributes() ?>><?php echo $gaji_smk_list->pegawai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_smk_list->sub_total->Visible) { // sub_total ?>
		<td data-name="sub_total" <?php echo $gaji_smk_list->sub_total->cellAttributes() ?>>
<span id="el<?php echo $gaji_smk_list->RowCount ?>_gaji_smk_sub_total">
<span<?php echo $gaji_smk_list->sub_total->viewAttributes() ?>><?php echo $gaji_smk_list->sub_total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_smk_list->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $gaji_smk_list->potongan->cellAttributes() ?>>
<span id="el<?php echo $gaji_smk_list->RowCount ?>_gaji_smk_potongan">
<span<?php echo $gaji_smk_list->potongan->viewAttributes() ?>><?php echo $gaji_smk_list->potongan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_smk_list->penyesuaian->Visible) { // penyesuaian ?>
		<td data-name="penyesuaian" <?php echo $gaji_smk_list->penyesuaian->cellAttributes() ?>>
<span id="el<?php echo $gaji_smk_list->RowCount ?>_gaji_smk_penyesuaian">
<span<?php echo $gaji_smk_list->penyesuaian->viewAttributes() ?>><?php echo $gaji_smk_list->penyesuaian->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_smk_list->potongan_bendahara->Visible) { // potongan_bendahara ?>
		<td data-name="potongan_bendahara" <?php echo $gaji_smk_list->potongan_bendahara->cellAttributes() ?>>
<span id="el<?php echo $gaji_smk_list->RowCount ?>_gaji_smk_potongan_bendahara">
<span<?php echo $gaji_smk_list->potongan_bendahara->viewAttributes() ?>><?php echo $gaji_smk_list->potongan_bendahara->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_smk_list->total->Visible) { // total ?>
		<td data-name="total" <?php echo $gaji_smk_list->total->cellAttributes() ?>>
<span id="el<?php echo $gaji_smk_list->RowCount ?>_gaji_smk_total">
<span<?php echo $gaji_smk_list->total->viewAttributes() ?>><?php echo $gaji_smk_list->total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_smk_list->voucher->Visible) { // voucher ?>
		<td data-name="voucher" <?php echo $gaji_smk_list->voucher->cellAttributes() ?>>
<span id="el<?php echo $gaji_smk_list->RowCount ?>_gaji_smk_voucher">
<span<?php echo $gaji_smk_list->voucher->viewAttributes() ?>><?php echo $gaji_smk_list->voucher->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$gaji_smk_list->ListOptions->render("body", "right", $gaji_smk_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$gaji_smk_list->isGridAdd())
		$gaji_smk_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$gaji_smk->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($gaji_smk_list->Recordset)
	$gaji_smk_list->Recordset->Close();
?>
<?php if (!$gaji_smk_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$gaji_smk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $gaji_smk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $gaji_smk_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($gaji_smk_list->TotalRecords == 0 && !$gaji_smk->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $gaji_smk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$gaji_smk_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$gaji_smk_list->isExport()) { ?>
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
$gaji_smk_list->terminate();
?>