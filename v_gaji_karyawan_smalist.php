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
$v_gaji_karyawan_sma_list = new v_gaji_karyawan_sma_list();

// Run the page
$v_gaji_karyawan_sma_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_gaji_karyawan_sma_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$v_gaji_karyawan_sma_list->isExport()) { ?>
<script>
var fv_gaji_karyawan_smalist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fv_gaji_karyawan_smalist = currentForm = new ew.Form("fv_gaji_karyawan_smalist", "list");
	fv_gaji_karyawan_smalist.formKeyCountName = '<?php echo $v_gaji_karyawan_sma_list->FormKeyCountName ?>';
	loadjs.done("fv_gaji_karyawan_smalist");
});
var fv_gaji_karyawan_smalistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fv_gaji_karyawan_smalistsrch = currentSearchForm = new ew.Form("fv_gaji_karyawan_smalistsrch");

	// Dynamic selection lists
	// Filters

	fv_gaji_karyawan_smalistsrch.filterList = <?php echo $v_gaji_karyawan_sma_list->getFilterList() ?>;
	loadjs.done("fv_gaji_karyawan_smalistsrch");
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
<?php if (!$v_gaji_karyawan_sma_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v_gaji_karyawan_sma_list->TotalRecords > 0 && $v_gaji_karyawan_sma_list->ExportOptions->visible()) { ?>
<?php $v_gaji_karyawan_sma_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v_gaji_karyawan_sma_list->ImportOptions->visible()) { ?>
<?php $v_gaji_karyawan_sma_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v_gaji_karyawan_sma_list->SearchOptions->visible()) { ?>
<?php $v_gaji_karyawan_sma_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v_gaji_karyawan_sma_list->FilterOptions->visible()) { ?>
<?php $v_gaji_karyawan_sma_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$v_gaji_karyawan_sma_list->isExport() || Config("EXPORT_MASTER_RECORD") && $v_gaji_karyawan_sma_list->isExport("print")) { ?>
<?php
if ($v_gaji_karyawan_sma_list->DbMasterFilter != "" && $v_gaji_karyawan_sma->getCurrentMasterTable() == "v_karyawan_sma") {
	if ($v_gaji_karyawan_sma_list->MasterRecordExists) {
		include_once "v_karyawan_smamaster.php";
	}
}
?>
<?php } ?>
<?php
$v_gaji_karyawan_sma_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v_gaji_karyawan_sma_list->isExport() && !$v_gaji_karyawan_sma->CurrentAction) { ?>
<form name="fv_gaji_karyawan_smalistsrch" id="fv_gaji_karyawan_smalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fv_gaji_karyawan_smalistsrch-search-panel" class="<?php echo $v_gaji_karyawan_sma_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v_gaji_karyawan_sma">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $v_gaji_karyawan_sma_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($v_gaji_karyawan_sma_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($v_gaji_karyawan_sma_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $v_gaji_karyawan_sma_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($v_gaji_karyawan_sma_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($v_gaji_karyawan_sma_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($v_gaji_karyawan_sma_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($v_gaji_karyawan_sma_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $v_gaji_karyawan_sma_list->showPageHeader(); ?>
<?php
$v_gaji_karyawan_sma_list->showMessage();
?>
<?php if ($v_gaji_karyawan_sma_list->TotalRecords > 0 || $v_gaji_karyawan_sma->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v_gaji_karyawan_sma_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v_gaji_karyawan_sma">
<?php if (!$v_gaji_karyawan_sma_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$v_gaji_karyawan_sma_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v_gaji_karyawan_sma_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_gaji_karyawan_sma_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fv_gaji_karyawan_smalist" id="fv_gaji_karyawan_smalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v_gaji_karyawan_sma">
<?php if ($v_gaji_karyawan_sma->getCurrentMasterTable() == "v_karyawan_sma" && $v_gaji_karyawan_sma->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="v_karyawan_sma">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($v_gaji_karyawan_sma_list->pid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_v_gaji_karyawan_sma" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($v_gaji_karyawan_sma_list->TotalRecords > 0 || $v_gaji_karyawan_sma_list->isGridEdit()) { ?>
<table id="tbl_v_gaji_karyawan_smalist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v_gaji_karyawan_sma->RowType = ROWTYPE_HEADER;

// Render list options
$v_gaji_karyawan_sma_list->renderListOptions();

// Render list options (header, left)
$v_gaji_karyawan_sma_list->ListOptions->render("header", "left");
?>
<?php if ($v_gaji_karyawan_sma_list->pegawai->Visible) { // pegawai ?>
	<?php if ($v_gaji_karyawan_sma_list->SortUrl($v_gaji_karyawan_sma_list->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $v_gaji_karyawan_sma_list->pegawai->headerCellClass() ?>"><div id="elh_v_gaji_karyawan_sma_pegawai" class="v_gaji_karyawan_sma_pegawai"><div class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sma_list->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $v_gaji_karyawan_sma_list->pegawai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_gaji_karyawan_sma_list->SortUrl($v_gaji_karyawan_sma_list->pegawai) ?>', 1);"><div id="elh_v_gaji_karyawan_sma_pegawai" class="v_gaji_karyawan_sma_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sma_list->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_karyawan_sma_list->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_karyawan_sma_list->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gaji_karyawan_sma_list->rekbank->Visible) { // rekbank ?>
	<?php if ($v_gaji_karyawan_sma_list->SortUrl($v_gaji_karyawan_sma_list->rekbank) == "") { ?>
		<th data-name="rekbank" class="<?php echo $v_gaji_karyawan_sma_list->rekbank->headerCellClass() ?>"><div id="elh_v_gaji_karyawan_sma_rekbank" class="v_gaji_karyawan_sma_rekbank"><div class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sma_list->rekbank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rekbank" class="<?php echo $v_gaji_karyawan_sma_list->rekbank->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_gaji_karyawan_sma_list->SortUrl($v_gaji_karyawan_sma_list->rekbank) ?>', 1);"><div id="elh_v_gaji_karyawan_sma_rekbank" class="v_gaji_karyawan_sma_rekbank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sma_list->rekbank->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_karyawan_sma_list->rekbank->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_karyawan_sma_list->rekbank->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gaji_karyawan_sma_list->total->Visible) { // total ?>
	<?php if ($v_gaji_karyawan_sma_list->SortUrl($v_gaji_karyawan_sma_list->total) == "") { ?>
		<th data-name="total" class="<?php echo $v_gaji_karyawan_sma_list->total->headerCellClass() ?>"><div id="elh_v_gaji_karyawan_sma_total" class="v_gaji_karyawan_sma_total"><div class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sma_list->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $v_gaji_karyawan_sma_list->total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_gaji_karyawan_sma_list->SortUrl($v_gaji_karyawan_sma_list->total) ?>', 1);"><div id="elh_v_gaji_karyawan_sma_total" class="v_gaji_karyawan_sma_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sma_list->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_karyawan_sma_list->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_karyawan_sma_list->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gaji_karyawan_sma_list->potongan->Visible) { // potongan ?>
	<?php if ($v_gaji_karyawan_sma_list->SortUrl($v_gaji_karyawan_sma_list->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $v_gaji_karyawan_sma_list->potongan->headerCellClass() ?>"><div id="elh_v_gaji_karyawan_sma_potongan" class="v_gaji_karyawan_sma_potongan"><div class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sma_list->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $v_gaji_karyawan_sma_list->potongan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_gaji_karyawan_sma_list->SortUrl($v_gaji_karyawan_sma_list->potongan) ?>', 1);"><div id="elh_v_gaji_karyawan_sma_potongan" class="v_gaji_karyawan_sma_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_karyawan_sma_list->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_karyawan_sma_list->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_karyawan_sma_list->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v_gaji_karyawan_sma_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v_gaji_karyawan_sma_list->ExportAll && $v_gaji_karyawan_sma_list->isExport()) {
	$v_gaji_karyawan_sma_list->StopRecord = $v_gaji_karyawan_sma_list->TotalRecords;
} else {

	// Set the last record to display
	if ($v_gaji_karyawan_sma_list->TotalRecords > $v_gaji_karyawan_sma_list->StartRecord + $v_gaji_karyawan_sma_list->DisplayRecords - 1)
		$v_gaji_karyawan_sma_list->StopRecord = $v_gaji_karyawan_sma_list->StartRecord + $v_gaji_karyawan_sma_list->DisplayRecords - 1;
	else
		$v_gaji_karyawan_sma_list->StopRecord = $v_gaji_karyawan_sma_list->TotalRecords;
}
$v_gaji_karyawan_sma_list->RecordCount = $v_gaji_karyawan_sma_list->StartRecord - 1;
if ($v_gaji_karyawan_sma_list->Recordset && !$v_gaji_karyawan_sma_list->Recordset->EOF) {
	$v_gaji_karyawan_sma_list->Recordset->moveFirst();
	$selectLimit = $v_gaji_karyawan_sma_list->UseSelectLimit;
	if (!$selectLimit && $v_gaji_karyawan_sma_list->StartRecord > 1)
		$v_gaji_karyawan_sma_list->Recordset->move($v_gaji_karyawan_sma_list->StartRecord - 1);
} elseif (!$v_gaji_karyawan_sma->AllowAddDeleteRow && $v_gaji_karyawan_sma_list->StopRecord == 0) {
	$v_gaji_karyawan_sma_list->StopRecord = $v_gaji_karyawan_sma->GridAddRowCount;
}

// Initialize aggregate
$v_gaji_karyawan_sma->RowType = ROWTYPE_AGGREGATEINIT;
$v_gaji_karyawan_sma->resetAttributes();
$v_gaji_karyawan_sma_list->renderRow();
while ($v_gaji_karyawan_sma_list->RecordCount < $v_gaji_karyawan_sma_list->StopRecord) {
	$v_gaji_karyawan_sma_list->RecordCount++;
	if ($v_gaji_karyawan_sma_list->RecordCount >= $v_gaji_karyawan_sma_list->StartRecord) {
		$v_gaji_karyawan_sma_list->RowCount++;

		// Set up key count
		$v_gaji_karyawan_sma_list->KeyCount = $v_gaji_karyawan_sma_list->RowIndex;

		// Init row class and style
		$v_gaji_karyawan_sma->resetAttributes();
		$v_gaji_karyawan_sma->CssClass = "";
		if ($v_gaji_karyawan_sma_list->isGridAdd()) {
		} else {
			$v_gaji_karyawan_sma_list->loadRowValues($v_gaji_karyawan_sma_list->Recordset); // Load row values
		}
		$v_gaji_karyawan_sma->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v_gaji_karyawan_sma->RowAttrs->merge(["data-rowindex" => $v_gaji_karyawan_sma_list->RowCount, "id" => "r" . $v_gaji_karyawan_sma_list->RowCount . "_v_gaji_karyawan_sma", "data-rowtype" => $v_gaji_karyawan_sma->RowType]);

		// Render row
		$v_gaji_karyawan_sma_list->renderRow();

		// Render list options
		$v_gaji_karyawan_sma_list->renderListOptions();
?>
	<tr <?php echo $v_gaji_karyawan_sma->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_gaji_karyawan_sma_list->ListOptions->render("body", "left", $v_gaji_karyawan_sma_list->RowCount);
?>
	<?php if ($v_gaji_karyawan_sma_list->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $v_gaji_karyawan_sma_list->pegawai->cellAttributes() ?>>
<span id="el<?php echo $v_gaji_karyawan_sma_list->RowCount ?>_v_gaji_karyawan_sma_pegawai">
<span<?php echo $v_gaji_karyawan_sma_list->pegawai->viewAttributes() ?>><?php echo $v_gaji_karyawan_sma_list->pegawai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_gaji_karyawan_sma_list->rekbank->Visible) { // rekbank ?>
		<td data-name="rekbank" <?php echo $v_gaji_karyawan_sma_list->rekbank->cellAttributes() ?>>
<span id="el<?php echo $v_gaji_karyawan_sma_list->RowCount ?>_v_gaji_karyawan_sma_rekbank">
<span<?php echo $v_gaji_karyawan_sma_list->rekbank->viewAttributes() ?>><?php echo $v_gaji_karyawan_sma_list->rekbank->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_gaji_karyawan_sma_list->total->Visible) { // total ?>
		<td data-name="total" <?php echo $v_gaji_karyawan_sma_list->total->cellAttributes() ?>>
<span id="el<?php echo $v_gaji_karyawan_sma_list->RowCount ?>_v_gaji_karyawan_sma_total">
<span<?php echo $v_gaji_karyawan_sma_list->total->viewAttributes() ?>><?php echo $v_gaji_karyawan_sma_list->total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_gaji_karyawan_sma_list->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $v_gaji_karyawan_sma_list->potongan->cellAttributes() ?>>
<span id="el<?php echo $v_gaji_karyawan_sma_list->RowCount ?>_v_gaji_karyawan_sma_potongan">
<span<?php echo $v_gaji_karyawan_sma_list->potongan->viewAttributes() ?>><?php echo $v_gaji_karyawan_sma_list->potongan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v_gaji_karyawan_sma_list->ListOptions->render("body", "right", $v_gaji_karyawan_sma_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$v_gaji_karyawan_sma_list->isGridAdd())
		$v_gaji_karyawan_sma_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$v_gaji_karyawan_sma->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v_gaji_karyawan_sma_list->Recordset)
	$v_gaji_karyawan_sma_list->Recordset->Close();
?>
<?php if (!$v_gaji_karyawan_sma_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v_gaji_karyawan_sma_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v_gaji_karyawan_sma_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_gaji_karyawan_sma_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v_gaji_karyawan_sma_list->TotalRecords == 0 && !$v_gaji_karyawan_sma->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v_gaji_karyawan_sma_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v_gaji_karyawan_sma_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$v_gaji_karyawan_sma_list->isExport()) { ?>
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
$v_gaji_karyawan_sma_list->terminate();
?>