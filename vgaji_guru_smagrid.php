<?php
namespace PHPMaker2020\sigap;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($vgaji_guru_sma_grid))
	$vgaji_guru_sma_grid = new vgaji_guru_sma_grid();

// Run the page
$vgaji_guru_sma_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vgaji_guru_sma_grid->Page_Render();
?>
<?php if (!$vgaji_guru_sma_grid->isExport()) { ?>
<script>
var fvgaji_guru_smagrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fvgaji_guru_smagrid = new ew.Form("fvgaji_guru_smagrid", "grid");
	fvgaji_guru_smagrid.formKeyCountName = '<?php echo $vgaji_guru_sma_grid->FormKeyCountName ?>';

	// Validate form
	fvgaji_guru_smagrid.validate = function() {
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
			<?php if ($vgaji_guru_sma_grid->pegawai->Required) { ?>
				elm = this.getElements("x" + infix + "_pegawai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->pegawai->caption(), $vgaji_guru_sma_grid->pegawai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vgaji_guru_sma_grid->jenjang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->jenjang_id->caption(), $vgaji_guru_sma_grid->jenjang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->jenjang_id->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->jabatan_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jabatan_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->jabatan_id->caption(), $vgaji_guru_sma_grid->jabatan_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jabatan_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->jabatan_id->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->lama_kerja->Required) { ?>
				elm = this.getElements("x" + infix + "_lama_kerja");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->lama_kerja->caption(), $vgaji_guru_sma_grid->lama_kerja->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_lama_kerja");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->lama_kerja->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->type->Required) { ?>
				elm = this.getElements("x" + infix + "_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->type->caption(), $vgaji_guru_sma_grid->type->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_type");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->type->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->jenis_guru->Required) { ?>
				elm = this.getElements("x" + infix + "_jenis_guru");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->jenis_guru->caption(), $vgaji_guru_sma_grid->jenis_guru->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jenis_guru");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->jenis_guru->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->tambahan->Required) { ?>
				elm = this.getElements("x" + infix + "_tambahan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->tambahan->caption(), $vgaji_guru_sma_grid->tambahan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tambahan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->tambahan->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->periode->Required) { ?>
				elm = this.getElements("x" + infix + "_periode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->periode->caption(), $vgaji_guru_sma_grid->periode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_periode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->periode->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->tunjangan_periode->Required) { ?>
				elm = this.getElements("x" + infix + "_tunjangan_periode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->tunjangan_periode->caption(), $vgaji_guru_sma_grid->tunjangan_periode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tunjangan_periode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->tunjangan_periode->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->kehadiran->Required) { ?>
				elm = this.getElements("x" + infix + "_kehadiran");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->kehadiran->caption(), $vgaji_guru_sma_grid->kehadiran->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_kehadiran");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->kehadiran->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->value_kehadiran->Required) { ?>
				elm = this.getElements("x" + infix + "_value_kehadiran");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->value_kehadiran->caption(), $vgaji_guru_sma_grid->value_kehadiran->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_kehadiran");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->value_kehadiran->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->lembur->Required) { ?>
				elm = this.getElements("x" + infix + "_lembur");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->lembur->caption(), $vgaji_guru_sma_grid->lembur->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_lembur");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->lembur->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->value_lembur->Required) { ?>
				elm = this.getElements("x" + infix + "_value_lembur");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->value_lembur->caption(), $vgaji_guru_sma_grid->value_lembur->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_lembur");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->value_lembur->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->jp->Required) { ?>
				elm = this.getElements("x" + infix + "_jp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->jp->caption(), $vgaji_guru_sma_grid->jp->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jp");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->jp->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->gapok->Required) { ?>
				elm = this.getElements("x" + infix + "_gapok");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->gapok->caption(), $vgaji_guru_sma_grid->gapok->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_gapok");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->gapok->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->total_gapok->Required) { ?>
				elm = this.getElements("x" + infix + "_total_gapok");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->total_gapok->caption(), $vgaji_guru_sma_grid->total_gapok->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total_gapok");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->total_gapok->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->value_reward->Required) { ?>
				elm = this.getElements("x" + infix + "_value_reward");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->value_reward->caption(), $vgaji_guru_sma_grid->value_reward->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_reward");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->value_reward->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->value_inval->Required) { ?>
				elm = this.getElements("x" + infix + "_value_inval");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->value_inval->caption(), $vgaji_guru_sma_grid->value_inval->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_inval");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->value_inval->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->piket_count->Required) { ?>
				elm = this.getElements("x" + infix + "_piket_count");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->piket_count->caption(), $vgaji_guru_sma_grid->piket_count->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_piket_count");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->piket_count->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->value_piket->Required) { ?>
				elm = this.getElements("x" + infix + "_value_piket");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->value_piket->caption(), $vgaji_guru_sma_grid->value_piket->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_piket");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->value_piket->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->tugastambahan->Required) { ?>
				elm = this.getElements("x" + infix + "_tugastambahan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->tugastambahan->caption(), $vgaji_guru_sma_grid->tugastambahan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tugastambahan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->tugastambahan->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->tj_jabatan->Required) { ?>
				elm = this.getElements("x" + infix + "_tj_jabatan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->tj_jabatan->caption(), $vgaji_guru_sma_grid->tj_jabatan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tj_jabatan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->tj_jabatan->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->sub_total->Required) { ?>
				elm = this.getElements("x" + infix + "_sub_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->sub_total->caption(), $vgaji_guru_sma_grid->sub_total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sub_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->sub_total->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->potongan->Required) { ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->potongan->caption(), $vgaji_guru_sma_grid->potongan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->potongan->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->penyesuaian->Required) { ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->penyesuaian->caption(), $vgaji_guru_sma_grid->penyesuaian->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->penyesuaian->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->total->Required) { ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->total->caption(), $vgaji_guru_sma_grid->total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->total->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->voucher->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->voucher->caption(), $vgaji_guru_sma_grid->voucher->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->voucher->errorMessage()) ?>");
			<?php if ($vgaji_guru_sma_grid->pid->Required) { ?>
				elm = this.getElements("x" + infix + "_pid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vgaji_guru_sma_grid->pid->caption(), $vgaji_guru_sma_grid->pid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vgaji_guru_sma_grid->pid->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fvgaji_guru_smagrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "pegawai", false)) return false;
		if (ew.valueChanged(fobj, infix, "jenjang_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "jabatan_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "lama_kerja", false)) return false;
		if (ew.valueChanged(fobj, infix, "type", false)) return false;
		if (ew.valueChanged(fobj, infix, "jenis_guru", false)) return false;
		if (ew.valueChanged(fobj, infix, "tambahan", false)) return false;
		if (ew.valueChanged(fobj, infix, "periode", false)) return false;
		if (ew.valueChanged(fobj, infix, "tunjangan_periode", false)) return false;
		if (ew.valueChanged(fobj, infix, "kehadiran", false)) return false;
		if (ew.valueChanged(fobj, infix, "value_kehadiran", false)) return false;
		if (ew.valueChanged(fobj, infix, "lembur", false)) return false;
		if (ew.valueChanged(fobj, infix, "value_lembur", false)) return false;
		if (ew.valueChanged(fobj, infix, "jp", false)) return false;
		if (ew.valueChanged(fobj, infix, "gapok", false)) return false;
		if (ew.valueChanged(fobj, infix, "total_gapok", false)) return false;
		if (ew.valueChanged(fobj, infix, "value_reward", false)) return false;
		if (ew.valueChanged(fobj, infix, "value_inval", false)) return false;
		if (ew.valueChanged(fobj, infix, "piket_count", false)) return false;
		if (ew.valueChanged(fobj, infix, "value_piket", false)) return false;
		if (ew.valueChanged(fobj, infix, "tugastambahan", false)) return false;
		if (ew.valueChanged(fobj, infix, "tj_jabatan", false)) return false;
		if (ew.valueChanged(fobj, infix, "sub_total", false)) return false;
		if (ew.valueChanged(fobj, infix, "potongan", false)) return false;
		if (ew.valueChanged(fobj, infix, "penyesuaian", false)) return false;
		if (ew.valueChanged(fobj, infix, "total", false)) return false;
		if (ew.valueChanged(fobj, infix, "voucher", false)) return false;
		if (ew.valueChanged(fobj, infix, "pid", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fvgaji_guru_smagrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvgaji_guru_smagrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fvgaji_guru_smagrid.lists["x_pegawai"] = <?php echo $vgaji_guru_sma_grid->pegawai->Lookup->toClientList($vgaji_guru_sma_grid) ?>;
	fvgaji_guru_smagrid.lists["x_pegawai"].options = <?php echo JsonEncode($vgaji_guru_sma_grid->pegawai->lookupOptions()) ?>;
	fvgaji_guru_smagrid.lists["x_jenjang_id"] = <?php echo $vgaji_guru_sma_grid->jenjang_id->Lookup->toClientList($vgaji_guru_sma_grid) ?>;
	fvgaji_guru_smagrid.lists["x_jenjang_id"].options = <?php echo JsonEncode($vgaji_guru_sma_grid->jenjang_id->lookupOptions()) ?>;
	fvgaji_guru_smagrid.autoSuggests["x_jenjang_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fvgaji_guru_smagrid.lists["x_jabatan_id"] = <?php echo $vgaji_guru_sma_grid->jabatan_id->Lookup->toClientList($vgaji_guru_sma_grid) ?>;
	fvgaji_guru_smagrid.lists["x_jabatan_id"].options = <?php echo JsonEncode($vgaji_guru_sma_grid->jabatan_id->lookupOptions()) ?>;
	fvgaji_guru_smagrid.autoSuggests["x_jabatan_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fvgaji_guru_smagrid.lists["x_type"] = <?php echo $vgaji_guru_sma_grid->type->Lookup->toClientList($vgaji_guru_sma_grid) ?>;
	fvgaji_guru_smagrid.lists["x_type"].options = <?php echo JsonEncode($vgaji_guru_sma_grid->type->lookupOptions()) ?>;
	fvgaji_guru_smagrid.autoSuggests["x_type"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fvgaji_guru_smagrid.lists["x_jenis_guru"] = <?php echo $vgaji_guru_sma_grid->jenis_guru->Lookup->toClientList($vgaji_guru_sma_grid) ?>;
	fvgaji_guru_smagrid.lists["x_jenis_guru"].options = <?php echo JsonEncode($vgaji_guru_sma_grid->jenis_guru->lookupOptions()) ?>;
	fvgaji_guru_smagrid.autoSuggests["x_jenis_guru"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fvgaji_guru_smagrid.lists["x_tambahan"] = <?php echo $vgaji_guru_sma_grid->tambahan->Lookup->toClientList($vgaji_guru_sma_grid) ?>;
	fvgaji_guru_smagrid.lists["x_tambahan"].options = <?php echo JsonEncode($vgaji_guru_sma_grid->tambahan->lookupOptions()) ?>;
	fvgaji_guru_smagrid.autoSuggests["x_tambahan"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fvgaji_guru_smagrid");
});
</script>
<?php } ?>
<?php
$vgaji_guru_sma_grid->renderOtherOptions();
?>
<?php if ($vgaji_guru_sma_grid->TotalRecords > 0 || $vgaji_guru_sma->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vgaji_guru_sma_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vgaji_guru_sma">
<?php if ($vgaji_guru_sma_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $vgaji_guru_sma_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fvgaji_guru_smagrid" class="ew-form ew-list-form form-inline">
<div id="gmp_vgaji_guru_sma" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_vgaji_guru_smagrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vgaji_guru_sma->RowType = ROWTYPE_HEADER;

// Render list options
$vgaji_guru_sma_grid->renderListOptions();

// Render list options (header, left)
$vgaji_guru_sma_grid->ListOptions->render("header", "left");
?>
<?php if ($vgaji_guru_sma_grid->pegawai->Visible) { // pegawai ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->pegawai) == "") { ?>
		<th data-name="pegawai" class="<?php echo $vgaji_guru_sma_grid->pegawai->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_pegawai" class="vgaji_guru_sma_pegawai"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->pegawai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pegawai" class="<?php echo $vgaji_guru_sma_grid->pegawai->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_pegawai" class="vgaji_guru_sma_pegawai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->pegawai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->pegawai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->jenjang_id->Visible) { // jenjang_id ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->jenjang_id) == "") { ?>
		<th data-name="jenjang_id" class="<?php echo $vgaji_guru_sma_grid->jenjang_id->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_jenjang_id" class="vgaji_guru_sma_jenjang_id"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->jenjang_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenjang_id" class="<?php echo $vgaji_guru_sma_grid->jenjang_id->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_jenjang_id" class="vgaji_guru_sma_jenjang_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->jenjang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->jenjang_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->jenjang_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->jabatan_id->Visible) { // jabatan_id ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->jabatan_id) == "") { ?>
		<th data-name="jabatan_id" class="<?php echo $vgaji_guru_sma_grid->jabatan_id->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_jabatan_id" class="vgaji_guru_sma_jabatan_id"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->jabatan_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jabatan_id" class="<?php echo $vgaji_guru_sma_grid->jabatan_id->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_jabatan_id" class="vgaji_guru_sma_jabatan_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->jabatan_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->jabatan_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->jabatan_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->lama_kerja->Visible) { // lama_kerja ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->lama_kerja) == "") { ?>
		<th data-name="lama_kerja" class="<?php echo $vgaji_guru_sma_grid->lama_kerja->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_lama_kerja" class="vgaji_guru_sma_lama_kerja"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->lama_kerja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="lama_kerja" class="<?php echo $vgaji_guru_sma_grid->lama_kerja->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_lama_kerja" class="vgaji_guru_sma_lama_kerja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->lama_kerja->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->lama_kerja->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->lama_kerja->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->type->Visible) { // type ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->type) == "") { ?>
		<th data-name="type" class="<?php echo $vgaji_guru_sma_grid->type->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_type" class="vgaji_guru_sma_type"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="type" class="<?php echo $vgaji_guru_sma_grid->type->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_type" class="vgaji_guru_sma_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->type->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->jenis_guru->Visible) { // jenis_guru ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->jenis_guru) == "") { ?>
		<th data-name="jenis_guru" class="<?php echo $vgaji_guru_sma_grid->jenis_guru->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_jenis_guru" class="vgaji_guru_sma_jenis_guru"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->jenis_guru->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenis_guru" class="<?php echo $vgaji_guru_sma_grid->jenis_guru->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_jenis_guru" class="vgaji_guru_sma_jenis_guru">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->jenis_guru->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->jenis_guru->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->jenis_guru->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->tambahan->Visible) { // tambahan ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->tambahan) == "") { ?>
		<th data-name="tambahan" class="<?php echo $vgaji_guru_sma_grid->tambahan->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_tambahan" class="vgaji_guru_sma_tambahan"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->tambahan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tambahan" class="<?php echo $vgaji_guru_sma_grid->tambahan->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_tambahan" class="vgaji_guru_sma_tambahan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->tambahan->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->tambahan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->tambahan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->periode->Visible) { // periode ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->periode) == "") { ?>
		<th data-name="periode" class="<?php echo $vgaji_guru_sma_grid->periode->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_periode" class="vgaji_guru_sma_periode"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->periode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="periode" class="<?php echo $vgaji_guru_sma_grid->periode->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_periode" class="vgaji_guru_sma_periode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->periode->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->periode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->periode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->tunjangan_periode->Visible) { // tunjangan_periode ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->tunjangan_periode) == "") { ?>
		<th data-name="tunjangan_periode" class="<?php echo $vgaji_guru_sma_grid->tunjangan_periode->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_tunjangan_periode" class="vgaji_guru_sma_tunjangan_periode"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->tunjangan_periode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tunjangan_periode" class="<?php echo $vgaji_guru_sma_grid->tunjangan_periode->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_tunjangan_periode" class="vgaji_guru_sma_tunjangan_periode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->tunjangan_periode->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->tunjangan_periode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->tunjangan_periode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->kehadiran->Visible) { // kehadiran ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->kehadiran) == "") { ?>
		<th data-name="kehadiran" class="<?php echo $vgaji_guru_sma_grid->kehadiran->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_kehadiran" class="vgaji_guru_sma_kehadiran"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->kehadiran->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kehadiran" class="<?php echo $vgaji_guru_sma_grid->kehadiran->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_kehadiran" class="vgaji_guru_sma_kehadiran">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->kehadiran->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->kehadiran->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->kehadiran->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->value_kehadiran->Visible) { // value_kehadiran ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->value_kehadiran) == "") { ?>
		<th data-name="value_kehadiran" class="<?php echo $vgaji_guru_sma_grid->value_kehadiran->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_value_kehadiran" class="vgaji_guru_sma_value_kehadiran"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->value_kehadiran->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_kehadiran" class="<?php echo $vgaji_guru_sma_grid->value_kehadiran->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_value_kehadiran" class="vgaji_guru_sma_value_kehadiran">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->value_kehadiran->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->value_kehadiran->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->value_kehadiran->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->lembur->Visible) { // lembur ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->lembur) == "") { ?>
		<th data-name="lembur" class="<?php echo $vgaji_guru_sma_grid->lembur->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_lembur" class="vgaji_guru_sma_lembur"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->lembur->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="lembur" class="<?php echo $vgaji_guru_sma_grid->lembur->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_lembur" class="vgaji_guru_sma_lembur">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->lembur->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->lembur->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->lembur->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->value_lembur->Visible) { // value_lembur ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->value_lembur) == "") { ?>
		<th data-name="value_lembur" class="<?php echo $vgaji_guru_sma_grid->value_lembur->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_value_lembur" class="vgaji_guru_sma_value_lembur"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->value_lembur->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_lembur" class="<?php echo $vgaji_guru_sma_grid->value_lembur->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_value_lembur" class="vgaji_guru_sma_value_lembur">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->value_lembur->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->value_lembur->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->value_lembur->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->jp->Visible) { // jp ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->jp) == "") { ?>
		<th data-name="jp" class="<?php echo $vgaji_guru_sma_grid->jp->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_jp" class="vgaji_guru_sma_jp"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->jp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jp" class="<?php echo $vgaji_guru_sma_grid->jp->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_jp" class="vgaji_guru_sma_jp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->jp->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->jp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->jp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->gapok->Visible) { // gapok ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->gapok) == "") { ?>
		<th data-name="gapok" class="<?php echo $vgaji_guru_sma_grid->gapok->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_gapok" class="vgaji_guru_sma_gapok"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->gapok->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gapok" class="<?php echo $vgaji_guru_sma_grid->gapok->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_gapok" class="vgaji_guru_sma_gapok">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->gapok->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->gapok->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->gapok->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->total_gapok->Visible) { // total_gapok ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->total_gapok) == "") { ?>
		<th data-name="total_gapok" class="<?php echo $vgaji_guru_sma_grid->total_gapok->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_total_gapok" class="vgaji_guru_sma_total_gapok"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->total_gapok->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_gapok" class="<?php echo $vgaji_guru_sma_grid->total_gapok->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_total_gapok" class="vgaji_guru_sma_total_gapok">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->total_gapok->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->total_gapok->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->total_gapok->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->value_reward->Visible) { // value_reward ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->value_reward) == "") { ?>
		<th data-name="value_reward" class="<?php echo $vgaji_guru_sma_grid->value_reward->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_value_reward" class="vgaji_guru_sma_value_reward"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->value_reward->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_reward" class="<?php echo $vgaji_guru_sma_grid->value_reward->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_value_reward" class="vgaji_guru_sma_value_reward">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->value_reward->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->value_reward->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->value_reward->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->value_inval->Visible) { // value_inval ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->value_inval) == "") { ?>
		<th data-name="value_inval" class="<?php echo $vgaji_guru_sma_grid->value_inval->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_value_inval" class="vgaji_guru_sma_value_inval"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->value_inval->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_inval" class="<?php echo $vgaji_guru_sma_grid->value_inval->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_value_inval" class="vgaji_guru_sma_value_inval">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->value_inval->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->value_inval->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->value_inval->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->piket_count->Visible) { // piket_count ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->piket_count) == "") { ?>
		<th data-name="piket_count" class="<?php echo $vgaji_guru_sma_grid->piket_count->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_piket_count" class="vgaji_guru_sma_piket_count"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->piket_count->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="piket_count" class="<?php echo $vgaji_guru_sma_grid->piket_count->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_piket_count" class="vgaji_guru_sma_piket_count">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->piket_count->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->piket_count->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->piket_count->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->value_piket->Visible) { // value_piket ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->value_piket) == "") { ?>
		<th data-name="value_piket" class="<?php echo $vgaji_guru_sma_grid->value_piket->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_value_piket" class="vgaji_guru_sma_value_piket"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->value_piket->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_piket" class="<?php echo $vgaji_guru_sma_grid->value_piket->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_value_piket" class="vgaji_guru_sma_value_piket">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->value_piket->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->value_piket->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->value_piket->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->tugastambahan->Visible) { // tugastambahan ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->tugastambahan) == "") { ?>
		<th data-name="tugastambahan" class="<?php echo $vgaji_guru_sma_grid->tugastambahan->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_tugastambahan" class="vgaji_guru_sma_tugastambahan"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->tugastambahan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tugastambahan" class="<?php echo $vgaji_guru_sma_grid->tugastambahan->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_tugastambahan" class="vgaji_guru_sma_tugastambahan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->tugastambahan->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->tugastambahan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->tugastambahan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->tj_jabatan->Visible) { // tj_jabatan ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->tj_jabatan) == "") { ?>
		<th data-name="tj_jabatan" class="<?php echo $vgaji_guru_sma_grid->tj_jabatan->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_tj_jabatan" class="vgaji_guru_sma_tj_jabatan"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->tj_jabatan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tj_jabatan" class="<?php echo $vgaji_guru_sma_grid->tj_jabatan->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_tj_jabatan" class="vgaji_guru_sma_tj_jabatan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->tj_jabatan->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->tj_jabatan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->tj_jabatan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->sub_total->Visible) { // sub_total ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->sub_total) == "") { ?>
		<th data-name="sub_total" class="<?php echo $vgaji_guru_sma_grid->sub_total->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_sub_total" class="vgaji_guru_sma_sub_total"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->sub_total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sub_total" class="<?php echo $vgaji_guru_sma_grid->sub_total->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_sub_total" class="vgaji_guru_sma_sub_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->sub_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->sub_total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->sub_total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->potongan->Visible) { // potongan ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->potongan) == "") { ?>
		<th data-name="potongan" class="<?php echo $vgaji_guru_sma_grid->potongan->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_potongan" class="vgaji_guru_sma_potongan"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->potongan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="potongan" class="<?php echo $vgaji_guru_sma_grid->potongan->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_potongan" class="vgaji_guru_sma_potongan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->potongan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->potongan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->penyesuaian->Visible) { // penyesuaian ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->penyesuaian) == "") { ?>
		<th data-name="penyesuaian" class="<?php echo $vgaji_guru_sma_grid->penyesuaian->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_penyesuaian" class="vgaji_guru_sma_penyesuaian"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->penyesuaian->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="penyesuaian" class="<?php echo $vgaji_guru_sma_grid->penyesuaian->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_penyesuaian" class="vgaji_guru_sma_penyesuaian">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->penyesuaian->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->penyesuaian->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->penyesuaian->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->total->Visible) { // total ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->total) == "") { ?>
		<th data-name="total" class="<?php echo $vgaji_guru_sma_grid->total->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_total" class="vgaji_guru_sma_total"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total" class="<?php echo $vgaji_guru_sma_grid->total->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_total" class="vgaji_guru_sma_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->voucher->Visible) { // voucher ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->voucher) == "") { ?>
		<th data-name="voucher" class="<?php echo $vgaji_guru_sma_grid->voucher->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_voucher" class="vgaji_guru_sma_voucher"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->voucher->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher" class="<?php echo $vgaji_guru_sma_grid->voucher->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_voucher" class="vgaji_guru_sma_voucher">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->voucher->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->voucher->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->voucher->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_grid->pid->Visible) { // pid ?>
	<?php if ($vgaji_guru_sma_grid->SortUrl($vgaji_guru_sma_grid->pid) == "") { ?>
		<th data-name="pid" class="<?php echo $vgaji_guru_sma_grid->pid->headerCellClass() ?>"><div id="elh_vgaji_guru_sma_pid" class="vgaji_guru_sma_pid"><div class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->pid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pid" class="<?php echo $vgaji_guru_sma_grid->pid->headerCellClass() ?>"><div><div id="elh_vgaji_guru_sma_pid" class="vgaji_guru_sma_pid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_grid->pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_grid->pid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_grid->pid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vgaji_guru_sma_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$vgaji_guru_sma_grid->StartRecord = 1;
$vgaji_guru_sma_grid->StopRecord = $vgaji_guru_sma_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($vgaji_guru_sma->isConfirm() || $vgaji_guru_sma_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($vgaji_guru_sma_grid->FormKeyCountName) && ($vgaji_guru_sma_grid->isGridAdd() || $vgaji_guru_sma_grid->isGridEdit() || $vgaji_guru_sma->isConfirm())) {
		$vgaji_guru_sma_grid->KeyCount = $CurrentForm->getValue($vgaji_guru_sma_grid->FormKeyCountName);
		$vgaji_guru_sma_grid->StopRecord = $vgaji_guru_sma_grid->StartRecord + $vgaji_guru_sma_grid->KeyCount - 1;
	}
}
$vgaji_guru_sma_grid->RecordCount = $vgaji_guru_sma_grid->StartRecord - 1;
if ($vgaji_guru_sma_grid->Recordset && !$vgaji_guru_sma_grid->Recordset->EOF) {
	$vgaji_guru_sma_grid->Recordset->moveFirst();
	$selectLimit = $vgaji_guru_sma_grid->UseSelectLimit;
	if (!$selectLimit && $vgaji_guru_sma_grid->StartRecord > 1)
		$vgaji_guru_sma_grid->Recordset->move($vgaji_guru_sma_grid->StartRecord - 1);
} elseif (!$vgaji_guru_sma->AllowAddDeleteRow && $vgaji_guru_sma_grid->StopRecord == 0) {
	$vgaji_guru_sma_grid->StopRecord = $vgaji_guru_sma->GridAddRowCount;
}

// Initialize aggregate
$vgaji_guru_sma->RowType = ROWTYPE_AGGREGATEINIT;
$vgaji_guru_sma->resetAttributes();
$vgaji_guru_sma_grid->renderRow();
if ($vgaji_guru_sma_grid->isGridAdd())
	$vgaji_guru_sma_grid->RowIndex = 0;
if ($vgaji_guru_sma_grid->isGridEdit())
	$vgaji_guru_sma_grid->RowIndex = 0;
while ($vgaji_guru_sma_grid->RecordCount < $vgaji_guru_sma_grid->StopRecord) {
	$vgaji_guru_sma_grid->RecordCount++;
	if ($vgaji_guru_sma_grid->RecordCount >= $vgaji_guru_sma_grid->StartRecord) {
		$vgaji_guru_sma_grid->RowCount++;
		if ($vgaji_guru_sma_grid->isGridAdd() || $vgaji_guru_sma_grid->isGridEdit() || $vgaji_guru_sma->isConfirm()) {
			$vgaji_guru_sma_grid->RowIndex++;
			$CurrentForm->Index = $vgaji_guru_sma_grid->RowIndex;
			if ($CurrentForm->hasValue($vgaji_guru_sma_grid->FormActionName) && ($vgaji_guru_sma->isConfirm() || $vgaji_guru_sma_grid->EventCancelled))
				$vgaji_guru_sma_grid->RowAction = strval($CurrentForm->getValue($vgaji_guru_sma_grid->FormActionName));
			elseif ($vgaji_guru_sma_grid->isGridAdd())
				$vgaji_guru_sma_grid->RowAction = "insert";
			else
				$vgaji_guru_sma_grid->RowAction = "";
		}

		// Set up key count
		$vgaji_guru_sma_grid->KeyCount = $vgaji_guru_sma_grid->RowIndex;

		// Init row class and style
		$vgaji_guru_sma->resetAttributes();
		$vgaji_guru_sma->CssClass = "";
		if ($vgaji_guru_sma_grid->isGridAdd()) {
			if ($vgaji_guru_sma->CurrentMode == "copy") {
				$vgaji_guru_sma_grid->loadRowValues($vgaji_guru_sma_grid->Recordset); // Load row values
				$vgaji_guru_sma_grid->setRecordKey($vgaji_guru_sma_grid->RowOldKey, $vgaji_guru_sma_grid->Recordset); // Set old record key
			} else {
				$vgaji_guru_sma_grid->loadRowValues(); // Load default values
				$vgaji_guru_sma_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$vgaji_guru_sma_grid->loadRowValues($vgaji_guru_sma_grid->Recordset); // Load row values
		}
		$vgaji_guru_sma->RowType = ROWTYPE_VIEW; // Render view
		if ($vgaji_guru_sma_grid->isGridAdd()) // Grid add
			$vgaji_guru_sma->RowType = ROWTYPE_ADD; // Render add
		if ($vgaji_guru_sma_grid->isGridAdd() && $vgaji_guru_sma->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$vgaji_guru_sma_grid->restoreCurrentRowFormValues($vgaji_guru_sma_grid->RowIndex); // Restore form values
		if ($vgaji_guru_sma_grid->isGridEdit()) { // Grid edit
			if ($vgaji_guru_sma->EventCancelled)
				$vgaji_guru_sma_grid->restoreCurrentRowFormValues($vgaji_guru_sma_grid->RowIndex); // Restore form values
			if ($vgaji_guru_sma_grid->RowAction == "insert")
				$vgaji_guru_sma->RowType = ROWTYPE_ADD; // Render add
			else
				$vgaji_guru_sma->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($vgaji_guru_sma_grid->isGridEdit() && ($vgaji_guru_sma->RowType == ROWTYPE_EDIT || $vgaji_guru_sma->RowType == ROWTYPE_ADD) && $vgaji_guru_sma->EventCancelled) // Update failed
			$vgaji_guru_sma_grid->restoreCurrentRowFormValues($vgaji_guru_sma_grid->RowIndex); // Restore form values
		if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) // Edit row
			$vgaji_guru_sma_grid->EditRowCount++;
		if ($vgaji_guru_sma->isConfirm()) // Confirm row
			$vgaji_guru_sma_grid->restoreCurrentRowFormValues($vgaji_guru_sma_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$vgaji_guru_sma->RowAttrs->merge(["data-rowindex" => $vgaji_guru_sma_grid->RowCount, "id" => "r" . $vgaji_guru_sma_grid->RowCount . "_vgaji_guru_sma", "data-rowtype" => $vgaji_guru_sma->RowType]);

		// Render row
		$vgaji_guru_sma_grid->renderRow();

		// Render list options
		$vgaji_guru_sma_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($vgaji_guru_sma_grid->RowAction != "delete" && $vgaji_guru_sma_grid->RowAction != "insertdelete" && !($vgaji_guru_sma_grid->RowAction == "insert" && $vgaji_guru_sma->isConfirm() && $vgaji_guru_sma_grid->emptyRow())) {
?>
	<tr <?php echo $vgaji_guru_sma->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vgaji_guru_sma_grid->ListOptions->render("body", "left", $vgaji_guru_sma_grid->RowCount);
?>
	<?php if ($vgaji_guru_sma_grid->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai" <?php echo $vgaji_guru_sma_grid->pegawai->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_pegawai" class="form-group">
<?php $vgaji_guru_sma_grid->pegawai->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai"><?php echo EmptyValue(strval($vgaji_guru_sma_grid->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $vgaji_guru_sma_grid->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($vgaji_guru_sma_grid->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($vgaji_guru_sma_grid->pegawai->ReadOnly || $vgaji_guru_sma_grid->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $vgaji_guru_sma_grid->pegawai->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_pegawai") ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $vgaji_guru_sma_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" value="<?php echo $vgaji_guru_sma_grid->pegawai->CurrentValue ?>"<?php echo $vgaji_guru_sma_grid->pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pegawai" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pegawai->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_pegawai" class="form-group">
<?php $vgaji_guru_sma_grid->pegawai->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai"><?php echo EmptyValue(strval($vgaji_guru_sma_grid->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $vgaji_guru_sma_grid->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($vgaji_guru_sma_grid->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($vgaji_guru_sma_grid->pegawai->ReadOnly || $vgaji_guru_sma_grid->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $vgaji_guru_sma_grid->pegawai->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_pegawai") ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $vgaji_guru_sma_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" value="<?php echo $vgaji_guru_sma_grid->pegawai->CurrentValue ?>"<?php echo $vgaji_guru_sma_grid->pegawai->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_pegawai">
<span<?php echo $vgaji_guru_sma_grid->pegawai->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->pegawai->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pegawai" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pegawai->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pegawai" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pegawai->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pegawai" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pegawai->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pegawai" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pegawai->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_id" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_id" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_id" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_id" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT || $vgaji_guru_sma->CurrentMode == "edit") { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_id" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_id" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($vgaji_guru_sma_grid->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id" <?php echo $vgaji_guru_sma_grid->jenjang_id->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_jenjang_id" class="form-group">
<?php
$onchange = $vgaji_guru_sma_grid->jenjang_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$vgaji_guru_sma_grid->jenjang_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id">
	<input type="text" class="form-control" name="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" id="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" value="<?php echo RemoveHtml($vgaji_guru_sma_grid->jenjang_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->getPlaceHolder()) ?>"<?php echo $vgaji_guru_sma_grid->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenjang_id" data-value-separator="<?php echo $vgaji_guru_sma_grid->jenjang_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fvgaji_guru_smagrid"], function() {
	fvgaji_guru_smagrid.createAutoSuggest({"id":"x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id","forceSelect":false});
});
</script>
<?php echo $vgaji_guru_sma_grid->jenjang_id->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_jenjang_id") ?>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenjang_id" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_jenjang_id" class="form-group">
<?php
$onchange = $vgaji_guru_sma_grid->jenjang_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$vgaji_guru_sma_grid->jenjang_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id">
	<input type="text" class="form-control" name="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" id="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" value="<?php echo RemoveHtml($vgaji_guru_sma_grid->jenjang_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->getPlaceHolder()) ?>"<?php echo $vgaji_guru_sma_grid->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenjang_id" data-value-separator="<?php echo $vgaji_guru_sma_grid->jenjang_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fvgaji_guru_smagrid"], function() {
	fvgaji_guru_smagrid.createAutoSuggest({"id":"x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id","forceSelect":false});
});
</script>
<?php echo $vgaji_guru_sma_grid->jenjang_id->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_jenjang_id") ?>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_jenjang_id">
<span<?php echo $vgaji_guru_sma_grid->jenjang_id->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->jenjang_id->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenjang_id" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenjang_id" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenjang_id" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenjang_id" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->jabatan_id->Visible) { // jabatan_id ?>
		<td data-name="jabatan_id" <?php echo $vgaji_guru_sma_grid->jabatan_id->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_jabatan_id" class="form-group">
<?php
$onchange = $vgaji_guru_sma_grid->jabatan_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$vgaji_guru_sma_grid->jabatan_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id">
	<input type="text" class="form-control" name="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" id="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" value="<?php echo RemoveHtml($vgaji_guru_sma_grid->jabatan_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->getPlaceHolder()) ?>"<?php echo $vgaji_guru_sma_grid->jabatan_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jabatan_id" data-value-separator="<?php echo $vgaji_guru_sma_grid->jabatan_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fvgaji_guru_smagrid"], function() {
	fvgaji_guru_smagrid.createAutoSuggest({"id":"x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id","forceSelect":false});
});
</script>
<?php echo $vgaji_guru_sma_grid->jabatan_id->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_jabatan_id") ?>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jabatan_id" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_jabatan_id" class="form-group">
<?php
$onchange = $vgaji_guru_sma_grid->jabatan_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$vgaji_guru_sma_grid->jabatan_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id">
	<input type="text" class="form-control" name="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" id="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" value="<?php echo RemoveHtml($vgaji_guru_sma_grid->jabatan_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->getPlaceHolder()) ?>"<?php echo $vgaji_guru_sma_grid->jabatan_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jabatan_id" data-value-separator="<?php echo $vgaji_guru_sma_grid->jabatan_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fvgaji_guru_smagrid"], function() {
	fvgaji_guru_smagrid.createAutoSuggest({"id":"x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id","forceSelect":false});
});
</script>
<?php echo $vgaji_guru_sma_grid->jabatan_id->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_jabatan_id") ?>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_jabatan_id">
<span<?php echo $vgaji_guru_sma_grid->jabatan_id->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->jabatan_id->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jabatan_id" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jabatan_id" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jabatan_id" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jabatan_id" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->lama_kerja->Visible) { // lama_kerja ?>
		<td data-name="lama_kerja" <?php echo $vgaji_guru_sma_grid->lama_kerja->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_lama_kerja" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_lama_kerja" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->lama_kerja->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->lama_kerja->EditValue ?>"<?php echo $vgaji_guru_sma_grid->lama_kerja->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_lama_kerja" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->lama_kerja->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_lama_kerja" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_lama_kerja" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->lama_kerja->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->lama_kerja->EditValue ?>"<?php echo $vgaji_guru_sma_grid->lama_kerja->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_lama_kerja">
<span<?php echo $vgaji_guru_sma_grid->lama_kerja->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->lama_kerja->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_lama_kerja" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->lama_kerja->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_lama_kerja" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->lama_kerja->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_lama_kerja" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->lama_kerja->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_lama_kerja" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->lama_kerja->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->type->Visible) { // type ?>
		<td data-name="type" <?php echo $vgaji_guru_sma_grid->type->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_type" class="form-group">
<?php
$onchange = $vgaji_guru_sma_grid->type->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$vgaji_guru_sma_grid->type->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type">
	<input type="text" class="form-control" name="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" id="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" value="<?php echo RemoveHtml($vgaji_guru_sma_grid->type->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->getPlaceHolder()) ?>"<?php echo $vgaji_guru_sma_grid->type->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_type" data-value-separator="<?php echo $vgaji_guru_sma_grid->type->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fvgaji_guru_smagrid"], function() {
	fvgaji_guru_smagrid.createAutoSuggest({"id":"x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type","forceSelect":false});
});
</script>
<?php echo $vgaji_guru_sma_grid->type->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_type") ?>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_type" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_type" class="form-group">
<?php
$onchange = $vgaji_guru_sma_grid->type->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$vgaji_guru_sma_grid->type->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type">
	<input type="text" class="form-control" name="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" id="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" value="<?php echo RemoveHtml($vgaji_guru_sma_grid->type->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->getPlaceHolder()) ?>"<?php echo $vgaji_guru_sma_grid->type->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_type" data-value-separator="<?php echo $vgaji_guru_sma_grid->type->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fvgaji_guru_smagrid"], function() {
	fvgaji_guru_smagrid.createAutoSuggest({"id":"x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type","forceSelect":false});
});
</script>
<?php echo $vgaji_guru_sma_grid->type->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_type") ?>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_type">
<span<?php echo $vgaji_guru_sma_grid->type->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->type->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_type" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_type" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_type" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_type" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->jenis_guru->Visible) { // jenis_guru ?>
		<td data-name="jenis_guru" <?php echo $vgaji_guru_sma_grid->jenis_guru->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_jenis_guru" class="form-group">
<?php
$onchange = $vgaji_guru_sma_grid->jenis_guru->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$vgaji_guru_sma_grid->jenis_guru->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru">
	<input type="text" class="form-control" name="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" id="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" value="<?php echo RemoveHtml($vgaji_guru_sma_grid->jenis_guru->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->getPlaceHolder()) ?>"<?php echo $vgaji_guru_sma_grid->jenis_guru->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenis_guru" data-value-separator="<?php echo $vgaji_guru_sma_grid->jenis_guru->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fvgaji_guru_smagrid"], function() {
	fvgaji_guru_smagrid.createAutoSuggest({"id":"x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru","forceSelect":false});
});
</script>
<?php echo $vgaji_guru_sma_grid->jenis_guru->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_jenis_guru") ?>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenis_guru" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_jenis_guru" class="form-group">
<?php
$onchange = $vgaji_guru_sma_grid->jenis_guru->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$vgaji_guru_sma_grid->jenis_guru->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru">
	<input type="text" class="form-control" name="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" id="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" value="<?php echo RemoveHtml($vgaji_guru_sma_grid->jenis_guru->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->getPlaceHolder()) ?>"<?php echo $vgaji_guru_sma_grid->jenis_guru->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenis_guru" data-value-separator="<?php echo $vgaji_guru_sma_grid->jenis_guru->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fvgaji_guru_smagrid"], function() {
	fvgaji_guru_smagrid.createAutoSuggest({"id":"x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru","forceSelect":false});
});
</script>
<?php echo $vgaji_guru_sma_grid->jenis_guru->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_jenis_guru") ?>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_jenis_guru">
<span<?php echo $vgaji_guru_sma_grid->jenis_guru->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->jenis_guru->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenis_guru" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenis_guru" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenis_guru" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenis_guru" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->tambahan->Visible) { // tambahan ?>
		<td data-name="tambahan" <?php echo $vgaji_guru_sma_grid->tambahan->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_tambahan" class="form-group">
<?php
$onchange = $vgaji_guru_sma_grid->tambahan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$vgaji_guru_sma_grid->tambahan->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan">
	<input type="text" class="form-control" name="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" id="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" value="<?php echo RemoveHtml($vgaji_guru_sma_grid->tambahan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->getPlaceHolder()) ?>"<?php echo $vgaji_guru_sma_grid->tambahan->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tambahan" data-value-separator="<?php echo $vgaji_guru_sma_grid->tambahan->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fvgaji_guru_smagrid"], function() {
	fvgaji_guru_smagrid.createAutoSuggest({"id":"x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan","forceSelect":false});
});
</script>
<?php echo $vgaji_guru_sma_grid->tambahan->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_tambahan") ?>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tambahan" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_tambahan" class="form-group">
<?php
$onchange = $vgaji_guru_sma_grid->tambahan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$vgaji_guru_sma_grid->tambahan->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan">
	<input type="text" class="form-control" name="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" id="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" value="<?php echo RemoveHtml($vgaji_guru_sma_grid->tambahan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->getPlaceHolder()) ?>"<?php echo $vgaji_guru_sma_grid->tambahan->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tambahan" data-value-separator="<?php echo $vgaji_guru_sma_grid->tambahan->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fvgaji_guru_smagrid"], function() {
	fvgaji_guru_smagrid.createAutoSuggest({"id":"x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan","forceSelect":false});
});
</script>
<?php echo $vgaji_guru_sma_grid->tambahan->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_tambahan") ?>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_tambahan">
<span<?php echo $vgaji_guru_sma_grid->tambahan->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->tambahan->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tambahan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tambahan" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tambahan" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tambahan" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->periode->Visible) { // periode ?>
		<td data-name="periode" <?php echo $vgaji_guru_sma_grid->periode->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_periode" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_periode" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->periode->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->periode->EditValue ?>"<?php echo $vgaji_guru_sma_grid->periode->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_periode" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->periode->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_periode" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_periode" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->periode->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->periode->EditValue ?>"<?php echo $vgaji_guru_sma_grid->periode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_periode">
<span<?php echo $vgaji_guru_sma_grid->periode->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->periode->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_periode" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->periode->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_periode" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->periode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_periode" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->periode->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_periode" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->periode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->tunjangan_periode->Visible) { // tunjangan_periode ?>
		<td data-name="tunjangan_periode" <?php echo $vgaji_guru_sma_grid->tunjangan_periode->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_tunjangan_periode" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_tunjangan_periode" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->tunjangan_periode->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->tunjangan_periode->EditValue ?>"<?php echo $vgaji_guru_sma_grid->tunjangan_periode->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tunjangan_periode" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tunjangan_periode->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_tunjangan_periode" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_tunjangan_periode" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->tunjangan_periode->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->tunjangan_periode->EditValue ?>"<?php echo $vgaji_guru_sma_grid->tunjangan_periode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_tunjangan_periode">
<span<?php echo $vgaji_guru_sma_grid->tunjangan_periode->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->tunjangan_periode->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tunjangan_periode" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tunjangan_periode->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tunjangan_periode" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tunjangan_periode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tunjangan_periode" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tunjangan_periode->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tunjangan_periode" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tunjangan_periode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->kehadiran->Visible) { // kehadiran ?>
		<td data-name="kehadiran" <?php echo $vgaji_guru_sma_grid->kehadiran->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_kehadiran" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_kehadiran" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->kehadiran->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->kehadiran->EditValue ?>"<?php echo $vgaji_guru_sma_grid->kehadiran->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_kehadiran" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->kehadiran->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_kehadiran" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_kehadiran" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->kehadiran->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->kehadiran->EditValue ?>"<?php echo $vgaji_guru_sma_grid->kehadiran->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_kehadiran">
<span<?php echo $vgaji_guru_sma_grid->kehadiran->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->kehadiran->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_kehadiran" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->kehadiran->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_kehadiran" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->kehadiran->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_kehadiran" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->kehadiran->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_kehadiran" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->kehadiran->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->value_kehadiran->Visible) { // value_kehadiran ?>
		<td data-name="value_kehadiran" <?php echo $vgaji_guru_sma_grid->value_kehadiran->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_value_kehadiran" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_value_kehadiran" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_kehadiran->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->value_kehadiran->EditValue ?>"<?php echo $vgaji_guru_sma_grid->value_kehadiran->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_kehadiran" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_kehadiran->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_value_kehadiran" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_value_kehadiran" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_kehadiran->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->value_kehadiran->EditValue ?>"<?php echo $vgaji_guru_sma_grid->value_kehadiran->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_value_kehadiran">
<span<?php echo $vgaji_guru_sma_grid->value_kehadiran->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->value_kehadiran->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_kehadiran" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_kehadiran->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_kehadiran" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_kehadiran->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_kehadiran" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_kehadiran->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_kehadiran" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_kehadiran->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->lembur->Visible) { // lembur ?>
		<td data-name="lembur" <?php echo $vgaji_guru_sma_grid->lembur->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_lembur" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_lembur" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->lembur->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->lembur->EditValue ?>"<?php echo $vgaji_guru_sma_grid->lembur->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_lembur" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->lembur->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_lembur" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_lembur" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->lembur->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->lembur->EditValue ?>"<?php echo $vgaji_guru_sma_grid->lembur->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_lembur">
<span<?php echo $vgaji_guru_sma_grid->lembur->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->lembur->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_lembur" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->lembur->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_lembur" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->lembur->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_lembur" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->lembur->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_lembur" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->lembur->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->value_lembur->Visible) { // value_lembur ?>
		<td data-name="value_lembur" <?php echo $vgaji_guru_sma_grid->value_lembur->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_value_lembur" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_value_lembur" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_lembur->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->value_lembur->EditValue ?>"<?php echo $vgaji_guru_sma_grid->value_lembur->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_lembur" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_lembur->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_value_lembur" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_value_lembur" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_lembur->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->value_lembur->EditValue ?>"<?php echo $vgaji_guru_sma_grid->value_lembur->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_value_lembur">
<span<?php echo $vgaji_guru_sma_grid->value_lembur->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->value_lembur->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_lembur" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_lembur->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_lembur" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_lembur->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_lembur" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_lembur->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_lembur" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_lembur->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->jp->Visible) { // jp ?>
		<td data-name="jp" <?php echo $vgaji_guru_sma_grid->jp->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_jp" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_jp" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jp->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->jp->EditValue ?>"<?php echo $vgaji_guru_sma_grid->jp->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jp" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jp->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_jp" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_jp" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jp->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->jp->EditValue ?>"<?php echo $vgaji_guru_sma_grid->jp->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_jp">
<span<?php echo $vgaji_guru_sma_grid->jp->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->jp->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jp" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jp->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jp" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jp->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jp" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jp->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jp" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jp->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->gapok->Visible) { // gapok ?>
		<td data-name="gapok" <?php echo $vgaji_guru_sma_grid->gapok->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_gapok" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_gapok" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->gapok->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->gapok->EditValue ?>"<?php echo $vgaji_guru_sma_grid->gapok->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_gapok" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->gapok->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_gapok" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_gapok" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->gapok->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->gapok->EditValue ?>"<?php echo $vgaji_guru_sma_grid->gapok->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_gapok">
<span<?php echo $vgaji_guru_sma_grid->gapok->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->gapok->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_gapok" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->gapok->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_gapok" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->gapok->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_gapok" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->gapok->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_gapok" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->gapok->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->total_gapok->Visible) { // total_gapok ?>
		<td data-name="total_gapok" <?php echo $vgaji_guru_sma_grid->total_gapok->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_total_gapok" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_total_gapok" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->total_gapok->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->total_gapok->EditValue ?>"<?php echo $vgaji_guru_sma_grid->total_gapok->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_total_gapok" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->total_gapok->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_total_gapok" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_total_gapok" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->total_gapok->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->total_gapok->EditValue ?>"<?php echo $vgaji_guru_sma_grid->total_gapok->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_total_gapok">
<span<?php echo $vgaji_guru_sma_grid->total_gapok->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->total_gapok->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_total_gapok" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->total_gapok->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_total_gapok" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->total_gapok->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_total_gapok" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->total_gapok->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_total_gapok" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->total_gapok->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->value_reward->Visible) { // value_reward ?>
		<td data-name="value_reward" <?php echo $vgaji_guru_sma_grid->value_reward->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_value_reward" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_value_reward" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_reward->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->value_reward->EditValue ?>"<?php echo $vgaji_guru_sma_grid->value_reward->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_reward" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_reward->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_value_reward" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_value_reward" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_reward->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->value_reward->EditValue ?>"<?php echo $vgaji_guru_sma_grid->value_reward->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_value_reward">
<span<?php echo $vgaji_guru_sma_grid->value_reward->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->value_reward->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_reward" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_reward->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_reward" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_reward->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_reward" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_reward->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_reward" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_reward->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->value_inval->Visible) { // value_inval ?>
		<td data-name="value_inval" <?php echo $vgaji_guru_sma_grid->value_inval->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_value_inval" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_value_inval" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_inval->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->value_inval->EditValue ?>"<?php echo $vgaji_guru_sma_grid->value_inval->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_inval" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_inval->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_value_inval" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_value_inval" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_inval->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->value_inval->EditValue ?>"<?php echo $vgaji_guru_sma_grid->value_inval->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_value_inval">
<span<?php echo $vgaji_guru_sma_grid->value_inval->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->value_inval->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_inval" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_inval->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_inval" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_inval->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_inval" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_inval->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_inval" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_inval->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->piket_count->Visible) { // piket_count ?>
		<td data-name="piket_count" <?php echo $vgaji_guru_sma_grid->piket_count->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_piket_count" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_piket_count" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->piket_count->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->piket_count->EditValue ?>"<?php echo $vgaji_guru_sma_grid->piket_count->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_piket_count" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->piket_count->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_piket_count" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_piket_count" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->piket_count->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->piket_count->EditValue ?>"<?php echo $vgaji_guru_sma_grid->piket_count->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_piket_count">
<span<?php echo $vgaji_guru_sma_grid->piket_count->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->piket_count->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_piket_count" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->piket_count->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_piket_count" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->piket_count->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_piket_count" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->piket_count->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_piket_count" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->piket_count->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->value_piket->Visible) { // value_piket ?>
		<td data-name="value_piket" <?php echo $vgaji_guru_sma_grid->value_piket->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_value_piket" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_value_piket" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_piket->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->value_piket->EditValue ?>"<?php echo $vgaji_guru_sma_grid->value_piket->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_piket" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_piket->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_value_piket" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_value_piket" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_piket->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->value_piket->EditValue ?>"<?php echo $vgaji_guru_sma_grid->value_piket->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_value_piket">
<span<?php echo $vgaji_guru_sma_grid->value_piket->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->value_piket->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_piket" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_piket->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_piket" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_piket->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_piket" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_piket->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_piket" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_piket->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->tugastambahan->Visible) { // tugastambahan ?>
		<td data-name="tugastambahan" <?php echo $vgaji_guru_sma_grid->tugastambahan->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_tugastambahan" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_tugastambahan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->tugastambahan->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->tugastambahan->EditValue ?>"<?php echo $vgaji_guru_sma_grid->tugastambahan->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tugastambahan" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tugastambahan->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_tugastambahan" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_tugastambahan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->tugastambahan->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->tugastambahan->EditValue ?>"<?php echo $vgaji_guru_sma_grid->tugastambahan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_tugastambahan">
<span<?php echo $vgaji_guru_sma_grid->tugastambahan->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->tugastambahan->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tugastambahan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tugastambahan->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tugastambahan" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tugastambahan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tugastambahan" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tugastambahan->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tugastambahan" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tugastambahan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->tj_jabatan->Visible) { // tj_jabatan ?>
		<td data-name="tj_jabatan" <?php echo $vgaji_guru_sma_grid->tj_jabatan->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_tj_jabatan" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_tj_jabatan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->tj_jabatan->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->tj_jabatan->EditValue ?>"<?php echo $vgaji_guru_sma_grid->tj_jabatan->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tj_jabatan" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tj_jabatan->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_tj_jabatan" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_tj_jabatan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->tj_jabatan->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->tj_jabatan->EditValue ?>"<?php echo $vgaji_guru_sma_grid->tj_jabatan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_tj_jabatan">
<span<?php echo $vgaji_guru_sma_grid->tj_jabatan->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->tj_jabatan->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tj_jabatan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tj_jabatan->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tj_jabatan" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tj_jabatan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tj_jabatan" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tj_jabatan->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tj_jabatan" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tj_jabatan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->sub_total->Visible) { // sub_total ?>
		<td data-name="sub_total" <?php echo $vgaji_guru_sma_grid->sub_total->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_sub_total" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_sub_total" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->sub_total->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->sub_total->EditValue ?>"<?php echo $vgaji_guru_sma_grid->sub_total->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_sub_total" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->sub_total->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_sub_total" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_sub_total" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->sub_total->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->sub_total->EditValue ?>"<?php echo $vgaji_guru_sma_grid->sub_total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_sub_total">
<span<?php echo $vgaji_guru_sma_grid->sub_total->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->sub_total->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_sub_total" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->sub_total->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_sub_total" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->sub_total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_sub_total" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->sub_total->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_sub_total" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->sub_total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->potongan->Visible) { // potongan ?>
		<td data-name="potongan" <?php echo $vgaji_guru_sma_grid->potongan->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_potongan" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_potongan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->potongan->EditValue ?>"<?php echo $vgaji_guru_sma_grid->potongan->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_potongan" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->potongan->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_potongan" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_potongan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->potongan->EditValue ?>"<?php echo $vgaji_guru_sma_grid->potongan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_potongan">
<span<?php echo $vgaji_guru_sma_grid->potongan->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->potongan->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_potongan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->potongan->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_potongan" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->potongan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_potongan" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->potongan->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_potongan" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->potongan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->penyesuaian->Visible) { // penyesuaian ?>
		<td data-name="penyesuaian" <?php echo $vgaji_guru_sma_grid->penyesuaian->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_penyesuaian" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_penyesuaian" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->penyesuaian->EditValue ?>"<?php echo $vgaji_guru_sma_grid->penyesuaian->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_penyesuaian" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->penyesuaian->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_penyesuaian" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_penyesuaian" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->penyesuaian->EditValue ?>"<?php echo $vgaji_guru_sma_grid->penyesuaian->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_penyesuaian">
<span<?php echo $vgaji_guru_sma_grid->penyesuaian->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->penyesuaian->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_penyesuaian" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->penyesuaian->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_penyesuaian" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->penyesuaian->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_penyesuaian" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->penyesuaian->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_penyesuaian" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->penyesuaian->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->total->Visible) { // total ?>
		<td data-name="total" <?php echo $vgaji_guru_sma_grid->total->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_total" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_total" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->total->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->total->EditValue ?>"<?php echo $vgaji_guru_sma_grid->total->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_total" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->total->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_total" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_total" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->total->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->total->EditValue ?>"<?php echo $vgaji_guru_sma_grid->total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_total">
<span<?php echo $vgaji_guru_sma_grid->total->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->total->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_total" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->total->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_total" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_total" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->total->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_total" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->voucher->Visible) { // voucher ?>
		<td data-name="voucher" <?php echo $vgaji_guru_sma_grid->voucher->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_voucher" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_voucher" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->voucher->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->voucher->EditValue ?>"<?php echo $vgaji_guru_sma_grid->voucher->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_voucher" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->voucher->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_voucher" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_voucher" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->voucher->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->voucher->EditValue ?>"<?php echo $vgaji_guru_sma_grid->voucher->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_voucher">
<span<?php echo $vgaji_guru_sma_grid->voucher->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->voucher->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_voucher" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->voucher->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_voucher" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->voucher->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_voucher" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->voucher->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_voucher" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->voucher->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->pid->Visible) { // pid ?>
		<td data-name="pid" <?php echo $vgaji_guru_sma_grid->pid->cellAttributes() ?>>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($vgaji_guru_sma_grid->pid->getSessionValue() != "") { ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_pid" class="form-group">
<span<?php echo $vgaji_guru_sma_grid->pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_pid" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_pid" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->pid->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->pid->EditValue ?>"<?php echo $vgaji_guru_sma_grid->pid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pid" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pid->OldValue) ?>">
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($vgaji_guru_sma_grid->pid->getSessionValue() != "") { ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_pid" class="form-group">
<span<?php echo $vgaji_guru_sma_grid->pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_pid" class="form-group">
<input type="text" data-table="vgaji_guru_sma" data-field="x_pid" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->pid->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->pid->EditValue ?>"<?php echo $vgaji_guru_sma_grid->pid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vgaji_guru_sma_grid->RowCount ?>_vgaji_guru_sma_pid">
<span<?php echo $vgaji_guru_sma_grid->pid->viewAttributes() ?>><?php echo $vgaji_guru_sma_grid->pid->getViewValue() ?></span>
</span>
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pid" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pid->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pid" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pid" name="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" id="fvgaji_guru_smagrid$x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pid->FormValue) ?>">
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pid" name="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" id="fvgaji_guru_smagrid$o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vgaji_guru_sma_grid->ListOptions->render("body", "right", $vgaji_guru_sma_grid->RowCount);
?>
	</tr>
<?php if ($vgaji_guru_sma->RowType == ROWTYPE_ADD || $vgaji_guru_sma->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fvgaji_guru_smagrid", "load"], function() {
	fvgaji_guru_smagrid.updateLists(<?php echo $vgaji_guru_sma_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$vgaji_guru_sma_grid->isGridAdd() || $vgaji_guru_sma->CurrentMode == "copy")
		if (!$vgaji_guru_sma_grid->Recordset->EOF)
			$vgaji_guru_sma_grid->Recordset->moveNext();
}
?>
<?php
	if ($vgaji_guru_sma->CurrentMode == "add" || $vgaji_guru_sma->CurrentMode == "copy" || $vgaji_guru_sma->CurrentMode == "edit") {
		$vgaji_guru_sma_grid->RowIndex = '$rowindex$';
		$vgaji_guru_sma_grid->loadRowValues();

		// Set row properties
		$vgaji_guru_sma->resetAttributes();
		$vgaji_guru_sma->RowAttrs->merge(["data-rowindex" => $vgaji_guru_sma_grid->RowIndex, "id" => "r0_vgaji_guru_sma", "data-rowtype" => ROWTYPE_ADD]);
		$vgaji_guru_sma->RowAttrs->appendClass("ew-template");
		$vgaji_guru_sma->RowType = ROWTYPE_ADD;

		// Render row
		$vgaji_guru_sma_grid->renderRow();

		// Render list options
		$vgaji_guru_sma_grid->renderListOptions();
		$vgaji_guru_sma_grid->StartRowCount = 0;
?>
	<tr <?php echo $vgaji_guru_sma->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vgaji_guru_sma_grid->ListOptions->render("body", "left", $vgaji_guru_sma_grid->RowIndex);
?>
	<?php if ($vgaji_guru_sma_grid->pegawai->Visible) { // pegawai ?>
		<td data-name="pegawai">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_pegawai" class="form-group vgaji_guru_sma_pegawai">
<?php $vgaji_guru_sma_grid->pegawai->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai"><?php echo EmptyValue(strval($vgaji_guru_sma_grid->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $vgaji_guru_sma_grid->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($vgaji_guru_sma_grid->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($vgaji_guru_sma_grid->pegawai->ReadOnly || $vgaji_guru_sma_grid->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $vgaji_guru_sma_grid->pegawai->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_pegawai") ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $vgaji_guru_sma_grid->pegawai->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" value="<?php echo $vgaji_guru_sma_grid->pegawai->CurrentValue ?>"<?php echo $vgaji_guru_sma_grid->pegawai->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_pegawai" class="form-group vgaji_guru_sma_pegawai">
<span<?php echo $vgaji_guru_sma_grid->pegawai->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->pegawai->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pegawai" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pegawai->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pegawai" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pegawai" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pegawai->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->jenjang_id->Visible) { // jenjang_id ?>
		<td data-name="jenjang_id">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_jenjang_id" class="form-group vgaji_guru_sma_jenjang_id">
<?php
$onchange = $vgaji_guru_sma_grid->jenjang_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$vgaji_guru_sma_grid->jenjang_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id">
	<input type="text" class="form-control" name="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" id="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" value="<?php echo RemoveHtml($vgaji_guru_sma_grid->jenjang_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->getPlaceHolder()) ?>"<?php echo $vgaji_guru_sma_grid->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenjang_id" data-value-separator="<?php echo $vgaji_guru_sma_grid->jenjang_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fvgaji_guru_smagrid"], function() {
	fvgaji_guru_smagrid.createAutoSuggest({"id":"x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id","forceSelect":false});
});
</script>
<?php echo $vgaji_guru_sma_grid->jenjang_id->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_jenjang_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_jenjang_id" class="form-group vgaji_guru_sma_jenjang_id">
<span<?php echo $vgaji_guru_sma_grid->jenjang_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->jenjang_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenjang_id" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenjang_id" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenjang_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenjang_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->jabatan_id->Visible) { // jabatan_id ?>
		<td data-name="jabatan_id">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_jabatan_id" class="form-group vgaji_guru_sma_jabatan_id">
<?php
$onchange = $vgaji_guru_sma_grid->jabatan_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$vgaji_guru_sma_grid->jabatan_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id">
	<input type="text" class="form-control" name="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" id="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" value="<?php echo RemoveHtml($vgaji_guru_sma_grid->jabatan_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->getPlaceHolder()) ?>"<?php echo $vgaji_guru_sma_grid->jabatan_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jabatan_id" data-value-separator="<?php echo $vgaji_guru_sma_grid->jabatan_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fvgaji_guru_smagrid"], function() {
	fvgaji_guru_smagrid.createAutoSuggest({"id":"x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id","forceSelect":false});
});
</script>
<?php echo $vgaji_guru_sma_grid->jabatan_id->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_jabatan_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_jabatan_id" class="form-group vgaji_guru_sma_jabatan_id">
<span<?php echo $vgaji_guru_sma_grid->jabatan_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->jabatan_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jabatan_id" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jabatan_id" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jabatan_id" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jabatan_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->lama_kerja->Visible) { // lama_kerja ?>
		<td data-name="lama_kerja">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_lama_kerja" class="form-group vgaji_guru_sma_lama_kerja">
<input type="text" data-table="vgaji_guru_sma" data-field="x_lama_kerja" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->lama_kerja->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->lama_kerja->EditValue ?>"<?php echo $vgaji_guru_sma_grid->lama_kerja->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_lama_kerja" class="form-group vgaji_guru_sma_lama_kerja">
<span<?php echo $vgaji_guru_sma_grid->lama_kerja->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->lama_kerja->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_lama_kerja" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->lama_kerja->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_lama_kerja" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lama_kerja" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->lama_kerja->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->type->Visible) { // type ?>
		<td data-name="type">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_type" class="form-group vgaji_guru_sma_type">
<?php
$onchange = $vgaji_guru_sma_grid->type->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$vgaji_guru_sma_grid->type->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type">
	<input type="text" class="form-control" name="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" id="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" value="<?php echo RemoveHtml($vgaji_guru_sma_grid->type->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->getPlaceHolder()) ?>"<?php echo $vgaji_guru_sma_grid->type->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_type" data-value-separator="<?php echo $vgaji_guru_sma_grid->type->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fvgaji_guru_smagrid"], function() {
	fvgaji_guru_smagrid.createAutoSuggest({"id":"x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type","forceSelect":false});
});
</script>
<?php echo $vgaji_guru_sma_grid->type->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_type") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_type" class="form-group vgaji_guru_sma_type">
<span<?php echo $vgaji_guru_sma_grid->type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->type->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_type" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_type" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_type" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->jenis_guru->Visible) { // jenis_guru ?>
		<td data-name="jenis_guru">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_jenis_guru" class="form-group vgaji_guru_sma_jenis_guru">
