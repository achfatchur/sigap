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
$gaji_list = new gaji_list();

// Run the page
$gaji_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$gaji_list->isExport()) { ?>
<script>
var fgajilist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fgajilist = currentForm = new ew.Form("fgajilist", "list");
	fgajilist.formKeyCountName = '<?php echo $gaji_list->FormKeyCountName ?>';
	loadjs.done("fgajilist");
});
var fgajilistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fgajilistsrch = currentSearchForm = new ew.Form("fgajilistsrch");

	// Dynamic selection lists
	// Filters

	fgajilistsrch.filterList = <?php echo $gaji_list->getFilterList() ?>;
	loadjs.done("fgajilistsrch");
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
<?php if (!$gaji_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($gaji_list->TotalRecords > 0 && $gaji_list->ExportOptions->visible()) { ?>
<?php $gaji_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_list->ImportOptions->visible()) { ?>
<?php $gaji_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_list->SearchOptions->visible()) { ?>
<?php $gaji_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_list->FilterOptions->visible()) { ?>
<?php $gaji_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$gaji_list->isExport() || Config("EXPORT_MASTER_RECORD") && $gaji_list->isExport("print")) { ?>
<?php
if ($gaji_list->DbMasterFilter != "" && $gaji->getCurrentMasterTable() == "m_sd") {
	if ($gaji_list->MasterRecordExists) {
		include_once "m_sdmaster.php";
	}
}
?>
<?php } ?>
<?php
$gaji_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$gaji_list->isExport() && !$gaji->CurrentAction) { ?>
<form name="fgajilistsrch" id="fgajilistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fgajilistsrch-search-panel" class="<?php echo $gaji_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="gaji">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $gaji_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($gaji_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($gaji_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $gaji_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($gaji_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($gaji_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($gaji_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($gaji_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $gaji_list->showPageHeader(); ?>
<?php
$gaji_list->showMessage();
?>
<?php if ($gaji_list->TotalRecords > 0 || $gaji->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($gaji_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> gaji">
<?php if (!$gaji_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$gaji_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $gaji_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $gaji_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fgajilist" id="fgajilist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="gaji">
<?php if ($gaji->getCurrentMasterTable() == "m_sd" && $gaji->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="m_sd">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($gaji_list->pid->getSessionValue()) ?>">
<input type="hidden" name="fk_tahun" value="<?php echo HtmlEncode($gaji_list->tahun->getSessionValue()) ?>">
<input type="hidden" name="fk_bulan" value="<?php echo HtmlEncode($gaji_list->bulan->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_gaji" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($gaji_list->TotalRecords > 0 || $gaji_list->isGridEdit()) { ?>
<table id="tbl_gajilist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$gaji->RowType = ROWTYPE_HEADER;

// Render list options
$gaji_list->renderListOptions();

// Render list options (header, left)
$gaji_list->ListOptions->render("header", "left");
?>
<?php if ($gaji_list->pegawai->Visible) { // pegawai ?>
	<?php if ($gaji_list->SortUrl($gaji_list->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $gaji_list->pegawai->headerCellClass() ?>"><div id="elh_gaji_pegawai" class="gaji_pegawai"><div class="ew-table-header-caption"><?php echo $gaji_list->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $gaji_list->pegawai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_list->SortUrl($gaji_list->pegawai) ?>', 1);"><div id="elh_gaji_pegawai" class="gaji_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_list->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_list->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_list->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_list->sub_total->Visible) { // sub_total ?>
	<?php if ($gaji_list->SortUrl($gaji_list->sub_total) == "") { ?>
		<th data-name="sub_total" class="<?php echo $gaji_list->sub_total->headerCellClass() ?>"><div id="elh_gaji_sub_total" class="gaji_sub_total"><div class="ew-table-header-caption"><?php echo $gaji_list->sub_total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sub_total" class="<?php echo $gaji_list->sub_total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_list->SortUrl($gaji_list->sub_total) ?>', 1);"><div id="elh_gaji_sub_total" class="gaji_sub_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_list->sub_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_list->sub_total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_list->sub_total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_list->potongan->Visible) { // potongan ?>
	<?php if ($gaji_list->SortUrl($gaji_list->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $gaji_list->potongan->headerCellClass() ?>"><div id="elh_gaji_potongan" class="gaji_potongan"><div class="ew-table-header-caption"><?php echo $gaji_list->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $gaji_list->potongan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_list->SortUrl($gaji_list->potongan) ?>', 1);"><div id="elh_gaji_potongan" class="gaji_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_list->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_list->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_list->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_list->penyesuaian->Visible) { // penyesuaian ?>
	<?php if ($gaji_list->SortUrl($gaji_list->penyesuaian) == "") { ?>
		<th data-name="penyesuaian" class="<?php echo $gaji_list->penyesuaian->headerCellClass() ?>"><div id="elh_gaji_penyesuaian" class="gaji_penyesuaian"><div class="ew-table-header-caption"><?php echo $gaji_list->penyesuaian->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="penyesuaian" class="<?php echo $gaji_list->penyesuaian->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_list->SortUrl($gaji_list->penyesuaian) ?>', 1);"><div id="elh_gaji_penyesuaian" class="gaji_penyesuaian">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_list->penyesuaian->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_list->penyesuaian->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_list->penyesuaian->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_list->total->Visible) { // total ?>
	<?php if ($gaji_list->SortUrl($gaji_list->total) == "") { ?>
		<th data-name="total" class="<?php echo $gaji_list->total->headerCellClass() ?>"><div id="elh_gaji_total" class="gaji_total"><div class="ew-table-header-caption"><?php echo $gaji_list->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $gaji_list->total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_list->SortUrl($gaji_list->total) ?>', 1);"><div id="elh_gaji_total" class="gaji_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_list->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_list->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_list->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_list->voucher->Visible) { // voucher ?>
	<?php if ($gaji_list->SortUrl($gaji_list->voucher) == "") { ?>
		<th data-name="voucher" class="<?php echo $gaji_list->voucher->headerCellClass() ?>"><div id="elh_gaji_voucher" class="gaji_voucher"><div class="ew-table-header-caption"><?php echo $gaji_list->voucher->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher" class="<?php echo $gaji_list->voucher->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_list->SortUrl($gaji_list->voucher) ?>', 1);"><div id="elh_gaji_voucher" class="gaji_voucher">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_list->voucher->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_list->voucher->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_list->voucher->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$gaji_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($gaji_list->ExportAll && $gaji_list->isExport()) {
	$gaji_list->StopRecord = $gaji_list->TotalRecords;
} else {

	// Set the last record to display
	if ($gaji_list->TotalRecords > $gaji_list->StartRecord + $gaji_list->DisplayRecords - 1)
		$gaji_list->StopRecord = $gaji_list->StartRecord + $gaji_list->DisplayRecords - 1;
	else
		$gaji_list->StopRecord = $gaji_list->TotalRecords;
}
$gaji_list->RecordCount = $gaji_list->StartRecord - 1;
if ($gaji_list->Recordset && !$gaji_list->Recordset->EOF) {
	$gaji_list->Recordset->moveFirst();
	$selectLimit = $gaji_list->UseSelectLimit;
	if (!$selectLimit && $gaji_list->StartRecord > 1)
		$gaji_list->Recordset->move($gaji_list->StartRecord - 1);
} elseif (!$gaji->AllowAddDeleteRow && $gaji_list->StopRecord == 0) {
	$gaji_list->StopRecord = $gaji->GridAddRowCount;
}

// Initialize aggregate
$gaji->RowType = ROWTYPE_AGGREGATEINIT;
$gaji->resetAttributes();
$gaji_list->renderRow();
while ($gaji_list->RecordCount < $gaji_list->StopRecord) {
	$gaji_list->RecordCount++;
	if ($gaji_list->RecordCount >= $gaji_list->StartRecord) {
		$gaji_list->RowCount++;

		// Set up key count
		$gaji_list->KeyCount = $gaji_list->RowIndex;

		// Init row class and style
		$gaji->resetAttributes();
		$gaji->CssClass = "";
		if ($gaji_list->isGridAdd()) {
		} else {
			$gaji_list->loadRowValues($gaji_list->Recordset); // Load row values
		}
		$gaji->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$gaji->RowAttrs->merge(["data-rowindex" => $gaji_list->RowCount, "id" => "r" . $gaji_list->RowCount . "_gaji", "data-rowtype" => $gaji->RowType]);

		// Render row
		$gaji_list->renderRow();

		// Render list options
		$gaji_list->renderListOptions();
?>
	<tr <?php echo $gaji->rowAttributes() ?>>
<?php

// Render list options (body, left)
$gaji_list->ListOptions->render("body", "left", $gaji_list->RowCount);
?>
	<?php if ($gaji_list->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $gaji_list->pegawai->cellAttributes() ?>>
<span id="el<?php echo $gaji_list->RowCount ?>_gaji_pegawai">
<span<?php echo $gaji_list->pegawai->viewAttributes() ?>><?php echo $gaji_list->pegawai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_list->sub_total->Visible) { // sub_total ?>
		<td data-name="sub_total" <?php echo $gaji_list->sub_total->cellAttributes() ?>>
<span id="el<?php echo $gaji_list->RowCount ?>_gaji_sub_total">
<span<?php echo $gaji_list->sub_total->viewAttributes() ?>><?php echo $gaji_list->sub_total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_list->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $gaji_list->potongan->cellAttributes() ?>>
<span id="el<?php echo $gaji_list->RowCount ?>_gaji_potongan">
<span<?php echo $gaji_list->potongan->viewAttributes() ?>><?php echo $gaji_list->potongan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_list->penyesuaian->Visible) { // penyesuaian ?>
		<td data-name="penyesuaian" <?php echo $gaji_list->penyesuaian->cellAttributes() ?>>
<span id="el<?php echo $gaji_list->RowCount ?>_gaji_penyesuaian">
<span<?php echo $gaji_list->penyesuaian->viewAttributes() ?>><?php echo $gaji_list->penyesuaian->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_list->total->Visible) { // total ?>
		<td data-name="total" <?php echo $gaji_list->total->cellAttributes() ?>>
<span id="el<?php echo $gaji_list->RowCount ?>_gaji_total">
<span<?php echo $gaji_list->total->viewAttributes() ?>><?php echo $gaji_list->total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_list->voucher->Visible) { // voucher ?>
		<td data-name="voucher" <?php echo $gaji_list->voucher->cellAttributes() ?>>
<span id="el<?php echo $gaji_list->RowCount ?>_gaji_voucher">
<span<?php echo $gaji_list->voucher->viewAttributes() ?>><?php echo $gaji_list->voucher->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$gaji_list->ListOptions->render("body", "right", $gaji_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$gaji_list->isGridAdd())
		$gaji_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$gaji->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($gaji_list->Recordset)
	$gaji_list->Recordset->Close();
?>
<?php if (!$gaji_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$gaji_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $gaji_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $gaji_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($gaji_list->TotalRecords == 0 && !$gaji->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $gaji_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$gaji_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$gaji_list->isExport()) { ?>
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
$gaji_list->terminate();
?>