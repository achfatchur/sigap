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
$slip_gaji_yayasan_list = new slip_gaji_yayasan_list();

// Run the page
$slip_gaji_yayasan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$slip_gaji_yayasan_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$slip_gaji_yayasan_list->isExport()) { ?>
<script>
var fslip_gaji_yayasanlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fslip_gaji_yayasanlist = currentForm = new ew.Form("fslip_gaji_yayasanlist", "list");
	fslip_gaji_yayasanlist.formKeyCountName = '<?php echo $slip_gaji_yayasan_list->FormKeyCountName ?>';
	loadjs.done("fslip_gaji_yayasanlist");
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
<?php if (!$slip_gaji_yayasan_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($slip_gaji_yayasan_list->TotalRecords > 0 && $slip_gaji_yayasan_list->ExportOptions->visible()) { ?>
<?php $slip_gaji_yayasan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($slip_gaji_yayasan_list->ImportOptions->visible()) { ?>
<?php $slip_gaji_yayasan_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$slip_gaji_yayasan_list->renderOtherOptions();
?>
<?php $slip_gaji_yayasan_list->showPageHeader(); ?>
<?php
$slip_gaji_yayasan_list->showMessage();
?>
<?php if ($slip_gaji_yayasan_list->TotalRecords > 0 || $slip_gaji_yayasan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($slip_gaji_yayasan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> slip_gaji_yayasan">
<?php if (!$slip_gaji_yayasan_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$slip_gaji_yayasan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $slip_gaji_yayasan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $slip_gaji_yayasan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fslip_gaji_yayasanlist" id="fslip_gaji_yayasanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="slip_gaji_yayasan">
<div id="gmp_slip_gaji_yayasan" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($slip_gaji_yayasan_list->TotalRecords > 0 || $slip_gaji_yayasan_list->isGridEdit()) { ?>
<table id="tbl_slip_gaji_yayasanlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$slip_gaji_yayasan->RowType = ROWTYPE_HEADER;

// Render list options
$slip_gaji_yayasan_list->renderListOptions();

// Render list options (header, left)
$slip_gaji_yayasan_list->ListOptions->render("header", "left");
?>
<?php if ($slip_gaji_yayasan_list->id->Visible) { // id ?>
	<?php if ($slip_gaji_yayasan_list->SortUrl($slip_gaji_yayasan_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $slip_gaji_yayasan_list->id->headerCellClass() ?>"><div id="elh_slip_gaji_yayasan_id" class="slip_gaji_yayasan_id"><div class="ew-table-header-caption"><?php echo $slip_gaji_yayasan_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $slip_gaji_yayasan_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $slip_gaji_yayasan_list->SortUrl($slip_gaji_yayasan_list->id) ?>', 1);"><div id="elh_slip_gaji_yayasan_id" class="slip_gaji_yayasan_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $slip_gaji_yayasan_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($slip_gaji_yayasan_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($slip_gaji_yayasan_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($slip_gaji_yayasan_list->bulan->Visible) { // bulan ?>
	<?php if ($slip_gaji_yayasan_list->SortUrl($slip_gaji_yayasan_list->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $slip_gaji_yayasan_list->bulan->headerCellClass() ?>"><div id="elh_slip_gaji_yayasan_bulan" class="slip_gaji_yayasan_bulan"><div class="ew-table-header-caption"><?php echo $slip_gaji_yayasan_list->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $slip_gaji_yayasan_list->bulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $slip_gaji_yayasan_list->SortUrl($slip_gaji_yayasan_list->bulan) ?>', 1);"><div id="elh_slip_gaji_yayasan_bulan" class="slip_gaji_yayasan_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $slip_gaji_yayasan_list->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($slip_gaji_yayasan_list->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($slip_gaji_yayasan_list->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($slip_gaji_yayasan_list->tahun->Visible) { // tahun ?>
	<?php if ($slip_gaji_yayasan_list->SortUrl($slip_gaji_yayasan_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $slip_gaji_yayasan_list->tahun->headerCellClass() ?>"><div id="elh_slip_gaji_yayasan_tahun" class="slip_gaji_yayasan_tahun"><div class="ew-table-header-caption"><?php echo $slip_gaji_yayasan_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $slip_gaji_yayasan_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $slip_gaji_yayasan_list->SortUrl($slip_gaji_yayasan_list->tahun) ?>', 1);"><div id="elh_slip_gaji_yayasan_tahun" class="slip_gaji_yayasan_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $slip_gaji_yayasan_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($slip_gaji_yayasan_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($slip_gaji_yayasan_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($slip_gaji_yayasan_list->id_pegawai->Visible) { // id_pegawai ?>
	<?php if ($slip_gaji_yayasan_list->SortUrl($slip_gaji_yayasan_list->id_pegawai) == "") { ?>
		<th data-name="id_pegawai" class="<?php echo $slip_gaji_yayasan_list->id_pegawai->headerCellClass() ?>"><div id="elh_slip_gaji_yayasan_id_pegawai" class="slip_gaji_yayasan_id_pegawai"><div class="ew-table-header-caption"><?php echo $slip_gaji_yayasan_list->id_pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_pegawai" class="<?php echo $slip_gaji_yayasan_list->id_pegawai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $slip_gaji_yayasan_list->SortUrl($slip_gaji_yayasan_list->id_pegawai) ?>', 1);"><div id="elh_slip_gaji_yayasan_id_pegawai" class="slip_gaji_yayasan_id_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $slip_gaji_yayasan_list->id_pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($slip_gaji_yayasan_list->id_pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($slip_gaji_yayasan_list->id_pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($slip_gaji_yayasan_list->total->Visible) { // total ?>
	<?php if ($slip_gaji_yayasan_list->SortUrl($slip_gaji_yayasan_list->total) == "") { ?>
		<th data-name="total" class="<?php echo $slip_gaji_yayasan_list->total->headerCellClass() ?>"><div id="elh_slip_gaji_yayasan_total" class="slip_gaji_yayasan_total"><div class="ew-table-header-caption"><?php echo $slip_gaji_yayasan_list->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $slip_gaji_yayasan_list->total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $slip_gaji_yayasan_list->SortUrl($slip_gaji_yayasan_list->total) ?>', 1);"><div id="elh_slip_gaji_yayasan_total" class="slip_gaji_yayasan_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $slip_gaji_yayasan_list->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($slip_gaji_yayasan_list->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($slip_gaji_yayasan_list->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($slip_gaji_yayasan_list->id1->Visible) { // id1 ?>
	<?php if ($slip_gaji_yayasan_list->SortUrl($slip_gaji_yayasan_list->id1) == "") { ?>
		<th data-name="id1" class="<?php echo $slip_gaji_yayasan_list->id1->headerCellClass() ?>"><div id="elh_slip_gaji_yayasan_id1" class="slip_gaji_yayasan_id1"><div class="ew-table-header-caption"><?php echo $slip_gaji_yayasan_list->id1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id1" class="<?php echo $slip_gaji_yayasan_list->id1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $slip_gaji_yayasan_list->SortUrl($slip_gaji_yayasan_list->id1) ?>', 1);"><div id="elh_slip_gaji_yayasan_id1" class="slip_gaji_yayasan_id1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $slip_gaji_yayasan_list->id1->caption() ?></span><span class="ew-table-header-sort"><?php if ($slip_gaji_yayasan_list->id1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($slip_gaji_yayasan_list->id1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$slip_gaji_yayasan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($slip_gaji_yayasan_list->ExportAll && $slip_gaji_yayasan_list->isExport()) {
	$slip_gaji_yayasan_list->StopRecord = $slip_gaji_yayasan_list->TotalRecords;
} else {

	// Set the last record to display
	if ($slip_gaji_yayasan_list->TotalRecords > $slip_gaji_yayasan_list->StartRecord + $slip_gaji_yayasan_list->DisplayRecords - 1)
		$slip_gaji_yayasan_list->StopRecord = $slip_gaji_yayasan_list->StartRecord + $slip_gaji_yayasan_list->DisplayRecords - 1;
	else
		$slip_gaji_yayasan_list->StopRecord = $slip_gaji_yayasan_list->TotalRecords;
}
$slip_gaji_yayasan_list->RecordCount = $slip_gaji_yayasan_list->StartRecord - 1;
if ($slip_gaji_yayasan_list->Recordset && !$slip_gaji_yayasan_list->Recordset->EOF) {
	$slip_gaji_yayasan_list->Recordset->moveFirst();
	$selectLimit = $slip_gaji_yayasan_list->UseSelectLimit;
	if (!$selectLimit && $slip_gaji_yayasan_list->StartRecord > 1)
		$slip_gaji_yayasan_list->Recordset->move($slip_gaji_yayasan_list->StartRecord - 1);
} elseif (!$slip_gaji_yayasan->AllowAddDeleteRow && $slip_gaji_yayasan_list->StopRecord == 0) {
	$slip_gaji_yayasan_list->StopRecord = $slip_gaji_yayasan->GridAddRowCount;
}

// Initialize aggregate
$slip_gaji_yayasan->RowType = ROWTYPE_AGGREGATEINIT;
$slip_gaji_yayasan->resetAttributes();
$slip_gaji_yayasan_list->renderRow();
while ($slip_gaji_yayasan_list->RecordCount < $slip_gaji_yayasan_list->StopRecord) {
	$slip_gaji_yayasan_list->RecordCount++;
	if ($slip_gaji_yayasan_list->RecordCount >= $slip_gaji_yayasan_list->StartRecord) {
		$slip_gaji_yayasan_list->RowCount++;

		// Set up key count
		$slip_gaji_yayasan_list->KeyCount = $slip_gaji_yayasan_list->RowIndex;

		// Init row class and style
		$slip_gaji_yayasan->resetAttributes();
		$slip_gaji_yayasan->CssClass = "";
		if ($slip_gaji_yayasan_list->isGridAdd()) {
		} else {
			$slip_gaji_yayasan_list->loadRowValues($slip_gaji_yayasan_list->Recordset); // Load row values
		}
		$slip_gaji_yayasan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$slip_gaji_yayasan->RowAttrs->merge(["data-rowindex" => $slip_gaji_yayasan_list->RowCount, "id" => "r" . $slip_gaji_yayasan_list->RowCount . "_slip_gaji_yayasan", "data-rowtype" => $slip_gaji_yayasan->RowType]);

		// Render row
		$slip_gaji_yayasan_list->renderRow();

		// Render list options
		$slip_gaji_yayasan_list->renderListOptions();
?>
	<tr <?php echo $slip_gaji_yayasan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$slip_gaji_yayasan_list->ListOptions->render("body", "left", $slip_gaji_yayasan_list->RowCount);
?>
	<?php if ($slip_gaji_yayasan_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $slip_gaji_yayasan_list->id->cellAttributes() ?>>
<span id="el<?php echo $slip_gaji_yayasan_list->RowCount ?>_slip_gaji_yayasan_id">
<span<?php echo $slip_gaji_yayasan_list->id->viewAttributes() ?>><?php echo $slip_gaji_yayasan_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($slip_gaji_yayasan_list->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $slip_gaji_yayasan_list->bulan->cellAttributes() ?>>
<span id="el<?php echo $slip_gaji_yayasan_list->RowCount ?>_slip_gaji_yayasan_bulan">
<span<?php echo $slip_gaji_yayasan_list->bulan->viewAttributes() ?>><?php echo $slip_gaji_yayasan_list->bulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($slip_gaji_yayasan_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $slip_gaji_yayasan_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $slip_gaji_yayasan_list->RowCount ?>_slip_gaji_yayasan_tahun">
<span<?php echo $slip_gaji_yayasan_list->tahun->viewAttributes() ?>><?php echo $slip_gaji_yayasan_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($slip_gaji_yayasan_list->id_pegawai->Visible) { // id_pegawai ?>
		<td data-name="id_pegawai" <?php echo $slip_gaji_yayasan_list->id_pegawai->cellAttributes() ?>>
<span id="el<?php echo $slip_gaji_yayasan_list->RowCount ?>_slip_gaji_yayasan_id_pegawai">
<span<?php echo $slip_gaji_yayasan_list->id_pegawai->viewAttributes() ?>><?php echo $slip_gaji_yayasan_list->id_pegawai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($slip_gaji_yayasan_list->total->Visible) { // total ?>
		<td data-name="total" <?php echo $slip_gaji_yayasan_list->total->cellAttributes() ?>>
<span id="el<?php echo $slip_gaji_yayasan_list->RowCount ?>_slip_gaji_yayasan_total">
<span<?php echo $slip_gaji_yayasan_list->total->viewAttributes() ?>><?php echo $slip_gaji_yayasan_list->total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($slip_gaji_yayasan_list->id1->Visible) { // id1 ?>
		<td data-name="id1" <?php echo $slip_gaji_yayasan_list->id1->cellAttributes() ?>>
<span id="el<?php echo $slip_gaji_yayasan_list->RowCount ?>_slip_gaji_yayasan_id1">
<span<?php echo $slip_gaji_yayasan_list->id1->viewAttributes() ?>><?php echo $slip_gaji_yayasan_list->id1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$slip_gaji_yayasan_list->ListOptions->render("body", "right", $slip_gaji_yayasan_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$slip_gaji_yayasan_list->isGridAdd())
		$slip_gaji_yayasan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$slip_gaji_yayasan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($slip_gaji_yayasan_list->Recordset)
	$slip_gaji_yayasan_list->Recordset->Close();
?>
<?php if (!$slip_gaji_yayasan_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$slip_gaji_yayasan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $slip_gaji_yayasan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $slip_gaji_yayasan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($slip_gaji_yayasan_list->TotalRecords == 0 && !$slip_gaji_yayasan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $slip_gaji_yayasan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$slip_gaji_yayasan_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$slip_gaji_yayasan_list->isExport()) { ?>
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
$slip_gaji_yayasan_list->terminate();
?>