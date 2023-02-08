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
$tunjangan_khusus_list = new tunjangan_khusus_list();

// Run the page
$tunjangan_khusus_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tunjangan_khusus_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tunjangan_khusus_list->isExport()) { ?>
<script>
var ftunjangan_khususlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftunjangan_khususlist = currentForm = new ew.Form("ftunjangan_khususlist", "list");
	ftunjangan_khususlist.formKeyCountName = '<?php echo $tunjangan_khusus_list->FormKeyCountName ?>';
	loadjs.done("ftunjangan_khususlist");
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
<?php if (!$tunjangan_khusus_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tunjangan_khusus_list->TotalRecords > 0 && $tunjangan_khusus_list->ExportOptions->visible()) { ?>
<?php $tunjangan_khusus_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tunjangan_khusus_list->ImportOptions->visible()) { ?>
<?php $tunjangan_khusus_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tunjangan_khusus_list->renderOtherOptions();
?>
<?php $tunjangan_khusus_list->showPageHeader(); ?>
<?php
$tunjangan_khusus_list->showMessage();
?>
<?php if ($tunjangan_khusus_list->TotalRecords > 0 || $tunjangan_khusus->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tunjangan_khusus_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tunjangan_khusus">
<?php if (!$tunjangan_khusus_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$tunjangan_khusus_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tunjangan_khusus_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tunjangan_khusus_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftunjangan_khususlist" id="ftunjangan_khususlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tunjangan_khusus">
<div id="gmp_tunjangan_khusus" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($tunjangan_khusus_list->TotalRecords > 0 || $tunjangan_khusus_list->isGridEdit()) { ?>
<table id="tbl_tunjangan_khususlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tunjangan_khusus->RowType = ROWTYPE_HEADER;

// Render list options
$tunjangan_khusus_list->renderListOptions();

// Render list options (header, left)
$tunjangan_khusus_list->ListOptions->render("header", "left");
?>
<?php if ($tunjangan_khusus_list->unit->Visible) { // unit ?>
	<?php if ($tunjangan_khusus_list->SortUrl($tunjangan_khusus_list->unit) == "") { ?>
		<th data-name="unit" class="<?php echo $tunjangan_khusus_list->unit->headerCellClass() ?>"><div id="elh_tunjangan_khusus_unit" class="tunjangan_khusus_unit"><div class="ew-table-header-caption"><?php echo $tunjangan_khusus_list->unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="unit" class="<?php echo $tunjangan_khusus_list->unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tunjangan_khusus_list->SortUrl($tunjangan_khusus_list->unit) ?>', 1);"><div id="elh_tunjangan_khusus_unit" class="tunjangan_khusus_unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tunjangan_khusus_list->unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($tunjangan_khusus_list->unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tunjangan_khusus_list->unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tunjangan_khusus_list->jabatan->Visible) { // jabatan ?>
	<?php if ($tunjangan_khusus_list->SortUrl($tunjangan_khusus_list->jabatan) == "") { ?>
		<th data-name="jabatan" class="<?php echo $tunjangan_khusus_list->jabatan->headerCellClass() ?>"><div id="elh_tunjangan_khusus_jabatan" class="tunjangan_khusus_jabatan"><div class="ew-table-header-caption"><?php echo $tunjangan_khusus_list->jabatan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jabatan" class="<?php echo $tunjangan_khusus_list->jabatan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tunjangan_khusus_list->SortUrl($tunjangan_khusus_list->jabatan) ?>', 1);"><div id="elh_tunjangan_khusus_jabatan" class="tunjangan_khusus_jabatan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tunjangan_khusus_list->jabatan->caption() ?></span><span class="ew-table-header-sort"><?php if ($tunjangan_khusus_list->jabatan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tunjangan_khusus_list->jabatan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tunjangan_khusus_list->value->Visible) { // value ?>
	<?php if ($tunjangan_khusus_list->SortUrl($tunjangan_khusus_list->value) == "") { ?>
		<th data-name="value" class="<?php echo $tunjangan_khusus_list->value->headerCellClass() ?>"><div id="elh_tunjangan_khusus_value" class="tunjangan_khusus_value"><div class="ew-table-header-caption"><?php echo $tunjangan_khusus_list->value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value" class="<?php echo $tunjangan_khusus_list->value->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tunjangan_khusus_list->SortUrl($tunjangan_khusus_list->value) ?>', 1);"><div id="elh_tunjangan_khusus_value" class="tunjangan_khusus_value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tunjangan_khusus_list->value->caption() ?></span><span class="ew-table-header-sort"><?php if ($tunjangan_khusus_list->value->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tunjangan_khusus_list->value->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tunjangan_khusus_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tunjangan_khusus_list->ExportAll && $tunjangan_khusus_list->isExport()) {
	$tunjangan_khusus_list->StopRecord = $tunjangan_khusus_list->TotalRecords;
} else {

	// Set the last record to display
	if ($tunjangan_khusus_list->TotalRecords > $tunjangan_khusus_list->StartRecord + $tunjangan_khusus_list->DisplayRecords - 1)
		$tunjangan_khusus_list->StopRecord = $tunjangan_khusus_list->StartRecord + $tunjangan_khusus_list->DisplayRecords - 1;
	else
		$tunjangan_khusus_list->StopRecord = $tunjangan_khusus_list->TotalRecords;
}
$tunjangan_khusus_list->RecordCount = $tunjangan_khusus_list->StartRecord - 1;
if ($tunjangan_khusus_list->Recordset && !$tunjangan_khusus_list->Recordset->EOF) {
	$tunjangan_khusus_list->Recordset->moveFirst();
	$selectLimit = $tunjangan_khusus_list->UseSelectLimit;
	if (!$selectLimit && $tunjangan_khusus_list->StartRecord > 1)
		$tunjangan_khusus_list->Recordset->move($tunjangan_khusus_list->StartRecord - 1);
} elseif (!$tunjangan_khusus->AllowAddDeleteRow && $tunjangan_khusus_list->StopRecord == 0) {
	$tunjangan_khusus_list->StopRecord = $tunjangan_khusus->GridAddRowCount;
}

// Initialize aggregate
$tunjangan_khusus->RowType = ROWTYPE_AGGREGATEINIT;
$tunjangan_khusus->resetAttributes();
$tunjangan_khusus_list->renderRow();
while ($tunjangan_khusus_list->RecordCount < $tunjangan_khusus_list->StopRecord) {
	$tunjangan_khusus_list->RecordCount++;
	if ($tunjangan_khusus_list->RecordCount >= $tunjangan_khusus_list->StartRecord) {
		$tunjangan_khusus_list->RowCount++;

		// Set up key count
		$tunjangan_khusus_list->KeyCount = $tunjangan_khusus_list->RowIndex;

		// Init row class and style
		$tunjangan_khusus->resetAttributes();
		$tunjangan_khusus->CssClass = "";
		if ($tunjangan_khusus_list->isGridAdd()) {
		} else {
			$tunjangan_khusus_list->loadRowValues($tunjangan_khusus_list->Recordset); // Load row values
		}
		$tunjangan_khusus->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tunjangan_khusus->RowAttrs->merge(["data-rowindex" => $tunjangan_khusus_list->RowCount, "id" => "r" . $tunjangan_khusus_list->RowCount . "_tunjangan_khusus", "data-rowtype" => $tunjangan_khusus->RowType]);

		// Render row
		$tunjangan_khusus_list->renderRow();

		// Render list options
		$tunjangan_khusus_list->renderListOptions();
?>
	<tr <?php echo $tunjangan_khusus->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tunjangan_khusus_list->ListOptions->render("body", "left", $tunjangan_khusus_list->RowCount);
?>
	<?php if ($tunjangan_khusus_list->unit->Visible) { // unit ?>
		<td data-name="unit" <?php echo $tunjangan_khusus_list->unit->cellAttributes() ?>>
<span id="el<?php echo $tunjangan_khusus_list->RowCount ?>_tunjangan_khusus_unit">
<span<?php echo $tunjangan_khusus_list->unit->viewAttributes() ?>><?php echo $tunjangan_khusus_list->unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tunjangan_khusus_list->jabatan->Visible) { // jabatan ?>
		<td data-name="jabatan" <?php echo $tunjangan_khusus_list->jabatan->cellAttributes() ?>>
<span id="el<?php echo $tunjangan_khusus_list->RowCount ?>_tunjangan_khusus_jabatan">
<span<?php echo $tunjangan_khusus_list->jabatan->viewAttributes() ?>><?php echo $tunjangan_khusus_list->jabatan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tunjangan_khusus_list->value->Visible) { // value ?>
		<td data-name="value" <?php echo $tunjangan_khusus_list->value->cellAttributes() ?>>
<span id="el<?php echo $tunjangan_khusus_list->RowCount ?>_tunjangan_khusus_value">
<span<?php echo $tunjangan_khusus_list->value->viewAttributes() ?>><?php echo $tunjangan_khusus_list->value->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tunjangan_khusus_list->ListOptions->render("body", "right", $tunjangan_khusus_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$tunjangan_khusus_list->isGridAdd())
		$tunjangan_khusus_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$tunjangan_khusus->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tunjangan_khusus_list->Recordset)
	$tunjangan_khusus_list->Recordset->Close();
?>
<?php if (!$tunjangan_khusus_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tunjangan_khusus_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tunjangan_khusus_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tunjangan_khusus_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tunjangan_khusus_list->TotalRecords == 0 && !$tunjangan_khusus->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tunjangan_khusus_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tunjangan_khusus_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tunjangan_khusus_list->isExport()) { ?>
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
$tunjangan_khusus_list->terminate();
?>