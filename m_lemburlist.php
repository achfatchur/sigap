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
$m_lembur_list = new m_lembur_list();

// Run the page
$m_lembur_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_lembur_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_lembur_list->isExport()) { ?>
<script>
var fm_lemburlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fm_lemburlist = currentForm = new ew.Form("fm_lemburlist", "list");
	fm_lemburlist.formKeyCountName = '<?php echo $m_lembur_list->FormKeyCountName ?>';
	loadjs.done("fm_lemburlist");
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
<?php if (!$m_lembur_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($m_lembur_list->TotalRecords > 0 && $m_lembur_list->ExportOptions->visible()) { ?>
<?php $m_lembur_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($m_lembur_list->ImportOptions->visible()) { ?>
<?php $m_lembur_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$m_lembur_list->renderOtherOptions();
?>
<?php $m_lembur_list->showPageHeader(); ?>
<?php
$m_lembur_list->showMessage();
?>
<?php if ($m_lembur_list->TotalRecords > 0 || $m_lembur->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($m_lembur_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> m_lembur">
<?php if (!$m_lembur_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$m_lembur_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_lembur_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_lembur_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fm_lemburlist" id="fm_lemburlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_lembur">
<div id="gmp_m_lembur" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($m_lembur_list->TotalRecords > 0 || $m_lembur_list->isGridEdit()) { ?>
<table id="tbl_m_lemburlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$m_lembur->RowType = ROWTYPE_HEADER;

// Render list options
$m_lembur_list->renderListOptions();

// Render list options (header, left)
$m_lembur_list->ListOptions->render("header", "left");
?>
<?php if ($m_lembur_list->jenjang_id->Visible) { // jenjang_id ?>
	<?php if ($m_lembur_list->SortUrl($m_lembur_list->jenjang_id) == "") { ?>
		<th data-name="jenjang_id" class="<?php echo $m_lembur_list->jenjang_id->headerCellClass() ?>"><div id="elh_m_lembur_jenjang_id" class="m_lembur_jenjang_id"><div class="ew-table-header-caption"><?php echo $m_lembur_list->jenjang_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang_id" class="<?php echo $m_lembur_list->jenjang_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_lembur_list->SortUrl($m_lembur_list->jenjang_id) ?>', 1);"><div id="elh_m_lembur_jenjang_id" class="m_lembur_jenjang_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_lembur_list->jenjang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_lembur_list->jenjang_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_lembur_list->jenjang_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_lembur_list->jabatan_id->Visible) { // jabatan_id ?>
	<?php if ($m_lembur_list->SortUrl($m_lembur_list->jabatan_id) == "") { ?>
		<th data-name="jabatan_id" class="<?php echo $m_lembur_list->jabatan_id->headerCellClass() ?>"><div id="elh_m_lembur_jabatan_id" class="m_lembur_jabatan_id"><div class="ew-table-header-caption"><?php echo $m_lembur_list->jabatan_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jabatan_id" class="<?php echo $m_lembur_list->jabatan_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_lembur_list->SortUrl($m_lembur_list->jabatan_id) ?>', 1);"><div id="elh_m_lembur_jabatan_id" class="m_lembur_jabatan_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_lembur_list->jabatan_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_lembur_list->jabatan_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_lembur_list->jabatan_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_lembur_list->value_perjam->Visible) { // value_perjam ?>
	<?php if ($m_lembur_list->SortUrl($m_lembur_list->value_perjam) == "") { ?>
		<th data-name="value_perjam" class="<?php echo $m_lembur_list->value_perjam->headerCellClass() ?>"><div id="elh_m_lembur_value_perjam" class="m_lembur_value_perjam"><div class="ew-table-header-caption"><?php echo $m_lembur_list->value_perjam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_perjam" class="<?php echo $m_lembur_list->value_perjam->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_lembur_list->SortUrl($m_lembur_list->value_perjam) ?>', 1);"><div id="elh_m_lembur_value_perjam" class="m_lembur_value_perjam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_lembur_list->value_perjam->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_lembur_list->value_perjam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_lembur_list->value_perjam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$m_lembur_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($m_lembur_list->ExportAll && $m_lembur_list->isExport()) {
	$m_lembur_list->StopRecord = $m_lembur_list->TotalRecords;
} else {

	// Set the last record to display
	if ($m_lembur_list->TotalRecords > $m_lembur_list->StartRecord + $m_lembur_list->DisplayRecords - 1)
		$m_lembur_list->StopRecord = $m_lembur_list->StartRecord + $m_lembur_list->DisplayRecords - 1;
	else
		$m_lembur_list->StopRecord = $m_lembur_list->TotalRecords;
}
$m_lembur_list->RecordCount = $m_lembur_list->StartRecord - 1;
if ($m_lembur_list->Recordset && !$m_lembur_list->Recordset->EOF) {
	$m_lembur_list->Recordset->moveFirst();
	$selectLimit = $m_lembur_list->UseSelectLimit;
	if (!$selectLimit && $m_lembur_list->StartRecord > 1)
		$m_lembur_list->Recordset->move($m_lembur_list->StartRecord - 1);
} elseif (!$m_lembur->AllowAddDeleteRow && $m_lembur_list->StopRecord == 0) {
	$m_lembur_list->StopRecord = $m_lembur->GridAddRowCount;
}

// Initialize aggregate
$m_lembur->RowType = ROWTYPE_AGGREGATEINIT;
$m_lembur->resetAttributes();
$m_lembur_list->renderRow();
while ($m_lembur_list->RecordCount < $m_lembur_list->StopRecord) {
	$m_lembur_list->RecordCount++;
	if ($m_lembur_list->RecordCount >= $m_lembur_list->StartRecord) {
		$m_lembur_list->RowCount++;

		// Set up key count
		$m_lembur_list->KeyCount = $m_lembur_list->RowIndex;

		// Init row class and style
		$m_lembur->resetAttributes();
		$m_lembur->CssClass = "";
		if ($m_lembur_list->isGridAdd()) {
		} else {
			$m_lembur_list->loadRowValues($m_lembur_list->Recordset); // Load row values
		}
		$m_lembur->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$m_lembur->RowAttrs->merge(["data-rowindex" => $m_lembur_list->RowCount, "id" => "r" . $m_lembur_list->RowCount . "_m_lembur", "data-rowtype" => $m_lembur->RowType]);

		// Render row
		$m_lembur_list->renderRow();

		// Render list options
		$m_lembur_list->renderListOptions();
?>
	<tr <?php echo $m_lembur->rowAttributes() ?>>
<?php

// Render list options (body, left)
$m_lembur_list->ListOptions->render("body", "left", $m_lembur_list->RowCount);
?>
	<?php if ($m_lembur_list->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id" <?php echo $m_lembur_list->jenjang_id->cellAttributes() ?>>
<span id="el<?php echo $m_lembur_list->RowCount ?>_m_lembur_jenjang_id">
<span<?php echo $m_lembur_list->jenjang_id->viewAttributes() ?>><?php echo $m_lembur_list->jenjang_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_lembur_list->jabatan_id->Visible) { // jabatan_id ?>
		<td data-name="jabatan_id" <?php echo $m_lembur_list->jabatan_id->cellAttributes() ?>>
<span id="el<?php echo $m_lembur_list->RowCount ?>_m_lembur_jabatan_id">
<span<?php echo $m_lembur_list->jabatan_id->viewAttributes() ?>><?php echo $m_lembur_list->jabatan_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_lembur_list->value_perjam->Visible) { // value_perjam ?>
		<td data-name="value_perjam" <?php echo $m_lembur_list->value_perjam->cellAttributes() ?>>
<span id="el<?php echo $m_lembur_list->RowCount ?>_m_lembur_value_perjam">
<span<?php echo $m_lembur_list->value_perjam->viewAttributes() ?>><?php echo $m_lembur_list->value_perjam->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$m_lembur_list->ListOptions->render("body", "right", $m_lembur_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$m_lembur_list->isGridAdd())
		$m_lembur_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$m_lembur->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($m_lembur_list->Recordset)
	$m_lembur_list->Recordset->Close();
?>
<?php if (!$m_lembur_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$m_lembur_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_lembur_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_lembur_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($m_lembur_list->TotalRecords == 0 && !$m_lembur->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $m_lembur_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$m_lembur_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_lembur_list->isExport()) { ?>
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
$m_lembur_list->terminate();
?>