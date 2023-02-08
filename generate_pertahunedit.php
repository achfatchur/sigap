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
$generate_pertahun_edit = new generate_pertahun_edit();

// Run the page
$generate_pertahun_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$generate_pertahun_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fgenerate_pertahunedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fgenerate_pertahunedit = currentForm = new ew.Form("fgenerate_pertahunedit", "edit");

	// Validate form
	fgenerate_pertahunedit.validate = function() {
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
			<?php if ($generate_pertahun_edit->profesi->Required) { ?>
				elm = this.getElements("x" + infix + "_profesi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $generate_pertahun_edit->profesi->caption(), $generate_pertahun_edit->profesi->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($generate_pertahun_edit->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $generate_pertahun_edit->tahun->caption(), $generate_pertahun_edit->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($generate_pertahun_edit->tahun->errorMessage()) ?>");
			<?php if ($generate_pertahun_edit->bulan2->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $generate_pertahun_edit->bulan2->caption(), $generate_pertahun_edit->bulan2->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bulan2");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($generate_pertahun_edit->bulan2->errorMessage()) ?>");

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
	fgenerate_pertahunedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fgenerate_pertahunedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fgenerate_pertahunedit.lists["x_profesi"] = <?php echo $generate_pertahun_edit->profesi->Lookup->toClientList($generate_pertahun_edit) ?>;
	fgenerate_pertahunedit.lists["x_profesi"].options = <?php echo JsonEncode($generate_pertahun_edit->profesi->lookupOptions()) ?>;
	fgenerate_pertahunedit.lists["x_bulan2"] = <?php echo $generate_pertahun_edit->bulan2->Lookup->toClientList($generate_pertahun_edit) ?>;
	fgenerate_pertahunedit.lists["x_bulan2"].options = <?php echo JsonEncode($generate_pertahun_edit->bulan2->lookupOptions()) ?>;
	fgenerate_pertahunedit.autoSuggests["x_bulan2"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fgenerate_pertahunedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $generate_pertahun_edit->showPageHeader(); ?>
<?php
$generate_pertahun_edit->showMessage();
?>
<form name="fgenerate_pertahunedit" id="fgenerate_pertahunedit" class="<?php echo $generate_pertahun_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="generate_pertahun">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$generate_pertahun_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($generate_pertahun_edit->profesi->Visible) { // profesi ?>
	<div id="r_profesi" class="form-group row">
		<label id="elh_generate_pertahun_profesi" for="x_profesi" class="<?php echo $generate_pertahun_edit->LeftColumnClass ?>"><?php echo $generate_pertahun_edit->profesi->caption() ?><?php echo $generate_pertahun_edit->profesi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $generate_pertahun_edit->RightColumnClass ?>"><div <?php echo $generate_pertahun_edit->profesi->cellAttributes() ?>>
<span id="el_generate_pertahun_profesi">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="generate_pertahun" data-field="x_profesi" data-value-separator="<?php echo $generate_pertahun_edit->profesi->displayValueSeparatorAttribute() ?>" id="x_profesi" name="x_profesi"<?php echo $generate_pertahun_edit->profesi->editAttributes() ?>>
			<?php echo $generate_pertahun_edit->profesi->selectOptionListHtml("x_profesi") ?>
		</select>
</div>
<?php echo $generate_pertahun_edit->profesi->Lookup->getParamTag($generate_pertahun_edit, "p_x_profesi") ?>
</span>
<?php echo $generate_pertahun_edit->profesi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($generate_pertahun_edit->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_generate_pertahun_tahun" for="x_tahun" class="<?php echo $generate_pertahun_edit->LeftColumnClass ?>"><?php echo $generate_pertahun_edit->tahun->caption() ?><?php echo $generate_pertahun_edit->tahun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $generate_pertahun_edit->RightColumnClass ?>"><div <?php echo $generate_pertahun_edit->tahun->cellAttributes() ?>>
<span id="el_generate_pertahun_tahun">
<input type="text" data-table="generate_pertahun" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($generate_pertahun_edit->tahun->getPlaceHolder()) ?>" value="<?php echo $generate_pertahun_edit->tahun->EditValue ?>"<?php echo $generate_pertahun_edit->tahun->editAttributes() ?>>
</span>
<?php echo $generate_pertahun_edit->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($generate_pertahun_edit->bulan2->Visible) { // bulan2 ?>
	<div id="r_bulan2" class="form-group row">
		<label id="elh_generate_pertahun_bulan2" class="<?php echo $generate_pertahun_edit->LeftColumnClass ?>"><?php echo $generate_pertahun_edit->bulan2->caption() ?><?php echo $generate_pertahun_edit->bulan2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $generate_pertahun_edit->RightColumnClass ?>"><div <?php echo $generate_pertahun_edit->bulan2->cellAttributes() ?>>
<span id="el_generate_pertahun_bulan2">
<?php
$onchange = $generate_pertahun_edit->bulan2->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$generate_pertahun_edit->bulan2->EditAttrs["onchange"] = "";
?>
<span id="as_x_bulan2">
	<input type="text" class="form-control" name="sv_x_bulan2" id="sv_x_bulan2" value="<?php echo RemoveHtml($generate_pertahun_edit->bulan2->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($generate_pertahun_edit->bulan2->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($generate_pertahun_edit->bulan2->getPlaceHolder()) ?>"<?php echo $generate_pertahun_edit->bulan2->editAttributes() ?>>
</span>
<input type="hidden" data-table="generate_pertahun" data-field="x_bulan2" data-value-separator="<?php echo $generate_pertahun_edit->bulan2->displayValueSeparatorAttribute() ?>" name="x_bulan2" id="x_bulan2" value="<?php echo HtmlEncode($generate_pertahun_edit->bulan2->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fgenerate_pertahunedit"], function() {
	fgenerate_pertahunedit.createAutoSuggest({"id":"x_bulan2","forceSelect":false});
});
</script>
<?php echo $generate_pertahun_edit->bulan2->Lookup->getParamTag($generate_pertahun_edit, "p_x_bulan2") ?>
</span>
<?php echo $generate_pertahun_edit->bulan2->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="generate_pertahun" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($generate_pertahun_edit->id->CurrentValue) ?>">
<?php if (!$generate_pertahun_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $generate_pertahun_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $generate_pertahun_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$generate_pertahun_edit->showPageFooter();
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
$generate_pertahun_edit->terminate();
?>