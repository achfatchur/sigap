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
$m_jaminan_pensiun_add = new m_jaminan_pensiun_add();

// Run the page
$m_jaminan_pensiun_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_jaminan_pensiun_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_jaminan_pensiunadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fm_jaminan_pensiunadd = currentForm = new ew.Form("fm_jaminan_pensiunadd", "add");

	// Validate form
	fm_jaminan_pensiunadd.validate = function() {
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
			<?php if ($m_jaminan_pensiun_add->unit->Required) { ?>
				elm = this.getElements("x" + infix + "_unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_jaminan_pensiun_add->unit->caption(), $m_jaminan_pensiun_add->unit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_jaminan_pensiun_add->value->Required) { ?>
				elm = this.getElements("x" + infix + "_value");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_jaminan_pensiun_add->value->caption(), $m_jaminan_pensiun_add->value->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_jaminan_pensiun_add->value->errorMessage()) ?>");

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
	fm_jaminan_pensiunadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fm_jaminan_pensiunadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fm_jaminan_pensiunadd.lists["x_unit"] = <?php echo $m_jaminan_pensiun_add->unit->Lookup->toClientList($m_jaminan_pensiun_add) ?>;
	fm_jaminan_pensiunadd.lists["x_unit"].options = <?php echo JsonEncode($m_jaminan_pensiun_add->unit->lookupOptions()) ?>;
	loadjs.done("fm_jaminan_pensiunadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_jaminan_pensiun_add->showPageHeader(); ?>
<?php
$m_jaminan_pensiun_add->showMessage();
?>
<form name="fm_jaminan_pensiunadd" id="fm_jaminan_pensiunadd" class="<?php echo $m_jaminan_pensiun_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_jaminan_pensiun">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$m_jaminan_pensiun_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($m_jaminan_pensiun_add->unit->Visible) { // unit ?>
	<div id="r_unit" class="form-group row">
		<label id="elh_m_jaminan_pensiun_unit" for="x_unit" class="<?php echo $m_jaminan_pensiun_add->LeftColumnClass ?>"><?php echo $m_jaminan_pensiun_add->unit->caption() ?><?php echo $m_jaminan_pensiun_add->unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_jaminan_pensiun_add->RightColumnClass ?>"><div <?php echo $m_jaminan_pensiun_add->unit->cellAttributes() ?>>
<span id="el_m_jaminan_pensiun_unit">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="m_jaminan_pensiun" data-field="x_unit" data-value-separator="<?php echo $m_jaminan_pensiun_add->unit->displayValueSeparatorAttribute() ?>" id="x_unit" name="x_unit"<?php echo $m_jaminan_pensiun_add->unit->editAttributes() ?>>
			<?php echo $m_jaminan_pensiun_add->unit->selectOptionListHtml("x_unit") ?>
		</select>
</div>
<?php echo $m_jaminan_pensiun_add->unit->Lookup->getParamTag($m_jaminan_pensiun_add, "p_x_unit") ?>
</span>
<?php echo $m_jaminan_pensiun_add->unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_jaminan_pensiun_add->value->Visible) { // value ?>
	<div id="r_value" class="form-group row">
		<label id="elh_m_jaminan_pensiun_value" for="x_value" class="<?php echo $m_jaminan_pensiun_add->LeftColumnClass ?>"><?php echo $m_jaminan_pensiun_add->value->caption() ?><?php echo $m_jaminan_pensiun_add->value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_jaminan_pensiun_add->RightColumnClass ?>"><div <?php echo $m_jaminan_pensiun_add->value->cellAttributes() ?>>
<span id="el_m_jaminan_pensiun_value">
<input type="text" data-table="m_jaminan_pensiun" data-field="x_value" name="x_value" id="x_value" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($m_jaminan_pensiun_add->value->getPlaceHolder()) ?>" value="<?php echo $m_jaminan_pensiun_add->value->EditValue ?>"<?php echo $m_jaminan_pensiun_add->value->editAttributes() ?>>
</span>
<?php echo $m_jaminan_pensiun_add->value->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$m_jaminan_pensiun_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $m_jaminan_pensiun_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_jaminan_pensiun_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$m_jaminan_pensiun_add->showPageFooter();
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
$m_jaminan_pensiun_add->terminate();
?>