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
$v_gaji_karyawan_sd_list = new v_gaji_karyawan_sd_list();

// Run the page
$v_gaji_karyawan_sd_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_gaji_karyawan_sd_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$v_gaji_karyawan_sd_list->isExport()) { ?>
<script>
var fv_gaji_karyawan_sdlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fv_gaji_karyawan_sdlist = currentForm = new ew.Form("fv_gaji_karyawan_sdlist", "list");
	fv_gaji_karyawan_sdlist.formKeyCountName = '<?php echo $v_gaji_karyawan_sd_list->FormKeyCountName ?>';
	loadjs.done("fv_gaji_karyawan_sdlist");
});
var fv_gaji_karyawan_sdlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fv_gaji_karyawan_sdlistsrch = currentSearchForm = new ew.Form("fv_gaji_karyawan_sdlistsrch");

	// Dynamic selection lists
	// Filters

	fv_gaji_karyawan_sdlistsrch.filterList = <?php echo $v_gaji_karyawan_sd_list->getFilterList() ?>;
	loadjs.done("fv_gaji_karyawan_sdlistsrch");
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
<?php if (!$v_gaji_karyawan_sd_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v_gaji_karyawan_sd_list->TotalRecords > 0 && $v_gaji_karyawan_sd_list->ExportOptions->visible()) { ?>
<?php $v_gaji_karyawan_sd_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v_gaji_karyawan_sd_list->ImportOptions->visible()) { ?>
<?php $v_gaji_karyawan_sd_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v_gaji_karyawan_sd_list->SearchOptions->visible()) { ?>
<?php $v_gaji_karyawan_sd_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v_gaji_karyawan_sd_list->FilterOptions->visible()) { ?>
<?php $v_gaji_karyawan_sd_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$v_gaji_karyawan_sd_list->isExport() || Config("EXPORT_MASTER_RECORD") && $v_gaji_karyawan_sd_list->isExport("print")) { ?>
<?php
if ($v_gaji_karyawan_sd_list->DbMasterFilter != "" && $v_gaji_karyawan_sd->getCurrentMasterTable() == "v_karyawan_sd") {
	if ($v_gaji_karyawan_sd_list->MasterRecordExists) {
		include_once "v_karyawan_sdmaster.php";
	}
}
?>
<?php } ?>
<?php
$v_gaji_karyawan_sd_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v_gaji_karyawan_sd_list->isExport() && !$v_gaji_karyawan_sd->CurrentAction) { ?>
<form name="fv_gaji_karyawan_sdlistsrch" id="fv_gaji_karyawan_sdlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fv_gaji_karyawan_sdlistsrch-search-panel" class="<?php echo $v_gaji_karyawan_sd_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v_gaji_karyawan_sd">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $v_gaji_karyawan_sd_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($v_gaji_karyawan_sd_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($v_gaji_karyawan_sd_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $v_gaji_karyawan_sd_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($v_gaji_karyawan_sd_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($v_gaji_karyawan_sd_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($v_gaji_karyawan_sd_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($v_gaji_karyawan_sd_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $v_gaji_karyawan_sd_list->showPageHeader(); ?>
<?php
$v_gaji_karyawan_sd_list->showMessage();
?>
<?php if ($v_gaji_karyawan_sd_list->TotalRecords > 0 || $v_gaji_karyawan_sd->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v_gaji_karyawan_sd_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v_gaji_karyawan_sd">
<?php if (!$v_gaji_karyawan_sd_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$v_gaji_karyawan_sd_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v_gaji_karyawan_sd_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_gaji_karyawan_sd_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fv_gaji_karyawan_sdlist" id="fv_gaji_karyawan_sdlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v_gaji_karyawan_sd">
<?php if ($v_gaji_karyawan_sd->getCurrentMasterTable() == "v_karyawan_sd" && $v_gaji_karyawan_sd->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="v_karyawan_sd">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($v_gaji_karyawan_sd_list->pid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_v_gaji_karyawan_sd" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($v_gaji_karyawan_sd_list->TotalRecords > 0 || $v_gaji_karyawan_sd_list->isGridEdit()) { ?>
<table id="tbl_v_gaji_karyawan_sdlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v_gaji_karyawan_sd->RowType = ROWTYPE_HEADER;

// Render list options
$v_gaji_karyawan_sd_list->renderListOptions();

// Render list options (header, left)
$v_gaji_karyawan_sd_list->ListOptions->render("header", "left");
?>
<?php if ($v_gaji_karyawan_sd_list->pegawai->Visible) { // pegawai ?>
	<?php if ($v_gaji_karyawan_sd_list->SortUrl($v_gaji_karyawan_sd_list->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $v_gaji_karyawan_sd_list->pegawai->headerCellClass() ?>"><div id="elh_v_gaji_karyawan_sd_pegawai" class="v_gaji_karyawan_sd_pegawai"><div class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sd_list->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $v_gaji_karyawan_sd_list->pegawai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_gaji_karyawan_sd_list->SortUrl($v_gaji_karyawan_sd_list->pegawai) ?>', 1);"><div id="elh_v_gaji_karyawan_sd_pegawai" class="v_gaji_karyawan_sd_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sd_list->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_karyawan_sd_list->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_karyawan_sd_list->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gaji_karyawan_sd_list->rekbank->Visible) { // rekbank ?>
	<?php if ($v_gaji_karyawan_sd_list->SortUrl($v_gaji_karyawan_sd_list->rekbank) == "") { ?>
		<th data-name="rekbank" class="<?php echo $v_gaji_karyawan_sd_list->rekbank->headerCellClass() ?>"><div id="elh_v_gaji_karyawan_sd_rekbank" class="v_gaji_karyawan_sd_rekbank"><div class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sd_list->rekbank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rekbank" class="<?php echo $v_gaji_karyawan_sd_list->rekbank->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_gaji_karyawan_sd_list->SortUrl($v_gaji_karyawan_sd_list->rekbank) ?>', 1);"><div id="elh_v_gaji_karyawan_sd_rekbank" class="v_gaji_karyawan_sd_rekbank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sd_list->rekbank->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_karyawan_sd_list->rekbank->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_karyawan_sd_list->rekbank->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gaji_karyawan_sd_list->total->Visible) { // total ?>
	<?php if ($v_gaji_karyawan_sd_list->SortUrl($v_gaji_karyawan_sd_list->total) == "") { ?>
		<th data-name="total" class="<?php echo $v_gaji_karyawan_sd_list->total->headerCellClass() ?>"><div id="elh_v_gaji_karyawan_sd_total" class="v_gaji_karyawan_sd_total"><div class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sd_list->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $v_gaji_karyawan_sd_list->total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_gaji_karyawan_sd_list->SortUrl($v_gaji_karyawan_sd_list->total) ?>', 1);"><div id="elh_v_gaji_karyawan_sd_total" class="v_gaji_karyawan_sd_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sd_list->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_karyawan_sd_list->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_karyawan_sd_list->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gaji_karyawan_sd_list->potongan->Visible) { // potongan ?>
	<?php if ($v_gaji_karyawan_sd_list->SortUrl($v_gaji_karyawan_sd_list->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $v_gaji_karyawan_sd_list->potongan->headerCellClass() ?>"><div id="elh_v_gaji_karyawan_sd_potongan" class="v_gaji_karyawan_sd_potongan"><div class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sd_list->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $v_gaji_karyawan_sd_list->potongan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_gaji_karyawan_sd_list->SortUrl($v_gaji_karyawan_sd_list->potongan) ?>', 1);"><div id="elh_v_gaji_karyawan_sd_potongan" class="v_gaji_karyawan_sd_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sd_list->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_karyawan_sd_list->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_karyawan_sd_list->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v_gaji_karyawan_sd_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v_gaji_karyawan_sd_list->ExportAll && $v_gaji_karyawan_sd_list->isExport()) {
	$v_gaji_karyawan_sd_list->StopRecord = $v_gaji_karyawan_sd_list->TotalRecords;
} else {

	// Set the last record to display
	if ($v_gaji_karyawan_sd_list->TotalRecords > $v_gaji_karyawan_sd_list->StartRecord + $v_gaji_karyawan_sd_list->DisplayRecords - 1)
		$v_gaji_karyawan_sd_list->StopRecord = $v_gaji_karyawan_sd_list->StartRecord + $v_gaji_karyawan_sd_list->DisplayRecords - 1;
	else
		$v_gaji_karyawan_sd_list->StopRecord = $v_gaji_karyawan_sd_list->TotalRecords;
}
$v_gaji_karyawan_sd_list->RecordCount = $v_gaji_karyawan_sd_list->StartRecord - 1;
if ($v_gaji_karyawan_sd_list->Recordset && !$v_gaji_karyawan_sd_list->Recordset->EOF) {
	$v_gaji_karyawan_sd_list->Recordset->moveFirst();
	$selectLimit = $v_gaji_karyawan_sd_list->UseSelectLimit;
	if (!$selectLimit && $v_gaji_karyawan_sd_list->StartRecord > 1)
		$v_gaji_karyawan_sd_list->Recordset->move($v_gaji_karyawan_sd_list->StartRecord - 1);
} elseif (!$v_gaji_karyawan_sd->AllowAddDeleteRow && $v_gaji_karyawan_sd_list->StopRecord == 0) {
	$v_gaji_karyawan_sd_list->StopRecord = $v_gaji_karyawan_sd->GridAddRowCount;
}

// Initialize aggregate
$v_gaji_karyawan_sd->RowType = ROWTYPE_AGGREGATEINIT;
$v_gaji_karyawan_sd->resetAttributes();
$v_gaji_karyawan_sd_list->renderRow();
while ($v_gaji_karyawan_sd_list->RecordCount < $v_gaji_karyawan_sd_list->StopRecord) {
	$v_gaji_karyawan_sd_list->RecordCount++;
	if ($v_gaji_karyawan_sd_list->RecordCount >= $v_gaji_karyawan_sd_list->StartRecord) {
		$v_gaji_karyawan_sd_list->RowCount++;

		// Set up key count
		$v_gaji_karyawan_sd_list->KeyCount = $v_gaji_karyawan_sd_list->RowIndex;

		// Init row class and style
		$v_gaji_karyawan_sd->resetAttributes();
		$v_gaji_karyawan_sd->CssClass = "";
		if ($v_gaji_karyawan_sd_list->isGridAdd()) {
		} else {
			$v_gaji_karyawan_sd_list->loadRowValues($v_gaji_karyawan_sd_list->Recordset); // Load row values
		}
		$v_gaji_karyawan_sd->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v_gaji_karyawan_sd->RowAttrs->merge(["data-rowindex" => $v_gaji_karyawan_sd_list->RowCount, "id" => "r" . $v_gaji_karyawan_sd_list->RowCount . "_v_gaji_karyawan_sd", "data-rowtype" => $v_gaji_karyawan_sd->RowType]);

		// Render row
		$v_gaji_karyawan_sd_list->renderRow();

		// Render list options
		$v_gaji_karyawan_sd_list->renderListOptions();
?>
	<tr <?php echo $v_gaji_karyawan_sd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_gaji_karyawan_sd_list->ListOptions->render("body", "left", $v_gaji_karyawan_sd_list->RowCount);
?>
	<?php if ($v_gaji_karyawan_sd_list->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $v_gaji_karyawan_sd_list->pegawai->cellAttributes() ?>>
<span id="el<?php echo $v_gaji_karyawan_sd_list->RowCount ?>_v_gaji_karyawan_sd_pegawai">
<span<?php echo $v_gaji_karyawan_sd_list->pegawai->viewAttributes() ?>><?php echo $v_gaji_karyawan_sd_list->pegawai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_gaji_karyawan_sd_list->rekbank->Visible) { // rekbank ?>
		<td data-name="rekbank" <?php echo $v_gaji_karyawan_sd_list->rekbank->cellAttributes() ?>>
<span id="el<?php echo $v_gaji_karyawan_sd_list->RowCount ?>_v_gaji_karyawan_sd_rekbank">
<span<?php echo $v_gaji_karyawan_sd_list->rekbank->viewAttributes() ?>><?php echo $v_gaji_karyawan_sd_list->rekbank->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_gaji_karyawan_sd_list->total->Visible) { // total ?>
		<td data-name="total" <?php echo $v_gaji_karyawan_sd_list->total->cellAttributes() ?>>
<span id="el<?php echo $v_gaji_karyawan_sd_list->RowCount ?>_v_gaji_karyawan_sd_total">
<span<?php echo $v_gaji_karyawan_sd_list->total->viewAttributes() ?>><?php echo $v_gaji_karyawan_sd_list->total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_gaji_karyawan_sd_list->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $v_gaji_karyawan_sd_list->potongan->cellAttributes() ?>>
<span id="el<?php echo $v_gaji_karyawan_sd_list->RowCount ?>_v_gaji_karyawan_sd_potongan">
<span<?php echo $v_gaji_karyawan_sd_list->potongan->viewAttributes() ?>><?php echo $v_gaji_karyawan_sd_list->potongan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v_gaji_karyawan_sd_list->ListOptions->render("body", "right", $v_gaji_karyawan_sd_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$v_gaji_karyawan_sd_list->isGridAdd())
		$v_gaji_karyawan_sd_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$v_gaji_karyawan_sd->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v_gaji_karyawan_sd_list->Recordset)
	$v_gaji_karyawan_sd_list->Recordset->Close();
?>
<?php if (!$v_gaji_karyawan_sd_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v_gaji_karyawan_sd_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v_gaji_karyawan_sd_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_gaji_karyawan_sd_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v_gaji_karyawan_sd_list->TotalRecords == 0 && !$v_gaji_karyawan_sd->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v_gaji_karyawan_sd_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v_gaji_karyawan_sd_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$v_gaji_karyawan_sd_list->isExport()) { ?>
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
$v_gaji_karyawan_sd_list->terminate();
?>