<?php
$onchange = $vgaji_guru_sma_grid->jenis_guru->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$vgaji_guru_sma_grid->jenis_guru->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru">
	<input type="text" class="form-control" name="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" id="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" value="<?php echo RemoveHtml($vgaji_guru_sma_grid->jenis_guru->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->getPlaceHolder()) ?>"<?php echo $vgaji_guru_sma_grid->jenis_guru->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenis_guru" data-value-separator="<?php echo $vgaji_guru_sma_grid->jenis_guru->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fvgaji_guru_smagrid"], function() {
	fvgaji_guru_smagrid.createAutoSuggest({"id":"x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru","forceSelect":false});
});
</script>
<?php echo $vgaji_guru_sma_grid->jenis_guru->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_jenis_guru") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_jenis_guru" class="form-group vgaji_guru_sma_jenis_guru">
<span<?php echo $vgaji_guru_sma_grid->jenis_guru->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->jenis_guru->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenis_guru" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jenis_guru" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jenis_guru" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jenis_guru->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->tambahan->Visible) { // tambahan ?>
		<td data-name="tambahan">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_tambahan" class="form-group vgaji_guru_sma_tambahan">
<?php
$onchange = $vgaji_guru_sma_grid->tambahan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$vgaji_guru_sma_grid->tambahan->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan">
	<input type="text" class="form-control" name="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" id="sv_x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" value="<?php echo RemoveHtml($vgaji_guru_sma_grid->tambahan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->getPlaceHolder()) ?>"<?php echo $vgaji_guru_sma_grid->tambahan->editAttributes() ?>>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tambahan" data-value-separator="<?php echo $vgaji_guru_sma_grid->tambahan->displayValueSeparatorAttribute() ?>" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fvgaji_guru_smagrid"], function() {
	fvgaji_guru_smagrid.createAutoSuggest({"id":"x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan","forceSelect":false});
});
</script>
<?php echo $vgaji_guru_sma_grid->tambahan->Lookup->getParamTag($vgaji_guru_sma_grid, "p_x" . $vgaji_guru_sma_grid->RowIndex . "_tambahan") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_tambahan" class="form-group vgaji_guru_sma_tambahan">
<span<?php echo $vgaji_guru_sma_grid->tambahan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->tambahan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tambahan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tambahan" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tambahan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->periode->Visible) { // periode ?>
		<td data-name="periode">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_periode" class="form-group vgaji_guru_sma_periode">
