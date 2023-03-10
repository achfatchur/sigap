<?php
namespace PHPMaker2020\sigap;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$gaji_karyawan_sd_add = new gaji_karyawan_sd_add();

// Run the page
$gaji_karyawan_sd_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_karyawan_sd_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fgaji_karyawan_sdadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fgaji_karyawan_sdadd = currentForm = new ew.Form("fgaji_karyawan_sdadd", "add");

	// Validate form
	fgaji_karyawan_sdadd.validate = function() {
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
			<?php if ($gaji_karyawan_sd_add->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_karyawan_sd_add->tahun->caption(), $gaji_karyawan_sd_add->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_karyawan_sd_add->tahun->errorMessage()) ?>");
			<?php if ($gaji_karyawan_sd_add->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_karyawan_sd_add->bulan->caption(), $gaji_karyawan_sd_add->bulan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_karyawan_sd_add->bulan->errorMessage()) ?>");
			<?php if ($gaji_karyawan_sd_add->pegawai->Required) { ?>
				elm = this.getElements("x" + infix + "_pegawai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_karyawan_sd_add->pegawai->caption(), $gaji_karyawan_sd_add->pegawai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($gaji_karyawan_sd_add->jenjang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_karyawan_sd_add->jenjang_id->caption(), $gaji_karyawan_sd_add->jenjang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_karyawan_sd_add->jenjang_id->errorMessage()) ?>");
			<?php if ($gaji_karyawan_sd_add->jabatan_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jabatan_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_karyawan_sd_add->jabatan_id->caption(), $gaji_karyawan_sd_add->jabatan_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jabatan_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_karyawan_sd_add->jabatan_id->errorMessage()) ?>");
			<?php if ($gaji_karyawan_sd_add->kehadiran->Required) { ?>
				elm = this.getElements("x" + infix + "_kehadiran");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_karyawan_sd_add->kehadiran->caption(), $gaji_karyawan_sd_add->kehadiran->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_kehadiran");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_karyawan_sd_add->kehadiran->errorMessage()) ?>");
			<?php if ($gaji_karyawan_sd_add->value_kehadiran->Required) { ?>
				elm = this.getElements("x" + infix + "_value_kehadiran");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_karyawan_sd_add->value_kehadiran->caption(), $gaji_karyawan_sd_add->value_kehadiran->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_kehadiran");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_karyawan_sd_add->value_kehadiran->errorMessage()) ?>");
			<?php if ($gaji_karyawan_sd_add->gapok->Required) { ?>
				elm = this.getElements("x" + infix + "_gapok");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_karyawan_sd_add->gapok->caption(), $gaji_karyawan_sd_add->gapok->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_gapok");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_karyawan_sd_add->gapok->errorMessage()) ?>");
			<?php if ($gaji_karyawan_sd_add->value_reward->Required) { ?>
				elm = this.getElements("x" + infix + "_value_reward");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_karyawan_sd_add->value_reward->caption(), $gaji_karyawan_sd_add->value_reward->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_reward");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_karyawan_sd_add->value_reward->errorMessage()) ?>");
			<?php if ($gaji_karyawan_sd_add->value_inval->Required) { ?>
				elm = this.getElements("x" + infix + "_value_inval");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_karyawan_sd_add->value_inval->caption(), $gaji_karyawan_sd_add->value_inval->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_inval");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_karyawan_sd_add->value_inval->errorMessage()) ?>");
			<?php if ($gaji_karyawan_sd_add->sub_total->Required) { ?>
				elm = this.getElements("x" + infix + "_sub_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_karyawan_sd_add->sub_total->caption(), $gaji_karyawan_sd_add->sub_total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sub_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_karyawan_sd_add->sub_total->errorMessage()) ?>");
			<?php if ($gaji_karyawan_sd_add->potongan->Required) { ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_karyawan_sd_add->potongan->caption(), $gaji_karyawan_sd_add->potongan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_karyawan_sd_add->potongan->errorMessage()) ?>");
			<?php if ($gaji_karyawan_sd_add->penyesuaian->Required) { ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_karyawan_sd_add->penyesuaian->caption(), $gaji_karyawan_sd_add->penyesuaian->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_karyawan_sd_add->penyesuaian->errorMessage()) ?>");
			<?php if ($gaji_karyawan_sd_add->total->Required) { ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_karyawan_sd_add->total->caption(), $gaji_karyawan_sd_add->total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_karyawan_sd_add->total->errorMessage()) ?>");
			<?php if ($gaji_karyawan_sd_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_karyawan_sd_add->status->caption(), $gaji_karyawan_sd_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_karyawan_sd_add->status->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fgaji_karyawan_sdadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fgaji_karyawan_sdadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fgaji_karyawan_sdadd.lists["x_pegawai"] = <?php echo $gaji_karyawan_sd_add->pegawai->Lookup->toClientList($gaji_karyawan_sd_add) ?>;
	fgaji_karyawan_sdadd.lists["x_pegawai"].options = <?php echo JsonEncode($gaji_karyawan_sd_add->pegawai->lookupOptions()) ?>;
	fgaji_karyawan_sdadd.lists["x_jenjang_id"] = <?php echo $gaji_karyawan_sd_add->jenjang_id->Lookup->toClientList($gaji_karyawan_sd_add) ?>;
	fgaji_karyawan_sdadd.lists["x_jenjang_id"].options = <?php echo JsonEncode($gaji_karyawan_sd_add->jenjang_id->lookupOptions()) ?>;
	fgaji_karyawan_sdadd.autoSuggests["x_jenjang_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fgaji_karyawan_sdadd.lists["x_jabatan_id"] = <?php echo $gaji_karyawan_sd_add->jabatan_id->Lookup->toClientList($gaji_karyawan_sd_add) ?>;
	fgaji_karyawan_sdadd.lists["x_jabatan_id"].options = <?php echo JsonEncode($gaji_karyawan_sd_add->jabatan_id->lookupOptions()) ?>;
	fgaji_karyawan_sdadd.autoSuggests["x_jabatan_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fgaji_karyawan_sdadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $gaji_karyawan_sd_add->showPageHeader(); ?>
<?php
$gaji_karyawan_sd_add->showMessage();
?>
<form name="fgaji_karyawan_sdadd" id="fgaji_karyawan_sdadd" class="<?php echo $gaji_karyawan_sd_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="gaji_karyawan_sd">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$gaji_karyawan_sd_add->IsModal ?>">
<?php if ($gaji_karyawan_sd->getCurrentMasterTable() == "m_karyawan_sd") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="m_karyawan_sd">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($gaji_karyawan_sd_add->pid->getSessionValue()) ?>">
<input type="hidden" name="fk_tahun" value="<?php echo HtmlEncode($gaji_karyawan_sd_add->tahun->getSessionValue()) ?>">
<input type="hidden" name="fk_bulan" value="<?php echo HtmlEncode($gaji_karyawan_sd_add->bulan->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($gaji_karyawan_sd_add->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_gaji_karyawan_sd_tahun" for="x_tahun" class="<?php echo $gaji_karyawan_sd_add->LeftColumnClass ?>"><?php echo $gaji_karyawan_sd_add->tahun->caption() ?><?php echo $gaji_karyawan_sd_add->tahun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_karyawan_sd_add->RightColumnClass ?>"><div <?php echo $gaji_karyawan_sd_add->tahun->cellAttributes() ?>>
<?php if ($gaji_karyawan_sd_add->tahun->getSessionValue() != "") { ?>
<span id="el_gaji_karyawan_sd_tahun">
<span<?php echo $gaji_karyawan_sd_add->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_karyawan_sd_add->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_tahun" name="x_tahun" value="<?php echo HtmlEncode($gaji_karyawan_sd_add->tahun->CurrentValue) ?>">
<?php } else { ?>
<span id="el_gaji_karyawan_sd_tahun">
<input type="text" data-table="gaji_karyawan_sd" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->tahun->getPlaceHolder()) ?>" value="<?php echo $gaji_karyawan_sd_add->tahun->EditValue ?>"<?php echo $gaji_karyawan_sd_add->tahun->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $gaji_karyawan_sd_add->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_karyawan_sd_add->bulan->Visible) { // bulan ?>
	<div id="r_bulan" class="form-group row">
		<label id="elh_gaji_karyawan_sd_bulan" for="x_bulan" class="<?php echo $gaji_karyawan_sd_add->LeftColumnClass ?>"><?php echo $gaji_karyawan_sd_add->bulan->caption() ?><?php echo $gaji_karyawan_sd_add->bulan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_karyawan_sd_add->RightColumnClass ?>"><div <?php echo $gaji_karyawan_sd_add->bulan->cellAttributes() ?>>
<?php if ($gaji_karyawan_sd_add->bulan->getSessionValue() != "") { ?>
<span id="el_gaji_karyawan_sd_bulan">
<span<?php echo $gaji_karyawan_sd_add->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_karyawan_sd_add->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_bulan" name="x_bulan" value="<?php echo HtmlEncode($gaji_karyawan_sd_add->bulan->CurrentValue) ?>">
<?php } else { ?>
<span id="el_gaji_karyawan_sd_bulan">
<input type="text" data-table="gaji_karyawan_sd" data-field="x_bulan" name="x_bulan" id="x_bulan" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->bulan->getPlaceHolder()) ?>" value="<?php echo $gaji_karyawan_sd_add->bulan->EditValue ?>"<?php echo $gaji_karyawan_sd_add->bulan->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $gaji_karyawan_sd_add->bulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_karyawan_sd_add->pegawai->Visible) { // pegawai ?>
	<div id="r_pegawai" class="form-group row">
		<label id="elh_gaji_karyawan_sd_pegawai" for="x_pegawai" class="<?php echo $gaji_karyawan_sd_add->LeftColumnClass ?>"><?php echo $gaji_karyawan_sd_add->pegawai->caption() ?><?php echo $gaji_karyawan_sd_add->pegawai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_karyawan_sd_add->RightColumnClass ?>"><div <?php echo $gaji_karyawan_sd_add->pegawai->cellAttributes() ?>>
<span id="el_gaji_karyawan_sd_pegawai">
<?php $gaji_karyawan_sd_add->pegawai->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_pegawai"><?php echo EmptyValue(strval($gaji_karyawan_sd_add->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $gaji_karyawan_sd_add->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($gaji_karyawan_sd_add->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($gaji_karyawan_sd_add->pegawai->ReadOnly || $gaji_karyawan_sd_add->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $gaji_karyawan_sd_add->pegawai->Lookup->getParamTag($gaji_karyawan_sd_add, "p_x_pegawai") ?>
<input type="hidden" data-table="gaji_karyawan_sd" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $gaji_karyawan_sd_add->pegawai->displayValueSeparatorAttribute() ?>" name="x_pegawai" id="x_pegawai" value="<?php echo $gaji_karyawan_sd_add->pegawai->CurrentValue ?>"<?php echo $gaji_karyawan_sd_add->pegawai->editAttributes() ?>>
</span>
<?php echo $gaji_karyawan_sd_add->pegawai->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_karyawan_sd_add->jenjang_id->Visible) { // jenjang_id ?>
	<div id="r_jenjang_id" class="form-group row">
		<label id="elh_gaji_karyawan_sd_jenjang_id" class="<?php echo $gaji_karyawan_sd_add->LeftColumnClass ?>"><?php echo $gaji_karyawan_sd_add->jenjang_id->caption() ?><?php echo $gaji_karyawan_sd_add->jenjang_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_karyawan_sd_add->RightColumnClass ?>"><div <?php echo $gaji_karyawan_sd_add->jenjang_id->cellAttributes() ?>>
<span id="el_gaji_karyawan_sd_jenjang_id">
<?php
$onchange = $gaji_karyawan_sd_add->jenjang_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$gaji_karyawan_sd_add->jenjang_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_jenjang_id">
	<input type="text" class="form-control" name="sv_x_jenjang_id" id="sv_x_jenjang_id" value="<?php echo RemoveHtml($gaji_karyawan_sd_add->jenjang_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->jenjang_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->jenjang_id->getPlaceHolder()) ?>"<?php echo $gaji_karyawan_sd_add->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_karyawan_sd" data-field="x_jenjang_id" data-value-separator="<?php echo $gaji_karyawan_sd_add->jenjang_id->displayValueSeparatorAttribute() ?>" name="x_jenjang_id" id="x_jenjang_id" value="<?php echo HtmlEncode($gaji_karyawan_sd_add->jenjang_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fgaji_karyawan_sdadd"], function() {
	fgaji_karyawan_sdadd.createAutoSuggest({"id":"x_jenjang_id","forceSelect":false});
});
</script>
<?php echo $gaji_karyawan_sd_add->jenjang_id->Lookup->getParamTag($gaji_karyawan_sd_add, "p_x_jenjang_id") ?>
</span>
<?php echo $gaji_karyawan_sd_add->jenjang_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_karyawan_sd_add->jabatan_id->Visible) { // jabatan_id ?>
	<div id="r_jabatan_id" class="form-group row">
		<label id="elh_gaji_karyawan_sd_jabatan_id" class="<?php echo $gaji_karyawan_sd_add->LeftColumnClass ?>"><?php echo $gaji_karyawan_sd_add->jabatan_id->caption() ?><?php echo $gaji_karyawan_sd_add->jabatan_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_karyawan_sd_add->RightColumnClass ?>"><div <?php echo $gaji_karyawan_sd_add->jabatan_id->cellAttributes() ?>>
<span id="el_gaji_karyawan_sd_jabatan_id">
<?php
$onchange = $gaji_karyawan_sd_add->jabatan_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$gaji_karyawan_sd_add->jabatan_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_jabatan_id">
	<input type="text" class="form-control" name="sv_x_jabatan_id" id="sv_x_jabatan_id" value="<?php echo RemoveHtml($gaji_karyawan_sd_add->jabatan_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->jabatan_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->jabatan_id->getPlaceHolder()) ?>"<?php echo $gaji_karyawan_sd_add->jabatan_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_karyawan_sd" data-field="x_jabatan_id" data-value-separator="<?php echo $gaji_karyawan_sd_add->jabatan_id->displayValueSeparatorAttribute() ?>" name="x_jabatan_id" id="x_jabatan_id" value="<?php echo HtmlEncode($gaji_karyawan_sd_add->jabatan_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fgaji_karyawan_sdadd"], function() {
	fgaji_karyawan_sdadd.createAutoSuggest({"id":"x_jabatan_id","forceSelect":false});
});
</script>
<?php echo $gaji_karyawan_sd_add->jabatan_id->Lookup->getParamTag($gaji_karyawan_sd_add, "p_x_jabatan_id") ?>
</span>
<?php echo $gaji_karyawan_sd_add->jabatan_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_karyawan_sd_add->kehadiran->Visible) { // kehadiran ?>
	<div id="r_kehadiran" class="form-group row">
		<label id="elh_gaji_karyawan_sd_kehadiran" for="x_kehadiran" class="<?php echo $gaji_karyawan_sd_add->LeftColumnClass ?>"><?php echo $gaji_karyawan_sd_add->kehadiran->caption() ?><?php echo $gaji_karyawan_sd_add->kehadiran->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_karyawan_sd_add->RightColumnClass ?>"><div <?php echo $gaji_karyawan_sd_add->kehadiran->cellAttributes() ?>>
<span id="el_gaji_karyawan_sd_kehadiran">
<input type="text" data-table="gaji_karyawan_sd" data-field="x_kehadiran" name="x_kehadiran" id="x_kehadiran" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->kehadiran->getPlaceHolder()) ?>" value="<?php echo $gaji_karyawan_sd_add->kehadiran->EditValue ?>"<?php echo $gaji_karyawan_sd_add->kehadiran->editAttributes() ?>>
</span>
<?php echo $gaji_karyawan_sd_add->kehadiran->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_karyawan_sd_add->value_kehadiran->Visible) { // value_kehadiran ?>
	<div id="r_value_kehadiran" class="form-group row">
		<label id="elh_gaji_karyawan_sd_value_kehadiran" for="x_value_kehadiran" class="<?php echo $gaji_karyawan_sd_add->LeftColumnClass ?>"><?php echo $gaji_karyawan_sd_add->value_kehadiran->caption() ?><?php echo $gaji_karyawan_sd_add->value_kehadiran->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_karyawan_sd_add->RightColumnClass ?>"><div <?php echo $gaji_karyawan_sd_add->value_kehadiran->cellAttributes() ?>>
<span id="el_gaji_karyawan_sd_value_kehadiran">
<input type="text" data-table="gaji_karyawan_sd" data-field="x_value_kehadiran" name="x_value_kehadiran" id="x_value_kehadiran" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->value_kehadiran->getPlaceHolder()) ?>" value="<?php echo $gaji_karyawan_sd_add->value_kehadiran->EditValue ?>"<?php echo $gaji_karyawan_sd_add->value_kehadiran->editAttributes() ?>>
</span>
<?php echo $gaji_karyawan_sd_add->value_kehadiran->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_karyawan_sd_add->gapok->Visible) { // gapok ?>
	<div id="r_gapok" class="form-group row">
		<label id="elh_gaji_karyawan_sd_gapok" for="x_gapok" class="<?php echo $gaji_karyawan_sd_add->LeftColumnClass ?>"><?php echo $gaji_karyawan_sd_add->gapok->caption() ?><?php echo $gaji_karyawan_sd_add->gapok->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_karyawan_sd_add->RightColumnClass ?>"><div <?php echo $gaji_karyawan_sd_add->gapok->cellAttributes() ?>>
<span id="el_gaji_karyawan_sd_gapok">
<input type="text" data-table="gaji_karyawan_sd" data-field="x_gapok" name="x_gapok" id="x_gapok" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->gapok->getPlaceHolder()) ?>" value="<?php echo $gaji_karyawan_sd_add->gapok->EditValue ?>"<?php echo $gaji_karyawan_sd_add->gapok->editAttributes() ?>>
</span>
<?php echo $gaji_karyawan_sd_add->gapok->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_karyawan_sd_add->value_reward->Visible) { // value_reward ?>
	<div id="r_value_reward" class="form-group row">
		<label id="elh_gaji_karyawan_sd_value_reward" for="x_value_reward" class="<?php echo $gaji_karyawan_sd_add->LeftColumnClass ?>"><?php echo $gaji_karyawan_sd_add->value_reward->caption() ?><?php echo $gaji_karyawan_sd_add->value_reward->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_karyawan_sd_add->RightColumnClass ?>"><div <?php echo $gaji_karyawan_sd_add->value_reward->cellAttributes() ?>>
<span id="el_gaji_karyawan_sd_value_reward">
<input type="text" data-table="gaji_karyawan_sd" data-field="x_value_reward" name="x_value_reward" id="x_value_reward" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->value_reward->getPlaceHolder()) ?>" value="<?php echo $gaji_karyawan_sd_add->value_reward->EditValue ?>"<?php echo $gaji_karyawan_sd_add->value_reward->editAttributes() ?>>
</span>
<?php echo $gaji_karyawan_sd_add->value_reward->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_karyawan_sd_add->value_inval->Visible) { // value_inval ?>
	<div id="r_value_inval" class="form-group row">
		<label id="elh_gaji_karyawan_sd_value_inval" for="x_value_inval" class="<?php echo $gaji_karyawan_sd_add->LeftColumnClass ?>"><?php echo $gaji_karyawan_sd_add->value_inval->caption() ?><?php echo $gaji_karyawan_sd_add->value_inval->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_karyawan_sd_add->RightColumnClass ?>"><div <?php echo $gaji_karyawan_sd_add->value_inval->cellAttributes() ?>>
<span id="el_gaji_karyawan_sd_value_inval">
<input type="text" data-table="gaji_karyawan_sd" data-field="x_value_inval" name="x_value_inval" id="x_value_inval" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->value_inval->getPlaceHolder()) ?>" value="<?php echo $gaji_karyawan_sd_add->value_inval->EditValue ?>"<?php echo $gaji_karyawan_sd_add->value_inval->editAttributes() ?>>
</span>
<?php echo $gaji_karyawan_sd_add->value_inval->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_karyawan_sd_add->sub_total->Visible) { // sub_total ?>
	<div id="r_sub_total" class="form-group row">
		<label id="elh_gaji_karyawan_sd_sub_total" for="x_sub_total" class="<?php echo $gaji_karyawan_sd_add->LeftColumnClass ?>"><?php echo $gaji_karyawan_sd_add->sub_total->caption() ?><?php echo $gaji_karyawan_sd_add->sub_total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_karyawan_sd_add->RightColumnClass ?>"><div <?php echo $gaji_karyawan_sd_add->sub_total->cellAttributes() ?>>
<span id="el_gaji_karyawan_sd_sub_total">
<input type="text" data-table="gaji_karyawan_sd" data-field="x_sub_total" name="x_sub_total" id="x_sub_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->sub_total->getPlaceHolder()) ?>" value="<?php echo $gaji_karyawan_sd_add->sub_total->EditValue ?>"<?php echo $gaji_karyawan_sd_add->sub_total->editAttributes() ?>>
</span>
<?php echo $gaji_karyawan_sd_add->sub_total->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_karyawan_sd_add->potongan->Visible) { // potongan ?>
	<div id="r_potongan" class="form-group row">
		<label id="elh_gaji_karyawan_sd_potongan" for="x_potongan" class="<?php echo $gaji_karyawan_sd_add->LeftColumnClass ?>"><?php echo $gaji_karyawan_sd_add->potongan->caption() ?><?php echo $gaji_karyawan_sd_add->potongan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_karyawan_sd_add->RightColumnClass ?>"><div <?php echo $gaji_karyawan_sd_add->potongan->cellAttributes() ?>>
<span id="el_gaji_karyawan_sd_potongan">
<input type="text" data-table="gaji_karyawan_sd" data-field="x_potongan" name="x_potongan" id="x_potongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->potongan->getPlaceHolder()) ?>" value="<?php echo $gaji_karyawan_sd_add->potongan->EditValue ?>"<?php echo $gaji_karyawan_sd_add->potongan->editAttributes() ?>>
</span>
<?php echo $gaji_karyawan_sd_add->potongan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_karyawan_sd_add->penyesuaian->Visible) { // penyesuaian ?>
	<div id="r_penyesuaian" class="form-group row">
		<label id="elh_gaji_karyawan_sd_penyesuaian" for="x_penyesuaian" class="<?php echo $gaji_karyawan_sd_add->LeftColumnClass ?>"><?php echo $gaji_karyawan_sd_add->penyesuaian->caption() ?><?php echo $gaji_karyawan_sd_add->penyesuaian->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_karyawan_sd_add->RightColumnClass ?>"><div <?php echo $gaji_karyawan_sd_add->penyesuaian->cellAttributes() ?>>
<span id="el_gaji_karyawan_sd_penyesuaian">
<input type="text" data-table="gaji_karyawan_sd" data-field="x_penyesuaian" name="x_penyesuaian" id="x_penyesuaian" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $gaji_karyawan_sd_add->penyesuaian->EditValue ?>"<?php echo $gaji_karyawan_sd_add->penyesuaian->editAttributes() ?>>
</span>
<?php echo $gaji_karyawan_sd_add->penyesuaian->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_karyawan_sd_add->total->Visible) { // total ?>
	<div id="r_total" class="form-group row">
		<label id="elh_gaji_karyawan_sd_total" for="x_total" class="<?php echo $gaji_karyawan_sd_add->LeftColumnClass ?>"><?php echo $gaji_karyawan_sd_add->total->caption() ?><?php echo $gaji_karyawan_sd_add->total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_karyawan_sd_add->RightColumnClass ?>"><div <?php echo $gaji_karyawan_sd_add->total->cellAttributes() ?>>
<span id="el_gaji_karyawan_sd_total">
<input type="text" data-table="gaji_karyawan_sd" data-field="x_total" name="x_total" id="x_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->total->getPlaceHolder()) ?>" value="<?php echo $gaji_karyawan_sd_add->total->EditValue ?>"<?php echo $gaji_karyawan_sd_add->total->editAttributes() ?>>
</span>
<?php echo $gaji_karyawan_sd_add->total->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_karyawan_sd_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_gaji_karyawan_sd_status" for="x_status" class="<?php echo $gaji_karyawan_sd_add->LeftColumnClass ?>"><?php echo $gaji_karyawan_sd_add->status->caption() ?><?php echo $gaji_karyawan_sd_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_karyawan_sd_add->RightColumnClass ?>"><div <?php echo $gaji_karyawan_sd_add->status->cellAttributes() ?>>
<span id="el_gaji_karyawan_sd_status">
<input type="text" data-table="gaji_karyawan_sd" data-field="x_status" name="x_status" id="x_status" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($gaji_karyawan_sd_add->status->getPlaceHolder()) ?>" value="<?php echo $gaji_karyawan_sd_add->status->EditValue ?>"<?php echo $gaji_karyawan_sd_add->status->editAttributes() ?>>
</span>
<?php echo $gaji_karyawan_sd_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<?php if (strval($gaji_karyawan_sd_add->pid->getSessionValue()) != "") { ?>
	<input type="hidden" name="x_pid" id="x_pid" value="<?php echo HtmlEncode(strval($gaji_karyawan_sd_add->pid->getSessionValue())) ?>">
	<?php } ?>
<?php if (!$gaji_karyawan_sd_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $gaji_karyawan_sd_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $gaji_karyawan_sd_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$gaji_karyawan_sd_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$gaji_karyawan_sd_add->terminate();
?>