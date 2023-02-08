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
$gaji_sma_edit = new gaji_sma_edit();

// Run the page
$gaji_sma_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_sma_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fgaji_smaedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fgaji_smaedit = currentForm = new ew.Form("fgaji_smaedit", "edit");

	// Validate form
	fgaji_smaedit.validate = function() {
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
			<?php if ($gaji_sma_edit->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_edit->tahun->caption(), $gaji_sma_edit->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_sma_edit->tahun->errorMessage()) ?>");
			<?php if ($gaji_sma_edit->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_edit->bulan->caption(), $gaji_sma_edit->bulan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_sma_edit->bulan->errorMessage()) ?>");
			<?php if ($gaji_sma_edit->pegawai->Required) { ?>
				elm = this.getElements("x" + infix + "_pegawai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_edit->pegawai->caption(), $gaji_sma_edit->pegawai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($gaji_sma_edit->sub_total->Required) { ?>
				elm = this.getElements("x" + infix + "_sub_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_edit->sub_total->caption(), $gaji_sma_edit->sub_total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sub_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_sma_edit->sub_total->errorMessage()) ?>");
			<?php if ($gaji_sma_edit->potongan->Required) { ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_edit->potongan->caption(), $gaji_sma_edit->potongan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_sma_edit->potongan->errorMessage()) ?>");
			<?php if ($gaji_sma_edit->penyesuaian->Required) { ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_edit->penyesuaian->caption(), $gaji_sma_edit->penyesuaian->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_sma_edit->penyesuaian->errorMessage()) ?>");
			<?php if ($gaji_sma_edit->total->Required) { ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_edit->total->caption(), $gaji_sma_edit->total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_sma_edit->total->errorMessage()) ?>");
			<?php if ($gaji_sma_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_edit->status->caption(), $gaji_sma_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($gaji_sma_edit->potongan_bendahara->Required) { ?>
				elm = this.getElements("x" + infix + "_potongan_bendahara");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_edit->potongan_bendahara->caption(), $gaji_sma_edit->potongan_bendahara->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($gaji_sma_edit->voucher->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $gaji_sma_edit->voucher->caption(), $gaji_sma_edit->voucher->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($gaji_sma_edit->voucher->errorMessage()) ?>");

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
	fgaji_smaedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fgaji_smaedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fgaji_smaedit.lists["x_bulan"] = <?php echo $gaji_sma_edit->bulan->Lookup->toClientList($gaji_sma_edit) ?>;
	fgaji_smaedit.lists["x_bulan"].options = <?php echo JsonEncode($gaji_sma_edit->bulan->lookupOptions()) ?>;
	fgaji_smaedit.autoSuggests["x_bulan"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fgaji_smaedit.lists["x_pegawai"] = <?php echo $gaji_sma_edit->pegawai->Lookup->toClientList($gaji_sma_edit) ?>;
	fgaji_smaedit.lists["x_pegawai"].options = <?php echo JsonEncode($gaji_sma_edit->pegawai->lookupOptions()) ?>;
	loadjs.done("fgaji_smaedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $gaji_sma_edit->showPageHeader(); ?>
<?php
$gaji_sma_edit->showMessage();
?>
<form name="fgaji_smaedit" id="fgaji_smaedit" class="<?php echo $gaji_sma_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="gaji_sma">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$gaji_sma_edit->IsModal ?>">
<?php if ($gaji_sma->getCurrentMasterTable() == "m_sma") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="m_sma">
<input type="hidden" name="fk_bulan" value="<?php echo HtmlEncode($gaji_sma_edit->bulan->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($gaji_sma_edit->pid->getSessionValue()) ?>">
<input type="hidden" name="fk_tahun" value="<?php echo HtmlEncode($gaji_sma_edit->tahun->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($gaji_sma_edit->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_gaji_sma_tahun" for="x_tahun" class="<?php echo $gaji_sma_edit->LeftColumnClass ?>"><?php echo $gaji_sma_edit->tahun->caption() ?><?php echo $gaji_sma_edit->tahun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_edit->RightColumnClass ?>"><div <?php echo $gaji_sma_edit->tahun->cellAttributes() ?>>
<?php if ($gaji_sma_edit->tahun->getSessionValue() != "") { ?>
<span id="el_gaji_sma_tahun">
<span<?php echo $gaji_sma_edit->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_sma_edit->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_tahun" name="x_tahun" value="<?php echo HtmlEncode($gaji_sma_edit->tahun->CurrentValue) ?>">
<?php } else { ?>
<span id="el_gaji_sma_tahun">
<input type="text" data-table="gaji_sma" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($gaji_sma_edit->tahun->getPlaceHolder()) ?>" value="<?php echo $gaji_sma_edit->tahun->EditValue ?>"<?php echo $gaji_sma_edit->tahun->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $gaji_sma_edit->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_edit->bulan->Visible) { // bulan ?>
	<div id="r_bulan" class="form-group row">
		<label id="elh_gaji_sma_bulan" class="<?php echo $gaji_sma_edit->LeftColumnClass ?>"><?php echo $gaji_sma_edit->bulan->caption() ?><?php echo $gaji_sma_edit->bulan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_edit->RightColumnClass ?>"><div <?php echo $gaji_sma_edit->bulan->cellAttributes() ?>>
<?php if ($gaji_sma_edit->bulan->getSessionValue() != "") { ?>
<span id="el_gaji_sma_bulan">
<span<?php echo $gaji_sma_edit->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($gaji_sma_edit->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_bulan" name="x_bulan" value="<?php echo HtmlEncode($gaji_sma_edit->bulan->CurrentValue) ?>">
<?php } else { ?>
<span id="el_gaji_sma_bulan">
<?php
$onchange = $gaji_sma_edit->bulan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$gaji_sma_edit->bulan->EditAttrs["onchange"] = "";
?>
<span id="as_x_bulan">
	<input type="text" class="form-control" name="sv_x_bulan" id="sv_x_bulan" value="<?php echo RemoveHtml($gaji_sma_edit->bulan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($gaji_sma_edit->bulan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($gaji_sma_edit->bulan->getPlaceHolder()) ?>"<?php echo $gaji_sma_edit->bulan->editAttributes() ?>>
</span>
<input type="hidden" data-table="gaji_sma" data-field="x_bulan" data-value-separator="<?php echo $gaji_sma_edit->bulan->displayValueSeparatorAttribute() ?>" name="x_bulan" id="x_bulan" value="<?php echo HtmlEncode($gaji_sma_edit->bulan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fgaji_smaedit"], function() {
	fgaji_smaedit.createAutoSuggest({"id":"x_bulan","forceSelect":false});
});
</script>
<?php echo $gaji_sma_edit->bulan->Lookup->getParamTag($gaji_sma_edit, "p_x_bulan") ?>
</span>
<?php } ?>
<?php echo $gaji_sma_edit->bulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_edit->pegawai->Visible) { // pegawai ?>
	<div id="r_pegawai" class="form-group row">
		<label id="elh_gaji_sma_pegawai" for="x_pegawai" class="<?php echo $gaji_sma_edit->LeftColumnClass ?>"><?php echo $gaji_sma_edit->pegawai->caption() ?><?php echo $gaji_sma_edit->pegawai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_edit->RightColumnClass ?>"><div <?php echo $gaji_sma_edit->pegawai->cellAttributes() ?>>
<span id="el_gaji_sma_pegawai">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_pegawai"><?php echo EmptyValue(strval($gaji_sma_edit->pegawai->ViewValue)) ? $Language->phrase("PleaseSelect") : $gaji_sma_edit->pegawai->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($gaji_sma_edit->pegawai->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($gaji_sma_edit->pegawai->ReadOnly || $gaji_sma_edit->pegawai->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_pegawai',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $gaji_sma_edit->pegawai->Lookup->getParamTag($gaji_sma_edit, "p_x_pegawai") ?>
<input type="hidden" data-table="gaji_sma" data-field="x_pegawai" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $gaji_sma_edit->pegawai->displayValueSeparatorAttribute() ?>" name="x_pegawai" id="x_pegawai" value="<?php echo $gaji_sma_edit->pegawai->CurrentValue ?>"<?php echo $gaji_sma_edit->pegawai->editAttributes() ?>>
</span>
<?php echo $gaji_sma_edit->pegawai->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_edit->sub_total->Visible) { // sub_total ?>
	<div id="r_sub_total" class="form-group row">
		<label id="elh_gaji_sma_sub_total" for="x_sub_total" class="<?php echo $gaji_sma_edit->LeftColumnClass ?>"><?php echo $gaji_sma_edit->sub_total->caption() ?><?php echo $gaji_sma_edit->sub_total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_edit->RightColumnClass ?>"><div <?php echo $gaji_sma_edit->sub_total->cellAttributes() ?>>
<span id="el_gaji_sma_sub_total">
<input type="text" data-table="gaji_sma" data-field="x_sub_total" name="x_sub_total" id="x_sub_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_sma_edit->sub_total->getPlaceHolder()) ?>" value="<?php echo $gaji_sma_edit->sub_total->EditValue ?>"<?php echo $gaji_sma_edit->sub_total->editAttributes() ?>>
</span>
<?php echo $gaji_sma_edit->sub_total->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_edit->potongan->Visible) { // potongan ?>
	<div id="r_potongan" class="form-group row">
		<label id="elh_gaji_sma_potongan" for="x_potongan" class="<?php echo $gaji_sma_edit->LeftColumnClass ?>"><?php echo $gaji_sma_edit->potongan->caption() ?><?php echo $gaji_sma_edit->potongan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_edit->RightColumnClass ?>"><div <?php echo $gaji_sma_edit->potongan->cellAttributes() ?>>
<span id="el_gaji_sma_potongan">
<input type="text" data-table="gaji_sma" data-field="x_potongan" name="x_potongan" id="x_potongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_sma_edit->potongan->getPlaceHolder()) ?>" value="<?php echo $gaji_sma_edit->potongan->EditValue ?>"<?php echo $gaji_sma_edit->potongan->editAttributes() ?>>
</span>
<?php echo $gaji_sma_edit->potongan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_edit->penyesuaian->Visible) { // penyesuaian ?>
	<div id="r_penyesuaian" class="form-group row">
		<label id="elh_gaji_sma_penyesuaian" for="x_penyesuaian" class="<?php echo $gaji_sma_edit->LeftColumnClass ?>"><?php echo $gaji_sma_edit->penyesuaian->caption() ?><?php echo $gaji_sma_edit->penyesuaian->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_edit->RightColumnClass ?>"><div <?php echo $gaji_sma_edit->penyesuaian->cellAttributes() ?>>
<span id="el_gaji_sma_penyesuaian">
<input type="text" data-table="gaji_sma" data-field="x_penyesuaian" name="x_penyesuaian" id="x_penyesuaian" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_sma_edit->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $gaji_sma_edit->penyesuaian->EditValue ?>"<?php echo $gaji_sma_edit->penyesuaian->editAttributes() ?>>
</span>
<?php echo $gaji_sma_edit->penyesuaian->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_edit->total->Visible) { // total ?>
	<div id="r_total" class="form-group row">
		<label id="elh_gaji_sma_total" for="x_total" class="<?php echo $gaji_sma_edit->LeftColumnClass ?>"><?php echo $gaji_sma_edit->total->caption() ?><?php echo $gaji_sma_edit->total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_edit->RightColumnClass ?>"><div <?php echo $gaji_sma_edit->total->cellAttributes() ?>>
<span id="el_gaji_sma_total">
<input type="text" data-table="gaji_sma" data-field="x_total" name="x_total" id="x_total" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($gaji_sma_edit->total->getPlaceHolder()) ?>" value="<?php echo $gaji_sma_edit->total->EditValue ?>"<?php echo $gaji_sma_edit->total->editAttributes() ?>>
</span>
<?php echo $gaji_sma_edit->total->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_gaji_sma_status" for="x_status" class="<?php echo $gaji_sma_edit->LeftColumnClass ?>"><?php echo $gaji_sma_edit->status->caption() ?><?php echo $gaji_sma_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_edit->RightColumnClass ?>"><div <?php echo $gaji_sma_edit->status->cellAttributes() ?>>
<span id="el_gaji_sma_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="gaji_sma" data-field="x_status" data-value-separator="<?php echo $gaji_sma_edit->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $gaji_sma_edit->status->editAttributes() ?>>
			<?php echo $gaji_sma_edit->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
</span>
<?php echo $gaji_sma_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_edit->potongan_bendahara->Visible) { // potongan_bendahara ?>
	<div id="r_potongan_bendahara" class="form-group row">
		<label id="elh_gaji_sma_potongan_bendahara" for="x_potongan_bendahara" class="<?php echo $gaji_sma_edit->LeftColumnClass ?>"><?php echo $gaji_sma_edit->potongan_bendahara->caption() ?><?php echo $gaji_sma_edit->potongan_bendahara->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_edit->RightColumnClass ?>"><div <?php echo $gaji_sma_edit->potongan_bendahara->cellAttributes() ?>>
<span id="el_gaji_sma_potongan_bendahara">
<textarea data-table="gaji_sma" data-field="x_potongan_bendahara" name="x_potongan_bendahara" id="x_potongan_bendahara" cols="35" rows="4" placeholder="<?php echo HtmlEncode($gaji_sma_edit->potongan_bendahara->getPlaceHolder()) ?>"<?php echo $gaji_sma_edit->potongan_bendahara->editAttributes() ?>><?php echo $gaji_sma_edit->potongan_bendahara->EditValue ?></textarea>
</span>
<?php echo $gaji_sma_edit->potongan_bendahara->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($gaji_sma_edit->voucher->Visible) { // voucher ?>
	<div id="r_voucher" class="form-group row">
		<label id="elh_gaji_sma_voucher" for="x_voucher" class="<?php echo $gaji_sma_edit->LeftColumnClass ?>"><?php echo $gaji_sma_edit->voucher->caption() ?><?php echo $gaji_sma_edit->voucher->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $gaji_sma_edit->RightColumnClass ?>"><div <?php echo $gaji_sma_edit->voucher->cellAttributes() ?>>
<span id="el_gaji_sma_voucher">
<input type="text" data-table="gaji_sma" data-field="x_voucher" name="x_voucher" id="x_voucher" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($gaji_sma_edit->voucher->getPlaceHolder()) ?>" value="<?php echo $gaji_sma_edit->voucher->EditValue ?>"<?php echo $gaji_sma_edit->voucher->editAttributes() ?>>
</span>
<?php echo $gaji_sma_edit->voucher->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="gaji_sma" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($gaji_sma_edit->id->CurrentValue) ?>">
<?php if (!$gaji_sma_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $gaji_sma_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $gaji_sma_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$gaji_sma_edit->showPageFooter();
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
$gaji_sma_edit->terminate();
?>