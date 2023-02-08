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
$tunjangan_jabatan_list = new tunjangan_jabatan_list();

// Run the page
$tunjangan_jabatan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tunjangan_jabatan_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tunjangan_jabatan_list->isExport()) { ?>
<script>
var ftunjangan_jabatanlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftunjangan_jabatanlist = currentForm = new ew.Form("ftunjangan_jabatanlist", "list");
	ftunjangan_jabatanlist.formKeyCountName = '<?php echo $tunjangan_jabatan_list->FormKeyCountName ?>';
	loadjs.done("ftunjangan_jabatanlist");
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
<?php if (!$tunjangan_jabatan_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tunjangan_jabatan_list->TotalRecords > 0 && $tunjangan_jabatan_list->ExportOptions->visible()) { ?>
<?php $tunjangan_jabatan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tunjangan_jabatan_list->ImportOptions->visible()) { ?>
<?php $tunjangan_jabatan_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tunjangan_jabatan_list->renderOtherOptions();
?>
<?php $tunjangan_jabatan_list->showPageHeader(); ?>
<?php
$tunjangan_jabatan_list->showMessage();
?>
<?php if ($tunjangan_jabatan_list->TotalRecords > 0 || $tunjangan_jabatan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tunjangan_jabatan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tunjangan_jabatan">
<?php if (!$tunjangan_jabatan_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$tunjangan_jabatan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tunjangan_jabatan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tunjangan_jabatan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftunjangan_jabatanlist" id="ftunjangan_jabatanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tunjangan_jabatan">
<div id="gmp_tunjangan_jabatan" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($tunjangan_jabatan_list->TotalRecords > 0 || $tunjangan_jabatan_list->isGridEdit()) { ?>
<table id="tbl_tunjangan_jabatanlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tunjangan_jabatan->RowType = ROWTYPE_HEADER;

// Render list options
$tunjangan_jabatan_list->renderListOptions();

// Render list options (header, left)
$tunjangan_jabatan_list->ListOptions->render("header", "left");
?>
<?php if ($tunjangan_jabatan_list->unit->Visible) { // unit ?>
	<?php if ($tunjangan_jabatan_list->SortUrl($tunjangan_jabatan_list->unit) == "") { ?>
		<th data-name="unit" class="<?php echo $tunjangan_jabatan_list->unit->headerCellClass() ?>"><div id="elh_tunjangan_jabatan_unit" class="tunjangan_jabatan_unit"><div class="ew-table-header-caption"><?php echo $tunjangan_jabatan_list->unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="unit" class="<?php echo $tunjangan_jabatan_list->unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tunjangan_jabatan_list->SortUrl($tunjangan_jabatan_list->unit) ?>', 1);"><div id="elh_tunjangan_jabatan_unit" class="tunjangan_jabatan_unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tunjangan_jabatan_list->unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($tunjangan_jabatan_list->unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tunjangan_jabatan_list->unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tunjangan_jabatan_list->jabatan->Visible) { // jabatan ?>
	<?php if ($tunjangan_jabatan_list->SortUrl($tunjangan_jabatan_list->jabatan) == "") { ?>
		<th data-name="jabatan" class="<?php echo $tunjangan_jabatan_list->jabatan->headerCellClass() ?>"><div id="elh_tunjangan_jabatan_jabatan" class="tunjangan_jabatan_jabatan"><div class="ew-table-header-caption"><?php echo $tunjangan_jabatan_list->jabatan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jabatan" class="<?php echo $tunjangan_jabatan_list->jabatan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tunjangan_jabatan_list->SortUrl($tunjangan_jabatan_list->jabatan) ?>', 1);"><div id="elh_tunjangan_jabatan_jabatan" class="tunjangan_jabatan_jabatan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tunjangan_jabatan_list->jabatan->caption() ?></span><span class="ew-table-header-sort"><?php if ($tunjangan_jabatan_list->jabatan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tunjangan_jabatan_list->jabatan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tunjangan_jabatan_list->value->Visible) { // value ?>
	<?php if ($tunjangan_jabatan_list->SortUrl($tunjangan_jabatan_list->value) == "") { ?>
		<th data-name="value" class="<?php echo $tunjangan_jabatan_list->value->headerCellClass() ?>"><div id="elh_tunjangan_jabatan_value" class="tunjangan_jabatan_value"><div class="ew-table-header-caption"><?php echo $tunjangan_jabatan_list->value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value" class="<?php echo $tunjangan_jabatan_list->value->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tunjangan_jabatan_list->SortUrl($tunjangan_jabatan_list->value) ?>', 1);"><div id="elh_tunjangan_jabatan_value" class="tunjangan_jabatan_value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tunjangan_jabatan_list->value->caption() ?></span><span class="ew-table-header-sort"><?php if ($tunjangan_jabatan_list->value->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tunjangan_jabatan_list->value->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tunjangan_jabatan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tunjangan_jabatan_list->ExportAll && $tunjangan_jabatan_list->isExport()) {
	$tunjangan_jabatan_list->StopRecord = $tunjangan_jabatan_list->TotalRecords;
} else {

	// Set the last record to display
	if ($tunjangan_jabatan_list->TotalRecords > $tunjangan_jabatan_list->StartRecord + $tunjangan_jabatan_list->DisplayRecords - 1)
		$tunjangan_jabatan_list->StopRecord = $tunjangan_jabatan_list->StartRecord + $tunjangan_jabatan_list->DisplayRecords - 1;
	else
		$tunjangan_jabatan_list->StopRecord = $tunjangan_jabatan_list->TotalRecords;
}
$tunjangan_jabatan_list->RecordCount = $tunjangan_jabatan_list->StartRecord - 1;
if ($tunjangan_jabatan_list->Recordset && !$tunjangan_jabatan_list->Recordset->EOF) {
	$tunjangan_jabatan_list->Recordset->moveFirst();
	$selectLimit = $tunjangan_jabatan_list->UseSelectLimit;
	if (!$selectLimit && $tunjangan_jabatan_list->StartRecord > 1)
		$tunjangan_jabatan_list->Recordset->move($tunjangan_jabatan_list->StartRecord - 1);
} elseif (!$tunjangan_jabatan->AllowAddDeleteRow && $tunjangan_jabatan_list->StopRecord == 0) {
	$tunjangan_jabatan_list->StopRecord = $tunjangan_jabatan->GridAddRowCount;
}

// Initialize aggregate
$tunjangan_jabatan->RowType = ROWTYPE_AGGREGATEINIT;
$tunjangan_jabatan->resetAttributes();
$tunjangan_jabatan_list->renderRow();
while ($tunjangan_jabatan_list->RecordCount < $tunjangan_jabatan_list->StopRecord) {
	$tunjangan_jabatan_list->RecordCount++;
	if ($tunjangan_jabatan_list->RecordCount >= $tunjangan_jabatan_list->StartRecord) {
		$tunjangan_jabatan_list->RowCount++;

		// Set up key count
		$tunjangan_jabatan_list->KeyCount = $tunjangan_jabatan_list->RowIndex;

		// Init row class and style
		$tunjangan_jabatan->resetAttributes();
		$tunjangan_jabatan->CssClass = "";
		if ($tunjangan_jabatan_list->isGridAdd()) {
		} else {
			$tunjangan_jabatan_list->loadRowValues($tunjangan_jabatan_list->Recordset); // Load row values
		}
		$tunjangan_jabatan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tunjangan_jabatan->RowAttrs->merge(["data-rowindex" => $tunjangan_jabatan_list->RowCount, "id" => "r" . $tunjangan_jabatan_list->RowCount . "_tunjangan_jabatan", "data-rowtype" => $tunjangan_jabatan->RowType]);

		// Render row
		$tunjangan_jabatan_list->renderRow();

		// Render list options
		$tunjangan_jabatan_list->renderListOptions();
?>
	<tr <?php echo $tunjangan_jabatan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tunjangan_jabatan_list->ListOptions->render("body", "left", $tunjangan_jabatan_list->RowCount);
?>
	<?php if ($tunjangan_jabatan_list->unit->Visible) { // unit ?>
		<td data-name="unit" <?php echo $tunjangan_jabatan_list->unit->cellAttributes() ?>>
<span id="el<?php echo $tunjangan_jabatan_list->RowCount ?>_tunjangan_jabatan_unit">
<span<?php echo $tunjangan_jabatan_list->unit->viewAttributes() ?>><?php echo $tunjangan_jabatan_list->unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tunjangan_jabatan_list->jabatan->Visible) { // jabatan ?>
		<td data-name="jabatan" <?php echo $tunjangan_jabatan_list->jabatan->cellAttributes() ?>>
<span id="el<?php echo $tunjangan_jabatan_list->RowCount ?>_tunjangan_jabatan_jabatan">
<span<?php echo $tunjangan_jabatan_list->jabatan->viewAttributes() ?>><?php echo $tunjangan_jabatan_list->jabatan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tunjangan_jabatan_list->value->Visible) { // value ?>
		<td data-name="value" <?php echo $tunjangan_jabatan_list->value->cellAttributes() ?>>
<span id="el<?php echo $tunjangan_jabatan_list->RowCount ?>_tunjangan_jabatan_value">
<span<?php echo $tunjangan_jabatan_list->value->viewAttributes() ?>><?php echo $tunjangan_jabatan_list->value->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tunjangan_jabatan_list->ListOptions->render("body", "right", $tunjangan_jabatan_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$tunjangan_jabatan_list->isGridAdd())
		$tunjangan_jabatan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$tunjangan_jabatan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tunjangan_jabatan_list->Recordset)
	$tunjangan_jabatan_list->Recordset->Close();
?>
<?php if (!$tunjangan_jabatan_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tunjangan_jabatan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tunjangan_jabatan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tunjangan_jabatan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tunjangan_jabatan_list->TotalRecords == 0 && !$tunjangan_jabatan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tunjangan_jabatan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tunjangan_jabatan_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tunjangan_jabatan_list->isExport()) { ?>
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
$tunjangan_jabatan_list->terminate();
?>