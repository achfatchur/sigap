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
$m_semeter_add = new m_semeter_add();

// Run the page
$m_semeter_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_semeter_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_semeteradd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fm_semeteradd = currentForm = new ew.Form("fm_semeteradd", "add");

	// Validate form
	fm_semeteradd.validate = function() {
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
			<?php if ($m_semeter_add->smtr->Required) { ?>
				elm = this.getElements("x" + infix + "_smtr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_semeter_add->smtr->caption(), $m_semeter_add->smtr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_semeter_add->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_semeter_add->bulan->caption(), $m_semeter_add->bulan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_semeter_add->detil_smtr->Required) { ?>
				elm = this.getElements("x" + infix + "_detil_smtr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_semeter_add->detil_smtr->caption(), $m_semeter_add->detil_smtr->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_detil_smtr");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_semeter_add->detil_smtr->errorMessage()) ?>");

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
	fm_semeteradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fm_semeteradd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fm_semeteradd.lists["x_bulan"] = <?php echo $m_semeter_add->bulan->Lookup->toClientList($m_semeter_add) ?>;
	fm_semeteradd.lists["x_bulan"].options = <?php echo JsonEncode($m_semeter_add->bulan->lookupOptions()) ?>;
	loadjs.done("fm_semeteradd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_semeter_add->showPageHeader(); ?>
<?php
$m_semeter_add->showMessage();
?>
<form name="fm_semeteradd" id="fm_semeteradd" class="<?php echo $m_semeter_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_semeter">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$m_semeter_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($m_semeter_add->smtr->Visible) { // smtr ?>
	<div id="r_smtr" class="form-group row">
		<label id="elh_m_semeter_smtr" for="x_smtr" class="<?php echo $m_semeter_add->LeftColumnClass ?>"><?php echo $m_semeter_add->smtr->caption() ?><?php echo $m_semeter_add->smtr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_semeter_add->RightColumnClass ?>"><div <?php echo $m_semeter_add->smtr->cellAttributes() ?>>
<span id="el_m_semeter_smtr">
<input type="text" data-table="m_semeter" data-field="x_smtr" name="x_smtr" id="x_smtr" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($m_semeter_add->smtr->getPlaceHolder()) ?>" value="<?php echo $m_semeter_add->smtr->EditValue ?>"<?php echo $m_semeter_add->smtr->editAttributes() ?>>
</span>
<?php echo $m_semeter_add->smtr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_semeter_add->bulan->Visible) { // bulan ?>
	<div id="r_bulan" class="form-group row">
		<label id="elh_m_semeter_bulan" for="x_bulan" class="<?php echo $m_semeter_add->LeftColumnClass ?>"><?php echo $m_semeter_add->bulan->caption() ?><?php echo $m_semeter_add->bulan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_semeter_add->RightColumnClass ?>"><div <?php echo $m_semeter_add->bulan->cellAttributes() ?>>
<span id="el_m_semeter_bulan">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="m_semeter" data-field="x_bulan" data-value-separator="<?php echo $m_semeter_add->bulan->displayValueSeparatorAttribute() ?>" id="x_bulan" name="x_bulan"<?php echo $m_semeter_add->bulan->editAttributes() ?>>
			<?php echo $m_semeter_add->bulan->selectOptionListHtml("x_bulan") ?>
		</select>
</div>
<?php echo $m_semeter_add->bulan->Lookup->getParamTag($m_semeter_add, "p_x_bulan") ?>
</span>
<?php echo $m_semeter_add->bulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_semeter_add->detil_smtr->Visible) { // detil_smtr ?>
	<div id="r_detil_smtr" class="form-group row">
		<label id="elh_m_semeter_detil_smtr" for="x_detil_smtr" class="<?php echo $m_semeter_add->LeftColumnClass ?>"><?php echo $m_semeter_add->detil_smtr->caption() ?><?php echo $m_semeter_add->detil_smtr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_semeter_add->RightColumnClass ?>"><div <?php echo $m_semeter_add->detil_smtr->cellAttributes() ?>>
<span id="el_m_semeter_detil_smtr">
<input type="text" data-table="m_semeter" data-field="x_detil_smtr" name="x_detil_smtr" id="x_detil_smtr" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($m_semeter_add->detil_smtr->getPlaceHolder()) ?>" value="<?php echo $m_semeter_add->detil_smtr->EditValue ?>"<?php echo $m_semeter_add->detil_smtr->editAttributes() ?>>
</span>
<?php echo $m_semeter_add->detil_smtr->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$m_semeter_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $m_semeter_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_semeter_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$m_semeter_add->showPageFooter();
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
$m_semeter_add->terminate();
?>