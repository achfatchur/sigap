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
$v_pegawai_smp_edit = new v_pegawai_smp_edit();

// Run the page
$v_pegawai_smp_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_pegawai_smp_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fv_pegawai_smpedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fv_pegawai_smpedit = currentForm = new ew.Form("fv_pegawai_smpedit", "edit");

	// Validate form
	fv_pegawai_smpedit.validate = function() {
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
			<?php if ($v_pegawai_smp_edit->nip->Required) { ?>
				elm = this.getElements("x" + infix + "_nip");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->nip->caption(), $v_pegawai_smp_edit->nip->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->username->Required) { ?>
				elm = this.getElements("x" + infix + "_username");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->username->caption(), $v_pegawai_smp_edit->username->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->password->Required) { ?>
				elm = this.getElements("x" + infix + "_password");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->password->caption(), $v_pegawai_smp_edit->password->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->jenjang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->jenjang_id->caption(), $v_pegawai_smp_edit->jenjang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->jabatan->Required) { ?>
				elm = this.getElements("x" + infix + "_jabatan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->jabatan->caption(), $v_pegawai_smp_edit->jabatan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->periode_jabatan->Required) { ?>
				elm = this.getElements("x" + infix + "_periode_jabatan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->periode_jabatan->caption(), $v_pegawai_smp_edit->periode_jabatan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_periode_jabatan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pegawai_smp_edit->periode_jabatan->errorMessage()) ?>");
			<?php if ($v_pegawai_smp_edit->jjm->Required) { ?>
				elm = this.getElements("x" + infix + "_jjm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->jjm->caption(), $v_pegawai_smp_edit->jjm->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jjm");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pegawai_smp_edit->jjm->errorMessage()) ?>");
			<?php if ($v_pegawai_smp_edit->status_peg->Required) { ?>
				elm = this.getElements("x" + infix + "_status_peg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->status_peg->caption(), $v_pegawai_smp_edit->status_peg->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->type->Required) { ?>
				elm = this.getElements("x" + infix + "_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->type->caption(), $v_pegawai_smp_edit->type->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_type");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pegawai_smp_edit->type->errorMessage()) ?>");
			<?php if ($v_pegawai_smp_edit->sertif->Required) { ?>
				elm = this.getElements("x" + infix + "_sertif");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->sertif->caption(), $v_pegawai_smp_edit->sertif->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->tambahan->Required) { ?>
				elm = this.getElements("x" + infix + "_tambahan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->tambahan->caption(), $v_pegawai_smp_edit->tambahan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->lama_kerja->Required) { ?>
				elm = this.getElements("x" + infix + "_lama_kerja");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->lama_kerja->caption(), $v_pegawai_smp_edit->lama_kerja->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_lama_kerja");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pegawai_smp_edit->lama_kerja->errorMessage()) ?>");
			<?php if ($v_pegawai_smp_edit->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->nama->caption(), $v_pegawai_smp_edit->nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->alamat->Required) { ?>
				elm = this.getElements("x" + infix + "_alamat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->alamat->caption(), $v_pegawai_smp_edit->alamat->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->_email->Required) { ?>
				elm = this.getElements("x" + infix + "__email");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->_email->caption(), $v_pegawai_smp_edit->_email->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->wa->Required) { ?>
				elm = this.getElements("x" + infix + "_wa");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->wa->caption(), $v_pegawai_smp_edit->wa->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->hp->Required) { ?>
				elm = this.getElements("x" + infix + "_hp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->hp->caption(), $v_pegawai_smp_edit->hp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->tgllahir->Required) { ?>
				elm = this.getElements("x" + infix + "_tgllahir");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->tgllahir->caption(), $v_pegawai_smp_edit->tgllahir->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tgllahir");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pegawai_smp_edit->tgllahir->errorMessage()) ?>");
			<?php if ($v_pegawai_smp_edit->rekbank->Required) { ?>
				elm = this.getElements("x" + infix + "_rekbank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->rekbank->caption(), $v_pegawai_smp_edit->rekbank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->pendidikan->Required) { ?>
				elm = this.getElements("x" + infix + "_pendidikan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->pendidikan->caption(), $v_pegawai_smp_edit->pendidikan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->jurusan->Required) { ?>
				elm = this.getElements("x" + infix + "_jurusan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->jurusan->caption(), $v_pegawai_smp_edit->jurusan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->agama->Required) { ?>
				elm = this.getElements("x" + infix + "_agama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->agama->caption(), $v_pegawai_smp_edit->agama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->jenkel->Required) { ?>
				elm = this.getElements("x" + infix + "_jenkel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->jenkel->caption(), $v_pegawai_smp_edit->jenkel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->status->caption(), $v_pegawai_smp_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->foto->Required) { ?>
				felm = this.getElements("x" + infix + "_foto");
				elm = this.getElements("fn_x" + infix + "_foto");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->foto->caption(), $v_pegawai_smp_edit->foto->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->file_cv->Required) { ?>
				felm = this.getElements("x" + infix + "_file_cv");
				elm = this.getElements("fn_x" + infix + "_file_cv");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->file_cv->caption(), $v_pegawai_smp_edit->file_cv->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->mulai_bekerja->Required) { ?>
				elm = this.getElements("x" + infix + "_mulai_bekerja");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->mulai_bekerja->caption(), $v_pegawai_smp_edit->mulai_bekerja->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_mulai_bekerja");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pegawai_smp_edit->mulai_bekerja->errorMessage()) ?>");
			<?php if ($v_pegawai_smp_edit->keterangan->Required) { ?>
				elm = this.getElements("x" + infix + "_keterangan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->keterangan->caption(), $v_pegawai_smp_edit->keterangan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->level->Required) { ?>
				elm = this.getElements("x" + infix + "_level");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->level->caption(), $v_pegawai_smp_edit->level->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pegawai_smp_edit->aktif->Required) { ?>
				elm = this.getElements("x" + infix + "_aktif");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->aktif->caption(), $v_pegawai_smp_edit->aktif->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_aktif");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pegawai_smp_edit->aktif->errorMessage()) ?>");
			<?php if ($v_pegawai_smp_edit->kehadiran->Required) { ?>
				elm = this.getElements("x" + infix + "_kehadiran");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pegawai_smp_edit->kehadiran->caption(), $v_pegawai_smp_edit->kehadiran->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_kehadiran");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pegawai_smp_edit->kehadiran->errorMessage()) ?>");

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
	fv_pegawai_smpedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fv_pegawai_smpedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fv_pegawai_smpedit.lists["x_jenjang_id"] = <?php echo $v_pegawai_smp_edit->jenjang_id->Lookup->toClientList($v_pegawai_smp_edit) ?>;
	fv_pegawai_smpedit.lists["x_jenjang_id"].options = <?php echo JsonEncode($v_pegawai_smp_edit->jenjang_id->lookupOptions()) ?>;
	fv_pegawai_smpedit.lists["x_jabatan"] = <?php echo $v_pegawai_smp_edit->jabatan->Lookup->toClientList($v_pegawai_smp_edit) ?>;
	fv_pegawai_smpedit.lists["x_jabatan"].options = <?php echo JsonEncode($v_pegawai_smp_edit->jabatan->lookupOptions()) ?>;
	fv_pegawai_smpedit.lists["x_status_peg"] = <?php echo $v_pegawai_smp_edit->status_peg->Lookup->toClientList($v_pegawai_smp_edit) ?>;
	fv_pegawai_smpedit.lists["x_status_peg"].options = <?php echo JsonEncode($v_pegawai_smp_edit->status_peg->lookupOptions()) ?>;
	fv_pegawai_smpedit.lists["x_type"] = <?php echo $v_pegawai_smp_edit->type->Lookup->toClientList($v_pegawai_smp_edit) ?>;
	fv_pegawai_smpedit.lists["x_type"].options = <?php echo JsonEncode($v_pegawai_smp_edit->type->lookupOptions()) ?>;
	fv_pegawai_smpedit.autoSuggests["x_type"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fv_pegawai_smpedit.lists["x_sertif"] = <?php echo $v_pegawai_smp_edit->sertif->Lookup->toClientList($v_pegawai_smp_edit) ?>;
	fv_pegawai_smpedit.lists["x_sertif"].options = <?php echo JsonEncode($v_pegawai_smp_edit->sertif->lookupOptions()) ?>;
	fv_pegawai_smpedit.lists["x_tambahan"] = <?php echo $v_pegawai_smp_edit->tambahan->Lookup->toClientList($v_pegawai_smp_edit) ?>;
	fv_pegawai_smpedit.lists["x_tambahan"].options = <?php echo JsonEncode($v_pegawai_smp_edit->tambahan->lookupOptions()) ?>;
	fv_pegawai_smpedit.lists["x_pendidikan"] = <?php echo $v_pegawai_smp_edit->pendidikan->Lookup->toClientList($v_pegawai_smp_edit) ?>;
	fv_pegawai_smpedit.lists["x_pendidikan"].options = <?php echo JsonEncode($v_pegawai_smp_edit->pendidikan->lookupOptions()) ?>;
	fv_pegawai_smpedit.lists["x_agama"] = <?php echo $v_pegawai_smp_edit->agama->Lookup->toClientList($v_pegawai_smp_edit) ?>;
	fv_pegawai_smpedit.lists["x_agama"].options = <?php echo JsonEncode($v_pegawai_smp_edit->agama->lookupOptions()) ?>;
	fv_pegawai_smpedit.lists["x_jenkel"] = <?php echo $v_pegawai_smp_edit->jenkel->Lookup->toClientList($v_pegawai_smp_edit) ?>;
	fv_pegawai_smpedit.lists["x_jenkel"].options = <?php echo JsonEncode($v_pegawai_smp_edit->jenkel->lookupOptions()) ?>;
	fv_pegawai_smpedit.lists["x_level"] = <?php echo $v_pegawai_smp_edit->level->Lookup->toClientList($v_pegawai_smp_edit) ?>;
	fv_pegawai_smpedit.lists["x_level"].options = <?php echo JsonEncode($v_pegawai_smp_edit->level->lookupOptions()) ?>;
	loadjs.done("fv_pegawai_smpedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $v_pegawai_smp_edit->showPageHeader(); ?>
<?php
$v_pegawai_smp_edit->showMessage();
?>
<form name="fv_pegawai_smpedit" id="fv_pegawai_smpedit" class="<?php echo $v_pegawai_smp_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v_pegawai_smp">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$v_pegawai_smp_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($v_pegawai_smp_edit->nip->Visible) { // nip ?>
	<div id="r_nip" class="form-group row">
		<label id="elh_v_pegawai_smp_nip" for="x_nip" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->nip->caption() ?><?php echo $v_pegawai_smp_edit->nip->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->nip->cellAttributes() ?>>
<span id="el_v_pegawai_smp_nip">
<input type="text" data-table="v_pegawai_smp" data-field="x_nip" name="x_nip" id="x_nip" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->nip->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->nip->EditValue ?>"<?php echo $v_pegawai_smp_edit->nip->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->nip->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->username->Visible) { // username ?>
	<div id="r_username" class="form-group row">
		<label id="elh_v_pegawai_smp_username" for="x_username" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->username->caption() ?><?php echo $v_pegawai_smp_edit->username->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->username->cellAttributes() ?>>
<span id="el_v_pegawai_smp_username">
<input type="text" data-table="v_pegawai_smp" data-field="x_username" name="x_username" id="x_username" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->username->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->username->EditValue ?>"<?php echo $v_pegawai_smp_edit->username->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->username->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->password->Visible) { // password ?>
	<div id="r_password" class="form-group row">
		<label id="elh_v_pegawai_smp_password" for="x_password" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->password->caption() ?><?php echo $v_pegawai_smp_edit->password->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->password->cellAttributes() ?>>
<span id="el_v_pegawai_smp_password">
<input type="text" data-table="v_pegawai_smp" data-field="x_password" name="x_password" id="x_password" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->password->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->password->EditValue ?>"<?php echo $v_pegawai_smp_edit->password->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->password->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->jenjang_id->Visible) { // jenjang_id ?>
	<div id="r_jenjang_id" class="form-group row">
		<label id="elh_v_pegawai_smp_jenjang_id" for="x_jenjang_id" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->jenjang_id->caption() ?><?php echo $v_pegawai_smp_edit->jenjang_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->jenjang_id->cellAttributes() ?>>
<span id="el_v_pegawai_smp_jenjang_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jenjang_id"><?php echo EmptyValue(strval($v_pegawai_smp_edit->jenjang_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_pegawai_smp_edit->jenjang_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_pegawai_smp_edit->jenjang_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_pegawai_smp_edit->jenjang_id->ReadOnly || $v_pegawai_smp_edit->jenjang_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jenjang_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_pegawai_smp_edit->jenjang_id->Lookup->getParamTag($v_pegawai_smp_edit, "p_x_jenjang_id") ?>
<input type="hidden" data-table="v_pegawai_smp" data-field="x_jenjang_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_pegawai_smp_edit->jenjang_id->displayValueSeparatorAttribute() ?>" name="x_jenjang_id" id="x_jenjang_id" value="<?php echo $v_pegawai_smp_edit->jenjang_id->CurrentValue ?>"<?php echo $v_pegawai_smp_edit->jenjang_id->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->jenjang_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->jabatan->Visible) { // jabatan ?>
	<div id="r_jabatan" class="form-group row">
		<label id="elh_v_pegawai_smp_jabatan" for="x_jabatan" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->jabatan->caption() ?><?php echo $v_pegawai_smp_edit->jabatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->jabatan->cellAttributes() ?>>
<span id="el_v_pegawai_smp_jabatan">
<?php $v_pegawai_smp_edit->jabatan->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jabatan"><?php echo EmptyValue(strval($v_pegawai_smp_edit->jabatan->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_pegawai_smp_edit->jabatan->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_pegawai_smp_edit->jabatan->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_pegawai_smp_edit->jabatan->ReadOnly || $v_pegawai_smp_edit->jabatan->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jabatan',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_pegawai_smp_edit->jabatan->Lookup->getParamTag($v_pegawai_smp_edit, "p_x_jabatan") ?>
<input type="hidden" data-table="v_pegawai_smp" data-field="x_jabatan" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_pegawai_smp_edit->jabatan->displayValueSeparatorAttribute() ?>" name="x_jabatan" id="x_jabatan" value="<?php echo $v_pegawai_smp_edit->jabatan->CurrentValue ?>"<?php echo $v_pegawai_smp_edit->jabatan->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->jabatan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->periode_jabatan->Visible) { // periode_jabatan ?>
	<div id="r_periode_jabatan" class="form-group row">
		<label id="elh_v_pegawai_smp_periode_jabatan" for="x_periode_jabatan" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->periode_jabatan->caption() ?><?php echo $v_pegawai_smp_edit->periode_jabatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->periode_jabatan->cellAttributes() ?>>
<span id="el_v_pegawai_smp_periode_jabatan">
<input type="text" data-table="v_pegawai_smp" data-field="x_periode_jabatan" name="x_periode_jabatan" id="x_periode_jabatan" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->periode_jabatan->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->periode_jabatan->EditValue ?>"<?php echo $v_pegawai_smp_edit->periode_jabatan->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->periode_jabatan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->jjm->Visible) { // jjm ?>
	<div id="r_jjm" class="form-group row">
		<label id="elh_v_pegawai_smp_jjm" for="x_jjm" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->jjm->caption() ?><?php echo $v_pegawai_smp_edit->jjm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->jjm->cellAttributes() ?>>
<span id="el_v_pegawai_smp_jjm">
<input type="text" data-table="v_pegawai_smp" data-field="x_jjm" name="x_jjm" id="x_jjm" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->jjm->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->jjm->EditValue ?>"<?php echo $v_pegawai_smp_edit->jjm->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->jjm->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->status_peg->Visible) { // status_peg ?>
	<div id="r_status_peg" class="form-group row">
		<label id="elh_v_pegawai_smp_status_peg" for="x_status_peg" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->status_peg->caption() ?><?php echo $v_pegawai_smp_edit->status_peg->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->status_peg->cellAttributes() ?>>
<span id="el_v_pegawai_smp_status_peg">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_status_peg"><?php echo EmptyValue(strval($v_pegawai_smp_edit->status_peg->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_pegawai_smp_edit->status_peg->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_pegawai_smp_edit->status_peg->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_pegawai_smp_edit->status_peg->ReadOnly || $v_pegawai_smp_edit->status_peg->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_status_peg',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_pegawai_smp_edit->status_peg->Lookup->getParamTag($v_pegawai_smp_edit, "p_x_status_peg") ?>
<input type="hidden" data-table="v_pegawai_smp" data-field="x_status_peg" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_pegawai_smp_edit->status_peg->displayValueSeparatorAttribute() ?>" name="x_status_peg" id="x_status_peg" value="<?php echo $v_pegawai_smp_edit->status_peg->CurrentValue ?>"<?php echo $v_pegawai_smp_edit->status_peg->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->status_peg->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->type->Visible) { // type ?>
	<div id="r_type" class="form-group row">
		<label id="elh_v_pegawai_smp_type" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->type->caption() ?><?php echo $v_pegawai_smp_edit->type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->type->cellAttributes() ?>>
<span id="el_v_pegawai_smp_type">
<?php
$onchange = $v_pegawai_smp_edit->type->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$v_pegawai_smp_edit->type->EditAttrs["onchange"] = "";
?>
<span id="as_x_type">
	<input type="text" class="form-control" name="sv_x_type" id="sv_x_type" value="<?php echo RemoveHtml($v_pegawai_smp_edit->type->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->type->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->type->getPlaceHolder()) ?>"<?php echo $v_pegawai_smp_edit->type->editAttributes() ?>>
</span>
<input type="hidden" data-table="v_pegawai_smp" data-field="x_type" data-value-separator="<?php echo $v_pegawai_smp_edit->type->displayValueSeparatorAttribute() ?>" name="x_type" id="x_type" value="<?php echo HtmlEncode($v_pegawai_smp_edit->type->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fv_pegawai_smpedit"], function() {
	fv_pegawai_smpedit.createAutoSuggest({"id":"x_type","forceSelect":false});
});
</script>
<?php echo $v_pegawai_smp_edit->type->Lookup->getParamTag($v_pegawai_smp_edit, "p_x_type") ?>
</span>
<?php echo $v_pegawai_smp_edit->type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->sertif->Visible) { // sertif ?>
	<div id="r_sertif" class="form-group row">
		<label id="elh_v_pegawai_smp_sertif" for="x_sertif" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->sertif->caption() ?><?php echo $v_pegawai_smp_edit->sertif->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->sertif->cellAttributes() ?>>
<span id="el_v_pegawai_smp_sertif">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_sertif"><?php echo EmptyValue(strval($v_pegawai_smp_edit->sertif->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_pegawai_smp_edit->sertif->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_pegawai_smp_edit->sertif->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_pegawai_smp_edit->sertif->ReadOnly || $v_pegawai_smp_edit->sertif->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_sertif',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_pegawai_smp_edit->sertif->Lookup->getParamTag($v_pegawai_smp_edit, "p_x_sertif") ?>
<input type="hidden" data-table="v_pegawai_smp" data-field="x_sertif" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_pegawai_smp_edit->sertif->displayValueSeparatorAttribute() ?>" name="x_sertif" id="x_sertif" value="<?php echo $v_pegawai_smp_edit->sertif->CurrentValue ?>"<?php echo $v_pegawai_smp_edit->sertif->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->sertif->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->tambahan->Visible) { // tambahan ?>
	<div id="r_tambahan" class="form-group row">
		<label id="elh_v_pegawai_smp_tambahan" for="x_tambahan" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->tambahan->caption() ?><?php echo $v_pegawai_smp_edit->tambahan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->tambahan->cellAttributes() ?>>
<span id="el_v_pegawai_smp_tambahan">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_tambahan"><?php echo EmptyValue(strval($v_pegawai_smp_edit->tambahan->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_pegawai_smp_edit->tambahan->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_pegawai_smp_edit->tambahan->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_pegawai_smp_edit->tambahan->ReadOnly || $v_pegawai_smp_edit->tambahan->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_tambahan',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_pegawai_smp_edit->tambahan->Lookup->getParamTag($v_pegawai_smp_edit, "p_x_tambahan") ?>
<input type="hidden" data-table="v_pegawai_smp" data-field="x_tambahan" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_pegawai_smp_edit->tambahan->displayValueSeparatorAttribute() ?>" name="x_tambahan" id="x_tambahan" value="<?php echo $v_pegawai_smp_edit->tambahan->CurrentValue ?>"<?php echo $v_pegawai_smp_edit->tambahan->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->tambahan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->lama_kerja->Visible) { // lama_kerja ?>
	<div id="r_lama_kerja" class="form-group row">
		<label id="elh_v_pegawai_smp_lama_kerja" for="x_lama_kerja" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->lama_kerja->caption() ?><?php echo $v_pegawai_smp_edit->lama_kerja->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->lama_kerja->cellAttributes() ?>>
<span id="el_v_pegawai_smp_lama_kerja">
<input type="text" data-table="v_pegawai_smp" data-field="x_lama_kerja" name="x_lama_kerja" id="x_lama_kerja" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->lama_kerja->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->lama_kerja->EditValue ?>"<?php echo $v_pegawai_smp_edit->lama_kerja->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->lama_kerja->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->nama->Visible) { // nama ?>
	<div id="r_nama" class="form-group row">
		<label id="elh_v_pegawai_smp_nama" for="x_nama" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->nama->caption() ?><?php echo $v_pegawai_smp_edit->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->nama->cellAttributes() ?>>
<span id="el_v_pegawai_smp_nama">
<input type="text" data-table="v_pegawai_smp" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->nama->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->nama->EditValue ?>"<?php echo $v_pegawai_smp_edit->nama->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->alamat->Visible) { // alamat ?>
	<div id="r_alamat" class="form-group row">
		<label id="elh_v_pegawai_smp_alamat" for="x_alamat" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->alamat->caption() ?><?php echo $v_pegawai_smp_edit->alamat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->alamat->cellAttributes() ?>>
<span id="el_v_pegawai_smp_alamat">
<input type="text" data-table="v_pegawai_smp" data-field="x_alamat" name="x_alamat" id="x_alamat" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->alamat->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->alamat->EditValue ?>"<?php echo $v_pegawai_smp_edit->alamat->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->alamat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->_email->Visible) { // email ?>
	<div id="r__email" class="form-group row">
		<label id="elh_v_pegawai_smp__email" for="x__email" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->_email->caption() ?><?php echo $v_pegawai_smp_edit->_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->_email->cellAttributes() ?>>
<span id="el_v_pegawai_smp__email">
<input type="text" data-table="v_pegawai_smp" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->_email->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->_email->EditValue ?>"<?php echo $v_pegawai_smp_edit->_email->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->wa->Visible) { // wa ?>
	<div id="r_wa" class="form-group row">
		<label id="elh_v_pegawai_smp_wa" for="x_wa" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->wa->caption() ?><?php echo $v_pegawai_smp_edit->wa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->wa->cellAttributes() ?>>
<span id="el_v_pegawai_smp_wa">
<input type="text" data-table="v_pegawai_smp" data-field="x_wa" name="x_wa" id="x_wa" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->wa->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->wa->EditValue ?>"<?php echo $v_pegawai_smp_edit->wa->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->wa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->hp->Visible) { // hp ?>
	<div id="r_hp" class="form-group row">
		<label id="elh_v_pegawai_smp_hp" for="x_hp" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->hp->caption() ?><?php echo $v_pegawai_smp_edit->hp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->hp->cellAttributes() ?>>
<span id="el_v_pegawai_smp_hp">
<input type="text" data-table="v_pegawai_smp" data-field="x_hp" name="x_hp" id="x_hp" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->hp->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->hp->EditValue ?>"<?php echo $v_pegawai_smp_edit->hp->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->hp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->tgllahir->Visible) { // tgllahir ?>
	<div id="r_tgllahir" class="form-group row">
		<label id="elh_v_pegawai_smp_tgllahir" for="x_tgllahir" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->tgllahir->caption() ?><?php echo $v_pegawai_smp_edit->tgllahir->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->tgllahir->cellAttributes() ?>>
<span id="el_v_pegawai_smp_tgllahir">
<input type="text" data-table="v_pegawai_smp" data-field="x_tgllahir" name="x_tgllahir" id="x_tgllahir" maxlength="10" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->tgllahir->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->tgllahir->EditValue ?>"<?php echo $v_pegawai_smp_edit->tgllahir->editAttributes() ?>>
<?php if (!$v_pegawai_smp_edit->tgllahir->ReadOnly && !$v_pegawai_smp_edit->tgllahir->Disabled && !isset($v_pegawai_smp_edit->tgllahir->EditAttrs["readonly"]) && !isset($v_pegawai_smp_edit->tgllahir->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fv_pegawai_smpedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fv_pegawai_smpedit", "x_tgllahir", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $v_pegawai_smp_edit->tgllahir->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->rekbank->Visible) { // rekbank ?>
	<div id="r_rekbank" class="form-group row">
		<label id="elh_v_pegawai_smp_rekbank" for="x_rekbank" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->rekbank->caption() ?><?php echo $v_pegawai_smp_edit->rekbank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->rekbank->cellAttributes() ?>>
<span id="el_v_pegawai_smp_rekbank">
<input type="text" data-table="v_pegawai_smp" data-field="x_rekbank" name="x_rekbank" id="x_rekbank" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->rekbank->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->rekbank->EditValue ?>"<?php echo $v_pegawai_smp_edit->rekbank->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->rekbank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->pendidikan->Visible) { // pendidikan ?>
	<div id="r_pendidikan" class="form-group row">
		<label id="elh_v_pegawai_smp_pendidikan" for="x_pendidikan" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->pendidikan->caption() ?><?php echo $v_pegawai_smp_edit->pendidikan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->pendidikan->cellAttributes() ?>>
<span id="el_v_pegawai_smp_pendidikan">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_pendidikan"><?php echo EmptyValue(strval($v_pegawai_smp_edit->pendidikan->ViewValue)) ? $Language->phrase("PleaseSelect") : $v_pegawai_smp_edit->pendidikan->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v_pegawai_smp_edit->pendidikan->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v_pegawai_smp_edit->pendidikan->ReadOnly || $v_pegawai_smp_edit->pendidikan->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_pendidikan',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v_pegawai_smp_edit->pendidikan->Lookup->getParamTag($v_pegawai_smp_edit, "p_x_pendidikan") ?>
<input type="hidden" data-table="v_pegawai_smp" data-field="x_pendidikan" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v_pegawai_smp_edit->pendidikan->displayValueSeparatorAttribute() ?>" name="x_pendidikan" id="x_pendidikan" value="<?php echo $v_pegawai_smp_edit->pendidikan->CurrentValue ?>"<?php echo $v_pegawai_smp_edit->pendidikan->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->pendidikan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->jurusan->Visible) { // jurusan ?>
	<div id="r_jurusan" class="form-group row">
		<label id="elh_v_pegawai_smp_jurusan" for="x_jurusan" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->jurusan->caption() ?><?php echo $v_pegawai_smp_edit->jurusan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->jurusan->cellAttributes() ?>>
<span id="el_v_pegawai_smp_jurusan">
<input type="text" data-table="v_pegawai_smp" data-field="x_jurusan" name="x_jurusan" id="x_jurusan" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->jurusan->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->jurusan->EditValue ?>"<?php echo $v_pegawai_smp_edit->jurusan->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->jurusan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->agama->Visible) { // agama ?>
	<div id="r_agama" class="form-group row">
		<label id="elh_v_pegawai_smp_agama" for="x_agama" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->agama->caption() ?><?php echo $v_pegawai_smp_edit->agama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->agama->cellAttributes() ?>>
<span id="el_v_pegawai_smp_agama">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v_pegawai_smp" data-field="x_agama" data-value-separator="<?php echo $v_pegawai_smp_edit->agama->displayValueSeparatorAttribute() ?>" id="x_agama" name="x_agama"<?php echo $v_pegawai_smp_edit->agama->editAttributes() ?>>
			<?php echo $v_pegawai_smp_edit->agama->selectOptionListHtml("x_agama") ?>
		</select>
</div>
<?php echo $v_pegawai_smp_edit->agama->Lookup->getParamTag($v_pegawai_smp_edit, "p_x_agama") ?>
</span>
<?php echo $v_pegawai_smp_edit->agama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->jenkel->Visible) { // jenkel ?>
	<div id="r_jenkel" class="form-group row">
		<label id="elh_v_pegawai_smp_jenkel" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->jenkel->caption() ?><?php echo $v_pegawai_smp_edit->jenkel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->jenkel->cellAttributes() ?>>
<span id="el_v_pegawai_smp_jenkel">
<div id="tp_x_jenkel" class="ew-template"><input type="radio" class="custom-control-input" data-table="v_pegawai_smp" data-field="x_jenkel" data-value-separator="<?php echo $v_pegawai_smp_edit->jenkel->displayValueSeparatorAttribute() ?>" name="x_jenkel" id="x_jenkel" value="{value}"<?php echo $v_pegawai_smp_edit->jenkel->editAttributes() ?>></div>
<div id="dsl_x_jenkel" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $v_pegawai_smp_edit->jenkel->radioButtonListHtml(FALSE, "x_jenkel") ?>
</div></div>
<?php echo $v_pegawai_smp_edit->jenkel->Lookup->getParamTag($v_pegawai_smp_edit, "p_x_jenkel") ?>
</span>
<?php echo $v_pegawai_smp_edit->jenkel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_v_pegawai_smp_status" for="x_status" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->status->caption() ?><?php echo $v_pegawai_smp_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->status->cellAttributes() ?>>
<span id="el_v_pegawai_smp_status">
<input type="text" data-table="v_pegawai_smp" data-field="x_status" name="x_status" id="x_status" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->status->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->status->EditValue ?>"<?php echo $v_pegawai_smp_edit->status->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->foto->Visible) { // foto ?>
	<div id="r_foto" class="form-group row">
		<label id="elh_v_pegawai_smp_foto" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->foto->caption() ?><?php echo $v_pegawai_smp_edit->foto->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->foto->cellAttributes() ?>>
<span id="el_v_pegawai_smp_foto">
<div id="fd_x_foto">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $v_pegawai_smp_edit->foto->title() ?>" data-table="v_pegawai_smp" data-field="x_foto" name="x_foto" id="x_foto" lang="<?php echo CurrentLanguageID() ?>"<?php echo $v_pegawai_smp_edit->foto->editAttributes() ?><?php if ($v_pegawai_smp_edit->foto->ReadOnly || $v_pegawai_smp_edit->foto->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_foto"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_foto" id= "fn_x_foto" value="<?php echo $v_pegawai_smp_edit->foto->Upload->FileName ?>">
<input type="hidden" name="fa_x_foto" id= "fa_x_foto" value="<?php echo (Post("fa_x_foto") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_foto" id= "fs_x_foto" value="255">
<input type="hidden" name="fx_x_foto" id= "fx_x_foto" value="<?php echo $v_pegawai_smp_edit->foto->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_foto" id= "fm_x_foto" value="<?php echo $v_pegawai_smp_edit->foto->UploadMaxFileSize ?>">
</div>
<table id="ft_x_foto" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $v_pegawai_smp_edit->foto->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->file_cv->Visible) { // file_cv ?>
	<div id="r_file_cv" class="form-group row">
		<label id="elh_v_pegawai_smp_file_cv" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->file_cv->caption() ?><?php echo $v_pegawai_smp_edit->file_cv->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->file_cv->cellAttributes() ?>>
<span id="el_v_pegawai_smp_file_cv">
<div id="fd_x_file_cv">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $v_pegawai_smp_edit->file_cv->title() ?>" data-table="v_pegawai_smp" data-field="x_file_cv" name="x_file_cv" id="x_file_cv" lang="<?php echo CurrentLanguageID() ?>"<?php echo $v_pegawai_smp_edit->file_cv->editAttributes() ?><?php if ($v_pegawai_smp_edit->file_cv->ReadOnly || $v_pegawai_smp_edit->file_cv->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_file_cv"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_file_cv" id= "fn_x_file_cv" value="<?php echo $v_pegawai_smp_edit->file_cv->Upload->FileName ?>">
<input type="hidden" name="fa_x_file_cv" id= "fa_x_file_cv" value="<?php echo (Post("fa_x_file_cv") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_file_cv" id= "fs_x_file_cv" value="255">
<input type="hidden" name="fx_x_file_cv" id= "fx_x_file_cv" value="<?php echo $v_pegawai_smp_edit->file_cv->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_file_cv" id= "fm_x_file_cv" value="<?php echo $v_pegawai_smp_edit->file_cv->UploadMaxFileSize ?>">
</div>
<table id="ft_x_file_cv" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $v_pegawai_smp_edit->file_cv->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->mulai_bekerja->Visible) { // mulai_bekerja ?>
	<div id="r_mulai_bekerja" class="form-group row">
		<label id="elh_v_pegawai_smp_mulai_bekerja" for="x_mulai_bekerja" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->mulai_bekerja->caption() ?><?php echo $v_pegawai_smp_edit->mulai_bekerja->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->mulai_bekerja->cellAttributes() ?>>
<span id="el_v_pegawai_smp_mulai_bekerja">
<input type="text" data-table="v_pegawai_smp" data-field="x_mulai_bekerja" name="x_mulai_bekerja" id="x_mulai_bekerja" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->mulai_bekerja->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->mulai_bekerja->EditValue ?>"<?php echo $v_pegawai_smp_edit->mulai_bekerja->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->mulai_bekerja->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->keterangan->Visible) { // keterangan ?>
	<div id="r_keterangan" class="form-group row">
		<label id="elh_v_pegawai_smp_keterangan" for="x_keterangan" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->keterangan->caption() ?><?php echo $v_pegawai_smp_edit->keterangan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->keterangan->cellAttributes() ?>>
<span id="el_v_pegawai_smp_keterangan">
<input type="text" data-table="v_pegawai_smp" data-field="x_keterangan" name="x_keterangan" id="x_keterangan" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->keterangan->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->keterangan->EditValue ?>"<?php echo $v_pegawai_smp_edit->keterangan->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->keterangan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->level->Visible) { // level ?>
	<div id="r_level" class="form-group row">
		<label id="elh_v_pegawai_smp_level" for="x_level" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->level->caption() ?><?php echo $v_pegawai_smp_edit->level->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->level->cellAttributes() ?>>
<span id="el_v_pegawai_smp_level">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v_pegawai_smp" data-field="x_level" data-value-separator="<?php echo $v_pegawai_smp_edit->level->displayValueSeparatorAttribute() ?>" id="x_level" name="x_level"<?php echo $v_pegawai_smp_edit->level->editAttributes() ?>>
			<?php echo $v_pegawai_smp_edit->level->selectOptionListHtml("x_level") ?>
		</select>
</div>
<?php echo $v_pegawai_smp_edit->level->Lookup->getParamTag($v_pegawai_smp_edit, "p_x_level") ?>
</span>
<?php echo $v_pegawai_smp_edit->level->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->aktif->Visible) { // aktif ?>
	<div id="r_aktif" class="form-group row">
		<label id="elh_v_pegawai_smp_aktif" for="x_aktif" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->aktif->caption() ?><?php echo $v_pegawai_smp_edit->aktif->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->aktif->cellAttributes() ?>>
<span id="el_v_pegawai_smp_aktif">
<input type="text" data-table="v_pegawai_smp" data-field="x_aktif" name="x_aktif" id="x_aktif" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->aktif->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->aktif->EditValue ?>"<?php echo $v_pegawai_smp_edit->aktif->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->aktif->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pegawai_smp_edit->kehadiran->Visible) { // kehadiran ?>
	<div id="r_kehadiran" class="form-group row">
		<label id="elh_v_pegawai_smp_kehadiran" for="x_kehadiran" class="<?php echo $v_pegawai_smp_edit->LeftColumnClass ?>"><?php echo $v_pegawai_smp_edit->kehadiran->caption() ?><?php echo $v_pegawai_smp_edit->kehadiran->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pegawai_smp_edit->RightColumnClass ?>"><div <?php echo $v_pegawai_smp_edit->kehadiran->cellAttributes() ?>>
<span id="el_v_pegawai_smp_kehadiran">
<input type="text" data-table="v_pegawai_smp" data-field="x_kehadiran" name="x_kehadiran" id="x_kehadiran" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($v_pegawai_smp_edit->kehadiran->getPlaceHolder()) ?>" value="<?php echo $v_pegawai_smp_edit->kehadiran->EditValue ?>"<?php echo $v_pegawai_smp_edit->kehadiran->editAttributes() ?>>
</span>
<?php echo $v_pegawai_smp_edit->kehadiran->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="v_pegawai_smp" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($v_pegawai_smp_edit->id->CurrentValue) ?>">
<?php if (!$v_pegawai_smp_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $v_pegawai_smp_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $v_pegawai_smp_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$v_pegawai_smp_edit->showPageFooter();
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
$v_pegawai_smp_edit->terminate();
?>