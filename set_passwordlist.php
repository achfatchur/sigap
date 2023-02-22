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
$set_password_list = new set_password_list();

// Run the page
$set_password_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$set_password_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$set_password_list->isExport()) { ?>
<script>
var fset_passwordlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fset_passwordlist = currentForm = new ew.Form("fset_passwordlist", "list");
	fset_passwordlist.formKeyCountName = '<?php echo $set_password_list->FormKeyCountName ?>';

	// Validate form
	fset_passwordlist.validate = function() {
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
			<?php if ($set_password_list->nip->Required) { ?>
				elm = this.getElements("x" + infix + "_nip");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $set_password_list->nip->caption(), $set_password_list->nip->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($set_password_list->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $set_password_list->nama->caption(), $set_password_list->nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($set_password_list->password->Required) { ?>
				elm = this.getElements("x" + infix + "_password");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $set_password_list->password->caption(), $set_password_list->password->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fset_passwordlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fset_passwordlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fset_passwordlist");
});
var fset_passwordlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fset_passwordlistsrch = currentSearchForm = new ew.Form("fset_passwordlistsrch");

	// Dynamic selection lists
	// Filters

	fset_passwordlistsrch.filterList = <?php echo $set_password_list->getFilterList() ?>;
	loadjs.done("fset_passwordlistsrch");
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
<?php if (!$set_password_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($set_password_list->TotalRecords > 0 && $set_password_list->ExportOptions->visible()) { ?>
<?php $set_password_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($set_password_list->ImportOptions->visible()) { ?>
<?php $set_password_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($set_password_list->SearchOptions->visible()) { ?>
<?php $set_password_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($set_password_list->FilterOptions->visible()) { ?>
<?php $set_password_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$set_password_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$set_password_list->isExport() && !$set_password->CurrentAction) { ?>
<form name="fset_passwordlistsrch" id="fset_passwordlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fset_passwordlistsrch-search-panel" class="<?php echo $set_password_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="set_password">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $set_password_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($set_password_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($set_password_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $set_password_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($set_password_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($set_password_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($set_password_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($set_password_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $set_password_list->showPageHeader(); ?>
<?php
$set_password_list->showMessage();
?>
<?php if ($set_password_list->TotalRecords > 0 || $set_password->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($set_password_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> set_password">
<?php if (!$set_password_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$set_password_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $set_password_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $set_password_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fset_passwordlist" id="fset_passwordlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="set_password">
<div id="gmp_set_password" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($set_password_list->TotalRecords > 0 || $set_password_list->isGridEdit()) { ?>
<table id="tbl_set_passwordlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$set_password->RowType = ROWTYPE_HEADER;

// Render list options
$set_password_list->renderListOptions();

// Render list options (header, left)
$set_password_list->ListOptions->render("header", "left");
?>
<?php if ($set_password_list->nip->Visible) { // nip ?>
	<?php if ($set_password_list->SortUrl($set_password_list->nip) == "") { ?>
		<th data-name="nip" class="<?php echo $set_password_list->nip->headerCellClass() ?>"><div id="elh_set_password_nip" class="set_password_nip"><div class="ew-table-header-caption"><?php echo $set_password_list->nip->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nip" class="<?php echo $set_password_list->nip->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $set_password_list->SortUrl($set_password_list->nip) ?>', 1);"><div id="elh_set_password_nip" class="set_password_nip">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $set_password_list->nip->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($set_password_list->nip->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($set_password_list->nip->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($set_password_list->nama->Visible) { // nama ?>
	<?php if ($set_password_list->SortUrl($set_password_list->nama) == "") { ?>
		<th data-name="nama" class="<?php echo $set_password_list->nama->headerCellClass() ?>"><div id="elh_set_password_nama" class="set_password_nama"><div class="ew-table-header-caption"><?php echo $set_password_list->nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama" class="<?php echo $set_password_list->nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $set_password_list->SortUrl($set_password_list->nama) ?>', 1);"><div id="elh_set_password_nama" class="set_password_nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $set_password_list->nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($set_password_list->nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($set_password_list->nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($set_password_list->password->Visible) { // password ?>
	<?php if ($set_password_list->SortUrl($set_password_list->password) == "") { ?>
		<th data-name="password" class="<?php echo $set_password_list->password->headerCellClass() ?>"><div id="elh_set_password_password" class="set_password_password"><div class="ew-table-header-caption"><?php echo $set_password_list->password->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="password" class="<?php echo $set_password_list->password->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $set_password_list->SortUrl($set_password_list->password) ?>', 1);"><div id="elh_set_password_password" class="set_password_password">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $set_password_list->password->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($set_password_list->password->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($set_password_list->password->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$set_password_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($set_password_list->ExportAll && $set_password_list->isExport()) {
	$set_password_list->StopRecord = $set_password_list->TotalRecords;
} else {

	// Set the last record to display
	if ($set_password_list->TotalRecords > $set_password_list->StartRecord + $set_password_list->DisplayRecords - 1)
		$set_password_list->StopRecord = $set_password_list->StartRecord + $set_password_list->DisplayRecords - 1;
	else
		$set_password_list->StopRecord = $set_password_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($set_password->isConfirm() || $set_password_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($set_password_list->FormKeyCountName) && ($set_password_list->isGridAdd() || $set_password_list->isGridEdit() || $set_password->isConfirm())) {
		$set_password_list->KeyCount = $CurrentForm->getValue($set_password_list->FormKeyCountName);
		$set_password_list->StopRecord = $set_password_list->StartRecord + $set_password_list->KeyCount - 1;
	}
}
$set_password_list->RecordCount = $set_password_list->StartRecord - 1;
if ($set_password_list->Recordset && !$set_password_list->Recordset->EOF) {
	$set_password_list->Recordset->moveFirst();
	$selectLimit = $set_password_list->UseSelectLimit;
	if (!$selectLimit && $set_password_list->StartRecord > 1)
		$set_password_list->Recordset->move($set_password_list->StartRecord - 1);
} elseif (!$set_password->AllowAddDeleteRow && $set_password_list->StopRecord == 0) {
	$set_password_list->StopRecord = $set_password->GridAddRowCount;
}

// Initialize aggregate
$set_password->RowType = ROWTYPE_AGGREGATEINIT;
$set_password->resetAttributes();
$set_password_list->renderRow();
if ($set_password_list->isGridEdit())
	$set_password_list->RowIndex = 0;
while ($set_password_list->RecordCount < $set_password_list->StopRecord) {
	$set_password_list->RecordCount++;
	if ($set_password_list->RecordCount >= $set_password_list->StartRecord) {
		$set_password_list->RowCount++;
		if ($set_password_list->isGridAdd() || $set_password_list->isGridEdit() || $set_password->isConfirm()) {
			$set_password_list->RowIndex++;
			$CurrentForm->Index = $set_password_list->RowIndex;
			if ($CurrentForm->hasValue($set_password_list->FormActionName) && ($set_password->isConfirm() || $set_password_list->EventCancelled))
				$set_password_list->RowAction = strval($CurrentForm->getValue($set_password_list->FormActionName));
			elseif ($set_password_list->isGridAdd())
				$set_password_list->RowAction = "insert";
			else
				$set_password_list->RowAction = "";
		}

		// Set up key count
		$set_password_list->KeyCount = $set_password_list->RowIndex;

		// Init row class and style
		$set_password->resetAttributes();
		$set_password->CssClass = "";
		if ($set_password_list->isGridAdd()) {
			$set_password_list->loadRowValues(); // Load default values
		} else {
			$set_password_list->loadRowValues($set_password_list->Recordset); // Load row values
		}
		$set_password->RowType = ROWTYPE_VIEW; // Render view
		if ($set_password_list->isGridEdit()) { // Grid edit
			if ($set_password->EventCancelled)
				$set_password_list->restoreCurrentRowFormValues($set_password_list->RowIndex); // Restore form values
			if ($set_password_list->RowAction == "insert")
				$set_password->RowType = ROWTYPE_ADD; // Render add
			else
				$set_password->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($set_password_list->isGridEdit() && ($set_password->RowType == ROWTYPE_EDIT || $set_password->RowType == ROWTYPE_ADD) && $set_password->EventCancelled) // Update failed
			$set_password_list->restoreCurrentRowFormValues($set_password_list->RowIndex); // Restore form values
		if ($set_password->RowType == ROWTYPE_EDIT) // Edit row
			$set_password_list->EditRowCount++;

		// Set up row id / data-rowindex
		$set_password->RowAttrs->merge(["data-rowindex" => $set_password_list->RowCount, "id" => "r" . $set_password_list->RowCount . "_set_password", "data-rowtype" => $set_password->RowType]);

		// Render row
		$set_password_list->renderRow();

		// Render list options
		$set_password_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($set_password_list->RowAction != "delete" && $set_password_list->RowAction != "insertdelete" && !($set_password_list->RowAction == "insert" && $set_password->isConfirm() && $set_password_list->emptyRow())) {
?>
	<tr <?php echo $set_password->rowAttributes() ?>>
<?php

// Render list options (body, left)
$set_password_list->ListOptions->render("body", "left", $set_password_list->RowCount);
?>
	<?php if ($set_password_list->nip->Visible) { // nip ?>
		<td data-name="nip" <?php echo $set_password_list->nip->cellAttributes() ?>>
<?php if ($set_password->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $set_password_list->RowCount ?>_set_password_nip" class="form-group">
<input type="text" data-table="set_password" data-field="x_nip" name="x<?php echo $set_password_list->RowIndex ?>_nip" id="x<?php echo $set_password_list->RowIndex ?>_nip" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($set_password_list->nip->getPlaceHolder()) ?>" value="<?php echo $set_password_list->nip->EditValue ?>"<?php echo $set_password_list->nip->editAttributes() ?>>
</span>
<input type="hidden" data-table="set_password" data-field="x_nip" name="o<?php echo $set_password_list->RowIndex ?>_nip" id="o<?php echo $set_password_list->RowIndex ?>_nip" value="<?php echo HtmlEncode($set_password_list->nip->OldValue) ?>">
<?php } ?>
<?php if ($set_password->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $set_password_list->RowCount ?>_set_password_nip" class="form-group">
<input type="text" data-table="set_password" data-field="x_nip" name="x<?php echo $set_password_list->RowIndex ?>_nip" id="x<?php echo $set_password_list->RowIndex ?>_nip" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($set_password_list->nip->getPlaceHolder()) ?>" value="<?php echo $set_password_list->nip->EditValue ?>"<?php echo $set_password_list->nip->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($set_password->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $set_password_list->RowCount ?>_set_password_nip">
<span<?php echo $set_password_list->nip->viewAttributes() ?>><?php echo $set_password_list->nip->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($set_password->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="set_password" data-field="x_id" name="x<?php echo $set_password_list->RowIndex ?>_id" id="x<?php echo $set_password_list->RowIndex ?>_id" value="<?php echo HtmlEncode($set_password_list->id->CurrentValue) ?>">
<input type="hidden" data-table="set_password" data-field="x_id" name="o<?php echo $set_password_list->RowIndex ?>_id" id="o<?php echo $set_password_list->RowIndex ?>_id" value="<?php echo HtmlEncode($set_password_list->id->OldValue) ?>">
<?php } ?>
<?php if ($set_password->RowType == ROWTYPE_EDIT || $set_password->CurrentMode == "edit") { ?>
<input type="hidden" data-table="set_password" data-field="x_id" name="x<?php echo $set_password_list->RowIndex ?>_id" id="x<?php echo $set_password_list->RowIndex ?>_id" value="<?php echo HtmlEncode($set_password_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($set_password_list->nama->Visible) { // nama ?>
		<td data-name="nama" <?php echo $set_password_list->nama->cellAttributes() ?>>
<?php if ($set_password->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $set_password_list->RowCount ?>_set_password_nama" class="form-group">
<input type="text" data-table="set_password" data-field="x_nama" name="x<?php echo $set_password_list->RowIndex ?>_nama" id="x<?php echo $set_password_list->RowIndex ?>_nama" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($set_password_list->nama->getPlaceHolder()) ?>" value="<?php echo $set_password_list->nama->EditValue ?>"<?php echo $set_password_list->nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="set_password" data-field="x_nama" name="o<?php echo $set_password_list->RowIndex ?>_nama" id="o<?php echo $set_password_list->RowIndex ?>_nama" value="<?php echo HtmlEncode($set_password_list->nama->OldValue) ?>">
<?php } ?>
<?php if ($set_password->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $set_password_list->RowCount ?>_set_password_nama" class="form-group">
<input type="text" data-table="set_password" data-field="x_nama" name="x<?php echo $set_password_list->RowIndex ?>_nama" id="x<?php echo $set_password_list->RowIndex ?>_nama" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($set_password_list->nama->getPlaceHolder()) ?>" value="<?php echo $set_password_list->nama->EditValue ?>"<?php echo $set_password_list->nama->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($set_password->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $set_password_list->RowCount ?>_set_password_nama">
<span<?php echo $set_password_list->nama->viewAttributes() ?>><?php echo $set_password_list->nama->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($set_password_list->password->Visible) { // password ?>
		<td data-name="password" <?php echo $set_password_list->password->cellAttributes() ?>>
<?php if ($set_password->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $set_password_list->RowCount ?>_set_password_password" class="form-group">
<input type="text" data-table="set_password" data-field="x_password" name="x<?php echo $set_password_list->RowIndex ?>_password" id="x<?php echo $set_password_list->RowIndex ?>_password" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($set_password_list->password->getPlaceHolder()) ?>" value="<?php echo $set_password_list->password->EditValue ?>"<?php echo $set_password_list->password->editAttributes() ?>>
</span>
<input type="hidden" data-table="set_password" data-field="x_password" name="o<?php echo $set_password_list->RowIndex ?>_password" id="o<?php echo $set_password_list->RowIndex ?>_password" value="<?php echo HtmlEncode($set_password_list->password->OldValue) ?>">
<?php } ?>
<?php if ($set_password->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $set_password_list->RowCount ?>_set_password_password" class="form-group">
<input type="text" data-table="set_password" data-field="x_password" name="x<?php echo $set_password_list->RowIndex ?>_password" id="x<?php echo $set_password_list->RowIndex ?>_password" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($set_password_list->password->getPlaceHolder()) ?>" value="<?php echo $set_password_list->password->EditValue ?>"<?php echo $set_password_list->password->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($set_password->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $set_password_list->RowCount ?>_set_password_password">
<span<?php echo $set_password_list->password->viewAttributes() ?>><?php echo $set_password_list->password->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$set_password_list->ListOptions->render("body", "right", $set_password_list->RowCount);
?>
	</tr>
<?php if ($set_password->RowType == ROWTYPE_ADD || $set_password->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fset_passwordlist", "load"], function() {
	fset_passwordlist.updateLists(<?php echo $set_password_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$set_password_list->isGridAdd())
		if (!$set_password_list->Recordset->EOF)
			$set_password_list->Recordset->moveNext();
}
?>
<?php
	if ($set_password_list->isGridAdd() || $set_password_list->isGridEdit()) {
		$set_password_list->RowIndex = '$rowindex$';
		$set_password_list->loadRowValues();

		// Set row properties
		$set_password->resetAttributes();
		$set_password->RowAttrs->merge(["data-rowindex" => $set_password_list->RowIndex, "id" => "r0_set_password", "data-rowtype" => ROWTYPE_ADD]);
		$set_password->RowAttrs->appendClass("ew-template");
		$set_password->RowType = ROWTYPE_ADD;

		// Render row
		$set_password_list->renderRow();

		// Render list options
		$set_password_list->renderListOptions();
		$set_password_list->StartRowCount = 0;
?>
	<tr <?php echo $set_password->rowAttributes() ?>>
<?php

// Render list options (body, left)
$set_password_list->ListOptions->render("body", "left", $set_password_list->RowIndex);
?>
	<?php if ($set_password_list->nip->Visible) { // nip ?>
		<td data-name="nip">
<span id="el$rowindex$_set_password_nip" class="form-group set_password_nip">
<input type="text" data-table="set_password" data-field="x_nip" name="x<?php echo $set_password_list->RowIndex ?>_nip" id="x<?php echo $set_password_list->RowIndex ?>_nip" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($set_password_list->nip->getPlaceHolder()) ?>" value="<?php echo $set_password_list->nip->EditValue ?>"<?php echo $set_password_list->nip->editAttributes() ?>>
</span>
<input type="hidden" data-table="set_password" data-field="x_nip" name="o<?php echo $set_password_list->RowIndex ?>_nip" id="o<?php echo $set_password_list->RowIndex ?>_nip" value="<?php echo HtmlEncode($set_password_list->nip->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($set_password_list->nama->Visible) { // nama ?>
		<td data-name="nama">
<span id="el$rowindex$_set_password_nama" class="form-group set_password_nama">
<input type="text" data-table="set_password" data-field="x_nama" name="x<?php echo $set_password_list->RowIndex ?>_nama" id="x<?php echo $set_password_list->RowIndex ?>_nama" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($set_password_list->nama->getPlaceHolder()) ?>" value="<?php echo $set_password_list->nama->EditValue ?>"<?php echo $set_password_list->nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="set_password" data-field="x_nama" name="o<?php echo $set_password_list->RowIndex ?>_nama" id="o<?php echo $set_password_list->RowIndex ?>_nama" value="<?php echo HtmlEncode($set_password_list->nama->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($set_password_list->password->Visible) { // password ?>
		<td data-name="password">
<span id="el$rowindex$_set_password_password" class="form-group set_password_password">
<input type="text" data-table="set_password" data-field="x_password" name="x<?php echo $set_password_list->RowIndex ?>_password" id="x<?php echo $set_password_list->RowIndex ?>_password" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($set_password_list->password->getPlaceHolder()) ?>" value="<?php echo $set_password_list->password->EditValue ?>"<?php echo $set_password_list->password->editAttributes() ?>>
</span>
<input type="hidden" data-table="set_password" data-field="x_password" name="o<?php echo $set_password_list->RowIndex ?>_password" id="o<?php echo $set_password_list->RowIndex ?>_password" value="<?php echo HtmlEncode($set_password_list->password->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$set_password_list->ListOptions->render("body", "right", $set_password_list->RowIndex);
?>
<script>
loadjs.ready(["fset_passwordlist", "load"], function() {
	fset_passwordlist.updateLists(<?php echo $set_password_list->RowIndex ?>);
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
<?php if ($set_password_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $set_password_list->FormKeyCountName ?>" id="<?php echo $set_password_list->FormKeyCountName ?>" value="<?php echo $set_password_list->KeyCount ?>">
<?php echo $set_password_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$set_password->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($set_password_list->Recordset)
	$set_password_list->Recordset->Close();
?>
<?php if (!$set_password_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$set_password_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $set_password_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $set_password_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($set_password_list->TotalRecords == 0 && !$set_password->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $set_password_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$set_password_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$set_password_list->isExport()) { ?>
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
$set_password_list->terminate();
?>