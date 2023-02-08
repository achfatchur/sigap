<?php
namespace PHPMaker2020\sigap;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($potongan_sd_grid))
	$potongan_sd_grid = new potongan_sd_grid();

// Run the page
$potongan_sd_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$potongan_sd_grid->Page_Render();
?>
<?php if (!$potongan_sd_grid->isExport()) { ?>
<script>
var fpotongan_sdgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpotongan_sdgrid = new ew.Form("fpotongan_sdgrid", "grid");
	fpotongan_sdgrid.formKeyCountName = '<?php echo $potongan_sd_grid->FormKeyCountName ?>';

	// Validate form
	fpotongan_sdgrid.validate = function() {
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
			<?php if ($potongan_sd_grid->datetime->Required) { ?>
				elm = this.getElements("x" + infix + "_datetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->datetime->caption(), $potongan_sd_grid->datetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($potongan_sd_grid->u_by->Required) { ?>
				elm = this.getElements("x" + infix + "_u_by");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->u_by->caption(), $potongan_sd_grid->u_by->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($potongan_sd_grid->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->tahun->caption(), $potongan_sd_grid->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->tahun->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->bulan->caption(), $potongan_sd_grid->bulan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->bulan->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->nama->caption(), $potongan_sd_grid->nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($potongan_sd_grid->jenjang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->jenjang_id->caption(), $potongan_sd_grid->jenjang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->jenjang_id->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->jabatan_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jabatan_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->jabatan_id->caption(), $potongan_sd_grid->jabatan_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jabatan_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->jabatan_id->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->sertif->Required) { ?>
				elm = this.getElements("x" + infix + "_sertif");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->sertif->caption(), $potongan_sd_grid->sertif->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sertif");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->sertif->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->terlambat->Required) { ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->terlambat->caption(), $potongan_sd_grid->terlambat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->terlambat->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->value_terlambat->Required) { ?>
				elm = this.getElements("x" + infix + "_value_terlambat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->value_terlambat->caption(), $potongan_sd_grid->value_terlambat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_terlambat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->value_terlambat->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->izin->Required) { ?>
				elm = this.getElements("x" + infix + "_izin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->izin->caption(), $potongan_sd_grid->izin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_izin");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->izin->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->value_izin->Required) { ?>
				elm = this.getElements("x" + infix + "_value_izin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->value_izin->caption(), $potongan_sd_grid->value_izin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_izin");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->value_izin->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->izinperjam->Required) { ?>
				elm = this.getElements("x" + infix + "_izinperjam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->izinperjam->caption(), $potongan_sd_grid->izinperjam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_izinperjam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->izinperjam->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->izinperjamvalue->Required) { ?>
				elm = this.getElements("x" + infix + "_izinperjamvalue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->izinperjamvalue->caption(), $potongan_sd_grid->izinperjamvalue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_izinperjamvalue");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->izinperjamvalue->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->sakitperjam->Required) { ?>
				elm = this.getElements("x" + infix + "_sakitperjam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->sakitperjam->caption(), $potongan_sd_grid->sakitperjam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakitperjam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->sakitperjam->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->sakitperjamvalue->Required) { ?>
				elm = this.getElements("x" + infix + "_sakitperjamvalue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->sakitperjamvalue->caption(), $potongan_sd_grid->sakitperjamvalue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakitperjamvalue");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->sakitperjamvalue->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->pulcep->Required) { ?>
				elm = this.getElements("x" + infix + "_pulcep");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->pulcep->caption(), $potongan_sd_grid->pulcep->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pulcep");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->pulcep->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->value_pulcep->Required) { ?>
				elm = this.getElements("x" + infix + "_value_pulcep");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->value_pulcep->caption(), $potongan_sd_grid->value_pulcep->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_pulcep");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->value_pulcep->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->tidakhadirjam->Required) { ?>
				elm = this.getElements("x" + infix + "_tidakhadirjam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->tidakhadirjam->caption(), $potongan_sd_grid->tidakhadirjam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tidakhadirjam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->tidakhadirjam->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->tidakhadirjamvalue->Required) { ?>
				elm = this.getElements("x" + infix + "_tidakhadirjamvalue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->tidakhadirjamvalue->caption(), $potongan_sd_grid->tidakhadirjamvalue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tidakhadirjamvalue");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->tidakhadirjamvalue->errorMessage()) ?>");
			<?php if ($potongan_sd_grid->totalpotongan->Required) { ?>
				elm = this.getElements("x" + infix + "_totalpotongan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_sd_grid->totalpotongan->caption(), $potongan_sd_grid->totalpotongan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_totalpotongan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_sd_grid->totalpotongan->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fpotongan_sdgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "tahun", false)) return false;
		if (ew.valueChanged(fobj, infix, "bulan", false)) return false;
		if (ew.valueChanged(fobj, infix, "nama", false)) return false;
		if (ew.valueChanged(fobj, infix, "jenjang_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "jabatan_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "sertif", false)) return false;
		if (ew.valueChanged(fobj, infix, "terlambat", false)) return false;
		if (ew.valueChanged(fobj, infix, "value_terlambat", false)) return false;
		if (ew.valueChanged(fobj, infix, "izin", false)) return false;
		if (ew.valueChanged(fobj, infix, "value_izin", false)) return false;
		if (ew.valueChanged(fobj, infix, "izinperjam", false)) return false;
		if (ew.valueChanged(fobj, infix, "izinperjamvalue", false)) return false;
		if (ew.valueChanged(fobj, infix, "sakitperjam", false)) return false;
		if (ew.valueChanged(fobj, infix, "sakitperjamvalue", false)) return false;
		if (ew.valueChanged(fobj, infix, "pulcep", false)) return false;
		if (ew.valueChanged(fobj, infix, "value_pulcep", false)) return false;
		if (ew.valueChanged(fobj, infix, "tidakhadirjam", false)) return false;
		if (ew.valueChanged(fobj, infix, "tidakhadirjamvalue", false)) return false;
		if (ew.valueChanged(fobj, infix, "totalpotongan", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpotongan_sdgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpotongan_sdgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpotongan_sdgrid.lists["x_u_by"] = <?php echo $potongan_sd_grid->u_by->Lookup->toClientList($potongan_sd_grid) ?>;
	fpotongan_sdgrid.lists["x_u_by"].options = <?php echo JsonEncode($potongan_sd_grid->u_by->lookupOptions()) ?>;
	fpotongan_sdgrid.autoSuggests["x_u_by"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpotongan_sdgrid.lists["x_bulan"] = <?php echo $potongan_sd_grid->bulan->Lookup->toClientList($potongan_sd_grid) ?>;
	fpotongan_sdgrid.lists["x_bulan"].options = <?php echo JsonEncode($potongan_sd_grid->bulan->lookupOptions()) ?>;
	fpotongan_sdgrid.autoSuggests["x_bulan"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpotongan_sdgrid.lists["x_nama"] = <?php echo $potongan_sd_grid->nama->Lookup->toClientList($potongan_sd_grid) ?>;
	fpotongan_sdgrid.lists["x_nama"].options = <?php echo JsonEncode($potongan_sd_grid->nama->lookupOptions()) ?>;
	fpotongan_sdgrid.lists["x_jenjang_id"] = <?php echo $potongan_sd_grid->jenjang_id->Lookup->toClientList($potongan_sd_grid) ?>;
	fpotongan_sdgrid.lists["x_jenjang_id"].options = <?php echo JsonEncode($potongan_sd_grid->jenjang_id->lookupOptions()) ?>;
	fpotongan_sdgrid.autoSuggests["x_jenjang_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpotongan_sdgrid.lists["x_jabatan_id"] = <?php echo $potongan_sd_grid->jabatan_id->Lookup->toClientList($potongan_sd_grid) ?>;
	fpotongan_sdgrid.lists["x_jabatan_id"].options = <?php echo JsonEncode($potongan_sd_grid->jabatan_id->lookupOptions()) ?>;
	fpotongan_sdgrid.autoSuggests["x_jabatan_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpotongan_sdgrid.lists["x_sertif"] = <?php echo $potongan_sd_grid->sertif->Lookup->toClientList($potongan_sd_grid) ?>;
	fpotongan_sdgrid.lists["x_sertif"].options = <?php echo JsonEncode($potongan_sd_grid->sertif->lookupOptions()) ?>;
	fpotongan_sdgrid.autoSuggests["x_sertif"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fpotongan_sdgrid");
});
</script>
<?php } ?>
<?php
$potongan_sd_grid->renderOtherOptions();
?>
<?php if ($potongan_sd_grid->TotalRecords > 0 || $potongan_sd->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($potongan_sd_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> potongan_sd">
<?php if ($potongan_sd_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $potongan_sd_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpotongan_sdgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_potongan_sd" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_potongan_sdgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$potongan_sd->RowType = ROWTYPE_HEADER;

// Render list options
$potongan_sd_grid->renderListOptions();

// Render list options (header, left)
$potongan_sd_grid->ListOptions->render("header", "left");
?>
<?php if ($potongan_sd_grid->datetime->Visible) { // datetime ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->datetime) == "") { ?>
		<th data-name="datetime" class="<?php echo $potongan_sd_grid->datetime->headerCellClass() ?>"><div id="elh_potongan_sd_datetime" class="potongan_sd_datetime"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->datetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="datetime" class="<?php echo $potongan_sd_grid->datetime->headerCellClass() ?>"><div><div id="elh_potongan_sd_datetime" class="potongan_sd_datetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->datetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->datetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->datetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->u_by->Visible) { // u_by ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->u_by) == "") { ?>
		<th data-name="u_by" class="<?php echo $potongan_sd_grid->u_by->headerCellClass() ?>"><div id="elh_potongan_sd_u_by" class="potongan_sd_u_by"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->u_by->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="u_by" class="<?php echo $potongan_sd_grid->u_by->headerCellClass() ?>"><div><div id="elh_potongan_sd_u_by" class="potongan_sd_u_by">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->u_by->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->u_by->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->u_by->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->tahun->Visible) { // tahun ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $potongan_sd_grid->tahun->headerCellClass() ?>"><div id="elh_potongan_sd_tahun" class="potongan_sd_tahun"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $potongan_sd_grid->tahun->headerCellClass() ?>"><div><div id="elh_potongan_sd_tahun" class="potongan_sd_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->bulan->Visible) { // bulan ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $potongan_sd_grid->bulan->headerCellClass() ?>"><div id="elh_potongan_sd_bulan" class="potongan_sd_bulan"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $potongan_sd_grid->bulan->headerCellClass() ?>"><div><div id="elh_potongan_sd_bulan" class="potongan_sd_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->nama->Visible) { // nama ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->nama) == "") { ?>
		<th data-name="nama" class="<?php echo $potongan_sd_grid->nama->headerCellClass() ?>"><div id="elh_potongan_sd_nama" class="potongan_sd_nama"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama" class="<?php echo $potongan_sd_grid->nama->headerCellClass() ?>"><div><div id="elh_potongan_sd_nama" class="potongan_sd_nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->nama->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->jenjang_id->Visible) { // jenjang_id ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->jenjang_id) == "") { ?>
		<th data-name="jenjang_id" class="<?php echo $potongan_sd_grid->jenjang_id->headerCellClass() ?>"><div id="elh_potongan_sd_jenjang_id" class="potongan_sd_jenjang_id"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->jenjang_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang_id" class="<?php echo $potongan_sd_grid->jenjang_id->headerCellClass() ?>"><div><div id="elh_potongan_sd_jenjang_id" class="potongan_sd_jenjang_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->jenjang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->jenjang_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->jenjang_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->jabatan_id->Visible) { // jabatan_id ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->jabatan_id) == "") { ?>
		<th data-name="jabatan_id" class="<?php echo $potongan_sd_grid->jabatan_id->headerCellClass() ?>"><div id="elh_potongan_sd_jabatan_id" class="potongan_sd_jabatan_id"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->jabatan_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jabatan_id" class="<?php echo $potongan_sd_grid->jabatan_id->headerCellClass() ?>"><div><div id="elh_potongan_sd_jabatan_id" class="potongan_sd_jabatan_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->jabatan_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->jabatan_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->jabatan_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->sertif->Visible) { // sertif ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->sertif) == "") { ?>
		<th data-name="sertif" class="<?php echo $potongan_sd_grid->sertif->headerCellClass() ?>"><div id="elh_potongan_sd_sertif" class="potongan_sd_sertif"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->sertif->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sertif" class="<?php echo $potongan_sd_grid->sertif->headerCellClass() ?>"><div><div id="elh_potongan_sd_sertif" class="potongan_sd_sertif">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->sertif->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->sertif->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->sertif->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->terlambat->Visible) { // terlambat ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->terlambat) == "") { ?>
		<th data-name="terlambat" class="<?php echo $potongan_sd_grid->terlambat->headerCellClass() ?>"><div id="elh_potongan_sd_terlambat" class="potongan_sd_terlambat"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->terlambat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="terlambat" class="<?php echo $potongan_sd_grid->terlambat->headerCellClass() ?>"><div><div id="elh_potongan_sd_terlambat" class="potongan_sd_terlambat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->terlambat->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->terlambat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->terlambat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->value_terlambat->Visible) { // value_terlambat ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->value_terlambat) == "") { ?>
		<th data-name="value_terlambat" class="<?php echo $potongan_sd_grid->value_terlambat->headerCellClass() ?>"><div id="elh_potongan_sd_value_terlambat" class="potongan_sd_value_terlambat"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->value_terlambat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_terlambat" class="<?php echo $potongan_sd_grid->value_terlambat->headerCellClass() ?>"><div><div id="elh_potongan_sd_value_terlambat" class="potongan_sd_value_terlambat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->value_terlambat->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->value_terlambat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->value_terlambat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->izin->Visible) { // izin ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->izin) == "") { ?>
		<th data-name="izin" class="<?php echo $potongan_sd_grid->izin->headerCellClass() ?>"><div id="elh_potongan_sd_izin" class="potongan_sd_izin"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->izin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="izin" class="<?php echo $potongan_sd_grid->izin->headerCellClass() ?>"><div><div id="elh_potongan_sd_izin" class="potongan_sd_izin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->izin->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->izin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->izin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->value_izin->Visible) { // value_izin ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->value_izin) == "") { ?>
		<th data-name="value_izin" class="<?php echo $potongan_sd_grid->value_izin->headerCellClass() ?>"><div id="elh_potongan_sd_value_izin" class="potongan_sd_value_izin"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->value_izin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_izin" class="<?php echo $potongan_sd_grid->value_izin->headerCellClass() ?>"><div><div id="elh_potongan_sd_value_izin" class="potongan_sd_value_izin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->value_izin->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->value_izin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->value_izin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->izinperjam->Visible) { // izinperjam ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->izinperjam) == "") { ?>
		<th data-name="izinperjam" class="<?php echo $potongan_sd_grid->izinperjam->headerCellClass() ?>"><div id="elh_potongan_sd_izinperjam" class="potongan_sd_izinperjam"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->izinperjam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="izinperjam" class="<?php echo $potongan_sd_grid->izinperjam->headerCellClass() ?>"><div><div id="elh_potongan_sd_izinperjam" class="potongan_sd_izinperjam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->izinperjam->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->izinperjam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->izinperjam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->izinperjamvalue->Visible) { // izinperjamvalue ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->izinperjamvalue) == "") { ?>
		<th data-name="izinperjamvalue" class="<?php echo $potongan_sd_grid->izinperjamvalue->headerCellClass() ?>"><div id="elh_potongan_sd_izinperjamvalue" class="potongan_sd_izinperjamvalue"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->izinperjamvalue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="izinperjamvalue" class="<?php echo $potongan_sd_grid->izinperjamvalue->headerCellClass() ?>"><div><div id="elh_potongan_sd_izinperjamvalue" class="potongan_sd_izinperjamvalue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->izinperjamvalue->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->izinperjamvalue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->izinperjamvalue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->sakitperjam->Visible) { // sakitperjam ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->sakitperjam) == "") { ?>
		<th data-name="sakitperjam" class="<?php echo $potongan_sd_grid->sakitperjam->headerCellClass() ?>"><div id="elh_potongan_sd_sakitperjam" class="potongan_sd_sakitperjam"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->sakitperjam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sakitperjam" class="<?php echo $potongan_sd_grid->sakitperjam->headerCellClass() ?>"><div><div id="elh_potongan_sd_sakitperjam" class="potongan_sd_sakitperjam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->sakitperjam->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->sakitperjam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->sakitperjam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->sakitperjamvalue->Visible) { // sakitperjamvalue ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->sakitperjamvalue) == "") { ?>
		<th data-name="sakitperjamvalue" class="<?php echo $potongan_sd_grid->sakitperjamvalue->headerCellClass() ?>"><div id="elh_potongan_sd_sakitperjamvalue" class="potongan_sd_sakitperjamvalue"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->sakitperjamvalue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sakitperjamvalue" class="<?php echo $potongan_sd_grid->sakitperjamvalue->headerCellClass() ?>"><div><div id="elh_potongan_sd_sakitperjamvalue" class="potongan_sd_sakitperjamvalue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->sakitperjamvalue->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->sakitperjamvalue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->sakitperjamvalue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->pulcep->Visible) { // pulcep ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->pulcep) == "") { ?>
		<th data-name="pulcep" class="<?php echo $potongan_sd_grid->pulcep->headerCellClass() ?>"><div id="elh_potongan_sd_pulcep" class="potongan_sd_pulcep"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->pulcep->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pulcep" class="<?php echo $potongan_sd_grid->pulcep->headerCellClass() ?>"><div><div id="elh_potongan_sd_pulcep" class="potongan_sd_pulcep">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->pulcep->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->pulcep->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->pulcep->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->value_pulcep->Visible) { // value_pulcep ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->value_pulcep) == "") { ?>
		<th data-name="value_pulcep" class="<?php echo $potongan_sd_grid->value_pulcep->headerCellClass() ?>"><div id="elh_potongan_sd_value_pulcep" class="potongan_sd_value_pulcep"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->value_pulcep->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_pulcep" class="<?php echo $potongan_sd_grid->value_pulcep->headerCellClass() ?>"><div><div id="elh_potongan_sd_value_pulcep" class="potongan_sd_value_pulcep">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->value_pulcep->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->value_pulcep->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->value_pulcep->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->tidakhadirjam->Visible) { // tidakhadirjam ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->tidakhadirjam) == "") { ?>
		<th data-name="tidakhadirjam" class="<?php echo $potongan_sd_grid->tidakhadirjam->headerCellClass() ?>"><div id="elh_potongan_sd_tidakhadirjam" class="potongan_sd_tidakhadirjam"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->tidakhadirjam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tidakhadirjam" class="<?php echo $potongan_sd_grid->tidakhadirjam->headerCellClass() ?>"><div><div id="elh_potongan_sd_tidakhadirjam" class="potongan_sd_tidakhadirjam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->tidakhadirjam->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->tidakhadirjam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->tidakhadirjam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->tidakhadirjamvalue->Visible) { // tidakhadirjamvalue ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->tidakhadirjamvalue) == "") { ?>
		<th data-name="tidakhadirjamvalue" class="<?php echo $potongan_sd_grid->tidakhadirjamvalue->headerCellClass() ?>"><div id="elh_potongan_sd_tidakhadirjamvalue" class="potongan_sd_tidakhadirjamvalue"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->tidakhadirjamvalue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tidakhadirjamvalue" class="<?php echo $potongan_sd_grid->tidakhadirjamvalue->headerCellClass() ?>"><div><div id="elh_potongan_sd_tidakhadirjamvalue" class="potongan_sd_tidakhadirjamvalue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->tidakhadirjamvalue->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->tidakhadirjamvalue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->tidakhadirjamvalue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_sd_grid->totalpotongan->Visible) { // totalpotongan ?>
	<?php if ($potongan_sd_grid->SortUrl($potongan_sd_grid->totalpotongan) == "") { ?>
		<th data-name="totalpotongan" class="<?php echo $potongan_sd_grid->totalpotongan->headerCellClass() ?>"><div id="elh_potongan_sd_totalpotongan" class="potongan_sd_totalpotongan"><div class="ew-table-header-caption"><?php echo $potongan_sd_grid->totalpotongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="totalpotongan" class="<?php echo $potongan_sd_grid->totalpotongan->headerCellClass() ?>"><div><div id="elh_potongan_sd_totalpotongan" class="potongan_sd_totalpotongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_sd_grid->totalpotongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_sd_grid->totalpotongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_sd_grid->totalpotongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$potongan_sd_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$potongan_sd_grid->StartRecord = 1;
$potongan_sd_grid->StopRecord = $potongan_sd_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($potongan_sd->isConfirm() || $potongan_sd_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($potongan_sd_grid->FormKeyCountName) && ($potongan_sd_grid->isGridAdd() || $potongan_sd_grid->isGridEdit() || $potongan_sd->isConfirm())) {
		$potongan_sd_grid->KeyCount = $CurrentForm->getValue($potongan_sd_grid->FormKeyCountName);
		$potongan_sd_grid->StopRecord = $potongan_sd_grid->StartRecord + $potongan_sd_grid->KeyCount - 1;
	}
}
$potongan_sd_grid->RecordCount = $potongan_sd_grid->StartRecord - 1;
if ($potongan_sd_grid->Recordset && !$potongan_sd_grid->Recordset->EOF) {
	$potongan_sd_grid->Recordset->moveFirst();
	$selectLimit = $potongan_sd_grid->UseSelectLimit;
	if (!$selectLimit && $potongan_sd_grid->StartRecord > 1)
		$potongan_sd_grid->Recordset->move($potongan_sd_grid->StartRecord - 1);
} elseif (!$potongan_sd->AllowAddDeleteRow && $potongan_sd_grid->StopRecord == 0) {
	$potongan_sd_grid->StopRecord = $potongan_sd->GridAddRowCount;
}

// Initialize aggregate
$potongan_sd->RowType = ROWTYPE_AGGREGATEINIT;
$potongan_sd->resetAttributes();
$potongan_sd_grid->renderRow();
if ($potongan_sd_grid->isGridAdd())
	$potongan_sd_grid->RowIndex = 0;
if ($potongan_sd_grid->isGridEdit())
	$potongan_sd_grid->RowIndex = 0;
while ($potongan_sd_grid->RecordCount < $potongan_sd_grid->StopRecord) {
	$potongan_sd_grid->RecordCount++;
	if ($potongan_sd_grid->RecordCount >= $potongan_sd_grid->StartRecord) {
		$potongan_sd_grid->RowCount++;
		if ($potongan_sd_grid->isGridAdd() || $potongan_sd_grid->isGridEdit() || $potongan_sd->isConfirm()) {
			$potongan_sd_grid->RowIndex++;
			$CurrentForm->Index = $potongan_sd_grid->RowIndex;
			if ($CurrentForm->hasValue($potongan_sd_grid->FormActionName) && ($potongan_sd->isConfirm() || $potongan_sd_grid->EventCancelled))
				$potongan_sd_grid->RowAction = strval($CurrentForm->getValue($potongan_sd_grid->FormActionName));
			elseif ($potongan_sd_grid->isGridAdd())
				$potongan_sd_grid->RowAction = "insert";
			else
				$potongan_sd_grid->RowAction = "";
		}

		// Set up key count
		$potongan_sd_grid->KeyCount = $potongan_sd_grid->RowIndex;

		// Init row class and style
		$potongan_sd->resetAttributes();
		$potongan_sd->CssClass = "";
		if ($potongan_sd_grid->isGridAdd()) {
			if ($potongan_sd->CurrentMode == "copy") {
				$potongan_sd_grid->loadRowValues($potongan_sd_grid->Recordset); // Load row values
				$potongan_sd_grid->setRecordKey($potongan_sd_grid->RowOldKey, $potongan_sd_grid->Recordset); // Set old record key
			} else {
				$potongan_sd_grid->loadRowValues(); // Load default values
				$potongan_sd_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$potongan_sd_grid->loadRowValues($potongan_sd_grid->Recordset); // Load row values
		}
		$potongan_sd->RowType = ROWTYPE_VIEW; // Render view
		if ($potongan_sd_grid->isGridAdd()) // Grid add
			$potongan_sd->RowType = ROWTYPE_ADD; // Render add
		if ($potongan_sd_grid->isGridAdd() && $potongan_sd->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$potongan_sd_grid->restoreCurrentRowFormValues($potongan_sd_grid->RowIndex); // Restore form values
		if ($potongan_sd_grid->isGridEdit()) { // Grid edit
			if ($potongan_sd->EventCancelled)
				$potongan_sd_grid->restoreCurrentRowFormValues($potongan_sd_grid->RowIndex); // Restore form values
			if ($potongan_sd_grid->RowAction == "insert")
				$potongan_sd->RowType = ROWTYPE_ADD; // Render add
			else
				$potongan_sd->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($potongan_sd_grid->isGridEdit() && ($potongan_sd->RowType == ROWTYPE_EDIT || $potongan_sd->RowType == ROWTYPE_ADD) && $potongan_sd->EventCancelled) // Update failed
			$potongan_sd_grid->restoreCurrentRowFormValues($potongan_sd_grid->RowIndex); // Restore form values
		if ($potongan_sd->RowType == ROWTYPE_EDIT) // Edit row
			$potongan_sd_grid->EditRowCount++;
		if ($potongan_sd->isConfirm()) // Confirm row
			$potongan_sd_grid->restoreCurrentRowFormValues($potongan_sd_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$potongan_sd->RowAttrs->merge(["data-rowindex" => $potongan_sd_grid->RowCount, "id" => "r" . $potongan_sd_grid->RowCount . "_potongan_sd", "data-rowtype" => $potongan_sd->RowType]);

		// Render row
		$potongan_sd_grid->renderRow();

		// Render list options
		$potongan_sd_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($potongan_sd_grid->RowAction != "delete" && $potongan_sd_grid->RowAction != "insertdelete" && !($potongan_sd_grid->RowAction == "insert" && $potongan_sd->isConfirm() && $potongan_sd_grid->emptyRow())) {
?>
	<tr <?php echo $potongan_sd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$potongan_sd_grid->ListOptions->render("body", "left", $potongan_sd_grid->RowCount);
?>
	<?php if ($potongan_sd_grid->datetime->Visible) { // datetime ?>
		<td data-name="datetime" <?php echo $potongan_sd_grid->datetime->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="potongan_sd" data-field="x_datetime" name="o<?php echo $potongan_sd_grid->RowIndex ?>_datetime" id="o<?php echo $potongan_sd_grid->RowIndex ?>_datetime" value="<?php echo HtmlEncode($potongan_sd_grid->datetime->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_datetime">
<span<?php echo $potongan_sd_grid->datetime->viewAttributes() ?>><?php echo $potongan_sd_grid->datetime->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_datetime" name="x<?php echo $potongan_sd_grid->RowIndex ?>_datetime" id="x<?php echo $potongan_sd_grid->RowIndex ?>_datetime" value="<?php echo HtmlEncode($potongan_sd_grid->datetime->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_datetime" name="o<?php echo $potongan_sd_grid->RowIndex ?>_datetime" id="o<?php echo $potongan_sd_grid->RowIndex ?>_datetime" value="<?php echo HtmlEncode($potongan_sd_grid->datetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_datetime" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_datetime" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_datetime" value="<?php echo HtmlEncode($potongan_sd_grid->datetime->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_datetime" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_datetime" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_datetime" value="<?php echo HtmlEncode($potongan_sd_grid->datetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="potongan_sd" data-field="x_id" name="x<?php echo $potongan_sd_grid->RowIndex ?>_id" id="x<?php echo $potongan_sd_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($potongan_sd_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_id" name="o<?php echo $potongan_sd_grid->RowIndex ?>_id" id="o<?php echo $potongan_sd_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($potongan_sd_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT || $potongan_sd->CurrentMode == "edit") { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_id" name="x<?php echo $potongan_sd_grid->RowIndex ?>_id" id="x<?php echo $potongan_sd_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($potongan_sd_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($potongan_sd_grid->u_by->Visible) { // u_by ?>
		<td data-name="u_by" <?php echo $potongan_sd_grid->u_by->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="potongan_sd" data-field="x_u_by" name="o<?php echo $potongan_sd_grid->RowIndex ?>_u_by" id="o<?php echo $potongan_sd_grid->RowIndex ?>_u_by" value="<?php echo HtmlEncode($potongan_sd_grid->u_by->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_u_by">
<span<?php echo $potongan_sd_grid->u_by->viewAttributes() ?>><?php echo $potongan_sd_grid->u_by->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_u_by" name="x<?php echo $potongan_sd_grid->RowIndex ?>_u_by" id="x<?php echo $potongan_sd_grid->RowIndex ?>_u_by" value="<?php echo HtmlEncode($potongan_sd_grid->u_by->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_u_by" name="o<?php echo $potongan_sd_grid->RowIndex ?>_u_by" id="o<?php echo $potongan_sd_grid->RowIndex ?>_u_by" value="<?php echo HtmlEncode($potongan_sd_grid->u_by->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_u_by" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_u_by" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_u_by" value="<?php echo HtmlEncode($potongan_sd_grid->u_by->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_u_by" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_u_by" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_u_by" value="<?php echo HtmlEncode($potongan_sd_grid->u_by->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $potongan_sd_grid->tahun->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($potongan_sd_grid->tahun->getSessionValue() != "") { ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_tahun" class="form-group">
<span<?php echo $potongan_sd_grid->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_sd_grid->tahun->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_tahun" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_tahun" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->tahun->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->tahun->EditValue ?>"<?php echo $potongan_sd_grid->tahun->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_tahun" name="o<?php echo $potongan_sd_grid->RowIndex ?>_tahun" id="o<?php echo $potongan_sd_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_sd_grid->tahun->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($potongan_sd_grid->tahun->getSessionValue() != "") { ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_tahun" class="form-group">
<span<?php echo $potongan_sd_grid->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_sd_grid->tahun->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_tahun" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_tahun" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->tahun->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->tahun->EditValue ?>"<?php echo $potongan_sd_grid->tahun->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_tahun">
<span<?php echo $potongan_sd_grid->tahun->viewAttributes() ?>><?php echo $potongan_sd_grid->tahun->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_tahun" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_sd_grid->tahun->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_tahun" name="o<?php echo $potongan_sd_grid->RowIndex ?>_tahun" id="o<?php echo $potongan_sd_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_sd_grid->tahun->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_tahun" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_sd_grid->tahun->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_tahun" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_tahun" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_sd_grid->tahun->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $potongan_sd_grid->bulan->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($potongan_sd_grid->bulan->getSessionValue() != "") { ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_bulan" class="form-group">
<span<?php echo $potongan_sd_grid->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" name="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_sd_grid->bulan->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_bulan" class="form-group">
<?php
$onchange = $potongan_sd_grid->bulan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_sd_grid->bulan->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_sd_grid->RowIndex ?>_bulan">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" id="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo RemoveHtml($potongan_sd_grid->bulan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->bulan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_sd_grid->bulan->getPlaceHolder()) ?>"<?php echo $potongan_sd_grid->bulan->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_bulan" data-value-separator="<?php echo $potongan_sd_grid->bulan->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" id="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_sd_grid->bulan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_sdgrid"], function() {
	fpotongan_sdgrid.createAutoSuggest({"id":"x<?php echo $potongan_sd_grid->RowIndex ?>_bulan","forceSelect":false});
});
</script>
<?php echo $potongan_sd_grid->bulan->Lookup->getParamTag($potongan_sd_grid, "p_x" . $potongan_sd_grid->RowIndex . "_bulan") ?>
</span>
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_bulan" name="o<?php echo $potongan_sd_grid->RowIndex ?>_bulan" id="o<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_sd_grid->bulan->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($potongan_sd_grid->bulan->getSessionValue() != "") { ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_bulan" class="form-group">
<span<?php echo $potongan_sd_grid->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" name="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_sd_grid->bulan->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_bulan" class="form-group">
<?php
$onchange = $potongan_sd_grid->bulan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_sd_grid->bulan->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_sd_grid->RowIndex ?>_bulan">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" id="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo RemoveHtml($potongan_sd_grid->bulan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->bulan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_sd_grid->bulan->getPlaceHolder()) ?>"<?php echo $potongan_sd_grid->bulan->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_bulan" data-value-separator="<?php echo $potongan_sd_grid->bulan->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" id="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_sd_grid->bulan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_sdgrid"], function() {
	fpotongan_sdgrid.createAutoSuggest({"id":"x<?php echo $potongan_sd_grid->RowIndex ?>_bulan","forceSelect":false});
});
</script>
<?php echo $potongan_sd_grid->bulan->Lookup->getParamTag($potongan_sd_grid, "p_x" . $potongan_sd_grid->RowIndex . "_bulan") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_bulan">
<span<?php echo $potongan_sd_grid->bulan->viewAttributes() ?>><?php echo $potongan_sd_grid->bulan->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_bulan" name="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" id="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_sd_grid->bulan->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_bulan" name="o<?php echo $potongan_sd_grid->RowIndex ?>_bulan" id="o<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_sd_grid->bulan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_bulan" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_sd_grid->bulan->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_bulan" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_bulan" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_sd_grid->bulan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->nama->Visible) { // nama ?>
		<td data-name="nama" <?php echo $potongan_sd_grid->nama->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_nama" class="form-group">
<?php $potongan_sd_grid->nama->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $potongan_sd_grid->RowIndex ?>_nama"><?php echo EmptyValue(strval($potongan_sd_grid->nama->ViewValue)) ? $Language->phrase("PleaseSelect") : $potongan_sd_grid->nama->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($potongan_sd_grid->nama->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($potongan_sd_grid->nama->ReadOnly || $potongan_sd_grid->nama->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $potongan_sd_grid->RowIndex ?>_nama',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $potongan_sd_grid->nama->Lookup->getParamTag($potongan_sd_grid, "p_x" . $potongan_sd_grid->RowIndex . "_nama") ?>
<input type="hidden" data-table="potongan_sd" data-field="x_nama" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $potongan_sd_grid->nama->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_sd_grid->RowIndex ?>_nama" id="x<?php echo $potongan_sd_grid->RowIndex ?>_nama" value="<?php echo $potongan_sd_grid->nama->CurrentValue ?>"<?php echo $potongan_sd_grid->nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_nama" name="o<?php echo $potongan_sd_grid->RowIndex ?>_nama" id="o<?php echo $potongan_sd_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($potongan_sd_grid->nama->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_nama" class="form-group">
<?php $potongan_sd_grid->nama->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $potongan_sd_grid->RowIndex ?>_nama"><?php echo EmptyValue(strval($potongan_sd_grid->nama->ViewValue)) ? $Language->phrase("PleaseSelect") : $potongan_sd_grid->nama->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($potongan_sd_grid->nama->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($potongan_sd_grid->nama->ReadOnly || $potongan_sd_grid->nama->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $potongan_sd_grid->RowIndex ?>_nama',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $potongan_sd_grid->nama->Lookup->getParamTag($potongan_sd_grid, "p_x" . $potongan_sd_grid->RowIndex . "_nama") ?>
<input type="hidden" data-table="potongan_sd" data-field="x_nama" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $potongan_sd_grid->nama->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_sd_grid->RowIndex ?>_nama" id="x<?php echo $potongan_sd_grid->RowIndex ?>_nama" value="<?php echo $potongan_sd_grid->nama->CurrentValue ?>"<?php echo $potongan_sd_grid->nama->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_nama">
<span<?php echo $potongan_sd_grid->nama->viewAttributes() ?>><?php echo $potongan_sd_grid->nama->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_nama" name="x<?php echo $potongan_sd_grid->RowIndex ?>_nama" id="x<?php echo $potongan_sd_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($potongan_sd_grid->nama->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_nama" name="o<?php echo $potongan_sd_grid->RowIndex ?>_nama" id="o<?php echo $potongan_sd_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($potongan_sd_grid->nama->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_nama" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_nama" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($potongan_sd_grid->nama->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_nama" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_nama" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($potongan_sd_grid->nama->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id" <?php echo $potongan_sd_grid->jenjang_id->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_jenjang_id" class="form-group">
<?php
$onchange = $potongan_sd_grid->jenjang_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_sd_grid->jenjang_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" id="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" value="<?php echo RemoveHtml($potongan_sd_grid->jenjang_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->getPlaceHolder()) ?>"<?php echo $potongan_sd_grid->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_jenjang_id" data-value-separator="<?php echo $potongan_sd_grid->jenjang_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" id="x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_sdgrid"], function() {
	fpotongan_sdgrid.createAutoSuggest({"id":"x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id","forceSelect":false});
});
</script>
<?php echo $potongan_sd_grid->jenjang_id->Lookup->getParamTag($potongan_sd_grid, "p_x" . $potongan_sd_grid->RowIndex . "_jenjang_id") ?>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_jenjang_id" name="o<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" id="o<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_jenjang_id" class="form-group">
<?php
$onchange = $potongan_sd_grid->jenjang_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_sd_grid->jenjang_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" id="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" value="<?php echo RemoveHtml($potongan_sd_grid->jenjang_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->getPlaceHolder()) ?>"<?php echo $potongan_sd_grid->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_jenjang_id" data-value-separator="<?php echo $potongan_sd_grid->jenjang_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" id="x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_sdgrid"], function() {
	fpotongan_sdgrid.createAutoSuggest({"id":"x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id","forceSelect":false});
});
</script>
<?php echo $potongan_sd_grid->jenjang_id->Lookup->getParamTag($potongan_sd_grid, "p_x" . $potongan_sd_grid->RowIndex . "_jenjang_id") ?>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_jenjang_id">
<span<?php echo $potongan_sd_grid->jenjang_id->viewAttributes() ?>><?php echo $potongan_sd_grid->jenjang_id->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_jenjang_id" name="x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" id="x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_jenjang_id" name="o<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" id="o<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_jenjang_id" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_jenjang_id" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->jabatan_id->Visible) { // jabatan_id ?>
		<td data-name="jabatan_id" <?php echo $potongan_sd_grid->jabatan_id->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_jabatan_id" class="form-group">
<?php
$onchange = $potongan_sd_grid->jabatan_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_sd_grid->jabatan_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" id="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" value="<?php echo RemoveHtml($potongan_sd_grid->jabatan_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->getPlaceHolder()) ?>"<?php echo $potongan_sd_grid->jabatan_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_jabatan_id" data-value-separator="<?php echo $potongan_sd_grid->jabatan_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" id="x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_sdgrid"], function() {
	fpotongan_sdgrid.createAutoSuggest({"id":"x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id","forceSelect":false});
});
</script>
<?php echo $potongan_sd_grid->jabatan_id->Lookup->getParamTag($potongan_sd_grid, "p_x" . $potongan_sd_grid->RowIndex . "_jabatan_id") ?>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_jabatan_id" name="o<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" id="o<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_jabatan_id" class="form-group">
<?php
$onchange = $potongan_sd_grid->jabatan_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_sd_grid->jabatan_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" id="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" value="<?php echo RemoveHtml($potongan_sd_grid->jabatan_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->getPlaceHolder()) ?>"<?php echo $potongan_sd_grid->jabatan_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_jabatan_id" data-value-separator="<?php echo $potongan_sd_grid->jabatan_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" id="x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_sdgrid"], function() {
	fpotongan_sdgrid.createAutoSuggest({"id":"x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id","forceSelect":false});
});
</script>
<?php echo $potongan_sd_grid->jabatan_id->Lookup->getParamTag($potongan_sd_grid, "p_x" . $potongan_sd_grid->RowIndex . "_jabatan_id") ?>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_jabatan_id">
<span<?php echo $potongan_sd_grid->jabatan_id->viewAttributes() ?>><?php echo $potongan_sd_grid->jabatan_id->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_jabatan_id" name="x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" id="x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_jabatan_id" name="o<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" id="o<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_jabatan_id" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_jabatan_id" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->sertif->Visible) { // sertif ?>
		<td data-name="sertif" <?php echo $potongan_sd_grid->sertif->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_sertif" class="form-group">
<?php
$onchange = $potongan_sd_grid->sertif->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_sd_grid->sertif->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_sd_grid->RowIndex ?>_sertif">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" id="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" value="<?php echo RemoveHtml($potongan_sd_grid->sertif->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->sertif->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_sd_grid->sertif->getPlaceHolder()) ?>"<?php echo $potongan_sd_grid->sertif->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_sertif" data-value-separator="<?php echo $potongan_sd_grid->sertif->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" id="x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_sd_grid->sertif->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_sdgrid"], function() {
	fpotongan_sdgrid.createAutoSuggest({"id":"x<?php echo $potongan_sd_grid->RowIndex ?>_sertif","forceSelect":false});
});
</script>
<?php echo $potongan_sd_grid->sertif->Lookup->getParamTag($potongan_sd_grid, "p_x" . $potongan_sd_grid->RowIndex . "_sertif") ?>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_sertif" name="o<?php echo $potongan_sd_grid->RowIndex ?>_sertif" id="o<?php echo $potongan_sd_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_sd_grid->sertif->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_sertif" class="form-group">
<?php
$onchange = $potongan_sd_grid->sertif->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_sd_grid->sertif->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_sd_grid->RowIndex ?>_sertif">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" id="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" value="<?php echo RemoveHtml($potongan_sd_grid->sertif->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->sertif->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_sd_grid->sertif->getPlaceHolder()) ?>"<?php echo $potongan_sd_grid->sertif->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_sertif" data-value-separator="<?php echo $potongan_sd_grid->sertif->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" id="x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_sd_grid->sertif->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_sdgrid"], function() {
	fpotongan_sdgrid.createAutoSuggest({"id":"x<?php echo $potongan_sd_grid->RowIndex ?>_sertif","forceSelect":false});
});
</script>
<?php echo $potongan_sd_grid->sertif->Lookup->getParamTag($potongan_sd_grid, "p_x" . $potongan_sd_grid->RowIndex . "_sertif") ?>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_sertif">
<span<?php echo $potongan_sd_grid->sertif->viewAttributes() ?>><?php echo $potongan_sd_grid->sertif->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_sertif" name="x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" id="x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_sd_grid->sertif->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_sertif" name="o<?php echo $potongan_sd_grid->RowIndex ?>_sertif" id="o<?php echo $potongan_sd_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_sd_grid->sertif->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_sertif" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_sd_grid->sertif->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_sertif" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_sertif" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_sd_grid->sertif->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->terlambat->Visible) { // terlambat ?>
		<td data-name="terlambat" <?php echo $potongan_sd_grid->terlambat->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_terlambat" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_terlambat" name="x<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" id="x<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->terlambat->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->terlambat->EditValue ?>"<?php echo $potongan_sd_grid->terlambat->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_terlambat" name="o<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" id="o<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($potongan_sd_grid->terlambat->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_terlambat" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_terlambat" name="x<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" id="x<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->terlambat->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->terlambat->EditValue ?>"<?php echo $potongan_sd_grid->terlambat->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_terlambat">
<span<?php echo $potongan_sd_grid->terlambat->viewAttributes() ?>><?php echo $potongan_sd_grid->terlambat->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_terlambat" name="x<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" id="x<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($potongan_sd_grid->terlambat->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_terlambat" name="o<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" id="o<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($potongan_sd_grid->terlambat->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_terlambat" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($potongan_sd_grid->terlambat->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_terlambat" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($potongan_sd_grid->terlambat->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->value_terlambat->Visible) { // value_terlambat ?>
		<td data-name="value_terlambat" <?php echo $potongan_sd_grid->value_terlambat->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_value_terlambat" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_value_terlambat" name="x<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" id="x<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->value_terlambat->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->value_terlambat->EditValue ?>"<?php echo $potongan_sd_grid->value_terlambat->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_value_terlambat" name="o<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" id="o<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" value="<?php echo HtmlEncode($potongan_sd_grid->value_terlambat->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_value_terlambat" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_value_terlambat" name="x<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" id="x<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->value_terlambat->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->value_terlambat->EditValue ?>"<?php echo $potongan_sd_grid->value_terlambat->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_value_terlambat">
<span<?php echo $potongan_sd_grid->value_terlambat->viewAttributes() ?>><?php echo $potongan_sd_grid->value_terlambat->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_value_terlambat" name="x<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" id="x<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" value="<?php echo HtmlEncode($potongan_sd_grid->value_terlambat->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_value_terlambat" name="o<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" id="o<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" value="<?php echo HtmlEncode($potongan_sd_grid->value_terlambat->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_value_terlambat" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" value="<?php echo HtmlEncode($potongan_sd_grid->value_terlambat->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_value_terlambat" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" value="<?php echo HtmlEncode($potongan_sd_grid->value_terlambat->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->izin->Visible) { // izin ?>
		<td data-name="izin" <?php echo $potongan_sd_grid->izin->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_izin" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_izin" name="x<?php echo $potongan_sd_grid->RowIndex ?>_izin" id="x<?php echo $potongan_sd_grid->RowIndex ?>_izin" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->izin->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->izin->EditValue ?>"<?php echo $potongan_sd_grid->izin->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_izin" name="o<?php echo $potongan_sd_grid->RowIndex ?>_izin" id="o<?php echo $potongan_sd_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($potongan_sd_grid->izin->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_izin" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_izin" name="x<?php echo $potongan_sd_grid->RowIndex ?>_izin" id="x<?php echo $potongan_sd_grid->RowIndex ?>_izin" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->izin->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->izin->EditValue ?>"<?php echo $potongan_sd_grid->izin->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_izin">
<span<?php echo $potongan_sd_grid->izin->viewAttributes() ?>><?php echo $potongan_sd_grid->izin->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_izin" name="x<?php echo $potongan_sd_grid->RowIndex ?>_izin" id="x<?php echo $potongan_sd_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($potongan_sd_grid->izin->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_izin" name="o<?php echo $potongan_sd_grid->RowIndex ?>_izin" id="o<?php echo $potongan_sd_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($potongan_sd_grid->izin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_izin" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_izin" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($potongan_sd_grid->izin->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_izin" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_izin" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($potongan_sd_grid->izin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->value_izin->Visible) { // value_izin ?>
		<td data-name="value_izin" <?php echo $potongan_sd_grid->value_izin->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_value_izin" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_value_izin" name="x<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" id="x<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->value_izin->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->value_izin->EditValue ?>"<?php echo $potongan_sd_grid->value_izin->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_value_izin" name="o<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" id="o<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" value="<?php echo HtmlEncode($potongan_sd_grid->value_izin->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_value_izin" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_value_izin" name="x<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" id="x<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->value_izin->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->value_izin->EditValue ?>"<?php echo $potongan_sd_grid->value_izin->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_value_izin">
<span<?php echo $potongan_sd_grid->value_izin->viewAttributes() ?>><?php echo $potongan_sd_grid->value_izin->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_value_izin" name="x<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" id="x<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" value="<?php echo HtmlEncode($potongan_sd_grid->value_izin->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_value_izin" name="o<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" id="o<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" value="<?php echo HtmlEncode($potongan_sd_grid->value_izin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_value_izin" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" value="<?php echo HtmlEncode($potongan_sd_grid->value_izin->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_value_izin" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" value="<?php echo HtmlEncode($potongan_sd_grid->value_izin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->izinperjam->Visible) { // izinperjam ?>
		<td data-name="izinperjam" <?php echo $potongan_sd_grid->izinperjam->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_izinperjam" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_izinperjam" name="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" id="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->izinperjam->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->izinperjam->EditValue ?>"<?php echo $potongan_sd_grid->izinperjam->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_izinperjam" name="o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" id="o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" value="<?php echo HtmlEncode($potongan_sd_grid->izinperjam->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_izinperjam" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_izinperjam" name="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" id="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->izinperjam->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->izinperjam->EditValue ?>"<?php echo $potongan_sd_grid->izinperjam->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_izinperjam">
<span<?php echo $potongan_sd_grid->izinperjam->viewAttributes() ?>><?php echo $potongan_sd_grid->izinperjam->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_izinperjam" name="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" id="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" value="<?php echo HtmlEncode($potongan_sd_grid->izinperjam->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_izinperjam" name="o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" id="o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" value="<?php echo HtmlEncode($potongan_sd_grid->izinperjam->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_izinperjam" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" value="<?php echo HtmlEncode($potongan_sd_grid->izinperjam->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_izinperjam" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" value="<?php echo HtmlEncode($potongan_sd_grid->izinperjam->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->izinperjamvalue->Visible) { // izinperjamvalue ?>
		<td data-name="izinperjamvalue" <?php echo $potongan_sd_grid->izinperjamvalue->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_izinperjamvalue" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_izinperjamvalue" name="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" id="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->izinperjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->izinperjamvalue->EditValue ?>"<?php echo $potongan_sd_grid->izinperjamvalue->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_izinperjamvalue" name="o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" id="o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->izinperjamvalue->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_izinperjamvalue" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_izinperjamvalue" name="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" id="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->izinperjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->izinperjamvalue->EditValue ?>"<?php echo $potongan_sd_grid->izinperjamvalue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_izinperjamvalue">
<span<?php echo $potongan_sd_grid->izinperjamvalue->viewAttributes() ?>><?php echo $potongan_sd_grid->izinperjamvalue->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_izinperjamvalue" name="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" id="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->izinperjamvalue->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_izinperjamvalue" name="o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" id="o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->izinperjamvalue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_izinperjamvalue" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->izinperjamvalue->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_izinperjamvalue" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->izinperjamvalue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->sakitperjam->Visible) { // sakitperjam ?>
		<td data-name="sakitperjam" <?php echo $potongan_sd_grid->sakitperjam->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_sakitperjam" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_sakitperjam" name="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" id="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->sakitperjam->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->sakitperjam->EditValue ?>"<?php echo $potongan_sd_grid->sakitperjam->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_sakitperjam" name="o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" id="o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" value="<?php echo HtmlEncode($potongan_sd_grid->sakitperjam->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_sakitperjam" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_sakitperjam" name="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" id="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->sakitperjam->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->sakitperjam->EditValue ?>"<?php echo $potongan_sd_grid->sakitperjam->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_sakitperjam">
<span<?php echo $potongan_sd_grid->sakitperjam->viewAttributes() ?>><?php echo $potongan_sd_grid->sakitperjam->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_sakitperjam" name="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" id="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" value="<?php echo HtmlEncode($potongan_sd_grid->sakitperjam->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_sakitperjam" name="o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" id="o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" value="<?php echo HtmlEncode($potongan_sd_grid->sakitperjam->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_sakitperjam" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" value="<?php echo HtmlEncode($potongan_sd_grid->sakitperjam->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_sakitperjam" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" value="<?php echo HtmlEncode($potongan_sd_grid->sakitperjam->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->sakitperjamvalue->Visible) { // sakitperjamvalue ?>
		<td data-name="sakitperjamvalue" <?php echo $potongan_sd_grid->sakitperjamvalue->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_sakitperjamvalue" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_sakitperjamvalue" name="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" id="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->sakitperjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->sakitperjamvalue->EditValue ?>"<?php echo $potongan_sd_grid->sakitperjamvalue->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_sakitperjamvalue" name="o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" id="o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->sakitperjamvalue->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_sakitperjamvalue" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_sakitperjamvalue" name="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" id="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->sakitperjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->sakitperjamvalue->EditValue ?>"<?php echo $potongan_sd_grid->sakitperjamvalue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_sakitperjamvalue">
<span<?php echo $potongan_sd_grid->sakitperjamvalue->viewAttributes() ?>><?php echo $potongan_sd_grid->sakitperjamvalue->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_sakitperjamvalue" name="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" id="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->sakitperjamvalue->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_sakitperjamvalue" name="o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" id="o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->sakitperjamvalue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_sakitperjamvalue" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->sakitperjamvalue->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_sakitperjamvalue" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->sakitperjamvalue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->pulcep->Visible) { // pulcep ?>
		<td data-name="pulcep" <?php echo $potongan_sd_grid->pulcep->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_pulcep" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_pulcep" name="x<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" id="x<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->pulcep->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->pulcep->EditValue ?>"<?php echo $potongan_sd_grid->pulcep->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_pulcep" name="o<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" id="o<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" value="<?php echo HtmlEncode($potongan_sd_grid->pulcep->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_pulcep" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_pulcep" name="x<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" id="x<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->pulcep->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->pulcep->EditValue ?>"<?php echo $potongan_sd_grid->pulcep->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_pulcep">
<span<?php echo $potongan_sd_grid->pulcep->viewAttributes() ?>><?php echo $potongan_sd_grid->pulcep->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_pulcep" name="x<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" id="x<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" value="<?php echo HtmlEncode($potongan_sd_grid->pulcep->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_pulcep" name="o<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" id="o<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" value="<?php echo HtmlEncode($potongan_sd_grid->pulcep->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_pulcep" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" value="<?php echo HtmlEncode($potongan_sd_grid->pulcep->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_pulcep" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" value="<?php echo HtmlEncode($potongan_sd_grid->pulcep->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->value_pulcep->Visible) { // value_pulcep ?>
		<td data-name="value_pulcep" <?php echo $potongan_sd_grid->value_pulcep->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_value_pulcep" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_value_pulcep" name="x<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" id="x<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->value_pulcep->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->value_pulcep->EditValue ?>"<?php echo $potongan_sd_grid->value_pulcep->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_value_pulcep" name="o<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" id="o<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" value="<?php echo HtmlEncode($potongan_sd_grid->value_pulcep->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_value_pulcep" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_value_pulcep" name="x<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" id="x<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->value_pulcep->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->value_pulcep->EditValue ?>"<?php echo $potongan_sd_grid->value_pulcep->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_value_pulcep">
<span<?php echo $potongan_sd_grid->value_pulcep->viewAttributes() ?>><?php echo $potongan_sd_grid->value_pulcep->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_value_pulcep" name="x<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" id="x<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" value="<?php echo HtmlEncode($potongan_sd_grid->value_pulcep->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_value_pulcep" name="o<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" id="o<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" value="<?php echo HtmlEncode($potongan_sd_grid->value_pulcep->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_value_pulcep" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" value="<?php echo HtmlEncode($potongan_sd_grid->value_pulcep->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_value_pulcep" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" value="<?php echo HtmlEncode($potongan_sd_grid->value_pulcep->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->tidakhadirjam->Visible) { // tidakhadirjam ?>
		<td data-name="tidakhadirjam" <?php echo $potongan_sd_grid->tidakhadirjam->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_tidakhadirjam" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_tidakhadirjam" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjam->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->tidakhadirjam->EditValue ?>"<?php echo $potongan_sd_grid->tidakhadirjam->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_tidakhadirjam" name="o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" id="o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" value="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjam->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_tidakhadirjam" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_tidakhadirjam" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjam->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->tidakhadirjam->EditValue ?>"<?php echo $potongan_sd_grid->tidakhadirjam->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_tidakhadirjam">
<span<?php echo $potongan_sd_grid->tidakhadirjam->viewAttributes() ?>><?php echo $potongan_sd_grid->tidakhadirjam->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_tidakhadirjam" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" value="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjam->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_tidakhadirjam" name="o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" id="o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" value="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjam->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_tidakhadirjam" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" value="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjam->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_tidakhadirjam" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" value="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjam->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->tidakhadirjamvalue->Visible) { // tidakhadirjamvalue ?>
		<td data-name="tidakhadirjamvalue" <?php echo $potongan_sd_grid->tidakhadirjamvalue->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_tidakhadirjamvalue" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_tidakhadirjamvalue" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->tidakhadirjamvalue->EditValue ?>"<?php echo $potongan_sd_grid->tidakhadirjamvalue->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_tidakhadirjamvalue" name="o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" id="o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjamvalue->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_tidakhadirjamvalue" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_tidakhadirjamvalue" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->tidakhadirjamvalue->EditValue ?>"<?php echo $potongan_sd_grid->tidakhadirjamvalue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_tidakhadirjamvalue">
<span<?php echo $potongan_sd_grid->tidakhadirjamvalue->viewAttributes() ?>><?php echo $potongan_sd_grid->tidakhadirjamvalue->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_tidakhadirjamvalue" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjamvalue->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_tidakhadirjamvalue" name="o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" id="o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjamvalue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_tidakhadirjamvalue" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjamvalue->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_tidakhadirjamvalue" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjamvalue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->totalpotongan->Visible) { // totalpotongan ?>
		<td data-name="totalpotongan" <?php echo $potongan_sd_grid->totalpotongan->cellAttributes() ?>>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_totalpotongan" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_totalpotongan" name="x<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" id="x<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_sd_grid->totalpotongan->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->totalpotongan->EditValue ?>"<?php echo $potongan_sd_grid->totalpotongan->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_totalpotongan" name="o<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" id="o<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" value="<?php echo HtmlEncode($potongan_sd_grid->totalpotongan->OldValue) ?>">
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_totalpotongan" class="form-group">
<input type="text" data-table="potongan_sd" data-field="x_totalpotongan" name="x<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" id="x<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_sd_grid->totalpotongan->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->totalpotongan->EditValue ?>"<?php echo $potongan_sd_grid->totalpotongan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_sd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_sd_grid->RowCount ?>_potongan_sd_totalpotongan">
<span<?php echo $potongan_sd_grid->totalpotongan->viewAttributes() ?>><?php echo $potongan_sd_grid->totalpotongan->getViewValue() ?></span>
</span>
<?php if (!$potongan_sd->isConfirm()) { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_totalpotongan" name="x<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" id="x<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" value="<?php echo HtmlEncode($potongan_sd_grid->totalpotongan->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_totalpotongan" name="o<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" id="o<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" value="<?php echo HtmlEncode($potongan_sd_grid->totalpotongan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_sd" data-field="x_totalpotongan" name="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" id="fpotongan_sdgrid$x<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" value="<?php echo HtmlEncode($potongan_sd_grid->totalpotongan->FormValue) ?>">
<input type="hidden" data-table="potongan_sd" data-field="x_totalpotongan" name="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" id="fpotongan_sdgrid$o<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" value="<?php echo HtmlEncode($potongan_sd_grid->totalpotongan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$potongan_sd_grid->ListOptions->render("body", "right", $potongan_sd_grid->RowCount);
?>
	</tr>
<?php if ($potongan_sd->RowType == ROWTYPE_ADD || $potongan_sd->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpotongan_sdgrid", "load"], function() {
	fpotongan_sdgrid.updateLists(<?php echo $potongan_sd_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$potongan_sd_grid->isGridAdd() || $potongan_sd->CurrentMode == "copy")
		if (!$potongan_sd_grid->Recordset->EOF)
			$potongan_sd_grid->Recordset->moveNext();
}
?>
<?php
	if ($potongan_sd->CurrentMode == "add" || $potongan_sd->CurrentMode == "copy" || $potongan_sd->CurrentMode == "edit") {
		$potongan_sd_grid->RowIndex = '$rowindex$';
		$potongan_sd_grid->loadRowValues();

		// Set row properties
		$potongan_sd->resetAttributes();
		$potongan_sd->RowAttrs->merge(["data-rowindex" => $potongan_sd_grid->RowIndex, "id" => "r0_potongan_sd", "data-rowtype" => ROWTYPE_ADD]);
		$potongan_sd->RowAttrs->appendClass("ew-template");
		$potongan_sd->RowType = ROWTYPE_ADD;

		// Render row
		$potongan_sd_grid->renderRow();

		// Render list options
		$potongan_sd_grid->renderListOptions();
		$potongan_sd_grid->StartRowCount = 0;
?>
	<tr <?php echo $potongan_sd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$potongan_sd_grid->ListOptions->render("body", "left", $potongan_sd_grid->RowIndex);
?>
	<?php if ($potongan_sd_grid->datetime->Visible) { // datetime ?>
		<td data-name="datetime">
<?php if (!$potongan_sd->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_datetime" class="form-group potongan_sd_datetime">
<span<?php echo $potongan_sd_grid->datetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->datetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_datetime" name="x<?php echo $potongan_sd_grid->RowIndex ?>_datetime" id="x<?php echo $potongan_sd_grid->RowIndex ?>_datetime" value="<?php echo HtmlEncode($potongan_sd_grid->datetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_datetime" name="o<?php echo $potongan_sd_grid->RowIndex ?>_datetime" id="o<?php echo $potongan_sd_grid->RowIndex ?>_datetime" value="<?php echo HtmlEncode($potongan_sd_grid->datetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->u_by->Visible) { // u_by ?>
		<td data-name="u_by">
<?php if (!$potongan_sd->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_u_by" class="form-group potongan_sd_u_by">
<span<?php echo $potongan_sd_grid->u_by->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->u_by->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_u_by" name="x<?php echo $potongan_sd_grid->RowIndex ?>_u_by" id="x<?php echo $potongan_sd_grid->RowIndex ?>_u_by" value="<?php echo HtmlEncode($potongan_sd_grid->u_by->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_u_by" name="o<?php echo $potongan_sd_grid->RowIndex ?>_u_by" id="o<?php echo $potongan_sd_grid->RowIndex ?>_u_by" value="<?php echo HtmlEncode($potongan_sd_grid->u_by->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->tahun->Visible) { // tahun ?>
		<td data-name="tahun">
<?php if (!$potongan_sd->isConfirm()) { ?>
<?php if ($potongan_sd_grid->tahun->getSessionValue() != "") { ?>
<span id="el$rowindex$_potongan_sd_tahun" class="form-group potongan_sd_tahun">
<span<?php echo $potongan_sd_grid->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_sd_grid->tahun->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_tahun" class="form-group potongan_sd_tahun">
<input type="text" data-table="potongan_sd" data-field="x_tahun" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->tahun->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->tahun->EditValue ?>"<?php echo $potongan_sd_grid->tahun->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_tahun" class="form-group potongan_sd_tahun">
<span<?php echo $potongan_sd_grid->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_tahun" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_sd_grid->tahun->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_tahun" name="o<?php echo $potongan_sd_grid->RowIndex ?>_tahun" id="o<?php echo $potongan_sd_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_sd_grid->tahun->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->bulan->Visible) { // bulan ?>
		<td data-name="bulan">
<?php if (!$potongan_sd->isConfirm()) { ?>
<?php if ($potongan_sd_grid->bulan->getSessionValue() != "") { ?>
<span id="el$rowindex$_potongan_sd_bulan" class="form-group potongan_sd_bulan">
<span<?php echo $potongan_sd_grid->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" name="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_sd_grid->bulan->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_bulan" class="form-group potongan_sd_bulan">
<?php
$onchange = $potongan_sd_grid->bulan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_sd_grid->bulan->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_sd_grid->RowIndex ?>_bulan">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" id="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo RemoveHtml($potongan_sd_grid->bulan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->bulan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_sd_grid->bulan->getPlaceHolder()) ?>"<?php echo $potongan_sd_grid->bulan->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_bulan" data-value-separator="<?php echo $potongan_sd_grid->bulan->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" id="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_sd_grid->bulan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_sdgrid"], function() {
	fpotongan_sdgrid.createAutoSuggest({"id":"x<?php echo $potongan_sd_grid->RowIndex ?>_bulan","forceSelect":false});
});
</script>
<?php echo $potongan_sd_grid->bulan->Lookup->getParamTag($potongan_sd_grid, "p_x" . $potongan_sd_grid->RowIndex . "_bulan") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_bulan" class="form-group potongan_sd_bulan">
<span<?php echo $potongan_sd_grid->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_bulan" name="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" id="x<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_sd_grid->bulan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_bulan" name="o<?php echo $potongan_sd_grid->RowIndex ?>_bulan" id="o<?php echo $potongan_sd_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_sd_grid->bulan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->nama->Visible) { // nama ?>
		<td data-name="nama">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_nama" class="form-group potongan_sd_nama">
<?php $potongan_sd_grid->nama->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $potongan_sd_grid->RowIndex ?>_nama"><?php echo EmptyValue(strval($potongan_sd_grid->nama->ViewValue)) ? $Language->phrase("PleaseSelect") : $potongan_sd_grid->nama->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($potongan_sd_grid->nama->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($potongan_sd_grid->nama->ReadOnly || $potongan_sd_grid->nama->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $potongan_sd_grid->RowIndex ?>_nama',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $potongan_sd_grid->nama->Lookup->getParamTag($potongan_sd_grid, "p_x" . $potongan_sd_grid->RowIndex . "_nama") ?>
<input type="hidden" data-table="potongan_sd" data-field="x_nama" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $potongan_sd_grid->nama->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_sd_grid->RowIndex ?>_nama" id="x<?php echo $potongan_sd_grid->RowIndex ?>_nama" value="<?php echo $potongan_sd_grid->nama->CurrentValue ?>"<?php echo $potongan_sd_grid->nama->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_nama" class="form-group potongan_sd_nama">
<span<?php echo $potongan_sd_grid->nama->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->nama->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_nama" name="x<?php echo $potongan_sd_grid->RowIndex ?>_nama" id="x<?php echo $potongan_sd_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($potongan_sd_grid->nama->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_nama" name="o<?php echo $potongan_sd_grid->RowIndex ?>_nama" id="o<?php echo $potongan_sd_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($potongan_sd_grid->nama->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_jenjang_id" class="form-group potongan_sd_jenjang_id">
<?php
$onchange = $potongan_sd_grid->jenjang_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_sd_grid->jenjang_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" id="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" value="<?php echo RemoveHtml($potongan_sd_grid->jenjang_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->getPlaceHolder()) ?>"<?php echo $potongan_sd_grid->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_jenjang_id" data-value-separator="<?php echo $potongan_sd_grid->jenjang_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" id="x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_sdgrid"], function() {
	fpotongan_sdgrid.createAutoSuggest({"id":"x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id","forceSelect":false});
});
</script>
<?php echo $potongan_sd_grid->jenjang_id->Lookup->getParamTag($potongan_sd_grid, "p_x" . $potongan_sd_grid->RowIndex . "_jenjang_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_jenjang_id" class="form-group potongan_sd_jenjang_id">
<span<?php echo $potongan_sd_grid->jenjang_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->jenjang_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_jenjang_id" name="x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" id="x<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_jenjang_id" name="o<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" id="o<?php echo $potongan_sd_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_sd_grid->jenjang_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->jabatan_id->Visible) { // jabatan_id ?>
		<td data-name="jabatan_id">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_jabatan_id" class="form-group potongan_sd_jabatan_id">
<?php
$onchange = $potongan_sd_grid->jabatan_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_sd_grid->jabatan_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" id="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" value="<?php echo RemoveHtml($potongan_sd_grid->jabatan_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->getPlaceHolder()) ?>"<?php echo $potongan_sd_grid->jabatan_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_jabatan_id" data-value-separator="<?php echo $potongan_sd_grid->jabatan_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" id="x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_sdgrid"], function() {
	fpotongan_sdgrid.createAutoSuggest({"id":"x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id","forceSelect":false});
});
</script>
<?php echo $potongan_sd_grid->jabatan_id->Lookup->getParamTag($potongan_sd_grid, "p_x" . $potongan_sd_grid->RowIndex . "_jabatan_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_jabatan_id" class="form-group potongan_sd_jabatan_id">
<span<?php echo $potongan_sd_grid->jabatan_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->jabatan_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_jabatan_id" name="x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" id="x<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_jabatan_id" name="o<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" id="o<?php echo $potongan_sd_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_sd_grid->jabatan_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->sertif->Visible) { // sertif ?>
		<td data-name="sertif">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_sertif" class="form-group potongan_sd_sertif">
<?php
$onchange = $potongan_sd_grid->sertif->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_sd_grid->sertif->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_sd_grid->RowIndex ?>_sertif">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" id="sv_x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" value="<?php echo RemoveHtml($potongan_sd_grid->sertif->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->sertif->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_sd_grid->sertif->getPlaceHolder()) ?>"<?php echo $potongan_sd_grid->sertif->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_sertif" data-value-separator="<?php echo $potongan_sd_grid->sertif->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" id="x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_sd_grid->sertif->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_sdgrid"], function() {
	fpotongan_sdgrid.createAutoSuggest({"id":"x<?php echo $potongan_sd_grid->RowIndex ?>_sertif","forceSelect":false});
});
</script>
<?php echo $potongan_sd_grid->sertif->Lookup->getParamTag($potongan_sd_grid, "p_x" . $potongan_sd_grid->RowIndex . "_sertif") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_sertif" class="form-group potongan_sd_sertif">
<span<?php echo $potongan_sd_grid->sertif->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->sertif->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_sertif" name="x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" id="x<?php echo $potongan_sd_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_sd_grid->sertif->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_sertif" name="o<?php echo $potongan_sd_grid->RowIndex ?>_sertif" id="o<?php echo $potongan_sd_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_sd_grid->sertif->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->terlambat->Visible) { // terlambat ?>
		<td data-name="terlambat">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_terlambat" class="form-group potongan_sd_terlambat">
<input type="text" data-table="potongan_sd" data-field="x_terlambat" name="x<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" id="x<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->terlambat->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->terlambat->EditValue ?>"<?php echo $potongan_sd_grid->terlambat->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_terlambat" class="form-group potongan_sd_terlambat">
<span<?php echo $potongan_sd_grid->terlambat->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->terlambat->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_terlambat" name="x<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" id="x<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($potongan_sd_grid->terlambat->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_terlambat" name="o<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" id="o<?php echo $potongan_sd_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($potongan_sd_grid->terlambat->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->value_terlambat->Visible) { // value_terlambat ?>
		<td data-name="value_terlambat">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_value_terlambat" class="form-group potongan_sd_value_terlambat">
<input type="text" data-table="potongan_sd" data-field="x_value_terlambat" name="x<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" id="x<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->value_terlambat->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->value_terlambat->EditValue ?>"<?php echo $potongan_sd_grid->value_terlambat->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_value_terlambat" class="form-group potongan_sd_value_terlambat">
<span<?php echo $potongan_sd_grid->value_terlambat->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->value_terlambat->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_value_terlambat" name="x<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" id="x<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" value="<?php echo HtmlEncode($potongan_sd_grid->value_terlambat->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_value_terlambat" name="o<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" id="o<?php echo $potongan_sd_grid->RowIndex ?>_value_terlambat" value="<?php echo HtmlEncode($potongan_sd_grid->value_terlambat->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->izin->Visible) { // izin ?>
		<td data-name="izin">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_izin" class="form-group potongan_sd_izin">
<input type="text" data-table="potongan_sd" data-field="x_izin" name="x<?php echo $potongan_sd_grid->RowIndex ?>_izin" id="x<?php echo $potongan_sd_grid->RowIndex ?>_izin" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->izin->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->izin->EditValue ?>"<?php echo $potongan_sd_grid->izin->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_izin" class="form-group potongan_sd_izin">
<span<?php echo $potongan_sd_grid->izin->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->izin->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_izin" name="x<?php echo $potongan_sd_grid->RowIndex ?>_izin" id="x<?php echo $potongan_sd_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($potongan_sd_grid->izin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_izin" name="o<?php echo $potongan_sd_grid->RowIndex ?>_izin" id="o<?php echo $potongan_sd_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($potongan_sd_grid->izin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->value_izin->Visible) { // value_izin ?>
		<td data-name="value_izin">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_value_izin" class="form-group potongan_sd_value_izin">
<input type="text" data-table="potongan_sd" data-field="x_value_izin" name="x<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" id="x<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->value_izin->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->value_izin->EditValue ?>"<?php echo $potongan_sd_grid->value_izin->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_value_izin" class="form-group potongan_sd_value_izin">
<span<?php echo $potongan_sd_grid->value_izin->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->value_izin->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_value_izin" name="x<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" id="x<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" value="<?php echo HtmlEncode($potongan_sd_grid->value_izin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_value_izin" name="o<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" id="o<?php echo $potongan_sd_grid->RowIndex ?>_value_izin" value="<?php echo HtmlEncode($potongan_sd_grid->value_izin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->izinperjam->Visible) { // izinperjam ?>
		<td data-name="izinperjam">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_izinperjam" class="form-group potongan_sd_izinperjam">
<input type="text" data-table="potongan_sd" data-field="x_izinperjam" name="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" id="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->izinperjam->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->izinperjam->EditValue ?>"<?php echo $potongan_sd_grid->izinperjam->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_izinperjam" class="form-group potongan_sd_izinperjam">
<span<?php echo $potongan_sd_grid->izinperjam->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->izinperjam->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_izinperjam" name="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" id="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" value="<?php echo HtmlEncode($potongan_sd_grid->izinperjam->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_izinperjam" name="o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" id="o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjam" value="<?php echo HtmlEncode($potongan_sd_grid->izinperjam->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->izinperjamvalue->Visible) { // izinperjamvalue ?>
		<td data-name="izinperjamvalue">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_izinperjamvalue" class="form-group potongan_sd_izinperjamvalue">
<input type="text" data-table="potongan_sd" data-field="x_izinperjamvalue" name="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" id="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->izinperjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->izinperjamvalue->EditValue ?>"<?php echo $potongan_sd_grid->izinperjamvalue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_izinperjamvalue" class="form-group potongan_sd_izinperjamvalue">
<span<?php echo $potongan_sd_grid->izinperjamvalue->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->izinperjamvalue->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_izinperjamvalue" name="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" id="x<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->izinperjamvalue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_izinperjamvalue" name="o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" id="o<?php echo $potongan_sd_grid->RowIndex ?>_izinperjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->izinperjamvalue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->sakitperjam->Visible) { // sakitperjam ?>
		<td data-name="sakitperjam">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_sakitperjam" class="form-group potongan_sd_sakitperjam">
<input type="text" data-table="potongan_sd" data-field="x_sakitperjam" name="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" id="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->sakitperjam->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->sakitperjam->EditValue ?>"<?php echo $potongan_sd_grid->sakitperjam->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_sakitperjam" class="form-group potongan_sd_sakitperjam">
<span<?php echo $potongan_sd_grid->sakitperjam->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->sakitperjam->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_sakitperjam" name="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" id="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" value="<?php echo HtmlEncode($potongan_sd_grid->sakitperjam->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_sakitperjam" name="o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" id="o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjam" value="<?php echo HtmlEncode($potongan_sd_grid->sakitperjam->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->sakitperjamvalue->Visible) { // sakitperjamvalue ?>
		<td data-name="sakitperjamvalue">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_sakitperjamvalue" class="form-group potongan_sd_sakitperjamvalue">
<input type="text" data-table="potongan_sd" data-field="x_sakitperjamvalue" name="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" id="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->sakitperjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->sakitperjamvalue->EditValue ?>"<?php echo $potongan_sd_grid->sakitperjamvalue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_sakitperjamvalue" class="form-group potongan_sd_sakitperjamvalue">
<span<?php echo $potongan_sd_grid->sakitperjamvalue->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->sakitperjamvalue->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_sakitperjamvalue" name="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" id="x<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->sakitperjamvalue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_sakitperjamvalue" name="o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" id="o<?php echo $potongan_sd_grid->RowIndex ?>_sakitperjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->sakitperjamvalue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->pulcep->Visible) { // pulcep ?>
		<td data-name="pulcep">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_pulcep" class="form-group potongan_sd_pulcep">
<input type="text" data-table="potongan_sd" data-field="x_pulcep" name="x<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" id="x<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->pulcep->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->pulcep->EditValue ?>"<?php echo $potongan_sd_grid->pulcep->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_pulcep" class="form-group potongan_sd_pulcep">
<span<?php echo $potongan_sd_grid->pulcep->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->pulcep->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_pulcep" name="x<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" id="x<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" value="<?php echo HtmlEncode($potongan_sd_grid->pulcep->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_pulcep" name="o<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" id="o<?php echo $potongan_sd_grid->RowIndex ?>_pulcep" value="<?php echo HtmlEncode($potongan_sd_grid->pulcep->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->value_pulcep->Visible) { // value_pulcep ?>
		<td data-name="value_pulcep">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_value_pulcep" class="form-group potongan_sd_value_pulcep">
<input type="text" data-table="potongan_sd" data-field="x_value_pulcep" name="x<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" id="x<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->value_pulcep->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->value_pulcep->EditValue ?>"<?php echo $potongan_sd_grid->value_pulcep->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_value_pulcep" class="form-group potongan_sd_value_pulcep">
<span<?php echo $potongan_sd_grid->value_pulcep->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->value_pulcep->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_value_pulcep" name="x<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" id="x<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" value="<?php echo HtmlEncode($potongan_sd_grid->value_pulcep->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_value_pulcep" name="o<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" id="o<?php echo $potongan_sd_grid->RowIndex ?>_value_pulcep" value="<?php echo HtmlEncode($potongan_sd_grid->value_pulcep->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->tidakhadirjam->Visible) { // tidakhadirjam ?>
		<td data-name="tidakhadirjam">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_tidakhadirjam" class="form-group potongan_sd_tidakhadirjam">
<input type="text" data-table="potongan_sd" data-field="x_tidakhadirjam" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjam->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->tidakhadirjam->EditValue ?>"<?php echo $potongan_sd_grid->tidakhadirjam->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_tidakhadirjam" class="form-group potongan_sd_tidakhadirjam">
<span<?php echo $potongan_sd_grid->tidakhadirjam->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->tidakhadirjam->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_tidakhadirjam" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" value="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjam->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_tidakhadirjam" name="o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" id="o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjam" value="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjam->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->tidakhadirjamvalue->Visible) { // tidakhadirjamvalue ?>
		<td data-name="tidakhadirjamvalue">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_tidakhadirjamvalue" class="form-group potongan_sd_tidakhadirjamvalue">
<input type="text" data-table="potongan_sd" data-field="x_tidakhadirjamvalue" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->tidakhadirjamvalue->EditValue ?>"<?php echo $potongan_sd_grid->tidakhadirjamvalue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_tidakhadirjamvalue" class="form-group potongan_sd_tidakhadirjamvalue">
<span<?php echo $potongan_sd_grid->tidakhadirjamvalue->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->tidakhadirjamvalue->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_tidakhadirjamvalue" name="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" id="x<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjamvalue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_tidakhadirjamvalue" name="o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" id="o<?php echo $potongan_sd_grid->RowIndex ?>_tidakhadirjamvalue" value="<?php echo HtmlEncode($potongan_sd_grid->tidakhadirjamvalue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_sd_grid->totalpotongan->Visible) { // totalpotongan ?>
		<td data-name="totalpotongan">
<?php if (!$potongan_sd->isConfirm()) { ?>
<span id="el$rowindex$_potongan_sd_totalpotongan" class="form-group potongan_sd_totalpotongan">
<input type="text" data-table="potongan_sd" data-field="x_totalpotongan" name="x<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" id="x<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_sd_grid->totalpotongan->getPlaceHolder()) ?>" value="<?php echo $potongan_sd_grid->totalpotongan->EditValue ?>"<?php echo $potongan_sd_grid->totalpotongan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_sd_totalpotongan" class="form-group potongan_sd_totalpotongan">
<span<?php echo $potongan_sd_grid->totalpotongan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_sd_grid->totalpotongan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_sd" data-field="x_totalpotongan" name="x<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" id="x<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" value="<?php echo HtmlEncode($potongan_sd_grid->totalpotongan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_sd" data-field="x_totalpotongan" name="o<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" id="o<?php echo $potongan_sd_grid->RowIndex ?>_totalpotongan" value="<?php echo HtmlEncode($potongan_sd_grid->totalpotongan->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$potongan_sd_grid->ListOptions->render("body", "right", $potongan_sd_grid->RowIndex);
?>
<script>
loadjs.ready(["fpotongan_sdgrid", "load"], function() {
	fpotongan_sdgrid.updateLists(<?php echo $potongan_sd_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($potongan_sd->CurrentMode == "add" || $potongan_sd->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $potongan_sd_grid->FormKeyCountName ?>" id="<?php echo $potongan_sd_grid->FormKeyCountName ?>" value="<?php echo $potongan_sd_grid->KeyCount ?>">
<?php echo $potongan_sd_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($potongan_sd->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $potongan_sd_grid->FormKeyCountName ?>" id="<?php echo $potongan_sd_grid->FormKeyCountName ?>" value="<?php echo $potongan_sd_grid->KeyCount ?>">
<?php echo $potongan_sd_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($potongan_sd->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpotongan_sdgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($potongan_sd_grid->Recordset)
	$potongan_sd_grid->Recordset->Close();
?>
<?php if ($potongan_sd_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $potongan_sd_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($potongan_sd_grid->TotalRecords == 0 && !$potongan_sd->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $potongan_sd_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$potongan_sd_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$potongan_sd_grid->terminate();
?>