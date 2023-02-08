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
$vgaji_guru_smk_list = new vgaji_guru_smk_list();

// Run the page
$vgaji_guru_smk_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vgaji_guru_smk_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vgaji_guru_smk_list->isExport()) { ?>
<script>
var fvgaji_guru_smklist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvgaji_guru_smklist = currentForm = new ew.Form("fvgaji_guru_smklist", "list");
	fvgaji_guru_smklist.formKeyCountName = '<?php echo $vgaji_guru_smk_list->FormKeyCountName ?>';
	loadjs.done("fvgaji_guru_smklist");
});
var fvgaji_guru_smklistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvgaji_guru_smklistsrch = currentSearchForm = new ew.Form("fvgaji_guru_smklistsrch");

	// Validate function for search
	fvgaji_guru_smklistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_tahun");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vgaji_guru_smk_list->tahun->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fvgaji_guru_smklistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvgaji_guru_smklistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fvgaji_guru_smklistsrch.lists["x_bulan[]"] = <?php echo $vgaji_guru_smk_list->bulan->Lookup->toClientList($vgaji_guru_smk_list) ?>;
	fvgaji_guru_smklistsrch.lists["x_bulan[]"].options = <?php echo JsonEncode($vgaji_guru_smk_list->bulan->lookupOptions()) ?>;
	fvgaji_guru_smklistsrch.lists["x_pegawai"] = <?php echo $vgaji_guru_smk_list->pegawai->Lookup->toClientList($vgaji_guru_smk_list) ?>;
	fvgaji_guru_smklistsrch.lists["x_pegawai"].options = <?php echo JsonEncode($vgaji_guru_smk_list->pegawai->lookupOptions()) ?>;

	// Filters
	fvgaji_guru_smklistsrch.filterList = <?php echo $vgaji_guru_smk_list->getFilterList() ?>;
	loadjs.done("fvgaji_guru_smklistsrch");
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
<?php if (!$vgaji_guru_smk_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vgaji_guru_smk_list->TotalRecords > 0 && $vgaji_guru_smk_list->ExportOptions->visible()) { ?>
<?php $vgaji_guru_smk_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->ImportOptions->visible()) { ?>
<?php $vgaji_guru_smk_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->SearchOptions->visible()) { ?>
<?php $vgaji_guru_smk_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->FilterOptions->visible()) { ?>
<?php $vgaji_guru_smk_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vgaji_guru_smk_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vgaji_guru_smk_list->isExport() && !$vgaji_guru_smk->CurrentAction) { ?>
<form name="fvgaji_guru_smklistsrch" id="fvgaji_guru_smklistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvgaji_guru_smklistsrch-search-panel" class="<?php echo $vgaji_guru_smk_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vgaji_guru_smk">
	<div class="ew-extended-search">
<?php

// Render search row
$vgaji_guru_smk->RowType = ROWTYPE_SEARCH;
$vgaji_guru_smk->resetAttributes();
$vgaji_guru_smk_list->renderRow();
?>
<?php if ($vgaji_guru_smk_list->tahun->Visible) { // tahun ?>
	<?php
		$vgaji_guru_smk_list->SearchColumnCount++;
		if (($vgaji_guru_smk_list->SearchColumnCount - 1) % $vgaji_guru_smk_list->SearchFieldsPerRow == 0) {
			$vgaji_guru_smk_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vgaji_guru_smk_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_tahun" class="ew-cell form-group">
		<label for="x_tahun" class="ew-search-caption ew-label"><?php echo $vgaji_guru_smk_list->tahun->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_tahun" id="z_tahun" value="=">
</span>
		<span id="el_vgaji_guru_smk_tahun" class="ew-search-field">
<input type="text" data-table="vgaji_guru_smk" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_smk_list->tahun->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_smk_list->tahun->EditValue ?>"<?php echo $vgaji_guru_smk_list->tahun->editAttributes() ?>>
</span>
	</div>
	<?php if ($vgaji_guru_smk_list->SearchColumnCount % $vgaji_guru_smk_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->bulan->Visible) { // bulan ?>
	<?php
		$vgaji_guru_smk_list->SearchColumnCount++;
		if (($vgaji_guru_smk_list->SearchColumnCount - 1) % $vgaji_guru_smk_list->SearchFieldsPerRow == 0) {
			$vgaji_guru_smk_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vgaji_guru_smk_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_bulan" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $vgaji_guru_smk_list->bulan->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_bulan" id="z_bulan" value="=">
</span>
		<span id="el_vgaji_guru_smk_bulan" class="ew-search-field">
<div id="tp_x_bulan" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="vgaji_guru_smk" data-field="x_bulan" data-value-separator="<?php echo $vgaji_guru_smk_list->bulan->displayValueSeparatorAttribute() ?>" name="x_bulan[]" id="x_bulan[]" value="{value}"<?php echo $vgaji_guru_smk_list->bulan->editAttributes() ?>></div>
<div id="dsl_x_bulan" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $vgaji_guru_smk_list->bulan->checkBoxListHtml(FALSE, "x_bulan[]") ?>
</div></div>
<?php echo $vgaji_guru_smk_list->bulan->Lookup->getParamTag($vgaji_guru_smk_list, "p_x_bulan") ?>
</span>
	</div>
	<?php if ($vgaji_guru_smk_list->SearchColumnCount % $vgaji_guru_smk_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->pegawai->Visible) { // pegawai ?>
	<?php
		$vgaji_guru_smk_list->SearchColumnCount++;
		if (($vgaji_guru_smk_list->SearchColumnCount - 1) % $vgaji_guru_smk_list->SearchFieldsPerRow == 0) {
			$vgaji_guru_smk_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vgaji_guru_smk_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_pegawai" class="ew-cell form-group">
		<label for="x_pegawai" class="ew-search-caption ew-label"><?php echo $vgaji_guru_smk_list->pegawai->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_pegawai" id="z_pegawai" value="LIKE">
</span>
		<span id="el_vgaji_guru_smk_pegawai" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_pegawai"><?php echo EmptyValue(strval($vgaji_guru_smk_list->pegawai->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $vgaji_guru_smk_list->pegawai->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($vgaji_guru_smk_list->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($vgaji_guru_smk_list->pegawai->ReadOnly || $vgaji_guru_smk_list->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $vgaji_guru_smk_list->pegawai->Lookup->getParamTag($vgaji_guru_smk_list, "p_x_pegawai") ?>
<input type="hidden" data-table="vgaji_guru_smk" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $vgaji_guru_smk_list->pegawai->displayValueSeparatorAttribute() ?>" name="x_pegawai" id="x_pegawai" value="<?php echo $vgaji_guru_smk_list->pegawai->AdvancedSearch->SearchValue ?>"<?php echo $vgaji_guru_smk_list->pegawai->editAttributes() ?>>
</span>
	</div>
	<?php if ($vgaji_guru_smk_list->SearchColumnCount % $vgaji_guru_smk_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($vgaji_guru_smk_list->SearchColumnCount % $vgaji_guru_smk_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $vgaji_guru_smk_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vgaji_guru_smk_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vgaji_guru_smk_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vgaji_guru_smk_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vgaji_guru_smk_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vgaji_guru_smk_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vgaji_guru_smk_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vgaji_guru_smk_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vgaji_guru_smk_list->showPageHeader(); ?>
<?php
$vgaji_guru_smk_list->showMessage();
?>
<?php if ($vgaji_guru_smk_list->TotalRecords > 0 || $vgaji_guru_smk->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vgaji_guru_smk_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vgaji_guru_smk">
<?php if (!$vgaji_guru_smk_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vgaji_guru_smk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vgaji_guru_smk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vgaji_guru_smk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvgaji_guru_smklist" id="fvgaji_guru_smklist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vgaji_guru_smk">
<div id="gmp_vgaji_guru_smk" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vgaji_guru_smk_list->TotalRecords > 0 || $vgaji_guru_smk_list->isGridEdit()) { ?>
<table id="tbl_vgaji_guru_smklist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vgaji_guru_smk->RowType = ROWTYPE_HEADER;

// Render list options
$vgaji_guru_smk_list->renderListOptions();

// Render list options (header, left)
$vgaji_guru_smk_list->ListOptions->render("header", "left");
?>
<?php if ($vgaji_guru_smk_list->tahun->Visible) { // tahun ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $vgaji_guru_smk_list->tahun->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_tahun" class="vgaji_guru_smk_tahun"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $vgaji_guru_smk_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->tahun) ?>', 1);"><div id="elh_vgaji_guru_smk_tahun" class="vgaji_guru_smk_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->bulan->Visible) { // bulan ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $vgaji_guru_smk_list->bulan->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_bulan" class="vgaji_guru_smk_bulan"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $vgaji_guru_smk_list->bulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->bulan) ?>', 1);"><div id="elh_vgaji_guru_smk_bulan" class="vgaji_guru_smk_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->pegawai->Visible) { // pegawai ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $vgaji_guru_smk_list->pegawai->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_pegawai" class="vgaji_guru_smk_pegawai"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $vgaji_guru_smk_list->pegawai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->pegawai) ?>', 1);"><div id="elh_vgaji_guru_smk_pegawai" class="vgaji_guru_smk_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->jenjang_id->Visible) { // jenjang_id ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->jenjang_id) == "") { ?>
		<th data-name="jenjang_id" class="<?php echo $vgaji_guru_smk_list->jenjang_id->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_jenjang_id" class="vgaji_guru_smk_jenjang_id"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->jenjang_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang_id" class="<?php echo $vgaji_guru_smk_list->jenjang_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->jenjang_id) ?>', 1);"><div id="elh_vgaji_guru_smk_jenjang_id" class="vgaji_guru_smk_jenjang_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->jenjang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->jenjang_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->jenjang_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->jabatan_id->Visible) { // jabatan_id ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->jabatan_id) == "") { ?>
		<th data-name="jabatan_id" class="<?php echo $vgaji_guru_smk_list->jabatan_id->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_jabatan_id" class="vgaji_guru_smk_jabatan_id"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->jabatan_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jabatan_id" class="<?php echo $vgaji_guru_smk_list->jabatan_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->jabatan_id) ?>', 1);"><div id="elh_vgaji_guru_smk_jabatan_id" class="vgaji_guru_smk_jabatan_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->jabatan_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->jabatan_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->jabatan_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->lama_kerja->Visible) { // lama_kerja ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->lama_kerja) == "") { ?>
		<th data-name="lama_kerja" class="<?php echo $vgaji_guru_smk_list->lama_kerja->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_lama_kerja" class="vgaji_guru_smk_lama_kerja"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->lama_kerja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="lama_kerja" class="<?php echo $vgaji_guru_smk_list->lama_kerja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->lama_kerja) ?>', 1);"><div id="elh_vgaji_guru_smk_lama_kerja" class="vgaji_guru_smk_lama_kerja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->lama_kerja->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->lama_kerja->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->lama_kerja->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->type->Visible) { // type ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->type) == "") { ?>
		<th data-name="type" class="<?php echo $vgaji_guru_smk_list->type->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_type" class="vgaji_guru_smk_type"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="type" class="<?php echo $vgaji_guru_smk_list->type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->type) ?>', 1);"><div id="elh_vgaji_guru_smk_type" class="vgaji_guru_smk_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->type->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->jenis_guru->Visible) { // jenis_guru ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->jenis_guru) == "") { ?>
		<th data-name="jenis_guru" class="<?php echo $vgaji_guru_smk_list->jenis_guru->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_jenis_guru" class="vgaji_guru_smk_jenis_guru"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->jenis_guru->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenis_guru" class="<?php echo $vgaji_guru_smk_list->jenis_guru->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->jenis_guru) ?>', 1);"><div id="elh_vgaji_guru_smk_jenis_guru" class="vgaji_guru_smk_jenis_guru">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->jenis_guru->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->jenis_guru->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->jenis_guru->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->tambahan->Visible) { // tambahan ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->tambahan) == "") { ?>
		<th data-name="tambahan" class="<?php echo $vgaji_guru_smk_list->tambahan->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_tambahan" class="vgaji_guru_smk_tambahan"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->tambahan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tambahan" class="<?php echo $vgaji_guru_smk_list->tambahan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->tambahan) ?>', 1);"><div id="elh_vgaji_guru_smk_tambahan" class="vgaji_guru_smk_tambahan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->tambahan->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->tambahan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->tambahan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->periode->Visible) { // periode ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->periode) == "") { ?>
		<th data-name="periode" class="<?php echo $vgaji_guru_smk_list->periode->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_periode" class="vgaji_guru_smk_periode"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->periode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="periode" class="<?php echo $vgaji_guru_smk_list->periode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->periode) ?>', 1);"><div id="elh_vgaji_guru_smk_periode" class="vgaji_guru_smk_periode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->periode->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->periode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->periode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->tunjangan_periode->Visible) { // tunjangan_periode ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->tunjangan_periode) == "") { ?>
		<th data-name="tunjangan_periode" class="<?php echo $vgaji_guru_smk_list->tunjangan_periode->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_tunjangan_periode" class="vgaji_guru_smk_tunjangan_periode"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->tunjangan_periode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tunjangan_periode" class="<?php echo $vgaji_guru_smk_list->tunjangan_periode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->tunjangan_periode) ?>', 1);"><div id="elh_vgaji_guru_smk_tunjangan_periode" class="vgaji_guru_smk_tunjangan_periode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->tunjangan_periode->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->tunjangan_periode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->tunjangan_periode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->kehadiran->Visible) { // kehadiran ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->kehadiran) == "") { ?>
		<th data-name="kehadiran" class="<?php echo $vgaji_guru_smk_list->kehadiran->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_kehadiran" class="vgaji_guru_smk_kehadiran"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->kehadiran->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kehadiran" class="<?php echo $vgaji_guru_smk_list->kehadiran->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->kehadiran) ?>', 1);"><div id="elh_vgaji_guru_smk_kehadiran" class="vgaji_guru_smk_kehadiran">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->kehadiran->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->kehadiran->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->kehadiran->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->value_kehadiran->Visible) { // value_kehadiran ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->value_kehadiran) == "") { ?>
		<th data-name="value_kehadiran" class="<?php echo $vgaji_guru_smk_list->value_kehadiran->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_value_kehadiran" class="vgaji_guru_smk_value_kehadiran"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->value_kehadiran->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_kehadiran" class="<?php echo $vgaji_guru_smk_list->value_kehadiran->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->value_kehadiran) ?>', 1);"><div id="elh_vgaji_guru_smk_value_kehadiran" class="vgaji_guru_smk_value_kehadiran">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->value_kehadiran->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->value_kehadiran->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->value_kehadiran->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->lembur->Visible) { // lembur ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->lembur) == "") { ?>
		<th data-name="lembur" class="<?php echo $vgaji_guru_smk_list->lembur->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_lembur" class="vgaji_guru_smk_lembur"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->lembur->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="lembur" class="<?php echo $vgaji_guru_smk_list->lembur->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->lembur) ?>', 1);"><div id="elh_vgaji_guru_smk_lembur" class="vgaji_guru_smk_lembur">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->lembur->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->lembur->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->lembur->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->value_lembur->Visible) { // value_lembur ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->value_lembur) == "") { ?>
		<th data-name="value_lembur" class="<?php echo $vgaji_guru_smk_list->value_lembur->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_value_lembur" class="vgaji_guru_smk_value_lembur"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->value_lembur->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_lembur" class="<?php echo $vgaji_guru_smk_list->value_lembur->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->value_lembur) ?>', 1);"><div id="elh_vgaji_guru_smk_value_lembur" class="vgaji_guru_smk_value_lembur">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->value_lembur->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->value_lembur->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->value_lembur->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->jp->Visible) { // jp ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->jp) == "") { ?>
		<th data-name="jp" class="<?php echo $vgaji_guru_smk_list->jp->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_jp" class="vgaji_guru_smk_jp"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->jp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jp" class="<?php echo $vgaji_guru_smk_list->jp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->jp) ?>', 1);"><div id="elh_vgaji_guru_smk_jp" class="vgaji_guru_smk_jp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->jp->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->jp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->jp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->gapok->Visible) { // gapok ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->gapok) == "") { ?>
		<th data-name="gapok" class="<?php echo $vgaji_guru_smk_list->gapok->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_gapok" class="vgaji_guru_smk_gapok"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->gapok->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gapok" class="<?php echo $vgaji_guru_smk_list->gapok->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->gapok) ?>', 1);"><div id="elh_vgaji_guru_smk_gapok" class="vgaji_guru_smk_gapok">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->gapok->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->gapok->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->gapok->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->total_gapok->Visible) { // total_gapok ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->total_gapok) == "") { ?>
		<th data-name="total_gapok" class="<?php echo $vgaji_guru_smk_list->total_gapok->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_total_gapok" class="vgaji_guru_smk_total_gapok"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->total_gapok->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_gapok" class="<?php echo $vgaji_guru_smk_list->total_gapok->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->total_gapok) ?>', 1);"><div id="elh_vgaji_guru_smk_total_gapok" class="vgaji_guru_smk_total_gapok">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->total_gapok->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->total_gapok->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->total_gapok->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->value_reward->Visible) { // value_reward ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->value_reward) == "") { ?>
		<th data-name="value_reward" class="<?php echo $vgaji_guru_smk_list->value_reward->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_value_reward" class="vgaji_guru_smk_value_reward"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->value_reward->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_reward" class="<?php echo $vgaji_guru_smk_list->value_reward->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->value_reward) ?>', 1);"><div id="elh_vgaji_guru_smk_value_reward" class="vgaji_guru_smk_value_reward">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->value_reward->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->value_reward->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->value_reward->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->value_inval->Visible) { // value_inval ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->value_inval) == "") { ?>
		<th data-name="value_inval" class="<?php echo $vgaji_guru_smk_list->value_inval->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_value_inval" class="vgaji_guru_smk_value_inval"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->value_inval->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_inval" class="<?php echo $vgaji_guru_smk_list->value_inval->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->value_inval) ?>', 1);"><div id="elh_vgaji_guru_smk_value_inval" class="vgaji_guru_smk_value_inval">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->value_inval->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->value_inval->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->value_inval->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->piket_count->Visible) { // piket_count ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->piket_count) == "") { ?>
		<th data-name="piket_count" class="<?php echo $vgaji_guru_smk_list->piket_count->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_piket_count" class="vgaji_guru_smk_piket_count"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->piket_count->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="piket_count" class="<?php echo $vgaji_guru_smk_list->piket_count->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->piket_count) ?>', 1);"><div id="elh_vgaji_guru_smk_piket_count" class="vgaji_guru_smk_piket_count">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->piket_count->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->piket_count->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->piket_count->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->value_piket->Visible) { // value_piket ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->value_piket) == "") { ?>
		<th data-name="value_piket" class="<?php echo $vgaji_guru_smk_list->value_piket->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_value_piket" class="vgaji_guru_smk_value_piket"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->value_piket->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_piket" class="<?php echo $vgaji_guru_smk_list->value_piket->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->value_piket) ?>', 1);"><div id="elh_vgaji_guru_smk_value_piket" class="vgaji_guru_smk_value_piket">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->value_piket->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->value_piket->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->value_piket->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->tugastambahan->Visible) { // tugastambahan ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->tugastambahan) == "") { ?>
		<th data-name="tugastambahan" class="<?php echo $vgaji_guru_smk_list->tugastambahan->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_tugastambahan" class="vgaji_guru_smk_tugastambahan"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->tugastambahan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tugastambahan" class="<?php echo $vgaji_guru_smk_list->tugastambahan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->tugastambahan) ?>', 1);"><div id="elh_vgaji_guru_smk_tugastambahan" class="vgaji_guru_smk_tugastambahan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->tugastambahan->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->tugastambahan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->tugastambahan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->tj_jabatan->Visible) { // tj_jabatan ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->tj_jabatan) == "") { ?>
		<th data-name="tj_jabatan" class="<?php echo $vgaji_guru_smk_list->tj_jabatan->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_tj_jabatan" class="vgaji_guru_smk_tj_jabatan"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->tj_jabatan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tj_jabatan" class="<?php echo $vgaji_guru_smk_list->tj_jabatan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->tj_jabatan) ?>', 1);"><div id="elh_vgaji_guru_smk_tj_jabatan" class="vgaji_guru_smk_tj_jabatan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->tj_jabatan->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->tj_jabatan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->tj_jabatan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->sub_total->Visible) { // sub_total ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->sub_total) == "") { ?>
		<th data-name="sub_total" class="<?php echo $vgaji_guru_smk_list->sub_total->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_sub_total" class="vgaji_guru_smk_sub_total"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->sub_total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sub_total" class="<?php echo $vgaji_guru_smk_list->sub_total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->sub_total) ?>', 1);"><div id="elh_vgaji_guru_smk_sub_total" class="vgaji_guru_smk_sub_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->sub_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->sub_total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->sub_total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->potongan->Visible) { // potongan ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $vgaji_guru_smk_list->potongan->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_potongan" class="vgaji_guru_smk_potongan"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $vgaji_guru_smk_list->potongan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->potongan) ?>', 1);"><div id="elh_vgaji_guru_smk_potongan" class="vgaji_guru_smk_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->penyesuaian->Visible) { // penyesuaian ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->penyesuaian) == "") { ?>
		<th data-name="penyesuaian" class="<?php echo $vgaji_guru_smk_list->penyesuaian->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_penyesuaian" class="vgaji_guru_smk_penyesuaian"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->penyesuaian->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="penyesuaian" class="<?php echo $vgaji_guru_smk_list->penyesuaian->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->penyesuaian) ?>', 1);"><div id="elh_vgaji_guru_smk_penyesuaian" class="vgaji_guru_smk_penyesuaian">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->penyesuaian->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->penyesuaian->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->penyesuaian->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->total->Visible) { // total ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->total) == "") { ?>
		<th data-name="total" class="<?php echo $vgaji_guru_smk_list->total->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_total" class="vgaji_guru_smk_total"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $vgaji_guru_smk_list->total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->total) ?>', 1);"><div id="elh_vgaji_guru_smk_total" class="vgaji_guru_smk_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_smk_list->voucher->Visible) { // voucher ?>
	<?php if ($vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->voucher) == "") { ?>
		<th data-name="voucher" class="<?php echo $vgaji_guru_smk_list->voucher->headerCellClass() ?>"><div id="elh_vgaji_guru_smk_voucher" class="vgaji_guru_smk_voucher"><div class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->voucher->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher" class="<?php echo $vgaji_guru_smk_list->voucher->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_guru_smk_list->SortUrl($vgaji_guru_smk_list->voucher) ?>', 1);"><div id="elh_vgaji_guru_smk_voucher" class="vgaji_guru_smk_voucher">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_smk_list->voucher->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_smk_list->voucher->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_smk_list->voucher->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vgaji_guru_smk_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vgaji_guru_smk_list->ExportAll && $vgaji_guru_smk_list->isExport()) {
	$vgaji_guru_smk_list->StopRecord = $vgaji_guru_smk_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vgaji_guru_smk_list->TotalRecords > $vgaji_guru_smk_list->StartRecord + $vgaji_guru_smk_list->DisplayRecords - 1)
		$vgaji_guru_smk_list->StopRecord = $vgaji_guru_smk_list->StartRecord + $vgaji_guru_smk_list->DisplayRecords - 1;
	else
		$vgaji_guru_smk_list->StopRecord = $vgaji_guru_smk_list->TotalRecords;
}
$vgaji_guru_smk_list->RecordCount = $vgaji_guru_smk_list->StartRecord - 1;
if ($vgaji_guru_smk_list->Recordset && !$vgaji_guru_smk_list->Recordset->EOF) {
	$vgaji_guru_smk_list->Recordset->moveFirst();
	$selectLimit = $vgaji_guru_smk_list->UseSelectLimit;
	if (!$selectLimit && $vgaji_guru_smk_list->StartRecord > 1)
		$vgaji_guru_smk_list->Recordset->move($vgaji_guru_smk_list->StartRecord - 1);
} elseif (!$vgaji_guru_smk->AllowAddDeleteRow && $vgaji_guru_smk_list->StopRecord == 0) {
	$vgaji_guru_smk_list->StopRecord = $vgaji_guru_smk->GridAddRowCount;
}

