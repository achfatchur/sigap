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
$gaji_sma_list = new gaji_sma_list();

// Run the page
$gaji_sma_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_sma_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$gaji_sma_list->isExport()) { ?>
<script>
var fgaji_smalist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fgaji_smalist = currentForm = new ew.Form("fgaji_smalist", "list");
	fgaji_smalist.formKeyCountName = '<?php echo $gaji_sma_list->FormKeyCountName ?>';
	loadjs.done("fgaji_smalist");
});
var fgaji_smalistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fgaji_smalistsrch = currentSearchForm = new ew.Form("fgaji_smalistsrch");

	// Dynamic selection lists
	// Filters

	fgaji_smalistsrch.filterList = <?php echo $gaji_sma_list->getFilterList() ?>;
	loadjs.done("fgaji_smalistsrch");
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
	ew.PREVIEW_OVERLAY = true;
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
<?php if (!$gaji_sma_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($gaji_sma_list->TotalRecords > 0 && $gaji_sma_list->ExportOptions->visible()) { ?>
<?php $gaji_sma_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_sma_list->ImportOptions->visible()) { ?>
<?php $gaji_sma_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_sma_list->SearchOptions->visible()) { ?>
<?php $gaji_sma_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_sma_list->FilterOptions->visible()) { ?>
<?php $gaji_sma_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$gaji_sma_list->isExport() || Config("EXPORT_MASTER_RECORD") && $gaji_sma_list->isExport("print")) { ?>
<?php
if ($gaji_sma_list->DbMasterFilter != "" && $gaji_sma->getCurrentMasterTable() == "m_sma") {
	if ($gaji_sma_list->MasterRecordExists) {
		include_once "m_smamaster.php";
	}
}
?>
<?php } ?>
<?php
$gaji_sma_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$gaji_sma_list->isExport() && !$gaji_sma->CurrentAction) { ?>
<form name="fgaji_smalistsrch" id="fgaji_smalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fgaji_smalistsrch-search-panel" class="<?php echo $gaji_sma_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="gaji_sma">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $gaji_sma_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($gaji_sma_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($gaji_sma_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $gaji_sma_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($gaji_sma_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($gaji_sma_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($gaji_sma_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($gaji_sma_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $gaji_sma_list->showPageHeader(); ?>
<?php
$gaji_sma_list->showMessage();
?>
<?php if ($gaji_sma_list->TotalRecords > 0 || $gaji_sma->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($gaji_sma_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> gaji_sma">
<?php if (!$gaji_sma_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$gaji_sma_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $gaji_sma_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $gaji_sma_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fgaji_smalist" id="fgaji_smalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="gaji_sma">
<?php if ($gaji_sma->getCurrentMasterTable() == "m_sma" && $gaji_sma->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="m_sma">
<input type="hidden" name="fk_bulan" value="<?php echo HtmlEncode($gaji_sma_list->bulan->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($gaji_sma_list->pid->getSessionValue()) ?>">
<input type="hidden" name="fk_tahun" value="<?php echo HtmlEncode($gaji_sma_list->tahun->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_gaji_sma" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($gaji_sma_list->TotalRecords > 0 || $gaji_sma_list->isGridEdit()) { ?>
<table id="tbl_gaji_smalist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$gaji_sma->RowType = ROWTYPE_HEADER;

// Render list options
$gaji_sma_list->renderListOptions();

// Render list options (header, left)
$gaji_sma_list->ListOptions->render("header", "left");
?>
<?php if ($gaji_sma_list->pegawai->Visible) { // pegawai ?>
	<?php if ($gaji_sma_list->SortUrl($gaji_sma_list->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $gaji_sma_list->pegawai->headerCellClass() ?>"><div id="elh_gaji_sma_pegawai" class="gaji_sma_pegawai"><div class="ew-table-header-caption"><?php echo $gaji_sma_list->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $gaji_sma_list->pegawai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_sma_list->SortUrl($gaji_sma_list->pegawai) ?>', 1);"><div id="elh_gaji_sma_pegawai" class="gaji_sma_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_sma_list->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_sma_list->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_sma_list->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_sma_list->sub_total->Visible) { // sub_total ?>
	<?php if ($gaji_sma_list->SortUrl($gaji_sma_list->sub_total) == "") { ?>
		<th data-name="sub_total" class="<?php echo $gaji_sma_list->sub_total->headerCellClass() ?>"><div id="elh_gaji_sma_sub_total" class="gaji_sma_sub_total"><div class="ew-table-header-caption"><?php echo $gaji_sma_list->sub_total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sub_total" class="<?php echo $gaji_sma_list->sub_total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_sma_list->SortUrl($gaji_sma_list->sub_total) ?>', 1);"><div id="elh_gaji_sma_sub_total" class="gaji_sma_sub_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_sma_list->sub_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_sma_list->sub_total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_sma_list->sub_total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_sma_list->penyesuaian->Visible) { // penyesuaian ?>
	<?php if ($gaji_sma_list->SortUrl($gaji_sma_list->penyesuaian) == "") { ?>
		<th data-name="penyesuaian" class="<?php echo $gaji_sma_list->penyesuaian->headerCellClass() ?>"><div id="elh_gaji_sma_penyesuaian" class="gaji_sma_penyesuaian"><div class="ew-table-header-caption"><?php echo $gaji_sma_list->penyesuaian->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="penyesuaian" class="<?php echo $gaji_sma_list->penyesuaian->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_sma_list->SortUrl($gaji_sma_list->penyesuaian) ?>', 1);"><div id="elh_gaji_sma_penyesuaian" class="gaji_sma_penyesuaian">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_sma_list->penyesuaian->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_sma_list->penyesuaian->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_sma_list->penyesuaian->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_sma_list->potongan->Visible) { // potongan ?>
	<?php if ($gaji_sma_list->SortUrl($gaji_sma_list->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $gaji_sma_list->potongan->headerCellClass() ?>"><div id="elh_gaji_sma_potongan" class="gaji_sma_potongan"><div class="ew-table-header-caption"><?php echo $gaji_sma_list->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $gaji_sma_list->potongan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_sma_list->SortUrl($gaji_sma_list->potongan) ?>', 1);"><div id="elh_gaji_sma_potongan" class="gaji_sma_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_sma_list->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_sma_list->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_sma_list->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_sma_list->total->Visible) { // total ?>
	<?php if ($gaji_sma_list->SortUrl($gaji_sma_list->total) == "") { ?>
		<th data-name="total" class="<?php echo $gaji_sma_list->total->headerCellClass() ?>"><div id="elh_gaji_sma_total" class="gaji_sma_total"><div class="ew-table-header-caption"><?php echo $gaji_sma_list->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $gaji_sma_list->total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_sma_list->SortUrl($gaji_sma_list->total) ?>', 1);"><div id="elh_gaji_sma_total" class="gaji_sma_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_sma_list->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_sma_list->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_sma_list->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_sma_list->voucher->Visible) { // voucher ?>
	<?php if ($gaji_sma_list->SortUrl($gaji_sma_list->voucher) == "") { ?>
		<th data-name="voucher" class="<?php echo $gaji_sma_list->voucher->headerCellClass() ?>"><div id="elh_gaji_sma_voucher" class="gaji_sma_voucher"><div class="ew-table-header-caption"><?php echo $gaji_sma_list->voucher->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher" class="<?php echo $gaji_sma_list->voucher->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_sma_list->SortUrl($gaji_sma_list->voucher) ?>', 1);"><div id="elh_gaji_sma_voucher" class="gaji_sma_voucher">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_sma_list->voucher->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_sma_list->voucher->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_sma_list->voucher->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$gaji_sma_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($gaji_sma_list->ExportAll && $gaji_sma_list->isExport()) {
	$gaji_sma_list->StopRecord = $gaji_sma_list->TotalRecords;
} else {

	// Set the last record to display
	if ($gaji_sma_list->TotalRecords > $gaji_sma_list->StartRecord + $gaji_sma_list->DisplayRecords - 1)
		$gaji_sma_list->StopRecord = $gaji_sma_list->StartRecord + $gaji_sma_list->DisplayRecords - 1;
	else
		$gaji_sma_list->StopRecord = $gaji_sma_list->TotalRecords;
}
$gaji_sma_list->RecordCount = $gaji_sma_list->StartRecord - 1;
if ($gaji_sma_list->Recordset && !$gaji_sma_list->Recordset->EOF) {
	$gaji_sma_list->Recordset->moveFirst();
	$selectLimit = $gaji_sma_list->UseSelectLimit;
	if (!$selectLimit && $gaji_sma_list->StartRecord > 1)
		$gaji_sma_list->Recordset->move($gaji_sma_list->StartRecord - 1);
} elseif (!$gaji_sma->AllowAddDeleteRow && $gaji_sma_list->StopRecord == 0) {
	$gaji_sma_list->StopRecord = $gaji_sma->GridAddRowCount;
}

// Initialize aggregate
$gaji_sma->RowType = ROWTYPE_AGGREGATEINIT;
$gaji_sma->resetAttributes();
$gaji_sma_list->renderRow();
while ($gaji_sma_list->RecordCount < $gaji_sma_list->StopRecord) {
	$gaji_sma_list->RecordCount++;
	if ($gaji_sma_list->RecordCount >= $gaji_sma_list->StartRecord) {
		$gaji_sma_list->RowCount++;

		// Set up key count
		$gaji_sma_list->KeyCount = $gaji_sma_list->RowIndex;

		// Init row class and style
		$gaji_sma->resetAttributes();
		$gaji_sma->CssClass = "";
		if ($gaji_sma_list->isGridAdd()) {
		} else {
			$gaji_sma_list->loadRowValues($gaji_sma_list->Recordset); // Load row values
		}
		$gaji_sma->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$gaji_sma->RowAttrs->merge(["data-rowindex" => $gaji_sma_list->RowCount, "id" => "r" . $gaji_sma_list->RowCount . "_gaji_sma", "data-rowtype" => $gaji_sma->RowType]);

		// Render row
		$gaji_sma_list->renderRow();

		// Render list options
		$gaji_sma_list->renderListOptions();
?>
	<tr <?php echo $gaji_sma->rowAttributes() ?>>
<?php

// Render list options (body, left)
$gaji_sma_list->ListOptions->render("body", "left", $gaji_sma_list->RowCount);
?>
	<?php if ($gaji_sma_list->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $gaji_sma_list->pegawai->cellAttributes() ?>>
<span id="el<?php echo $gaji_sma_list->RowCount ?>_gaji_sma_pegawai">
<span<?php echo $gaji_sma_list->pegawai->viewAttributes() ?>><?php echo $gaji_sma_list->pegawai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_sma_list->sub_total->Visible) { // sub_total ?>
		<td data-name="sub_total" <?php echo $gaji_sma_list->sub_total->cellAttributes() ?>>
<span id="el<?php echo $gaji_sma_list->RowCount ?>_gaji_sma_sub_total">
<span<?php echo $gaji_sma_list->sub_total->viewAttributes() ?>><?php echo $gaji_sma_list->sub_total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_sma_list->penyesuaian->Visible) { // penyesuaian ?>
		<td data-name="penyesuaian" <?php echo $gaji_sma_list->penyesuaian->cellAttributes() ?>>
<span id="el<?php echo $gaji_sma_list->RowCount ?>_gaji_sma_penyesuaian">
<span<?php echo $gaji_sma_list->penyesuaian->viewAttributes() ?>><?php echo $gaji_sma_list->penyesuaian->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_sma_list->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $gaji_sma_list->potongan->cellAttributes() ?>>
<span id="el<?php echo $gaji_sma_list->RowCount ?>_gaji_sma_potongan">
<span<?php echo $gaji_sma_list->potongan->viewAttributes() ?>><?php echo $gaji_sma_list->potongan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_sma_list->total->Visible) { // total ?>
		<td data-name="total" <?php echo $gaji_sma_list->total->cellAttributes() ?>>
<span id="el<?php echo $gaji_sma_list->RowCount ?>_gaji_sma_total">
<span<?php echo $gaji_sma_list->total->viewAttributes() ?>><?php echo $gaji_sma_list->total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_sma_list->voucher->Visible) { // voucher ?>
		<td data-name="voucher" <?php echo $gaji_sma_list->voucher->cellAttributes() ?>>
<span id="el<?php echo $gaji_sma_list->RowCount ?>_gaji_sma_voucher">
<span<?php echo $gaji_sma_list->voucher->viewAttributes() ?>><?php echo $gaji_sma_list->voucher->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$gaji_sma_list->ListOptions->render("body", "right", $gaji_sma_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$gaji_sma_list->isGridAdd())
		$gaji_sma_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$gaji_sma->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($gaji_sma_list->Recordset)
	$gaji_sma_list->Recordset->Close();
?>
<?php if (!$gaji_sma_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$gaji_sma_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $gaji_sma_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $gaji_sma_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($gaji_sma_list->TotalRecords == 0 && !$gaji_sma->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $gaji_sma_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$gaji_sma_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$gaji_sma_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

	#r_pegawai{display:none}
	#r_lembur{display:none}
});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$gaji_sma_list->terminate();
?>