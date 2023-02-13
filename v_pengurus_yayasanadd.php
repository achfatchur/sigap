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
$v_pengurus_yayasan_add = new v_pengurus_yayasan_add();

// Run the page
$v_pengurus_yayasan_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_pengurus_yayasan_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fv_pengurus_yayasanadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fv_pengurus_yayasanadd = currentForm = new ew.Form("fv_pengurus_yayasanadd", "add");

	// Validate form
	fv_pengurus_yayasanadd.validate = function() {
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
			<?php if ($v_pengurus_yayasan_add->nip->Required) { ?>
				elm = this.getElements("x" + infix + "_nip");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_add->nip->caption(), $v_pengurus_yayasan_add->nip->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_add->password->Required) { ?>
				elm = this.getElements("x" + infix + "_password");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_add->password->caption(), $v_pengurus_yayasan_add->password->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_add->jabatan->Required) { ?>
				elm = this.getElements("x" + infix + "_jabatan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_add->jabatan->caption(), $v_pengurus_yayasan_add->jabatan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jabatan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pengurus_yayasan_add->jabatan->errorMessage()) ?>");
			<?php if ($v_pengurus_yayasan_add->lama_kerja->Required) { ?>
				elm = this.getElements("x" + infix + "_lama_kerja");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_add->lama_kerja->caption(), $v_pengurus_yayasan_add->lama_kerja->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_lama_kerja");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pengurus_yayasan_add->lama_kerja->errorMessage()) ?>");
			<?php if ($v_pengurus_yayasan_add->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_add->nama->caption(), $v_pengurus_yayasan_add->nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_add->alamat->Required) { ?>
				elm = this.getElements("x" + infix + "_alamat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_add->alamat->caption(), $v_pengurus_yayasan_add->alamat->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_add->_email->Required) { ?>
				elm = this.getElements("x" + infix + "__email");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_add->_email->caption(), $v_pengurus_yayasan_add->_email->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_add->wa->Required) { ?>
				elm = this.getElements("x" + infix + "_wa");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_add->wa->caption(), $v_pengurus_yayasan_add->wa->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_add->hp->Required) { ?>
				elm = this.getElements("x" + infix + "_hp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_add->hp->caption(), $v_pengurus_yayasan_add->hp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_add->rekbank->Required) { ?>
				elm = this.getElements("x" + infix + "_rekbank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_add->rekbank->caption(), $v_pengurus_yayasan_add->rekbank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_add->agama->Required) { ?>
				elm = this.getElements("x" + infix + "_agama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_add->agama->caption(), $v_pengurus_yayasan_add->agama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_add->jenkel->Required) { ?>
				elm = this.getElements("x" + infix + "_jenkel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_add->jenkel->caption(), $v_pengurus_yayasan_add->jenkel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_add->level->Required) { ?>
				elm = this.getElements("x" + infix + "_level");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_add->level->caption(), $v_pengurus_yayasan_add->level->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_level");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pengurus_yayasan_add->level->errorMessage()) ?>");
			<?php if ($v_pengurus_yayasan_add->kehadiran->Required) { ?>
				elm = this.getElements("x" + infix + "_kehadiran");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_add->kehadiran->caption(), $v_pengurus_yayasan_add->kehadiran->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_kehadiran");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pengurus_yayasan_add->kehadiran->errorMessage()) ?>");

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
	fv_pengurus_yayasanadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fv_pengurus_yayasanadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fv_pengurus_yayasanadd.lists["x_jabatan"] = <?php echo $v_pengurus_yayasan_add->jabatan->Lookup->toClientList($v_pengurus_yayasan_add) ?>;
	fv_pengurus_yayasanadd.lists["x_jabatan"].options = <?php echo JsonEncode($v_pengurus_yayasan_add->jabatan->lookupOptions()) ?>;
	fv_pengurus_yayasanadd.autoSuggests["x_jabatan"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fv_pengurus_yayasanadd.lists["x_agama"] = <?php echo $v_pengurus_yayasan_add->agama->Lookup->toClientList($v_pengurus_yayasan_add) ?>;
	fv_pengurus_yayasanadd.lists["x_agama"].options = <?php echo JsonEncode($v_pengurus_yayasan_add->agama->lookupOptions()) ?>;
	fv_pengurus_yayasanadd.autoSuggests["x_agama"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fv_pengurus_yayasanadd.lists["x_jenkel"] = <?php echo $v_pengurus_yayasan_add->jenkel->Lookup->toClientList($v_pengurus_yayasan_add) ?>;
	fv_pengurus_yayasanadd.lists["x_jenkel"].options = <?php echo JsonEncode($v_pengurus_yayasan_add->jenkel->lookupOptions()) ?>;
	fv_pengurus_yayasanadd.lists["x_level"] = <?php echo $v_pengurus_yayasan_add->level->Lookup->toClientList($v_pengurus_yayasan_add) ?>;
	fv_pengurus_yayasanadd.lists["x_level"].options = <?php echo JsonEncode($v_pengurus_yayasan_add->level->lookupOptions()) ?>;
	fv_pengurus_yayasanadd.autoSuggests["x_level"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fv_pengurus_yayasanadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $v_pengurus_yayasan_add->showPageHeader(); ?>
<?php
$v_pengurus_yayasan_add->showMessage();
?>
<form name="fv_pengurus_yayasanadd" id="fv_pengurus_yayasanadd" class="<?php echo $v_pengurus_yayasan_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v_pengurus_yayasan">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$v_pengurus_yayasan_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($v_pengurus_yayasan_add->nip->Visible) { // nip ?>
	<div id="r_nip" class="form-group row">
		<label id="elh_v_pengurus_yayasan_nip" for="x_nip" class="<?php echo $v_pengurus_yayasan_add->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_add->nip->caption() ?><?php echo $v_pengurus_yayasan_add->nip->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_add->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_add->nip->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_nip">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_nip" name="x_nip" id="x_nip" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->nip->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_add->nip->EditValue ?>"<?php echo $v_pengurus_yayasan_add->nip->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_add->nip->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_add->password->Visible) { // password ?>
	<div id="r_password" class="form-group row">
		<label id="elh_v_pengurus_yayasan_password" for="x_password" class="<?php echo $v_pengurus_yayasan_add->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_add->password->caption() ?><?php echo $v_pengurus_yayasan_add->password->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_add->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_add->password->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_password">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_password" name="x_password" id="x_password" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->password->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_add->password->EditValue ?>"<?php echo $v_pengurus_yayasan_add->password->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_add->password->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_add->jabatan->Visible) { // jabatan ?>
	<div id="r_jabatan" class="form-group row">
		<label id="elh_v_pengurus_yayasan_jabatan" class="<?php echo $v_pengurus_yayasan_add->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_add->jabatan->caption() ?><?php echo $v_pengurus_yayasan_add->jabatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_add->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_add->jabatan->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_jabatan">
<?php
$onchange = $v_pengurus_yayasan_add->jabatan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$v_pengurus_yayasan_add->jabatan->EditAttrs["onchange"] = "";
?>
<span id="as_x_jabatan">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_jabatan" id="sv_x_jabatan" value="<?php echo RemoveHtml($v_pengurus_yayasan_add->jabatan->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->jabatan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->jabatan->getPlaceHolder()) ?>"<?php echo $v_pengurus_yayasan_add->jabatan->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_pengurus_yayasan_add->jabatan->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_jabatan',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($v_pengurus_yayasan_add->jabatan->ReadOnly || $v_pengurus_yayasan_add->jabatan->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="v_pengurus_yayasan" data-field="x_jabatan" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_pengurus_yayasan_add->jabatan->displayValueSeparatorAttribute() ?>" name="x_jabatan" id="x_jabatan" value="<?php echo HtmlEncode($v_pengurus_yayasan_add->jabatan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fv_pengurus_yayasanadd"], function() {
	fv_pengurus_yayasanadd.createAutoSuggest({"id":"x_jabatan","forceSelect":false});
});
</script>
<?php echo $v_pengurus_yayasan_add->jabatan->Lookup->getParamTag($v_pengurus_yayasan_add, "p_x_jabatan") ?>
</span>
<?php echo $v_pengurus_yayasan_add->jabatan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_add->lama_kerja->Visible) { // lama_kerja ?>
	<div id="r_lama_kerja" class="form-group row">
		<label id="elh_v_pengurus_yayasan_lama_kerja" for="x_lama_kerja" class="<?php echo $v_pengurus_yayasan_add->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_add->lama_kerja->caption() ?><?php echo $v_pengurus_yayasan_add->lama_kerja->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_add->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_add->lama_kerja->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_lama_kerja">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_lama_kerja" name="x_lama_kerja" id="x_lama_kerja" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->lama_kerja->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_add->lama_kerja->EditValue ?>"<?php echo $v_pengurus_yayasan_add->lama_kerja->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_add->lama_kerja->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_add->nama->Visible) { // nama ?>
	<div id="r_nama" class="form-group row">
		<label id="elh_v_pengurus_yayasan_nama" for="x_nama" class="<?php echo $v_pengurus_yayasan_add->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_add->nama->caption() ?><?php echo $v_pengurus_yayasan_add->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_add->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_add->nama->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_nama">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->nama->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_add->nama->EditValue ?>"<?php echo $v_pengurus_yayasan_add->nama->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_add->nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_add->alamat->Visible) { // alamat ?>
	<div id="r_alamat" class="form-group row">
		<label id="elh_v_pengurus_yayasan_alamat" for="x_alamat" class="<?php echo $v_pengurus_yayasan_add->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_add->alamat->caption() ?><?php echo $v_pengurus_yayasan_add->alamat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_add->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_add->alamat->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_alamat">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_alamat" name="x_alamat" id="x_alamat" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->alamat->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_add->alamat->EditValue ?>"<?php echo $v_pengurus_yayasan_add->alamat->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_add->alamat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_add->_email->Visible) { // email ?>
	<div id="r__email" class="form-group row">
		<label id="elh_v_pengurus_yayasan__email" for="x__email" class="<?php echo $v_pengurus_yayasan_add->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_add->_email->caption() ?><?php echo $v_pengurus_yayasan_add->_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_add->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_add->_email->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan__email">
<input type="text" data-table="v_pengurus_yayasan" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->_email->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_add->_email->EditValue ?>"<?php echo $v_pengurus_yayasan_add->_email->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_add->_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_add->wa->Visible) { // wa ?>
	<div id="r_wa" class="form-group row">
		<label id="elh_v_pengurus_yayasan_wa" for="x_wa" class="<?php echo $v_pengurus_yayasan_add->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_add->wa->caption() ?><?php echo $v_pengurus_yayasan_add->wa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_add->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_add->wa->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_wa">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_wa" name="x_wa" id="x_wa" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->wa->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_add->wa->EditValue ?>"<?php echo $v_pengurus_yayasan_add->wa->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_add->wa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_add->hp->Visible) { // hp ?>
	<div id="r_hp" class="form-group row">
		<label id="elh_v_pengurus_yayasan_hp" for="x_hp" class="<?php echo $v_pengurus_yayasan_add->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_add->hp->caption() ?><?php echo $v_pengurus_yayasan_add->hp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_add->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_add->hp->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_hp">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_hp" name="x_hp" id="x_hp" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->hp->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_add->hp->EditValue ?>"<?php echo $v_pengurus_yayasan_add->hp->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_add->hp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_add->rekbank->Visible) { // rekbank ?>
	<div id="r_rekbank" class="form-group row">
		<label id="elh_v_pengurus_yayasan_rekbank" for="x_rekbank" class="<?php echo $v_pengurus_yayasan_add->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_add->rekbank->caption() ?><?php echo $v_pengurus_yayasan_add->rekbank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_add->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_add->rekbank->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_rekbank">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_rekbank" name="x_rekbank" id="x_rekbank" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->rekbank->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_add->rekbank->EditValue ?>"<?php echo $v_pengurus_yayasan_add->rekbank->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_add->rekbank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_add->agama->Visible) { // agama ?>
	<div id="r_agama" class="form-group row">
		<label id="elh_v_pengurus_yayasan_agama" class="<?php echo $v_pengurus_yayasan_add->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_add->agama->caption() ?><?php echo $v_pengurus_yayasan_add->agama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_add->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_add->agama->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_agama">
<?php
$onchange = $v_pengurus_yayasan_add->agama->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$v_pengurus_yayasan_add->agama->EditAttrs["onchange"] = "";
?>
<span id="as_x_agama">
	<input type="text" class="form-control" name="sv_x_agama" id="sv_x_agama" value="<?php echo RemoveHtml($v_pengurus_yayasan_add->agama->EditValue) ?>" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->agama->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->agama->getPlaceHolder()) ?>"<?php echo $v_pengurus_yayasan_add->agama->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_pengurus_yayasan" data-field="x_agama" data-value-separator="<?php echo $v_pengurus_yayasan_add->agama->displayValueSeparatorAttribute() ?>" name="x_agama" id="x_agama" value="<?php echo HtmlEncode($v_pengurus_yayasan_add->agama->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fv_pengurus_yayasanadd"], function() {
	fv_pengurus_yayasanadd.createAutoSuggest({"id":"x_agama","forceSelect":false});
});
</script>
<?php echo $v_pengurus_yayasan_add->agama->Lookup->getParamTag($v_pengurus_yayasan_add, "p_x_agama") ?>
</span>
<?php echo $v_pengurus_yayasan_add->agama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_add->jenkel->Visible) { // jenkel ?>
	<div id="r_jenkel" class="form-group row">
		<label id="elh_v_pengurus_yayasan_jenkel" class="<?php echo $v_pengurus_yayasan_add->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_add->jenkel->caption() ?><?php echo $v_pengurus_yayasan_add->jenkel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_add->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_add->jenkel->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_jenkel">
<div id="tp_x_jenkel" class="ew-template"><input type="radio" class="custom-control-input" data-table="v_pengurus_yayasan" data-field="x_jenkel" data-value-separator="<?php echo $v_pengurus_yayasan_add->jenkel->displayValueSeparatorAttribute() ?>" name="x_jenkel" id="x_jenkel" value="{value}"<?php echo $v_pengurus_yayasan_add->jenkel->editAttributes() ?>></div>
<div id="dsl_x_jenkel" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $v_pengurus_yayasan_add->jenkel->radioButtonListHtml(FALSE, "x_jenkel") ?>
</div></div>
<?php echo $v_pengurus_yayasan_add->jenkel->Lookup->getParamTag($v_pengurus_yayasan_add, "p_x_jenkel") ?>
</span>
<?php echo $v_pengurus_yayasan_add->jenkel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_add->level->Visible) { // level ?>
	<div id="r_level" class="form-group row">
		<label id="elh_v_pengurus_yayasan_level" class="<?php echo $v_pengurus_yayasan_add->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_add->level->caption() ?><?php echo $v_pengurus_yayasan_add->level->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_add->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_add->level->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_level">
<?php
$onchange = $v_pengurus_yayasan_add->level->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$v_pengurus_yayasan_add->level->EditAttrs["onchange"] = "";
?>
<span id="as_x_level">
	<input type="text" class="form-control" name="sv_x_level" id="sv_x_level" value="<?php echo RemoveHtml($v_pengurus_yayasan_add->level->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->level->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->level->getPlaceHolder()) ?>"<?php echo $v_pengurus_yayasan_add->level->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_pengurus_yayasan" data-field="x_level" data-value-separator="<?php echo $v_pengurus_yayasan_add->level->displayValueSeparatorAttribute() ?>" name="x_level" id="x_level" value="<?php echo HtmlEncode($v_pengurus_yayasan_add->level->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fv_pengurus_yayasanadd"], function() {
	fv_pengurus_yayasanadd.createAutoSuggest({"id":"x_level","forceSelect":false});
});
</script>
<?php echo $v_pengurus_yayasan_add->level->Lookup->getParamTag($v_pengurus_yayasan_add, "p_x_level") ?>
</span>
<?php echo $v_pengurus_yayasan_add->level->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_add->kehadiran->Visible) { // kehadiran ?>
	<div id="r_kehadiran" class="form-group row">
		<label id="elh_v_pengurus_yayasan_kehadiran" for="x_kehadiran" class="<?php echo $v_pengurus_yayasan_add->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_add->kehadiran->caption() ?><?php echo $v_pengurus_yayasan_add->kehadiran->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_add->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_add->kehadiran->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_kehadiran">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_kehadiran" name="x_kehadiran" id="x_kehadiran" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_add->kehadiran->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_add->kehadiran->EditValue ?>"<?php echo $v_pengurus_yayasan_add->kehadiran->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_add->kehadiran->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$v_pengurus_yayasan_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $v_pengurus_yayasan_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $v_pengurus_yayasan_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$v_pengurus_yayasan_add->showPageFooter();
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
$v_pengurus_yayasan_add->terminate();
?>