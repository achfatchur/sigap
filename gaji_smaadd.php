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
$gaji_sma_add = new gaji_sma_add();

// Run the page
$gaji_sma_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_sma_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fgaji_smaadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fgaji_smaadd = currentForm = new ew.Form("fgaji_smaadd", "add");

	// Validate form
	fgaji_smaadd.validate = function() {
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
			<?php if ($gaji_sma_add->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_add->tahun->caption(), $gaji_sma_add->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_sma_add->tahun->errorMessage()) ?>");
			<?php if ($gaji_sma_add->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_add->bulan->caption(), $gaji_sma_add->bulan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_sma_add->bulan->errorMessage()) ?>");
			<?php if ($gaji_sma_add->pegawai->Required) { ?>
				elm = this.getElements("x" + infix + "_pegawai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_add->pegawai->caption(), $gaji_sma_add->pegawai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($gaji_sma_add->jenjang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_add->jenjang_id->caption(), $gaji_sma_add->jenjang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_sma_add->jenjang_id->errorMessage()) ?>");
			<?php if ($gaji_sma_add->jabatan_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jabatan_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_add->jabatan_id->caption(), $gaji_sma_add->jabatan_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jabatan_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_sma_add->jabatan_id->errorMessage()) ?>");
			<?php if ($gaji_sma_add->penyesuaian->Required) { ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_add->penyesuaian->caption(), $gaji_sma_add->penyesuaian->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_sma_add->penyesuaian->errorMessage()) ?>");
			<?php if ($gaji_sma_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_add->status->caption(), $gaji_sma_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($gaji_sma_add->potongan_bendahara->Required) { ?>
				elm = this.getElements("x" + infix + "_potongan_bendahara");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_add->potongan_bendahara->caption(), $gaji_sma_add->potongan_bendahara->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($gaji_sma_add->voucher->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_add->voucher->caption(), $gaji_sma_add->voucher->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_sma_add->voucher->errorMessage()) ?>");

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
	fgaji_smaadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fgaji_smaadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fgaji_smaadd.lists["x_bulan"] = <?php echo $gaji_sma_add->bulan->Lookup->toClientList($gaji_sma_add) ?>;
	fgaji_smaadd.lists["x_bulan"].options = <?php echo JsonEncode($gaji_sma_add->bulan->lookupOptions()) ?>;
	fgaji_smaadd.autoSuggests["x_bulan"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fgaji_smaadd.lists["x_pegawai"] = <?php echo $gaji_sma_add->pegawai->Lookup->toClientList($gaji_sma_add) ?>;
	fgaji_smaadd.lists["x_pegawai"].options = <?php echo JsonEncode($gaji_sma_add->pegawai->lookupOptions()) ?>;
	fgaji_smaadd.lists["x_jenjang_id"] = <?php echo $gaji_sma_add->jenjang_id->Lookup->toClientList($gaji_sma_add) ?>;
	fgaji_smaadd.lists["x_jenjang_id"].options = <?php echo JsonEncode($gaji_sma_add->jenjang_id->lookupOptions()) ?>;
	fgaji_smaadd.autoSuggests["x_jenjang_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fgaji_smaadd.lists["x_jabatan_id"] = <?php echo $gaji_sma_add->jabatan_id->Lookup->toClientList($gaji_sma_add) ?>;
	fgaji_smaadd.lists["x_jabatan_id"].options = <?php echo JsonEncode($gaji_sma_add->jabatan_id->lookupOptions()) ?>;
	fgaji_smaadd.autoSuggests["x_jabatan_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fgaji_smaadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $gaji_sma_add->showPageHeader(); ?>
<?php
$gaji_sma_add->showMessage();
?>
<form name="fgaji_smaadd" id="fgaji_smaadd" class="<?php echo $gaji_sma_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="gaji_sma">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$gaji_sma_add->IsModal ?>">
<?php if ($gaji_sma->getCurrentMasterTable() == "m_sma") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="m_sma">
<input type="hidden" name="fk_bulan" value="<?php echo HtmlEncode($gaji_sma_add->bulan->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($gaji_sma_add->pid->getSessionValue()) ?>">
<input type="hidden" name="fk_tahun" value="<?php echo HtmlEncode($gaji_sma_add->tahun->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($gaji_sma_add->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_gaji_sma_tahun" for="x_tahun" class="<?php echo $gaji_sma_add->LeftColumnClass ?>"><?php echo $gaji_sma_add->tahun->caption() ?><?php echo $gaji_sma_add->tahun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_add->RightColumnClass ?>"><div <?php echo $gaji_sma_add->tahun->cellAttributes() ?>>
<?php if ($gaji_sma_add->tahun->getSessionValue() != "") { ?>
<span id="el_gaji_sma_tahun">
<span<?php echo $gaji_sma_add->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_sma_add->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_tahun" name="x_tahun" value="<?php echo HtmlEncode($gaji_sma_add->tahun->CurrentValue) ?>">
<?php } else { ?>
<span id="el_gaji_sma_tahun">
<input type="text" data-table="gaji_sma" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($gaji_sma_add->tahun->getPlaceHolder()) ?>" value="<?php echo $gaji_sma_add->tahun->EditValue ?>"<?php echo $gaji_sma_add->tahun->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $gaji_sma_add->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_add->bulan->Visible) { // bulan ?>
	<div id="r_bulan" class="form-group row">
		<label id="elh_gaji_sma_bulan" class="<?php echo $gaji_sma_add->LeftColumnClass ?>"><?php echo $gaji_sma_add->bulan->caption() ?><?php echo $gaji_sma_add->bulan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_add->RightColumnClass ?>"><div <?php echo $gaji_sma_add->bulan->cellAttributes() ?>>
<?php if ($gaji_sma_add->bulan->getSessionValue() != "") { ?>
<span id="el_gaji_sma_bulan">
<span<?php echo $gaji_sma_add->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_sma_add->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_bulan" name="x_bulan" value="<?php echo HtmlEncode($gaji_sma_add->bulan->CurrentValue) ?>">
<?php } else { ?>
<span id="el_gaji_sma_bulan">
<?php
$onchange = $gaji_sma_add->bulan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$gaji_sma_add->bulan->EditAttrs["onchange"] = "";
?>
<span id="as_x_bulan">
	<input type="text" class="form-control" name="sv_x_bulan" id="sv_x_bulan" value="<?php echo RemoveHtml($gaji_sma_add->bulan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($gaji_sma_add->bulan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($gaji_sma_add->bulan->getPlaceHolder()) ?>"<?php echo $gaji_sma_add->bulan->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_sma" data-field="x_bulan" data-value-separator="<?php echo $gaji_sma_add->bulan->displayValueSeparatorAttribute() ?>" name="x_bulan" id="x_bulan" value="<?php echo HtmlEncode($gaji_sma_add->bulan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fgaji_smaadd"], function() {
	fgaji_smaadd.createAutoSuggest({"id":"x_bulan","forceSelect":false});
});
</script>
<?php echo $gaji_sma_add->bulan->Lookup->getParamTag($gaji_sma_add, "p_x_bulan") ?>
</span>
<?php } ?>
<?php echo $gaji_sma_add->bulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_add->pegawai->Visible) { // pegawai ?>
	<div id="r_pegawai" class="form-group row">
		<label id="elh_gaji_sma_pegawai" for="x_pegawai" class="<?php echo $gaji_sma_add->LeftColumnClass ?>"><?php echo $gaji_sma_add->pegawai->caption() ?><?php echo $gaji_sma_add->pegawai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_add->RightColumnClass ?>"><div <?php echo $gaji_sma_add->pegawai->cellAttributes() ?>>
<span id="el_gaji_sma_pegawai">
<?php $gaji_sma_add->pegawai->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_pegawai"><?php echo EmptyValue(strval($gaji_sma_add->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $gaji_sma_add->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($gaji_sma_add->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($gaji_sma_add->pegawai->ReadOnly || $gaji_sma_add->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $gaji_sma_add->pegawai->Lookup->getParamTag($gaji_sma_add, "p_x_pegawai") ?>
<input type="hidden" data-table="gaji_sma" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $gaji_sma_add->pegawai->displayValueSeparatorAttribute() ?>" name="x_pegawai" id="x_pegawai" value="<?php echo $gaji_sma_add->pegawai->CurrentValue ?>"<?php echo $gaji_sma_add->pegawai->editAttributes() ?>>
</span>
<?php echo $gaji_sma_add->pegawai->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_add->jenjang_id->Visible) { // jenjang_id ?>
	<div id="r_jenjang_id" class="form-group row">
		<label id="elh_gaji_sma_jenjang_id" class="<?php echo $gaji_sma_add->LeftColumnClass ?>"><?php echo $gaji_sma_add->jenjang_id->caption() ?><?php echo $gaji_sma_add->jenjang_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_add->RightColumnClass ?>"><div <?php echo $gaji_sma_add->jenjang_id->cellAttributes() ?>>
<span id="el_gaji_sma_jenjang_id">
<?php
$onchange = $gaji_sma_add->jenjang_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$gaji_sma_add->jenjang_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_jenjang_id">
	<input type="text" class="form-control" name="sv_x_jenjang_id" id="sv_x_jenjang_id" value="<?php echo RemoveHtml($gaji_sma_add->jenjang_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($gaji_sma_add->jenjang_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($gaji_sma_add->jenjang_id->getPlaceHolder()) ?>"<?php echo $gaji_sma_add->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_sma" data-field="x_jenjang_id" data-value-separator="<?php echo $gaji_sma_add->jenjang_id->displayValueSeparatorAttribute() ?>" name="x_jenjang_id" id="x_jenjang_id" value="<?php echo HtmlEncode($gaji_sma_add->jenjang_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fgaji_smaadd"], function() {
	fgaji_smaadd.createAutoSuggest({"id":"x_jenjang_id","forceSelect":false});
});
</script>
<?php echo $gaji_sma_add->jenjang_id->Lookup->getParamTag($gaji_sma_add, "p_x_jenjang_id") ?>
</span>
<?php echo $gaji_sma_add->jenjang_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_add->jabatan_id->Visible) { // jabatan_id ?>
	<div id="r_jabatan_id" class="form-group row">
		<label id="elh_gaji_sma_jabatan_id" class="<?php echo $gaji_sma_add->LeftColumnClass ?>"><?php echo $gaji_sma_add->jabatan_id->caption() ?><?php echo $gaji_sma_add->jabatan_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_add->RightColumnClass ?>"><div <?php echo $gaji_sma_add->jabatan_id->cellAttributes() ?>>
<span id="el_gaji_sma_jabatan_id">
<?php
$onchange = $gaji_sma_add->jabatan_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$gaji_sma_add->jabatan_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_jabatan_id">
	<input type="text" class="form-control" name="sv_x_jabatan_id" id="sv_x_jabatan_id" value="<?php echo RemoveHtml($gaji_sma_add->jabatan_id->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($gaji_sma_add->jabatan_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($gaji_sma_add->jabatan_id->getPlaceHolder()) ?>"<?php echo $gaji_sma_add->jabatan_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_sma" data-field="x_jabatan_id" data-value-separator="<?php echo $gaji_sma_add->jabatan_id->displayValueSeparatorAttribute() ?>" name="x_jabatan_id" id="x_jabatan_id" value="<?php echo HtmlEncode($gaji_sma_add->jabatan_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fgaji_smaadd"], function() {
	fgaji_smaadd.createAutoSuggest({"id":"x_jabatan_id","forceSelect":false});
});
</script>
<?php echo $gaji_sma_add->jabatan_id->Lookup->getParamTag($gaji_sma_add, "p_x_jabatan_id") ?>
</span>
<?php echo $gaji_sma_add->jabatan_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_add->penyesuaian->Visible) { // penyesuaian ?>
	<div id="r_penyesuaian" class="form-group row">
		<label id="elh_gaji_sma_penyesuaian" for="x_penyesuaian" class="<?php echo $gaji_sma_add->LeftColumnClass ?>"><?php echo $gaji_sma_add->penyesuaian->caption() ?><?php echo $gaji_sma_add->penyesuaian->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_add->RightColumnClass ?>"><div <?php echo $gaji_sma_add->penyesuaian->cellAttributes() ?>>
<span id="el_gaji_sma_penyesuaian">
<input type="text" data-table="gaji_sma" data-field="x_penyesuaian" name="x_penyesuaian" id="x_penyesuaian" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_sma_add->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $gaji_sma_add->penyesuaian->EditValue ?>"<?php echo $gaji_sma_add->penyesuaian->editAttributes() ?>>
</span>
<?php echo $gaji_sma_add->penyesuaian->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_gaji_sma_status" for="x_status" class="<?php echo $gaji_sma_add->LeftColumnClass ?>"><?php echo $gaji_sma_add->status->caption() ?><?php echo $gaji_sma_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_add->RightColumnClass ?>"><div <?php echo $gaji_sma_add->status->cellAttributes() ?>>
<span id="el_gaji_sma_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="gaji_sma" data-field="x_status" data-value-separator="<?php echo $gaji_sma_add->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $gaji_sma_add->status->editAttributes() ?>>
			<?php echo $gaji_sma_add->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
</span>
<?php echo $gaji_sma_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_add->potongan_bendahara->Visible) { // potongan_bendahara ?>
	<div id="r_potongan_bendahara" class="form-group row">
		<label id="elh_gaji_sma_potongan_bendahara" for="x_potongan_bendahara" class="<?php echo $gaji_sma_add->LeftColumnClass ?>"><?php echo $gaji_sma_add->potongan_bendahara->caption() ?><?php echo $gaji_sma_add->potongan_bendahara->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_add->RightColumnClass ?>"><div <?php echo $gaji_sma_add->potongan_bendahara->cellAttributes() ?>>
<span id="el_gaji_sma_potongan_bendahara">
<textarea data-table="gaji_sma" data-field="x_potongan_bendahara" name="x_potongan_bendahara" id="x_potongan_bendahara" cols="35" rows="4" placeholder="<?php echo HtmlEncode($gaji_sma_add->potongan_bendahara->getPlaceHolder()) ?>"<?php echo $gaji_sma_add->potongan_bendahara->editAttributes() ?>><?php echo $gaji_sma_add->potongan_bendahara->EditValue ?></textarea>
</span>
<?php echo $gaji_sma_add->potongan_bendahara->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_add->voucher->Visible) { // voucher ?>
	<div id="r_voucher" class="form-group row">
		<label id="elh_gaji_sma_voucher" for="x_voucher" class="<?php echo $gaji_sma_add->LeftColumnClass ?>"><?php echo $gaji_sma_add->voucher->caption() ?><?php echo $gaji_sma_add->voucher->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_add->RightColumnClass ?>"><div <?php echo $gaji_sma_add->voucher->cellAttributes() ?>>
<span id="el_gaji_sma_voucher">
<input type="text" data-table="gaji_sma" data-field="x_voucher" name="x_voucher" id="x_voucher" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_sma_add->voucher->getPlaceHolder()) ?>" value="<?php echo $gaji_sma_add->voucher->EditValue ?>"<?php echo $gaji_sma_add->voucher->editAttributes() ?>>
</span>
<?php echo $gaji_sma_add->voucher->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<?php if (strval($gaji_sma_add->pid->getSessionValue()) != "") { ?>
	<input type="hidden" name="x_pid" id="x_pid" value="<?php echo HtmlEncode(strval($gaji_sma_add->pid->getSessionValue())) ?>">
	<?php } ?>
<?php if (!$gaji_sma_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $gaji_sma_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $gaji_sma_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$gaji_sma_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

	#r_pegawai{display:none}
	#r_lembur{display:none}
});
</script>
<?php include_once "footer.php"; ?>
<?php
$gaji_sma_add->terminate();
?>