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
$generate_pertahun_smk_list = new generate_pertahun_smk_list();

// Run the page
$generate_pertahun_smk_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$generate_pertahun_smk_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$generate_pertahun_smk_list->isExport()) { ?>
<script>
var fgenerate_pertahun_smklist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fgenerate_pertahun_smklist = currentForm = new ew.Form("fgenerate_pertahun_smklist", "list");
	fgenerate_pertahun_smklist.formKeyCountName = '<?php echo $generate_pertahun_smk_list->FormKeyCountName ?>';
	loadjs.done("fgenerate_pertahun_smklist");
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
<?php if (!$generate_pertahun_smk_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($generate_pertahun_smk_list->TotalRecords > 0 && $generate_pertahun_smk_list->ExportOptions->visible()) { ?>
<?php $generate_pertahun_smk_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($generate_pertahun_smk_list->ImportOptions->visible()) { ?>
<?php $generate_pertahun_smk_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$generate_pertahun_smk_list->renderOtherOptions();
?>
<?php $generate_pertahun_smk_list->showPageHeader(); ?>
<?php
$generate_pertahun_smk_list->showMessage();
?>
<?php if ($generate_pertahun_smk_list->TotalRecords > 0 || $generate_pertahun_smk->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($generate_pertahun_smk_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> generate_pertahun_smk">
<?php if (!$generate_pertahun_smk_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$generate_pertahun_smk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $generate_pertahun_smk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $generate_pertahun_smk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fgenerate_pertahun_smklist" id="fgenerate_pertahun_smklist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="generate_pertahun_smk">
<div id="gmp_generate_pertahun_smk" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($generate_pertahun_smk_list->TotalRecords > 0 || $generate_pertahun_smk_list->isGridEdit()) { ?>
<table id="tbl_generate_pertahun_smklist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$generate_pertahun_smk->RowType = ROWTYPE_HEADER;

// Render list options
$generate_pertahun_smk_list->renderListOptions();

// Render list options (header, left)
$generate_pertahun_smk_list->ListOptions->render("header", "left");
?>
<?php if ($generate_pertahun_smk_list->tahun->Visible) { // tahun ?>
	<?php if ($generate_pertahun_smk_list->SortUrl($generate_pertahun_smk_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $generate_pertahun_smk_list->tahun->headerCellClass() ?>"><div id="elh_generate_pertahun_smk_tahun" class="generate_pertahun_smk_tahun"><div class="ew-table-header-caption"><?php echo $generate_pertahun_smk_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $generate_pertahun_smk_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $generate_pertahun_smk_list->SortUrl($generate_pertahun_smk_list->tahun) ?>', 1);"><div id="elh_generate_pertahun_smk_tahun" class="generate_pertahun_smk_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $generate_pertahun_smk_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($generate_pertahun_smk_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($generate_pertahun_smk_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($generate_pertahun_smk_list->bulan2->Visible) { // bulan2 ?>
	<?php if ($generate_pertahun_smk_list->SortUrl($generate_pertahun_smk_list->bulan2) == "") { ?>
		<th data-name="bulan2" class="<?php echo $generate_pertahun_smk_list->bulan2->headerCellClass() ?>"><div id="elh_generate_pertahun_smk_bulan2" class="generate_pertahun_smk_bulan2"><div class="ew-table-header-caption"><?php echo $generate_pertahun_smk_list->bulan2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan2" class="<?php echo $generate_pertahun_smk_list->bulan2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $generate_pertahun_smk_list->SortUrl($generate_pertahun_smk_list->bulan2) ?>', 1);"><div id="elh_generate_pertahun_smk_bulan2" class="generate_pertahun_smk_bulan2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $generate_pertahun_smk_list->bulan2->caption() ?></span><span class="ew-table-header-sort"><?php if ($generate_pertahun_smk_list->bulan2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($generate_pertahun_smk_list->bulan2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$generate_pertahun_smk_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($generate_pertahun_smk_list->ExportAll && $generate_pertahun_smk_list->isExport()) {
	$generate_pertahun_smk_list->StopRecord = $generate_pertahun_smk_list->TotalRecords;
} else {

	// Set the last record to display
	if ($generate_pertahun_smk_list->TotalRecords > $generate_pertahun_smk_list->StartRecord + $generate_pertahun_smk_list->DisplayRecords - 1)
		$generate_pertahun_smk_list->StopRecord = $generate_pertahun_smk_list->StartRecord + $generate_pertahun_smk_list->DisplayRecords - 1;
	else
		$generate_pertahun_smk_list->StopRecord = $generate_pertahun_smk_list->TotalRecords;
}
$generate_pertahun_smk_list->RecordCount = $generate_pertahun_smk_list->StartRecord - 1;
if ($generate_pertahun_smk_list->Recordset && !$generate_pertahun_smk_list->Recordset->EOF) {
	$generate_pertahun_smk_list->Recordset->moveFirst();
	$selectLimit = $generate_pertahun_smk_list->UseSelectLimit;
	if (!$selectLimit && $generate_pertahun_smk_list->StartRecord > 1)
		$generate_pertahun_smk_list->Recordset->move($generate_pertahun_smk_list->StartRecord - 1);
} elseif (!$generate_pertahun_smk->AllowAddDeleteRow && $generate_pertahun_smk_list->StopRecord == 0) {
	$generate_pertahun_smk_list->StopRecord = $generate_pertahun_smk->GridAddRowCount;
}

// Initialize aggregate
$generate_pertahun_smk->RowType = ROWTYPE_AGGREGATEINIT;
$generate_pertahun_smk->resetAttributes();
$generate_pertahun_smk_list->renderRow();
while ($generate_pertahun_smk_list->RecordCount < $generate_pertahun_smk_list->StopRecord) {
	$generate_pertahun_smk_list->RecordCount++;
	if ($generate_pertahun_smk_list->RecordCount >= $generate_pertahun_smk_list->StartRecord) {
		$generate_pertahun_smk_list->RowCount++;

		// Set up key count
		$generate_pertahun_smk_list->KeyCount = $generate_pertahun_smk_list->RowIndex;

		// Init row class and style
		$generate_pertahun_smk->resetAttributes();
		$generate_pertahun_smk->CssClass = "";
		if ($generate_pertahun_smk_list->isGridAdd()) {
		} else {
			$generate_pertahun_smk_list->loadRowValues($generate_pertahun_smk_list->Recordset); // Load row values
		}
		$generate_pertahun_smk->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$generate_pertahun_smk->RowAttrs->merge(["data-rowindex" => $generate_pertahun_smk_list->RowCount, "id" => "r" . $generate_pertahun_smk_list->RowCount . "_generate_pertahun_smk", "data-rowtype" => $generate_pertahun_smk->RowType]);

		// Render row
		$generate_pertahun_smk_list->renderRow();

		// Render list options
		$generate_pertahun_smk_list->renderListOptions();
?>
	<tr <?php echo $generate_pertahun_smk->rowAttributes() ?>>
<?php

// Render list options (body, left)
$generate_pertahun_smk_list->ListOptions->render("body", "left", $generate_pertahun_smk_list->RowCount);
?>
	<?php if ($generate_pertahun_smk_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $generate_pertahun_smk_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $generate_pertahun_smk_list->RowCount ?>_generate_pertahun_smk_tahun">
<span<?php echo $generate_pertahun_smk_list->tahun->viewAttributes() ?>><?php echo $generate_pertahun_smk_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($generate_pertahun_smk_list->bulan2->Visible) { // bulan2 ?>
		<td data-name="bulan2" <?php echo $generate_pertahun_smk_list->bulan2->cellAttributes() ?>>
<span id="el<?php echo $generate_pertahun_smk_list->RowCount ?>_generate_pertahun_smk_bulan2">
<span<?php echo $generate_pertahun_smk_list->bulan2->viewAttributes() ?>><?php echo $generate_pertahun_smk_list->bulan2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$generate_pertahun_smk_list->ListOptions->render("body", "right", $generate_pertahun_smk_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$generate_pertahun_smk_list->isGridAdd())
		$generate_pertahun_smk_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$generate_pertahun_smk->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($generate_pertahun_smk_list->Recordset)
	$generate_pertahun_smk_list->Recordset->Close();
?>
<?php if (!$generate_pertahun_smk_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$generate_pertahun_smk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $generate_pertahun_smk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $generate_pertahun_smk_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($generate_pertahun_smk_list->TotalRecords == 0 && !$generate_pertahun_smk->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $generate_pertahun_smk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$generate_pertahun_smk_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$generate_pertahun_smk_list->isExport()) { ?>
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
$generate_pertahun_smk_list->terminate();
?>