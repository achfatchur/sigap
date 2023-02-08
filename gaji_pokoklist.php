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
$gaji_pokok_list = new gaji_pokok_list();

// Run the page
$gaji_pokok_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_pokok_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$gaji_pokok_list->isExport()) { ?>
<script>
var fgaji_pokoklist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fgaji_pokoklist = currentForm = new ew.Form("fgaji_pokoklist", "list");
	fgaji_pokoklist.formKeyCountName = '<?php echo $gaji_pokok_list->FormKeyCountName ?>';

	// Validate form
	fgaji_pokoklist.validate = function() {
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
			<?php if ($gaji_pokok_list->jenjang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_pokok_list->jenjang_id->caption(), $gaji_pokok_list->jenjang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($gaji_pokok_list->lama_kerja->Required) { ?>
				elm = this.getElements("x" + infix + "_lama_kerja");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_pokok_list->lama_kerja->caption(), $gaji_pokok_list->lama_kerja->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_lama_kerja");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_pokok_list->lama_kerja->errorMessage()) ?>");
			<?php if ($gaji_pokok_list->value->Required) { ?>
				elm = this.getElements("x" + infix + "_value");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_pokok_list->value->caption(), $gaji_pokok_list->value->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_pokok_list->value->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fgaji_pokoklist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fgaji_pokoklist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fgaji_pokoklist.lists["x_jenjang_id"] = <?php echo $gaji_pokok_list->jenjang_id->Lookup->toClientList($gaji_pokok_list) ?>;
	fgaji_pokoklist.lists["x_jenjang_id"].options = <?php echo JsonEncode($gaji_pokok_list->jenjang_id->lookupOptions()) ?>;
	loadjs.done("fgaji_pokoklist");
});
var fgaji_pokoklistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fgaji_pokoklistsrch = currentSearchForm = new ew.Form("fgaji_pokoklistsrch");

	// Validate function for search
	fgaji_pokoklistsrch.validate = function(fobj) {
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
	fgaji_pokoklistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fgaji_pokoklistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fgaji_pokoklistsrch.lists["x_jenjang_id"] = <?php echo $gaji_pokok_list->jenjang_id->Lookup->toClientList($gaji_pokok_list) ?>;
	fgaji_pokoklistsrch.lists["x_jenjang_id"].options = <?php echo JsonEncode($gaji_pokok_list->jenjang_id->lookupOptions()) ?>;

	// Filters
	fgaji_pokoklistsrch.filterList = <?php echo $gaji_pokok_list->getFilterList() ?>;
	loadjs.done("fgaji_pokoklistsrch");
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
<?php if (!$gaji_pokok_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($gaji_pokok_list->TotalRecords > 0 && $gaji_pokok_list->ExportOptions->visible()) { ?>
<?php $gaji_pokok_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_pokok_list->ImportOptions->visible()) { ?>
<?php $gaji_pokok_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_pokok_list->SearchOptions->visible()) { ?>
<?php $gaji_pokok_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($gaji_pokok_list->FilterOptions->visible()) { ?>
<?php $gaji_pokok_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$gaji_pokok_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$gaji_pokok_list->isExport() && !$gaji_pokok->CurrentAction) { ?>
<form name="fgaji_pokoklistsrch" id="fgaji_pokoklistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fgaji_pokoklistsrch-search-panel" class="<?php echo $gaji_pokok_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="gaji_pokok">
	<div class="ew-extended-search">
<?php

// Render search row
$gaji_pokok->RowType = ROWTYPE_SEARCH;
$gaji_pokok->resetAttributes();
$gaji_pokok_list->renderRow();
?>
<?php if ($gaji_pokok_list->jenjang_id->Visible) { // jenjang_id ?>
	<?php
		$gaji_pokok_list->SearchColumnCount++;
		if (($gaji_pokok_list->SearchColumnCount - 1) % $gaji_pokok_list->SearchFieldsPerRow == 0) {
			$gaji_pokok_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $gaji_pokok_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_jenjang_id" class="ew-cell form-group">
		<label for="x_jenjang_id" class="ew-search-caption ew-label"><?php echo $gaji_pokok_list->jenjang_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_jenjang_id" id="z_jenjang_id" value="=">
</span>
		<span id="el_gaji_pokok_jenjang_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jenjang_id"><?php echo EmptyValue(strval($gaji_pokok_list->jenjang_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $gaji_pokok_list->jenjang_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($gaji_pokok_list->jenjang_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($gaji_pokok_list->jenjang_id->ReadOnly || $gaji_pokok_list->jenjang_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jenjang_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $gaji_pokok_list->jenjang_id->Lookup->getParamTag($gaji_pokok_list, "p_x_jenjang_id") ?>
<input type="hidden" data-table="gaji_pokok" data-field="x_jenjang_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $gaji_pokok_list->jenjang_id->displayValueSeparatorAttribute() ?>" name="x_jenjang_id" id="x_jenjang_id" value="<?php echo $gaji_pokok_list->jenjang_id->AdvancedSearch->SearchValue ?>"<?php echo $gaji_pokok_list->jenjang_id->editAttributes() ?>>
</span>
	</div>
	<?php if ($gaji_pokok_list->SearchColumnCount % $gaji_pokok_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($gaji_pokok_list->SearchColumnCount % $gaji_pokok_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $gaji_pokok_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $gaji_pokok_list->showPageHeader(); ?>
<?php
$gaji_pokok_list->showMessage();
?>
<?php if ($gaji_pokok_list->TotalRecords > 0 || $gaji_pokok->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($gaji_pokok_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> gaji_pokok">
<?php if (!$gaji_pokok_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$gaji_pokok_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $gaji_pokok_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $gaji_pokok_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fgaji_pokoklist" id="fgaji_pokoklist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="gaji_pokok">
<div id="gmp_gaji_pokok" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($gaji_pokok_list->TotalRecords > 0 || $gaji_pokok_list->isAdd() || $gaji_pokok_list->isCopy() || $gaji_pokok_list->isGridEdit()) { ?>
<table id="tbl_gaji_pokoklist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$gaji_pokok->RowType = ROWTYPE_HEADER;

// Render list options
$gaji_pokok_list->renderListOptions();

// Render list options (header, left)
$gaji_pokok_list->ListOptions->render("header", "left");
?>
<?php if ($gaji_pokok_list->jenjang_id->Visible) { // jenjang_id ?>
	<?php if ($gaji_pokok_list->SortUrl($gaji_pokok_list->jenjang_id) == "") { ?>
		<th data-name="jenjang_id" class="<?php echo $gaji_pokok_list->jenjang_id->headerCellClass() ?>"><div id="elh_gaji_pokok_jenjang_id" class="gaji_pokok_jenjang_id"><div class="ew-table-header-caption"><?php echo $gaji_pokok_list->jenjang_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang_id" class="<?php echo $gaji_pokok_list->jenjang_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_pokok_list->SortUrl($gaji_pokok_list->jenjang_id) ?>', 1);"><div id="elh_gaji_pokok_jenjang_id" class="gaji_pokok_jenjang_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_pokok_list->jenjang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_pokok_list->jenjang_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_pokok_list->jenjang_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_pokok_list->lama_kerja->Visible) { // lama_kerja ?>
	<?php if ($gaji_pokok_list->SortUrl($gaji_pokok_list->lama_kerja) == "") { ?>
		<th data-name="lama_kerja" class="<?php echo $gaji_pokok_list->lama_kerja->headerCellClass() ?>"><div id="elh_gaji_pokok_lama_kerja" class="gaji_pokok_lama_kerja"><div class="ew-table-header-caption"><?php echo $gaji_pokok_list->lama_kerja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="lama_kerja" class="<?php echo $gaji_pokok_list->lama_kerja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_pokok_list->SortUrl($gaji_pokok_list->lama_kerja) ?>', 1);"><div id="elh_gaji_pokok_lama_kerja" class="gaji_pokok_lama_kerja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_pokok_list->lama_kerja->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_pokok_list->lama_kerja->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_pokok_list->lama_kerja->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_pokok_list->value->Visible) { // value ?>
	<?php if ($gaji_pokok_list->SortUrl($gaji_pokok_list->value) == "") { ?>
		<th data-name="value" class="<?php echo $gaji_pokok_list->value->headerCellClass() ?>"><div id="elh_gaji_pokok_value" class="gaji_pokok_value"><div class="ew-table-header-caption"><?php echo $gaji_pokok_list->value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value" class="<?php echo $gaji_pokok_list->value->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $gaji_pokok_list->SortUrl($gaji_pokok_list->value) ?>', 1);"><div id="elh_gaji_pokok_value" class="gaji_pokok_value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_pokok_list->value->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_pokok_list->value->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_pokok_list->value->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$gaji_pokok_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($gaji_pokok_list->isAdd() || $gaji_pokok_list->isCopy()) {
		$gaji_pokok_list->RowIndex = 0;
		$gaji_pokok_list->KeyCount = $gaji_pokok_list->RowIndex;
		if ($gaji_pokok_list->isCopy() && !$gaji_pokok_list->loadRow())
			$gaji_pokok->CurrentAction = "add";
		if ($gaji_pokok_list->isAdd())
			$gaji_pokok_list->loadRowValues();
		if ($gaji_pokok->EventCancelled) // Insert failed
			$gaji_pokok_list->restoreFormValues(); // Restore form values

		// Set row properties
		$gaji_pokok->resetAttributes();
		$gaji_pokok->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_gaji_pokok", "data-rowtype" => ROWTYPE_ADD]);
		$gaji_pokok->RowType = ROWTYPE_ADD;

		// Render row
		$gaji_pokok_list->renderRow();

		// Render list options
		$gaji_pokok_list->renderListOptions();
		$gaji_pokok_list->StartRowCount = 0;
?>
	<tr <?php echo $gaji_pokok->rowAttributes() ?>>
<?php

// Render list options (body, left)
$gaji_pokok_list->ListOptions->render("body", "left", $gaji_pokok_list->RowCount);
?>
	<?php if ($gaji_pokok_list->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id">
<span id="el<?php echo $gaji_pokok_list->RowCount ?>_gaji_pokok_jenjang_id" class="form-group gaji_pokok_jenjang_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $gaji_pokok_list->RowIndex ?>_jenjang_id"><?php echo EmptyValue(strval($gaji_pokok_list->jenjang_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $gaji_pokok_list->jenjang_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($gaji_pokok_list->jenjang_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($gaji_pokok_list->jenjang_id->ReadOnly || $gaji_pokok_list->jenjang_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $gaji_pokok_list->RowIndex ?>_jenjang_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $gaji_pokok_list->jenjang_id->Lookup->getParamTag($gaji_pokok_list, "p_x" . $gaji_pokok_list->RowIndex . "_jenjang_id") ?>
<input type="hidden" data-table="gaji_pokok" data-field="x_jenjang_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $gaji_pokok_list->jenjang_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $gaji_pokok_list->RowIndex ?>_jenjang_id" id="x<?php echo $gaji_pokok_list->RowIndex ?>_jenjang_id" value="<?php echo $gaji_pokok_list->jenjang_id->CurrentValue ?>"<?php echo $gaji_pokok_list->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_pokok" data-field="x_jenjang_id" name="o<?php echo $gaji_pokok_list->RowIndex ?>_jenjang_id" id="o<?php echo $gaji_pokok_list->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($gaji_pokok_list->jenjang_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_pokok_list->lama_kerja->Visible) { // lama_kerja ?>
		<td data-name="lama_kerja">
<span id="el<?php echo $gaji_pokok_list->RowCount ?>_gaji_pokok_lama_kerja" class="form-group gaji_pokok_lama_kerja">
<input type="text" data-table="gaji_pokok" data-field="x_lama_kerja" name="x<?php echo $gaji_pokok_list->RowIndex ?>_lama_kerja" id="x<?php echo $gaji_pokok_list->RowIndex ?>_lama_kerja" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_pokok_list->lama_kerja->getPlaceHolder()) ?>" value="<?php echo $gaji_pokok_list->lama_kerja->EditValue ?>"<?php echo $gaji_pokok_list->lama_kerja->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_pokok" data-field="x_lama_kerja" name="o<?php echo $gaji_pokok_list->RowIndex ?>_lama_kerja" id="o<?php echo $gaji_pokok_list->RowIndex ?>_lama_kerja" value="<?php echo HtmlEncode($gaji_pokok_list->lama_kerja->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_pokok_list->value->Visible) { // value ?>
		<td data-name="value">
<span id="el<?php echo $gaji_pokok_list->RowCount ?>_gaji_pokok_value" class="form-group gaji_pokok_value">
<input type="text" data-table="gaji_pokok" data-field="x_value" name="x<?php echo $gaji_pokok_list->RowIndex ?>_value" id="x<?php echo $gaji_pokok_list->RowIndex ?>_value" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_pokok_list->value->getPlaceHolder()) ?>" value="<?php echo $gaji_pokok_list->value->EditValue ?>"<?php echo $gaji_pokok_list->value->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_pokok" data-field="x_value" name="o<?php echo $gaji_pokok_list->RowIndex ?>_value" id="o<?php echo $gaji_pokok_list->RowIndex ?>_value" value="<?php echo HtmlEncode($gaji_pokok_list->value->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$gaji_pokok_list->ListOptions->render("body", "right", $gaji_pokok_list->RowCount);
?>
<script>
loadjs.ready(["fgaji_pokoklist", "load"], function() {
	fgaji_pokoklist.updateLists(<?php echo $gaji_pokok_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($gaji_pokok_list->ExportAll && $gaji_pokok_list->isExport()) {
	$gaji_pokok_list->StopRecord = $gaji_pokok_list->TotalRecords;
} else {

	// Set the last record to display
	if ($gaji_pokok_list->TotalRecords > $gaji_pokok_list->StartRecord + $gaji_pokok_list->DisplayRecords - 1)
		$gaji_pokok_list->StopRecord = $gaji_pokok_list->StartRecord + $gaji_pokok_list->DisplayRecords - 1;
	else
		$gaji_pokok_list->StopRecord = $gaji_pokok_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($gaji_pokok->isConfirm() || $gaji_pokok_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($gaji_pokok_list->FormKeyCountName) && ($gaji_pokok_list->isGridAdd() || $gaji_pokok_list->isGridEdit() || $gaji_pokok->isConfirm())) {
		$gaji_pokok_list->KeyCount = $CurrentForm->getValue($gaji_pokok_list->FormKeyCountName);
		$gaji_pokok_list->StopRecord = $gaji_pokok_list->StartRecord + $gaji_pokok_list->KeyCount - 1;
	}
}
$gaji_pokok_list->RecordCount = $gaji_pokok_list->StartRecord - 1;
if ($gaji_pokok_list->Recordset && !$gaji_pokok_list->Recordset->EOF) {
	$gaji_pokok_list->Recordset->moveFirst();
	$selectLimit = $gaji_pokok_list->UseSelectLimit;
	if (!$selectLimit && $gaji_pokok_list->StartRecord > 1)
		$gaji_pokok_list->Recordset->move($gaji_pokok_list->StartRecord - 1);
} elseif (!$gaji_pokok->AllowAddDeleteRow && $gaji_pokok_list->StopRecord == 0) {
	$gaji_pokok_list->StopRecord = $gaji_pokok->GridAddRowCount;
}

// Initialize aggregate
$gaji_pokok->RowType = ROWTYPE_AGGREGATEINIT;
$gaji_pokok->resetAttributes();
$gaji_pokok_list->renderRow();
while ($gaji_pokok_list->RecordCount < $gaji_pokok_list->StopRecord) {
	$gaji_pokok_list->RecordCount++;
	if ($gaji_pokok_list->RecordCount >= $gaji_pokok_list->StartRecord) {
		$gaji_pokok_list->RowCount++;

		// Set up key count
		$gaji_pokok_list->KeyCount = $gaji_pokok_list->RowIndex;

		// Init row class and style
		$gaji_pokok->resetAttributes();
		$gaji_pokok->CssClass = "";
		if ($gaji_pokok_list->isGridAdd()) {
			$gaji_pokok_list->loadRowValues(); // Load default values
		} else {
			$gaji_pokok_list->loadRowValues($gaji_pokok_list->Recordset); // Load row values
		}
		$gaji_pokok->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$gaji_pokok->RowAttrs->merge(["data-rowindex" => $gaji_pokok_list->RowCount, "id" => "r" . $gaji_pokok_list->RowCount . "_gaji_pokok", "data-rowtype" => $gaji_pokok->RowType]);

		// Render row
		$gaji_pokok_list->renderRow();

		// Render list options
		$gaji_pokok_list->renderListOptions();
?>
	<tr <?php echo $gaji_pokok->rowAttributes() ?>>
<?php

// Render list options (body, left)
$gaji_pokok_list->ListOptions->render("body", "left", $gaji_pokok_list->RowCount);
?>
	<?php if ($gaji_pokok_list->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id" <?php echo $gaji_pokok_list->jenjang_id->cellAttributes() ?>>
<span id="el<?php echo $gaji_pokok_list->RowCount ?>_gaji_pokok_jenjang_id">
<span<?php echo $gaji_pokok_list->jenjang_id->viewAttributes() ?>><?php echo $gaji_pokok_list->jenjang_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_pokok_list->lama_kerja->Visible) { // lama_kerja ?>
		<td data-name="lama_kerja" <?php echo $gaji_pokok_list->lama_kerja->cellAttributes() ?>>
<span id="el<?php echo $gaji_pokok_list->RowCount ?>_gaji_pokok_lama_kerja">
<span<?php echo $gaji_pokok_list->lama_kerja->viewAttributes() ?>><?php echo $gaji_pokok_list->lama_kerja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($gaji_pokok_list->value->Visible) { // value ?>
		<td data-name="value" <?php echo $gaji_pokok_list->value->cellAttributes() ?>>
<span id="el<?php echo $gaji_pokok_list->RowCount ?>_gaji_pokok_value">
<span<?php echo $gaji_pokok_list->value->viewAttributes() ?>><?php echo $gaji_pokok_list->value->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$gaji_pokok_list->ListOptions->render("body", "right", $gaji_pokok_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$gaji_pokok_list->isGridAdd())
		$gaji_pokok_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($gaji_pokok_list->isAdd() || $gaji_pokok_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $gaji_pokok_list->FormKeyCountName ?>" id="<?php echo $gaji_pokok_list->FormKeyCountName ?>" value="<?php echo $gaji_pokok_list->KeyCount ?>">
<?php } ?>
<?php if (!$gaji_pokok->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($gaji_pokok_list->Recordset)
	$gaji_pokok_list->Recordset->Close();
?>
<?php if (!$gaji_pokok_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$gaji_pokok_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $gaji_pokok_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $gaji_pokok_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($gaji_pokok_list->TotalRecords == 0 && !$gaji_pokok->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $gaji_pokok_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$gaji_pokok_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$gaji_pokok_list->isExport()) { ?>
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
$gaji_pokok_list->terminate();
?>