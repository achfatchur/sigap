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
$vgaji_karyawan_smp_list = new vgaji_karyawan_smp_list();

// Run the page
$vgaji_karyawan_smp_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vgaji_karyawan_smp_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vgaji_karyawan_smp_list->isExport()) { ?>
<script>
var fvgaji_karyawan_smplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvgaji_karyawan_smplist = currentForm = new ew.Form("fvgaji_karyawan_smplist", "list");
	fvgaji_karyawan_smplist.formKeyCountName = '<?php echo $vgaji_karyawan_smp_list->FormKeyCountName ?>';
	loadjs.done("fvgaji_karyawan_smplist");
});
var fvgaji_karyawan_smplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvgaji_karyawan_smplistsrch = currentSearchForm = new ew.Form("fvgaji_karyawan_smplistsrch");

	// Validate function for search
	fvgaji_karyawan_smplistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_tahun");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vgaji_karyawan_smp_list->tahun->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fvgaji_karyawan_smplistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvgaji_karyawan_smplistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fvgaji_karyawan_smplistsrch.lists["x_bulan"] = <?php echo $vgaji_karyawan_smp_list->bulan->Lookup->toClientList($vgaji_karyawan_smp_list) ?>;
	fvgaji_karyawan_smplistsrch.lists["x_bulan"].options = <?php echo JsonEncode($vgaji_karyawan_smp_list->bulan->lookupOptions()) ?>;
	fvgaji_karyawan_smplistsrch.lists["x_pegawai"] = <?php echo $vgaji_karyawan_smp_list->pegawai->Lookup->toClientList($vgaji_karyawan_smp_list) ?>;
	fvgaji_karyawan_smplistsrch.lists["x_pegawai"].options = <?php echo JsonEncode($vgaji_karyawan_smp_list->pegawai->lookupOptions()) ?>;

	// Filters
	fvgaji_karyawan_smplistsrch.filterList = <?php echo $vgaji_karyawan_smp_list->getFilterList() ?>;
	loadjs.done("fvgaji_karyawan_smplistsrch");
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
<?php if (!$vgaji_karyawan_smp_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vgaji_karyawan_smp_list->TotalRecords > 0 && $vgaji_karyawan_smp_list->ExportOptions->visible()) { ?>
<?php $vgaji_karyawan_smp_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->ImportOptions->visible()) { ?>
<?php $vgaji_karyawan_smp_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->SearchOptions->visible()) { ?>
<?php $vgaji_karyawan_smp_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->FilterOptions->visible()) { ?>
<?php $vgaji_karyawan_smp_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vgaji_karyawan_smp_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vgaji_karyawan_smp_list->isExport() && !$vgaji_karyawan_smp->CurrentAction) { ?>
<form name="fvgaji_karyawan_smplistsrch" id="fvgaji_karyawan_smplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvgaji_karyawan_smplistsrch-search-panel" class="<?php echo $vgaji_karyawan_smp_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vgaji_karyawan_smp">
	<div class="ew-extended-search">
<?php

// Render search row
$vgaji_karyawan_smp->RowType = ROWTYPE_SEARCH;
$vgaji_karyawan_smp->resetAttributes();
$vgaji_karyawan_smp_list->renderRow();
?>
<?php if ($vgaji_karyawan_smp_list->tahun->Visible) { // tahun ?>
	<?php
		$vgaji_karyawan_smp_list->SearchColumnCount++;
		if (($vgaji_karyawan_smp_list->SearchColumnCount - 1) % $vgaji_karyawan_smp_list->SearchFieldsPerRow == 0) {
			$vgaji_karyawan_smp_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vgaji_karyawan_smp_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_tahun" class="ew-cell form-group">
		<label for="x_tahun" class="ew-search-caption ew-label"><?php echo $vgaji_karyawan_smp_list->tahun->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_tahun" id="z_tahun" value="=">
</span>
		<span id="el_vgaji_karyawan_smp_tahun" class="ew-search-field">
<input type="text" data-table="vgaji_karyawan_smp" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($vgaji_karyawan_smp_list->tahun->getPlaceHolder()) ?>" value="<?php echo $vgaji_karyawan_smp_list->tahun->EditValue ?>"<?php echo $vgaji_karyawan_smp_list->tahun->editAttributes() ?>>
</span>
	</div>
	<?php if ($vgaji_karyawan_smp_list->SearchColumnCount % $vgaji_karyawan_smp_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->bulan->Visible) { // bulan ?>
	<?php
		$vgaji_karyawan_smp_list->SearchColumnCount++;
		if (($vgaji_karyawan_smp_list->SearchColumnCount - 1) % $vgaji_karyawan_smp_list->SearchFieldsPerRow == 0) {
			$vgaji_karyawan_smp_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vgaji_karyawan_smp_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_bulan" class="ew-cell form-group">
		<label for="x_bulan" class="ew-search-caption ew-label"><?php echo $vgaji_karyawan_smp_list->bulan->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_bulan" id="z_bulan" value="=">
</span>
		<span id="el_vgaji_karyawan_smp_bulan" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vgaji_karyawan_smp" data-field="x_bulan" data-value-separator="<?php echo $vgaji_karyawan_smp_list->bulan->displayValueSeparatorAttribute() ?>" id="x_bulan" name="x_bulan"<?php echo $vgaji_karyawan_smp_list->bulan->editAttributes() ?>>
			<?php echo $vgaji_karyawan_smp_list->bulan->selectOptionListHtml("x_bulan") ?>
		</select>
</div>
<?php echo $vgaji_karyawan_smp_list->bulan->Lookup->getParamTag($vgaji_karyawan_smp_list, "p_x_bulan") ?>
</span>
	</div>
	<?php if ($vgaji_karyawan_smp_list->SearchColumnCount % $vgaji_karyawan_smp_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->pegawai->Visible) { // pegawai ?>
	<?php
		$vgaji_karyawan_smp_list->SearchColumnCount++;
		if (($vgaji_karyawan_smp_list->SearchColumnCount - 1) % $vgaji_karyawan_smp_list->SearchFieldsPerRow == 0) {
			$vgaji_karyawan_smp_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vgaji_karyawan_smp_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_pegawai" class="ew-cell form-group">
		<label for="x_pegawai" class="ew-search-caption ew-label"><?php echo $vgaji_karyawan_smp_list->pegawai->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_pegawai" id="z_pegawai" value="LIKE">
</span>
		<span id="el_vgaji_karyawan_smp_pegawai" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_pegawai"><?php echo EmptyValue(strval($vgaji_karyawan_smp_list->pegawai->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $vgaji_karyawan_smp_list->pegawai->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($vgaji_karyawan_smp_list->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($vgaji_karyawan_smp_list->pegawai->ReadOnly || $vgaji_karyawan_smp_list->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $vgaji_karyawan_smp_list->pegawai->Lookup->getParamTag($vgaji_karyawan_smp_list, "p_x_pegawai") ?>
<input type="hidden" data-table="vgaji_karyawan_smp" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $vgaji_karyawan_smp_list->pegawai->displayValueSeparatorAttribute() ?>" name="x_pegawai" id="x_pegawai" value="<?php echo $vgaji_karyawan_smp_list->pegawai->AdvancedSearch->SearchValue ?>"<?php echo $vgaji_karyawan_smp_list->pegawai->editAttributes() ?>>
</span>
	</div>
	<?php if ($vgaji_karyawan_smp_list->SearchColumnCount % $vgaji_karyawan_smp_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->SearchColumnCount % $vgaji_karyawan_smp_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $vgaji_karyawan_smp_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vgaji_karyawan_smp_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vgaji_karyawan_smp_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vgaji_karyawan_smp_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vgaji_karyawan_smp_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vgaji_karyawan_smp_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vgaji_karyawan_smp_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vgaji_karyawan_smp_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vgaji_karyawan_smp_list->showPageHeader(); ?>
<?php
$vgaji_karyawan_smp_list->showMessage();
?>
<?php if ($vgaji_karyawan_smp_list->TotalRecords > 0 || $vgaji_karyawan_smp->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vgaji_karyawan_smp_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vgaji_karyawan_smp">
<?php if (!$vgaji_karyawan_smp_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vgaji_karyawan_smp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vgaji_karyawan_smp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vgaji_karyawan_smp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvgaji_karyawan_smplist" id="fvgaji_karyawan_smplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vgaji_karyawan_smp">
<div id="gmp_vgaji_karyawan_smp" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vgaji_karyawan_smp_list->TotalRecords > 0 || $vgaji_karyawan_smp_list->isGridEdit()) { ?>
<table id="tbl_vgaji_karyawan_smplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vgaji_karyawan_smp->RowType = ROWTYPE_HEADER;

// Render list options
$vgaji_karyawan_smp_list->renderListOptions();

// Render list options (header, left)
$vgaji_karyawan_smp_list->ListOptions->render("header", "left");
?>
<?php if ($vgaji_karyawan_smp_list->tahun->Visible) { // tahun ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $vgaji_karyawan_smp_list->tahun->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_tahun" class="vgaji_karyawan_smp_tahun"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $vgaji_karyawan_smp_list->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->tahun) ?>', 1);"><div id="elh_vgaji_karyawan_smp_tahun" class="vgaji_karyawan_smp_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->bulan->Visible) { // bulan ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $vgaji_karyawan_smp_list->bulan->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_bulan" class="vgaji_karyawan_smp_bulan"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $vgaji_karyawan_smp_list->bulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->bulan) ?>', 1);"><div id="elh_vgaji_karyawan_smp_bulan" class="vgaji_karyawan_smp_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->pegawai->Visible) { // pegawai ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $vgaji_karyawan_smp_list->pegawai->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_pegawai" class="vgaji_karyawan_smp_pegawai"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $vgaji_karyawan_smp_list->pegawai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->pegawai) ?>', 1);"><div id="elh_vgaji_karyawan_smp_pegawai" class="vgaji_karyawan_smp_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->rekbank->Visible) { // rekbank ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->rekbank) == "") { ?>
		<th data-name="rekbank" class="<?php echo $vgaji_karyawan_smp_list->rekbank->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_rekbank" class="vgaji_karyawan_smp_rekbank"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->rekbank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rekbank" class="<?php echo $vgaji_karyawan_smp_list->rekbank->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->rekbank) ?>', 1);"><div id="elh_vgaji_karyawan_smp_rekbank" class="vgaji_karyawan_smp_rekbank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->rekbank->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->rekbank->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->rekbank->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->jenjang_id->Visible) { // jenjang_id ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->jenjang_id) == "") { ?>
		<th data-name="jenjang_id" class="<?php echo $vgaji_karyawan_smp_list->jenjang_id->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_jenjang_id" class="vgaji_karyawan_smp_jenjang_id"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->jenjang_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang_id" class="<?php echo $vgaji_karyawan_smp_list->jenjang_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->jenjang_id) ?>', 1);"><div id="elh_vgaji_karyawan_smp_jenjang_id" class="vgaji_karyawan_smp_jenjang_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->jenjang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->jenjang_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->jenjang_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->jabatan_id->Visible) { // jabatan_id ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->jabatan_id) == "") { ?>
		<th data-name="jabatan_id" class="<?php echo $vgaji_karyawan_smp_list->jabatan_id->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_jabatan_id" class="vgaji_karyawan_smp_jabatan_id"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->jabatan_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jabatan_id" class="<?php echo $vgaji_karyawan_smp_list->jabatan_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->jabatan_id) ?>', 1);"><div id="elh_vgaji_karyawan_smp_jabatan_id" class="vgaji_karyawan_smp_jabatan_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->jabatan_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->jabatan_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->jabatan_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->kehadiran->Visible) { // kehadiran ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->kehadiran) == "") { ?>
		<th data-name="kehadiran" class="<?php echo $vgaji_karyawan_smp_list->kehadiran->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_kehadiran" class="vgaji_karyawan_smp_kehadiran"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->kehadiran->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kehadiran" class="<?php echo $vgaji_karyawan_smp_list->kehadiran->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->kehadiran) ?>', 1);"><div id="elh_vgaji_karyawan_smp_kehadiran" class="vgaji_karyawan_smp_kehadiran">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->kehadiran->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->kehadiran->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->kehadiran->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->gapok->Visible) { // gapok ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->gapok) == "") { ?>
		<th data-name="gapok" class="<?php echo $vgaji_karyawan_smp_list->gapok->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_gapok" class="vgaji_karyawan_smp_gapok"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->gapok->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gapok" class="<?php echo $vgaji_karyawan_smp_list->gapok->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->gapok) ?>', 1);"><div id="elh_vgaji_karyawan_smp_gapok" class="vgaji_karyawan_smp_gapok">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->gapok->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->gapok->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->gapok->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->value_kehadiran->Visible) { // value_kehadiran ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->value_kehadiran) == "") { ?>
		<th data-name="value_kehadiran" class="<?php echo $vgaji_karyawan_smp_list->value_kehadiran->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_value_kehadiran" class="vgaji_karyawan_smp_value_kehadiran"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->value_kehadiran->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_kehadiran" class="<?php echo $vgaji_karyawan_smp_list->value_kehadiran->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->value_kehadiran) ?>', 1);"><div id="elh_vgaji_karyawan_smp_value_kehadiran" class="vgaji_karyawan_smp_value_kehadiran">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->value_kehadiran->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->value_kehadiran->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->value_kehadiran->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->value_reward->Visible) { // value_reward ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->value_reward) == "") { ?>
		<th data-name="value_reward" class="<?php echo $vgaji_karyawan_smp_list->value_reward->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_value_reward" class="vgaji_karyawan_smp_value_reward"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->value_reward->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_reward" class="<?php echo $vgaji_karyawan_smp_list->value_reward->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->value_reward) ?>', 1);"><div id="elh_vgaji_karyawan_smp_value_reward" class="vgaji_karyawan_smp_value_reward">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->value_reward->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->value_reward->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->value_reward->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->value_inval->Visible) { // value_inval ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->value_inval) == "") { ?>
		<th data-name="value_inval" class="<?php echo $vgaji_karyawan_smp_list->value_inval->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_value_inval" class="vgaji_karyawan_smp_value_inval"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->value_inval->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_inval" class="<?php echo $vgaji_karyawan_smp_list->value_inval->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->value_inval) ?>', 1);"><div id="elh_vgaji_karyawan_smp_value_inval" class="vgaji_karyawan_smp_value_inval">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->value_inval->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->value_inval->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->value_inval->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->sub_total->Visible) { // sub_total ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->sub_total) == "") { ?>
		<th data-name="sub_total" class="<?php echo $vgaji_karyawan_smp_list->sub_total->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_sub_total" class="vgaji_karyawan_smp_sub_total"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->sub_total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sub_total" class="<?php echo $vgaji_karyawan_smp_list->sub_total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->sub_total) ?>', 1);"><div id="elh_vgaji_karyawan_smp_sub_total" class="vgaji_karyawan_smp_sub_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->sub_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->sub_total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->sub_total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->potongan->Visible) { // potongan ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $vgaji_karyawan_smp_list->potongan->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_potongan" class="vgaji_karyawan_smp_potongan"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $vgaji_karyawan_smp_list->potongan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->potongan) ?>', 1);"><div id="elh_vgaji_karyawan_smp_potongan" class="vgaji_karyawan_smp_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->penyesuaian->Visible) { // penyesuaian ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->penyesuaian) == "") { ?>
		<th data-name="penyesuaian" class="<?php echo $vgaji_karyawan_smp_list->penyesuaian->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_penyesuaian" class="vgaji_karyawan_smp_penyesuaian"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->penyesuaian->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="penyesuaian" class="<?php echo $vgaji_karyawan_smp_list->penyesuaian->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->penyesuaian) ?>', 1);"><div id="elh_vgaji_karyawan_smp_penyesuaian" class="vgaji_karyawan_smp_penyesuaian">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->penyesuaian->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->penyesuaian->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->penyesuaian->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->potongan_bendahara->Visible) { // potongan_bendahara ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->potongan_bendahara) == "") { ?>
		<th data-name="potongan_bendahara" class="<?php echo $vgaji_karyawan_smp_list->potongan_bendahara->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_potongan_bendahara" class="vgaji_karyawan_smp_potongan_bendahara"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->potongan_bendahara->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan_bendahara" class="<?php echo $vgaji_karyawan_smp_list->potongan_bendahara->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->potongan_bendahara) ?>', 1);"><div id="elh_vgaji_karyawan_smp_potongan_bendahara" class="vgaji_karyawan_smp_potongan_bendahara">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->potongan_bendahara->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->potongan_bendahara->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->potongan_bendahara->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->total->Visible) { // total ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->total) == "") { ?>
		<th data-name="total" class="<?php echo $vgaji_karyawan_smp_list->total->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_total" class="vgaji_karyawan_smp_total"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $vgaji_karyawan_smp_list->total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->total) ?>', 1);"><div id="elh_vgaji_karyawan_smp_total" class="vgaji_karyawan_smp_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->status->Visible) { // status ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $vgaji_karyawan_smp_list->status->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_status" class="vgaji_karyawan_smp_status"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $vgaji_karyawan_smp_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->status) ?>', 1);"><div id="elh_vgaji_karyawan_smp_status" class="vgaji_karyawan_smp_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->voucher->Visible) { // voucher ?>
	<?php if ($vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->voucher) == "") { ?>
		<th data-name="voucher" class="<?php echo $vgaji_karyawan_smp_list->voucher->headerCellClass() ?>"><div id="elh_vgaji_karyawan_smp_voucher" class="vgaji_karyawan_smp_voucher"><div class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->voucher->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher" class="<?php echo $vgaji_karyawan_smp_list->voucher->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vgaji_karyawan_smp_list->SortUrl($vgaji_karyawan_smp_list->voucher) ?>', 1);"><div id="elh_vgaji_karyawan_smp_voucher" class="vgaji_karyawan_smp_voucher">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_karyawan_smp_list->voucher->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_karyawan_smp_list->voucher->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_karyawan_smp_list->voucher->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vgaji_karyawan_smp_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vgaji_karyawan_smp_list->ExportAll && $vgaji_karyawan_smp_list->isExport()) {
	$vgaji_karyawan_smp_list->StopRecord = $vgaji_karyawan_smp_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vgaji_karyawan_smp_list->TotalRecords > $vgaji_karyawan_smp_list->StartRecord + $vgaji_karyawan_smp_list->DisplayRecords - 1)
		$vgaji_karyawan_smp_list->StopRecord = $vgaji_karyawan_smp_list->StartRecord + $vgaji_karyawan_smp_list->DisplayRecords - 1;
	else
		$vgaji_karyawan_smp_list->StopRecord = $vgaji_karyawan_smp_list->TotalRecords;
}
$vgaji_karyawan_smp_list->RecordCount = $vgaji_karyawan_smp_list->StartRecord - 1;
if ($vgaji_karyawan_smp_list->Recordset && !$vgaji_karyawan_smp_list->Recordset->EOF) {
	$vgaji_karyawan_smp_list->Recordset->moveFirst();
	$selectLimit = $vgaji_karyawan_smp_list->UseSelectLimit;
	if (!$selectLimit && $vgaji_karyawan_smp_list->StartRecord > 1)
		$vgaji_karyawan_smp_list->Recordset->move($vgaji_karyawan_smp_list->StartRecord - 1);
} elseif (!$vgaji_karyawan_smp->AllowAddDeleteRow && $vgaji_karyawan_smp_list->StopRecord == 0) {
	$vgaji_karyawan_smp_list->StopRecord = $vgaji_karyawan_smp->GridAddRowCount;
}

