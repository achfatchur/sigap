<?php
namespace PHPMaker2020\sigap;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($v_gajisd_grid))
	$v_gajisd_grid = new v_gajisd_grid();

// Run the page
$v_gajisd_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_gajisd_grid->Page_Render();
?>
<?php if (!$v_gajisd_grid->isExport()) { ?>
<script>
var fv_gajisdgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fv_gajisdgrid = new ew.Form("fv_gajisdgrid", "grid");
	fv_gajisdgrid.formKeyCountName = '<?php echo $v_gajisd_grid->FormKeyCountName ?>';

	// Validate form
	fv_gajisdgrid.validate = function() {
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
			<?php if ($v_gajisd_grid->pegawai->Required) { ?>
				elm = this.getElements("x" + infix + "_pegawai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_gajisd_grid->pegawai->caption(), $v_gajisd_grid->pegawai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_gajisd_grid->rekbank->Required) { ?>
				elm = this.getElements("x" + infix + "_rekbank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_gajisd_grid->rekbank->caption(), $v_gajisd_grid->rekbank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_gajisd_grid->total->Required) { ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_gajisd_grid->total->caption(), $v_gajisd_grid->total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_gajisd_grid->total->errorMessage()) ?>");
			<?php if ($v_gajisd_grid->potongan->Required) { ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_gajisd_grid->potongan->caption(), $v_gajisd_grid->potongan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_gajisd_grid->potongan->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fv_gajisdgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "pegawai", false)) return false;
		if (ew.valueChanged(fobj, infix, "rekbank", false)) return false;
		if (ew.valueChanged(fobj, infix, "total", false)) return false;
		if (ew.valueChanged(fobj, infix, "potongan", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fv_gajisdgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fv_gajisdgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fv_gajisdgrid.lists["x_pegawai"] = <?php echo $v_gajisd_grid->pegawai->Lookup->toClientList($v_gajisd_grid) ?>;
	fv_gajisdgrid.lists["x_pegawai"].options = <?php echo JsonEncode($v_gajisd_grid->pegawai->lookupOptions()) ?>;
	loadjs.done("fv_gajisdgrid");
});
</script>
<?php } ?>
<?php
$v_gajisd_grid->renderOtherOptions();
?>
<?php if ($v_gajisd_grid->TotalRecords > 0 || $v_gajisd->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v_gajisd_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v_gajisd">
<?php if ($v_gajisd_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $v_gajisd_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fv_gajisdgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_v_gajisd" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_v_gajisdgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v_gajisd->RowType = ROWTYPE_HEADER;

// Render list options
$v_gajisd_grid->renderListOptions();

// Render list options (header, left)
$v_gajisd_grid->ListOptions->render("header", "left");
?>
<?php if ($v_gajisd_grid->pegawai->Visible) { // pegawai ?>
	<?php if ($v_gajisd_grid->SortUrl($v_gajisd_grid->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $v_gajisd_grid->pegawai->headerCellClass() ?>"><div id="elh_v_gajisd_pegawai" class="v_gajisd_pegawai"><div class="ew-table-header-caption"><?php echo $v_gajisd_grid->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $v_gajisd_grid->pegawai->headerCellClass() ?>"><div><div id="elh_v_gajisd_pegawai" class="v_gajisd_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gajisd_grid->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gajisd_grid->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gajisd_grid->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gajisd_grid->rekbank->Visible) { // rekbank ?>
	<?php if ($v_gajisd_grid->SortUrl($v_gajisd_grid->rekbank) == "") { ?>
		<th data-name="rekbank" class="<?php echo $v_gajisd_grid->rekbank->headerCellClass() ?>"><div id="elh_v_gajisd_rekbank" class="v_gajisd_rekbank"><div class="ew-table-header-caption"><?php echo $v_gajisd_grid->rekbank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rekbank" class="<?php echo $v_gajisd_grid->rekbank->headerCellClass() ?>"><div><div id="elh_v_gajisd_rekbank" class="v_gajisd_rekbank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gajisd_grid->rekbank->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gajisd_grid->rekbank->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gajisd_grid->rekbank->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gajisd_grid->total->Visible) { // total ?>
	<?php if ($v_gajisd_grid->SortUrl($v_gajisd_grid->total) == "") { ?>
		<th data-name="total" class="<?php echo $v_gajisd_grid->total->headerCellClass() ?>"><div id="elh_v_gajisd_total" class="v_gajisd_total"><div class="ew-table-header-caption"><?php echo $v_gajisd_grid->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $v_gajisd_grid->total->headerCellClass() ?>"><div><div id="elh_v_gajisd_total" class="v_gajisd_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gajisd_grid->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gajisd_grid->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gajisd_grid->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gajisd_grid->potongan->Visible) { // potongan ?>
	<?php if ($v_gajisd_grid->SortUrl($v_gajisd_grid->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $v_gajisd_grid->potongan->headerCellClass() ?>"><div id="elh_v_gajisd_potongan" class="v_gajisd_potongan"><div class="ew-table-header-caption"><?php echo $v_gajisd_grid->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $v_gajisd_grid->potongan->headerCellClass() ?>"><div><div id="elh_v_gajisd_potongan" class="v_gajisd_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gajisd_grid->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gajisd_grid->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gajisd_grid->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v_gajisd_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$v_gajisd_grid->StartRecord = 1;
$v_gajisd_grid->StopRecord = $v_gajisd_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($v_gajisd->isConfirm() || $v_gajisd_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($v_gajisd_grid->FormKeyCountName) && ($v_gajisd_grid->isGridAdd() || $v_gajisd_grid->isGridEdit() || $v_gajisd->isConfirm())) {
		$v_gajisd_grid->KeyCount = $CurrentForm->getValue($v_gajisd_grid->FormKeyCountName);
		$v_gajisd_grid->StopRecord = $v_gajisd_grid->StartRecord + $v_gajisd_grid->KeyCount - 1;
	}
}
$v_gajisd_grid->RecordCount = $v_gajisd_grid->StartRecord - 1;
if ($v_gajisd_grid->Recordset && !$v_gajisd_grid->Recordset->EOF) {
	$v_gajisd_grid->Recordset->moveFirst();
	$selectLimit = $v_gajisd_grid->UseSelectLimit;
	if (!$selectLimit && $v_gajisd_grid->StartRecord > 1)
		$v_gajisd_grid->Recordset->move($v_gajisd_grid->StartRecord - 1);
} elseif (!$v_gajisd->AllowAddDeleteRow && $v_gajisd_grid->StopRecord == 0) {
	$v_gajisd_grid->StopRecord = $v_gajisd->GridAddRowCount;
}

// Initialize aggregate
$v_gajisd->RowType = ROWTYPE_AGGREGATEINIT;
$v_gajisd->resetAttributes();
$v_gajisd_grid->renderRow();
if ($v_gajisd_grid->isGridAdd())
	$v_gajisd_grid->RowIndex = 0;
if ($v_gajisd_grid->isGridEdit())
	$v_gajisd_grid->RowIndex = 0;
while ($v_gajisd_grid->RecordCount < $v_gajisd_grid->StopRecord) {
	$v_gajisd_grid->RecordCount++;
	if ($v_gajisd_grid->RecordCount >= $v_gajisd_grid->StartRecord) {
		$v_gajisd_grid->RowCount++;
		if ($v_gajisd_grid->isGridAdd() || $v_gajisd_grid->isGridEdit() || $v_gajisd->isConfirm()) {
			$v_gajisd_grid->RowIndex++;
			$CurrentForm->Index = $v_gajisd_grid->RowIndex;
			if ($CurrentForm->hasValue($v_gajisd_grid->FormActionName) && ($v_gajisd->isConfirm() || $v_gajisd_grid->EventCancelled))
				$v_gajisd_grid->RowAction = strval($CurrentForm->getValue($v_gajisd_grid->FormActionName));
			elseif ($v_gajisd_grid->isGridAdd())
				$v_gajisd_grid->RowAction = "insert";
			else
				$v_gajisd_grid->RowAction = "";
		}

		// Set up key count
		$v_gajisd_grid->KeyCount = $v_gajisd_grid->RowIndex;

		// Init row class and style
		$v_gajisd->resetAttributes();
		$v_gajisd->CssClass = "";
		if ($v_gajisd_grid->isGridAdd()) {
			if ($v_gajisd->CurrentMode == "copy") {
				$v_gajisd_grid->loadRowValues($v_gajisd_grid->Recordset); // Load row values
				$v_gajisd_grid->setRecordKey($v_gajisd_grid->RowOldKey, $v_gajisd_grid->Recordset); // Set old record key
			} else {
				$v_gajisd_grid->loadRowValues(); // Load default values
				$v_gajisd_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$v_gajisd_grid->loadRowValues($v_gajisd_grid->Recordset); // Load row values
		}
		$v_gajisd->RowType = ROWTYPE_VIEW; // Render view
		if ($v_gajisd_grid->isGridAdd()) // Grid add
			$v_gajisd->RowType = ROWTYPE_ADD; // Render add
		if ($v_gajisd_grid->isGridAdd() && $v_gajisd->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$v_gajisd_grid->restoreCurrentRowFormValues($v_gajisd_grid->RowIndex); // Restore form values
		if ($v_gajisd_grid->isGridEdit()) { // Grid edit
			if ($v_gajisd->EventCancelled)
				$v_gajisd_grid->restoreCurrentRowFormValues($v_gajisd_grid->RowIndex); // Restore form values
			if ($v_gajisd_grid->RowAction == "insert")
				$v_gajisd->RowType = ROWTYPE_ADD; // Render add
			else
				$v_gajisd->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($v_gajisd_grid->isGridEdit() && ($v_gajisd->RowType == ROWTYPE_EDIT || $v_gajisd->RowType == ROWTYPE_ADD) && $v_gajisd->EventCancelled) // Update failed
			$v_gajisd_grid->restoreCurrentRowFormValues($v_gajisd_grid->RowIndex); // Restore form values
		if ($v_gajisd->RowType == ROWTYPE_EDIT) // Edit row
			$v_gajisd_grid->EditRowCount++;
		if ($v_gajisd->isConfirm()) // Confirm row
			$v_gajisd_grid->restoreCurrentRowFormValues($v_gajisd_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$v_gajisd->RowAttrs->merge(["data-rowindex" => $v_gajisd_grid->RowCount, "id" => "r" . $v_gajisd_grid->RowCount . "_v_gajisd", "data-rowtype" => $v_gajisd->RowType]);

		// Render row
		$v_gajisd_grid->renderRow();

		// Render list options
		$v_gajisd_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($v_gajisd_grid->RowAction != "delete" && $v_gajisd_grid->RowAction != "insertdelete" && !($v_gajisd_grid->RowAction == "insert" && $v_gajisd->isConfirm() && $v_gajisd_grid->emptyRow())) {
?>
	<tr <?php echo $v_gajisd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_gajisd_grid->ListOptions->render("body", "left", $v_gajisd_grid->RowCount);
?>
	<?php if ($v_gajisd_grid->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $v_gajisd_grid->pegawai->cellAttributes() ?>>
<?php if ($v_gajisd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v_gajisd_grid->RowCount ?>_v_gajisd_pegawai" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai"><?php echo EmptyValue(strval($v_gajisd_grid->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_gajisd_grid->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_gajisd_grid->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_gajisd_grid->pegawai->ReadOnly || $v_gajisd_grid->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_gajisd_grid->pegawai->Lookup->getParamTag($v_gajisd_grid, "p_x" . $v_gajisd_grid->RowIndex . "_pegawai") ?>
<input type="hidden" data-table="v_gajisd" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_gajisd_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" id="x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" value="<?php echo $v_gajisd_grid->pegawai->CurrentValue ?>"<?php echo $v_gajisd_grid->pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_gajisd" data-field="x_pegawai" name="o<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" id="o<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gajisd_grid->pegawai->OldValue) ?>">
<?php } ?>
<?php if ($v_gajisd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v_gajisd_grid->RowCount ?>_v_gajisd_pegawai" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai"><?php echo EmptyValue(strval($v_gajisd_grid->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_gajisd_grid->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_gajisd_grid->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_gajisd_grid->pegawai->ReadOnly || $v_gajisd_grid->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_gajisd_grid->pegawai->Lookup->getParamTag($v_gajisd_grid, "p_x" . $v_gajisd_grid->RowIndex . "_pegawai") ?>
<input type="hidden" data-table="v_gajisd" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_gajisd_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" id="x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" value="<?php echo $v_gajisd_grid->pegawai->CurrentValue ?>"<?php echo $v_gajisd_grid->pegawai->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($v_gajisd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v_gajisd_grid->RowCount ?>_v_gajisd_pegawai">
<span<?php echo $v_gajisd_grid->pegawai->viewAttributes() ?>><?php echo $v_gajisd_grid->pegawai->getViewValue() ?></span>
</span>
<?php if (!$v_gajisd->isConfirm()) { ?>
<input type="hidden" data-table="v_gajisd" data-field="x_pegawai" name="x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" id="x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gajisd_grid->pegawai->FormValue) ?>">
<input type="hidden" data-table="v_gajisd" data-field="x_pegawai" name="o<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" id="o<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gajisd_grid->pegawai->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v_gajisd" data-field="x_pegawai" name="fv_gajisdgrid$x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" id="fv_gajisdgrid$x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gajisd_grid->pegawai->FormValue) ?>">
<input type="hidden" data-table="v_gajisd" data-field="x_pegawai" name="fv_gajisdgrid$o<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" id="fv_gajisdgrid$o<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gajisd_grid->pegawai->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v_gajisd_grid->rekbank->Visible) { // rekbank ?>
		<td data-name="rekbank" <?php echo $v_gajisd_grid->rekbank->cellAttributes() ?>>
<?php if ($v_gajisd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v_gajisd_grid->RowCount ?>_v_gajisd_rekbank" class="form-group">
<input type="text" data-table="v_gajisd" data-field="x_rekbank" name="x<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" id="x<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_gajisd_grid->rekbank->getPlaceHolder()) ?>" value="<?php echo $v_gajisd_grid->rekbank->EditValue ?>"<?php echo $v_gajisd_grid->rekbank->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_gajisd" data-field="x_rekbank" name="o<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" id="o<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gajisd_grid->rekbank->OldValue) ?>">
<?php } ?>
<?php if ($v_gajisd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v_gajisd_grid->RowCount ?>_v_gajisd_rekbank" class="form-group">
<input type="text" data-table="v_gajisd" data-field="x_rekbank" name="x<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" id="x<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_gajisd_grid->rekbank->getPlaceHolder()) ?>" value="<?php echo $v_gajisd_grid->rekbank->EditValue ?>"<?php echo $v_gajisd_grid->rekbank->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($v_gajisd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v_gajisd_grid->RowCount ?>_v_gajisd_rekbank">
<span<?php echo $v_gajisd_grid->rekbank->viewAttributes() ?>><?php echo $v_gajisd_grid->rekbank->getViewValue() ?></span>
</span>
<?php if (!$v_gajisd->isConfirm()) { ?>
<input type="hidden" data-table="v_gajisd" data-field="x_rekbank" name="x<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" id="x<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gajisd_grid->rekbank->FormValue) ?>">
<input type="hidden" data-table="v_gajisd" data-field="x_rekbank" name="o<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" id="o<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gajisd_grid->rekbank->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v_gajisd" data-field="x_rekbank" name="fv_gajisdgrid$x<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" id="fv_gajisdgrid$x<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gajisd_grid->rekbank->FormValue) ?>">
<input type="hidden" data-table="v_gajisd" data-field="x_rekbank" name="fv_gajisdgrid$o<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" id="fv_gajisdgrid$o<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gajisd_grid->rekbank->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v_gajisd_grid->total->Visible) { // total ?>
		<td data-name="total" <?php echo $v_gajisd_grid->total->cellAttributes() ?>>
<?php if ($v_gajisd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v_gajisd_grid->RowCount ?>_v_gajisd_total" class="form-group">
<input type="text" data-table="v_gajisd" data-field="x_total" name="x<?php echo $v_gajisd_grid->RowIndex ?>_total" id="x<?php echo $v_gajisd_grid->RowIndex ?>_total" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($v_gajisd_grid->total->getPlaceHolder()) ?>" value="<?php echo $v_gajisd_grid->total->EditValue ?>"<?php echo $v_gajisd_grid->total->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_gajisd" data-field="x_total" name="o<?php echo $v_gajisd_grid->RowIndex ?>_total" id="o<?php echo $v_gajisd_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gajisd_grid->total->OldValue) ?>">
<?php } ?>
<?php if ($v_gajisd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v_gajisd_grid->RowCount ?>_v_gajisd_total" class="form-group">
<input type="text" data-table="v_gajisd" data-field="x_total" name="x<?php echo $v_gajisd_grid->RowIndex ?>_total" id="x<?php echo $v_gajisd_grid->RowIndex ?>_total" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($v_gajisd_grid->total->getPlaceHolder()) ?>" value="<?php echo $v_gajisd_grid->total->EditValue ?>"<?php echo $v_gajisd_grid->total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($v_gajisd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v_gajisd_grid->RowCount ?>_v_gajisd_total">
<span<?php echo $v_gajisd_grid->total->viewAttributes() ?>><?php echo $v_gajisd_grid->total->getViewValue() ?></span>
</span>
<?php if (!$v_gajisd->isConfirm()) { ?>
<input type="hidden" data-table="v_gajisd" data-field="x_total" name="x<?php echo $v_gajisd_grid->RowIndex ?>_total" id="x<?php echo $v_gajisd_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gajisd_grid->total->FormValue) ?>">
<input type="hidden" data-table="v_gajisd" data-field="x_total" name="o<?php echo $v_gajisd_grid->RowIndex ?>_total" id="o<?php echo $v_gajisd_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gajisd_grid->total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v_gajisd" data-field="x_total" name="fv_gajisdgrid$x<?php echo $v_gajisd_grid->RowIndex ?>_total" id="fv_gajisdgrid$x<?php echo $v_gajisd_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gajisd_grid->total->FormValue) ?>">
<input type="hidden" data-table="v_gajisd" data-field="x_total" name="fv_gajisdgrid$o<?php echo $v_gajisd_grid->RowIndex ?>_total" id="fv_gajisdgrid$o<?php echo $v_gajisd_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gajisd_grid->total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v_gajisd_grid->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $v_gajisd_grid->potongan->cellAttributes() ?>>
<?php if ($v_gajisd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v_gajisd_grid->RowCount ?>_v_gajisd_potongan" class="form-group">
<input type="text" data-table="v_gajisd" data-field="x_potongan" name="x<?php echo $v_gajisd_grid->RowIndex ?>_potongan" id="x<?php echo $v_gajisd_grid->RowIndex ?>_potongan" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($v_gajisd_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $v_gajisd_grid->potongan->EditValue ?>"<?php echo $v_gajisd_grid->potongan->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_gajisd" data-field="x_potongan" name="o<?php echo $v_gajisd_grid->RowIndex ?>_potongan" id="o<?php echo $v_gajisd_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gajisd_grid->potongan->OldValue) ?>">
<?php } ?>
<?php if ($v_gajisd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v_gajisd_grid->RowCount ?>_v_gajisd_potongan" class="form-group">
<input type="text" data-table="v_gajisd" data-field="x_potongan" name="x<?php echo $v_gajisd_grid->RowIndex ?>_potongan" id="x<?php echo $v_gajisd_grid->RowIndex ?>_potongan" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($v_gajisd_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $v_gajisd_grid->potongan->EditValue ?>"<?php echo $v_gajisd_grid->potongan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($v_gajisd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v_gajisd_grid->RowCount ?>_v_gajisd_potongan">
<span<?php echo $v_gajisd_grid->potongan->viewAttributes() ?>><?php echo $v_gajisd_grid->potongan->getViewValue() ?></span>
</span>
<?php if (!$v_gajisd->isConfirm()) { ?>
<input type="hidden" data-table="v_gajisd" data-field="x_potongan" name="x<?php echo $v_gajisd_grid->RowIndex ?>_potongan" id="x<?php echo $v_gajisd_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gajisd_grid->potongan->FormValue) ?>">
<input type="hidden" data-table="v_gajisd" data-field="x_potongan" name="o<?php echo $v_gajisd_grid->RowIndex ?>_potongan" id="o<?php echo $v_gajisd_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gajisd_grid->potongan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v_gajisd" data-field="x_potongan" name="fv_gajisdgrid$x<?php echo $v_gajisd_grid->RowIndex ?>_potongan" id="fv_gajisdgrid$x<?php echo $v_gajisd_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gajisd_grid->potongan->FormValue) ?>">
<input type="hidden" data-table="v_gajisd" data-field="x_potongan" name="fv_gajisdgrid$o<?php echo $v_gajisd_grid->RowIndex ?>_potongan" id="fv_gajisdgrid$o<?php echo $v_gajisd_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gajisd_grid->potongan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v_gajisd_grid->ListOptions->render("body", "right", $v_gajisd_grid->RowCount);
?>
	</tr>
<?php if ($v_gajisd->RowType == ROWTYPE_ADD || $v_gajisd->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fv_gajisdgrid", "load"], function() {
	fv_gajisdgrid.updateLists(<?php echo $v_gajisd_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$v_gajisd_grid->isGridAdd() || $v_gajisd->CurrentMode == "copy")
		if (!$v_gajisd_grid->Recordset->EOF)
			$v_gajisd_grid->Recordset->moveNext();
}
?>
<?php
	if ($v_gajisd->CurrentMode == "add" || $v_gajisd->CurrentMode == "copy" || $v_gajisd->CurrentMode == "edit") {
		$v_gajisd_grid->RowIndex = '$rowindex$';
		$v_gajisd_grid->loadRowValues();

		// Set row properties
		$v_gajisd->resetAttributes();
		$v_gajisd->RowAttrs->merge(["data-rowindex" => $v_gajisd_grid->RowIndex, "id" => "r0_v_gajisd", "data-rowtype" => ROWTYPE_ADD]);
		$v_gajisd->RowAttrs->appendClass("ew-template");
		$v_gajisd->RowType = ROWTYPE_ADD;

		// Render row
		$v_gajisd_grid->renderRow();

		// Render list options
		$v_gajisd_grid->renderListOptions();
		$v_gajisd_grid->StartRowCount = 0;
?>
	<tr <?php echo $v_gajisd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_gajisd_grid->ListOptions->render("body", "left", $v_gajisd_grid->RowIndex);
?>
	<?php if ($v_gajisd_grid->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai">
<?php if (!$v_gajisd->isConfirm()) { ?>
<span id="el$rowindex$_v_gajisd_pegawai" class="form-group v_gajisd_pegawai">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai"><?php echo EmptyValue(strval($v_gajisd_grid->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_gajisd_grid->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_gajisd_grid->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_gajisd_grid->pegawai->ReadOnly || $v_gajisd_grid->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_gajisd_grid->pegawai->Lookup->getParamTag($v_gajisd_grid, "p_x" . $v_gajisd_grid->RowIndex . "_pegawai") ?>
<input type="hidden" data-table="v_gajisd" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_gajisd_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" id="x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" value="<?php echo $v_gajisd_grid->pegawai->CurrentValue ?>"<?php echo $v_gajisd_grid->pegawai->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_v_gajisd_pegawai" class="form-group v_gajisd_pegawai">
<span<?php echo $v_gajisd_grid->pegawai->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($v_gajisd_grid->pegawai->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="v_gajisd" data-field="x_pegawai" name="x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" id="x<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gajisd_grid->pegawai->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v_gajisd" data-field="x_pegawai" name="o<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" id="o<?php echo $v_gajisd_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gajisd_grid->pegawai->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v_gajisd_grid->rekbank->Visible) { // rekbank ?>
		<td data-name="rekbank">
<?php if (!$v_gajisd->isConfirm()) { ?>
<span id="el$rowindex$_v_gajisd_rekbank" class="form-group v_gajisd_rekbank">
<input type="text" data-table="v_gajisd" data-field="x_rekbank" name="x<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" id="x<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_gajisd_grid->rekbank->getPlaceHolder()) ?>" value="<?php echo $v_gajisd_grid->rekbank->EditValue ?>"<?php echo $v_gajisd_grid->rekbank->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_v_gajisd_rekbank" class="form-group v_gajisd_rekbank">
<span<?php echo $v_gajisd_grid->rekbank->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($v_gajisd_grid->rekbank->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="v_gajisd" data-field="x_rekbank" name="x<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" id="x<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gajisd_grid->rekbank->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v_gajisd" data-field="x_rekbank" name="o<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" id="o<?php echo $v_gajisd_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gajisd_grid->rekbank->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v_gajisd_grid->total->Visible) { // total ?>
		<td data-name="total">
<?php if (!$v_gajisd->isConfirm()) { ?>
<span id="el$rowindex$_v_gajisd_total" class="form-group v_gajisd_total">
<input type="text" data-table="v_gajisd" data-field="x_total" name="x<?php echo $v_gajisd_grid->RowIndex ?>_total" id="x<?php echo $v_gajisd_grid->RowIndex ?>_total" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($v_gajisd_grid->total->getPlaceHolder()) ?>" value="<?php echo $v_gajisd_grid->total->EditValue ?>"<?php echo $v_gajisd_grid->total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_v_gajisd_total" class="form-group v_gajisd_total">
<span<?php echo $v_gajisd_grid->total->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($v_gajisd_grid->total->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="v_gajisd" data-field="x_total" name="x<?php echo $v_gajisd_grid->RowIndex ?>_total" id="x<?php echo $v_gajisd_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gajisd_grid->total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v_gajisd" data-field="x_total" name="o<?php echo $v_gajisd_grid->RowIndex ?>_total" id="o<?php echo $v_gajisd_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gajisd_grid->total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v_gajisd_grid->potongan->Visible) { // potongan ?>
		<td data-name="potongan">
<?php if (!$v_gajisd->isConfirm()) { ?>
<span id="el$rowindex$_v_gajisd_potongan" class="form-group v_gajisd_potongan">
<input type="text" data-table="v_gajisd" data-field="x_potongan" name="x<?php echo $v_gajisd_grid->RowIndex ?>_potongan" id="x<?php echo $v_gajisd_grid->RowIndex ?>_potongan" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($v_gajisd_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $v_gajisd_grid->potongan->EditValue ?>"<?php echo $v_gajisd_grid->potongan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_v_gajisd_potongan" class="form-group v_gajisd_potongan">
<span<?php echo $v_gajisd_grid->potongan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($v_gajisd_grid->potongan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="v_gajisd" data-field="x_potongan" name="x<?php echo $v_gajisd_grid->RowIndex ?>_potongan" id="x<?php echo $v_gajisd_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gajisd_grid->potongan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v_gajisd" data-field="x_potongan" name="o<?php echo $v_gajisd_grid->RowIndex ?>_potongan" id="o<?php echo $v_gajisd_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gajisd_grid->potongan->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v_gajisd_grid->ListOptions->render("body", "right", $v_gajisd_grid->RowIndex);
?>
<script>
loadjs.ready(["fv_gajisdgrid", "load"], function() {
	fv_gajisdgrid.updateLists(<?php echo $v_gajisd_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($v_gajisd->CurrentMode == "add" || $v_gajisd->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $v_gajisd_grid->FormKeyCountName ?>" id="<?php echo $v_gajisd_grid->FormKeyCountName ?>" value="<?php echo $v_gajisd_grid->KeyCount ?>">
<?php echo $v_gajisd_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($v_gajisd->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $v_gajisd_grid->FormKeyCountName ?>" id="<?php echo $v_gajisd_grid->FormKeyCountName ?>" value="<?php echo $v_gajisd_grid->KeyCount ?>">
<?php echo $v_gajisd_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($v_gajisd->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fv_gajisdgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v_gajisd_grid->Recordset)
	$v_gajisd_grid->Recordset->Close();
?>
<?php if ($v_gajisd_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $v_gajisd_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v_gajisd_grid->TotalRecords == 0 && !$v_gajisd->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v_gajisd_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$v_gajisd_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$v_gajisd_grid->terminate();
?>