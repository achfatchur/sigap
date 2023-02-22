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
$status_npwp_list = new status_npwp_list();

// Run the page
$status_npwp_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$status_npwp_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$status_npwp_list->isExport()) { ?>
<script>
var fstatus_npwplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fstatus_npwplist = currentForm = new ew.Form("fstatus_npwplist", "list");
	fstatus_npwplist.formKeyCountName = '<?php echo $status_npwp_list->FormKeyCountName ?>';
	loadjs.done("fstatus_npwplist");
});
var fstatus_npwplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fstatus_npwplistsrch = currentSearchForm = new ew.Form("fstatus_npwplistsrch");

	// Dynamic selection lists
	// Filters

	fstatus_npwplistsrch.filterList = <?php echo $status_npwp_list->getFilterList() ?>;
	loadjs.done("fstatus_npwplistsrch");
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
<?php if (!$status_npwp_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($status_npwp_list->TotalRecords > 0 && $status_npwp_list->ExportOptions->visible()) { ?>
<?php $status_npwp_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($status_npwp_list->ImportOptions->visible()) { ?>
<?php $status_npwp_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($status_npwp_list->SearchOptions->visible()) { ?>
<?php $status_npwp_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($status_npwp_list->FilterOptions->visible()) { ?>
<?php $status_npwp_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$status_npwp_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$status_npwp_list->isExport() && !$status_npwp->CurrentAction) { ?>
<form name="fstatus_npwplistsrch" id="fstatus_npwplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fstatus_npwplistsrch-search-panel" class="<?php echo $status_npwp_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="status_npwp">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $status_npwp_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($status_npwp_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($status_npwp_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $status_npwp_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($status_npwp_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($status_npwp_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($status_npwp_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($status_npwp_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $status_npwp_list->showPageHeader(); ?>
<?php
$status_npwp_list->showMessage();
?>
<?php if ($status_npwp_list->TotalRecords > 0 || $status_npwp->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($status_npwp_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> status_npwp">
<?php if (!$status_npwp_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$status_npwp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $status_npwp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $status_npwp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstatus_npwplist" id="fstatus_npwplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="status_npwp">
<div id="gmp_status_npwp" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($status_npwp_list->TotalRecords > 0 || $status_npwp_list->isGridEdit()) { ?>
<table id="tbl_status_npwplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$status_npwp->RowType = ROWTYPE_HEADER;

// Render list options
$status_npwp_list->renderListOptions();

// Render list options (header, left)
$status_npwp_list->ListOptions->render("header", "left");
?>
<?php if ($status_npwp_list->name->Visible) { // name ?>
	<?php if ($status_npwp_list->SortUrl($status_npwp_list->name) == "") { ?>
		<th data-name="name" class="<?php echo $status_npwp_list->name->headerCellClass() ?>"><div id="elh_status_npwp_name" class="status_npwp_name"><div class="ew-table-header-caption"><?php echo $status_npwp_list->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $status_npwp_list->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $status_npwp_list->SortUrl($status_npwp_list->name) ?>', 1);"><div id="elh_status_npwp_name" class="status_npwp_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $status_npwp_list->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($status_npwp_list->name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($status_npwp_list->name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$status_npwp_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($status_npwp_list->ExportAll && $status_npwp_list->isExport()) {
	$status_npwp_list->StopRecord = $status_npwp_list->TotalRecords;
} else {

	// Set the last record to display
	if ($status_npwp_list->TotalRecords > $status_npwp_list->StartRecord + $status_npwp_list->DisplayRecords - 1)
		$status_npwp_list->StopRecord = $status_npwp_list->StartRecord + $status_npwp_list->DisplayRecords - 1;
	else
		$status_npwp_list->StopRecord = $status_npwp_list->TotalRecords;
}
$status_npwp_list->RecordCount = $status_npwp_list->StartRecord - 1;
if ($status_npwp_list->Recordset && !$status_npwp_list->Recordset->EOF) {
	$status_npwp_list->Recordset->moveFirst();
	$selectLimit = $status_npwp_list->UseSelectLimit;
	if (!$selectLimit && $status_npwp_list->StartRecord > 1)
		$status_npwp_list->Recordset->move($status_npwp_list->StartRecord - 1);
} elseif (!$status_npwp->AllowAddDeleteRow && $status_npwp_list->StopRecord == 0) {
	$status_npwp_list->StopRecord = $status_npwp->GridAddRowCount;
}

// Initialize aggregate
$status_npwp->RowType = ROWTYPE_AGGREGATEINIT;
$status_npwp->resetAttributes();
$status_npwp_list->renderRow();
while ($status_npwp_list->RecordCount < $status_npwp_list->StopRecord) {
	$status_npwp_list->RecordCount++;
	if ($status_npwp_list->RecordCount >= $status_npwp_list->StartRecord) {
		$status_npwp_list->RowCount++;

		// Set up key count
		$status_npwp_list->KeyCount = $status_npwp_list->RowIndex;

		// Init row class and style
		$status_npwp->resetAttributes();
		$status_npwp->CssClass = "";
		if ($status_npwp_list->isGridAdd()) {
		} else {
			$status_npwp_list->loadRowValues($status_npwp_list->Recordset); // Load row values
		}
		$status_npwp->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$status_npwp->RowAttrs->merge(["data-rowindex" => $status_npwp_list->RowCount, "id" => "r" . $status_npwp_list->RowCount . "_status_npwp", "data-rowtype" => $status_npwp->RowType]);

		// Render row
		$status_npwp_list->renderRow();

		// Render list options
		$status_npwp_list->renderListOptions();
?>
	<tr <?php echo $status_npwp->rowAttributes() ?>>
<?php

// Render list options (body, left)
$status_npwp_list->ListOptions->render("body", "left", $status_npwp_list->RowCount);
?>
	<?php if ($status_npwp_list->name->Visible) { // name ?>
		<td data-name="name" <?php echo $status_npwp_list->name->cellAttributes() ?>>
<span id="el<?php echo $status_npwp_list->RowCount ?>_status_npwp_name">
<span<?php echo $status_npwp_list->name->viewAttributes() ?>><?php echo $status_npwp_list->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$status_npwp_list->ListOptions->render("body", "right", $status_npwp_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$status_npwp_list->isGridAdd())
		$status_npwp_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$status_npwp->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($status_npwp_list->Recordset)
	$status_npwp_list->Recordset->Close();
?>
<?php if (!$status_npwp_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$status_npwp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $status_npwp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $status_npwp_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($status_npwp_list->TotalRecords == 0 && !$status_npwp->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $status_npwp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$status_npwp_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$status_npwp_list->isExport()) { ?>
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
$status_npwp_list->terminate();
?>