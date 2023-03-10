<?php
namespace PHPMaker2020\sigap;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($gaji_tu_smk_grid))
	$gaji_tu_smk_grid = new gaji_tu_smk_grid();

// Run the page
$gaji_tu_smk_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_tu_smk_grid->Page_Render();
?>
<?php if (!$gaji_tu_smk_grid->isExport()) { ?>
<script>
var fgaji_tu_smkgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fgaji_tu_smkgrid = new ew.Form("fgaji_tu_smkgrid", "grid");
	fgaji_tu_smkgrid.formKeyCountName = '<?php echo $gaji_tu_smk_grid->FormKeyCountName ?>';

	// Validate form
	fgaji_tu_smkgrid.validate = function() {
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
			<?php if ($gaji_tu_smk_grid->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_tu_smk_grid->tahun->caption(), $gaji_tu_smk_grid->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_tu_smk_grid->tahun->errorMessage()) ?>");
			<?php if ($gaji_tu_smk_grid->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_tu_smk_grid->bulan->caption(), $gaji_tu_smk_grid->bulan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_tu_smk_grid->bulan->errorMessage()) ?>");
			<?php if ($gaji_tu_smk_grid->pegawai->Required) { ?>
				elm = this.getElements("x" + infix + "_pegawai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_tu_smk_grid->pegawai->caption(), $gaji_tu_smk_grid->pegawai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($gaji_tu_smk_grid->jenjang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_tu_smk_grid->jenjang_id->caption(), $gaji_tu_smk_grid->jenjang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_tu_smk_grid->jenjang_id->errorMessage()) ?>");
			<?php if ($gaji_tu_smk_grid->sub_total->Required) { ?>
				elm = this.getElements("x" + infix + "_sub_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_tu_smk_grid->sub_total->caption(), $gaji_tu_smk_grid->sub_total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sub_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_tu_smk_grid->sub_total->errorMessage()) ?>");
			<?php if ($gaji_tu_smk_grid->jaminan_pensiun->Required) { ?>
				elm = this.getElements("x" + infix + "_jaminan_pensiun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_tu_smk_grid->jaminan_pensiun->caption(), $gaji_tu_smk_grid->jaminan_pensiun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jaminan_pensiun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_tu_smk_grid->jaminan_pensiun->errorMessage()) ?>");
			<?php if ($gaji_tu_smk_grid->jaminan_hari_tua->Required) { ?>
				elm = this.getElements("x" + infix + "_jaminan_hari_tua");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_tu_smk_grid->jaminan_hari_tua->caption(), $gaji_tu_smk_grid->jaminan_hari_tua->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jaminan_hari_tua");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_tu_smk_grid->jaminan_hari_tua->errorMessage()) ?>");
			<?php if ($gaji_tu_smk_grid->total_pph21->Required) { ?>
				elm = this.getElements("x" + infix + "_total_pph21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_tu_smk_grid->total_pph21->caption(), $gaji_tu_smk_grid->total_pph21->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total_pph21");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_tu_smk_grid->total_pph21->errorMessage()) ?>");
			<?php if ($gaji_tu_smk_grid->bpjs_kesehatan->Required) { ?>
				elm = this.getElements("x" + infix + "_bpjs_kesehatan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_tu_smk_grid->bpjs_kesehatan->caption(), $gaji_tu_smk_grid->bpjs_kesehatan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bpjs_kesehatan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_tu_smk_grid->bpjs_kesehatan->errorMessage()) ?>");
			<?php if ($gaji_tu_smk_grid->potongan->Required) { ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_tu_smk_grid->potongan->caption(), $gaji_tu_smk_grid->potongan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_tu_smk_grid->potongan->errorMessage()) ?>");
			<?php if ($gaji_tu_smk_grid->penyesuaian->Required) { ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_tu_smk_grid->penyesuaian->caption(), $gaji_tu_smk_grid->penyesuaian->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_tu_smk_grid->penyesuaian->errorMessage()) ?>");
			<?php if ($gaji_tu_smk_grid->potongan_bendahara->Required) { ?>
				elm = this.getElements("x" + infix + "_potongan_bendahara");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_tu_smk_grid->potongan_bendahara->caption(), $gaji_tu_smk_grid->potongan_bendahara->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_potongan_bendahara");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_tu_smk_grid->potongan_bendahara->errorMessage()) ?>");
			<?php if ($gaji_tu_smk_grid->total->Required) { ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_tu_smk_grid->total->caption(), $gaji_tu_smk_grid->total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_tu_smk_grid->total->errorMessage()) ?>");
			<?php if ($gaji_tu_smk_grid->voucher->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_tu_smk_grid->voucher->caption(), $gaji_tu_smk_grid->voucher->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_tu_smk_grid->voucher->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fgaji_tu_smkgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "tahun", false)) return false;
		if (ew.valueChanged(fobj, infix, "bulan", false)) return false;
		if (ew.valueChanged(fobj, infix, "pegawai", false)) return false;
		if (ew.valueChanged(fobj, infix, "jenjang_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "sub_total", false)) return false;
		if (ew.valueChanged(fobj, infix, "jaminan_pensiun", false)) return false;
		if (ew.valueChanged(fobj, infix, "jaminan_hari_tua", false)) return false;
		if (ew.valueChanged(fobj, infix, "total_pph21", false)) return false;
		if (ew.valueChanged(fobj, infix, "bpjs_kesehatan", false)) return false;
		if (ew.valueChanged(fobj, infix, "potongan", false)) return false;
		if (ew.valueChanged(fobj, infix, "penyesuaian", false)) return false;
		if (ew.valueChanged(fobj, infix, "potongan_bendahara", false)) return false;
		if (ew.valueChanged(fobj, infix, "total", false)) return false;
		if (ew.valueChanged(fobj, infix, "voucher", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fgaji_tu_smkgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fgaji_tu_smkgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fgaji_tu_smkgrid.lists["x_bulan"] = <?php echo $gaji_tu_smk_grid->bulan->Lookup->toClientList($gaji_tu_smk_grid) ?>;
	fgaji_tu_smkgrid.lists["x_bulan"].options = <?php echo JsonEncode($gaji_tu_smk_grid->bulan->lookupOptions()) ?>;
	fgaji_tu_smkgrid.autoSuggests["x_bulan"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fgaji_tu_smkgrid.lists["x_pegawai"] = <?php echo $gaji_tu_smk_grid->pegawai->Lookup->toClientList($gaji_tu_smk_grid) ?>;
	fgaji_tu_smkgrid.lists["x_pegawai"].options = <?php echo JsonEncode($gaji_tu_smk_grid->pegawai->lookupOptions()) ?>;
	fgaji_tu_smkgrid.lists["x_jenjang_id"] = <?php echo $gaji_tu_smk_grid->jenjang_id->Lookup->toClientList($gaji_tu_smk_grid) ?>;
	fgaji_tu_smkgrid.lists["x_jenjang_id"].options = <?php echo JsonEncode($gaji_tu_smk_grid->jenjang_id->lookupOptions()) ?>;
	fgaji_tu_smkgrid.autoSuggests["x_jenjang_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fgaji_tu_smkgrid");
});
</script>
<?php } ?>
<?php
$gaji_tu_smk_grid->renderOtherOptions();
?>
<?php if ($gaji_tu_smk_grid->TotalRecords > 0 || $gaji_tu_smk->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($gaji_tu_smk_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> gaji_tu_smk">
<?php if ($gaji_tu_smk_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $gaji_tu_smk_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fgaji_tu_smkgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_gaji_tu_smk" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_gaji_tu_smkgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$gaji_tu_smk->RowType = ROWTYPE_HEADER;

// Render list options
$gaji_tu_smk_grid->renderListOptions();

// Render list options (header, left)
$gaji_tu_smk_grid->ListOptions->render("header", "left");
?>
<?php if ($gaji_tu_smk_grid->tahun->Visible) { // tahun ?>
	<?php if ($gaji_tu_smk_grid->SortUrl($gaji_tu_smk_grid->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $gaji_tu_smk_grid->tahun->headerCellClass() ?>"><div id="elh_gaji_tu_smk_tahun" class="gaji_tu_smk_tahun"><div class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $gaji_tu_smk_grid->tahun->headerCellClass() ?>"><div><div id="elh_gaji_tu_smk_tahun" class="gaji_tu_smk_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_smk_grid->tahun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_smk_grid->tahun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_smk_grid->bulan->Visible) { // bulan ?>
	<?php if ($gaji_tu_smk_grid->SortUrl($gaji_tu_smk_grid->bulan) == "") { ?>
		<th data-name="bulan" class="<?php echo $gaji_tu_smk_grid->bulan->headerCellClass() ?>"><div id="elh_gaji_tu_smk_bulan" class="gaji_tu_smk_bulan"><div class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->bulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bulan" class="<?php echo $gaji_tu_smk_grid->bulan->headerCellClass() ?>"><div><div id="elh_gaji_tu_smk_bulan" class="gaji_tu_smk_bulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_smk_grid->bulan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_smk_grid->bulan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_smk_grid->pegawai->Visible) { // pegawai ?>
	<?php if ($gaji_tu_smk_grid->SortUrl($gaji_tu_smk_grid->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $gaji_tu_smk_grid->pegawai->headerCellClass() ?>"><div id="elh_gaji_tu_smk_pegawai" class="gaji_tu_smk_pegawai"><div class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $gaji_tu_smk_grid->pegawai->headerCellClass() ?>"><div><div id="elh_gaji_tu_smk_pegawai" class="gaji_tu_smk_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_smk_grid->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_smk_grid->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_smk_grid->jenjang_id->Visible) { // jenjang_id ?>
	<?php if ($gaji_tu_smk_grid->SortUrl($gaji_tu_smk_grid->jenjang_id) == "") { ?>
		<th data-name="jenjang_id" class="<?php echo $gaji_tu_smk_grid->jenjang_id->headerCellClass() ?>"><div id="elh_gaji_tu_smk_jenjang_id" class="gaji_tu_smk_jenjang_id"><div class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->jenjang_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang_id" class="<?php echo $gaji_tu_smk_grid->jenjang_id->headerCellClass() ?>"><div><div id="elh_gaji_tu_smk_jenjang_id" class="gaji_tu_smk_jenjang_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->jenjang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_smk_grid->jenjang_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_smk_grid->jenjang_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_smk_grid->sub_total->Visible) { // sub_total ?>
	<?php if ($gaji_tu_smk_grid->SortUrl($gaji_tu_smk_grid->sub_total) == "") { ?>
		<th data-name="sub_total" class="<?php echo $gaji_tu_smk_grid->sub_total->headerCellClass() ?>"><div id="elh_gaji_tu_smk_sub_total" class="gaji_tu_smk_sub_total"><div class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->sub_total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sub_total" class="<?php echo $gaji_tu_smk_grid->sub_total->headerCellClass() ?>"><div><div id="elh_gaji_tu_smk_sub_total" class="gaji_tu_smk_sub_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->sub_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_smk_grid->sub_total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_smk_grid->sub_total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_smk_grid->jaminan_pensiun->Visible) { // jaminan_pensiun ?>
	<?php if ($gaji_tu_smk_grid->SortUrl($gaji_tu_smk_grid->jaminan_pensiun) == "") { ?>
		<th data-name="jaminan_pensiun" class="<?php echo $gaji_tu_smk_grid->jaminan_pensiun->headerCellClass() ?>"><div id="elh_gaji_tu_smk_jaminan_pensiun" class="gaji_tu_smk_jaminan_pensiun"><div class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->jaminan_pensiun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jaminan_pensiun" class="<?php echo $gaji_tu_smk_grid->jaminan_pensiun->headerCellClass() ?>"><div><div id="elh_gaji_tu_smk_jaminan_pensiun" class="gaji_tu_smk_jaminan_pensiun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->jaminan_pensiun->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_smk_grid->jaminan_pensiun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_smk_grid->jaminan_pensiun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_smk_grid->jaminan_hari_tua->Visible) { // jaminan_hari_tua ?>
	<?php if ($gaji_tu_smk_grid->SortUrl($gaji_tu_smk_grid->jaminan_hari_tua) == "") { ?>
		<th data-name="jaminan_hari_tua" class="<?php echo $gaji_tu_smk_grid->jaminan_hari_tua->headerCellClass() ?>"><div id="elh_gaji_tu_smk_jaminan_hari_tua" class="gaji_tu_smk_jaminan_hari_tua"><div class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->jaminan_hari_tua->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jaminan_hari_tua" class="<?php echo $gaji_tu_smk_grid->jaminan_hari_tua->headerCellClass() ?>"><div><div id="elh_gaji_tu_smk_jaminan_hari_tua" class="gaji_tu_smk_jaminan_hari_tua">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->jaminan_hari_tua->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_smk_grid->jaminan_hari_tua->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_smk_grid->jaminan_hari_tua->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_smk_grid->total_pph21->Visible) { // total_pph21 ?>
	<?php if ($gaji_tu_smk_grid->SortUrl($gaji_tu_smk_grid->total_pph21) == "") { ?>
		<th data-name="total_pph21" class="<?php echo $gaji_tu_smk_grid->total_pph21->headerCellClass() ?>"><div id="elh_gaji_tu_smk_total_pph21" class="gaji_tu_smk_total_pph21"><div class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->total_pph21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_pph21" class="<?php echo $gaji_tu_smk_grid->total_pph21->headerCellClass() ?>"><div><div id="elh_gaji_tu_smk_total_pph21" class="gaji_tu_smk_total_pph21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->total_pph21->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_smk_grid->total_pph21->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_smk_grid->total_pph21->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_smk_grid->bpjs_kesehatan->Visible) { // bpjs_kesehatan ?>
	<?php if ($gaji_tu_smk_grid->SortUrl($gaji_tu_smk_grid->bpjs_kesehatan) == "") { ?>
		<th data-name="bpjs_kesehatan" class="<?php echo $gaji_tu_smk_grid->bpjs_kesehatan->headerCellClass() ?>"><div id="elh_gaji_tu_smk_bpjs_kesehatan" class="gaji_tu_smk_bpjs_kesehatan"><div class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->bpjs_kesehatan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bpjs_kesehatan" class="<?php echo $gaji_tu_smk_grid->bpjs_kesehatan->headerCellClass() ?>"><div><div id="elh_gaji_tu_smk_bpjs_kesehatan" class="gaji_tu_smk_bpjs_kesehatan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->bpjs_kesehatan->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_smk_grid->bpjs_kesehatan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_smk_grid->bpjs_kesehatan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_smk_grid->potongan->Visible) { // potongan ?>
	<?php if ($gaji_tu_smk_grid->SortUrl($gaji_tu_smk_grid->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $gaji_tu_smk_grid->potongan->headerCellClass() ?>"><div id="elh_gaji_tu_smk_potongan" class="gaji_tu_smk_potongan"><div class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $gaji_tu_smk_grid->potongan->headerCellClass() ?>"><div><div id="elh_gaji_tu_smk_potongan" class="gaji_tu_smk_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_smk_grid->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_smk_grid->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_smk_grid->penyesuaian->Visible) { // penyesuaian ?>
	<?php if ($gaji_tu_smk_grid->SortUrl($gaji_tu_smk_grid->penyesuaian) == "") { ?>
		<th data-name="penyesuaian" class="<?php echo $gaji_tu_smk_grid->penyesuaian->headerCellClass() ?>"><div id="elh_gaji_tu_smk_penyesuaian" class="gaji_tu_smk_penyesuaian"><div class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->penyesuaian->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="penyesuaian" class="<?php echo $gaji_tu_smk_grid->penyesuaian->headerCellClass() ?>"><div><div id="elh_gaji_tu_smk_penyesuaian" class="gaji_tu_smk_penyesuaian">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->penyesuaian->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_smk_grid->penyesuaian->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_smk_grid->penyesuaian->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_smk_grid->potongan_bendahara->Visible) { // potongan_bendahara ?>
	<?php if ($gaji_tu_smk_grid->SortUrl($gaji_tu_smk_grid->potongan_bendahara) == "") { ?>
		<th data-name="potongan_bendahara" class="<?php echo $gaji_tu_smk_grid->potongan_bendahara->headerCellClass() ?>"><div id="elh_gaji_tu_smk_potongan_bendahara" class="gaji_tu_smk_potongan_bendahara"><div class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->potongan_bendahara->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan_bendahara" class="<?php echo $gaji_tu_smk_grid->potongan_bendahara->headerCellClass() ?>"><div><div id="elh_gaji_tu_smk_potongan_bendahara" class="gaji_tu_smk_potongan_bendahara">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->potongan_bendahara->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_smk_grid->potongan_bendahara->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_smk_grid->potongan_bendahara->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_smk_grid->total->Visible) { // total ?>
	<?php if ($gaji_tu_smk_grid->SortUrl($gaji_tu_smk_grid->total) == "") { ?>
		<th data-name="total" class="<?php echo $gaji_tu_smk_grid->total->headerCellClass() ?>"><div id="elh_gaji_tu_smk_total" class="gaji_tu_smk_total"><div class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $gaji_tu_smk_grid->total->headerCellClass() ?>"><div><div id="elh_gaji_tu_smk_total" class="gaji_tu_smk_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_smk_grid->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_smk_grid->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_tu_smk_grid->voucher->Visible) { // voucher ?>
	<?php if ($gaji_tu_smk_grid->SortUrl($gaji_tu_smk_grid->voucher) == "") { ?>
		<th data-name="voucher" class="<?php echo $gaji_tu_smk_grid->voucher->headerCellClass() ?>"><div id="elh_gaji_tu_smk_voucher" class="gaji_tu_smk_voucher"><div class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->voucher->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher" class="<?php echo $gaji_tu_smk_grid->voucher->headerCellClass() ?>"><div><div id="elh_gaji_tu_smk_voucher" class="gaji_tu_smk_voucher">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_tu_smk_grid->voucher->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_tu_smk_grid->voucher->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_tu_smk_grid->voucher->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$gaji_tu_smk_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$gaji_tu_smk_grid->StartRecord = 1;
$gaji_tu_smk_grid->StopRecord = $gaji_tu_smk_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($gaji_tu_smk->isConfirm() || $gaji_tu_smk_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($gaji_tu_smk_grid->FormKeyCountName) && ($gaji_tu_smk_grid->isGridAdd() || $gaji_tu_smk_grid->isGridEdit() || $gaji_tu_smk->isConfirm())) {
		$gaji_tu_smk_grid->KeyCount = $CurrentForm->getValue($gaji_tu_smk_grid->FormKeyCountName);
		$gaji_tu_smk_grid->StopRecord = $gaji_tu_smk_grid->StartRecord + $gaji_tu_smk_grid->KeyCount - 1;
	}
}
$gaji_tu_smk_grid->RecordCount = $gaji_tu_smk_grid->StartRecord - 1;
if ($gaji_tu_smk_grid->Recordset && !$gaji_tu_smk_grid->Recordset->EOF) {
	$gaji_tu_smk_grid->Recordset->moveFirst();
	$selectLimit = $gaji_tu_smk_grid->UseSelectLimit;
	if (!$selectLimit && $gaji_tu_smk_grid->StartRecord > 1)
		$gaji_tu_smk_grid->Recordset->move($gaji_tu_smk_grid->StartRecord - 1);
} elseif (!$gaji_tu_smk->AllowAddDeleteRow && $gaji_tu_smk_grid->StopRecord == 0) {
	$gaji_tu_smk_grid->StopRecord = $gaji_tu_smk->GridAddRowCount;
}

// Initialize aggregate
$gaji_tu_smk->RowType = ROWTYPE_AGGREGATEINIT;
$gaji_tu_smk->resetAttributes();
$gaji_tu_smk_grid->renderRow();
if ($gaji_tu_smk_grid->isGridAdd())
	$gaji_tu_smk_grid->RowIndex = 0;
if ($gaji_tu_smk_grid->isGridEdit())
	$gaji_tu_smk_grid->RowIndex = 0;
while ($gaji_tu_smk_grid->RecordCount < $gaji_tu_smk_grid->StopRecord) {
	$gaji_tu_smk_grid->RecordCount++;
	if ($gaji_tu_smk_grid->RecordCount >= $gaji_tu_smk_grid->StartRecord) {
		$gaji_tu_smk_grid->RowCount++;
		if ($gaji_tu_smk_grid->isGridAdd() || $gaji_tu_smk_grid->isGridEdit() || $gaji_tu_smk->isConfirm()) {
			$gaji_tu_smk_grid->RowIndex++;
			$CurrentForm->Index = $gaji_tu_smk_grid->RowIndex;
			if ($CurrentForm->hasValue($gaji_tu_smk_grid->FormActionName) && ($gaji_tu_smk->isConfirm() || $gaji_tu_smk_grid->EventCancelled))
				$gaji_tu_smk_grid->RowAction = strval($CurrentForm->getValue($gaji_tu_smk_grid->FormActionName));
			elseif ($gaji_tu_smk_grid->isGridAdd())
				$gaji_tu_smk_grid->RowAction = "insert";
			else
				$gaji_tu_smk_grid->RowAction = "";
		}

		// Set up key count
		$gaji_tu_smk_grid->KeyCount = $gaji_tu_smk_grid->RowIndex;

		// Init row class and style
		$gaji_tu_smk->resetAttributes();
		$gaji_tu_smk->CssClass = "";
		if ($gaji_tu_smk_grid->isGridAdd()) {
			if ($gaji_tu_smk->CurrentMode == "copy") {
				$gaji_tu_smk_grid->loadRowValues($gaji_tu_smk_grid->Recordset); // Load row values
				$gaji_tu_smk_grid->setRecordKey($gaji_tu_smk_grid->RowOldKey, $gaji_tu_smk_grid->Recordset); // Set old record key
			} else {
				$gaji_tu_smk_grid->loadRowValues(); // Load default values
				$gaji_tu_smk_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$gaji_tu_smk_grid->loadRowValues($gaji_tu_smk_grid->Recordset); // Load row values
		}
		$gaji_tu_smk->RowType = ROWTYPE_VIEW; // Render view
		if ($gaji_tu_smk_grid->isGridAdd()) // Grid add
			$gaji_tu_smk->RowType = ROWTYPE_ADD; // Render add
		if ($gaji_tu_smk_grid->isGridAdd() && $gaji_tu_smk->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$gaji_tu_smk_grid->restoreCurrentRowFormValues($gaji_tu_smk_grid->RowIndex); // Restore form values
		if ($gaji_tu_smk_grid->isGridEdit()) { // Grid edit
			if ($gaji_tu_smk->EventCancelled)
				$gaji_tu_smk_grid->restoreCurrentRowFormValues($gaji_tu_smk_grid->RowIndex); // Restore form values
			if ($gaji_tu_smk_grid->RowAction == "insert")
				$gaji_tu_smk->RowType = ROWTYPE_ADD; // Render add
			else
				$gaji_tu_smk->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($gaji_tu_smk_grid->isGridEdit() && ($gaji_tu_smk->RowType == ROWTYPE_EDIT || $gaji_tu_smk->RowType == ROWTYPE_ADD) && $gaji_tu_smk->EventCancelled) // Update failed
			$gaji_tu_smk_grid->restoreCurrentRowFormValues($gaji_tu_smk_grid->RowIndex); // Restore form values
		if ($gaji_tu_smk->RowType == ROWTYPE_EDIT) // Edit row
			$gaji_tu_smk_grid->EditRowCount++;
		if ($gaji_tu_smk->isConfirm()) // Confirm row
			$gaji_tu_smk_grid->restoreCurrentRowFormValues($gaji_tu_smk_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$gaji_tu_smk->RowAttrs->merge(["data-rowindex" => $gaji_tu_smk_grid->RowCount, "id" => "r" . $gaji_tu_smk_grid->RowCount . "_gaji_tu_smk", "data-rowtype" => $gaji_tu_smk->RowType]);

		// Render row
		$gaji_tu_smk_grid->renderRow();

		// Render list options
		$gaji_tu_smk_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($gaji_tu_smk_grid->RowAction != "delete" && $gaji_tu_smk_grid->RowAction != "insertdelete" && !($gaji_tu_smk_grid->RowAction == "insert" && $gaji_tu_smk->isConfirm() && $gaji_tu_smk_grid->emptyRow())) {
?>
	<tr <?php echo $gaji_tu_smk->rowAttributes() ?>>
<?php

// Render list options (body, left)
$gaji_tu_smk_grid->ListOptions->render("body", "left", $gaji_tu_smk_grid->RowCount);
?>
	<?php if ($gaji_tu_smk_grid->tahun->Visible) { // tahun ?>
		<td data-name="tahun" <?php echo $gaji_tu_smk_grid->tahun->cellAttributes() ?>>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($gaji_tu_smk_grid->tahun->getSessionValue() != "") { ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_tahun" class="form-group">
<span<?php echo $gaji_tu_smk_grid->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->tahun->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_tahun" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_tahun" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->tahun->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->tahun->EditValue ?>"<?php echo $gaji_tu_smk_grid->tahun->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_tahun" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->tahun->OldValue) ?>">
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($gaji_tu_smk_grid->tahun->getSessionValue() != "") { ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_tahun" class="form-group">
<span<?php echo $gaji_tu_smk_grid->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->tahun->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_tahun" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_tahun" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->tahun->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->tahun->EditValue ?>"<?php echo $gaji_tu_smk_grid->tahun->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_tahun">
<span<?php echo $gaji_tu_smk_grid->tahun->viewAttributes() ?>><?php echo $gaji_tu_smk_grid->tahun->getViewValue() ?></span>
</span>
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_tahun" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->tahun->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_tahun" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->tahun->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_tahun" name="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" id="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->tahun->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_tahun" name="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" id="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->tahun->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_id" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_id" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($gaji_tu_smk_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_id" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_id" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($gaji_tu_smk_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_EDIT || $gaji_tu_smk->CurrentMode == "edit") { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_id" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_id" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($gaji_tu_smk_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($gaji_tu_smk_grid->bulan->Visible) { // bulan ?>
		<td data-name="bulan" <?php echo $gaji_tu_smk_grid->bulan->cellAttributes() ?>>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($gaji_tu_smk_grid->bulan->getSessionValue() != "") { ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_bulan" class="form-group">
<span<?php echo $gaji_tu_smk_grid->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_bulan" class="form-group">
<?php
$onchange = $gaji_tu_smk_grid->bulan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$gaji_tu_smk_grid->bulan->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan">
	<input type="text" class="form-control" name="sv_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" id="sv_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo RemoveHtml($gaji_tu_smk_grid->bulan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->getPlaceHolder()) ?>"<?php echo $gaji_tu_smk_grid->bulan->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bulan" data-value-separator="<?php echo $gaji_tu_smk_grid->bulan->displayValueSeparatorAttribute() ?>" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fgaji_tu_smkgrid"], function() {
	fgaji_tu_smkgrid.createAutoSuggest({"id":"x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan","forceSelect":false});
});
</script>
<?php echo $gaji_tu_smk_grid->bulan->Lookup->getParamTag($gaji_tu_smk_grid, "p_x" . $gaji_tu_smk_grid->RowIndex . "_bulan") ?>
</span>
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bulan" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->OldValue) ?>">
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($gaji_tu_smk_grid->bulan->getSessionValue() != "") { ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_bulan" class="form-group">
<span<?php echo $gaji_tu_smk_grid->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_bulan" class="form-group">
<?php
$onchange = $gaji_tu_smk_grid->bulan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$gaji_tu_smk_grid->bulan->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan">
	<input type="text" class="form-control" name="sv_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" id="sv_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo RemoveHtml($gaji_tu_smk_grid->bulan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->getPlaceHolder()) ?>"<?php echo $gaji_tu_smk_grid->bulan->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bulan" data-value-separator="<?php echo $gaji_tu_smk_grid->bulan->displayValueSeparatorAttribute() ?>" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fgaji_tu_smkgrid"], function() {
	fgaji_tu_smkgrid.createAutoSuggest({"id":"x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan","forceSelect":false});
});
</script>
<?php echo $gaji_tu_smk_grid->bulan->Lookup->getParamTag($gaji_tu_smk_grid, "p_x" . $gaji_tu_smk_grid->RowIndex . "_bulan") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_bulan">
<span<?php echo $gaji_tu_smk_grid->bulan->viewAttributes() ?>><?php echo $gaji_tu_smk_grid->bulan->getViewValue() ?></span>
</span>
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bulan" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bulan" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bulan" name="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" id="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bulan" name="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" id="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $gaji_tu_smk_grid->pegawai->cellAttributes() ?>>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_pegawai" class="form-group">
<?php $gaji_tu_smk_grid->pegawai->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai"><?php echo EmptyValue(strval($gaji_tu_smk_grid->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $gaji_tu_smk_grid->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($gaji_tu_smk_grid->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($gaji_tu_smk_grid->pegawai->ReadOnly || $gaji_tu_smk_grid->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $gaji_tu_smk_grid->pegawai->Lookup->getParamTag($gaji_tu_smk_grid, "p_x" . $gaji_tu_smk_grid->RowIndex . "_pegawai") ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $gaji_tu_smk_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" value="<?php echo $gaji_tu_smk_grid->pegawai->CurrentValue ?>"<?php echo $gaji_tu_smk_grid->pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_pegawai" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($gaji_tu_smk_grid->pegawai->OldValue) ?>">
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_pegawai" class="form-group">
<?php $gaji_tu_smk_grid->pegawai->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai"><?php echo EmptyValue(strval($gaji_tu_smk_grid->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $gaji_tu_smk_grid->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($gaji_tu_smk_grid->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($gaji_tu_smk_grid->pegawai->ReadOnly || $gaji_tu_smk_grid->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $gaji_tu_smk_grid->pegawai->Lookup->getParamTag($gaji_tu_smk_grid, "p_x" . $gaji_tu_smk_grid->RowIndex . "_pegawai") ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $gaji_tu_smk_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" value="<?php echo $gaji_tu_smk_grid->pegawai->CurrentValue ?>"<?php echo $gaji_tu_smk_grid->pegawai->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_pegawai">
<span<?php echo $gaji_tu_smk_grid->pegawai->viewAttributes() ?>><?php echo $gaji_tu_smk_grid->pegawai->getViewValue() ?></span>
</span>
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_pegawai" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($gaji_tu_smk_grid->pegawai->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_pegawai" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($gaji_tu_smk_grid->pegawai->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_pegawai" name="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" id="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($gaji_tu_smk_grid->pegawai->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_pegawai" name="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" id="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($gaji_tu_smk_grid->pegawai->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id" <?php echo $gaji_tu_smk_grid->jenjang_id->cellAttributes() ?>>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_jenjang_id" class="form-group">
<?php
$onchange = $gaji_tu_smk_grid->jenjang_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$gaji_tu_smk_grid->jenjang_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id">
	<input type="text" class="form-control" name="sv_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" id="sv_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo RemoveHtml($gaji_tu_smk_grid->jenjang_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->getPlaceHolder()) ?>"<?php echo $gaji_tu_smk_grid->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jenjang_id" data-value-separator="<?php echo $gaji_tu_smk_grid->jenjang_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fgaji_tu_smkgrid"], function() {
	fgaji_tu_smkgrid.createAutoSuggest({"id":"x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id","forceSelect":false});
});
</script>
<?php echo $gaji_tu_smk_grid->jenjang_id->Lookup->getParamTag($gaji_tu_smk_grid, "p_x" . $gaji_tu_smk_grid->RowIndex . "_jenjang_id") ?>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jenjang_id" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->OldValue) ?>">
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_jenjang_id" class="form-group">
<?php
$onchange = $gaji_tu_smk_grid->jenjang_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$gaji_tu_smk_grid->jenjang_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id">
	<input type="text" class="form-control" name="sv_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" id="sv_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo RemoveHtml($gaji_tu_smk_grid->jenjang_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->getPlaceHolder()) ?>"<?php echo $gaji_tu_smk_grid->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jenjang_id" data-value-separator="<?php echo $gaji_tu_smk_grid->jenjang_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fgaji_tu_smkgrid"], function() {
	fgaji_tu_smkgrid.createAutoSuggest({"id":"x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id","forceSelect":false});
});
</script>
<?php echo $gaji_tu_smk_grid->jenjang_id->Lookup->getParamTag($gaji_tu_smk_grid, "p_x" . $gaji_tu_smk_grid->RowIndex . "_jenjang_id") ?>
</span>
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_jenjang_id">
<span<?php echo $gaji_tu_smk_grid->jenjang_id->viewAttributes() ?>><?php echo $gaji_tu_smk_grid->jenjang_id->getViewValue() ?></span>
</span>
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jenjang_id" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jenjang_id" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jenjang_id" name="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" id="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jenjang_id" name="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" id="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->sub_total->Visible) { // sub_total ?>
		<td data-name="sub_total" <?php echo $gaji_tu_smk_grid->sub_total->cellAttributes() ?>>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_sub_total" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_sub_total" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->sub_total->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->sub_total->EditValue ?>"<?php echo $gaji_tu_smk_grid->sub_total->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_sub_total" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($gaji_tu_smk_grid->sub_total->OldValue) ?>">
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_sub_total" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_sub_total" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->sub_total->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->sub_total->EditValue ?>"<?php echo $gaji_tu_smk_grid->sub_total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_sub_total">
<span<?php echo $gaji_tu_smk_grid->sub_total->viewAttributes() ?>><?php echo $gaji_tu_smk_grid->sub_total->getViewValue() ?></span>
</span>
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_sub_total" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($gaji_tu_smk_grid->sub_total->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_sub_total" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($gaji_tu_smk_grid->sub_total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_sub_total" name="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" id="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($gaji_tu_smk_grid->sub_total->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_sub_total" name="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" id="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($gaji_tu_smk_grid->sub_total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->jaminan_pensiun->Visible) { // jaminan_pensiun ?>
		<td data-name="jaminan_pensiun" <?php echo $gaji_tu_smk_grid->jaminan_pensiun->cellAttributes() ?>>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_jaminan_pensiun" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_jaminan_pensiun" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_pensiun->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->jaminan_pensiun->EditValue ?>"<?php echo $gaji_tu_smk_grid->jaminan_pensiun->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jaminan_pensiun" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_pensiun->OldValue) ?>">
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_jaminan_pensiun" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_jaminan_pensiun" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_pensiun->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->jaminan_pensiun->EditValue ?>"<?php echo $gaji_tu_smk_grid->jaminan_pensiun->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_jaminan_pensiun">
<span<?php echo $gaji_tu_smk_grid->jaminan_pensiun->viewAttributes() ?>><?php echo $gaji_tu_smk_grid->jaminan_pensiun->getViewValue() ?></span>
</span>
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jaminan_pensiun" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_pensiun->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jaminan_pensiun" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_pensiun->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jaminan_pensiun" name="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" id="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_pensiun->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jaminan_pensiun" name="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" id="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_pensiun->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->jaminan_hari_tua->Visible) { // jaminan_hari_tua ?>
		<td data-name="jaminan_hari_tua" <?php echo $gaji_tu_smk_grid->jaminan_hari_tua->cellAttributes() ?>>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_jaminan_hari_tua" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_jaminan_hari_tua" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_hari_tua->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->jaminan_hari_tua->EditValue ?>"<?php echo $gaji_tu_smk_grid->jaminan_hari_tua->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jaminan_hari_tua" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_hari_tua->OldValue) ?>">
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_jaminan_hari_tua" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_jaminan_hari_tua" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_hari_tua->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->jaminan_hari_tua->EditValue ?>"<?php echo $gaji_tu_smk_grid->jaminan_hari_tua->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_jaminan_hari_tua">
<span<?php echo $gaji_tu_smk_grid->jaminan_hari_tua->viewAttributes() ?>><?php echo $gaji_tu_smk_grid->jaminan_hari_tua->getViewValue() ?></span>
</span>
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jaminan_hari_tua" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_hari_tua->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jaminan_hari_tua" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_hari_tua->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jaminan_hari_tua" name="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" id="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_hari_tua->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jaminan_hari_tua" name="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" id="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_hari_tua->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->total_pph21->Visible) { // total_pph21 ?>
		<td data-name="total_pph21" <?php echo $gaji_tu_smk_grid->total_pph21->cellAttributes() ?>>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_total_pph21" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_total_pph21" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->total_pph21->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->total_pph21->EditValue ?>"<?php echo $gaji_tu_smk_grid->total_pph21->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_total_pph21" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" value="<?php echo HtmlEncode($gaji_tu_smk_grid->total_pph21->OldValue) ?>">
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_total_pph21" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_total_pph21" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->total_pph21->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->total_pph21->EditValue ?>"<?php echo $gaji_tu_smk_grid->total_pph21->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_total_pph21">
<span<?php echo $gaji_tu_smk_grid->total_pph21->viewAttributes() ?>><?php echo $gaji_tu_smk_grid->total_pph21->getViewValue() ?></span>
</span>
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_total_pph21" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" value="<?php echo HtmlEncode($gaji_tu_smk_grid->total_pph21->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_total_pph21" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" value="<?php echo HtmlEncode($gaji_tu_smk_grid->total_pph21->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_total_pph21" name="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" id="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" value="<?php echo HtmlEncode($gaji_tu_smk_grid->total_pph21->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_total_pph21" name="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" id="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" value="<?php echo HtmlEncode($gaji_tu_smk_grid->total_pph21->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->bpjs_kesehatan->Visible) { // bpjs_kesehatan ?>
		<td data-name="bpjs_kesehatan" <?php echo $gaji_tu_smk_grid->bpjs_kesehatan->cellAttributes() ?>>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_bpjs_kesehatan" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_bpjs_kesehatan" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->bpjs_kesehatan->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->bpjs_kesehatan->EditValue ?>"<?php echo $gaji_tu_smk_grid->bpjs_kesehatan->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bpjs_kesehatan" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bpjs_kesehatan->OldValue) ?>">
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_bpjs_kesehatan" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_bpjs_kesehatan" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->bpjs_kesehatan->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->bpjs_kesehatan->EditValue ?>"<?php echo $gaji_tu_smk_grid->bpjs_kesehatan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_bpjs_kesehatan">
<span<?php echo $gaji_tu_smk_grid->bpjs_kesehatan->viewAttributes() ?>><?php echo $gaji_tu_smk_grid->bpjs_kesehatan->getViewValue() ?></span>
</span>
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bpjs_kesehatan" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bpjs_kesehatan->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bpjs_kesehatan" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bpjs_kesehatan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bpjs_kesehatan" name="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" id="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bpjs_kesehatan->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bpjs_kesehatan" name="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" id="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bpjs_kesehatan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $gaji_tu_smk_grid->potongan->cellAttributes() ?>>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_potongan" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_potongan" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->potongan->EditValue ?>"<?php echo $gaji_tu_smk_grid->potongan->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_potongan" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan->OldValue) ?>">
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_potongan" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_potongan" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->potongan->EditValue ?>"<?php echo $gaji_tu_smk_grid->potongan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_potongan">
<span<?php echo $gaji_tu_smk_grid->potongan->viewAttributes() ?>><?php echo $gaji_tu_smk_grid->potongan->getViewValue() ?></span>
</span>
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_potongan" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_potongan" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_potongan" name="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" id="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_potongan" name="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" id="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->penyesuaian->Visible) { // penyesuaian ?>
		<td data-name="penyesuaian" <?php echo $gaji_tu_smk_grid->penyesuaian->cellAttributes() ?>>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_penyesuaian" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_penyesuaian" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->penyesuaian->EditValue ?>"<?php echo $gaji_tu_smk_grid->penyesuaian->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_penyesuaian" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($gaji_tu_smk_grid->penyesuaian->OldValue) ?>">
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_penyesuaian" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_penyesuaian" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->penyesuaian->EditValue ?>"<?php echo $gaji_tu_smk_grid->penyesuaian->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_penyesuaian">
<span<?php echo $gaji_tu_smk_grid->penyesuaian->viewAttributes() ?>><?php echo $gaji_tu_smk_grid->penyesuaian->getViewValue() ?></span>
</span>
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_penyesuaian" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($gaji_tu_smk_grid->penyesuaian->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_penyesuaian" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($gaji_tu_smk_grid->penyesuaian->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_penyesuaian" name="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" id="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($gaji_tu_smk_grid->penyesuaian->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_penyesuaian" name="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" id="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($gaji_tu_smk_grid->penyesuaian->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->potongan_bendahara->Visible) { // potongan_bendahara ?>
		<td data-name="potongan_bendahara" <?php echo $gaji_tu_smk_grid->potongan_bendahara->cellAttributes() ?>>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_potongan_bendahara" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_potongan_bendahara" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan_bendahara->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->potongan_bendahara->EditValue ?>"<?php echo $gaji_tu_smk_grid->potongan_bendahara->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_potongan_bendahara" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" value="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan_bendahara->OldValue) ?>">
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_potongan_bendahara" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_potongan_bendahara" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan_bendahara->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->potongan_bendahara->EditValue ?>"<?php echo $gaji_tu_smk_grid->potongan_bendahara->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_potongan_bendahara">
<span<?php echo $gaji_tu_smk_grid->potongan_bendahara->viewAttributes() ?>><?php echo $gaji_tu_smk_grid->potongan_bendahara->getViewValue() ?></span>
</span>
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_potongan_bendahara" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" value="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan_bendahara->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_potongan_bendahara" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" value="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan_bendahara->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_potongan_bendahara" name="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" id="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" value="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan_bendahara->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_potongan_bendahara" name="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" id="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" value="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan_bendahara->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->total->Visible) { // total ?>
		<td data-name="total" <?php echo $gaji_tu_smk_grid->total->cellAttributes() ?>>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_total" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_total" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->total->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->total->EditValue ?>"<?php echo $gaji_tu_smk_grid->total->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_total" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($gaji_tu_smk_grid->total->OldValue) ?>">
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_total" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_total" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->total->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->total->EditValue ?>"<?php echo $gaji_tu_smk_grid->total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_total">
<span<?php echo $gaji_tu_smk_grid->total->viewAttributes() ?>><?php echo $gaji_tu_smk_grid->total->getViewValue() ?></span>
</span>
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_total" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($gaji_tu_smk_grid->total->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_total" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($gaji_tu_smk_grid->total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_total" name="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" id="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($gaji_tu_smk_grid->total->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_total" name="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" id="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($gaji_tu_smk_grid->total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->voucher->Visible) { // voucher ?>
		<td data-name="voucher" <?php echo $gaji_tu_smk_grid->voucher->cellAttributes() ?>>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_voucher" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_voucher" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->voucher->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->voucher->EditValue ?>"<?php echo $gaji_tu_smk_grid->voucher->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_voucher" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($gaji_tu_smk_grid->voucher->OldValue) ?>">
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_voucher" class="form-group">
<input type="text" data-table="gaji_tu_smk" data-field="x_voucher" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->voucher->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->voucher->EditValue ?>"<?php echo $gaji_tu_smk_grid->voucher->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $gaji_tu_smk_grid->RowCount ?>_gaji_tu_smk_voucher">
<span<?php echo $gaji_tu_smk_grid->voucher->viewAttributes() ?>><?php echo $gaji_tu_smk_grid->voucher->getViewValue() ?></span>
</span>
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_voucher" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($gaji_tu_smk_grid->voucher->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_voucher" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($gaji_tu_smk_grid->voucher->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_voucher" name="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" id="fgaji_tu_smkgrid$x<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($gaji_tu_smk_grid->voucher->FormValue) ?>">
<input type="hidden" data-table="gaji_tu_smk" data-field="x_voucher" name="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" id="fgaji_tu_smkgrid$o<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($gaji_tu_smk_grid->voucher->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$gaji_tu_smk_grid->ListOptions->render("body", "right", $gaji_tu_smk_grid->RowCount);
?>
	</tr>
<?php if ($gaji_tu_smk->RowType == ROWTYPE_ADD || $gaji_tu_smk->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fgaji_tu_smkgrid", "load"], function() {
	fgaji_tu_smkgrid.updateLists(<?php echo $gaji_tu_smk_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$gaji_tu_smk_grid->isGridAdd() || $gaji_tu_smk->CurrentMode == "copy")
		if (!$gaji_tu_smk_grid->Recordset->EOF)
			$gaji_tu_smk_grid->Recordset->moveNext();
}
?>
<?php
	if ($gaji_tu_smk->CurrentMode == "add" || $gaji_tu_smk->CurrentMode == "copy" || $gaji_tu_smk->CurrentMode == "edit") {
		$gaji_tu_smk_grid->RowIndex = '$rowindex$';
		$gaji_tu_smk_grid->loadRowValues();

		// Set row properties
		$gaji_tu_smk->resetAttributes();
		$gaji_tu_smk->RowAttrs->merge(["data-rowindex" => $gaji_tu_smk_grid->RowIndex, "id" => "r0_gaji_tu_smk", "data-rowtype" => ROWTYPE_ADD]);
		$gaji_tu_smk->RowAttrs->appendClass("ew-template");
		$gaji_tu_smk->RowType = ROWTYPE_ADD;

		// Render row
		$gaji_tu_smk_grid->renderRow();

		// Render list options
		$gaji_tu_smk_grid->renderListOptions();
		$gaji_tu_smk_grid->StartRowCount = 0;
?>
	<tr <?php echo $gaji_tu_smk->rowAttributes() ?>>
<?php

// Render list options (body, left)
$gaji_tu_smk_grid->ListOptions->render("body", "left", $gaji_tu_smk_grid->RowIndex);
?>
	<?php if ($gaji_tu_smk_grid->tahun->Visible) { // tahun ?>
		<td data-name="tahun">
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<?php if ($gaji_tu_smk_grid->tahun->getSessionValue() != "") { ?>
<span id="el$rowindex$_gaji_tu_smk_tahun" class="form-group gaji_tu_smk_tahun">
<span<?php echo $gaji_tu_smk_grid->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->tahun->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_tahun" class="form-group gaji_tu_smk_tahun">
<input type="text" data-table="gaji_tu_smk" data-field="x_tahun" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->tahun->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->tahun->EditValue ?>"<?php echo $gaji_tu_smk_grid->tahun->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_tahun" class="form-group gaji_tu_smk_tahun">
<span<?php echo $gaji_tu_smk_grid->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_tahun" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->tahun->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_tahun" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_tahun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->tahun->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->bulan->Visible) { // bulan ?>
		<td data-name="bulan">
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<?php if ($gaji_tu_smk_grid->bulan->getSessionValue() != "") { ?>
<span id="el$rowindex$_gaji_tu_smk_bulan" class="form-group gaji_tu_smk_bulan">
<span<?php echo $gaji_tu_smk_grid->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_bulan" class="form-group gaji_tu_smk_bulan">
<?php
$onchange = $gaji_tu_smk_grid->bulan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$gaji_tu_smk_grid->bulan->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan">
	<input type="text" class="form-control" name="sv_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" id="sv_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo RemoveHtml($gaji_tu_smk_grid->bulan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->getPlaceHolder()) ?>"<?php echo $gaji_tu_smk_grid->bulan->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bulan" data-value-separator="<?php echo $gaji_tu_smk_grid->bulan->displayValueSeparatorAttribute() ?>" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fgaji_tu_smkgrid"], function() {
	fgaji_tu_smkgrid.createAutoSuggest({"id":"x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan","forceSelect":false});
});
</script>
<?php echo $gaji_tu_smk_grid->bulan->Lookup->getParamTag($gaji_tu_smk_grid, "p_x" . $gaji_tu_smk_grid->RowIndex . "_bulan") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_bulan" class="form-group gaji_tu_smk_bulan">
<span<?php echo $gaji_tu_smk_grid->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bulan" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bulan" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bulan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bulan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai">
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<span id="el$rowindex$_gaji_tu_smk_pegawai" class="form-group gaji_tu_smk_pegawai">
<?php $gaji_tu_smk_grid->pegawai->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai"><?php echo EmptyValue(strval($gaji_tu_smk_grid->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $gaji_tu_smk_grid->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($gaji_tu_smk_grid->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($gaji_tu_smk_grid->pegawai->ReadOnly || $gaji_tu_smk_grid->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $gaji_tu_smk_grid->pegawai->Lookup->getParamTag($gaji_tu_smk_grid, "p_x" . $gaji_tu_smk_grid->RowIndex . "_pegawai") ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $gaji_tu_smk_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" value="<?php echo $gaji_tu_smk_grid->pegawai->CurrentValue ?>"<?php echo $gaji_tu_smk_grid->pegawai->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_pegawai" class="form-group gaji_tu_smk_pegawai">
<span<?php echo $gaji_tu_smk_grid->pegawai->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->pegawai->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_pegawai" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($gaji_tu_smk_grid->pegawai->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_pegawai" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($gaji_tu_smk_grid->pegawai->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id">
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<span id="el$rowindex$_gaji_tu_smk_jenjang_id" class="form-group gaji_tu_smk_jenjang_id">
<?php
$onchange = $gaji_tu_smk_grid->jenjang_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$gaji_tu_smk_grid->jenjang_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id">
	<input type="text" class="form-control" name="sv_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" id="sv_x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo RemoveHtml($gaji_tu_smk_grid->jenjang_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->getPlaceHolder()) ?>"<?php echo $gaji_tu_smk_grid->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jenjang_id" data-value-separator="<?php echo $gaji_tu_smk_grid->jenjang_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fgaji_tu_smkgrid"], function() {
	fgaji_tu_smkgrid.createAutoSuggest({"id":"x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id","forceSelect":false});
});
</script>
<?php echo $gaji_tu_smk_grid->jenjang_id->Lookup->getParamTag($gaji_tu_smk_grid, "p_x" . $gaji_tu_smk_grid->RowIndex . "_jenjang_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_jenjang_id" class="form-group gaji_tu_smk_jenjang_id">
<span<?php echo $gaji_tu_smk_grid->jenjang_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->jenjang_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jenjang_id" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jenjang_id" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jenjang_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->sub_total->Visible) { // sub_total ?>
		<td data-name="sub_total">
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<span id="el$rowindex$_gaji_tu_smk_sub_total" class="form-group gaji_tu_smk_sub_total">
<input type="text" data-table="gaji_tu_smk" data-field="x_sub_total" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->sub_total->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->sub_total->EditValue ?>"<?php echo $gaji_tu_smk_grid->sub_total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_sub_total" class="form-group gaji_tu_smk_sub_total">
<span<?php echo $gaji_tu_smk_grid->sub_total->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->sub_total->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_sub_total" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($gaji_tu_smk_grid->sub_total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_sub_total" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($gaji_tu_smk_grid->sub_total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->jaminan_pensiun->Visible) { // jaminan_pensiun ?>
		<td data-name="jaminan_pensiun">
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<span id="el$rowindex$_gaji_tu_smk_jaminan_pensiun" class="form-group gaji_tu_smk_jaminan_pensiun">
<input type="text" data-table="gaji_tu_smk" data-field="x_jaminan_pensiun" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_pensiun->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->jaminan_pensiun->EditValue ?>"<?php echo $gaji_tu_smk_grid->jaminan_pensiun->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_jaminan_pensiun" class="form-group gaji_tu_smk_jaminan_pensiun">
<span<?php echo $gaji_tu_smk_grid->jaminan_pensiun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->jaminan_pensiun->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jaminan_pensiun" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_pensiun->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jaminan_pensiun" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_pensiun" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_pensiun->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->jaminan_hari_tua->Visible) { // jaminan_hari_tua ?>
		<td data-name="jaminan_hari_tua">
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<span id="el$rowindex$_gaji_tu_smk_jaminan_hari_tua" class="form-group gaji_tu_smk_jaminan_hari_tua">
<input type="text" data-table="gaji_tu_smk" data-field="x_jaminan_hari_tua" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_hari_tua->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->jaminan_hari_tua->EditValue ?>"<?php echo $gaji_tu_smk_grid->jaminan_hari_tua->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_jaminan_hari_tua" class="form-group gaji_tu_smk_jaminan_hari_tua">
<span<?php echo $gaji_tu_smk_grid->jaminan_hari_tua->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->jaminan_hari_tua->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jaminan_hari_tua" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_hari_tua->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_jaminan_hari_tua" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_jaminan_hari_tua" value="<?php echo HtmlEncode($gaji_tu_smk_grid->jaminan_hari_tua->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->total_pph21->Visible) { // total_pph21 ?>
		<td data-name="total_pph21">
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<span id="el$rowindex$_gaji_tu_smk_total_pph21" class="form-group gaji_tu_smk_total_pph21">
<input type="text" data-table="gaji_tu_smk" data-field="x_total_pph21" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->total_pph21->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->total_pph21->EditValue ?>"<?php echo $gaji_tu_smk_grid->total_pph21->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_total_pph21" class="form-group gaji_tu_smk_total_pph21">
<span<?php echo $gaji_tu_smk_grid->total_pph21->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->total_pph21->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_total_pph21" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" value="<?php echo HtmlEncode($gaji_tu_smk_grid->total_pph21->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_total_pph21" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total_pph21" value="<?php echo HtmlEncode($gaji_tu_smk_grid->total_pph21->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->bpjs_kesehatan->Visible) { // bpjs_kesehatan ?>
		<td data-name="bpjs_kesehatan">
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<span id="el$rowindex$_gaji_tu_smk_bpjs_kesehatan" class="form-group gaji_tu_smk_bpjs_kesehatan">
<input type="text" data-table="gaji_tu_smk" data-field="x_bpjs_kesehatan" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->bpjs_kesehatan->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->bpjs_kesehatan->EditValue ?>"<?php echo $gaji_tu_smk_grid->bpjs_kesehatan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_bpjs_kesehatan" class="form-group gaji_tu_smk_bpjs_kesehatan">
<span<?php echo $gaji_tu_smk_grid->bpjs_kesehatan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->bpjs_kesehatan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bpjs_kesehatan" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bpjs_kesehatan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_bpjs_kesehatan" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_bpjs_kesehatan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->bpjs_kesehatan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->potongan->Visible) { // potongan ?>
		<td data-name="potongan">
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<span id="el$rowindex$_gaji_tu_smk_potongan" class="form-group gaji_tu_smk_potongan">
<input type="text" data-table="gaji_tu_smk" data-field="x_potongan" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->potongan->EditValue ?>"<?php echo $gaji_tu_smk_grid->potongan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_potongan" class="form-group gaji_tu_smk_potongan">
<span<?php echo $gaji_tu_smk_grid->potongan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->potongan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_potongan" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_potongan" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->penyesuaian->Visible) { // penyesuaian ?>
		<td data-name="penyesuaian">
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<span id="el$rowindex$_gaji_tu_smk_penyesuaian" class="form-group gaji_tu_smk_penyesuaian">
<input type="text" data-table="gaji_tu_smk" data-field="x_penyesuaian" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->penyesuaian->EditValue ?>"<?php echo $gaji_tu_smk_grid->penyesuaian->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_penyesuaian" class="form-group gaji_tu_smk_penyesuaian">
<span<?php echo $gaji_tu_smk_grid->penyesuaian->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->penyesuaian->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_penyesuaian" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($gaji_tu_smk_grid->penyesuaian->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_penyesuaian" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($gaji_tu_smk_grid->penyesuaian->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->potongan_bendahara->Visible) { // potongan_bendahara ?>
		<td data-name="potongan_bendahara">
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<span id="el$rowindex$_gaji_tu_smk_potongan_bendahara" class="form-group gaji_tu_smk_potongan_bendahara">
<input type="text" data-table="gaji_tu_smk" data-field="x_potongan_bendahara" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan_bendahara->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->potongan_bendahara->EditValue ?>"<?php echo $gaji_tu_smk_grid->potongan_bendahara->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_potongan_bendahara" class="form-group gaji_tu_smk_potongan_bendahara">
<span<?php echo $gaji_tu_smk_grid->potongan_bendahara->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->potongan_bendahara->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_potongan_bendahara" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" value="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan_bendahara->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_potongan_bendahara" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_potongan_bendahara" value="<?php echo HtmlEncode($gaji_tu_smk_grid->potongan_bendahara->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->total->Visible) { // total ?>
		<td data-name="total">
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<span id="el$rowindex$_gaji_tu_smk_total" class="form-group gaji_tu_smk_total">
<input type="text" data-table="gaji_tu_smk" data-field="x_total" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->total->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->total->EditValue ?>"<?php echo $gaji_tu_smk_grid->total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_total" class="form-group gaji_tu_smk_total">
<span<?php echo $gaji_tu_smk_grid->total->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->total->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_total" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($gaji_tu_smk_grid->total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_total" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($gaji_tu_smk_grid->total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($gaji_tu_smk_grid->voucher->Visible) { // voucher ?>
		<td data-name="voucher">
<?php if (!$gaji_tu_smk->isConfirm()) { ?>
<span id="el$rowindex$_gaji_tu_smk_voucher" class="form-group gaji_tu_smk_voucher">
<input type="text" data-table="gaji_tu_smk" data-field="x_voucher" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_tu_smk_grid->voucher->getPlaceHolder()) ?>" value="<?php echo $gaji_tu_smk_grid->voucher->EditValue ?>"<?php echo $gaji_tu_smk_grid->voucher->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_gaji_tu_smk_voucher" class="form-group gaji_tu_smk_voucher">
<span<?php echo $gaji_tu_smk_grid->voucher->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_tu_smk_grid->voucher->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_voucher" name="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" id="x<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($gaji_tu_smk_grid->voucher->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="gaji_tu_smk" data-field="x_voucher" name="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" id="o<?php echo $gaji_tu_smk_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($gaji_tu_smk_grid->voucher->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$gaji_tu_smk_grid->ListOptions->render("body", "right", $gaji_tu_smk_grid->RowIndex);
?>
<script>
loadjs.ready(["fgaji_tu_smkgrid", "load"], function() {
	fgaji_tu_smkgrid.updateLists(<?php echo $gaji_tu_smk_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($gaji_tu_smk->CurrentMode == "add" || $gaji_tu_smk->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $gaji_tu_smk_grid->FormKeyCountName ?>" id="<?php echo $gaji_tu_smk_grid->FormKeyCountName ?>" value="<?php echo $gaji_tu_smk_grid->KeyCount ?>">
<?php echo $gaji_tu_smk_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($gaji_tu_smk->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $gaji_tu_smk_grid->FormKeyCountName ?>" id="<?php echo $gaji_tu_smk_grid->FormKeyCountName ?>" value="<?php echo $gaji_tu_smk_grid->KeyCount ?>">
<?php echo $gaji_tu_smk_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($gaji_tu_smk->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fgaji_tu_smkgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($gaji_tu_smk_grid->Recordset)
	$gaji_tu_smk_grid->Recordset->Close();
?>
<?php if ($gaji_tu_smk_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $gaji_tu_smk_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($gaji_tu_smk_grid->TotalRecords == 0 && !$gaji_tu_smk->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $gaji_tu_smk_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$gaji_tu_smk_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$gaji_tu_smk_grid->terminate();
?>