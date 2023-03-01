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
$m_slip_yayasan_list = new m_slip_yayasan_list();

// Run the page
$m_slip_yayasan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_slip_yayasan_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_slip_yayasan_list->isExport()) { ?>
<script>
var fm_slip_yayasanlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fm_slip_yayasanlist = currentForm = new ew.Form("fm_slip_yayasanlist", "list");
	fm_slip_yayasanlist.formKeyCountName = '<?php echo $m_slip_yayasan_list->FormKeyCountName ?>';
	loadjs.done("fm_slip_yayasanlist");
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
<?php if (!$m_slip_yayasan_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($m_slip_yayasan_list->TotalRecords > 0 && $m_slip_yayasan_list->ExportOptions->visible()) { ?>
<?php $m_slip_yayasan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($m_slip_yayasan_list->ImportOptions->visible()) { ?>
<?php $m_slip_yayasan_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$m_slip_yayasan_list->renderOtherOptions();
?>
<?php $m_slip_yayasan_list->showPageHeader(); ?>
<?php
$m_slip_yayasan_list->showMessage();
?>
<?php if ($m_slip_yayasan_list->TotalRecords > 0 || $m_slip_yayasan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($m_slip_yayasan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> m_slip_yayasan">
<?php if (!$m_slip_yayasan_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$m_slip_yayasan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_slip_yayasan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_slip_yayasan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fm_slip_yayasanlist" id="fm_slip_yayasanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_slip_yayasan">
<div id="gmp_m_slip_yayasan" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($m_slip_yayasan_list->TotalRecords > 0 || $m_slip_yayasan_list->isGridEdit()) { ?>
<table id="tbl_m_slip_yayasanlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$m_slip_yayasan->RowType = ROWTYPE_HEADER;

// Render list options
$m_slip_yayasan_list->renderListOptions();

// Render list options (header, left)
$m_slip_yayasan_list->ListOptions->render("header", "left");
?>
<?php if ($m_slip_yayasan_list->bulan->Visible) { // bulan ?>
	<?php if ($m_slip_yayasan_list->SortUrl($m_slip_yayasan_list->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $m_slip_yayasan_list->bulan->headerCellClass() ?>"><div id="elh_m_slip_yayasan_bulan" class="m_slip_yayasan_bulan"><div class="ew-table-header-caption"><?php echo $m_slip_yayasan_list->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $m_slip_yayasan_list->bulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_slip_yayasan_list->SortUrl($m_slip_yayasan_list->bulan) ?>', 1);"><div id="elh_m_slip_yayasan_bulan" class="m_slip_yayasan_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_slip_yayasan_list->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_slip_yayasan_list->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_slip_yayasan_list->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_slip_yayasan_list->tahun->Visible) { // tahun ?>
	<?php if ($m_slip_yayasan_list->SortUrl($m_slip_yayasan_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $m_slip_yayasan_list->tahun->headerCellClass() ?>"><div id="elh_m_slip_yayasan_tahun" class="m_slip_yayasan_tahun"><div class="ew-table-header-caption"><?php echo $m_slip_yayasan_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $m_slip_yayasan_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_slip_yayasan_list->SortUrl($m_slip_yayasan_list->tahun) ?>', 1);"><div id="elh_m_slip_yayasan_tahun" class="m_slip_yayasan_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_slip_yayasan_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_slip_yayasan_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_slip_yayasan_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_slip_yayasan_list->pegawai->Visible) { // pegawai ?>
	<?php if ($m_slip_yayasan_list->SortUrl($m_slip_yayasan_list->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $m_slip_yayasan_list->pegawai->headerCellClass() ?>"><div id="elh_m_slip_yayasan_pegawai" class="m_slip_yayasan_pegawai"><div class="ew-table-header-caption"><?php echo $m_slip_yayasan_list->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $m_slip_yayasan_list->pegawai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_slip_yayasan_list->SortUrl($m_slip_yayasan_list->pegawai) ?>', 1);"><div id="elh_m_slip_yayasan_pegawai" class="m_slip_yayasan_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_slip_yayasan_list->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_slip_yayasan_list->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_slip_yayasan_list->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_slip_yayasan_list->total->Visible) { // total ?>
	<?php if ($m_slip_yayasan_list->SortUrl($m_slip_yayasan_list->total) == "") { ?>
		<th data-name="total" class="<?php echo $m_slip_yayasan_list->total->headerCellClass() ?>"><div id="elh_m_slip_yayasan_total" class="m_slip_yayasan_total"><div class="ew-table-header-caption"><?php echo $m_slip_yayasan_list->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $m_slip_yayasan_list->total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_slip_yayasan_list->SortUrl($m_slip_yayasan_list->total) ?>', 1);"><div id="elh_m_slip_yayasan_total" class="m_slip_yayasan_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_slip_yayasan_list->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_slip_yayasan_list->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_slip_yayasan_list->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$m_slip_yayasan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($m_slip_yayasan_list->ExportAll && $m_slip_yayasan_list->isExport()) {
	$m_slip_yayasan_list->StopRecord = $m_slip_yayasan_list->TotalRecords;
} else {

	// Set the last record to display
	if ($m_slip_yayasan_list->TotalRecords > $m_slip_yayasan_list->StartRecord + $m_slip_yayasan_list->DisplayRecords - 1)
		$m_slip_yayasan_list->StopRecord = $m_slip_yayasan_list->StartRecord + $m_slip_yayasan_list->DisplayRecords - 1;
	else
		$m_slip_yayasan_list->StopRecord = $m_slip_yayasan_list->TotalRecords;
}
$m_slip_yayasan_list->RecordCount = $m_slip_yayasan_list->StartRecord - 1;
if ($m_slip_yayasan_list->Recordset && !$m_slip_yayasan_list->Recordset->EOF) {
	$m_slip_yayasan_list->Recordset->moveFirst();
	$selectLimit = $m_slip_yayasan_list->UseSelectLimit;
	if (!$selectLimit && $m_slip_yayasan_list->StartRecord > 1)
		$m_slip_yayasan_list->Recordset->move($m_slip_yayasan_list->StartRecord - 1);
} elseif (!$m_slip_yayasan->AllowAddDeleteRow && $m_slip_yayasan_list->StopRecord == 0) {
	$m_slip_yayasan_list->StopRecord = $m_slip_yayasan->GridAddRowCount;
}

// Initialize aggregate
$m_slip_yayasan->RowType = ROWTYPE_AGGREGATEINIT;
$m_slip_yayasan->resetAttributes();
$m_slip_yayasan_list->renderRow();
while ($m_slip_yayasan_list->RecordCount < $m_slip_yayasan_list->StopRecord) {
	$m_slip_yayasan_list->RecordCount++;
	if ($m_slip_yayasan_list->RecordCount >= $m_slip_yayasan_list->StartRecord) {
		$m_slip_yayasan_list->RowCount++;

		// Set up key count
		$m_slip_yayasan_list->KeyCount = $m_slip_yayasan_list->RowIndex;

		// Init row class and style
		$m_slip_yayasan->resetAttributes();
		$m_slip_yayasan->CssClass = "";
		if ($m_slip_yayasan_list->isGridAdd()) {
		} else {
			$m_slip_yayasan_list->loadRowValues($m_slip_yayasan_list->Recordset); // Load row values
		}
		$m_slip_yayasan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$m_slip_yayasan->RowAttrs->merge(["data-rowindex" => $m_slip_yayasan_list->RowCount, "id" => "r" . $m_slip_yayasan_list->RowCount . "_m_slip_yayasan", "data-rowtype" => $m_slip_yayasan->RowType]);

		// Render row
		$m_slip_yayasan_list->renderRow();

		// Render list options
		$m_slip_yayasan_list->renderListOptions();
?>
	<tr <?php echo $m_slip_yayasan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$m_slip_yayasan_list->ListOptions->render("body", "left", $m_slip_yayasan_list->RowCount);
?>
	<?php if ($m_slip_yayasan_list->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $m_slip_yayasan_list->bulan->cellAttributes() ?>>
<span id="el<?php echo $m_slip_yayasan_list->RowCount ?>_m_slip_yayasan_bulan">
<span<?php echo $m_slip_yayasan_list->bulan->viewAttributes() ?>><?php echo $m_slip_yayasan_list->bulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_slip_yayasan_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $m_slip_yayasan_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $m_slip_yayasan_list->RowCount ?>_m_slip_yayasan_tahun">
<span<?php echo $m_slip_yayasan_list->tahun->viewAttributes() ?>><?php echo $m_slip_yayasan_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_slip_yayasan_list->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $m_slip_yayasan_list->pegawai->cellAttributes() ?>>
<span id="el<?php echo $m_slip_yayasan_list->RowCount ?>_m_slip_yayasan_pegawai">
<span<?php echo $m_slip_yayasan_list->pegawai->viewAttributes() ?>><?php echo $m_slip_yayasan_list->pegawai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_slip_yayasan_list->total->Visible) { // total ?>
		<td data-name="total" <?php echo $m_slip_yayasan_list->total->cellAttributes() ?>>
<span id="el<?php echo $m_slip_yayasan_list->RowCount ?>_m_slip_yayasan_total">
<span<?php echo $m_slip_yayasan_list->total->viewAttributes() ?>><?php echo $m_slip_yayasan_list->total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$m_slip_yayasan_list->ListOptions->render("body", "right", $m_slip_yayasan_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$m_slip_yayasan_list->isGridAdd())
		$m_slip_yayasan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$m_slip_yayasan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($m_slip_yayasan_list->Recordset)
	$m_slip_yayasan_list->Recordset->Close();
?>
<?php if (!$m_slip_yayasan_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$m_slip_yayasan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_slip_yayasan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_slip_yayasan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($m_slip_yayasan_list->TotalRecords == 0 && !$m_slip_yayasan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $m_slip_yayasan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$m_slip_yayasan_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_slip_yayasan_list->isExport()) { ?>
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
$m_slip_yayasan_list->terminate();
?>