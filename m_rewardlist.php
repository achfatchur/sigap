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
$m_reward_list = new m_reward_list();

// Run the page
$m_reward_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_reward_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_reward_list->isExport()) { ?>
<script>
var fm_rewardlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fm_rewardlist = currentForm = new ew.Form("fm_rewardlist", "list");
	fm_rewardlist.formKeyCountName = '<?php echo $m_reward_list->FormKeyCountName ?>';
	loadjs.done("fm_rewardlist");
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
<?php if (!$m_reward_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($m_reward_list->TotalRecords > 0 && $m_reward_list->ExportOptions->visible()) { ?>
<?php $m_reward_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($m_reward_list->ImportOptions->visible()) { ?>
<?php $m_reward_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$m_reward_list->renderOtherOptions();
?>
<?php $m_reward_list->showPageHeader(); ?>
<?php
$m_reward_list->showMessage();
?>
<?php if ($m_reward_list->TotalRecords > 0 || $m_reward->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($m_reward_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> m_reward">
<?php if (!$m_reward_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$m_reward_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_reward_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_reward_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fm_rewardlist" id="fm_rewardlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_reward">
<div id="gmp_m_reward" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($m_reward_list->TotalRecords > 0 || $m_reward_list->isGridEdit()) { ?>
<table id="tbl_m_rewardlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$m_reward->RowType = ROWTYPE_HEADER;

// Render list options
$m_reward_list->renderListOptions();

// Render list options (header, left)
$m_reward_list->ListOptions->render("header", "left");
?>
<?php if ($m_reward_list->jenjang->Visible) { // jenjang ?>
	<?php if ($m_reward_list->SortUrl($m_reward_list->jenjang) == "") { ?>
		<th data-name="jenjang" class="<?php echo $m_reward_list->jenjang->headerCellClass() ?>"><div id="elh_m_reward_jenjang" class="m_reward_jenjang"><div class="ew-table-header-caption"><?php echo $m_reward_list->jenjang->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang" class="<?php echo $m_reward_list->jenjang->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_reward_list->SortUrl($m_reward_list->jenjang) ?>', 1);"><div id="elh_m_reward_jenjang" class="m_reward_jenjang">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_reward_list->jenjang->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_reward_list->jenjang->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_reward_list->jenjang->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_reward_list->jabatan->Visible) { // jabatan ?>
	<?php if ($m_reward_list->SortUrl($m_reward_list->jabatan) == "") { ?>
		<th data-name="jabatan" class="<?php echo $m_reward_list->jabatan->headerCellClass() ?>"><div id="elh_m_reward_jabatan" class="m_reward_jabatan"><div class="ew-table-header-caption"><?php echo $m_reward_list->jabatan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jabatan" class="<?php echo $m_reward_list->jabatan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_reward_list->SortUrl($m_reward_list->jabatan) ?>', 1);"><div id="elh_m_reward_jabatan" class="m_reward_jabatan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_reward_list->jabatan->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_reward_list->jabatan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_reward_list->jabatan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_reward_list->min_jmlh_masuk->Visible) { // min_jmlh_masuk ?>
	<?php if ($m_reward_list->SortUrl($m_reward_list->min_jmlh_masuk) == "") { ?>
		<th data-name="min_jmlh_masuk" class="<?php echo $m_reward_list->min_jmlh_masuk->headerCellClass() ?>"><div id="elh_m_reward_min_jmlh_masuk" class="m_reward_min_jmlh_masuk"><div class="ew-table-header-caption"><?php echo $m_reward_list->min_jmlh_masuk->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="min_jmlh_masuk" class="<?php echo $m_reward_list->min_jmlh_masuk->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_reward_list->SortUrl($m_reward_list->min_jmlh_masuk) ?>', 1);"><div id="elh_m_reward_min_jmlh_masuk" class="m_reward_min_jmlh_masuk">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_reward_list->min_jmlh_masuk->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_reward_list->min_jmlh_masuk->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_reward_list->min_jmlh_masuk->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_reward_list->value->Visible) { // value ?>
	<?php if ($m_reward_list->SortUrl($m_reward_list->value) == "") { ?>
		<th data-name="value" class="<?php echo $m_reward_list->value->headerCellClass() ?>"><div id="elh_m_reward_value" class="m_reward_value"><div class="ew-table-header-caption"><?php echo $m_reward_list->value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value" class="<?php echo $m_reward_list->value->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_reward_list->SortUrl($m_reward_list->value) ?>', 1);"><div id="elh_m_reward_value" class="m_reward_value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_reward_list->value->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_reward_list->value->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_reward_list->value->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$m_reward_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($m_reward_list->ExportAll && $m_reward_list->isExport()) {
	$m_reward_list->StopRecord = $m_reward_list->TotalRecords;
} else {

	// Set the last record to display
	if ($m_reward_list->TotalRecords > $m_reward_list->StartRecord + $m_reward_list->DisplayRecords - 1)
		$m_reward_list->StopRecord = $m_reward_list->StartRecord + $m_reward_list->DisplayRecords - 1;
	else
		$m_reward_list->StopRecord = $m_reward_list->TotalRecords;
}
$m_reward_list->RecordCount = $m_reward_list->StartRecord - 1;
if ($m_reward_list->Recordset && !$m_reward_list->Recordset->EOF) {
	$m_reward_list->Recordset->moveFirst();
	$selectLimit = $m_reward_list->UseSelectLimit;
	if (!$selectLimit && $m_reward_list->StartRecord > 1)
		$m_reward_list->Recordset->move($m_reward_list->StartRecord - 1);
} elseif (!$m_reward->AllowAddDeleteRow && $m_reward_list->StopRecord == 0) {
	$m_reward_list->StopRecord = $m_reward->GridAddRowCount;
}

// Initialize aggregate
$m_reward->RowType = ROWTYPE_AGGREGATEINIT;
$m_reward->resetAttributes();
$m_reward_list->renderRow();
while ($m_reward_list->RecordCount < $m_reward_list->StopRecord) {
	$m_reward_list->RecordCount++;
	if ($m_reward_list->RecordCount >= $m_reward_list->StartRecord) {
		$m_reward_list->RowCount++;

		// Set up key count
		$m_reward_list->KeyCount = $m_reward_list->RowIndex;

		// Init row class and style
		$m_reward->resetAttributes();
		$m_reward->CssClass = "";
		if ($m_reward_list->isGridAdd()) {
		} else {
			$m_reward_list->loadRowValues($m_reward_list->Recordset); // Load row values
		}
		$m_reward->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$m_reward->RowAttrs->merge(["data-rowindex" => $m_reward_list->RowCount, "id" => "r" . $m_reward_list->RowCount . "_m_reward", "data-rowtype" => $m_reward->RowType]);

		// Render row
		$m_reward_list->renderRow();

		// Render list options
		$m_reward_list->renderListOptions();
?>
	<tr <?php echo $m_reward->rowAttributes() ?>>
<?php

// Render list options (body, left)
$m_reward_list->ListOptions->render("body", "left", $m_reward_list->RowCount);
?>
	<?php if ($m_reward_list->jenjang->Visible) { // jenjang ?>
		<td data-name="jenjang" <?php echo $m_reward_list->jenjang->cellAttributes() ?>>
<span id="el<?php echo $m_reward_list->RowCount ?>_m_reward_jenjang">
<span<?php echo $m_reward_list->jenjang->viewAttributes() ?>><?php echo $m_reward_list->jenjang->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_reward_list->jabatan->Visible) { // jabatan ?>
		<td data-name="jabatan" <?php echo $m_reward_list->jabatan->cellAttributes() ?>>
<span id="el<?php echo $m_reward_list->RowCount ?>_m_reward_jabatan">
<span<?php echo $m_reward_list->jabatan->viewAttributes() ?>><?php echo $m_reward_list->jabatan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_reward_list->min_jmlh_masuk->Visible) { // min_jmlh_masuk ?>
		<td data-name="min_jmlh_masuk" <?php echo $m_reward_list->min_jmlh_masuk->cellAttributes() ?>>
<span id="el<?php echo $m_reward_list->RowCount ?>_m_reward_min_jmlh_masuk">
<span<?php echo $m_reward_list->min_jmlh_masuk->viewAttributes() ?>><?php echo $m_reward_list->min_jmlh_masuk->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_reward_list->value->Visible) { // value ?>
		<td data-name="value" <?php echo $m_reward_list->value->cellAttributes() ?>>
<span id="el<?php echo $m_reward_list->RowCount ?>_m_reward_value">
<span<?php echo $m_reward_list->value->viewAttributes() ?>><?php echo $m_reward_list->value->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$m_reward_list->ListOptions->render("body", "right", $m_reward_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$m_reward_list->isGridAdd())
		$m_reward_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$m_reward->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($m_reward_list->Recordset)
	$m_reward_list->Recordset->Close();
?>
<?php if (!$m_reward_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$m_reward_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_reward_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_reward_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($m_reward_list->TotalRecords == 0 && !$m_reward->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $m_reward_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$m_reward_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_reward_list->isExport()) { ?>
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
$m_reward_list->terminate();
?>