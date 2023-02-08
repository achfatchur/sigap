<?php
namespace PHPMaker2020\sigap;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($v_gaji_tu_sma_grid))
	$v_gaji_tu_sma_grid = new v_gaji_tu_sma_grid();

// Run the page
$v_gaji_tu_sma_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_gaji_tu_sma_grid->Page_Render();
?>
<?php if (!$v_gaji_tu_sma_grid->isExport()) { ?>
<script>
var fv_gaji_tu_smagrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fv_gaji_tu_smagrid = new ew.Form("fv_gaji_tu_smagrid", "grid");
	fv_gaji_tu_smagrid.formKeyCountName = '<?php echo $v_gaji_tu_sma_grid->FormKeyCountName ?>';

	// Validate form
	fv_gaji_tu_smagrid.validate = function() {
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
			<?php if ($v_gaji_tu_sma_grid->pegawai->Required) { ?>
				elm = this.getElements("x" + infix + "_pegawai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_gaji_tu_sma_grid->pegawai->caption(), $v_gaji_tu_sma_grid->pegawai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_gaji_tu_sma_grid->total->Required) { ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_gaji_tu_sma_grid->total->caption(), $v_gaji_tu_sma_grid->total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_gaji_tu_sma_grid->total->errorMessage()) ?>");
			<?php if ($v_gaji_tu_sma_grid->rekbank->Required) { ?>
				elm = this.getElements("x" + infix + "_rekbank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_gaji_tu_sma_grid->rekbank->caption(), $v_gaji_tu_sma_grid->rekbank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_gaji_tu_sma_grid->potongan->Required) { ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_gaji_tu_sma_grid->potongan->caption(), $v_gaji_tu_sma_grid->potongan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_gaji_tu_sma_grid->potongan->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fv_gaji_tu_smagrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "pegawai", false)) return false;
		if (ew.valueChanged(fobj, infix, "total", false)) return false;
		if (ew.valueChanged(fobj, infix, "rekbank", false)) return false;
		if (ew.valueChanged(fobj, infix, "potongan", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fv_gaji_tu_smagrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fv_gaji_tu_smagrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fv_gaji_tu_smagrid.lists["x_pegawai"] = <?php echo $v_gaji_tu_sma_grid->pegawai->Lookup->toClientList($v_gaji_tu_sma_grid) ?>;
	fv_gaji_tu_smagrid.lists["x_pegawai"].options = <?php echo JsonEncode($v_gaji_tu_sma_grid->pegawai->lookupOptions()) ?>;
	fv_gaji_tu_smagrid.autoSuggests["x_pegawai"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fv_gaji_tu_smagrid");
});
</script>
<?php } ?>
<?php
$v_gaji_tu_sma_grid->renderOtherOptions();
?>
<?php if ($v_gaji_tu_sma_grid->TotalRecords > 0 || $v_gaji_tu_sma->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v_gaji_tu_sma_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v_gaji_tu_sma">
<?php if ($v_gaji_tu_sma_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $v_gaji_tu_sma_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fv_gaji_tu_smagrid" class="ew-form ew-list-form form-inline">
<div id="gmp_v_gaji_tu_sma" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_v_gaji_tu_smagrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v_gaji_tu_sma->RowType = ROWTYPE_HEADER;

// Render list options
$v_gaji_tu_sma_grid->renderListOptions();

// Render list options (header, left)
$v_gaji_tu_sma_grid->ListOptions->render("header", "left");
?>
<?php if ($v_gaji_tu_sma_grid->pegawai->Visible) { // pegawai ?>
	<?php if ($v_gaji_tu_sma_grid->SortUrl($v_gaji_tu_sma_grid->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $v_gaji_tu_sma_grid->pegawai->headerCellClass() ?>"><div id="elh_v_gaji_tu_sma_pegawai" class="v_gaji_tu_sma_pegawai"><div class="ew-table-header-caption"><?php echo $v_gaji_tu_sma_grid->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $v_gaji_tu_sma_grid->pegawai->headerCellClass() ?>"><div><div id="elh_v_gaji_tu_sma_pegawai" class="v_gaji_tu_sma_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_tu_sma_grid->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_tu_sma_grid->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_tu_sma_grid->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gaji_tu_sma_grid->total->Visible) { // total ?>
	<?php if ($v_gaji_tu_sma_grid->SortUrl($v_gaji_tu_sma_grid->total) == "") { ?>
		<th data-name="total" class="<?php echo $v_gaji_tu_sma_grid->total->headerCellClass() ?>"><div id="elh_v_gaji_tu_sma_total" class="v_gaji_tu_sma_total"><div class="ew-table-header-caption"><?php echo $v_gaji_tu_sma_grid->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $v_gaji_tu_sma_grid->total->headerCellClass() ?>"><div><div id="elh_v_gaji_tu_sma_total" class="v_gaji_tu_sma_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_tu_sma_grid->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_tu_sma_grid->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_tu_sma_grid->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gaji_tu_sma_grid->rekbank->Visible) { // rekbank ?>
	<?php if ($v_gaji_tu_sma_grid->SortUrl($v_gaji_tu_sma_grid->rekbank) == "") { ?>
		<th data-name="rekbank" class="<?php echo $v_gaji_tu_sma_grid->rekbank->headerCellClass() ?>"><div id="elh_v_gaji_tu_sma_rekbank" class="v_gaji_tu_sma_rekbank"><div class="ew-table-header-caption"><?php echo $v_gaji_tu_sma_grid->rekbank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rekbank" class="<?php echo $v_gaji_tu_sma_grid->rekbank->headerCellClass() ?>"><div><div id="elh_v_gaji_tu_sma_rekbank" class="v_gaji_tu_sma_rekbank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_tu_sma_grid->rekbank->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_tu_sma_grid->rekbank->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_tu_sma_grid->rekbank->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gaji_tu_sma_grid->potongan->Visible) { // potongan ?>
	<?php if ($v_gaji_tu_sma_grid->SortUrl($v_gaji_tu_sma_grid->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $v_gaji_tu_sma_grid->potongan->headerCellClass() ?>"><div id="elh_v_gaji_tu_sma_potongan" class="v_gaji_tu_sma_potongan"><div class="ew-table-header-caption"><?php echo $v_gaji_tu_sma_grid->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $v_gaji_tu_sma_grid->potongan->headerCellClass() ?>"><div><div id="elh_v_gaji_tu_sma_potongan" class="v_gaji_tu_sma_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_tu_sma_grid->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_tu_sma_grid->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_tu_sma_grid->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v_gaji_tu_sma_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$v_gaji_tu_sma_grid->StartRecord = 1;
$v_gaji_tu_sma_grid->StopRecord = $v_gaji_tu_sma_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($v_gaji_tu_sma->isConfirm() || $v_gaji_tu_sma_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($v_gaji_tu_sma_grid->FormKeyCountName) && ($v_gaji_tu_sma_grid->isGridAdd() || $v_gaji_tu_sma_grid->isGridEdit() || $v_gaji_tu_sma->isConfirm())) {
		$v_gaji_tu_sma_grid->KeyCount = $CurrentForm->getValue($v_gaji_tu_sma_grid->FormKeyCountName);
		$v_gaji_tu_sma_grid->StopRecord = $v_gaji_tu_sma_grid->StartRecord + $v_gaji_tu_sma_grid->KeyCount - 1;
	}
}
$v_gaji_tu_sma_grid->RecordCount = $v_gaji_tu_sma_grid->StartRecord - 1;
if ($v_gaji_tu_sma_grid->Recordset && !$v_gaji_tu_sma_grid->Recordset->EOF) {
	$v_gaji_tu_sma_grid->Recordset->moveFirst();
	$selectLimit = $v_gaji_tu_sma_grid->UseSelectLimit;
	if (!$selectLimit && $v_gaji_tu_sma_grid->StartRecord > 1)
		$v_gaji_tu_sma_grid->Recordset->move($v_gaji_tu_sma_grid->StartRecord - 1);
} elseif (!$v_gaji_tu_sma->AllowAddDeleteRow && $v_gaji_tu_sma_grid->StopRecord == 0) {
	$v_gaji_tu_sma_grid->StopRecord = $v_gaji_tu_sma->GridAddRowCount;
}

// Initialize aggregate
$v_gaji_tu_sma->RowType = ROWTYPE_AGGREGATEINIT;
$v_gaji_tu_sma->resetAttributes();
$v_gaji_tu_sma_grid->renderRow();
if ($v_gaji_tu_sma_grid->isGridAdd())
	$v_gaji_tu_sma_grid->RowIndex = 0;
if ($v_gaji_tu_sma_grid->isGridEdit())
	$v_gaji_tu_sma_grid->RowIndex = 0;
while ($v_gaji_tu_sma_grid->RecordCount < $v_gaji_tu_sma_grid->StopRecord) {
	$v_gaji_tu_sma_grid->RecordCount++;
	if ($v_gaji_tu_sma_grid->RecordCount >= $v_gaji_tu_sma_grid->StartRecord) {
		$v_gaji_tu_sma_grid->RowCount++;
		if ($v_gaji_tu_sma_grid->isGridAdd() || $v_gaji_tu_sma_grid->isGridEdit() || $v_gaji_tu_sma->isConfirm()) {
			$v_gaji_tu_sma_grid->RowIndex++;
			$CurrentForm->Index = $v_gaji_tu_sma_grid->RowIndex;
			if ($CurrentForm->hasValue($v_gaji_tu_sma_grid->FormActionName) && ($v_gaji_tu_sma->isConfirm() || $v_gaji_tu_sma_grid->EventCancelled))
				$v_gaji_tu_sma_grid->RowAction = strval($CurrentForm->getValue($v_gaji_tu_sma_grid->FormActionName));
			elseif ($v_gaji_tu_sma_grid->isGridAdd())
				$v_gaji_tu_sma_grid->RowAction = "insert";
			else
				$v_gaji_tu_sma_grid->RowAction = "";
		}

		// Set up key count
		$v_gaji_tu_sma_grid->KeyCount = $v_gaji_tu_sma_grid->RowIndex;

		// Init row class and style
		$v_gaji_tu_sma->resetAttributes();
		$v_gaji_tu_sma->CssClass = "";
		if ($v_gaji_tu_sma_grid->isGridAdd()) {
			if ($v_gaji_tu_sma->CurrentMode == "copy") {
				$v_gaji_tu_sma_grid->loadRowValues($v_gaji_tu_sma_grid->Recordset); // Load row values
				$v_gaji_tu_sma_grid->setRecordKey($v_gaji_tu_sma_grid->RowOldKey, $v_gaji_tu_sma_grid->Recordset); // Set old record key
			} else {
				$v_gaji_tu_sma_grid->loadRowValues(); // Load default values
				$v_gaji_tu_sma_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$v_gaji_tu_sma_grid->loadRowValues($v_gaji_tu_sma_grid->Recordset); // Load row values
		}
		$v_gaji_tu_sma->RowType = ROWTYPE_VIEW; // Render view
		if ($v_gaji_tu_sma_grid->isGridAdd()) // Grid add
			$v_gaji_tu_sma->RowType = ROWTYPE_ADD; // Render add
		if ($v_gaji_tu_sma_grid->isGridAdd() && $v_gaji_tu_sma->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$v_gaji_tu_sma_grid->restoreCurrentRowFormValues($v_gaji_tu_sma_grid->RowIndex); // Restore form values
		if ($v_gaji_tu_sma_grid->isGridEdit()) { // Grid edit
			if ($v_gaji_tu_sma->EventCancelled)
				$v_gaji_tu_sma_grid->restoreCurrentRowFormValues($v_gaji_tu_sma_grid->RowIndex); // Restore form values
			if ($v_gaji_tu_sma_grid->RowAction == "insert")
				$v_gaji_tu_sma->RowType = ROWTYPE_ADD; // Render add
			else
				$v_gaji_tu_sma->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($v_gaji_tu_sma_grid->isGridEdit() && ($v_gaji_tu_sma->RowType == ROWTYPE_EDIT || $v_gaji_tu_sma->RowType == ROWTYPE_ADD) && $v_gaji_tu_sma->EventCancelled) // Update failed
			$v_gaji_tu_sma_grid->restoreCurrentRowFormValues($v_gaji_tu_sma_grid->RowIndex); // Restore form values
		if ($v_gaji_tu_sma->RowType == ROWTYPE_EDIT) // Edit row
			$v_gaji_tu_sma_grid->EditRowCount++;
		if ($v_gaji_tu_sma->isConfirm()) // Confirm row
			$v_gaji_tu_sma_grid->restoreCurrentRowFormValues($v_gaji_tu_sma_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$v_gaji_tu_sma->RowAttrs->merge(["data-rowindex" => $v_gaji_tu_sma_grid->RowCount, "id" => "r" . $v_gaji_tu_sma_grid->RowCount . "_v_gaji_tu_sma", "data-rowtype" => $v_gaji_tu_sma->RowType]);

		// Render row
		$v_gaji_tu_sma_grid->renderRow();

		// Render list options
		$v_gaji_tu_sma_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($v_gaji_tu_sma_grid->RowAction != "delete" && $v_gaji_tu_sma_grid->RowAction != "insertdelete" && !($v_gaji_tu_sma_grid->RowAction == "insert" && $v_gaji_tu_sma->isConfirm() && $v_gaji_tu_sma_grid->emptyRow())) {
?>
	<tr <?php echo $v_gaji_tu_sma->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_gaji_tu_sma_grid->ListOptions->render("body", "left", $v_gaji_tu_sma_grid->RowCount);
?>
	<?php if ($v_gaji_tu_sma_grid->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $v_gaji_tu_sma_grid->pegawai->cellAttributes() ?>>
<?php if ($v_gaji_tu_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v_gaji_tu_sma_grid->RowCount ?>_v_gaji_tu_sma_pegawai" class="form-group">
<?php
$onchange = $v_gaji_tu_sma_grid->pegawai->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$v_gaji_tu_sma_grid->pegawai->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai">
	<input type="text" class="form-control" name="sv_x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" id="sv_x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" value="<?php echo RemoveHtml($v_gaji_tu_sma_grid->pegawai->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->getPlaceHolder()) ?>"<?php echo $v_gaji_tu_sma_grid->pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_pegawai" data-value-separator="<?php echo $v_gaji_tu_sma_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fv_gaji_tu_smagrid"], function() {
	fv_gaji_tu_smagrid.createAutoSuggest({"id":"x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai","forceSelect":false});
});
</script>
<?php echo $v_gaji_tu_sma_grid->pegawai->Lookup->getParamTag($v_gaji_tu_sma_grid, "p_x" . $v_gaji_tu_sma_grid->RowIndex . "_pegawai") ?>
</span>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_pegawai" name="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" id="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->OldValue) ?>">
<?php } ?>
<?php if ($v_gaji_tu_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v_gaji_tu_sma_grid->RowCount ?>_v_gaji_tu_sma_pegawai" class="form-group">
<?php
$onchange = $v_gaji_tu_sma_grid->pegawai->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$v_gaji_tu_sma_grid->pegawai->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai">
	<input type="text" class="form-control" name="sv_x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" id="sv_x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" value="<?php echo RemoveHtml($v_gaji_tu_sma_grid->pegawai->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->getPlaceHolder()) ?>"<?php echo $v_gaji_tu_sma_grid->pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_pegawai" data-value-separator="<?php echo $v_gaji_tu_sma_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fv_gaji_tu_smagrid"], function() {
	fv_gaji_tu_smagrid.createAutoSuggest({"id":"x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai","forceSelect":false});
});
</script>
<?php echo $v_gaji_tu_sma_grid->pegawai->Lookup->getParamTag($v_gaji_tu_sma_grid, "p_x" . $v_gaji_tu_sma_grid->RowIndex . "_pegawai") ?>
</span>
<?php } ?>
<?php if ($v_gaji_tu_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v_gaji_tu_sma_grid->RowCount ?>_v_gaji_tu_sma_pegawai">
<span<?php echo $v_gaji_tu_sma_grid->pegawai->viewAttributes() ?>><?php echo $v_gaji_tu_sma_grid->pegawai->getViewValue() ?></span>
</span>
<?php if (!$v_gaji_tu_sma->isConfirm()) { ?>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_pegawai" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->FormValue) ?>">
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_pegawai" name="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" id="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_pegawai" name="fv_gaji_tu_smagrid$x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" id="fv_gaji_tu_smagrid$x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->FormValue) ?>">
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_pegawai" name="fv_gaji_tu_smagrid$o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" id="fv_gaji_tu_smagrid$o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v_gaji_tu_sma_grid->total->Visible) { // total ?>
		<td data-name="total" <?php echo $v_gaji_tu_sma_grid->total->cellAttributes() ?>>
<?php if ($v_gaji_tu_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v_gaji_tu_sma_grid->RowCount ?>_v_gaji_tu_sma_total" class="form-group">
<input type="text" data-table="v_gaji_tu_sma" data-field="x_total" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($v_gaji_tu_sma_grid->total->getPlaceHolder()) ?>" value="<?php echo $v_gaji_tu_sma_grid->total->EditValue ?>"<?php echo $v_gaji_tu_sma_grid->total->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_total" name="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" id="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->total->OldValue) ?>">
<?php } ?>
<?php if ($v_gaji_tu_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v_gaji_tu_sma_grid->RowCount ?>_v_gaji_tu_sma_total" class="form-group">
<input type="text" data-table="v_gaji_tu_sma" data-field="x_total" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($v_gaji_tu_sma_grid->total->getPlaceHolder()) ?>" value="<?php echo $v_gaji_tu_sma_grid->total->EditValue ?>"<?php echo $v_gaji_tu_sma_grid->total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($v_gaji_tu_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v_gaji_tu_sma_grid->RowCount ?>_v_gaji_tu_sma_total">
<span<?php echo $v_gaji_tu_sma_grid->total->viewAttributes() ?>><?php echo $v_gaji_tu_sma_grid->total->getViewValue() ?></span>
</span>
<?php if (!$v_gaji_tu_sma->isConfirm()) { ?>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_total" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->total->FormValue) ?>">
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_total" name="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" id="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_total" name="fv_gaji_tu_smagrid$x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" id="fv_gaji_tu_smagrid$x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->total->FormValue) ?>">
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_total" name="fv_gaji_tu_smagrid$o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" id="fv_gaji_tu_smagrid$o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v_gaji_tu_sma_grid->rekbank->Visible) { // rekbank ?>
		<td data-name="rekbank" <?php echo $v_gaji_tu_sma_grid->rekbank->cellAttributes() ?>>
<?php if ($v_gaji_tu_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v_gaji_tu_sma_grid->RowCount ?>_v_gaji_tu_sma_rekbank" class="form-group">
<input type="text" data-table="v_gaji_tu_sma" data-field="x_rekbank" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_gaji_tu_sma_grid->rekbank->getPlaceHolder()) ?>" value="<?php echo $v_gaji_tu_sma_grid->rekbank->EditValue ?>"<?php echo $v_gaji_tu_sma_grid->rekbank->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_rekbank" name="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" id="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->rekbank->OldValue) ?>">
<?php } ?>
<?php if ($v_gaji_tu_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v_gaji_tu_sma_grid->RowCount ?>_v_gaji_tu_sma_rekbank" class="form-group">
<input type="text" data-table="v_gaji_tu_sma" data-field="x_rekbank" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_gaji_tu_sma_grid->rekbank->getPlaceHolder()) ?>" value="<?php echo $v_gaji_tu_sma_grid->rekbank->EditValue ?>"<?php echo $v_gaji_tu_sma_grid->rekbank->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($v_gaji_tu_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v_gaji_tu_sma_grid->RowCount ?>_v_gaji_tu_sma_rekbank">
<span<?php echo $v_gaji_tu_sma_grid->rekbank->viewAttributes() ?>><?php echo $v_gaji_tu_sma_grid->rekbank->getViewValue() ?></span>
</span>
<?php if (!$v_gaji_tu_sma->isConfirm()) { ?>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_rekbank" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->rekbank->FormValue) ?>">
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_rekbank" name="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" id="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->rekbank->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_rekbank" name="fv_gaji_tu_smagrid$x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" id="fv_gaji_tu_smagrid$x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->rekbank->FormValue) ?>">
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_rekbank" name="fv_gaji_tu_smagrid$o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" id="fv_gaji_tu_smagrid$o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->rekbank->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v_gaji_tu_sma_grid->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $v_gaji_tu_sma_grid->potongan->cellAttributes() ?>>
<?php if ($v_gaji_tu_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v_gaji_tu_sma_grid->RowCount ?>_v_gaji_tu_sma_potongan" class="form-group">
<input type="text" data-table="v_gaji_tu_sma" data-field="x_potongan" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($v_gaji_tu_sma_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $v_gaji_tu_sma_grid->potongan->EditValue ?>"<?php echo $v_gaji_tu_sma_grid->potongan->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_potongan" name="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" id="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->potongan->OldValue) ?>">
<?php } ?>
<?php if ($v_gaji_tu_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v_gaji_tu_sma_grid->RowCount ?>_v_gaji_tu_sma_potongan" class="form-group">
<input type="text" data-table="v_gaji_tu_sma" data-field="x_potongan" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($v_gaji_tu_sma_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $v_gaji_tu_sma_grid->potongan->EditValue ?>"<?php echo $v_gaji_tu_sma_grid->potongan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($v_gaji_tu_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v_gaji_tu_sma_grid->RowCount ?>_v_gaji_tu_sma_potongan">
<span<?php echo $v_gaji_tu_sma_grid->potongan->viewAttributes() ?>><?php echo $v_gaji_tu_sma_grid->potongan->getViewValue() ?></span>
</span>
<?php if (!$v_gaji_tu_sma->isConfirm()) { ?>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_potongan" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->potongan->FormValue) ?>">
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_potongan" name="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" id="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->potongan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_potongan" name="fv_gaji_tu_smagrid$x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" id="fv_gaji_tu_smagrid$x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->potongan->FormValue) ?>">
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_potongan" name="fv_gaji_tu_smagrid$o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" id="fv_gaji_tu_smagrid$o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->potongan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v_gaji_tu_sma_grid->ListOptions->render("body", "right", $v_gaji_tu_sma_grid->RowCount);
?>
	</tr>
<?php if ($v_gaji_tu_sma->RowType == ROWTYPE_ADD || $v_gaji_tu_sma->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fv_gaji_tu_smagrid", "load"], function() {
	fv_gaji_tu_smagrid.updateLists(<?php echo $v_gaji_tu_sma_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$v_gaji_tu_sma_grid->isGridAdd() || $v_gaji_tu_sma->CurrentMode == "copy")
		if (!$v_gaji_tu_sma_grid->Recordset->EOF)
			$v_gaji_tu_sma_grid->Recordset->moveNext();
}
?>
<?php
	if ($v_gaji_tu_sma->CurrentMode == "add" || $v_gaji_tu_sma->CurrentMode == "copy" || $v_gaji_tu_sma->CurrentMode == "edit") {
		$v_gaji_tu_sma_grid->RowIndex = '$rowindex$';
		$v_gaji_tu_sma_grid->loadRowValues();

		// Set row properties
		$v_gaji_tu_sma->resetAttributes();
		$v_gaji_tu_sma->RowAttrs->merge(["data-rowindex" => $v_gaji_tu_sma_grid->RowIndex, "id" => "r0_v_gaji_tu_sma", "data-rowtype" => ROWTYPE_ADD]);
		$v_gaji_tu_sma->RowAttrs->appendClass("ew-template");
		$v_gaji_tu_sma->RowType = ROWTYPE_ADD;

		// Render row
		$v_gaji_tu_sma_grid->renderRow();

		// Render list options
		$v_gaji_tu_sma_grid->renderListOptions();
		$v_gaji_tu_sma_grid->StartRowCount = 0;
?>
	<tr <?php echo $v_gaji_tu_sma->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_gaji_tu_sma_grid->ListOptions->render("body", "left", $v_gaji_tu_sma_grid->RowIndex);
?>
	<?php if ($v_gaji_tu_sma_grid->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai">
<?php if (!$v_gaji_tu_sma->isConfirm()) { ?>
<span id="el$rowindex$_v_gaji_tu_sma_pegawai" class="form-group v_gaji_tu_sma_pegawai">
<?php
$onchange = $v_gaji_tu_sma_grid->pegawai->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$v_gaji_tu_sma_grid->pegawai->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai">
	<input type="text" class="form-control" name="sv_x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" id="sv_x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" value="<?php echo RemoveHtml($v_gaji_tu_sma_grid->pegawai->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->getPlaceHolder()) ?>"<?php echo $v_gaji_tu_sma_grid->pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_pegawai" data-value-separator="<?php echo $v_gaji_tu_sma_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fv_gaji_tu_smagrid"], function() {
	fv_gaji_tu_smagrid.createAutoSuggest({"id":"x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai","forceSelect":false});
});
</script>
<?php echo $v_gaji_tu_sma_grid->pegawai->Lookup->getParamTag($v_gaji_tu_sma_grid, "p_x" . $v_gaji_tu_sma_grid->RowIndex . "_pegawai") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_v_gaji_tu_sma_pegawai" class="form-group v_gaji_tu_sma_pegawai">
<span<?php echo $v_gaji_tu_sma_grid->pegawai->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($v_gaji_tu_sma_grid->pegawai->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_pegawai" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_pegawai" name="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" id="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->pegawai->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v_gaji_tu_sma_grid->total->Visible) { // total ?>
		<td data-name="total">
<?php if (!$v_gaji_tu_sma->isConfirm()) { ?>
<span id="el$rowindex$_v_gaji_tu_sma_total" class="form-group v_gaji_tu_sma_total">
<input type="text" data-table="v_gaji_tu_sma" data-field="x_total" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($v_gaji_tu_sma_grid->total->getPlaceHolder()) ?>" value="<?php echo $v_gaji_tu_sma_grid->total->EditValue ?>"<?php echo $v_gaji_tu_sma_grid->total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_v_gaji_tu_sma_total" class="form-group v_gaji_tu_sma_total">
<span<?php echo $v_gaji_tu_sma_grid->total->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($v_gaji_tu_sma_grid->total->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_total" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_total" name="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" id="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v_gaji_tu_sma_grid->rekbank->Visible) { // rekbank ?>
		<td data-name="rekbank">
<?php if (!$v_gaji_tu_sma->isConfirm()) { ?>
<span id="el$rowindex$_v_gaji_tu_sma_rekbank" class="form-group v_gaji_tu_sma_rekbank">
<input type="text" data-table="v_gaji_tu_sma" data-field="x_rekbank" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_gaji_tu_sma_grid->rekbank->getPlaceHolder()) ?>" value="<?php echo $v_gaji_tu_sma_grid->rekbank->EditValue ?>"<?php echo $v_gaji_tu_sma_grid->rekbank->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_v_gaji_tu_sma_rekbank" class="form-group v_gaji_tu_sma_rekbank">
<span<?php echo $v_gaji_tu_sma_grid->rekbank->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($v_gaji_tu_sma_grid->rekbank->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_rekbank" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->rekbank->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_rekbank" name="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" id="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_rekbank" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->rekbank->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v_gaji_tu_sma_grid->potongan->Visible) { // potongan ?>
		<td data-name="potongan">
<?php if (!$v_gaji_tu_sma->isConfirm()) { ?>
<span id="el$rowindex$_v_gaji_tu_sma_potongan" class="form-group v_gaji_tu_sma_potongan">
<input type="text" data-table="v_gaji_tu_sma" data-field="x_potongan" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($v_gaji_tu_sma_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $v_gaji_tu_sma_grid->potongan->EditValue ?>"<?php echo $v_gaji_tu_sma_grid->potongan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_v_gaji_tu_sma_potongan" class="form-group v_gaji_tu_sma_potongan">
<span<?php echo $v_gaji_tu_sma_grid->potongan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($v_gaji_tu_sma_grid->potongan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_potongan" name="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" id="x<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->potongan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v_gaji_tu_sma" data-field="x_potongan" name="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" id="o<?php echo $v_gaji_tu_sma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($v_gaji_tu_sma_grid->potongan->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v_gaji_tu_sma_grid->ListOptions->render("body", "right", $v_gaji_tu_sma_grid->RowIndex);
?>
<script>
loadjs.ready(["fv_gaji_tu_smagrid", "load"], function() {
	fv_gaji_tu_smagrid.updateLists(<?php echo $v_gaji_tu_sma_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($v_gaji_tu_sma->CurrentMode == "add" || $v_gaji_tu_sma->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $v_gaji_tu_sma_grid->FormKeyCountName ?>" id="<?php echo $v_gaji_tu_sma_grid->FormKeyCountName ?>" value="<?php echo $v_gaji_tu_sma_grid->KeyCount ?>">
<?php echo $v_gaji_tu_sma_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($v_gaji_tu_sma->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $v_gaji_tu_sma_grid->FormKeyCountName ?>" id="<?php echo $v_gaji_tu_sma_grid->FormKeyCountName ?>" value="<?php echo $v_gaji_tu_sma_grid->KeyCount ?>">
<?php echo $v_gaji_tu_sma_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($v_gaji_tu_sma->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fv_gaji_tu_smagrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v_gaji_tu_sma_grid->Recordset)
	$v_gaji_tu_sma_grid->Recordset->Close();
?>
<?php if ($v_gaji_tu_sma_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $v_gaji_tu_sma_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v_gaji_tu_sma_grid->TotalRecords == 0 && !$v_gaji_tu_sma->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v_gaji_tu_sma_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$v_gaji_tu_sma_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$v_gaji_tu_sma_grid->terminate();
?>