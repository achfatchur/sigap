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
$m_iuran_hari_tua_edit = new m_iuran_hari_tua_edit();

// Run the page
$m_iuran_hari_tua_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_iuran_hari_tua_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_iuran_hari_tuaedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fm_iuran_hari_tuaedit = currentForm = new ew.Form("fm_iuran_hari_tuaedit", "edit");

	// Validate form
	fm_iuran_hari_tuaedit.validate = function() {
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
			<?php if ($m_iuran_hari_tua_edit->unit->Required) { ?>
				elm = this.getElements("x" + infix + "_unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_iuran_hari_tua_edit->unit->caption(), $m_iuran_hari_tua_edit->unit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_iuran_hari_tua_edit->value->Required) { ?>
				elm = this.getElements("x" + infix + "_value");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_iuran_hari_tua_edit->value->caption(), $m_iuran_hari_tua_edit->value->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_iuran_hari_tua_edit->value->errorMessage()) ?>");

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
	fm_iuran_hari_tuaedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fm_iuran_hari_tuaedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fm_iuran_hari_tuaedit.lists["x_unit"] = <?php echo $m_iuran_hari_tua_edit->unit->Lookup->toClientList($m_iuran_hari_tua_edit) ?>;
	fm_iuran_hari_tuaedit.lists["x_unit"].options = <?php echo JsonEncode($m_iuran_hari_tua_edit->unit->lookupOptions()) ?>;
	loadjs.done("fm_iuran_hari_tuaedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_iuran_hari_tua_edit->showPageHeader(); ?>
<?php
$m_iuran_hari_tua_edit->showMessage();
?>
<form name="fm_iuran_hari_tuaedit" id="fm_iuran_hari_tuaedit" class="<?php echo $m_iuran_hari_tua_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_iuran_hari_tua">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$m_iuran_hari_tua_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($m_iuran_hari_tua_edit->unit->Visible) { // unit ?>
	<div id="r_unit" class="form-group row">
		<label id="elh_m_iuran_hari_tua_unit" for="x_unit" class="<?php echo $m_iuran_hari_tua_edit->LeftColumnClass ?>"><?php echo $m_iuran_hari_tua_edit->unit->caption() ?><?php echo $m_iuran_hari_tua_edit->unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_iuran_hari_tua_edit->RightColumnClass ?>"><div <?php echo $m_iuran_hari_tua_edit->unit->cellAttributes() ?>>
<span id="el_m_iuran_hari_tua_unit">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="m_iuran_hari_tua" data-field="x_unit" data-value-separator="<?php echo $m_iuran_hari_tua_edit->unit->displayValueSeparatorAttribute() ?>" id="x_unit" name="x_unit"<?php echo $m_iuran_hari_tua_edit->unit->editAttributes() ?>>
			<?php echo $m_iuran_hari_tua_edit->unit->selectOptionListHtml("x_unit") ?>
		</select>
</div>
<?php echo $m_iuran_hari_tua_edit->unit->Lookup->getParamTag($m_iuran_hari_tua_edit, "p_x_unit") ?>
</span>
<?php echo $m_iuran_hari_tua_edit->unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_iuran_hari_tua_edit->value->Visible) { // value ?>
	<div id="r_value" class="form-group row">
		<label id="elh_m_iuran_hari_tua_value" for="x_value" class="<?php echo $m_iuran_hari_tua_edit->LeftColumnClass ?>"><?php echo $m_iuran_hari_tua_edit->value->caption() ?><?php echo $m_iuran_hari_tua_edit->value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_iuran_hari_tua_edit->RightColumnClass ?>"><div <?php echo $m_iuran_hari_tua_edit->value->cellAttributes() ?>>
<span id="el_m_iuran_hari_tua_value">
<input type="text" data-table="m_iuran_hari_tua" data-field="x_value" name="x_value" id="x_value" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($m_iuran_hari_tua_edit->value->getPlaceHolder()) ?>" value="<?php echo $m_iuran_hari_tua_edit->value->EditValue ?>"<?php echo $m_iuran_hari_tua_edit->value->editAttributes() ?>>
</span>
<?php echo $m_iuran_hari_tua_edit->value->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="m_iuran_hari_tua" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($m_iuran_hari_tua_edit->id->CurrentValue) ?>">
<?php if (!$m_iuran_hari_tua_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $m_iuran_hari_tua_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_iuran_hari_tua_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$m_iuran_hari_tua_edit->showPageFooter();
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
$m_iuran_hari_tua_edit->terminate();
?>