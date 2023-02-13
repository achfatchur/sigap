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
$jabatan_list = new jabatan_list();

// Run the page
$jabatan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$jabatan_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$jabatan_list->isExport()) { ?>
<script>
var fjabatanlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fjabatanlist = currentForm = new ew.Form("fjabatanlist", "list");
	fjabatanlist.formKeyCountName = '<?php echo $jabatan_list->FormKeyCountName ?>';
	loadjs.done("fjabatanlist");
});
var fjabatanlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fjabatanlistsrch = currentSearchForm = new ew.Form("fjabatanlistsrch");

	// Dynamic selection lists
	// Filters

	fjabatanlistsrch.filterList = <?php echo $jabatan_list->getFilterList() ?>;
	loadjs.done("fjabatanlistsrch");
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
<?php if (!$jabatan_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($jabatan_list->TotalRecords > 0 && $jabatan_list->ExportOptions->visible()) { ?>
<?php $jabatan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($jabatan_list->ImportOptions->visible()) { ?>
<?php $jabatan_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($jabatan_list->SearchOptions->visible()) { ?>
<?php $jabatan_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($jabatan_list->FilterOptions->visible()) { ?>
<?php $jabatan_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$jabatan_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$jabatan_list->isExport() && !$jabatan->CurrentAction) { ?>
<form name="fjabatanlistsrch" id="fjabatanlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fjabatanlistsrch-search-panel" class="<?php echo $jabatan_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="jabatan">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $jabatan_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($jabatan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($jabatan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $jabatan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($jabatan_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($jabatan_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($jabatan_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($jabatan_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $jabatan_list->showPageHeader(); ?>
<?php
$jabatan_list->showMessage();
?>
<?php if ($jabatan_list->TotalRecords > 0 || $jabatan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($jabatan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> jabatan">
<?php if (!$jabatan_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$jabatan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $jabatan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $jabatan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fjabatanlist" id="fjabatanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="jabatan">
<div id="gmp_jabatan" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($jabatan_list->TotalRecords > 0 || $jabatan_list->isGridEdit()) { ?>
<table id="tbl_jabatanlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$jabatan->RowType = ROWTYPE_HEADER;

// Render list options
$jabatan_list->renderListOptions();

// Render list options (header, left)
$jabatan_list->ListOptions->render("header", "left");
?>
<?php if ($jabatan_list->nama_jabatan->Visible) { // nama_jabatan ?>
	<?php if ($jabatan_list->SortUrl($jabatan_list->nama_jabatan) == "") { ?>
		<th data-name="nama_jabatan" class="<?php echo $jabatan_list->nama_jabatan->headerCellClass() ?>"><div id="elh_jabatan_nama_jabatan" class="jabatan_nama_jabatan"><div class="ew-table-header-caption"><?php echo $jabatan_list->nama_jabatan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama_jabatan" class="<?php echo $jabatan_list->nama_jabatan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $jabatan_list->SortUrl($jabatan_list->nama_jabatan) ?>', 1);"><div id="elh_jabatan_nama_jabatan" class="jabatan_nama_jabatan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $jabatan_list->nama_jabatan->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($jabatan_list->nama_jabatan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($jabatan_list->nama_jabatan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($jabatan_list->type_jabatan->Visible) { // type_jabatan ?>
	<?php if ($jabatan_list->SortUrl($jabatan_list->type_jabatan) == "") { ?>
		<th data-name="type_jabatan" class="<?php echo $jabatan_list->type_jabatan->headerCellClass() ?>"><div id="elh_jabatan_type_jabatan" class="jabatan_type_jabatan"><div class="ew-table-header-caption"><?php echo $jabatan_list->type_jabatan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="type_jabatan" class="<?php echo $jabatan_list->type_jabatan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $jabatan_list->SortUrl($jabatan_list->type_jabatan) ?>', 1);"><div id="elh_jabatan_type_jabatan" class="jabatan_type_jabatan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $jabatan_list->type_jabatan->caption() ?></span><span class="ew-table-header-sort"><?php if ($jabatan_list->type_jabatan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($jabatan_list->type_jabatan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($jabatan_list->jenjang->Visible) { // jenjang ?>
	<?php if ($jabatan_list->SortUrl($jabatan_list->jenjang) == "") { ?>
		<th data-name="jenjang" class="<?php echo $jabatan_list->jenjang->headerCellClass() ?>"><div id="elh_jabatan_jenjang" class="jabatan_jenjang"><div class="ew-table-header-caption"><?php echo $jabatan_list->jenjang->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang" class="<?php echo $jabatan_list->jenjang->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $jabatan_list->SortUrl($jabatan_list->jenjang) ?>', 1);"><div id="elh_jabatan_jenjang" class="jabatan_jenjang">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $jabatan_list->jenjang->caption() ?></span><span class="ew-table-header-sort"><?php if ($jabatan_list->jenjang->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($jabatan_list->jenjang->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($jabatan_list->keterangan->Visible) { // keterangan ?>
	<?php if ($jabatan_list->SortUrl($jabatan_list->keterangan) == "") { ?>
		<th data-name="keterangan" class="<?php echo $jabatan_list->keterangan->headerCellClass() ?>"><div id="elh_jabatan_keterangan" class="jabatan_keterangan"><div class="ew-table-header-caption"><?php echo $jabatan_list->keterangan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="keterangan" class="<?php echo $jabatan_list->keterangan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $jabatan_list->SortUrl($jabatan_list->keterangan) ?>', 1);"><div id="elh_jabatan_keterangan" class="jabatan_keterangan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $jabatan_list->keterangan->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($jabatan_list->keterangan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($jabatan_list->keterangan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$jabatan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($jabatan_list->ExportAll && $jabatan_list->isExport()) {
	$jabatan_list->StopRecord = $jabatan_list->TotalRecords;
} else {

	// Set the last record to display
	if ($jabatan_list->TotalRecords > $jabatan_list->StartRecord + $jabatan_list->DisplayRecords - 1)
		$jabatan_list->StopRecord = $jabatan_list->StartRecord + $jabatan_list->DisplayRecords - 1;
	else
		$jabatan_list->StopRecord = $jabatan_list->TotalRecords;
}
$jabatan_list->RecordCount = $jabatan_list->StartRecord - 1;
if ($jabatan_list->Recordset && !$jabatan_list->Recordset->EOF) {
	$jabatan_list->Recordset->moveFirst();
	$selectLimit = $jabatan_list->UseSelectLimit;
	if (!$selectLimit && $jabatan_list->StartRecord > 1)
		$jabatan_list->Recordset->move($jabatan_list->StartRecord - 1);
} elseif (!$jabatan->AllowAddDeleteRow && $jabatan_list->StopRecord == 0) {
	$jabatan_list->StopRecord = $jabatan->GridAddRowCount;
}

// Initialize aggregate
$jabatan->RowType = ROWTYPE_AGGREGATEINIT;
$jabatan->resetAttributes();
$jabatan_list->renderRow();
while ($jabatan_list->RecordCount < $jabatan_list->StopRecord) {
	$jabatan_list->RecordCount++;
	if ($jabatan_list->RecordCount >= $jabatan_list->StartRecord) {
		$jabatan_list->RowCount++;

		// Set up key count
		$jabatan_list->KeyCount = $jabatan_list->RowIndex;

		// Init row class and style
		$jabatan->resetAttributes();
		$jabatan->CssClass = "";
		if ($jabatan_list->isGridAdd()) {
		} else {
			$jabatan_list->loadRowValues($jabatan_list->Recordset); // Load row values
		}
		$jabatan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$jabatan->RowAttrs->merge(["data-rowindex" => $jabatan_list->RowCount, "id" => "r" . $jabatan_list->RowCount . "_jabatan", "data-rowtype" => $jabatan->RowType]);

		// Render row
		$jabatan_list->renderRow();

		// Render list options
		$jabatan_list->renderListOptions();
?>
	<tr <?php echo $jabatan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$jabatan_list->ListOptions->render("body", "left", $jabatan_list->RowCount);
?>
	<?php if ($jabatan_list->nama_jabatan->Visible) { // nama_jabatan ?>
		<td data-name="nama_jabatan" <?php echo $jabatan_list->nama_jabatan->cellAttributes() ?>>
<span id="el<?php echo $jabatan_list->RowCount ?>_jabatan_nama_jabatan">
<span<?php echo $jabatan_list->nama_jabatan->viewAttributes() ?>><?php echo $jabatan_list->nama_jabatan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($jabatan_list->type_jabatan->Visible) { // type_jabatan ?>
		<td data-name="type_jabatan" <?php echo $jabatan_list->type_jabatan->cellAttributes() ?>>
<span id="el<?php echo $jabatan_list->RowCount ?>_jabatan_type_jabatan">
<span<?php echo $jabatan_list->type_jabatan->viewAttributes() ?>><?php echo $jabatan_list->type_jabatan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($jabatan_list->jenjang->Visible) { // jenjang ?>
		<td data-name="jenjang" <?php echo $jabatan_list->jenjang->cellAttributes() ?>>
<span id="el<?php echo $jabatan_list->RowCount ?>_jabatan_jenjang">
<span<?php echo $jabatan_list->jenjang->viewAttributes() ?>><?php echo $jabatan_list->jenjang->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($jabatan_list->keterangan->Visible) { // keterangan ?>
		<td data-name="keterangan" <?php echo $jabatan_list->keterangan->cellAttributes() ?>>
<span id="el<?php echo $jabatan_list->RowCount ?>_jabatan_keterangan">
<span<?php echo $jabatan_list->keterangan->viewAttributes() ?>><?php echo $jabatan_list->keterangan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$jabatan_list->ListOptions->render("body", "right", $jabatan_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$jabatan_list->isGridAdd())
		$jabatan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$jabatan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($jabatan_list->Recordset)
	$jabatan_list->Recordset->Close();
?>
<?php if (!$jabatan_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$jabatan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $jabatan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $jabatan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($jabatan_list->TotalRecords == 0 && !$jabatan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $jabatan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$jabatan_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$jabatan_list->isExport()) { ?>
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
$jabatan_list->terminate();
?>