<input type="text" data-table="vgaji_guru_sma" data-field="x_periode" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->periode->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->periode->EditValue ?>"<?php echo $vgaji_guru_sma_grid->periode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_periode" class="form-group vgaji_guru_sma_periode">
<span<?php echo $vgaji_guru_sma_grid->periode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->periode->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_periode" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->periode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_periode" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_periode" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->periode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->tunjangan_periode->Visible) { // tunjangan_periode ?>
		<td data-name="tunjangan_periode">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_tunjangan_periode" class="form-group vgaji_guru_sma_tunjangan_periode">
<input type="text" data-table="vgaji_guru_sma" data-field="x_tunjangan_periode" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->tunjangan_periode->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->tunjangan_periode->EditValue ?>"<?php echo $vgaji_guru_sma_grid->tunjangan_periode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_tunjangan_periode" class="form-group vgaji_guru_sma_tunjangan_periode">
<span<?php echo $vgaji_guru_sma_grid->tunjangan_periode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->tunjangan_periode->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tunjangan_periode" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tunjangan_periode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tunjangan_periode" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tunjangan_periode" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tunjangan_periode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->kehadiran->Visible) { // kehadiran ?>
		<td data-name="kehadiran">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_kehadiran" class="form-group vgaji_guru_sma_kehadiran">
