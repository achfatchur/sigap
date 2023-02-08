<?php
namespace PHPMaker2020\sigap;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($absen_detil_grid))
	$absen_detil_grid = new absen_detil_grid();

// Run the page
$absen_detil_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$absen_detil_grid->Page_Render();
?>
<?php if (!$absen_detil_grid->isExport()) { ?>
<script>
var fabsen_detilgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fabsen_detilgrid = new ew.Form("fabsen_detilgrid", "grid");
	fabsen_detilgrid.formKeyCountName = '<?php echo $absen_detil_grid->FormKeyCountName ?>';

	// Validate form
	fabsen_detilgrid.validate = function() {
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
			<?php if ($absen_detil_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_grid->id->caption(), $absen_detil_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($absen_detil_grid->pid->Required) { ?>
				elm = this.getElements("x" + infix + "_pid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_grid->pid->caption(), $absen_detil_grid->pid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_grid->pid->errorMessage()) ?>");
			<?php if ($absen_detil_grid->pegawai->Required) { ?>
				elm = this.getElements("x" + infix + "_pegawai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_grid->pegawai->caption(), $absen_detil_grid->pegawai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($absen_detil_grid->jenjang->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_grid->jenjang->caption(), $absen_detil_grid->jenjang->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jenjang");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_grid->jenjang->errorMessage()) ?>");
			<?php if ($absen_detil_grid->masuk->Required) { ?>
				elm = this.getElements("x" + infix + "_masuk");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_grid->masuk->caption(), $absen_detil_grid->masuk->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_masuk");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_grid->masuk->errorMessage()) ?>");
			<?php if ($absen_detil_grid->absen->Required) { ?>
				elm = this.getElements("x" + infix + "_absen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_grid->absen->caption(), $absen_detil_grid->absen->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_absen");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_grid->absen->errorMessage()) ?>");
			<?php if ($absen_detil_grid->ijin->Required) { ?>
				elm = this.getElements("x" + infix + "_ijin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_grid->ijin->caption(), $absen_detil_grid->ijin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ijin");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_grid->ijin->errorMessage()) ?>");
			<?php if ($absen_detil_grid->terlambat->Required) { ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_grid->terlambat->caption(), $absen_detil_grid->terlambat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_grid->terlambat->errorMessage()) ?>");
			<?php if ($absen_detil_grid->sakit->Required) { ?>
				elm = this.getElements("x" + infix + "_sakit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_grid->sakit->caption(), $absen_detil_grid->sakit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_grid->sakit->errorMessage()) ?>");
			<?php if ($absen_detil_grid->pulang_cepat->Required) { ?>
				elm = this.getElements("x" + infix + "_pulang_cepat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_grid->pulang_cepat->caption(), $absen_detil_grid->pulang_cepat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pulang_cepat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_grid->pulang_cepat->errorMessage()) ?>");
			<?php if ($absen_detil_grid->piket->Required) { ?>
				elm = this.getElements("x" + infix + "_piket");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_grid->piket->caption(), $absen_detil_grid->piket->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_piket");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_grid->piket->errorMessage()) ?>");
			<?php if ($absen_detil_grid->inval->Required) { ?>
				elm = this.getElements("x" + infix + "_inval");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_grid->inval->caption(), $absen_detil_grid->inval->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_inval");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_grid->inval->errorMessage()) ?>");
			<?php if ($absen_detil_grid->lembur->Required) { ?>
				elm = this.getElements("x" + infix + "_lembur");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_grid->lembur->caption(), $absen_detil_grid->lembur->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_lembur");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_grid->lembur->errorMessage()) ?>");
			<?php if ($absen_detil_grid->penyesuaian->Required) { ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_grid->penyesuaian->caption(), $absen_detil_grid->penyesuaian->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_grid->penyesuaian->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fabsen_detilgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "pid", false)) return false;
		if (ew.valueChanged(fobj, infix, "pegawai", false)) return false;
		if (ew.valueChanged(fobj, infix, "jenjang", false)) return false;
		if (ew.valueChanged(fobj, infix, "masuk", false)) return false;
		if (ew.valueChanged(fobj, infix, "absen", false)) return false;
		if (ew.valueChanged(fobj, infix, "ijin", false)) return false;
		if (ew.valueChanged(fobj, infix, "terlambat", false)) return false;
		if (ew.valueChanged(fobj, infix, "sakit", false)) return false;
		if (ew.valueChanged(fobj, infix, "pulang_cepat", false)) return false;
		if (ew.valueChanged(fobj, infix, "piket", false)) return false;
		if (ew.valueChanged(fobj, infix, "inval", false)) return false;
		if (ew.valueChanged(fobj, infix, "lembur", false)) return false;
		if (ew.valueChanged(fobj, infix, "penyesuaian", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fabsen_detilgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fabsen_detilgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fabsen_detilgrid.lists["x_pegawai"] = <?php echo $absen_detil_grid->pegawai->Lookup->toClientList($absen_detil_grid) ?>;
	fabsen_detilgrid.lists["x_pegawai"].options = <?php echo JsonEncode($absen_detil_grid->pegawai->lookupOptions()) ?>;
	fabsen_detilgrid.autoSuggests["x_pegawai"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fabsen_detilgrid.lists["x_jenjang"] = <?php echo $absen_detil_grid->jenjang->Lookup->toClientList($absen_detil_grid) ?>;
	fabsen_detilgrid.lists["x_jenjang"].options = <?php echo JsonEncode($absen_detil_grid->jenjang->lookupOptions()) ?>;
	fabsen_detilgrid.autoSuggests["x_jenjang"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fabsen_detilgrid");
});
</script>
<?php } ?>
<?php
$absen_detil_grid->renderOtherOptions();
?>
<?php if ($absen_detil_grid->TotalRecords > 0 || $absen_detil->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($absen_detil_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> absen_detil">
<?php if ($absen_detil_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $absen_detil_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fabsen_detilgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_absen_detil" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_absen_detilgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$absen_detil->RowType = ROWTYPE_HEADER;

// Render list options
$absen_detil_grid->renderListOptions();

// Render list options (header, left)
$absen_detil_grid->ListOptions->render("header", "left");
?>
<?php if ($absen_detil_grid->id->Visible) { // id ?>
	<?php if ($absen_detil_grid->SortUrl($absen_detil_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $absen_detil_grid->id->headerCellClass() ?>"><div id="elh_absen_detil_id" class="absen_detil_id"><div class="ew-table-header-caption"><?php echo $absen_detil_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $absen_detil_grid->id->headerCellClass() ?>"><div><div id="elh_absen_detil_id" class="absen_detil_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_grid->pid->Visible) { // pid ?>
	<?php if ($absen_detil_grid->SortUrl($absen_detil_grid->pid) == "") { ?>
		<th data-name="pid" class="<?php echo $absen_detil_grid->pid->headerCellClass() ?>"><div id="elh_absen_detil_pid" class="absen_detil_pid"><div class="ew-table-header-caption"><?php echo $absen_detil_grid->pid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pid" class="<?php echo $absen_detil_grid->pid->headerCellClass() ?>"><div><div id="elh_absen_detil_pid" class="absen_detil_pid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_grid->pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_grid->pid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_grid->pid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_grid->pegawai->Visible) { // pegawai ?>
	<?php if ($absen_detil_grid->SortUrl($absen_detil_grid->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $absen_detil_grid->pegawai->headerCellClass() ?>"><div id="elh_absen_detil_pegawai" class="absen_detil_pegawai"><div class="ew-table-header-caption"><?php echo $absen_detil_grid->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $absen_detil_grid->pegawai->headerCellClass() ?>"><div><div id="elh_absen_detil_pegawai" class="absen_detil_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_grid->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_grid->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_grid->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_grid->jenjang->Visible) { // jenjang ?>
	<?php if ($absen_detil_grid->SortUrl($absen_detil_grid->jenjang) == "") { ?>
		<th data-name="jenjang" class="<?php echo $absen_detil_grid->jenjang->headerCellClass() ?>"><div id="elh_absen_detil_jenjang" class="absen_detil_jenjang"><div class="ew-table-header-caption"><?php echo $absen_detil_grid->jenjang->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang" class="<?php echo $absen_detil_grid->jenjang->headerCellClass() ?>"><div><div id="elh_absen_detil_jenjang" class="absen_detil_jenjang">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_grid->jenjang->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_grid->jenjang->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_grid->jenjang->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_grid->masuk->Visible) { // masuk ?>
	<?php if ($absen_detil_grid->SortUrl($absen_detil_grid->masuk) == "") { ?>
		<th data-name="masuk" class="<?php echo $absen_detil_grid->masuk->headerCellClass() ?>"><div id="elh_absen_detil_masuk" class="absen_detil_masuk"><div class="ew-table-header-caption"><?php echo $absen_detil_grid->masuk->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="masuk" class="<?php echo $absen_detil_grid->masuk->headerCellClass() ?>"><div><div id="elh_absen_detil_masuk" class="absen_detil_masuk">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_grid->masuk->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_grid->masuk->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_grid->masuk->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_grid->absen->Visible) { // absen ?>
	<?php if ($absen_detil_grid->SortUrl($absen_detil_grid->absen) == "") { ?>
		<th data-name="absen" class="<?php echo $absen_detil_grid->absen->headerCellClass() ?>"><div id="elh_absen_detil_absen" class="absen_detil_absen"><div class="ew-table-header-caption"><?php echo $absen_detil_grid->absen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="absen" class="<?php echo $absen_detil_grid->absen->headerCellClass() ?>"><div><div id="elh_absen_detil_absen" class="absen_detil_absen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_grid->absen->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_grid->absen->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_grid->absen->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_grid->ijin->Visible) { // ijin ?>
	<?php if ($absen_detil_grid->SortUrl($absen_detil_grid->ijin) == "") { ?>
		<th data-name="ijin" class="<?php echo $absen_detil_grid->ijin->headerCellClass() ?>"><div id="elh_absen_detil_ijin" class="absen_detil_ijin"><div class="ew-table-header-caption"><?php echo $absen_detil_grid->ijin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ijin" class="<?php echo $absen_detil_grid->ijin->headerCellClass() ?>"><div><div id="elh_absen_detil_ijin" class="absen_detil_ijin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_grid->ijin->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_grid->ijin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_grid->ijin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_grid->terlambat->Visible) { // terlambat ?>
	<?php if ($absen_detil_grid->SortUrl($absen_detil_grid->terlambat) == "") { ?>
		<th data-name="terlambat" class="<?php echo $absen_detil_grid->terlambat->headerCellClass() ?>"><div id="elh_absen_detil_terlambat" class="absen_detil_terlambat"><div class="ew-table-header-caption"><?php echo $absen_detil_grid->terlambat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="terlambat" class="<?php echo $absen_detil_grid->terlambat->headerCellClass() ?>"><div><div id="elh_absen_detil_terlambat" class="absen_detil_terlambat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_grid->terlambat->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_grid->terlambat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_grid->terlambat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_grid->sakit->Visible) { // sakit ?>
	<?php if ($absen_detil_grid->SortUrl($absen_detil_grid->sakit) == "") { ?>
		<th data-name="sakit" class="<?php echo $absen_detil_grid->sakit->headerCellClass() ?>"><div id="elh_absen_detil_sakit" class="absen_detil_sakit"><div class="ew-table-header-caption"><?php echo $absen_detil_grid->sakit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sakit" class="<?php echo $absen_detil_grid->sakit->headerCellClass() ?>"><div><div id="elh_absen_detil_sakit" class="absen_detil_sakit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_grid->sakit->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_grid->sakit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_grid->sakit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_grid->pulang_cepat->Visible) { // pulang_cepat ?>
	<?php if ($absen_detil_grid->SortUrl($absen_detil_grid->pulang_cepat) == "") { ?>
		<th data-name="pulang_cepat" class="<?php echo $absen_detil_grid->pulang_cepat->headerCellClass() ?>"><div id="elh_absen_detil_pulang_cepat" class="absen_detil_pulang_cepat"><div class="ew-table-header-caption"><?php echo $absen_detil_grid->pulang_cepat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pulang_cepat" class="<?php echo $absen_detil_grid->pulang_cepat->headerCellClass() ?>"><div><div id="elh_absen_detil_pulang_cepat" class="absen_detil_pulang_cepat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_grid->pulang_cepat->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_grid->pulang_cepat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_grid->pulang_cepat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_grid->piket->Visible) { // piket ?>
	<?php if ($absen_detil_grid->SortUrl($absen_detil_grid->piket) == "") { ?>
		<th data-name="piket" class="<?php echo $absen_detil_grid->piket->headerCellClass() ?>"><div id="elh_absen_detil_piket" class="absen_detil_piket"><div class="ew-table-header-caption"><?php echo $absen_detil_grid->piket->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="piket" class="<?php echo $absen_detil_grid->piket->headerCellClass() ?>"><div><div id="elh_absen_detil_piket" class="absen_detil_piket">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_grid->piket->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_grid->piket->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_grid->piket->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_grid->inval->Visible) { // inval ?>
	<?php if ($absen_detil_grid->SortUrl($absen_detil_grid->inval) == "") { ?>
		<th data-name="inval" class="<?php echo $absen_detil_grid->inval->headerCellClass() ?>"><div id="elh_absen_detil_inval" class="absen_detil_inval"><div class="ew-table-header-caption"><?php echo $absen_detil_grid->inval->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="inval" class="<?php echo $absen_detil_grid->inval->headerCellClass() ?>"><div><div id="elh_absen_detil_inval" class="absen_detil_inval">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_grid->inval->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_grid->inval->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_grid->inval->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_grid->lembur->Visible) { // lembur ?>
	<?php if ($absen_detil_grid->SortUrl($absen_detil_grid->lembur) == "") { ?>
		<th data-name="lembur" class="<?php echo $absen_detil_grid->lembur->headerCellClass() ?>"><div id="elh_absen_detil_lembur" class="absen_detil_lembur"><div class="ew-table-header-caption"><?php echo $absen_detil_grid->lembur->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="lembur" class="<?php echo $absen_detil_grid->lembur->headerCellClass() ?>"><div><div id="elh_absen_detil_lembur" class="absen_detil_lembur">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_grid->lembur->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_grid->lembur->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_grid->lembur->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_grid->penyesuaian->Visible) { // penyesuaian ?>
	<?php if ($absen_detil_grid->SortUrl($absen_detil_grid->penyesuaian) == "") { ?>
		<th data-name="penyesuaian" class="<?php echo $absen_detil_grid->penyesuaian->headerCellClass() ?>"><div id="elh_absen_detil_penyesuaian" class="absen_detil_penyesuaian"><div class="ew-table-header-caption"><?php echo $absen_detil_grid->penyesuaian->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="penyesuaian" class="<?php echo $absen_detil_grid->penyesuaian->headerCellClass() ?>"><div><div id="elh_absen_detil_penyesuaian" class="absen_detil_penyesuaian">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_grid->penyesuaian->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_grid->penyesuaian->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_grid->penyesuaian->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$absen_detil_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$absen_detil_grid->StartRecord = 1;
$absen_detil_grid->StopRecord = $absen_detil_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($absen_detil->isConfirm() || $absen_detil_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($absen_detil_grid->FormKeyCountName) && ($absen_detil_grid->isGridAdd() || $absen_detil_grid->isGridEdit() || $absen_detil->isConfirm())) {
		$absen_detil_grid->KeyCount = $CurrentForm->getValue($absen_detil_grid->FormKeyCountName);
		$absen_detil_grid->StopRecord = $absen_detil_grid->StartRecord + $absen_detil_grid->KeyCount - 1;
	}
}
$absen_detil_grid->RecordCount = $absen_detil_grid->StartRecord - 1;
if ($absen_detil_grid->Recordset && !$absen_detil_grid->Recordset->EOF) {
	$absen_detil_grid->Recordset->moveFirst();
	$selectLimit = $absen_detil_grid->UseSelectLimit;
	if (!$selectLimit && $absen_detil_grid->StartRecord > 1)
		$absen_detil_grid->Recordset->move($absen_detil_grid->StartRecord - 1);
} elseif (!$absen_detil->AllowAddDeleteRow && $absen_detil_grid->StopRecord == 0) {
	$absen_detil_grid->StopRecord = $absen_detil->GridAddRowCount;
}

// Initialize aggregate
$absen_detil->RowType = ROWTYPE_AGGREGATEINIT;
$absen_detil->resetAttributes();
$absen_detil_grid->renderRow();
if ($absen_detil_grid->isGridAdd())
	$absen_detil_grid->RowIndex = 0;
if ($absen_detil_grid->isGridEdit())
	$absen_detil_grid->RowIndex = 0;
while ($absen_detil_grid->RecordCount < $absen_detil_grid->StopRecord) {
	$absen_detil_grid->RecordCount++;
	if ($absen_detil_grid->RecordCount >= $absen_detil_grid->StartRecord) {
		$absen_detil_grid->RowCount++;
		if ($absen_detil_grid->isGridAdd() || $absen_detil_grid->isGridEdit() || $absen_detil->isConfirm()) {
			$absen_detil_grid->RowIndex++;
			$CurrentForm->Index = $absen_detil_grid->RowIndex;
			if ($CurrentForm->hasValue($absen_detil_grid->FormActionName) && ($absen_detil->isConfirm() || $absen_detil_grid->EventCancelled))
				$absen_detil_grid->RowAction = strval($CurrentForm->getValue($absen_detil_grid->FormActionName));
			elseif ($absen_detil_grid->isGridAdd())
				$absen_detil_grid->RowAction = "insert";
			else
				$absen_detil_grid->RowAction = "";
		}

		// Set up key count
		$absen_detil_grid->KeyCount = $absen_detil_grid->RowIndex;

		// Init row class and style
		$absen_detil->resetAttributes();
		$absen_detil->CssClass = "";
		if ($absen_detil_grid->isGridAdd()) {
			if ($absen_detil->CurrentMode == "copy") {
				$absen_detil_grid->loadRowValues($absen_detil_grid->Recordset); // Load row values
				$absen_detil_grid->setRecordKey($absen_detil_grid->RowOldKey, $absen_detil_grid->Recordset); // Set old record key
			} else {
				$absen_detil_grid->loadRowValues(); // Load default values
				$absen_detil_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$absen_detil_grid->loadRowValues($absen_detil_grid->Recordset); // Load row values
		}
		$absen_detil->RowType = ROWTYPE_VIEW; // Render view
		if ($absen_detil_grid->isGridAdd()) // Grid add
			$absen_detil->RowType = ROWTYPE_ADD; // Render add
		if ($absen_detil_grid->isGridAdd() && $absen_detil->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$absen_detil_grid->restoreCurrentRowFormValues($absen_detil_grid->RowIndex); // Restore form values
		if ($absen_detil_grid->isGridEdit()) { // Grid edit
			if ($absen_detil->EventCancelled)
				$absen_detil_grid->restoreCurrentRowFormValues($absen_detil_grid->RowIndex); // Restore form values
			if ($absen_detil_grid->RowAction == "insert")
				$absen_detil->RowType = ROWTYPE_ADD; // Render add
			else
				$absen_detil->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($absen_detil_grid->isGridEdit() && ($absen_detil->RowType == ROWTYPE_EDIT || $absen_detil->RowType == ROWTYPE_ADD) && $absen_detil->EventCancelled) // Update failed
			$absen_detil_grid->restoreCurrentRowFormValues($absen_detil_grid->RowIndex); // Restore form values
		if ($absen_detil->RowType == ROWTYPE_EDIT) // Edit row
			$absen_detil_grid->EditRowCount++;
		if ($absen_detil->isConfirm()) // Confirm row
			$absen_detil_grid->restoreCurrentRowFormValues($absen_detil_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$absen_detil->RowAttrs->merge(["data-rowindex" => $absen_detil_grid->RowCount, "id" => "r" . $absen_detil_grid->RowCount . "_absen_detil", "data-rowtype" => $absen_detil->RowType]);

		// Render row
		$absen_detil_grid->renderRow();

		// Render list options
		$absen_detil_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($absen_detil_grid->RowAction != "delete" && $absen_detil_grid->RowAction != "insertdelete" && !($absen_detil_grid->RowAction == "insert" && $absen_detil->isConfirm() && $absen_detil_grid->emptyRow())) {
?>
	<tr <?php echo $absen_detil->rowAttributes() ?>>
<?php

// Render list options (body, left)
$absen_detil_grid->ListOptions->render("body", "left", $absen_detil_grid->RowCount);
?>
	<?php if ($absen_detil_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $absen_detil_grid->id->cellAttributes() ?>>
<?php if ($absen_detil->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_id" class="form-group"></span>
<input type="hidden" data-table="absen_detil" data-field="x_id" name="o<?php echo $absen_detil_grid->RowIndex ?>_id" id="o<?php echo $absen_detil_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($absen_detil_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_id" class="form-group">
<span<?php echo $absen_detil_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_id" name="x<?php echo $absen_detil_grid->RowIndex ?>_id" id="x<?php echo $absen_detil_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($absen_detil_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_id">
<span<?php echo $absen_detil_grid->id->viewAttributes() ?>><?php echo $absen_detil_grid->id->getViewValue() ?></span>
</span>
<?php if (!$absen_detil->isConfirm()) { ?>
<input type="hidden" data-table="absen_detil" data-field="x_id" name="x<?php echo $absen_detil_grid->RowIndex ?>_id" id="x<?php echo $absen_detil_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($absen_detil_grid->id->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_id" name="o<?php echo $absen_detil_grid->RowIndex ?>_id" id="o<?php echo $absen_detil_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($absen_detil_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="absen_detil" data-field="x_id" name="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_id" id="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($absen_detil_grid->id->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_id" name="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_id" id="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($absen_detil_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->pid->Visible) { // pid ?>
		<td data-name="pid" <?php echo $absen_detil_grid->pid->cellAttributes() ?>>
<?php if ($absen_detil->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($absen_detil_grid->pid->getSessionValue() != "") { ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_pid" class="form-group">
<span<?php echo $absen_detil_grid->pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $absen_detil_grid->RowIndex ?>_pid" name="x<?php echo $absen_detil_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($absen_detil_grid->pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_pid" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_pid" name="x<?php echo $absen_detil_grid->RowIndex ?>_pid" id="x<?php echo $absen_detil_grid->RowIndex ?>_pid" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_detil_grid->pid->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->pid->EditValue ?>"<?php echo $absen_detil_grid->pid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="absen_detil" data-field="x_pid" name="o<?php echo $absen_detil_grid->RowIndex ?>_pid" id="o<?php echo $absen_detil_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($absen_detil_grid->pid->OldValue) ?>">
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($absen_detil_grid->pid->getSessionValue() != "") { ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_pid" class="form-group">
<span<?php echo $absen_detil_grid->pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $absen_detil_grid->RowIndex ?>_pid" name="x<?php echo $absen_detil_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($absen_detil_grid->pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_pid" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_pid" name="x<?php echo $absen_detil_grid->RowIndex ?>_pid" id="x<?php echo $absen_detil_grid->RowIndex ?>_pid" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_detil_grid->pid->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->pid->EditValue ?>"<?php echo $absen_detil_grid->pid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_pid">
<span<?php echo $absen_detil_grid->pid->viewAttributes() ?>><?php echo $absen_detil_grid->pid->getViewValue() ?></span>
</span>
<?php if (!$absen_detil->isConfirm()) { ?>
<input type="hidden" data-table="absen_detil" data-field="x_pid" name="x<?php echo $absen_detil_grid->RowIndex ?>_pid" id="x<?php echo $absen_detil_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($absen_detil_grid->pid->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_pid" name="o<?php echo $absen_detil_grid->RowIndex ?>_pid" id="o<?php echo $absen_detil_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($absen_detil_grid->pid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="absen_detil" data-field="x_pid" name="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_pid" id="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($absen_detil_grid->pid->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_pid" name="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_pid" id="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($absen_detil_grid->pid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $absen_detil_grid->pegawai->cellAttributes() ?>>
<?php if ($absen_detil->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_pegawai" class="form-group">
<?php
$onchange = $absen_detil_grid->pegawai->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$absen_detil_grid->pegawai->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $absen_detil_grid->RowIndex ?>_pegawai">
	<input type="text" class="form-control" name="sv_x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" id="sv_x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" value="<?php echo RemoveHtml($absen_detil_grid->pegawai->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($absen_detil_grid->pegawai->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($absen_detil_grid->pegawai->getPlaceHolder()) ?>"<?php echo $absen_detil_grid->pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_pegawai" data-value-separator="<?php echo $absen_detil_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" id="x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($absen_detil_grid->pegawai->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fabsen_detilgrid"], function() {
	fabsen_detilgrid.createAutoSuggest({"id":"x<?php echo $absen_detil_grid->RowIndex ?>_pegawai","forceSelect":false});
});
</script>
<?php echo $absen_detil_grid->pegawai->Lookup->getParamTag($absen_detil_grid, "p_x" . $absen_detil_grid->RowIndex . "_pegawai") ?>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_pegawai" name="o<?php echo $absen_detil_grid->RowIndex ?>_pegawai" id="o<?php echo $absen_detil_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($absen_detil_grid->pegawai->OldValue) ?>">
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_pegawai" class="form-group">
<?php
$onchange = $absen_detil_grid->pegawai->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$absen_detil_grid->pegawai->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $absen_detil_grid->RowIndex ?>_pegawai">
	<input type="text" class="form-control" name="sv_x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" id="sv_x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" value="<?php echo RemoveHtml($absen_detil_grid->pegawai->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($absen_detil_grid->pegawai->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($absen_detil_grid->pegawai->getPlaceHolder()) ?>"<?php echo $absen_detil_grid->pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_pegawai" data-value-separator="<?php echo $absen_detil_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" id="x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($absen_detil_grid->pegawai->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fabsen_detilgrid"], function() {
	fabsen_detilgrid.createAutoSuggest({"id":"x<?php echo $absen_detil_grid->RowIndex ?>_pegawai","forceSelect":false});
});
</script>
<?php echo $absen_detil_grid->pegawai->Lookup->getParamTag($absen_detil_grid, "p_x" . $absen_detil_grid->RowIndex . "_pegawai") ?>
</span>
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_pegawai">
<span<?php echo $absen_detil_grid->pegawai->viewAttributes() ?>><?php echo $absen_detil_grid->pegawai->getViewValue() ?></span>
</span>
<?php if (!$absen_detil->isConfirm()) { ?>
<input type="hidden" data-table="absen_detil" data-field="x_pegawai" name="x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" id="x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($absen_detil_grid->pegawai->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_pegawai" name="o<?php echo $absen_detil_grid->RowIndex ?>_pegawai" id="o<?php echo $absen_detil_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($absen_detil_grid->pegawai->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="absen_detil" data-field="x_pegawai" name="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" id="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($absen_detil_grid->pegawai->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_pegawai" name="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_pegawai" id="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($absen_detil_grid->pegawai->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->jenjang->Visible) { // jenjang ?>
		<td data-name="jenjang" <?php echo $absen_detil_grid->jenjang->cellAttributes() ?>>
<?php if ($absen_detil->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_jenjang" class="form-group">
<?php
$onchange = $absen_detil_grid->jenjang->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$absen_detil_grid->jenjang->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $absen_detil_grid->RowIndex ?>_jenjang">
	<input type="text" class="form-control" name="sv_x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" id="sv_x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" value="<?php echo RemoveHtml($absen_detil_grid->jenjang->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_detil_grid->jenjang->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($absen_detil_grid->jenjang->getPlaceHolder()) ?>"<?php echo $absen_detil_grid->jenjang->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_jenjang" data-value-separator="<?php echo $absen_detil_grid->jenjang->displayValueSeparatorAttribute() ?>" name="x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" id="x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" value="<?php echo HtmlEncode($absen_detil_grid->jenjang->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fabsen_detilgrid"], function() {
	fabsen_detilgrid.createAutoSuggest({"id":"x<?php echo $absen_detil_grid->RowIndex ?>_jenjang","forceSelect":false});
});
</script>
<?php echo $absen_detil_grid->jenjang->Lookup->getParamTag($absen_detil_grid, "p_x" . $absen_detil_grid->RowIndex . "_jenjang") ?>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_jenjang" name="o<?php echo $absen_detil_grid->RowIndex ?>_jenjang" id="o<?php echo $absen_detil_grid->RowIndex ?>_jenjang" value="<?php echo HtmlEncode($absen_detil_grid->jenjang->OldValue) ?>">
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_jenjang" class="form-group">
<?php
$onchange = $absen_detil_grid->jenjang->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$absen_detil_grid->jenjang->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $absen_detil_grid->RowIndex ?>_jenjang">
	<input type="text" class="form-control" name="sv_x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" id="sv_x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" value="<?php echo RemoveHtml($absen_detil_grid->jenjang->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_detil_grid->jenjang->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($absen_detil_grid->jenjang->getPlaceHolder()) ?>"<?php echo $absen_detil_grid->jenjang->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_jenjang" data-value-separator="<?php echo $absen_detil_grid->jenjang->displayValueSeparatorAttribute() ?>" name="x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" id="x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" value="<?php echo HtmlEncode($absen_detil_grid->jenjang->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fabsen_detilgrid"], function() {
	fabsen_detilgrid.createAutoSuggest({"id":"x<?php echo $absen_detil_grid->RowIndex ?>_jenjang","forceSelect":false});
});
</script>
<?php echo $absen_detil_grid->jenjang->Lookup->getParamTag($absen_detil_grid, "p_x" . $absen_detil_grid->RowIndex . "_jenjang") ?>
</span>
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_jenjang">
<span<?php echo $absen_detil_grid->jenjang->viewAttributes() ?>><?php echo $absen_detil_grid->jenjang->getViewValue() ?></span>
</span>
<?php if (!$absen_detil->isConfirm()) { ?>
<input type="hidden" data-table="absen_detil" data-field="x_jenjang" name="x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" id="x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" value="<?php echo HtmlEncode($absen_detil_grid->jenjang->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_jenjang" name="o<?php echo $absen_detil_grid->RowIndex ?>_jenjang" id="o<?php echo $absen_detil_grid->RowIndex ?>_jenjang" value="<?php echo HtmlEncode($absen_detil_grid->jenjang->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="absen_detil" data-field="x_jenjang" name="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" id="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" value="<?php echo HtmlEncode($absen_detil_grid->jenjang->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_jenjang" name="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_jenjang" id="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_jenjang" value="<?php echo HtmlEncode($absen_detil_grid->jenjang->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->masuk->Visible) { // masuk ?>
		<td data-name="masuk" <?php echo $absen_detil_grid->masuk->cellAttributes() ?>>
<?php if ($absen_detil->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_masuk" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_masuk" name="x<?php echo $absen_detil_grid->RowIndex ?>_masuk" id="x<?php echo $absen_detil_grid->RowIndex ?>_masuk" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_grid->masuk->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->masuk->EditValue ?>"<?php echo $absen_detil_grid->masuk->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_masuk" name="o<?php echo $absen_detil_grid->RowIndex ?>_masuk" id="o<?php echo $absen_detil_grid->RowIndex ?>_masuk" value="<?php echo HtmlEncode($absen_detil_grid->masuk->OldValue) ?>">
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_masuk" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_masuk" name="x<?php echo $absen_detil_grid->RowIndex ?>_masuk" id="x<?php echo $absen_detil_grid->RowIndex ?>_masuk" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_grid->masuk->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->masuk->EditValue ?>"<?php echo $absen_detil_grid->masuk->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_masuk">
<span<?php echo $absen_detil_grid->masuk->viewAttributes() ?>><?php echo $absen_detil_grid->masuk->getViewValue() ?></span>
</span>
<?php if (!$absen_detil->isConfirm()) { ?>
<input type="hidden" data-table="absen_detil" data-field="x_masuk" name="x<?php echo $absen_detil_grid->RowIndex ?>_masuk" id="x<?php echo $absen_detil_grid->RowIndex ?>_masuk" value="<?php echo HtmlEncode($absen_detil_grid->masuk->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_masuk" name="o<?php echo $absen_detil_grid->RowIndex ?>_masuk" id="o<?php echo $absen_detil_grid->RowIndex ?>_masuk" value="<?php echo HtmlEncode($absen_detil_grid->masuk->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="absen_detil" data-field="x_masuk" name="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_masuk" id="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_masuk" value="<?php echo HtmlEncode($absen_detil_grid->masuk->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_masuk" name="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_masuk" id="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_masuk" value="<?php echo HtmlEncode($absen_detil_grid->masuk->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->absen->Visible) { // absen ?>
		<td data-name="absen" <?php echo $absen_detil_grid->absen->cellAttributes() ?>>
<?php if ($absen_detil->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_absen" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_absen" name="x<?php echo $absen_detil_grid->RowIndex ?>_absen" id="x<?php echo $absen_detil_grid->RowIndex ?>_absen" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_grid->absen->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->absen->EditValue ?>"<?php echo $absen_detil_grid->absen->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_absen" name="o<?php echo $absen_detil_grid->RowIndex ?>_absen" id="o<?php echo $absen_detil_grid->RowIndex ?>_absen" value="<?php echo HtmlEncode($absen_detil_grid->absen->OldValue) ?>">
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_absen" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_absen" name="x<?php echo $absen_detil_grid->RowIndex ?>_absen" id="x<?php echo $absen_detil_grid->RowIndex ?>_absen" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_grid->absen->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->absen->EditValue ?>"<?php echo $absen_detil_grid->absen->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_absen">
<span<?php echo $absen_detil_grid->absen->viewAttributes() ?>><?php echo $absen_detil_grid->absen->getViewValue() ?></span>
</span>
<?php if (!$absen_detil->isConfirm()) { ?>
<input type="hidden" data-table="absen_detil" data-field="x_absen" name="x<?php echo $absen_detil_grid->RowIndex ?>_absen" id="x<?php echo $absen_detil_grid->RowIndex ?>_absen" value="<?php echo HtmlEncode($absen_detil_grid->absen->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_absen" name="o<?php echo $absen_detil_grid->RowIndex ?>_absen" id="o<?php echo $absen_detil_grid->RowIndex ?>_absen" value="<?php echo HtmlEncode($absen_detil_grid->absen->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="absen_detil" data-field="x_absen" name="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_absen" id="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_absen" value="<?php echo HtmlEncode($absen_detil_grid->absen->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_absen" name="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_absen" id="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_absen" value="<?php echo HtmlEncode($absen_detil_grid->absen->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->ijin->Visible) { // ijin ?>
		<td data-name="ijin" <?php echo $absen_detil_grid->ijin->cellAttributes() ?>>
<?php if ($absen_detil->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_ijin" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_ijin" name="x<?php echo $absen_detil_grid->RowIndex ?>_ijin" id="x<?php echo $absen_detil_grid->RowIndex ?>_ijin" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_grid->ijin->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->ijin->EditValue ?>"<?php echo $absen_detil_grid->ijin->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_ijin" name="o<?php echo $absen_detil_grid->RowIndex ?>_ijin" id="o<?php echo $absen_detil_grid->RowIndex ?>_ijin" value="<?php echo HtmlEncode($absen_detil_grid->ijin->OldValue) ?>">
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_ijin" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_ijin" name="x<?php echo $absen_detil_grid->RowIndex ?>_ijin" id="x<?php echo $absen_detil_grid->RowIndex ?>_ijin" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_grid->ijin->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->ijin->EditValue ?>"<?php echo $absen_detil_grid->ijin->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_ijin">
<span<?php echo $absen_detil_grid->ijin->viewAttributes() ?>><?php echo $absen_detil_grid->ijin->getViewValue() ?></span>
</span>
<?php if (!$absen_detil->isConfirm()) { ?>
<input type="hidden" data-table="absen_detil" data-field="x_ijin" name="x<?php echo $absen_detil_grid->RowIndex ?>_ijin" id="x<?php echo $absen_detil_grid->RowIndex ?>_ijin" value="<?php echo HtmlEncode($absen_detil_grid->ijin->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_ijin" name="o<?php echo $absen_detil_grid->RowIndex ?>_ijin" id="o<?php echo $absen_detil_grid->RowIndex ?>_ijin" value="<?php echo HtmlEncode($absen_detil_grid->ijin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="absen_detil" data-field="x_ijin" name="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_ijin" id="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_ijin" value="<?php echo HtmlEncode($absen_detil_grid->ijin->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_ijin" name="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_ijin" id="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_ijin" value="<?php echo HtmlEncode($absen_detil_grid->ijin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->terlambat->Visible) { // terlambat ?>
		<td data-name="terlambat" <?php echo $absen_detil_grid->terlambat->cellAttributes() ?>>
<?php if ($absen_detil->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_terlambat" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_terlambat" name="x<?php echo $absen_detil_grid->RowIndex ?>_terlambat" id="x<?php echo $absen_detil_grid->RowIndex ?>_terlambat" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_grid->terlambat->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->terlambat->EditValue ?>"<?php echo $absen_detil_grid->terlambat->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_terlambat" name="o<?php echo $absen_detil_grid->RowIndex ?>_terlambat" id="o<?php echo $absen_detil_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($absen_detil_grid->terlambat->OldValue) ?>">
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_terlambat" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_terlambat" name="x<?php echo $absen_detil_grid->RowIndex ?>_terlambat" id="x<?php echo $absen_detil_grid->RowIndex ?>_terlambat" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_grid->terlambat->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->terlambat->EditValue ?>"<?php echo $absen_detil_grid->terlambat->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_terlambat">
<span<?php echo $absen_detil_grid->terlambat->viewAttributes() ?>><?php echo $absen_detil_grid->terlambat->getViewValue() ?></span>
</span>
<?php if (!$absen_detil->isConfirm()) { ?>
<input type="hidden" data-table="absen_detil" data-field="x_terlambat" name="x<?php echo $absen_detil_grid->RowIndex ?>_terlambat" id="x<?php echo $absen_detil_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($absen_detil_grid->terlambat->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_terlambat" name="o<?php echo $absen_detil_grid->RowIndex ?>_terlambat" id="o<?php echo $absen_detil_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($absen_detil_grid->terlambat->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="absen_detil" data-field="x_terlambat" name="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_terlambat" id="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($absen_detil_grid->terlambat->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_terlambat" name="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_terlambat" id="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($absen_detil_grid->terlambat->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->sakit->Visible) { // sakit ?>
		<td data-name="sakit" <?php echo $absen_detil_grid->sakit->cellAttributes() ?>>
<?php if ($absen_detil->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_sakit" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_sakit" name="x<?php echo $absen_detil_grid->RowIndex ?>_sakit" id="x<?php echo $absen_detil_grid->RowIndex ?>_sakit" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_grid->sakit->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->sakit->EditValue ?>"<?php echo $absen_detil_grid->sakit->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_sakit" name="o<?php echo $absen_detil_grid->RowIndex ?>_sakit" id="o<?php echo $absen_detil_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($absen_detil_grid->sakit->OldValue) ?>">
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_sakit" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_sakit" name="x<?php echo $absen_detil_grid->RowIndex ?>_sakit" id="x<?php echo $absen_detil_grid->RowIndex ?>_sakit" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_grid->sakit->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->sakit->EditValue ?>"<?php echo $absen_detil_grid->sakit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_sakit">
<span<?php echo $absen_detil_grid->sakit->viewAttributes() ?>><?php echo $absen_detil_grid->sakit->getViewValue() ?></span>
</span>
<?php if (!$absen_detil->isConfirm()) { ?>
<input type="hidden" data-table="absen_detil" data-field="x_sakit" name="x<?php echo $absen_detil_grid->RowIndex ?>_sakit" id="x<?php echo $absen_detil_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($absen_detil_grid->sakit->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_sakit" name="o<?php echo $absen_detil_grid->RowIndex ?>_sakit" id="o<?php echo $absen_detil_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($absen_detil_grid->sakit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="absen_detil" data-field="x_sakit" name="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_sakit" id="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($absen_detil_grid->sakit->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_sakit" name="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_sakit" id="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($absen_detil_grid->sakit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->pulang_cepat->Visible) { // pulang_cepat ?>
		<td data-name="pulang_cepat" <?php echo $absen_detil_grid->pulang_cepat->cellAttributes() ?>>
<?php if ($absen_detil->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_pulang_cepat" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_pulang_cepat" name="x<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" id="x<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_grid->pulang_cepat->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->pulang_cepat->EditValue ?>"<?php echo $absen_detil_grid->pulang_cepat->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_pulang_cepat" name="o<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" id="o<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" value="<?php echo HtmlEncode($absen_detil_grid->pulang_cepat->OldValue) ?>">
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_pulang_cepat" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_pulang_cepat" name="x<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" id="x<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_grid->pulang_cepat->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->pulang_cepat->EditValue ?>"<?php echo $absen_detil_grid->pulang_cepat->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_pulang_cepat">
<span<?php echo $absen_detil_grid->pulang_cepat->viewAttributes() ?>><?php echo $absen_detil_grid->pulang_cepat->getViewValue() ?></span>
</span>
<?php if (!$absen_detil->isConfirm()) { ?>
<input type="hidden" data-table="absen_detil" data-field="x_pulang_cepat" name="x<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" id="x<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" value="<?php echo HtmlEncode($absen_detil_grid->pulang_cepat->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_pulang_cepat" name="o<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" id="o<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" value="<?php echo HtmlEncode($absen_detil_grid->pulang_cepat->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="absen_detil" data-field="x_pulang_cepat" name="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" id="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" value="<?php echo HtmlEncode($absen_detil_grid->pulang_cepat->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_pulang_cepat" name="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" id="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" value="<?php echo HtmlEncode($absen_detil_grid->pulang_cepat->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->piket->Visible) { // piket ?>
		<td data-name="piket" <?php echo $absen_detil_grid->piket->cellAttributes() ?>>
<?php if ($absen_detil->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_piket" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_piket" name="x<?php echo $absen_detil_grid->RowIndex ?>_piket" id="x<?php echo $absen_detil_grid->RowIndex ?>_piket" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_grid->piket->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->piket->EditValue ?>"<?php echo $absen_detil_grid->piket->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_piket" name="o<?php echo $absen_detil_grid->RowIndex ?>_piket" id="o<?php echo $absen_detil_grid->RowIndex ?>_piket" value="<?php echo HtmlEncode($absen_detil_grid->piket->OldValue) ?>">
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_piket" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_piket" name="x<?php echo $absen_detil_grid->RowIndex ?>_piket" id="x<?php echo $absen_detil_grid->RowIndex ?>_piket" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_grid->piket->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->piket->EditValue ?>"<?php echo $absen_detil_grid->piket->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_piket">
<span<?php echo $absen_detil_grid->piket->viewAttributes() ?>><?php echo $absen_detil_grid->piket->getViewValue() ?></span>
</span>
<?php if (!$absen_detil->isConfirm()) { ?>
<input type="hidden" data-table="absen_detil" data-field="x_piket" name="x<?php echo $absen_detil_grid->RowIndex ?>_piket" id="x<?php echo $absen_detil_grid->RowIndex ?>_piket" value="<?php echo HtmlEncode($absen_detil_grid->piket->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_piket" name="o<?php echo $absen_detil_grid->RowIndex ?>_piket" id="o<?php echo $absen_detil_grid->RowIndex ?>_piket" value="<?php echo HtmlEncode($absen_detil_grid->piket->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="absen_detil" data-field="x_piket" name="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_piket" id="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_piket" value="<?php echo HtmlEncode($absen_detil_grid->piket->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_piket" name="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_piket" id="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_piket" value="<?php echo HtmlEncode($absen_detil_grid->piket->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->inval->Visible) { // inval ?>
		<td data-name="inval" <?php echo $absen_detil_grid->inval->cellAttributes() ?>>
<?php if ($absen_detil->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_inval" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_inval" name="x<?php echo $absen_detil_grid->RowIndex ?>_inval" id="x<?php echo $absen_detil_grid->RowIndex ?>_inval" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_grid->inval->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->inval->EditValue ?>"<?php echo $absen_detil_grid->inval->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_inval" name="o<?php echo $absen_detil_grid->RowIndex ?>_inval" id="o<?php echo $absen_detil_grid->RowIndex ?>_inval" value="<?php echo HtmlEncode($absen_detil_grid->inval->OldValue) ?>">
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_inval" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_inval" name="x<?php echo $absen_detil_grid->RowIndex ?>_inval" id="x<?php echo $absen_detil_grid->RowIndex ?>_inval" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_grid->inval->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->inval->EditValue ?>"<?php echo $absen_detil_grid->inval->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_inval">
<span<?php echo $absen_detil_grid->inval->viewAttributes() ?>><?php echo $absen_detil_grid->inval->getViewValue() ?></span>
</span>
<?php if (!$absen_detil->isConfirm()) { ?>
<input type="hidden" data-table="absen_detil" data-field="x_inval" name="x<?php echo $absen_detil_grid->RowIndex ?>_inval" id="x<?php echo $absen_detil_grid->RowIndex ?>_inval" value="<?php echo HtmlEncode($absen_detil_grid->inval->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_inval" name="o<?php echo $absen_detil_grid->RowIndex ?>_inval" id="o<?php echo $absen_detil_grid->RowIndex ?>_inval" value="<?php echo HtmlEncode($absen_detil_grid->inval->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="absen_detil" data-field="x_inval" name="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_inval" id="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_inval" value="<?php echo HtmlEncode($absen_detil_grid->inval->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_inval" name="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_inval" id="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_inval" value="<?php echo HtmlEncode($absen_detil_grid->inval->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->lembur->Visible) { // lembur ?>
		<td data-name="lembur" <?php echo $absen_detil_grid->lembur->cellAttributes() ?>>
<?php if ($absen_detil->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_lembur" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_lembur" name="x<?php echo $absen_detil_grid->RowIndex ?>_lembur" id="x<?php echo $absen_detil_grid->RowIndex ?>_lembur" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_grid->lembur->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->lembur->EditValue ?>"<?php echo $absen_detil_grid->lembur->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_lembur" name="o<?php echo $absen_detil_grid->RowIndex ?>_lembur" id="o<?php echo $absen_detil_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($absen_detil_grid->lembur->OldValue) ?>">
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_lembur" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_lembur" name="x<?php echo $absen_detil_grid->RowIndex ?>_lembur" id="x<?php echo $absen_detil_grid->RowIndex ?>_lembur" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_grid->lembur->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->lembur->EditValue ?>"<?php echo $absen_detil_grid->lembur->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_lembur">
<span<?php echo $absen_detil_grid->lembur->viewAttributes() ?>><?php echo $absen_detil_grid->lembur->getViewValue() ?></span>
</span>
<?php if (!$absen_detil->isConfirm()) { ?>
<input type="hidden" data-table="absen_detil" data-field="x_lembur" name="x<?php echo $absen_detil_grid->RowIndex ?>_lembur" id="x<?php echo $absen_detil_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($absen_detil_grid->lembur->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_lembur" name="o<?php echo $absen_detil_grid->RowIndex ?>_lembur" id="o<?php echo $absen_detil_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($absen_detil_grid->lembur->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="absen_detil" data-field="x_lembur" name="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_lembur" id="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($absen_detil_grid->lembur->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_lembur" name="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_lembur" id="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($absen_detil_grid->lembur->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->penyesuaian->Visible) { // penyesuaian ?>
		<td data-name="penyesuaian" <?php echo $absen_detil_grid->penyesuaian->cellAttributes() ?>>
<?php if ($absen_detil->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_penyesuaian" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_penyesuaian" name="x<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" id="x<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_detil_grid->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->penyesuaian->EditValue ?>"<?php echo $absen_detil_grid->penyesuaian->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_penyesuaian" name="o<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" id="o<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($absen_detil_grid->penyesuaian->OldValue) ?>">
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_penyesuaian" class="form-group">
<input type="text" data-table="absen_detil" data-field="x_penyesuaian" name="x<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" id="x<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_detil_grid->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->penyesuaian->EditValue ?>"<?php echo $absen_detil_grid->penyesuaian->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($absen_detil->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $absen_detil_grid->RowCount ?>_absen_detil_penyesuaian">
<span<?php echo $absen_detil_grid->penyesuaian->viewAttributes() ?>><?php echo $absen_detil_grid->penyesuaian->getViewValue() ?></span>
</span>
<?php if (!$absen_detil->isConfirm()) { ?>
<input type="hidden" data-table="absen_detil" data-field="x_penyesuaian" name="x<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" id="x<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($absen_detil_grid->penyesuaian->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_penyesuaian" name="o<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" id="o<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($absen_detil_grid->penyesuaian->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="absen_detil" data-field="x_penyesuaian" name="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" id="fabsen_detilgrid$x<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($absen_detil_grid->penyesuaian->FormValue) ?>">
<input type="hidden" data-table="absen_detil" data-field="x_penyesuaian" name="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" id="fabsen_detilgrid$o<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($absen_detil_grid->penyesuaian->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$absen_detil_grid->ListOptions->render("body", "right", $absen_detil_grid->RowCount);
?>
	</tr>
<?php if ($absen_detil->RowType == ROWTYPE_ADD || $absen_detil->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fabsen_detilgrid", "load"], function() {
	fabsen_detilgrid.updateLists(<?php echo $absen_detil_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$absen_detil_grid->isGridAdd() || $absen_detil->CurrentMode == "copy")
		if (!$absen_detil_grid->Recordset->EOF)
			$absen_detil_grid->Recordset->moveNext();
}
?>
<?php
	if ($absen_detil->CurrentMode == "add" || $absen_detil->CurrentMode == "copy" || $absen_detil->CurrentMode == "edit") {
		$absen_detil_grid->RowIndex = '$rowindex$';
		$absen_detil_grid->loadRowValues();

		// Set row properties
		$absen_detil->resetAttributes();
		$absen_detil->RowAttrs->merge(["data-rowindex" => $absen_detil_grid->RowIndex, "id" => "r0_absen_detil", "data-rowtype" => ROWTYPE_ADD]);
		$absen_detil->RowAttrs->appendClass("ew-template");
		$absen_detil->RowType = ROWTYPE_ADD;

		// Render row
		$absen_detil_grid->renderRow();

		// Render list options
		$absen_detil_grid->renderListOptions();
		$absen_detil_grid->StartRowCount = 0;
?>
	<tr <?php echo $absen_detil->rowAttributes() ?>>
<?php

// Render list options (body, left)
$absen_detil_grid->ListOptions->render("body", "left", $absen_detil_grid->RowIndex);
?>
	<?php if ($absen_detil_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$absen_detil->isConfirm()) { ?>
<span id="el$rowindex$_absen_detil_id" class="form-group absen_detil_id"></span>
<?php } else { ?>
<span id="el$rowindex$_absen_detil_id" class="form-group absen_detil_id">
<span<?php echo $absen_detil_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_id" name="x<?php echo $absen_detil_grid->RowIndex ?>_id" id="x<?php echo $absen_detil_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($absen_detil_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="absen_detil" data-field="x_id" name="o<?php echo $absen_detil_grid->RowIndex ?>_id" id="o<?php echo $absen_detil_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($absen_detil_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->pid->Visible) { // pid ?>
		<td data-name="pid">
<?php if (!$absen_detil->isConfirm()) { ?>
<?php if ($absen_detil_grid->pid->getSessionValue() != "") { ?>
<span id="el$rowindex$_absen_detil_pid" class="form-group absen_detil_pid">
<span<?php echo $absen_detil_grid->pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $absen_detil_grid->RowIndex ?>_pid" name="x<?php echo $absen_detil_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($absen_detil_grid->pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_absen_detil_pid" class="form-group absen_detil_pid">
<input type="text" data-table="absen_detil" data-field="x_pid" name="x<?php echo $absen_detil_grid->RowIndex ?>_pid" id="x<?php echo $absen_detil_grid->RowIndex ?>_pid" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_detil_grid->pid->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->pid->EditValue ?>"<?php echo $absen_detil_grid->pid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_absen_detil_pid" class="form-group absen_detil_pid">
<span<?php echo $absen_detil_grid->pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_pid" name="x<?php echo $absen_detil_grid->RowIndex ?>_pid" id="x<?php echo $absen_detil_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($absen_detil_grid->pid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="absen_detil" data-field="x_pid" name="o<?php echo $absen_detil_grid->RowIndex ?>_pid" id="o<?php echo $absen_detil_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($absen_detil_grid->pid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai">
<?php if (!$absen_detil->isConfirm()) { ?>
<span id="el$rowindex$_absen_detil_pegawai" class="form-group absen_detil_pegawai">
<?php
$onchange = $absen_detil_grid->pegawai->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$absen_detil_grid->pegawai->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $absen_detil_grid->RowIndex ?>_pegawai">
	<input type="text" class="form-control" name="sv_x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" id="sv_x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" value="<?php echo RemoveHtml($absen_detil_grid->pegawai->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($absen_detil_grid->pegawai->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($absen_detil_grid->pegawai->getPlaceHolder()) ?>"<?php echo $absen_detil_grid->pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_pegawai" data-value-separator="<?php echo $absen_detil_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" id="x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($absen_detil_grid->pegawai->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fabsen_detilgrid"], function() {
	fabsen_detilgrid.createAutoSuggest({"id":"x<?php echo $absen_detil_grid->RowIndex ?>_pegawai","forceSelect":false});
});
</script>
<?php echo $absen_detil_grid->pegawai->Lookup->getParamTag($absen_detil_grid, "p_x" . $absen_detil_grid->RowIndex . "_pegawai") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_absen_detil_pegawai" class="form-group absen_detil_pegawai">
<span<?php echo $absen_detil_grid->pegawai->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->pegawai->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_pegawai" name="x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" id="x<?php echo $absen_detil_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($absen_detil_grid->pegawai->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="absen_detil" data-field="x_pegawai" name="o<?php echo $absen_detil_grid->RowIndex ?>_pegawai" id="o<?php echo $absen_detil_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($absen_detil_grid->pegawai->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->jenjang->Visible) { // jenjang ?>
		<td data-name="jenjang">
<?php if (!$absen_detil->isConfirm()) { ?>
<span id="el$rowindex$_absen_detil_jenjang" class="form-group absen_detil_jenjang">
<?php
$onchange = $absen_detil_grid->jenjang->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$absen_detil_grid->jenjang->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $absen_detil_grid->RowIndex ?>_jenjang">
	<input type="text" class="form-control" name="sv_x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" id="sv_x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" value="<?php echo RemoveHtml($absen_detil_grid->jenjang->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_detil_grid->jenjang->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($absen_detil_grid->jenjang->getPlaceHolder()) ?>"<?php echo $absen_detil_grid->jenjang->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_jenjang" data-value-separator="<?php echo $absen_detil_grid->jenjang->displayValueSeparatorAttribute() ?>" name="x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" id="x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" value="<?php echo HtmlEncode($absen_detil_grid->jenjang->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fabsen_detilgrid"], function() {
	fabsen_detilgrid.createAutoSuggest({"id":"x<?php echo $absen_detil_grid->RowIndex ?>_jenjang","forceSelect":false});
});
</script>
<?php echo $absen_detil_grid->jenjang->Lookup->getParamTag($absen_detil_grid, "p_x" . $absen_detil_grid->RowIndex . "_jenjang") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_absen_detil_jenjang" class="form-group absen_detil_jenjang">
<span<?php echo $absen_detil_grid->jenjang->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->jenjang->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_jenjang" name="x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" id="x<?php echo $absen_detil_grid->RowIndex ?>_jenjang" value="<?php echo HtmlEncode($absen_detil_grid->jenjang->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="absen_detil" data-field="x_jenjang" name="o<?php echo $absen_detil_grid->RowIndex ?>_jenjang" id="o<?php echo $absen_detil_grid->RowIndex ?>_jenjang" value="<?php echo HtmlEncode($absen_detil_grid->jenjang->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->masuk->Visible) { // masuk ?>
		<td data-name="masuk">
<?php if (!$absen_detil->isConfirm()) { ?>
<span id="el$rowindex$_absen_detil_masuk" class="form-group absen_detil_masuk">
<input type="text" data-table="absen_detil" data-field="x_masuk" name="x<?php echo $absen_detil_grid->RowIndex ?>_masuk" id="x<?php echo $absen_detil_grid->RowIndex ?>_masuk" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_grid->masuk->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->masuk->EditValue ?>"<?php echo $absen_detil_grid->masuk->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_absen_detil_masuk" class="form-group absen_detil_masuk">
<span<?php echo $absen_detil_grid->masuk->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->masuk->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_masuk" name="x<?php echo $absen_detil_grid->RowIndex ?>_masuk" id="x<?php echo $absen_detil_grid->RowIndex ?>_masuk" value="<?php echo HtmlEncode($absen_detil_grid->masuk->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="absen_detil" data-field="x_masuk" name="o<?php echo $absen_detil_grid->RowIndex ?>_masuk" id="o<?php echo $absen_detil_grid->RowIndex ?>_masuk" value="<?php echo HtmlEncode($absen_detil_grid->masuk->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->absen->Visible) { // absen ?>
		<td data-name="absen">
<?php if (!$absen_detil->isConfirm()) { ?>
<span id="el$rowindex$_absen_detil_absen" class="form-group absen_detil_absen">
<input type="text" data-table="absen_detil" data-field="x_absen" name="x<?php echo $absen_detil_grid->RowIndex ?>_absen" id="x<?php echo $absen_detil_grid->RowIndex ?>_absen" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_grid->absen->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->absen->EditValue ?>"<?php echo $absen_detil_grid->absen->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_absen_detil_absen" class="form-group absen_detil_absen">
<span<?php echo $absen_detil_grid->absen->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->absen->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_absen" name="x<?php echo $absen_detil_grid->RowIndex ?>_absen" id="x<?php echo $absen_detil_grid->RowIndex ?>_absen" value="<?php echo HtmlEncode($absen_detil_grid->absen->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="absen_detil" data-field="x_absen" name="o<?php echo $absen_detil_grid->RowIndex ?>_absen" id="o<?php echo $absen_detil_grid->RowIndex ?>_absen" value="<?php echo HtmlEncode($absen_detil_grid->absen->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->ijin->Visible) { // ijin ?>
		<td data-name="ijin">
<?php if (!$absen_detil->isConfirm()) { ?>
<span id="el$rowindex$_absen_detil_ijin" class="form-group absen_detil_ijin">
<input type="text" data-table="absen_detil" data-field="x_ijin" name="x<?php echo $absen_detil_grid->RowIndex ?>_ijin" id="x<?php echo $absen_detil_grid->RowIndex ?>_ijin" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_grid->ijin->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->ijin->EditValue ?>"<?php echo $absen_detil_grid->ijin->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_absen_detil_ijin" class="form-group absen_detil_ijin">
<span<?php echo $absen_detil_grid->ijin->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->ijin->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_ijin" name="x<?php echo $absen_detil_grid->RowIndex ?>_ijin" id="x<?php echo $absen_detil_grid->RowIndex ?>_ijin" value="<?php echo HtmlEncode($absen_detil_grid->ijin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="absen_detil" data-field="x_ijin" name="o<?php echo $absen_detil_grid->RowIndex ?>_ijin" id="o<?php echo $absen_detil_grid->RowIndex ?>_ijin" value="<?php echo HtmlEncode($absen_detil_grid->ijin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->terlambat->Visible) { // terlambat ?>
		<td data-name="terlambat">
<?php if (!$absen_detil->isConfirm()) { ?>
<span id="el$rowindex$_absen_detil_terlambat" class="form-group absen_detil_terlambat">
<input type="text" data-table="absen_detil" data-field="x_terlambat" name="x<?php echo $absen_detil_grid->RowIndex ?>_terlambat" id="x<?php echo $absen_detil_grid->RowIndex ?>_terlambat" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_grid->terlambat->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->terlambat->EditValue ?>"<?php echo $absen_detil_grid->terlambat->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_absen_detil_terlambat" class="form-group absen_detil_terlambat">
<span<?php echo $absen_detil_grid->terlambat->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->terlambat->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_terlambat" name="x<?php echo $absen_detil_grid->RowIndex ?>_terlambat" id="x<?php echo $absen_detil_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($absen_detil_grid->terlambat->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="absen_detil" data-field="x_terlambat" name="o<?php echo $absen_detil_grid->RowIndex ?>_terlambat" id="o<?php echo $absen_detil_grid->RowIndex ?>_terlambat" value="<?php echo HtmlEncode($absen_detil_grid->terlambat->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->sakit->Visible) { // sakit ?>
		<td data-name="sakit">
<?php if (!$absen_detil->isConfirm()) { ?>
<span id="el$rowindex$_absen_detil_sakit" class="form-group absen_detil_sakit">
<input type="text" data-table="absen_detil" data-field="x_sakit" name="x<?php echo $absen_detil_grid->RowIndex ?>_sakit" id="x<?php echo $absen_detil_grid->RowIndex ?>_sakit" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_grid->sakit->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->sakit->EditValue ?>"<?php echo $absen_detil_grid->sakit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_absen_detil_sakit" class="form-group absen_detil_sakit">
<span<?php echo $absen_detil_grid->sakit->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->sakit->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_sakit" name="x<?php echo $absen_detil_grid->RowIndex ?>_sakit" id="x<?php echo $absen_detil_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($absen_detil_grid->sakit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="absen_detil" data-field="x_sakit" name="o<?php echo $absen_detil_grid->RowIndex ?>_sakit" id="o<?php echo $absen_detil_grid->RowIndex ?>_sakit" value="<?php echo HtmlEncode($absen_detil_grid->sakit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->pulang_cepat->Visible) { // pulang_cepat ?>
		<td data-name="pulang_cepat">
<?php if (!$absen_detil->isConfirm()) { ?>
<span id="el$rowindex$_absen_detil_pulang_cepat" class="form-group absen_detil_pulang_cepat">
<input type="text" data-table="absen_detil" data-field="x_pulang_cepat" name="x<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" id="x<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_grid->pulang_cepat->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->pulang_cepat->EditValue ?>"<?php echo $absen_detil_grid->pulang_cepat->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_absen_detil_pulang_cepat" class="form-group absen_detil_pulang_cepat">
<span<?php echo $absen_detil_grid->pulang_cepat->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->pulang_cepat->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_pulang_cepat" name="x<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" id="x<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" value="<?php echo HtmlEncode($absen_detil_grid->pulang_cepat->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="absen_detil" data-field="x_pulang_cepat" name="o<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" id="o<?php echo $absen_detil_grid->RowIndex ?>_pulang_cepat" value="<?php echo HtmlEncode($absen_detil_grid->pulang_cepat->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->piket->Visible) { // piket ?>
		<td data-name="piket">
<?php if (!$absen_detil->isConfirm()) { ?>
<span id="el$rowindex$_absen_detil_piket" class="form-group absen_detil_piket">
<input type="text" data-table="absen_detil" data-field="x_piket" name="x<?php echo $absen_detil_grid->RowIndex ?>_piket" id="x<?php echo $absen_detil_grid->RowIndex ?>_piket" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_grid->piket->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->piket->EditValue ?>"<?php echo $absen_detil_grid->piket->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_absen_detil_piket" class="form-group absen_detil_piket">
<span<?php echo $absen_detil_grid->piket->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->piket->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_piket" name="x<?php echo $absen_detil_grid->RowIndex ?>_piket" id="x<?php echo $absen_detil_grid->RowIndex ?>_piket" value="<?php echo HtmlEncode($absen_detil_grid->piket->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="absen_detil" data-field="x_piket" name="o<?php echo $absen_detil_grid->RowIndex ?>_piket" id="o<?php echo $absen_detil_grid->RowIndex ?>_piket" value="<?php echo HtmlEncode($absen_detil_grid->piket->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->inval->Visible) { // inval ?>
		<td data-name="inval">
<?php if (!$absen_detil->isConfirm()) { ?>
<span id="el$rowindex$_absen_detil_inval" class="form-group absen_detil_inval">
<input type="text" data-table="absen_detil" data-field="x_inval" name="x<?php echo $absen_detil_grid->RowIndex ?>_inval" id="x<?php echo $absen_detil_grid->RowIndex ?>_inval" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_grid->inval->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->inval->EditValue ?>"<?php echo $absen_detil_grid->inval->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_absen_detil_inval" class="form-group absen_detil_inval">
<span<?php echo $absen_detil_grid->inval->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->inval->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_inval" name="x<?php echo $absen_detil_grid->RowIndex ?>_inval" id="x<?php echo $absen_detil_grid->RowIndex ?>_inval" value="<?php echo HtmlEncode($absen_detil_grid->inval->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="absen_detil" data-field="x_inval" name="o<?php echo $absen_detil_grid->RowIndex ?>_inval" id="o<?php echo $absen_detil_grid->RowIndex ?>_inval" value="<?php echo HtmlEncode($absen_detil_grid->inval->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->lembur->Visible) { // lembur ?>
		<td data-name="lembur">
<?php if (!$absen_detil->isConfirm()) { ?>
<span id="el$rowindex$_absen_detil_lembur" class="form-group absen_detil_lembur">
<input type="text" data-table="absen_detil" data-field="x_lembur" name="x<?php echo $absen_detil_grid->RowIndex ?>_lembur" id="x<?php echo $absen_detil_grid->RowIndex ?>_lembur" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_grid->lembur->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->lembur->EditValue ?>"<?php echo $absen_detil_grid->lembur->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_absen_detil_lembur" class="form-group absen_detil_lembur">
<span<?php echo $absen_detil_grid->lembur->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->lembur->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_lembur" name="x<?php echo $absen_detil_grid->RowIndex ?>_lembur" id="x<?php echo $absen_detil_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($absen_detil_grid->lembur->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="absen_detil" data-field="x_lembur" name="o<?php echo $absen_detil_grid->RowIndex ?>_lembur" id="o<?php echo $absen_detil_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($absen_detil_grid->lembur->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($absen_detil_grid->penyesuaian->Visible) { // penyesuaian ?>
		<td data-name="penyesuaian">
<?php if (!$absen_detil->isConfirm()) { ?>
<span id="el$rowindex$_absen_detil_penyesuaian" class="form-group absen_detil_penyesuaian">
<input type="text" data-table="absen_detil" data-field="x_penyesuaian" name="x<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" id="x<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_detil_grid->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $absen_detil_grid->penyesuaian->EditValue ?>"<?php echo $absen_detil_grid->penyesuaian->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_absen_detil_penyesuaian" class="form-group absen_detil_penyesuaian">
<span<?php echo $absen_detil_grid->penyesuaian->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_grid->penyesuaian->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_penyesuaian" name="x<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" id="x<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($absen_detil_grid->penyesuaian->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="absen_detil" data-field="x_penyesuaian" name="o<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" id="o<?php echo $absen_detil_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($absen_detil_grid->penyesuaian->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$absen_detil_grid->ListOptions->render("body", "right", $absen_detil_grid->RowIndex);
?>
<script>
loadjs.ready(["fabsen_detilgrid", "load"], function() {
	fabsen_detilgrid.updateLists(<?php echo $absen_detil_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($absen_detil->CurrentMode == "add" || $absen_detil->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $absen_detil_grid->FormKeyCountName ?>" id="<?php echo $absen_detil_grid->FormKeyCountName ?>" value="<?php echo $absen_detil_grid->KeyCount ?>">
<?php echo $absen_detil_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($absen_detil->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $absen_detil_grid->FormKeyCountName ?>" id="<?php echo $absen_detil_grid->FormKeyCountName ?>" value="<?php echo $absen_detil_grid->KeyCount ?>">
<?php echo $absen_detil_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($absen_detil->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fabsen_detilgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($absen_detil_grid->Recordset)
	$absen_detil_grid->Recordset->Close();
?>
<?php if ($absen_detil_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $absen_detil_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($absen_detil_grid->TotalRecords == 0 && !$absen_detil->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $absen_detil_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$absen_detil_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$absen_detil_grid->terminate();
?>