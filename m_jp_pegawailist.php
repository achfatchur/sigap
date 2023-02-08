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
$m_jp_pegawai_list = new m_jp_pegawai_list();

// Run the page
$m_jp_pegawai_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_jp_pegawai_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$m_jp_pegawai_list->isExport()) { ?>
<script>
var fm_jp_pegawailist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fm_jp_pegawailist = currentForm = new ew.Form("fm_jp_pegawailist", "list");
	fm_jp_pegawailist.formKeyCountName = '<?php echo $m_jp_pegawai_list->FormKeyCountName ?>';

	// Validate form
	fm_jp_pegawailist.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($m_jp_pegawai_list->nip->Required) { ?>
				elm = this.getElements("x" + infix + "_nip");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_jp_pegawai_list->nip->caption(), $m_jp_pegawai_list->nip->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_jp_pegawai_list->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_jp_pegawai_list->nama->caption(), $m_jp_pegawai_list->nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_jp_pegawai_list->kehadiran->Required) { ?>
				elm = this.getElements("x" + infix + "_kehadiran");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_jp_pegawai_list->kehadiran->caption(), $m_jp_pegawai_list->kehadiran->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_kehadiran");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_jp_pegawai_list->kehadiran->errorMessage()) ?>");
			<?php if ($m_jp_pegawai_list->jjm->Required) { ?>
				elm = this.getElements("x" + infix + "_jjm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_jp_pegawai_list->jjm->caption(), $m_jp_pegawai_list->jjm->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jjm");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_jp_pegawai_list->jjm->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fm_jp_pegawailist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fm_jp_pegawailist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fm_jp_pegawailist");
});
var fm_jp_pegawailistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fm_jp_pegawailistsrch = currentSearchForm = new ew.Form("fm_jp_pegawailistsrch");

	// Dynamic selection lists
	// Filters

	fm_jp_pegawailistsrch.filterList = <?php echo $m_jp_pegawai_list->getFilterList() ?>;
	loadjs.done("fm_jp_pegawailistsrch");
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
<?php if (!$m_jp_pegawai_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($m_jp_pegawai_list->TotalRecords > 0 && $m_jp_pegawai_list->ExportOptions->visible()) { ?>
<?php $m_jp_pegawai_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($m_jp_pegawai_list->ImportOptions->visible()) { ?>
<?php $m_jp_pegawai_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($m_jp_pegawai_list->SearchOptions->visible()) { ?>
<?php $m_jp_pegawai_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($m_jp_pegawai_list->FilterOptions->visible()) { ?>
<?php $m_jp_pegawai_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$m_jp_pegawai_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$m_jp_pegawai_list->isExport() && !$m_jp_pegawai->CurrentAction) { ?>
<form name="fm_jp_pegawailistsrch" id="fm_jp_pegawailistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fm_jp_pegawailistsrch-search-panel" class="<?php echo $m_jp_pegawai_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="m_jp_pegawai">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $m_jp_pegawai_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($m_jp_pegawai_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($m_jp_pegawai_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $m_jp_pegawai_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($m_jp_pegawai_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($m_jp_pegawai_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($m_jp_pegawai_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($m_jp_pegawai_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $m_jp_pegawai_list->showPageHeader(); ?>
<?php
$m_jp_pegawai_list->showMessage();
?>
<?php if ($m_jp_pegawai_list->TotalRecords > 0 || $m_jp_pegawai->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($m_jp_pegawai_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> m_jp_pegawai">
<?php if (!$m_jp_pegawai_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$m_jp_pegawai_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_jp_pegawai_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_jp_pegawai_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fm_jp_pegawailist" id="fm_jp_pegawailist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_jp_pegawai">
<div id="gmp_m_jp_pegawai" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($m_jp_pegawai_list->TotalRecords > 0 || $m_jp_pegawai_list->isGridEdit()) { ?>
<table id="tbl_m_jp_pegawailist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$m_jp_pegawai->RowType = ROWTYPE_HEADER;

// Render list options
$m_jp_pegawai_list->renderListOptions();

// Render list options (header, left)
$m_jp_pegawai_list->ListOptions->render("header", "left");
?>
<?php if ($m_jp_pegawai_list->nip->Visible) { // nip ?>
	<?php if ($m_jp_pegawai_list->SortUrl($m_jp_pegawai_list->nip) == "") { ?>
		<th data-name="nip" class="<?php echo $m_jp_pegawai_list->nip->headerCellClass() ?>"><div id="elh_m_jp_pegawai_nip" class="m_jp_pegawai_nip"><div class="ew-table-header-caption"><?php echo $m_jp_pegawai_list->nip->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nip" class="<?php echo $m_jp_pegawai_list->nip->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_jp_pegawai_list->SortUrl($m_jp_pegawai_list->nip) ?>', 1);"><div id="elh_m_jp_pegawai_nip" class="m_jp_pegawai_nip">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_jp_pegawai_list->nip->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($m_jp_pegawai_list->nip->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_jp_pegawai_list->nip->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_jp_pegawai_list->nama->Visible) { // nama ?>
	<?php if ($m_jp_pegawai_list->SortUrl($m_jp_pegawai_list->nama) == "") { ?>
		<th data-name="nama" class="<?php echo $m_jp_pegawai_list->nama->headerCellClass() ?>"><div id="elh_m_jp_pegawai_nama" class="m_jp_pegawai_nama"><div class="ew-table-header-caption"><?php echo $m_jp_pegawai_list->nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama" class="<?php echo $m_jp_pegawai_list->nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_jp_pegawai_list->SortUrl($m_jp_pegawai_list->nama) ?>', 1);"><div id="elh_m_jp_pegawai_nama" class="m_jp_pegawai_nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_jp_pegawai_list->nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($m_jp_pegawai_list->nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_jp_pegawai_list->nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_jp_pegawai_list->kehadiran->Visible) { // kehadiran ?>
	<?php if ($m_jp_pegawai_list->SortUrl($m_jp_pegawai_list->kehadiran) == "") { ?>
		<th data-name="kehadiran" class="<?php echo $m_jp_pegawai_list->kehadiran->headerCellClass() ?>"><div id="elh_m_jp_pegawai_kehadiran" class="m_jp_pegawai_kehadiran"><div class="ew-table-header-caption"><?php echo $m_jp_pegawai_list->kehadiran->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kehadiran" class="<?php echo $m_jp_pegawai_list->kehadiran->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_jp_pegawai_list->SortUrl($m_jp_pegawai_list->kehadiran) ?>', 1);"><div id="elh_m_jp_pegawai_kehadiran" class="m_jp_pegawai_kehadiran">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_jp_pegawai_list->kehadiran->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_jp_pegawai_list->kehadiran->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_jp_pegawai_list->kehadiran->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($m_jp_pegawai_list->jjm->Visible) { // jjm ?>
	<?php if ($m_jp_pegawai_list->SortUrl($m_jp_pegawai_list->jjm) == "") { ?>
		<th data-name="jjm" class="<?php echo $m_jp_pegawai_list->jjm->headerCellClass() ?>"><div id="elh_m_jp_pegawai_jjm" class="m_jp_pegawai_jjm"><div class="ew-table-header-caption"><?php echo $m_jp_pegawai_list->jjm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jjm" class="<?php echo $m_jp_pegawai_list->jjm->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $m_jp_pegawai_list->SortUrl($m_jp_pegawai_list->jjm) ?>', 1);"><div id="elh_m_jp_pegawai_jjm" class="m_jp_pegawai_jjm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $m_jp_pegawai_list->jjm->caption() ?></span><span class="ew-table-header-sort"><?php if ($m_jp_pegawai_list->jjm->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($m_jp_pegawai_list->jjm->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$m_jp_pegawai_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($m_jp_pegawai_list->ExportAll && $m_jp_pegawai_list->isExport()) {
	$m_jp_pegawai_list->StopRecord = $m_jp_pegawai_list->TotalRecords;
} else {

	// Set the last record to display
	if ($m_jp_pegawai_list->TotalRecords > $m_jp_pegawai_list->StartRecord + $m_jp_pegawai_list->DisplayRecords - 1)
		$m_jp_pegawai_list->StopRecord = $m_jp_pegawai_list->StartRecord + $m_jp_pegawai_list->DisplayRecords - 1;
	else
		$m_jp_pegawai_list->StopRecord = $m_jp_pegawai_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($m_jp_pegawai->isConfirm() || $m_jp_pegawai_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($m_jp_pegawai_list->FormKeyCountName) && ($m_jp_pegawai_list->isGridAdd() || $m_jp_pegawai_list->isGridEdit() || $m_jp_pegawai->isConfirm())) {
		$m_jp_pegawai_list->KeyCount = $CurrentForm->getValue($m_jp_pegawai_list->FormKeyCountName);
		$m_jp_pegawai_list->StopRecord = $m_jp_pegawai_list->StartRecord + $m_jp_pegawai_list->KeyCount - 1;
	}
}
$m_jp_pegawai_list->RecordCount = $m_jp_pegawai_list->StartRecord - 1;
if ($m_jp_pegawai_list->Recordset && !$m_jp_pegawai_list->Recordset->EOF) {
	$m_jp_pegawai_list->Recordset->moveFirst();
	$selectLimit = $m_jp_pegawai_list->UseSelectLimit;
	if (!$selectLimit && $m_jp_pegawai_list->StartRecord > 1)
		$m_jp_pegawai_list->Recordset->move($m_jp_pegawai_list->StartRecord - 1);
} elseif (!$m_jp_pegawai->AllowAddDeleteRow && $m_jp_pegawai_list->StopRecord == 0) {
	$m_jp_pegawai_list->StopRecord = $m_jp_pegawai->GridAddRowCount;
}

// Initialize aggregate
$m_jp_pegawai->RowType = ROWTYPE_AGGREGATEINIT;
$m_jp_pegawai->resetAttributes();
$m_jp_pegawai_list->renderRow();
if ($m_jp_pegawai_list->isGridEdit())
	$m_jp_pegawai_list->RowIndex = 0;
while ($m_jp_pegawai_list->RecordCount < $m_jp_pegawai_list->StopRecord) {
	$m_jp_pegawai_list->RecordCount++;
	if ($m_jp_pegawai_list->RecordCount >= $m_jp_pegawai_list->StartRecord) {
		$m_jp_pegawai_list->RowCount++;
		if ($m_jp_pegawai_list->isGridAdd() || $m_jp_pegawai_list->isGridEdit() || $m_jp_pegawai->isConfirm()) {
			$m_jp_pegawai_list->RowIndex++;
			$CurrentForm->Index = $m_jp_pegawai_list->RowIndex;
			if ($CurrentForm->hasValue($m_jp_pegawai_list->FormActionName) && ($m_jp_pegawai->isConfirm() || $m_jp_pegawai_list->EventCancelled))
				$m_jp_pegawai_list->RowAction = strval($CurrentForm->getValue($m_jp_pegawai_list->FormActionName));
			elseif ($m_jp_pegawai_list->isGridAdd())
				$m_jp_pegawai_list->RowAction = "insert";
			else
				$m_jp_pegawai_list->RowAction = "";
		}

		// Set up key count
		$m_jp_pegawai_list->KeyCount = $m_jp_pegawai_list->RowIndex;

		// Init row class and style
		$m_jp_pegawai->resetAttributes();
		$m_jp_pegawai->CssClass = "";
		if ($m_jp_pegawai_list->isGridAdd()) {
			$m_jp_pegawai_list->loadRowValues(); // Load default values
		} else {
			$m_jp_pegawai_list->loadRowValues($m_jp_pegawai_list->Recordset); // Load row values
		}
		$m_jp_pegawai->RowType = ROWTYPE_VIEW; // Render view
		if ($m_jp_pegawai_list->isGridEdit()) { // Grid edit
			if ($m_jp_pegawai->EventCancelled)
				$m_jp_pegawai_list->restoreCurrentRowFormValues($m_jp_pegawai_list->RowIndex); // Restore form values
			if ($m_jp_pegawai_list->RowAction == "insert")
				$m_jp_pegawai->RowType = ROWTYPE_ADD; // Render add
			else
				$m_jp_pegawai->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($m_jp_pegawai_list->isGridEdit() && ($m_jp_pegawai->RowType == ROWTYPE_EDIT || $m_jp_pegawai->RowType == ROWTYPE_ADD) && $m_jp_pegawai->EventCancelled) // Update failed
			$m_jp_pegawai_list->restoreCurrentRowFormValues($m_jp_pegawai_list->RowIndex); // Restore form values
		if ($m_jp_pegawai->RowType == ROWTYPE_EDIT) // Edit row
			$m_jp_pegawai_list->EditRowCount++;

		// Set up row id / data-rowindex
		$m_jp_pegawai->RowAttrs->merge(["data-rowindex" => $m_jp_pegawai_list->RowCount, "id" => "r" . $m_jp_pegawai_list->RowCount . "_m_jp_pegawai", "data-rowtype" => $m_jp_pegawai->RowType]);

		// Render row
		$m_jp_pegawai_list->renderRow();

		// Render list options
		$m_jp_pegawai_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($m_jp_pegawai_list->RowAction != "delete" && $m_jp_pegawai_list->RowAction != "insertdelete" && !($m_jp_pegawai_list->RowAction == "insert" && $m_jp_pegawai->isConfirm() && $m_jp_pegawai_list->emptyRow())) {
?>
	<tr <?php echo $m_jp_pegawai->rowAttributes() ?>>
<?php

// Render list options (body, left)
$m_jp_pegawai_list->ListOptions->render("body", "left", $m_jp_pegawai_list->RowCount);
?>
	<?php if ($m_jp_pegawai_list->nip->Visible) { // nip ?>
		<td data-name="nip" <?php echo $m_jp_pegawai_list->nip->cellAttributes() ?>>
<?php if ($m_jp_pegawai->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $m_jp_pegawai_list->RowCount ?>_m_jp_pegawai_nip" class="form-group">
<input type="text" data-table="m_jp_pegawai" data-field="x_nip" name="x<?php echo $m_jp_pegawai_list->RowIndex ?>_nip" id="x<?php echo $m_jp_pegawai_list->RowIndex ?>_nip" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($m_jp_pegawai_list->nip->getPlaceHolder()) ?>" value="<?php echo $m_jp_pegawai_list->nip->EditValue ?>"<?php echo $m_jp_pegawai_list->nip->editAttributes() ?>>
</span>
<input type="hidden" data-table="m_jp_pegawai" data-field="x_nip" name="o<?php echo $m_jp_pegawai_list->RowIndex ?>_nip" id="o<?php echo $m_jp_pegawai_list->RowIndex ?>_nip" value="<?php echo HtmlEncode($m_jp_pegawai_list->nip->OldValue) ?>">
<?php } ?>
<?php if ($m_jp_pegawai->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $m_jp_pegawai_list->RowCount ?>_m_jp_pegawai_nip" class="form-group">
<span<?php echo $m_jp_pegawai_list->nip->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($m_jp_pegawai_list->nip->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="m_jp_pegawai" data-field="x_nip" name="x<?php echo $m_jp_pegawai_list->RowIndex ?>_nip" id="x<?php echo $m_jp_pegawai_list->RowIndex ?>_nip" value="<?php echo HtmlEncode($m_jp_pegawai_list->nip->CurrentValue) ?>">
<?php } ?>
<?php if ($m_jp_pegawai->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $m_jp_pegawai_list->RowCount ?>_m_jp_pegawai_nip">
<span<?php echo $m_jp_pegawai_list->nip->viewAttributes() ?>><?php echo $m_jp_pegawai_list->nip->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($m_jp_pegawai->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="m_jp_pegawai" data-field="x_id" name="x<?php echo $m_jp_pegawai_list->RowIndex ?>_id" id="x<?php echo $m_jp_pegawai_list->RowIndex ?>_id" value="<?php echo HtmlEncode($m_jp_pegawai_list->id->CurrentValue) ?>">
<input type="hidden" data-table="m_jp_pegawai" data-field="x_id" name="o<?php echo $m_jp_pegawai_list->RowIndex ?>_id" id="o<?php echo $m_jp_pegawai_list->RowIndex ?>_id" value="<?php echo HtmlEncode($m_jp_pegawai_list->id->OldValue) ?>">
<?php } ?>
<?php if ($m_jp_pegawai->RowType == ROWTYPE_EDIT || $m_jp_pegawai->CurrentMode == "edit") { ?>
<input type="hidden" data-table="m_jp_pegawai" data-field="x_id" name="x<?php echo $m_jp_pegawai_list->RowIndex ?>_id" id="x<?php echo $m_jp_pegawai_list->RowIndex ?>_id" value="<?php echo HtmlEncode($m_jp_pegawai_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($m_jp_pegawai_list->nama->Visible) { // nama ?>
		<td data-name="nama" <?php echo $m_jp_pegawai_list->nama->cellAttributes() ?>>
<?php if ($m_jp_pegawai->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $m_jp_pegawai_list->RowCount ?>_m_jp_pegawai_nama" class="form-group">
<input type="text" data-table="m_jp_pegawai" data-field="x_nama" name="x<?php echo $m_jp_pegawai_list->RowIndex ?>_nama" id="x<?php echo $m_jp_pegawai_list->RowIndex ?>_nama" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($m_jp_pegawai_list->nama->getPlaceHolder()) ?>" value="<?php echo $m_jp_pegawai_list->nama->EditValue ?>"<?php echo $m_jp_pegawai_list->nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="m_jp_pegawai" data-field="x_nama" name="o<?php echo $m_jp_pegawai_list->RowIndex ?>_nama" id="o<?php echo $m_jp_pegawai_list->RowIndex ?>_nama" value="<?php echo HtmlEncode($m_jp_pegawai_list->nama->OldValue) ?>">
<?php } ?>
<?php if ($m_jp_pegawai->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $m_jp_pegawai_list->RowCount ?>_m_jp_pegawai_nama" class="form-group">
<span<?php echo $m_jp_pegawai_list->nama->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($m_jp_pegawai_list->nama->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="m_jp_pegawai" data-field="x_nama" name="x<?php echo $m_jp_pegawai_list->RowIndex ?>_nama" id="x<?php echo $m_jp_pegawai_list->RowIndex ?>_nama" value="<?php echo HtmlEncode($m_jp_pegawai_list->nama->CurrentValue) ?>">
<?php } ?>
<?php if ($m_jp_pegawai->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $m_jp_pegawai_list->RowCount ?>_m_jp_pegawai_nama">
<span<?php echo $m_jp_pegawai_list->nama->viewAttributes() ?>><?php echo $m_jp_pegawai_list->nama->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($m_jp_pegawai_list->kehadiran->Visible) { // kehadiran ?>
		<td data-name="kehadiran" <?php echo $m_jp_pegawai_list->kehadiran->cellAttributes() ?>>
<?php if ($m_jp_pegawai->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $m_jp_pegawai_list->RowCount ?>_m_jp_pegawai_kehadiran" class="form-group">
<input type="text" data-table="m_jp_pegawai" data-field="x_kehadiran" name="x<?php echo $m_jp_pegawai_list->RowIndex ?>_kehadiran" id="x<?php echo $m_jp_pegawai_list->RowIndex ?>_kehadiran" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($m_jp_pegawai_list->kehadiran->getPlaceHolder()) ?>" value="<?php echo $m_jp_pegawai_list->kehadiran->EditValue ?>"<?php echo $m_jp_pegawai_list->kehadiran->editAttributes() ?>>
</span>
<input type="hidden" data-table="m_jp_pegawai" data-field="x_kehadiran" name="o<?php echo $m_jp_pegawai_list->RowIndex ?>_kehadiran" id="o<?php echo $m_jp_pegawai_list->RowIndex ?>_kehadiran" value="<?php echo HtmlEncode($m_jp_pegawai_list->kehadiran->OldValue) ?>">
<?php } ?>
<?php if ($m_jp_pegawai->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $m_jp_pegawai_list->RowCount ?>_m_jp_pegawai_kehadiran" class="form-group">
<input type="text" data-table="m_jp_pegawai" data-field="x_kehadiran" name="x<?php echo $m_jp_pegawai_list->RowIndex ?>_kehadiran" id="x<?php echo $m_jp_pegawai_list->RowIndex ?>_kehadiran" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($m_jp_pegawai_list->kehadiran->getPlaceHolder()) ?>" value="<?php echo $m_jp_pegawai_list->kehadiran->EditValue ?>"<?php echo $m_jp_pegawai_list->kehadiran->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($m_jp_pegawai->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $m_jp_pegawai_list->RowCount ?>_m_jp_pegawai_kehadiran">
<span<?php echo $m_jp_pegawai_list->kehadiran->viewAttributes() ?>><?php echo $m_jp_pegawai_list->kehadiran->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($m_jp_pegawai_list->jjm->Visible) { // jjm ?>
		<td data-name="jjm" <?php echo $m_jp_pegawai_list->jjm->cellAttributes() ?>>
<?php if ($m_jp_pegawai->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $m_jp_pegawai_list->RowCount ?>_m_jp_pegawai_jjm" class="form-group">
<input type="text" data-table="m_jp_pegawai" data-field="x_jjm" name="x<?php echo $m_jp_pegawai_list->RowIndex ?>_jjm" id="x<?php echo $m_jp_pegawai_list->RowIndex ?>_jjm" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($m_jp_pegawai_list->jjm->getPlaceHolder()) ?>" value="<?php echo $m_jp_pegawai_list->jjm->EditValue ?>"<?php echo $m_jp_pegawai_list->jjm->editAttributes() ?>>
</span>
<input type="hidden" data-table="m_jp_pegawai" data-field="x_jjm" name="o<?php echo $m_jp_pegawai_list->RowIndex ?>_jjm" id="o<?php echo $m_jp_pegawai_list->RowIndex ?>_jjm" value="<?php echo HtmlEncode($m_jp_pegawai_list->jjm->OldValue) ?>">
<?php } ?>
<?php if ($m_jp_pegawai->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $m_jp_pegawai_list->RowCount ?>_m_jp_pegawai_jjm" class="form-group">
<input type="text" data-table="m_jp_pegawai" data-field="x_jjm" name="x<?php echo $m_jp_pegawai_list->RowIndex ?>_jjm" id="x<?php echo $m_jp_pegawai_list->RowIndex ?>_jjm" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($m_jp_pegawai_list->jjm->getPlaceHolder()) ?>" value="<?php echo $m_jp_pegawai_list->jjm->EditValue ?>"<?php echo $m_jp_pegawai_list->jjm->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($m_jp_pegawai->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $m_jp_pegawai_list->RowCount ?>_m_jp_pegawai_jjm">
<span<?php echo $m_jp_pegawai_list->jjm->viewAttributes() ?>><?php echo $m_jp_pegawai_list->jjm->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$m_jp_pegawai_list->ListOptions->render("body", "right", $m_jp_pegawai_list->RowCount);
?>
	</tr>
<?php if ($m_jp_pegawai->RowType == ROWTYPE_ADD || $m_jp_pegawai->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fm_jp_pegawailist", "load"], function() {
	fm_jp_pegawailist.updateLists(<?php echo $m_jp_pegawai_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$m_jp_pegawai_list->isGridAdd())
		if (!$m_jp_pegawai_list->Recordset->EOF)
			$m_jp_pegawai_list->Recordset->moveNext();
}
?>
<?php
	if ($m_jp_pegawai_list->isGridAdd() || $m_jp_pegawai_list->isGridEdit()) {
		$m_jp_pegawai_list->RowIndex = '$rowindex$';
		$m_jp_pegawai_list->loadRowValues();

		// Set row properties
		$m_jp_pegawai->resetAttributes();
		$m_jp_pegawai->RowAttrs->merge(["data-rowindex" => $m_jp_pegawai_list->RowIndex, "id" => "r0_m_jp_pegawai", "data-rowtype" => ROWTYPE_ADD]);
		$m_jp_pegawai->RowAttrs->appendClass("ew-template");
		$m_jp_pegawai->RowType = ROWTYPE_ADD;

		// Render row
		$m_jp_pegawai_list->renderRow();

		// Render list options
		$m_jp_pegawai_list->renderListOptions();
		$m_jp_pegawai_list->StartRowCount = 0;
?>
	<tr <?php echo $m_jp_pegawai->rowAttributes() ?>>
<?php

// Render list options (body, left)
$m_jp_pegawai_list->ListOptions->render("body", "left", $m_jp_pegawai_list->RowIndex);
?>
	<?php if ($m_jp_pegawai_list->nip->Visible) { // nip ?>
		<td data-name="nip">
<span id="el$rowindex$_m_jp_pegawai_nip" class="form-group m_jp_pegawai_nip">
<input type="text" data-table="m_jp_pegawai" data-field="x_nip" name="x<?php echo $m_jp_pegawai_list->RowIndex ?>_nip" id="x<?php echo $m_jp_pegawai_list->RowIndex ?>_nip" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($m_jp_pegawai_list->nip->getPlaceHolder()) ?>" value="<?php echo $m_jp_pegawai_list->nip->EditValue ?>"<?php echo $m_jp_pegawai_list->nip->editAttributes() ?>>
</span>
<input type="hidden" data-table="m_jp_pegawai" data-field="x_nip" name="o<?php echo $m_jp_pegawai_list->RowIndex ?>_nip" id="o<?php echo $m_jp_pegawai_list->RowIndex ?>_nip" value="<?php echo HtmlEncode($m_jp_pegawai_list->nip->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($m_jp_pegawai_list->nama->Visible) { // nama ?>
		<td data-name="nama">
<span id="el$rowindex$_m_jp_pegawai_nama" class="form-group m_jp_pegawai_nama">
<input type="text" data-table="m_jp_pegawai" data-field="x_nama" name="x<?php echo $m_jp_pegawai_list->RowIndex ?>_nama" id="x<?php echo $m_jp_pegawai_list->RowIndex ?>_nama" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($m_jp_pegawai_list->nama->getPlaceHolder()) ?>" value="<?php echo $m_jp_pegawai_list->nama->EditValue ?>"<?php echo $m_jp_pegawai_list->nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="m_jp_pegawai" data-field="x_nama" name="o<?php echo $m_jp_pegawai_list->RowIndex ?>_nama" id="o<?php echo $m_jp_pegawai_list->RowIndex ?>_nama" value="<?php echo HtmlEncode($m_jp_pegawai_list->nama->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($m_jp_pegawai_list->kehadiran->Visible) { // kehadiran ?>
		<td data-name="kehadiran">
<span id="el$rowindex$_m_jp_pegawai_kehadiran" class="form-group m_jp_pegawai_kehadiran">
<input type="text" data-table="m_jp_pegawai" data-field="x_kehadiran" name="x<?php echo $m_jp_pegawai_list->RowIndex ?>_kehadiran" id="x<?php echo $m_jp_pegawai_list->RowIndex ?>_kehadiran" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($m_jp_pegawai_list->kehadiran->getPlaceHolder()) ?>" value="<?php echo $m_jp_pegawai_list->kehadiran->EditValue ?>"<?php echo $m_jp_pegawai_list->kehadiran->editAttributes() ?>>
</span>
<input type="hidden" data-table="m_jp_pegawai" data-field="x_kehadiran" name="o<?php echo $m_jp_pegawai_list->RowIndex ?>_kehadiran" id="o<?php echo $m_jp_pegawai_list->RowIndex ?>_kehadiran" value="<?php echo HtmlEncode($m_jp_pegawai_list->kehadiran->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($m_jp_pegawai_list->jjm->Visible) { // jjm ?>
		<td data-name="jjm">
<span id="el$rowindex$_m_jp_pegawai_jjm" class="form-group m_jp_pegawai_jjm">
<input type="text" data-table="m_jp_pegawai" data-field="x_jjm" name="x<?php echo $m_jp_pegawai_list->RowIndex ?>_jjm" id="x<?php echo $m_jp_pegawai_list->RowIndex ?>_jjm" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($m_jp_pegawai_list->jjm->getPlaceHolder()) ?>" value="<?php echo $m_jp_pegawai_list->jjm->EditValue ?>"<?php echo $m_jp_pegawai_list->jjm->editAttributes() ?>>
</span>
<input type="hidden" data-table="m_jp_pegawai" data-field="x_jjm" name="o<?php echo $m_jp_pegawai_list->RowIndex ?>_jjm" id="o<?php echo $m_jp_pegawai_list->RowIndex ?>_jjm" value="<?php echo HtmlEncode($m_jp_pegawai_list->jjm->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$m_jp_pegawai_list->ListOptions->render("body", "right", $m_jp_pegawai_list->RowIndex);
?>
<script>
loadjs.ready(["fm_jp_pegawailist", "load"], function() {
	fm_jp_pegawailist.updateLists(<?php echo $m_jp_pegawai_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($m_jp_pegawai_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $m_jp_pegawai_list->FormKeyCountName ?>" id="<?php echo $m_jp_pegawai_list->FormKeyCountName ?>" value="<?php echo $m_jp_pegawai_list->KeyCount ?>">
<?php echo $m_jp_pegawai_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$m_jp_pegawai->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($m_jp_pegawai_list->Recordset)
	$m_jp_pegawai_list->Recordset->Close();
?>
<?php if (!$m_jp_pegawai_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$m_jp_pegawai_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $m_jp_pegawai_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $m_jp_pegawai_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($m_jp_pegawai_list->TotalRecords == 0 && !$m_jp_pegawai->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $m_jp_pegawai_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$m_jp_pegawai_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$m_jp_pegawai_list->isExport()) { ?>
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
$m_jp_pegawai_list->terminate();
?>