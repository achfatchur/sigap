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
$penyesuaian_add = new penyesuaian_add();

// Run the page
$penyesuaian_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$penyesuaian_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpenyesuaianadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpenyesuaianadd = currentForm = new ew.Form("fpenyesuaianadd", "add");

	// Validate form
	fpenyesuaianadd.validate = function() {
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
			<?php if ($penyesuaian_add->m_id->Required) { ?>
				elm = this.getElements("x" + infix + "_m_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->m_id->caption(), $penyesuaian_add->m_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_m_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->m_id->errorMessage()) ?>");
			<?php if ($penyesuaian_add->datetime->Required) { ?>
				elm = this.getElements("x" + infix + "_datetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->datetime->caption(), $penyesuaian_add->datetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($penyesuaian_add->nip->Required) { ?>
				elm = this.getElements("x" + infix + "_nip");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->nip->caption(), $penyesuaian_add->nip->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($penyesuaian_add->jenjang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->jenjang_id->caption(), $penyesuaian_add->jenjang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->jenjang_id->errorMessage()) ?>");
			<?php if ($penyesuaian_add->absen->Required) { ?>
				elm = this.getElements("x" + infix + "_absen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->absen->caption(), $penyesuaian_add->absen->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_absen");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->absen->errorMessage()) ?>");
			<?php if ($penyesuaian_add->absen_jam->Required) { ?>
				elm = this.getElements("x" + infix + "_absen_jam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->absen_jam->caption(), $penyesuaian_add->absen_jam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_absen_jam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->absen_jam->errorMessage()) ?>");
			<?php if ($penyesuaian_add->izin->Required) { ?>
				elm = this.getElements("x" + infix + "_izin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->izin->caption(), $penyesuaian_add->izin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_izin");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->izin->errorMessage()) ?>");
			<?php if ($penyesuaian_add->izin_jam->Required) { ?>
				elm = this.getElements("x" + infix + "_izin_jam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->izin_jam->caption(), $penyesuaian_add->izin_jam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_izin_jam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->izin_jam->errorMessage()) ?>");
			<?php if ($penyesuaian_add->sakit->Required) { ?>
				elm = this.getElements("x" + infix + "_sakit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->sakit->caption(), $penyesuaian_add->sakit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->sakit->errorMessage()) ?>");
			<?php if ($penyesuaian_add->sakit_jam->Required) { ?>
				elm = this.getElements("x" + infix + "_sakit_jam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->sakit_jam->caption(), $penyesuaian_add->sakit_jam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sakit_jam");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->sakit_jam->errorMessage()) ?>");
			<?php if ($penyesuaian_add->terlambat->Required) { ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->terlambat->caption(), $penyesuaian_add->terlambat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_terlambat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->terlambat->errorMessage()) ?>");
			<?php if ($penyesuaian_add->pulang_cepat->Required) { ?>
				elm = this.getElements("x" + infix + "_pulang_cepat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->pulang_cepat->caption(), $penyesuaian_add->pulang_cepat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pulang_cepat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->pulang_cepat->errorMessage()) ?>");
			<?php if ($penyesuaian_add->piket->Required) { ?>
				elm = this.getElements("x" + infix + "_piket");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->piket->caption(), $penyesuaian_add->piket->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_piket");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->piket->errorMessage()) ?>");
			<?php if ($penyesuaian_add->inval->Required) { ?>
				elm = this.getElements("x" + infix + "_inval");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->inval->caption(), $penyesuaian_add->inval->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_inval");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->inval->errorMessage()) ?>");
			<?php if ($penyesuaian_add->lembur->Required) { ?>
				elm = this.getElements("x" + infix + "_lembur");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->lembur->caption(), $penyesuaian_add->lembur->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_lembur");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->lembur->errorMessage()) ?>");
			<?php if ($penyesuaian_add->voucher->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->voucher->caption(), $penyesuaian_add->voucher->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_voucher");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->voucher->errorMessage()) ?>");
			<?php if ($penyesuaian_add->total->Required) { ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->total->caption(), $penyesuaian_add->total->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->total->errorMessage()) ?>");
			<?php if ($penyesuaian_add->total2->Required) { ?>
				elm = this.getElements("x" + infix + "_total2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $penyesuaian_add->total2->caption(), $penyesuaian_add->total2->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total2");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($penyesuaian_add->total2->errorMessage()) ?>");

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
	fpenyesuaianadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpenyesuaianadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpenyesuaianadd.lists["x_nip"] = <?php echo $penyesuaian_add->nip->Lookup->toClientList($penyesuaian_add) ?>;
	fpenyesuaianadd.lists["x_nip"].options = <?php echo JsonEncode($penyesuaian_add->nip->lookupOptions()) ?>;
	loadjs.done("fpenyesuaianadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $penyesuaian_add->showPageHeader(); ?>
<?php
$penyesuaian_add->showMessage();
?>
<form name="fpenyesuaianadd" id="fpenyesuaianadd" class="<?php echo $penyesuaian_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="penyesuaian">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$penyesuaian_add->IsModal ?>">
<?php if ($penyesuaian->getCurrentMasterTable() == "m_penyesuaian") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="m_penyesuaian">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($penyesuaian_add->m_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($penyesuaian_add->m_id->Visible) { // m_id ?>
	<div id="r_m_id" class="form-group row">
		<label id="elh_penyesuaian_m_id" for="x_m_id" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->m_id->caption() ?><?php echo $penyesuaian_add->m_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->m_id->cellAttributes() ?>>
<?php if ($penyesuaian_add->m_id->getSessionValue() != "") { ?>
<span id="el_penyesuaian_m_id">
<span<?php echo $penyesuaian_add->m_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($penyesuaian_add->m_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_m_id" name="x_m_id" value="<?php echo HtmlEncode($penyesuaian_add->m_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_penyesuaian_m_id">
<input type="text" data-table="penyesuaian" data-field="x_m_id" name="x_m_id" id="x_m_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($penyesuaian_add->m_id->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->m_id->EditValue ?>"<?php echo $penyesuaian_add->m_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $penyesuaian_add->m_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->nip->Visible) { // nip ?>
	<div id="r_nip" class="form-group row">
		<label id="elh_penyesuaian_nip" for="x_nip" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->nip->caption() ?><?php echo $penyesuaian_add->nip->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->nip->cellAttributes() ?>>
<span id="el_penyesuaian_nip">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="penyesuaian" data-field="x_nip" data-value-separator="<?php echo $penyesuaian_add->nip->displayValueSeparatorAttribute() ?>" id="x_nip" name="x_nip"<?php echo $penyesuaian_add->nip->editAttributes() ?>>
			<?php echo $penyesuaian_add->nip->selectOptionListHtml("x_nip") ?>
		</select>
</div>
<?php echo $penyesuaian_add->nip->Lookup->getParamTag($penyesuaian_add, "p_x_nip") ?>
</span>
<?php echo $penyesuaian_add->nip->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->jenjang_id->Visible) { // jenjang_id ?>
	<div id="r_jenjang_id" class="form-group row">
		<label id="elh_penyesuaian_jenjang_id" for="x_jenjang_id" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->jenjang_id->caption() ?><?php echo $penyesuaian_add->jenjang_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->jenjang_id->cellAttributes() ?>>
<span id="el_penyesuaian_jenjang_id">
<input type="text" data-table="penyesuaian" data-field="x_jenjang_id" name="x_jenjang_id" id="x_jenjang_id" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_add->jenjang_id->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->jenjang_id->EditValue ?>"<?php echo $penyesuaian_add->jenjang_id->editAttributes() ?>>
</span>
<?php echo $penyesuaian_add->jenjang_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->absen->Visible) { // absen ?>
	<div id="r_absen" class="form-group row">
		<label id="elh_penyesuaian_absen" for="x_absen" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->absen->caption() ?><?php echo $penyesuaian_add->absen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->absen->cellAttributes() ?>>
<span id="el_penyesuaian_absen">
<input type="text" data-table="penyesuaian" data-field="x_absen" name="x_absen" id="x_absen" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_add->absen->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->absen->EditValue ?>"<?php echo $penyesuaian_add->absen->editAttributes() ?>>
</span>
<?php echo $penyesuaian_add->absen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->absen_jam->Visible) { // absen_jam ?>
	<div id="r_absen_jam" class="form-group row">
		<label id="elh_penyesuaian_absen_jam" for="x_absen_jam" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->absen_jam->caption() ?><?php echo $penyesuaian_add->absen_jam->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->absen_jam->cellAttributes() ?>>
<span id="el_penyesuaian_absen_jam">
<input type="text" data-table="penyesuaian" data-field="x_absen_jam" name="x_absen_jam" id="x_absen_jam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_add->absen_jam->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->absen_jam->EditValue ?>"<?php echo $penyesuaian_add->absen_jam->editAttributes() ?>>
</span>
<?php echo $penyesuaian_add->absen_jam->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->izin->Visible) { // izin ?>
	<div id="r_izin" class="form-group row">
		<label id="elh_penyesuaian_izin" for="x_izin" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->izin->caption() ?><?php echo $penyesuaian_add->izin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->izin->cellAttributes() ?>>
<span id="el_penyesuaian_izin">
<input type="text" data-table="penyesuaian" data-field="x_izin" name="x_izin" id="x_izin" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_add->izin->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->izin->EditValue ?>"<?php echo $penyesuaian_add->izin->editAttributes() ?>>
</span>
<?php echo $penyesuaian_add->izin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->izin_jam->Visible) { // izin_jam ?>
	<div id="r_izin_jam" class="form-group row">
		<label id="elh_penyesuaian_izin_jam" for="x_izin_jam" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->izin_jam->caption() ?><?php echo $penyesuaian_add->izin_jam->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->izin_jam->cellAttributes() ?>>
<span id="el_penyesuaian_izin_jam">
<input type="text" data-table="penyesuaian" data-field="x_izin_jam" name="x_izin_jam" id="x_izin_jam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_add->izin_jam->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->izin_jam->EditValue ?>"<?php echo $penyesuaian_add->izin_jam->editAttributes() ?>>
</span>
<?php echo $penyesuaian_add->izin_jam->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->sakit->Visible) { // sakit ?>
	<div id="r_sakit" class="form-group row">
		<label id="elh_penyesuaian_sakit" for="x_sakit" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->sakit->caption() ?><?php echo $penyesuaian_add->sakit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->sakit->cellAttributes() ?>>
<span id="el_penyesuaian_sakit">
<input type="text" data-table="penyesuaian" data-field="x_sakit" name="x_sakit" id="x_sakit" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_add->sakit->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->sakit->EditValue ?>"<?php echo $penyesuaian_add->sakit->editAttributes() ?>>
</span>
<?php echo $penyesuaian_add->sakit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->sakit_jam->Visible) { // sakit_jam ?>
	<div id="r_sakit_jam" class="form-group row">
		<label id="elh_penyesuaian_sakit_jam" for="x_sakit_jam" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->sakit_jam->caption() ?><?php echo $penyesuaian_add->sakit_jam->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->sakit_jam->cellAttributes() ?>>
<span id="el_penyesuaian_sakit_jam">
<input type="text" data-table="penyesuaian" data-field="x_sakit_jam" name="x_sakit_jam" id="x_sakit_jam" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_add->sakit_jam->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->sakit_jam->EditValue ?>"<?php echo $penyesuaian_add->sakit_jam->editAttributes() ?>>
</span>
<?php echo $penyesuaian_add->sakit_jam->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->terlambat->Visible) { // terlambat ?>
	<div id="r_terlambat" class="form-group row">
		<label id="elh_penyesuaian_terlambat" for="x_terlambat" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->terlambat->caption() ?><?php echo $penyesuaian_add->terlambat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->terlambat->cellAttributes() ?>>
<span id="el_penyesuaian_terlambat">
<input type="text" data-table="penyesuaian" data-field="x_terlambat" name="x_terlambat" id="x_terlambat" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_add->terlambat->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->terlambat->EditValue ?>"<?php echo $penyesuaian_add->terlambat->editAttributes() ?>>
</span>
<?php echo $penyesuaian_add->terlambat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->pulang_cepat->Visible) { // pulang_cepat ?>
	<div id="r_pulang_cepat" class="form-group row">
		<label id="elh_penyesuaian_pulang_cepat" for="x_pulang_cepat" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->pulang_cepat->caption() ?><?php echo $penyesuaian_add->pulang_cepat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->pulang_cepat->cellAttributes() ?>>
<span id="el_penyesuaian_pulang_cepat">
<input type="text" data-table="penyesuaian" data-field="x_pulang_cepat" name="x_pulang_cepat" id="x_pulang_cepat" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_add->pulang_cepat->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->pulang_cepat->EditValue ?>"<?php echo $penyesuaian_add->pulang_cepat->editAttributes() ?>>
</span>
<?php echo $penyesuaian_add->pulang_cepat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->piket->Visible) { // piket ?>
	<div id="r_piket" class="form-group row">
		<label id="elh_penyesuaian_piket" for="x_piket" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->piket->caption() ?><?php echo $penyesuaian_add->piket->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->piket->cellAttributes() ?>>
<span id="el_penyesuaian_piket">
<input type="text" data-table="penyesuaian" data-field="x_piket" name="x_piket" id="x_piket" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_add->piket->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->piket->EditValue ?>"<?php echo $penyesuaian_add->piket->editAttributes() ?>>
</span>
<?php echo $penyesuaian_add->piket->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->inval->Visible) { // inval ?>
	<div id="r_inval" class="form-group row">
		<label id="elh_penyesuaian_inval" for="x_inval" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->inval->caption() ?><?php echo $penyesuaian_add->inval->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->inval->cellAttributes() ?>>
<span id="el_penyesuaian_inval">
<input type="text" data-table="penyesuaian" data-field="x_inval" name="x_inval" id="x_inval" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_add->inval->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->inval->EditValue ?>"<?php echo $penyesuaian_add->inval->editAttributes() ?>>
</span>
<?php echo $penyesuaian_add->inval->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->lembur->Visible) { // lembur ?>
	<div id="r_lembur" class="form-group row">
		<label id="elh_penyesuaian_lembur" for="x_lembur" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->lembur->caption() ?><?php echo $penyesuaian_add->lembur->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->lembur->cellAttributes() ?>>
<span id="el_penyesuaian_lembur">
<input type="text" data-table="penyesuaian" data-field="x_lembur" name="x_lembur" id="x_lembur" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($penyesuaian_add->lembur->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->lembur->EditValue ?>"<?php echo $penyesuaian_add->lembur->editAttributes() ?>>
</span>
<?php echo $penyesuaian_add->lembur->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->voucher->Visible) { // voucher ?>
	<div id="r_voucher" class="form-group row">
		<label id="elh_penyesuaian_voucher" for="x_voucher" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->voucher->caption() ?><?php echo $penyesuaian_add->voucher->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->voucher->cellAttributes() ?>>
<span id="el_penyesuaian_voucher">
<input type="text" data-table="penyesuaian" data-field="x_voucher" name="x_voucher" id="x_voucher" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($penyesuaian_add->voucher->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->voucher->EditValue ?>"<?php echo $penyesuaian_add->voucher->editAttributes() ?>>
</span>
<?php echo $penyesuaian_add->voucher->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->total->Visible) { // total ?>
	<div id="r_total" class="form-group row">
		<label id="elh_penyesuaian_total" for="x_total" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->total->caption() ?><?php echo $penyesuaian_add->total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->total->cellAttributes() ?>>
<span id="el_penyesuaian_total">
<input type="text" data-table="penyesuaian" data-field="x_total" name="x_total" id="x_total" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($penyesuaian_add->total->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->total->EditValue ?>"<?php echo $penyesuaian_add->total->editAttributes() ?>>
</span>
<?php echo $penyesuaian_add->total->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($penyesuaian_add->total2->Visible) { // total2 ?>
	<div id="r_total2" class="form-group row">
		<label id="elh_penyesuaian_total2" for="x_total2" class="<?php echo $penyesuaian_add->LeftColumnClass ?>"><?php echo $penyesuaian_add->total2->caption() ?><?php echo $penyesuaian_add->total2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $penyesuaian_add->RightColumnClass ?>"><div <?php echo $penyesuaian_add->total2->cellAttributes() ?>>
<span id="el_penyesuaian_total2">
<input type="text" data-table="penyesuaian" data-field="x_total2" name="x_total2" id="x_total2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($penyesuaian_add->total2->getPlaceHolder()) ?>" value="<?php echo $penyesuaian_add->total2->EditValue ?>"<?php echo $penyesuaian_add->total2->editAttributes() ?>>
</span>
<?php echo $penyesuaian_add->total2->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$penyesuaian_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $penyesuaian_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $penyesuaian_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$penyesuaian_add->showPageFooter();
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
$penyesuaian_add->terminate();
?>