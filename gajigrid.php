<?php
namespace PHPMaker2020\sigap;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($gaji_grid))
	$gaji_grid = new gaji_grid();

// Run the page
$gaji_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_grid->Page_Render();
?>
<?php if (!$gaji_grid->isExport()) { ?>
<script>
var fgajigrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fgajigrid = new ew.Form("fgajigrid", "grid");
	fgajigrid.formKeyCountName = '<?php echo $gaji_grid->FormKeyCountName ?>';

	// Validate form
	fgajigrid.validate = function() {
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
			<?php if ($gaji_grid->pegawai->Required) { ?>
				elm = this.getElements("x" + infix + "_pegawai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_grid->pegawai->caption(), $gaji_grid->pegawai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($gaji_grid->sub_total->Required) { ?>
				elm = this.getElements("x" + infix + "_sub_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_grid->sub_total->caption(), $gaji_grid->sub_total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sub_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_grid->sub_total->errorMessage()) ?>");
			<?php if ($gaji_grid->potongan->Required) { ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_grid->potongan->caption(), $gaji_grid->potongan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_grid->potongan->errorMessage()) ?>");
			<?php if ($gaji_grid->penyesuaian->Required) { ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_grid->penyesuaian->caption(), $gaji_grid->penyesuaian->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_grid->penyesuaian->errorMessage()) ?>");
			<?php if ($gaji_grid->potongan_bendahara->Required) { ?>
				elm = this.getElements("x" + infix + "_potongan_bendahara");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_grid->potongan_bendahara->caption(), $gaji_grid->potongan_bendahara->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_potongan_bendahara");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_grid->potongan_bendahara->errorMessage()) ?>");
			<?php if ($gaji_grid->total->Required) { ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_grid->total->caption(), $gaji_grid->total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_grid->total->errorMessage()) ?>");
			<?php if ($gaji_grid->voucher->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_grid->voucher->caption(), $gaji_grid->voucher->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_grid->voucher->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fgajigrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "pegawai", false)) return false;
		if (ew.valueChanged(fobj, infix, "sub_total", false)) return false;
		if (ew.valueChanged(fobj, infix, "potongan", false)) return false;
		if (ew.valueChanged(fobj, infix, "penyesuaian", false)) return false;
		if (ew.valueChanged(fobj, infix, "potongan_bendahara", false)) return false;
		if (ew.valueChanged(fobj, infix, "total", false)) return false;
		if (ew.valueChanged(fobj, infix, "voucher", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fgajigrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fgajigrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fgajigrid.lists["x_pegawai"] = <?php echo $gaji_grid->pegawai->Lookup->toClientList($gaji_grid) ?>;
	fgajigrid.lists["x_pegawai"].options = <?php echo JsonEncode($gaji_grid->pegawai->lookupOptions()) ?>;
	loadjs.done("fgajigrid");
});
</script>
<?php } ?>
<?php
$gaji_grid->renderOtherOptions();
?>
<?php if ($gaji_grid->TotalRecords > 0 || $gaji->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($gaji_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> gaji">
<?php if ($gaji_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $gaji_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fgajigrid" class="ew-form ew-list-form form-inline">
<div id="gmp_gaji" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_gajigrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$gaji->RowType = ROWTYPE_HEADER;

// Render list options
$gaji_grid->renderListOptions();

// Render list options (header, left)
$gaji_grid->ListOptions->render("header", "left");
?>
<?php if ($gaji_grid->pegawai->Visible) { // pegawai ?>
	<?php if ($gaji_grid->SortUrl($gaji_grid->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $gaji_grid->pegawai->headerCellClass() ?>"><div id="elh_gaji_pegawai" class="gaji_pegawai"><div class="ew-table-header-caption"><?php echo $gaji_grid->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $gaji_grid->pegawai->headerCellClass() ?>"><div><div id="elh_gaji_pegawai" class="gaji_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_grid->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_grid->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_grid->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_grid->sub_total->Visible) { // sub_total ?>
	<?php if ($gaji_grid->SortUrl($gaji_grid->sub_total) == "") { ?>
		<th data-name="sub_total" class="<?php echo $gaji_grid->sub_total->headerCellClass() ?>"><div id="elh_gaji_sub_total" class="gaji_sub_total"><div class="ew-table-header-caption"><?php echo $gaji_grid->sub_total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sub_total" class="<?php echo $gaji_grid->sub_total->headerCellClass() ?>"><div><div id="elh_gaji_sub_total" class="gaji_sub_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_grid->sub_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_grid->sub_total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_grid->sub_total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_grid->potongan->Visible) { // potongan ?>
	<?php if ($gaji_grid->SortUrl($gaji_grid->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $gaji_grid->potongan->headerCellClass() ?>"><div id="elh_gaji_potongan" class="gaji_potongan"><div class="ew-table-header-caption"><?php echo $gaji_grid->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $gaji_grid->potongan->headerCellClass() ?>"><div><div id="elh_gaji_potongan" class="gaji_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_grid->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_grid->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_grid->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_grid->penyesuaian->Visible) { // penyesuaian ?>
	<?php if ($gaji_grid->SortUrl($gaji_grid->penyesuaian) == "") { ?>
		<th data-name="penyesuaian" class="<?php echo $gaji_grid->penyesuaian->headerCellClass() ?>"><div id="elh_gaji_penyesuaian" class="gaji_penyesuaian"><div class="ew-table-header-caption"><?php echo $gaji_grid->penyesuaian->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="penyesuaian" class="<?php echo $gaji_grid->penyesuaian->headerCellClass() ?>"><div><div id="elh_gaji_penyesuaian" class="gaji_penyesuaian">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_grid->penyesuaian->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_grid->penyesuaian->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_grid->penyesuaian->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_grid->potongan_bendahara->Visible) { // potongan_bendahara ?>
	<?php if ($gaji_grid->SortUrl($gaji_grid->potongan_bendahara) == "") { ?>
		<th data-name="potongan_bendahara" class="<?php echo $gaji_grid->potongan_bendahara->headerCellClass() ?>"><div id="elh_gaji_potongan_bendahara" class="gaji_potongan_bendahara"><div class="ew-table-header-caption"><?php echo $gaji_grid->potongan_bendahara->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan_bendahara" class="<?php echo $gaji_grid->potongan_bendahara->headerCellClass() ?>"><div><div id="elh_gaji_potongan_bendahara" class="gaji_potongan_bendahara">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_grid->potongan_bendahara->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_grid->potongan_bendahara->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_grid->potongan_bendahara->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_grid->total->Visible) { // total ?>
	<?php if ($gaji_grid->SortUrl($gaji_grid->total) == "") { ?>
		<th data-name="total" class="<?php echo $gaji_grid->total->headerCellClass() ?>"><div id="elh_gaji_total" class="gaji_total"><div class="ew-table-header-caption"><?php echo $gaji_grid->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $gaji_grid->total->headerCellClass() ?>"><div><div id="elh_gaji_total" class="gaji_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_grid->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_grid->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_grid->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_grid->voucher->Visible) { // voucher ?>
	<?php if ($gaji_grid->SortUrl($gaji_grid->voucher) == "") { ?>
		<th data-name="voucher" class="<?php echo $gaji_grid->voucher->headerCellClass() ?>"><div id="elh_gaji_voucher" class="gaji_voucher"><div class="ew-table-header-caption"><?php echo $gaji_grid->voucher->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher" class="<?php echo $gaji_grid->voucher->headerCellClass() ?>"><div><div id="elh_gaji_voucher" class="gaji_voucher">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_grid->voucher->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_grid->voucher->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_grid->voucher->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$gaji_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$gaji_grid->StartRecord = 1;
$gaji_grid->StopRecord = $gaji_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($gaji->isConfirm() || $gaji_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($gaji_grid->FormKeyCountName) && ($gaji_grid->isGridAdd() || $gaji_grid->isGridEdit() || $gaji->isConfirm())) {
		$gaji_grid->KeyCount = $CurrentForm->getValue($gaji_grid->FormKeyCountName);
		$gaji_grid->StopRecord = $gaji_grid->StartRecord + $gaji_grid->KeyCount - 1;
	}
}
$gaji_grid->RecordCount = $gaji_grid->StartRecord - 1;
if ($gaji_grid->Recordset && !$gaji_grid->Recordset->EOF) {
	$gaji_grid->Recordset->moveFirst();
	$selectLimit = $gaji_grid->UseSelectLimit;
	if (!$selectLimit && $gaji_grid->StartRecord > 1)
		$gaji_grid->Recordset->move($gaji_grid->StartRecord - 1);
} elseif (!$gaji->AllowAddDeleteRow && $gaji_grid->StopRecord == 0) {
	$gaji_grid->StopRecord = $gaji->GridAddRowCount;
}

// Initialize aggregate
$gaji->RowType = ROWTYPE_AGGREGATEINIT;
$gaji->resetAttributes();
$gaji_grid->renderRow();
if ($gaji_grid->isGridAdd())
	$gaji_grid->RowIndex = 0;
if ($gaji_grid->isGridEdit())
	$gaji_grid->RowIndex = 0;
while ($gaji_grid->RecordCount < $gaji_grid->StopRecord) {
	$gaji_grid->RecordCount++;
	if ($gaji_grid->RecordCount >= $gaji_grid->StartRecord) {
		$gaji_grid->RowCount++;
		if ($gaji_grid->isGridAdd() || $gaji_grid->isGridEdit() || $gaji->isConfirm()) {
			$gaji_grid->RowIndex++;
			$CurrentForm->Index = $gaji_grid->RowIndex;
			if ($CurrentForm->hasValue($gaji_grid->FormActionName) && ($gaji->isConfirm() || $gaji_grid->EventCancelled))
				$gaji_grid->RowAction = strval($CurrentForm->getValue($gaji_grid->FormActionName));
			elseif ($gaji_grid->isGridAdd())
				$gaji_grid->RowAction = "insert";
			else
				$gaji_grid->RowAction = "";
		}

		// Set up key count
		$gaji_grid->KeyCount = $gaji_grid->RowIndex;

		// Init row class and style
		$gaji->resetAttributes();
		$gaji->CssClass = "";
		if ($gaji_grid->isGridAdd()) {
			if ($gaji->CurrentMode == "copy") {
				$gaji_grid->loadRowValues($gaji_grid->Recordset); // Load row values
				$gaji_grid->setRecordKey($gaji_grid->RowOldKey, $gaji_grid->Recordset); // Set old record key
			} else {
				$gaji_grid->loadRowValues(); // Load default values
				$gaji_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$gaji_grid->loadRowValues($gaji_grid->Recordset); // Load row values
		}
		$gaji->RowType = ROWTYPE_VIEW; // Render view
		if ($gaji_grid->isGridAdd()) // Grid add
			$gaji->RowType = ROWTYPE_ADD; // Render add
		if ($gaji_grid->isGridAdd() && $gaji->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$gaji_grid->restoreCurrentRowFormValues($gaji_grid->RowIndex); // Restore form values
		if ($gaji_grid->isGridEdit()) { // Grid edit
			if ($gaji->EventCancelled)
				$gaji_grid->restoreCurrentRowFormValues($gaji_grid->RowIndex); // Restore form values
			if ($gaji_grid->RowAction == "insert")
				$gaji->RowType = ROWTYPE_ADD; // Render add
			else
				$gaji->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($gaji_grid->isGridEdit() && ($gaji->RowType == ROWTYPE_EDIT || $gaji->RowType == ROWTYPE_ADD) && $gaji->EventCancelled) // Update failed
			$gaji_grid->restoreCurrentRowFormValues($gaji_grid->RowIndex); // Restore form values
		if ($gaji->RowType == ROWTYPE_EDIT) // Edit row
			$gaji_grid->EditRowCount++;
		if ($gaji->isConfirm()) // Confirm row
			$gaji_grid->restoreCurrentRowFormValues($gaji_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$gaji->RowAttrs->merge(["data-rowindex" => $gaji_grid->RowCount, "id" => "r" . $gaji_grid->RowCount . "_gaji", "data-rowtype" => $gaji->RowType]);

		// Render row
		$gaji_grid->renderRow();

		// Render list options
		$gaji_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($gaji_grid->RowAction != "delete" && $gaji_grid->RowAction != "insertdelete" && !($gaji_grid->RowAction == "insert" && $gaji->isConfirm() && $gaji_grid->emptyRow())) {
?>
	<tr <?php echo $gaji->rowAttributes() ?>>
<?php

// Render list options (body, left)
$gaji_grid->ListOptions->render("body", "left", $gaji_grid->RowCount);
?>
	<?php if ($gaji_grid->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $gaji_grid->pegawai->cellAttributes() ?>>
<?php if ($gaji->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_pegawai" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $gaji_grid->RowIndex ?>_pegawai"><?php echo EmptyValue(strval($gaji_grid->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $gaji_grid->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($gaji_grid->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($gaji_grid->pegawai->ReadOnly || $gaji_grid->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $gaji_grid->RowIndex ?>_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $gaji_grid->pegawai->Lookup->getParamTag($gaji_grid, "p_x" . $gaji_grid->RowIndex . "_pegawai") ?>
<input type="hidden" data-table="gaji" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $gaji_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $gaji_grid->RowIndex ?>_pegawai" id="x<?php echo $gaji_grid->RowIndex ?>_pegawai" value="<?php echo $gaji_grid->pegawai->CurrentValue ?>"<?php echo $gaji_grid->pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji" data-field="x_pegawai" name="o<?php echo $gaji_grid->RowIndex ?>_pegawai" id="o<?php echo $gaji_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($gaji_grid->pegawai->OldValue) ?>">
<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_pegawai" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $gaji_grid->RowIndex ?>_pegawai"><?php echo EmptyValue(strval($gaji_grid->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $gaji_grid->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($gaji_grid->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($gaji_grid->pegawai->ReadOnly || $gaji_grid->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $gaji_grid->RowIndex ?>_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $gaji_grid->pegawai->Lookup->getParamTag($gaji_grid, "p_x" . $gaji_grid->RowIndex . "_pegawai") ?>
<input type="hidden" data-table="gaji" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $gaji_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $gaji_grid->RowIndex ?>_pegawai" id="x<?php echo $gaji_grid->RowIndex ?>_pegawai" value="<?php echo $gaji_grid->pegawai->CurrentValue ?>"<?php echo $gaji_grid->pegawai->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_pegawai">
<span<?php echo $gaji_grid->pegawai->viewAttributes() ?>><?php echo $gaji_grid->pegawai->getViewValue() ?></span>
</span>
<?php if (!$gaji->isConfirm()) { ?>
<input type="hidden" data-table="gaji" data-field="x_pegawai" name="x<?php echo $gaji_grid->RowIndex ?>_pegawai" id="x<?php echo $gaji_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($gaji_grid->pegawai->FormValue) ?>">
<input type="hidden" data-table="gaji" data-field="x_pegawai" name="o<?php echo $gaji_grid->RowIndex ?>_pegawai" id="o<?php echo $gaji_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($gaji_grid->pegawai->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji" data-field="x_pegawai" name="fgajigrid$x<?php echo $gaji_grid->RowIndex ?>_pegawai" id="fgajigrid$x<?php echo $gaji_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($gaji_grid->pegawai->FormValue) ?>">
<input type="hidden" data-table="gaji" data-field="x_pegawai" name="fgajigrid$o<?php echo $gaji_grid->RowIndex ?>_pegawai" id="fgajigrid$o<?php echo $gaji_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($gaji_grid->pegawai->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="gaji" data-field="x_id" name="x<?php echo $gaji_grid->RowIndex ?>_id" id="x<?php echo $gaji_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($gaji_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="gaji" data-field="x_id" name="o<?php echo $gaji_grid->RowIndex ?>_id" id="o<?php echo $gaji_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($gaji_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_EDIT || $gaji->CurrentMode == "edit") { ?>
<input type="hidden" data-table="gaji" data-field="x_id" name="x<?php echo $gaji_grid->RowIndex ?>_id" id="x<?php echo $gaji_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($gaji_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($gaji_grid->sub_total->Visible) { // sub_total ?>
		<td data-name="sub_total" <?php echo $gaji_grid->sub_total->cellAttributes() ?>>
<?php if ($gaji->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_sub_total" class="form-group">
<input type="text" data-table="gaji" data-field="x_sub_total" name="x<?php echo $gaji_grid->RowIndex ?>_sub_total" id="x<?php echo $gaji_grid->RowIndex ?>_sub_total" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->sub_total->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->sub_total->EditValue ?>"<?php echo $gaji_grid->sub_total->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji" data-field="x_sub_total" name="o<?php echo $gaji_grid->RowIndex ?>_sub_total" id="o<?php echo $gaji_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($gaji_grid->sub_total->OldValue) ?>">
<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_sub_total" class="form-group">
<input type="text" data-table="gaji" data-field="x_sub_total" name="x<?php echo $gaji_grid->RowIndex ?>_sub_total" id="x<?php echo $gaji_grid->RowIndex ?>_sub_total" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->sub_total->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->sub_total->EditValue ?>"<?php echo $gaji_grid->sub_total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_sub_total">
<span<?php echo $gaji_grid->sub_total->viewAttributes() ?>><?php echo $gaji_grid->sub_total->getViewValue() ?></span>
</span>
<?php if (!$gaji->isConfirm()) { ?>
<input type="hidden" data-table="gaji" data-field="x_sub_total" name="x<?php echo $gaji_grid->RowIndex ?>_sub_total" id="x<?php echo $gaji_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($gaji_grid->sub_total->FormValue) ?>">
<input type="hidden" data-table="gaji" data-field="x_sub_total" name="o<?php echo $gaji_grid->RowIndex ?>_sub_total" id="o<?php echo $gaji_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($gaji_grid->sub_total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji" data-field="x_sub_total" name="fgajigrid$x<?php echo $gaji_grid->RowIndex ?>_sub_total" id="fgajigrid$x<?php echo $gaji_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($gaji_grid->sub_total->FormValue) ?>">
<input type="hidden" data-table="gaji" data-field="x_sub_total" name="fgajigrid$o<?php echo $gaji_grid->RowIndex ?>_sub_total" id="fgajigrid$o<?php echo $gaji_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($gaji_grid->sub_total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_grid->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $gaji_grid->potongan->cellAttributes() ?>>
<?php if ($gaji->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_potongan" class="form-group">
<input type="text" data-table="gaji" data-field="x_potongan" name="x<?php echo $gaji_grid->RowIndex ?>_potongan" id="x<?php echo $gaji_grid->RowIndex ?>_potongan" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->potongan->EditValue ?>"<?php echo $gaji_grid->potongan->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji" data-field="x_potongan" name="o<?php echo $gaji_grid->RowIndex ?>_potongan" id="o<?php echo $gaji_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($gaji_grid->potongan->OldValue) ?>">
<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_potongan" class="form-group">
<input type="text" data-table="gaji" data-field="x_potongan" name="x<?php echo $gaji_grid->RowIndex ?>_potongan" id="x<?php echo $gaji_grid->RowIndex ?>_potongan" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->potongan->EditValue ?>"<?php echo $gaji_grid->potongan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_potongan">
<span<?php echo $gaji_grid->potongan->viewAttributes() ?>><?php echo $gaji_grid->potongan->getViewValue() ?></span>
</span>
<?php if (!$gaji->isConfirm()) { ?>
<input type="hidden" data-table="gaji" data-field="x_potongan" name="x<?php echo $gaji_grid->RowIndex ?>_potongan" id="x<?php echo $gaji_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($gaji_grid->potongan->FormValue) ?>">
<input type="hidden" data-table="gaji" data-field="x_potongan" name="o<?php echo $gaji_grid->RowIndex ?>_potongan" id="o<?php echo $gaji_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($gaji_grid->potongan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji" data-field="x_potongan" name="fgajigrid$x<?php echo $gaji_grid->RowIndex ?>_potongan" id="fgajigrid$x<?php echo $gaji_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($gaji_grid->potongan->FormValue) ?>">
<input type="hidden" data-table="gaji" data-field="x_potongan" name="fgajigrid$o<?php echo $gaji_grid->RowIndex ?>_potongan" id="fgajigrid$o<?php echo $gaji_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($gaji_grid->potongan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_grid->penyesuaian->Visible) { // penyesuaian ?>
		<td data-name="penyesuaian" <?php echo $gaji_grid->penyesuaian->cellAttributes() ?>>
<?php if ($gaji->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_penyesuaian" class="form-group">
<input type="text" data-table="gaji" data-field="x_penyesuaian" name="x<?php echo $gaji_grid->RowIndex ?>_penyesuaian" id="x<?php echo $gaji_grid->RowIndex ?>_penyesuaian" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->penyesuaian->EditValue ?>"<?php echo $gaji_grid->penyesuaian->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji" data-field="x_penyesuaian" name="o<?php echo $gaji_grid->RowIndex ?>_penyesuaian" id="o<?php echo $gaji_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($gaji_grid->penyesuaian->OldValue) ?>">
<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_penyesuaian" class="form-group">
<input type="text" data-table="gaji" data-field="x_penyesuaian" name="x<?php echo $gaji_grid->RowIndex ?>_penyesuaian" id="x<?php echo $gaji_grid->RowIndex ?>_penyesuaian" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->penyesuaian->EditValue ?>"<?php echo $gaji_grid->penyesuaian->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_penyesuaian">
<span<?php echo $gaji_grid->penyesuaian->viewAttributes() ?>><?php echo $gaji_grid->penyesuaian->getViewValue() ?></span>
</span>
<?php if (!$gaji->isConfirm()) { ?>
<input type="hidden" data-table="gaji" data-field="x_penyesuaian" name="x<?php echo $gaji_grid->RowIndex ?>_penyesuaian" id="x<?php echo $gaji_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($gaji_grid->penyesuaian->FormValue) ?>">
<input type="hidden" data-table="gaji" data-field="x_penyesuaian" name="o<?php echo $gaji_grid->RowIndex ?>_penyesuaian" id="o<?php echo $gaji_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($gaji_grid->penyesuaian->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji" data-field="x_penyesuaian" name="fgajigrid$x<?php echo $gaji_grid->RowIndex ?>_penyesuaian" id="fgajigrid$x<?php echo $gaji_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($gaji_grid->penyesuaian->FormValue) ?>">
<input type="hidden" data-table="gaji" data-field="x_penyesuaian" name="fgajigrid$o<?php echo $gaji_grid->RowIndex ?>_penyesuaian" id="fgajigrid$o<?php echo $gaji_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($gaji_grid->penyesuaian->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_grid->potongan_bendahara->Visible) { // potongan_bendahara ?>
		<td data-name="potongan_bendahara" <?php echo $gaji_grid->potongan_bendahara->cellAttributes() ?>>
<?php if ($gaji->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_potongan_bendahara" class="form-group">
<input type="text" data-table="gaji" data-field="x_potongan_bendahara" name="x<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" id="x<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->potongan_bendahara->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->potongan_bendahara->EditValue ?>"<?php echo $gaji_grid->potongan_bendahara->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji" data-field="x_potongan_bendahara" name="o<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" id="o<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" value="<?php echo HtmlEncode($gaji_grid->potongan_bendahara->OldValue) ?>">
<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_potongan_bendahara" class="form-group">
<input type="text" data-table="gaji" data-field="x_potongan_bendahara" name="x<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" id="x<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->potongan_bendahara->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->potongan_bendahara->EditValue ?>"<?php echo $gaji_grid->potongan_bendahara->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_potongan_bendahara">
<span<?php echo $gaji_grid->potongan_bendahara->viewAttributes() ?>><?php echo $gaji_grid->potongan_bendahara->getViewValue() ?></span>
</span>
<?php if (!$gaji->isConfirm()) { ?>
<input type="hidden" data-table="gaji" data-field="x_potongan_bendahara" name="x<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" id="x<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" value="<?php echo HtmlEncode($gaji_grid->potongan_bendahara->FormValue) ?>">
<input type="hidden" data-table="gaji" data-field="x_potongan_bendahara" name="o<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" id="o<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" value="<?php echo HtmlEncode($gaji_grid->potongan_bendahara->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji" data-field="x_potongan_bendahara" name="fgajigrid$x<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" id="fgajigrid$x<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" value="<?php echo HtmlEncode($gaji_grid->potongan_bendahara->FormValue) ?>">
<input type="hidden" data-table="gaji" data-field="x_potongan_bendahara" name="fgajigrid$o<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" id="fgajigrid$o<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" value="<?php echo HtmlEncode($gaji_grid->potongan_bendahara->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_grid->total->Visible) { // total ?>
		<td data-name="total" <?php echo $gaji_grid->total->cellAttributes() ?>>
<?php if ($gaji->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_total" class="form-group">
<input type="text" data-table="gaji" data-field="x_total" name="x<?php echo $gaji_grid->RowIndex ?>_total" id="x<?php echo $gaji_grid->RowIndex ?>_total" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->total->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->total->EditValue ?>"<?php echo $gaji_grid->total->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji" data-field="x_total" name="o<?php echo $gaji_grid->RowIndex ?>_total" id="o<?php echo $gaji_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($gaji_grid->total->OldValue) ?>">
<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_total" class="form-group">
<input type="text" data-table="gaji" data-field="x_total" name="x<?php echo $gaji_grid->RowIndex ?>_total" id="x<?php echo $gaji_grid->RowIndex ?>_total" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->total->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->total->EditValue ?>"<?php echo $gaji_grid->total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_total">
<span<?php echo $gaji_grid->total->viewAttributes() ?>><?php echo $gaji_grid->total->getViewValue() ?></span>
</span>
<?php if (!$gaji->isConfirm()) { ?>
<input type="hidden" data-table="gaji" data-field="x_total" name="x<?php echo $gaji_grid->RowIndex ?>_total" id="x<?php echo $gaji_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($gaji_grid->total->FormValue) ?>">
<input type="hidden" data-table="gaji" data-field="x_total" name="o<?php echo $gaji_grid->RowIndex ?>_total" id="o<?php echo $gaji_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($gaji_grid->total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji" data-field="x_total" name="fgajigrid$x<?php echo $gaji_grid->RowIndex ?>_total" id="fgajigrid$x<?php echo $gaji_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($gaji_grid->total->FormValue) ?>">
<input type="hidden" data-table="gaji" data-field="x_total" name="fgajigrid$o<?php echo $gaji_grid->RowIndex ?>_total" id="fgajigrid$o<?php echo $gaji_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($gaji_grid->total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_grid->voucher->Visible) { // voucher ?>
		<td data-name="voucher" <?php echo $gaji_grid->voucher->cellAttributes() ?>>
<?php if ($gaji->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_voucher" class="form-group">
<input type="text" data-table="gaji" data-field="x_voucher" name="x<?php echo $gaji_grid->RowIndex ?>_voucher" id="x<?php echo $gaji_grid->RowIndex ?>_voucher" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->voucher->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->voucher->EditValue ?>"<?php echo $gaji_grid->voucher->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji" data-field="x_voucher" name="o<?php echo $gaji_grid->RowIndex ?>_voucher" id="o<?php echo $gaji_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($gaji_grid->voucher->OldValue) ?>">
<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_voucher" class="form-group">
<input type="text" data-table="gaji" data-field="x_voucher" name="x<?php echo $gaji_grid->RowIndex ?>_voucher" id="x<?php echo $gaji_grid->RowIndex ?>_voucher" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->voucher->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->voucher->EditValue ?>"<?php echo $gaji_grid->voucher->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_grid->RowCount ?>_gaji_voucher">
<span<?php echo $gaji_grid->voucher->viewAttributes() ?>><?php echo $gaji_grid->voucher->getViewValue() ?></span>
</span>
<?php if (!$gaji->isConfirm()) { ?>
<input type="hidden" data-table="gaji" data-field="x_voucher" name="x<?php echo $gaji_grid->RowIndex ?>_voucher" id="x<?php echo $gaji_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($gaji_grid->voucher->FormValue) ?>">
<input type="hidden" data-table="gaji" data-field="x_voucher" name="o<?php echo $gaji_grid->RowIndex ?>_voucher" id="o<?php echo $gaji_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($gaji_grid->voucher->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji" data-field="x_voucher" name="fgajigrid$x<?php echo $gaji_grid->RowIndex ?>_voucher" id="fgajigrid$x<?php echo $gaji_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($gaji_grid->voucher->FormValue) ?>">
<input type="hidden" data-table="gaji" data-field="x_voucher" name="fgajigrid$o<?php echo $gaji_grid->RowIndex ?>_voucher" id="fgajigrid$o<?php echo $gaji_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($gaji_grid->voucher->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$gaji_grid->ListOptions->render("body", "right", $gaji_grid->RowCount);
?>
	</tr>
<?php if ($gaji->RowType == ROWTYPE_ADD || $gaji->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fgajigrid", "load"], function() {
	fgajigrid.updateLists(<?php echo $gaji_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$gaji_grid->isGridAdd() || $gaji->CurrentMode == "copy")
		if (!$gaji_grid->Recordset->EOF)
			$gaji_grid->Recordset->moveNext();
}
?>
<?php
	if ($gaji->CurrentMode == "add" || $gaji->CurrentMode == "copy" || $gaji->CurrentMode == "edit") {
		$gaji_grid->RowIndex = '$rowindex$';
		$gaji_grid->loadRowValues();

		// Set row properties
		$gaji->resetAttributes();
		$gaji->RowAttrs->merge(["data-rowindex" => $gaji_grid->RowIndex, "id" => "r0_gaji", "data-rowtype" => ROWTYPE_ADD]);
		$gaji->RowAttrs->appendClass("ew-template");
		$gaji->RowType = ROWTYPE_ADD;

		// Render row
		$gaji_grid->renderRow();

		// Render list options
		$gaji_grid->renderListOptions();
		$gaji_grid->StartRowCount = 0;
?>
	<tr <?php echo $gaji->rowAttributes() ?>>
<?php

// Render list options (body, left)
$gaji_grid->ListOptions->render("body", "left", $gaji_grid->RowIndex);
?>
	<?php if ($gaji_grid->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai">
<?php if (!$gaji->isConfirm()) { ?>
<span id="el$rowindex$_gaji_pegawai" class="form-group gaji_pegawai">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $gaji_grid->RowIndex ?>_pegawai"><?php echo EmptyValue(strval($gaji_grid->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $gaji_grid->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($gaji_grid->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($gaji_grid->pegawai->ReadOnly || $gaji_grid->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $gaji_grid->RowIndex ?>_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $gaji_grid->pegawai->Lookup->getParamTag($gaji_grid, "p_x" . $gaji_grid->RowIndex . "_pegawai") ?>
<input type="hidden" data-table="gaji" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $gaji_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $gaji_grid->RowIndex ?>_pegawai" id="x<?php echo $gaji_grid->RowIndex ?>_pegawai" value="<?php echo $gaji_grid->pegawai->CurrentValue ?>"<?php echo $gaji_grid->pegawai->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_pegawai" class="form-group gaji_pegawai">
<span<?php echo $gaji_grid->pegawai->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_grid->pegawai->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji" data-field="x_pegawai" name="x<?php echo $gaji_grid->RowIndex ?>_pegawai" id="x<?php echo $gaji_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($gaji_grid->pegawai->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji" data-field="x_pegawai" name="o<?php echo $gaji_grid->RowIndex ?>_pegawai" id="o<?php echo $gaji_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($gaji_grid->pegawai->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_grid->sub_total->Visible) { // sub_total ?>
		<td data-name="sub_total">
<?php if (!$gaji->isConfirm()) { ?>
<span id="el$rowindex$_gaji_sub_total" class="form-group gaji_sub_total">
<input type="text" data-table="gaji" data-field="x_sub_total" name="x<?php echo $gaji_grid->RowIndex ?>_sub_total" id="x<?php echo $gaji_grid->RowIndex ?>_sub_total" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->sub_total->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->sub_total->EditValue ?>"<?php echo $gaji_grid->sub_total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_sub_total" class="form-group gaji_sub_total">
<span<?php echo $gaji_grid->sub_total->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_grid->sub_total->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji" data-field="x_sub_total" name="x<?php echo $gaji_grid->RowIndex ?>_sub_total" id="x<?php echo $gaji_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($gaji_grid->sub_total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji" data-field="x_sub_total" name="o<?php echo $gaji_grid->RowIndex ?>_sub_total" id="o<?php echo $gaji_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($gaji_grid->sub_total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_grid->potongan->Visible) { // potongan ?>
		<td data-name="potongan">
<?php if (!$gaji->isConfirm()) { ?>
<span id="el$rowindex$_gaji_potongan" class="form-group gaji_potongan">
<input type="text" data-table="gaji" data-field="x_potongan" name="x<?php echo $gaji_grid->RowIndex ?>_potongan" id="x<?php echo $gaji_grid->RowIndex ?>_potongan" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->potongan->EditValue ?>"<?php echo $gaji_grid->potongan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_potongan" class="form-group gaji_potongan">
<span<?php echo $gaji_grid->potongan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_grid->potongan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji" data-field="x_potongan" name="x<?php echo $gaji_grid->RowIndex ?>_potongan" id="x<?php echo $gaji_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($gaji_grid->potongan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji" data-field="x_potongan" name="o<?php echo $gaji_grid->RowIndex ?>_potongan" id="o<?php echo $gaji_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($gaji_grid->potongan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_grid->penyesuaian->Visible) { // penyesuaian ?>
		<td data-name="penyesuaian">
<?php if (!$gaji->isConfirm()) { ?>
<span id="el$rowindex$_gaji_penyesuaian" class="form-group gaji_penyesuaian">
<input type="text" data-table="gaji" data-field="x_penyesuaian" name="x<?php echo $gaji_grid->RowIndex ?>_penyesuaian" id="x<?php echo $gaji_grid->RowIndex ?>_penyesuaian" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->penyesuaian->EditValue ?>"<?php echo $gaji_grid->penyesuaian->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_penyesuaian" class="form-group gaji_penyesuaian">
<span<?php echo $gaji_grid->penyesuaian->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_grid->penyesuaian->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji" data-field="x_penyesuaian" name="x<?php echo $gaji_grid->RowIndex ?>_penyesuaian" id="x<?php echo $gaji_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($gaji_grid->penyesuaian->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji" data-field="x_penyesuaian" name="o<?php echo $gaji_grid->RowIndex ?>_penyesuaian" id="o<?php echo $gaji_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($gaji_grid->penyesuaian->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_grid->potongan_bendahara->Visible) { // potongan_bendahara ?>
		<td data-name="potongan_bendahara">
<?php if (!$gaji->isConfirm()) { ?>
<span id="el$rowindex$_gaji_potongan_bendahara" class="form-group gaji_potongan_bendahara">
<input type="text" data-table="gaji" data-field="x_potongan_bendahara" name="x<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" id="x<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->potongan_bendahara->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->potongan_bendahara->EditValue ?>"<?php echo $gaji_grid->potongan_bendahara->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_potongan_bendahara" class="form-group gaji_potongan_bendahara">
<span<?php echo $gaji_grid->potongan_bendahara->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_grid->potongan_bendahara->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji" data-field="x_potongan_bendahara" name="x<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" id="x<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" value="<?php echo HtmlEncode($gaji_grid->potongan_bendahara->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji" data-field="x_potongan_bendahara" name="o<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" id="o<?php echo $gaji_grid->RowIndex ?>_potongan_bendahara" value="<?php echo HtmlEncode($gaji_grid->potongan_bendahara->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_grid->total->Visible) { // total ?>
		<td data-name="total">
<?php if (!$gaji->isConfirm()) { ?>
<span id="el$rowindex$_gaji_total" class="form-group gaji_total">
<input type="text" data-table="gaji" data-field="x_total" name="x<?php echo $gaji_grid->RowIndex ?>_total" id="x<?php echo $gaji_grid->RowIndex ?>_total" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->total->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->total->EditValue ?>"<?php echo $gaji_grid->total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_total" class="form-group gaji_total">
<span<?php echo $gaji_grid->total->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_grid->total->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji" data-field="x_total" name="x<?php echo $gaji_grid->RowIndex ?>_total" id="x<?php echo $gaji_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($gaji_grid->total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji" data-field="x_total" name="o<?php echo $gaji_grid->RowIndex ?>_total" id="o<?php echo $gaji_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($gaji_grid->total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_grid->voucher->Visible) { // voucher ?>
		<td data-name="voucher">
<?php if (!$gaji->isConfirm()) { ?>
<span id="el$rowindex$_gaji_voucher" class="form-group gaji_voucher">
<input type="text" data-table="gaji" data-field="x_voucher" name="x<?php echo $gaji_grid->RowIndex ?>_voucher" id="x<?php echo $gaji_grid->RowIndex ?>_voucher" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_grid->voucher->getPlaceHolder()) ?>" value="<?php echo $gaji_grid->voucher->EditValue ?>"<?php echo $gaji_grid->voucher->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_voucher" class="form-group gaji_voucher">
<span<?php echo $gaji_grid->voucher->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_grid->voucher->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji" data-field="x_voucher" name="x<?php echo $gaji_grid->RowIndex ?>_voucher" id="x<?php echo $gaji_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($gaji_grid->voucher->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji" data-field="x_voucher" name="o<?php echo $gaji_grid->RowIndex ?>_voucher" id="o<?php echo $gaji_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($gaji_grid->voucher->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$gaji_grid->ListOptions->render("body", "right", $gaji_grid->RowIndex);
?>
<script>
loadjs.ready(["fgajigrid", "load"], function() {
	fgajigrid.updateLists(<?php echo $gaji_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($gaji->CurrentMode == "add" || $gaji->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $gaji_grid->FormKeyCountName ?>" id="<?php echo $gaji_grid->FormKeyCountName ?>" value="<?php echo $gaji_grid->KeyCount ?>">
<?php echo $gaji_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($gaji->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $gaji_grid->FormKeyCountName ?>" id="<?php echo $gaji_grid->FormKeyCountName ?>" value="<?php echo $gaji_grid->KeyCount ?>">
<?php echo $gaji_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($gaji->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fgajigrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($gaji_grid->Recordset)
	$gaji_grid->Recordset->Close();
?>
<?php if ($gaji_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $gaji_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($gaji_grid->TotalRecords == 0 && !$gaji->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $gaji_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$gaji_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$gaji_grid->terminate();
?>