<input type="text" data-table="vgaji_guru_sma" data-field="x_kehadiran" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->kehadiran->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->kehadiran->EditValue ?>"<?php echo $vgaji_guru_sma_grid->kehadiran->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_kehadiran" class="form-group vgaji_guru_sma_kehadiran">
<span<?php echo $vgaji_guru_sma_grid->kehadiran->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->kehadiran->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_kehadiran" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->kehadiran->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_kehadiran" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_kehadiran" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->kehadiran->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->value_kehadiran->Visible) { // value_kehadiran ?>
		<td data-name="value_kehadiran">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_value_kehadiran" class="form-group vgaji_guru_sma_value_kehadiran">
<input type="text" data-table="vgaji_guru_sma" data-field="x_value_kehadiran" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_kehadiran->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->value_kehadiran->EditValue ?>"<?php echo $vgaji_guru_sma_grid->value_kehadiran->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_value_kehadiran" class="form-group vgaji_guru_sma_value_kehadiran">
<span<?php echo $vgaji_guru_sma_grid->value_kehadiran->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->value_kehadiran->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_kehadiran" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_kehadiran->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_kehadiran" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_kehadiran" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_kehadiran->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->lembur->Visible) { // lembur ?>
		<td data-name="lembur">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_lembur" class="form-group vgaji_guru_sma_lembur">
