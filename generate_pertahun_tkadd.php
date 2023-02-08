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
$generate_pertahun_tk_add = new generate_pertahun_tk_add();

// Run the page
$generate_pertahun_tk_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$generate_pertahun_tk_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fgenerate_pertahun_tkadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fgenerate_pertahun_tkadd = currentForm = new ew.Form("fgenerate_pertahun_tkadd", "add");

	// Validate form
	fgenerate_pertahun_tkadd.validate = function() {
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
			<?php if ($generate_pertahun_tk_add->profesi->Required) { ?>
				elm = this.getElements("x" + infix + "_profesi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $generate_pertahun_tk_add->profesi->caption(), $generate_pertahun_tk_add->profesi->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($generate_pertahun_tk_add->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $generate_pertahun_tk_add->tahun->caption(), $generate_pertahun_tk_add->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($generate_pertahun_tk_add->tahun->errorMessage()) ?>");
			<?php if ($generate_pertahun_tk_add->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $generate_pertahun_tk_add->bulan->caption(), $generate_pertahun_tk_add->bulan->RequiredErrorMessage)) ?>");
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
	fgenerate_pertahun_tkadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fgenerate_pertahun_tkadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fgenerate_pertahun_tkadd.lists["x_profesi"] = <?php echo $generate_pertahun_tk_add->profesi->Lookup->toClientList($generate_pertahun_tk_add) ?>;
	fgenerate_pertahun_tkadd.lists["x_profesi"].options = <?php echo JsonEncode($generate_pertahun_tk_add->profesi->lookupOptions()) ?>;
	fgenerate_pertahun_tkadd.lists["x_bulan[]"] = <?php echo $generate_pertahun_tk_add->bulan->Lookup->toClientList($generate_pertahun_tk_add) ?>;
	fgenerate_pertahun_tkadd.lists["x_bulan[]"].options = <?php echo JsonEncode($generate_pertahun_tk_add->bulan->lookupOptions()) ?>;
	loadjs.done("fgenerate_pertahun_tkadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	var date=(new Date).getFullYear();$("input#x_tahun").val(date);
});
</script>
<?php $generate_pertahun_tk_add->showPageHeader(); ?>
<?php
$generate_pertahun_tk_add->showMessage();
?>
<form name="fgenerate_pertahun_tkadd" id="fgenerate_pertahun_tkadd" class="<?php echo $generate_pertahun_tk_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="generate_pertahun_tk">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$generate_pertahun_tk_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($generate_pertahun_tk_add->profesi->Visible) { // profesi ?>
	<div id="r_profesi" class="form-group row">
		<label id="elh_generate_pertahun_tk_profesi" for="x_profesi" class="<?php echo $generate_pertahun_tk_add->LeftColumnClass ?>"><?php echo $generate_pertahun_tk_add->profesi->caption() ?><?php echo $generate_pertahun_tk_add->profesi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $generate_pertahun_tk_add->RightColumnClass ?>"><div <?php echo $generate_pertahun_tk_add->profesi->cellAttributes() ?>>
<span id="el_generate_pertahun_tk_profesi">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="generate_pertahun_tk" data-field="x_profesi" data-value-separator="<?php echo $generate_pertahun_tk_add->profesi->displayValueSeparatorAttribute() ?>" id="x_profesi" name="x_profesi"<?php echo $generate_pertahun_tk_add->profesi->editAttributes() ?>>
			<?php echo $generate_pertahun_tk_add->profesi->selectOptionListHtml("x_profesi") ?>
		</select>
</div>
<?php echo $generate_pertahun_tk_add->profesi->Lookup->getParamTag($generate_pertahun_tk_add, "p_x_profesi") ?>
</span>
<?php echo $generate_pertahun_tk_add->profesi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($generate_pertahun_tk_add->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_generate_pertahun_tk_tahun" for="x_tahun" class="<?php echo $generate_pertahun_tk_add->LeftColumnClass ?>"><?php echo $generate_pertahun_tk_add->tahun->caption() ?><?php echo $generate_pertahun_tk_add->tahun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $generate_pertahun_tk_add->RightColumnClass ?>"><div <?php echo $generate_pertahun_tk_add->tahun->cellAttributes() ?>>
<span id="el_generate_pertahun_tk_tahun">
<input type="text" data-table="generate_pertahun_tk" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($generate_pertahun_tk_add->tahun->getPlaceHolder()) ?>" value="<?php echo $generate_pertahun_tk_add->tahun->EditValue ?>"<?php echo $generate_pertahun_tk_add->tahun->editAttributes() ?>>
</span>
<?php echo $generate_pertahun_tk_add->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($generate_pertahun_tk_add->bulan->Visible) { // bulan ?>
	<div id="r_bulan" class="form-group row">
		<label id="elh_generate_pertahun_tk_bulan" class="<?php echo $generate_pertahun_tk_add->LeftColumnClass ?>"><?php echo $generate_pertahun_tk_add->bulan->caption() ?><?php echo $generate_pertahun_tk_add->bulan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $generate_pertahun_tk_add->RightColumnClass ?>"><div <?php echo $generate_pertahun_tk_add->bulan->cellAttributes() ?>>
<span id="el_generate_pertahun_tk_bulan">
<div id="tp_x_bulan" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="generate_pertahun_tk" data-field="x_bulan" data-value-separator="<?php echo $generate_pertahun_tk_add->bulan->displayValueSeparatorAttribute() ?>" name="x_bulan[]" id="x_bulan[]" value="{value}"<?php echo $generate_pertahun_tk_add->bulan->editAttributes() ?>></div>
<div id="dsl_x_bulan" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $generate_pertahun_tk_add->bulan->checkBoxListHtml(FALSE, "x_bulan[]") ?>
</div></div>
<?php echo $generate_pertahun_tk_add->bulan->Lookup->getParamTag($generate_pertahun_tk_add, "p_x_bulan") ?>
</span>
<?php echo $generate_pertahun_tk_add->bulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$generate_pertahun_tk_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $generate_pertahun_tk_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $generate_pertahun_tk_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$generate_pertahun_tk_add->showPageFooter();
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
$generate_pertahun_tk_add->terminate();
?>