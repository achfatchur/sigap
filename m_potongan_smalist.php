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
$m_potongan_sma_list = new m_potongan_sma_list();

// Run the page
$m_potongan_sma_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_potongan_sma_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_potongan_sma_list->isExport()) { ?>
<script>
var fm_potongan_smalist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fm_potongan_smalist = currentForm = new ew.Form("fm_potongan_smalist", "list");
	fm_potongan_smalist.formKeyCountName = '<?php echo $m_potongan_sma_list->FormKeyCountName ?>';
	loadjs.done("fm_potongan_smalist");
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
<?php if (!$m_potongan_sma_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($m_potongan_sma_list->TotalRecords > 0 && $m_potongan_sma_list->ExportOptions->visible()) { ?>
<?php $m_potongan_sma_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($m_potongan_sma_list->ImportOptions->visible()) { ?>
<?php $m_potongan_sma_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$m_potongan_sma_list->renderOtherOptions();
?>
<?php $m_potongan_sma_list->showPageHeader(); ?>
<?php
$m_potongan_sma_list->showMessage();
?>
<?php if ($m_potongan_sma_list->TotalRecords > 0 || $m_potongan_sma->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($m_potongan_sma_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> m_potongan_sma">
<?php if (!$m_potongan_sma_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$m_potongan_sma_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_potongan_sma_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_potongan_sma_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fm_potongan_smalist" id="fm_potongan_smalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_potongan_sma">
<div id="gmp_m_potongan_sma" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($m_potongan_sma_list->TotalRecords > 0 || $m_potongan_sma_list->isGridEdit()) { ?>
<table id="tbl_m_potongan_smalist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$m_potongan_sma->RowType = ROWTYPE_HEADER;

// Render list options
$m_potongan_sma_list->renderListOptions();

// Render list options (header, left)
$m_potongan_sma_list->ListOptions->render("header", "left");
?>
<?php if ($m_potongan_sma_list->tahun->Visible) { // tahun ?>
	<?php if ($m_potongan_sma_list->SortUrl($m_potongan_sma_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $m_potongan_sma_list->tahun->headerCellClass() ?>"><div id="elh_m_potongan_sma_tahun" class="m_potongan_sma_tahun"><div class="ew-table-header-caption"><?php echo $m_potongan_sma_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $m_potongan_sma_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_potongan_sma_list->SortUrl($m_potongan_sma_list->tahun) ?>', 1);"><div id="elh_m_potongan_sma_tahun" class="m_potongan_sma_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_potongan_sma_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_potongan_sma_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_potongan_sma_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_potongan_sma_list->bulan->Visible) { // bulan ?>
	<?php if ($m_potongan_sma_list->SortUrl($m_potongan_sma_list->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $m_potongan_sma_list->bulan->headerCellClass() ?>"><div id="elh_m_potongan_sma_bulan" class="m_potongan_sma_bulan"><div class="ew-table-header-caption"><?php echo $m_potongan_sma_list->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $m_potongan_sma_list->bulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_potongan_sma_list->SortUrl($m_potongan_sma_list->bulan) ?>', 1);"><div id="elh_m_potongan_sma_bulan" class="m_potongan_sma_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_potongan_sma_list->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_potongan_sma_list->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_potongan_sma_list->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_potongan_sma_list->c_by->Visible) { // c_by ?>
	<?php if ($m_potongan_sma_list->SortUrl($m_potongan_sma_list->c_by) == "") { ?>
		<th data-name="c_by" class="<?php echo $m_potongan_sma_list->c_by->headerCellClass() ?>"><div id="elh_m_potongan_sma_c_by" class="m_potongan_sma_c_by"><div class="ew-table-header-caption"><?php echo $m_potongan_sma_list->c_by->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="c_by" class="<?php echo $m_potongan_sma_list->c_by->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_potongan_sma_list->SortUrl($m_potongan_sma_list->c_by) ?>', 1);"><div id="elh_m_potongan_sma_c_by" class="m_potongan_sma_c_by">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_potongan_sma_list->c_by->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_potongan_sma_list->c_by->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_potongan_sma_list->c_by->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_potongan_sma_list->datetime->Visible) { // datetime ?>
	<?php if ($m_potongan_sma_list->SortUrl($m_potongan_sma_list->datetime) == "") { ?>
		<th data-name="datetime" class="<?php echo $m_potongan_sma_list->datetime->headerCellClass() ?>"><div id="elh_m_potongan_sma_datetime" class="m_potongan_sma_datetime"><div class="ew-table-header-caption"><?php echo $m_potongan_sma_list->datetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="datetime" class="<?php echo $m_potongan_sma_list->datetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_potongan_sma_list->SortUrl($m_potongan_sma_list->datetime) ?>', 1);"><div id="elh_m_potongan_sma_datetime" class="m_potongan_sma_datetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_potongan_sma_list->datetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_potongan_sma_list->datetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_potongan_sma_list->datetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$m_potongan_sma_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($m_potongan_sma_list->ExportAll && $m_potongan_sma_list->isExport()) {
	$m_potongan_sma_list->StopRecord = $m_potongan_sma_list->TotalRecords;
} else {

	// Set the last record to display
	if ($m_potongan_sma_list->TotalRecords > $m_potongan_sma_list->StartRecord + $m_potongan_sma_list->DisplayRecords - 1)
		$m_potongan_sma_list->StopRecord = $m_potongan_sma_list->StartRecord + $m_potongan_sma_list->DisplayRecords - 1;
	else
		$m_potongan_sma_list->StopRecord = $m_potongan_sma_list->TotalRecords;
}
$m_potongan_sma_list->RecordCount = $m_potongan_sma_list->StartRecord - 1;
if ($m_potongan_sma_list->Recordset && !$m_potongan_sma_list->Recordset->EOF) {
	$m_potongan_sma_list->Recordset->moveFirst();
	$selectLimit = $m_potongan_sma_list->UseSelectLimit;
	if (!$selectLimit && $m_potongan_sma_list->StartRecord > 1)
		$m_potongan_sma_list->Recordset->move($m_potongan_sma_list->StartRecord - 1);
} elseif (!$m_potongan_sma->AllowAddDeleteRow && $m_potongan_sma_list->StopRecord == 0) {
	$m_potongan_sma_list->StopRecord = $m_potongan_sma->GridAddRowCount;
}

// Initialize aggregate
$m_potongan_sma->RowType = ROWTYPE_AGGREGATEINIT;
$m_potongan_sma->resetAttributes();
$m_potongan_sma_list->renderRow();
while ($m_potongan_sma_list->RecordCount < $m_potongan_sma_list->StopRecord) {
	$m_potongan_sma_list->RecordCount++;
	if ($m_potongan_sma_list->RecordCount >= $m_potongan_sma_list->StartRecord) {
		$m_potongan_sma_list->RowCount++;

		// Set up key count
		$m_potongan_sma_list->KeyCount = $m_potongan_sma_list->RowIndex;

		// Init row class and style
		$m_potongan_sma->resetAttributes();
		$m_potongan_sma->CssClass = "";
		if ($m_potongan_sma_list->isGridAdd()) {
		} else {
			$m_potongan_sma_list->loadRowValues($m_potongan_sma_list->Recordset); // Load row values
		}
		$m_potongan_sma->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$m_potongan_sma->RowAttrs->merge(["data-rowindex" => $m_potongan_sma_list->RowCount, "id" => "r" . $m_potongan_sma_list->RowCount . "_m_potongan_sma", "data-rowtype" => $m_potongan_sma->RowType]);

		// Render row
		$m_potongan_sma_list->renderRow();

		// Render list options
		$m_potongan_sma_list->renderListOptions();
?>
	<tr <?php echo $m_potongan_sma->rowAttributes() ?>>
<?php

// Render list options (body, left)
$m_potongan_sma_list->ListOptions->render("body", "left", $m_potongan_sma_list->RowCount);
?>
	<?php if ($m_potongan_sma_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $m_potongan_sma_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $m_potongan_sma_list->RowCount ?>_m_potongan_sma_tahun">
<span<?php echo $m_potongan_sma_list->tahun->viewAttributes() ?>><?php echo $m_potongan_sma_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_potongan_sma_list->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $m_potongan_sma_list->bulan->cellAttributes() ?>>
<span id="el<?php echo $m_potongan_sma_list->RowCount ?>_m_potongan_sma_bulan">
<span<?php echo $m_potongan_sma_list->bulan->viewAttributes() ?>><?php echo $m_potongan_sma_list->bulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_potongan_sma_list->c_by->Visible) { // c_by ?>
		<td data-name="c_by" <?php echo $m_potongan_sma_list->c_by->cellAttributes() ?>>
<span id="el<?php echo $m_potongan_sma_list->RowCount ?>_m_potongan_sma_c_by">
<span<?php echo $m_potongan_sma_list->c_by->viewAttributes() ?>><?php echo $m_potongan_sma_list->c_by->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_potongan_sma_list->datetime->Visible) { // datetime ?>
		<td data-name="datetime" <?php echo $m_potongan_sma_list->datetime->cellAttributes() ?>>
<span id="el<?php echo $m_potongan_sma_list->RowCount ?>_m_potongan_sma_datetime">
<span<?php echo $m_potongan_sma_list->datetime->viewAttributes() ?>><?php echo $m_potongan_sma_list->datetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$m_potongan_sma_list->ListOptions->render("body", "right", $m_potongan_sma_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$m_potongan_sma_list->isGridAdd())
		$m_potongan_sma_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$m_potongan_sma->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($m_potongan_sma_list->Recordset)
	$m_potongan_sma_list->Recordset->Close();
?>
<?php if (!$m_potongan_sma_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$m_potongan_sma_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_potongan_sma_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_potongan_sma_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($m_potongan_sma_list->TotalRecords == 0 && !$m_potongan_sma->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $m_potongan_sma_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$m_potongan_sma_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_potongan_sma_list->isExport()) { ?>
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
$m_potongan_sma_list->terminate();
?>