<input type="text" data-table="vgaji_guru_sma" data-field="x_lembur" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->lembur->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->lembur->EditValue ?>"<?php echo $vgaji_guru_sma_grid->lembur->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_lembur" class="form-group vgaji_guru_sma_lembur">
<span<?php echo $vgaji_guru_sma_grid->lembur->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->lembur->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_lembur" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->lembur->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_lembur" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_lembur" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->lembur->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->value_lembur->Visible) { // value_lembur ?>
		<td data-name="value_lembur">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_value_lembur" class="form-group vgaji_guru_sma_value_lembur">
<input type="text" data-table="vgaji_guru_sma" data-field="x_value_lembur" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_lembur->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->value_lembur->EditValue ?>"<?php echo $vgaji_guru_sma_grid->value_lembur->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_value_lembur" class="form-group vgaji_guru_sma_value_lembur">
<span<?php echo $vgaji_guru_sma_grid->value_lembur->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->value_lembur->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_lembur" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_lembur->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_lembur" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_lembur" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_lembur->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->jp->Visible) { // jp ?>
		<td data-name="jp">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_jp" class="form-group vgaji_guru_sma_jp">
<input type="text" data-table="vgaji_guru_sma" data-field="x_jp" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->jp->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->jp->EditValue ?>"<?php echo $vgaji_guru_sma_grid->jp->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_jp" class="form-group vgaji_guru_sma_jp">
<span<?php echo $vgaji_guru_sma_grid->jp->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->jp->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jp" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jp->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_jp" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_jp" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->jp->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->gapok->Visible) { // gapok ?>
		<td data-name="gapok">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_gapok" class="form-group vgaji_guru_sma_gapok">