// Initialize aggregate
$vgaji_guru_smk->RowType = ROWTYPE_AGGREGATEINIT;
$vgaji_guru_smk->resetAttributes();
$vgaji_guru_smk_list->renderRow();
while ($vgaji_guru_smk_list->RecordCount < $vgaji_guru_smk_list->StopRecord) {
	$vgaji_guru_smk_list->RecordCount++;
	if ($vgaji_guru_smk_list->RecordCount >= $vgaji_guru_smk_list->StartRecord) {
		$vgaji_guru_smk_list->RowCount++;

		// Set up key count
		$vgaji_guru_smk_list->KeyCount = $vgaji_guru_smk_list->RowIndex;

		// Init row class and style
		$vgaji_guru_smk->resetAttributes();
		$vgaji_guru_smk->CssClass = "";
		if ($vgaji_guru_smk_list->isGridAdd()) {
		} else {
			$vgaji_guru_smk_list->loadRowValues($vgaji_guru_smk_list->Recordset); // Load row values
		}
		$vgaji_guru_smk->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vgaji_guru_smk->RowAttrs->merge(["data-rowindex" => $vgaji_guru_smk_list->RowCount, "id" => "r" . $vgaji_guru_smk_list->RowCount . "_vgaji_guru_smk", "data-rowtype" => $vgaji_guru_smk->RowType]);

		// Render row
		$vgaji_guru_smk_list->renderRow();

		// Render list options
		$vgaji_guru_smk_list->renderListOptions();
?>
	<tr <?php echo $vgaji_guru_smk->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vgaji_guru_smk_list->ListOptions->render("body", "left", $vgaji_guru_smk_list->RowCount);
?>
	<?php if ($vgaji_guru_smk_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $vgaji_guru_smk_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_tahun">
<span<?php echo $vgaji_guru_smk_list->tahun->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $vgaji_guru_smk_list->bulan->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_bulan">
<span<?php echo $vgaji_guru_smk_list->bulan->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->bulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $vgaji_guru_smk_list->pegawai->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_pegawai">
<span<?php echo $vgaji_guru_smk_list->pegawai->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->pegawai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id" <?php echo $vgaji_guru_smk_list->jenjang_id->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_jenjang_id">
<span<?php echo $vgaji_guru_smk_list->jenjang_id->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->jenjang_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->jabatan_id->Visible) { // jabatan_id ?>
		<td data-name="jabatan_id" <?php echo $vgaji_guru_smk_list->jabatan_id->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_jabatan_id">
<span<?php echo $vgaji_guru_smk_list->jabatan_id->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->jabatan_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->lama_kerja->Visible) { // lama_kerja ?>
		<td data-name="lama_kerja" <?php echo $vgaji_guru_smk_list->lama_kerja->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_lama_kerja">
<span<?php echo $vgaji_guru_smk_list->lama_kerja->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->lama_kerja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->type->Visible) { // type ?>
		<td data-name="type" <?php echo $vgaji_guru_smk_list->type->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_type">
<span<?php echo $vgaji_guru_smk_list->type->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->jenis_guru->Visible) { // jenis_guru ?>
		<td data-name="jenis_guru" <?php echo $vgaji_guru_smk_list->jenis_guru->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_jenis_guru">
<span<?php echo $vgaji_guru_smk_list->jenis_guru->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->jenis_guru->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->tambahan->Visible) { // tambahan ?>
		<td data-name="tambahan" <?php echo $vgaji_guru_smk_list->tambahan->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_tambahan">
<span<?php echo $vgaji_guru_smk_list->tambahan->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->tambahan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->periode->Visible) { // periode ?>
		<td data-name="periode" <?php echo $vgaji_guru_smk_list->periode->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_periode">
<span<?php echo $vgaji_guru_smk_list->periode->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->periode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->tunjangan_periode->Visible) { // tunjangan_periode ?>
		<td data-name="tunjangan_periode" <?php echo $vgaji_guru_smk_list->tunjangan_periode->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_tunjangan_periode">
<span<?php echo $vgaji_guru_smk_list->tunjangan_periode->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->tunjangan_periode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->kehadiran->Visible) { // kehadiran ?>
		<td data-name="kehadiran" <?php echo $vgaji_guru_smk_list->kehadiran->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_kehadiran">
<span<?php echo $vgaji_guru_smk_list->kehadiran->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->kehadiran->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->value_kehadiran->Visible) { // value_kehadiran ?>
		<td data-name="value_kehadiran" <?php echo $vgaji_guru_smk_list->value_kehadiran->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_value_kehadiran">
<span<?php echo $vgaji_guru_smk_list->value_kehadiran->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->value_kehadiran->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->lembur->Visible) { // lembur ?>
		<td data-name="lembur" <?php echo $vgaji_guru_smk_list->lembur->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_lembur">
<span<?php echo $vgaji_guru_smk_list->lembur->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->lembur->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->value_lembur->Visible) { // value_lembur ?>
		<td data-name="value_lembur" <?php echo $vgaji_guru_smk_list->value_lembur->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_value_lembur">
<span<?php echo $vgaji_guru_smk_list->value_lembur->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->value_lembur->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->jp->Visible) { // jp ?>
		<td data-name="jp" <?php echo $vgaji_guru_smk_list->jp->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_jp">
<span<?php echo $vgaji_guru_smk_list->jp->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->jp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->gapok->Visible) { // gapok ?>
		<td data-name="gapok" <?php echo $vgaji_guru_smk_list->gapok->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_gapok">
<span<?php echo $vgaji_guru_smk_list->gapok->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->gapok->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->total_gapok->Visible) { // total_gapok ?>
		<td data-name="total_gapok" <?php echo $vgaji_guru_smk_list->total_gapok->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_total_gapok">
<span<?php echo $vgaji_guru_smk_list->total_gapok->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->total_gapok->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->value_reward->Visible) { // value_reward ?>
		<td data-name="value_reward" <?php echo $vgaji_guru_smk_list->value_reward->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_value_reward">
<span<?php echo $vgaji_guru_smk_list->value_reward->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->value_reward->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->value_inval->Visible) { // value_inval ?>
		<td data-name="value_inval" <?php echo $vgaji_guru_smk_list->value_inval->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_value_inval">
<span<?php echo $vgaji_guru_smk_list->value_inval->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->value_inval->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->piket_count->Visible) { // piket_count ?>
		<td data-name="piket_count" <?php echo $vgaji_guru_smk_list->piket_count->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_piket_count">
<span<?php echo $vgaji_guru_smk_list->piket_count->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->piket_count->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->value_piket->Visible) { // value_piket ?>
		<td data-name="value_piket" <?php echo $vgaji_guru_smk_list->value_piket->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_value_piket">
<span<?php echo $vgaji_guru_smk_list->value_piket->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->value_piket->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->tugastambahan->Visible) { // tugastambahan ?>
		<td data-name="tugastambahan" <?php echo $vgaji_guru_smk_list->tugastambahan->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_tugastambahan">
<span<?php echo $vgaji_guru_smk_list->tugastambahan->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->tugastambahan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->tj_jabatan->Visible) { // tj_jabatan ?>
		<td data-name="tj_jabatan" <?php echo $vgaji_guru_smk_list->tj_jabatan->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_tj_jabatan">
<span<?php echo $vgaji_guru_smk_list->tj_jabatan->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->tj_jabatan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->sub_total->Visible) { // sub_total ?>
		<td data-name="sub_total" <?php echo $vgaji_guru_smk_list->sub_total->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_sub_total">
<span<?php echo $vgaji_guru_smk_list->sub_total->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->sub_total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $vgaji_guru_smk_list->potongan->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_potongan">
<span<?php echo $vgaji_guru_smk_list->potongan->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->potongan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->penyesuaian->Visible) { // penyesuaian ?>
		<td data-name="penyesuaian" <?php echo $vgaji_guru_smk_list->penyesuaian->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_penyesuaian">
<span<?php echo $vgaji_guru_smk_list->penyesuaian->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->penyesuaian->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->total->Visible) { // total ?>
		<td data-name="total" <?php echo $vgaji_guru_smk_list->total->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_total">
<span<?php echo $vgaji_guru_smk_list->total->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_smk_list->voucher->Visible) { // voucher ?>
		<td data-name="voucher" <?php echo $vgaji_guru_smk_list->voucher->cellAttributes() ?>>
<span id="el<?php echo $vgaji_guru_smk_list->RowCount ?>_vgaji_guru_smk_voucher">
<span<?php echo $vgaji_guru_smk_list->voucher->viewAttributes() ?>><?php echo $vgaji_guru_smk_list->voucher->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vgaji_guru_smk_list->ListOptions->render("body", "right", $vgaji_guru_smk_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vgaji_guru_smk_list->isGridAdd())
		$vgaji_guru_smk_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vgaji_guru_smk->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vgaji_guru_smk_list->Recordset)
	$vgaji_guru_smk_list->Recordset->Close();
?>
<?php if (!$vgaji_guru_smk_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vgaji_guru_smk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vgaji_guru_smk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vgaji_guru_smk_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vgaji_guru_smk_list->TotalRecords == 0 && !$vgaji_guru_smk->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vgaji_guru_smk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vgaji_guru_smk_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vgaji_guru_smk_list->isExport()) { ?>
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
$vgaji_guru_smk_list->terminate();
?>