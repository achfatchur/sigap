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
$m_reward_edit = new m_reward_edit();

// Run the page
$m_reward_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_reward_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_rewardedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fm_rewardedit = currentForm = new ew.Form("fm_rewardedit", "edit");

	// Validate form
	fm_rewardedit.validate = function() {
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
			<?php if ($m_reward_edit->jenjang->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_reward_edit->jenjang->caption(), $m_reward_edit->jenjang->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_reward_edit->jabatan->Required) { ?>
				elm = this.getElements("x" + infix + "_jabatan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_reward_edit->jabatan->caption(), $m_reward_edit->jabatan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_reward_edit->min_jmlh_masuk->Required) { ?>
				elm = this.getElements("x" + infix + "_min_jmlh_masuk");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_reward_edit->min_jmlh_masuk->caption(), $m_reward_edit->min_jmlh_masuk->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_min_jmlh_masuk");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_reward_edit->min_jmlh_masuk->errorMessage()) ?>");
			<?php if ($m_reward_edit->value->Required) { ?>
				elm = this.getElements("x" + infix + "_value");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_reward_edit->value->caption(), $m_reward_edit->value->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_value");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_reward_edit->value->errorMessage()) ?>");

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
	fm_rewardedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fm_rewardedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fm_rewardedit.lists["x_jenjang"] = <?php echo $m_reward_edit->jenjang->Lookup->toClientList($m_reward_edit) ?>;
	fm_rewardedit.lists["x_jenjang"].options = <?php echo JsonEncode($m_reward_edit->jenjang->lookupOptions()) ?>;
	fm_rewardedit.lists["x_jabatan"] = <?php echo $m_reward_edit->jabatan->Lookup->toClientList($m_reward_edit) ?>;
	fm_rewardedit.lists["x_jabatan"].options = <?php echo JsonEncode($m_reward_edit->jabatan->lookupOptions()) ?>;
	loadjs.done("fm_rewardedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_reward_edit->showPageHeader(); ?>
<?php
$m_reward_edit->showMessage();
?>
<form name="fm_rewardedit" id="fm_rewardedit" class="<?php echo $m_reward_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_reward">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$m_reward_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($m_reward_edit->jenjang->Visible) { // jenjang ?>
	<div id="r_jenjang" class="form-group row">
		<label id="elh_m_reward_jenjang" for="x_jenjang" class="<?php echo $m_reward_edit->LeftColumnClass ?>"><?php echo $m_reward_edit->jenjang->caption() ?><?php echo $m_reward_edit->jenjang->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_reward_edit->RightColumnClass ?>"><div <?php echo $m_reward_edit->jenjang->cellAttributes() ?>>
<span id="el_m_reward_jenjang">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="m_reward" data-field="x_jenjang" data-value-separator="<?php echo $m_reward_edit->jenjang->displayValueSeparatorAttribute() ?>" id="x_jenjang" name="x_jenjang"<?php echo $m_reward_edit->jenjang->editAttributes() ?>>
			<?php echo $m_reward_edit->jenjang->selectOptionListHtml("x_jenjang") ?>
		</select>
</div>
<?php echo $m_reward_edit->jenjang->Lookup->getParamTag($m_reward_edit, "p_x_jenjang") ?>
</span>
<?php echo $m_reward_edit->jenjang->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_reward_edit->jabatan->Visible) { // jabatan ?>
	<div id="r_jabatan" class="form-group row">
		<label id="elh_m_reward_jabatan" for="x_jabatan" class="<?php echo $m_reward_edit->LeftColumnClass ?>"><?php echo $m_reward_edit->jabatan->caption() ?><?php echo $m_reward_edit->jabatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_reward_edit->RightColumnClass ?>"><div <?php echo $m_reward_edit->jabatan->cellAttributes() ?>>
<span id="el_m_reward_jabatan">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="m_reward" data-field="x_jabatan" data-value-separator="<?php echo $m_reward_edit->jabatan->displayValueSeparatorAttribute() ?>" id="x_jabatan" name="x_jabatan"<?php echo $m_reward_edit->jabatan->editAttributes() ?>>
			<?php echo $m_reward_edit->jabatan->selectOptionListHtml("x_jabatan") ?>
		</select>
</div>
<?php echo $m_reward_edit->jabatan->Lookup->getParamTag($m_reward_edit, "p_x_jabatan") ?>
</span>
<?php echo $m_reward_edit->jabatan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_reward_edit->min_jmlh_masuk->Visible) { // min_jmlh_masuk ?>
	<div id="r_min_jmlh_masuk" class="form-group row">
		<label id="elh_m_reward_min_jmlh_masuk" for="x_min_jmlh_masuk" class="<?php echo $m_reward_edit->LeftColumnClass ?>"><?php echo $m_reward_edit->min_jmlh_masuk->caption() ?><?php echo $m_reward_edit->min_jmlh_masuk->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_reward_edit->RightColumnClass ?>"><div <?php echo $m_reward_edit->min_jmlh_masuk->cellAttributes() ?>>
<span id="el_m_reward_min_jmlh_masuk">
<input type="text" data-table="m_reward" data-field="x_min_jmlh_masuk" name="x_min_jmlh_masuk" id="x_min_jmlh_masuk" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($m_reward_edit->min_jmlh_masuk->getPlaceHolder()) ?>" value="<?php echo $m_reward_edit->min_jmlh_masuk->EditValue ?>"<?php echo $m_reward_edit->min_jmlh_masuk->editAttributes() ?>>
</span>
<?php echo $m_reward_edit->min_jmlh_masuk->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_reward_edit->value->Visible) { // value ?>
	<div id="r_value" class="form-group row">
		<label id="elh_m_reward_value" for="x_value" class="<?php echo $m_reward_edit->LeftColumnClass ?>"><?php echo $m_reward_edit->value->caption() ?><?php echo $m_reward_edit->value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_reward_edit->RightColumnClass ?>"><div <?php echo $m_reward_edit->value->cellAttributes() ?>>
<span id="el_m_reward_value">
<input type="text" data-table="m_reward" data-field="x_value" name="x_value" id="x_value" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($m_reward_edit->value->getPlaceHolder()) ?>" value="<?php echo $m_reward_edit->value->EditValue ?>"<?php echo $m_reward_edit->value->editAttributes() ?>>
</span>
<?php echo $m_reward_edit->value->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="m_reward" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($m_reward_edit->id->CurrentValue) ?>">
<?php if (!$m_reward_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $m_reward_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_reward_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$m_reward_edit->showPageFooter();
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
$m_reward_edit->terminate();
?>