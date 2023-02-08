<?php
namespace PHPMaker2020\sigap;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($penyesuaian_grid))
	$penyesuaian_grid = new penyesuaian_grid();

// Run the page
$penyesuaian_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$penyesuaian_grid->Page_Render();
?>
<?php if (!$penyesuaian_grid->isExport()) { ?>
<script>
var fpenyesuaiangrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpenyesuaiangrid = new ew.Form("fpenyesuaiangrid", "grid");
	fpenyesuaiangrid.formKeyCountName = '<?php echo $penyesuaian_grid->FormKeyCountName ?>';

	// Validate form
	fpenyesuaiangrid.validate = function() {
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
			<?php if ($penyesuaian_grid->nip->Required) { ?>
				elm = this.getElements("x" + infix + "_nip");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->nip->caption(), $penyesuaian_grid->nip->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($penyesuaian_grid->jenjang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->jenjang_id->caption(), $penyesuaian_grid->jenjang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_grid->jenjang_id->errorMessage()) ?>");
			<?php if ($penyesuaian_grid->absen->Required) { ?>
				elm = this.getElements("x" + infix + "_absen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->absen->caption(), $penyesuaian_grid->absen->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_absen");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_grid->absen->errorMessage()) ?>");
			<?php if ($penyesuaian_grid->absen_jam->Required) { ?>
				elm = this.getElements("x" + infix + "_absen_jam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->absen_jam->caption(), $penyesuaian_grid->absen_jam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_absen_jam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_grid->absen_jam->errorMessage()) ?>");
			<?php if ($penyesuaian_grid->izin->Required) { ?>
				elm = this.getElements("x" + infix + "_izin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->izin->caption(), $penyesuaian_grid->izin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_izin");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_grid->izin->errorMessage()) ?>");
			<?php if ($penyesuaian_grid->izin_jam->Required) { ?>
				elm = this.getElements("x" + infix + "_izin_jam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->izin_jam->caption(), $penyesuaian_grid->izin_jam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_izin_jam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_grid->izin_jam->errorMessage()) ?>");
			<?php if ($penyesuaian_grid->sakit->Required) { ?>
				elm = this.getElements("x" + infix + "_sakit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->sakit->caption(), $penyesuaian_grid->sakit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_grid->sakit->errorMessage()) ?>");
			<?php if ($penyesuaian_grid->sakit_jam->Required) { ?>
				elm = this.getElements("x" + infix + "_sakit_jam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->sakit_jam->caption(), $penyesuaian_grid->sakit_jam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakit_jam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_grid->sakit_jam->errorMessage()) ?>");
			<?php if ($penyesuaian_grid->terlambat->Required) { ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->terlambat->caption(), $penyesuaian_grid->terlambat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_grid->terlambat->errorMessage()) ?>");
			<?php if ($penyesuaian_grid->pulang_cepat->Required) { ?>
				elm = this.getElements("x" + infix + "_pulang_cepat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->pulang_cepat->caption(), $penyesuaian_grid->pulang_cepat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pulang_cepat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_grid->pulang_cepat->errorMessage()) ?>");
			<?php if ($penyesuaian_grid->piket->Required) { ?>
				elm = this.getElements("x" + infix + "_piket");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->piket->caption(), $penyesuaian_grid->piket->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_piket");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_grid->piket->errorMessage()) ?>");
			<?php if ($penyesuaian_grid->inval->Required) { ?>
				elm = this.getElements("x" + infix + "_inval");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->inval->caption(), $penyesuaian_grid->inval->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_inval");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_grid->inval->errorMessage()) ?>");
			<?php if ($penyesuaian_grid->lembur->Required) { ?>
				elm = this.getElements("x" + infix + "_lembur");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->lembur->caption(), $penyesuaian_grid->lembur->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_lembur");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_grid->lembur->errorMessage()) ?>");
			<?php if ($penyesuaian_grid->voucher->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->voucher->caption(), $penyesuaian_grid->voucher->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_grid->voucher->errorMessage()) ?>");
			<?php if ($penyesuaian_grid->total->Required) { ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->total->caption(), $penyesuaian_grid->total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_grid->total->errorMessage()) ?>");
			<?php if ($penyesuaian_grid->total2->Required) { ?>
				elm = this.getElements("x" + infix + "_total2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_grid->total2->caption(), $penyesuaian_grid->total2->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total2");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_grid->total2->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fpenyesuaiangrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "nip", false)) return false;
		if (ew.valueChanged(fobj, infix, "jenjang_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "absen", false)) return false;
		if (ew.valueChanged(fobj, infix, "absen_jam", false)) return false;
		if (ew.valueChanged(fobj, infix, "izin", false)) return false;
		if (ew.valueChanged(fobj, infix, "izin_jam", false)) return false;
		if (ew.valueChanged(fobj, infix, "sakit", false)) return false;
		if (ew.valueChanged(fobj, infix, "sakit_jam", false)) return false;
		if (ew.valueChanged(fobj, infix, "terlambat", false)) return false;
		if (ew.valueChanged(fobj, infix, "pulang_cepat", false)) return false;
		if (ew.valueChanged(fobj, infix, "piket", false)) return false;
		if (ew.valueChanged(fobj, infix, "inval", false)) return false;
		if (ew.valueChanged(fobj, infix, "lembur", false)) return false;
		if (ew.valueChanged(fobj, infix, "voucher", false)) return false;
		if (ew.valueChanged(fobj, infix, "total", false)) return false;
		if (ew.valueChanged(fobj, infix, "total2", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpenyesuaiangrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpenyesuaiangrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpenyesuaiangrid.lists["x_nip"] = <?php echo $penyesuaian_grid->nip->Lookup->toClientList($penyesuaian_grid) ?>;
	fpenyesuaiangrid.lists["x_nip"].options = <?php echo JsonEncode($penyesuaian_grid->nip->lookupOptions()) ?>;
	loadjs.done("fpenyesuaiangrid");
});
</script>
<?php } ?>
<?php
$penyesuaian_grid->renderOtherOptions();
?>
<?php if ($penyesuaian_grid->TotalRecords > 0 || $penyesuaian->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($penyesuaian_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> penyesuaian">
<?php if ($penyesuaian_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $penyesuaian_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpenyesuaiangrid" class="ew-form ew-list-form form-inline">
<div id="gmp_penyesuaian" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_penyesuaiangrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$penyesuaian->RowType = ROWTYPE_HEADER;

// Render list options
$penyesuaian_grid->renderListOptions();

// Render list options (header, left)
$penyesuaian_grid->ListOptions->render("header", "left");
?>
<?php if ($penyesuaian_grid->nip->Visible) { // nip ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->nip) == "") { ?>
		<th data-name="nip" class="<?php echo $penyesuaian_grid->nip->headerCellClass() ?>"><div id="elh_penyesuaian_nip" class="penyesuaian_nip"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->nip->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nip" class="<?php echo $penyesuaian_grid->nip->headerCellClass() ?>"><div><div id="elh_penyesuaian_nip" class="penyesuaian_nip">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->nip->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->nip->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->nip->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_grid->jenjang_id->Visible) { // jenjang_id ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->jenjang_id) == "") { ?>
		<th data-name="jenjang_id" class="<?php echo $penyesuaian_grid->jenjang_id->headerCellClass() ?>"><div id="elh_penyesuaian_jenjang_id" class="penyesuaian_jenjang_id"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->jenjang_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang_id" class="<?php echo $penyesuaian_grid->jenjang_id->headerCellClass() ?>"><div><div id="elh_penyesuaian_jenjang_id" class="penyesuaian_jenjang_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->jenjang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->jenjang_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->jenjang_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_grid->absen->Visible) { // absen ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->absen) == "") { ?>
		<th data-name="absen" class="<?php echo $penyesuaian_grid->absen->headerCellClass() ?>"><div id="elh_penyesuaian_absen" class="penyesuaian_absen"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->absen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="absen" class="<?php echo $penyesuaian_grid->absen->headerCellClass() ?>"><div><div id="elh_penyesuaian_absen" class="penyesuaian_absen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->absen->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->absen->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->absen->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_grid->absen_jam->Visible) { // absen_jam ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->absen_jam) == "") { ?>
		<th data-name="absen_jam" class="<?php echo $penyesuaian_grid->absen_jam->headerCellClass() ?>"><div id="elh_penyesuaian_absen_jam" class="penyesuaian_absen_jam"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->absen_jam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="absen_jam" class="<?php echo $penyesuaian_grid->absen_jam->headerCellClass() ?>"><div><div id="elh_penyesuaian_absen_jam" class="penyesuaian_absen_jam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->absen_jam->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->absen_jam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->absen_jam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_grid->izin->Visible) { // izin ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->izin) == "") { ?>
		<th data-name="izin" class="<?php echo $penyesuaian_grid->izin->headerCellClass() ?>"><div id="elh_penyesuaian_izin" class="penyesuaian_izin"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->izin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="izin" class="<?php echo $penyesuaian_grid->izin->headerCellClass() ?>"><div><div id="elh_penyesuaian_izin" class="penyesuaian_izin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->izin->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->izin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->izin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_grid->izin_jam->Visible) { // izin_jam ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->izin_jam) == "") { ?>
		<th data-name="izin_jam" class="<?php echo $penyesuaian_grid->izin_jam->headerCellClass() ?>"><div id="elh_penyesuaian_izin_jam" class="penyesuaian_izin_jam"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->izin_jam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="izin_jam" class="<?php echo $penyesuaian_grid->izin_jam->headerCellClass() ?>"><div><div id="elh_penyesuaian_izin_jam" class="penyesuaian_izin_jam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->izin_jam->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->izin_jam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->izin_jam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_grid->sakit->Visible) { // sakit ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->sakit) == "") { ?>
		<th data-name="sakit" class="<?php echo $penyesuaian_grid->sakit->headerCellClass() ?>"><div id="elh_penyesuaian_sakit" class="penyesuaian_sakit"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->sakit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sakit" class="<?php echo $penyesuaian_grid->sakit->headerCellClass() ?>"><div><div id="elh_penyesuaian_sakit" class="penyesuaian_sakit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->sakit->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->sakit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->sakit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_grid->sakit_jam->Visible) { // sakit_jam ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->sakit_jam) == "") { ?>
		<th data-name="sakit_jam" class="<?php echo $penyesuaian_grid->sakit_jam->headerCellClass() ?>"><div id="elh_penyesuaian_sakit_jam" class="penyesuaian_sakit_jam"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->sakit_jam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sakit_jam" class="<?php echo $penyesuaian_grid->sakit_jam->headerCellClass() ?>"><div><div id="elh_penyesuaian_sakit_jam" class="penyesuaian_sakit_jam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->sakit_jam->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->sakit_jam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->sakit_jam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_grid->terlambat->Visible) { // terlambat ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->terlambat) == "") { ?>
		<th data-name="terlambat" class="<?php echo $penyesuaian_grid->terlambat->headerCellClass() ?>"><div id="elh_penyesuaian_terlambat" class="penyesuaian_terlambat"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->terlambat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="terlambat" class="<?php echo $penyesuaian_grid->terlambat->headerCellClass() ?>"><div><div id="elh_penyesuaian_terlambat" class="penyesuaian_terlambat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->terlambat->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->terlambat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->terlambat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_grid->pulang_cepat->Visible) { // pulang_cepat ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->pulang_cepat) == "") { ?>
		<th data-name="pulang_cepat" class="<?php echo $penyesuaian_grid->pulang_cepat->headerCellClass() ?>"><div id="elh_penyesuaian_pulang_cepat" class="penyesuaian_pulang_cepat"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->pulang_cepat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pulang_cepat" class="<?php echo $penyesuaian_grid->pulang_cepat->headerCellClass() ?>"><div><div id="elh_penyesuaian_pulang_cepat" class="penyesuaian_pulang_cepat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->pulang_cepat->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->pulang_cepat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->pulang_cepat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_grid->piket->Visible) { // piket ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->piket) == "") { ?>
		<th data-name="piket" class="<?php echo $penyesuaian_grid->piket->headerCellClass() ?>"><div id="elh_penyesuaian_piket" class="penyesuaian_piket"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->piket->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="piket" class="<?php echo $penyesuaian_grid->piket->headerCellClass() ?>"><div><div id="elh_penyesuaian_piket" class="penyesuaian_piket">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->piket->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->piket->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->piket->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_grid->inval->Visible) { // inval ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->inval) == "") { ?>
		<th data-name="inval" class="<?php echo $penyesuaian_grid->inval->headerCellClass() ?>"><div id="elh_penyesuaian_inval" class="penyesuaian_inval"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->inval->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="inval" class="<?php echo $penyesuaian_grid->inval->headerCellClass() ?>"><div><div id="elh_penyesuaian_inval" class="penyesuaian_inval">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->inval->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->inval->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->inval->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_grid->lembur->Visible) { // lembur ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->lembur) == "") { ?>
		<th data-name="lembur" class="<?php echo $penyesuaian_grid->lembur->headerCellClass() ?>"><div id="elh_penyesuaian_lembur" class="penyesuaian_lembur"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->lembur->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="lembur" class="<?php echo $penyesuaian_grid->lembur->headerCellClass() ?>"><div><div id="elh_penyesuaian_lembur" class="penyesuaian_lembur">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->lembur->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->lembur->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->lembur->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_grid->voucher->Visible) { // voucher ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->voucher) == "") { ?>
		<th data-name="voucher" class="<?php echo $penyesuaian_grid->voucher->headerCellClass() ?>"><div id="elh_penyesuaian_voucher" class="penyesuaian_voucher"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->voucher->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher" class="<?php echo $penyesuaian_grid->voucher->headerCellClass() ?>"><div><div id="elh_penyesuaian_voucher" class="penyesuaian_voucher">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->voucher->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->voucher->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->voucher->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_grid->total->Visible) { // total ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->total) == "") { ?>
		<th data-name="total" class="<?php echo $penyesuaian_grid->total->headerCellClass() ?>"><div id="elh_penyesuaian_total" class="penyesuaian_total"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $penyesuaian_grid->total->headerCellClass() ?>"><div><div id="elh_penyesuaian_total" class="penyesuaian_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_grid->total2->Visible) { // total2 ?>
	<?php if ($penyesuaian_grid->SortUrl($penyesuaian_grid->total2) == "") { ?>
		<th data-name="total2" class="<?php echo $penyesuaian_grid->total2->headerCellClass() ?>"><div id="elh_penyesuaian_total2" class="penyesuaian_total2"><div class="ew-table-header-caption"><?php echo $penyesuaian_grid->total2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total2" class="<?php echo $penyesuaian_grid->total2->headerCellClass() ?>"><div><div id="elh_penyesuaian_total2" class="penyesuaian_total2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_grid->total2->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_grid->total2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_grid->total2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$penyesuaian_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$penyesuaian_grid->StartRecord = 1;
$penyesuaian_grid->StopRecord = $penyesuaian_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($penyesuaian->isConfirm() || $penyesuaian_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($penyesuaian_grid->FormKeyCountName) && ($penyesuaian_grid->isGridAdd() || $penyesuaian_grid->isGridEdit() || $penyesuaian->isConfirm())) {
		$penyesuaian_grid->KeyCount = $CurrentForm->getValue($penyesuaian_grid->FormKeyCountName);
		$penyesuaian_grid->StopRecord = $penyesuaian_grid->StartRecord + $penyesuaian_grid->KeyCount - 1;
	}
}
$penyesuaian_grid->RecordCount = $penyesuaian_grid->StartRecord - 1;
if ($penyesuaian_grid->Recordset && !$penyesuaian_grid->Recordset->EOF) {
	$penyesuaian_grid->Recordset->moveFirst();
	$selectLimit = $penyesuaian_grid->UseSelectLimit;
	if (!$selectLimit && $penyesuaian_grid->StartRecord > 1)
		$penyesuaian_grid->Recordset->move($penyesuaian_grid->StartRecord - 1);
} elseif (!$penyesuaian->AllowAddDeleteRow && $penyesuaian_grid->StopRecord == 0) {
	$penyesuaian_grid->StopRecord = $penyesuaian->GridAddRowCount;
}

// Initialize aggregate
$penyesuaian->RowType = ROWTYPE_AGGREGATEINIT;
$penyesuaian->resetAttributes();
$penyesuaian_grid->renderRow();
if ($penyesuaian_grid->isGridAdd())
	$penyesuaian_grid->RowIndex = 0;
if ($penyesuaian_grid->isGridEdit())
	$penyesuaian_grid->RowIndex = 0;
while ($penyesuaian_grid->RecordCount < $penyesuaian_grid->StopRecord) {
	$penyesuaian_grid->RecordCount++;
	if ($penyesuaian_grid->RecordCount >= $penyesuaian_grid->StartRecord) {
		$penyesuaian_grid->RowCount++;
		if ($penyesuaian_grid->isGridAdd() || $penyesuaian_grid->isGridEdit() || $penyesuaian->isConfirm()) {
			$penyesuaian_grid->RowIndex++;
			$CurrentForm->Index = $penyesuaian_grid->RowIndex;
			if ($CurrentForm->hasValue($penyesuaian_grid->FormActionName) && ($penyesuaian->isConfirm() || $penyesuaian_grid->EventCancelled))
				$penyesuaian_grid->RowAction = strval($CurrentForm->getValue($penyesuaian_grid->FormActionName));
			elseif ($penyesuaian_grid->isGridAdd())
				$penyesuaian_grid->RowAction = "insert";
			else
				$penyesuaian_grid->RowAction = "";
		}

		// Set up key count
		$penyesuaian_grid->KeyCount = $penyesuaian_grid->RowIndex;

		// Init row class and style
		$penyesuaian->resetAttributes();
		$penyesuaian->CssClass = "";
		if ($penyesuaian_grid->isGridAdd()) {
			if ($penyesuaian->CurrentMode == "copy") {
				$penyesuaian_grid->loadRowValues($penyesuaian_grid->Recordset); // Load row values
				$penyesuaian_grid->setRecordKey($penyesuaian_grid->RowOldKey, $penyesuaian_grid->Recordset); // Set old record key
			} else {
				$penyesuaian_grid->loadRowValues(); // Load default values
				$penyesuaian_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$penyesuaian_grid->loadRowValues($penyesuaian_grid->Recordset); // Load row values
		}
		$penyesuaian->RowType = ROWTYPE_VIEW; // Render view
		if ($penyesuaian_grid->isGridAdd()) // Grid add
			$penyesuaian->RowType = ROWTYPE_ADD; // Render add
		if ($penyesuaian_grid->isGridAdd() && $penyesuaian->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$penyesuaian_grid->restoreCurrentRowFormValues($penyesuaian_grid->RowIndex); // Restore form values
		if ($penyesuaian_grid->isGridEdit()) { // Grid edit
			if ($penyesuaian->EventCancelled)
				$penyesuaian_grid->restoreCurrentRowFormValues($penyesuaian_grid->RowIndex); // Restore form values
			if ($penyesuaian_grid->RowAction == "insert")
				$penyesuaian->RowType = ROWTYPE_ADD; // Render add
			else
				$penyesuaian->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($penyesuaian_grid->isGridEdit() && ($penyesuaian->RowType == ROWTYPE_EDIT || $penyesuaian->RowType == ROWTYPE_ADD) && $penyesuaian->EventCancelled) // Update failed
			$penyesuaian_grid->restoreCurrentRowFormValues($penyesuaian_grid->RowIndex); // Restore form values
		if ($penyesuaian->RowType == ROWTYPE_EDIT) // Edit row
			$penyesuaian_grid->EditRowCount++;
		if ($penyesuaian->isConfirm()) // Confirm row
			$penyesuaian_grid->restoreCurrentRowFormValues($penyesuaian_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$penyesuaian->RowAttrs->merge(["data-rowindex" => $penyesuaian_grid->RowCount, "id" => "r" . $penyesuaian_grid->RowCount . "_penyesuaian", "data-rowtype" => $penyesuaian->RowType]);

		// Render row
		$penyesuaian_grid->renderRow();

		// Render list options
		$penyesuaian_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($penyesuaian_grid->RowAction != "delete" && $penyesuaian_grid->RowAction != "insertdelete" && !($penyesuaian_grid->RowAction == "insert" && $penyesuaian->isConfirm() && $penyesuaian_grid->emptyRow())) {
?>
	<tr <?php echo $penyesuaian->rowAttributes() ?>>
<?php

// Render list options (body, left)
$penyesuaian_grid->ListOptions->render("body", "left", $penyesuaian_grid->RowCount);
?>
	<?php if ($penyesuaian_grid->nip->Visible) { // nip ?>
		<td data-name="nip" <?php echo $penyesuaian_grid->nip->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_nip" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="penyesuaian" data-field="x_nip" data-value-separator="<?php echo $penyesuaian_grid->nip->displayValueSeparatorAttribute() ?>" id="x<?php echo $penyesuaian_grid->RowIndex ?>_nip" name="x<?php echo $penyesuaian_grid->RowIndex ?>_nip"<?php echo $penyesuaian_grid->nip->editAttributes() ?>>
			<?php echo $penyesuaian_grid->nip->selectOptionListHtml("x{$penyesuaian_grid->RowIndex}_nip") ?>
		</select>
</div>
<?php echo $penyesuaian_grid->nip->Lookup->getParamTag($penyesuaian_grid, "p_x" . $penyesuaian_grid->RowIndex . "_nip") ?>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_nip" name="o<?php echo $penyesuaian_grid->RowIndex ?>_nip" id="o<?php echo $penyesuaian_grid->RowIndex ?>_nip" value="<?php echo HtmlEncode($penyesuaian_grid->nip->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_nip" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="penyesuaian" data-field="x_nip" data-value-separator="<?php echo $penyesuaian_grid->nip->displayValueSeparatorAttribute() ?>" id="x<?php echo $penyesuaian_grid->RowIndex ?>_nip" name="x<?php echo $penyesuaian_grid->RowIndex ?>_nip"<?php echo $penyesuaian_grid->nip->editAttributes() ?>>
			<?php echo $penyesuaian_grid->nip->selectOptionListHtml("x{$penyesuaian_grid->RowIndex}_nip") ?>
		</select>
</div>
<?php echo $penyesuaian_grid->nip->Lookup->getParamTag($penyesuaian_grid, "p_x" . $penyesuaian_grid->RowIndex . "_nip") ?>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_nip">
<span<?php echo $penyesuaian_grid->nip->viewAttributes() ?>><?php echo $penyesuaian_grid->nip->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_nip" name="x<?php echo $penyesuaian_grid->RowIndex ?>_nip" id="x<?php echo $penyesuaian_grid->RowIndex ?>_nip" value="<?php echo HtmlEncode($penyesuaian_grid->nip->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_nip" name="o<?php echo $penyesuaian_grid->RowIndex ?>_nip" id="o<?php echo $penyesuaian_grid->RowIndex ?>_nip" value="<?php echo HtmlEncode($penyesuaian_grid->nip->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_nip" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_nip" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_nip" value="<?php echo HtmlEncode($penyesuaian_grid->nip->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_nip" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_nip" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_nip" value="<?php echo HtmlEncode($penyesuaian_grid->nip->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="penyesuaian" data-field="x_id" name="x<?php echo $penyesuaian_grid->RowIndex ?>_id" id="x<?php echo $penyesuaian_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($penyesuaian_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_id" name="o<?php echo $penyesuaian_grid->RowIndex ?>_id" id="o<?php echo $penyesuaian_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($penyesuaian_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT || $penyesuaian->CurrentMode == "edit") { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_id" name="x<?php echo $penyesuaian_grid->RowIndex ?>_id" id="x<?php echo $penyesuaian_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($penyesuaian_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($penyesuaian_grid->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id" <?php echo $penyesuaian_grid->jenjang_id->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_jenjang_id" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_jenjang_id" name="x<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" id="x<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->jenjang_id->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->jenjang_id->EditValue ?>"<?php echo $penyesuaian_grid->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_jenjang_id" name="o<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" id="o<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($penyesuaian_grid->jenjang_id->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_jenjang_id" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_jenjang_id" name="x<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" id="x<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->jenjang_id->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->jenjang_id->EditValue ?>"<?php echo $penyesuaian_grid->jenjang_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_jenjang_id">
<span<?php echo $penyesuaian_grid->jenjang_id->viewAttributes() ?>><?php echo $penyesuaian_grid->jenjang_id->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_jenjang_id" name="x<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" id="x<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($penyesuaian_grid->jenjang_id->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_jenjang_id" name="o<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" id="o<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($penyesuaian_grid->jenjang_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_jenjang_id" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($penyesuaian_grid->jenjang_id->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_jenjang_id" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($penyesuaian_grid->jenjang_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->absen->Visible) { // absen ?>
		<td data-name="absen" <?php echo $penyesuaian_grid->absen->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_absen" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_absen" name="x<?php echo $penyesuaian_grid->RowIndex ?>_absen" id="x<?php echo $penyesuaian_grid->RowIndex ?>_absen" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->absen->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->absen->EditValue ?>"<?php echo $penyesuaian_grid->absen->editAttributes() ?>>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_absen" name="o<?php echo $penyesuaian_grid->RowIndex ?>_absen" id="o<?php echo $penyesuaian_grid->RowIndex ?>_absen" value="<?php echo HtmlEncode($penyesuaian_grid->absen->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_absen" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_absen" name="x<?php echo $penyesuaian_grid->RowIndex ?>_absen" id="x<?php echo $penyesuaian_grid->RowIndex ?>_absen" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->absen->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->absen->EditValue ?>"<?php echo $penyesuaian_grid->absen->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_absen">
<span<?php echo $penyesuaian_grid->absen->viewAttributes() ?>><?php echo $penyesuaian_grid->absen->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_absen" name="x<?php echo $penyesuaian_grid->RowIndex ?>_absen" id="x<?php echo $penyesuaian_grid->RowIndex ?>_absen" value="<?php echo HtmlEncode($penyesuaian_grid->absen->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_absen" name="o<?php echo $penyesuaian_grid->RowIndex ?>_absen" id="o<?php echo $penyesuaian_grid->RowIndex ?>_absen" value="<?php echo HtmlEncode($penyesuaian_grid->absen->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_absen" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_absen" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_absen" value="<?php echo HtmlEncode($penyesuaian_grid->absen->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_absen" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_absen" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_absen" value="<?php echo HtmlEncode($penyesuaian_grid->absen->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->absen_jam->Visible) { // absen_jam ?>
		<td data-name="absen_jam" <?php echo $penyesuaian_grid->absen_jam->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_absen_jam" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_absen_jam" name="x<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" id="x<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->absen_jam->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->absen_jam->EditValue ?>"<?php echo $penyesuaian_grid->absen_jam->editAttributes() ?>>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_absen_jam" name="o<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" id="o<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" value="<?php echo HtmlEncode($penyesuaian_grid->absen_jam->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_absen_jam" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_absen_jam" name="x<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" id="x<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->absen_jam->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->absen_jam->EditValue ?>"<?php echo $penyesuaian_grid->absen_jam->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_absen_jam">
<span<?php echo $penyesuaian_grid->absen_jam->viewAttributes() ?>><?php echo $penyesuaian_grid->absen_jam->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_absen_jam" name="x<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" id="x<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" value="<?php echo HtmlEncode($penyesuaian_grid->absen_jam->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_absen_jam" name="o<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" id="o<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" value="<?php echo HtmlEncode($penyesuaian_grid->absen_jam->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_absen_jam" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" value="<?php echo HtmlEncode($penyesuaian_grid->absen_jam->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_absen_jam" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" value="<?php echo HtmlEncode($penyesuaian_grid->absen_jam->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->izin->Visible) { // izin ?>
		<td data-name="izin" <?php echo $penyesuaian_grid->izin->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_izin" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_izin" name="x<?php echo $penyesuaian_grid->RowIndex ?>_izin" id="x<?php echo $penyesuaian_grid->RowIndex ?>_izin" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->izin->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->izin->EditValue ?>"<?php echo $penyesuaian_grid->izin->editAttributes() ?>>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_izin" name="o<?php echo $penyesuaian_grid->RowIndex ?>_izin" id="o<?php echo $penyesuaian_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($penyesuaian_grid->izin->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_izin" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_izin" name="x<?php echo $penyesuaian_grid->RowIndex ?>_izin" id="x<?php echo $penyesuaian_grid->RowIndex ?>_izin" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->izin->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->izin->EditValue ?>"<?php echo $penyesuaian_grid->izin->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_izin">
<span<?php echo $penyesuaian_grid->izin->viewAttributes() ?>><?php echo $penyesuaian_grid->izin->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_izin" name="x<?php echo $penyesuaian_grid->RowIndex ?>_izin" id="x<?php echo $penyesuaian_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($penyesuaian_grid->izin->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_izin" name="o<?php echo $penyesuaian_grid->RowIndex ?>_izin" id="o<?php echo $penyesuaian_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($penyesuaian_grid->izin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_izin" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_izin" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($penyesuaian_grid->izin->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_izin" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_izin" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($penyesuaian_grid->izin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->izin_jam->Visible) { // izin_jam ?>
		<td data-name="izin_jam" <?php echo $penyesuaian_grid->izin_jam->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_izin_jam" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_izin_jam" name="x<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" id="x<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->izin_jam->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->izin_jam->EditValue ?>"<?php echo $penyesuaian_grid->izin_jam->editAttributes() ?>>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_izin_jam" name="o<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" id="o<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" value="<?php echo HtmlEncode($penyesuaian_grid->izin_jam->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_izin_jam" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_izin_jam" name="x<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" id="x<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->izin_jam->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->izin_jam->EditValue ?>"<?php echo $penyesuaian_grid->izin_jam->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_izin_jam">
<span<?php echo $penyesuaian_grid->izin_jam->viewAttributes() ?>><?php echo $penyesuaian_grid->izin_jam->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_izin_jam" name="x<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" id="x<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" value="<?php echo HtmlEncode($penyesuaian_grid->izin_jam->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_izin_jam" name="o<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" id="o<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" value="<?php echo HtmlEncode($penyesuaian_grid->izin_jam->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_izin_jam" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" value="<?php echo HtmlEncode($penyesuaian_grid->izin_jam->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_izin_jam" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" value="<?php echo HtmlEncode($penyesuaian_grid->izin_jam->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->sakit->Visible) { // sakit ?>
		<td data-name="sakit" <?php echo $penyesuaian_grid->sakit->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_sakit" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_sakit" name="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit" id="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->sakit->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->sakit->EditValue ?>"<?php echo $penyesuaian_grid->sakit->editAttributes() ?>>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_sakit" name="o<?php echo $penyesuaian_grid->RowIndex ?>_sakit" id="o<?php echo $penyesuaian_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($penyesuaian_grid->sakit->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_sakit" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_sakit" name="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit" id="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->sakit->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->sakit->EditValue ?>"<?php echo $penyesuaian_grid->sakit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_sakit">
<span<?php echo $penyesuaian_grid->sakit->viewAttributes() ?>><?php echo $penyesuaian_grid->sakit->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_sakit" name="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit" id="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($penyesuaian_grid->sakit->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_sakit" name="o<?php echo $penyesuaian_grid->RowIndex ?>_sakit" id="o<?php echo $penyesuaian_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($penyesuaian_grid->sakit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_sakit" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_sakit" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($penyesuaian_grid->sakit->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_sakit" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_sakit" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($penyesuaian_grid->sakit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->sakit_jam->Visible) { // sakit_jam ?>
		<td data-name="sakit_jam" <?php echo $penyesuaian_grid->sakit_jam->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_sakit_jam" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_sakit_jam" name="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" id="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->sakit_jam->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->sakit_jam->EditValue ?>"<?php echo $penyesuaian_grid->sakit_jam->editAttributes() ?>>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_sakit_jam" name="o<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" id="o<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" value="<?php echo HtmlEncode($penyesuaian_grid->sakit_jam->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_sakit_jam" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_sakit_jam" name="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" id="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->sakit_jam->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->sakit_jam->EditValue ?>"<?php echo $penyesuaian_grid->sakit_jam->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_sakit_jam">
<span<?php echo $penyesuaian_grid->sakit_jam->viewAttributes() ?>><?php echo $penyesuaian_grid->sakit_jam->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_sakit_jam" name="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" id="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" value="<?php echo HtmlEncode($penyesuaian_grid->sakit_jam->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_sakit_jam" name="o<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" id="o<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" value="<?php echo HtmlEncode($penyesuaian_grid->sakit_jam->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_sakit_jam" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" value="<?php echo HtmlEncode($penyesuaian_grid->sakit_jam->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_sakit_jam" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" value="<?php echo HtmlEncode($penyesuaian_grid->sakit_jam->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->terlambat->Visible) { // terlambat ?>
		<td data-name="terlambat" <?php echo $penyesuaian_grid->terlambat->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_terlambat" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_terlambat" name="x<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" id="x<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->terlambat->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->terlambat->EditValue ?>"<?php echo $penyesuaian_grid->terlambat->editAttributes() ?>>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_terlambat" name="o<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" id="o<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($penyesuaian_grid->terlambat->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_terlambat" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_terlambat" name="x<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" id="x<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->terlambat->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->terlambat->EditValue ?>"<?php echo $penyesuaian_grid->terlambat->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_terlambat">
<span<?php echo $penyesuaian_grid->terlambat->viewAttributes() ?>><?php echo $penyesuaian_grid->terlambat->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_terlambat" name="x<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" id="x<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($penyesuaian_grid->terlambat->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_terlambat" name="o<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" id="o<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($penyesuaian_grid->terlambat->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_terlambat" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($penyesuaian_grid->terlambat->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_terlambat" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($penyesuaian_grid->terlambat->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->pulang_cepat->Visible) { // pulang_cepat ?>
		<td data-name="pulang_cepat" <?php echo $penyesuaian_grid->pulang_cepat->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_pulang_cepat" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_pulang_cepat" name="x<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" id="x<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->pulang_cepat->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->pulang_cepat->EditValue ?>"<?php echo $penyesuaian_grid->pulang_cepat->editAttributes() ?>>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_pulang_cepat" name="o<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" id="o<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" value="<?php echo HtmlEncode($penyesuaian_grid->pulang_cepat->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_pulang_cepat" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_pulang_cepat" name="x<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" id="x<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->pulang_cepat->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->pulang_cepat->EditValue ?>"<?php echo $penyesuaian_grid->pulang_cepat->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_pulang_cepat">
<span<?php echo $penyesuaian_grid->pulang_cepat->viewAttributes() ?>><?php echo $penyesuaian_grid->pulang_cepat->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_pulang_cepat" name="x<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" id="x<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" value="<?php echo HtmlEncode($penyesuaian_grid->pulang_cepat->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_pulang_cepat" name="o<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" id="o<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" value="<?php echo HtmlEncode($penyesuaian_grid->pulang_cepat->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_pulang_cepat" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" value="<?php echo HtmlEncode($penyesuaian_grid->pulang_cepat->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_pulang_cepat" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" value="<?php echo HtmlEncode($penyesuaian_grid->pulang_cepat->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->piket->Visible) { // piket ?>
		<td data-name="piket" <?php echo $penyesuaian_grid->piket->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_piket" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_piket" name="x<?php echo $penyesuaian_grid->RowIndex ?>_piket" id="x<?php echo $penyesuaian_grid->RowIndex ?>_piket" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->piket->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->piket->EditValue ?>"<?php echo $penyesuaian_grid->piket->editAttributes() ?>>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_piket" name="o<?php echo $penyesuaian_grid->RowIndex ?>_piket" id="o<?php echo $penyesuaian_grid->RowIndex ?>_piket" value="<?php echo HtmlEncode($penyesuaian_grid->piket->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_piket" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_piket" name="x<?php echo $penyesuaian_grid->RowIndex ?>_piket" id="x<?php echo $penyesuaian_grid->RowIndex ?>_piket" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->piket->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->piket->EditValue ?>"<?php echo $penyesuaian_grid->piket->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_piket">
<span<?php echo $penyesuaian_grid->piket->viewAttributes() ?>><?php echo $penyesuaian_grid->piket->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_piket" name="x<?php echo $penyesuaian_grid->RowIndex ?>_piket" id="x<?php echo $penyesuaian_grid->RowIndex ?>_piket" value="<?php echo HtmlEncode($penyesuaian_grid->piket->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_piket" name="o<?php echo $penyesuaian_grid->RowIndex ?>_piket" id="o<?php echo $penyesuaian_grid->RowIndex ?>_piket" value="<?php echo HtmlEncode($penyesuaian_grid->piket->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_piket" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_piket" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_piket" value="<?php echo HtmlEncode($penyesuaian_grid->piket->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_piket" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_piket" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_piket" value="<?php echo HtmlEncode($penyesuaian_grid->piket->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->inval->Visible) { // inval ?>
		<td data-name="inval" <?php echo $penyesuaian_grid->inval->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_inval" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_inval" name="x<?php echo $penyesuaian_grid->RowIndex ?>_inval" id="x<?php echo $penyesuaian_grid->RowIndex ?>_inval" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->inval->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->inval->EditValue ?>"<?php echo $penyesuaian_grid->inval->editAttributes() ?>>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_inval" name="o<?php echo $penyesuaian_grid->RowIndex ?>_inval" id="o<?php echo $penyesuaian_grid->RowIndex ?>_inval" value="<?php echo HtmlEncode($penyesuaian_grid->inval->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_inval" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_inval" name="x<?php echo $penyesuaian_grid->RowIndex ?>_inval" id="x<?php echo $penyesuaian_grid->RowIndex ?>_inval" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->inval->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->inval->EditValue ?>"<?php echo $penyesuaian_grid->inval->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_inval">
<span<?php echo $penyesuaian_grid->inval->viewAttributes() ?>><?php echo $penyesuaian_grid->inval->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_inval" name="x<?php echo $penyesuaian_grid->RowIndex ?>_inval" id="x<?php echo $penyesuaian_grid->RowIndex ?>_inval" value="<?php echo HtmlEncode($penyesuaian_grid->inval->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_inval" name="o<?php echo $penyesuaian_grid->RowIndex ?>_inval" id="o<?php echo $penyesuaian_grid->RowIndex ?>_inval" value="<?php echo HtmlEncode($penyesuaian_grid->inval->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_inval" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_inval" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_inval" value="<?php echo HtmlEncode($penyesuaian_grid->inval->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_inval" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_inval" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_inval" value="<?php echo HtmlEncode($penyesuaian_grid->inval->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->lembur->Visible) { // lembur ?>
		<td data-name="lembur" <?php echo $penyesuaian_grid->lembur->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_lembur" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_lembur" name="x<?php echo $penyesuaian_grid->RowIndex ?>_lembur" id="x<?php echo $penyesuaian_grid->RowIndex ?>_lembur" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->lembur->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->lembur->EditValue ?>"<?php echo $penyesuaian_grid->lembur->editAttributes() ?>>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_lembur" name="o<?php echo $penyesuaian_grid->RowIndex ?>_lembur" id="o<?php echo $penyesuaian_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($penyesuaian_grid->lembur->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_lembur" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_lembur" name="x<?php echo $penyesuaian_grid->RowIndex ?>_lembur" id="x<?php echo $penyesuaian_grid->RowIndex ?>_lembur" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->lembur->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->lembur->EditValue ?>"<?php echo $penyesuaian_grid->lembur->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_lembur">
<span<?php echo $penyesuaian_grid->lembur->viewAttributes() ?>><?php echo $penyesuaian_grid->lembur->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_lembur" name="x<?php echo $penyesuaian_grid->RowIndex ?>_lembur" id="x<?php echo $penyesuaian_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($penyesuaian_grid->lembur->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_lembur" name="o<?php echo $penyesuaian_grid->RowIndex ?>_lembur" id="o<?php echo $penyesuaian_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($penyesuaian_grid->lembur->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_lembur" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_lembur" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($penyesuaian_grid->lembur->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_lembur" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_lembur" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($penyesuaian_grid->lembur->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->voucher->Visible) { // voucher ?>
		<td data-name="voucher" <?php echo $penyesuaian_grid->voucher->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_voucher" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_voucher" name="x<?php echo $penyesuaian_grid->RowIndex ?>_voucher" id="x<?php echo $penyesuaian_grid->RowIndex ?>_voucher" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($penyesuaian_grid->voucher->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->voucher->EditValue ?>"<?php echo $penyesuaian_grid->voucher->editAttributes() ?>>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_voucher" name="o<?php echo $penyesuaian_grid->RowIndex ?>_voucher" id="o<?php echo $penyesuaian_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($penyesuaian_grid->voucher->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_voucher" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_voucher" name="x<?php echo $penyesuaian_grid->RowIndex ?>_voucher" id="x<?php echo $penyesuaian_grid->RowIndex ?>_voucher" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($penyesuaian_grid->voucher->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->voucher->EditValue ?>"<?php echo $penyesuaian_grid->voucher->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_voucher">
<span<?php echo $penyesuaian_grid->voucher->viewAttributes() ?>><?php echo $penyesuaian_grid->voucher->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_voucher" name="x<?php echo $penyesuaian_grid->RowIndex ?>_voucher" id="x<?php echo $penyesuaian_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($penyesuaian_grid->voucher->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_voucher" name="o<?php echo $penyesuaian_grid->RowIndex ?>_voucher" id="o<?php echo $penyesuaian_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($penyesuaian_grid->voucher->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_voucher" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_voucher" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($penyesuaian_grid->voucher->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_voucher" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_voucher" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($penyesuaian_grid->voucher->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->total->Visible) { // total ?>
		<td data-name="total" <?php echo $penyesuaian_grid->total->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_total" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_total" name="x<?php echo $penyesuaian_grid->RowIndex ?>_total" id="x<?php echo $penyesuaian_grid->RowIndex ?>_total" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($penyesuaian_grid->total->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->total->EditValue ?>"<?php echo $penyesuaian_grid->total->editAttributes() ?>>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_total" name="o<?php echo $penyesuaian_grid->RowIndex ?>_total" id="o<?php echo $penyesuaian_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($penyesuaian_grid->total->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_total" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_total" name="x<?php echo $penyesuaian_grid->RowIndex ?>_total" id="x<?php echo $penyesuaian_grid->RowIndex ?>_total" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($penyesuaian_grid->total->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->total->EditValue ?>"<?php echo $penyesuaian_grid->total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_total">
<span<?php echo $penyesuaian_grid->total->viewAttributes() ?>><?php echo $penyesuaian_grid->total->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_total" name="x<?php echo $penyesuaian_grid->RowIndex ?>_total" id="x<?php echo $penyesuaian_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($penyesuaian_grid->total->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_total" name="o<?php echo $penyesuaian_grid->RowIndex ?>_total" id="o<?php echo $penyesuaian_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($penyesuaian_grid->total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_total" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_total" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($penyesuaian_grid->total->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_total" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_total" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($penyesuaian_grid->total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->total2->Visible) { // total2 ?>
		<td data-name="total2" <?php echo $penyesuaian_grid->total2->cellAttributes() ?>>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_total2" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_total2" name="x<?php echo $penyesuaian_grid->RowIndex ?>_total2" id="x<?php echo $penyesuaian_grid->RowIndex ?>_total2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($penyesuaian_grid->total2->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->total2->EditValue ?>"<?php echo $penyesuaian_grid->total2->editAttributes() ?>>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_total2" name="o<?php echo $penyesuaian_grid->RowIndex ?>_total2" id="o<?php echo $penyesuaian_grid->RowIndex ?>_total2" value="<?php echo HtmlEncode($penyesuaian_grid->total2->OldValue) ?>">
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_total2" class="form-group">
<input type="text" data-table="penyesuaian" data-field="x_total2" name="x<?php echo $penyesuaian_grid->RowIndex ?>_total2" id="x<?php echo $penyesuaian_grid->RowIndex ?>_total2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($penyesuaian_grid->total2->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->total2->EditValue ?>"<?php echo $penyesuaian_grid->total2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($penyesuaian->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $penyesuaian_grid->RowCount ?>_penyesuaian_total2">
<span<?php echo $penyesuaian_grid->total2->viewAttributes() ?>><?php echo $penyesuaian_grid->total2->getViewValue() ?></span>
</span>
<?php if (!$penyesuaian->isConfirm()) { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_total2" name="x<?php echo $penyesuaian_grid->RowIndex ?>_total2" id="x<?php echo $penyesuaian_grid->RowIndex ?>_total2" value="<?php echo HtmlEncode($penyesuaian_grid->total2->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_total2" name="o<?php echo $penyesuaian_grid->RowIndex ?>_total2" id="o<?php echo $penyesuaian_grid->RowIndex ?>_total2" value="<?php echo HtmlEncode($penyesuaian_grid->total2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="penyesuaian" data-field="x_total2" name="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_total2" id="fpenyesuaiangrid$x<?php echo $penyesuaian_grid->RowIndex ?>_total2" value="<?php echo HtmlEncode($penyesuaian_grid->total2->FormValue) ?>">
<input type="hidden" data-table="penyesuaian" data-field="x_total2" name="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_total2" id="fpenyesuaiangrid$o<?php echo $penyesuaian_grid->RowIndex ?>_total2" value="<?php echo HtmlEncode($penyesuaian_grid->total2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$penyesuaian_grid->ListOptions->render("body", "right", $penyesuaian_grid->RowCount);
?>
	</tr>
<?php if ($penyesuaian->RowType == ROWTYPE_ADD || $penyesuaian->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpenyesuaiangrid", "load"], function() {
	fpenyesuaiangrid.updateLists(<?php echo $penyesuaian_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$penyesuaian_grid->isGridAdd() || $penyesuaian->CurrentMode == "copy")
		if (!$penyesuaian_grid->Recordset->EOF)
			$penyesuaian_grid->Recordset->moveNext();
}
?>
<?php
	if ($penyesuaian->CurrentMode == "add" || $penyesuaian->CurrentMode == "copy" || $penyesuaian->CurrentMode == "edit") {
		$penyesuaian_grid->RowIndex = '$rowindex$';
		$penyesuaian_grid->loadRowValues();

		// Set row properties
		$penyesuaian->resetAttributes();
		$penyesuaian->RowAttrs->merge(["data-rowindex" => $penyesuaian_grid->RowIndex, "id" => "r0_penyesuaian", "data-rowtype" => ROWTYPE_ADD]);
		$penyesuaian->RowAttrs->appendClass("ew-template");
		$penyesuaian->RowType = ROWTYPE_ADD;

		// Render row
		$penyesuaian_grid->renderRow();

		// Render list options
		$penyesuaian_grid->renderListOptions();
		$penyesuaian_grid->StartRowCount = 0;
?>
	<tr <?php echo $penyesuaian->rowAttributes() ?>>
<?php

// Render list options (body, left)
$penyesuaian_grid->ListOptions->render("body", "left", $penyesuaian_grid->RowIndex);
?>
	<?php if ($penyesuaian_grid->nip->Visible) { // nip ?>
		<td data-name="nip">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_nip" class="form-group penyesuaian_nip">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="penyesuaian" data-field="x_nip" data-value-separator="<?php echo $penyesuaian_grid->nip->displayValueSeparatorAttribute() ?>" id="x<?php echo $penyesuaian_grid->RowIndex ?>_nip" name="x<?php echo $penyesuaian_grid->RowIndex ?>_nip"<?php echo $penyesuaian_grid->nip->editAttributes() ?>>
			<?php echo $penyesuaian_grid->nip->selectOptionListHtml("x{$penyesuaian_grid->RowIndex}_nip") ?>
		</select>
</div>
<?php echo $penyesuaian_grid->nip->Lookup->getParamTag($penyesuaian_grid, "p_x" . $penyesuaian_grid->RowIndex . "_nip") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_nip" class="form-group penyesuaian_nip">
<span<?php echo $penyesuaian_grid->nip->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->nip->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_nip" name="x<?php echo $penyesuaian_grid->RowIndex ?>_nip" id="x<?php echo $penyesuaian_grid->RowIndex ?>_nip" value="<?php echo HtmlEncode($penyesuaian_grid->nip->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_nip" name="o<?php echo $penyesuaian_grid->RowIndex ?>_nip" id="o<?php echo $penyesuaian_grid->RowIndex ?>_nip" value="<?php echo HtmlEncode($penyesuaian_grid->nip->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_jenjang_id" class="form-group penyesuaian_jenjang_id">
<input type="text" data-table="penyesuaian" data-field="x_jenjang_id" name="x<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" id="x<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->jenjang_id->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->jenjang_id->EditValue ?>"<?php echo $penyesuaian_grid->jenjang_id->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_jenjang_id" class="form-group penyesuaian_jenjang_id">
<span<?php echo $penyesuaian_grid->jenjang_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->jenjang_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_jenjang_id" name="x<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" id="x<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($penyesuaian_grid->jenjang_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_jenjang_id" name="o<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" id="o<?php echo $penyesuaian_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($penyesuaian_grid->jenjang_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->absen->Visible) { // absen ?>
		<td data-name="absen">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_absen" class="form-group penyesuaian_absen">
<input type="text" data-table="penyesuaian" data-field="x_absen" name="x<?php echo $penyesuaian_grid->RowIndex ?>_absen" id="x<?php echo $penyesuaian_grid->RowIndex ?>_absen" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->absen->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->absen->EditValue ?>"<?php echo $penyesuaian_grid->absen->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_absen" class="form-group penyesuaian_absen">
<span<?php echo $penyesuaian_grid->absen->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->absen->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_absen" name="x<?php echo $penyesuaian_grid->RowIndex ?>_absen" id="x<?php echo $penyesuaian_grid->RowIndex ?>_absen" value="<?php echo HtmlEncode($penyesuaian_grid->absen->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_absen" name="o<?php echo $penyesuaian_grid->RowIndex ?>_absen" id="o<?php echo $penyesuaian_grid->RowIndex ?>_absen" value="<?php echo HtmlEncode($penyesuaian_grid->absen->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->absen_jam->Visible) { // absen_jam ?>
		<td data-name="absen_jam">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_absen_jam" class="form-group penyesuaian_absen_jam">
<input type="text" data-table="penyesuaian" data-field="x_absen_jam" name="x<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" id="x<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->absen_jam->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->absen_jam->EditValue ?>"<?php echo $penyesuaian_grid->absen_jam->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_absen_jam" class="form-group penyesuaian_absen_jam">
<span<?php echo $penyesuaian_grid->absen_jam->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->absen_jam->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_absen_jam" name="x<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" id="x<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" value="<?php echo HtmlEncode($penyesuaian_grid->absen_jam->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_absen_jam" name="o<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" id="o<?php echo $penyesuaian_grid->RowIndex ?>_absen_jam" value="<?php echo HtmlEncode($penyesuaian_grid->absen_jam->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->izin->Visible) { // izin ?>
		<td data-name="izin">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_izin" class="form-group penyesuaian_izin">
<input type="text" data-table="penyesuaian" data-field="x_izin" name="x<?php echo $penyesuaian_grid->RowIndex ?>_izin" id="x<?php echo $penyesuaian_grid->RowIndex ?>_izin" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->izin->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->izin->EditValue ?>"<?php echo $penyesuaian_grid->izin->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_izin" class="form-group penyesuaian_izin">
<span<?php echo $penyesuaian_grid->izin->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->izin->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_izin" name="x<?php echo $penyesuaian_grid->RowIndex ?>_izin" id="x<?php echo $penyesuaian_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($penyesuaian_grid->izin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_izin" name="o<?php echo $penyesuaian_grid->RowIndex ?>_izin" id="o<?php echo $penyesuaian_grid->RowIndex ?>_izin" value="<?php echo HtmlEncode($penyesuaian_grid->izin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->izin_jam->Visible) { // izin_jam ?>
		<td data-name="izin_jam">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_izin_jam" class="form-group penyesuaian_izin_jam">
<input type="text" data-table="penyesuaian" data-field="x_izin_jam" name="x<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" id="x<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->izin_jam->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->izin_jam->EditValue ?>"<?php echo $penyesuaian_grid->izin_jam->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_izin_jam" class="form-group penyesuaian_izin_jam">
<span<?php echo $penyesuaian_grid->izin_jam->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->izin_jam->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_izin_jam" name="x<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" id="x<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" value="<?php echo HtmlEncode($penyesuaian_grid->izin_jam->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_izin_jam" name="o<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" id="o<?php echo $penyesuaian_grid->RowIndex ?>_izin_jam" value="<?php echo HtmlEncode($penyesuaian_grid->izin_jam->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->sakit->Visible) { // sakit ?>
		<td data-name="sakit">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_sakit" class="form-group penyesuaian_sakit">
<input type="text" data-table="penyesuaian" data-field="x_sakit" name="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit" id="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->sakit->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->sakit->EditValue ?>"<?php echo $penyesuaian_grid->sakit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_sakit" class="form-group penyesuaian_sakit">
<span<?php echo $penyesuaian_grid->sakit->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->sakit->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_sakit" name="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit" id="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($penyesuaian_grid->sakit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_sakit" name="o<?php echo $penyesuaian_grid->RowIndex ?>_sakit" id="o<?php echo $penyesuaian_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($penyesuaian_grid->sakit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->sakit_jam->Visible) { // sakit_jam ?>
		<td data-name="sakit_jam">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_sakit_jam" class="form-group penyesuaian_sakit_jam">
<input type="text" data-table="penyesuaian" data-field="x_sakit_jam" name="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" id="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->sakit_jam->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->sakit_jam->EditValue ?>"<?php echo $penyesuaian_grid->sakit_jam->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_sakit_jam" class="form-group penyesuaian_sakit_jam">
<span<?php echo $penyesuaian_grid->sakit_jam->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->sakit_jam->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_sakit_jam" name="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" id="x<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" value="<?php echo HtmlEncode($penyesuaian_grid->sakit_jam->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_sakit_jam" name="o<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" id="o<?php echo $penyesuaian_grid->RowIndex ?>_sakit_jam" value="<?php echo HtmlEncode($penyesuaian_grid->sakit_jam->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->terlambat->Visible) { // terlambat ?>
		<td data-name="terlambat">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_terlambat" class="form-group penyesuaian_terlambat">
<input type="text" data-table="penyesuaian" data-field="x_terlambat" name="x<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" id="x<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->terlambat->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->terlambat->EditValue ?>"<?php echo $penyesuaian_grid->terlambat->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_terlambat" class="form-group penyesuaian_terlambat">
<span<?php echo $penyesuaian_grid->terlambat->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->terlambat->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_terlambat" name="x<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" id="x<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($penyesuaian_grid->terlambat->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_terlambat" name="o<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" id="o<?php echo $penyesuaian_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($penyesuaian_grid->terlambat->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->pulang_cepat->Visible) { // pulang_cepat ?>
		<td data-name="pulang_cepat">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_pulang_cepat" class="form-group penyesuaian_pulang_cepat">
<input type="text" data-table="penyesuaian" data-field="x_pulang_cepat" name="x<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" id="x<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->pulang_cepat->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->pulang_cepat->EditValue ?>"<?php echo $penyesuaian_grid->pulang_cepat->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_pulang_cepat" class="form-group penyesuaian_pulang_cepat">
<span<?php echo $penyesuaian_grid->pulang_cepat->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->pulang_cepat->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_pulang_cepat" name="x<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" id="x<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" value="<?php echo HtmlEncode($penyesuaian_grid->pulang_cepat->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_pulang_cepat" name="o<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" id="o<?php echo $penyesuaian_grid->RowIndex ?>_pulang_cepat" value="<?php echo HtmlEncode($penyesuaian_grid->pulang_cepat->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->piket->Visible) { // piket ?>
		<td data-name="piket">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_piket" class="form-group penyesuaian_piket">
<input type="text" data-table="penyesuaian" data-field="x_piket" name="x<?php echo $penyesuaian_grid->RowIndex ?>_piket" id="x<?php echo $penyesuaian_grid->RowIndex ?>_piket" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->piket->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->piket->EditValue ?>"<?php echo $penyesuaian_grid->piket->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_piket" class="form-group penyesuaian_piket">
<span<?php echo $penyesuaian_grid->piket->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->piket->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_piket" name="x<?php echo $penyesuaian_grid->RowIndex ?>_piket" id="x<?php echo $penyesuaian_grid->RowIndex ?>_piket" value="<?php echo HtmlEncode($penyesuaian_grid->piket->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_piket" name="o<?php echo $penyesuaian_grid->RowIndex ?>_piket" id="o<?php echo $penyesuaian_grid->RowIndex ?>_piket" value="<?php echo HtmlEncode($penyesuaian_grid->piket->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->inval->Visible) { // inval ?>
		<td data-name="inval">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_inval" class="form-group penyesuaian_inval">
<input type="text" data-table="penyesuaian" data-field="x_inval" name="x<?php echo $penyesuaian_grid->RowIndex ?>_inval" id="x<?php echo $penyesuaian_grid->RowIndex ?>_inval" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->inval->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->inval->EditValue ?>"<?php echo $penyesuaian_grid->inval->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_inval" class="form-group penyesuaian_inval">
<span<?php echo $penyesuaian_grid->inval->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->inval->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_inval" name="x<?php echo $penyesuaian_grid->RowIndex ?>_inval" id="x<?php echo $penyesuaian_grid->RowIndex ?>_inval" value="<?php echo HtmlEncode($penyesuaian_grid->inval->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_inval" name="o<?php echo $penyesuaian_grid->RowIndex ?>_inval" id="o<?php echo $penyesuaian_grid->RowIndex ?>_inval" value="<?php echo HtmlEncode($penyesuaian_grid->inval->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->lembur->Visible) { // lembur ?>
		<td data-name="lembur">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_lembur" class="form-group penyesuaian_lembur">
<input type="text" data-table="penyesuaian" data-field="x_lembur" name="x<?php echo $penyesuaian_grid->RowIndex ?>_lembur" id="x<?php echo $penyesuaian_grid->RowIndex ?>_lembur" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_grid->lembur->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->lembur->EditValue ?>"<?php echo $penyesuaian_grid->lembur->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_lembur" class="form-group penyesuaian_lembur">
<span<?php echo $penyesuaian_grid->lembur->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->lembur->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_lembur" name="x<?php echo $penyesuaian_grid->RowIndex ?>_lembur" id="x<?php echo $penyesuaian_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($penyesuaian_grid->lembur->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_lembur" name="o<?php echo $penyesuaian_grid->RowIndex ?>_lembur" id="o<?php echo $penyesuaian_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($penyesuaian_grid->lembur->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->voucher->Visible) { // voucher ?>
		<td data-name="voucher">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_voucher" class="form-group penyesuaian_voucher">
<input type="text" data-table="penyesuaian" data-field="x_voucher" name="x<?php echo $penyesuaian_grid->RowIndex ?>_voucher" id="x<?php echo $penyesuaian_grid->RowIndex ?>_voucher" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($penyesuaian_grid->voucher->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->voucher->EditValue ?>"<?php echo $penyesuaian_grid->voucher->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_voucher" class="form-group penyesuaian_voucher">
<span<?php echo $penyesuaian_grid->voucher->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->voucher->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_voucher" name="x<?php echo $penyesuaian_grid->RowIndex ?>_voucher" id="x<?php echo $penyesuaian_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($penyesuaian_grid->voucher->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_voucher" name="o<?php echo $penyesuaian_grid->RowIndex ?>_voucher" id="o<?php echo $penyesuaian_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($penyesuaian_grid->voucher->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->total->Visible) { // total ?>
		<td data-name="total">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_total" class="form-group penyesuaian_total">
<input type="text" data-table="penyesuaian" data-field="x_total" name="x<?php echo $penyesuaian_grid->RowIndex ?>_total" id="x<?php echo $penyesuaian_grid->RowIndex ?>_total" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($penyesuaian_grid->total->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->total->EditValue ?>"<?php echo $penyesuaian_grid->total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_total" class="form-group penyesuaian_total">
<span<?php echo $penyesuaian_grid->total->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->total->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_total" name="x<?php echo $penyesuaian_grid->RowIndex ?>_total" id="x<?php echo $penyesuaian_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($penyesuaian_grid->total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_total" name="o<?php echo $penyesuaian_grid->RowIndex ?>_total" id="o<?php echo $penyesuaian_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($penyesuaian_grid->total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($penyesuaian_grid->total2->Visible) { // total2 ?>
		<td data-name="total2">
<?php if (!$penyesuaian->isConfirm()) { ?>
<span id="el$rowindex$_penyesuaian_total2" class="form-group penyesuaian_total2">
<input type="text" data-table="penyesuaian" data-field="x_total2" name="x<?php echo $penyesuaian_grid->RowIndex ?>_total2" id="x<?php echo $penyesuaian_grid->RowIndex ?>_total2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($penyesuaian_grid->total2->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_grid->total2->EditValue ?>"<?php echo $penyesuaian_grid->total2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_penyesuaian_total2" class="form-group penyesuaian_total2">
<span<?php echo $penyesuaian_grid->total2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_grid->total2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="penyesuaian" data-field="x_total2" name="x<?php echo $penyesuaian_grid->RowIndex ?>_total2" id="x<?php echo $penyesuaian_grid->RowIndex ?>_total2" value="<?php echo HtmlEncode($penyesuaian_grid->total2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="penyesuaian" data-field="x_total2" name="o<?php echo $penyesuaian_grid->RowIndex ?>_total2" id="o<?php echo $penyesuaian_grid->RowIndex ?>_total2" value="<?php echo HtmlEncode($penyesuaian_grid->total2->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$penyesuaian_grid->ListOptions->render("body", "right", $penyesuaian_grid->RowIndex);
?>
<script>
loadjs.ready(["fpenyesuaiangrid", "load"], function() {
	fpenyesuaiangrid.updateLists(<?php echo $penyesuaian_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($penyesuaian->CurrentMode == "add" || $penyesuaian->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $penyesuaian_grid->FormKeyCountName ?>" id="<?php echo $penyesuaian_grid->FormKeyCountName ?>" value="<?php echo $penyesuaian_grid->KeyCount ?>">
<?php echo $penyesuaian_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($penyesuaian->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $penyesuaian_grid->FormKeyCountName ?>" id="<?php echo $penyesuaian_grid->FormKeyCountName ?>" value="<?php echo $penyesuaian_grid->KeyCount ?>">
<?php echo $penyesuaian_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($penyesuaian->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpenyesuaiangrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($penyesuaian_grid->Recordset)
	$penyesuaian_grid->Recordset->Close();
?>
<?php if ($penyesuaian_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $penyesuaian_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($penyesuaian_grid->TotalRecords == 0 && !$penyesuaian->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $penyesuaian_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$penyesuaian_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$penyesuaian_grid->terminate();
?>