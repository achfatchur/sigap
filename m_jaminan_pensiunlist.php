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
$m_jaminan_pensiun_list = new m_jaminan_pensiun_list();

// Run the page
$m_jaminan_pensiun_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_jaminan_pensiun_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_jaminan_pensiun_list->isExport()) { ?>
<script>
var fm_jaminan_pensiunlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fm_jaminan_pensiunlist = currentForm = new ew.Form("fm_jaminan_pensiunlist", "list");
	fm_jaminan_pensiunlist.formKeyCountName = '<?php echo $m_jaminan_pensiun_list->FormKeyCountName ?>';
	loadjs.done("fm_jaminan_pensiunlist");
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
<?php if (!$m_jaminan_pensiun_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($m_jaminan_pensiun_list->TotalRecords > 0 && $m_jaminan_pensiun_list->ExportOptions->visible()) { ?>
<?php $m_jaminan_pensiun_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($m_jaminan_pensiun_list->ImportOptions->visible()) { ?>
<?php $m_jaminan_pensiun_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$m_jaminan_pensiun_list->renderOtherOptions();
?>
<?php $m_jaminan_pensiun_list->showPageHeader(); ?>
<?php
$m_jaminan_pensiun_list->showMessage();
?>
<?php if ($m_jaminan_pensiun_list->TotalRecords > 0 || $m_jaminan_pensiun->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($m_jaminan_pensiun_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> m_jaminan_pensiun">
<?php if (!$m_jaminan_pensiun_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$m_jaminan_pensiun_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_jaminan_pensiun_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_jaminan_pensiun_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fm_jaminan_pensiunlist" id="fm_jaminan_pensiunlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_jaminan_pensiun">
<div id="gmp_m_jaminan_pensiun" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($m_jaminan_pensiun_list->TotalRecords > 0 || $m_jaminan_pensiun_list->isGridEdit()) { ?>
<table id="tbl_m_jaminan_pensiunlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$m_jaminan_pensiun->RowType = ROWTYPE_HEADER;

// Render list options
$m_jaminan_pensiun_list->renderListOptions();

// Render list options (header, left)
$m_jaminan_pensiun_list->ListOptions->render("header", "left");
?>
<?php if ($m_jaminan_pensiun_list->unit->Visible) { // unit ?>
	<?php if ($m_jaminan_pensiun_list->SortUrl($m_jaminan_pensiun_list->unit) == "") { ?>
		<th data-name="unit" class="<?php echo $m_jaminan_pensiun_list->unit->headerCellClass() ?>"><div id="elh_m_jaminan_pensiun_unit" class="m_jaminan_pensiun_unit"><div class="ew-table-header-caption"><?php echo $m_jaminan_pensiun_list->unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="unit" class="<?php echo $m_jaminan_pensiun_list->unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_jaminan_pensiun_list->SortUrl($m_jaminan_pensiun_list->unit) ?>', 1);"><div id="elh_m_jaminan_pensiun_unit" class="m_jaminan_pensiun_unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_jaminan_pensiun_list->unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_jaminan_pensiun_list->unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_jaminan_pensiun_list->unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_jaminan_pensiun_list->value->Visible) { // value ?>
	<?php if ($m_jaminan_pensiun_list->SortUrl($m_jaminan_pensiun_list->value) == "") { ?>
		<th data-name="value" class="<?php echo $m_jaminan_pensiun_list->value->headerCellClass() ?>"><div id="elh_m_jaminan_pensiun_value" class="m_jaminan_pensiun_value"><div class="ew-table-header-caption"><?php echo $m_jaminan_pensiun_list->value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value" class="<?php echo $m_jaminan_pensiun_list->value->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_jaminan_pensiun_list->SortUrl($m_jaminan_pensiun_list->value) ?>', 1);"><div id="elh_m_jaminan_pensiun_value" class="m_jaminan_pensiun_value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_jaminan_pensiun_list->value->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_jaminan_pensiun_list->value->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_jaminan_pensiun_list->value->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$m_jaminan_pensiun_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($m_jaminan_pensiun_list->ExportAll && $m_jaminan_pensiun_list->isExport()) {
	$m_jaminan_pensiun_list->StopRecord = $m_jaminan_pensiun_list->TotalRecords;
} else {

	// Set the last record to display
	if ($m_jaminan_pensiun_list->TotalRecords > $m_jaminan_pensiun_list->StartRecord + $m_jaminan_pensiun_list->DisplayRecords - 1)
		$m_jaminan_pensiun_list->StopRecord = $m_jaminan_pensiun_list->StartRecord + $m_jaminan_pensiun_list->DisplayRecords - 1;
	else
		$m_jaminan_pensiun_list->StopRecord = $m_jaminan_pensiun_list->TotalRecords;
}
$m_jaminan_pensiun_list->RecordCount = $m_jaminan_pensiun_list->StartRecord - 1;
if ($m_jaminan_pensiun_list->Recordset && !$m_jaminan_pensiun_list->Recordset->EOF) {
	$m_jaminan_pensiun_list->Recordset->moveFirst();
	$selectLimit = $m_jaminan_pensiun_list->UseSelectLimit;
	if (!$selectLimit && $m_jaminan_pensiun_list->StartRecord > 1)
		$m_jaminan_pensiun_list->Recordset->move($m_jaminan_pensiun_list->StartRecord - 1);
} elseif (!$m_jaminan_pensiun->AllowAddDeleteRow && $m_jaminan_pensiun_list->StopRecord == 0) {
	$m_jaminan_pensiun_list->StopRecord = $m_jaminan_pensiun->GridAddRowCount;
}

// Initialize aggregate
$m_jaminan_pensiun->RowType = ROWTYPE_AGGREGATEINIT;
$m_jaminan_pensiun->resetAttributes();
$m_jaminan_pensiun_list->renderRow();
while ($m_jaminan_pensiun_list->RecordCount < $m_jaminan_pensiun_list->StopRecord) {
	$m_jaminan_pensiun_list->RecordCount++;
	if ($m_jaminan_pensiun_list->RecordCount >= $m_jaminan_pensiun_list->StartRecord) {
		$m_jaminan_pensiun_list->RowCount++;

		// Set up key count
		$m_jaminan_pensiun_list->KeyCount = $m_jaminan_pensiun_list->RowIndex;

		// Init row class and style
		$m_jaminan_pensiun->resetAttributes();
		$m_jaminan_pensiun->CssClass = "";
		if ($m_jaminan_pensiun_list->isGridAdd()) {
		} else {
			$m_jaminan_pensiun_list->loadRowValues($m_jaminan_pensiun_list->Recordset); // Load row values
		}
		$m_jaminan_pensiun->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$m_jaminan_pensiun->RowAttrs->merge(["data-rowindex" => $m_jaminan_pensiun_list->RowCount, "id" => "r" . $m_jaminan_pensiun_list->RowCount . "_m_jaminan_pensiun", "data-rowtype" => $m_jaminan_pensiun->RowType]);

		// Render row
		$m_jaminan_pensiun_list->renderRow();

		// Render list options
		$m_jaminan_pensiun_list->renderListOptions();
?>
	<tr <?php echo $m_jaminan_pensiun->rowAttributes() ?>>
<?php

// Render list options (body, left)
$m_jaminan_pensiun_list->ListOptions->render("body", "left", $m_jaminan_pensiun_list->RowCount);
?>
	<?php if ($m_jaminan_pensiun_list->unit->Visible) { // unit ?>
		<td data-name="unit" <?php echo $m_jaminan_pensiun_list->unit->cellAttributes() ?>>
<span id="el<?php echo $m_jaminan_pensiun_list->RowCount ?>_m_jaminan_pensiun_unit">
<span<?php echo $m_jaminan_pensiun_list->unit->viewAttributes() ?>><?php echo $m_jaminan_pensiun_list->unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_jaminan_pensiun_list->value->Visible) { // value ?>
		<td data-name="value" <?php echo $m_jaminan_pensiun_list->value->cellAttributes() ?>>
<span id="el<?php echo $m_jaminan_pensiun_list->RowCount ?>_m_jaminan_pensiun_value">
<span<?php echo $m_jaminan_pensiun_list->value->viewAttributes() ?>><?php echo $m_jaminan_pensiun_list->value->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$m_jaminan_pensiun_list->ListOptions->render("body", "right", $m_jaminan_pensiun_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$m_jaminan_pensiun_list->isGridAdd())
		$m_jaminan_pensiun_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$m_jaminan_pensiun->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($m_jaminan_pensiun_list->Recordset)
	$m_jaminan_pensiun_list->Recordset->Close();
?>
<?php if (!$m_jaminan_pensiun_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$m_jaminan_pensiun_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_jaminan_pensiun_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_jaminan_pensiun_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($m_jaminan_pensiun_list->TotalRecords == 0 && !$m_jaminan_pensiun->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $m_jaminan_pensiun_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$m_jaminan_pensiun_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_jaminan_pensiun_list->isExport()) { ?>
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
$m_jaminan_pensiun_list->terminate();
?>