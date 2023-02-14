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
$m_penyesuaian_add = new m_penyesuaian_add();

// Run the page
$m_penyesuaian_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_penyesuaian_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_penyesuaianadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fm_penyesuaianadd = currentForm = new ew.Form("fm_penyesuaianadd", "add");

	// Validate form
	fm_penyesuaianadd.validate = function() {
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
			<?php if ($m_penyesuaian_add->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_penyesuaian_add->bulan->caption(), $m_penyesuaian_add->bulan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_penyesuaian_add->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_penyesuaian_add->tahun->caption(), $m_penyesuaian_add->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_penyesuaian_add->tahun->errorMessage()) ?>");
			<?php if ($m_penyesuaian_add->c_by->Required) { ?>
				elm = this.getElements("x" + infix + "_c_by");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_penyesuaian_add->c_by->caption(), $m_penyesuaian_add->c_by->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_penyesuaian_add->import_file->Required) { ?>
				felm = this.getElements("x" + infix + "_import_file");
				elm = this.getElements("fn_x" + infix + "_import_file");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $m_penyesuaian_add->import_file->caption(), $m_penyesuaian_add->import_file->RequiredErrorMessage)) ?>");
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
	fm_penyesuaianadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fm_penyesuaianadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fm_penyesuaianadd.lists["x_bulan"] = <?php echo $m_penyesuaian_add->bulan->Lookup->toClientList($m_penyesuaian_add) ?>;
	fm_penyesuaianadd.lists["x_bulan"].options = <?php echo JsonEncode($m_penyesuaian_add->bulan->lookupOptions()) ?>;
	fm_penyesuaianadd.lists["x_c_by"] = <?php echo $m_penyesuaian_add->c_by->Lookup->toClientList($m_penyesuaian_add) ?>;
	fm_penyesuaianadd.lists["x_c_by"].options = <?php echo JsonEncode($m_penyesuaian_add->c_by->lookupOptions()) ?>;
	fm_penyesuaianadd.autoSuggests["x_c_by"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fm_penyesuaianadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_penyesuaian_add->showPageHeader(); ?>
<?php
$m_penyesuaian_add->showMessage();
?>
<form name="fm_penyesuaianadd" id="fm_penyesuaianadd" class="<?php echo $m_penyesuaian_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_penyesuaian">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$m_penyesuaian_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($m_penyesuaian_add->bulan->Visible) { // bulan ?>
	<div id="r_bulan" class="form-group row">
		<label id="elh_m_penyesuaian_bulan" for="x_bulan" class="<?php echo $m_penyesuaian_add->LeftColumnClass ?>"><?php echo $m_penyesuaian_add->bulan->caption() ?><?php echo $m_penyesuaian_add->bulan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_penyesuaian_add->RightColumnClass ?>"><div <?php echo $m_penyesuaian_add->bulan->cellAttributes() ?>>
<span id="el_m_penyesuaian_bulan">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="m_penyesuaian" data-field="x_bulan" data-value-separator="<?php echo $m_penyesuaian_add->bulan->displayValueSeparatorAttribute() ?>" id="x_bulan" name="x_bulan"<?php echo $m_penyesuaian_add->bulan->editAttributes() ?>>
			<?php echo $m_penyesuaian_add->bulan->selectOptionListHtml("x_bulan") ?>
		</select>
</div>
<?php echo $m_penyesuaian_add->bulan->Lookup->getParamTag($m_penyesuaian_add, "p_x_bulan") ?>
</span>
<?php echo $m_penyesuaian_add->bulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_penyesuaian_add->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_m_penyesuaian_tahun" for="x_tahun" class="<?php echo $m_penyesuaian_add->LeftColumnClass ?>"><?php echo $m_penyesuaian_add->tahun->caption() ?><?php echo $m_penyesuaian_add->tahun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_penyesuaian_add->RightColumnClass ?>"><div <?php echo $m_penyesuaian_add->tahun->cellAttributes() ?>>
<span id="el_m_penyesuaian_tahun">
<input type="text" data-table="m_penyesuaian" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($m_penyesuaian_add->tahun->getPlaceHolder()) ?>" value="<?php echo $m_penyesuaian_add->tahun->EditValue ?>"<?php echo $m_penyesuaian_add->tahun->editAttributes() ?>>
</span>
<?php echo $m_penyesuaian_add->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_penyesuaian_add->import_file->Visible) { // import_file ?>
	<div id="r_import_file" class="form-group row">
		<label id="elh_m_penyesuaian_import_file" class="<?php echo $m_penyesuaian_add->LeftColumnClass ?>"><?php echo $m_penyesuaian_add->import_file->caption() ?><?php echo $m_penyesuaian_add->import_file->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_penyesuaian_add->RightColumnClass ?>"><div <?php echo $m_penyesuaian_add->import_file->cellAttributes() ?>>
<span id="el_m_penyesuaian_import_file">
<div id="fd_x_import_file">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $m_penyesuaian_add->import_file->title() ?>" data-table="m_penyesuaian" data-field="x_import_file" name="x_import_file" id="x_import_file" lang="<?php echo CurrentLanguageID() ?>"<?php echo $m_penyesuaian_add->import_file->editAttributes() ?><?php if ($m_penyesuaian_add->import_file->ReadOnly || $m_penyesuaian_add->import_file->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_import_file"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_import_file" id= "fn_x_import_file" value="<?php echo $m_penyesuaian_add->import_file->Upload->FileName ?>">
<input type="hidden" name="fa_x_import_file" id= "fa_x_import_file" value="0">
<input type="hidden" name="fs_x_import_file" id= "fs_x_import_file" value="65535">
<input type="hidden" name="fx_x_import_file" id= "fx_x_import_file" value="<?php echo $m_penyesuaian_add->import_file->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_import_file" id= "fm_x_import_file" value="<?php echo $m_penyesuaian_add->import_file->UploadMaxFileSize ?>">
</div>
<table id="ft_x_import_file" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $m_penyesuaian_add->import_file->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("penyesuaian", explode(",", $m_penyesuaian->getCurrentDetailTable())) && $penyesuaian->DetailAdd) {
?>
<?php if ($m_penyesuaian->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("penyesuaian", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "penyesuaiangrid.php" ?>
<?php } ?>
<?php if (!$m_penyesuaian_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $m_penyesuaian_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_penyesuaian_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$m_penyesuaian_add->showPageFooter();
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
$m_penyesuaian_add->terminate();
?>