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
$m_pph21_edit = new m_pph21_edit();

// Run the page
$m_pph21_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_pph21_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_pph21edit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fm_pph21edit = currentForm = new ew.Form("fm_pph21edit", "edit");

	// Validate form
	fm_pph21edit.validate = function() {
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
			<?php if ($m_pph21_edit->unit->Required) { ?>
				elm = this.getElements("x" + infix + "_unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_pph21_edit->unit->caption(), $m_pph21_edit->unit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_pph21_edit->value1->Required) { ?>
				elm = this.getElements("x" + infix + "_value1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_pph21_edit->value1->caption(), $m_pph21_edit->value1->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value1");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_pph21_edit->value1->errorMessage()) ?>");
			<?php if ($m_pph21_edit->value2->Required) { ?>
				elm = this.getElements("x" + infix + "_value2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_pph21_edit->value2->caption(), $m_pph21_edit->value2->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value2");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_pph21_edit->value2->errorMessage()) ?>");
			<?php if ($m_pph21_edit->value3->Required) { ?>
				elm = this.getElements("x" + infix + "_value3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_pph21_edit->value3->caption(), $m_pph21_edit->value3->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value3");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_pph21_edit->value3->errorMessage()) ?>");

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
	fm_pph21edit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fm_pph21edit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fm_pph21edit.lists["x_unit"] = <?php echo $m_pph21_edit->unit->Lookup->toClientList($m_pph21_edit) ?>;
	fm_pph21edit.lists["x_unit"].options = <?php echo JsonEncode($m_pph21_edit->unit->lookupOptions()) ?>;
	loadjs.done("fm_pph21edit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_pph21_edit->showPageHeader(); ?>
<?php
$m_pph21_edit->showMessage();
?>
<form name="fm_pph21edit" id="fm_pph21edit" class="<?php echo $m_pph21_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_pph21">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$m_pph21_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($m_pph21_edit->unit->Visible) { // unit ?>
	<div id="r_unit" class="form-group row">
		<label id="elh_m_pph21_unit" for="x_unit" class="<?php echo $m_pph21_edit->LeftColumnClass ?>"><?php echo $m_pph21_edit->unit->caption() ?><?php echo $m_pph21_edit->unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_pph21_edit->RightColumnClass ?>"><div <?php echo $m_pph21_edit->unit->cellAttributes() ?>>
<span id="el_m_pph21_unit">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="m_pph21" data-field="x_unit" data-value-separator="<?php echo $m_pph21_edit->unit->displayValueSeparatorAttribute() ?>" id="x_unit" name="x_unit"<?php echo $m_pph21_edit->unit->editAttributes() ?>>
			<?php echo $m_pph21_edit->unit->selectOptionListHtml("x_unit") ?>
		</select>
</div>
<?php echo $m_pph21_edit->unit->Lookup->getParamTag($m_pph21_edit, "p_x_unit") ?>
</span>
<?php echo $m_pph21_edit->unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_pph21_edit->value1->Visible) { // value1 ?>
	<div id="r_value1" class="form-group row">
		<label id="elh_m_pph21_value1" for="x_value1" class="<?php echo $m_pph21_edit->LeftColumnClass ?>"><?php echo $m_pph21_edit->value1->caption() ?><?php echo $m_pph21_edit->value1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_pph21_edit->RightColumnClass ?>"><div <?php echo $m_pph21_edit->value1->cellAttributes() ?>>
<span id="el_m_pph21_value1">
<input type="text" data-table="m_pph21" data-field="x_value1" name="x_value1" id="x_value1" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($m_pph21_edit->value1->getPlaceHolder()) ?>" value="<?php echo $m_pph21_edit->value1->EditValue ?>"<?php echo $m_pph21_edit->value1->editAttributes() ?>>
</span>
<?php echo $m_pph21_edit->value1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_pph21_edit->value2->Visible) { // value2 ?>
	<div id="r_value2" class="form-group row">
		<label id="elh_m_pph21_value2" for="x_value2" class="<?php echo $m_pph21_edit->LeftColumnClass ?>"><?php echo $m_pph21_edit->value2->caption() ?><?php echo $m_pph21_edit->value2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_pph21_edit->RightColumnClass ?>"><div <?php echo $m_pph21_edit->value2->cellAttributes() ?>>
<span id="el_m_pph21_value2">
<input type="text" data-table="m_pph21" data-field="x_value2" name="x_value2" id="x_value2" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($m_pph21_edit->value2->getPlaceHolder()) ?>" value="<?php echo $m_pph21_edit->value2->EditValue ?>"<?php echo $m_pph21_edit->value2->editAttributes() ?>>
</span>
<?php echo $m_pph21_edit->value2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_pph21_edit->value3->Visible) { // value3 ?>
	<div id="r_value3" class="form-group row">
		<label id="elh_m_pph21_value3" for="x_value3" class="<?php echo $m_pph21_edit->LeftColumnClass ?>"><?php echo $m_pph21_edit->value3->caption() ?><?php echo $m_pph21_edit->value3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_pph21_edit->RightColumnClass ?>"><div <?php echo $m_pph21_edit->value3->cellAttributes() ?>>
<span id="el_m_pph21_value3">
<input type="text" data-table="m_pph21" data-field="x_value3" name="x_value3" id="x_value3" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($m_pph21_edit->value3->getPlaceHolder()) ?>" value="<?php echo $m_pph21_edit->value3->EditValue ?>"<?php echo $m_pph21_edit->value3->editAttributes() ?>>
</span>
<?php echo $m_pph21_edit->value3->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="m_pph21" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($m_pph21_edit->id->CurrentValue) ?>">
<?php if (!$m_pph21_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $m_pph21_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_pph21_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$m_pph21_edit->showPageFooter();
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
$m_pph21_edit->terminate();
?>