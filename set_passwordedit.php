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
$set_password_edit = new set_password_edit();

// Run the page
$set_password_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$set_password_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fset_passwordedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fset_passwordedit = currentForm = new ew.Form("fset_passwordedit", "edit");

	// Validate form
	fset_passwordedit.validate = function() {
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
			<?php if ($set_password_edit->nip->Required) { ?>
				elm = this.getElements("x" + infix + "_nip");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $set_password_edit->nip->caption(), $set_password_edit->nip->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($set_password_edit->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $set_password_edit->nama->caption(), $set_password_edit->nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($set_password_edit->username->Required) { ?>
				elm = this.getElements("x" + infix + "_username");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $set_password_edit->username->caption(), $set_password_edit->username->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($set_password_edit->password->Required) { ?>
				elm = this.getElements("x" + infix + "_password");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $set_password_edit->password->caption(), $set_password_edit->password->RequiredErrorMessage)) ?>");
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
	fset_passwordedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fset_passwordedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fset_passwordedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $set_password_edit->showPageHeader(); ?>
<?php
$set_password_edit->showMessage();
?>
<form name="fset_passwordedit" id="fset_passwordedit" class="<?php echo $set_password_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="set_password">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$set_password_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($set_password_edit->nip->Visible) { // nip ?>
	<div id="r_nip" class="form-group row">
		<label id="elh_set_password_nip" for="x_nip" class="<?php echo $set_password_edit->LeftColumnClass ?>"><?php echo $set_password_edit->nip->caption() ?><?php echo $set_password_edit->nip->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $set_password_edit->RightColumnClass ?>"><div <?php echo $set_password_edit->nip->cellAttributes() ?>>
<span id="el_set_password_nip">
<input type="text" data-table="set_password" data-field="x_nip" name="x_nip" id="x_nip" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($set_password_edit->nip->getPlaceHolder()) ?>" value="<?php echo $set_password_edit->nip->EditValue ?>"<?php echo $set_password_edit->nip->editAttributes() ?>>
</span>
<?php echo $set_password_edit->nip->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($set_password_edit->nama->Visible) { // nama ?>
	<div id="r_nama" class="form-group row">
		<label id="elh_set_password_nama" for="x_nama" class="<?php echo $set_password_edit->LeftColumnClass ?>"><?php echo $set_password_edit->nama->caption() ?><?php echo $set_password_edit->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $set_password_edit->RightColumnClass ?>"><div <?php echo $set_password_edit->nama->cellAttributes() ?>>
<span id="el_set_password_nama">
<input type="text" data-table="set_password" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($set_password_edit->nama->getPlaceHolder()) ?>" value="<?php echo $set_password_edit->nama->EditValue ?>"<?php echo $set_password_edit->nama->editAttributes() ?>>
</span>
<?php echo $set_password_edit->nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($set_password_edit->username->Visible) { // username ?>
	<div id="r_username" class="form-group row">
		<label id="elh_set_password_username" for="x_username" class="<?php echo $set_password_edit->LeftColumnClass ?>"><?php echo $set_password_edit->username->caption() ?><?php echo $set_password_edit->username->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $set_password_edit->RightColumnClass ?>"><div <?php echo $set_password_edit->username->cellAttributes() ?>>
<span id="el_set_password_username">
<input type="text" data-table="set_password" data-field="x_username" name="x_username" id="x_username" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($set_password_edit->username->getPlaceHolder()) ?>" value="<?php echo $set_password_edit->username->EditValue ?>"<?php echo $set_password_edit->username->editAttributes() ?>>
</span>
<?php echo $set_password_edit->username->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($set_password_edit->password->Visible) { // password ?>
	<div id="r_password" class="form-group row">
		<label id="elh_set_password_password" for="x_password" class="<?php echo $set_password_edit->LeftColumnClass ?>"><?php echo $set_password_edit->password->caption() ?><?php echo $set_password_edit->password->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $set_password_edit->RightColumnClass ?>"><div <?php echo $set_password_edit->password->cellAttributes() ?>>
<span id="el_set_password_password">
<input type="text" data-table="set_password" data-field="x_password" name="x_password" id="x_password" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($set_password_edit->password->getPlaceHolder()) ?>" value="<?php echo $set_password_edit->password->EditValue ?>"<?php echo $set_password_edit->password->editAttributes() ?>>
</span>
<?php echo $set_password_edit->password->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="set_password" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($set_password_edit->id->CurrentValue) ?>">
<?php if (!$set_password_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $set_password_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $set_password_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$set_password_edit->showPageFooter();
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
$set_password_edit->terminate();
?>