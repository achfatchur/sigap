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
$yayasan_edit = new yayasan_edit();

// Run the page
$yayasan_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$yayasan_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fyayasanedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fyayasanedit = currentForm = new ew.Form("fyayasanedit", "edit");

	// Validate form
	fyayasanedit.validate = function() {
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
			<?php if ($yayasan_edit->id_pegawai->Required) { ?>
				elm = this.getElements("x" + infix + "_id_pegawai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $yayasan_edit->id_pegawai->caption(), $yayasan_edit->id_pegawai->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id_pegawai");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($yayasan_edit->id_pegawai->errorMessage()) ?>");
			<?php if ($yayasan_edit->gaji_pokok->Required) { ?>
				elm = this.getElements("x" + infix + "_gaji_pokok");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $yayasan_edit->gaji_pokok->caption(), $yayasan_edit->gaji_pokok->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_gaji_pokok");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($yayasan_edit->gaji_pokok->errorMessage()) ?>");
			<?php if ($yayasan_edit->potongan->Required) { ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $yayasan_edit->potongan->caption(), $yayasan_edit->potongan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($yayasan_edit->potongan->errorMessage()) ?>");
			<?php if ($yayasan_edit->total->Required) { ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $yayasan_edit->total->caption(), $yayasan_edit->total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($yayasan_edit->total->errorMessage()) ?>");

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
	fyayasanedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fyayasanedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fyayasanedit.lists["x_id_pegawai"] = <?php echo $yayasan_edit->id_pegawai->Lookup->toClientList($yayasan_edit) ?>;
	fyayasanedit.lists["x_id_pegawai"].options = <?php echo JsonEncode($yayasan_edit->id_pegawai->lookupOptions()) ?>;
	fyayasanedit.autoSuggests["x_id_pegawai"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fyayasanedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $yayasan_edit->showPageHeader(); ?>
<?php
$yayasan_edit->showMessage();
?>
<form name="fyayasanedit" id="fyayasanedit" class="<?php echo $yayasan_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="yayasan">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$yayasan_edit->IsModal ?>">
<?php if ($yayasan->getCurrentMasterTable() == "m_yayasan") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="m_yayasan">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($yayasan_edit->m_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($yayasan_edit->id_pegawai->Visible) { // id_pegawai ?>
	<div id="r_id_pegawai" class="form-group row">
		<label id="elh_yayasan_id_pegawai" class="<?php echo $yayasan_edit->LeftColumnClass ?>"><?php echo $yayasan_edit->id_pegawai->caption() ?><?php echo $yayasan_edit->id_pegawai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $yayasan_edit->RightColumnClass ?>"><div <?php echo $yayasan_edit->id_pegawai->cellAttributes() ?>>
<span id="el_yayasan_id_pegawai">
<?php
$onchange = $yayasan_edit->id_pegawai->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$yayasan_edit->id_pegawai->EditAttrs["onchange"] = "";
?>
<span id="as_x_id_pegawai">
	<input type="text" class="form-control" name="sv_x_id_pegawai" id="sv_x_id_pegawai" value="<?php echo RemoveHtml($yayasan_edit->id_pegawai->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($yayasan_edit->id_pegawai->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($yayasan_edit->id_pegawai->getPlaceHolder()) ?>"<?php echo $yayasan_edit->id_pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="yayasan" data-field="x_id_pegawai" data-value-separator="<?php echo $yayasan_edit->id_pegawai->displayValueSeparatorAttribute() ?>" name="x_id_pegawai" id="x_id_pegawai" value="<?php echo HtmlEncode($yayasan_edit->id_pegawai->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fyayasanedit"], function() {
	fyayasanedit.createAutoSuggest({"id":"x_id_pegawai","forceSelect":false});
});
</script>
<?php echo $yayasan_edit->id_pegawai->Lookup->getParamTag($yayasan_edit, "p_x_id_pegawai") ?>
</span>
<?php echo $yayasan_edit->id_pegawai->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($yayasan_edit->gaji_pokok->Visible) { // gaji_pokok ?>
	<div id="r_gaji_pokok" class="form-group row">
		<label id="elh_yayasan_gaji_pokok" for="x_gaji_pokok" class="<?php echo $yayasan_edit->LeftColumnClass ?>"><?php echo $yayasan_edit->gaji_pokok->caption() ?><?php echo $yayasan_edit->gaji_pokok->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $yayasan_edit->RightColumnClass ?>"><div <?php echo $yayasan_edit->gaji_pokok->cellAttributes() ?>>
<span id="el_yayasan_gaji_pokok">
<input type="text" data-table="yayasan" data-field="x_gaji_pokok" name="x_gaji_pokok" id="x_gaji_pokok" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($yayasan_edit->gaji_pokok->getPlaceHolder()) ?>" value="<?php echo $yayasan_edit->gaji_pokok->EditValue ?>"<?php echo $yayasan_edit->gaji_pokok->editAttributes() ?>>
</span>
<?php echo $yayasan_edit->gaji_pokok->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($yayasan_edit->potongan->Visible) { // potongan ?>
	<div id="r_potongan" class="form-group row">
		<label id="elh_yayasan_potongan" for="x_potongan" class="<?php echo $yayasan_edit->LeftColumnClass ?>"><?php echo $yayasan_edit->potongan->caption() ?><?php echo $yayasan_edit->potongan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $yayasan_edit->RightColumnClass ?>"><div <?php echo $yayasan_edit->potongan->cellAttributes() ?>>
<span id="el_yayasan_potongan">
<input type="text" data-table="yayasan" data-field="x_potongan" name="x_potongan" id="x_potongan" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($yayasan_edit->potongan->getPlaceHolder()) ?>" value="<?php echo $yayasan_edit->potongan->EditValue ?>"<?php echo $yayasan_edit->potongan->editAttributes() ?>>
</span>
<?php echo $yayasan_edit->potongan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($yayasan_edit->total->Visible) { // total ?>
	<div id="r_total" class="form-group row">
		<label id="elh_yayasan_total" for="x_total" class="<?php echo $yayasan_edit->LeftColumnClass ?>"><?php echo $yayasan_edit->total->caption() ?><?php echo $yayasan_edit->total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $yayasan_edit->RightColumnClass ?>"><div <?php echo $yayasan_edit->total->cellAttributes() ?>>
<span id="el_yayasan_total">
<input type="text" data-table="yayasan" data-field="x_total" name="x_total" id="x_total" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($yayasan_edit->total->getPlaceHolder()) ?>" value="<?php echo $yayasan_edit->total->EditValue ?>"<?php echo $yayasan_edit->total->editAttributes() ?>>
</span>
<?php echo $yayasan_edit->total->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="yayasan" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($yayasan_edit->id->CurrentValue) ?>">
<?php if (!$yayasan_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $yayasan_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $yayasan_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$yayasan_edit->showPageFooter();
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
$yayasan_edit->terminate();
?>