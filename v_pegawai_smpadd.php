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
$v_pegawai_smp_add = new v_pegawai_smp_add();

// Run the page
$v_pegawai_smp_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_pegawai_smp_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fv_pegawai_smpadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fv_pegawai_smpadd = currentForm = new ew.Form("fv_pegawai_smpadd", "add");

	// Validate form
	fv_pegawai_smpadd.validate = function() {
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
			<?php if ($v_pegawai_smp_add->nip->Required) { ?>
				elm = this.getElements("x" + infix + "_nip");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->nip->caption(), $v_pegawai_smp_add->nip->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->password->Required) { ?>
				elm = this.getElements("x" + infix + "_password");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->password->caption(), $v_pegawai_smp_add->password->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->jenjang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->jenjang_id->caption(), $v_pegawai_smp_add->jenjang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->jabatan->Required) { ?>
				elm = this.getElements("x" + infix + "_jabatan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->jabatan->caption(), $v_pegawai_smp_add->jabatan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->periode_jabatan->Required) { ?>
				elm = this.getElements("x" + infix + "_periode_jabatan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->periode_jabatan->caption(), $v_pegawai_smp_add->periode_jabatan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_periode_jabatan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pegawai_smp_add->periode_jabatan->errorMessage()) ?>");
			<?php if ($v_pegawai_smp_add->status_peg->Required) { ?>
				elm = this.getElements("x" + infix + "_status_peg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->status_peg->caption(), $v_pegawai_smp_add->status_peg->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->type->Required) { ?>
				elm = this.getElements("x" + infix + "_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->type->caption(), $v_pegawai_smp_add->type->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_type");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pegawai_smp_add->type->errorMessage()) ?>");
			<?php if ($v_pegawai_smp_add->sertif->Required) { ?>
				elm = this.getElements("x" + infix + "_sertif");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->sertif->caption(), $v_pegawai_smp_add->sertif->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->tambahan->Required) { ?>
				elm = this.getElements("x" + infix + "_tambahan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->tambahan->caption(), $v_pegawai_smp_add->tambahan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->lama_kerja->Required) { ?>
				elm = this.getElements("x" + infix + "_lama_kerja");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->lama_kerja->caption(), $v_pegawai_smp_add->lama_kerja->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_lama_kerja");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pegawai_smp_add->lama_kerja->errorMessage()) ?>");
			<?php if ($v_pegawai_smp_add->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->nama->caption(), $v_pegawai_smp_add->nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->alamat->Required) { ?>
				elm = this.getElements("x" + infix + "_alamat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->alamat->caption(), $v_pegawai_smp_add->alamat->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->_email->Required) { ?>
				elm = this.getElements("x" + infix + "__email");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->_email->caption(), $v_pegawai_smp_add->_email->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->wa->Required) { ?>
				elm = this.getElements("x" + infix + "_wa");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->wa->caption(), $v_pegawai_smp_add->wa->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->hp->Required) { ?>
				elm = this.getElements("x" + infix + "_hp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->hp->caption(), $v_pegawai_smp_add->hp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->tgllahir->Required) { ?>
				elm = this.getElements("x" + infix + "_tgllahir");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->tgllahir->caption(), $v_pegawai_smp_add->tgllahir->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tgllahir");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pegawai_smp_add->tgllahir->errorMessage()) ?>");
			<?php if ($v_pegawai_smp_add->rekbank->Required) { ?>
				elm = this.getElements("x" + infix + "_rekbank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->rekbank->caption(), $v_pegawai_smp_add->rekbank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->pendidikan->Required) { ?>
				elm = this.getElements("x" + infix + "_pendidikan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->pendidikan->caption(), $v_pegawai_smp_add->pendidikan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->jurusan->Required) { ?>
				elm = this.getElements("x" + infix + "_jurusan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->jurusan->caption(), $v_pegawai_smp_add->jurusan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->agama->Required) { ?>
				elm = this.getElements("x" + infix + "_agama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->agama->caption(), $v_pegawai_smp_add->agama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->jenkel->Required) { ?>
				elm = this.getElements("x" + infix + "_jenkel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->jenkel->caption(), $v_pegawai_smp_add->jenkel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_add->mulai_bekerja->Required) { ?>
				elm = this.getElements("x" + infix + "_mulai_bekerja");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->mulai_bekerja->caption(), $v_pegawai_smp_add->mulai_bekerja->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_mulai_bekerja");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pegawai_smp_add->mulai_bekerja->errorMessage()) ?>");
			<?php if ($v_pegawai_smp_add->level->Required) { ?>
				elm = this.getElements("x" + infix + "_level");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_add->level->caption(), $v_pegawai_smp_add->level->RequiredErrorMessage)) ?>");
			<?php } ?>

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
	fv_pegawai_smpadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fv_pegawai_smpadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fv_pegawai_smpadd.lists["x_jenjang_id"] = <?php echo $v_pegawai_smp_add->jenjang_id->Lookup->toClientList($v_pegawai_smp_add) ?>;
	fv_pegawai_smpadd.lists["x_jenjang_id"].options = <?php echo JsonEncode($v_pegawai_smp_add->jenjang_id->lookupOptions()) ?>;
	fv_pegawai_smpadd.lists["x_jabatan"] = <?php echo $v_pegawai_smp_add->jabatan->Lookup->toClientList($v_pegawai_smp_add) ?>;
	fv_pegawai_smpadd.lists["x_jabatan"].options = <?php echo JsonEncode($v_pegawai_smp_add->jabatan->lookupOptions()) ?>;
	fv_pegawai_smpadd.lists["x_status_peg"] = <?php echo $v_pegawai_smp_add->status_peg->Lookup->toClientList($v_pegawai_smp_add) ?>;
	fv_pegawai_smpadd.lists["x_status_peg"].options = <?php echo JsonEncode($v_pegawai_smp_add->status_peg->lookupOptions()) ?>;
	fv_pegawai_smpadd.lists["x_type"] = <?php echo $v_pegawai_smp_add->type->Lookup->toClientList($v_pegawai_smp_add) ?>;
	fv_pegawai_smpadd.lists["x_type"].options = <?php echo JsonEncode($v_pegawai_smp_add->type->lookupOptions()) ?>;
	fv_pegawai_smpadd.autoSuggests["x_type"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fv_pegawai_smpadd.lists["x_sertif"] = <?php echo $v_pegawai_smp_add->sertif->Lookup->toClientList($v_pegawai_smp_add) ?>;
	fv_pegawai_smpadd.lists["x_sertif"].options = <?php echo JsonEncode($v_pegawai_smp_add->sertif->lookupOptions()) ?>;
	fv_pegawai_smpadd.lists["x_tambahan"] = <?php echo $v_pegawai_smp_add->tambahan->Lookup->toClientList($v_pegawai_smp_add) ?>;
	fv_pegawai_smpadd.lists["x_tambahan"].options = <?php echo JsonEncode($v_pegawai_smp_add->tambahan->lookupOptions()) ?>;
	fv_pegawai_smpadd.lists["x_pendidikan"] = <?php echo $v_pegawai_smp_add->pendidikan->Lookup->toClientList($v_pegawai_smp_add) ?>;
	fv_pegawai_smpadd.lists["x_pendidikan"].options = <?php echo JsonEncode($v_pegawai_smp_add->pendidikan->lookupOptions()) ?>;
	fv_pegawai_smpadd.lists["x_agama"] = <?php echo $v_pegawai_smp_add->agama->Lookup->toClientList($v_pegawai_smp_add) ?>;
	fv_pegawai_smpadd.lists["x_agama"].options = <?php echo JsonEncode($v_pegawai_smp_add->agama->lookupOptions()) ?>;
	fv_pegawai_smpadd.lists["x_jenkel"] = <?php echo $v_pegawai_smp_add->jenkel->Lookup->toClientList($v_pegawai_smp_add) ?>;
	fv_pegawai_smpadd.lists["x_jenkel"].options = <?php echo JsonEncode($v_pegawai_smp_add->jenkel->lookupOptions()) ?>;
	fv_pegawai_smpadd.lists["x_level"] = <?php echo $v_pegawai_smp_add->level->Lookup->toClientList($v_pegawai_smp_add) ?>;
	fv_pegawai_smpadd.lists["x_level"].options = <?php echo JsonEncode($v_pegawai_smp_add->level->lookupOptions()) ?>;
	loadjs.done("fv_pegawai_smpadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $v_pegawai_smp_add->showPageHeader(); ?>
<?php
$v_pegawai_smp_add->showMessage();
?>
<form name="fv_pegawai_smpadd" id="fv_pegawai_smpadd" class="<?php echo $v_pegawai_smp_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v_pegawai_smp">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$v_pegawai_smp_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($v_pegawai_smp_add->nip->Visible) { // nip ?>
	<div id="r_nip" class="form-group row">
		<label id="elh_v_pegawai_smp_nip" for="x_nip" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->nip->caption() ?><?php echo $v_pegawai_smp_add->nip->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->nip->cellAttributes() ?>>
<span id="el_v_pegawai_smp_nip">
<input type="text" data-table="v_pegawai_smp" data-field="x_nip" name="x_nip" id="x_nip" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($v_pegawai_smp_add->nip->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_add->nip->EditValue ?>"<?php echo $v_pegawai_smp_add->nip->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->nip->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->password->Visible) { // password ?>
	<div id="r_password" class="form-group row">
		<label id="elh_v_pegawai_smp_password" for="x_password" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->password->caption() ?><?php echo $v_pegawai_smp_add->password->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->password->cellAttributes() ?>>
<span id="el_v_pegawai_smp_password">
<input type="text" data-table="v_pegawai_smp" data-field="x_password" name="x_password" id="x_password" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_add->password->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_add->password->EditValue ?>"<?php echo $v_pegawai_smp_add->password->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->password->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->jenjang_id->Visible) { // jenjang_id ?>
	<div id="r_jenjang_id" class="form-group row">
		<label id="elh_v_pegawai_smp_jenjang_id" for="x_jenjang_id" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->jenjang_id->caption() ?><?php echo $v_pegawai_smp_add->jenjang_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->jenjang_id->cellAttributes() ?>>
<span id="el_v_pegawai_smp_jenjang_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jenjang_id"><?php echo EmptyValue(strval($v_pegawai_smp_add->jenjang_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_pegawai_smp_add->jenjang_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_pegawai_smp_add->jenjang_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_pegawai_smp_add->jenjang_id->ReadOnly || $v_pegawai_smp_add->jenjang_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jenjang_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_pegawai_smp_add->jenjang_id->Lookup->getParamTag($v_pegawai_smp_add, "p_x_jenjang_id") ?>
<input type="hidden" data-table="v_pegawai_smp" data-field="x_jenjang_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_pegawai_smp_add->jenjang_id->displayValueSeparatorAttribute() ?>" name="x_jenjang_id" id="x_jenjang_id" value="<?php echo $v_pegawai_smp_add->jenjang_id->CurrentValue ?>"<?php echo $v_pegawai_smp_add->jenjang_id->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->jenjang_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->jabatan->Visible) { // jabatan ?>
	<div id="r_jabatan" class="form-group row">
		<label id="elh_v_pegawai_smp_jabatan" for="x_jabatan" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->jabatan->caption() ?><?php echo $v_pegawai_smp_add->jabatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->jabatan->cellAttributes() ?>>
<span id="el_v_pegawai_smp_jabatan">
<?php $v_pegawai_smp_add->jabatan->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jabatan"><?php echo EmptyValue(strval($v_pegawai_smp_add->jabatan->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_pegawai_smp_add->jabatan->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_pegawai_smp_add->jabatan->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_pegawai_smp_add->jabatan->ReadOnly || $v_pegawai_smp_add->jabatan->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jabatan',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_pegawai_smp_add->jabatan->Lookup->getParamTag($v_pegawai_smp_add, "p_x_jabatan") ?>
<input type="hidden" data-table="v_pegawai_smp" data-field="x_jabatan" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_pegawai_smp_add->jabatan->displayValueSeparatorAttribute() ?>" name="x_jabatan" id="x_jabatan" value="<?php echo $v_pegawai_smp_add->jabatan->CurrentValue ?>"<?php echo $v_pegawai_smp_add->jabatan->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->jabatan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->periode_jabatan->Visible) { // periode_jabatan ?>
	<div id="r_periode_jabatan" class="form-group row">
		<label id="elh_v_pegawai_smp_periode_jabatan" for="x_periode_jabatan" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->periode_jabatan->caption() ?><?php echo $v_pegawai_smp_add->periode_jabatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->periode_jabatan->cellAttributes() ?>>
<span id="el_v_pegawai_smp_periode_jabatan">
<input type="text" data-table="v_pegawai_smp" data-field="x_periode_jabatan" name="x_periode_jabatan" id="x_periode_jabatan" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($v_pegawai_smp_add->periode_jabatan->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_add->periode_jabatan->EditValue ?>"<?php echo $v_pegawai_smp_add->periode_jabatan->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->periode_jabatan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->status_peg->Visible) { // status_peg ?>
	<div id="r_status_peg" class="form-group row">
		<label id="elh_v_pegawai_smp_status_peg" for="x_status_peg" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->status_peg->caption() ?><?php echo $v_pegawai_smp_add->status_peg->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->status_peg->cellAttributes() ?>>
<span id="el_v_pegawai_smp_status_peg">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_status_peg"><?php echo EmptyValue(strval($v_pegawai_smp_add->status_peg->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_pegawai_smp_add->status_peg->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_pegawai_smp_add->status_peg->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_pegawai_smp_add->status_peg->ReadOnly || $v_pegawai_smp_add->status_peg->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_status_peg',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_pegawai_smp_add->status_peg->Lookup->getParamTag($v_pegawai_smp_add, "p_x_status_peg") ?>
<input type="hidden" data-table="v_pegawai_smp" data-field="x_status_peg" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_pegawai_smp_add->status_peg->displayValueSeparatorAttribute() ?>" name="x_status_peg" id="x_status_peg" value="<?php echo $v_pegawai_smp_add->status_peg->CurrentValue ?>"<?php echo $v_pegawai_smp_add->status_peg->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->status_peg->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->type->Visible) { // type ?>
	<div id="r_type" class="form-group row">
		<label id="elh_v_pegawai_smp_type" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->type->caption() ?><?php echo $v_pegawai_smp_add->type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->type->cellAttributes() ?>>
<span id="el_v_pegawai_smp_type">
<?php
$onchange = $v_pegawai_smp_add->type->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$v_pegawai_smp_add->type->EditAttrs["onchange"] = "";
?>
<span id="as_x_type">
	<input type="text" class="form-control" name="sv_x_type" id="sv_x_type" value="<?php echo RemoveHtml($v_pegawai_smp_add->type->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($v_pegawai_smp_add->type->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($v_pegawai_smp_add->type->getPlaceHolder()) ?>"<?php echo $v_pegawai_smp_add->type->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_pegawai_smp" data-field="x_type" data-value-separator="<?php echo $v_pegawai_smp_add->type->displayValueSeparatorAttribute() ?>" name="x_type" id="x_type" value="<?php echo HtmlEncode($v_pegawai_smp_add->type->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fv_pegawai_smpadd"], function() {
	fv_pegawai_smpadd.createAutoSuggest({"id":"x_type","forceSelect":false});
});
</script>
<?php echo $v_pegawai_smp_add->type->Lookup->getParamTag($v_pegawai_smp_add, "p_x_type") ?>
</span>
<?php echo $v_pegawai_smp_add->type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->sertif->Visible) { // sertif ?>
	<div id="r_sertif" class="form-group row">
		<label id="elh_v_pegawai_smp_sertif" for="x_sertif" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->sertif->caption() ?><?php echo $v_pegawai_smp_add->sertif->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->sertif->cellAttributes() ?>>
<span id="el_v_pegawai_smp_sertif">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_sertif"><?php echo EmptyValue(strval($v_pegawai_smp_add->sertif->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_pegawai_smp_add->sertif->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_pegawai_smp_add->sertif->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_pegawai_smp_add->sertif->ReadOnly || $v_pegawai_smp_add->sertif->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_sertif',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_pegawai_smp_add->sertif->Lookup->getParamTag($v_pegawai_smp_add, "p_x_sertif") ?>
<input type="hidden" data-table="v_pegawai_smp" data-field="x_sertif" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_pegawai_smp_add->sertif->displayValueSeparatorAttribute() ?>" name="x_sertif" id="x_sertif" value="<?php echo $v_pegawai_smp_add->sertif->CurrentValue ?>"<?php echo $v_pegawai_smp_add->sertif->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->sertif->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->tambahan->Visible) { // tambahan ?>
	<div id="r_tambahan" class="form-group row">
		<label id="elh_v_pegawai_smp_tambahan" for="x_tambahan" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->tambahan->caption() ?><?php echo $v_pegawai_smp_add->tambahan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->tambahan->cellAttributes() ?>>
<span id="el_v_pegawai_smp_tambahan">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_tambahan"><?php echo EmptyValue(strval($v_pegawai_smp_add->tambahan->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_pegawai_smp_add->tambahan->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_pegawai_smp_add->tambahan->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_pegawai_smp_add->tambahan->ReadOnly || $v_pegawai_smp_add->tambahan->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_tambahan',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_pegawai_smp_add->tambahan->Lookup->getParamTag($v_pegawai_smp_add, "p_x_tambahan") ?>
<input type="hidden" data-table="v_pegawai_smp" data-field="x_tambahan" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_pegawai_smp_add->tambahan->displayValueSeparatorAttribute() ?>" name="x_tambahan" id="x_tambahan" value="<?php echo $v_pegawai_smp_add->tambahan->CurrentValue ?>"<?php echo $v_pegawai_smp_add->tambahan->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->tambahan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->lama_kerja->Visible) { // lama_kerja ?>
	<div id="r_lama_kerja" class="form-group row">
		<label id="elh_v_pegawai_smp_lama_kerja" for="x_lama_kerja" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->lama_kerja->caption() ?><?php echo $v_pegawai_smp_add->lama_kerja->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->lama_kerja->cellAttributes() ?>>
<span id="el_v_pegawai_smp_lama_kerja">
<input type="text" data-table="v_pegawai_smp" data-field="x_lama_kerja" name="x_lama_kerja" id="x_lama_kerja" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($v_pegawai_smp_add->lama_kerja->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_add->lama_kerja->EditValue ?>"<?php echo $v_pegawai_smp_add->lama_kerja->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->lama_kerja->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->nama->Visible) { // nama ?>
	<div id="r_nama" class="form-group row">
		<label id="elh_v_pegawai_smp_nama" for="x_nama" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->nama->caption() ?><?php echo $v_pegawai_smp_add->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->nama->cellAttributes() ?>>
<span id="el_v_pegawai_smp_nama">
<input type="text" data-table="v_pegawai_smp" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_add->nama->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_add->nama->EditValue ?>"<?php echo $v_pegawai_smp_add->nama->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->alamat->Visible) { // alamat ?>
	<div id="r_alamat" class="form-group row">
		<label id="elh_v_pegawai_smp_alamat" for="x_alamat" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->alamat->caption() ?><?php echo $v_pegawai_smp_add->alamat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->alamat->cellAttributes() ?>>
<span id="el_v_pegawai_smp_alamat">
<input type="text" data-table="v_pegawai_smp" data-field="x_alamat" name="x_alamat" id="x_alamat" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_add->alamat->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_add->alamat->EditValue ?>"<?php echo $v_pegawai_smp_add->alamat->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->alamat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->_email->Visible) { // email ?>
	<div id="r__email" class="form-group row">
		<label id="elh_v_pegawai_smp__email" for="x__email" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->_email->caption() ?><?php echo $v_pegawai_smp_add->_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->_email->cellAttributes() ?>>
<span id="el_v_pegawai_smp__email">
<input type="text" data-table="v_pegawai_smp" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_add->_email->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_add->_email->EditValue ?>"<?php echo $v_pegawai_smp_add->_email->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->wa->Visible) { // wa ?>
	<div id="r_wa" class="form-group row">
		<label id="elh_v_pegawai_smp_wa" for="x_wa" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->wa->caption() ?><?php echo $v_pegawai_smp_add->wa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->wa->cellAttributes() ?>>
<span id="el_v_pegawai_smp_wa">
<input type="text" data-table="v_pegawai_smp" data-field="x_wa" name="x_wa" id="x_wa" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_add->wa->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_add->wa->EditValue ?>"<?php echo $v_pegawai_smp_add->wa->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->wa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->hp->Visible) { // hp ?>
	<div id="r_hp" class="form-group row">
		<label id="elh_v_pegawai_smp_hp" for="x_hp" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->hp->caption() ?><?php echo $v_pegawai_smp_add->hp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->hp->cellAttributes() ?>>
<span id="el_v_pegawai_smp_hp">
<input type="text" data-table="v_pegawai_smp" data-field="x_hp" name="x_hp" id="x_hp" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_add->hp->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_add->hp->EditValue ?>"<?php echo $v_pegawai_smp_add->hp->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->hp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->tgllahir->Visible) { // tgllahir ?>
	<div id="r_tgllahir" class="form-group row">
		<label id="elh_v_pegawai_smp_tgllahir" for="x_tgllahir" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->tgllahir->caption() ?><?php echo $v_pegawai_smp_add->tgllahir->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->tgllahir->cellAttributes() ?>>
<span id="el_v_pegawai_smp_tgllahir">
<input type="text" data-table="v_pegawai_smp" data-field="x_tgllahir" name="x_tgllahir" id="x_tgllahir" maxlength="10" placeholder="<?php echo HtmlEncode($v_pegawai_smp_add->tgllahir->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_add->tgllahir->EditValue ?>"<?php echo $v_pegawai_smp_add->tgllahir->editAttributes() ?>>
<?php if (!$v_pegawai_smp_add->tgllahir->ReadOnly && !$v_pegawai_smp_add->tgllahir->Disabled && !isset($v_pegawai_smp_add->tgllahir->EditAttrs["readonly"]) && !isset($v_pegawai_smp_add->tgllahir->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fv_pegawai_smpadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fv_pegawai_smpadd", "x_tgllahir", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $v_pegawai_smp_add->tgllahir->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->rekbank->Visible) { // rekbank ?>
	<div id="r_rekbank" class="form-group row">
		<label id="elh_v_pegawai_smp_rekbank" for="x_rekbank" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->rekbank->caption() ?><?php echo $v_pegawai_smp_add->rekbank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->rekbank->cellAttributes() ?>>
<span id="el_v_pegawai_smp_rekbank">
<input type="text" data-table="v_pegawai_smp" data-field="x_rekbank" name="x_rekbank" id="x_rekbank" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_add->rekbank->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_add->rekbank->EditValue ?>"<?php echo $v_pegawai_smp_add->rekbank->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->rekbank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->pendidikan->Visible) { // pendidikan ?>
	<div id="r_pendidikan" class="form-group row">
		<label id="elh_v_pegawai_smp_pendidikan" for="x_pendidikan" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->pendidikan->caption() ?><?php echo $v_pegawai_smp_add->pendidikan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->pendidikan->cellAttributes() ?>>
<span id="el_v_pegawai_smp_pendidikan">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_pendidikan"><?php echo EmptyValue(strval($v_pegawai_smp_add->pendidikan->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_pegawai_smp_add->pendidikan->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_pegawai_smp_add->pendidikan->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_pegawai_smp_add->pendidikan->ReadOnly || $v_pegawai_smp_add->pendidikan->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_pendidikan',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_pegawai_smp_add->pendidikan->Lookup->getParamTag($v_pegawai_smp_add, "p_x_pendidikan") ?>
<input type="hidden" data-table="v_pegawai_smp" data-field="x_pendidikan" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_pegawai_smp_add->pendidikan->displayValueSeparatorAttribute() ?>" name="x_pendidikan" id="x_pendidikan" value="<?php echo $v_pegawai_smp_add->pendidikan->CurrentValue ?>"<?php echo $v_pegawai_smp_add->pendidikan->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->pendidikan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->jurusan->Visible) { // jurusan ?>
	<div id="r_jurusan" class="form-group row">
		<label id="elh_v_pegawai_smp_jurusan" for="x_jurusan" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->jurusan->caption() ?><?php echo $v_pegawai_smp_add->jurusan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->jurusan->cellAttributes() ?>>
<span id="el_v_pegawai_smp_jurusan">
<input type="text" data-table="v_pegawai_smp" data-field="x_jurusan" name="x_jurusan" id="x_jurusan" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($v_pegawai_smp_add->jurusan->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_add->jurusan->EditValue ?>"<?php echo $v_pegawai_smp_add->jurusan->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->jurusan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->agama->Visible) { // agama ?>
	<div id="r_agama" class="form-group row">
		<label id="elh_v_pegawai_smp_agama" for="x_agama" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->agama->caption() ?><?php echo $v_pegawai_smp_add->agama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->agama->cellAttributes() ?>>
<span id="el_v_pegawai_smp_agama">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v_pegawai_smp" data-field="x_agama" data-value-separator="<?php echo $v_pegawai_smp_add->agama->displayValueSeparatorAttribute() ?>" id="x_agama" name="x_agama"<?php echo $v_pegawai_smp_add->agama->editAttributes() ?>>
			<?php echo $v_pegawai_smp_add->agama->selectOptionListHtml("x_agama") ?>
		</select>
</div>
<?php echo $v_pegawai_smp_add->agama->Lookup->getParamTag($v_pegawai_smp_add, "p_x_agama") ?>
</span>
<?php echo $v_pegawai_smp_add->agama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->jenkel->Visible) { // jenkel ?>
	<div id="r_jenkel" class="form-group row">
		<label id="elh_v_pegawai_smp_jenkel" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->jenkel->caption() ?><?php echo $v_pegawai_smp_add->jenkel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->jenkel->cellAttributes() ?>>
<span id="el_v_pegawai_smp_jenkel">
<div id="tp_x_jenkel" class="ew-template"><input type="radio" class="custom-control-input" data-table="v_pegawai_smp" data-field="x_jenkel" data-value-separator="<?php echo $v_pegawai_smp_add->jenkel->displayValueSeparatorAttribute() ?>" name="x_jenkel" id="x_jenkel" value="{value}"<?php echo $v_pegawai_smp_add->jenkel->editAttributes() ?>></div>
<div id="dsl_x_jenkel" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $v_pegawai_smp_add->jenkel->radioButtonListHtml(FALSE, "x_jenkel") ?>
</div></div>
<?php echo $v_pegawai_smp_add->jenkel->Lookup->getParamTag($v_pegawai_smp_add, "p_x_jenkel") ?>
</span>
<?php echo $v_pegawai_smp_add->jenkel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->mulai_bekerja->Visible) { // mulai_bekerja ?>
	<div id="r_mulai_bekerja" class="form-group row">
		<label id="elh_v_pegawai_smp_mulai_bekerja" for="x_mulai_bekerja" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->mulai_bekerja->caption() ?><?php echo $v_pegawai_smp_add->mulai_bekerja->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->mulai_bekerja->cellAttributes() ?>>
<span id="el_v_pegawai_smp_mulai_bekerja">
<input type="text" data-table="v_pegawai_smp" data-field="x_mulai_bekerja" name="x_mulai_bekerja" id="x_mulai_bekerja" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($v_pegawai_smp_add->mulai_bekerja->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_add->mulai_bekerja->EditValue ?>"<?php echo $v_pegawai_smp_add->mulai_bekerja->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_add->mulai_bekerja->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_add->level->Visible) { // level ?>
	<div id="r_level" class="form-group row">
		<label id="elh_v_pegawai_smp_level" for="x_level" class="<?php echo $v_pegawai_smp_add->LeftColumnClass ?>"><?php echo $v_pegawai_smp_add->level->caption() ?><?php echo $v_pegawai_smp_add->level->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_add->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_add->level->cellAttributes() ?>>
<span id="el_v_pegawai_smp_level">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v_pegawai_smp" data-field="x_level" data-value-separator="<?php echo $v_pegawai_smp_add->level->displayValueSeparatorAttribute() ?>" id="x_level" name="x_level"<?php echo $v_pegawai_smp_add->level->editAttributes() ?>>
			<?php echo $v_pegawai_smp_add->level->selectOptionListHtml("x_level") ?>
		</select>
</div>
<?php echo $v_pegawai_smp_add->level->Lookup->getParamTag($v_pegawai_smp_add, "p_x_level") ?>
</span>
<?php echo $v_pegawai_smp_add->level->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$v_pegawai_smp_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $v_pegawai_smp_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $v_pegawai_smp_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$v_pegawai_smp_add->showPageFooter();
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
$v_pegawai_smp_add->terminate();
?>