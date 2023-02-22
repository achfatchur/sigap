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
$m_bpjs_list = new m_bpjs_list();

// Run the page
$m_bpjs_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_bpjs_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_bpjs_list->isExport()) { ?>
<script>
var fm_bpjslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fm_bpjslist = currentForm = new ew.Form("fm_bpjslist", "list");
	fm_bpjslist.formKeyCountName = '<?php echo $m_bpjs_list->FormKeyCountName ?>';
	loadjs.done("fm_bpjslist");
});
var fm_bpjslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fm_bpjslistsrch = currentSearchForm = new ew.Form("fm_bpjslistsrch");

	// Dynamic selection lists
	// Filters

	fm_bpjslistsrch.filterList = <?php echo $m_bpjs_list->getFilterList() ?>;
	loadjs.done("fm_bpjslistsrch");
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
<?php if (!$m_bpjs_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($m_bpjs_list->TotalRecords > 0 && $m_bpjs_list->ExportOptions->visible()) { ?>
<?php $m_bpjs_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($m_bpjs_list->ImportOptions->visible()) { ?>
<?php $m_bpjs_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($m_bpjs_list->SearchOptions->visible()) { ?>
<?php $m_bpjs_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($m_bpjs_list->FilterOptions->visible()) { ?>
<?php $m_bpjs_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$m_bpjs_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$m_bpjs_list->isExport() && !$m_bpjs->CurrentAction) { ?>
<form name="fm_bpjslistsrch" id="fm_bpjslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fm_bpjslistsrch-search-panel" class="<?php echo $m_bpjs_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="m_bpjs">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $m_bpjs_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($m_bpjs_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($m_bpjs_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $m_bpjs_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($m_bpjs_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($m_bpjs_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($m_bpjs_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($m_bpjs_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $m_bpjs_list->showPageHeader(); ?>
<?php
$m_bpjs_list->showMessage();
?>
<?php if ($m_bpjs_list->TotalRecords > 0 || $m_bpjs->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($m_bpjs_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> m_bpjs">
<?php if (!$m_bpjs_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$m_bpjs_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_bpjs_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_bpjs_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fm_bpjslist" id="fm_bpjslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_bpjs">
<div id="gmp_m_bpjs" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($m_bpjs_list->TotalRecords > 0 || $m_bpjs_list->isGridEdit()) { ?>
<table id="tbl_m_bpjslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$m_bpjs->RowType = ROWTYPE_HEADER;

// Render list options
$m_bpjs_list->renderListOptions();

// Render list options (header, left)
$m_bpjs_list->ListOptions->render("header", "left");
?>
<?php if ($m_bpjs_list->jenjang->Visible) { // jenjang ?>
	<?php if ($m_bpjs_list->SortUrl($m_bpjs_list->jenjang) == "") { ?>
		<th data-name="jenjang" class="<?php echo $m_bpjs_list->jenjang->headerCellClass() ?>"><div id="elh_m_bpjs_jenjang" class="m_bpjs_jenjang"><div class="ew-table-header-caption"><?php echo $m_bpjs_list->jenjang->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang" class="<?php echo $m_bpjs_list->jenjang->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_bpjs_list->SortUrl($m_bpjs_list->jenjang) ?>', 1);"><div id="elh_m_bpjs_jenjang" class="m_bpjs_jenjang">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_bpjs_list->jenjang->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_bpjs_list->jenjang->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_bpjs_list->jenjang->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_bpjs_list->golongan->Visible) { // golongan ?>
	<?php if ($m_bpjs_list->SortUrl($m_bpjs_list->golongan) == "") { ?>
		<th data-name="golongan" class="<?php echo $m_bpjs_list->golongan->headerCellClass() ?>"><div id="elh_m_bpjs_golongan" class="m_bpjs_golongan"><div class="ew-table-header-caption"><?php echo $m_bpjs_list->golongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="golongan" class="<?php echo $m_bpjs_list->golongan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_bpjs_list->SortUrl($m_bpjs_list->golongan) ?>', 1);"><div id="elh_m_bpjs_golongan" class="m_bpjs_golongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_bpjs_list->golongan->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($m_bpjs_list->golongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_bpjs_list->golongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_bpjs_list->value->Visible) { // value ?>
	<?php if ($m_bpjs_list->SortUrl($m_bpjs_list->value) == "") { ?>
		<th data-name="value" class="<?php echo $m_bpjs_list->value->headerCellClass() ?>"><div id="elh_m_bpjs_value" class="m_bpjs_value"><div class="ew-table-header-caption"><?php echo $m_bpjs_list->value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value" class="<?php echo $m_bpjs_list->value->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_bpjs_list->SortUrl($m_bpjs_list->value) ?>', 1);"><div id="elh_m_bpjs_value" class="m_bpjs_value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_bpjs_list->value->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_bpjs_list->value->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_bpjs_list->value->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_bpjs_list->golongan_id->Visible) { // golongan_id ?>
	<?php if ($m_bpjs_list->SortUrl($m_bpjs_list->golongan_id) == "") { ?>
		<th data-name="golongan_id" class="<?php echo $m_bpjs_list->golongan_id->headerCellClass() ?>"><div id="elh_m_bpjs_golongan_id" class="m_bpjs_golongan_id"><div class="ew-table-header-caption"><?php echo $m_bpjs_list->golongan_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="golongan_id" class="<?php echo $m_bpjs_list->golongan_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_bpjs_list->SortUrl($m_bpjs_list->golongan_id) ?>', 1);"><div id="elh_m_bpjs_golongan_id" class="m_bpjs_golongan_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_bpjs_list->golongan_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_bpjs_list->golongan_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_bpjs_list->golongan_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$m_bpjs_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($m_bpjs_list->ExportAll && $m_bpjs_list->isExport()) {
	$m_bpjs_list->StopRecord = $m_bpjs_list->TotalRecords;
} else {

	// Set the last record to display
	if ($m_bpjs_list->TotalRecords > $m_bpjs_list->StartRecord + $m_bpjs_list->DisplayRecords - 1)
		$m_bpjs_list->StopRecord = $m_bpjs_list->StartRecord + $m_bpjs_list->DisplayRecords - 1;
	else
		$m_bpjs_list->StopRecord = $m_bpjs_list->TotalRecords;
}
$m_bpjs_list->RecordCount = $m_bpjs_list->StartRecord - 1;
if ($m_bpjs_list->Recordset && !$m_bpjs_list->Recordset->EOF) {
	$m_bpjs_list->Recordset->moveFirst();
	$selectLimit = $m_bpjs_list->UseSelectLimit;
	if (!$selectLimit && $m_bpjs_list->StartRecord > 1)
		$m_bpjs_list->Recordset->move($m_bpjs_list->StartRecord - 1);
} elseif (!$m_bpjs->AllowAddDeleteRow && $m_bpjs_list->StopRecord == 0) {
	$m_bpjs_list->StopRecord = $m_bpjs->GridAddRowCount;
}

// Initialize aggregate
$m_bpjs->RowType = ROWTYPE_AGGREGATEINIT;
$m_bpjs->resetAttributes();
$m_bpjs_list->renderRow();
while ($m_bpjs_list->RecordCount < $m_bpjs_list->StopRecord) {
	$m_bpjs_list->RecordCount++;
	if ($m_bpjs_list->RecordCount >= $m_bpjs_list->StartRecord) {
		$m_bpjs_list->RowCount++;

		// Set up key count
		$m_bpjs_list->KeyCount = $m_bpjs_list->RowIndex;

		// Init row class and style
		$m_bpjs->resetAttributes();
		$m_bpjs->CssClass = "";
		if ($m_bpjs_list->isGridAdd()) {
		} else {
			$m_bpjs_list->loadRowValues($m_bpjs_list->Recordset); // Load row values
		}
		$m_bpjs->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$m_bpjs->RowAttrs->merge(["data-rowindex" => $m_bpjs_list->RowCount, "id" => "r" . $m_bpjs_list->RowCount . "_m_bpjs", "data-rowtype" => $m_bpjs->RowType]);

		// Render row
		$m_bpjs_list->renderRow();

		// Render list options
		$m_bpjs_list->renderListOptions();
?>
	<tr <?php echo $m_bpjs->rowAttributes() ?>>
<?php

// Render list options (body, left)
$m_bpjs_list->ListOptions->render("body", "left", $m_bpjs_list->RowCount);
?>
	<?php if ($m_bpjs_list->jenjang->Visible) { // jenjang ?>
		<td data-name="jenjang" <?php echo $m_bpjs_list->jenjang->cellAttributes() ?>>
<span id="el<?php echo $m_bpjs_list->RowCount ?>_m_bpjs_jenjang">
<span<?php echo $m_bpjs_list->jenjang->viewAttributes() ?>><?php echo $m_bpjs_list->jenjang->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_bpjs_list->golongan->Visible) { // golongan ?>
		<td data-name="golongan" <?php echo $m_bpjs_list->golongan->cellAttributes() ?>>
<span id="el<?php echo $m_bpjs_list->RowCount ?>_m_bpjs_golongan">
<span<?php echo $m_bpjs_list->golongan->viewAttributes() ?>><?php echo $m_bpjs_list->golongan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_bpjs_list->value->Visible) { // value ?>
		<td data-name="value" <?php echo $m_bpjs_list->value->cellAttributes() ?>>
<span id="el<?php echo $m_bpjs_list->RowCount ?>_m_bpjs_value">
<span<?php echo $m_bpjs_list->value->viewAttributes() ?>><?php echo $m_bpjs_list->value->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_bpjs_list->golongan_id->Visible) { // golongan_id ?>
		<td data-name="golongan_id" <?php echo $m_bpjs_list->golongan_id->cellAttributes() ?>>
<span id="el<?php echo $m_bpjs_list->RowCount ?>_m_bpjs_golongan_id">
<span<?php echo $m_bpjs_list->golongan_id->viewAttributes() ?>><?php echo $m_bpjs_list->golongan_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$m_bpjs_list->ListOptions->render("body", "right", $m_bpjs_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$m_bpjs_list->isGridAdd())
		$m_bpjs_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$m_bpjs->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($m_bpjs_list->Recordset)
	$m_bpjs_list->Recordset->Close();
?>
<?php if (!$m_bpjs_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$m_bpjs_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_bpjs_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_bpjs_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($m_bpjs_list->TotalRecords == 0 && !$m_bpjs->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $m_bpjs_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$m_bpjs_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_bpjs_list->isExport()) { ?>
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
$m_bpjs_list->terminate();
?>