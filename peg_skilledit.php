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
$peg_skill_edit = new peg_skill_edit();

// Run the page
$peg_skill_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$peg_skill_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpeg_skilledit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpeg_skilledit = currentForm = new ew.Form("fpeg_skilledit", "edit");

	// Validate form
	fpeg_skilledit.validate = function() {
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
			<?php if ($peg_skill_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $peg_skill_edit->id->caption(), $peg_skill_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($peg_skill_edit->pid->Required) { ?>
				elm = this.getElements("x" + infix + "_pid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $peg_skill_edit->pid->caption(), $peg_skill_edit->pid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($peg_skill_edit->pid->errorMessage()) ?>");
			<?php if ($peg_skill_edit->keahlian->Required) { ?>
				elm = this.getElements("x" + infix + "_keahlian");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $peg_skill_edit->keahlian->caption(), $peg_skill_edit->keahlian->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($peg_skill_edit->tingkat->Required) { ?>
				elm = this.getElements("x" + infix + "_tingkat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $peg_skill_edit->tingkat->caption(), $peg_skill_edit->tingkat->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($peg_skill_edit->bukti->Required) { ?>
				elm = this.getElements("x" + infix + "_bukti");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $peg_skill_edit->bukti->caption(), $peg_skill_edit->bukti->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($peg_skill_edit->keterangan->Required) { ?>
				elm = this.getElements("x" + infix + "_keterangan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $peg_skill_edit->keterangan->caption(), $peg_skill_edit->keterangan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($peg_skill_edit->c_date->Required) { ?>
				elm = this.getElements("x" + infix + "_c_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $peg_skill_edit->c_date->caption(), $peg_skill_edit->c_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($peg_skill_edit->u_date->Required) { ?>
				elm = this.getElements("x" + infix + "_u_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $peg_skill_edit->u_date->caption(), $peg_skill_edit->u_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($peg_skill_edit->c_by->Required) { ?>
				elm = this.getElements("x" + infix + "_c_by");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $peg_skill_edit->c_by->caption(), $peg_skill_edit->c_by->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($peg_skill_edit->u_by->Required) { ?>
				elm = this.getElements("x" + infix + "_u_by");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $peg_skill_edit->u_by->caption(), $peg_skill_edit->u_by->RequiredErrorMessage)) ?>");
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
	fpeg_skilledit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpeg_skilledit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpeg_skilledit.lists["x_c_by"] = <?php echo $peg_skill_edit->c_by->Lookup->toClientList($peg_skill_edit) ?>;
	fpeg_skilledit.lists["x_c_by"].options = <?php echo JsonEncode($peg_skill_edit->c_by->lookupOptions()) ?>;
	fpeg_skilledit.autoSuggests["x_c_by"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpeg_skilledit.lists["x_u_by"] = <?php echo $peg_skill_edit->u_by->Lookup->toClientList($peg_skill_edit) ?>;
	fpeg_skilledit.lists["x_u_by"].options = <?php echo JsonEncode($peg_skill_edit->u_by->lookupOptions()) ?>;
	fpeg_skilledit.autoSuggests["x_u_by"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fpeg_skilledit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $peg_skill_edit->showPageHeader(); ?>
<?php
$peg_skill_edit->showMessage();
?>
<form name="fpeg_skilledit" id="fpeg_skilledit" class="<?php echo $peg_skill_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="peg_skill">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$peg_skill_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($peg_skill_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_peg_skill_id" class="<?php echo $peg_skill_edit->LeftColumnClass ?>"><?php echo $peg_skill_edit->id->caption() ?><?php echo $peg_skill_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $peg_skill_edit->RightColumnClass ?>"><div <?php echo $peg_skill_edit->id->cellAttributes() ?>>
<span id="el_peg_skill_id">
<span<?php echo $peg_skill_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($peg_skill_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="peg_skill" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($peg_skill_edit->id->CurrentValue) ?>">
<?php echo $peg_skill_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($peg_skill_edit->pid->Visible) { // pid ?>
	<div id="r_pid" class="form-group row">
		<label id="elh_peg_skill_pid" for="x_pid" class="<?php echo $peg_skill_edit->LeftColumnClass ?>"><?php echo $peg_skill_edit->pid->caption() ?><?php echo $peg_skill_edit->pid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $peg_skill_edit->RightColumnClass ?>"><div <?php echo $peg_skill_edit->pid->cellAttributes() ?>>
<span id="el_peg_skill_pid">
<input type="text" data-table="peg_skill" data-field="x_pid" name="x_pid" id="x_pid" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($peg_skill_edit->pid->getPlaceHolder()) ?>" value="<?php echo $peg_skill_edit->pid->EditValue ?>"<?php echo $peg_skill_edit->pid->editAttributes() ?>>
</span>
<?php echo $peg_skill_edit->pid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($peg_skill_edit->keahlian->Visible) { // keahlian ?>
	<div id="r_keahlian" class="form-group row">
		<label id="elh_peg_skill_keahlian" for="x_keahlian" class="<?php echo $peg_skill_edit->LeftColumnClass ?>"><?php echo $peg_skill_edit->keahlian->caption() ?><?php echo $peg_skill_edit->keahlian->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $peg_skill_edit->RightColumnClass ?>"><div <?php echo $peg_skill_edit->keahlian->cellAttributes() ?>>
<span id="el_peg_skill_keahlian">
<input type="text" data-table="peg_skill" data-field="x_keahlian" name="x_keahlian" id="x_keahlian" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($peg_skill_edit->keahlian->getPlaceHolder()) ?>" value="<?php echo $peg_skill_edit->keahlian->EditValue ?>"<?php echo $peg_skill_edit->keahlian->editAttributes() ?>>
</span>
<?php echo $peg_skill_edit->keahlian->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($peg_skill_edit->tingkat->Visible) { // tingkat ?>
	<div id="r_tingkat" class="form-group row">
		<label id="elh_peg_skill_tingkat" for="x_tingkat" class="<?php echo $peg_skill_edit->LeftColumnClass ?>"><?php echo $peg_skill_edit->tingkat->caption() ?><?php echo $peg_skill_edit->tingkat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $peg_skill_edit->RightColumnClass ?>"><div <?php echo $peg_skill_edit->tingkat->cellAttributes() ?>>
<span id="el_peg_skill_tingkat">
<input type="text" data-table="peg_skill" data-field="x_tingkat" name="x_tingkat" id="x_tingkat" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($peg_skill_edit->tingkat->getPlaceHolder()) ?>" value="<?php echo $peg_skill_edit->tingkat->EditValue ?>"<?php echo $peg_skill_edit->tingkat->editAttributes() ?>>
</span>
<?php echo $peg_skill_edit->tingkat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($peg_skill_edit->bukti->Visible) { // bukti ?>
	<div id="r_bukti" class="form-group row">
		<label id="elh_peg_skill_bukti" for="x_bukti" class="<?php echo $peg_skill_edit->LeftColumnClass ?>"><?php echo $peg_skill_edit->bukti->caption() ?><?php echo $peg_skill_edit->bukti->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $peg_skill_edit->RightColumnClass ?>"><div <?php echo $peg_skill_edit->bukti->cellAttributes() ?>>
<span id="el_peg_skill_bukti">
<input type="text" data-table="peg_skill" data-field="x_bukti" name="x_bukti" id="x_bukti" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($peg_skill_edit->bukti->getPlaceHolder()) ?>" value="<?php echo $peg_skill_edit->bukti->EditValue ?>"<?php echo $peg_skill_edit->bukti->editAttributes() ?>>
</span>
<?php echo $peg_skill_edit->bukti->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($peg_skill_edit->keterangan->Visible) { // keterangan ?>
	<div id="r_keterangan" class="form-group row">
		<label id="elh_peg_skill_keterangan" for="x_keterangan" class="<?php echo $peg_skill_edit->LeftColumnClass ?>"><?php echo $peg_skill_edit->keterangan->caption() ?><?php echo $peg_skill_edit->keterangan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $peg_skill_edit->RightColumnClass ?>"><div <?php echo $peg_skill_edit->keterangan->cellAttributes() ?>>
<span id="el_peg_skill_keterangan">
<input type="text" data-table="peg_skill" data-field="x_keterangan" name="x_keterangan" id="x_keterangan" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($peg_skill_edit->keterangan->getPlaceHolder()) ?>" value="<?php echo $peg_skill_edit->keterangan->EditValue ?>"<?php echo $peg_skill_edit->keterangan->editAttributes() ?>>
</span>
<?php echo $peg_skill_edit->keterangan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$peg_skill_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $peg_skill_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $peg_skill_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$peg_skill_edit->showPageFooter();
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
$peg_skill_edit->terminate();
?>