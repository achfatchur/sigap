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
$generate_perbulan_list = new generate_perbulan_list();

// Run the page
$generate_perbulan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$generate_perbulan_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$generate_perbulan_list->isExport()) { ?>
<script>
var fgenerate_perbulanlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fgenerate_perbulanlist = currentForm = new ew.Form("fgenerate_perbulanlist", "list");
	fgenerate_perbulanlist.formKeyCountName = '<?php echo $generate_perbulan_list->FormKeyCountName ?>';
	loadjs.done("fgenerate_perbulanlist");
});
var fgenerate_perbulanlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fgenerate_perbulanlistsrch = currentSearchForm = new ew.Form("fgenerate_perbulanlistsrch");

	// Dynamic selection lists
	// Filters

	fgenerate_perbulanlistsrch.filterList = <?php echo $generate_perbulan_list->getFilterList() ?>;
	loadjs.done("fgenerate_perbulanlistsrch");
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
<?php if (!$generate_perbulan_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($generate_perbulan_list->TotalRecords > 0 && $generate_perbulan_list->ExportOptions->visible()) { ?>
<?php $generate_perbulan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($generate_perbulan_list->ImportOptions->visible()) { ?>
<?php $generate_perbulan_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($generate_perbulan_list->SearchOptions->visible()) { ?>
<?php $generate_perbulan_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($generate_perbulan_list->FilterOptions->visible()) { ?>
<?php $generate_perbulan_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$generate_perbulan_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$generate_perbulan_list->isExport() && !$generate_perbulan->CurrentAction) { ?>
<form name="fgenerate_perbulanlistsrch" id="fgenerate_perbulanlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fgenerate_perbulanlistsrch-search-panel" class="<?php echo $generate_perbulan_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="generate_perbulan">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $generate_perbulan_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($generate_perbulan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($generate_perbulan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $generate_perbulan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($generate_perbulan_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($generate_perbulan_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($generate_perbulan_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($generate_perbulan_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $generate_perbulan_list->showPageHeader(); ?>
<?php
$generate_perbulan_list->showMessage();
?>
<?php if ($generate_perbulan_list->TotalRecords > 0 || $generate_perbulan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($generate_perbulan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> generate_perbulan">
<?php if (!$generate_perbulan_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$generate_perbulan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $generate_perbulan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $generate_perbulan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fgenerate_perbulanlist" id="fgenerate_perbulanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="generate_perbulan">
<div id="gmp_generate_perbulan" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($generate_perbulan_list->TotalRecords > 0 || $generate_perbulan_list->isGridEdit()) { ?>
<table id="tbl_generate_perbulanlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$generate_perbulan->RowType = ROWTYPE_HEADER;

// Render list options
$generate_perbulan_list->renderListOptions();

// Render list options (header, left)
$generate_perbulan_list->ListOptions->render("header", "left");
?>
<?php if ($generate_perbulan_list->id->Visible) { // id ?>
	<?php if ($generate_perbulan_list->SortUrl($generate_perbulan_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $generate_perbulan_list->id->headerCellClass() ?>"><div id="elh_generate_perbulan_id" class="generate_perbulan_id"><div class="ew-table-header-caption"><?php echo $generate_perbulan_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $generate_perbulan_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $generate_perbulan_list->SortUrl($generate_perbulan_list->id) ?>', 1);"><div id="elh_generate_perbulan_id" class="generate_perbulan_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $generate_perbulan_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($generate_perbulan_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($generate_perbulan_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($generate_perbulan_list->tahun->Visible) { // tahun ?>
	<?php if ($generate_perbulan_list->SortUrl($generate_perbulan_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $generate_perbulan_list->tahun->headerCellClass() ?>"><div id="elh_generate_perbulan_tahun" class="generate_perbulan_tahun"><div class="ew-table-header-caption"><?php echo $generate_perbulan_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $generate_perbulan_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $generate_perbulan_list->SortUrl($generate_perbulan_list->tahun) ?>', 1);"><div id="elh_generate_perbulan_tahun" class="generate_perbulan_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $generate_perbulan_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($generate_perbulan_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($generate_perbulan_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($generate_perbulan_list->bulan->Visible) { // bulan ?>
	<?php if ($generate_perbulan_list->SortUrl($generate_perbulan_list->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $generate_perbulan_list->bulan->headerCellClass() ?>"><div id="elh_generate_perbulan_bulan" class="generate_perbulan_bulan"><div class="ew-table-header-caption"><?php echo $generate_perbulan_list->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $generate_perbulan_list->bulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $generate_perbulan_list->SortUrl($generate_perbulan_list->bulan) ?>', 1);"><div id="elh_generate_perbulan_bulan" class="generate_perbulan_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $generate_perbulan_list->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($generate_perbulan_list->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($generate_perbulan_list->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$generate_perbulan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($generate_perbulan_list->ExportAll && $generate_perbulan_list->isExport()) {
	$generate_perbulan_list->StopRecord = $generate_perbulan_list->TotalRecords;
} else {

	// Set the last record to display
	if ($generate_perbulan_list->TotalRecords > $generate_perbulan_list->StartRecord + $generate_perbulan_list->DisplayRecords - 1)
		$generate_perbulan_list->StopRecord = $generate_perbulan_list->StartRecord + $generate_perbulan_list->DisplayRecords - 1;
	else
		$generate_perbulan_list->StopRecord = $generate_perbulan_list->TotalRecords;
}
$generate_perbulan_list->RecordCount = $generate_perbulan_list->StartRecord - 1;
if ($generate_perbulan_list->Recordset && !$generate_perbulan_list->Recordset->EOF) {
	$generate_perbulan_list->Recordset->moveFirst();
	$selectLimit = $generate_perbulan_list->UseSelectLimit;
	if (!$selectLimit && $generate_perbulan_list->StartRecord > 1)
		$generate_perbulan_list->Recordset->move($generate_perbulan_list->StartRecord - 1);
} elseif (!$generate_perbulan->AllowAddDeleteRow && $generate_perbulan_list->StopRecord == 0) {
	$generate_perbulan_list->StopRecord = $generate_perbulan->GridAddRowCount;
}

// Initialize aggregate
$generate_perbulan->RowType = ROWTYPE_AGGREGATEINIT;
$generate_perbulan->resetAttributes();
$generate_perbulan_list->renderRow();
while ($generate_perbulan_list->RecordCount < $generate_perbulan_list->StopRecord) {
	$generate_perbulan_list->RecordCount++;
	if ($generate_perbulan_list->RecordCount >= $generate_perbulan_list->StartRecord) {
		$generate_perbulan_list->RowCount++;

		// Set up key count
		$generate_perbulan_list->KeyCount = $generate_perbulan_list->RowIndex;

		// Init row class and style
		$generate_perbulan->resetAttributes();
		$generate_perbulan->CssClass = "";
		if ($generate_perbulan_list->isGridAdd()) {
		} else {
			$generate_perbulan_list->loadRowValues($generate_perbulan_list->Recordset); // Load row values
		}
		$generate_perbulan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$generate_perbulan->RowAttrs->merge(["data-rowindex" => $generate_perbulan_list->RowCount, "id" => "r" . $generate_perbulan_list->RowCount . "_generate_perbulan", "data-rowtype" => $generate_perbulan->RowType]);

		// Render row
		$generate_perbulan_list->renderRow();

		// Render list options
		$generate_perbulan_list->renderListOptions();
?>
	<tr <?php echo $generate_perbulan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$generate_perbulan_list->ListOptions->render("body", "left", $generate_perbulan_list->RowCount);
?>
	<?php if ($generate_perbulan_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $generate_perbulan_list->id->cellAttributes() ?>>
<span id="el<?php echo $generate_perbulan_list->RowCount ?>_generate_perbulan_id">
<span<?php echo $generate_perbulan_list->id->viewAttributes() ?>><?php echo $generate_perbulan_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($generate_perbulan_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $generate_perbulan_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $generate_perbulan_list->RowCount ?>_generate_perbulan_tahun">
<span<?php echo $generate_perbulan_list->tahun->viewAttributes() ?>><?php echo $generate_perbulan_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($generate_perbulan_list->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $generate_perbulan_list->bulan->cellAttributes() ?>>
<span id="el<?php echo $generate_perbulan_list->RowCount ?>_generate_perbulan_bulan">
<span<?php echo $generate_perbulan_list->bulan->viewAttributes() ?>><?php echo $generate_perbulan_list->bulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$generate_perbulan_list->ListOptions->render("body", "right", $generate_perbulan_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$generate_perbulan_list->isGridAdd())
		$generate_perbulan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$generate_perbulan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($generate_perbulan_list->Recordset)
	$generate_perbulan_list->Recordset->Close();
?>
<?php if (!$generate_perbulan_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$generate_perbulan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $generate_perbulan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $generate_perbulan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($generate_perbulan_list->TotalRecords == 0 && !$generate_perbulan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $generate_perbulan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$generate_perbulan_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$generate_perbulan_list->isExport()) { ?>
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
$generate_perbulan_list->terminate();
?>