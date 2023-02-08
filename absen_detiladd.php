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
$absen_detil_add = new absen_detil_add();

// Run the page
$absen_detil_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$absen_detil_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fabsen_detiladd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fabsen_detiladd = currentForm = new ew.Form("fabsen_detiladd", "add");

	// Validate form
	fabsen_detiladd.validate = function() {
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
			<?php if ($absen_detil_add->pid->Required) { ?>
				elm = this.getElements("x" + infix + "_pid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_add->pid->caption(), $absen_detil_add->pid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_add->pid->errorMessage()) ?>");
			<?php if ($absen_detil_add->pegawai->Required) { ?>
				elm = this.getElements("x" + infix + "_pegawai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_add->pegawai->caption(), $absen_detil_add->pegawai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($absen_detil_add->jenjang->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_add->jenjang->caption(), $absen_detil_add->jenjang->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jenjang");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_add->jenjang->errorMessage()) ?>");
			<?php if ($absen_detil_add->masuk->Required) { ?>
				elm = this.getElements("x" + infix + "_masuk");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_add->masuk->caption(), $absen_detil_add->masuk->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_masuk");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_add->masuk->errorMessage()) ?>");
			<?php if ($absen_detil_add->absen->Required) { ?>
				elm = this.getElements("x" + infix + "_absen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_add->absen->caption(), $absen_detil_add->absen->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_absen");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_add->absen->errorMessage()) ?>");
			<?php if ($absen_detil_add->ijin->Required) { ?>
				elm = this.getElements("x" + infix + "_ijin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_add->ijin->caption(), $absen_detil_add->ijin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ijin");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_add->ijin->errorMessage()) ?>");
			<?php if ($absen_detil_add->terlambat->Required) { ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_add->terlambat->caption(), $absen_detil_add->terlambat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_add->terlambat->errorMessage()) ?>");
			<?php if ($absen_detil_add->sakit->Required) { ?>
				elm = this.getElements("x" + infix + "_sakit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_add->sakit->caption(), $absen_detil_add->sakit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_add->sakit->errorMessage()) ?>");
			<?php if ($absen_detil_add->pulang_cepat->Required) { ?>
				elm = this.getElements("x" + infix + "_pulang_cepat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_add->pulang_cepat->caption(), $absen_detil_add->pulang_cepat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pulang_cepat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_add->pulang_cepat->errorMessage()) ?>");
			<?php if ($absen_detil_add->piket->Required) { ?>
				elm = this.getElements("x" + infix + "_piket");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_add->piket->caption(), $absen_detil_add->piket->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_piket");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_add->piket->errorMessage()) ?>");
			<?php if ($absen_detil_add->inval->Required) { ?>
				elm = this.getElements("x" + infix + "_inval");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_add->inval->caption(), $absen_detil_add->inval->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_inval");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_add->inval->errorMessage()) ?>");
			<?php if ($absen_detil_add->lembur->Required) { ?>
				elm = this.getElements("x" + infix + "_lembur");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_add->lembur->caption(), $absen_detil_add->lembur->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_lembur");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_add->lembur->errorMessage()) ?>");
			<?php if ($absen_detil_add->penyesuaian->Required) { ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_add->penyesuaian->caption(), $absen_detil_add->penyesuaian->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_add->penyesuaian->errorMessage()) ?>");

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
	fabsen_detiladd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fabsen_detiladd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fabsen_detiladd.lists["x_pegawai"] = <?php echo $absen_detil_add->pegawai->Lookup->toClientList($absen_detil_add) ?>;
	fabsen_detiladd.lists["x_pegawai"].options = <?php echo JsonEncode($absen_detil_add->pegawai->lookupOptions()) ?>;
	fabsen_detiladd.autoSuggests["x_pegawai"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fabsen_detiladd.lists["x_jenjang"] = <?php echo $absen_detil_add->jenjang->Lookup->toClientList($absen_detil_add) ?>;
	fabsen_detiladd.lists["x_jenjang"].options = <?php echo JsonEncode($absen_detil_add->jenjang->lookupOptions()) ?>;
	fabsen_detiladd.autoSuggests["x_jenjang"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fabsen_detiladd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $absen_detil_add->showPageHeader(); ?>
<?php
$absen_detil_add->showMessage();
?>
<form name="fabsen_detiladd" id="fabsen_detiladd" class="<?php echo $absen_detil_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="absen_detil">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$absen_detil_add->IsModal ?>">
<?php if ($absen_detil->getCurrentMasterTable() == "absen") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="absen">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($absen_detil_add->pid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($absen_detil_add->pid->Visible) { // pid ?>
	<div id="r_pid" class="form-group row">
		<label id="elh_absen_detil_pid" for="x_pid" class="<?php echo $absen_detil_add->LeftColumnClass ?>"><?php echo $absen_detil_add->pid->caption() ?><?php echo $absen_detil_add->pid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_add->RightColumnClass ?>"><div <?php echo $absen_detil_add->pid->cellAttributes() ?>>
<?php if ($absen_detil_add->pid->getSessionValue() != "") { ?>
<span id="el_absen_detil_pid">
<span<?php echo $absen_detil_add->pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_add->pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_pid" name="x_pid" value="<?php echo HtmlEncode($absen_detil_add->pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_absen_detil_pid">
<input type="text" data-table="absen_detil" data-field="x_pid" name="x_pid" id="x_pid" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_detil_add->pid->getPlaceHolder()) ?>" value="<?php echo $absen_detil_add->pid->EditValue ?>"<?php echo $absen_detil_add->pid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $absen_detil_add->pid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_add->pegawai->Visible) { // pegawai ?>
	<div id="r_pegawai" class="form-group row">
		<label id="elh_absen_detil_pegawai" class="<?php echo $absen_detil_add->LeftColumnClass ?>"><?php echo $absen_detil_add->pegawai->caption() ?><?php echo $absen_detil_add->pegawai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_add->RightColumnClass ?>"><div <?php echo $absen_detil_add->pegawai->cellAttributes() ?>>
<span id="el_absen_detil_pegawai">
<?php
$onchange = $absen_detil_add->pegawai->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$absen_detil_add->pegawai->EditAttrs["onchange"] = "";
?>
<span id="as_x_pegawai">
	<input type="text" class="form-control" name="sv_x_pegawai" id="sv_x_pegawai" value="<?php echo RemoveHtml($absen_detil_add->pegawai->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($absen_detil_add->pegawai->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($absen_detil_add->pegawai->getPlaceHolder()) ?>"<?php echo $absen_detil_add->pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_pegawai" data-value-separator="<?php echo $absen_detil_add->pegawai->displayValueSeparatorAttribute() ?>" name="x_pegawai" id="x_pegawai" value="<?php echo HtmlEncode($absen_detil_add->pegawai->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fabsen_detiladd"], function() {
	fabsen_detiladd.createAutoSuggest({"id":"x_pegawai","forceSelect":false});
});
</script>
<?php echo $absen_detil_add->pegawai->Lookup->getParamTag($absen_detil_add, "p_x_pegawai") ?>
</span>
<?php echo $absen_detil_add->pegawai->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_add->jenjang->Visible) { // jenjang ?>
	<div id="r_jenjang" class="form-group row">
		<label id="elh_absen_detil_jenjang" class="<?php echo $absen_detil_add->LeftColumnClass ?>"><?php echo $absen_detil_add->jenjang->caption() ?><?php echo $absen_detil_add->jenjang->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_add->RightColumnClass ?>"><div <?php echo $absen_detil_add->jenjang->cellAttributes() ?>>
<span id="el_absen_detil_jenjang">
<?php
$onchange = $absen_detil_add->jenjang->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$absen_detil_add->jenjang->EditAttrs["onchange"] = "";
?>
<span id="as_x_jenjang">
	<input type="text" class="form-control" name="sv_x_jenjang" id="sv_x_jenjang" value="<?php echo RemoveHtml($absen_detil_add->jenjang->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_detil_add->jenjang->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($absen_detil_add->jenjang->getPlaceHolder()) ?>"<?php echo $absen_detil_add->jenjang->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_jenjang" data-value-separator="<?php echo $absen_detil_add->jenjang->displayValueSeparatorAttribute() ?>" name="x_jenjang" id="x_jenjang" value="<?php echo HtmlEncode($absen_detil_add->jenjang->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fabsen_detiladd"], function() {
	fabsen_detiladd.createAutoSuggest({"id":"x_jenjang","forceSelect":false});
});
</script>
<?php echo $absen_detil_add->jenjang->Lookup->getParamTag($absen_detil_add, "p_x_jenjang") ?>
</span>
<?php echo $absen_detil_add->jenjang->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_add->masuk->Visible) { // masuk ?>
	<div id="r_masuk" class="form-group row">
		<label id="elh_absen_detil_masuk" for="x_masuk" class="<?php echo $absen_detil_add->LeftColumnClass ?>"><?php echo $absen_detil_add->masuk->caption() ?><?php echo $absen_detil_add->masuk->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_add->RightColumnClass ?>"><div <?php echo $absen_detil_add->masuk->cellAttributes() ?>>
<span id="el_absen_detil_masuk">
<input type="text" data-table="absen_detil" data-field="x_masuk" name="x_masuk" id="x_masuk" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_add->masuk->getPlaceHolder()) ?>" value="<?php echo $absen_detil_add->masuk->EditValue ?>"<?php echo $absen_detil_add->masuk->editAttributes() ?>>
</span>
<?php echo $absen_detil_add->masuk->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_add->absen->Visible) { // absen ?>
	<div id="r_absen" class="form-group row">
		<label id="elh_absen_detil_absen" for="x_absen" class="<?php echo $absen_detil_add->LeftColumnClass ?>"><?php echo $absen_detil_add->absen->caption() ?><?php echo $absen_detil_add->absen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_add->RightColumnClass ?>"><div <?php echo $absen_detil_add->absen->cellAttributes() ?>>
<span id="el_absen_detil_absen">
<input type="text" data-table="absen_detil" data-field="x_absen" name="x_absen" id="x_absen" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_add->absen->getPlaceHolder()) ?>" value="<?php echo $absen_detil_add->absen->EditValue ?>"<?php echo $absen_detil_add->absen->editAttributes() ?>>
</span>
<?php echo $absen_detil_add->absen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_add->ijin->Visible) { // ijin ?>
	<div id="r_ijin" class="form-group row">
		<label id="elh_absen_detil_ijin" for="x_ijin" class="<?php echo $absen_detil_add->LeftColumnClass ?>"><?php echo $absen_detil_add->ijin->caption() ?><?php echo $absen_detil_add->ijin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_add->RightColumnClass ?>"><div <?php echo $absen_detil_add->ijin->cellAttributes() ?>>
<span id="el_absen_detil_ijin">
<input type="text" data-table="absen_detil" data-field="x_ijin" name="x_ijin" id="x_ijin" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_add->ijin->getPlaceHolder()) ?>" value="<?php echo $absen_detil_add->ijin->EditValue ?>"<?php echo $absen_detil_add->ijin->editAttributes() ?>>
</span>
<?php echo $absen_detil_add->ijin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_add->terlambat->Visible) { // terlambat ?>
	<div id="r_terlambat" class="form-group row">
		<label id="elh_absen_detil_terlambat" for="x_terlambat" class="<?php echo $absen_detil_add->LeftColumnClass ?>"><?php echo $absen_detil_add->terlambat->caption() ?><?php echo $absen_detil_add->terlambat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_add->RightColumnClass ?>"><div <?php echo $absen_detil_add->terlambat->cellAttributes() ?>>
<span id="el_absen_detil_terlambat">
<input type="text" data-table="absen_detil" data-field="x_terlambat" name="x_terlambat" id="x_terlambat" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_add->terlambat->getPlaceHolder()) ?>" value="<?php echo $absen_detil_add->terlambat->EditValue ?>"<?php echo $absen_detil_add->terlambat->editAttributes() ?>>
</span>
<?php echo $absen_detil_add->terlambat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_add->sakit->Visible) { // sakit ?>
	<div id="r_sakit" class="form-group row">
		<label id="elh_absen_detil_sakit" for="x_sakit" class="<?php echo $absen_detil_add->LeftColumnClass ?>"><?php echo $absen_detil_add->sakit->caption() ?><?php echo $absen_detil_add->sakit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_add->RightColumnClass ?>"><div <?php echo $absen_detil_add->sakit->cellAttributes() ?>>
<span id="el_absen_detil_sakit">
<input type="text" data-table="absen_detil" data-field="x_sakit" name="x_sakit" id="x_sakit" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_add->sakit->getPlaceHolder()) ?>" value="<?php echo $absen_detil_add->sakit->EditValue ?>"<?php echo $absen_detil_add->sakit->editAttributes() ?>>
</span>
<?php echo $absen_detil_add->sakit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_add->pulang_cepat->Visible) { // pulang_cepat ?>
	<div id="r_pulang_cepat" class="form-group row">
		<label id="elh_absen_detil_pulang_cepat" for="x_pulang_cepat" class="<?php echo $absen_detil_add->LeftColumnClass ?>"><?php echo $absen_detil_add->pulang_cepat->caption() ?><?php echo $absen_detil_add->pulang_cepat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_add->RightColumnClass ?>"><div <?php echo $absen_detil_add->pulang_cepat->cellAttributes() ?>>
<span id="el_absen_detil_pulang_cepat">
<input type="text" data-table="absen_detil" data-field="x_pulang_cepat" name="x_pulang_cepat" id="x_pulang_cepat" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_add->pulang_cepat->getPlaceHolder()) ?>" value="<?php echo $absen_detil_add->pulang_cepat->EditValue ?>"<?php echo $absen_detil_add->pulang_cepat->editAttributes() ?>>
</span>
<?php echo $absen_detil_add->pulang_cepat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_add->piket->Visible) { // piket ?>
	<div id="r_piket" class="form-group row">
		<label id="elh_absen_detil_piket" for="x_piket" class="<?php echo $absen_detil_add->LeftColumnClass ?>"><?php echo $absen_detil_add->piket->caption() ?><?php echo $absen_detil_add->piket->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_add->RightColumnClass ?>"><div <?php echo $absen_detil_add->piket->cellAttributes() ?>>
<span id="el_absen_detil_piket">
<input type="text" data-table="absen_detil" data-field="x_piket" name="x_piket" id="x_piket" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_add->piket->getPlaceHolder()) ?>" value="<?php echo $absen_detil_add->piket->EditValue ?>"<?php echo $absen_detil_add->piket->editAttributes() ?>>
</span>
<?php echo $absen_detil_add->piket->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_add->inval->Visible) { // inval ?>
	<div id="r_inval" class="form-group row">
		<label id="elh_absen_detil_inval" for="x_inval" class="<?php echo $absen_detil_add->LeftColumnClass ?>"><?php echo $absen_detil_add->inval->caption() ?><?php echo $absen_detil_add->inval->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_add->RightColumnClass ?>"><div <?php echo $absen_detil_add->inval->cellAttributes() ?>>
<span id="el_absen_detil_inval">
<input type="text" data-table="absen_detil" data-field="x_inval" name="x_inval" id="x_inval" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_add->inval->getPlaceHolder()) ?>" value="<?php echo $absen_detil_add->inval->EditValue ?>"<?php echo $absen_detil_add->inval->editAttributes() ?>>
</span>
<?php echo $absen_detil_add->inval->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_add->lembur->Visible) { // lembur ?>
	<div id="r_lembur" class="form-group row">
		<label id="elh_absen_detil_lembur" for="x_lembur" class="<?php echo $absen_detil_add->LeftColumnClass ?>"><?php echo $absen_detil_add->lembur->caption() ?><?php echo $absen_detil_add->lembur->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_add->RightColumnClass ?>"><div <?php echo $absen_detil_add->lembur->cellAttributes() ?>>
<span id="el_absen_detil_lembur">
<input type="text" data-table="absen_detil" data-field="x_lembur" name="x_lembur" id="x_lembur" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_add->lembur->getPlaceHolder()) ?>" value="<?php echo $absen_detil_add->lembur->EditValue ?>"<?php echo $absen_detil_add->lembur->editAttributes() ?>>
</span>
<?php echo $absen_detil_add->lembur->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_add->penyesuaian->Visible) { // penyesuaian ?>
	<div id="r_penyesuaian" class="form-group row">
		<label id="elh_absen_detil_penyesuaian" for="x_penyesuaian" class="<?php echo $absen_detil_add->LeftColumnClass ?>"><?php echo $absen_detil_add->penyesuaian->caption() ?><?php echo $absen_detil_add->penyesuaian->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_add->RightColumnClass ?>"><div <?php echo $absen_detil_add->penyesuaian->cellAttributes() ?>>
<span id="el_absen_detil_penyesuaian">
<input type="text" data-table="absen_detil" data-field="x_penyesuaian" name="x_penyesuaian" id="x_penyesuaian" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_detil_add->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $absen_detil_add->penyesuaian->EditValue ?>"<?php echo $absen_detil_add->penyesuaian->editAttributes() ?>>
</span>
<?php echo $absen_detil_add->penyesuaian->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$absen_detil_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $absen_detil_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $absen_detil_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$absen_detil_add->showPageFooter();
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
$absen_detil_add->terminate();
?>