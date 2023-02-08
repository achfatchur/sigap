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
$semester_list = new semester_list();

// Run the page
$semester_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$semester_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$semester_list->isExport()) { ?>
<script>
var fsemesterlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fsemesterlist = currentForm = new ew.Form("fsemesterlist", "list");
	fsemesterlist.formKeyCountName = '<?php echo $semester_list->FormKeyCountName ?>';
	loadjs.done("fsemesterlist");
});
var fsemesterlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fsemesterlistsrch = currentSearchForm = new ew.Form("fsemesterlistsrch");

	// Dynamic selection lists
	// Filters

	fsemesterlistsrch.filterList = <?php echo $semester_list->getFilterList() ?>;
	loadjs.done("fsemesterlistsrch");
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
<?php if (!$semester_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($semester_list->TotalRecords > 0 && $semester_list->ExportOptions->visible()) { ?>
<?php $semester_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($semester_list->ImportOptions->visible()) { ?>
<?php $semester_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($semester_list->SearchOptions->visible()) { ?>
<?php $semester_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($semester_list->FilterOptions->visible()) { ?>
<?php $semester_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$semester_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$semester_list->isExport() && !$semester->CurrentAction) { ?>
<form name="fsemesterlistsrch" id="fsemesterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fsemesterlistsrch-search-panel" class="<?php echo $semester_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="semester">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $semester_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($semester_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($semester_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $semester_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($semester_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($semester_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($semester_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($semester_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $semester_list->showPageHeader(); ?>
<?php
$semester_list->showMessage();
?>
<?php if ($semester_list->TotalRecords > 0 || $semester->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($semester_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> semester">
<?php if (!$semester_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$semester_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $semester_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $semester_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsemesterlist" id="fsemesterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="semester">
<div id="gmp_semester" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($semester_list->TotalRecords > 0 || $semester_list->isGridEdit()) { ?>
<table id="tbl_semesterlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$semester->RowType = ROWTYPE_HEADER;

// Render list options
$semester_list->renderListOptions();

// Render list options (header, left)
$semester_list->ListOptions->render("header", "left");
?>
<?php if ($semester_list->nama->Visible) { // nama ?>
	<?php if ($semester_list->SortUrl($semester_list->nama) == "") { ?>
		<th data-name="nama" class="<?php echo $semester_list->nama->headerCellClass() ?>"><div id="elh_semester_nama" class="semester_nama"><div class="ew-table-header-caption"><?php echo $semester_list->nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama" class="<?php echo $semester_list->nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $semester_list->SortUrl($semester_list->nama) ?>', 1);"><div id="elh_semester_nama" class="semester_nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $semester_list->nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($semester_list->nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($semester_list->nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$semester_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($semester_list->ExportAll && $semester_list->isExport()) {
	$semester_list->StopRecord = $semester_list->TotalRecords;
} else {

	// Set the last record to display
	if ($semester_list->TotalRecords > $semester_list->StartRecord + $semester_list->DisplayRecords - 1)
		$semester_list->StopRecord = $semester_list->StartRecord + $semester_list->DisplayRecords - 1;
	else
		$semester_list->StopRecord = $semester_list->TotalRecords;
}
$semester_list->RecordCount = $semester_list->StartRecord - 1;
if ($semester_list->Recordset && !$semester_list->Recordset->EOF) {
	$semester_list->Recordset->moveFirst();
	$selectLimit = $semester_list->UseSelectLimit;
	if (!$selectLimit && $semester_list->StartRecord > 1)
		$semester_list->Recordset->move($semester_list->StartRecord - 1);
} elseif (!$semester->AllowAddDeleteRow && $semester_list->StopRecord == 0) {
	$semester_list->StopRecord = $semester->GridAddRowCount;
}

// Initialize aggregate
$semester->RowType = ROWTYPE_AGGREGATEINIT;
$semester->resetAttributes();
$semester_list->renderRow();
while ($semester_list->RecordCount < $semester_list->StopRecord) {
	$semester_list->RecordCount++;
	if ($semester_list->RecordCount >= $semester_list->StartRecord) {
		$semester_list->RowCount++;

		// Set up key count
		$semester_list->KeyCount = $semester_list->RowIndex;

		// Init row class and style
		$semester->resetAttributes();
		$semester->CssClass = "";
		if ($semester_list->isGridAdd()) {
		} else {
			$semester_list->loadRowValues($semester_list->Recordset); // Load row values
		}
		$semester->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$semester->RowAttrs->merge(["data-rowindex" => $semester_list->RowCount, "id" => "r" . $semester_list->RowCount . "_semester", "data-rowtype" => $semester->RowType]);

		// Render row
		$semester_list->renderRow();

		// Render list options
		$semester_list->renderListOptions();
?>
	<tr <?php echo $semester->rowAttributes() ?>>
<?php

// Render list options (body, left)
$semester_list->ListOptions->render("body", "left", $semester_list->RowCount);
?>
	<?php if ($semester_list->nama->Visible) { // nama ?>
		<td data-name="nama" <?php echo $semester_list->nama->cellAttributes() ?>>
<span id="el<?php echo $semester_list->RowCount ?>_semester_nama">
<span<?php echo $semester_list->nama->viewAttributes() ?>><?php echo $semester_list->nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$semester_list->ListOptions->render("body", "right", $semester_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$semester_list->isGridAdd())
		$semester_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$semester->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($semester_list->Recordset)
	$semester_list->Recordset->Close();
?>
<?php if (!$semester_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$semester_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $semester_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $semester_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($semester_list->TotalRecords == 0 && !$semester->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $semester_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$semester_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$semester_list->isExport()) { ?>
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
$semester_list->terminate();
?>