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
$status_pekerjaan_edit = new status_pekerjaan_edit();

// Run the page
$status_pekerjaan_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$status_pekerjaan_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fstatus_pekerjaanedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fstatus_pekerjaanedit = currentForm = new ew.Form("fstatus_pekerjaanedit", "edit");

	// Validate form
	fstatus_pekerjaanedit.validate = function() {
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
			<?php if ($status_pekerjaan_edit->name->Required) { ?>
				elm = this.getElements("x" + infix + "_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $status_pekerjaan_edit->name->caption(), $status_pekerjaan_edit->name->RequiredErrorMessage)) ?>");
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
	fstatus_pekerjaanedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fstatus_pekerjaanedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fstatus_pekerjaanedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $status_pekerjaan_edit->showPageHeader(); ?>
<?php
$status_pekerjaan_edit->showMessage();
?>
<form name="fstatus_pekerjaanedit" id="fstatus_pekerjaanedit" class="<?php echo $status_pekerjaan_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="status_pekerjaan">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$status_pekerjaan_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($status_pekerjaan_edit->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_status_pekerjaan_name" for="x_name" class="<?php echo $status_pekerjaan_edit->LeftColumnClass ?>"><?php echo $status_pekerjaan_edit->name->caption() ?><?php echo $status_pekerjaan_edit->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $status_pekerjaan_edit->RightColumnClass ?>"><div <?php echo $status_pekerjaan_edit->name->cellAttributes() ?>>
<span id="el_status_pekerjaan_name">
<input type="text" data-table="status_pekerjaan" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($status_pekerjaan_edit->name->getPlaceHolder()) ?>" value="<?php echo $status_pekerjaan_edit->name->EditValue ?>"<?php echo $status_pekerjaan_edit->name->editAttributes() ?>>
</span>
<?php echo $status_pekerjaan_edit->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="status_pekerjaan" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($status_pekerjaan_edit->id->CurrentValue) ?>">
<?php if (!$status_pekerjaan_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $status_pekerjaan_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $status_pekerjaan_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$status_pekerjaan_edit->showPageFooter();
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
$status_pekerjaan_edit->terminate();
?>