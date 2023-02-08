<?php
namespace PHPMaker2020\sigap;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($yayasan_grid))
	$yayasan_grid = new yayasan_grid();

// Run the page
$yayasan_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$yayasan_grid->Page_Render();
?>
<?php if (!$yayasan_grid->isExport()) { ?>
<script>
var fyayasangrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fyayasangrid = new ew.Form("fyayasangrid", "grid");
	fyayasangrid.formKeyCountName = '<?php echo $yayasan_grid->FormKeyCountName ?>';

	// Validate form
	fyayasangrid.validate = function() {
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
			<?php if ($yayasan_grid->id_pegawai->Required) { ?>
				elm = this.getElements("x" + infix + "_id_pegawai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $yayasan_grid->id_pegawai->caption(), $yayasan_grid->id_pegawai->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id_pegawai");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($yayasan_grid->id_pegawai->errorMessage()) ?>");
			<?php if ($yayasan_grid->gaji_pokok->Required) { ?>
				elm = this.getElements("x" + infix + "_gaji_pokok");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $yayasan_grid->gaji_pokok->caption(), $yayasan_grid->gaji_pokok->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_gaji_pokok");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($yayasan_grid->gaji_pokok->errorMessage()) ?>");
			<?php if ($yayasan_grid->potongan->Required) { ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $yayasan_grid->potongan->caption(), $yayasan_grid->potongan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($yayasan_grid->potongan->errorMessage()) ?>");
			<?php if ($yayasan_grid->total->Required) { ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $yayasan_grid->total->caption(), $yayasan_grid->total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($yayasan_grid->total->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fyayasangrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "id_pegawai", false)) return false;
		if (ew.valueChanged(fobj, infix, "gaji_pokok", false)) return false;
		if (ew.valueChanged(fobj, infix, "potongan", false)) return false;
		if (ew.valueChanged(fobj, infix, "total", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fyayasangrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fyayasangrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fyayasangrid.lists["x_id_pegawai"] = <?php echo $yayasan_grid->id_pegawai->Lookup->toClientList($yayasan_grid) ?>;
	fyayasangrid.lists["x_id_pegawai"].options = <?php echo JsonEncode($yayasan_grid->id_pegawai->lookupOptions()) ?>;
	fyayasangrid.autoSuggests["x_id_pegawai"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fyayasangrid");
});
</script>
<?php } ?>
<?php
$yayasan_grid->renderOtherOptions();
?>
<?php if ($yayasan_grid->TotalRecords > 0 || $yayasan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($yayasan_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> yayasan">
<?php if ($yayasan_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $yayasan_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fyayasangrid" class="ew-form ew-list-form form-inline">
<div id="gmp_yayasan" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_yayasangrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$yayasan->RowType = ROWTYPE_HEADER;

// Render list options
$yayasan_grid->renderListOptions();

// Render list options (header, left)
$yayasan_grid->ListOptions->render("header", "left");
?>
<?php if ($yayasan_grid->id_pegawai->Visible) { // id_pegawai ?>
	<?php if ($yayasan_grid->SortUrl($yayasan_grid->id_pegawai) == "") { ?>
		<th data-name="id_pegawai" class="<?php echo $yayasan_grid->id_pegawai->headerCellClass() ?>"><div id="elh_yayasan_id_pegawai" class="yayasan_id_pegawai"><div class="ew-table-header-caption"><?php echo $yayasan_grid->id_pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_pegawai" class="<?php echo $yayasan_grid->id_pegawai->headerCellClass() ?>"><div><div id="elh_yayasan_id_pegawai" class="yayasan_id_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $yayasan_grid->id_pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($yayasan_grid->id_pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($yayasan_grid->id_pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($yayasan_grid->gaji_pokok->Visible) { // gaji_pokok ?>
	<?php if ($yayasan_grid->SortUrl($yayasan_grid->gaji_pokok) == "") { ?>
		<th data-name="gaji_pokok" class="<?php echo $yayasan_grid->gaji_pokok->headerCellClass() ?>"><div id="elh_yayasan_gaji_pokok" class="yayasan_gaji_pokok"><div class="ew-table-header-caption"><?php echo $yayasan_grid->gaji_pokok->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gaji_pokok" class="<?php echo $yayasan_grid->gaji_pokok->headerCellClass() ?>"><div><div id="elh_yayasan_gaji_pokok" class="yayasan_gaji_pokok">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $yayasan_grid->gaji_pokok->caption() ?></span><span class="ew-table-header-sort"><?php if ($yayasan_grid->gaji_pokok->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($yayasan_grid->gaji_pokok->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($yayasan_grid->potongan->Visible) { // potongan ?>
	<?php if ($yayasan_grid->SortUrl($yayasan_grid->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $yayasan_grid->potongan->headerCellClass() ?>"><div id="elh_yayasan_potongan" class="yayasan_potongan"><div class="ew-table-header-caption"><?php echo $yayasan_grid->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $yayasan_grid->potongan->headerCellClass() ?>"><div><div id="elh_yayasan_potongan" class="yayasan_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $yayasan_grid->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($yayasan_grid->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($yayasan_grid->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($yayasan_grid->total->Visible) { // total ?>
	<?php if ($yayasan_grid->SortUrl($yayasan_grid->total) == "") { ?>
		<th data-name="total" class="<?php echo $yayasan_grid->total->headerCellClass() ?>"><div id="elh_yayasan_total" class="yayasan_total"><div class="ew-table-header-caption"><?php echo $yayasan_grid->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $yayasan_grid->total->headerCellClass() ?>"><div><div id="elh_yayasan_total" class="yayasan_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $yayasan_grid->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($yayasan_grid->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($yayasan_grid->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$yayasan_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$yayasan_grid->StartRecord = 1;
$yayasan_grid->StopRecord = $yayasan_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($yayasan->isConfirm() || $yayasan_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($yayasan_grid->FormKeyCountName) && ($yayasan_grid->isGridAdd() || $yayasan_grid->isGridEdit() || $yayasan->isConfirm())) {
		$yayasan_grid->KeyCount = $CurrentForm->getValue($yayasan_grid->FormKeyCountName);
		$yayasan_grid->StopRecord = $yayasan_grid->StartRecord + $yayasan_grid->KeyCount - 1;
	}
}
$yayasan_grid->RecordCount = $yayasan_grid->StartRecord - 1;
if ($yayasan_grid->Recordset && !$yayasan_grid->Recordset->EOF) {
	$yayasan_grid->Recordset->moveFirst();
	$selectLimit = $yayasan_grid->UseSelectLimit;
	if (!$selectLimit && $yayasan_grid->StartRecord > 1)
		$yayasan_grid->Recordset->move($yayasan_grid->StartRecord - 1);
} elseif (!$yayasan->AllowAddDeleteRow && $yayasan_grid->StopRecord == 0) {
	$yayasan_grid->StopRecord = $yayasan->GridAddRowCount;
}

// Initialize aggregate
$yayasan->RowType = ROWTYPE_AGGREGATEINIT;
$yayasan->resetAttributes();
$yayasan_grid->renderRow();
if ($yayasan_grid->isGridAdd())
	$yayasan_grid->RowIndex = 0;
if ($yayasan_grid->isGridEdit())
	$yayasan_grid->RowIndex = 0;
while ($yayasan_grid->RecordCount < $yayasan_grid->StopRecord) {
	$yayasan_grid->RecordCount++;
	if ($yayasan_grid->RecordCount >= $yayasan_grid->StartRecord) {
		$yayasan_grid->RowCount++;
		if ($yayasan_grid->isGridAdd() || $yayasan_grid->isGridEdit() || $yayasan->isConfirm()) {
			$yayasan_grid->RowIndex++;
			$CurrentForm->Index = $yayasan_grid->RowIndex;
			if ($CurrentForm->hasValue($yayasan_grid->FormActionName) && ($yayasan->isConfirm() || $yayasan_grid->EventCancelled))
				$yayasan_grid->RowAction = strval($CurrentForm->getValue($yayasan_grid->FormActionName));
			elseif ($yayasan_grid->isGridAdd())
				$yayasan_grid->RowAction = "insert";
			else
				$yayasan_grid->RowAction = "";
		}

		// Set up key count
		$yayasan_grid->KeyCount = $yayasan_grid->RowIndex;

		// Init row class and style
		$yayasan->resetAttributes();
		$yayasan->CssClass = "";
		if ($yayasan_grid->isGridAdd()) {
			if ($yayasan->CurrentMode == "copy") {
				$yayasan_grid->loadRowValues($yayasan_grid->Recordset); // Load row values
				$yayasan_grid->setRecordKey($yayasan_grid->RowOldKey, $yayasan_grid->Recordset); // Set old record key
			} else {
				$yayasan_grid->loadRowValues(); // Load default values
				$yayasan_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$yayasan_grid->loadRowValues($yayasan_grid->Recordset); // Load row values
		}
		$yayasan->RowType = ROWTYPE_VIEW; // Render view
		if ($yayasan_grid->isGridAdd()) // Grid add
			$yayasan->RowType = ROWTYPE_ADD; // Render add
		if ($yayasan_grid->isGridAdd() && $yayasan->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$yayasan_grid->restoreCurrentRowFormValues($yayasan_grid->RowIndex); // Restore form values
		if ($yayasan_grid->isGridEdit()) { // Grid edit
			if ($yayasan->EventCancelled)
				$yayasan_grid->restoreCurrentRowFormValues($yayasan_grid->RowIndex); // Restore form values
			if ($yayasan_grid->RowAction == "insert")
				$yayasan->RowType = ROWTYPE_ADD; // Render add
			else
				$yayasan->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($yayasan_grid->isGridEdit() && ($yayasan->RowType == ROWTYPE_EDIT || $yayasan->RowType == ROWTYPE_ADD) && $yayasan->EventCancelled) // Update failed
			$yayasan_grid->restoreCurrentRowFormValues($yayasan_grid->RowIndex); // Restore form values
		if ($yayasan->RowType == ROWTYPE_EDIT) // Edit row
			$yayasan_grid->EditRowCount++;
		if ($yayasan->isConfirm()) // Confirm row
			$yayasan_grid->restoreCurrentRowFormValues($yayasan_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$yayasan->RowAttrs->merge(["data-rowindex" => $yayasan_grid->RowCount, "id" => "r" . $yayasan_grid->RowCount . "_yayasan", "data-rowtype" => $yayasan->RowType]);

		// Render row
		$yayasan_grid->renderRow();

		// Render list options
		$yayasan_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($yayasan_grid->RowAction != "delete" && $yayasan_grid->RowAction != "insertdelete" && !($yayasan_grid->RowAction == "insert" && $yayasan->isConfirm() && $yayasan_grid->emptyRow())) {
?>
	<tr <?php echo $yayasan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$yayasan_grid->ListOptions->render("body", "left", $yayasan_grid->RowCount);
?>
	<?php if ($yayasan_grid->id_pegawai->Visible) { // id_pegawai ?>
		<td data-name="id_pegawai" <?php echo $yayasan_grid->id_pegawai->cellAttributes() ?>>
<?php if ($yayasan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $yayasan_grid->RowCount ?>_yayasan_id_pegawai" class="form-group">
<?php
$onchange = $yayasan_grid->id_pegawai->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$yayasan_grid->id_pegawai->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai">
	<input type="text" class="form-control" name="sv_x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" id="sv_x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" value="<?php echo RemoveHtml($yayasan_grid->id_pegawai->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($yayasan_grid->id_pegawai->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($yayasan_grid->id_pegawai->getPlaceHolder()) ?>"<?php echo $yayasan_grid->id_pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="yayasan" data-field="x_id_pegawai" data-value-separator="<?php echo $yayasan_grid->id_pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" id="x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" value="<?php echo HtmlEncode($yayasan_grid->id_pegawai->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fyayasangrid"], function() {
	fyayasangrid.createAutoSuggest({"id":"x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai","forceSelect":false});
});
</script>
<?php echo $yayasan_grid->id_pegawai->Lookup->getParamTag($yayasan_grid, "p_x" . $yayasan_grid->RowIndex . "_id_pegawai") ?>
</span>
<input type="hidden" data-table="yayasan" data-field="x_id_pegawai" name="o<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" id="o<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" value="<?php echo HtmlEncode($yayasan_grid->id_pegawai->OldValue) ?>">
<?php } ?>
<?php if ($yayasan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $yayasan_grid->RowCount ?>_yayasan_id_pegawai" class="form-group">
<?php
$onchange = $yayasan_grid->id_pegawai->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$yayasan_grid->id_pegawai->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai">
	<input type="text" class="form-control" name="sv_x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" id="sv_x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" value="<?php echo RemoveHtml($yayasan_grid->id_pegawai->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($yayasan_grid->id_pegawai->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($yayasan_grid->id_pegawai->getPlaceHolder()) ?>"<?php echo $yayasan_grid->id_pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="yayasan" data-field="x_id_pegawai" data-value-separator="<?php echo $yayasan_grid->id_pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" id="x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" value="<?php echo HtmlEncode($yayasan_grid->id_pegawai->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fyayasangrid"], function() {
	fyayasangrid.createAutoSuggest({"id":"x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai","forceSelect":false});
});
</script>
<?php echo $yayasan_grid->id_pegawai->Lookup->getParamTag($yayasan_grid, "p_x" . $yayasan_grid->RowIndex . "_id_pegawai") ?>
</span>
<?php } ?>
<?php if ($yayasan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $yayasan_grid->RowCount ?>_yayasan_id_pegawai">
<span<?php echo $yayasan_grid->id_pegawai->viewAttributes() ?>><?php echo $yayasan_grid->id_pegawai->getViewValue() ?></span>
</span>
<?php if (!$yayasan->isConfirm()) { ?>
<input type="hidden" data-table="yayasan" data-field="x_id_pegawai" name="x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" id="x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" value="<?php echo HtmlEncode($yayasan_grid->id_pegawai->FormValue) ?>">
<input type="hidden" data-table="yayasan" data-field="x_id_pegawai" name="o<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" id="o<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" value="<?php echo HtmlEncode($yayasan_grid->id_pegawai->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="yayasan" data-field="x_id_pegawai" name="fyayasangrid$x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" id="fyayasangrid$x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" value="<?php echo HtmlEncode($yayasan_grid->id_pegawai->FormValue) ?>">
<input type="hidden" data-table="yayasan" data-field="x_id_pegawai" name="fyayasangrid$o<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" id="fyayasangrid$o<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" value="<?php echo HtmlEncode($yayasan_grid->id_pegawai->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($yayasan->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="yayasan" data-field="x_id" name="x<?php echo $yayasan_grid->RowIndex ?>_id" id="x<?php echo $yayasan_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($yayasan_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="yayasan" data-field="x_id" name="o<?php echo $yayasan_grid->RowIndex ?>_id" id="o<?php echo $yayasan_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($yayasan_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($yayasan->RowType == ROWTYPE_EDIT || $yayasan->CurrentMode == "edit") { ?>
<input type="hidden" data-table="yayasan" data-field="x_id" name="x<?php echo $yayasan_grid->RowIndex ?>_id" id="x<?php echo $yayasan_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($yayasan_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($yayasan_grid->gaji_pokok->Visible) { // gaji_pokok ?>
		<td data-name="gaji_pokok" <?php echo $yayasan_grid->gaji_pokok->cellAttributes() ?>>
<?php if ($yayasan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $yayasan_grid->RowCount ?>_yayasan_gaji_pokok" class="form-group">
<input type="text" data-table="yayasan" data-field="x_gaji_pokok" name="x<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" id="x<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($yayasan_grid->gaji_pokok->getPlaceHolder()) ?>" value="<?php echo $yayasan_grid->gaji_pokok->EditValue ?>"<?php echo $yayasan_grid->gaji_pokok->editAttributes() ?>>
</span>
<input type="hidden" data-table="yayasan" data-field="x_gaji_pokok" name="o<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" id="o<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" value="<?php echo HtmlEncode($yayasan_grid->gaji_pokok->OldValue) ?>">
<?php } ?>
<?php if ($yayasan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $yayasan_grid->RowCount ?>_yayasan_gaji_pokok" class="form-group">
<input type="text" data-table="yayasan" data-field="x_gaji_pokok" name="x<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" id="x<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($yayasan_grid->gaji_pokok->getPlaceHolder()) ?>" value="<?php echo $yayasan_grid->gaji_pokok->EditValue ?>"<?php echo $yayasan_grid->gaji_pokok->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($yayasan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $yayasan_grid->RowCount ?>_yayasan_gaji_pokok">
<span<?php echo $yayasan_grid->gaji_pokok->viewAttributes() ?>><?php echo $yayasan_grid->gaji_pokok->getViewValue() ?></span>
</span>
<?php if (!$yayasan->isConfirm()) { ?>
<input type="hidden" data-table="yayasan" data-field="x_gaji_pokok" name="x<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" id="x<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" value="<?php echo HtmlEncode($yayasan_grid->gaji_pokok->FormValue) ?>">
<input type="hidden" data-table="yayasan" data-field="x_gaji_pokok" name="o<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" id="o<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" value="<?php echo HtmlEncode($yayasan_grid->gaji_pokok->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="yayasan" data-field="x_gaji_pokok" name="fyayasangrid$x<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" id="fyayasangrid$x<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" value="<?php echo HtmlEncode($yayasan_grid->gaji_pokok->FormValue) ?>">
<input type="hidden" data-table="yayasan" data-field="x_gaji_pokok" name="fyayasangrid$o<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" id="fyayasangrid$o<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" value="<?php echo HtmlEncode($yayasan_grid->gaji_pokok->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($yayasan_grid->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $yayasan_grid->potongan->cellAttributes() ?>>
<?php if ($yayasan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $yayasan_grid->RowCount ?>_yayasan_potongan" class="form-group">
<input type="text" data-table="yayasan" data-field="x_potongan" name="x<?php echo $yayasan_grid->RowIndex ?>_potongan" id="x<?php echo $yayasan_grid->RowIndex ?>_potongan" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($yayasan_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $yayasan_grid->potongan->EditValue ?>"<?php echo $yayasan_grid->potongan->editAttributes() ?>>
</span>
<input type="hidden" data-table="yayasan" data-field="x_potongan" name="o<?php echo $yayasan_grid->RowIndex ?>_potongan" id="o<?php echo $yayasan_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($yayasan_grid->potongan->OldValue) ?>">
<?php } ?>
<?php if ($yayasan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $yayasan_grid->RowCount ?>_yayasan_potongan" class="form-group">
<input type="text" data-table="yayasan" data-field="x_potongan" name="x<?php echo $yayasan_grid->RowIndex ?>_potongan" id="x<?php echo $yayasan_grid->RowIndex ?>_potongan" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($yayasan_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $yayasan_grid->potongan->EditValue ?>"<?php echo $yayasan_grid->potongan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($yayasan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $yayasan_grid->RowCount ?>_yayasan_potongan">
<span<?php echo $yayasan_grid->potongan->viewAttributes() ?>><?php echo $yayasan_grid->potongan->getViewValue() ?></span>
</span>
<?php if (!$yayasan->isConfirm()) { ?>
<input type="hidden" data-table="yayasan" data-field="x_potongan" name="x<?php echo $yayasan_grid->RowIndex ?>_potongan" id="x<?php echo $yayasan_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($yayasan_grid->potongan->FormValue) ?>">
<input type="hidden" data-table="yayasan" data-field="x_potongan" name="o<?php echo $yayasan_grid->RowIndex ?>_potongan" id="o<?php echo $yayasan_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($yayasan_grid->potongan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="yayasan" data-field="x_potongan" name="fyayasangrid$x<?php echo $yayasan_grid->RowIndex ?>_potongan" id="fyayasangrid$x<?php echo $yayasan_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($yayasan_grid->potongan->FormValue) ?>">
<input type="hidden" data-table="yayasan" data-field="x_potongan" name="fyayasangrid$o<?php echo $yayasan_grid->RowIndex ?>_potongan" id="fyayasangrid$o<?php echo $yayasan_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($yayasan_grid->potongan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($yayasan_grid->total->Visible) { // total ?>
		<td data-name="total" <?php echo $yayasan_grid->total->cellAttributes() ?>>
<?php if ($yayasan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $yayasan_grid->RowCount ?>_yayasan_total" class="form-group">
<input type="text" data-table="yayasan" data-field="x_total" name="x<?php echo $yayasan_grid->RowIndex ?>_total" id="x<?php echo $yayasan_grid->RowIndex ?>_total" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($yayasan_grid->total->getPlaceHolder()) ?>" value="<?php echo $yayasan_grid->total->EditValue ?>"<?php echo $yayasan_grid->total->editAttributes() ?>>
</span>
<input type="hidden" data-table="yayasan" data-field="x_total" name="o<?php echo $yayasan_grid->RowIndex ?>_total" id="o<?php echo $yayasan_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($yayasan_grid->total->OldValue) ?>">
<?php } ?>
<?php if ($yayasan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $yayasan_grid->RowCount ?>_yayasan_total" class="form-group">
<input type="text" data-table="yayasan" data-field="x_total" name="x<?php echo $yayasan_grid->RowIndex ?>_total" id="x<?php echo $yayasan_grid->RowIndex ?>_total" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($yayasan_grid->total->getPlaceHolder()) ?>" value="<?php echo $yayasan_grid->total->EditValue ?>"<?php echo $yayasan_grid->total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($yayasan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $yayasan_grid->RowCount ?>_yayasan_total">
<span<?php echo $yayasan_grid->total->viewAttributes() ?>><?php echo $yayasan_grid->total->getViewValue() ?></span>
</span>
<?php if (!$yayasan->isConfirm()) { ?>
<input type="hidden" data-table="yayasan" data-field="x_total" name="x<?php echo $yayasan_grid->RowIndex ?>_total" id="x<?php echo $yayasan_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($yayasan_grid->total->FormValue) ?>">
<input type="hidden" data-table="yayasan" data-field="x_total" name="o<?php echo $yayasan_grid->RowIndex ?>_total" id="o<?php echo $yayasan_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($yayasan_grid->total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="yayasan" data-field="x_total" name="fyayasangrid$x<?php echo $yayasan_grid->RowIndex ?>_total" id="fyayasangrid$x<?php echo $yayasan_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($yayasan_grid->total->FormValue) ?>">
<input type="hidden" data-table="yayasan" data-field="x_total" name="fyayasangrid$o<?php echo $yayasan_grid->RowIndex ?>_total" id="fyayasangrid$o<?php echo $yayasan_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($yayasan_grid->total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$yayasan_grid->ListOptions->render("body", "right", $yayasan_grid->RowCount);
?>
	</tr>
<?php if ($yayasan->RowType == ROWTYPE_ADD || $yayasan->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fyayasangrid", "load"], function() {
	fyayasangrid.updateLists(<?php echo $yayasan_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$yayasan_grid->isGridAdd() || $yayasan->CurrentMode == "copy")
		if (!$yayasan_grid->Recordset->EOF)
			$yayasan_grid->Recordset->moveNext();
}
?>
<?php
	if ($yayasan->CurrentMode == "add" || $yayasan->CurrentMode == "copy" || $yayasan->CurrentMode == "edit") {
		$yayasan_grid->RowIndex = '$rowindex$';
		$yayasan_grid->loadRowValues();

		// Set row properties
		$yayasan->resetAttributes();
		$yayasan->RowAttrs->merge(["data-rowindex" => $yayasan_grid->RowIndex, "id" => "r0_yayasan", "data-rowtype" => ROWTYPE_ADD]);
		$yayasan->RowAttrs->appendClass("ew-template");
		$yayasan->RowType = ROWTYPE_ADD;

		// Render row
		$yayasan_grid->renderRow();

		// Render list options
		$yayasan_grid->renderListOptions();
		$yayasan_grid->StartRowCount = 0;
?>
	<tr <?php echo $yayasan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$yayasan_grid->ListOptions->render("body", "left", $yayasan_grid->RowIndex);
?>
	<?php if ($yayasan_grid->id_pegawai->Visible) { // id_pegawai ?>
		<td data-name="id_pegawai">
<?php if (!$yayasan->isConfirm()) { ?>
<span id="el$rowindex$_yayasan_id_pegawai" class="form-group yayasan_id_pegawai">
<?php
$onchange = $yayasan_grid->id_pegawai->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$yayasan_grid->id_pegawai->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai">
	<input type="text" class="form-control" name="sv_x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" id="sv_x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" value="<?php echo RemoveHtml($yayasan_grid->id_pegawai->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($yayasan_grid->id_pegawai->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($yayasan_grid->id_pegawai->getPlaceHolder()) ?>"<?php echo $yayasan_grid->id_pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="yayasan" data-field="x_id_pegawai" data-value-separator="<?php echo $yayasan_grid->id_pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" id="x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" value="<?php echo HtmlEncode($yayasan_grid->id_pegawai->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fyayasangrid"], function() {
	fyayasangrid.createAutoSuggest({"id":"x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai","forceSelect":false});
});
</script>
<?php echo $yayasan_grid->id_pegawai->Lookup->getParamTag($yayasan_grid, "p_x" . $yayasan_grid->RowIndex . "_id_pegawai") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_yayasan_id_pegawai" class="form-group yayasan_id_pegawai">
<span<?php echo $yayasan_grid->id_pegawai->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($yayasan_grid->id_pegawai->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="yayasan" data-field="x_id_pegawai" name="x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" id="x<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" value="<?php echo HtmlEncode($yayasan_grid->id_pegawai->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="yayasan" data-field="x_id_pegawai" name="o<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" id="o<?php echo $yayasan_grid->RowIndex ?>_id_pegawai" value="<?php echo HtmlEncode($yayasan_grid->id_pegawai->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($yayasan_grid->gaji_pokok->Visible) { // gaji_pokok ?>
		<td data-name="gaji_pokok">
<?php if (!$yayasan->isConfirm()) { ?>
<span id="el$rowindex$_yayasan_gaji_pokok" class="form-group yayasan_gaji_pokok">
<input type="text" data-table="yayasan" data-field="x_gaji_pokok" name="x<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" id="x<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($yayasan_grid->gaji_pokok->getPlaceHolder()) ?>" value="<?php echo $yayasan_grid->gaji_pokok->EditValue ?>"<?php echo $yayasan_grid->gaji_pokok->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_yayasan_gaji_pokok" class="form-group yayasan_gaji_pokok">
<span<?php echo $yayasan_grid->gaji_pokok->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($yayasan_grid->gaji_pokok->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="yayasan" data-field="x_gaji_pokok" name="x<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" id="x<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" value="<?php echo HtmlEncode($yayasan_grid->gaji_pokok->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="yayasan" data-field="x_gaji_pokok" name="o<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" id="o<?php echo $yayasan_grid->RowIndex ?>_gaji_pokok" value="<?php echo HtmlEncode($yayasan_grid->gaji_pokok->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($yayasan_grid->potongan->Visible) { // potongan ?>
		<td data-name="potongan">
<?php if (!$yayasan->isConfirm()) { ?>
<span id="el$rowindex$_yayasan_potongan" class="form-group yayasan_potongan">
<input type="text" data-table="yayasan" data-field="x_potongan" name="x<?php echo $yayasan_grid->RowIndex ?>_potongan" id="x<?php echo $yayasan_grid->RowIndex ?>_potongan" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($yayasan_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $yayasan_grid->potongan->EditValue ?>"<?php echo $yayasan_grid->potongan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_yayasan_potongan" class="form-group yayasan_potongan">
<span<?php echo $yayasan_grid->potongan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($yayasan_grid->potongan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="yayasan" data-field="x_potongan" name="x<?php echo $yayasan_grid->RowIndex ?>_potongan" id="x<?php echo $yayasan_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($yayasan_grid->potongan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="yayasan" data-field="x_potongan" name="o<?php echo $yayasan_grid->RowIndex ?>_potongan" id="o<?php echo $yayasan_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($yayasan_grid->potongan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($yayasan_grid->total->Visible) { // total ?>
		<td data-name="total">
<?php if (!$yayasan->isConfirm()) { ?>
<span id="el$rowindex$_yayasan_total" class="form-group yayasan_total">
<input type="text" data-table="yayasan" data-field="x_total" name="x<?php echo $yayasan_grid->RowIndex ?>_total" id="x<?php echo $yayasan_grid->RowIndex ?>_total" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($yayasan_grid->total->getPlaceHolder()) ?>" value="<?php echo $yayasan_grid->total->EditValue ?>"<?php echo $yayasan_grid->total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_yayasan_total" class="form-group yayasan_total">
<span<?php echo $yayasan_grid->total->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($yayasan_grid->total->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="yayasan" data-field="x_total" name="x<?php echo $yayasan_grid->RowIndex ?>_total" id="x<?php echo $yayasan_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($yayasan_grid->total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="yayasan" data-field="x_total" name="o<?php echo $yayasan_grid->RowIndex ?>_total" id="o<?php echo $yayasan_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($yayasan_grid->total->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$yayasan_grid->ListOptions->render("body", "right", $yayasan_grid->RowIndex);
?>
<script>
loadjs.ready(["fyayasangrid", "load"], function() {
	fyayasangrid.updateLists(<?php echo $yayasan_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($yayasan->CurrentMode == "add" || $yayasan->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $yayasan_grid->FormKeyCountName ?>" id="<?php echo $yayasan_grid->FormKeyCountName ?>" value="<?php echo $yayasan_grid->KeyCount ?>">
<?php echo $yayasan_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($yayasan->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $yayasan_grid->FormKeyCountName ?>" id="<?php echo $yayasan_grid->FormKeyCountName ?>" value="<?php echo $yayasan_grid->KeyCount ?>">
<?php echo $yayasan_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($yayasan->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fyayasangrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($yayasan_grid->Recordset)
	$yayasan_grid->Recordset->Close();
?>
<?php if ($yayasan_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $yayasan_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($yayasan_grid->TotalRecords == 0 && !$yayasan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $yayasan_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$yayasan_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$yayasan_grid->terminate();
?>