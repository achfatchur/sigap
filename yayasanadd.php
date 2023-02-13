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
$yayasan_add = new yayasan_add();

// Run the page
$yayasan_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$yayasan_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fyayasanadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fyayasanadd = currentForm = new ew.Form("fyayasanadd", "add");

	// Validate form
	fyayasanadd.validate = function() {
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
			<?php if ($yayasan_add->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $yayasan_add->bulan->caption(), $yayasan_add->bulan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($yayasan_add->bulan->errorMessage()) ?>");
			<?php if ($yayasan_add->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $yayasan_add->tahun->caption(), $yayasan_add->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($yayasan_add->tahun->errorMessage()) ?>");
			<?php if ($yayasan_add->id_pegawai->Required) { ?>
				elm = this.getElements("x" + infix + "_id_pegawai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $yayasan_add->id_pegawai->caption(), $yayasan_add->id_pegawai->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id_pegawai");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($yayasan_add->id_pegawai->errorMessage()) ?>");
			<?php if ($yayasan_add->gaji_pokok->Required) { ?>
				elm = this.getElements("x" + infix + "_gaji_pokok");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $yayasan_add->gaji_pokok->caption(), $yayasan_add->gaji_pokok->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_gaji_pokok");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($yayasan_add->gaji_pokok->errorMessage()) ?>");
			<?php if ($yayasan_add->potongan->Required) { ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $yayasan_add->potongan->caption(), $yayasan_add->potongan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_potongan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($yayasan_add->potongan->errorMessage()) ?>");
			<?php if ($yayasan_add->total->Required) { ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $yayasan_add->total->caption(), $yayasan_add->total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($yayasan_add->total->errorMessage()) ?>");

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
	fyayasanadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fyayasanadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fyayasanadd.lists["x_bulan"] = <?php echo $yayasan_add->bulan->Lookup->toClientList($yayasan_add) ?>;
	fyayasanadd.lists["x_bulan"].options = <?php echo JsonEncode($yayasan_add->bulan->lookupOptions()) ?>;
	fyayasanadd.autoSuggests["x_bulan"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fyayasanadd.lists["x_id_pegawai"] = <?php echo $yayasan_add->id_pegawai->Lookup->toClientList($yayasan_add) ?>;
	fyayasanadd.lists["x_id_pegawai"].options = <?php echo JsonEncode($yayasan_add->id_pegawai->lookupOptions()) ?>;
	fyayasanadd.autoSuggests["x_id_pegawai"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fyayasanadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $yayasan_add->showPageHeader(); ?>
<?php
$yayasan_add->showMessage();
?>
<form name="fyayasanadd" id="fyayasanadd" class="<?php echo $yayasan_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="yayasan">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$yayasan_add->IsModal ?>">
<?php if ($yayasan->getCurrentMasterTable() == "m_yayasan") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="m_yayasan">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($yayasan_add->m_id->getSessionValue()) ?>">
<input type="hidden" name="fk_bulan" value="<?php echo HtmlEncode($yayasan_add->bulan->getSessionValue()) ?>">
<input type="hidden" name="fk_tahun" value="<?php echo HtmlEncode($yayasan_add->tahun->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($yayasan_add->bulan->Visible) { // bulan ?>
	<div id="r_bulan" class="form-group row">
		<label id="elh_yayasan_bulan" class="<?php echo $yayasan_add->LeftColumnClass ?>"><?php echo $yayasan_add->bulan->caption() ?><?php echo $yayasan_add->bulan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $yayasan_add->RightColumnClass ?>"><div <?php echo $yayasan_add->bulan->cellAttributes() ?>>
<?php if ($yayasan_add->bulan->getSessionValue() != "") { ?>
<span id="el_yayasan_bulan">
<span<?php echo $yayasan_add->bulan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($yayasan_add->bulan->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_bulan" name="x_bulan" value="<?php echo HtmlEncode($yayasan_add->bulan->CurrentValue) ?>">
<?php } else { ?>
<span id="el_yayasan_bulan">
<?php
$onchange = $yayasan_add->bulan->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$yayasan_add->bulan->EditAttrs["onchange"] = "";
?>
<span id="as_x_bulan">
	<input type="text" class="form-control" name="sv_x_bulan" id="sv_x_bulan" value="<?php echo RemoveHtml($yayasan_add->bulan->EditValue) ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($yayasan_add->bulan->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($yayasan_add->bulan->getPlaceHolder()) ?>"<?php echo $yayasan_add->bulan->editAttributes() ?>>
</span>
<input type="hidden" data-table="yayasan" data-field="x_bulan" data-value-separator="<?php echo $yayasan_add->bulan->displayValueSeparatorAttribute() ?>" name="x_bulan" id="x_bulan" value="<?php echo HtmlEncode($yayasan_add->bulan->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fyayasanadd"], function() {
	fyayasanadd.createAutoSuggest({"id":"x_bulan","forceSelect":false});
});
</script>
<?php echo $yayasan_add->bulan->Lookup->getParamTag($yayasan_add, "p_x_bulan") ?>
</span>
<?php } ?>
<?php echo $yayasan_add->bulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($yayasan_add->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_yayasan_tahun" for="x_tahun" class="<?php echo $yayasan_add->LeftColumnClass ?>"><?php echo $yayasan_add->tahun->caption() ?><?php echo $yayasan_add->tahun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $yayasan_add->RightColumnClass ?>"><div <?php echo $yayasan_add->tahun->cellAttributes() ?>>
<?php if ($yayasan_add->tahun->getSessionValue() != "") { ?>
<span id="el_yayasan_tahun">
<span<?php echo $yayasan_add->tahun->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($yayasan_add->tahun->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_tahun" name="x_tahun" value="<?php echo HtmlEncode($yayasan_add->tahun->CurrentValue) ?>">
<?php } else { ?>
<span id="el_yayasan_tahun">
<input type="text" data-table="yayasan" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($yayasan_add->tahun->getPlaceHolder()) ?>" value="<?php echo $yayasan_add->tahun->EditValue ?>"<?php echo $yayasan_add->tahun->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $yayasan_add->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($yayasan_add->id_pegawai->Visible) { // id_pegawai ?>
	<div id="r_id_pegawai" class="form-group row">
		<label id="elh_yayasan_id_pegawai" class="<?php echo $yayasan_add->LeftColumnClass ?>"><?php echo $yayasan_add->id_pegawai->caption() ?><?php echo $yayasan_add->id_pegawai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $yayasan_add->RightColumnClass ?>"><div <?php echo $yayasan_add->id_pegawai->cellAttributes() ?>>
<span id="el_yayasan_id_pegawai">
<?php
$onchange = $yayasan_add->id_pegawai->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$yayasan_add->id_pegawai->EditAttrs["onchange"] = "";
?>
<span id="as_x_id_pegawai">
	<input type="text" class="form-control" name="sv_x_id_pegawai" id="sv_x_id_pegawai" value="<?php echo RemoveHtml($yayasan_add->id_pegawai->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($yayasan_add->id_pegawai->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($yayasan_add->id_pegawai->getPlaceHolder()) ?>"<?php echo $yayasan_add->id_pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="yayasan" data-field="x_id_pegawai" data-value-separator="<?php echo $yayasan_add->id_pegawai->displayValueSeparatorAttribute() ?>" name="x_id_pegawai" id="x_id_pegawai" value="<?php echo HtmlEncode($yayasan_add->id_pegawai->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fyayasanadd"], function() {
	fyayasanadd.createAutoSuggest({"id":"x_id_pegawai","forceSelect":false});
});
</script>
<?php echo $yayasan_add->id_pegawai->Lookup->getParamTag($yayasan_add, "p_x_id_pegawai") ?>
</span>
<?php echo $yayasan_add->id_pegawai->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($yayasan_add->gaji_pokok->Visible) { // gaji_pokok ?>
	<div id="r_gaji_pokok" class="form-group row">
		<label id="elh_yayasan_gaji_pokok" for="x_gaji_pokok" class="<?php echo $yayasan_add->LeftColumnClass ?>"><?php echo $yayasan_add->gaji_pokok->caption() ?><?php echo $yayasan_add->gaji_pokok->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $yayasan_add->RightColumnClass ?>"><div <?php echo $yayasan_add->gaji_pokok->cellAttributes() ?>>
<span id="el_yayasan_gaji_pokok">
<input type="text" data-table="yayasan" data-field="x_gaji_pokok" name="x_gaji_pokok" id="x_gaji_pokok" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($yayasan_add->gaji_pokok->getPlaceHolder()) ?>" value="<?php echo $yayasan_add->gaji_pokok->EditValue ?>"<?php echo $yayasan_add->gaji_pokok->editAttributes() ?>>
</span>
<?php echo $yayasan_add->gaji_pokok->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($yayasan_add->potongan->Visible) { // potongan ?>
	<div id="r_potongan" class="form-group row">
		<label id="elh_yayasan_potongan" for="x_potongan" class="<?php echo $yayasan_add->LeftColumnClass ?>"><?php echo $yayasan_add->potongan->caption() ?><?php echo $yayasan_add->potongan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $yayasan_add->RightColumnClass ?>"><div <?php echo $yayasan_add->potongan->cellAttributes() ?>>
<span id="el_yayasan_potongan">
<input type="text" data-table="yayasan" data-field="x_potongan" name="x_potongan" id="x_potongan" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($yayasan_add->potongan->getPlaceHolder()) ?>" value="<?php echo $yayasan_add->potongan->EditValue ?>"<?php echo $yayasan_add->potongan->editAttributes() ?>>
</span>
<?php echo $yayasan_add->potongan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($yayasan_add->total->Visible) { // total ?>
	<div id="r_total" class="form-group row">
		<label id="elh_yayasan_total" for="x_total" class="<?php echo $yayasan_add->LeftColumnClass ?>"><?php echo $yayasan_add->total->caption() ?><?php echo $yayasan_add->total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $yayasan_add->RightColumnClass ?>"><div <?php echo $yayasan_add->total->cellAttributes() ?>>
<span id="el_yayasan_total">
<input type="text" data-table="yayasan" data-field="x_total" name="x_total" id="x_total" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($yayasan_add->total->getPlaceHolder()) ?>" value="<?php echo $yayasan_add->total->EditValue ?>"<?php echo $yayasan_add->total->editAttributes() ?>>
</span>
<?php echo $yayasan_add->total->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<?php if (strval($yayasan_add->m_id->getSessionValue()) != "") { ?>
	<input type="hidden" name="x_m_id" id="x_m_id" value="<?php echo HtmlEncode(strval($yayasan_add->m_id->getSessionValue())) ?>">
	<?php } ?>
<?php if (!$yayasan_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $yayasan_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $yayasan_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$yayasan_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$(document).ready(function(){$("#x_gaji_pokok").bind("change",function(){$("#x_potongan").val()?$("#x_total").value($("#x_gaji_pokok").val()-$("#x_potongan").val()):$("#x_total").value($("#x_gaji_pokok").val())})});
});
</script>
<?php include_once "footer.php"; ?>
<?php
$yayasan_add->terminate();
?>