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
$m_sakit_edit = new m_sakit_edit();

// Run the page
$m_sakit_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_sakit_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_sakitedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fm_sakitedit = currentForm = new ew.Form("fm_sakitedit", "edit");

	// Validate form
	fm_sakitedit.validate = function() {
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
			<?php if ($m_sakit_edit->jenjang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_sakit_edit->jenjang_id->caption(), $m_sakit_edit->jenjang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_sakit_edit->jabatan->Required) { ?>
				elm = this.getElements("x" + infix + "_jabatan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_sakit_edit->jabatan->caption(), $m_sakit_edit->jabatan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_sakit_edit->sertif->Required) { ?>
				elm = this.getElements("x" + infix + "_sertif");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_sakit_edit->sertif->caption(), $m_sakit_edit->sertif->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_sakit_edit->perhari->Required) { ?>
				elm = this.getElements("x" + infix + "_perhari");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_sakit_edit->perhari->caption(), $m_sakit_edit->perhari->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_perhari");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_sakit_edit->perhari->errorMessage()) ?>");
			<?php if ($m_sakit_edit->perjam->Required) { ?>
				elm = this.getElements("x" + infix + "_perjam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_sakit_edit->perjam->caption(), $m_sakit_edit->perjam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_perjam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_sakit_edit->perjam->errorMessage()) ?>");
			<?php if ($m_sakit_edit->type->Required) { ?>
				elm = this.getElements("x" + infix + "_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_sakit_edit->type->caption(), $m_sakit_edit->type->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_type");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_sakit_edit->type->errorMessage()) ?>");

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
	fm_sakitedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fm_sakitedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fm_sakitedit.lists["x_jenjang_id"] = <?php echo $m_sakit_edit->jenjang_id->Lookup->toClientList($m_sakit_edit) ?>;
	fm_sakitedit.lists["x_jenjang_id"].options = <?php echo JsonEncode($m_sakit_edit->jenjang_id->lookupOptions()) ?>;
	fm_sakitedit.lists["x_jabatan"] = <?php echo $m_sakit_edit->jabatan->Lookup->toClientList($m_sakit_edit) ?>;
	fm_sakitedit.lists["x_jabatan"].options = <?php echo JsonEncode($m_sakit_edit->jabatan->lookupOptions()) ?>;
	fm_sakitedit.lists["x_sertif"] = <?php echo $m_sakit_edit->sertif->Lookup->toClientList($m_sakit_edit) ?>;
	fm_sakitedit.lists["x_sertif"].options = <?php echo JsonEncode($m_sakit_edit->sertif->lookupOptions()) ?>;
	loadjs.done("fm_sakitedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_sakit_edit->showPageHeader(); ?>
<?php
$m_sakit_edit->showMessage();
?>
<form name="fm_sakitedit" id="fm_sakitedit" class="<?php echo $m_sakit_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_sakit">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$m_sakit_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($m_sakit_edit->jenjang_id->Visible) { // jenjang_id ?>
	<div id="r_jenjang_id" class="form-group row">
		<label id="elh_m_sakit_jenjang_id" for="x_jenjang_id" class="<?php echo $m_sakit_edit->LeftColumnClass ?>"><?php echo $m_sakit_edit->jenjang_id->caption() ?><?php echo $m_sakit_edit->jenjang_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_sakit_edit->RightColumnClass ?>"><div <?php echo $m_sakit_edit->jenjang_id->cellAttributes() ?>>
<span id="el_m_sakit_jenjang_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jenjang_id"><?php echo EmptyValue(strval($m_sakit_edit->jenjang_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $m_sakit_edit->jenjang_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($m_sakit_edit->jenjang_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($m_sakit_edit->jenjang_id->ReadOnly || $m_sakit_edit->jenjang_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jenjang_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $m_sakit_edit->jenjang_id->Lookup->getParamTag($m_sakit_edit, "p_x_jenjang_id") ?>
<input type="hidden" data-table="m_sakit" data-field="x_jenjang_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $m_sakit_edit->jenjang_id->displayValueSeparatorAttribute() ?>" name="x_jenjang_id" id="x_jenjang_id" value="<?php echo $m_sakit_edit->jenjang_id->CurrentValue ?>"<?php echo $m_sakit_edit->jenjang_id->editAttributes() ?>>
</span>
<?php echo $m_sakit_edit->jenjang_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_sakit_edit->jabatan->Visible) { // jabatan ?>
	<div id="r_jabatan" class="form-group row">
		<label id="elh_m_sakit_jabatan" for="x_jabatan" class="<?php echo $m_sakit_edit->LeftColumnClass ?>"><?php echo $m_sakit_edit->jabatan->caption() ?><?php echo $m_sakit_edit->jabatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_sakit_edit->RightColumnClass ?>"><div <?php echo $m_sakit_edit->jabatan->cellAttributes() ?>>
<span id="el_m_sakit_jabatan">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jabatan"><?php echo EmptyValue(strval($m_sakit_edit->jabatan->ViewValue)) ? $Language->phrase("PleaseSelect") : $m_sakit_edit->jabatan->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($m_sakit_edit->jabatan->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($m_sakit_edit->jabatan->ReadOnly || $m_sakit_edit->jabatan->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jabatan',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $m_sakit_edit->jabatan->Lookup->getParamTag($m_sakit_edit, "p_x_jabatan") ?>
<input type="hidden" data-table="m_sakit" data-field="x_jabatan" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $m_sakit_edit->jabatan->displayValueSeparatorAttribute() ?>" name="x_jabatan" id="x_jabatan" value="<?php echo $m_sakit_edit->jabatan->CurrentValue ?>"<?php echo $m_sakit_edit->jabatan->editAttributes() ?>>
</span>
<?php echo $m_sakit_edit->jabatan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_sakit_edit->sertif->Visible) { // sertif ?>
	<div id="r_sertif" class="form-group row">
		<label id="elh_m_sakit_sertif" for="x_sertif" class="<?php echo $m_sakit_edit->LeftColumnClass ?>"><?php echo $m_sakit_edit->sertif->caption() ?><?php echo $m_sakit_edit->sertif->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_sakit_edit->RightColumnClass ?>"><div <?php echo $m_sakit_edit->sertif->cellAttributes() ?>>
<span id="el_m_sakit_sertif">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_sertif"><?php echo EmptyValue(strval($m_sakit_edit->sertif->ViewValue)) ? $Language->phrase("PleaseSelect") : $m_sakit_edit->sertif->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($m_sakit_edit->sertif->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($m_sakit_edit->sertif->ReadOnly || $m_sakit_edit->sertif->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_sertif',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $m_sakit_edit->sertif->Lookup->getParamTag($m_sakit_edit, "p_x_sertif") ?>
<input type="hidden" data-table="m_sakit" data-field="x_sertif" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $m_sakit_edit->sertif->displayValueSeparatorAttribute() ?>" name="x_sertif" id="x_sertif" value="<?php echo $m_sakit_edit->sertif->CurrentValue ?>"<?php echo $m_sakit_edit->sertif->editAttributes() ?>>
</span>
<?php echo $m_sakit_edit->sertif->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_sakit_edit->perhari->Visible) { // perhari ?>
	<div id="r_perhari" class="form-group row">
		<label id="elh_m_sakit_perhari" for="x_perhari" class="<?php echo $m_sakit_edit->LeftColumnClass ?>"><?php echo $m_sakit_edit->perhari->caption() ?><?php echo $m_sakit_edit->perhari->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_sakit_edit->RightColumnClass ?>"><div <?php echo $m_sakit_edit->perhari->cellAttributes() ?>>
<span id="el_m_sakit_perhari">
<input type="text" data-table="m_sakit" data-field="x_perhari" name="x_perhari" id="x_perhari" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($m_sakit_edit->perhari->getPlaceHolder()) ?>" value="<?php echo $m_sakit_edit->perhari->EditValue ?>"<?php echo $m_sakit_edit->perhari->editAttributes() ?>>
</span>
<?php echo $m_sakit_edit->perhari->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_sakit_edit->perjam->Visible) { // perjam ?>
	<div id="r_perjam" class="form-group row">
		<label id="elh_m_sakit_perjam" for="x_perjam" class="<?php echo $m_sakit_edit->LeftColumnClass ?>"><?php echo $m_sakit_edit->perjam->caption() ?><?php echo $m_sakit_edit->perjam->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_sakit_edit->RightColumnClass ?>"><div <?php echo $m_sakit_edit->perjam->cellAttributes() ?>>
<span id="el_m_sakit_perjam">
<input type="text" data-table="m_sakit" data-field="x_perjam" name="x_perjam" id="x_perjam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($m_sakit_edit->perjam->getPlaceHolder()) ?>" value="<?php echo $m_sakit_edit->perjam->EditValue ?>"<?php echo $m_sakit_edit->perjam->editAttributes() ?>>
</span>
<?php echo $m_sakit_edit->perjam->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_sakit_edit->type->Visible) { // type ?>
	<div id="r_type" class="form-group row">
		<label id="elh_m_sakit_type" for="x_type" class="<?php echo $m_sakit_edit->LeftColumnClass ?>"><?php echo $m_sakit_edit->type->caption() ?><?php echo $m_sakit_edit->type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_sakit_edit->RightColumnClass ?>"><div <?php echo $m_sakit_edit->type->cellAttributes() ?>>
<span id="el_m_sakit_type">
<input type="text" data-table="m_sakit" data-field="x_type" name="x_type" id="x_type" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($m_sakit_edit->type->getPlaceHolder()) ?>" value="<?php echo $m_sakit_edit->type->EditValue ?>"<?php echo $m_sakit_edit->type->editAttributes() ?>>
</span>
<?php echo $m_sakit_edit->type->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="m_sakit" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($m_sakit_edit->id->CurrentValue) ?>">
<?php if (!$m_sakit_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $m_sakit_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_sakit_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$m_sakit_edit->showPageFooter();
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
$m_sakit_edit->terminate();
?>