// Initialize aggregate
$vgaji_karyawan_smp->RowType = ROWTYPE_AGGREGATEINIT;
$vgaji_karyawan_smp->resetAttributes();
$vgaji_karyawan_smp_list->renderRow();
while ($vgaji_karyawan_smp_list->RecordCount < $vgaji_karyawan_smp_list->StopRecord) {
	$vgaji_karyawan_smp_list->RecordCount++;
	if ($vgaji_karyawan_smp_list->RecordCount >= $vgaji_karyawan_smp_list->StartRecord) {
		$vgaji_karyawan_smp_list->RowCount++;

		// Set up key count
		$vgaji_karyawan_smp_list->KeyCount = $vgaji_karyawan_smp_list->RowIndex;

		// Init row class and style
		$vgaji_karyawan_smp->resetAttributes();
		$vgaji_karyawan_smp->CssClass = "";
		if ($vgaji_karyawan_smp_list->isGridAdd()) {
		} else {
			$vgaji_karyawan_smp_list->loadRowValues($vgaji_karyawan_smp_list->Recordset); // Load row values
		}
		$vgaji_karyawan_smp->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vgaji_karyawan_smp->RowAttrs->merge(["data-rowindex" => $vgaji_karyawan_smp_list->RowCount, "id" => "r" . $vgaji_karyawan_smp_list->RowCount . "_vgaji_karyawan_smp", "data-rowtype" => $vgaji_karyawan_smp->RowType]);

		// Render row
		$vgaji_karyawan_smp_list->renderRow();

		// Render list options
		$vgaji_karyawan_smp_list->renderListOptions();
?>
	<tr <?php echo $vgaji_karyawan_smp->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vgaji_karyawan_smp_list->ListOptions->render("body", "left", $vgaji_karyawan_smp_list->RowCount);
?>
	<?php if ($vgaji_karyawan_smp_list->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $vgaji_karyawan_smp_list->tahun->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_tahun">
<span<?php echo $vgaji_karyawan_smp_list->tahun->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $vgaji_karyawan_smp_list->bulan->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_bulan">
<span<?php echo $vgaji_karyawan_smp_list->bulan->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->bulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $vgaji_karyawan_smp_list->pegawai->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_pegawai">
<span<?php echo $vgaji_karyawan_smp_list->pegawai->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->pegawai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->rekbank->Visible) { // rekbank ?>
		<td data-name="rekbank" <?php echo $vgaji_karyawan_smp_list->rekbank->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_rekbank">
<span<?php echo $vgaji_karyawan_smp_list->rekbank->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->rekbank->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id" <?php echo $vgaji_karyawan_smp_list->jenjang_id->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_jenjang_id">
<span<?php echo $vgaji_karyawan_smp_list->jenjang_id->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->jenjang_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->jabatan_id->Visible) { // jabatan_id ?>
		<td data-name="jabatan_id" <?php echo $vgaji_karyawan_smp_list->jabatan_id->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_jabatan_id">
<span<?php echo $vgaji_karyawan_smp_list->jabatan_id->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->jabatan_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->kehadiran->Visible) { // kehadiran ?>
		<td data-name="kehadiran" <?php echo $vgaji_karyawan_smp_list->kehadiran->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_kehadiran">
<span<?php echo $vgaji_karyawan_smp_list->kehadiran->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->kehadiran->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->gapok->Visible) { // gapok ?>
		<td data-name="gapok" <?php echo $vgaji_karyawan_smp_list->gapok->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_gapok">
<span<?php echo $vgaji_karyawan_smp_list->gapok->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->gapok->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->value_kehadiran->Visible) { // value_kehadiran ?>
		<td data-name="value_kehadiran" <?php echo $vgaji_karyawan_smp_list->value_kehadiran->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_value_kehadiran">
<span<?php echo $vgaji_karyawan_smp_list->value_kehadiran->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->value_kehadiran->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->value_reward->Visible) { // value_reward ?>
		<td data-name="value_reward" <?php echo $vgaji_karyawan_smp_list->value_reward->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_value_reward">
<span<?php echo $vgaji_karyawan_smp_list->value_reward->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->value_reward->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->value_inval->Visible) { // value_inval ?>
		<td data-name="value_inval" <?php echo $vgaji_karyawan_smp_list->value_inval->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_value_inval">
<span<?php echo $vgaji_karyawan_smp_list->value_inval->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->value_inval->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->sub_total->Visible) { // sub_total ?>
		<td data-name="sub_total" <?php echo $vgaji_karyawan_smp_list->sub_total->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_sub_total">
<span<?php echo $vgaji_karyawan_smp_list->sub_total->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->sub_total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $vgaji_karyawan_smp_list->potongan->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_potongan">
<span<?php echo $vgaji_karyawan_smp_list->potongan->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->potongan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->penyesuaian->Visible) { // penyesuaian ?>
		<td data-name="penyesuaian" <?php echo $vgaji_karyawan_smp_list->penyesuaian->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_penyesuaian">
<span<?php echo $vgaji_karyawan_smp_list->penyesuaian->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->penyesuaian->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->potongan_bendahara->Visible) { // potongan_bendahara ?>
		<td data-name="potongan_bendahara" <?php echo $vgaji_karyawan_smp_list->potongan_bendahara->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_potongan_bendahara">
<span<?php echo $vgaji_karyawan_smp_list->potongan_bendahara->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->potongan_bendahara->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->total->Visible) { // total ?>
		<td data-name="total" <?php echo $vgaji_karyawan_smp_list->total->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_total">
<span<?php echo $vgaji_karyawan_smp_list->total->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $vgaji_karyawan_smp_list->status->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_status">
<span<?php echo $vgaji_karyawan_smp_list->status->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vgaji_karyawan_smp_list->voucher->Visible) { // voucher ?>
		<td data-name="voucher" <?php echo $vgaji_karyawan_smp_list->voucher->cellAttributes() ?>>
<span id="el<?php echo $vgaji_karyawan_smp_list->RowCount ?>_vgaji_karyawan_smp_voucher">
<span<?php echo $vgaji_karyawan_smp_list->voucher->viewAttributes() ?>><?php echo $vgaji_karyawan_smp_list->voucher->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vgaji_karyawan_smp_list->ListOptions->render("body", "right", $vgaji_karyawan_smp_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vgaji_karyawan_smp_list->isGridAdd())
		$vgaji_karyawan_smp_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vgaji_karyawan_smp->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vgaji_karyawan_smp_list->Recordset)
	$vgaji_karyawan_smp_list->Recordset->Close();
?>
<?php if (!$vgaji_karyawan_smp_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vgaji_karyawan_smp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vgaji_karyawan_smp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vgaji_karyawan_smp_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vgaji_karyawan_smp_list->TotalRecords == 0 && !$vgaji_karyawan_smp->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vgaji_karyawan_smp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vgaji_karyawan_smp_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vgaji_karyawan_smp_list->isExport()) { ?>
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
$vgaji_karyawan_smp_list->terminate();
?>