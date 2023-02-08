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
$generate_pertahun_tk_list = new generate_pertahun_tk_list();

// Run the page
$generate_pertahun_tk_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$generate_pertahun_tk_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$generate_pertahun_tk_list->isExport()) { ?>
<script>
var fgenerate_pertahun_tklist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fgenerate_pertahun_tklist = currentForm = new ew.Form("fgenerate_pertahun_tklist", "list");
	fgenerate_pertahun_tklist.formKeyCountName = '<?php echo $generate_pertahun_tk_list->FormKeyCountName ?>';
	loadjs.done("fgenerate_pertahun_tklist");
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
<?php if (!$generate_pertahun_tk_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($generate_pertahun_tk_list->TotalRecords > 0 && $generate_pertahun_tk_list->ExportOptions->visible()) { ?>
<?php $generate_pertahun_tk_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($generate_pertahun_tk_list->ImportOptions->visible()) { ?>
<?php $generate_pertahun_tk_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$generate_pertahun_tk_list->renderOtherOptions();
?>
<?php $generate_pertahun_tk_list->showPageHeader(); ?>
<?php
$generate_pertahun_tk_list->showMessage();
?>
<?php if ($generate_pertahun_tk_list->TotalRecords > 0 || $generate_pertahun_tk->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($generate_pertahun_tk_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> generate_pertahun_tk">
<?php if (!$generate_pertahun_tk_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$generate_pertahun_tk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $generate_pertahun_tk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $generate_pertahun_tk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fgenerate_pertahun_tklist" id="fgenerate_pertahun_tklist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="generate_pertahun_tk">
<div id="gmp_generate_pertahun_tk" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($generate_pertahun_tk_list->TotalRecords > 0 || $generate_pertahun_tk_list->isGridEdit()) { ?>
<table id="tbl_generate_pertahun_tklist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$generate_pertahun_tk->RowType = ROWTYPE_HEADER;

// Render list options
$generate_pertahun_tk_list->renderListOptions();

// Render list options (header, left)
$generate_pertahun_tk_list->ListOptions->render("header", "left");
?>
<?php if ($generate_pertahun_tk_list->profesi->Visible) { // profesi ?>
	<?php if ($generate_pertahun_tk_list->SortUrl($generate_pertahun_tk_list->profesi) == "") { ?>
		<th data-name="profesi" class="<?php echo $generate_pertahun_tk_list->profesi->headerCellClass() ?>"><div id="elh_generate_pertahun_tk_profesi" class="generate_pertahun_tk_profesi"><div class="ew-table-header-caption"><?php echo $generate_pertahun_tk_list->profesi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profesi" class="<?php echo $generate_pertahun_tk_list->profesi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $generate_pertahun_tk_list->SortUrl($generate_pertahun_tk_list->profesi) ?>', 1);"><div id="elh_generate_pertahun_tk_profesi" class="generate_pertahun_tk_profesi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $generate_pertahun_tk_list->profesi->caption() ?></span><span class="ew-table-header-sort"><?php if ($generate_pertahun_tk_list->profesi->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($generate_pertahun_tk_list->profesi->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($generate_pertahun_tk_list->tahun->Visible) { // tahun ?>
	<?php if ($generate_pertahun_tk_list->SortUrl($generate_pertahun_tk_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $generate_pertahun_tk_list->tahun->headerCellClass() ?>"><div id="elh_generate_pertahun_tk_tahun" class="generate_pertahun_tk_tahun"><div class="ew-table-header-caption"><?php echo $generate_pertahun_tk_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $generate_pertahun_tk_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $generate_pertahun_tk_list->SortUrl($generate_pertahun_tk_list->tahun) ?>', 1);"><div id="elh_generate_pertahun_tk_tahun" class="generate_pertahun_tk_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $generate_pertahun_tk_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($generate_pertahun_tk_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($generate_pertahun_tk_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($generate_pertahun_tk_list->bulan2->Visible) { // bulan2 ?>
	<?php if ($generate_pertahun_tk_list->SortUrl($generate_pertahun_tk_list->bulan2) == "") { ?>
		<th data-name="bulan2" class="<?php echo $generate_pertahun_tk_list->bulan2->headerCellClass() ?>"><div id="elh_generate_pertahun_tk_bulan2" class="generate_pertahun_tk_bulan2"><div class="ew-table-header-caption"><?php echo $generate_pertahun_tk_list->bulan2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan2" class="<?php echo $generate_pertahun_tk_list->bulan2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $generate_pertahun_tk_list->SortUrl($generate_pertahun_tk_list->bulan2) ?>', 1);"><div id="elh_generate_pertahun_tk_bulan2" class="generate_pertahun_tk_bulan2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $generate_pertahun_tk_list->bulan2->caption() ?></span><span class="ew-table-header-sort"><?php if ($generate_pertahun_tk_list->bulan2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($generate_pertahun_tk_list->bulan2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$generate_pertahun_tk_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($generate_pertahun_tk_list->ExportAll && $generate_pertahun_tk_list->isExport()) {
	$generate_pertahun_tk_list->StopRecord = $generate_pertahun_tk_list->TotalRecords;
} else {

	// Set the last record to display
	if ($generate_pertahun_tk_list->TotalRecords > $generate_pertahun_tk_list->StartRecord + $generate_pertahun_tk_list->DisplayRecords - 1)
		$generate_pertahun_tk_list->StopRecord = $generate_pertahun_tk_list->StartRecord + $generate_pertahun_tk_list->DisplayRecords - 1;
	else
		$generate_pertahun_tk_list->StopRecord = $generate_pertahun_tk_list->TotalRecords;
}
$generate_pertahun_tk_list->RecordCount = $generate_pertahun_tk_list->StartRecord - 1;
if ($generate_pertahun_tk_list->Recordset && !$generate_pertahun_tk_list->Recordset->EOF) {
	$generate_pertahun_tk_list->Recordset->moveFirst();
	$selectLimit = $generate_pertahun_tk_list->UseSelectLimit;
	if (!$selectLimit && $generate_pertahun_tk_list->StartRecord > 1)
		$generate_pertahun_tk_list->Recordset->move($generate_pertahun_tk_list->StartRecord - 1);
} elseif (!$generate_pertahun_tk->AllowAddDeleteRow && $generate_pertahun_tk_list->StopRecord == 0) {
	$generate_pertahun_tk_list->StopRecord = $generate_pertahun_tk->GridAddRowCount;
}

// Initialize aggregate
$generate_pertahun_tk->RowType = ROWTYPE_AGGREGATEINIT;
$generate_pertahun_tk->resetAttributes();
$generate_pertahun_tk_list->renderRow();
while ($generate_pertahun_tk_list->RecordCount < $generate_pertahun_tk_list->StopRecord) {
	$generate_pertahun_tk_list->RecordCount++;
	if ($generate_pertahun_tk_list->RecordCount >= $generate_pertahun_tk_list->StartRecord) {
		$generate_pertahun_tk_list->RowCount++;

		// Set up key count
		$generate_pertahun_tk_list->KeyCount = $generate_pertahun_tk_list->RowIndex;

		// Init row class and style
		$generate_pertahun_tk->resetAttributes();
		$generate_pertahun_tk->CssClass = "";
		if ($generate_pertahun_tk_list->isGridAdd()) {
		} else {
			$generate_pertahun_tk_list->loadRowValues($generate_pertahun_tk_list->Recordset); // Load row values
		}
		$generate_pertahun_tk->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$generate_pertahun_tk->RowAttrs->merge(["data-rowindex" => $generate_pertahun_tk_list->RowCount, "id" => "r" . $generate_pertahun_tk_list->RowCount . "_generate_pertahun_tk", "data-rowtype" => $generate_pertahun_tk->RowType]);

		// Render row
		$generate_pertahun_tk_list->renderRow();

		// Render list options
		$generate_pertahun_tk_list->renderListOptions();
?>
	<tr <?php echo $generate_pertahun_tk->rowAttributes() ?>>
<?php

// Render list options (body, left)
$generate_pertahun_tk_list->ListOptions->render("body", "left", $generate_pertahun_tk_list->RowCount);
?>
	<?php if ($generate_pertahun_tk_list->profesi->Visible) { // profesi ?>
		<td data-name="profesi" <?php echo $generate_pertahun_tk_list->profesi->cellAttributes() ?>>
<span id="el<?php echo $generate_pertahun_tk_list->RowCount ?>_generate_pertahun_tk_profesi">
<span<?php echo $generate_pertahun_tk_list->profesi->viewAttributes() ?>><?php echo $generate_pertahun_tk_list->profesi->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($generate_pertahun_tk_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $generate_pertahun_tk_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $generate_pertahun_tk_list->RowCount ?>_generate_pertahun_tk_tahun">
<span<?php echo $generate_pertahun_tk_list->tahun->viewAttributes() ?>><?php echo $generate_pertahun_tk_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($generate_pertahun_tk_list->bulan2->Visible) { // bulan2 ?>
		<td data-name="bulan2" <?php echo $generate_pertahun_tk_list->bulan2->cellAttributes() ?>>
<span id="el<?php echo $generate_pertahun_tk_list->RowCount ?>_generate_pertahun_tk_bulan2">
<span<?php echo $generate_pertahun_tk_list->bulan2->viewAttributes() ?>><?php echo $generate_pertahun_tk_list->bulan2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$generate_pertahun_tk_list->ListOptions->render("body", "right", $generate_pertahun_tk_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$generate_pertahun_tk_list->isGridAdd())
		$generate_pertahun_tk_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$generate_pertahun_tk->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($generate_pertahun_tk_list->Recordset)
	$generate_pertahun_tk_list->Recordset->Close();
?>
<?php if (!$generate_pertahun_tk_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$generate_pertahun_tk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $generate_pertahun_tk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $generate_pertahun_tk_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($generate_pertahun_tk_list->TotalRecords == 0 && !$generate_pertahun_tk->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $generate_pertahun_tk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$generate_pertahun_tk_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$generate_pertahun_tk_list->isExport()) { ?>
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
$generate_pertahun_tk_list->terminate();
?>