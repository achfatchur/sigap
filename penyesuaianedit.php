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
$penyesuaian_edit = new penyesuaian_edit();

// Run the page
$penyesuaian_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$penyesuaian_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpenyesuaianedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpenyesuaianedit = currentForm = new ew.Form("fpenyesuaianedit", "edit");

	// Validate form
	fpenyesuaianedit.validate = function() {
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
			<?php if ($penyesuaian_edit->nip->Required) { ?>
				elm = this.getElements("x" + infix + "_nip");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_edit->nip->caption(), $penyesuaian_edit->nip->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($penyesuaian_edit->absen->Required) { ?>
				elm = this.getElements("x" + infix + "_absen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_edit->absen->caption(), $penyesuaian_edit->absen->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_absen");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_edit->absen->errorMessage()) ?>");
			<?php if ($penyesuaian_edit->absen_jam->Required) { ?>
				elm = this.getElements("x" + infix + "_absen_jam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_edit->absen_jam->caption(), $penyesuaian_edit->absen_jam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_absen_jam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_edit->absen_jam->errorMessage()) ?>");
			<?php if ($penyesuaian_edit->izin->Required) { ?>
				elm = this.getElements("x" + infix + "_izin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_edit->izin->caption(), $penyesuaian_edit->izin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_izin");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_edit->izin->errorMessage()) ?>");
			<?php if ($penyesuaian_edit->izin_jam->Required) { ?>
				elm = this.getElements("x" + infix + "_izin_jam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_edit->izin_jam->caption(), $penyesuaian_edit->izin_jam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_izin_jam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_edit->izin_jam->errorMessage()) ?>");
			<?php if ($penyesuaian_edit->sakit->Required) { ?>
				elm = this.getElements("x" + infix + "_sakit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_edit->sakit->caption(), $penyesuaian_edit->sakit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_edit->sakit->errorMessage()) ?>");
			<?php if ($penyesuaian_edit->sakit_jam->Required) { ?>
				elm = this.getElements("x" + infix + "_sakit_jam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_edit->sakit_jam->caption(), $penyesuaian_edit->sakit_jam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakit_jam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_edit->sakit_jam->errorMessage()) ?>");
			<?php if ($penyesuaian_edit->terlambat->Required) { ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_edit->terlambat->caption(), $penyesuaian_edit->terlambat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_edit->terlambat->errorMessage()) ?>");
			<?php if ($penyesuaian_edit->pulang_cepat->Required) { ?>
				elm = this.getElements("x" + infix + "_pulang_cepat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_edit->pulang_cepat->caption(), $penyesuaian_edit->pulang_cepat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pulang_cepat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_edit->pulang_cepat->errorMessage()) ?>");
			<?php if ($penyesuaian_edit->piket->Required) { ?>
				elm = this.getElements("x" + infix + "_piket");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_edit->piket->caption(), $penyesuaian_edit->piket->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_piket");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_edit->piket->errorMessage()) ?>");
			<?php if ($penyesuaian_edit->inval->Required) { ?>
				elm = this.getElements("x" + infix + "_inval");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_edit->inval->caption(), $penyesuaian_edit->inval->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_inval");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_edit->inval->errorMessage()) ?>");
			<?php if ($penyesuaian_edit->lembur->Required) { ?>
				elm = this.getElements("x" + infix + "_lembur");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_edit->lembur->caption(), $penyesuaian_edit->lembur->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_lembur");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_edit->lembur->errorMessage()) ?>");
			<?php if ($penyesuaian_edit->voucher->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_edit->voucher->caption(), $penyesuaian_edit->voucher->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_edit->voucher->errorMessage()) ?>");
			<?php if ($penyesuaian_edit->total->Required) { ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_edit->total->caption(), $penyesuaian_edit->total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_edit->total->errorMessage()) ?>");
			<?php if ($penyesuaian_edit->total2->Required) { ?>
				elm = this.getElements("x" + infix + "_total2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_edit->total2->caption(), $penyesuaian_edit->total2->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total2");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_edit->total2->errorMessage()) ?>");

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
	fpenyesuaianedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpenyesuaianedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpenyesuaianedit.lists["x_nip"] = <?php echo $penyesuaian_edit->nip->Lookup->toClientList($penyesuaian_edit) ?>;
	fpenyesuaianedit.lists["x_nip"].options = <?php echo JsonEncode($penyesuaian_edit->nip->lookupOptions()) ?>;
	loadjs.done("fpenyesuaianedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $penyesuaian_edit->showPageHeader(); ?>
<?php
$penyesuaian_edit->showMessage();
?>
<form name="fpenyesuaianedit" id="fpenyesuaianedit" class="<?php echo $penyesuaian_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="penyesuaian">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$penyesuaian_edit->IsModal ?>">
<?php if ($penyesuaian->getCurrentMasterTable() == "m_penyesuaian") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="m_penyesuaian">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($penyesuaian_edit->m_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($penyesuaian_edit->nip->Visible) { // nip ?>
	<div id="r_nip" class="form-group row">
		<label id="elh_penyesuaian_nip" for="x_nip" class="<?php echo $penyesuaian_edit->LeftColumnClass ?>"><?php echo $penyesuaian_edit->nip->caption() ?><?php echo $penyesuaian_edit->nip->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_edit->RightColumnClass ?>"><div <?php echo $penyesuaian_edit->nip->cellAttributes() ?>>
<span id="el_penyesuaian_nip">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="penyesuaian" data-field="x_nip" data-value-separator="<?php echo $penyesuaian_edit->nip->displayValueSeparatorAttribute() ?>" id="x_nip" name="x_nip"<?php echo $penyesuaian_edit->nip->editAttributes() ?>>
			<?php echo $penyesuaian_edit->nip->selectOptionListHtml("x_nip") ?>
		</select>
</div>
<?php echo $penyesuaian_edit->nip->Lookup->getParamTag($penyesuaian_edit, "p_x_nip") ?>
</span>
<?php echo $penyesuaian_edit->nip->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_edit->absen->Visible) { // absen ?>
	<div id="r_absen" class="form-group row">
		<label id="elh_penyesuaian_absen" for="x_absen" class="<?php echo $penyesuaian_edit->LeftColumnClass ?>"><?php echo $penyesuaian_edit->absen->caption() ?><?php echo $penyesuaian_edit->absen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_edit->RightColumnClass ?>"><div <?php echo $penyesuaian_edit->absen->cellAttributes() ?>>
<span id="el_penyesuaian_absen">
<input type="text" data-table="penyesuaian" data-field="x_absen" name="x_absen" id="x_absen" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_edit->absen->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_edit->absen->EditValue ?>"<?php echo $penyesuaian_edit->absen->editAttributes() ?>>
</span>
<?php echo $penyesuaian_edit->absen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_edit->absen_jam->Visible) { // absen_jam ?>
	<div id="r_absen_jam" class="form-group row">
		<label id="elh_penyesuaian_absen_jam" for="x_absen_jam" class="<?php echo $penyesuaian_edit->LeftColumnClass ?>"><?php echo $penyesuaian_edit->absen_jam->caption() ?><?php echo $penyesuaian_edit->absen_jam->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_edit->RightColumnClass ?>"><div <?php echo $penyesuaian_edit->absen_jam->cellAttributes() ?>>
<span id="el_penyesuaian_absen_jam">
<input type="text" data-table="penyesuaian" data-field="x_absen_jam" name="x_absen_jam" id="x_absen_jam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_edit->absen_jam->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_edit->absen_jam->EditValue ?>"<?php echo $penyesuaian_edit->absen_jam->editAttributes() ?>>
</span>
<?php echo $penyesuaian_edit->absen_jam->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_edit->izin->Visible) { // izin ?>
	<div id="r_izin" class="form-group row">
		<label id="elh_penyesuaian_izin" for="x_izin" class="<?php echo $penyesuaian_edit->LeftColumnClass ?>"><?php echo $penyesuaian_edit->izin->caption() ?><?php echo $penyesuaian_edit->izin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_edit->RightColumnClass ?>"><div <?php echo $penyesuaian_edit->izin->cellAttributes() ?>>
<span id="el_penyesuaian_izin">
<input type="text" data-table="penyesuaian" data-field="x_izin" name="x_izin" id="x_izin" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_edit->izin->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_edit->izin->EditValue ?>"<?php echo $penyesuaian_edit->izin->editAttributes() ?>>
</span>
<?php echo $penyesuaian_edit->izin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_edit->izin_jam->Visible) { // izin_jam ?>
	<div id="r_izin_jam" class="form-group row">
		<label id="elh_penyesuaian_izin_jam" for="x_izin_jam" class="<?php echo $penyesuaian_edit->LeftColumnClass ?>"><?php echo $penyesuaian_edit->izin_jam->caption() ?><?php echo $penyesuaian_edit->izin_jam->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_edit->RightColumnClass ?>"><div <?php echo $penyesuaian_edit->izin_jam->cellAttributes() ?>>
<span id="el_penyesuaian_izin_jam">
<input type="text" data-table="penyesuaian" data-field="x_izin_jam" name="x_izin_jam" id="x_izin_jam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_edit->izin_jam->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_edit->izin_jam->EditValue ?>"<?php echo $penyesuaian_edit->izin_jam->editAttributes() ?>>
</span>
<?php echo $penyesuaian_edit->izin_jam->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_edit->sakit->Visible) { // sakit ?>
	<div id="r_sakit" class="form-group row">
		<label id="elh_penyesuaian_sakit" for="x_sakit" class="<?php echo $penyesuaian_edit->LeftColumnClass ?>"><?php echo $penyesuaian_edit->sakit->caption() ?><?php echo $penyesuaian_edit->sakit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_edit->RightColumnClass ?>"><div <?php echo $penyesuaian_edit->sakit->cellAttributes() ?>>
<span id="el_penyesuaian_sakit">
<input type="text" data-table="penyesuaian" data-field="x_sakit" name="x_sakit" id="x_sakit" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_edit->sakit->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_edit->sakit->EditValue ?>"<?php echo $penyesuaian_edit->sakit->editAttributes() ?>>
</span>
<?php echo $penyesuaian_edit->sakit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_edit->sakit_jam->Visible) { // sakit_jam ?>
	<div id="r_sakit_jam" class="form-group row">
		<label id="elh_penyesuaian_sakit_jam" for="x_sakit_jam" class="<?php echo $penyesuaian_edit->LeftColumnClass ?>"><?php echo $penyesuaian_edit->sakit_jam->caption() ?><?php echo $penyesuaian_edit->sakit_jam->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_edit->RightColumnClass ?>"><div <?php echo $penyesuaian_edit->sakit_jam->cellAttributes() ?>>
<span id="el_penyesuaian_sakit_jam">
<input type="text" data-table="penyesuaian" data-field="x_sakit_jam" name="x_sakit_jam" id="x_sakit_jam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_edit->sakit_jam->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_edit->sakit_jam->EditValue ?>"<?php echo $penyesuaian_edit->sakit_jam->editAttributes() ?>>
</span>
<?php echo $penyesuaian_edit->sakit_jam->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_edit->terlambat->Visible) { // terlambat ?>
	<div id="r_terlambat" class="form-group row">
		<label id="elh_penyesuaian_terlambat" for="x_terlambat" class="<?php echo $penyesuaian_edit->LeftColumnClass ?>"><?php echo $penyesuaian_edit->terlambat->caption() ?><?php echo $penyesuaian_edit->terlambat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_edit->RightColumnClass ?>"><div <?php echo $penyesuaian_edit->terlambat->cellAttributes() ?>>
<span id="el_penyesuaian_terlambat">
<input type="text" data-table="penyesuaian" data-field="x_terlambat" name="x_terlambat" id="x_terlambat" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_edit->terlambat->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_edit->terlambat->EditValue ?>"<?php echo $penyesuaian_edit->terlambat->editAttributes() ?>>
</span>
<?php echo $penyesuaian_edit->terlambat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_edit->pulang_cepat->Visible) { // pulang_cepat ?>
	<div id="r_pulang_cepat" class="form-group row">
		<label id="elh_penyesuaian_pulang_cepat" for="x_pulang_cepat" class="<?php echo $penyesuaian_edit->LeftColumnClass ?>"><?php echo $penyesuaian_edit->pulang_cepat->caption() ?><?php echo $penyesuaian_edit->pulang_cepat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_edit->RightColumnClass ?>"><div <?php echo $penyesuaian_edit->pulang_cepat->cellAttributes() ?>>
<span id="el_penyesuaian_pulang_cepat">
<input type="text" data-table="penyesuaian" data-field="x_pulang_cepat" name="x_pulang_cepat" id="x_pulang_cepat" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_edit->pulang_cepat->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_edit->pulang_cepat->EditValue ?>"<?php echo $penyesuaian_edit->pulang_cepat->editAttributes() ?>>
</span>
<?php echo $penyesuaian_edit->pulang_cepat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_edit->piket->Visible) { // piket ?>
	<div id="r_piket" class="form-group row">
		<label id="elh_penyesuaian_piket" for="x_piket" class="<?php echo $penyesuaian_edit->LeftColumnClass ?>"><?php echo $penyesuaian_edit->piket->caption() ?><?php echo $penyesuaian_edit->piket->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_edit->RightColumnClass ?>"><div <?php echo $penyesuaian_edit->piket->cellAttributes() ?>>
<span id="el_penyesuaian_piket">
<input type="text" data-table="penyesuaian" data-field="x_piket" name="x_piket" id="x_piket" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_edit->piket->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_edit->piket->EditValue ?>"<?php echo $penyesuaian_edit->piket->editAttributes() ?>>
</span>
<?php echo $penyesuaian_edit->piket->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_edit->inval->Visible) { // inval ?>
	<div id="r_inval" class="form-group row">
		<label id="elh_penyesuaian_inval" for="x_inval" class="<?php echo $penyesuaian_edit->LeftColumnClass ?>"><?php echo $penyesuaian_edit->inval->caption() ?><?php echo $penyesuaian_edit->inval->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_edit->RightColumnClass ?>"><div <?php echo $penyesuaian_edit->inval->cellAttributes() ?>>
<span id="el_penyesuaian_inval">
<input type="text" data-table="penyesuaian" data-field="x_inval" name="x_inval" id="x_inval" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_edit->inval->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_edit->inval->EditValue ?>"<?php echo $penyesuaian_edit->inval->editAttributes() ?>>
</span>
<?php echo $penyesuaian_edit->inval->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_edit->lembur->Visible) { // lembur ?>
	<div id="r_lembur" class="form-group row">
		<label id="elh_penyesuaian_lembur" for="x_lembur" class="<?php echo $penyesuaian_edit->LeftColumnClass ?>"><?php echo $penyesuaian_edit->lembur->caption() ?><?php echo $penyesuaian_edit->lembur->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_edit->RightColumnClass ?>"><div <?php echo $penyesuaian_edit->lembur->cellAttributes() ?>>
<span id="el_penyesuaian_lembur">
<input type="text" data-table="penyesuaian" data-field="x_lembur" name="x_lembur" id="x_lembur" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_edit->lembur->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_edit->lembur->EditValue ?>"<?php echo $penyesuaian_edit->lembur->editAttributes() ?>>
</span>
<?php echo $penyesuaian_edit->lembur->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_edit->voucher->Visible) { // voucher ?>
	<div id="r_voucher" class="form-group row">
		<label id="elh_penyesuaian_voucher" for="x_voucher" class="<?php echo $penyesuaian_edit->LeftColumnClass ?>"><?php echo $penyesuaian_edit->voucher->caption() ?><?php echo $penyesuaian_edit->voucher->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_edit->RightColumnClass ?>"><div <?php echo $penyesuaian_edit->voucher->cellAttributes() ?>>
<span id="el_penyesuaian_voucher">
<input type="text" data-table="penyesuaian" data-field="x_voucher" name="x_voucher" id="x_voucher" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($penyesuaian_edit->voucher->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_edit->voucher->EditValue ?>"<?php echo $penyesuaian_edit->voucher->editAttributes() ?>>
</span>
<?php echo $penyesuaian_edit->voucher->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_edit->total->Visible) { // total ?>
	<div id="r_total" class="form-group row">
		<label id="elh_penyesuaian_total" for="x_total" class="<?php echo $penyesuaian_edit->LeftColumnClass ?>"><?php echo $penyesuaian_edit->total->caption() ?><?php echo $penyesuaian_edit->total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_edit->RightColumnClass ?>"><div <?php echo $penyesuaian_edit->total->cellAttributes() ?>>
<span id="el_penyesuaian_total">
<input type="text" data-table="penyesuaian" data-field="x_total" name="x_total" id="x_total" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($penyesuaian_edit->total->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_edit->total->EditValue ?>"<?php echo $penyesuaian_edit->total->editAttributes() ?>>
</span>
<?php echo $penyesuaian_edit->total->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_edit->total2->Visible) { // total2 ?>
	<div id="r_total2" class="form-group row">
		<label id="elh_penyesuaian_total2" for="x_total2" class="<?php echo $penyesuaian_edit->LeftColumnClass ?>"><?php echo $penyesuaian_edit->total2->caption() ?><?php echo $penyesuaian_edit->total2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_edit->RightColumnClass ?>"><div <?php echo $penyesuaian_edit->total2->cellAttributes() ?>>
<span id="el_penyesuaian_total2">
<input type="text" data-table="penyesuaian" data-field="x_total2" name="x_total2" id="x_total2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($penyesuaian_edit->total2->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_edit->total2->EditValue ?>"<?php echo $penyesuaian_edit->total2->editAttributes() ?>>
</span>
<?php echo $penyesuaian_edit->total2->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="penyesuaian" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($penyesuaian_edit->id->CurrentValue) ?>">
<?php if (!$penyesuaian_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $penyesuaian_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $penyesuaian_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$penyesuaian_edit->showPageFooter();
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
$penyesuaian_edit->terminate();
?>