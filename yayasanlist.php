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
$yayasan_list = new yayasan_list();

// Run the page
$yayasan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$yayasan_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$yayasan_list->isExport()) { ?>
<script>
var fyayasanlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fyayasanlist = currentForm = new ew.Form("fyayasanlist", "list");
	fyayasanlist.formKeyCountName = '<?php echo $yayasan_list->FormKeyCountName ?>';
	loadjs.done("fyayasanlist");
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
<?php if (!$yayasan_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($yayasan_list->TotalRecords > 0 && $yayasan_list->ExportOptions->visible()) { ?>
<?php $yayasan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($yayasan_list->ImportOptions->visible()) { ?>
<?php $yayasan_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$yayasan_list->isExport() || Config("EXPORT_MASTER_RECORD") && $yayasan_list->isExport("print")) { ?>
<?php
if ($yayasan_list->DbMasterFilter != "" && $yayasan->getCurrentMasterTable() == "m_yayasan") {
	if ($yayasan_list->MasterRecordExists) {
		include_once "m_yayasanmaster.php";
	}
}
?>
<?php } ?>
<?php
$yayasan_list->renderOtherOptions();
?>
<?php $yayasan_list->showPageHeader(); ?>
<?php
$yayasan_list->showMessage();
?>
<?php if ($yayasan_list->TotalRecords > 0 || $yayasan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($yayasan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> yayasan">
<?php if (!$yayasan_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$yayasan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $yayasan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $yayasan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fyayasanlist" id="fyayasanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="yayasan">
<?php if ($yayasan->getCurrentMasterTable() == "m_yayasan" && $yayasan->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="m_yayasan">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($yayasan_list->m_id->getSessionValue()) ?>">
<input type="hidden" name="fk_bulan" value="<?php echo HtmlEncode($yayasan_list->bulan->getSessionValue()) ?>">
<input type="hidden" name="fk_tahun" value="<?php echo HtmlEncode($yayasan_list->tahun->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_yayasan" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($yayasan_list->TotalRecords > 0 || $yayasan_list->isGridEdit()) { ?>
<table id="tbl_yayasanlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$yayasan->RowType = ROWTYPE_HEADER;

// Render list options
$yayasan_list->renderListOptions();

// Render list options (header, left)
$yayasan_list->ListOptions->render("header", "left");
?>
<?php if ($yayasan_list->id_pegawai->Visible) { // id_pegawai ?>
	<?php if ($yayasan_list->SortUrl($yayasan_list->id_pegawai) == "") { ?>
		<th data-name="id_pegawai" class="<?php echo $yayasan_list->id_pegawai->headerCellClass() ?>"><div id="elh_yayasan_id_pegawai" class="yayasan_id_pegawai"><div class="ew-table-header-caption"><?php echo $yayasan_list->id_pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_pegawai" class="<?php echo $yayasan_list->id_pegawai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $yayasan_list->SortUrl($yayasan_list->id_pegawai) ?>', 1);"><div id="elh_yayasan_id_pegawai" class="yayasan_id_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $yayasan_list->id_pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($yayasan_list->id_pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($yayasan_list->id_pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($yayasan_list->gaji_pokok->Visible) { // gaji_pokok ?>
	<?php if ($yayasan_list->SortUrl($yayasan_list->gaji_pokok) == "") { ?>
		<th data-name="gaji_pokok" class="<?php echo $yayasan_list->gaji_pokok->headerCellClass() ?>"><div id="elh_yayasan_gaji_pokok" class="yayasan_gaji_pokok"><div class="ew-table-header-caption"><?php echo $yayasan_list->gaji_pokok->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gaji_pokok" class="<?php echo $yayasan_list->gaji_pokok->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $yayasan_list->SortUrl($yayasan_list->gaji_pokok) ?>', 1);"><div id="elh_yayasan_gaji_pokok" class="yayasan_gaji_pokok">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $yayasan_list->gaji_pokok->caption() ?></span><span class="ew-table-header-sort"><?php if ($yayasan_list->gaji_pokok->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($yayasan_list->gaji_pokok->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($yayasan_list->potongan->Visible) { // potongan ?>
	<?php if ($yayasan_list->SortUrl($yayasan_list->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $yayasan_list->potongan->headerCellClass() ?>"><div id="elh_yayasan_potongan" class="yayasan_potongan"><div class="ew-table-header-caption"><?php echo $yayasan_list->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $yayasan_list->potongan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $yayasan_list->SortUrl($yayasan_list->potongan) ?>', 1);"><div id="elh_yayasan_potongan" class="yayasan_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $yayasan_list->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($yayasan_list->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($yayasan_list->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($yayasan_list->total->Visible) { // total ?>
	<?php if ($yayasan_list->SortUrl($yayasan_list->total) == "") { ?>
		<th data-name="total" class="<?php echo $yayasan_list->total->headerCellClass() ?>"><div id="elh_yayasan_total" class="yayasan_total"><div class="ew-table-header-caption"><?php echo $yayasan_list->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $yayasan_list->total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $yayasan_list->SortUrl($yayasan_list->total) ?>', 1);"><div id="elh_yayasan_total" class="yayasan_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $yayasan_list->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($yayasan_list->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($yayasan_list->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$yayasan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($yayasan_list->ExportAll && $yayasan_list->isExport()) {
	$yayasan_list->StopRecord = $yayasan_list->TotalRecords;
} else {

	// Set the last record to display
	if ($yayasan_list->TotalRecords > $yayasan_list->StartRecord + $yayasan_list->DisplayRecords - 1)
		$yayasan_list->StopRecord = $yayasan_list->StartRecord + $yayasan_list->DisplayRecords - 1;
	else
		$yayasan_list->StopRecord = $yayasan_list->TotalRecords;
}
$yayasan_list->RecordCount = $yayasan_list->StartRecord - 1;
if ($yayasan_list->Recordset && !$yayasan_list->Recordset->EOF) {
	$yayasan_list->Recordset->moveFirst();
	$selectLimit = $yayasan_list->UseSelectLimit;
	if (!$selectLimit && $yayasan_list->StartRecord > 1)
		$yayasan_list->Recordset->move($yayasan_list->StartRecord - 1);
} elseif (!$yayasan->AllowAddDeleteRow && $yayasan_list->StopRecord == 0) {
	$yayasan_list->StopRecord = $yayasan->GridAddRowCount;
}

// Initialize aggregate
$yayasan->RowType = ROWTYPE_AGGREGATEINIT;
$yayasan->resetAttributes();
$yayasan_list->renderRow();
while ($yayasan_list->RecordCount < $yayasan_list->StopRecord) {
	$yayasan_list->RecordCount++;
	if ($yayasan_list->RecordCount >= $yayasan_list->StartRecord) {
		$yayasan_list->RowCount++;

		// Set up key count
		$yayasan_list->KeyCount = $yayasan_list->RowIndex;

		// Init row class and style
		$yayasan->resetAttributes();
		$yayasan->CssClass = "";
		if ($yayasan_list->isGridAdd()) {
		} else {
			$yayasan_list->loadRowValues($yayasan_list->Recordset); // Load row values
		}
		$yayasan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$yayasan->RowAttrs->merge(["data-rowindex" => $yayasan_list->RowCount, "id" => "r" . $yayasan_list->RowCount . "_yayasan", "data-rowtype" => $yayasan->RowType]);

		// Render row
		$yayasan_list->renderRow();

		// Render list options
		$yayasan_list->renderListOptions();
?>
	<tr <?php echo $yayasan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$yayasan_list->ListOptions->render("body", "left", $yayasan_list->RowCount);
?>
	<?php if ($yayasan_list->id_pegawai->Visible) { // id_pegawai ?>
		<td data-name="id_pegawai" <?php echo $yayasan_list->id_pegawai->cellAttributes() ?>>
<span id="el<?php echo $yayasan_list->RowCount ?>_yayasan_id_pegawai">
<span<?php echo $yayasan_list->id_pegawai->viewAttributes() ?>><?php echo $yayasan_list->id_pegawai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($yayasan_list->gaji_pokok->Visible) { // gaji_pokok ?>
		<td data-name="gaji_pokok" <?php echo $yayasan_list->gaji_pokok->cellAttributes() ?>>
<span id="el<?php echo $yayasan_list->RowCount ?>_yayasan_gaji_pokok">
<span<?php echo $yayasan_list->gaji_pokok->viewAttributes() ?>><?php echo $yayasan_list->gaji_pokok->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($yayasan_list->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $yayasan_list->potongan->cellAttributes() ?>>
<span id="el<?php echo $yayasan_list->RowCount ?>_yayasan_potongan">
<span<?php echo $yayasan_list->potongan->viewAttributes() ?>><?php echo $yayasan_list->potongan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($yayasan_list->total->Visible) { // total ?>
		<td data-name="total" <?php echo $yayasan_list->total->cellAttributes() ?>>
<span id="el<?php echo $yayasan_list->RowCount ?>_yayasan_total">
<span<?php echo $yayasan_list->total->viewAttributes() ?>><?php echo $yayasan_list->total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$yayasan_list->ListOptions->render("body", "right", $yayasan_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$yayasan_list->isGridAdd())
		$yayasan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$yayasan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($yayasan_list->Recordset)
	$yayasan_list->Recordset->Close();
?>
<?php if (!$yayasan_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$yayasan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $yayasan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $yayasan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($yayasan_list->TotalRecords == 0 && !$yayasan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $yayasan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$yayasan_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$yayasan_list->isExport()) { ?>
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
$yayasan_list->terminate();
?>