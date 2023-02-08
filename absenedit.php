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
$absen_edit = new absen_edit();

// Run the page
$absen_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$absen_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fabsenedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fabsenedit = currentForm = new ew.Form("fabsenedit", "edit");

	// Validate form
	fabsenedit.validate = function() {
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
			<?php if ($absen_edit->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_edit->tahun->caption(), $absen_edit->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_edit->tahun->errorMessage()) ?>");
			<?php if ($absen_edit->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_edit->bulan->caption(), $absen_edit->bulan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($absen_edit->jumlah_hari_kerja->Required) { ?>
				elm = this.getElements("x" + infix + "_jumlah_hari_kerja");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_edit->jumlah_hari_kerja->caption(), $absen_edit->jumlah_hari_kerja->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jumlah_hari_kerja");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_edit->jumlah_hari_kerja->errorMessage()) ?>");
			<?php if ($absen_edit->datetime->Required) { ?>
				elm = this.getElements("x" + infix + "_datetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_edit->datetime->caption(), $absen_edit->datetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($absen_edit->createuser->Required) { ?>
				elm = this.getElements("x" + infix + "_createuser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_edit->createuser->caption(), $absen_edit->createuser->RequiredErrorMessage)) ?>");
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
	fabsenedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fabsenedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fabsenedit.lists["x_bulan"] = <?php echo $absen_edit->bulan->Lookup->toClientList($absen_edit) ?>;
	fabsenedit.lists["x_bulan"].options = <?php echo JsonEncode($absen_edit->bulan->lookupOptions()) ?>;
	fabsenedit.lists["x_createuser"] = <?php echo $absen_edit->createuser->Lookup->toClientList($absen_edit) ?>;
	fabsenedit.lists["x_createuser"].options = <?php echo JsonEncode($absen_edit->createuser->lookupOptions()) ?>;
	fabsenedit.autoSuggests["x_createuser"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fabsenedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $absen_edit->showPageHeader(); ?>
<?php
$absen_edit->showMessage();
?>
<form name="fabsenedit" id="fabsenedit" class="<?php echo $absen_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="absen">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$absen_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($absen_edit->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_absen_tahun" for="x_tahun" class="<?php echo $absen_edit->LeftColumnClass ?>"><?php echo $absen_edit->tahun->caption() ?><?php echo $absen_edit->tahun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_edit->RightColumnClass ?>"><div <?php echo $absen_edit->tahun->cellAttributes() ?>>
<span id="el_absen_tahun">
<input type="text" data-table="absen" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_edit->tahun->getPlaceHolder()) ?>" value="<?php echo $absen_edit->tahun->EditValue ?>"<?php echo $absen_edit->tahun->editAttributes() ?>>
</span>
<?php echo $absen_edit->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_edit->bulan->Visible) { // bulan ?>
	<div id="r_bulan" class="form-group row">
		<label id="elh_absen_bulan" for="x_bulan" class="<?php echo $absen_edit->LeftColumnClass ?>"><?php echo $absen_edit->bulan->caption() ?><?php echo $absen_edit->bulan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_edit->RightColumnClass ?>"><div <?php echo $absen_edit->bulan->cellAttributes() ?>>
<span id="el_absen_bulan">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_bulan"><?php echo EmptyValue(strval($absen_edit->bulan->ViewValue)) ? $Language->phrase("PleaseSelect") : $absen_edit->bulan->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($absen_edit->bulan->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($absen_edit->bulan->ReadOnly || $absen_edit->bulan->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_bulan',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $absen_edit->bulan->Lookup->getParamTag($absen_edit, "p_x_bulan") ?>
<input type="hidden" data-table="absen" data-field="x_bulan" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $absen_edit->bulan->displayValueSeparatorAttribute() ?>" name="x_bulan" id="x_bulan" value="<?php echo $absen_edit->bulan->CurrentValue ?>"<?php echo $absen_edit->bulan->editAttributes() ?>>
</span>
<?php echo $absen_edit->bulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_edit->jumlah_hari_kerja->Visible) { // jumlah_hari_kerja ?>
	<div id="r_jumlah_hari_kerja" class="form-group row">
		<label id="elh_absen_jumlah_hari_kerja" for="x_jumlah_hari_kerja" class="<?php echo $absen_edit->LeftColumnClass ?>"><?php echo $absen_edit->jumlah_hari_kerja->caption() ?><?php echo $absen_edit->jumlah_hari_kerja->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_edit->RightColumnClass ?>"><div <?php echo $absen_edit->jumlah_hari_kerja->cellAttributes() ?>>
<span id="el_absen_jumlah_hari_kerja">
<input type="text" data-table="absen" data-field="x_jumlah_hari_kerja" name="x_jumlah_hari_kerja" id="x_jumlah_hari_kerja" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_edit->jumlah_hari_kerja->getPlaceHolder()) ?>" value="<?php echo $absen_edit->jumlah_hari_kerja->EditValue ?>"<?php echo $absen_edit->jumlah_hari_kerja->editAttributes() ?>>
</span>
<?php echo $absen_edit->jumlah_hari_kerja->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="absen" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($absen_edit->id->CurrentValue) ?>">
<?php
	if (in_array("absen_detil", explode(",", $absen->getCurrentDetailTable())) && $absen_detil->DetailEdit) {
?>
<?php if ($absen->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("absen_detil", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "absen_detilgrid.php" ?>
<?php } ?>
<?php if (!$absen_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $absen_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $absen_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$absen_edit->showPageFooter();
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
$absen_edit->terminate();
?>