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
$potongan_tk_add = new potongan_tk_add();

// Run the page
$potongan_tk_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$potongan_tk_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpotongan_tkadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpotongan_tkadd = currentForm = new ew.Form("fpotongan_tkadd", "add");

	// Validate form
	fpotongan_tkadd.validate = function() {
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
			<?php if ($potongan_tk_add->datetime->Required) { ?>
				elm = this.getElements("x" + infix + "_datetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->datetime->caption(), $potongan_tk_add->datetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($potongan_tk_add->u_by->Required) { ?>
				elm = this.getElements("x" + infix + "_u_by");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->u_by->caption(), $potongan_tk_add->u_by->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($potongan_tk_add->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->tahun->caption(), $potongan_tk_add->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->tahun->errorMessage()) ?>");
			<?php if ($potongan_tk_add->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->bulan->caption(), $potongan_tk_add->bulan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->bulan->errorMessage()) ?>");
			<?php if ($potongan_tk_add->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->nama->caption(), $potongan_tk_add->nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($potongan_tk_add->jenjang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->jenjang_id->caption(), $potongan_tk_add->jenjang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->jenjang_id->errorMessage()) ?>");
			<?php if ($potongan_tk_add->jabatan_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jabatan_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->jabatan_id->caption(), $potongan_tk_add->jabatan_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jabatan_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->jabatan_id->errorMessage()) ?>");
			<?php if ($potongan_tk_add->sertif->Required) { ?>
				elm = this.getElements("x" + infix + "_sertif");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->sertif->caption(), $potongan_tk_add->sertif->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sertif");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->sertif->errorMessage()) ?>");
			<?php if ($potongan_tk_add->terlambat->Required) { ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->terlambat->caption(), $potongan_tk_add->terlambat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->terlambat->errorMessage()) ?>");
			<?php if ($potongan_tk_add->value_terlambat->Required) { ?>
				elm = this.getElements("x" + infix + "_value_terlambat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->value_terlambat->caption(), $potongan_tk_add->value_terlambat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_terlambat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->value_terlambat->errorMessage()) ?>");
			<?php if ($potongan_tk_add->izin->Required) { ?>
				elm = this.getElements("x" + infix + "_izin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->izin->caption(), $potongan_tk_add->izin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_izin");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->izin->errorMessage()) ?>");
			<?php if ($potongan_tk_add->value_izin->Required) { ?>
				elm = this.getElements("x" + infix + "_value_izin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->value_izin->caption(), $potongan_tk_add->value_izin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_izin");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->value_izin->errorMessage()) ?>");
			<?php if ($potongan_tk_add->izinperjam->Required) { ?>
				elm = this.getElements("x" + infix + "_izinperjam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->izinperjam->caption(), $potongan_tk_add->izinperjam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_izinperjam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->izinperjam->errorMessage()) ?>");
			<?php if ($potongan_tk_add->izinperjamvalue->Required) { ?>
				elm = this.getElements("x" + infix + "_izinperjamvalue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->izinperjamvalue->caption(), $potongan_tk_add->izinperjamvalue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_izinperjamvalue");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->izinperjamvalue->errorMessage()) ?>");
			<?php if ($potongan_tk_add->sakitperjam->Required) { ?>
				elm = this.getElements("x" + infix + "_sakitperjam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->sakitperjam->caption(), $potongan_tk_add->sakitperjam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakitperjam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->sakitperjam->errorMessage()) ?>");
			<?php if ($potongan_tk_add->sakitperjamvalue->Required) { ?>
				elm = this.getElements("x" + infix + "_sakitperjamvalue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->sakitperjamvalue->caption(), $potongan_tk_add->sakitperjamvalue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakitperjamvalue");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->sakitperjamvalue->errorMessage()) ?>");
			<?php if ($potongan_tk_add->pulcep->Required) { ?>
				elm = this.getElements("x" + infix + "_pulcep");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->pulcep->caption(), $potongan_tk_add->pulcep->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pulcep");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->pulcep->errorMessage()) ?>");
			<?php if ($potongan_tk_add->value_pulcep->Required) { ?>
				elm = this.getElements("x" + infix + "_value_pulcep");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->value_pulcep->caption(), $potongan_tk_add->value_pulcep->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value_pulcep");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->value_pulcep->errorMessage()) ?>");
			<?php if ($potongan_tk_add->tidakhadirjam->Required) { ?>
				elm = this.getElements("x" + infix + "_tidakhadirjam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->tidakhadirjam->caption(), $potongan_tk_add->tidakhadirjam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tidakhadirjam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->tidakhadirjam->errorMessage()) ?>");
			<?php if ($potongan_tk_add->tidakhadirjamvalue->Required) { ?>
				elm = this.getElements("x" + infix + "_tidakhadirjamvalue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->tidakhadirjamvalue->caption(), $potongan_tk_add->tidakhadirjamvalue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tidakhadirjamvalue");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->tidakhadirjamvalue->errorMessage()) ?>");
			<?php if ($potongan_tk_add->totalpotongan->Required) { ?>
				elm = this.getElements("x" + infix + "_totalpotongan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $potongan_tk_add->totalpotongan->caption(), $potongan_tk_add->totalpotongan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_totalpotongan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($potongan_tk_add->totalpotongan->errorMessage()) ?>");

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
	fpotongan_tkadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpotongan_tkadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpotongan_tkadd.lists["x_u_by"] = <?php echo $potongan_tk_add->u_by->Lookup->toClientList($potongan_tk_add) ?>;
	fpotongan_tkadd.lists["x_u_by"].options = <?php echo JsonEncode($potongan_tk_add->u_by->lookupOptions()) ?>;
	fpotongan_tkadd.autoSuggests["x_u_by"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpotongan_tkadd.lists["x_bulan"] = <?php echo $potongan_tk_add->bulan->Lookup->toClientList($potongan_tk_add) ?>;
	fpotongan_tkadd.lists["x_bulan"].options = <?php echo JsonEncode($potongan_tk_add->bulan->lookupOptions()) ?>;
	fpotongan_tkadd.autoSuggests["x_bulan"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpotongan_tkadd.lists["x_nama"] = <?php echo $potongan_tk_add->nama->Lookup->toClientList($potongan_tk_add) ?>;
	fpotongan_tkadd.lists["x_nama"].options = <?php echo JsonEncode($potongan_tk_add->nama->lookupOptions()) ?>;
	fpotongan_tkadd.lists["x_jenjang_id"] = <?php echo $potongan_tk_add->jenjang_id->Lookup->toClientList($potongan_tk_add) ?>;
	fpotongan_tkadd.lists["x_jenjang_id"].options = <?php echo JsonEncode($potongan_tk_add->jenjang_id->lookupOptions()) ?>;
	fpotongan_tkadd.autoSuggests["x_jenjang_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpotongan_tkadd.lists["x_sertif"] = <?php echo $potongan_tk_add->sertif->Lookup->toClientList($potongan_tk_add) ?>;
	fpotongan_tkadd.lists["x_sertif"].options = <?php echo JsonEncode($potongan_tk_add->sertif->lookupOptions()) ?>;
	fpotongan_tkadd.autoSuggests["x_sertif"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fpotongan_tkadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $potongan_tk_add->showPageHeader(); ?>
<?php
$potongan_tk_add->showMessage();
?>
<form name="fpotongan_tkadd" id="fpotongan_tkadd" class="<?php echo $potongan_tk_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="potongan_tk">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$potongan_tk_add->IsModal ?>">
<?php if ($potongan_tk->getCurrentMasterTable() == "m_potongan") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="m_potongan">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($potongan_tk_add->pid->getSessionValue()) ?>">
<input type="hidden" name="fk_bulan" value="<?php echo HtmlEncode($potongan_tk_add->bulan->getSessionValue()) ?>">
<input type="hidden" name="fk_tahun" value="<?php echo HtmlEncode($potongan_tk_add->tahun->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($potongan_tk_add->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_potongan_tk_tahun" for="x_tahun" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->tahun->caption() ?><?php echo $potongan_tk_add->tahun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->tahun->cellAttributes() ?>>
<?php if ($potongan_tk_add->tahun->getSessionValue() != "") { ?>
<span id="el_potongan_tk_tahun">
<span<?php echo $potongan_tk_add->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_tk_add->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_tahun" name="x_tahun" value="<?php echo HtmlEncode($potongan_tk_add->tahun->CurrentValue) ?>">
<?php } else { ?>
<span id="el_potongan_tk_tahun">
<input type="text" data-table="potongan_tk" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_tk_add->tahun->getPlaceHolder()) ?>" value="<?php echo $potongan_tk_add->tahun->EditValue ?>"<?php echo $potongan_tk_add->tahun->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $potongan_tk_add->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->bulan->Visible) { // bulan ?>
	<div id="r_bulan" class="form-group row">
		<label id="elh_potongan_tk_bulan" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->bulan->caption() ?><?php echo $potongan_tk_add->bulan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->bulan->cellAttributes() ?>>
<?php if ($potongan_tk_add->bulan->getSessionValue() != "") { ?>
<span id="el_potongan_tk_bulan">
<span<?php echo $potongan_tk_add->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($potongan_tk_add->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_bulan" name="x_bulan" value="<?php echo HtmlEncode($potongan_tk_add->bulan->CurrentValue) ?>">
<?php } else { ?>
<span id="el_potongan_tk_bulan">
<?php
$onchange = $potongan_tk_add->bulan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_tk_add->bulan->EditAttrs["onchange"] = "";
?>
<span id="as_x_bulan">
	<input type="text" class="form-control" name="sv_x_bulan" id="sv_x_bulan" value="<?php echo RemoveHtml($potongan_tk_add->bulan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_tk_add->bulan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_tk_add->bulan->getPlaceHolder()) ?>"<?php echo $potongan_tk_add->bulan->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_tk" data-field="x_bulan" data-value-separator="<?php echo $potongan_tk_add->bulan->displayValueSeparatorAttribute() ?>" name="x_bulan" id="x_bulan" value="<?php echo HtmlEncode($potongan_tk_add->bulan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_tkadd"], function() {
	fpotongan_tkadd.createAutoSuggest({"id":"x_bulan","forceSelect":false});
});
</script>
<?php echo $potongan_tk_add->bulan->Lookup->getParamTag($potongan_tk_add, "p_x_bulan") ?>
</span>
<?php } ?>
<?php echo $potongan_tk_add->bulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->nama->Visible) { // nama ?>
	<div id="r_nama" class="form-group row">
		<label id="elh_potongan_tk_nama" for="x_nama" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->nama->caption() ?><?php echo $potongan_tk_add->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->nama->cellAttributes() ?>>
<span id="el_potongan_tk_nama">
<?php $potongan_tk_add->nama->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_nama"><?php echo EmptyValue(strval($potongan_tk_add->nama->ViewValue)) ? $Language->phrase("PleaseSelect") : $potongan_tk_add->nama->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($potongan_tk_add->nama->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($potongan_tk_add->nama->ReadOnly || $potongan_tk_add->nama->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_nama',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $potongan_tk_add->nama->Lookup->getParamTag($potongan_tk_add, "p_x_nama") ?>
<input type="hidden" data-table="potongan_tk" data-field="x_nama" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $potongan_tk_add->nama->displayValueSeparatorAttribute() ?>" name="x_nama" id="x_nama" value="<?php echo $potongan_tk_add->nama->CurrentValue ?>"<?php echo $potongan_tk_add->nama->editAttributes() ?>>
</span>
<?php echo $potongan_tk_add->nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->jenjang_id->Visible) { // jenjang_id ?>
	<div id="r_jenjang_id" class="form-group row">
		<label id="elh_potongan_tk_jenjang_id" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->jenjang_id->caption() ?><?php echo $potongan_tk_add->jenjang_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->jenjang_id->cellAttributes() ?>>
<span id="el_potongan_tk_jenjang_id">
<?php
$onchange = $potongan_tk_add->jenjang_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_tk_add->jenjang_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_jenjang_id">
	<input type="text" class="form-control" name="sv_x_jenjang_id" id="sv_x_jenjang_id" value="<?php echo RemoveHtml($potongan_tk_add->jenjang_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_tk_add->jenjang_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_tk_add->jenjang_id->getPlaceHolder()) ?>"<?php echo $potongan_tk_add->jenjang_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_tk" data-field="x_jenjang_id" data-value-separator="<?php echo $potongan_tk_add->jenjang_id->displayValueSeparatorAttribute() ?>" name="x_jenjang_id" id="x_jenjang_id" value="<?php echo HtmlEncode($potongan_tk_add->jenjang_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_tkadd"], function() {
	fpotongan_tkadd.createAutoSuggest({"id":"x_jenjang_id","forceSelect":false});
});
</script>
<?php echo $potongan_tk_add->jenjang_id->Lookup->getParamTag($potongan_tk_add, "p_x_jenjang_id") ?>
</span>
<?php echo $potongan_tk_add->jenjang_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->jabatan_id->Visible) { // jabatan_id ?>
	<div id="r_jabatan_id" class="form-group row">
		<label id="elh_potongan_tk_jabatan_id" for="x_jabatan_id" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->jabatan_id->caption() ?><?php echo $potongan_tk_add->jabatan_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->jabatan_id->cellAttributes() ?>>
<span id="el_potongan_tk_jabatan_id">
<input type="text" data-table="potongan_tk" data-field="x_jabatan_id" name="x_jabatan_id" id="x_jabatan_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_tk_add->jabatan_id->getPlaceHolder()) ?>" value="<?php echo $potongan_tk_add->jabatan_id->EditValue ?>"<?php echo $potongan_tk_add->jabatan_id->editAttributes() ?>>
</span>
<?php echo $potongan_tk_add->jabatan_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->sertif->Visible) { // sertif ?>
	<div id="r_sertif" class="form-group row">
		<label id="elh_potongan_tk_sertif" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->sertif->caption() ?><?php echo $potongan_tk_add->sertif->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->sertif->cellAttributes() ?>>
<span id="el_potongan_tk_sertif">
<?php
$onchange = $potongan_tk_add->sertif->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$potongan_tk_add->sertif->EditAttrs["onchange"] = "";
?>
<span id="as_x_sertif">
	<input type="text" class="form-control" name="sv_x_sertif" id="sv_x_sertif" value="<?php echo RemoveHtml($potongan_tk_add->sertif->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_tk_add->sertif->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($potongan_tk_add->sertif->getPlaceHolder()) ?>"<?php echo $potongan_tk_add->sertif->editAttributes() ?>>
</span>
<input type="hidden" data-table="potongan_tk" data-field="x_sertif" data-value-separator="<?php echo $potongan_tk_add->sertif->displayValueSeparatorAttribute() ?>" name="x_sertif" id="x_sertif" value="<?php echo HtmlEncode($potongan_tk_add->sertif->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpotongan_tkadd"], function() {
	fpotongan_tkadd.createAutoSuggest({"id":"x_sertif","forceSelect":false});
});
</script>
<?php echo $potongan_tk_add->sertif->Lookup->getParamTag($potongan_tk_add, "p_x_sertif") ?>
</span>
<?php echo $potongan_tk_add->sertif->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->terlambat->Visible) { // terlambat ?>
	<div id="r_terlambat" class="form-group row">
		<label id="elh_potongan_tk_terlambat" for="x_terlambat" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->terlambat->caption() ?><?php echo $potongan_tk_add->terlambat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->terlambat->cellAttributes() ?>>
<span id="el_potongan_tk_terlambat">
<input type="text" data-table="potongan_tk" data-field="x_terlambat" name="x_terlambat" id="x_terlambat" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_tk_add->terlambat->getPlaceHolder()) ?>" value="<?php echo $potongan_tk_add->terlambat->EditValue ?>"<?php echo $potongan_tk_add->terlambat->editAttributes() ?>>
</span>
<?php echo $potongan_tk_add->terlambat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->value_terlambat->Visible) { // value_terlambat ?>
	<div id="r_value_terlambat" class="form-group row">
		<label id="elh_potongan_tk_value_terlambat" for="x_value_terlambat" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->value_terlambat->caption() ?><?php echo $potongan_tk_add->value_terlambat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->value_terlambat->cellAttributes() ?>>
<span id="el_potongan_tk_value_terlambat">
<input type="text" data-table="potongan_tk" data-field="x_value_terlambat" name="x_value_terlambat" id="x_value_terlambat" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_tk_add->value_terlambat->getPlaceHolder()) ?>" value="<?php echo $potongan_tk_add->value_terlambat->EditValue ?>"<?php echo $potongan_tk_add->value_terlambat->editAttributes() ?>>
</span>
<?php echo $potongan_tk_add->value_terlambat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->izin->Visible) { // izin ?>
	<div id="r_izin" class="form-group row">
		<label id="elh_potongan_tk_izin" for="x_izin" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->izin->caption() ?><?php echo $potongan_tk_add->izin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->izin->cellAttributes() ?>>
<span id="el_potongan_tk_izin">
<input type="text" data-table="potongan_tk" data-field="x_izin" name="x_izin" id="x_izin" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_tk_add->izin->getPlaceHolder()) ?>" value="<?php echo $potongan_tk_add->izin->EditValue ?>"<?php echo $potongan_tk_add->izin->editAttributes() ?>>
</span>
<?php echo $potongan_tk_add->izin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->value_izin->Visible) { // value_izin ?>
	<div id="r_value_izin" class="form-group row">
		<label id="elh_potongan_tk_value_izin" for="x_value_izin" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->value_izin->caption() ?><?php echo $potongan_tk_add->value_izin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->value_izin->cellAttributes() ?>>
<span id="el_potongan_tk_value_izin">
<input type="text" data-table="potongan_tk" data-field="x_value_izin" name="x_value_izin" id="x_value_izin" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_tk_add->value_izin->getPlaceHolder()) ?>" value="<?php echo $potongan_tk_add->value_izin->EditValue ?>"<?php echo $potongan_tk_add->value_izin->editAttributes() ?>>
</span>
<?php echo $potongan_tk_add->value_izin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->izinperjam->Visible) { // izinperjam ?>
	<div id="r_izinperjam" class="form-group row">
		<label id="elh_potongan_tk_izinperjam" for="x_izinperjam" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->izinperjam->caption() ?><?php echo $potongan_tk_add->izinperjam->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->izinperjam->cellAttributes() ?>>
<span id="el_potongan_tk_izinperjam">
<input type="text" data-table="potongan_tk" data-field="x_izinperjam" name="x_izinperjam" id="x_izinperjam" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_tk_add->izinperjam->getPlaceHolder()) ?>" value="<?php echo $potongan_tk_add->izinperjam->EditValue ?>"<?php echo $potongan_tk_add->izinperjam->editAttributes() ?>>
</span>
<?php echo $potongan_tk_add->izinperjam->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->izinperjamvalue->Visible) { // izinperjamvalue ?>
	<div id="r_izinperjamvalue" class="form-group row">
		<label id="elh_potongan_tk_izinperjamvalue" for="x_izinperjamvalue" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->izinperjamvalue->caption() ?><?php echo $potongan_tk_add->izinperjamvalue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->izinperjamvalue->cellAttributes() ?>>
<span id="el_potongan_tk_izinperjamvalue">
<input type="text" data-table="potongan_tk" data-field="x_izinperjamvalue" name="x_izinperjamvalue" id="x_izinperjamvalue" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_tk_add->izinperjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_tk_add->izinperjamvalue->EditValue ?>"<?php echo $potongan_tk_add->izinperjamvalue->editAttributes() ?>>
</span>
<?php echo $potongan_tk_add->izinperjamvalue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->sakitperjam->Visible) { // sakitperjam ?>
	<div id="r_sakitperjam" class="form-group row">
		<label id="elh_potongan_tk_sakitperjam" for="x_sakitperjam" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->sakitperjam->caption() ?><?php echo $potongan_tk_add->sakitperjam->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->sakitperjam->cellAttributes() ?>>
<span id="el_potongan_tk_sakitperjam">
<input type="text" data-table="potongan_tk" data-field="x_sakitperjam" name="x_sakitperjam" id="x_sakitperjam" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_tk_add->sakitperjam->getPlaceHolder()) ?>" value="<?php echo $potongan_tk_add->sakitperjam->EditValue ?>"<?php echo $potongan_tk_add->sakitperjam->editAttributes() ?>>
</span>
<?php echo $potongan_tk_add->sakitperjam->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->sakitperjamvalue->Visible) { // sakitperjamvalue ?>
	<div id="r_sakitperjamvalue" class="form-group row">
		<label id="elh_potongan_tk_sakitperjamvalue" for="x_sakitperjamvalue" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->sakitperjamvalue->caption() ?><?php echo $potongan_tk_add->sakitperjamvalue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->sakitperjamvalue->cellAttributes() ?>>
<span id="el_potongan_tk_sakitperjamvalue">
<input type="text" data-table="potongan_tk" data-field="x_sakitperjamvalue" name="x_sakitperjamvalue" id="x_sakitperjamvalue" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_tk_add->sakitperjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_tk_add->sakitperjamvalue->EditValue ?>"<?php echo $potongan_tk_add->sakitperjamvalue->editAttributes() ?>>
</span>
<?php echo $potongan_tk_add->sakitperjamvalue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->pulcep->Visible) { // pulcep ?>
	<div id="r_pulcep" class="form-group row">
		<label id="elh_potongan_tk_pulcep" for="x_pulcep" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->pulcep->caption() ?><?php echo $potongan_tk_add->pulcep->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->pulcep->cellAttributes() ?>>
<span id="el_potongan_tk_pulcep">
<input type="text" data-table="potongan_tk" data-field="x_pulcep" name="x_pulcep" id="x_pulcep" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_tk_add->pulcep->getPlaceHolder()) ?>" value="<?php echo $potongan_tk_add->pulcep->EditValue ?>"<?php echo $potongan_tk_add->pulcep->editAttributes() ?>>
</span>
<?php echo $potongan_tk_add->pulcep->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->value_pulcep->Visible) { // value_pulcep ?>
	<div id="r_value_pulcep" class="form-group row">
		<label id="elh_potongan_tk_value_pulcep" for="x_value_pulcep" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->value_pulcep->caption() ?><?php echo $potongan_tk_add->value_pulcep->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->value_pulcep->cellAttributes() ?>>
<span id="el_potongan_tk_value_pulcep">
<input type="text" data-table="potongan_tk" data-field="x_value_pulcep" name="x_value_pulcep" id="x_value_pulcep" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_tk_add->value_pulcep->getPlaceHolder()) ?>" value="<?php echo $potongan_tk_add->value_pulcep->EditValue ?>"<?php echo $potongan_tk_add->value_pulcep->editAttributes() ?>>
</span>
<?php echo $potongan_tk_add->value_pulcep->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->tidakhadirjam->Visible) { // tidakhadirjam ?>
	<div id="r_tidakhadirjam" class="form-group row">
		<label id="elh_potongan_tk_tidakhadirjam" for="x_tidakhadirjam" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->tidakhadirjam->caption() ?><?php echo $potongan_tk_add->tidakhadirjam->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->tidakhadirjam->cellAttributes() ?>>
<span id="el_potongan_tk_tidakhadirjam">
<input type="text" data-table="potongan_tk" data-field="x_tidakhadirjam" name="x_tidakhadirjam" id="x_tidakhadirjam" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($potongan_tk_add->tidakhadirjam->getPlaceHolder()) ?>" value="<?php echo $potongan_tk_add->tidakhadirjam->EditValue ?>"<?php echo $potongan_tk_add->tidakhadirjam->editAttributes() ?>>
</span>
<?php echo $potongan_tk_add->tidakhadirjam->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->tidakhadirjamvalue->Visible) { // tidakhadirjamvalue ?>
	<div id="r_tidakhadirjamvalue" class="form-group row">
		<label id="elh_potongan_tk_tidakhadirjamvalue" for="x_tidakhadirjamvalue" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->tidakhadirjamvalue->caption() ?><?php echo $potongan_tk_add->tidakhadirjamvalue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->tidakhadirjamvalue->cellAttributes() ?>>
<span id="el_potongan_tk_tidakhadirjamvalue">
<input type="text" data-table="potongan_tk" data-field="x_tidakhadirjamvalue" name="x_tidakhadirjamvalue" id="x_tidakhadirjamvalue" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($potongan_tk_add->tidakhadirjamvalue->getPlaceHolder()) ?>" value="<?php echo $potongan_tk_add->tidakhadirjamvalue->EditValue ?>"<?php echo $potongan_tk_add->tidakhadirjamvalue->editAttributes() ?>>
</span>
<?php echo $potongan_tk_add->tidakhadirjamvalue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($potongan_tk_add->totalpotongan->Visible) { // totalpotongan ?>
	<div id="r_totalpotongan" class="form-group row">
		<label id="elh_potongan_tk_totalpotongan" for="x_totalpotongan" class="<?php echo $potongan_tk_add->LeftColumnClass ?>"><?php echo $potongan_tk_add->totalpotongan->caption() ?><?php echo $potongan_tk_add->totalpotongan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $potongan_tk_add->RightColumnClass ?>"><div <?php echo $potongan_tk_add->totalpotongan->cellAttributes() ?>>
<span id="el_potongan_tk_totalpotongan">
<input type="text" data-table="potongan_tk" data-field="x_totalpotongan" name="x_totalpotongan" id="x_totalpotongan" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($potongan_tk_add->totalpotongan->getPlaceHolder()) ?>" value="<?php echo $potongan_tk_add->totalpotongan->EditValue ?>"<?php echo $potongan_tk_add->totalpotongan->editAttributes() ?>>
</span>
<?php echo $potongan_tk_add->totalpotongan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<?php if (strval($potongan_tk_add->pid->getSessionValue()) != "") { ?>
	<input type="hidden" name="x_pid" id="x_pid" value="<?php echo HtmlEncode(strval($potongan_tk_add->pid->getSessionValue())) ?>">
	<?php } ?>
<?php if (!$potongan_tk_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $potongan_tk_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $potongan_tk_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$potongan_tk_add->showPageFooter();
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
$potongan_tk_add->terminate();
?>