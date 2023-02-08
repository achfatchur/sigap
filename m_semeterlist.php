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
$m_semeter_list = new m_semeter_list();

// Run the page
$m_semeter_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_semeter_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_semeter_list->isExport()) { ?>
<script>
var fm_semeterlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fm_semeterlist = currentForm = new ew.Form("fm_semeterlist", "list");
	fm_semeterlist.formKeyCountName = '<?php echo $m_semeter_list->FormKeyCountName ?>';
	loadjs.done("fm_semeterlist");
});
var fm_semeterlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fm_semeterlistsrch = currentSearchForm = new ew.Form("fm_semeterlistsrch");

	// Dynamic selection lists
	// Filters

	fm_semeterlistsrch.filterList = <?php echo $m_semeter_list->getFilterList() ?>;
	loadjs.done("fm_semeterlistsrch");
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
<?php if (!$m_semeter_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($m_semeter_list->TotalRecords > 0 && $m_semeter_list->ExportOptions->visible()) { ?>
<?php $m_semeter_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($m_semeter_list->ImportOptions->visible()) { ?>
<?php $m_semeter_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($m_semeter_list->SearchOptions->visible()) { ?>
<?php $m_semeter_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($m_semeter_list->FilterOptions->visible()) { ?>
<?php $m_semeter_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$m_semeter_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$m_semeter_list->isExport() && !$m_semeter->CurrentAction) { ?>
<form name="fm_semeterlistsrch" id="fm_semeterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fm_semeterlistsrch-search-panel" class="<?php echo $m_semeter_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="m_semeter">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $m_semeter_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($m_semeter_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($m_semeter_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $m_semeter_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($m_semeter_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($m_semeter_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($m_semeter_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($m_semeter_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $m_semeter_list->showPageHeader(); ?>
<?php
$m_semeter_list->showMessage();
?>
<?php if ($m_semeter_list->TotalRecords > 0 || $m_semeter->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($m_semeter_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> m_semeter">
<?php if (!$m_semeter_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$m_semeter_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_semeter_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_semeter_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fm_semeterlist" id="fm_semeterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_semeter">
<div id="gmp_m_semeter" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($m_semeter_list->TotalRecords > 0 || $m_semeter_list->isGridEdit()) { ?>
<table id="tbl_m_semeterlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$m_semeter->RowType = ROWTYPE_HEADER;

// Render list options
$m_semeter_list->renderListOptions();

// Render list options (header, left)
$m_semeter_list->ListOptions->render("header", "left");
?>
<?php if ($m_semeter_list->smtr->Visible) { // smtr ?>
	<?php if ($m_semeter_list->SortUrl($m_semeter_list->smtr) == "") { ?>
		<th data-name="smtr" class="<?php echo $m_semeter_list->smtr->headerCellClass() ?>"><div id="elh_m_semeter_smtr" class="m_semeter_smtr"><div class="ew-table-header-caption"><?php echo $m_semeter_list->smtr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="smtr" class="<?php echo $m_semeter_list->smtr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_semeter_list->SortUrl($m_semeter_list->smtr) ?>', 1);"><div id="elh_m_semeter_smtr" class="m_semeter_smtr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_semeter_list->smtr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($m_semeter_list->smtr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_semeter_list->smtr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_semeter_list->bulan->Visible) { // bulan ?>
	<?php if ($m_semeter_list->SortUrl($m_semeter_list->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $m_semeter_list->bulan->headerCellClass() ?>"><div id="elh_m_semeter_bulan" class="m_semeter_bulan"><div class="ew-table-header-caption"><?php echo $m_semeter_list->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $m_semeter_list->bulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_semeter_list->SortUrl($m_semeter_list->bulan) ?>', 1);"><div id="elh_m_semeter_bulan" class="m_semeter_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_semeter_list->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_semeter_list->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_semeter_list->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_semeter_list->detil_smtr->Visible) { // detil_smtr ?>
	<?php if ($m_semeter_list->SortUrl($m_semeter_list->detil_smtr) == "") { ?>
		<th data-name="detil_smtr" class="<?php echo $m_semeter_list->detil_smtr->headerCellClass() ?>"><div id="elh_m_semeter_detil_smtr" class="m_semeter_detil_smtr"><div class="ew-table-header-caption"><?php echo $m_semeter_list->detil_smtr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="detil_smtr" class="<?php echo $m_semeter_list->detil_smtr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_semeter_list->SortUrl($m_semeter_list->detil_smtr) ?>', 1);"><div id="elh_m_semeter_detil_smtr" class="m_semeter_detil_smtr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_semeter_list->detil_smtr->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_semeter_list->detil_smtr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_semeter_list->detil_smtr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$m_semeter_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($m_semeter_list->ExportAll && $m_semeter_list->isExport()) {
	$m_semeter_list->StopRecord = $m_semeter_list->TotalRecords;
} else {

	// Set the last record to display
	if ($m_semeter_list->TotalRecords > $m_semeter_list->StartRecord + $m_semeter_list->DisplayRecords - 1)
		$m_semeter_list->StopRecord = $m_semeter_list->StartRecord + $m_semeter_list->DisplayRecords - 1;
	else
		$m_semeter_list->StopRecord = $m_semeter_list->TotalRecords;
}
$m_semeter_list->RecordCount = $m_semeter_list->StartRecord - 1;
if ($m_semeter_list->Recordset && !$m_semeter_list->Recordset->EOF) {
	$m_semeter_list->Recordset->moveFirst();
	$selectLimit = $m_semeter_list->UseSelectLimit;
	if (!$selectLimit && $m_semeter_list->StartRecord > 1)
		$m_semeter_list->Recordset->move($m_semeter_list->StartRecord - 1);
} elseif (!$m_semeter->AllowAddDeleteRow && $m_semeter_list->StopRecord == 0) {
	$m_semeter_list->StopRecord = $m_semeter->GridAddRowCount;
}

// Initialize aggregate
$m_semeter->RowType = ROWTYPE_AGGREGATEINIT;
$m_semeter->resetAttributes();
$m_semeter_list->renderRow();
while ($m_semeter_list->RecordCount < $m_semeter_list->StopRecord) {
	$m_semeter_list->RecordCount++;
	if ($m_semeter_list->RecordCount >= $m_semeter_list->StartRecord) {
		$m_semeter_list->RowCount++;

		// Set up key count
		$m_semeter_list->KeyCount = $m_semeter_list->RowIndex;

		// Init row class and style
		$m_semeter->resetAttributes();
		$m_semeter->CssClass = "";
		if ($m_semeter_list->isGridAdd()) {
		} else {
			$m_semeter_list->loadRowValues($m_semeter_list->Recordset); // Load row values
		}
		$m_semeter->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$m_semeter->RowAttrs->merge(["data-rowindex" => $m_semeter_list->RowCount, "id" => "r" . $m_semeter_list->RowCount . "_m_semeter", "data-rowtype" => $m_semeter->RowType]);

		// Render row
		$m_semeter_list->renderRow();

		// Render list options
		$m_semeter_list->renderListOptions();
?>
	<tr <?php echo $m_semeter->rowAttributes() ?>>
<?php

// Render list options (body, left)
$m_semeter_list->ListOptions->render("body", "left", $m_semeter_list->RowCount);
?>
	<?php if ($m_semeter_list->smtr->Visible) { // smtr ?>
		<td data-name="smtr" <?php echo $m_semeter_list->smtr->cellAttributes() ?>>
<span id="el<?php echo $m_semeter_list->RowCount ?>_m_semeter_smtr">
<span<?php echo $m_semeter_list->smtr->viewAttributes() ?>><?php echo $m_semeter_list->smtr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_semeter_list->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $m_semeter_list->bulan->cellAttributes() ?>>
<span id="el<?php echo $m_semeter_list->RowCount ?>_m_semeter_bulan">
<span<?php echo $m_semeter_list->bulan->viewAttributes() ?>><?php echo $m_semeter_list->bulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_semeter_list->detil_smtr->Visible) { // detil_smtr ?>
		<td data-name="detil_smtr" <?php echo $m_semeter_list->detil_smtr->cellAttributes() ?>>
<span id="el<?php echo $m_semeter_list->RowCount ?>_m_semeter_detil_smtr">
<span<?php echo $m_semeter_list->detil_smtr->viewAttributes() ?>><?php echo $m_semeter_list->detil_smtr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$m_semeter_list->ListOptions->render("body", "right", $m_semeter_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$m_semeter_list->isGridAdd())
		$m_semeter_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$m_semeter->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($m_semeter_list->Recordset)
	$m_semeter_list->Recordset->Close();
?>
<?php if (!$m_semeter_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$m_semeter_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_semeter_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_semeter_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($m_semeter_list->TotalRecords == 0 && !$m_semeter->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $m_semeter_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$m_semeter_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_semeter_list->isExport()) { ?>
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
$m_semeter_list->terminate();
?>