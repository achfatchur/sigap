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
$m_potongan_smk_edit = new m_potongan_smk_edit();

// Run the page
$m_potongan_smk_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_potongan_smk_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_potongan_smkedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fm_potongan_smkedit = currentForm = new ew.Form("fm_potongan_smkedit", "edit");

	// Validate form
	fm_potongan_smkedit.validate = function() {
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
			<?php if ($m_potongan_smk_edit->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_potongan_smk_edit->tahun->caption(), $m_potongan_smk_edit->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_potongan_smk_edit->tahun->errorMessage()) ?>");
			<?php if ($m_potongan_smk_edit->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_potongan_smk_edit->bulan->caption(), $m_potongan_smk_edit->bulan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_potongan_smk_edit->c_by->Required) { ?>
				elm = this.getElements("x" + infix + "_c_by");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_potongan_smk_edit->c_by->caption(), $m_potongan_smk_edit->c_by->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_potongan_smk_edit->datetime->Required) { ?>
				elm = this.getElements("x" + infix + "_datetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_potongan_smk_edit->datetime->caption(), $m_potongan_smk_edit->datetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_potongan_smk_edit->import_file->Required) { ?>
				elm = this.getElements("x" + infix + "_import_file");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_potongan_smk_edit->import_file->caption(), $m_potongan_smk_edit->import_file->RequiredErrorMessage)) ?>");
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
	fm_potongan_smkedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fm_potongan_smkedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fm_potongan_smkedit.lists["x_bulan"] = <?php echo $m_potongan_smk_edit->bulan->Lookup->toClientList($m_potongan_smk_edit) ?>;
	fm_potongan_smkedit.lists["x_bulan"].options = <?php echo JsonEncode($m_potongan_smk_edit->bulan->lookupOptions()) ?>;
	fm_potongan_smkedit.lists["x_c_by"] = <?php echo $m_potongan_smk_edit->c_by->Lookup->toClientList($m_potongan_smk_edit) ?>;
	fm_potongan_smkedit.lists["x_c_by"].options = <?php echo JsonEncode($m_potongan_smk_edit->c_by->lookupOptions()) ?>;
	fm_potongan_smkedit.autoSuggests["x_c_by"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fm_potongan_smkedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_potongan_smk_edit->showPageHeader(); ?>
<?php
$m_potongan_smk_edit->showMessage();
?>
<form name="fm_potongan_smkedit" id="fm_potongan_smkedit" class="<?php echo $m_potongan_smk_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_potongan_smk">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$m_potongan_smk_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($m_potongan_smk_edit->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_m_potongan_smk_tahun" for="x_tahun" class="<?php echo $m_potongan_smk_edit->LeftColumnClass ?>"><?php echo $m_potongan_smk_edit->tahun->caption() ?><?php echo $m_potongan_smk_edit->tahun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_potongan_smk_edit->RightColumnClass ?>"><div <?php echo $m_potongan_smk_edit->tahun->cellAttributes() ?>>
<span id="el_m_potongan_smk_tahun">
<input type="text" data-table="m_potongan_smk" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($m_potongan_smk_edit->tahun->getPlaceHolder()) ?>" value="<?php echo $m_potongan_smk_edit->tahun->EditValue ?>"<?php echo $m_potongan_smk_edit->tahun->editAttributes() ?>>
</span>
<?php echo $m_potongan_smk_edit->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_potongan_smk_edit->bulan->Visible) { // bulan ?>
	<div id="r_bulan" class="form-group row">
		<label id="elh_m_potongan_smk_bulan" for="x_bulan" class="<?php echo $m_potongan_smk_edit->LeftColumnClass ?>"><?php echo $m_potongan_smk_edit->bulan->caption() ?><?php echo $m_potongan_smk_edit->bulan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_potongan_smk_edit->RightColumnClass ?>"><div <?php echo $m_potongan_smk_edit->bulan->cellAttributes() ?>>
<span id="el_m_potongan_smk_bulan">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="m_potongan_smk" data-field="x_bulan" data-value-separator="<?php echo $m_potongan_smk_edit->bulan->displayValueSeparatorAttribute() ?>" id="x_bulan" name="x_bulan"<?php echo $m_potongan_smk_edit->bulan->editAttributes() ?>>
			<?php echo $m_potongan_smk_edit->bulan->selectOptionListHtml("x_bulan") ?>
		</select>
</div>
<?php echo $m_potongan_smk_edit->bulan->Lookup->getParamTag($m_potongan_smk_edit, "p_x_bulan") ?>
</span>
<?php echo $m_potongan_smk_edit->bulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_potongan_smk_edit->import_file->Visible) { // import_file ?>
	<div id="r_import_file" class="form-group row">
		<label id="elh_m_potongan_smk_import_file" for="x_import_file" class="<?php echo $m_potongan_smk_edit->LeftColumnClass ?>"><?php echo $m_potongan_smk_edit->import_file->caption() ?><?php echo $m_potongan_smk_edit->import_file->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_potongan_smk_edit->RightColumnClass ?>"><div <?php echo $m_potongan_smk_edit->import_file->cellAttributes() ?>>
<span id="el_m_potongan_smk_import_file">
<textarea data-table="m_potongan_smk" data-field="x_import_file" name="x_import_file" id="x_import_file" cols="35" rows="4" placeholder="<?php echo HtmlEncode($m_potongan_smk_edit->import_file->getPlaceHolder()) ?>"<?php echo $m_potongan_smk_edit->import_file->editAttributes() ?>><?php echo $m_potongan_smk_edit->import_file->EditValue ?></textarea>
</span>
<?php echo $m_potongan_smk_edit->import_file->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="m_potongan_smk" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($m_potongan_smk_edit->id->CurrentValue) ?>">
<?php
	if (in_array("potongan_smk", explode(",", $m_potongan_smk->getCurrentDetailTable())) && $potongan_smk->DetailEdit) {
?>
<?php if ($m_potongan_smk->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("potongan_smk", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "potongan_smkgrid.php" ?>
<?php } ?>
<?php if (!$m_potongan_smk_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $m_potongan_smk_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_potongan_smk_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$m_potongan_smk_edit->showPageFooter();
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
$m_potongan_smk_edit->terminate();
?>