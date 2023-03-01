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
$gaji_pegawai_tk_list = new gaji_pegawai_tk_list();

// Run the page
$gaji_pegawai_tk_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_pegawai_tk_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$gaji_pegawai_tk_list->isExport()) { ?>
<script>
var fgaji_pegawai_tklist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fgaji_pegawai_tklist = currentForm = new ew.Form("fgaji_pegawai_tklist", "list");
	fgaji_pegawai_tklist.formKeyCountName = '<?php echo $gaji_pegawai_tk_list->FormKeyCountName ?>';
	loadjs.done("fgaji_pegawai_tklist");
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
<?php if (!$gaji_pegawai_tk_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($gaji_pegawai_tk_list->TotalRecords > 0 && $gaji_pegawai_tk_list->ExportOptions->visible()) { ?>
<?php $gaji_pegawai_tk_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_pegawai_tk_list->ImportOptions->visible()) { ?>
<?php $gaji_pegawai_tk_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$gaji_pegawai_tk_list->renderOtherOptions();
?>
<?php $gaji_pegawai_tk_list->showPageHeader(); ?>
<?php
$gaji_pegawai_tk_list->showMessage();
?>
<?php if ($gaji_pegawai_tk_list->TotalRecords > 0 || $gaji_pegawai_tk->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($gaji_pegawai_tk_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> gaji_pegawai_tk">
<?php if (!$gaji_pegawai_tk_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$gaji_pegawai_tk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $gaji_pegawai_tk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $gaji_pegawai_tk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fgaji_pegawai_tklist" id="fgaji_pegawai_tklist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="gaji_pegawai_tk">
<div id="gmp_gaji_pegawai_tk" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($gaji_pegawai_tk_list->TotalRecords > 0 || $gaji_pegawai_tk_list->isGridEdit()) { ?>
<table id="tbl_gaji_pegawai_tklist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$gaji_pegawai_tk->RowType = ROWTYPE_HEADER;

// Render list options
$gaji_pegawai_tk_list->renderListOptions();

// Render list options (header, left)
$gaji_pegawai_tk_list->ListOptions->render("header", "left");
?>
<?php if ($gaji_pegawai_tk_list->id->Visible) { // id ?>
	<?php if ($gaji_pegawai_tk_list->SortUrl($gaji_pegawai_tk_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $gaji_pegawai_tk_list->id->headerCellClass() ?>"><div id="elh_gaji_pegawai_tk_id" class="gaji_pegawai_tk_id"><div class="ew-table-header-caption"><?php echo $gaji_pegawai_tk_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $gaji_pegawai_tk_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_pegawai_tk_list->SortUrl($gaji_pegawai_tk_list->id) ?>', 1);"><div id="elh_gaji_pegawai_tk_id" class="gaji_pegawai_tk_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_pegawai_tk_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_pegawai_tk_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_pegawai_tk_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_pegawai_tk_list->bulan->Visible) { // bulan ?>
	<?php if ($gaji_pegawai_tk_list->SortUrl($gaji_pegawai_tk_list->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $gaji_pegawai_tk_list->bulan->headerCellClass() ?>"><div id="elh_gaji_pegawai_tk_bulan" class="gaji_pegawai_tk_bulan"><div class="ew-table-header-caption"><?php echo $gaji_pegawai_tk_list->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $gaji_pegawai_tk_list->bulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_pegawai_tk_list->SortUrl($gaji_pegawai_tk_list->bulan) ?>', 1);"><div id="elh_gaji_pegawai_tk_bulan" class="gaji_pegawai_tk_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_pegawai_tk_list->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_pegawai_tk_list->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_pegawai_tk_list->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_pegawai_tk_list->tahun->Visible) { // tahun ?>
	<?php if ($gaji_pegawai_tk_list->SortUrl($gaji_pegawai_tk_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $gaji_pegawai_tk_list->tahun->headerCellClass() ?>"><div id="elh_gaji_pegawai_tk_tahun" class="gaji_pegawai_tk_tahun"><div class="ew-table-header-caption"><?php echo $gaji_pegawai_tk_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $gaji_pegawai_tk_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_pegawai_tk_list->SortUrl($gaji_pegawai_tk_list->tahun) ?>', 1);"><div id="elh_gaji_pegawai_tk_tahun" class="gaji_pegawai_tk_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_pegawai_tk_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_pegawai_tk_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_pegawai_tk_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_pegawai_tk_list->status->Visible) { // status ?>
	<?php if ($gaji_pegawai_tk_list->SortUrl($gaji_pegawai_tk_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $gaji_pegawai_tk_list->status->headerCellClass() ?>"><div id="elh_gaji_pegawai_tk_status" class="gaji_pegawai_tk_status"><div class="ew-table-header-caption"><?php echo $gaji_pegawai_tk_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $gaji_pegawai_tk_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_pegawai_tk_list->SortUrl($gaji_pegawai_tk_list->status) ?>', 1);"><div id="elh_gaji_pegawai_tk_status" class="gaji_pegawai_tk_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_pegawai_tk_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_pegawai_tk_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_pegawai_tk_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$gaji_pegawai_tk_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($gaji_pegawai_tk_list->ExportAll && $gaji_pegawai_tk_list->isExport()) {
	$gaji_pegawai_tk_list->StopRecord = $gaji_pegawai_tk_list->TotalRecords;
} else {

	// Set the last record to display
	if ($gaji_pegawai_tk_list->TotalRecords > $gaji_pegawai_tk_list->StartRecord + $gaji_pegawai_tk_list->DisplayRecords - 1)
		$gaji_pegawai_tk_list->StopRecord = $gaji_pegawai_tk_list->StartRecord + $gaji_pegawai_tk_list->DisplayRecords - 1;
	else
		$gaji_pegawai_tk_list->StopRecord = $gaji_pegawai_tk_list->TotalRecords;
}
$gaji_pegawai_tk_list->RecordCount = $gaji_pegawai_tk_list->StartRecord - 1;
if ($gaji_pegawai_tk_list->Recordset && !$gaji_pegawai_tk_list->Recordset->EOF) {
	$gaji_pegawai_tk_list->Recordset->moveFirst();
	$selectLimit = $gaji_pegawai_tk_list->UseSelectLimit;
	if (!$selectLimit && $gaji_pegawai_tk_list->StartRecord > 1)
		$gaji_pegawai_tk_list->Recordset->move($gaji_pegawai_tk_list->StartRecord - 1);
} elseif (!$gaji_pegawai_tk->AllowAddDeleteRow && $gaji_pegawai_tk_list->StopRecord == 0) {
	$gaji_pegawai_tk_list->StopRecord = $gaji_pegawai_tk->GridAddRowCount;
}

// Initialize aggregate
$gaji_pegawai_tk->RowType = ROWTYPE_AGGREGATEINIT;
$gaji_pegawai_tk->resetAttributes();
$gaji_pegawai_tk_list->renderRow();
while ($gaji_pegawai_tk_list->RecordCount < $gaji_pegawai_tk_list->StopRecord) {
	$gaji_pegawai_tk_list->RecordCount++;
	if ($gaji_pegawai_tk_list->RecordCount >= $gaji_pegawai_tk_list->StartRecord) {
		$gaji_pegawai_tk_list->RowCount++;

		// Set up key count
		$gaji_pegawai_tk_list->KeyCount = $gaji_pegawai_tk_list->RowIndex;

		// Init row class and style
		$gaji_pegawai_tk->resetAttributes();
		$gaji_pegawai_tk->CssClass = "";
		if ($gaji_pegawai_tk_list->isGridAdd()) {
		} else {
			$gaji_pegawai_tk_list->loadRowValues($gaji_pegawai_tk_list->Recordset); // Load row values
		}
		$gaji_pegawai_tk->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$gaji_pegawai_tk->RowAttrs->merge(["data-rowindex" => $gaji_pegawai_tk_list->RowCount, "id" => "r" . $gaji_pegawai_tk_list->RowCount . "_gaji_pegawai_tk", "data-rowtype" => $gaji_pegawai_tk->RowType]);

		// Render row
		$gaji_pegawai_tk_list->renderRow();

		// Render list options
		$gaji_pegawai_tk_list->renderListOptions();
?>
	<tr <?php echo $gaji_pegawai_tk->rowAttributes() ?>>
<?php

// Render list options (body, left)
$gaji_pegawai_tk_list->ListOptions->render("body", "left", $gaji_pegawai_tk_list->RowCount);
?>
	<?php if ($gaji_pegawai_tk_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $gaji_pegawai_tk_list->id->cellAttributes() ?>>
<span id="el<?php echo $gaji_pegawai_tk_list->RowCount ?>_gaji_pegawai_tk_id">
<span<?php echo $gaji_pegawai_tk_list->id->viewAttributes() ?>><?php echo $gaji_pegawai_tk_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_pegawai_tk_list->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $gaji_pegawai_tk_list->bulan->cellAttributes() ?>>
<span id="el<?php echo $gaji_pegawai_tk_list->RowCount ?>_gaji_pegawai_tk_bulan">
<span<?php echo $gaji_pegawai_tk_list->bulan->viewAttributes() ?>><?php echo $gaji_pegawai_tk_list->bulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_pegawai_tk_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $gaji_pegawai_tk_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $gaji_pegawai_tk_list->RowCount ?>_gaji_pegawai_tk_tahun">
<span<?php echo $gaji_pegawai_tk_list->tahun->viewAttributes() ?>><?php echo $gaji_pegawai_tk_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_pegawai_tk_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $gaji_pegawai_tk_list->status->cellAttributes() ?>>
<span id="el<?php echo $gaji_pegawai_tk_list->RowCount ?>_gaji_pegawai_tk_status">
<span<?php echo $gaji_pegawai_tk_list->status->viewAttributes() ?>><?php echo $gaji_pegawai_tk_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$gaji_pegawai_tk_list->ListOptions->render("body", "right", $gaji_pegawai_tk_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$gaji_pegawai_tk_list->isGridAdd())
		$gaji_pegawai_tk_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$gaji_pegawai_tk->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($gaji_pegawai_tk_list->Recordset)
	$gaji_pegawai_tk_list->Recordset->Close();
?>
<?php if (!$gaji_pegawai_tk_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$gaji_pegawai_tk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $gaji_pegawai_tk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $gaji_pegawai_tk_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($gaji_pegawai_tk_list->TotalRecords == 0 && !$gaji_pegawai_tk->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $gaji_pegawai_tk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$gaji_pegawai_tk_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$gaji_pegawai_tk_list->isExport()) { ?>
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
$gaji_pegawai_tk_list->terminate();
?>