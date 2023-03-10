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
$generate_pertahun_smp_edit = new generate_pertahun_smp_edit();

// Run the page
$generate_pertahun_smp_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$generate_pertahun_smp_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fgenerate_pertahun_smpedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fgenerate_pertahun_smpedit = currentForm = new ew.Form("fgenerate_pertahun_smpedit", "edit");

	// Validate form
	fgenerate_pertahun_smpedit.validate = function() {
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
			<?php if ($generate_pertahun_smp_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $generate_pertahun_smp_edit->id->caption(), $generate_pertahun_smp_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($generate_pertahun_smp_edit->profesi->Required) { ?>
				elm = this.getElements("x" + infix + "_profesi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $generate_pertahun_smp_edit->profesi->caption(), $generate_pertahun_smp_edit->profesi->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($generate_pertahun_smp_edit->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $generate_pertahun_smp_edit->tahun->caption(), $generate_pertahun_smp_edit->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($generate_pertahun_smp_edit->tahun->errorMessage()) ?>");
			<?php if ($generate_pertahun_smp_edit->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $generate_pertahun_smp_edit->bulan->caption(), $generate_pertahun_smp_edit->bulan->RequiredErrorMessage)) ?>");
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
	fgenerate_pertahun_smpedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fgenerate_pertahun_smpedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fgenerate_pertahun_smpedit.lists["x_profesi"] = <?php echo $generate_pertahun_smp_edit->profesi->Lookup->toClientList($generate_pertahun_smp_edit) ?>;
	fgenerate_pertahun_smpedit.lists["x_profesi"].options = <?php echo JsonEncode($generate_pertahun_smp_edit->profesi->lookupOptions()) ?>;
	fgenerate_pertahun_smpedit.lists["x_bulan[]"] = <?php echo $generate_pertahun_smp_edit->bulan->Lookup->toClientList($generate_pertahun_smp_edit) ?>;
	fgenerate_pertahun_smpedit.lists["x_bulan[]"].options = <?php echo JsonEncode($generate_pertahun_smp_edit->bulan->lookupOptions()) ?>;
	loadjs.done("fgenerate_pertahun_smpedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $generate_pertahun_smp_edit->showPageHeader(); ?>
<?php
$generate_pertahun_smp_edit->showMessage();
?>
<form name="fgenerate_pertahun_smpedit" id="fgenerate_pertahun_smpedit" class="<?php echo $generate_pertahun_smp_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="generate_pertahun_smp">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$generate_pertahun_smp_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($generate_pertahun_smp_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_generate_pertahun_smp_id" class="<?php echo $generate_pertahun_smp_edit->LeftColumnClass ?>"><?php echo $generate_pertahun_smp_edit->id->caption() ?><?php echo $generate_pertahun_smp_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $generate_pertahun_smp_edit->RightColumnClass ?>"><div <?php echo $generate_pertahun_smp_edit->id->cellAttributes() ?>>
<span id="el_generate_pertahun_smp_id">
<span<?php echo $generate_pertahun_smp_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($generate_pertahun_smp_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="generate_pertahun_smp" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($generate_pertahun_smp_edit->id->CurrentValue) ?>">
<?php echo $generate_pertahun_smp_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($generate_pertahun_smp_edit->profesi->Visible) { // profesi ?>
	<div id="r_profesi" class="form-group row">
		<label id="elh_generate_pertahun_smp_profesi" for="x_profesi" class="<?php echo $generate_pertahun_smp_edit->LeftColumnClass ?>"><?php echo $generate_pertahun_smp_edit->profesi->caption() ?><?php echo $generate_pertahun_smp_edit->profesi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $generate_pertahun_smp_edit->RightColumnClass ?>"><div <?php echo $generate_pertahun_smp_edit->profesi->cellAttributes() ?>>
<span id="el_generate_pertahun_smp_profesi">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="generate_pertahun_smp" data-field="x_profesi" data-value-separator="<?php echo $generate_pertahun_smp_edit->profesi->displayValueSeparatorAttribute() ?>" id="x_profesi" name="x_profesi"<?php echo $generate_pertahun_smp_edit->profesi->editAttributes() ?>>
			<?php echo $generate_pertahun_smp_edit->profesi->selectOptionListHtml("x_profesi") ?>
		</select>
</div>
<?php echo $generate_pertahun_smp_edit->profesi->Lookup->getParamTag($generate_pertahun_smp_edit, "p_x_profesi") ?>
</span>
<?php echo $generate_pertahun_smp_edit->profesi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($generate_pertahun_smp_edit->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_generate_pertahun_smp_tahun" for="x_tahun" class="<?php echo $generate_pertahun_smp_edit->LeftColumnClass ?>"><?php echo $generate_pertahun_smp_edit->tahun->caption() ?><?php echo $generate_pertahun_smp_edit->tahun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $generate_pertahun_smp_edit->RightColumnClass ?>"><div <?php echo $generate_pertahun_smp_edit->tahun->cellAttributes() ?>>
<span id="el_generate_pertahun_smp_tahun">
<input type="text" data-table="generate_pertahun_smp" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($generate_pertahun_smp_edit->tahun->getPlaceHolder()) ?>" value="<?php echo $generate_pertahun_smp_edit->tahun->EditValue ?>"<?php echo $generate_pertahun_smp_edit->tahun->editAttributes() ?>>
</span>
<?php echo $generate_pertahun_smp_edit->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($generate_pertahun_smp_edit->bulan->Visible) { // bulan ?>
	<div id="r_bulan" class="form-group row">
		<label id="elh_generate_pertahun_smp_bulan" class="<?php echo $generate_pertahun_smp_edit->LeftColumnClass ?>"><?php echo $generate_pertahun_smp_edit->bulan->caption() ?><?php echo $generate_pertahun_smp_edit->bulan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $generate_pertahun_smp_edit->RightColumnClass ?>"><div <?php echo $generate_pertahun_smp_edit->bulan->cellAttributes() ?>>
<span id="el_generate_pertahun_smp_bulan">
<div id="tp_x_bulan" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="generate_pertahun_smp" data-field="x_bulan" data-value-separator="<?php echo $generate_pertahun_smp_edit->bulan->displayValueSeparatorAttribute() ?>" name="x_bulan[]" id="x_bulan[]" value="{value}"<?php echo $generate_pertahun_smp_edit->bulan->editAttributes() ?>></div>
<div id="dsl_x_bulan" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $generate_pertahun_smp_edit->bulan->checkBoxListHtml(FALSE, "x_bulan[]") ?>
</div></div>
<?php echo $generate_pertahun_smp_edit->bulan->Lookup->getParamTag($generate_pertahun_smp_edit, "p_x_bulan") ?>
</span>
<?php echo $generate_pertahun_smp_edit->bulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$generate_pertahun_smp_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $generate_pertahun_smp_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $generate_pertahun_smp_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$generate_pertahun_smp_edit->showPageFooter();
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
$generate_pertahun_smp_edit->terminate();
?>