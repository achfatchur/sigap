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
$v_pengurus_yayasan_list = new v_pengurus_yayasan_list();

// Run the page
$v_pengurus_yayasan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_pengurus_yayasan_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$v_pengurus_yayasan_list->isExport()) { ?>
<script>
var fv_pengurus_yayasanlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fv_pengurus_yayasanlist = currentForm = new ew.Form("fv_pengurus_yayasanlist", "list");
	fv_pengurus_yayasanlist.formKeyCountName = '<?php echo $v_pengurus_yayasan_list->FormKeyCountName ?>';
	loadjs.done("fv_pengurus_yayasanlist");
});
var fv_pengurus_yayasanlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fv_pengurus_yayasanlistsrch = currentSearchForm = new ew.Form("fv_pengurus_yayasanlistsrch");

	// Dynamic selection lists
	// Filters

	fv_pengurus_yayasanlistsrch.filterList = <?php echo $v_pengurus_yayasan_list->getFilterList() ?>;
	loadjs.done("fv_pengurus_yayasanlistsrch");
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
<?php if (!$v_pengurus_yayasan_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v_pengurus_yayasan_list->TotalRecords > 0 && $v_pengurus_yayasan_list->ExportOptions->visible()) { ?>
<?php $v_pengurus_yayasan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->ImportOptions->visible()) { ?>
<?php $v_pengurus_yayasan_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->SearchOptions->visible()) { ?>
<?php $v_pengurus_yayasan_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->FilterOptions->visible()) { ?>
<?php $v_pengurus_yayasan_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v_pengurus_yayasan_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v_pengurus_yayasan_list->isExport() && !$v_pengurus_yayasan->CurrentAction) { ?>
<form name="fv_pengurus_yayasanlistsrch" id="fv_pengurus_yayasanlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fv_pengurus_yayasanlistsrch-search-panel" class="<?php echo $v_pengurus_yayasan_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v_pengurus_yayasan">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $v_pengurus_yayasan_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($v_pengurus_yayasan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($v_pengurus_yayasan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $v_pengurus_yayasan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($v_pengurus_yayasan_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($v_pengurus_yayasan_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($v_pengurus_yayasan_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($v_pengurus_yayasan_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $v_pengurus_yayasan_list->showPageHeader(); ?>
<?php
$v_pengurus_yayasan_list->showMessage();
?>
<?php if ($v_pengurus_yayasan_list->TotalRecords > 0 || $v_pengurus_yayasan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v_pengurus_yayasan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v_pengurus_yayasan">
<?php if (!$v_pengurus_yayasan_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$v_pengurus_yayasan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v_pengurus_yayasan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_pengurus_yayasan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fv_pengurus_yayasanlist" id="fv_pengurus_yayasanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v_pengurus_yayasan">
<div id="gmp_v_pengurus_yayasan" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($v_pengurus_yayasan_list->TotalRecords > 0 || $v_pengurus_yayasan_list->isGridEdit()) { ?>
<table id="tbl_v_pengurus_yayasanlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v_pengurus_yayasan->RowType = ROWTYPE_HEADER;

// Render list options
$v_pengurus_yayasan_list->renderListOptions();

// Render list options (header, left)
$v_pengurus_yayasan_list->ListOptions->render("header", "left");
?>
<?php if ($v_pengurus_yayasan_list->nip->Visible) { // nip ?>
	<?php if ($v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->nip) == "") { ?>
		<th data-name="nip" class="<?php echo $v_pengurus_yayasan_list->nip->headerCellClass() ?>"><div id="elh_v_pengurus_yayasan_nip" class="v_pengurus_yayasan_nip"><div class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->nip->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nip" class="<?php echo $v_pengurus_yayasan_list->nip->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->nip) ?>', 1);"><div id="elh_v_pengurus_yayasan_nip" class="v_pengurus_yayasan_nip">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->nip->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pengurus_yayasan_list->nip->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pengurus_yayasan_list->nip->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->password->Visible) { // password ?>
	<?php if ($v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->password) == "") { ?>
		<th data-name="password" class="<?php echo $v_pengurus_yayasan_list->password->headerCellClass() ?>"><div id="elh_v_pengurus_yayasan_password" class="v_pengurus_yayasan_password"><div class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->password->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="password" class="<?php echo $v_pengurus_yayasan_list->password->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->password) ?>', 1);"><div id="elh_v_pengurus_yayasan_password" class="v_pengurus_yayasan_password">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->password->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pengurus_yayasan_list->password->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pengurus_yayasan_list->password->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->jabatan->Visible) { // jabatan ?>
	<?php if ($v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->jabatan) == "") { ?>
		<th data-name="jabatan" class="<?php echo $v_pengurus_yayasan_list->jabatan->headerCellClass() ?>"><div id="elh_v_pengurus_yayasan_jabatan" class="v_pengurus_yayasan_jabatan"><div class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->jabatan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jabatan" class="<?php echo $v_pengurus_yayasan_list->jabatan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->jabatan) ?>', 1);"><div id="elh_v_pengurus_yayasan_jabatan" class="v_pengurus_yayasan_jabatan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->jabatan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pengurus_yayasan_list->jabatan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pengurus_yayasan_list->jabatan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->lama_kerja->Visible) { // lama_kerja ?>
	<?php if ($v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->lama_kerja) == "") { ?>
		<th data-name="lama_kerja" class="<?php echo $v_pengurus_yayasan_list->lama_kerja->headerCellClass() ?>"><div id="elh_v_pengurus_yayasan_lama_kerja" class="v_pengurus_yayasan_lama_kerja"><div class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->lama_kerja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="lama_kerja" class="<?php echo $v_pengurus_yayasan_list->lama_kerja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->lama_kerja) ?>', 1);"><div id="elh_v_pengurus_yayasan_lama_kerja" class="v_pengurus_yayasan_lama_kerja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->lama_kerja->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pengurus_yayasan_list->lama_kerja->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pengurus_yayasan_list->lama_kerja->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->nama->Visible) { // nama ?>
	<?php if ($v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->nama) == "") { ?>
		<th data-name="nama" class="<?php echo $v_pengurus_yayasan_list->nama->headerCellClass() ?>"><div id="elh_v_pengurus_yayasan_nama" class="v_pengurus_yayasan_nama"><div class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama" class="<?php echo $v_pengurus_yayasan_list->nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->nama) ?>', 1);"><div id="elh_v_pengurus_yayasan_nama" class="v_pengurus_yayasan_nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pengurus_yayasan_list->nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pengurus_yayasan_list->nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->alamat->Visible) { // alamat ?>
	<?php if ($v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->alamat) == "") { ?>
		<th data-name="alamat" class="<?php echo $v_pengurus_yayasan_list->alamat->headerCellClass() ?>"><div id="elh_v_pengurus_yayasan_alamat" class="v_pengurus_yayasan_alamat"><div class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->alamat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="alamat" class="<?php echo $v_pengurus_yayasan_list->alamat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->alamat) ?>', 1);"><div id="elh_v_pengurus_yayasan_alamat" class="v_pengurus_yayasan_alamat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->alamat->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pengurus_yayasan_list->alamat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pengurus_yayasan_list->alamat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->_email->Visible) { // email ?>
	<?php if ($v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->_email) == "") { ?>
		<th data-name="_email" class="<?php echo $v_pengurus_yayasan_list->_email->headerCellClass() ?>"><div id="elh_v_pengurus_yayasan__email" class="v_pengurus_yayasan__email"><div class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_email" class="<?php echo $v_pengurus_yayasan_list->_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->_email) ?>', 1);"><div id="elh_v_pengurus_yayasan__email" class="v_pengurus_yayasan__email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pengurus_yayasan_list->_email->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pengurus_yayasan_list->_email->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->wa->Visible) { // wa ?>
	<?php if ($v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->wa) == "") { ?>
		<th data-name="wa" class="<?php echo $v_pengurus_yayasan_list->wa->headerCellClass() ?>"><div id="elh_v_pengurus_yayasan_wa" class="v_pengurus_yayasan_wa"><div class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->wa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="wa" class="<?php echo $v_pengurus_yayasan_list->wa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->wa) ?>', 1);"><div id="elh_v_pengurus_yayasan_wa" class="v_pengurus_yayasan_wa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->wa->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pengurus_yayasan_list->wa->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pengurus_yayasan_list->wa->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->hp->Visible) { // hp ?>
	<?php if ($v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->hp) == "") { ?>
		<th data-name="hp" class="<?php echo $v_pengurus_yayasan_list->hp->headerCellClass() ?>"><div id="elh_v_pengurus_yayasan_hp" class="v_pengurus_yayasan_hp"><div class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->hp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hp" class="<?php echo $v_pengurus_yayasan_list->hp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->hp) ?>', 1);"><div id="elh_v_pengurus_yayasan_hp" class="v_pengurus_yayasan_hp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->hp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pengurus_yayasan_list->hp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pengurus_yayasan_list->hp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->rekbank->Visible) { // rekbank ?>
	<?php if ($v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->rekbank) == "") { ?>
		<th data-name="rekbank" class="<?php echo $v_pengurus_yayasan_list->rekbank->headerCellClass() ?>"><div id="elh_v_pengurus_yayasan_rekbank" class="v_pengurus_yayasan_rekbank"><div class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->rekbank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rekbank" class="<?php echo $v_pengurus_yayasan_list->rekbank->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->rekbank) ?>', 1);"><div id="elh_v_pengurus_yayasan_rekbank" class="v_pengurus_yayasan_rekbank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->rekbank->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pengurus_yayasan_list->rekbank->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pengurus_yayasan_list->rekbank->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->agama->Visible) { // agama ?>
	<?php if ($v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->agama) == "") { ?>
		<th data-name="agama" class="<?php echo $v_pengurus_yayasan_list->agama->headerCellClass() ?>"><div id="elh_v_pengurus_yayasan_agama" class="v_pengurus_yayasan_agama"><div class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->agama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="agama" class="<?php echo $v_pengurus_yayasan_list->agama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->agama) ?>', 1);"><div id="elh_v_pengurus_yayasan_agama" class="v_pengurus_yayasan_agama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->agama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_pengurus_yayasan_list->agama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pengurus_yayasan_list->agama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->jenkel->Visible) { // jenkel ?>
	<?php if ($v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->jenkel) == "") { ?>
		<th data-name="jenkel" class="<?php echo $v_pengurus_yayasan_list->jenkel->headerCellClass() ?>"><div id="elh_v_pengurus_yayasan_jenkel" class="v_pengurus_yayasan_jenkel"><div class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->jenkel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenkel" class="<?php echo $v_pengurus_yayasan_list->jenkel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->jenkel) ?>', 1);"><div id="elh_v_pengurus_yayasan_jenkel" class="v_pengurus_yayasan_jenkel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->jenkel->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pengurus_yayasan_list->jenkel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pengurus_yayasan_list->jenkel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->level->Visible) { // level ?>
	<?php if ($v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->level) == "") { ?>
		<th data-name="level" class="<?php echo $v_pengurus_yayasan_list->level->headerCellClass() ?>"><div id="elh_v_pengurus_yayasan_level" class="v_pengurus_yayasan_level"><div class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->level->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="level" class="<?php echo $v_pengurus_yayasan_list->level->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->level) ?>', 1);"><div id="elh_v_pengurus_yayasan_level" class="v_pengurus_yayasan_level">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->level->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pengurus_yayasan_list->level->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pengurus_yayasan_list->level->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_pengurus_yayasan_list->kehadiran->Visible) { // kehadiran ?>
	<?php if ($v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->kehadiran) == "") { ?>
		<th data-name="kehadiran" class="<?php echo $v_pengurus_yayasan_list->kehadiran->headerCellClass() ?>"><div id="elh_v_pengurus_yayasan_kehadiran" class="v_pengurus_yayasan_kehadiran"><div class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->kehadiran->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kehadiran" class="<?php echo $v_pengurus_yayasan_list->kehadiran->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v_pengurus_yayasan_list->SortUrl($v_pengurus_yayasan_list->kehadiran) ?>', 1);"><div id="elh_v_pengurus_yayasan_kehadiran" class="v_pengurus_yayasan_kehadiran">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_pengurus_yayasan_list->kehadiran->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_pengurus_yayasan_list->kehadiran->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_pengurus_yayasan_list->kehadiran->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v_pengurus_yayasan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v_pengurus_yayasan_list->ExportAll && $v_pengurus_yayasan_list->isExport()) {
	$v_pengurus_yayasan_list->StopRecord = $v_pengurus_yayasan_list->TotalRecords;
} else {

	// Set the last record to display
	if ($v_pengurus_yayasan_list->TotalRecords > $v_pengurus_yayasan_list->StartRecord + $v_pengurus_yayasan_list->DisplayRecords - 1)
		$v_pengurus_yayasan_list->StopRecord = $v_pengurus_yayasan_list->StartRecord + $v_pengurus_yayasan_list->DisplayRecords - 1;
	else
		$v_pengurus_yayasan_list->StopRecord = $v_pengurus_yayasan_list->TotalRecords;
}
$v_pengurus_yayasan_list->RecordCount = $v_pengurus_yayasan_list->StartRecord - 1;
if ($v_pengurus_yayasan_list->Recordset && !$v_pengurus_yayasan_list->Recordset->EOF) {
	$v_pengurus_yayasan_list->Recordset->moveFirst();
	$selectLimit = $v_pengurus_yayasan_list->UseSelectLimit;
	if (!$selectLimit && $v_pengurus_yayasan_list->StartRecord > 1)
		$v_pengurus_yayasan_list->Recordset->move($v_pengurus_yayasan_list->StartRecord - 1);
} elseif (!$v_pengurus_yayasan->AllowAddDeleteRow && $v_pengurus_yayasan_list->StopRecord == 0) {
	$v_pengurus_yayasan_list->StopRecord = $v_pengurus_yayasan->GridAddRowCount;
}

// Initialize aggregate
$v_pengurus_yayasan->RowType = ROWTYPE_AGGREGATEINIT;
$v_pengurus_yayasan->resetAttributes();
$v_pengurus_yayasan_list->renderRow();
while ($v_pengurus_yayasan_list->RecordCount < $v_pengurus_yayasan_list->StopRecord) {
	$v_pengurus_yayasan_list->RecordCount++;
	if ($v_pengurus_yayasan_list->RecordCount >= $v_pengurus_yayasan_list->StartRecord) {
		$v_pengurus_yayasan_list->RowCount++;

		// Set up key count
		$v_pengurus_yayasan_list->KeyCount = $v_pengurus_yayasan_list->RowIndex;

		// Init row class and style
		$v_pengurus_yayasan->resetAttributes();
		$v_pengurus_yayasan->CssClass = "";
		if ($v_pengurus_yayasan_list->isGridAdd()) {
		} else {
			$v_pengurus_yayasan_list->loadRowValues($v_pengurus_yayasan_list->Recordset); // Load row values
		}
		$v_pengurus_yayasan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v_pengurus_yayasan->RowAttrs->merge(["data-rowindex" => $v_pengurus_yayasan_list->RowCount, "id" => "r" . $v_pengurus_yayasan_list->RowCount . "_v_pengurus_yayasan", "data-rowtype" => $v_pengurus_yayasan->RowType]);

		// Render row
		$v_pengurus_yayasan_list->renderRow();

		// Render list options
		$v_pengurus_yayasan_list->renderListOptions();
?>
	<tr <?php echo $v_pengurus_yayasan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_pengurus_yayasan_list->ListOptions->render("body", "left", $v_pengurus_yayasan_list->RowCount);
?>
	<?php if ($v_pengurus_yayasan_list->nip->Visible) { // nip ?>
		<td data-name="nip" <?php echo $v_pengurus_yayasan_list->nip->cellAttributes() ?>>
<span id="el<?php echo $v_pengurus_yayasan_list->RowCount ?>_v_pengurus_yayasan_nip">
<span<?php echo $v_pengurus_yayasan_list->nip->viewAttributes() ?>><?php echo $v_pengurus_yayasan_list->nip->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pengurus_yayasan_list->password->Visible) { // password ?>
		<td data-name="password" <?php echo $v_pengurus_yayasan_list->password->cellAttributes() ?>>
<span id="el<?php echo $v_pengurus_yayasan_list->RowCount ?>_v_pengurus_yayasan_password">
<span<?php echo $v_pengurus_yayasan_list->password->viewAttributes() ?>><?php echo $v_pengurus_yayasan_list->password->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pengurus_yayasan_list->jabatan->Visible) { // jabatan ?>
		<td data-name="jabatan" <?php echo $v_pengurus_yayasan_list->jabatan->cellAttributes() ?>>
<span id="el<?php echo $v_pengurus_yayasan_list->RowCount ?>_v_pengurus_yayasan_jabatan">
<span<?php echo $v_pengurus_yayasan_list->jabatan->viewAttributes() ?>><?php echo $v_pengurus_yayasan_list->jabatan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pengurus_yayasan_list->lama_kerja->Visible) { // lama_kerja ?>
		<td data-name="lama_kerja" <?php echo $v_pengurus_yayasan_list->lama_kerja->cellAttributes() ?>>
<span id="el<?php echo $v_pengurus_yayasan_list->RowCount ?>_v_pengurus_yayasan_lama_kerja">
<span<?php echo $v_pengurus_yayasan_list->lama_kerja->viewAttributes() ?>><?php echo $v_pengurus_yayasan_list->lama_kerja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pengurus_yayasan_list->nama->Visible) { // nama ?>
		<td data-name="nama" <?php echo $v_pengurus_yayasan_list->nama->cellAttributes() ?>>
<span id="el<?php echo $v_pengurus_yayasan_list->RowCount ?>_v_pengurus_yayasan_nama">
<span<?php echo $v_pengurus_yayasan_list->nama->viewAttributes() ?>><?php echo $v_pengurus_yayasan_list->nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pengurus_yayasan_list->alamat->Visible) { // alamat ?>
		<td data-name="alamat" <?php echo $v_pengurus_yayasan_list->alamat->cellAttributes() ?>>
<span id="el<?php echo $v_pengurus_yayasan_list->RowCount ?>_v_pengurus_yayasan_alamat">
<span<?php echo $v_pengurus_yayasan_list->alamat->viewAttributes() ?>><?php echo $v_pengurus_yayasan_list->alamat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pengurus_yayasan_list->_email->Visible) { // email ?>
		<td data-name="_email" <?php echo $v_pengurus_yayasan_list->_email->cellAttributes() ?>>
<span id="el<?php echo $v_pengurus_yayasan_list->RowCount ?>_v_pengurus_yayasan__email">
<span<?php echo $v_pengurus_yayasan_list->_email->viewAttributes() ?>><?php echo $v_pengurus_yayasan_list->_email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pengurus_yayasan_list->wa->Visible) { // wa ?>
		<td data-name="wa" <?php echo $v_pengurus_yayasan_list->wa->cellAttributes() ?>>
<span id="el<?php echo $v_pengurus_yayasan_list->RowCount ?>_v_pengurus_yayasan_wa">
<span<?php echo $v_pengurus_yayasan_list->wa->viewAttributes() ?>><?php echo $v_pengurus_yayasan_list->wa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pengurus_yayasan_list->hp->Visible) { // hp ?>
		<td data-name="hp" <?php echo $v_pengurus_yayasan_list->hp->cellAttributes() ?>>
<span id="el<?php echo $v_pengurus_yayasan_list->RowCount ?>_v_pengurus_yayasan_hp">
<span<?php echo $v_pengurus_yayasan_list->hp->viewAttributes() ?>><?php echo $v_pengurus_yayasan_list->hp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pengurus_yayasan_list->rekbank->Visible) { // rekbank ?>
		<td data-name="rekbank" <?php echo $v_pengurus_yayasan_list->rekbank->cellAttributes() ?>>
<span id="el<?php echo $v_pengurus_yayasan_list->RowCount ?>_v_pengurus_yayasan_rekbank">
<span<?php echo $v_pengurus_yayasan_list->rekbank->viewAttributes() ?>><?php echo $v_pengurus_yayasan_list->rekbank->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pengurus_yayasan_list->agama->Visible) { // agama ?>
		<td data-name="agama" <?php echo $v_pengurus_yayasan_list->agama->cellAttributes() ?>>
<span id="el<?php echo $v_pengurus_yayasan_list->RowCount ?>_v_pengurus_yayasan_agama">
<span<?php echo $v_pengurus_yayasan_list->agama->viewAttributes() ?>><?php echo $v_pengurus_yayasan_list->agama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pengurus_yayasan_list->jenkel->Visible) { // jenkel ?>
		<td data-name="jenkel" <?php echo $v_pengurus_yayasan_list->jenkel->cellAttributes() ?>>
<span id="el<?php echo $v_pengurus_yayasan_list->RowCount ?>_v_pengurus_yayasan_jenkel">
<span<?php echo $v_pengurus_yayasan_list->jenkel->viewAttributes() ?>><?php echo $v_pengurus_yayasan_list->jenkel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pengurus_yayasan_list->level->Visible) { // level ?>
		<td data-name="level" <?php echo $v_pengurus_yayasan_list->level->cellAttributes() ?>>
<span id="el<?php echo $v_pengurus_yayasan_list->RowCount ?>_v_pengurus_yayasan_level">
<span<?php echo $v_pengurus_yayasan_list->level->viewAttributes() ?>><?php echo $v_pengurus_yayasan_list->level->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_pengurus_yayasan_list->kehadiran->Visible) { // kehadiran ?>
		<td data-name="kehadiran" <?php echo $v_pengurus_yayasan_list->kehadiran->cellAttributes() ?>>
<span id="el<?php echo $v_pengurus_yayasan_list->RowCount ?>_v_pengurus_yayasan_kehadiran">
<span<?php echo $v_pengurus_yayasan_list->kehadiran->viewAttributes() ?>><?php echo $v_pengurus_yayasan_list->kehadiran->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v_pengurus_yayasan_list->ListOptions->render("body", "right", $v_pengurus_yayasan_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$v_pengurus_yayasan_list->isGridAdd())
		$v_pengurus_yayasan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$v_pengurus_yayasan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v_pengurus_yayasan_list->Recordset)
	$v_pengurus_yayasan_list->Recordset->Close();
?>
<?php if (!$v_pengurus_yayasan_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v_pengurus_yayasan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v_pengurus_yayasan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_pengurus_yayasan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v_pengurus_yayasan_list->TotalRecords == 0 && !$v_pengurus_yayasan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v_pengurus_yayasan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v_pengurus_yayasan_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$v_pengurus_yayasan_list->isExport()) { ?>
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
$v_pengurus_yayasan_list->terminate();
?>