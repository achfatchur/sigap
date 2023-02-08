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
$status_kepeg_list = new status_kepeg_list();

// Run the page
$status_kepeg_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$status_kepeg_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$status_kepeg_list->isExport()) { ?>
<script>
var fstatus_kepeglist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fstatus_kepeglist = currentForm = new ew.Form("fstatus_kepeglist", "list");
	fstatus_kepeglist.formKeyCountName = '<?php echo $status_kepeg_list->FormKeyCountName ?>';
	loadjs.done("fstatus_kepeglist");
});
var fstatus_kepeglistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fstatus_kepeglistsrch = currentSearchForm = new ew.Form("fstatus_kepeglistsrch");

	// Dynamic selection lists
	// Filters

	fstatus_kepeglistsrch.filterList = <?php echo $status_kepeg_list->getFilterList() ?>;
	loadjs.done("fstatus_kepeglistsrch");
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
<?php if (!$status_kepeg_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($status_kepeg_list->TotalRecords > 0 && $status_kepeg_list->ExportOptions->visible()) { ?>
<?php $status_kepeg_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($status_kepeg_list->ImportOptions->visible()) { ?>
<?php $status_kepeg_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($status_kepeg_list->SearchOptions->visible()) { ?>
<?php $status_kepeg_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($status_kepeg_list->FilterOptions->visible()) { ?>
<?php $status_kepeg_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$status_kepeg_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$status_kepeg_list->isExport() && !$status_kepeg->CurrentAction) { ?>
<form name="fstatus_kepeglistsrch" id="fstatus_kepeglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fstatus_kepeglistsrch-search-panel" class="<?php echo $status_kepeg_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="status_kepeg">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $status_kepeg_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($status_kepeg_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($status_kepeg_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $status_kepeg_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($status_kepeg_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($status_kepeg_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($status_kepeg_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($status_kepeg_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $status_kepeg_list->showPageHeader(); ?>
<?php
$status_kepeg_list->showMessage();
?>
<?php if ($status_kepeg_list->TotalRecords > 0 || $status_kepeg->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($status_kepeg_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> status_kepeg">
<?php if (!$status_kepeg_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$status_kepeg_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $status_kepeg_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $status_kepeg_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstatus_kepeglist" id="fstatus_kepeglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="status_kepeg">
<div id="gmp_status_kepeg" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($status_kepeg_list->TotalRecords > 0 || $status_kepeg_list->isGridEdit()) { ?>
<table id="tbl_status_kepeglist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$status_kepeg->RowType = ROWTYPE_HEADER;

// Render list options
$status_kepeg_list->renderListOptions();

// Render list options (header, left)
$status_kepeg_list->ListOptions->render("header", "left");
?>
<?php if ($status_kepeg_list->name->Visible) { // name ?>
	<?php if ($status_kepeg_list->SortUrl($status_kepeg_list->name) == "") { ?>
		<th data-name="name" class="<?php echo $status_kepeg_list->name->headerCellClass() ?>"><div id="elh_status_kepeg_name" class="status_kepeg_name"><div class="ew-table-header-caption"><?php echo $status_kepeg_list->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $status_kepeg_list->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $status_kepeg_list->SortUrl($status_kepeg_list->name) ?>', 1);"><div id="elh_status_kepeg_name" class="status_kepeg_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $status_kepeg_list->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($status_kepeg_list->name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($status_kepeg_list->name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$status_kepeg_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($status_kepeg_list->ExportAll && $status_kepeg_list->isExport()) {
	$status_kepeg_list->StopRecord = $status_kepeg_list->TotalRecords;
} else {

	// Set the last record to display
	if ($status_kepeg_list->TotalRecords > $status_kepeg_list->StartRecord + $status_kepeg_list->DisplayRecords - 1)
		$status_kepeg_list->StopRecord = $status_kepeg_list->StartRecord + $status_kepeg_list->DisplayRecords - 1;
	else
		$status_kepeg_list->StopRecord = $status_kepeg_list->TotalRecords;
}
$status_kepeg_list->RecordCount = $status_kepeg_list->StartRecord - 1;
if ($status_kepeg_list->Recordset && !$status_kepeg_list->Recordset->EOF) {
	$status_kepeg_list->Recordset->moveFirst();
	$selectLimit = $status_kepeg_list->UseSelectLimit;
	if (!$selectLimit && $status_kepeg_list->StartRecord > 1)
		$status_kepeg_list->Recordset->move($status_kepeg_list->StartRecord - 1);
} elseif (!$status_kepeg->AllowAddDeleteRow && $status_kepeg_list->StopRecord == 0) {
	$status_kepeg_list->StopRecord = $status_kepeg->GridAddRowCount;
}

// Initialize aggregate
$status_kepeg->RowType = ROWTYPE_AGGREGATEINIT;
$status_kepeg->resetAttributes();
$status_kepeg_list->renderRow();
while ($status_kepeg_list->RecordCount < $status_kepeg_list->StopRecord) {
	$status_kepeg_list->RecordCount++;
	if ($status_kepeg_list->RecordCount >= $status_kepeg_list->StartRecord) {
		$status_kepeg_list->RowCount++;

		// Set up key count
		$status_kepeg_list->KeyCount = $status_kepeg_list->RowIndex;

		// Init row class and style
		$status_kepeg->resetAttributes();
		$status_kepeg->CssClass = "";
		if ($status_kepeg_list->isGridAdd()) {
		} else {
			$status_kepeg_list->loadRowValues($status_kepeg_list->Recordset); // Load row values
		}
		$status_kepeg->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$status_kepeg->RowAttrs->merge(["data-rowindex" => $status_kepeg_list->RowCount, "id" => "r" . $status_kepeg_list->RowCount . "_status_kepeg", "data-rowtype" => $status_kepeg->RowType]);

		// Render row
		$status_kepeg_list->renderRow();

		// Render list options
		$status_kepeg_list->renderListOptions();
?>
	<tr <?php echo $status_kepeg->rowAttributes() ?>>
<?php

// Render list options (body, left)
$status_kepeg_list->ListOptions->render("body", "left", $status_kepeg_list->RowCount);
?>
	<?php if ($status_kepeg_list->name->Visible) { // name ?>
		<td data-name="name" <?php echo $status_kepeg_list->name->cellAttributes() ?>>
<span id="el<?php echo $status_kepeg_list->RowCount ?>_status_kepeg_name">
<span<?php echo $status_kepeg_list->name->viewAttributes() ?>><?php echo $status_kepeg_list->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$status_kepeg_list->ListOptions->render("body", "right", $status_kepeg_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$status_kepeg_list->isGridAdd())
		$status_kepeg_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$status_kepeg->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($status_kepeg_list->Recordset)
	$status_kepeg_list->Recordset->Close();
?>
<?php if (!$status_kepeg_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$status_kepeg_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $status_kepeg_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $status_kepeg_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($status_kepeg_list->TotalRecords == 0 && !$status_kepeg->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $status_kepeg_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$status_kepeg_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$status_kepeg_list->isExport()) { ?>
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
$status_kepeg_list->terminate();
?>