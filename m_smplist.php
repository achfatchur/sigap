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
$m_smp_list = new m_smp_list();

// Run the page
$m_smp_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_smp_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_smp_list->isExport()) { ?>
<script>
var fm_smplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fm_smplist = currentForm = new ew.Form("fm_smplist", "list");
	fm_smplist.formKeyCountName = '<?php echo $m_smp_list->FormKeyCountName ?>';
	loadjs.done("fm_smplist");
});
var fm_smplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fm_smplistsrch = currentSearchForm = new ew.Form("fm_smplistsrch");

	// Validate function for search
	fm_smplistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_tahun");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($m_smp_list->tahun->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fm_smplistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fm_smplistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fm_smplistsrch.lists["x_bulan"] = <?php echo $m_smp_list->bulan->Lookup->toClientList($m_smp_list) ?>;
	fm_smplistsrch.lists["x_bulan"].options = <?php echo JsonEncode($m_smp_list->bulan->lookupOptions()) ?>;

	// Filters
	fm_smplistsrch.filterList = <?php echo $m_smp_list->getFilterList() ?>;
	loadjs.done("fm_smplistsrch");
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
	ew.PREVIEW_OVERLAY = true;
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
<?php if (!$m_smp_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($m_smp_list->TotalRecords > 0 && $m_smp_list->ExportOptions->visible()) { ?>
<?php $m_smp_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($m_smp_list->ImportOptions->visible()) { ?>
<?php $m_smp_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($m_smp_list->SearchOptions->visible()) { ?>
<?php $m_smp_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($m_smp_list->FilterOptions->visible()) { ?>
<?php $m_smp_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$m_smp_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$m_smp_list->isExport() && !$m_smp->CurrentAction) { ?>
<form name="fm_smplistsrch" id="fm_smplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fm_smplistsrch-search-panel" class="<?php echo $m_smp_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="m_smp">
	<div class="ew-extended-search">
<?php

// Render search row
$m_smp->RowType = ROWTYPE_SEARCH;
$m_smp->resetAttributes();
$m_smp_list->renderRow();
?>
<?php if ($m_smp_list->tahun->Visible) { // tahun ?>
	<?php
		$m_smp_list->SearchColumnCount++;
		if (($m_smp_list->SearchColumnCount - 1) % $m_smp_list->SearchFieldsPerRow == 0) {
			$m_smp_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $m_smp_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_tahun" class="ew-cell form-group">
		<label for="x_tahun" class="ew-search-caption ew-label"><?php echo $m_smp_list->tahun->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_tahun" id="z_tahun" value="=">
</span>
		<span id="el_m_smp_tahun" class="ew-search-field">
<input type="text" data-table="m_smp" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($m_smp_list->tahun->getPlaceHolder()) ?>" value="<?php echo $m_smp_list->tahun->EditValue ?>"<?php echo $m_smp_list->tahun->editAttributes() ?>>
</span>
	</div>
	<?php if ($m_smp_list->SearchColumnCount % $m_smp_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($m_smp_list->bulan->Visible) { // bulan ?>
	<?php
		$m_smp_list->SearchColumnCount++;
		if (($m_smp_list->SearchColumnCount - 1) % $m_smp_list->SearchFieldsPerRow == 0) {
			$m_smp_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $m_smp_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_bulan" class="ew-cell form-group">
		<label for="x_bulan" class="ew-search-caption ew-label"><?php echo $m_smp_list->bulan->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_bulan" id="z_bulan" value="=">
</span>
		<span id="el_m_smp_bulan" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="m_smp" data-field="x_bulan" data-value-separator="<?php echo $m_smp_list->bulan->displayValueSeparatorAttribute() ?>" id="x_bulan" name="x_bulan"<?php echo $m_smp_list->bulan->editAttributes() ?>>
			<?php echo $m_smp_list->bulan->selectOptionListHtml("x_bulan") ?>
		</select>
</div>
<?php echo $m_smp_list->bulan->Lookup->getParamTag($m_smp_list, "p_x_bulan") ?>
</span>
	</div>
	<?php if ($m_smp_list->SearchColumnCount % $m_smp_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($m_smp_list->SearchColumnCount % $m_smp_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $m_smp_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $m_smp_list->showPageHeader(); ?>
<?php
$m_smp_list->showMessage();
?>
<?php if ($m_smp_list->TotalRecords > 0 || $m_smp->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($m_smp_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> m_smp">
<?php if (!$m_smp_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$m_smp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_smp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_smp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fm_smplist" id="fm_smplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_smp">
<div id="gmp_m_smp" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($m_smp_list->TotalRecords > 0 || $m_smp_list->isGridEdit()) { ?>
<table id="tbl_m_smplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$m_smp->RowType = ROWTYPE_HEADER;

// Render list options
$m_smp_list->renderListOptions();

// Render list options (header, left)
$m_smp_list->ListOptions->render("header", "left");
?>
<?php if ($m_smp_list->tahun->Visible) { // tahun ?>
	<?php if ($m_smp_list->SortUrl($m_smp_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $m_smp_list->tahun->headerCellClass() ?>"><div id="elh_m_smp_tahun" class="m_smp_tahun"><div class="ew-table-header-caption"><?php echo $m_smp_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $m_smp_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_smp_list->SortUrl($m_smp_list->tahun) ?>', 1);"><div id="elh_m_smp_tahun" class="m_smp_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_smp_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_smp_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_smp_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_smp_list->bulan->Visible) { // bulan ?>
	<?php if ($m_smp_list->SortUrl($m_smp_list->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $m_smp_list->bulan->headerCellClass() ?>"><div id="elh_m_smp_bulan" class="m_smp_bulan"><div class="ew-table-header-caption"><?php echo $m_smp_list->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $m_smp_list->bulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_smp_list->SortUrl($m_smp_list->bulan) ?>', 1);"><div id="elh_m_smp_bulan" class="m_smp_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_smp_list->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_smp_list->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_smp_list->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$m_smp_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($m_smp_list->ExportAll && $m_smp_list->isExport()) {
	$m_smp_list->StopRecord = $m_smp_list->TotalRecords;
} else {

	// Set the last record to display
	if ($m_smp_list->TotalRecords > $m_smp_list->StartRecord + $m_smp_list->DisplayRecords - 1)
		$m_smp_list->StopRecord = $m_smp_list->StartRecord + $m_smp_list->DisplayRecords - 1;
	else
		$m_smp_list->StopRecord = $m_smp_list->TotalRecords;
}
$m_smp_list->RecordCount = $m_smp_list->StartRecord - 1;
if ($m_smp_list->Recordset && !$m_smp_list->Recordset->EOF) {
	$m_smp_list->Recordset->moveFirst();
	$selectLimit = $m_smp_list->UseSelectLimit;
	if (!$selectLimit && $m_smp_list->StartRecord > 1)
		$m_smp_list->Recordset->move($m_smp_list->StartRecord - 1);
} elseif (!$m_smp->AllowAddDeleteRow && $m_smp_list->StopRecord == 0) {
	$m_smp_list->StopRecord = $m_smp->GridAddRowCount;
}

// Initialize aggregate
$m_smp->RowType = ROWTYPE_AGGREGATEINIT;
$m_smp->resetAttributes();
$m_smp_list->renderRow();
while ($m_smp_list->RecordCount < $m_smp_list->StopRecord) {
	$m_smp_list->RecordCount++;
	if ($m_smp_list->RecordCount >= $m_smp_list->StartRecord) {
		$m_smp_list->RowCount++;

		// Set up key count
		$m_smp_list->KeyCount = $m_smp_list->RowIndex;

		// Init row class and style
		$m_smp->resetAttributes();
		$m_smp->CssClass = "";
		if ($m_smp_list->isGridAdd()) {
		} else {
			$m_smp_list->loadRowValues($m_smp_list->Recordset); // Load row values
		}
		$m_smp->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$m_smp->RowAttrs->merge(["data-rowindex" => $m_smp_list->RowCount, "id" => "r" . $m_smp_list->RowCount . "_m_smp", "data-rowtype" => $m_smp->RowType]);

		// Render row
		$m_smp_list->renderRow();

		// Render list options
		$m_smp_list->renderListOptions();
?>
	<tr <?php echo $m_smp->rowAttributes() ?>>
<?php

// Render list options (body, left)
$m_smp_list->ListOptions->render("body", "left", $m_smp_list->RowCount);
?>
	<?php if ($m_smp_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $m_smp_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $m_smp_list->RowCount ?>_m_smp_tahun">
<span<?php echo $m_smp_list->tahun->viewAttributes() ?>><?php echo $m_smp_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($m_smp_list->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $m_smp_list->bulan->cellAttributes() ?>>
<span id="el<?php echo $m_smp_list->RowCount ?>_m_smp_bulan">
<span<?php echo $m_smp_list->bulan->viewAttributes() ?>><?php echo $m_smp_list->bulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$m_smp_list->ListOptions->render("body", "right", $m_smp_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$m_smp_list->isGridAdd())
		$m_smp_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$m_smp->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($m_smp_list->Recordset)
	$m_smp_list->Recordset->Close();
?>
<?php if (!$m_smp_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$m_smp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_smp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_smp_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($m_smp_list->TotalRecords == 0 && !$m_smp->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $m_smp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$m_smp_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_smp_list->isExport()) { ?>
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
$m_smp_list->terminate();
?>