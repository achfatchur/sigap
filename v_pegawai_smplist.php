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
$v_pegawai_smp_list = new v_pegawai_smp_list();

// Run the page
$v_pegawai_smp_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_pegawai_smp_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$v_pegawai_smp_list->isExport()) { ?>
<script>
var fv_pegawai_smplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fv_pegawai_smplist = currentForm = new ew.Form("fv_pegawai_smplist", "list");
	fv_pegawai_smplist.formKeyCountName = '<?php echo $v_pegawai_smp_list->FormKeyCountName ?>';
	loadjs.done("fv_pegawai_smplist");
});
var fv_pegawai_smplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fv_pegawai_smplistsrch = currentSearchForm = new ew.Form("fv_pegawai_smplistsrch");

	// Validate function for search
	fv_pegawai_smplistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fv_pegawai_smplistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fv_pegawai_smplistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fv_pegawai_smplistsrch.lists["x_jenjang_id"] = <?php echo $v_pegawai_smp_list->jenjang_id->Lookup->toClientList($v_pegawai_smp_list) ?>;
	fv_pegawai_smplistsrch.lists["x_jenjang_id"].options = <?php echo JsonEncode($v_pegawai_smp_list->jenjang_id->lookupOptions()) ?>;

	// Filters
	fv_pegawai_smplistsrch.filterList = <?php echo $v_pegawai_smp_list->getFilterList() ?>;
	loadjs.done("fv_pegawai_smplistsrch");
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
<?php if (!$v_pegawai_smp_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v_pegawai_smp_list->TotalRecords > 0 && $v_pegawai_smp_list->ExportOptions->visible()) { ?>
<?php $v_pegawai_smp_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->ImportOptions->visible()) { ?>
<?php $v_pegawai_smp_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->SearchOptions->visible()) { ?>
<?php $v_pegawai_smp_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->FilterOptions->visible()) { ?>
<?php $v_pegawai_smp_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v_pegawai_smp_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v_pegawai_smp_list->isExport() && !$v_pegawai_smp->CurrentAction) { ?>
<form name="fv_pegawai_smplistsrch" id="fv_pegawai_smplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fv_pegawai_smplistsrch-search-panel" class="<?php echo $v_pegawai_smp_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v_pegawai_smp">
	<div class="ew-extended-search">
<?php

// Render search row
$v_pegawai_smp->RowType = ROWTYPE_SEARCH;
$v_pegawai_smp->resetAttributes();
$v_pegawai_smp_list->renderRow();
?>
<?php if ($v_pegawai_smp_list->jenjang_id->Visible) { // jenjang_id ?>
	<?php
		$v_pegawai_smp_list->SearchColumnCount++;
		if (($v_pegawai_smp_list->SearchColumnCount - 1) % $v_pegawai_smp_list->SearchFieldsPerRow == 0) {
			$v_pegawai_smp_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $v_pegawai_smp_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_jenjang_id" class="ew-cell form-group">
		<label for="x_jenjang_id" class="ew-search-caption ew-label"><?php echo $v_pegawai_smp_list->jenjang_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_jenjang_id" id="z_jenjang_id" value="=">
</span>
		<span id="el_v_pegawai_smp_jenjang_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jenjang_id"><?php echo EmptyValue(strval($v_pegawai_smp_list->jenjang_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_pegawai_smp_list->jenjang_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_pegawai_smp_list->jenjang_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_pegawai_smp_list->jenjang_id->ReadOnly || $v_pegawai_smp_list->jenjang_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jenjang_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_pegawai_smp_list->jenjang_id->Lookup->getParamTag($v_pegawai_smp_list, "p_x_jenjang_id") ?>
<input type="hidden" data-table="v_pegawai_smp" data-field="x_jenjang_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_pegawai_smp_list->jenjang_id->displayValueSeparatorAttribute() ?>" name="x_jenjang_id" id="x_jenjang_id" value="<?php echo $v_pegawai_smp_list->jenjang_id->AdvancedSearch->SearchValue ?>"<?php echo $v_pegawai_smp_list->jenjang_id->editAttributes() ?>>
</span>
	</div>
	<?php if ($v_pegawai_smp_list->SearchColumnCount % $v_pegawai_smp_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($v_pegawai_smp_list->SearchColumnCount % $v_pegawai_smp_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $v_pegawai_smp_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($v_pegawai_smp_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($v_pegawai_smp_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $v_pegawai_smp_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($v_pegawai_smp_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($v_pegawai_smp_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($v_pegawai_smp_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($v_pegawai_smp_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $v_pegawai_smp_list->showPageHeader(); ?>
<?php
$v_pegawai_smp_list->showMessage();
?>
<?php if ($v_pegawai_smp_list->TotalRecords > 0 || $v_pegawai_smp->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v_pegawai_smp_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v_pegawai_smp">
<?php if (!$v_pegawai_smp_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$v_pegawai_smp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v_pegawai_smp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_pegawai_smp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fv_pegawai_smplist" id="fv_pegawai_smplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v_pegawai_smp">
<div id="gmp_v_pegawai_smp" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($v_pegawai_smp_list->TotalRecords > 0 || $v_pegawai_smp_list->isGridEdit()) { ?>
<table id="tbl_v_pegawai_smplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v_pegawai_smp->RowType = ROWTYPE_HEADER;

// Render list options
$v_pegawai_smp_list->renderListOptions();

// Render list options (header, left)
$v_pegawai_smp_list->ListOptions->render("header", "left");
?>
<?php if ($v_pegawai_smp_list->nip->Visible) { // nip ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->nip) == "") { ?>
		<th data-name="nip" class="<?php echo $v_pegawai_smp_list->nip->headerCellClass() ?>"><div id="elh_v_pegawai_smp_nip" class="v_pegawai_smp_nip"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->nip->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nip" class="<?php echo $v_pegawai_smp_list->nip->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->nip) ?>', 1);"><div id="elh_v_pegawai_smp_nip" class="v_pegawai_smp_nip">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->nip->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->nip->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->nip->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->password->Visible) { // password ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->password) == "") { ?>
		<th data-name="password" class="<?php echo $v_pegawai_smp_list->password->headerCellClass() ?>"><div id="elh_v_pegawai_smp_password" class="v_pegawai_smp_password"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->password->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="password" class="<?php echo $v_pegawai_smp_list->password->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->password) ?>', 1);"><div id="elh_v_pegawai_smp_password" class="v_pegawai_smp_password">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->password->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->password->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->password->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->jenjang_id->Visible) { // jenjang_id ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->jenjang_id) == "") { ?>
		<th data-name="jenjang_id" class="<?php echo $v_pegawai_smp_list->jenjang_id->headerCellClass() ?>"><div id="elh_v_pegawai_smp_jenjang_id" class="v_pegawai_smp_jenjang_id"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->jenjang_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang_id" class="<?php echo $v_pegawai_smp_list->jenjang_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->jenjang_id) ?>', 1);"><div id="elh_v_pegawai_smp_jenjang_id" class="v_pegawai_smp_jenjang_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->jenjang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->jenjang_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->jenjang_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->jabatan->Visible) { // jabatan ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->jabatan) == "") { ?>
		<th data-name="jabatan" class="<?php echo $v_pegawai_smp_list->jabatan->headerCellClass() ?>"><div id="elh_v_pegawai_smp_jabatan" class="v_pegawai_smp_jabatan"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->jabatan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jabatan" class="<?php echo $v_pegawai_smp_list->jabatan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->jabatan) ?>', 1);"><div id="elh_v_pegawai_smp_jabatan" class="v_pegawai_smp_jabatan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->jabatan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->jabatan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->jabatan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->periode_jabatan->Visible) { // periode_jabatan ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->periode_jabatan) == "") { ?>
		<th data-name="periode_jabatan" class="<?php echo $v_pegawai_smp_list->periode_jabatan->headerCellClass() ?>"><div id="elh_v_pegawai_smp_periode_jabatan" class="v_pegawai_smp_periode_jabatan"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->periode_jabatan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="periode_jabatan" class="<?php echo $v_pegawai_smp_list->periode_jabatan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->periode_jabatan) ?>', 1);"><div id="elh_v_pegawai_smp_periode_jabatan" class="v_pegawai_smp_periode_jabatan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->periode_jabatan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->periode_jabatan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->periode_jabatan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->status_peg->Visible) { // status_peg ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->status_peg) == "") { ?>
		<th data-name="status_peg" class="<?php echo $v_pegawai_smp_list->status_peg->headerCellClass() ?>"><div id="elh_v_pegawai_smp_status_peg" class="v_pegawai_smp_status_peg"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->status_peg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status_peg" class="<?php echo $v_pegawai_smp_list->status_peg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->status_peg) ?>', 1);"><div id="elh_v_pegawai_smp_status_peg" class="v_pegawai_smp_status_peg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->status_peg->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->status_peg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->status_peg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->type->Visible) { // type ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->type) == "") { ?>
		<th data-name="type" class="<?php echo $v_pegawai_smp_list->type->headerCellClass() ?>"><div id="elh_v_pegawai_smp_type" class="v_pegawai_smp_type"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="type" class="<?php echo $v_pegawai_smp_list->type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->type) ?>', 1);"><div id="elh_v_pegawai_smp_type" class="v_pegawai_smp_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->sertif->Visible) { // sertif ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->sertif) == "") { ?>
		<th data-name="sertif" class="<?php echo $v_pegawai_smp_list->sertif->headerCellClass() ?>"><div id="elh_v_pegawai_smp_sertif" class="v_pegawai_smp_sertif"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->sertif->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sertif" class="<?php echo $v_pegawai_smp_list->sertif->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->sertif) ?>', 1);"><div id="elh_v_pegawai_smp_sertif" class="v_pegawai_smp_sertif">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->sertif->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->sertif->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->sertif->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->tambahan->Visible) { // tambahan ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->tambahan) == "") { ?>
		<th data-name="tambahan" class="<?php echo $v_pegawai_smp_list->tambahan->headerCellClass() ?>"><div id="elh_v_pegawai_smp_tambahan" class="v_pegawai_smp_tambahan"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->tambahan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tambahan" class="<?php echo $v_pegawai_smp_list->tambahan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->tambahan) ?>', 1);"><div id="elh_v_pegawai_smp_tambahan" class="v_pegawai_smp_tambahan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->tambahan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->tambahan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->tambahan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->lama_kerja->Visible) { // lama_kerja ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->lama_kerja) == "") { ?>
		<th data-name="lama_kerja" class="<?php echo $v_pegawai_smp_list->lama_kerja->headerCellClass() ?>"><div id="elh_v_pegawai_smp_lama_kerja" class="v_pegawai_smp_lama_kerja"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->lama_kerja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="lama_kerja" class="<?php echo $v_pegawai_smp_list->lama_kerja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->lama_kerja) ?>', 1);"><div id="elh_v_pegawai_smp_lama_kerja" class="v_pegawai_smp_lama_kerja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->lama_kerja->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->lama_kerja->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->lama_kerja->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->nama->Visible) { // nama ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->nama) == "") { ?>
		<th data-name="nama" class="<?php echo $v_pegawai_smp_list->nama->headerCellClass() ?>"><div id="elh_v_pegawai_smp_nama" class="v_pegawai_smp_nama"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama" class="<?php echo $v_pegawai_smp_list->nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->nama) ?>', 1);"><div id="elh_v_pegawai_smp_nama" class="v_pegawai_smp_nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->alamat->Visible) { // alamat ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->alamat) == "") { ?>
		<th data-name="alamat" class="<?php echo $v_pegawai_smp_list->alamat->headerCellClass() ?>"><div id="elh_v_pegawai_smp_alamat" class="v_pegawai_smp_alamat"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->alamat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="alamat" class="<?php echo $v_pegawai_smp_list->alamat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->alamat) ?>', 1);"><div id="elh_v_pegawai_smp_alamat" class="v_pegawai_smp_alamat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->alamat->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->alamat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->alamat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->_email->Visible) { // email ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->_email) == "") { ?>
		<th data-name="_email" class="<?php echo $v_pegawai_smp_list->_email->headerCellClass() ?>"><div id="elh_v_pegawai_smp__email" class="v_pegawai_smp__email"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_email" class="<?php echo $v_pegawai_smp_list->_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->_email) ?>', 1);"><div id="elh_v_pegawai_smp__email" class="v_pegawai_smp__email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->_email->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->_email->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->wa->Visible) { // wa ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->wa) == "") { ?>
		<th data-name="wa" class="<?php echo $v_pegawai_smp_list->wa->headerCellClass() ?>"><div id="elh_v_pegawai_smp_wa" class="v_pegawai_smp_wa"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->wa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="wa" class="<?php echo $v_pegawai_smp_list->wa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->wa) ?>', 1);"><div id="elh_v_pegawai_smp_wa" class="v_pegawai_smp_wa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->wa->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->wa->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->wa->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->hp->Visible) { // hp ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->hp) == "") { ?>
		<th data-name="hp" class="<?php echo $v_pegawai_smp_list->hp->headerCellClass() ?>"><div id="elh_v_pegawai_smp_hp" class="v_pegawai_smp_hp"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->hp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hp" class="<?php echo $v_pegawai_smp_list->hp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->hp) ?>', 1);"><div id="elh_v_pegawai_smp_hp" class="v_pegawai_smp_hp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->hp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->hp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->hp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->tgllahir->Visible) { // tgllahir ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->tgllahir) == "") { ?>
		<th data-name="tgllahir" class="<?php echo $v_pegawai_smp_list->tgllahir->headerCellClass() ?>"><div id="elh_v_pegawai_smp_tgllahir" class="v_pegawai_smp_tgllahir"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->tgllahir->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tgllahir" class="<?php echo $v_pegawai_smp_list->tgllahir->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->tgllahir) ?>', 1);"><div id="elh_v_pegawai_smp_tgllahir" class="v_pegawai_smp_tgllahir">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->tgllahir->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->tgllahir->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->tgllahir->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->rekbank->Visible) { // rekbank ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->rekbank) == "") { ?>
		<th data-name="rekbank" class="<?php echo $v_pegawai_smp_list->rekbank->headerCellClass() ?>"><div id="elh_v_pegawai_smp_rekbank" class="v_pegawai_smp_rekbank"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->rekbank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rekbank" class="<?php echo $v_pegawai_smp_list->rekbank->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->rekbank) ?>', 1);"><div id="elh_v_pegawai_smp_rekbank" class="v_pegawai_smp_rekbank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->rekbank->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->rekbank->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->rekbank->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->pendidikan->Visible) { // pendidikan ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->pendidikan) == "") { ?>
		<th data-name="pendidikan" class="<?php echo $v_pegawai_smp_list->pendidikan->headerCellClass() ?>"><div id="elh_v_pegawai_smp_pendidikan" class="v_pegawai_smp_pendidikan"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->pendidikan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pendidikan" class="<?php echo $v_pegawai_smp_list->pendidikan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->pendidikan) ?>', 1);"><div id="elh_v_pegawai_smp_pendidikan" class="v_pegawai_smp_pendidikan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->pendidikan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->pendidikan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->pendidikan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->jurusan->Visible) { // jurusan ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->jurusan) == "") { ?>
		<th data-name="jurusan" class="<?php echo $v_pegawai_smp_list->jurusan->headerCellClass() ?>"><div id="elh_v_pegawai_smp_jurusan" class="v_pegawai_smp_jurusan"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->jurusan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jurusan" class="<?php echo $v_pegawai_smp_list->jurusan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->jurusan) ?>', 1);"><div id="elh_v_pegawai_smp_jurusan" class="v_pegawai_smp_jurusan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->jurusan->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->jurusan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->jurusan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->agama->Visible) { // agama ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->agama) == "") { ?>
		<th data-name="agama" class="<?php echo $v_pegawai_smp_list->agama->headerCellClass() ?>"><div id="elh_v_pegawai_smp_agama" class="v_pegawai_smp_agama"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->agama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="agama" class="<?php echo $v_pegawai_smp_list->agama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->agama) ?>', 1);"><div id="elh_v_pegawai_smp_agama" class="v_pegawai_smp_agama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->agama->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->agama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->agama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->jenkel->Visible) { // jenkel ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->jenkel) == "") { ?>
		<th data-name="jenkel" class="<?php echo $v_pegawai_smp_list->jenkel->headerCellClass() ?>"><div id="elh_v_pegawai_smp_jenkel" class="v_pegawai_smp_jenkel"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->jenkel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenkel" class="<?php echo $v_pegawai_smp_list->jenkel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->jenkel) ?>', 1);"><div id="elh_v_pegawai_smp_jenkel" class="v_pegawai_smp_jenkel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->jenkel->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->jenkel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->jenkel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->mulai_bekerja->Visible) { // mulai_bekerja ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->mulai_bekerja) == "") { ?>
		<th data-name="mulai_bekerja" class="<?php echo $v_pegawai_smp_list->mulai_bekerja->headerCellClass() ?>"><div id="elh_v_pegawai_smp_mulai_bekerja" class="v_pegawai_smp_mulai_bekerja"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->mulai_bekerja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mulai_bekerja" class="<?php echo $v_pegawai_smp_list->mulai_bekerja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->mulai_bekerja) ?>', 1);"><div id="elh_v_pegawai_smp_mulai_bekerja" class="v_pegawai_smp_mulai_bekerja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->mulai_bekerja->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->mulai_bekerja->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->mulai_bekerja->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pegawai_smp_list->level->Visible) { // level ?>
	<?php if ($v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->level) == "") { ?>
		<th data-name="level" class="<?php echo $v_pegawai_smp_list->level->headerCellClass() ?>"><div id="elh_v_pegawai_smp_level" class="v_pegawai_smp_level"><div class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->level->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="level" class="<?php echo $v_pegawai_smp_list->level->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pegawai_smp_list->SortUrl($v_pegawai_smp_list->level) ?>', 1);"><div id="elh_v_pegawai_smp_level" class="v_pegawai_smp_level">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pegawai_smp_list->level->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pegawai_smp_list->level->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pegawai_smp_list->level->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v_pegawai_smp_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v_pegawai_smp_list->ExportAll && $v_pegawai_smp_list->isExport()) {
	$v_pegawai_smp_list->StopRecord = $v_pegawai_smp_list->TotalRecords;
} else {

	// Set the last record to display
	if ($v_pegawai_smp_list->TotalRecords > $v_pegawai_smp_list->StartRecord + $v_pegawai_smp_list->DisplayRecords - 1)
		$v_pegawai_smp_list->StopRecord = $v_pegawai_smp_list->StartRecord + $v_pegawai_smp_list->DisplayRecords - 1;
	else
		$v_pegawai_smp_list->StopRecord = $v_pegawai_smp_list->TotalRecords;
}
$v_pegawai_smp_list->RecordCount = $v_pegawai_smp_list->StartRecord - 1;
if ($v_pegawai_smp_list->Recordset && !$v_pegawai_smp_list->Recordset->EOF) {
	$v_pegawai_smp_list->Recordset->moveFirst();
	$selectLimit = $v_pegawai_smp_list->UseSelectLimit;
	if (!$selectLimit && $v_pegawai_smp_list->StartRecord > 1)
		$v_pegawai_smp_list->Recordset->move($v_pegawai_smp_list->StartRecord - 1);
} elseif (!$v_pegawai_smp->AllowAddDeleteRow && $v_pegawai_smp_list->StopRecord == 0) {
	$v_pegawai_smp_list->StopRecord = $v_pegawai_smp->GridAddRowCount;
}

// Initialize aggregate
$v_pegawai_smp->RowType = ROWTYPE_AGGREGATEINIT;
$v_pegawai_smp->resetAttributes();
$v_pegawai_smp_list->renderRow();
while ($v_pegawai_smp_list->RecordCount < $v_pegawai_smp_list->StopRecord) {
	$v_pegawai_smp_list->RecordCount++;
	if ($v_pegawai_smp_list->RecordCount >= $v_pegawai_smp_list->StartRecord) {
		$v_pegawai_smp_list->RowCount++;

		// Set up key count
		$v_pegawai_smp_list->KeyCount = $v_pegawai_smp_list->RowIndex;

		// Init row class and style
		$v_pegawai_smp->resetAttributes();
		$v_pegawai_smp->CssClass = "";
		if ($v_pegawai_smp_list->isGridAdd()) {
		} else {
			$v_pegawai_smp_list->loadRowValues($v_pegawai_smp_list->Recordset); // Load row values
		}
		$v_pegawai_smp->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v_pegawai_smp->RowAttrs->merge(["data-rowindex" => $v_pegawai_smp_list->RowCount, "id" => "r" . $v_pegawai_smp_list->RowCount . "_v_pegawai_smp", "data-rowtype" => $v_pegawai_smp->RowType]);

		// Render row
		$v_pegawai_smp_list->renderRow();

		// Render list options
		$v_pegawai_smp_list->renderListOptions();
?>
	<tr <?php echo $v_pegawai_smp->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_pegawai_smp_list->ListOptions->render("body", "left", $v_pegawai_smp_list->RowCount);
?>
	<?php if ($v_pegawai_smp_list->nip->Visible) { // nip ?>
		<td data-name="nip" <?php echo $v_pegawai_smp_list->nip->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_nip">
<span<?php echo $v_pegawai_smp_list->nip->viewAttributes() ?>><?php echo $v_pegawai_smp_list->nip->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->password->Visible) { // password ?>
		<td data-name="password" <?php echo $v_pegawai_smp_list->password->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_password">
<span<?php echo $v_pegawai_smp_list->password->viewAttributes() ?>><?php echo $v_pegawai_smp_list->password->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id" <?php echo $v_pegawai_smp_list->jenjang_id->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_jenjang_id">
<span<?php echo $v_pegawai_smp_list->jenjang_id->viewAttributes() ?>><?php echo $v_pegawai_smp_list->jenjang_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->jabatan->Visible) { // jabatan ?>
		<td data-name="jabatan" <?php echo $v_pegawai_smp_list->jabatan->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_jabatan">
<span<?php echo $v_pegawai_smp_list->jabatan->viewAttributes() ?>><?php echo $v_pegawai_smp_list->jabatan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->periode_jabatan->Visible) { // periode_jabatan ?>
		<td data-name="periode_jabatan" <?php echo $v_pegawai_smp_list->periode_jabatan->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_periode_jabatan">
<span<?php echo $v_pegawai_smp_list->periode_jabatan->viewAttributes() ?>><?php echo $v_pegawai_smp_list->periode_jabatan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->status_peg->Visible) { // status_peg ?>
		<td data-name="status_peg" <?php echo $v_pegawai_smp_list->status_peg->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_status_peg">
<span<?php echo $v_pegawai_smp_list->status_peg->viewAttributes() ?>><?php echo $v_pegawai_smp_list->status_peg->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->type->Visible) { // type ?>
		<td data-name="type" <?php echo $v_pegawai_smp_list->type->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_type">
<span<?php echo $v_pegawai_smp_list->type->viewAttributes() ?>><?php echo $v_pegawai_smp_list->type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->sertif->Visible) { // sertif ?>
		<td data-name="sertif" <?php echo $v_pegawai_smp_list->sertif->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_sertif">
<span<?php echo $v_pegawai_smp_list->sertif->viewAttributes() ?>><?php echo $v_pegawai_smp_list->sertif->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->tambahan->Visible) { // tambahan ?>
		<td data-name="tambahan" <?php echo $v_pegawai_smp_list->tambahan->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_tambahan">
<span<?php echo $v_pegawai_smp_list->tambahan->viewAttributes() ?>><?php echo $v_pegawai_smp_list->tambahan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->lama_kerja->Visible) { // lama_kerja ?>
		<td data-name="lama_kerja" <?php echo $v_pegawai_smp_list->lama_kerja->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_lama_kerja">
<span<?php echo $v_pegawai_smp_list->lama_kerja->viewAttributes() ?>><?php echo $v_pegawai_smp_list->lama_kerja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->nama->Visible) { // nama ?>
		<td data-name="nama" <?php echo $v_pegawai_smp_list->nama->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_nama">
<span<?php echo $v_pegawai_smp_list->nama->viewAttributes() ?>><?php echo $v_pegawai_smp_list->nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->alamat->Visible) { // alamat ?>
		<td data-name="alamat" <?php echo $v_pegawai_smp_list->alamat->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_alamat">
<span<?php echo $v_pegawai_smp_list->alamat->viewAttributes() ?>><?php echo $v_pegawai_smp_list->alamat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->_email->Visible) { // email ?>
		<td data-name="_email" <?php echo $v_pegawai_smp_list->_email->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp__email">
<span<?php echo $v_pegawai_smp_list->_email->viewAttributes() ?>><?php echo $v_pegawai_smp_list->_email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->wa->Visible) { // wa ?>
		<td data-name="wa" <?php echo $v_pegawai_smp_list->wa->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_wa">
<span<?php echo $v_pegawai_smp_list->wa->viewAttributes() ?>><?php echo $v_pegawai_smp_list->wa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->hp->Visible) { // hp ?>
		<td data-name="hp" <?php echo $v_pegawai_smp_list->hp->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_hp">
<span<?php echo $v_pegawai_smp_list->hp->viewAttributes() ?>><?php echo $v_pegawai_smp_list->hp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->tgllahir->Visible) { // tgllahir ?>
		<td data-name="tgllahir" <?php echo $v_pegawai_smp_list->tgllahir->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_tgllahir">
<span<?php echo $v_pegawai_smp_list->tgllahir->viewAttributes() ?>><?php echo $v_pegawai_smp_list->tgllahir->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->rekbank->Visible) { // rekbank ?>
		<td data-name="rekbank" <?php echo $v_pegawai_smp_list->rekbank->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_rekbank">
<span<?php echo $v_pegawai_smp_list->rekbank->viewAttributes() ?>><?php echo $v_pegawai_smp_list->rekbank->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->pendidikan->Visible) { // pendidikan ?>
		<td data-name="pendidikan" <?php echo $v_pegawai_smp_list->pendidikan->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_pendidikan">
<span<?php echo $v_pegawai_smp_list->pendidikan->viewAttributes() ?>><?php echo $v_pegawai_smp_list->pendidikan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->jurusan->Visible) { // jurusan ?>
		<td data-name="jurusan" <?php echo $v_pegawai_smp_list->jurusan->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_jurusan">
<span<?php echo $v_pegawai_smp_list->jurusan->viewAttributes() ?>><?php echo $v_pegawai_smp_list->jurusan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->agama->Visible) { // agama ?>
		<td data-name="agama" <?php echo $v_pegawai_smp_list->agama->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_agama">
<span<?php echo $v_pegawai_smp_list->agama->viewAttributes() ?>><?php echo $v_pegawai_smp_list->agama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->jenkel->Visible) { // jenkel ?>
		<td data-name="jenkel" <?php echo $v_pegawai_smp_list->jenkel->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_jenkel">
<span<?php echo $v_pegawai_smp_list->jenkel->viewAttributes() ?>><?php echo $v_pegawai_smp_list->jenkel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->mulai_bekerja->Visible) { // mulai_bekerja ?>
		<td data-name="mulai_bekerja" <?php echo $v_pegawai_smp_list->mulai_bekerja->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_mulai_bekerja">
<span<?php echo $v_pegawai_smp_list->mulai_bekerja->viewAttributes() ?>><?php echo $v_pegawai_smp_list->mulai_bekerja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pegawai_smp_list->level->Visible) { // level ?>
		<td data-name="level" <?php echo $v_pegawai_smp_list->level->cellAttributes() ?>>
<span id="el<?php echo $v_pegawai_smp_list->RowCount ?>_v_pegawai_smp_level">
<span<?php echo $v_pegawai_smp_list->level->viewAttributes() ?>><?php echo $v_pegawai_smp_list->level->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v_pegawai_smp_list->ListOptions->render("body", "right", $v_pegawai_smp_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$v_pegawai_smp_list->isGridAdd())
		$v_pegawai_smp_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$v_pegawai_smp->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v_pegawai_smp_list->Recordset)
	$v_pegawai_smp_list->Recordset->Close();
?>
<?php if (!$v_pegawai_smp_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v_pegawai_smp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v_pegawai_smp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_pegawai_smp_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v_pegawai_smp_list->TotalRecords == 0 && !$v_pegawai_smp->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v_pegawai_smp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v_pegawai_smp_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$v_pegawai_smp_list->isExport()) { ?>
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
$v_pegawai_smp_list->terminate();
?>