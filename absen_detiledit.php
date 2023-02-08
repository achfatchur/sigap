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
$absen_detil_edit = new absen_detil_edit();

// Run the page
$absen_detil_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$absen_detil_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fabsen_detiledit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fabsen_detiledit = currentForm = new ew.Form("fabsen_detiledit", "edit");

	// Validate form
	fabsen_detiledit.validate = function() {
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
			<?php if ($absen_detil_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_edit->id->caption(), $absen_detil_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($absen_detil_edit->pid->Required) { ?>
				elm = this.getElements("x" + infix + "_pid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_edit->pid->caption(), $absen_detil_edit->pid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_edit->pid->errorMessage()) ?>");
			<?php if ($absen_detil_edit->pegawai->Required) { ?>
				elm = this.getElements("x" + infix + "_pegawai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_edit->pegawai->caption(), $absen_detil_edit->pegawai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($absen_detil_edit->jenjang->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_edit->jenjang->caption(), $absen_detil_edit->jenjang->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jenjang");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_edit->jenjang->errorMessage()) ?>");
			<?php if ($absen_detil_edit->masuk->Required) { ?>
				elm = this.getElements("x" + infix + "_masuk");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_edit->masuk->caption(), $absen_detil_edit->masuk->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_masuk");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_edit->masuk->errorMessage()) ?>");
			<?php if ($absen_detil_edit->absen->Required) { ?>
				elm = this.getElements("x" + infix + "_absen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_edit->absen->caption(), $absen_detil_edit->absen->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_absen");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_edit->absen->errorMessage()) ?>");
			<?php if ($absen_detil_edit->ijin->Required) { ?>
				elm = this.getElements("x" + infix + "_ijin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_edit->ijin->caption(), $absen_detil_edit->ijin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ijin");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_edit->ijin->errorMessage()) ?>");
			<?php if ($absen_detil_edit->terlambat->Required) { ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_edit->terlambat->caption(), $absen_detil_edit->terlambat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_edit->terlambat->errorMessage()) ?>");
			<?php if ($absen_detil_edit->sakit->Required) { ?>
				elm = this.getElements("x" + infix + "_sakit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_edit->sakit->caption(), $absen_detil_edit->sakit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_edit->sakit->errorMessage()) ?>");
			<?php if ($absen_detil_edit->pulang_cepat->Required) { ?>
				elm = this.getElements("x" + infix + "_pulang_cepat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_edit->pulang_cepat->caption(), $absen_detil_edit->pulang_cepat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pulang_cepat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_edit->pulang_cepat->errorMessage()) ?>");
			<?php if ($absen_detil_edit->piket->Required) { ?>
				elm = this.getElements("x" + infix + "_piket");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_edit->piket->caption(), $absen_detil_edit->piket->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_piket");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_edit->piket->errorMessage()) ?>");
			<?php if ($absen_detil_edit->inval->Required) { ?>
				elm = this.getElements("x" + infix + "_inval");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_edit->inval->caption(), $absen_detil_edit->inval->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_inval");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_edit->inval->errorMessage()) ?>");
			<?php if ($absen_detil_edit->lembur->Required) { ?>
				elm = this.getElements("x" + infix + "_lembur");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_edit->lembur->caption(), $absen_detil_edit->lembur->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_lembur");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_edit->lembur->errorMessage()) ?>");
			<?php if ($absen_detil_edit->penyesuaian->Required) { ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $absen_detil_edit->penyesuaian->caption(), $absen_detil_edit->penyesuaian->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_penyesuaian");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($absen_detil_edit->penyesuaian->errorMessage()) ?>");

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
	fabsen_detiledit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fabsen_detiledit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fabsen_detiledit.lists["x_pegawai"] = <?php echo $absen_detil_edit->pegawai->Lookup->toClientList($absen_detil_edit) ?>;
	fabsen_detiledit.lists["x_pegawai"].options = <?php echo JsonEncode($absen_detil_edit->pegawai->lookupOptions()) ?>;
	fabsen_detiledit.autoSuggests["x_pegawai"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fabsen_detiledit.lists["x_jenjang"] = <?php echo $absen_detil_edit->jenjang->Lookup->toClientList($absen_detil_edit) ?>;
	fabsen_detiledit.lists["x_jenjang"].options = <?php echo JsonEncode($absen_detil_edit->jenjang->lookupOptions()) ?>;
	fabsen_detiledit.autoSuggests["x_jenjang"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fabsen_detiledit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $absen_detil_edit->showPageHeader(); ?>
<?php
$absen_detil_edit->showMessage();
?>
<form name="fabsen_detiledit" id="fabsen_detiledit" class="<?php echo $absen_detil_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="absen_detil">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$absen_detil_edit->IsModal ?>">
<?php if ($absen_detil->getCurrentMasterTable() == "absen") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="absen">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($absen_detil_edit->pid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($absen_detil_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_absen_detil_id" class="<?php echo $absen_detil_edit->LeftColumnClass ?>"><?php echo $absen_detil_edit->id->caption() ?><?php echo $absen_detil_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_edit->RightColumnClass ?>"><div <?php echo $absen_detil_edit->id->cellAttributes() ?>>
<span id="el_absen_detil_id">
<span<?php echo $absen_detil_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($absen_detil_edit->id->CurrentValue) ?>">
<?php echo $absen_detil_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_edit->pid->Visible) { // pid ?>
	<div id="r_pid" class="form-group row">
		<label id="elh_absen_detil_pid" for="x_pid" class="<?php echo $absen_detil_edit->LeftColumnClass ?>"><?php echo $absen_detil_edit->pid->caption() ?><?php echo $absen_detil_edit->pid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_edit->RightColumnClass ?>"><div <?php echo $absen_detil_edit->pid->cellAttributes() ?>>
<?php if ($absen_detil_edit->pid->getSessionValue() != "") { ?>
<span id="el_absen_detil_pid">
<span<?php echo $absen_detil_edit->pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($absen_detil_edit->pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_pid" name="x_pid" value="<?php echo HtmlEncode($absen_detil_edit->pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_absen_detil_pid">
<input type="text" data-table="absen_detil" data-field="x_pid" name="x_pid" id="x_pid" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_detil_edit->pid->getPlaceHolder()) ?>" value="<?php echo $absen_detil_edit->pid->EditValue ?>"<?php echo $absen_detil_edit->pid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $absen_detil_edit->pid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_edit->pegawai->Visible) { // pegawai ?>
	<div id="r_pegawai" class="form-group row">
		<label id="elh_absen_detil_pegawai" class="<?php echo $absen_detil_edit->LeftColumnClass ?>"><?php echo $absen_detil_edit->pegawai->caption() ?><?php echo $absen_detil_edit->pegawai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_edit->RightColumnClass ?>"><div <?php echo $absen_detil_edit->pegawai->cellAttributes() ?>>
<span id="el_absen_detil_pegawai">
<?php
$onchange = $absen_detil_edit->pegawai->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$absen_detil_edit->pegawai->EditAttrs["onchange"] = "";
?>
<span id="as_x_pegawai">
	<input type="text" class="form-control" name="sv_x_pegawai" id="sv_x_pegawai" value="<?php echo RemoveHtml($absen_detil_edit->pegawai->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($absen_detil_edit->pegawai->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($absen_detil_edit->pegawai->getPlaceHolder()) ?>"<?php echo $absen_detil_edit->pegawai->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_pegawai" data-value-separator="<?php echo $absen_detil_edit->pegawai->displayValueSeparatorAttribute() ?>" name="x_pegawai" id="x_pegawai" value="<?php echo HtmlEncode($absen_detil_edit->pegawai->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fabsen_detiledit"], function() {
	fabsen_detiledit.createAutoSuggest({"id":"x_pegawai","forceSelect":false});
});
</script>
<?php echo $absen_detil_edit->pegawai->Lookup->getParamTag($absen_detil_edit, "p_x_pegawai") ?>
</span>
<?php echo $absen_detil_edit->pegawai->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_edit->jenjang->Visible) { // jenjang ?>
	<div id="r_jenjang" class="form-group row">
		<label id="elh_absen_detil_jenjang" class="<?php echo $absen_detil_edit->LeftColumnClass ?>"><?php echo $absen_detil_edit->jenjang->caption() ?><?php echo $absen_detil_edit->jenjang->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_edit->RightColumnClass ?>"><div <?php echo $absen_detil_edit->jenjang->cellAttributes() ?>>
<span id="el_absen_detil_jenjang">
<?php
$onchange = $absen_detil_edit->jenjang->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$absen_detil_edit->jenjang->EditAttrs["onchange"] = "";
?>
<span id="as_x_jenjang">
	<input type="text" class="form-control" name="sv_x_jenjang" id="sv_x_jenjang" value="<?php echo RemoveHtml($absen_detil_edit->jenjang->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_detil_edit->jenjang->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($absen_detil_edit->jenjang->getPlaceHolder()) ?>"<?php echo $absen_detil_edit->jenjang->editAttributes() ?>>
</span>
<input type="hidden" data-table="absen_detil" data-field="x_jenjang" data-value-separator="<?php echo $absen_detil_edit->jenjang->displayValueSeparatorAttribute() ?>" name="x_jenjang" id="x_jenjang" value="<?php echo HtmlEncode($absen_detil_edit->jenjang->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fabsen_detiledit"], function() {
	fabsen_detiledit.createAutoSuggest({"id":"x_jenjang","forceSelect":false});
});
</script>
<?php echo $absen_detil_edit->jenjang->Lookup->getParamTag($absen_detil_edit, "p_x_jenjang") ?>
</span>
<?php echo $absen_detil_edit->jenjang->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_edit->masuk->Visible) { // masuk ?>
	<div id="r_masuk" class="form-group row">
		<label id="elh_absen_detil_masuk" for="x_masuk" class="<?php echo $absen_detil_edit->LeftColumnClass ?>"><?php echo $absen_detil_edit->masuk->caption() ?><?php echo $absen_detil_edit->masuk->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_edit->RightColumnClass ?>"><div <?php echo $absen_detil_edit->masuk->cellAttributes() ?>>
<span id="el_absen_detil_masuk">
<input type="text" data-table="absen_detil" data-field="x_masuk" name="x_masuk" id="x_masuk" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_edit->masuk->getPlaceHolder()) ?>" value="<?php echo $absen_detil_edit->masuk->EditValue ?>"<?php echo $absen_detil_edit->masuk->editAttributes() ?>>
</span>
<?php echo $absen_detil_edit->masuk->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_edit->absen->Visible) { // absen ?>
	<div id="r_absen" class="form-group row">
		<label id="elh_absen_detil_absen" for="x_absen" class="<?php echo $absen_detil_edit->LeftColumnClass ?>"><?php echo $absen_detil_edit->absen->caption() ?><?php echo $absen_detil_edit->absen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_edit->RightColumnClass ?>"><div <?php echo $absen_detil_edit->absen->cellAttributes() ?>>
<span id="el_absen_detil_absen">
<input type="text" data-table="absen_detil" data-field="x_absen" name="x_absen" id="x_absen" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_edit->absen->getPlaceHolder()) ?>" value="<?php echo $absen_detil_edit->absen->EditValue ?>"<?php echo $absen_detil_edit->absen->editAttributes() ?>>
</span>
<?php echo $absen_detil_edit->absen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_edit->ijin->Visible) { // ijin ?>
	<div id="r_ijin" class="form-group row">
		<label id="elh_absen_detil_ijin" for="x_ijin" class="<?php echo $absen_detil_edit->LeftColumnClass ?>"><?php echo $absen_detil_edit->ijin->caption() ?><?php echo $absen_detil_edit->ijin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_edit->RightColumnClass ?>"><div <?php echo $absen_detil_edit->ijin->cellAttributes() ?>>
<span id="el_absen_detil_ijin">
<input type="text" data-table="absen_detil" data-field="x_ijin" name="x_ijin" id="x_ijin" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_edit->ijin->getPlaceHolder()) ?>" value="<?php echo $absen_detil_edit->ijin->EditValue ?>"<?php echo $absen_detil_edit->ijin->editAttributes() ?>>
</span>
<?php echo $absen_detil_edit->ijin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_edit->terlambat->Visible) { // terlambat ?>
	<div id="r_terlambat" class="form-group row">
		<label id="elh_absen_detil_terlambat" for="x_terlambat" class="<?php echo $absen_detil_edit->LeftColumnClass ?>"><?php echo $absen_detil_edit->terlambat->caption() ?><?php echo $absen_detil_edit->terlambat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_edit->RightColumnClass ?>"><div <?php echo $absen_detil_edit->terlambat->cellAttributes() ?>>
<span id="el_absen_detil_terlambat">
<input type="text" data-table="absen_detil" data-field="x_terlambat" name="x_terlambat" id="x_terlambat" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($absen_detil_edit->terlambat->getPlaceHolder()) ?>" value="<?php echo $absen_detil_edit->terlambat->EditValue ?>"<?php echo $absen_detil_edit->terlambat->editAttributes() ?>>
</span>
<?php echo $absen_detil_edit->terlambat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_edit->sakit->Visible) { // sakit ?>
	<div id="r_sakit" class="form-group row">
		<label id="elh_absen_detil_sakit" for="x_sakit" class="<?php echo $absen_detil_edit->LeftColumnClass ?>"><?php echo $absen_detil_edit->sakit->caption() ?><?php echo $absen_detil_edit->sakit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_edit->RightColumnClass ?>"><div <?php echo $absen_detil_edit->sakit->cellAttributes() ?>>
<span id="el_absen_detil_sakit">
<input type="text" data-table="absen_detil" data-field="x_sakit" name="x_sakit" id="x_sakit" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_edit->sakit->getPlaceHolder()) ?>" value="<?php echo $absen_detil_edit->sakit->EditValue ?>"<?php echo $absen_detil_edit->sakit->editAttributes() ?>>
</span>
<?php echo $absen_detil_edit->sakit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_edit->pulang_cepat->Visible) { // pulang_cepat ?>
	<div id="r_pulang_cepat" class="form-group row">
		<label id="elh_absen_detil_pulang_cepat" for="x_pulang_cepat" class="<?php echo $absen_detil_edit->LeftColumnClass ?>"><?php echo $absen_detil_edit->pulang_cepat->caption() ?><?php echo $absen_detil_edit->pulang_cepat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_edit->RightColumnClass ?>"><div <?php echo $absen_detil_edit->pulang_cepat->cellAttributes() ?>>
<span id="el_absen_detil_pulang_cepat">
<input type="text" data-table="absen_detil" data-field="x_pulang_cepat" name="x_pulang_cepat" id="x_pulang_cepat" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_edit->pulang_cepat->getPlaceHolder()) ?>" value="<?php echo $absen_detil_edit->pulang_cepat->EditValue ?>"<?php echo $absen_detil_edit->pulang_cepat->editAttributes() ?>>
</span>
<?php echo $absen_detil_edit->pulang_cepat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_edit->piket->Visible) { // piket ?>
	<div id="r_piket" class="form-group row">
		<label id="elh_absen_detil_piket" for="x_piket" class="<?php echo $absen_detil_edit->LeftColumnClass ?>"><?php echo $absen_detil_edit->piket->caption() ?><?php echo $absen_detil_edit->piket->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_edit->RightColumnClass ?>"><div <?php echo $absen_detil_edit->piket->cellAttributes() ?>>
<span id="el_absen_detil_piket">
<input type="text" data-table="absen_detil" data-field="x_piket" name="x_piket" id="x_piket" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_edit->piket->getPlaceHolder()) ?>" value="<?php echo $absen_detil_edit->piket->EditValue ?>"<?php echo $absen_detil_edit->piket->editAttributes() ?>>
</span>
<?php echo $absen_detil_edit->piket->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_edit->inval->Visible) { // inval ?>
	<div id="r_inval" class="form-group row">
		<label id="elh_absen_detil_inval" for="x_inval" class="<?php echo $absen_detil_edit->LeftColumnClass ?>"><?php echo $absen_detil_edit->inval->caption() ?><?php echo $absen_detil_edit->inval->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_edit->RightColumnClass ?>"><div <?php echo $absen_detil_edit->inval->cellAttributes() ?>>
<span id="el_absen_detil_inval">
<input type="text" data-table="absen_detil" data-field="x_inval" name="x_inval" id="x_inval" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_edit->inval->getPlaceHolder()) ?>" value="<?php echo $absen_detil_edit->inval->EditValue ?>"<?php echo $absen_detil_edit->inval->editAttributes() ?>>
</span>
<?php echo $absen_detil_edit->inval->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_edit->lembur->Visible) { // lembur ?>
	<div id="r_lembur" class="form-group row">
		<label id="elh_absen_detil_lembur" for="x_lembur" class="<?php echo $absen_detil_edit->LeftColumnClass ?>"><?php echo $absen_detil_edit->lembur->caption() ?><?php echo $absen_detil_edit->lembur->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_edit->RightColumnClass ?>"><div <?php echo $absen_detil_edit->lembur->cellAttributes() ?>>
<span id="el_absen_detil_lembur">
<input type="text" data-table="absen_detil" data-field="x_lembur" name="x_lembur" id="x_lembur" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($absen_detil_edit->lembur->getPlaceHolder()) ?>" value="<?php echo $absen_detil_edit->lembur->EditValue ?>"<?php echo $absen_detil_edit->lembur->editAttributes() ?>>
</span>
<?php echo $absen_detil_edit->lembur->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($absen_detil_edit->penyesuaian->Visible) { // penyesuaian ?>
	<div id="r_penyesuaian" class="form-group row">
		<label id="elh_absen_detil_penyesuaian" for="x_penyesuaian" class="<?php echo $absen_detil_edit->LeftColumnClass ?>"><?php echo $absen_detil_edit->penyesuaian->caption() ?><?php echo $absen_detil_edit->penyesuaian->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $absen_detil_edit->RightColumnClass ?>"><div <?php echo $absen_detil_edit->penyesuaian->cellAttributes() ?>>
<span id="el_absen_detil_penyesuaian">
<input type="text" data-table="absen_detil" data-field="x_penyesuaian" name="x_penyesuaian" id="x_penyesuaian" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($absen_detil_edit->penyesuaian->getPlaceHolder()) ?>" value="<?php echo $absen_detil_edit->penyesuaian->EditValue ?>"<?php echo $absen_detil_edit->penyesuaian->editAttributes() ?>>
</span>
<?php echo $absen_detil_edit->penyesuaian->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$absen_detil_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $absen_detil_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $absen_detil_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$absen_detil_edit->showPageFooter();
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
$absen_detil_edit->terminate();
?>