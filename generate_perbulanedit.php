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
$generate_perbulan_edit = new generate_perbulan_edit();

// Run the page
$generate_perbulan_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$generate_perbulan_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fgenerate_perbulanedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fgenerate_perbulanedit = currentForm = new ew.Form("fgenerate_perbulanedit", "edit");

	// Validate form
	fgenerate_perbulanedit.validate = function() {
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
			<?php if ($generate_perbulan_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $generate_perbulan_edit->id->caption(), $generate_perbulan_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($generate_perbulan_edit->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $generate_perbulan_edit->tahun->caption(), $generate_perbulan_edit->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($generate_perbulan_edit->tahun->errorMessage()) ?>");
			<?php if ($generate_perbulan_edit->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $generate_perbulan_edit->bulan->caption(), $generate_perbulan_edit->bulan->RequiredErrorMessage)) ?>");
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
	fgenerate_perbulanedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fgenerate_perbulanedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fgenerate_perbulanedit.lists["x_bulan[]"] = <?php echo $generate_perbulan_edit->bulan->Lookup->toClientList($generate_perbulan_edit) ?>;
	fgenerate_perbulanedit.lists["x_bulan[]"].options = <?php echo JsonEncode($generate_perbulan_edit->bulan->lookupOptions()) ?>;
	loadjs.done("fgenerate_perbulanedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $generate_perbulan_edit->showPageHeader(); ?>
<?php
$generate_perbulan_edit->showMessage();
?>
<form name="fgenerate_perbulanedit" id="fgenerate_perbulanedit" class="<?php echo $generate_perbulan_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="generate_perbulan">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$generate_perbulan_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($generate_perbulan_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_generate_perbulan_id" class="<?php echo $generate_perbulan_edit->LeftColumnClass ?>"><?php echo $generate_perbulan_edit->id->caption() ?><?php echo $generate_perbulan_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $generate_perbulan_edit->RightColumnClass ?>"><div <?php echo $generate_perbulan_edit->id->cellAttributes() ?>>
<span id="el_generate_perbulan_id">
<span<?php echo $generate_perbulan_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($generate_perbulan_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="generate_perbulan" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($generate_perbulan_edit->id->CurrentValue) ?>">
<?php echo $generate_perbulan_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($generate_perbulan_edit->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_generate_perbulan_tahun" for="x_tahun" class="<?php echo $generate_perbulan_edit->LeftColumnClass ?>"><?php echo $generate_perbulan_edit->tahun->caption() ?><?php echo $generate_perbulan_edit->tahun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $generate_perbulan_edit->RightColumnClass ?>"><div <?php echo $generate_perbulan_edit->tahun->cellAttributes() ?>>
<span id="el_generate_perbulan_tahun">
<input type="text" data-table="generate_perbulan" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($generate_perbulan_edit->tahun->getPlaceHolder()) ?>" value="<?php echo $generate_perbulan_edit->tahun->EditValue ?>"<?php echo $generate_perbulan_edit->tahun->editAttributes() ?>>
</span>
<?php echo $generate_perbulan_edit->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($generate_perbulan_edit->bulan->Visible) { // bulan ?>
	<div id="r_bulan" class="form-group row">
		<label id="elh_generate_perbulan_bulan" class="<?php echo $generate_perbulan_edit->LeftColumnClass ?>"><?php echo $generate_perbulan_edit->bulan->caption() ?><?php echo $generate_perbulan_edit->bulan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $generate_perbulan_edit->RightColumnClass ?>"><div <?php echo $generate_perbulan_edit->bulan->cellAttributes() ?>>
<span id="el_generate_perbulan_bulan">
<div id="tp_x_bulan" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="generate_perbulan" data-field="x_bulan" data-value-separator="<?php echo $generate_perbulan_edit->bulan->displayValueSeparatorAttribute() ?>" name="x_bulan[]" id="x_bulan[]" value="{value}"<?php echo $generate_perbulan_edit->bulan->editAttributes() ?>></div>
<div id="dsl_x_bulan" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $generate_perbulan_edit->bulan->checkBoxListHtml(FALSE, "x_bulan[]") ?>
</div></div>
<?php echo $generate_perbulan_edit->bulan->Lookup->getParamTag($generate_perbulan_edit, "p_x_bulan") ?>
</span>
<?php echo $generate_perbulan_edit->bulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$generate_perbulan_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $generate_perbulan_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $generate_perbulan_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$generate_perbulan_edit->showPageFooter();
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
$generate_perbulan_edit->terminate();
?>