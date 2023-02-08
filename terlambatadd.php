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
$terlambat_add = new terlambat_add();

// Run the page
$terlambat_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$terlambat_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fterlambatadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fterlambatadd = currentForm = new ew.Form("fterlambatadd", "add");

	// Validate form
	fterlambatadd.validate = function() {
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
			<?php if ($terlambat_add->jenjang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $terlambat_add->jenjang_id->caption(), $terlambat_add->jenjang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($terlambat_add->jabatan_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jabatan_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $terlambat_add->jabatan_id->caption(), $terlambat_add->jabatan_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($terlambat_add->value->Required) { ?>
				elm = this.getElements("x" + infix + "_value");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $terlambat_add->value->caption(), $terlambat_add->value->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($terlambat_add->value->errorMessage()) ?>");
			<?php if ($terlambat_add->valuejam->Required) { ?>
				elm = this.getElements("x" + infix + "_valuejam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $terlambat_add->valuejam->caption(), $terlambat_add->valuejam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_valuejam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($terlambat_add->valuejam->errorMessage()) ?>");
			<?php if ($terlambat_add->jenis_jabatan->Required) { ?>
				elm = this.getElements("x" + infix + "_jenis_jabatan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $terlambat_add->jenis_jabatan->caption(), $terlambat_add->jenis_jabatan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jenis_jabatan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($terlambat_add->jenis_jabatan->errorMessage()) ?>");

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
	fterlambatadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fterlambatadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fterlambatadd.lists["x_jenjang_id"] = <?php echo $terlambat_add->jenjang_id->Lookup->toClientList($terlambat_add) ?>;
	fterlambatadd.lists["x_jenjang_id"].options = <?php echo JsonEncode($terlambat_add->jenjang_id->lookupOptions()) ?>;
	fterlambatadd.lists["x_jabatan_id"] = <?php echo $terlambat_add->jabatan_id->Lookup->toClientList($terlambat_add) ?>;
	fterlambatadd.lists["x_jabatan_id"].options = <?php echo JsonEncode($terlambat_add->jabatan_id->lookupOptions()) ?>;
	loadjs.done("fterlambatadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $terlambat_add->showPageHeader(); ?>
<?php
$terlambat_add->showMessage();
?>
<form name="fterlambatadd" id="fterlambatadd" class="<?php echo $terlambat_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="terlambat">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$terlambat_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($terlambat_add->jenjang_id->Visible) { // jenjang_id ?>
	<div id="r_jenjang_id" class="form-group row">
		<label id="elh_terlambat_jenjang_id" for="x_jenjang_id" class="<?php echo $terlambat_add->LeftColumnClass ?>"><?php echo $terlambat_add->jenjang_id->caption() ?><?php echo $terlambat_add->jenjang_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $terlambat_add->RightColumnClass ?>"><div <?php echo $terlambat_add->jenjang_id->cellAttributes() ?>>
<span id="el_terlambat_jenjang_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jenjang_id"><?php echo EmptyValue(strval($terlambat_add->jenjang_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $terlambat_add->jenjang_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($terlambat_add->jenjang_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($terlambat_add->jenjang_id->ReadOnly || $terlambat_add->jenjang_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jenjang_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $terlambat_add->jenjang_id->Lookup->getParamTag($terlambat_add, "p_x_jenjang_id") ?>
<input type="hidden" data-table="terlambat" data-field="x_jenjang_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $terlambat_add->jenjang_id->displayValueSeparatorAttribute() ?>" name="x_jenjang_id" id="x_jenjang_id" value="<?php echo $terlambat_add->jenjang_id->CurrentValue ?>"<?php echo $terlambat_add->jenjang_id->editAttributes() ?>>
</span>
<?php echo $terlambat_add->jenjang_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($terlambat_add->jabatan_id->Visible) { // jabatan_id ?>
	<div id="r_jabatan_id" class="form-group row">
		<label id="elh_terlambat_jabatan_id" for="x_jabatan_id" class="<?php echo $terlambat_add->LeftColumnClass ?>"><?php echo $terlambat_add->jabatan_id->caption() ?><?php echo $terlambat_add->jabatan_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $terlambat_add->RightColumnClass ?>"><div <?php echo $terlambat_add->jabatan_id->cellAttributes() ?>>
<span id="el_terlambat_jabatan_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jabatan_id"><?php echo EmptyValue(strval($terlambat_add->jabatan_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $terlambat_add->jabatan_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($terlambat_add->jabatan_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($terlambat_add->jabatan_id->ReadOnly || $terlambat_add->jabatan_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jabatan_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $terlambat_add->jabatan_id->Lookup->getParamTag($terlambat_add, "p_x_jabatan_id") ?>
<input type="hidden" data-table="terlambat" data-field="x_jabatan_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $terlambat_add->jabatan_id->displayValueSeparatorAttribute() ?>" name="x_jabatan_id" id="x_jabatan_id" value="<?php echo $terlambat_add->jabatan_id->CurrentValue ?>"<?php echo $terlambat_add->jabatan_id->editAttributes() ?>>
</span>
<?php echo $terlambat_add->jabatan_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($terlambat_add->value->Visible) { // value ?>
	<div id="r_value" class="form-group row">
		<label id="elh_terlambat_value" for="x_value" class="<?php echo $terlambat_add->LeftColumnClass ?>"><?php echo $terlambat_add->value->caption() ?><?php echo $terlambat_add->value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $terlambat_add->RightColumnClass ?>"><div <?php echo $terlambat_add->value->cellAttributes() ?>>
<span id="el_terlambat_value">
<input type="text" data-table="terlambat" data-field="x_value" name="x_value" id="x_value" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($terlambat_add->value->getPlaceHolder()) ?>" value="<?php echo $terlambat_add->value->EditValue ?>"<?php echo $terlambat_add->value->editAttributes() ?>>
</span>
<?php echo $terlambat_add->value->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($terlambat_add->valuejam->Visible) { // valuejam ?>
	<div id="r_valuejam" class="form-group row">
		<label id="elh_terlambat_valuejam" for="x_valuejam" class="<?php echo $terlambat_add->LeftColumnClass ?>"><?php echo $terlambat_add->valuejam->caption() ?><?php echo $terlambat_add->valuejam->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $terlambat_add->RightColumnClass ?>"><div <?php echo $terlambat_add->valuejam->cellAttributes() ?>>
<span id="el_terlambat_valuejam">
<input type="text" data-table="terlambat" data-field="x_valuejam" name="x_valuejam" id="x_valuejam" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($terlambat_add->valuejam->getPlaceHolder()) ?>" value="<?php echo $terlambat_add->valuejam->EditValue ?>"<?php echo $terlambat_add->valuejam->editAttributes() ?>>
</span>
<?php echo $terlambat_add->valuejam->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($terlambat_add->jenis_jabatan->Visible) { // jenis_jabatan ?>
	<div id="r_jenis_jabatan" class="form-group row">
		<label id="elh_terlambat_jenis_jabatan" for="x_jenis_jabatan" class="<?php echo $terlambat_add->LeftColumnClass ?>"><?php echo $terlambat_add->jenis_jabatan->caption() ?><?php echo $terlambat_add->jenis_jabatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $terlambat_add->RightColumnClass ?>"><div <?php echo $terlambat_add->jenis_jabatan->cellAttributes() ?>>
<span id="el_terlambat_jenis_jabatan">
<input type="text" data-table="terlambat" data-field="x_jenis_jabatan" name="x_jenis_jabatan" id="x_jenis_jabatan" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($terlambat_add->jenis_jabatan->getPlaceHolder()) ?>" value="<?php echo $terlambat_add->jenis_jabatan->EditValue ?>"<?php echo $terlambat_add->jenis_jabatan->editAttributes() ?>>
</span>
<?php echo $terlambat_add->jenis_jabatan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$terlambat_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $terlambat_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $terlambat_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$terlambat_add->showPageFooter();
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
$terlambat_add->terminate();
?>