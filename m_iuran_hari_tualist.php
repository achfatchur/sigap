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
$m_iuran_hari_tua_list = new m_iuran_hari_tua_list();

// Run the page
$m_iuran_hari_tua_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_iuran_hari_tua_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_iuran_hari_tua_list->isExport()) { ?>
<script>
var fm_iuran_hari_tualist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fm_iuran_hari_tualist = currentForm = new ew.Form("fm_iuran_hari_tualist", "list");
	fm_iuran_hari_tualist.formKeyCountName = '<?php echo $m_iuran_hari_tua_list->FormKeyCountName ?>';
	loadjs.done("fm_iuran_hari_tualist");
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
<?php if (!$m_iuran_hari_tua_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($m_iuran_hari_tua_list->TotalRecords > 0 && $m_iuran_hari_tua_list->ExportOptions->visible()) { ?>
<?php $m_iuran_hari_tua_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($m_iuran_hari_tua_list->ImportOptions->visible()) { ?>
<?php $m_iuran_hari_tua_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$m_iuran_hari_tua_list->renderOtherOptions();
?>
<?php $m_iuran_hari_tua_list->showPageHeader(); ?>
<?php
$m_iuran_hari_tua_list->showMessage();
?>
<?php if ($m_iuran_hari_tua_list->TotalRecords > 0 || $m_iuran_hari_tua->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($m_iuran_hari_tua_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> m_iuran_hari_tua">
<?php if (!$m_iuran_hari_tua_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$m_iuran_hari_tua_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_iuran_hari_tua_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_iuran_hari_tua_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fm_iuran_hari_tualist" id="fm_iuran_hari_tualist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_iuran_hari_tua">
<div id="gmp_m_iuran_hari_tua" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($m_iuran_hari_tua_list->TotalRecords > 0 || $m_iuran_hari_tua_list->isGridEdit()) { ?>
<table id="tbl_m_iuran_hari_tualist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$m_iuran_hari_tua->RowType = ROWTYPE_HEADER;

// Render list options
$m_iuran_hari_tua_list->renderListOptions();

// Render list options (header, left)
$m_iuran_hari_tua_list->ListOptions->render("header", "left");
?>
<?php if ($m_iuran_hari_tua_list->unit->Visible) { // unit ?>
	<?php if ($m_iuran_hari_tua_list->SortUrl($m_iuran_hari_tua_list->unit) == "") { ?>
		<th data-name="unit" class="<?php echo $m_iuran_hari_tua_list->unit->headerCellClass() ?>"><div id="elh_m_iuran_hari_tua_unit" class="m_iuran_hari_tua_unit"><div class="ew-table-header-caption"><?php echo $m_iuran_hari_tua_list->unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="unit" class="<?php echo $m_iuran_hari_tua_list->unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_iuran_hari_tua_list->SortUrl($m_iuran_hari_tua_list->unit) ?>', 1);"><div id="elh_m_iuran_hari_tua_unit" class="m_iuran_hari_tua_unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_iuran_hari_tua_list->unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_iuran_hari_tua_list->unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_iuran_hari_tua_list->unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_iuran_hari_tua_list->value->Visible) { // value ?>
	<?php if ($m_iuran_hari_tua_list->SortUrl($m_iuran_hari_tua_list->value) == "") { ?>
		<th data-name="value" class="<?php echo $m_iuran_hari_tua_list->value->headerCellClass() ?>"><div id="elh_m_iuran_hari_tua_value" class="m_iuran_hari_tua_value"><div class="ew-table-header-caption"><?php echo $m_iuran_hari_tua_list->value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value" class="<?php echo $m_iuran_hari_tua_list->value->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_iuran_hari_tua_list->SortUrl($m_iuran_hari_tua_list->value) ?>', 1);"><div id="elh_m_iuran_hari_tua_value" class="m_iuran_hari_tua_value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_iuran_hari_tua_list->value->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_iuran_hari_tua_list->value->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_iuran_hari_tua_list->value->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$m_iuran_hari_tua_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($m_iuran_hari_tua_list->ExportAll && $m_iuran_hari_tua_list->isExport()) {
	$m_iuran_hari_tua_list->StopRecord = $m_iuran_hari_tua_list->TotalRecords;
} else {

	// Set the last record to display
	if ($m_iuran_hari_tua_list->TotalRecords > $m_iuran_hari_tua_list->StartRecord + $m_iuran_hari_tua_list->DisplayRecords - 1)
		$m_iuran_hari_tua_list->StopRecord = $m_iuran_hari_tua_list->StartRecord + $m_iuran_hari_tua_list->DisplayRecords - 1;
	else
		$m_iuran_hari_tua_list->StopRecord = $m_iuran_hari_tua_list->TotalRecords;
}
$m_iuran_hari_tua_list->RecordCount = $m_iuran_hari_tua_list->StartRecord - 1;
if ($m_iuran_hari_tua_list->Recordset && !$m_iuran_hari_tua_list->Recordset->EOF) {
	$m_iuran_hari_tua_list->Recordset->moveFirst();
	$selectLimit = $m_iuran_hari_tua_list->UseSelectLimit;
	if (!$selectLimit && $m_iuran_hari_tua_list->StartRecord > 1)
		$m_iuran_hari_tua_list->Recordset->move($m_iuran_hari_tua_list->StartRecord - 1);
} elseif (!$m_iuran_hari_tua->AllowAddDeleteRow && $m_iuran_hari_tua_list->StopRecord == 0) {
	$m_iuran_hari_tua_list->StopRecord = $m_iuran_hari_tua->GridAddRowCount;
}

// Initialize aggregate
$m_iuran_hari_tua->RowType = ROWTYPE_AGGREGATEINIT;
$m_iuran_hari_tua->resetAttributes();
$m_iuran_hari_tua_list->renderRow();
while ($m_iuran_hari_tua_list->RecordCount < $m_iuran_hari_tua_list->StopRecord) {
	$m_iuran_hari_tua_list->RecordCount++;
	if ($m_iuran_hari_tua_list->RecordCount >= $m_iuran_hari_tua_list->StartRecord) {
		$m_iuran_hari_tua_list->RowCount++;

		// Set up key count
		$m_iuran_hari_tua_list->KeyCount = $m_iuran_hari_tua_list->RowIndex;

		// Init row class and style
		$m_iuran_hari_tua->resetAttributes();
		$m_iuran_hari_tua->CssClass = "";
		if ($m_iuran_hari_tua_list->isGridAdd()) {
		} else {
			$m_iuran_hari_tua_list->loadRowValues($m_iuran_hari_tua_list->Recordset); // Load row values
		}
		$m_iuran_hari_tua->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$m_iuran_hari_tua->RowAttrs->merge(["data-rowindex" => $m_iuran_hari_tua_list->RowCount, "id" => "r" . $m_iuran_hari_tua_list->RowCount . "_m_iuran_hari_tua", "data-rowtype" => $m_iuran_hari_tua->RowType]);

		// Render row
		$m_iuran_hari_tua_list->renderRow();

		// Render list options
		$m_iuran_hari_tua_list->renderListOptions();
?>
	<tr <?php echo $m_iuran_hari_tua->rowAttributes() ?>>
<?php

// Render list options (body, left)
$m_iuran_hari_tua_list->ListOptions->render("body", "left", $m_iuran_hari_tua_list->RowCount);
?>
	<?php if ($m_iuran_hari_tua_list->unit->Visible) { // unit ?>
		<td data-name="unit" <?php echo $m_iuran_hari_tua_list->unit->cellAttributes() ?>>
<span id="el<?php echo $m_iuran_hari_tua_list->RowCount ?>_m_iuran_hari_tua_unit">
<span<?php echo $m_iuran_hari_tua_list->unit->viewAttributes() ?>><?php echo $m_iuran_hari_tua_list->unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_iuran_hari_tua_list->value->Visible) { // value ?>
		<td data-name="value" <?php echo $m_iuran_hari_tua_list->value->cellAttributes() ?>>
<span id="el<?php echo $m_iuran_hari_tua_list->RowCount ?>_m_iuran_hari_tua_value">
<span<?php echo $m_iuran_hari_tua_list->value->viewAttributes() ?>><?php echo $m_iuran_hari_tua_list->value->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$m_iuran_hari_tua_list->ListOptions->render("body", "right", $m_iuran_hari_tua_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$m_iuran_hari_tua_list->isGridAdd())
		$m_iuran_hari_tua_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$m_iuran_hari_tua->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($m_iuran_hari_tua_list->Recordset)
	$m_iuran_hari_tua_list->Recordset->Close();
?>
<?php if (!$m_iuran_hari_tua_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$m_iuran_hari_tua_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_iuran_hari_tua_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_iuran_hari_tua_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($m_iuran_hari_tua_list->TotalRecords == 0 && !$m_iuran_hari_tua->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $m_iuran_hari_tua_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$m_iuran_hari_tua_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_iuran_hari_tua_list->isExport()) { ?>
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
$m_iuran_hari_tua_list->terminate();
?>