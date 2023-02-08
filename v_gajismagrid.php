<?php
namespace PHPMaker2020\sigap;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($v_gajisma_grid))
	$v_gajisma_grid = new v_gajisma_grid();

// Run the page
$v_gajisma_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_gajisma_grid->Page_Render();
?>
<?php if (!$v_gajisma_grid->isExport()) { ?>
<script>
var fv_gajismagrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fv_gajismagrid = new ew.Form("fv_gajismagrid", "grid");
	fv_gajismagrid.formKeyCountName = '<?php echo $v_gajisma_grid->FormKeyCountName ?>';

	// Validate form
	fv_gajismagrid.validate = function() {
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
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($v_gajisma_grid->pegawai->Required) { ?>
				elm = this.getElements("x" + infix + "_pegawai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_gajisma_grid->pegawai->caption(), $v_gajisma_grid->pegawai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_gajisma_grid->rekbank->Required) { ?>
				elm = this.getElements("x" + infix + "_rekbank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_gajisma_grid->rekbank->caption(), $v_gajisma_grid->rekbank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_gajisma_grid->total->Required) { ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_gajisma_grid->total->caption(), $v_gajisma_grid->total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_gajisma_grid->total->errorMessage()) ?>");
			<?php if ($v_gajisma_grid->potongan->Required) { ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_gajisma_grid->potongan->caption(), $v_gajisma_grid->potongan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_gajisma_grid->potongan->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fv_gajismagrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "pegawai", false)) return false;
		if (ew.valueChanged(fobj, infix, "rekbank", false)) return false;
		if (ew.valueChanged(fobj, infix, "total", false)) return false;
		if (ew.valueChanged(fobj, infix, "potongan", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fv_gajismagrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fv_gajismagrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fv_gajismagrid.lists["x_pegawai"] = <?php echo $v_gajisma_grid->pegawai->Lookup->toClientList($v_gajisma_grid) ?>;
	fv_gajismagrid.lists["x_pegawai"].options = <?php echo JsonEncode($v_gajisma_grid->pegawai->lookupOptions()) ?>;
	loadjs.done("fv_gajismagrid");
});
</script>
<?php } ?>
<?php
$v_gajisma_grid->renderOtherOptions();
?>
<?php if ($v_gajisma_grid->TotalRecords > 0 || $v_gajisma->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v_gajisma_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v_gajisma">
<?php if ($v_gajisma_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $v_gajisma_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fv_gajismagrid" class="ew-form ew-list-form form-inline">
<div id="gmp_v_gajisma" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_v_gajismagrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v_gajisma->RowType = ROWTYPE_HEADER;

// Render list options
$v_gajisma_grid->renderListOptions();

// Render list options (header, left)
$v_gajisma_grid->ListOptions->render("header", "left");
?>
<?php if ($v_gajisma_grid->pegawai->Visible) { // pegawai ?>
	<?php if ($v_gajisma_grid->SortUrl($v_gajisma_grid->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $v_gajisma_grid->pegawai->headerCellClass() ?>"><div id="elh_v_gajisma_pegawai" class="v_gajisma_pegawai"><div class="ew-table-header-caption"><?php echo $v_gajisma_grid->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $v_gajisma_grid->pegawai->headerCellClass() ?>"><div><div id="elh_v_gajisma_pegawai" class="v_gajisma_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gajisma_grid->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gajisma_grid->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gajisma_grid->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gajisma_grid->rekbank->Visible) { // rekbank ?>
	<?php if ($v_gajisma_grid->SortUrl($v_gajisma_grid->rekbank) == "") { ?>
		<th data-name="rekbank" class="<?php echo $v_gajisma_grid->rekbank->headerCellClass() ?>"><div id="elh_v_gajisma_rekbank" class="v_gajisma_rekbank"><div class="ew-table-header-caption"><?php echo $v_gajisma_grid->rekbank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rekbank" class="<?php echo $v_gajisma_grid->rekbank->headerCellClass() ?>"><div><div id="elh_v_gajisma_rekbank" class="v_gajisma_rekbank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gajisma_grid->rekbank->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gajisma_grid->rekbank->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gajisma_grid->rekbank->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gajisma_grid->total->Visible) { // total ?>
	<?php if ($v_gajisma_grid->SortUrl($v_gajisma_grid->total) == "") { ?>
		<th data-name="total" class="<?php echo $v_gajisma_grid->total->headerCellClass() ?>"><div id="elh_v_gajisma_total" class="v_gajisma_total"><div class="ew-table-header-caption"><?php echo $v_gajisma_grid->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $v_gajisma_grid->total->headerCellClass() ?>"><div><div id="elh_v_gajisma_total" class="v_gajisma_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gajisma_grid->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gajisma_grid->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gajisma_grid->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gajisma_grid->potongan->Visible) { // potongan ?>
	<?php if ($v_gajisma_grid->SortUrl($v_gajisma_grid->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $v_gajisma_grid->potongan->headerCellClass() ?>"><div id="elh_v_gajisma_potongan" class="v_gajisma_potongan"><div class="ew-table-header-caption"><?php echo $v_gajisma_grid->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $v_gajisma_grid->potongan->headerCellClass() ?>"><div><div id="elh_v_gajisma_potongan" class="v_gajisma_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gajisma_grid->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gajisma_grid->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gajisma_grid->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v_gajisma_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$v_gajisma_grid->StartRecord = 1;
$v_gajisma_grid->StopRecord = $v_gajisma_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($v_gajisma->isConfirm() || $v_gajisma_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($v_gajisma_grid->FormKeyCountName) && ($v_gajisma_grid->isGridAdd() || $v_gajisma_grid->isGridEdit() || $v_gajisma->isConfirm())) {
		$v_gajisma_grid->KeyCount = $CurrentForm->getValue($v_gajisma_grid->FormKeyCountName);
		$v_gajisma_grid->StopRecord = $v_gajisma_grid->StartRecord + $v_gajisma_grid->KeyCount - 1;
	}
}
$v_gajisma_grid->RecordCount = $v_gajisma_grid->StartRecord - 1;
if ($v_gajisma_grid->Recordset && !$v_gajisma_grid->Recordset->EOF) {
	$v_gajisma_grid->Recordset->moveFirst();
	$selectLimit = $v_gajisma_grid->UseSelectLimit;
	if (!$selectLimit && $v_gajisma_grid->StartRecord > 1)
		$v_gajisma_grid->Recordset->move($v_gajisma_grid->StartRecord - 1);
} elseif (!$v_gajisma->AllowAddDeleteRow && $v_gajisma_grid->StopRecord == 0) {
	$v_gajisma_grid->StopRecord = $v_gajisma->GridAddRowCount;
}

// Initialize aggregate
$v_gajisma->RowType = ROWTYPE_AGGREGATEINIT;
$v_gajisma->resetAttributes();
$v_gajisma_grid->renderRow();
if ($v_gajisma_grid->isGridAdd())
	$v_gajisma_grid->RowIndex = 0;
if ($v_gajisma_grid->isGridEdit())
	$v_gajisma_grid->RowIndex = 0;
while ($v_gajisma_grid->RecordCount < $v_gajisma_grid->StopRecord) {
	$v_gajisma_grid->RecordCount++;
	if ($v_gajisma_grid->RecordCount >= $v_gajisma_grid->StartRecord) {
		$v_gajisma_grid->RowCount++;
		if ($v_gajisma_grid->isGridAdd() || $v_gajisma_grid->isGridEdit() || $v_gajisma->isConfirm()) {
			$v_gajisma_grid->RowIndex++;
			$CurrentForm->Index = $v_gajisma_grid->RowIndex;
			if ($CurrentForm->hasValue($v_gajisma_grid->FormActionName) && ($v_gajisma->isConfirm() || $v_gajisma_grid->EventCancelled))
				$v_gajisma_grid->RowAction = strval($CurrentForm->getValue($v_gajisma_grid->FormActionName));
			elseif ($v_gajisma_grid->isGridAdd())
				$v_gajisma_grid->RowAction = "insert";
			else
				$v_gajisma_grid->RowAction = "";
		}

		// Set up key count
		$v_gajisma_grid->KeyCount = $v_gajisma_grid->RowIndex;

		// Init row class and style
		$v_gajisma->resetAttributes();
		$v_gajisma->CssClass = "";
		if ($v_gajisma_grid->isGridAdd()) {
			if ($v_gajisma->CurrentMode == "copy") {
				$v_gajisma_grid->loadRowValues($v_gajisma_grid->Recordset); // Load row values
				$v_gajisma_grid->setRecordKey($v_gajisma_grid->RowOldKey, $v_gajisma_grid->Recordset); // Set old record key
			} else {
				$v_gajisma_grid->loadRowValues(); // Load default values
				$v_gajisma_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$v_gajisma_grid->loadRowValues($v_gajisma_grid->Recordset); // Load row values
		}
		$v_gajisma->RowType = ROWTYPE_VIEW; // Render view
		if ($v_gajisma_grid->isGridAdd()) // Grid add
			$v_gajisma->RowType = ROWTYPE_ADD; // Render add
		if ($v_gajisma_grid->isGridAdd() && $v_gajisma->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$v_gajisma_grid->restoreCurrentRowFormValues($v_gajisma_grid->RowIndex); // Restore form values
		if ($v_gajisma_grid->isGridEdit()) { // Grid edit
			if ($v_gajisma->EventCancelled)
				$v_gajisma_grid->restoreCurrentRowFormValues($v_gajisma_grid->RowIndex); // Restore form values
			if ($v_gajisma_grid->RowAction == "insert")
				$v_gajisma->RowType = ROWTYPE_ADD; // Render add
			else
				$v_gajisma->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($v_gajisma_grid->isGridEdit() && ($v_gajisma->RowType == ROWTYPE_EDIT || $v_gajisma->RowType == ROWTYPE_ADD) && $v_gajisma->EventCancelled) // Update failed
			$v_gajisma_grid->restoreCurrentRowFormValues($v_gajisma_grid->RowIndex); // Restore form values
		if ($v_gajisma->RowType == ROWTYPE_EDIT) // Edit row
			$v_gajisma_grid->EditRowCount++;
		if ($v_gajisma->isConfirm()) // Confirm row
			$v_gajisma_grid->restoreCurrentRowFormValues($v_gajisma_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$v_gajisma->RowAttrs->merge(["data-rowindex" => $v_gajisma_grid->RowCount, "id" => "r" . $v_gajisma_grid->RowCount . "_v_gajisma", "data-rowtype" => $v_gajisma->RowType]);

		// Render row
		$v_gajisma_grid->renderRow();

		// Render list options
		$v_gajisma_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($v_gajisma_grid->RowAction != "delete" && $v_gajisma_grid->RowAction != "insertdelete" && !($v_gajisma_grid->RowAction == "insert" && $v_gajisma->isConfirm() && $v_gajisma_grid->emptyRow())) {
?>
	<tr <?php echo $v_gajisma->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_gajisma_grid->ListOptions->render("body", "left", $v_gajisma_grid->RowCount);
?>
	<?php if ($v_gajisma_grid->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $v_gajisma_grid->pegawai->cellAttributes() ?>>
<?php if ($v_gajisma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v_gajisma_grid->RowCount ?>_v_gajisma_pegawai" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai"><?php echo EmptyValue(strval($v_gajisma_grid->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_gajisma_grid->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_gajisma_grid->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_gajisma_grid->pegawai->ReadOnly || $v_gajisma_grid->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_gajisma_grid->pegawai->Lookup->getParamTag($v_gajisma_grid, "p_x" . $v_gajisma_grid->RowIndex . "_pegawai") ?>
<input type="hidden" data-table="v_gajisma" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_gajisma_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" id="x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" value="<?php echo $v_gajisma_grid->pegawai->CurrentValue ?>"<?php echo $v_gajisma_grid->pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_gajisma" data-field="x_pegawai" name="o<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" id="o<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gajisma_grid->pegawai->OldValue) ?>">
<?php } ?>
<?php if ($v_gajisma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v_gajisma_grid->RowCount ?>_v_gajisma_pegawai" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai"><?php echo EmptyValue(strval($v_gajisma_grid->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_gajisma_grid->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_gajisma_grid->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_gajisma_grid->pegawai->ReadOnly || $v_gajisma_grid->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_gajisma_grid->pegawai->Lookup->getParamTag($v_gajisma_grid, "p_x" . $v_gajisma_grid->RowIndex . "_pegawai") ?>
<input type="hidden" data-table="v_gajisma" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_gajisma_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" id="x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" value="<?php echo $v_gajisma_grid->pegawai->CurrentValue ?>"<?php echo $v_gajisma_grid->pegawai->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($v_gajisma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v_gajisma_grid->RowCount ?>_v_gajisma_pegawai">
<span<?php echo $v_gajisma_grid->pegawai->viewAttributes() ?>><?php echo $v_gajisma_grid->pegawai->getViewValue() ?></span>
</span>
<?php if (!$v_gajisma->isConfirm()) { ?>
<input type="hidden" data-table="v_gajisma" data-field="x_pegawai" name="x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" id="x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gajisma_grid->pegawai->FormValue) ?>">
<input type="hidden" data-table="v_gajisma" data-field="x_pegawai" name="o<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" id="o<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gajisma_grid->pegawai->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v_gajisma" data-field="x_pegawai" name="fv_gajismagrid$x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" id="fv_gajismagrid$x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gajisma_grid->pegawai->FormValue) ?>">
<input type="hidden" data-table="v_gajisma" data-field="x_pegawai" name="fv_gajismagrid$o<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" id="fv_gajismagrid$o<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gajisma_grid->pegawai->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v_gajisma_grid->rekbank->Visible) { // rekbank ?>
		<td data-name="rekbank" <?php echo $v_gajisma_grid->rekbank->cellAttributes() ?>>
<?php if ($v_gajisma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v_gajisma_grid->RowCount ?>_v_gajisma_rekbank" class="form-group">
<input type="text" data-table="v_gajisma" data-field="x_rekbank" name="x<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" id="x<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_gajisma_grid->rekbank->getPlaceHolder()) ?>" value="<?php echo $v_gajisma_grid->rekbank->EditValue ?>"<?php echo $v_gajisma_grid->rekbank->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_gajisma" data-field="x_rekbank" name="o<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" id="o<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gajisma_grid->rekbank->OldValue) ?>">
<?php } ?>
<?php if ($v_gajisma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v_gajisma_grid->RowCount ?>_v_gajisma_rekbank" class="form-group">
<input type="text" data-table="v_gajisma" data-field="x_rekbank" name="x<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" id="x<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_gajisma_grid->rekbank->getPlaceHolder()) ?>" value="<?php echo $v_gajisma_grid->rekbank->EditValue ?>"<?php echo $v_gajisma_grid->rekbank->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($v_gajisma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v_gajisma_grid->RowCount ?>_v_gajisma_rekbank">
<span<?php echo $v_gajisma_grid->rekbank->viewAttributes() ?>><?php echo $v_gajisma_grid->rekbank->getViewValue() ?></span>
</span>
<?php if (!$v_gajisma->isConfirm()) { ?>
<input type="hidden" data-table="v_gajisma" data-field="x_rekbank" name="x<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" id="x<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gajisma_grid->rekbank->FormValue) ?>">
<input type="hidden" data-table="v_gajisma" data-field="x_rekbank" name="o<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" id="o<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gajisma_grid->rekbank->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v_gajisma" data-field="x_rekbank" name="fv_gajismagrid$x<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" id="fv_gajismagrid$x<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gajisma_grid->rekbank->FormValue) ?>">
<input type="hidden" data-table="v_gajisma" data-field="x_rekbank" name="fv_gajismagrid$o<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" id="fv_gajismagrid$o<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gajisma_grid->rekbank->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v_gajisma_grid->total->Visible) { // total ?>
		<td data-name="total" <?php echo $v_gajisma_grid->total->cellAttributes() ?>>
<?php if ($v_gajisma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v_gajisma_grid->RowCount ?>_v_gajisma_total" class="form-group">
<input type="text" data-table="v_gajisma" data-field="x_total" name="x<?php echo $v_gajisma_grid->RowIndex ?>_total" id="x<?php echo $v_gajisma_grid->RowIndex ?>_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($v_gajisma_grid->total->getPlaceHolder()) ?>" value="<?php echo $v_gajisma_grid->total->EditValue ?>"<?php echo $v_gajisma_grid->total->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_gajisma" data-field="x_total" name="o<?php echo $v_gajisma_grid->RowIndex ?>_total" id="o<?php echo $v_gajisma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gajisma_grid->total->OldValue) ?>">
<?php } ?>
<?php if ($v_gajisma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v_gajisma_grid->RowCount ?>_v_gajisma_total" class="form-group">
<input type="text" data-table="v_gajisma" data-field="x_total" name="x<?php echo $v_gajisma_grid->RowIndex ?>_total" id="x<?php echo $v_gajisma_grid->RowIndex ?>_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($v_gajisma_grid->total->getPlaceHolder()) ?>" value="<?php echo $v_gajisma_grid->total->EditValue ?>"<?php echo $v_gajisma_grid->total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($v_gajisma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v_gajisma_grid->RowCount ?>_v_gajisma_total">
<span<?php echo $v_gajisma_grid->total->viewAttributes() ?>><?php echo $v_gajisma_grid->total->getViewValue() ?></span>
</span>
<?php if (!$v_gajisma->isConfirm()) { ?>
<input type="hidden" data-table="v_gajisma" data-field="x_total" name="x<?php echo $v_gajisma_grid->RowIndex ?>_total" id="x<?php echo $v_gajisma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gajisma_grid->total->FormValue) ?>">
<input type="hidden" data-table="v_gajisma" data-field="x_total" name="o<?php echo $v_gajisma_grid->RowIndex ?>_total" id="o<?php echo $v_gajisma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gajisma_grid->total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v_gajisma" data-field="x_total" name="fv_gajismagrid$x<?php echo $v_gajisma_grid->RowIndex ?>_total" id="fv_gajismagrid$x<?php echo $v_gajisma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gajisma_grid->total->FormValue) ?>">
<input type="hidden" data-table="v_gajisma" data-field="x_total" name="fv_gajismagrid$o<?php echo $v_gajisma_grid->RowIndex ?>_total" id="fv_gajismagrid$o<?php echo $v_gajisma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gajisma_grid->total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v_gajisma_grid->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $v_gajisma_grid->potongan->cellAttributes() ?>>
<?php if ($v_gajisma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v_gajisma_grid->RowCount ?>_v_gajisma_potongan" class="form-group">
<input type="text" data-table="v_gajisma" data-field="x_potongan" name="x<?php echo $v_gajisma_grid->RowIndex ?>_potongan" id="x<?php echo $v_gajisma_grid->RowIndex ?>_potongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($v_gajisma_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $v_gajisma_grid->potongan->EditValue ?>"<?php echo $v_gajisma_grid->potongan->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_gajisma" data-field="x_potongan" name="o<?php echo $v_gajisma_grid->RowIndex ?>_potongan" id="o<?php echo $v_gajisma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gajisma_grid->potongan->OldValue) ?>">
<?php } ?>
<?php if ($v_gajisma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v_gajisma_grid->RowCount ?>_v_gajisma_potongan" class="form-group">
<input type="text" data-table="v_gajisma" data-field="x_potongan" name="x<?php echo $v_gajisma_grid->RowIndex ?>_potongan" id="x<?php echo $v_gajisma_grid->RowIndex ?>_potongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($v_gajisma_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $v_gajisma_grid->potongan->EditValue ?>"<?php echo $v_gajisma_grid->potongan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($v_gajisma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v_gajisma_grid->RowCount ?>_v_gajisma_potongan">
<span<?php echo $v_gajisma_grid->potongan->viewAttributes() ?>><?php echo $v_gajisma_grid->potongan->getViewValue() ?></span>
</span>
<?php if (!$v_gajisma->isConfirm()) { ?>
<input type="hidden" data-table="v_gajisma" data-field="x_potongan" name="x<?php echo $v_gajisma_grid->RowIndex ?>_potongan" id="x<?php echo $v_gajisma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gajisma_grid->potongan->FormValue) ?>">
<input type="hidden" data-table="v_gajisma" data-field="x_potongan" name="o<?php echo $v_gajisma_grid->RowIndex ?>_potongan" id="o<?php echo $v_gajisma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gajisma_grid->potongan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v_gajisma" data-field="x_potongan" name="fv_gajismagrid$x<?php echo $v_gajisma_grid->RowIndex ?>_potongan" id="fv_gajismagrid$x<?php echo $v_gajisma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gajisma_grid->potongan->FormValue) ?>">
<input type="hidden" data-table="v_gajisma" data-field="x_potongan" name="fv_gajismagrid$o<?php echo $v_gajisma_grid->RowIndex ?>_potongan" id="fv_gajismagrid$o<?php echo $v_gajisma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gajisma_grid->potongan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v_gajisma_grid->ListOptions->render("body", "right", $v_gajisma_grid->RowCount);
?>
	</tr>
<?php if ($v_gajisma->RowType == ROWTYPE_ADD || $v_gajisma->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fv_gajismagrid", "load"], function() {
	fv_gajismagrid.updateLists(<?php echo $v_gajisma_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$v_gajisma_grid->isGridAdd() || $v_gajisma->CurrentMode == "copy")
		if (!$v_gajisma_grid->Recordset->EOF)
			$v_gajisma_grid->Recordset->moveNext();
}
?>
<?php
	if ($v_gajisma->CurrentMode == "add" || $v_gajisma->CurrentMode == "copy" || $v_gajisma->CurrentMode == "edit") {
		$v_gajisma_grid->RowIndex = '$rowindex$';
		$v_gajisma_grid->loadRowValues();

		// Set row properties
		$v_gajisma->resetAttributes();
		$v_gajisma->RowAttrs->merge(["data-rowindex" => $v_gajisma_grid->RowIndex, "id" => "r0_v_gajisma", "data-rowtype" => ROWTYPE_ADD]);
		$v_gajisma->RowAttrs->appendClass("ew-template");
		$v_gajisma->RowType = ROWTYPE_ADD;

		// Render row
		$v_gajisma_grid->renderRow();

		// Render list options
		$v_gajisma_grid->renderListOptions();
		$v_gajisma_grid->StartRowCount = 0;
?>
	<tr <?php echo $v_gajisma->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_gajisma_grid->ListOptions->render("body", "left", $v_gajisma_grid->RowIndex);
?>
	<?php if ($v_gajisma_grid->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai">
<?php if (!$v_gajisma->isConfirm()) { ?>
<span id="el$rowindex$_v_gajisma_pegawai" class="form-group v_gajisma_pegawai">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai"><?php echo EmptyValue(strval($v_gajisma_grid->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_gajisma_grid->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_gajisma_grid->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_gajisma_grid->pegawai->ReadOnly || $v_gajisma_grid->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_gajisma_grid->pegawai->Lookup->getParamTag($v_gajisma_grid, "p_x" . $v_gajisma_grid->RowIndex . "_pegawai") ?>
<input type="hidden" data-table="v_gajisma" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_gajisma_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" id="x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" value="<?php echo $v_gajisma_grid->pegawai->CurrentValue ?>"<?php echo $v_gajisma_grid->pegawai->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_v_gajisma_pegawai" class="form-group v_gajisma_pegawai">
<span<?php echo $v_gajisma_grid->pegawai->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($v_gajisma_grid->pegawai->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="v_gajisma" data-field="x_pegawai" name="x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" id="x<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gajisma_grid->pegawai->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v_gajisma" data-field="x_pegawai" name="o<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" id="o<?php echo $v_gajisma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gajisma_grid->pegawai->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v_gajisma_grid->rekbank->Visible) { // rekbank ?>
		<td data-name="rekbank">
<?php if (!$v_gajisma->isConfirm()) { ?>
<span id="el$rowindex$_v_gajisma_rekbank" class="form-group v_gajisma_rekbank">
<input type="text" data-table="v_gajisma" data-field="x_rekbank" name="x<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" id="x<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_gajisma_grid->rekbank->getPlaceHolder()) ?>" value="<?php echo $v_gajisma_grid->rekbank->EditValue ?>"<?php echo $v_gajisma_grid->rekbank->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_v_gajisma_rekbank" class="form-group v_gajisma_rekbank">
<span<?php echo $v_gajisma_grid->rekbank->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($v_gajisma_grid->rekbank->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="v_gajisma" data-field="x_rekbank" name="x<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" id="x<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gajisma_grid->rekbank->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v_gajisma" data-field="x_rekbank" name="o<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" id="o<?php echo $v_gajisma_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gajisma_grid->rekbank->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v_gajisma_grid->total->Visible) { // total ?>
		<td data-name="total">
<?php if (!$v_gajisma->isConfirm()) { ?>
<span id="el$rowindex$_v_gajisma_total" class="form-group v_gajisma_total">
<input type="text" data-table="v_gajisma" data-field="x_total" name="x<?php echo $v_gajisma_grid->RowIndex ?>_total" id="x<?php echo $v_gajisma_grid->RowIndex ?>_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($v_gajisma_grid->total->getPlaceHolder()) ?>" value="<?php echo $v_gajisma_grid->total->EditValue ?>"<?php echo $v_gajisma_grid->total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_v_gajisma_total" class="form-group v_gajisma_total">
<span<?php echo $v_gajisma_grid->total->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($v_gajisma_grid->total->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="v_gajisma" data-field="x_total" name="x<?php echo $v_gajisma_grid->RowIndex ?>_total" id="x<?php echo $v_gajisma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gajisma_grid->total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v_gajisma" data-field="x_total" name="o<?php echo $v_gajisma_grid->RowIndex ?>_total" id="o<?php echo $v_gajisma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gajisma_grid->total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v_gajisma_grid->potongan->Visible) { // potongan ?>
		<td data-name="potongan">
<?php if (!$v_gajisma->isConfirm()) { ?>
<span id="el$rowindex$_v_gajisma_potongan" class="form-group v_gajisma_potongan">
<input type="text" data-table="v_gajisma" data-field="x_potongan" name="x<?php echo $v_gajisma_grid->RowIndex ?>_potongan" id="x<?php echo $v_gajisma_grid->RowIndex ?>_potongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($v_gajisma_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $v_gajisma_grid->potongan->EditValue ?>"<?php echo $v_gajisma_grid->potongan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_v_gajisma_potongan" class="form-group v_gajisma_potongan">
<span<?php echo $v_gajisma_grid->potongan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($v_gajisma_grid->potongan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="v_gajisma" data-field="x_potongan" name="x<?php echo $v_gajisma_grid->RowIndex ?>_potongan" id="x<?php echo $v_gajisma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gajisma_grid->potongan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v_gajisma" data-field="x_potongan" name="o<?php echo $v_gajisma_grid->RowIndex ?>_potongan" id="o<?php echo $v_gajisma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gajisma_grid->potongan->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v_gajisma_grid->ListOptions->render("body", "right", $v_gajisma_grid->RowIndex);
?>
<script>
loadjs.ready(["fv_gajismagrid", "load"], function() {
	fv_gajismagrid.updateLists(<?php echo $v_gajisma_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($v_gajisma->CurrentMode == "add" || $v_gajisma->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $v_gajisma_grid->FormKeyCountName ?>" id="<?php echo $v_gajisma_grid->FormKeyCountName ?>" value="<?php echo $v_gajisma_grid->KeyCount ?>">
<?php echo $v_gajisma_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($v_gajisma->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $v_gajisma_grid->FormKeyCountName ?>" id="<?php echo $v_gajisma_grid->FormKeyCountName ?>" value="<?php echo $v_gajisma_grid->KeyCount ?>">
<?php echo $v_gajisma_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($v_gajisma->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fv_gajismagrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v_gajisma_grid->Recordset)
	$v_gajisma_grid->Recordset->Close();
?>
<?php if ($v_gajisma_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $v_gajisma_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v_gajisma_grid->TotalRecords == 0 && !$v_gajisma->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v_gajisma_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$v_gajisma_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$v_gajisma_grid->terminate();
?>