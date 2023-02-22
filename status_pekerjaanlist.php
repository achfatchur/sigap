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
$status_pekerjaan_list = new status_pekerjaan_list();

// Run the page
$status_pekerjaan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$status_pekerjaan_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$status_pekerjaan_list->isExport()) { ?>
<script>
var fstatus_pekerjaanlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fstatus_pekerjaanlist = currentForm = new ew.Form("fstatus_pekerjaanlist", "list");
	fstatus_pekerjaanlist.formKeyCountName = '<?php echo $status_pekerjaan_list->FormKeyCountName ?>';
	loadjs.done("fstatus_pekerjaanlist");
});
var fstatus_pekerjaanlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fstatus_pekerjaanlistsrch = currentSearchForm = new ew.Form("fstatus_pekerjaanlistsrch");

	// Dynamic selection lists
	// Filters

	fstatus_pekerjaanlistsrch.filterList = <?php echo $status_pekerjaan_list->getFilterList() ?>;
	loadjs.done("fstatus_pekerjaanlistsrch");
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
<?php if (!$status_pekerjaan_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($status_pekerjaan_list->TotalRecords > 0 && $status_pekerjaan_list->ExportOptions->visible()) { ?>
<?php $status_pekerjaan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($status_pekerjaan_list->ImportOptions->visible()) { ?>
<?php $status_pekerjaan_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($status_pekerjaan_list->SearchOptions->visible()) { ?>
<?php $status_pekerjaan_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($status_pekerjaan_list->FilterOptions->visible()) { ?>
<?php $status_pekerjaan_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$status_pekerjaan_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$status_pekerjaan_list->isExport() && !$status_pekerjaan->CurrentAction) { ?>
<form name="fstatus_pekerjaanlistsrch" id="fstatus_pekerjaanlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fstatus_pekerjaanlistsrch-search-panel" class="<?php echo $status_pekerjaan_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="status_pekerjaan">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $status_pekerjaan_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($status_pekerjaan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($status_pekerjaan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $status_pekerjaan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($status_pekerjaan_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($status_pekerjaan_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($status_pekerjaan_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($status_pekerjaan_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $status_pekerjaan_list->showPageHeader(); ?>
<?php
$status_pekerjaan_list->showMessage();
?>
<?php if ($status_pekerjaan_list->TotalRecords > 0 || $status_pekerjaan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($status_pekerjaan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> status_pekerjaan">
<?php if (!$status_pekerjaan_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$status_pekerjaan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $status_pekerjaan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $status_pekerjaan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstatus_pekerjaanlist" id="fstatus_pekerjaanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="status_pekerjaan">
<div id="gmp_status_pekerjaan" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($status_pekerjaan_list->TotalRecords > 0 || $status_pekerjaan_list->isGridEdit()) { ?>
<table id="tbl_status_pekerjaanlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$status_pekerjaan->RowType = ROWTYPE_HEADER;

// Render list options
$status_pekerjaan_list->renderListOptions();

// Render list options (header, left)
$status_pekerjaan_list->ListOptions->render("header", "left");
?>
<?php if ($status_pekerjaan_list->name->Visible) { // name ?>
	<?php if ($status_pekerjaan_list->SortUrl($status_pekerjaan_list->name) == "") { ?>
		<th data-name="name" class="<?php echo $status_pekerjaan_list->name->headerCellClass() ?>"><div id="elh_status_pekerjaan_name" class="status_pekerjaan_name"><div class="ew-table-header-caption"><?php echo $status_pekerjaan_list->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $status_pekerjaan_list->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $status_pekerjaan_list->SortUrl($status_pekerjaan_list->name) ?>', 1);"><div id="elh_status_pekerjaan_name" class="status_pekerjaan_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $status_pekerjaan_list->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($status_pekerjaan_list->name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($status_pekerjaan_list->name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$status_pekerjaan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($status_pekerjaan_list->ExportAll && $status_pekerjaan_list->isExport()) {
	$status_pekerjaan_list->StopRecord = $status_pekerjaan_list->TotalRecords;
} else {

	// Set the last record to display
	if ($status_pekerjaan_list->TotalRecords > $status_pekerjaan_list->StartRecord + $status_pekerjaan_list->DisplayRecords - 1)
		$status_pekerjaan_list->StopRecord = $status_pekerjaan_list->StartRecord + $status_pekerjaan_list->DisplayRecords - 1;
	else
		$status_pekerjaan_list->StopRecord = $status_pekerjaan_list->TotalRecords;
}
$status_pekerjaan_list->RecordCount = $status_pekerjaan_list->StartRecord - 1;
if ($status_pekerjaan_list->Recordset && !$status_pekerjaan_list->Recordset->EOF) {
	$status_pekerjaan_list->Recordset->moveFirst();
	$selectLimit = $status_pekerjaan_list->UseSelectLimit;
	if (!$selectLimit && $status_pekerjaan_list->StartRecord > 1)
		$status_pekerjaan_list->Recordset->move($status_pekerjaan_list->StartRecord - 1);
} elseif (!$status_pekerjaan->AllowAddDeleteRow && $status_pekerjaan_list->StopRecord == 0) {
	$status_pekerjaan_list->StopRecord = $status_pekerjaan->GridAddRowCount;
}

// Initialize aggregate
$status_pekerjaan->RowType = ROWTYPE_AGGREGATEINIT;
$status_pekerjaan->resetAttributes();
$status_pekerjaan_list->renderRow();
while ($status_pekerjaan_list->RecordCount < $status_pekerjaan_list->StopRecord) {
	$status_pekerjaan_list->RecordCount++;
	if ($status_pekerjaan_list->RecordCount >= $status_pekerjaan_list->StartRecord) {
		$status_pekerjaan_list->RowCount++;

		// Set up key count
		$status_pekerjaan_list->KeyCount = $status_pekerjaan_list->RowIndex;

		// Init row class and style
		$status_pekerjaan->resetAttributes();
		$status_pekerjaan->CssClass = "";
		if ($status_pekerjaan_list->isGridAdd()) {
		} else {
			$status_pekerjaan_list->loadRowValues($status_pekerjaan_list->Recordset); // Load row values
		}
		$status_pekerjaan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$status_pekerjaan->RowAttrs->merge(["data-rowindex" => $status_pekerjaan_list->RowCount, "id" => "r" . $status_pekerjaan_list->RowCount . "_status_pekerjaan", "data-rowtype" => $status_pekerjaan->RowType]);

		// Render row
		$status_pekerjaan_list->renderRow();

		// Render list options
		$status_pekerjaan_list->renderListOptions();
?>
	<tr <?php echo $status_pekerjaan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$status_pekerjaan_list->ListOptions->render("body", "left", $status_pekerjaan_list->RowCount);
?>
	<?php if ($status_pekerjaan_list->name->Visible) { // name ?>
		<td data-name="name" <?php echo $status_pekerjaan_list->name->cellAttributes() ?>>
<span id="el<?php echo $status_pekerjaan_list->RowCount ?>_status_pekerjaan_name">
<span<?php echo $status_pekerjaan_list->name->viewAttributes() ?>><?php echo $status_pekerjaan_list->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$status_pekerjaan_list->ListOptions->render("body", "right", $status_pekerjaan_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$status_pekerjaan_list->isGridAdd())
		$status_pekerjaan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$status_pekerjaan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($status_pekerjaan_list->Recordset)
	$status_pekerjaan_list->Recordset->Close();
?>
<?php if (!$status_pekerjaan_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$status_pekerjaan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $status_pekerjaan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $status_pekerjaan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($status_pekerjaan_list->TotalRecords == 0 && !$status_pekerjaan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $status_pekerjaan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$status_pekerjaan_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$status_pekerjaan_list->isExport()) { ?>
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
$status_pekerjaan_list->terminate();
?>