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
$m_pph21_list = new m_pph21_list();

// Run the page
$m_pph21_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_pph21_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_pph21_list->isExport()) { ?>
<script>
var fm_pph21list, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fm_pph21list = currentForm = new ew.Form("fm_pph21list", "list");
	fm_pph21list.formKeyCountName = '<?php echo $m_pph21_list->FormKeyCountName ?>';
	loadjs.done("fm_pph21list");
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
<?php if (!$m_pph21_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($m_pph21_list->TotalRecords > 0 && $m_pph21_list->ExportOptions->visible()) { ?>
<?php $m_pph21_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($m_pph21_list->ImportOptions->visible()) { ?>
<?php $m_pph21_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$m_pph21_list->renderOtherOptions();
?>
<?php $m_pph21_list->showPageHeader(); ?>
<?php
$m_pph21_list->showMessage();
?>
<?php if ($m_pph21_list->TotalRecords > 0 || $m_pph21->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($m_pph21_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> m_pph21">
<?php if (!$m_pph21_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$m_pph21_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_pph21_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_pph21_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fm_pph21list" id="fm_pph21list" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_pph21">
<div id="gmp_m_pph21" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($m_pph21_list->TotalRecords > 0 || $m_pph21_list->isGridEdit()) { ?>
<table id="tbl_m_pph21list" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$m_pph21->RowType = ROWTYPE_HEADER;

// Render list options
$m_pph21_list->renderListOptions();

// Render list options (header, left)
$m_pph21_list->ListOptions->render("header", "left");
?>
<?php if ($m_pph21_list->unit->Visible) { // unit ?>
	<?php if ($m_pph21_list->SortUrl($m_pph21_list->unit) == "") { ?>
		<th data-name="unit" class="<?php echo $m_pph21_list->unit->headerCellClass() ?>"><div id="elh_m_pph21_unit" class="m_pph21_unit"><div class="ew-table-header-caption"><?php echo $m_pph21_list->unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="unit" class="<?php echo $m_pph21_list->unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_pph21_list->SortUrl($m_pph21_list->unit) ?>', 1);"><div id="elh_m_pph21_unit" class="m_pph21_unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_pph21_list->unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_pph21_list->unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_pph21_list->unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_pph21_list->value1->Visible) { // value1 ?>
	<?php if ($m_pph21_list->SortUrl($m_pph21_list->value1) == "") { ?>
		<th data-name="value1" class="<?php echo $m_pph21_list->value1->headerCellClass() ?>"><div id="elh_m_pph21_value1" class="m_pph21_value1"><div class="ew-table-header-caption"><?php echo $m_pph21_list->value1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value1" class="<?php echo $m_pph21_list->value1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_pph21_list->SortUrl($m_pph21_list->value1) ?>', 1);"><div id="elh_m_pph21_value1" class="m_pph21_value1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_pph21_list->value1->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_pph21_list->value1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_pph21_list->value1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_pph21_list->value2->Visible) { // value2 ?>
	<?php if ($m_pph21_list->SortUrl($m_pph21_list->value2) == "") { ?>
		<th data-name="value2" class="<?php echo $m_pph21_list->value2->headerCellClass() ?>"><div id="elh_m_pph21_value2" class="m_pph21_value2"><div class="ew-table-header-caption"><?php echo $m_pph21_list->value2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value2" class="<?php echo $m_pph21_list->value2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_pph21_list->SortUrl($m_pph21_list->value2) ?>', 1);"><div id="elh_m_pph21_value2" class="m_pph21_value2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_pph21_list->value2->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_pph21_list->value2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_pph21_list->value2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_pph21_list->value3->Visible) { // value3 ?>
	<?php if ($m_pph21_list->SortUrl($m_pph21_list->value3) == "") { ?>
		<th data-name="value3" class="<?php echo $m_pph21_list->value3->headerCellClass() ?>"><div id="elh_m_pph21_value3" class="m_pph21_value3"><div class="ew-table-header-caption"><?php echo $m_pph21_list->value3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value3" class="<?php echo $m_pph21_list->value3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_pph21_list->SortUrl($m_pph21_list->value3) ?>', 1);"><div id="elh_m_pph21_value3" class="m_pph21_value3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_pph21_list->value3->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_pph21_list->value3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_pph21_list->value3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$m_pph21_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($m_pph21_list->ExportAll && $m_pph21_list->isExport()) {
	$m_pph21_list->StopRecord = $m_pph21_list->TotalRecords;
} else {

	// Set the last record to display
	if ($m_pph21_list->TotalRecords > $m_pph21_list->StartRecord + $m_pph21_list->DisplayRecords - 1)
		$m_pph21_list->StopRecord = $m_pph21_list->StartRecord + $m_pph21_list->DisplayRecords - 1;
	else
		$m_pph21_list->StopRecord = $m_pph21_list->TotalRecords;
}
$m_pph21_list->RecordCount = $m_pph21_list->StartRecord - 1;
if ($m_pph21_list->Recordset && !$m_pph21_list->Recordset->EOF) {
	$m_pph21_list->Recordset->moveFirst();
	$selectLimit = $m_pph21_list->UseSelectLimit;
	if (!$selectLimit && $m_pph21_list->StartRecord > 1)
		$m_pph21_list->Recordset->move($m_pph21_list->StartRecord - 1);
} elseif (!$m_pph21->AllowAddDeleteRow && $m_pph21_list->StopRecord == 0) {
	$m_pph21_list->StopRecord = $m_pph21->GridAddRowCount;
}

// Initialize aggregate
$m_pph21->RowType = ROWTYPE_AGGREGATEINIT;
$m_pph21->resetAttributes();
$m_pph21_list->renderRow();
while ($m_pph21_list->RecordCount < $m_pph21_list->StopRecord) {
	$m_pph21_list->RecordCount++;
	if ($m_pph21_list->RecordCount >= $m_pph21_list->StartRecord) {
		$m_pph21_list->RowCount++;

		// Set up key count
		$m_pph21_list->KeyCount = $m_pph21_list->RowIndex;

		// Init row class and style
		$m_pph21->resetAttributes();
		$m_pph21->CssClass = "";
		if ($m_pph21_list->isGridAdd()) {
		} else {
			$m_pph21_list->loadRowValues($m_pph21_list->Recordset); // Load row values
		}
		$m_pph21->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$m_pph21->RowAttrs->merge(["data-rowindex" => $m_pph21_list->RowCount, "id" => "r" . $m_pph21_list->RowCount . "_m_pph21", "data-rowtype" => $m_pph21->RowType]);

		// Render row
		$m_pph21_list->renderRow();

		// Render list options
		$m_pph21_list->renderListOptions();
?>
	<tr <?php echo $m_pph21->rowAttributes() ?>>
<?php

// Render list options (body, left)
$m_pph21_list->ListOptions->render("body", "left", $m_pph21_list->RowCount);
?>
	<?php if ($m_pph21_list->unit->Visible) { // unit ?>
		<td data-name="unit" <?php echo $m_pph21_list->unit->cellAttributes() ?>>
<span id="el<?php echo $m_pph21_list->RowCount ?>_m_pph21_unit">
<span<?php echo $m_pph21_list->unit->viewAttributes() ?>><?php echo $m_pph21_list->unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_pph21_list->value1->Visible) { // value1 ?>
		<td data-name="value1" <?php echo $m_pph21_list->value1->cellAttributes() ?>>
<span id="el<?php echo $m_pph21_list->RowCount ?>_m_pph21_value1">
<span<?php echo $m_pph21_list->value1->viewAttributes() ?>><?php echo $m_pph21_list->value1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_pph21_list->value2->Visible) { // value2 ?>
		<td data-name="value2" <?php echo $m_pph21_list->value2->cellAttributes() ?>>
<span id="el<?php echo $m_pph21_list->RowCount ?>_m_pph21_value2">
<span<?php echo $m_pph21_list->value2->viewAttributes() ?>><?php echo $m_pph21_list->value2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_pph21_list->value3->Visible) { // value3 ?>
		<td data-name="value3" <?php echo $m_pph21_list->value3->cellAttributes() ?>>
<span id="el<?php echo $m_pph21_list->RowCount ?>_m_pph21_value3">
<span<?php echo $m_pph21_list->value3->viewAttributes() ?>><?php echo $m_pph21_list->value3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$m_pph21_list->ListOptions->render("body", "right", $m_pph21_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$m_pph21_list->isGridAdd())
		$m_pph21_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$m_pph21->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($m_pph21_list->Recordset)
	$m_pph21_list->Recordset->Close();
?>
<?php if (!$m_pph21_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$m_pph21_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_pph21_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_pph21_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($m_pph21_list->TotalRecords == 0 && !$m_pph21->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $m_pph21_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$m_pph21_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_pph21_list->isExport()) { ?>
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
$m_pph21_list->terminate();
?>