<input type="text" data-table="vgaji_guru_sma" data-field="x_gapok" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->gapok->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->gapok->EditValue ?>"<?php echo $vgaji_guru_sma_grid->gapok->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_gapok" class="form-group vgaji_guru_sma_gapok">
<span<?php echo $vgaji_guru_sma_grid->gapok->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->gapok->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_gapok" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->gapok->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_gapok" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_gapok" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->gapok->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->total_gapok->Visible) { // total_gapok ?>
		<td data-name="total_gapok">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_total_gapok" class="form-group vgaji_guru_sma_total_gapok">
<input type="text" data-table="vgaji_guru_sma" data-field="x_total_gapok" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->total_gapok->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->total_gapok->EditValue ?>"<?php echo $vgaji_guru_sma_grid->total_gapok->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_total_gapok" class="form-group vgaji_guru_sma_total_gapok">
<span<?php echo $vgaji_guru_sma_grid->total_gapok->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->total_gapok->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_total_gapok" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->total_gapok->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_total_gapok" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total_gapok" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->total_gapok->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->value_reward->Visible) { // value_reward ?>
		<td data-name="value_reward">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_value_reward" class="form-group vgaji_guru_sma_value_reward">
<input type="text" data-table="vgaji_guru_sma" data-field="x_value_reward" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_reward->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->value_reward->EditValue ?>"<?php echo $vgaji_guru_sma_grid->value_reward->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_value_reward" class="form-group vgaji_guru_sma_value_reward">
<span<?php echo $vgaji_guru_sma_grid->value_reward->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->value_reward->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_reward" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_reward->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_reward" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_reward" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_reward->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->value_inval->Visible) { // value_inval ?>
		<td data-name="value_inval">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_value_inval" class="form-group vgaji_guru_sma_value_inval">
