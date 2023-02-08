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
$m_semeter_edit = new m_semeter_edit();

// Run the page
$m_semeter_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_semeter_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_semeteredit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fm_semeteredit = currentForm = new ew.Form("fm_semeteredit", "edit");

	// Validate form
	fm_semeteredit.validate = function() {
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
			<?php if ($m_semeter_edit->smtr->Required) { ?>
				elm = this.getElements("x" + infix + "_smtr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_semeter_edit->smtr->caption(), $m_semeter_edit->smtr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_semeter_edit->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_semeter_edit->bulan->caption(), $m_semeter_edit->bulan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_semeter_edit->detil_smtr->Required) { ?>
				elm = this.getElements("x" + infix + "_detil_smtr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_semeter_edit->detil_smtr->caption(), $m_semeter_edit->detil_smtr->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_detil_smtr");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_semeter_edit->detil_smtr->errorMessage()) ?>");

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
	fm_semeteredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fm_semeteredit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fm_semeteredit.lists["x_bulan"] = <?php echo $m_semeter_edit->bulan->Lookup->toClientList($m_semeter_edit) ?>;
	fm_semeteredit.lists["x_bulan"].options = <?php echo JsonEncode($m_semeter_edit->bulan->lookupOptions()) ?>;
	loadjs.done("fm_semeteredit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_semeter_edit->showPageHeader(); ?>
<?php
$m_semeter_edit->showMessage();
?>
<form name="fm_semeteredit" id="fm_semeteredit" class="<?php echo $m_semeter_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_semeter">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$m_semeter_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($m_semeter_edit->smtr->Visible) { // smtr ?>
	<div id="r_smtr" class="form-group row">
		<label id="elh_m_semeter_smtr" for="x_smtr" class="<?php echo $m_semeter_edit->LeftColumnClass ?>"><?php echo $m_semeter_edit->smtr->caption() ?><?php echo $m_semeter_edit->smtr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_semeter_edit->RightColumnClass ?>"><div <?php echo $m_semeter_edit->smtr->cellAttributes() ?>>
<span id="el_m_semeter_smtr">
<input type="text" data-table="m_semeter" data-field="x_smtr" name="x_smtr" id="x_smtr" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($m_semeter_edit->smtr->getPlaceHolder()) ?>" value="<?php echo $m_semeter_edit->smtr->EditValue ?>"<?php echo $m_semeter_edit->smtr->editAttributes() ?>>
</span>
<?php echo $m_semeter_edit->smtr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_semeter_edit->bulan->Visible) { // bulan ?>
	<div id="r_bulan" class="form-group row">
		<label id="elh_m_semeter_bulan" for="x_bulan" class="<?php echo $m_semeter_edit->LeftColumnClass ?>"><?php echo $m_semeter_edit->bulan->caption() ?><?php echo $m_semeter_edit->bulan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_semeter_edit->RightColumnClass ?>"><div <?php echo $m_semeter_edit->bulan->cellAttributes() ?>>
<span id="el_m_semeter_bulan">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="m_semeter" data-field="x_bulan" data-value-separator="<?php echo $m_semeter_edit->bulan->displayValueSeparatorAttribute() ?>" id="x_bulan" name="x_bulan"<?php echo $m_semeter_edit->bulan->editAttributes() ?>>
			<?php echo $m_semeter_edit->bulan->selectOptionListHtml("x_bulan") ?>
		</select>
</div>
<?php echo $m_semeter_edit->bulan->Lookup->getParamTag($m_semeter_edit, "p_x_bulan") ?>
</span>
<?php echo $m_semeter_edit->bulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_semeter_edit->detil_smtr->Visible) { // detil_smtr ?>
	<div id="r_detil_smtr" class="form-group row">
		<label id="elh_m_semeter_detil_smtr" for="x_detil_smtr" class="<?php echo $m_semeter_edit->LeftColumnClass ?>"><?php echo $m_semeter_edit->detil_smtr->caption() ?><?php echo $m_semeter_edit->detil_smtr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_semeter_edit->RightColumnClass ?>"><div <?php echo $m_semeter_edit->detil_smtr->cellAttributes() ?>>
<span id="el_m_semeter_detil_smtr">
<input type="text" data-table="m_semeter" data-field="x_detil_smtr" name="x_detil_smtr" id="x_detil_smtr" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($m_semeter_edit->detil_smtr->getPlaceHolder()) ?>" value="<?php echo $m_semeter_edit->detil_smtr->EditValue ?>"<?php echo $m_semeter_edit->detil_smtr->editAttributes() ?>>
</span>
<?php echo $m_semeter_edit->detil_smtr->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="m_semeter" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($m_semeter_edit->id->CurrentValue) ?>">
<?php if (!$m_semeter_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $m_semeter_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_semeter_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$m_semeter_edit->showPageFooter();
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
$m_semeter_edit->terminate();
?>