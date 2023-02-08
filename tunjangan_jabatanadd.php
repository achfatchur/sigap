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
$tunjangan_jabatan_add = new tunjangan_jabatan_add();

// Run the page
$tunjangan_jabatan_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tunjangan_jabatan_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftunjangan_jabatanadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ftunjangan_jabatanadd = currentForm = new ew.Form("ftunjangan_jabatanadd", "add");

	// Validate form
	ftunjangan_jabatanadd.validate = function() {
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
			<?php if ($tunjangan_jabatan_add->unit->Required) { ?>
				elm = this.getElements("x" + infix + "_unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tunjangan_jabatan_add->unit->caption(), $tunjangan_jabatan_add->unit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tunjangan_jabatan_add->jabatan->Required) { ?>
				elm = this.getElements("x" + infix + "_jabatan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tunjangan_jabatan_add->jabatan->caption(), $tunjangan_jabatan_add->jabatan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tunjangan_jabatan_add->value->Required) { ?>
				elm = this.getElements("x" + infix + "_value");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tunjangan_jabatan_add->value->caption(), $tunjangan_jabatan_add->value->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tunjangan_jabatan_add->value->errorMessage()) ?>");

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
	ftunjangan_jabatanadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftunjangan_jabatanadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ftunjangan_jabatanadd.lists["x_unit"] = <?php echo $tunjangan_jabatan_add->unit->Lookup->toClientList($tunjangan_jabatan_add) ?>;
	ftunjangan_jabatanadd.lists["x_unit"].options = <?php echo JsonEncode($tunjangan_jabatan_add->unit->lookupOptions()) ?>;
	ftunjangan_jabatanadd.lists["x_jabatan"] = <?php echo $tunjangan_jabatan_add->jabatan->Lookup->toClientList($tunjangan_jabatan_add) ?>;
	ftunjangan_jabatanadd.lists["x_jabatan"].options = <?php echo JsonEncode($tunjangan_jabatan_add->jabatan->lookupOptions()) ?>;
	loadjs.done("ftunjangan_jabatanadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tunjangan_jabatan_add->showPageHeader(); ?>
<?php
$tunjangan_jabatan_add->showMessage();
?>
<form name="ftunjangan_jabatanadd" id="ftunjangan_jabatanadd" class="<?php echo $tunjangan_jabatan_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tunjangan_jabatan">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$tunjangan_jabatan_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($tunjangan_jabatan_add->unit->Visible) { // unit ?>
	<div id="r_unit" class="form-group row">
		<label id="elh_tunjangan_jabatan_unit" for="x_unit" class="<?php echo $tunjangan_jabatan_add->LeftColumnClass ?>"><?php echo $tunjangan_jabatan_add->unit->caption() ?><?php echo $tunjangan_jabatan_add->unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tunjangan_jabatan_add->RightColumnClass ?>"><div <?php echo $tunjangan_jabatan_add->unit->cellAttributes() ?>>
<span id="el_tunjangan_jabatan_unit">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tunjangan_jabatan" data-field="x_unit" data-value-separator="<?php echo $tunjangan_jabatan_add->unit->displayValueSeparatorAttribute() ?>" id="x_unit" name="x_unit"<?php echo $tunjangan_jabatan_add->unit->editAttributes() ?>>
			<?php echo $tunjangan_jabatan_add->unit->selectOptionListHtml("x_unit") ?>
		</select>
</div>
<?php echo $tunjangan_jabatan_add->unit->Lookup->getParamTag($tunjangan_jabatan_add, "p_x_unit") ?>
</span>
<?php echo $tunjangan_jabatan_add->unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tunjangan_jabatan_add->jabatan->Visible) { // jabatan ?>
	<div id="r_jabatan" class="form-group row">
		<label id="elh_tunjangan_jabatan_jabatan" for="x_jabatan" class="<?php echo $tunjangan_jabatan_add->LeftColumnClass ?>"><?php echo $tunjangan_jabatan_add->jabatan->caption() ?><?php echo $tunjangan_jabatan_add->jabatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tunjangan_jabatan_add->RightColumnClass ?>"><div <?php echo $tunjangan_jabatan_add->jabatan->cellAttributes() ?>>
<span id="el_tunjangan_jabatan_jabatan">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tunjangan_jabatan" data-field="x_jabatan" data-value-separator="<?php echo $tunjangan_jabatan_add->jabatan->displayValueSeparatorAttribute() ?>" id="x_jabatan" name="x_jabatan"<?php echo $tunjangan_jabatan_add->jabatan->editAttributes() ?>>
			<?php echo $tunjangan_jabatan_add->jabatan->selectOptionListHtml("x_jabatan") ?>
		</select>
</div>
<?php echo $tunjangan_jabatan_add->jabatan->Lookup->getParamTag($tunjangan_jabatan_add, "p_x_jabatan") ?>
</span>
<?php echo $tunjangan_jabatan_add->jabatan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tunjangan_jabatan_add->value->Visible) { // value ?>
	<div id="r_value" class="form-group row">
		<label id="elh_tunjangan_jabatan_value" for="x_value" class="<?php echo $tunjangan_jabatan_add->LeftColumnClass ?>"><?php echo $tunjangan_jabatan_add->value->caption() ?><?php echo $tunjangan_jabatan_add->value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tunjangan_jabatan_add->RightColumnClass ?>"><div <?php echo $tunjangan_jabatan_add->value->cellAttributes() ?>>
<span id="el_tunjangan_jabatan_value">
<input type="text" data-table="tunjangan_jabatan" data-field="x_value" name="x_value" id="x_value" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($tunjangan_jabatan_add->value->getPlaceHolder()) ?>" value="<?php echo $tunjangan_jabatan_add->value->EditValue ?>"<?php echo $tunjangan_jabatan_add->value->editAttributes() ?>>
</span>
<?php echo $tunjangan_jabatan_add->value->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tunjangan_jabatan_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tunjangan_jabatan_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tunjangan_jabatan_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tunjangan_jabatan_add->showPageFooter();
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
$tunjangan_jabatan_add->terminate();
?>