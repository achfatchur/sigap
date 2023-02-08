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
$m_tahun_list = new m_tahun_list();

// Run the page
$m_tahun_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_tahun_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_tahun_list->isExport()) { ?>
<script>
var fm_tahunlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fm_tahunlist = currentForm = new ew.Form("fm_tahunlist", "list");
	fm_tahunlist.formKeyCountName = '<?php echo $m_tahun_list->FormKeyCountName ?>';
	loadjs.done("fm_tahunlist");
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
<?php if (!$m_tahun_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($m_tahun_list->TotalRecords > 0 && $m_tahun_list->ExportOptions->visible()) { ?>
<?php $m_tahun_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($m_tahun_list->ImportOptions->visible()) { ?>
<?php $m_tahun_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$m_tahun_list->renderOtherOptions();
?>
<?php $m_tahun_list->showPageHeader(); ?>
<?php
$m_tahun_list->showMessage();
?>
<?php if ($m_tahun_list->TotalRecords > 0 || $m_tahun->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($m_tahun_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> m_tahun">
<?php if (!$m_tahun_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$m_tahun_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_tahun_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_tahun_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fm_tahunlist" id="fm_tahunlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_tahun">
<div id="gmp_m_tahun" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($m_tahun_list->TotalRecords > 0 || $m_tahun_list->isGridEdit()) { ?>
<table id="tbl_m_tahunlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$m_tahun->RowType = ROWTYPE_HEADER;

// Render list options
$m_tahun_list->renderListOptions();

// Render list options (header, left)
$m_tahun_list->ListOptions->render("header", "left");
?>
<?php if ($m_tahun_list->tahun->Visible) { // tahun ?>
	<?php if ($m_tahun_list->SortUrl($m_tahun_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $m_tahun_list->tahun->headerCellClass() ?>"><div id="elh_m_tahun_tahun" class="m_tahun_tahun"><div class="ew-table-header-caption"><?php echo $m_tahun_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $m_tahun_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_tahun_list->SortUrl($m_tahun_list->tahun) ?>', 1);"><div id="elh_m_tahun_tahun" class="m_tahun_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_tahun_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_tahun_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_tahun_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_tahun_list->no_urut->Visible) { // no_urut ?>
	<?php if ($m_tahun_list->SortUrl($m_tahun_list->no_urut) == "") { ?>
		<th data-name="no_urut" class="<?php echo $m_tahun_list->no_urut->headerCellClass() ?>"><div id="elh_m_tahun_no_urut" class="m_tahun_no_urut"><div class="ew-table-header-caption"><?php echo $m_tahun_list->no_urut->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="no_urut" class="<?php echo $m_tahun_list->no_urut->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_tahun_list->SortUrl($m_tahun_list->no_urut) ?>', 1);"><div id="elh_m_tahun_no_urut" class="m_tahun_no_urut">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_tahun_list->no_urut->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_tahun_list->no_urut->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_tahun_list->no_urut->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$m_tahun_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($m_tahun_list->ExportAll && $m_tahun_list->isExport()) {
	$m_tahun_list->StopRecord = $m_tahun_list->TotalRecords;
} else {

	// Set the last record to display
	if ($m_tahun_list->TotalRecords > $m_tahun_list->StartRecord + $m_tahun_list->DisplayRecords - 1)
		$m_tahun_list->StopRecord = $m_tahun_list->StartRecord + $m_tahun_list->DisplayRecords - 1;
	else
		$m_tahun_list->StopRecord = $m_tahun_list->TotalRecords;
}
$m_tahun_list->RecordCount = $m_tahun_list->StartRecord - 1;
if ($m_tahun_list->Recordset && !$m_tahun_list->Recordset->EOF) {
	$m_tahun_list->Recordset->moveFirst();
	$selectLimit = $m_tahun_list->UseSelectLimit;
	if (!$selectLimit && $m_tahun_list->StartRecord > 1)
		$m_tahun_list->Recordset->move($m_tahun_list->StartRecord - 1);
} elseif (!$m_tahun->AllowAddDeleteRow && $m_tahun_list->StopRecord == 0) {
	$m_tahun_list->StopRecord = $m_tahun->GridAddRowCount;
}

// Initialize aggregate
$m_tahun->RowType = ROWTYPE_AGGREGATEINIT;
$m_tahun->resetAttributes();
$m_tahun_list->renderRow();
while ($m_tahun_list->RecordCount < $m_tahun_list->StopRecord) {
	$m_tahun_list->RecordCount++;
	if ($m_tahun_list->RecordCount >= $m_tahun_list->StartRecord) {
		$m_tahun_list->RowCount++;

		// Set up key count
		$m_tahun_list->KeyCount = $m_tahun_list->RowIndex;

		// Init row class and style
		$m_tahun->resetAttributes();
		$m_tahun->CssClass = "";
		if ($m_tahun_list->isGridAdd()) {
		} else {
			$m_tahun_list->loadRowValues($m_tahun_list->Recordset); // Load row values
		}
		$m_tahun->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$m_tahun->RowAttrs->merge(["data-rowindex" => $m_tahun_list->RowCount, "id" => "r" . $m_tahun_list->RowCount . "_m_tahun", "data-rowtype" => $m_tahun->RowType]);

		// Render row
		$m_tahun_list->renderRow();

		// Render list options
		$m_tahun_list->renderListOptions();
?>
	<tr <?php echo $m_tahun->rowAttributes() ?>>
<?php

// Render list options (body, left)
$m_tahun_list->ListOptions->render("body", "left", $m_tahun_list->RowCount);
?>
	<?php if ($m_tahun_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $m_tahun_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $m_tahun_list->RowCount ?>_m_tahun_tahun">
<span<?php echo $m_tahun_list->tahun->viewAttributes() ?>><?php echo $m_tahun_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_tahun_list->no_urut->Visible) { // no_urut ?>
		<td data-name="no_urut" <?php echo $m_tahun_list->no_urut->cellAttributes() ?>>
<span id="el<?php echo $m_tahun_list->RowCount ?>_m_tahun_no_urut">
<span<?php echo $m_tahun_list->no_urut->viewAttributes() ?>><?php echo $m_tahun_list->no_urut->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$m_tahun_list->ListOptions->render("body", "right", $m_tahun_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$m_tahun_list->isGridAdd())
		$m_tahun_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$m_tahun->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($m_tahun_list->Recordset)
	$m_tahun_list->Recordset->Close();
?>
<?php if (!$m_tahun_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$m_tahun_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_tahun_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_tahun_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($m_tahun_list->TotalRecords == 0 && !$m_tahun->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $m_tahun_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$m_tahun_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_tahun_list->isExport()) { ?>
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
$m_tahun_list->terminate();
?>