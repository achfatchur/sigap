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
$v_pengurus_yayasan_edit = new v_pengurus_yayasan_edit();

// Run the page
$v_pengurus_yayasan_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_pengurus_yayasan_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fv_pengurus_yayasanedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fv_pengurus_yayasanedit = currentForm = new ew.Form("fv_pengurus_yayasanedit", "edit");

	// Validate form
	fv_pengurus_yayasanedit.validate = function() {
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
			<?php if ($v_pengurus_yayasan_edit->nip->Required) { ?>
				elm = this.getElements("x" + infix + "_nip");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_edit->nip->caption(), $v_pengurus_yayasan_edit->nip->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_edit->password->Required) { ?>
				elm = this.getElements("x" + infix + "_password");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_edit->password->caption(), $v_pengurus_yayasan_edit->password->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_edit->jabatan->Required) { ?>
				elm = this.getElements("x" + infix + "_jabatan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_edit->jabatan->caption(), $v_pengurus_yayasan_edit->jabatan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_edit->lama_kerja->Required) { ?>
				elm = this.getElements("x" + infix + "_lama_kerja");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_edit->lama_kerja->caption(), $v_pengurus_yayasan_edit->lama_kerja->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_lama_kerja");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pengurus_yayasan_edit->lama_kerja->errorMessage()) ?>");
			<?php if ($v_pengurus_yayasan_edit->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_edit->nama->caption(), $v_pengurus_yayasan_edit->nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_edit->alamat->Required) { ?>
				elm = this.getElements("x" + infix + "_alamat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_edit->alamat->caption(), $v_pengurus_yayasan_edit->alamat->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_edit->_email->Required) { ?>
				elm = this.getElements("x" + infix + "__email");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_edit->_email->caption(), $v_pengurus_yayasan_edit->_email->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_edit->wa->Required) { ?>
				elm = this.getElements("x" + infix + "_wa");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_edit->wa->caption(), $v_pengurus_yayasan_edit->wa->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_edit->hp->Required) { ?>
				elm = this.getElements("x" + infix + "_hp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_edit->hp->caption(), $v_pengurus_yayasan_edit->hp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_edit->rekbank->Required) { ?>
				elm = this.getElements("x" + infix + "_rekbank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_edit->rekbank->caption(), $v_pengurus_yayasan_edit->rekbank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_edit->agama->Required) { ?>
				elm = this.getElements("x" + infix + "_agama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_edit->agama->caption(), $v_pengurus_yayasan_edit->agama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_edit->jenkel->Required) { ?>
				elm = this.getElements("x" + infix + "_jenkel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_edit->jenkel->caption(), $v_pengurus_yayasan_edit->jenkel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_edit->level->Required) { ?>
				elm = this.getElements("x" + infix + "_level");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_edit->level->caption(), $v_pengurus_yayasan_edit->level->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($v_pengurus_yayasan_edit->kehadiran->Required) { ?>
				elm = this.getElements("x" + infix + "_kehadiran");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v_pengurus_yayasan_edit->kehadiran->caption(), $v_pengurus_yayasan_edit->kehadiran->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_kehadiran");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($v_pengurus_yayasan_edit->kehadiran->errorMessage()) ?>");

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
	fv_pengurus_yayasanedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fv_pengurus_yayasanedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fv_pengurus_yayasanedit.lists["x_jenkel"] = <?php echo $v_pengurus_yayasan_edit->jenkel->Lookup->toClientList($v_pengurus_yayasan_edit) ?>;
	fv_pengurus_yayasanedit.lists["x_jenkel"].options = <?php echo JsonEncode($v_pengurus_yayasan_edit->jenkel->lookupOptions()) ?>;
	loadjs.done("fv_pengurus_yayasanedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $v_pengurus_yayasan_edit->showPageHeader(); ?>
<?php
$v_pengurus_yayasan_edit->showMessage();
?>
<form name="fv_pengurus_yayasanedit" id="fv_pengurus_yayasanedit" class="<?php echo $v_pengurus_yayasan_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v_pengurus_yayasan">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$v_pengurus_yayasan_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($v_pengurus_yayasan_edit->nip->Visible) { // nip ?>
	<div id="r_nip" class="form-group row">
		<label id="elh_v_pengurus_yayasan_nip" for="x_nip" class="<?php echo $v_pengurus_yayasan_edit->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_edit->nip->caption() ?><?php echo $v_pengurus_yayasan_edit->nip->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_edit->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_edit->nip->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_nip">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_nip" name="x_nip" id="x_nip" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_edit->nip->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_edit->nip->EditValue ?>"<?php echo $v_pengurus_yayasan_edit->nip->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_edit->nip->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_edit->password->Visible) { // password ?>
	<div id="r_password" class="form-group row">
		<label id="elh_v_pengurus_yayasan_password" for="x_password" class="<?php echo $v_pengurus_yayasan_edit->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_edit->password->caption() ?><?php echo $v_pengurus_yayasan_edit->password->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_edit->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_edit->password->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_password">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_password" name="x_password" id="x_password" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_edit->password->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_edit->password->EditValue ?>"<?php echo $v_pengurus_yayasan_edit->password->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_edit->password->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_edit->jabatan->Visible) { // jabatan ?>
	<div id="r_jabatan" class="form-group row">
		<label id="elh_v_pengurus_yayasan_jabatan" class="<?php echo $v_pengurus_yayasan_edit->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_edit->jabatan->caption() ?><?php echo $v_pengurus_yayasan_edit->jabatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_edit->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_edit->jabatan->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_jabatan">
<span<?php echo $v_pengurus_yayasan_edit->jabatan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($v_pengurus_yayasan_edit->jabatan->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="v_pengurus_yayasan" data-field="x_jabatan" name="x_jabatan" id="x_jabatan" value="<?php echo HtmlEncode($v_pengurus_yayasan_edit->jabatan->CurrentValue) ?>">
<?php echo $v_pengurus_yayasan_edit->jabatan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_edit->lama_kerja->Visible) { // lama_kerja ?>
	<div id="r_lama_kerja" class="form-group row">
		<label id="elh_v_pengurus_yayasan_lama_kerja" for="x_lama_kerja" class="<?php echo $v_pengurus_yayasan_edit->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_edit->lama_kerja->caption() ?><?php echo $v_pengurus_yayasan_edit->lama_kerja->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_edit->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_edit->lama_kerja->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_lama_kerja">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_lama_kerja" name="x_lama_kerja" id="x_lama_kerja" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_edit->lama_kerja->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_edit->lama_kerja->EditValue ?>"<?php echo $v_pengurus_yayasan_edit->lama_kerja->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_edit->lama_kerja->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_edit->nama->Visible) { // nama ?>
	<div id="r_nama" class="form-group row">
		<label id="elh_v_pengurus_yayasan_nama" for="x_nama" class="<?php echo $v_pengurus_yayasan_edit->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_edit->nama->caption() ?><?php echo $v_pengurus_yayasan_edit->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_edit->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_edit->nama->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_nama">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_edit->nama->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_edit->nama->EditValue ?>"<?php echo $v_pengurus_yayasan_edit->nama->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_edit->nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_edit->alamat->Visible) { // alamat ?>
	<div id="r_alamat" class="form-group row">
		<label id="elh_v_pengurus_yayasan_alamat" for="x_alamat" class="<?php echo $v_pengurus_yayasan_edit->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_edit->alamat->caption() ?><?php echo $v_pengurus_yayasan_edit->alamat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_edit->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_edit->alamat->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_alamat">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_alamat" name="x_alamat" id="x_alamat" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_edit->alamat->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_edit->alamat->EditValue ?>"<?php echo $v_pengurus_yayasan_edit->alamat->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_edit->alamat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_edit->_email->Visible) { // email ?>
	<div id="r__email" class="form-group row">
		<label id="elh_v_pengurus_yayasan__email" for="x__email" class="<?php echo $v_pengurus_yayasan_edit->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_edit->_email->caption() ?><?php echo $v_pengurus_yayasan_edit->_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_edit->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_edit->_email->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan__email">
<input type="text" data-table="v_pengurus_yayasan" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_edit->_email->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_edit->_email->EditValue ?>"<?php echo $v_pengurus_yayasan_edit->_email->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_edit->_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_edit->wa->Visible) { // wa ?>
	<div id="r_wa" class="form-group row">
		<label id="elh_v_pengurus_yayasan_wa" for="x_wa" class="<?php echo $v_pengurus_yayasan_edit->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_edit->wa->caption() ?><?php echo $v_pengurus_yayasan_edit->wa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_edit->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_edit->wa->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_wa">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_wa" name="x_wa" id="x_wa" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_edit->wa->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_edit->wa->EditValue ?>"<?php echo $v_pengurus_yayasan_edit->wa->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_edit->wa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_edit->hp->Visible) { // hp ?>
	<div id="r_hp" class="form-group row">
		<label id="elh_v_pengurus_yayasan_hp" for="x_hp" class="<?php echo $v_pengurus_yayasan_edit->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_edit->hp->caption() ?><?php echo $v_pengurus_yayasan_edit->hp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_edit->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_edit->hp->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_hp">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_hp" name="x_hp" id="x_hp" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_edit->hp->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_edit->hp->EditValue ?>"<?php echo $v_pengurus_yayasan_edit->hp->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_edit->hp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_edit->rekbank->Visible) { // rekbank ?>
	<div id="r_rekbank" class="form-group row">
		<label id="elh_v_pengurus_yayasan_rekbank" for="x_rekbank" class="<?php echo $v_pengurus_yayasan_edit->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_edit->rekbank->caption() ?><?php echo $v_pengurus_yayasan_edit->rekbank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_edit->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_edit->rekbank->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_rekbank">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_rekbank" name="x_rekbank" id="x_rekbank" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_edit->rekbank->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_edit->rekbank->EditValue ?>"<?php echo $v_pengurus_yayasan_edit->rekbank->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_edit->rekbank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_edit->agama->Visible) { // agama ?>
	<div id="r_agama" class="form-group row">
		<label id="elh_v_pengurus_yayasan_agama" class="<?php echo $v_pengurus_yayasan_edit->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_edit->agama->caption() ?><?php echo $v_pengurus_yayasan_edit->agama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_edit->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_edit->agama->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_agama">
<span<?php echo $v_pengurus_yayasan_edit->agama->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($v_pengurus_yayasan_edit->agama->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="v_pengurus_yayasan" data-field="x_agama" name="x_agama" id="x_agama" value="<?php echo HtmlEncode($v_pengurus_yayasan_edit->agama->CurrentValue) ?>">
<?php echo $v_pengurus_yayasan_edit->agama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_edit->jenkel->Visible) { // jenkel ?>
	<div id="r_jenkel" class="form-group row">
		<label id="elh_v_pengurus_yayasan_jenkel" class="<?php echo $v_pengurus_yayasan_edit->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_edit->jenkel->caption() ?><?php echo $v_pengurus_yayasan_edit->jenkel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_edit->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_edit->jenkel->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_jenkel">
<div id="tp_x_jenkel" class="ew-template"><input type="radio" class="custom-control-input" data-table="v_pengurus_yayasan" data-field="x_jenkel" data-value-separator="<?php echo $v_pengurus_yayasan_edit->jenkel->displayValueSeparatorAttribute() ?>" name="x_jenkel" id="x_jenkel" value="{value}"<?php echo $v_pengurus_yayasan_edit->jenkel->editAttributes() ?>></div>
<div id="dsl_x_jenkel" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $v_pengurus_yayasan_edit->jenkel->radioButtonListHtml(FALSE, "x_jenkel") ?>
</div></div>
<?php echo $v_pengurus_yayasan_edit->jenkel->Lookup->getParamTag($v_pengurus_yayasan_edit, "p_x_jenkel") ?>
</span>
<?php echo $v_pengurus_yayasan_edit->jenkel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_edit->level->Visible) { // level ?>
	<div id="r_level" class="form-group row">
		<label id="elh_v_pengurus_yayasan_level" class="<?php echo $v_pengurus_yayasan_edit->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_edit->level->caption() ?><?php echo $v_pengurus_yayasan_edit->level->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_edit->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_edit->level->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_level">
<span<?php echo $v_pengurus_yayasan_edit->level->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($v_pengurus_yayasan_edit->level->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="v_pengurus_yayasan" data-field="x_level" name="x_level" id="x_level" value="<?php echo HtmlEncode($v_pengurus_yayasan_edit->level->CurrentValue) ?>">
<?php echo $v_pengurus_yayasan_edit->level->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($v_pengurus_yayasan_edit->kehadiran->Visible) { // kehadiran ?>
	<div id="r_kehadiran" class="form-group row">
		<label id="elh_v_pengurus_yayasan_kehadiran" for="x_kehadiran" class="<?php echo $v_pengurus_yayasan_edit->LeftColumnClass ?>"><?php echo $v_pengurus_yayasan_edit->kehadiran->caption() ?><?php echo $v_pengurus_yayasan_edit->kehadiran->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $v_pengurus_yayasan_edit->RightColumnClass ?>"><div <?php echo $v_pengurus_yayasan_edit->kehadiran->cellAttributes() ?>>
<span id="el_v_pengurus_yayasan_kehadiran">
<input type="text" data-table="v_pengurus_yayasan" data-field="x_kehadiran" name="x_kehadiran" id="x_kehadiran" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($v_pengurus_yayasan_edit->kehadiran->getPlaceHolder()) ?>" value="<?php echo $v_pengurus_yayasan_edit->kehadiran->EditValue ?>"<?php echo $v_pengurus_yayasan_edit->kehadiran->editAttributes() ?>>
</span>
<?php echo $v_pengurus_yayasan_edit->kehadiran->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="v_pengurus_yayasan" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($v_pengurus_yayasan_edit->id->CurrentValue) ?>">
<?php if (!$v_pengurus_yayasan_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $v_pengurus_yayasan_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $v_pengurus_yayasan_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$v_pengurus_yayasan_edit->showPageFooter();
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
$v_pengurus_yayasan_edit->terminate();
?>