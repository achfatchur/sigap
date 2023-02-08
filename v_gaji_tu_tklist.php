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
$v_gaji_tu_tk_list = new v_gaji_tu_tk_list();

// Run the page
$v_gaji_tu_tk_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_gaji_tu_tk_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$v_gaji_tu_tk_list->isExport()) { ?>
<script>
var fv_gaji_tu_tklist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fv_gaji_tu_tklist = currentForm = new ew.Form("fv_gaji_tu_tklist", "list");
	fv_gaji_tu_tklist.formKeyCountName = '<?php echo $v_gaji_tu_tk_list->FormKeyCountName ?>';
	loadjs.done("fv_gaji_tu_tklist");
});
var fv_gaji_tu_tklistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fv_gaji_tu_tklistsrch = currentSearchForm = new ew.Form("fv_gaji_tu_tklistsrch");

	// Dynamic selection lists
	// Filters

	fv_gaji_tu_tklistsrch.filterList = <?php echo $v_gaji_tu_tk_list->getFilterList() ?>;
	loadjs.done("fv_gaji_tu_tklistsrch");
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
<?php if (!$v_gaji_tu_tk_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v_gaji_tu_tk_list->TotalRecords > 0 && $v_gaji_tu_tk_list->ExportOptions->visible()) { ?>
<?php $v_gaji_tu_tk_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v_gaji_tu_tk_list->ImportOptions->visible()) { ?>
<?php $v_gaji_tu_tk_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v_gaji_tu_tk_list->SearchOptions->visible()) { ?>
<?php $v_gaji_tu_tk_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v_gaji_tu_tk_list->FilterOptions->visible()) { ?>
<?php $v_gaji_tu_tk_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$v_gaji_tu_tk_list->isExport() || Config("EXPORT_MASTER_RECORD") && $v_gaji_tu_tk_list->isExport("print")) { ?>
<?php
if ($v_gaji_tu_tk_list->DbMasterFilter != "" && $v_gaji_tu_tk->getCurrentMasterTable() == "v_tu_tk") {
	if ($v_gaji_tu_tk_list->MasterRecordExists) {
		include_once "v_tu_tkmaster.php";
	}
}
?>
<?php } ?>
<?php
$v_gaji_tu_tk_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v_gaji_tu_tk_list->isExport() && !$v_gaji_tu_tk->CurrentAction) { ?>
<form name="fv_gaji_tu_tklistsrch" id="fv_gaji_tu_tklistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fv_gaji_tu_tklistsrch-search-panel" class="<?php echo $v_gaji_tu_tk_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v_gaji_tu_tk">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $v_gaji_tu_tk_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($v_gaji_tu_tk_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($v_gaji_tu_tk_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $v_gaji_tu_tk_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($v_gaji_tu_tk_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($v_gaji_tu_tk_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($v_gaji_tu_tk_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($v_gaji_tu_tk_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $v_gaji_tu_tk_list->showPageHeader(); ?>
<?php
$v_gaji_tu_tk_list->showMessage();
?>
<?php if ($v_gaji_tu_tk_list->TotalRecords > 0 || $v_gaji_tu_tk->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v_gaji_tu_tk_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v_gaji_tu_tk">
<?php if (!$v_gaji_tu_tk_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$v_gaji_tu_tk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v_gaji_tu_tk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_gaji_tu_tk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fv_gaji_tu_tklist" id="fv_gaji_tu_tklist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v_gaji_tu_tk">
<?php if ($v_gaji_tu_tk->getCurrentMasterTable() == "v_tu_tk" && $v_gaji_tu_tk->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="v_tu_tk">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($v_gaji_tu_tk_list->pid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_v_gaji_tu_tk" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($v_gaji_tu_tk_list->TotalRecords > 0 || $v_gaji_tu_tk_list->isGridEdit()) { ?>
<table id="tbl_v_gaji_tu_tklist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v_gaji_tu_tk->RowType = ROWTYPE_HEADER;

// Render list options
$v_gaji_tu_tk_list->renderListOptions();

// Render list options (header, left)
$v_gaji_tu_tk_list->ListOptions->render("header", "left");
?>
<?php if ($v_gaji_tu_tk_list->pegawai->Visible) { // pegawai ?>
	<?php if ($v_gaji_tu_tk_list->SortUrl($v_gaji_tu_tk_list->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $v_gaji_tu_tk_list->pegawai->headerCellClass() ?>"><div id="elh_v_gaji_tu_tk_pegawai" class="v_gaji_tu_tk_pegawai"><div class="ew-table-header-caption"><?php echo $v_gaji_tu_tk_list->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $v_gaji_tu_tk_list->pegawai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_gaji_tu_tk_list->SortUrl($v_gaji_tu_tk_list->pegawai) ?>', 1);"><div id="elh_v_gaji_tu_tk_pegawai" class="v_gaji_tu_tk_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_tu_tk_list->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_tu_tk_list->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_tu_tk_list->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gaji_tu_tk_list->rekbank->Visible) { // rekbank ?>
	<?php if ($v_gaji_tu_tk_list->SortUrl($v_gaji_tu_tk_list->rekbank) == "") { ?>
		<th data-name="rekbank" class="<?php echo $v_gaji_tu_tk_list->rekbank->headerCellClass() ?>"><div id="elh_v_gaji_tu_tk_rekbank" class="v_gaji_tu_tk_rekbank"><div class="ew-table-header-caption"><?php echo $v_gaji_tu_tk_list->rekbank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rekbank" class="<?php echo $v_gaji_tu_tk_list->rekbank->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_gaji_tu_tk_list->SortUrl($v_gaji_tu_tk_list->rekbank) ?>', 1);"><div id="elh_v_gaji_tu_tk_rekbank" class="v_gaji_tu_tk_rekbank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_tu_tk_list->rekbank->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_tu_tk_list->rekbank->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_tu_tk_list->rekbank->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gaji_tu_tk_list->total->Visible) { // total ?>
	<?php if ($v_gaji_tu_tk_list->SortUrl($v_gaji_tu_tk_list->total) == "") { ?>
		<th data-name="total" class="<?php echo $v_gaji_tu_tk_list->total->headerCellClass() ?>"><div id="elh_v_gaji_tu_tk_total" class="v_gaji_tu_tk_total"><div class="ew-table-header-caption"><?php echo $v_gaji_tu_tk_list->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $v_gaji_tu_tk_list->total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_gaji_tu_tk_list->SortUrl($v_gaji_tu_tk_list->total) ?>', 1);"><div id="elh_v_gaji_tu_tk_total" class="v_gaji_tu_tk_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_tu_tk_list->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_tu_tk_list->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_tu_tk_list->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gaji_tu_tk_list->potongan->Visible) { // potongan ?>
	<?php if ($v_gaji_tu_tk_list->SortUrl($v_gaji_tu_tk_list->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $v_gaji_tu_tk_list->potongan->headerCellClass() ?>"><div id="elh_v_gaji_tu_tk_potongan" class="v_gaji_tu_tk_potongan"><div class="ew-table-header-caption"><?php echo $v_gaji_tu_tk_list->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $v_gaji_tu_tk_list->potongan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_gaji_tu_tk_list->SortUrl($v_gaji_tu_tk_list->potongan) ?>', 1);"><div id="elh_v_gaji_tu_tk_potongan" class="v_gaji_tu_tk_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_tu_tk_list->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_tu_tk_list->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_tu_tk_list->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v_gaji_tu_tk_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v_gaji_tu_tk_list->ExportAll && $v_gaji_tu_tk_list->isExport()) {
	$v_gaji_tu_tk_list->StopRecord = $v_gaji_tu_tk_list->TotalRecords;
} else {

	// Set the last record to display
	if ($v_gaji_tu_tk_list->TotalRecords > $v_gaji_tu_tk_list->StartRecord + $v_gaji_tu_tk_list->DisplayRecords - 1)
		$v_gaji_tu_tk_list->StopRecord = $v_gaji_tu_tk_list->StartRecord + $v_gaji_tu_tk_list->DisplayRecords - 1;
	else
		$v_gaji_tu_tk_list->StopRecord = $v_gaji_tu_tk_list->TotalRecords;
}
$v_gaji_tu_tk_list->RecordCount = $v_gaji_tu_tk_list->StartRecord - 1;
if ($v_gaji_tu_tk_list->Recordset && !$v_gaji_tu_tk_list->Recordset->EOF) {
	$v_gaji_tu_tk_list->Recordset->moveFirst();
	$selectLimit = $v_gaji_tu_tk_list->UseSelectLimit;
	if (!$selectLimit && $v_gaji_tu_tk_list->StartRecord > 1)
		$v_gaji_tu_tk_list->Recordset->move($v_gaji_tu_tk_list->StartRecord - 1);
} elseif (!$v_gaji_tu_tk->AllowAddDeleteRow && $v_gaji_tu_tk_list->StopRecord == 0) {
	$v_gaji_tu_tk_list->StopRecord = $v_gaji_tu_tk->GridAddRowCount;
}

// Initialize aggregate
$v_gaji_tu_tk->RowType = ROWTYPE_AGGREGATEINIT;
$v_gaji_tu_tk->resetAttributes();
$v_gaji_tu_tk_list->renderRow();
while ($v_gaji_tu_tk_list->RecordCount < $v_gaji_tu_tk_list->StopRecord) {
	$v_gaji_tu_tk_list->RecordCount++;
	if ($v_gaji_tu_tk_list->RecordCount >= $v_gaji_tu_tk_list->StartRecord) {
		$v_gaji_tu_tk_list->RowCount++;

		// Set up key count
		$v_gaji_tu_tk_list->KeyCount = $v_gaji_tu_tk_list->RowIndex;

		// Init row class and style
		$v_gaji_tu_tk->resetAttributes();
		$v_gaji_tu_tk->CssClass = "";
		if ($v_gaji_tu_tk_list->isGridAdd()) {
		} else {
			$v_gaji_tu_tk_list->loadRowValues($v_gaji_tu_tk_list->Recordset); // Load row values
		}
		$v_gaji_tu_tk->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v_gaji_tu_tk->RowAttrs->merge(["data-rowindex" => $v_gaji_tu_tk_list->RowCount, "id" => "r" . $v_gaji_tu_tk_list->RowCount . "_v_gaji_tu_tk", "data-rowtype" => $v_gaji_tu_tk->RowType]);

		// Render row
		$v_gaji_tu_tk_list->renderRow();

		// Render list options
		$v_gaji_tu_tk_list->renderListOptions();
?>
	<tr <?php echo $v_gaji_tu_tk->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_gaji_tu_tk_list->ListOptions->render("body", "left", $v_gaji_tu_tk_list->RowCount);
?>
	<?php if ($v_gaji_tu_tk_list->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $v_gaji_tu_tk_list->pegawai->cellAttributes() ?>>
<span id="el<?php echo $v_gaji_tu_tk_list->RowCount ?>_v_gaji_tu_tk_pegawai">
<span<?php echo $v_gaji_tu_tk_list->pegawai->viewAttributes() ?>><?php echo $v_gaji_tu_tk_list->pegawai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_gaji_tu_tk_list->rekbank->Visible) { // rekbank ?>
		<td data-name="rekbank" <?php echo $v_gaji_tu_tk_list->rekbank->cellAttributes() ?>>
<span id="el<?php echo $v_gaji_tu_tk_list->RowCount ?>_v_gaji_tu_tk_rekbank">
<span<?php echo $v_gaji_tu_tk_list->rekbank->viewAttributes() ?>><?php echo $v_gaji_tu_tk_list->rekbank->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_gaji_tu_tk_list->total->Visible) { // total ?>
		<td data-name="total" <?php echo $v_gaji_tu_tk_list->total->cellAttributes() ?>>
<span id="el<?php echo $v_gaji_tu_tk_list->RowCount ?>_v_gaji_tu_tk_total">
<span<?php echo $v_gaji_tu_tk_list->total->viewAttributes() ?>><?php echo $v_gaji_tu_tk_list->total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_gaji_tu_tk_list->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $v_gaji_tu_tk_list->potongan->cellAttributes() ?>>
<span id="el<?php echo $v_gaji_tu_tk_list->RowCount ?>_v_gaji_tu_tk_potongan">
<span<?php echo $v_gaji_tu_tk_list->potongan->viewAttributes() ?>><?php echo $v_gaji_tu_tk_list->potongan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v_gaji_tu_tk_list->ListOptions->render("body", "right", $v_gaji_tu_tk_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$v_gaji_tu_tk_list->isGridAdd())
		$v_gaji_tu_tk_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$v_gaji_tu_tk->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v_gaji_tu_tk_list->Recordset)
	$v_gaji_tu_tk_list->Recordset->Close();
?>
<?php if (!$v_gaji_tu_tk_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v_gaji_tu_tk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v_gaji_tu_tk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_gaji_tu_tk_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v_gaji_tu_tk_list->TotalRecords == 0 && !$v_gaji_tu_tk->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v_gaji_tu_tk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v_gaji_tu_tk_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$v_gaji_tu_tk_list->isExport()) { ?>
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
$v_gaji_tu_tk_list->terminate();
?>