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
$v_m_smp_list = new v_m_smp_list();

// Run the page
$v_m_smp_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_m_smp_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$v_m_smp_list->isExport()) { ?>
<script>
var fv_m_smplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fv_m_smplist = currentForm = new ew.Form("fv_m_smplist", "list");
	fv_m_smplist.formKeyCountName = '<?php echo $v_m_smp_list->FormKeyCountName ?>';
	loadjs.done("fv_m_smplist");
});
var fv_m_smplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fv_m_smplistsrch = currentSearchForm = new ew.Form("fv_m_smplistsrch");

	// Validate function for search
	fv_m_smplistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_tahun");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($v_m_smp_list->tahun->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fv_m_smplistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fv_m_smplistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fv_m_smplistsrch.lists["x_bulan"] = <?php echo $v_m_smp_list->bulan->Lookup->toClientList($v_m_smp_list) ?>;
	fv_m_smplistsrch.lists["x_bulan"].options = <?php echo JsonEncode($v_m_smp_list->bulan->lookupOptions()) ?>;

	// Filters
	fv_m_smplistsrch.filterList = <?php echo $v_m_smp_list->getFilterList() ?>;
	loadjs.done("fv_m_smplistsrch");
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
	ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
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
<?php if (!$v_m_smp_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v_m_smp_list->TotalRecords > 0 && $v_m_smp_list->ExportOptions->visible()) { ?>
<?php $v_m_smp_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v_m_smp_list->ImportOptions->visible()) { ?>
<?php $v_m_smp_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v_m_smp_list->SearchOptions->visible()) { ?>
<?php $v_m_smp_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v_m_smp_list->FilterOptions->visible()) { ?>
<?php $v_m_smp_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v_m_smp_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v_m_smp_list->isExport() && !$v_m_smp->CurrentAction) { ?>
<form name="fv_m_smplistsrch" id="fv_m_smplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fv_m_smplistsrch-search-panel" class="<?php echo $v_m_smp_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v_m_smp">
	<div class="ew-extended-search">
<?php

// Render search row
$v_m_smp->RowType = ROWTYPE_SEARCH;
$v_m_smp->resetAttributes();
$v_m_smp_list->renderRow();
?>
<?php if ($v_m_smp_list->tahun->Visible) { // tahun ?>
	<?php
		$v_m_smp_list->SearchColumnCount++;
		if (($v_m_smp_list->SearchColumnCount - 1) % $v_m_smp_list->SearchFieldsPerRow == 0) {
			$v_m_smp_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $v_m_smp_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_tahun" class="ew-cell form-group">
		<label for="x_tahun" class="ew-search-caption ew-label"><?php echo $v_m_smp_list->tahun->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_tahun" id="z_tahun" value="=">
</span>
		<span id="el_v_m_smp_tahun" class="ew-search-field">
<input type="text" data-table="v_m_smp" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($v_m_smp_list->tahun->getPlaceHolder()) ?>" value="<?php echo $v_m_smp_list->tahun->EditValue ?>"<?php echo $v_m_smp_list->tahun->editAttributes() ?>>
</span>
	</div>
	<?php if ($v_m_smp_list->SearchColumnCount % $v_m_smp_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($v_m_smp_list->bulan->Visible) { // bulan ?>
	<?php
		$v_m_smp_list->SearchColumnCount++;
		if (($v_m_smp_list->SearchColumnCount - 1) % $v_m_smp_list->SearchFieldsPerRow == 0) {
			$v_m_smp_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $v_m_smp_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_bulan" class="ew-cell form-group">
		<label for="x_bulan" class="ew-search-caption ew-label"><?php echo $v_m_smp_list->bulan->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_bulan" id="z_bulan" value="=">
</span>
		<span id="el_v_m_smp_bulan" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_bulan"><?php echo EmptyValue(strval($v_m_smp_list->bulan->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_m_smp_list->bulan->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_m_smp_list->bulan->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_m_smp_list->bulan->ReadOnly || $v_m_smp_list->bulan->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_bulan',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_m_smp_list->bulan->Lookup->getParamTag($v_m_smp_list, "p_x_bulan") ?>
<input type="hidden" data-table="v_m_smp" data-field="x_bulan" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_m_smp_list->bulan->displayValueSeparatorAttribute() ?>" name="x_bulan" id="x_bulan" value="<?php echo $v_m_smp_list->bulan->AdvancedSearch->SearchValue ?>"<?php echo $v_m_smp_list->bulan->editAttributes() ?>>
</span>
	</div>
	<?php if ($v_m_smp_list->SearchColumnCount % $v_m_smp_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($v_m_smp_list->SearchColumnCount % $v_m_smp_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $v_m_smp_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $v_m_smp_list->showPageHeader(); ?>
<?php
$v_m_smp_list->showMessage();
?>
<?php if ($v_m_smp_list->TotalRecords > 0 || $v_m_smp->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v_m_smp_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v_m_smp">
<?php if (!$v_m_smp_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$v_m_smp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v_m_smp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_m_smp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fv_m_smplist" id="fv_m_smplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v_m_smp">
<div id="gmp_v_m_smp" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($v_m_smp_list->TotalRecords > 0 || $v_m_smp_list->isGridEdit()) { ?>
<table id="tbl_v_m_smplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v_m_smp->RowType = ROWTYPE_HEADER;

// Render list options
$v_m_smp_list->renderListOptions();

// Render list options (header, left)
$v_m_smp_list->ListOptions->render("header", "left");
?>
<?php if ($v_m_smp_list->createby->Visible) { // createby ?>
	<?php if ($v_m_smp_list->SortUrl($v_m_smp_list->createby) == "") { ?>
		<th data-name="createby" class="<?php echo $v_m_smp_list->createby->headerCellClass() ?>"><div id="elh_v_m_smp_createby" class="v_m_smp_createby"><div class="ew-table-header-caption"><?php echo $v_m_smp_list->createby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createby" class="<?php echo $v_m_smp_list->createby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_m_smp_list->SortUrl($v_m_smp_list->createby) ?>', 1);"><div id="elh_v_m_smp_createby" class="v_m_smp_createby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_m_smp_list->createby->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_m_smp_list->createby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_m_smp_list->createby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_m_smp_list->tahun->Visible) { // tahun ?>
	<?php if ($v_m_smp_list->SortUrl($v_m_smp_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $v_m_smp_list->tahun->headerCellClass() ?>"><div id="elh_v_m_smp_tahun" class="v_m_smp_tahun"><div class="ew-table-header-caption"><?php echo $v_m_smp_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $v_m_smp_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_m_smp_list->SortUrl($v_m_smp_list->tahun) ?>', 1);"><div id="elh_v_m_smp_tahun" class="v_m_smp_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_m_smp_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_m_smp_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_m_smp_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_m_smp_list->bulan->Visible) { // bulan ?>
	<?php if ($v_m_smp_list->SortUrl($v_m_smp_list->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $v_m_smp_list->bulan->headerCellClass() ?>"><div id="elh_v_m_smp_bulan" class="v_m_smp_bulan"><div class="ew-table-header-caption"><?php echo $v_m_smp_list->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $v_m_smp_list->bulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_m_smp_list->SortUrl($v_m_smp_list->bulan) ?>', 1);"><div id="elh_v_m_smp_bulan" class="v_m_smp_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_m_smp_list->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_m_smp_list->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_m_smp_list->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v_m_smp_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v_m_smp_list->ExportAll && $v_m_smp_list->isExport()) {
	$v_m_smp_list->StopRecord = $v_m_smp_list->TotalRecords;
} else {

	// Set the last record to display
	if ($v_m_smp_list->TotalRecords > $v_m_smp_list->StartRecord + $v_m_smp_list->DisplayRecords - 1)
		$v_m_smp_list->StopRecord = $v_m_smp_list->StartRecord + $v_m_smp_list->DisplayRecords - 1;
	else
		$v_m_smp_list->StopRecord = $v_m_smp_list->TotalRecords;
}
$v_m_smp_list->RecordCount = $v_m_smp_list->StartRecord - 1;
if ($v_m_smp_list->Recordset && !$v_m_smp_list->Recordset->EOF) {
	$v_m_smp_list->Recordset->moveFirst();
	$selectLimit = $v_m_smp_list->UseSelectLimit;
	if (!$selectLimit && $v_m_smp_list->StartRecord > 1)
		$v_m_smp_list->Recordset->move($v_m_smp_list->StartRecord - 1);
} elseif (!$v_m_smp->AllowAddDeleteRow && $v_m_smp_list->StopRecord == 0) {
	$v_m_smp_list->StopRecord = $v_m_smp->GridAddRowCount;
}

// Initialize aggregate
$v_m_smp->RowType = ROWTYPE_AGGREGATEINIT;
$v_m_smp->resetAttributes();
$v_m_smp_list->renderRow();
while ($v_m_smp_list->RecordCount < $v_m_smp_list->StopRecord) {
	$v_m_smp_list->RecordCount++;
	if ($v_m_smp_list->RecordCount >= $v_m_smp_list->StartRecord) {
		$v_m_smp_list->RowCount++;

		// Set up key count
		$v_m_smp_list->KeyCount = $v_m_smp_list->RowIndex;

		// Init row class and style
		$v_m_smp->resetAttributes();
		$v_m_smp->CssClass = "";
		if ($v_m_smp_list->isGridAdd()) {
		} else {
			$v_m_smp_list->loadRowValues($v_m_smp_list->Recordset); // Load row values
		}
		$v_m_smp->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v_m_smp->RowAttrs->merge(["data-rowindex" => $v_m_smp_list->RowCount, "id" => "r" . $v_m_smp_list->RowCount . "_v_m_smp", "data-rowtype" => $v_m_smp->RowType]);

		// Render row
		$v_m_smp_list->renderRow();

		// Render list options
		$v_m_smp_list->renderListOptions();
?>
	<tr <?php echo $v_m_smp->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_m_smp_list->ListOptions->render("body", "left", $v_m_smp_list->RowCount);
?>
	<?php if ($v_m_smp_list->createby->Visible) { // createby ?>
		<td data-name="createby" <?php echo $v_m_smp_list->createby->cellAttributes() ?>>
<span id="el<?php echo $v_m_smp_list->RowCount ?>_v_m_smp_createby">
<span<?php echo $v_m_smp_list->createby->viewAttributes() ?>><?php echo $v_m_smp_list->createby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_m_smp_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $v_m_smp_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $v_m_smp_list->RowCount ?>_v_m_smp_tahun">
<span<?php echo $v_m_smp_list->tahun->viewAttributes() ?>><?php echo $v_m_smp_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_m_smp_list->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $v_m_smp_list->bulan->cellAttributes() ?>>
<span id="el<?php echo $v_m_smp_list->RowCount ?>_v_m_smp_bulan">
<span<?php echo $v_m_smp_list->bulan->viewAttributes() ?>><?php echo $v_m_smp_list->bulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v_m_smp_list->ListOptions->render("body", "right", $v_m_smp_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$v_m_smp_list->isGridAdd())
		$v_m_smp_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$v_m_smp->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v_m_smp_list->Recordset)
	$v_m_smp_list->Recordset->Close();
?>
<?php if (!$v_m_smp_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v_m_smp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v_m_smp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_m_smp_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v_m_smp_list->TotalRecords == 0 && !$v_m_smp->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v_m_smp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v_m_smp_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$v_m_smp_list->isExport()) { ?>
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
$v_m_smp_list->terminate();
?>