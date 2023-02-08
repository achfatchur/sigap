<?php
namespace PHPMaker2020\sigap;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($potongan_smk_grid))
	$potongan_smk_grid = new potongan_smk_grid();

// Run the page
$potongan_smk_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$potongan_smk_grid->Page_Render();
?>
<?php if (!$potongan_smk_grid->isExport()) { ?>
<script>
var fpotongan_smkgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpotongan_smkgrid = new ew.Form("fpotongan_smkgrid", "grid");
	fpotongan_smkgrid.formKeyCountName = '<?php echo $potongan_smk_grid->FormKeyCountName ?>';

	// Validate form
	fpotongan_smkgrid.validate = function() {
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
			<?php if ($potongan_smk_grid->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->tahun->caption(), $potongan_smk_grid->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->tahun->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->bulan->caption(), $potongan_smk_grid->bulan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->bulan->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->nama->caption(), $potongan_smk_grid->nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($potongan_smk_grid->jenjang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->jenjang_id->caption(), $potongan_smk_grid->jenjang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->jenjang_id->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->jabatan_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jabatan_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->jabatan_id->caption(), $potongan_smk_grid->jabatan_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jabatan_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->jabatan_id->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->sertif->Required) { ?>
				elm = this.getElements("x" + infix + "_sertif");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->sertif->caption(), $potongan_smk_grid->sertif->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sertif");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->sertif->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->terlambat->Required) { ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->terlambat->caption(), $potongan_smk_grid->terlambat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->terlambat->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->value_terlambat->Required) { ?>
				elm = this.getElements("x" + infix + "_value_terlambat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->value_terlambat->caption(), $potongan_smk_grid->value_terlambat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_terlambat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->value_terlambat->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->izin->Required) { ?>
				elm = this.getElements("x" + infix + "_izin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->izin->caption(), $potongan_smk_grid->izin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_izin");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->izin->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->value_izin->Required) { ?>
				elm = this.getElements("x" + infix + "_value_izin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->value_izin->caption(), $potongan_smk_grid->value_izin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_izin");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->value_izin->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->sakit->Required) { ?>
				elm = this.getElements("x" + infix + "_sakit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->sakit->caption(), $potongan_smk_grid->sakit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->sakit->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->value_sakit->Required) { ?>
				elm = this.getElements("x" + infix + "_value_sakit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->value_sakit->caption(), $potongan_smk_grid->value_sakit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_sakit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->value_sakit->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->tidakhadir->Required) { ?>
				elm = this.getElements("x" + infix + "_tidakhadir");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->tidakhadir->caption(), $potongan_smk_grid->tidakhadir->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tidakhadir");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->tidakhadir->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->value_tidakhadir->Required) { ?>
				elm = this.getElements("x" + infix + "_value_tidakhadir");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->value_tidakhadir->caption(), $potongan_smk_grid->value_tidakhadir->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_tidakhadir");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->value_tidakhadir->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->pulcep->Required) { ?>
				elm = this.getElements("x" + infix + "_pulcep");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->pulcep->caption(), $potongan_smk_grid->pulcep->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pulcep");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->pulcep->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->value_pulcep->Required) { ?>
				elm = this.getElements("x" + infix + "_value_pulcep");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->value_pulcep->caption(), $potongan_smk_grid->value_pulcep->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_pulcep");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->value_pulcep->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->tidakhadirjam->Required) { ?>
				elm = this.getElements("x" + infix + "_tidakhadirjam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->tidakhadirjam->caption(), $potongan_smk_grid->tidakhadirjam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tidakhadirjam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->tidakhadirjam->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->tidakhadirjamvalue->Required) { ?>
				elm = this.getElements("x" + infix + "_tidakhadirjamvalue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->tidakhadirjamvalue->caption(), $potongan_smk_grid->tidakhadirjamvalue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tidakhadirjamvalue");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->tidakhadirjamvalue->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->sakitperjam->Required) { ?>
				elm = this.getElements("x" + infix + "_sakitperjam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->sakitperjam->caption(), $potongan_smk_grid->sakitperjam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakitperjam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->sakitperjam->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->sakitperjamvalue->Required) { ?>
				elm = this.getElements("x" + infix + "_sakitperjamvalue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->sakitperjamvalue->caption(), $potongan_smk_grid->sakitperjamvalue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakitperjamvalue");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->sakitperjamvalue->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->izinperjam->Required) { ?>
				elm = this.getElements("x" + infix + "_izinperjam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->izinperjam->caption(), $potongan_smk_grid->izinperjam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_izinperjam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->izinperjam->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->izinperjamvalue->Required) { ?>
				elm = this.getElements("x" + infix + "_izinperjamvalue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->izinperjamvalue->caption(), $potongan_smk_grid->izinperjamvalue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_izinperjamvalue");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->izinperjamvalue->errorMessage()) ?>");
			<?php if ($potongan_smk_grid->totalpotongan->Required) { ?>
				elm = this.getElements("x" + infix + "_totalpotongan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_smk_grid->totalpotongan->caption(), $potongan_smk_grid->totalpotongan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_totalpotongan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_smk_grid->totalpotongan->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fpotongan_smkgrid.emptyRow = function(infix) {
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
		if (ew.valueChanged(fobj, infix, "sakit", false)) return false;
		if (ew.valueChanged(fobj, infix, "value_sakit", false)) return false;
		if (ew.valueChanged(fobj, infix, "tidakhadir", false)) return false;
		if (ew.valueChanged(fobj, infix, "value_tidakhadir", false)) return false;
		if (ew.valueChanged(fobj, infix, "pulcep", false)) return false;
		if (ew.valueChanged(fobj, infix, "value_pulcep", false)) return false;
		if (ew.valueChanged(fobj, infix, "tidakhadirjam", false)) return false;
		if (ew.valueChanged(fobj, infix, "tidakhadirjamvalue", false)) return false;
		if (ew.valueChanged(fobj, infix, "sakitperjam", false)) return false;
		if (ew.valueChanged(fobj, infix, "sakitperjamvalue", false)) return false;
		if (ew.valueChanged(fobj, infix, "izinperjam", false)) return false;
		if (ew.valueChanged(fobj, infix, "izinperjamvalue", false)) return false;
		if (ew.valueChanged(fobj, infix, "totalpotongan", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpotongan_smkgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpotongan_smkgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpotongan_smkgrid.lists["x_bulan"] = <?php echo $potongan_smk_grid->bulan->Lookup->toClientList($potongan_smk_grid) ?>;
	fpotongan_smkgrid.lists["x_bulan"].options = <?php echo JsonEncode($potongan_smk_grid->bulan->lookupOptions()) ?>;
	fpotongan_smkgrid.autoSuggests["x_bulan"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpotongan_smkgrid.lists["x_nama"] = <?php echo $potongan_smk_grid->nama->Lookup->toClientList($potongan_smk_grid) ?>;
	fpotongan_smkgrid.lists["x_nama"].options = <?php echo JsonEncode($potongan_smk_grid->nama->lookupOptions()) ?>;
	fpotongan_smkgrid.lists["x_jenjang_id"] = <?php echo $potongan_smk_grid->jenjang_id->Lookup->toClientList($potongan_smk_grid) ?>;
	fpotongan_smkgrid.lists["x_jenjang_id"].options = <?php echo JsonEncode($potongan_smk_grid->jenjang_id->lookupOptions()) ?>;
	fpotongan_smkgrid.autoSuggests["x_jenjang_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpotongan_smkgrid.lists["x_jabatan_id"] = <?php echo $potongan_smk_grid->jabatan_id->Lookup->toClientList($potongan_smk_grid) ?>;
	fpotongan_smkgrid.lists["x_jabatan_id"].options = <?php echo JsonEncode($potongan_smk_grid->jabatan_id->lookupOptions()) ?>;
	fpotongan_smkgrid.autoSuggests["x_jabatan_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpotongan_smkgrid.lists["x_sertif"] = <?php echo $potongan_smk_grid->sertif->Lookup->toClientList($potongan_smk_grid) ?>;
	fpotongan_smkgrid.lists["x_sertif"].options = <?php echo JsonEncode($potongan_smk_grid->sertif->lookupOptions()) ?>;
	fpotongan_smkgrid.autoSuggests["x_sertif"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fpotongan_smkgrid");
});
</script>
<?php } ?>
<?php
$potongan_smk_grid->renderOtherOptions();
?>
<?php if ($potongan_smk_grid->TotalRecords > 0 || $potongan_smk->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($potongan_smk_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> potongan_smk">
<?php if ($potongan_smk_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $potongan_smk_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpotongan_smkgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_potongan_smk" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_potongan_smkgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$potongan_smk->RowType = ROWTYPE_HEADER;

// Render list options
$potongan_smk_grid->renderListOptions();

// Render list options (header, left)
$potongan_smk_grid->ListOptions->render("header", "left");
?>
<?php if ($potongan_smk_grid->tahun->Visible) { // tahun ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $potongan_smk_grid->tahun->headerCellClass() ?>"><div id="elh_potongan_smk_tahun" class="potongan_smk_tahun"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $potongan_smk_grid->tahun->headerCellClass() ?>"><div><div id="elh_potongan_smk_tahun" class="potongan_smk_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->bulan->Visible) { // bulan ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $potongan_smk_grid->bulan->headerCellClass() ?>"><div id="elh_potongan_smk_bulan" class="potongan_smk_bulan"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $potongan_smk_grid->bulan->headerCellClass() ?>"><div><div id="elh_potongan_smk_bulan" class="potongan_smk_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->nama->Visible) { // nama ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->nama) == "") { ?>
		<th data-name="nama" class="<?php echo $potongan_smk_grid->nama->headerCellClass() ?>"><div id="elh_potongan_smk_nama" class="potongan_smk_nama"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama" class="<?php echo $potongan_smk_grid->nama->headerCellClass() ?>"><div><div id="elh_potongan_smk_nama" class="potongan_smk_nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->nama->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->jenjang_id->Visible) { // jenjang_id ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->jenjang_id) == "") { ?>
		<th data-name="jenjang_id" class="<?php echo $potongan_smk_grid->jenjang_id->headerCellClass() ?>"><div id="elh_potongan_smk_jenjang_id" class="potongan_smk_jenjang_id"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->jenjang_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang_id" class="<?php echo $potongan_smk_grid->jenjang_id->headerCellClass() ?>"><div><div id="elh_potongan_smk_jenjang_id" class="potongan_smk_jenjang_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->jenjang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->jenjang_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->jenjang_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->jabatan_id->Visible) { // jabatan_id ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->jabatan_id) == "") { ?>
		<th data-name="jabatan_id" class="<?php echo $potongan_smk_grid->jabatan_id->headerCellClass() ?>"><div id="elh_potongan_smk_jabatan_id" class="potongan_smk_jabatan_id"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->jabatan_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jabatan_id" class="<?php echo $potongan_smk_grid->jabatan_id->headerCellClass() ?>"><div><div id="elh_potongan_smk_jabatan_id" class="potongan_smk_jabatan_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->jabatan_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->jabatan_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->jabatan_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->sertif->Visible) { // sertif ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->sertif) == "") { ?>
		<th data-name="sertif" class="<?php echo $potongan_smk_grid->sertif->headerCellClass() ?>"><div id="elh_potongan_smk_sertif" class="potongan_smk_sertif"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->sertif->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sertif" class="<?php echo $potongan_smk_grid->sertif->headerCellClass() ?>"><div><div id="elh_potongan_smk_sertif" class="potongan_smk_sertif">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->sertif->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->sertif->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->sertif->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->terlambat->Visible) { // terlambat ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->terlambat) == "") { ?>
		<th data-name="terlambat" class="<?php echo $potongan_smk_grid->terlambat->headerCellClass() ?>"><div id="elh_potongan_smk_terlambat" class="potongan_smk_terlambat"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->terlambat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="terlambat" class="<?php echo $potongan_smk_grid->terlambat->headerCellClass() ?>"><div><div id="elh_potongan_smk_terlambat" class="potongan_smk_terlambat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->terlambat->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->terlambat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->terlambat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->value_terlambat->Visible) { // value_terlambat ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->value_terlambat) == "") { ?>
		<th data-name="value_terlambat" class="<?php echo $potongan_smk_grid->value_terlambat->headerCellClass() ?>"><div id="elh_potongan_smk_value_terlambat" class="potongan_smk_value_terlambat"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->value_terlambat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_terlambat" class="<?php echo $potongan_smk_grid->value_terlambat->headerCellClass() ?>"><div><div id="elh_potongan_smk_value_terlambat" class="potongan_smk_value_terlambat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->value_terlambat->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->value_terlambat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->value_terlambat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->izin->Visible) { // izin ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->izin) == "") { ?>
		<th data-name="izin" class="<?php echo $potongan_smk_grid->izin->headerCellClass() ?>"><div id="elh_potongan_smk_izin" class="potongan_smk_izin"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->izin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="izin" class="<?php echo $potongan_smk_grid->izin->headerCellClass() ?>"><div><div id="elh_potongan_smk_izin" class="potongan_smk_izin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->izin->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->izin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->izin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->value_izin->Visible) { // value_izin ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->value_izin) == "") { ?>
		<th data-name="value_izin" class="<?php echo $potongan_smk_grid->value_izin->headerCellClass() ?>"><div id="elh_potongan_smk_value_izin" class="potongan_smk_value_izin"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->value_izin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_izin" class="<?php echo $potongan_smk_grid->value_izin->headerCellClass() ?>"><div><div id="elh_potongan_smk_value_izin" class="potongan_smk_value_izin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->value_izin->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->value_izin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->value_izin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->sakit->Visible) { // sakit ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->sakit) == "") { ?>
		<th data-name="sakit" class="<?php echo $potongan_smk_grid->sakit->headerCellClass() ?>"><div id="elh_potongan_smk_sakit" class="potongan_smk_sakit"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->sakit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sakit" class="<?php echo $potongan_smk_grid->sakit->headerCellClass() ?>"><div><div id="elh_potongan_smk_sakit" class="potongan_smk_sakit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->sakit->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->sakit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->sakit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->value_sakit->Visible) { // value_sakit ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->value_sakit) == "") { ?>
		<th data-name="value_sakit" class="<?php echo $potongan_smk_grid->value_sakit->headerCellClass() ?>"><div id="elh_potongan_smk_value_sakit" class="potongan_smk_value_sakit"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->value_sakit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_sakit" class="<?php echo $potongan_smk_grid->value_sakit->headerCellClass() ?>"><div><div id="elh_potongan_smk_value_sakit" class="potongan_smk_value_sakit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->value_sakit->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->value_sakit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->value_sakit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->tidakhadir->Visible) { // tidakhadir ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->tidakhadir) == "") { ?>
		<th data-name="tidakhadir" class="<?php echo $potongan_smk_grid->tidakhadir->headerCellClass() ?>"><div id="elh_potongan_smk_tidakhadir" class="potongan_smk_tidakhadir"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->tidakhadir->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tidakhadir" class="<?php echo $potongan_smk_grid->tidakhadir->headerCellClass() ?>"><div><div id="elh_potongan_smk_tidakhadir" class="potongan_smk_tidakhadir">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->tidakhadir->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->tidakhadir->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->tidakhadir->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->value_tidakhadir->Visible) { // value_tidakhadir ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->value_tidakhadir) == "") { ?>
		<th data-name="value_tidakhadir" class="<?php echo $potongan_smk_grid->value_tidakhadir->headerCellClass() ?>"><div id="elh_potongan_smk_value_tidakhadir" class="potongan_smk_value_tidakhadir"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->value_tidakhadir->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_tidakhadir" class="<?php echo $potongan_smk_grid->value_tidakhadir->headerCellClass() ?>"><div><div id="elh_potongan_smk_value_tidakhadir" class="potongan_smk_value_tidakhadir">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->value_tidakhadir->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->value_tidakhadir->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->value_tidakhadir->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->pulcep->Visible) { // pulcep ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->pulcep) == "") { ?>
		<th data-name="pulcep" class="<?php echo $potongan_smk_grid->pulcep->headerCellClass() ?>"><div id="elh_potongan_smk_pulcep" class="potongan_smk_pulcep"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->pulcep->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pulcep" class="<?php echo $potongan_smk_grid->pulcep->headerCellClass() ?>"><div><div id="elh_potongan_smk_pulcep" class="potongan_smk_pulcep">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->pulcep->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->pulcep->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->pulcep->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->value_pulcep->Visible) { // value_pulcep ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->value_pulcep) == "") { ?>
		<th data-name="value_pulcep" class="<?php echo $potongan_smk_grid->value_pulcep->headerCellClass() ?>"><div id="elh_potongan_smk_value_pulcep" class="potongan_smk_value_pulcep"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->value_pulcep->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_pulcep" class="<?php echo $potongan_smk_grid->value_pulcep->headerCellClass() ?>"><div><div id="elh_potongan_smk_value_pulcep" class="potongan_smk_value_pulcep">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->value_pulcep->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->value_pulcep->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->value_pulcep->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->tidakhadirjam->Visible) { // tidakhadirjam ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->tidakhadirjam) == "") { ?>
		<th data-name="tidakhadirjam" class="<?php echo $potongan_smk_grid->tidakhadirjam->headerCellClass() ?>"><div id="elh_potongan_smk_tidakhadirjam" class="potongan_smk_tidakhadirjam"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->tidakhadirjam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tidakhadirjam" class="<?php echo $potongan_smk_grid->tidakhadirjam->headerCellClass() ?>"><div><div id="elh_potongan_smk_tidakhadirjam" class="potongan_smk_tidakhadirjam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->tidakhadirjam->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->tidakhadirjam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->tidakhadirjam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->tidakhadirjamvalue->Visible) { // tidakhadirjamvalue ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->tidakhadirjamvalue) == "") { ?>
		<th data-name="tidakhadirjamvalue" class="<?php echo $potongan_smk_grid->tidakhadirjamvalue->headerCellClass() ?>"><div id="elh_potongan_smk_tidakhadirjamvalue" class="potongan_smk_tidakhadirjamvalue"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->tidakhadirjamvalue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tidakhadirjamvalue" class="<?php echo $potongan_smk_grid->tidakhadirjamvalue->headerCellClass() ?>"><div><div id="elh_potongan_smk_tidakhadirjamvalue" class="potongan_smk_tidakhadirjamvalue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->tidakhadirjamvalue->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->tidakhadirjamvalue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->tidakhadirjamvalue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->sakitperjam->Visible) { // sakitperjam ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->sakitperjam) == "") { ?>
		<th data-name="sakitperjam" class="<?php echo $potongan_smk_grid->sakitperjam->headerCellClass() ?>"><div id="elh_potongan_smk_sakitperjam" class="potongan_smk_sakitperjam"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->sakitperjam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sakitperjam" class="<?php echo $potongan_smk_grid->sakitperjam->headerCellClass() ?>"><div><div id="elh_potongan_smk_sakitperjam" class="potongan_smk_sakitperjam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->sakitperjam->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->sakitperjam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->sakitperjam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->sakitperjamvalue->Visible) { // sakitperjamvalue ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->sakitperjamvalue) == "") { ?>
		<th data-name="sakitperjamvalue" class="<?php echo $potongan_smk_grid->sakitperjamvalue->headerCellClass() ?>"><div id="elh_potongan_smk_sakitperjamvalue" class="potongan_smk_sakitperjamvalue"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->sakitperjamvalue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sakitperjamvalue" class="<?php echo $potongan_smk_grid->sakitperjamvalue->headerCellClass() ?>"><div><div id="elh_potongan_smk_sakitperjamvalue" class="potongan_smk_sakitperjamvalue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->sakitperjamvalue->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->sakitperjamvalue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->sakitperjamvalue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->izinperjam->Visible) { // izinperjam ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->izinperjam) == "") { ?>
		<th data-name="izinperjam" class="<?php echo $potongan_smk_grid->izinperjam->headerCellClass() ?>"><div id="elh_potongan_smk_izinperjam" class="potongan_smk_izinperjam"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->izinperjam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="izinperjam" class="<?php echo $potongan_smk_grid->izinperjam->headerCellClass() ?>"><div><div id="elh_potongan_smk_izinperjam" class="potongan_smk_izinperjam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->izinperjam->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->izinperjam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->izinperjam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->izinperjamvalue->Visible) { // izinperjamvalue ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->izinperjamvalue) == "") { ?>
		<th data-name="izinperjamvalue" class="<?php echo $potongan_smk_grid->izinperjamvalue->headerCellClass() ?>"><div id="elh_potongan_smk_izinperjamvalue" class="potongan_smk_izinperjamvalue"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->izinperjamvalue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="izinperjamvalue" class="<?php echo $potongan_smk_grid->izinperjamvalue->headerCellClass() ?>"><div><div id="elh_potongan_smk_izinperjamvalue" class="potongan_smk_izinperjamvalue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->izinperjamvalue->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->izinperjamvalue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->izinperjamvalue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_smk_grid->totalpotongan->Visible) { // totalpotongan ?>
	<?php if ($potongan_smk_grid->SortUrl($potongan_smk_grid->totalpotongan) == "") { ?>
		<th data-name="totalpotongan" class="<?php echo $potongan_smk_grid->totalpotongan->headerCellClass() ?>"><div id="elh_potongan_smk_totalpotongan" class="potongan_smk_totalpotongan"><div class="ew-table-header-caption"><?php echo $potongan_smk_grid->totalpotongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="totalpotongan" class="<?php echo $potongan_smk_grid->totalpotongan->headerCellClass() ?>"><div><div id="elh_potongan_smk_totalpotongan" class="potongan_smk_totalpotongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_smk_grid->totalpotongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_smk_grid->totalpotongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_smk_grid->totalpotongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$potongan_smk_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$potongan_smk_grid->StartRecord = 1;
$potongan_smk_grid->StopRecord = $potongan_smk_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($potongan_smk->isConfirm() || $potongan_smk_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($potongan_smk_grid->FormKeyCountName) && ($potongan_smk_grid->isGridAdd() || $potongan_smk_grid->isGridEdit() || $potongan_smk->isConfirm())) {
		$potongan_smk_grid->KeyCount = $CurrentForm->getValue($potongan_smk_grid->FormKeyCountName);
		$potongan_smk_grid->StopRecord = $potongan_smk_grid->StartRecord + $potongan_smk_grid->KeyCount - 1;
	}
}
$potongan_smk_grid->RecordCount = $potongan_smk_grid->StartRecord - 1;
if ($potongan_smk_grid->Recordset && !$potongan_smk_grid->Recordset->EOF) {
	$potongan_smk_grid->Recordset->moveFirst();
	$selectLimit = $potongan_smk_grid->UseSelectLimit;
	if (!$selectLimit && $potongan_smk_grid->StartRecord > 1)
		$potongan_smk_grid->Recordset->move($potongan_smk_grid->StartRecord - 1);
} elseif (!$potongan_smk->AllowAddDeleteRow && $potongan_smk_grid->StopRecord == 0) {
	$potongan_smk_grid->StopRecord = $potongan_smk->GridAddRowCount;
}

// Initialize aggregate
$potongan_smk->RowType = ROWTYPE_AGGREGATEINIT;
$potongan_smk->resetAttributes();
$potongan_smk_grid->renderRow();
if ($potongan_smk_grid->isGridAdd())
	$potongan_smk_grid->RowIndex = 0;
if ($potongan_smk_grid->isGridEdit())
	$potongan_smk_grid->RowIndex = 0;
while ($potongan_smk_grid->RecordCount < $potongan_smk_grid->StopRecord) {
	$potongan_smk_grid->RecordCount++;
	if ($potongan_smk_grid->RecordCount >= $potongan_smk_grid->StartRecord) {
		$potongan_smk_grid->RowCount++;
		if ($potongan_smk_grid->isGridAdd() || $potongan_smk_grid->isGridEdit() || $potongan_smk->isConfirm()) {
			$potongan_smk_grid->RowIndex++;
			$CurrentForm->Index = $potongan_smk_grid->RowIndex;
			if ($CurrentForm->hasValue($potongan_smk_grid->FormActionName) && ($potongan_smk->isConfirm() || $potongan_smk_grid->EventCancelled))
				$potongan_smk_grid->RowAction = strval($CurrentForm->getValue($potongan_smk_grid->FormActionName));
			elseif ($potongan_smk_grid->isGridAdd())
				$potongan_smk_grid->RowAction = "insert";
			else
				$potongan_smk_grid->RowAction = "";
		}

		// Set up key count
		$potongan_smk_grid->KeyCount = $potongan_smk_grid->RowIndex;

		// Init row class and style
		$potongan_smk->resetAttributes();
		$potongan_smk->CssClass = "";
		if ($potongan_smk_grid->isGridAdd()) {
			if ($potongan_smk->CurrentMode == "copy") {
				$potongan_smk_grid->loadRowValues($potongan_smk_grid->Recordset); // Load row values
				$potongan_smk_grid->setRecordKey($potongan_smk_grid->RowOldKey, $potongan_smk_grid->Recordset); // Set old record key
			} else {
				$potongan_smk_grid->loadRowValues(); // Load default values
				$potongan_smk_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$potongan_smk_grid->loadRowValues($potongan_smk_grid->Recordset); // Load row values
		}
		$potongan_smk->RowType = ROWTYPE_VIEW; // Render view
		if ($potongan_smk_grid->isGridAdd()) // Grid add
			$potongan_smk->RowType = ROWTYPE_ADD; // Render add
		if ($potongan_smk_grid->isGridAdd() && $potongan_smk->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$potongan_smk_grid->restoreCurrentRowFormValues($potongan_smk_grid->RowIndex); // Restore form values
		if ($potongan_smk_grid->isGridEdit()) { // Grid edit
			if ($potongan_smk->EventCancelled)
				$potongan_smk_grid->restoreCurrentRowFormValues($potongan_smk_grid->RowIndex); // Restore form values
			if ($potongan_smk_grid->RowAction == "insert")
				$potongan_smk->RowType = ROWTYPE_ADD; // Render add
			else
				$potongan_smk->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($potongan_smk_grid->isGridEdit() && ($potongan_smk->RowType == ROWTYPE_EDIT || $potongan_smk->RowType == ROWTYPE_ADD) && $potongan_smk->EventCancelled) // Update failed
			$potongan_smk_grid->restoreCurrentRowFormValues($potongan_smk_grid->RowIndex); // Restore form values
		if ($potongan_smk->RowType == ROWTYPE_EDIT) // Edit row
			$potongan_smk_grid->EditRowCount++;
		if ($potongan_smk->isConfirm()) // Confirm row
			$potongan_smk_grid->restoreCurrentRowFormValues($potongan_smk_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$potongan_smk->RowAttrs->merge(["data-rowindex" => $potongan_smk_grid->RowCount, "id" => "r" . $potongan_smk_grid->RowCount . "_potongan_smk", "data-rowtype" => $potongan_smk->RowType]);

		// Render row
		$potongan_smk_grid->renderRow();

		// Render list options
		$potongan_smk_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($potongan_smk_grid->RowAction != "delete" && $potongan_smk_grid->RowAction != "insertdelete" && !($potongan_smk_grid->RowAction == "insert" && $potongan_smk->isConfirm() && $potongan_smk_grid->emptyRow())) {
?>
	<tr <?php echo $potongan_smk->rowAttributes() ?>>
<?php

// Render list options (body, left)
$potongan_smk_grid->ListOptions->render("body", "left", $potongan_smk_grid->RowCount);
?>
	<?php if ($potongan_smk_grid->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $potongan_smk_grid->tahun->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($potongan_smk_grid->tahun->getSessionValue() != "") { ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_tahun" class="form-group">
<span<?php echo $potongan_smk_grid->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_smk_grid->tahun->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_tahun" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_tahun" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_smk_grid->tahun->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->tahun->EditValue ?>"<?php echo $potongan_smk_grid->tahun->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_tahun" name="o<?php echo $potongan_smk_grid->RowIndex ?>_tahun" id="o<?php echo $potongan_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_smk_grid->tahun->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($potongan_smk_grid->tahun->getSessionValue() != "") { ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_tahun" class="form-group">
<span<?php echo $potongan_smk_grid->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_smk_grid->tahun->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_tahun" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_tahun" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_smk_grid->tahun->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->tahun->EditValue ?>"<?php echo $potongan_smk_grid->tahun->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_tahun">
<span<?php echo $potongan_smk_grid->tahun->viewAttributes() ?>><?php echo $potongan_smk_grid->tahun->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_tahun" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_smk_grid->tahun->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_tahun" name="o<?php echo $potongan_smk_grid->RowIndex ?>_tahun" id="o<?php echo $potongan_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_smk_grid->tahun->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_tahun" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_smk_grid->tahun->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_tahun" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_tahun" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_smk_grid->tahun->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="potongan_smk" data-field="x_id" name="x<?php echo $potongan_smk_grid->RowIndex ?>_id" id="x<?php echo $potongan_smk_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($potongan_smk_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_id" name="o<?php echo $potongan_smk_grid->RowIndex ?>_id" id="o<?php echo $potongan_smk_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($potongan_smk_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT || $potongan_smk->CurrentMode == "edit") { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_id" name="x<?php echo $potongan_smk_grid->RowIndex ?>_id" id="x<?php echo $potongan_smk_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($potongan_smk_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($potongan_smk_grid->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $potongan_smk_grid->bulan->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($potongan_smk_grid->bulan->getSessionValue() != "") { ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_bulan" class="form-group">
<span<?php echo $potongan_smk_grid->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" name="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_smk_grid->bulan->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_bulan" class="form-group">
<?php
$onchange = $potongan_smk_grid->bulan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_smk_grid->bulan->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_smk_grid->RowIndex ?>_bulan">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" id="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo RemoveHtml($potongan_smk_grid->bulan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_smk_grid->bulan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_smk_grid->bulan->getPlaceHolder()) ?>"<?php echo $potongan_smk_grid->bulan->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_bulan" data-value-separator="<?php echo $potongan_smk_grid->bulan->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" id="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_smk_grid->bulan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_smkgrid"], function() {
	fpotongan_smkgrid.createAutoSuggest({"id":"x<?php echo $potongan_smk_grid->RowIndex ?>_bulan","forceSelect":false});
});
</script>
<?php echo $potongan_smk_grid->bulan->Lookup->getParamTag($potongan_smk_grid, "p_x" . $potongan_smk_grid->RowIndex . "_bulan") ?>
</span>
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_bulan" name="o<?php echo $potongan_smk_grid->RowIndex ?>_bulan" id="o<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_smk_grid->bulan->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($potongan_smk_grid->bulan->getSessionValue() != "") { ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_bulan" class="form-group">
<span<?php echo $potongan_smk_grid->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" name="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_smk_grid->bulan->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_bulan" class="form-group">
<?php
$onchange = $potongan_smk_grid->bulan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_smk_grid->bulan->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_smk_grid->RowIndex ?>_bulan">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" id="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo RemoveHtml($potongan_smk_grid->bulan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_smk_grid->bulan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_smk_grid->bulan->getPlaceHolder()) ?>"<?php echo $potongan_smk_grid->bulan->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_bulan" data-value-separator="<?php echo $potongan_smk_grid->bulan->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" id="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_smk_grid->bulan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_smkgrid"], function() {
	fpotongan_smkgrid.createAutoSuggest({"id":"x<?php echo $potongan_smk_grid->RowIndex ?>_bulan","forceSelect":false});
});
</script>
<?php echo $potongan_smk_grid->bulan->Lookup->getParamTag($potongan_smk_grid, "p_x" . $potongan_smk_grid->RowIndex . "_bulan") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_bulan">
<span<?php echo $potongan_smk_grid->bulan->viewAttributes() ?>><?php echo $potongan_smk_grid->bulan->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_bulan" name="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" id="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_smk_grid->bulan->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_bulan" name="o<?php echo $potongan_smk_grid->RowIndex ?>_bulan" id="o<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_smk_grid->bulan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_bulan" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_smk_grid->bulan->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_bulan" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_bulan" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_smk_grid->bulan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->nama->Visible) { // nama ?>
		<td data-name="nama" <?php echo $potongan_smk_grid->nama->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_nama" class="form-group">
<?php $potongan_smk_grid->nama->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $potongan_smk_grid->RowIndex ?>_nama"><?php echo EmptyValue(strval($potongan_smk_grid->nama->ViewValue)) ? $Language->phrase("PleaseSelect") : $potongan_smk_grid->nama->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($potongan_smk_grid->nama->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($potongan_smk_grid->nama->ReadOnly || $potongan_smk_grid->nama->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $potongan_smk_grid->RowIndex ?>_nama',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $potongan_smk_grid->nama->Lookup->getParamTag($potongan_smk_grid, "p_x" . $potongan_smk_grid->RowIndex . "_nama") ?>
<input type="hidden" data-table="potongan_smk" data-field="x_nama" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $potongan_smk_grid->nama->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_smk_grid->RowIndex ?>_nama" id="x<?php echo $potongan_smk_grid->RowIndex ?>_nama" value="<?php echo $potongan_smk_grid->nama->CurrentValue ?>"<?php echo $potongan_smk_grid->nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_nama" name="o<?php echo $potongan_smk_grid->RowIndex ?>_nama" id="o<?php echo $potongan_smk_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($potongan_smk_grid->nama->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_nama" class="form-group">
<?php $potongan_smk_grid->nama->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $potongan_smk_grid->RowIndex ?>_nama"><?php echo EmptyValue(strval($potongan_smk_grid->nama->ViewValue)) ? $Language->phrase("PleaseSelect") : $potongan_smk_grid->nama->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($potongan_smk_grid->nama->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($potongan_smk_grid->nama->ReadOnly || $potongan_smk_grid->nama->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $potongan_smk_grid->RowIndex ?>_nama',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $potongan_smk_grid->nama->Lookup->getParamTag($potongan_smk_grid, "p_x" . $potongan_smk_grid->RowIndex . "_nama") ?>
<input type="hidden" data-table="potongan_smk" data-field="x_nama" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $potongan_smk_grid->nama->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_smk_grid->RowIndex ?>_nama" id="x<?php echo $potongan_smk_grid->RowIndex ?>_nama" value="<?php echo $potongan_smk_grid->nama->CurrentValue ?>"<?php echo $potongan_smk_grid->nama->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_nama">
<span<?php echo $potongan_smk_grid->nama->viewAttributes() ?>><?php echo $potongan_smk_grid->nama->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_nama" name="x<?php echo $potongan_smk_grid->RowIndex ?>_nama" id="x<?php echo $potongan_smk_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($potongan_smk_grid->nama->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_nama" name="o<?php echo $potongan_smk_grid->RowIndex ?>_nama" id="o<?php echo $potongan_smk_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($potongan_smk_grid->nama->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_nama" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_nama" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($potongan_smk_grid->nama->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_nama" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_nama" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($potongan_smk_grid->nama->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id" <?php echo $potongan_smk_grid->jenjang_id->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_jenjang_id" class="form-group">
<?php
$onchange = $potongan_smk_grid->jenjang_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_smk_grid->jenjang_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" id="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo RemoveHtml($potongan_smk_grid->jenjang_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->getPlaceHolder()) ?>"<?php echo $potongan_smk_grid->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_jenjang_id" data-value-separator="<?php echo $potongan_smk_grid->jenjang_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" id="x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_smkgrid"], function() {
	fpotongan_smkgrid.createAutoSuggest({"id":"x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id","forceSelect":false});
});
</script>
<?php echo $potongan_smk_grid->jenjang_id->Lookup->getParamTag($potongan_smk_grid, "p_x" . $potongan_smk_grid->RowIndex . "_jenjang_id") ?>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_jenjang_id" name="o<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" id="o<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_jenjang_id" class="form-group">
<?php
$onchange = $potongan_smk_grid->jenjang_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_smk_grid->jenjang_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" id="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo RemoveHtml($potongan_smk_grid->jenjang_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->getPlaceHolder()) ?>"<?php echo $potongan_smk_grid->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_jenjang_id" data-value-separator="<?php echo $potongan_smk_grid->jenjang_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" id="x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_smkgrid"], function() {
	fpotongan_smkgrid.createAutoSuggest({"id":"x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id","forceSelect":false});
});
</script>
<?php echo $potongan_smk_grid->jenjang_id->Lookup->getParamTag($potongan_smk_grid, "p_x" . $potongan_smk_grid->RowIndex . "_jenjang_id") ?>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_jenjang_id">
<span<?php echo $potongan_smk_grid->jenjang_id->viewAttributes() ?>><?php echo $potongan_smk_grid->jenjang_id->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_jenjang_id" name="x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" id="x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_jenjang_id" name="o<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" id="o<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_jenjang_id" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_jenjang_id" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->jabatan_id->Visible) { // jabatan_id ?>
		<td data-name="jabatan_id" <?php echo $potongan_smk_grid->jabatan_id->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_jabatan_id" class="form-group">
<?php
$onchange = $potongan_smk_grid->jabatan_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_smk_grid->jabatan_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" id="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" value="<?php echo RemoveHtml($potongan_smk_grid->jabatan_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->getPlaceHolder()) ?>"<?php echo $potongan_smk_grid->jabatan_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_jabatan_id" data-value-separator="<?php echo $potongan_smk_grid->jabatan_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" id="x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_smkgrid"], function() {
	fpotongan_smkgrid.createAutoSuggest({"id":"x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id","forceSelect":false});
});
</script>
<?php echo $potongan_smk_grid->jabatan_id->Lookup->getParamTag($potongan_smk_grid, "p_x" . $potongan_smk_grid->RowIndex . "_jabatan_id") ?>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_jabatan_id" name="o<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" id="o<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_jabatan_id" class="form-group">
<?php
$onchange = $potongan_smk_grid->jabatan_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_smk_grid->jabatan_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" id="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" value="<?php echo RemoveHtml($potongan_smk_grid->jabatan_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->getPlaceHolder()) ?>"<?php echo $potongan_smk_grid->jabatan_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_jabatan_id" data-value-separator="<?php echo $potongan_smk_grid->jabatan_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" id="x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_smkgrid"], function() {
	fpotongan_smkgrid.createAutoSuggest({"id":"x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id","forceSelect":false});
});
</script>
<?php echo $potongan_smk_grid->jabatan_id->Lookup->getParamTag($potongan_smk_grid, "p_x" . $potongan_smk_grid->RowIndex . "_jabatan_id") ?>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_jabatan_id">
<span<?php echo $potongan_smk_grid->jabatan_id->viewAttributes() ?>><?php echo $potongan_smk_grid->jabatan_id->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_jabatan_id" name="x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" id="x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_jabatan_id" name="o<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" id="o<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_jabatan_id" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_jabatan_id" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->sertif->Visible) { // sertif ?>
		<td data-name="sertif" <?php echo $potongan_smk_grid->sertif->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_sertif" class="form-group">
<?php
$onchange = $potongan_smk_grid->sertif->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_smk_grid->sertif->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_smk_grid->RowIndex ?>_sertif">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" id="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" value="<?php echo RemoveHtml($potongan_smk_grid->sertif->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_smk_grid->sertif->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_smk_grid->sertif->getPlaceHolder()) ?>"<?php echo $potongan_smk_grid->sertif->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_sertif" data-value-separator="<?php echo $potongan_smk_grid->sertif->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_smk_grid->sertif->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_smkgrid"], function() {
	fpotongan_smkgrid.createAutoSuggest({"id":"x<?php echo $potongan_smk_grid->RowIndex ?>_sertif","forceSelect":false});
});
</script>
<?php echo $potongan_smk_grid->sertif->Lookup->getParamTag($potongan_smk_grid, "p_x" . $potongan_smk_grid->RowIndex . "_sertif") ?>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_sertif" name="o<?php echo $potongan_smk_grid->RowIndex ?>_sertif" id="o<?php echo $potongan_smk_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_smk_grid->sertif->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_sertif" class="form-group">
<?php
$onchange = $potongan_smk_grid->sertif->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_smk_grid->sertif->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_smk_grid->RowIndex ?>_sertif">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" id="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" value="<?php echo RemoveHtml($potongan_smk_grid->sertif->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_smk_grid->sertif->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_smk_grid->sertif->getPlaceHolder()) ?>"<?php echo $potongan_smk_grid->sertif->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_sertif" data-value-separator="<?php echo $potongan_smk_grid->sertif->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_smk_grid->sertif->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_smkgrid"], function() {
	fpotongan_smkgrid.createAutoSuggest({"id":"x<?php echo $potongan_smk_grid->RowIndex ?>_sertif","forceSelect":false});
});
</script>
<?php echo $potongan_smk_grid->sertif->Lookup->getParamTag($potongan_smk_grid, "p_x" . $potongan_smk_grid->RowIndex . "_sertif") ?>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_sertif">
<span<?php echo $potongan_smk_grid->sertif->viewAttributes() ?>><?php echo $potongan_smk_grid->sertif->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_sertif" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_smk_grid->sertif->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_sertif" name="o<?php echo $potongan_smk_grid->RowIndex ?>_sertif" id="o<?php echo $potongan_smk_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_smk_grid->sertif->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_sertif" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_smk_grid->sertif->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_sertif" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_sertif" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_smk_grid->sertif->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->terlambat->Visible) { // terlambat ?>
		<td data-name="terlambat" <?php echo $potongan_smk_grid->terlambat->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_terlambat" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_terlambat" name="x<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" id="x<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->terlambat->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->terlambat->EditValue ?>"<?php echo $potongan_smk_grid->terlambat->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_terlambat" name="o<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" id="o<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($potongan_smk_grid->terlambat->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_terlambat" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_terlambat" name="x<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" id="x<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->terlambat->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->terlambat->EditValue ?>"<?php echo $potongan_smk_grid->terlambat->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_terlambat">
<span<?php echo $potongan_smk_grid->terlambat->viewAttributes() ?>><?php echo $potongan_smk_grid->terlambat->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_terlambat" name="x<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" id="x<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($potongan_smk_grid->terlambat->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_terlambat" name="o<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" id="o<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($potongan_smk_grid->terlambat->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_terlambat" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($potongan_smk_grid->terlambat->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_terlambat" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($potongan_smk_grid->terlambat->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->value_terlambat->Visible) { // value_terlambat ?>
		<td data-name="value_terlambat" <?php echo $potongan_smk_grid->value_terlambat->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_value_terlambat" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_value_terlambat" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->value_terlambat->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->value_terlambat->EditValue ?>"<?php echo $potongan_smk_grid->value_terlambat->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_value_terlambat" name="o<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" id="o<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" value="<?php echo HtmlEncode($potongan_smk_grid->value_terlambat->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_value_terlambat" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_value_terlambat" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->value_terlambat->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->value_terlambat->EditValue ?>"<?php echo $potongan_smk_grid->value_terlambat->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_value_terlambat">
<span<?php echo $potongan_smk_grid->value_terlambat->viewAttributes() ?>><?php echo $potongan_smk_grid->value_terlambat->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_value_terlambat" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" value="<?php echo HtmlEncode($potongan_smk_grid->value_terlambat->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_value_terlambat" name="o<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" id="o<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" value="<?php echo HtmlEncode($potongan_smk_grid->value_terlambat->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_value_terlambat" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" value="<?php echo HtmlEncode($potongan_smk_grid->value_terlambat->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_value_terlambat" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" value="<?php echo HtmlEncode($potongan_smk_grid->value_terlambat->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->izin->Visible) { // izin ?>
		<td data-name="izin" <?php echo $potongan_smk_grid->izin->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_izin" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_izin" name="x<?php echo $potongan_smk_grid->RowIndex ?>_izin" id="x<?php echo $potongan_smk_grid->RowIndex ?>_izin" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->izin->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->izin->EditValue ?>"<?php echo $potongan_smk_grid->izin->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_izin" name="o<?php echo $potongan_smk_grid->RowIndex ?>_izin" id="o<?php echo $potongan_smk_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($potongan_smk_grid->izin->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_izin" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_izin" name="x<?php echo $potongan_smk_grid->RowIndex ?>_izin" id="x<?php echo $potongan_smk_grid->RowIndex ?>_izin" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->izin->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->izin->EditValue ?>"<?php echo $potongan_smk_grid->izin->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_izin">
<span<?php echo $potongan_smk_grid->izin->viewAttributes() ?>><?php echo $potongan_smk_grid->izin->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_izin" name="x<?php echo $potongan_smk_grid->RowIndex ?>_izin" id="x<?php echo $potongan_smk_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($potongan_smk_grid->izin->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_izin" name="o<?php echo $potongan_smk_grid->RowIndex ?>_izin" id="o<?php echo $potongan_smk_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($potongan_smk_grid->izin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_izin" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_izin" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($potongan_smk_grid->izin->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_izin" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_izin" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($potongan_smk_grid->izin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->value_izin->Visible) { // value_izin ?>
		<td data-name="value_izin" <?php echo $potongan_smk_grid->value_izin->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_value_izin" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_value_izin" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->value_izin->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->value_izin->EditValue ?>"<?php echo $potongan_smk_grid->value_izin->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_value_izin" name="o<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" id="o<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" value="<?php echo HtmlEncode($potongan_smk_grid->value_izin->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_value_izin" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_value_izin" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->value_izin->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->value_izin->EditValue ?>"<?php echo $potongan_smk_grid->value_izin->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_value_izin">
<span<?php echo $potongan_smk_grid->value_izin->viewAttributes() ?>><?php echo $potongan_smk_grid->value_izin->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_value_izin" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" value="<?php echo HtmlEncode($potongan_smk_grid->value_izin->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_value_izin" name="o<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" id="o<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" value="<?php echo HtmlEncode($potongan_smk_grid->value_izin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_value_izin" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" value="<?php echo HtmlEncode($potongan_smk_grid->value_izin->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_value_izin" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" value="<?php echo HtmlEncode($potongan_smk_grid->value_izin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->sakit->Visible) { // sakit ?>
		<td data-name="sakit" <?php echo $potongan_smk_grid->sakit->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_sakit" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_sakit" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sakit" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sakit" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->sakit->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->sakit->EditValue ?>"<?php echo $potongan_smk_grid->sakit->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_sakit" name="o<?php echo $potongan_smk_grid->RowIndex ?>_sakit" id="o<?php echo $potongan_smk_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($potongan_smk_grid->sakit->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_sakit" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_sakit" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sakit" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sakit" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->sakit->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->sakit->EditValue ?>"<?php echo $potongan_smk_grid->sakit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_sakit">
<span<?php echo $potongan_smk_grid->sakit->viewAttributes() ?>><?php echo $potongan_smk_grid->sakit->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_sakit" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sakit" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($potongan_smk_grid->sakit->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_sakit" name="o<?php echo $potongan_smk_grid->RowIndex ?>_sakit" id="o<?php echo $potongan_smk_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($potongan_smk_grid->sakit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_sakit" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_sakit" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($potongan_smk_grid->sakit->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_sakit" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_sakit" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($potongan_smk_grid->sakit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->value_sakit->Visible) { // value_sakit ?>
		<td data-name="value_sakit" <?php echo $potongan_smk_grid->value_sakit->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_value_sakit" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_value_sakit" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->value_sakit->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->value_sakit->EditValue ?>"<?php echo $potongan_smk_grid->value_sakit->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_value_sakit" name="o<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" id="o<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" value="<?php echo HtmlEncode($potongan_smk_grid->value_sakit->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_value_sakit" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_value_sakit" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->value_sakit->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->value_sakit->EditValue ?>"<?php echo $potongan_smk_grid->value_sakit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_value_sakit">
<span<?php echo $potongan_smk_grid->value_sakit->viewAttributes() ?>><?php echo $potongan_smk_grid->value_sakit->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_value_sakit" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" value="<?php echo HtmlEncode($potongan_smk_grid->value_sakit->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_value_sakit" name="o<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" id="o<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" value="<?php echo HtmlEncode($potongan_smk_grid->value_sakit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_value_sakit" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" value="<?php echo HtmlEncode($potongan_smk_grid->value_sakit->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_value_sakit" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" value="<?php echo HtmlEncode($potongan_smk_grid->value_sakit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->tidakhadir->Visible) { // tidakhadir ?>
		<td data-name="tidakhadir" <?php echo $potongan_smk_grid->tidakhadir->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_tidakhadir" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_tidakhadir" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->tidakhadir->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->tidakhadir->EditValue ?>"<?php echo $potongan_smk_grid->tidakhadir->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadir" name="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" id="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadir->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_tidakhadir" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_tidakhadir" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->tidakhadir->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->tidakhadir->EditValue ?>"<?php echo $potongan_smk_grid->tidakhadir->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_tidakhadir">
<span<?php echo $potongan_smk_grid->tidakhadir->viewAttributes() ?>><?php echo $potongan_smk_grid->tidakhadir->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadir" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadir->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadir" name="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" id="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadir->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadir" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadir->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadir" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadir->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->value_tidakhadir->Visible) { // value_tidakhadir ?>
		<td data-name="value_tidakhadir" <?php echo $potongan_smk_grid->value_tidakhadir->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_value_tidakhadir" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_value_tidakhadir" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->value_tidakhadir->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->value_tidakhadir->EditValue ?>"<?php echo $potongan_smk_grid->value_tidakhadir->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_value_tidakhadir" name="o<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" id="o<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" value="<?php echo HtmlEncode($potongan_smk_grid->value_tidakhadir->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_value_tidakhadir" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_value_tidakhadir" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->value_tidakhadir->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->value_tidakhadir->EditValue ?>"<?php echo $potongan_smk_grid->value_tidakhadir->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_value_tidakhadir">
<span<?php echo $potongan_smk_grid->value_tidakhadir->viewAttributes() ?>><?php echo $potongan_smk_grid->value_tidakhadir->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_value_tidakhadir" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" value="<?php echo HtmlEncode($potongan_smk_grid->value_tidakhadir->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_value_tidakhadir" name="o<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" id="o<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" value="<?php echo HtmlEncode($potongan_smk_grid->value_tidakhadir->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_value_tidakhadir" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" value="<?php echo HtmlEncode($potongan_smk_grid->value_tidakhadir->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_value_tidakhadir" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" value="<?php echo HtmlEncode($potongan_smk_grid->value_tidakhadir->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->pulcep->Visible) { // pulcep ?>
		<td data-name="pulcep" <?php echo $potongan_smk_grid->pulcep->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_pulcep" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_pulcep" name="x<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" id="x<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->pulcep->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->pulcep->EditValue ?>"<?php echo $potongan_smk_grid->pulcep->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_pulcep" name="o<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" id="o<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" value="<?php echo HtmlEncode($potongan_smk_grid->pulcep->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_pulcep" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_pulcep" name="x<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" id="x<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->pulcep->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->pulcep->EditValue ?>"<?php echo $potongan_smk_grid->pulcep->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_pulcep">
<span<?php echo $potongan_smk_grid->pulcep->viewAttributes() ?>><?php echo $potongan_smk_grid->pulcep->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_pulcep" name="x<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" id="x<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" value="<?php echo HtmlEncode($potongan_smk_grid->pulcep->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_pulcep" name="o<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" id="o<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" value="<?php echo HtmlEncode($potongan_smk_grid->pulcep->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_pulcep" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" value="<?php echo HtmlEncode($potongan_smk_grid->pulcep->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_pulcep" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" value="<?php echo HtmlEncode($potongan_smk_grid->pulcep->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->value_pulcep->Visible) { // value_pulcep ?>
		<td data-name="value_pulcep" <?php echo $potongan_smk_grid->value_pulcep->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_value_pulcep" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_value_pulcep" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->value_pulcep->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->value_pulcep->EditValue ?>"<?php echo $potongan_smk_grid->value_pulcep->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_value_pulcep" name="o<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" id="o<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" value="<?php echo HtmlEncode($potongan_smk_grid->value_pulcep->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_value_pulcep" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_value_pulcep" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->value_pulcep->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->value_pulcep->EditValue ?>"<?php echo $potongan_smk_grid->value_pulcep->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_value_pulcep">
<span<?php echo $potongan_smk_grid->value_pulcep->viewAttributes() ?>><?php echo $potongan_smk_grid->value_pulcep->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_value_pulcep" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" value="<?php echo HtmlEncode($potongan_smk_grid->value_pulcep->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_value_pulcep" name="o<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" id="o<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" value="<?php echo HtmlEncode($potongan_smk_grid->value_pulcep->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_value_pulcep" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" value="<?php echo HtmlEncode($potongan_smk_grid->value_pulcep->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_value_pulcep" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" value="<?php echo HtmlEncode($potongan_smk_grid->value_pulcep->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->tidakhadirjam->Visible) { // tidakhadirjam ?>
		<td data-name="tidakhadirjam" <?php echo $potongan_smk_grid->tidakhadirjam->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_tidakhadirjam" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_tidakhadirjam" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjam->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->tidakhadirjam->EditValue ?>"<?php echo $potongan_smk_grid->tidakhadirjam->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadirjam" name="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" id="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjam->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_tidakhadirjam" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_tidakhadirjam" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjam->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->tidakhadirjam->EditValue ?>"<?php echo $potongan_smk_grid->tidakhadirjam->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_tidakhadirjam">
<span<?php echo $potongan_smk_grid->tidakhadirjam->viewAttributes() ?>><?php echo $potongan_smk_grid->tidakhadirjam->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadirjam" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjam->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadirjam" name="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" id="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjam->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadirjam" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjam->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadirjam" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjam->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->tidakhadirjamvalue->Visible) { // tidakhadirjamvalue ?>
		<td data-name="tidakhadirjamvalue" <?php echo $potongan_smk_grid->tidakhadirjamvalue->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_tidakhadirjamvalue" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_tidakhadirjamvalue" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->tidakhadirjamvalue->EditValue ?>"<?php echo $potongan_smk_grid->tidakhadirjamvalue->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadirjamvalue" name="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" id="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjamvalue->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_tidakhadirjamvalue" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_tidakhadirjamvalue" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->tidakhadirjamvalue->EditValue ?>"<?php echo $potongan_smk_grid->tidakhadirjamvalue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_tidakhadirjamvalue">
<span<?php echo $potongan_smk_grid->tidakhadirjamvalue->viewAttributes() ?>><?php echo $potongan_smk_grid->tidakhadirjamvalue->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadirjamvalue" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjamvalue->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadirjamvalue" name="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" id="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjamvalue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadirjamvalue" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjamvalue->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadirjamvalue" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjamvalue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->sakitperjam->Visible) { // sakitperjam ?>
		<td data-name="sakitperjam" <?php echo $potongan_smk_grid->sakitperjam->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_sakitperjam" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_sakitperjam" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->sakitperjam->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->sakitperjam->EditValue ?>"<?php echo $potongan_smk_grid->sakitperjam->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_sakitperjam" name="o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" id="o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" value="<?php echo HtmlEncode($potongan_smk_grid->sakitperjam->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_sakitperjam" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_sakitperjam" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->sakitperjam->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->sakitperjam->EditValue ?>"<?php echo $potongan_smk_grid->sakitperjam->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_sakitperjam">
<span<?php echo $potongan_smk_grid->sakitperjam->viewAttributes() ?>><?php echo $potongan_smk_grid->sakitperjam->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_sakitperjam" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" value="<?php echo HtmlEncode($potongan_smk_grid->sakitperjam->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_sakitperjam" name="o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" id="o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" value="<?php echo HtmlEncode($potongan_smk_grid->sakitperjam->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_sakitperjam" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" value="<?php echo HtmlEncode($potongan_smk_grid->sakitperjam->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_sakitperjam" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" value="<?php echo HtmlEncode($potongan_smk_grid->sakitperjam->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->sakitperjamvalue->Visible) { // sakitperjamvalue ?>
		<td data-name="sakitperjamvalue" <?php echo $potongan_smk_grid->sakitperjamvalue->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_sakitperjamvalue" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_sakitperjamvalue" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->sakitperjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->sakitperjamvalue->EditValue ?>"<?php echo $potongan_smk_grid->sakitperjamvalue->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_sakitperjamvalue" name="o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" id="o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->sakitperjamvalue->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_sakitperjamvalue" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_sakitperjamvalue" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->sakitperjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->sakitperjamvalue->EditValue ?>"<?php echo $potongan_smk_grid->sakitperjamvalue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_sakitperjamvalue">
<span<?php echo $potongan_smk_grid->sakitperjamvalue->viewAttributes() ?>><?php echo $potongan_smk_grid->sakitperjamvalue->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_sakitperjamvalue" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->sakitperjamvalue->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_sakitperjamvalue" name="o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" id="o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->sakitperjamvalue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_sakitperjamvalue" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->sakitperjamvalue->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_sakitperjamvalue" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->sakitperjamvalue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->izinperjam->Visible) { // izinperjam ?>
		<td data-name="izinperjam" <?php echo $potongan_smk_grid->izinperjam->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_izinperjam" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_izinperjam" name="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" id="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->izinperjam->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->izinperjam->EditValue ?>"<?php echo $potongan_smk_grid->izinperjam->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_izinperjam" name="o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" id="o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" value="<?php echo HtmlEncode($potongan_smk_grid->izinperjam->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_izinperjam" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_izinperjam" name="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" id="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->izinperjam->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->izinperjam->EditValue ?>"<?php echo $potongan_smk_grid->izinperjam->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_izinperjam">
<span<?php echo $potongan_smk_grid->izinperjam->viewAttributes() ?>><?php echo $potongan_smk_grid->izinperjam->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_izinperjam" name="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" id="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" value="<?php echo HtmlEncode($potongan_smk_grid->izinperjam->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_izinperjam" name="o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" id="o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" value="<?php echo HtmlEncode($potongan_smk_grid->izinperjam->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_izinperjam" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" value="<?php echo HtmlEncode($potongan_smk_grid->izinperjam->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_izinperjam" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" value="<?php echo HtmlEncode($potongan_smk_grid->izinperjam->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->izinperjamvalue->Visible) { // izinperjamvalue ?>
		<td data-name="izinperjamvalue" <?php echo $potongan_smk_grid->izinperjamvalue->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_izinperjamvalue" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_izinperjamvalue" name="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" id="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->izinperjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->izinperjamvalue->EditValue ?>"<?php echo $potongan_smk_grid->izinperjamvalue->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_izinperjamvalue" name="o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" id="o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->izinperjamvalue->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_izinperjamvalue" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_izinperjamvalue" name="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" id="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->izinperjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->izinperjamvalue->EditValue ?>"<?php echo $potongan_smk_grid->izinperjamvalue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_izinperjamvalue">
<span<?php echo $potongan_smk_grid->izinperjamvalue->viewAttributes() ?>><?php echo $potongan_smk_grid->izinperjamvalue->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_izinperjamvalue" name="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" id="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->izinperjamvalue->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_izinperjamvalue" name="o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" id="o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->izinperjamvalue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_izinperjamvalue" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->izinperjamvalue->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_izinperjamvalue" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->izinperjamvalue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->totalpotongan->Visible) { // totalpotongan ?>
		<td data-name="totalpotongan" <?php echo $potongan_smk_grid->totalpotongan->cellAttributes() ?>>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_totalpotongan" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_totalpotongan" name="x<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" id="x<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->totalpotongan->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->totalpotongan->EditValue ?>"<?php echo $potongan_smk_grid->totalpotongan->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_totalpotongan" name="o<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" id="o<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" value="<?php echo HtmlEncode($potongan_smk_grid->totalpotongan->OldValue) ?>">
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_totalpotongan" class="form-group">
<input type="text" data-table="potongan_smk" data-field="x_totalpotongan" name="x<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" id="x<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->totalpotongan->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->totalpotongan->EditValue ?>"<?php echo $potongan_smk_grid->totalpotongan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($potongan_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $potongan_smk_grid->RowCount ?>_potongan_smk_totalpotongan">
<span<?php echo $potongan_smk_grid->totalpotongan->viewAttributes() ?>><?php echo $potongan_smk_grid->totalpotongan->getViewValue() ?></span>
</span>
<?php if (!$potongan_smk->isConfirm()) { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_totalpotongan" name="x<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" id="x<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" value="<?php echo HtmlEncode($potongan_smk_grid->totalpotongan->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_totalpotongan" name="o<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" id="o<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" value="<?php echo HtmlEncode($potongan_smk_grid->totalpotongan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="potongan_smk" data-field="x_totalpotongan" name="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" id="fpotongan_smkgrid$x<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" value="<?php echo HtmlEncode($potongan_smk_grid->totalpotongan->FormValue) ?>">
<input type="hidden" data-table="potongan_smk" data-field="x_totalpotongan" name="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" id="fpotongan_smkgrid$o<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" value="<?php echo HtmlEncode($potongan_smk_grid->totalpotongan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$potongan_smk_grid->ListOptions->render("body", "right", $potongan_smk_grid->RowCount);
?>
	</tr>
<?php if ($potongan_smk->RowType == ROWTYPE_ADD || $potongan_smk->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpotongan_smkgrid", "load"], function() {
	fpotongan_smkgrid.updateLists(<?php echo $potongan_smk_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$potongan_smk_grid->isGridAdd() || $potongan_smk->CurrentMode == "copy")
		if (!$potongan_smk_grid->Recordset->EOF)
			$potongan_smk_grid->Recordset->moveNext();
}
?>
<?php
	if ($potongan_smk->CurrentMode == "add" || $potongan_smk->CurrentMode == "copy" || $potongan_smk->CurrentMode == "edit") {
		$potongan_smk_grid->RowIndex = '$rowindex$';
		$potongan_smk_grid->loadRowValues();

		// Set row properties
		$potongan_smk->resetAttributes();
		$potongan_smk->RowAttrs->merge(["data-rowindex" => $potongan_smk_grid->RowIndex, "id" => "r0_potongan_smk", "data-rowtype" => ROWTYPE_ADD]);
		$potongan_smk->RowAttrs->appendClass("ew-template");
		$potongan_smk->RowType = ROWTYPE_ADD;

		// Render row
		$potongan_smk_grid->renderRow();

		// Render list options
		$potongan_smk_grid->renderListOptions();
		$potongan_smk_grid->StartRowCount = 0;
?>
	<tr <?php echo $potongan_smk->rowAttributes() ?>>
<?php

// Render list options (body, left)
$potongan_smk_grid->ListOptions->render("body", "left", $potongan_smk_grid->RowIndex);
?>
	<?php if ($potongan_smk_grid->tahun->Visible) { // tahun ?>
		<td data-name="tahun">
<?php if (!$potongan_smk->isConfirm()) { ?>
<?php if ($potongan_smk_grid->tahun->getSessionValue() != "") { ?>
<span id="el$rowindex$_potongan_smk_tahun" class="form-group potongan_smk_tahun">
<span<?php echo $potongan_smk_grid->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_smk_grid->tahun->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_tahun" class="form-group potongan_smk_tahun">
<input type="text" data-table="potongan_smk" data-field="x_tahun" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_smk_grid->tahun->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->tahun->EditValue ?>"<?php echo $potongan_smk_grid->tahun->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_tahun" class="form-group potongan_smk_tahun">
<span<?php echo $potongan_smk_grid->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_tahun" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_smk_grid->tahun->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_tahun" name="o<?php echo $potongan_smk_grid->RowIndex ?>_tahun" id="o<?php echo $potongan_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($potongan_smk_grid->tahun->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->bulan->Visible) { // bulan ?>
		<td data-name="bulan">
<?php if (!$potongan_smk->isConfirm()) { ?>
<?php if ($potongan_smk_grid->bulan->getSessionValue() != "") { ?>
<span id="el$rowindex$_potongan_smk_bulan" class="form-group potongan_smk_bulan">
<span<?php echo $potongan_smk_grid->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" name="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_smk_grid->bulan->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_bulan" class="form-group potongan_smk_bulan">
<?php
$onchange = $potongan_smk_grid->bulan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_smk_grid->bulan->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_smk_grid->RowIndex ?>_bulan">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" id="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo RemoveHtml($potongan_smk_grid->bulan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_smk_grid->bulan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_smk_grid->bulan->getPlaceHolder()) ?>"<?php echo $potongan_smk_grid->bulan->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_bulan" data-value-separator="<?php echo $potongan_smk_grid->bulan->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" id="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_smk_grid->bulan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_smkgrid"], function() {
	fpotongan_smkgrid.createAutoSuggest({"id":"x<?php echo $potongan_smk_grid->RowIndex ?>_bulan","forceSelect":false});
});
</script>
<?php echo $potongan_smk_grid->bulan->Lookup->getParamTag($potongan_smk_grid, "p_x" . $potongan_smk_grid->RowIndex . "_bulan") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_bulan" class="form-group potongan_smk_bulan">
<span<?php echo $potongan_smk_grid->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_bulan" name="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" id="x<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_smk_grid->bulan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_bulan" name="o<?php echo $potongan_smk_grid->RowIndex ?>_bulan" id="o<?php echo $potongan_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($potongan_smk_grid->bulan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->nama->Visible) { // nama ?>
		<td data-name="nama">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_nama" class="form-group potongan_smk_nama">
<?php $potongan_smk_grid->nama->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $potongan_smk_grid->RowIndex ?>_nama"><?php echo EmptyValue(strval($potongan_smk_grid->nama->ViewValue)) ? $Language->phrase("PleaseSelect") : $potongan_smk_grid->nama->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($potongan_smk_grid->nama->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($potongan_smk_grid->nama->ReadOnly || $potongan_smk_grid->nama->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $potongan_smk_grid->RowIndex ?>_nama',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $potongan_smk_grid->nama->Lookup->getParamTag($potongan_smk_grid, "p_x" . $potongan_smk_grid->RowIndex . "_nama") ?>
<input type="hidden" data-table="potongan_smk" data-field="x_nama" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $potongan_smk_grid->nama->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_smk_grid->RowIndex ?>_nama" id="x<?php echo $potongan_smk_grid->RowIndex ?>_nama" value="<?php echo $potongan_smk_grid->nama->CurrentValue ?>"<?php echo $potongan_smk_grid->nama->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_nama" class="form-group potongan_smk_nama">
<span<?php echo $potongan_smk_grid->nama->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->nama->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_nama" name="x<?php echo $potongan_smk_grid->RowIndex ?>_nama" id="x<?php echo $potongan_smk_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($potongan_smk_grid->nama->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_nama" name="o<?php echo $potongan_smk_grid->RowIndex ?>_nama" id="o<?php echo $potongan_smk_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($potongan_smk_grid->nama->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_jenjang_id" class="form-group potongan_smk_jenjang_id">
<?php
$onchange = $potongan_smk_grid->jenjang_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_smk_grid->jenjang_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" id="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo RemoveHtml($potongan_smk_grid->jenjang_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->getPlaceHolder()) ?>"<?php echo $potongan_smk_grid->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_jenjang_id" data-value-separator="<?php echo $potongan_smk_grid->jenjang_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" id="x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_smkgrid"], function() {
	fpotongan_smkgrid.createAutoSuggest({"id":"x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id","forceSelect":false});
});
</script>
<?php echo $potongan_smk_grid->jenjang_id->Lookup->getParamTag($potongan_smk_grid, "p_x" . $potongan_smk_grid->RowIndex . "_jenjang_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_jenjang_id" class="form-group potongan_smk_jenjang_id">
<span<?php echo $potongan_smk_grid->jenjang_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->jenjang_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_jenjang_id" name="x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" id="x<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_jenjang_id" name="o<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" id="o<?php echo $potongan_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($potongan_smk_grid->jenjang_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->jabatan_id->Visible) { // jabatan_id ?>
		<td data-name="jabatan_id">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_jabatan_id" class="form-group potongan_smk_jabatan_id">
<?php
$onchange = $potongan_smk_grid->jabatan_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_smk_grid->jabatan_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" id="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" value="<?php echo RemoveHtml($potongan_smk_grid->jabatan_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->getPlaceHolder()) ?>"<?php echo $potongan_smk_grid->jabatan_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_jabatan_id" data-value-separator="<?php echo $potongan_smk_grid->jabatan_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" id="x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_smkgrid"], function() {
	fpotongan_smkgrid.createAutoSuggest({"id":"x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id","forceSelect":false});
});
</script>
<?php echo $potongan_smk_grid->jabatan_id->Lookup->getParamTag($potongan_smk_grid, "p_x" . $potongan_smk_grid->RowIndex . "_jabatan_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_jabatan_id" class="form-group potongan_smk_jabatan_id">
<span<?php echo $potongan_smk_grid->jabatan_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->jabatan_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_jabatan_id" name="x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" id="x<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_jabatan_id" name="o<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" id="o<?php echo $potongan_smk_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($potongan_smk_grid->jabatan_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->sertif->Visible) { // sertif ?>
		<td data-name="sertif">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_sertif" class="form-group potongan_smk_sertif">
<?php
$onchange = $potongan_smk_grid->sertif->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_smk_grid->sertif->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $potongan_smk_grid->RowIndex ?>_sertif">
	<input type="text" class="form-control" name="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" id="sv_x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" value="<?php echo RemoveHtml($potongan_smk_grid->sertif->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_smk_grid->sertif->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_smk_grid->sertif->getPlaceHolder()) ?>"<?php echo $potongan_smk_grid->sertif->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_sertif" data-value-separator="<?php echo $potongan_smk_grid->sertif->displayValueSeparatorAttribute() ?>" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_smk_grid->sertif->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_smkgrid"], function() {
	fpotongan_smkgrid.createAutoSuggest({"id":"x<?php echo $potongan_smk_grid->RowIndex ?>_sertif","forceSelect":false});
});
</script>
<?php echo $potongan_smk_grid->sertif->Lookup->getParamTag($potongan_smk_grid, "p_x" . $potongan_smk_grid->RowIndex . "_sertif") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_sertif" class="form-group potongan_smk_sertif">
<span<?php echo $potongan_smk_grid->sertif->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->sertif->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_sertif" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_smk_grid->sertif->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_sertif" name="o<?php echo $potongan_smk_grid->RowIndex ?>_sertif" id="o<?php echo $potongan_smk_grid->RowIndex ?>_sertif" value="<?php echo HtmlEncode($potongan_smk_grid->sertif->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->terlambat->Visible) { // terlambat ?>
		<td data-name="terlambat">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_terlambat" class="form-group potongan_smk_terlambat">
<input type="text" data-table="potongan_smk" data-field="x_terlambat" name="x<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" id="x<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->terlambat->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->terlambat->EditValue ?>"<?php echo $potongan_smk_grid->terlambat->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_terlambat" class="form-group potongan_smk_terlambat">
<span<?php echo $potongan_smk_grid->terlambat->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->terlambat->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_terlambat" name="x<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" id="x<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($potongan_smk_grid->terlambat->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_terlambat" name="o<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" id="o<?php echo $potongan_smk_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($potongan_smk_grid->terlambat->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->value_terlambat->Visible) { // value_terlambat ?>
		<td data-name="value_terlambat">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_value_terlambat" class="form-group potongan_smk_value_terlambat">
<input type="text" data-table="potongan_smk" data-field="x_value_terlambat" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->value_terlambat->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->value_terlambat->EditValue ?>"<?php echo $potongan_smk_grid->value_terlambat->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_value_terlambat" class="form-group potongan_smk_value_terlambat">
<span<?php echo $potongan_smk_grid->value_terlambat->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->value_terlambat->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_value_terlambat" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" value="<?php echo HtmlEncode($potongan_smk_grid->value_terlambat->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_value_terlambat" name="o<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" id="o<?php echo $potongan_smk_grid->RowIndex ?>_value_terlambat" value="<?php echo HtmlEncode($potongan_smk_grid->value_terlambat->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->izin->Visible) { // izin ?>
		<td data-name="izin">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_izin" class="form-group potongan_smk_izin">
<input type="text" data-table="potongan_smk" data-field="x_izin" name="x<?php echo $potongan_smk_grid->RowIndex ?>_izin" id="x<?php echo $potongan_smk_grid->RowIndex ?>_izin" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->izin->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->izin->EditValue ?>"<?php echo $potongan_smk_grid->izin->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_izin" class="form-group potongan_smk_izin">
<span<?php echo $potongan_smk_grid->izin->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->izin->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_izin" name="x<?php echo $potongan_smk_grid->RowIndex ?>_izin" id="x<?php echo $potongan_smk_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($potongan_smk_grid->izin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_izin" name="o<?php echo $potongan_smk_grid->RowIndex ?>_izin" id="o<?php echo $potongan_smk_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($potongan_smk_grid->izin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->value_izin->Visible) { // value_izin ?>
		<td data-name="value_izin">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_value_izin" class="form-group potongan_smk_value_izin">
<input type="text" data-table="potongan_smk" data-field="x_value_izin" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->value_izin->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->value_izin->EditValue ?>"<?php echo $potongan_smk_grid->value_izin->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_value_izin" class="form-group potongan_smk_value_izin">
<span<?php echo $potongan_smk_grid->value_izin->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->value_izin->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_value_izin" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" value="<?php echo HtmlEncode($potongan_smk_grid->value_izin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_value_izin" name="o<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" id="o<?php echo $potongan_smk_grid->RowIndex ?>_value_izin" value="<?php echo HtmlEncode($potongan_smk_grid->value_izin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->sakit->Visible) { // sakit ?>
		<td data-name="sakit">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_sakit" class="form-group potongan_smk_sakit">
<input type="text" data-table="potongan_smk" data-field="x_sakit" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sakit" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sakit" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->sakit->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->sakit->EditValue ?>"<?php echo $potongan_smk_grid->sakit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_sakit" class="form-group potongan_smk_sakit">
<span<?php echo $potongan_smk_grid->sakit->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->sakit->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_sakit" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sakit" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($potongan_smk_grid->sakit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_sakit" name="o<?php echo $potongan_smk_grid->RowIndex ?>_sakit" id="o<?php echo $potongan_smk_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($potongan_smk_grid->sakit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->value_sakit->Visible) { // value_sakit ?>
		<td data-name="value_sakit">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_value_sakit" class="form-group potongan_smk_value_sakit">
<input type="text" data-table="potongan_smk" data-field="x_value_sakit" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->value_sakit->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->value_sakit->EditValue ?>"<?php echo $potongan_smk_grid->value_sakit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_value_sakit" class="form-group potongan_smk_value_sakit">
<span<?php echo $potongan_smk_grid->value_sakit->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->value_sakit->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_value_sakit" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" value="<?php echo HtmlEncode($potongan_smk_grid->value_sakit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_value_sakit" name="o<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" id="o<?php echo $potongan_smk_grid->RowIndex ?>_value_sakit" value="<?php echo HtmlEncode($potongan_smk_grid->value_sakit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->tidakhadir->Visible) { // tidakhadir ?>
		<td data-name="tidakhadir">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_tidakhadir" class="form-group potongan_smk_tidakhadir">
<input type="text" data-table="potongan_smk" data-field="x_tidakhadir" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->tidakhadir->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->tidakhadir->EditValue ?>"<?php echo $potongan_smk_grid->tidakhadir->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_tidakhadir" class="form-group potongan_smk_tidakhadir">
<span<?php echo $potongan_smk_grid->tidakhadir->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->tidakhadir->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadir" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadir->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadir" name="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" id="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadir" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadir->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->value_tidakhadir->Visible) { // value_tidakhadir ?>
		<td data-name="value_tidakhadir">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_value_tidakhadir" class="form-group potongan_smk_value_tidakhadir">
<input type="text" data-table="potongan_smk" data-field="x_value_tidakhadir" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->value_tidakhadir->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->value_tidakhadir->EditValue ?>"<?php echo $potongan_smk_grid->value_tidakhadir->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_value_tidakhadir" class="form-group potongan_smk_value_tidakhadir">
<span<?php echo $potongan_smk_grid->value_tidakhadir->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->value_tidakhadir->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_value_tidakhadir" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" value="<?php echo HtmlEncode($potongan_smk_grid->value_tidakhadir->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_value_tidakhadir" name="o<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" id="o<?php echo $potongan_smk_grid->RowIndex ?>_value_tidakhadir" value="<?php echo HtmlEncode($potongan_smk_grid->value_tidakhadir->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->pulcep->Visible) { // pulcep ?>
		<td data-name="pulcep">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_pulcep" class="form-group potongan_smk_pulcep">
<input type="text" data-table="potongan_smk" data-field="x_pulcep" name="x<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" id="x<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->pulcep->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->pulcep->EditValue ?>"<?php echo $potongan_smk_grid->pulcep->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_pulcep" class="form-group potongan_smk_pulcep">
<span<?php echo $potongan_smk_grid->pulcep->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->pulcep->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_pulcep" name="x<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" id="x<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" value="<?php echo HtmlEncode($potongan_smk_grid->pulcep->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_pulcep" name="o<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" id="o<?php echo $potongan_smk_grid->RowIndex ?>_pulcep" value="<?php echo HtmlEncode($potongan_smk_grid->pulcep->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->value_pulcep->Visible) { // value_pulcep ?>
		<td data-name="value_pulcep">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_value_pulcep" class="form-group potongan_smk_value_pulcep">
<input type="text" data-table="potongan_smk" data-field="x_value_pulcep" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->value_pulcep->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->value_pulcep->EditValue ?>"<?php echo $potongan_smk_grid->value_pulcep->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_value_pulcep" class="form-group potongan_smk_value_pulcep">
<span<?php echo $potongan_smk_grid->value_pulcep->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->value_pulcep->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_value_pulcep" name="x<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" id="x<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" value="<?php echo HtmlEncode($potongan_smk_grid->value_pulcep->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_value_pulcep" name="o<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" id="o<?php echo $potongan_smk_grid->RowIndex ?>_value_pulcep" value="<?php echo HtmlEncode($potongan_smk_grid->value_pulcep->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->tidakhadirjam->Visible) { // tidakhadirjam ?>
		<td data-name="tidakhadirjam">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_tidakhadirjam" class="form-group potongan_smk_tidakhadirjam">
<input type="text" data-table="potongan_smk" data-field="x_tidakhadirjam" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjam->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->tidakhadirjam->EditValue ?>"<?php echo $potongan_smk_grid->tidakhadirjam->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_tidakhadirjam" class="form-group potongan_smk_tidakhadirjam">
<span<?php echo $potongan_smk_grid->tidakhadirjam->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->tidakhadirjam->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadirjam" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjam->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadirjam" name="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" id="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjam" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjam->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->tidakhadirjamvalue->Visible) { // tidakhadirjamvalue ?>
		<td data-name="tidakhadirjamvalue">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_tidakhadirjamvalue" class="form-group potongan_smk_tidakhadirjamvalue">
<input type="text" data-table="potongan_smk" data-field="x_tidakhadirjamvalue" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->tidakhadirjamvalue->EditValue ?>"<?php echo $potongan_smk_grid->tidakhadirjamvalue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_tidakhadirjamvalue" class="form-group potongan_smk_tidakhadirjamvalue">
<span<?php echo $potongan_smk_grid->tidakhadirjamvalue->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->tidakhadirjamvalue->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadirjamvalue" name="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" id="x<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjamvalue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_tidakhadirjamvalue" name="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" id="o<?php echo $potongan_smk_grid->RowIndex ?>_tidakhadirjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->tidakhadirjamvalue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->sakitperjam->Visible) { // sakitperjam ?>
		<td data-name="sakitperjam">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_sakitperjam" class="form-group potongan_smk_sakitperjam">
<input type="text" data-table="potongan_smk" data-field="x_sakitperjam" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->sakitperjam->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->sakitperjam->EditValue ?>"<?php echo $potongan_smk_grid->sakitperjam->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_sakitperjam" class="form-group potongan_smk_sakitperjam">
<span<?php echo $potongan_smk_grid->sakitperjam->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->sakitperjam->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_sakitperjam" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" value="<?php echo HtmlEncode($potongan_smk_grid->sakitperjam->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_sakitperjam" name="o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" id="o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjam" value="<?php echo HtmlEncode($potongan_smk_grid->sakitperjam->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->sakitperjamvalue->Visible) { // sakitperjamvalue ?>
		<td data-name="sakitperjamvalue">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_sakitperjamvalue" class="form-group potongan_smk_sakitperjamvalue">
<input type="text" data-table="potongan_smk" data-field="x_sakitperjamvalue" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->sakitperjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->sakitperjamvalue->EditValue ?>"<?php echo $potongan_smk_grid->sakitperjamvalue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_sakitperjamvalue" class="form-group potongan_smk_sakitperjamvalue">
<span<?php echo $potongan_smk_grid->sakitperjamvalue->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->sakitperjamvalue->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_sakitperjamvalue" name="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" id="x<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->sakitperjamvalue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_sakitperjamvalue" name="o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" id="o<?php echo $potongan_smk_grid->RowIndex ?>_sakitperjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->sakitperjamvalue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->izinperjam->Visible) { // izinperjam ?>
		<td data-name="izinperjam">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_izinperjam" class="form-group potongan_smk_izinperjam">
<input type="text" data-table="potongan_smk" data-field="x_izinperjam" name="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" id="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($potongan_smk_grid->izinperjam->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->izinperjam->EditValue ?>"<?php echo $potongan_smk_grid->izinperjam->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_izinperjam" class="form-group potongan_smk_izinperjam">
<span<?php echo $potongan_smk_grid->izinperjam->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->izinperjam->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_izinperjam" name="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" id="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" value="<?php echo HtmlEncode($potongan_smk_grid->izinperjam->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_izinperjam" name="o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" id="o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjam" value="<?php echo HtmlEncode($potongan_smk_grid->izinperjam->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->izinperjamvalue->Visible) { // izinperjamvalue ?>
		<td data-name="izinperjamvalue">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_izinperjamvalue" class="form-group potongan_smk_izinperjamvalue">
<input type="text" data-table="potongan_smk" data-field="x_izinperjamvalue" name="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" id="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->izinperjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->izinperjamvalue->EditValue ?>"<?php echo $potongan_smk_grid->izinperjamvalue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_izinperjamvalue" class="form-group potongan_smk_izinperjamvalue">
<span<?php echo $potongan_smk_grid->izinperjamvalue->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->izinperjamvalue->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_izinperjamvalue" name="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" id="x<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->izinperjamvalue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_izinperjamvalue" name="o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" id="o<?php echo $potongan_smk_grid->RowIndex ?>_izinperjamvalue" value="<?php echo HtmlEncode($potongan_smk_grid->izinperjamvalue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($potongan_smk_grid->totalpotongan->Visible) { // totalpotongan ?>
		<td data-name="totalpotongan">
<?php if (!$potongan_smk->isConfirm()) { ?>
<span id="el$rowindex$_potongan_smk_totalpotongan" class="form-group potongan_smk_totalpotongan">
<input type="text" data-table="potongan_smk" data-field="x_totalpotongan" name="x<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" id="x<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_smk_grid->totalpotongan->getPlaceHolder()) ?>" value="<?php echo $potongan_smk_grid->totalpotongan->EditValue ?>"<?php echo $potongan_smk_grid->totalpotongan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_potongan_smk_totalpotongan" class="form-group potongan_smk_totalpotongan">
<span<?php echo $potongan_smk_grid->totalpotongan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_smk_grid->totalpotongan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="potongan_smk" data-field="x_totalpotongan" name="x<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" id="x<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" value="<?php echo HtmlEncode($potongan_smk_grid->totalpotongan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="potongan_smk" data-field="x_totalpotongan" name="o<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" id="o<?php echo $potongan_smk_grid->RowIndex ?>_totalpotongan" value="<?php echo HtmlEncode($potongan_smk_grid->totalpotongan->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$potongan_smk_grid->ListOptions->render("body", "right", $potongan_smk_grid->RowIndex);
?>
<script>
loadjs.ready(["fpotongan_smkgrid", "load"], function() {
	fpotongan_smkgrid.updateLists(<?php echo $potongan_smk_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($potongan_smk->CurrentMode == "add" || $potongan_smk->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $potongan_smk_grid->FormKeyCountName ?>" id="<?php echo $potongan_smk_grid->FormKeyCountName ?>" value="<?php echo $potongan_smk_grid->KeyCount ?>">
<?php echo $potongan_smk_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($potongan_smk->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $potongan_smk_grid->FormKeyCountName ?>" id="<?php echo $potongan_smk_grid->FormKeyCountName ?>" value="<?php echo $potongan_smk_grid->KeyCount ?>">
<?php echo $potongan_smk_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($potongan_smk->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpotongan_smkgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($potongan_smk_grid->Recordset)
	$potongan_smk_grid->Recordset->Close();
?>
<?php if ($potongan_smk_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $potongan_smk_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($potongan_smk_grid->TotalRecords == 0 && !$potongan_smk->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $potongan_smk_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$potongan_smk_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$potongan_smk_grid->terminate();
?>