<input type="text" data-table="vgaji_guru_sma" data-field="x_value_inval" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_inval->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->value_inval->EditValue ?>"<?php echo $vgaji_guru_sma_grid->value_inval->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_value_inval" class="form-group vgaji_guru_sma_value_inval">
<span<?php echo $vgaji_guru_sma_grid->value_inval->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->value_inval->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_inval" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_inval->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_inval" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_inval" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_inval->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->piket_count->Visible) { // piket_count ?>
		<td data-name="piket_count">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_piket_count" class="form-group vgaji_guru_sma_piket_count">
<input type="text" data-table="vgaji_guru_sma" data-field="x_piket_count" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->piket_count->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->piket_count->EditValue ?>"<?php echo $vgaji_guru_sma_grid->piket_count->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_piket_count" class="form-group vgaji_guru_sma_piket_count">
<span<?php echo $vgaji_guru_sma_grid->piket_count->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->piket_count->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_piket_count" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->piket_count->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_piket_count" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_piket_count" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->piket_count->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->value_piket->Visible) { // value_piket ?>
		<td data-name="value_piket">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_value_piket" class="form-group vgaji_guru_sma_value_piket">
<input type="text" data-table="vgaji_guru_sma" data-field="x_value_piket" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_piket->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->value_piket->EditValue ?>"<?php echo $vgaji_guru_sma_grid->value_piket->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_value_piket" class="form-group vgaji_guru_sma_value_piket">
<span<?php echo $vgaji_guru_sma_grid->value_piket->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->value_piket->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_piket" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_piket->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_value_piket" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_value_piket" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->value_piket->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->tugastambahan->Visible) { // tugastambahan ?>
		<td data-name="tugastambahan">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_tugastambahan" class="form-group vgaji_guru_sma_tugastambahan">
