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
$hapus_barangnew_list = new hapus_barangnew_list();

// Run the page
$hapus_barangnew_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hapus_barangnew_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$hapus_barangnew_list->isExport()) { ?>
<script>
var fhapus_barangnewlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fhapus_barangnewlist = currentForm = new ew.Form("fhapus_barangnewlist", "list");
	fhapus_barangnewlist.formKeyCountName = '<?php echo $hapus_barangnew_list->FormKeyCountName ?>';
	loadjs.done("fhapus_barangnewlist");
});
var fhapus_barangnewlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fhapus_barangnewlistsrch = currentSearchForm = new ew.Form("fhapus_barangnewlistsrch");

	// Dynamic selection lists
	// Filters

	fhapus_barangnewlistsrch.filterList = <?php echo $hapus_barangnew_list->getFilterList() ?>;
	loadjs.done("fhapus_barangnewlistsrch");
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
	ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
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
<?php if (!$hapus_barangnew_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hapus_barangnew_list->TotalRecords > 0 && $hapus_barangnew_list->ExportOptions->visible()) { ?>
<?php $hapus_barangnew_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hapus_barangnew_list->ImportOptions->visible()) { ?>
<?php $hapus_barangnew_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hapus_barangnew_list->SearchOptions->visible()) { ?>
<?php $hapus_barangnew_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hapus_barangnew_list->FilterOptions->visible()) { ?>
<?php $hapus_barangnew_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hapus_barangnew_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hapus_barangnew_list->isExport() && !$hapus_barangnew->CurrentAction) { ?>
<form name="fhapus_barangnewlistsrch" id="fhapus_barangnewlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fhapus_barangnewlistsrch-search-panel" class="<?php echo $hapus_barangnew_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hapus_barangnew">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $hapus_barangnew_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($hapus_barangnew_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($hapus_barangnew_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hapus_barangnew_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hapus_barangnew_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hapus_barangnew_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hapus_barangnew_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hapus_barangnew_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $hapus_barangnew_list->showPageHeader(); ?>
<?php
$hapus_barangnew_list->showMessage();
?>
<?php if ($hapus_barangnew_list->TotalRecords > 0 || $hapus_barangnew->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hapus_barangnew_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hapus_barangnew">
<?php if (!$hapus_barangnew_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hapus_barangnew_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $hapus_barangnew_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hapus_barangnew_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhapus_barangnewlist" id="fhapus_barangnewlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hapus_barangnew">
<div id="gmp_hapus_barangnew" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($hapus_barangnew_list->TotalRecords > 0 || $hapus_barangnew_list->isGridEdit()) { ?>
<table id="tbl_hapus_barangnewlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hapus_barangnew->RowType = ROWTYPE_HEADER;

// Render list options
$hapus_barangnew_list->renderListOptions();

// Render list options (header, left)
$hapus_barangnew_list->ListOptions->render("header", "left");
?>
<?php if ($hapus_barangnew_list->id_hapus->Visible) { // id_hapus ?>
	<?php if ($hapus_barangnew_list->SortUrl($hapus_barangnew_list->id_hapus) == "") { ?>
		<th data-name="id_hapus" class="<?php echo $hapus_barangnew_list->id_hapus->headerCellClass() ?>"><div id="elh_hapus_barangnew_id_hapus" class="hapus_barangnew_id_hapus"><div class="ew-table-header-caption"><?php echo $hapus_barangnew_list->id_hapus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_hapus" class="<?php echo $hapus_barangnew_list->id_hapus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hapus_barangnew_list->SortUrl($hapus_barangnew_list->id_hapus) ?>', 1);"><div id="elh_hapus_barangnew_id_hapus" class="hapus_barangnew_id_hapus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hapus_barangnew_list->id_hapus->caption() ?></span><span class="ew-table-header-sort"><?php if ($hapus_barangnew_list->id_hapus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hapus_barangnew_list->id_hapus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hapus_barangnew_list->kode_barang->Visible) { // kode_barang ?>
	<?php if ($hapus_barangnew_list->SortUrl($hapus_barangnew_list->kode_barang) == "") { ?>
		<th data-name="kode_barang" class="<?php echo $hapus_barangnew_list->kode_barang->headerCellClass() ?>"><div id="elh_hapus_barangnew_kode_barang" class="hapus_barangnew_kode_barang"><div class="ew-table-header-caption"><?php echo $hapus_barangnew_list->kode_barang->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode_barang" class="<?php echo $hapus_barangnew_list->kode_barang->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hapus_barangnew_list->SortUrl($hapus_barangnew_list->kode_barang) ?>', 1);"><div id="elh_hapus_barangnew_kode_barang" class="hapus_barangnew_kode_barang">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hapus_barangnew_list->kode_barang->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hapus_barangnew_list->kode_barang->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hapus_barangnew_list->kode_barang->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hapus_barangnew_list->nama_barang->Visible) { // nama_barang ?>
	<?php if ($hapus_barangnew_list->SortUrl($hapus_barangnew_list->nama_barang) == "") { ?>
		<th data-name="nama_barang" class="<?php echo $hapus_barangnew_list->nama_barang->headerCellClass() ?>"><div id="elh_hapus_barangnew_nama_barang" class="hapus_barangnew_nama_barang"><div class="ew-table-header-caption"><?php echo $hapus_barangnew_list->nama_barang->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama_barang" class="<?php echo $hapus_barangnew_list->nama_barang->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hapus_barangnew_list->SortUrl($hapus_barangnew_list->nama_barang) ?>', 1);"><div id="elh_hapus_barangnew_nama_barang" class="hapus_barangnew_nama_barang">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hapus_barangnew_list->nama_barang->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hapus_barangnew_list->nama_barang->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hapus_barangnew_list->nama_barang->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hapus_barangnew_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hapus_barangnew_list->ExportAll && $hapus_barangnew_list->isExport()) {
	$hapus_barangnew_list->StopRecord = $hapus_barangnew_list->TotalRecords;
} else {

	// Set the last record to display
	if ($hapus_barangnew_list->TotalRecords > $hapus_barangnew_list->StartRecord + $hapus_barangnew_list->DisplayRecords - 1)
		$hapus_barangnew_list->StopRecord = $hapus_barangnew_list->StartRecord + $hapus_barangnew_list->DisplayRecords - 1;
	else
		$hapus_barangnew_list->StopRecord = $hapus_barangnew_list->TotalRecords;
}
$hapus_barangnew_list->RecordCount = $hapus_barangnew_list->StartRecord - 1;
if ($hapus_barangnew_list->Recordset && !$hapus_barangnew_list->Recordset->EOF) {
	$hapus_barangnew_list->Recordset->moveFirst();
	$selectLimit = $hapus_barangnew_list->UseSelectLimit;
	if (!$selectLimit && $hapus_barangnew_list->StartRecord > 1)
		$hapus_barangnew_list->Recordset->move($hapus_barangnew_list->StartRecord - 1);
} elseif (!$hapus_barangnew->AllowAddDeleteRow && $hapus_barangnew_list->StopRecord == 0) {
	$hapus_barangnew_list->StopRecord = $hapus_barangnew->GridAddRowCount;
}

// Initialize aggregate
$hapus_barangnew->RowType = ROWTYPE_AGGREGATEINIT;
$hapus_barangnew->resetAttributes();
$hapus_barangnew_list->renderRow();
while ($hapus_barangnew_list->RecordCount < $hapus_barangnew_list->StopRecord) {
	$hapus_barangnew_list->RecordCount++;
	if ($hapus_barangnew_list->RecordCount >= $hapus_barangnew_list->StartRecord) {
		$hapus_barangnew_list->RowCount++;

		// Set up key count
		$hapus_barangnew_list->KeyCount = $hapus_barangnew_list->RowIndex;

		// Init row class and style
		$hapus_barangnew->resetAttributes();
		$hapus_barangnew->CssClass = "";
		if ($hapus_barangnew_list->isGridAdd()) {
		} else {
			$hapus_barangnew_list->loadRowValues($hapus_barangnew_list->Recordset); // Load row values
		}
		$hapus_barangnew->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hapus_barangnew->RowAttrs->merge(["data-rowindex" => $hapus_barangnew_list->RowCount, "id" => "r" . $hapus_barangnew_list->RowCount . "_hapus_barangnew", "data-rowtype" => $hapus_barangnew->RowType]);

		// Render row
		$hapus_barangnew_list->renderRow();

		// Render list options
		$hapus_barangnew_list->renderListOptions();
?>
	<tr <?php echo $hapus_barangnew->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hapus_barangnew_list->ListOptions->render("body", "left", $hapus_barangnew_list->RowCount);
?>
	<?php if ($hapus_barangnew_list->id_hapus->Visible) { // id_hapus ?>
		<td data-name="id_hapus" <?php echo $hapus_barangnew_list->id_hapus->cellAttributes() ?>>
<span id="el<?php echo $hapus_barangnew_list->RowCount ?>_hapus_barangnew_id_hapus">
<span<?php echo $hapus_barangnew_list->id_hapus->viewAttributes() ?>><?php echo $hapus_barangnew_list->id_hapus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hapus_barangnew_list->kode_barang->Visible) { // kode_barang ?>
		<td data-name="kode_barang" <?php echo $hapus_barangnew_list->kode_barang->cellAttributes() ?>>
<span id="el<?php echo $hapus_barangnew_list->RowCount ?>_hapus_barangnew_kode_barang">
<span<?php echo $hapus_barangnew_list->kode_barang->viewAttributes() ?>><?php echo $hapus_barangnew_list->kode_barang->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hapus_barangnew_list->nama_barang->Visible) { // nama_barang ?>
		<td data-name="nama_barang" <?php echo $hapus_barangnew_list->nama_barang->cellAttributes() ?>>
<span id="el<?php echo $hapus_barangnew_list->RowCount ?>_hapus_barangnew_nama_barang">
<span<?php echo $hapus_barangnew_list->nama_barang->viewAttributes() ?>><?php echo $hapus_barangnew_list->nama_barang->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hapus_barangnew_list->ListOptions->render("body", "right", $hapus_barangnew_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$hapus_barangnew_list->isGridAdd())
		$hapus_barangnew_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$hapus_barangnew->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hapus_barangnew_list->Recordset)
	$hapus_barangnew_list->Recordset->Close();
?>
<?php if (!$hapus_barangnew_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hapus_barangnew_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $hapus_barangnew_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hapus_barangnew_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hapus_barangnew_list->TotalRecords == 0 && !$hapus_barangnew->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hapus_barangnew_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hapus_barangnew_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$hapus_barangnew_list->isExport()) { ?>
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
$hapus_barangnew_list->terminate();
?>