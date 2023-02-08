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
$barangnew_list = new barangnew_list();

// Run the page
$barangnew_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$barangnew_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$barangnew_list->isExport()) { ?>
<script>
var fbarangnewlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbarangnewlist = currentForm = new ew.Form("fbarangnewlist", "list");
	fbarangnewlist.formKeyCountName = '<?php echo $barangnew_list->FormKeyCountName ?>';
	loadjs.done("fbarangnewlist");
});
var fbarangnewlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbarangnewlistsrch = currentSearchForm = new ew.Form("fbarangnewlistsrch");

	// Dynamic selection lists
	// Filters

	fbarangnewlistsrch.filterList = <?php echo $barangnew_list->getFilterList() ?>;
	loadjs.done("fbarangnewlistsrch");
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
<?php if (!$barangnew_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($barangnew_list->TotalRecords > 0 && $barangnew_list->ExportOptions->visible()) { ?>
<?php $barangnew_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($barangnew_list->ImportOptions->visible()) { ?>
<?php $barangnew_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($barangnew_list->SearchOptions->visible()) { ?>
<?php $barangnew_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($barangnew_list->FilterOptions->visible()) { ?>
<?php $barangnew_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$barangnew_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$barangnew_list->isExport() && !$barangnew->CurrentAction) { ?>
<form name="fbarangnewlistsrch" id="fbarangnewlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbarangnewlistsrch-search-panel" class="<?php echo $barangnew_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="barangnew">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $barangnew_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($barangnew_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($barangnew_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $barangnew_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($barangnew_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($barangnew_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($barangnew_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($barangnew_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $barangnew_list->showPageHeader(); ?>
<?php
$barangnew_list->showMessage();
?>
<?php if ($barangnew_list->TotalRecords > 0 || $barangnew->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($barangnew_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> barangnew">
<?php if (!$barangnew_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$barangnew_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $barangnew_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $barangnew_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbarangnewlist" id="fbarangnewlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="barangnew">
<div id="gmp_barangnew" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($barangnew_list->TotalRecords > 0 || $barangnew_list->isGridEdit()) { ?>
<table id="tbl_barangnewlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$barangnew->RowType = ROWTYPE_HEADER;

// Render list options
$barangnew_list->renderListOptions();

// Render list options (header, left)
$barangnew_list->ListOptions->render("header", "left");
?>
<?php if ($barangnew_list->kode_barang->Visible) { // kode_barang ?>
	<?php if ($barangnew_list->SortUrl($barangnew_list->kode_barang) == "") { ?>
		<th data-name="kode_barang" class="<?php echo $barangnew_list->kode_barang->headerCellClass() ?>"><div id="elh_barangnew_kode_barang" class="barangnew_kode_barang"><div class="ew-table-header-caption"><?php echo $barangnew_list->kode_barang->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode_barang" class="<?php echo $barangnew_list->kode_barang->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $barangnew_list->SortUrl($barangnew_list->kode_barang) ?>', 1);"><div id="elh_barangnew_kode_barang" class="barangnew_kode_barang">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $barangnew_list->kode_barang->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($barangnew_list->kode_barang->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($barangnew_list->kode_barang->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($barangnew_list->nama_barang->Visible) { // nama_barang ?>
	<?php if ($barangnew_list->SortUrl($barangnew_list->nama_barang) == "") { ?>
		<th data-name="nama_barang" class="<?php echo $barangnew_list->nama_barang->headerCellClass() ?>"><div id="elh_barangnew_nama_barang" class="barangnew_nama_barang"><div class="ew-table-header-caption"><?php echo $barangnew_list->nama_barang->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama_barang" class="<?php echo $barangnew_list->nama_barang->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $barangnew_list->SortUrl($barangnew_list->nama_barang) ?>', 1);"><div id="elh_barangnew_nama_barang" class="barangnew_nama_barang">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $barangnew_list->nama_barang->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($barangnew_list->nama_barang->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($barangnew_list->nama_barang->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$barangnew_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($barangnew_list->ExportAll && $barangnew_list->isExport()) {
	$barangnew_list->StopRecord = $barangnew_list->TotalRecords;
} else {

	// Set the last record to display
	if ($barangnew_list->TotalRecords > $barangnew_list->StartRecord + $barangnew_list->DisplayRecords - 1)
		$barangnew_list->StopRecord = $barangnew_list->StartRecord + $barangnew_list->DisplayRecords - 1;
	else
		$barangnew_list->StopRecord = $barangnew_list->TotalRecords;
}
$barangnew_list->RecordCount = $barangnew_list->StartRecord - 1;
if ($barangnew_list->Recordset && !$barangnew_list->Recordset->EOF) {
	$barangnew_list->Recordset->moveFirst();
	$selectLimit = $barangnew_list->UseSelectLimit;
	if (!$selectLimit && $barangnew_list->StartRecord > 1)
		$barangnew_list->Recordset->move($barangnew_list->StartRecord - 1);
} elseif (!$barangnew->AllowAddDeleteRow && $barangnew_list->StopRecord == 0) {
	$barangnew_list->StopRecord = $barangnew->GridAddRowCount;
}

// Initialize aggregate
$barangnew->RowType = ROWTYPE_AGGREGATEINIT;
$barangnew->resetAttributes();
$barangnew_list->renderRow();
while ($barangnew_list->RecordCount < $barangnew_list->StopRecord) {
	$barangnew_list->RecordCount++;
	if ($barangnew_list->RecordCount >= $barangnew_list->StartRecord) {
		$barangnew_list->RowCount++;

		// Set up key count
		$barangnew_list->KeyCount = $barangnew_list->RowIndex;

		// Init row class and style
		$barangnew->resetAttributes();
		$barangnew->CssClass = "";
		if ($barangnew_list->isGridAdd()) {
		} else {
			$barangnew_list->loadRowValues($barangnew_list->Recordset); // Load row values
		}
		$barangnew->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$barangnew->RowAttrs->merge(["data-rowindex" => $barangnew_list->RowCount, "id" => "r" . $barangnew_list->RowCount . "_barangnew", "data-rowtype" => $barangnew->RowType]);

		// Render row
		$barangnew_list->renderRow();

		// Render list options
		$barangnew_list->renderListOptions();
?>
	<tr <?php echo $barangnew->rowAttributes() ?>>
<?php

// Render list options (body, left)
$barangnew_list->ListOptions->render("body", "left", $barangnew_list->RowCount);
?>
	<?php if ($barangnew_list->kode_barang->Visible) { // kode_barang ?>
		<td data-name="kode_barang" <?php echo $barangnew_list->kode_barang->cellAttributes() ?>>
<span id="el<?php echo $barangnew_list->RowCount ?>_barangnew_kode_barang">
<span<?php echo $barangnew_list->kode_barang->viewAttributes() ?>><?php echo $barangnew_list->kode_barang->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($barangnew_list->nama_barang->Visible) { // nama_barang ?>
		<td data-name="nama_barang" <?php echo $barangnew_list->nama_barang->cellAttributes() ?>>
<span id="el<?php echo $barangnew_list->RowCount ?>_barangnew_nama_barang">
<span<?php echo $barangnew_list->nama_barang->viewAttributes() ?>><?php echo $barangnew_list->nama_barang->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$barangnew_list->ListOptions->render("body", "right", $barangnew_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$barangnew_list->isGridAdd())
		$barangnew_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$barangnew->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($barangnew_list->Recordset)
	$barangnew_list->Recordset->Close();
?>
<?php if (!$barangnew_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$barangnew_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $barangnew_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $barangnew_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($barangnew_list->TotalRecords == 0 && !$barangnew->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $barangnew_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$barangnew_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$barangnew_list->isExport()) { ?>
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
$barangnew_list->terminate();
?>