<input type="text" data-table="vgaji_guru_sma" data-field="x_tugastambahan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->tugastambahan->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->tugastambahan->EditValue ?>"<?php echo $vgaji_guru_sma_grid->tugastambahan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_tugastambahan" class="form-group vgaji_guru_sma_tugastambahan">
<span<?php echo $vgaji_guru_sma_grid->tugastambahan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->tugastambahan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tugastambahan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tugastambahan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tugastambahan" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tugastambahan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tugastambahan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->tj_jabatan->Visible) { // tj_jabatan ?>
		<td data-name="tj_jabatan">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_tj_jabatan" class="form-group vgaji_guru_sma_tj_jabatan">
<input type="text" data-table="vgaji_guru_sma" data-field="x_tj_jabatan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->tj_jabatan->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->tj_jabatan->EditValue ?>"<?php echo $vgaji_guru_sma_grid->tj_jabatan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_tj_jabatan" class="form-group vgaji_guru_sma_tj_jabatan">
<span<?php echo $vgaji_guru_sma_grid->tj_jabatan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->tj_jabatan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tj_jabatan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tj_jabatan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_tj_jabatan" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_tj_jabatan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->tj_jabatan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->sub_total->Visible) { // sub_total ?>
		<td data-name="sub_total">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_sub_total" class="form-group vgaji_guru_sma_sub_total">
<input type="text" data-table="vgaji_guru_sma" data-field="x_sub_total" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->sub_total->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->sub_total->EditValue ?>"<?php echo $vgaji_guru_sma_grid->sub_total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_sub_total" class="form-group vgaji_guru_sma_sub_total">
<span<?php echo $vgaji_guru_sma_grid->sub_total->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->sub_total->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_sub_total" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->sub_total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_sub_total" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_sub_total" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->sub_total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->potongan->Visible) { // potongan ?>
		<td data-name="potongan">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_potongan" class="form-group vgaji_guru_sma_potongan">
<input type="text" data-table="vgaji_guru_sma" data-field="x_potongan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->potongan->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->potongan->EditValue ?>"<?php echo $vgaji_guru_sma_grid->potongan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_potongan" class="form-group vgaji_guru_sma_potongan">
<span<?php echo $vgaji_guru_sma_grid->potongan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->potongan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_potongan" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->potongan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_potongan" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_potongan" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->potongan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->penyesuaian->Visible) { // penyesuaian ?>
		<td data-name="penyesuaian">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_penyesuaian" class="form-group vgaji_guru_sma_penyesuaian">
<input type="text" data-table="vgaji_guru_sma" data-field="x_penyesuaian" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->penyesuaian->EditValue ?>"<?php echo $vgaji_guru_sma_grid->penyesuaian->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_penyesuaian" class="form-group vgaji_guru_sma_penyesuaian">
<span<?php echo $vgaji_guru_sma_grid->penyesuaian->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->penyesuaian->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_penyesuaian" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->penyesuaian->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_penyesuaian" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_penyesuaian" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->penyesuaian->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->total->Visible) { // total ?>
		<td data-name="total">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_total" class="form-group vgaji_guru_sma_total">
<input type="text" data-table="vgaji_guru_sma" data-field="x_total" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->total->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->total->EditValue ?>"<?php echo $vgaji_guru_sma_grid->total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_total" class="form-group vgaji_guru_sma_total">
<span<?php echo $vgaji_guru_sma_grid->total->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->total->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_total" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_total" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_total" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->voucher->Visible) { // voucher ?>
		<td data-name="voucher">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<span id="el$rowindex$_vgaji_guru_sma_voucher" class="form-group vgaji_guru_sma_voucher">
<input type="text" data-table="vgaji_guru_sma" data-field="x_voucher" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->voucher->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->voucher->EditValue ?>"<?php echo $vgaji_guru_sma_grid->voucher->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_voucher" class="form-group vgaji_guru_sma_voucher">
<span<?php echo $vgaji_guru_sma_grid->voucher->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->voucher->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_voucher" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->voucher->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_voucher" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_voucher" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->voucher->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vgaji_guru_sma_grid->pid->Visible) { // pid ?>
		<td data-name="pid">
<?php if (!$vgaji_guru_sma->isConfirm()) { ?>
<?php if ($vgaji_guru_sma_grid->pid->getSessionValue() != "") { ?>
<span id="el$rowindex$_vgaji_guru_sma_pid" class="form-group vgaji_guru_sma_pid">
<span<?php echo $vgaji_guru_sma_grid->pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_pid" class="form-group vgaji_guru_sma_pid">
<input type="text" data-table="vgaji_guru_sma" data-field="x_pid" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($vgaji_guru_sma_grid->pid->getPlaceHolder()) ?>" value="<?php echo $vgaji_guru_sma_grid->pid->EditValue ?>"<?php echo $vgaji_guru_sma_grid->pid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_vgaji_guru_sma_pid" class="form-group vgaji_guru_sma_pid">
<span<?php echo $vgaji_guru_sma_grid->pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vgaji_guru_sma_grid->pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pid" name="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" id="x<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vgaji_guru_sma" data-field="x_pid" name="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" id="o<?php echo $vgaji_guru_sma_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($vgaji_guru_sma_grid->pid->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vgaji_guru_sma_grid->ListOptions->render("body", "right", $vgaji_guru_sma_grid->RowIndex);
?>
<script>
loadjs.ready(["fvgaji_guru_smagrid", "load"], function() {
	fvgaji_guru_smagrid.updateLists(<?php echo $vgaji_guru_sma_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($vgaji_guru_sma->CurrentMode == "add" || $vgaji_guru_sma->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $vgaji_guru_sma_grid->FormKeyCountName ?>" id="<?php echo $vgaji_guru_sma_grid->FormKeyCountName ?>" value="<?php echo $vgaji_guru_sma_grid->KeyCount ?>">
<?php echo $vgaji_guru_sma_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($vgaji_guru_sma->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $vgaji_guru_sma_grid->FormKeyCountName ?>" id="<?php echo $vgaji_guru_sma_grid->FormKeyCountName ?>" value="<?php echo $vgaji_guru_sma_grid->KeyCount ?>">
<?php echo $vgaji_guru_sma_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($vgaji_guru_sma->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fvgaji_guru_smagrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vgaji_guru_sma_grid->Recordset)
	$vgaji_guru_sma_grid->Recordset->Close();
?>
<?php if ($vgaji_guru_sma_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $vgaji_guru_sma_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vgaji_guru_sma_grid->TotalRecords == 0 && !$vgaji_guru_sma->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vgaji_guru_sma_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$vgaji_guru_sma_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$vgaji_guru_sma_grid->terminate();
?>