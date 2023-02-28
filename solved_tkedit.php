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
$solved_tk_edit = new solved_tk_edit();

// Run the page
$solved_tk_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$solved_tk_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsolved_tkedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fsolved_tkedit = currentForm = new ew.Form("fsolved_tkedit", "edit");

	// Validate form
	fsolved_tkedit.validate = function() {
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
			<?php if ($solved_tk_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $solved_tk_edit->id->caption(), $solved_tk_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($solved_tk_edit->nip->Required) { ?>
				elm = this.getElements("x" + infix + "_nip");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $solved_tk_edit->nip->caption(), $solved_tk_edit->nip->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($solved_tk_edit->total_gaji->Required) { ?>
				elm = this.getElements("x" + infix + "_total_gaji");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $solved_tk_edit->total_gaji->caption(), $solved_tk_edit->total_gaji->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_total_gaji");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($solved_tk_edit->total_gaji->errorMessage()) ?>");
			<?php if ($solved_tk_edit->j_pensiun->Required) { ?>
				elm = this.getElements("x" + infix + "_j_pensiun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $solved_tk_edit->j_pensiun->caption(), $solved_tk_edit->j_pensiun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_j_pensiun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($solved_tk_edit->j_pensiun->errorMessage()) ?>");
			<?php if ($solved_tk_edit->hari_tua->Required) { ?>
				elm = this.getElements("x" + infix + "_hari_tua");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $solved_tk_edit->hari_tua->caption(), $solved_tk_edit->hari_tua->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_hari_tua");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($solved_tk_edit->hari_tua->errorMessage()) ?>");
			<?php if ($solved_tk_edit->pph21->Required) { ?>
				elm = this.getElements("x" + infix + "_pph21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $solved_tk_edit->pph21->caption(), $solved_tk_edit->pph21->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pph21");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($solved_tk_edit->pph21->errorMessage()) ?>");
			<?php if ($solved_tk_edit->golongan_bpjs->Required) { ?>
				elm = this.getElements("x" + infix + "_golongan_bpjs");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $solved_tk_edit->golongan_bpjs->caption(), $solved_tk_edit->golongan_bpjs->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_golongan_bpjs");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($solved_tk_edit->golongan_bpjs->errorMessage()) ?>");
			<?php if ($solved_tk_edit->iuran_bpjs->Required) { ?>
				elm = this.getElements("x" + infix + "_iuran_bpjs");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $solved_tk_edit->iuran_bpjs->caption(), $solved_tk_edit->iuran_bpjs->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_iuran_bpjs");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($solved_tk_edit->iuran_bpjs->errorMessage()) ?>");
			<?php if ($solved_tk_edit->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $solved_tk_edit->bulan->caption(), $solved_tk_edit->bulan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($solved_tk_edit->bulan->errorMessage()) ?>");
			<?php if ($solved_tk_edit->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $solved_tk_edit->tahun->caption(), $solved_tk_edit->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($solved_tk_edit->tahun->errorMessage()) ?>");
			<?php if ($solved_tk_edit->type_peg->Required) { ?>
				elm = this.getElements("x" + infix + "_type_peg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $solved_tk_edit->type_peg->caption(), $solved_tk_edit->type_peg->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_type_peg");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($solved_tk_edit->type_peg->errorMessage()) ?>");
			<?php if ($solved_tk_edit->unit->Required) { ?>
				elm = this.getElements("x" + infix + "_unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $solved_tk_edit->unit->caption(), $solved_tk_edit->unit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_unit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($solved_tk_edit->unit->errorMessage()) ?>");
			<?php if ($solved_tk_edit->tanggal->Required) { ?>
				elm = this.getElements("x" + infix + "_tanggal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $solved_tk_edit->tanggal->caption(), $solved_tk_edit->tanggal->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tanggal");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($solved_tk_edit->tanggal->errorMessage()) ?>");

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
	fsolved_tkedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fsolved_tkedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fsolved_tkedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $solved_tk_edit->showPageHeader(); ?>
<?php
$solved_tk_edit->showMessage();
?>
<form name="fsolved_tkedit" id="fsolved_tkedit" class="<?php echo $solved_tk_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="solved_tk">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$solved_tk_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($solved_tk_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_solved_tk_id" class="<?php echo $solved_tk_edit->LeftColumnClass ?>"><?php echo $solved_tk_edit->id->caption() ?><?php echo $solved_tk_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $solved_tk_edit->RightColumnClass ?>"><div <?php echo $solved_tk_edit->id->cellAttributes() ?>>
<span id="el_solved_tk_id">
<span<?php echo $solved_tk_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($solved_tk_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="solved_tk" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($solved_tk_edit->id->CurrentValue) ?>">
<?php echo $solved_tk_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($solved_tk_edit->nip->Visible) { // nip ?>
	<div id="r_nip" class="form-group row">
		<label id="elh_solved_tk_nip" for="x_nip" class="<?php echo $solved_tk_edit->LeftColumnClass ?>"><?php echo $solved_tk_edit->nip->caption() ?><?php echo $solved_tk_edit->nip->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $solved_tk_edit->RightColumnClass ?>"><div <?php echo $solved_tk_edit->nip->cellAttributes() ?>>
<span id="el_solved_tk_nip">
<input type="text" data-table="solved_tk" data-field="x_nip" name="x_nip" id="x_nip" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($solved_tk_edit->nip->getPlaceHolder()) ?>" value="<?php echo $solved_tk_edit->nip->EditValue ?>"<?php echo $solved_tk_edit->nip->editAttributes() ?>>
</span>
<?php echo $solved_tk_edit->nip->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($solved_tk_edit->total_gaji->Visible) { // total_gaji ?>
	<div id="r_total_gaji" class="form-group row">
		<label id="elh_solved_tk_total_gaji" for="x_total_gaji" class="<?php echo $solved_tk_edit->LeftColumnClass ?>"><?php echo $solved_tk_edit->total_gaji->caption() ?><?php echo $solved_tk_edit->total_gaji->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $solved_tk_edit->RightColumnClass ?>"><div <?php echo $solved_tk_edit->total_gaji->cellAttributes() ?>>
<span id="el_solved_tk_total_gaji">
<input type="text" data-table="solved_tk" data-field="x_total_gaji" name="x_total_gaji" id="x_total_gaji" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($solved_tk_edit->total_gaji->getPlaceHolder()) ?>" value="<?php echo $solved_tk_edit->total_gaji->EditValue ?>"<?php echo $solved_tk_edit->total_gaji->editAttributes() ?>>
</span>
<?php echo $solved_tk_edit->total_gaji->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($solved_tk_edit->j_pensiun->Visible) { // j_pensiun ?>
	<div id="r_j_pensiun" class="form-group row">
		<label id="elh_solved_tk_j_pensiun" for="x_j_pensiun" class="<?php echo $solved_tk_edit->LeftColumnClass ?>"><?php echo $solved_tk_edit->j_pensiun->caption() ?><?php echo $solved_tk_edit->j_pensiun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $solved_tk_edit->RightColumnClass ?>"><div <?php echo $solved_tk_edit->j_pensiun->cellAttributes() ?>>
<span id="el_solved_tk_j_pensiun">
<input type="text" data-table="solved_tk" data-field="x_j_pensiun" name="x_j_pensiun" id="x_j_pensiun" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($solved_tk_edit->j_pensiun->getPlaceHolder()) ?>" value="<?php echo $solved_tk_edit->j_pensiun->EditValue ?>"<?php echo $solved_tk_edit->j_pensiun->editAttributes() ?>>
</span>
<?php echo $solved_tk_edit->j_pensiun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($solved_tk_edit->hari_tua->Visible) { // hari_tua ?>
	<div id="r_hari_tua" class="form-group row">
		<label id="elh_solved_tk_hari_tua" for="x_hari_tua" class="<?php echo $solved_tk_edit->LeftColumnClass ?>"><?php echo $solved_tk_edit->hari_tua->caption() ?><?php echo $solved_tk_edit->hari_tua->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $solved_tk_edit->RightColumnClass ?>"><div <?php echo $solved_tk_edit->hari_tua->cellAttributes() ?>>
<span id="el_solved_tk_hari_tua">
<input type="text" data-table="solved_tk" data-field="x_hari_tua" name="x_hari_tua" id="x_hari_tua" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($solved_tk_edit->hari_tua->getPlaceHolder()) ?>" value="<?php echo $solved_tk_edit->hari_tua->EditValue ?>"<?php echo $solved_tk_edit->hari_tua->editAttributes() ?>>
</span>
<?php echo $solved_tk_edit->hari_tua->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($solved_tk_edit->pph21->Visible) { // pph21 ?>
	<div id="r_pph21" class="form-group row">
		<label id="elh_solved_tk_pph21" for="x_pph21" class="<?php echo $solved_tk_edit->LeftColumnClass ?>"><?php echo $solved_tk_edit->pph21->caption() ?><?php echo $solved_tk_edit->pph21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $solved_tk_edit->RightColumnClass ?>"><div <?php echo $solved_tk_edit->pph21->cellAttributes() ?>>
<span id="el_solved_tk_pph21">
<input type="text" data-table="solved_tk" data-field="x_pph21" name="x_pph21" id="x_pph21" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($solved_tk_edit->pph21->getPlaceHolder()) ?>" value="<?php echo $solved_tk_edit->pph21->EditValue ?>"<?php echo $solved_tk_edit->pph21->editAttributes() ?>>
</span>
<?php echo $solved_tk_edit->pph21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($solved_tk_edit->golongan_bpjs->Visible) { // golongan_bpjs ?>
	<div id="r_golongan_bpjs" class="form-group row">
		<label id="elh_solved_tk_golongan_bpjs" for="x_golongan_bpjs" class="<?php echo $solved_tk_edit->LeftColumnClass ?>"><?php echo $solved_tk_edit->golongan_bpjs->caption() ?><?php echo $solved_tk_edit->golongan_bpjs->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $solved_tk_edit->RightColumnClass ?>"><div <?php echo $solved_tk_edit->golongan_bpjs->cellAttributes() ?>>
<span id="el_solved_tk_golongan_bpjs">
<input type="text" data-table="solved_tk" data-field="x_golongan_bpjs" name="x_golongan_bpjs" id="x_golongan_bpjs" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($solved_tk_edit->golongan_bpjs->getPlaceHolder()) ?>" value="<?php echo $solved_tk_edit->golongan_bpjs->EditValue ?>"<?php echo $solved_tk_edit->golongan_bpjs->editAttributes() ?>>
</span>
<?php echo $solved_tk_edit->golongan_bpjs->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($solved_tk_edit->iuran_bpjs->Visible) { // iuran_bpjs ?>
	<div id="r_iuran_bpjs" class="form-group row">
		<label id="elh_solved_tk_iuran_bpjs" for="x_iuran_bpjs" class="<?php echo $solved_tk_edit->LeftColumnClass ?>"><?php echo $solved_tk_edit->iuran_bpjs->caption() ?><?php echo $solved_tk_edit->iuran_bpjs->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $solved_tk_edit->RightColumnClass ?>"><div <?php echo $solved_tk_edit->iuran_bpjs->cellAttributes() ?>>
<span id="el_solved_tk_iuran_bpjs">
<input type="text" data-table="solved_tk" data-field="x_iuran_bpjs" name="x_iuran_bpjs" id="x_iuran_bpjs" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($solved_tk_edit->iuran_bpjs->getPlaceHolder()) ?>" value="<?php echo $solved_tk_edit->iuran_bpjs->EditValue ?>"<?php echo $solved_tk_edit->iuran_bpjs->editAttributes() ?>>
</span>
<?php echo $solved_tk_edit->iuran_bpjs->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($solved_tk_edit->bulan->Visible) { // bulan ?>
	<div id="r_bulan" class="form-group row">
		<label id="elh_solved_tk_bulan" for="x_bulan" class="<?php echo $solved_tk_edit->LeftColumnClass ?>"><?php echo $solved_tk_edit->bulan->caption() ?><?php echo $solved_tk_edit->bulan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $solved_tk_edit->RightColumnClass ?>"><div <?php echo $solved_tk_edit->bulan->cellAttributes() ?>>
<span id="el_solved_tk_bulan">
<input type="text" data-table="solved_tk" data-field="x_bulan" name="x_bulan" id="x_bulan" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($solved_tk_edit->bulan->getPlaceHolder()) ?>" value="<?php echo $solved_tk_edit->bulan->EditValue ?>"<?php echo $solved_tk_edit->bulan->editAttributes() ?>>
</span>
<?php echo $solved_tk_edit->bulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($solved_tk_edit->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_solved_tk_tahun" for="x_tahun" class="<?php echo $solved_tk_edit->LeftColumnClass ?>"><?php echo $solved_tk_edit->tahun->caption() ?><?php echo $solved_tk_edit->tahun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $solved_tk_edit->RightColumnClass ?>"><div <?php echo $solved_tk_edit->tahun->cellAttributes() ?>>
<span id="el_solved_tk_tahun">
<input type="text" data-table="solved_tk" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($solved_tk_edit->tahun->getPlaceHolder()) ?>" value="<?php echo $solved_tk_edit->tahun->EditValue ?>"<?php echo $solved_tk_edit->tahun->editAttributes() ?>>
</span>
<?php echo $solved_tk_edit->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($solved_tk_edit->type_peg->Visible) { // type_peg ?>
	<div id="r_type_peg" class="form-group row">
		<label id="elh_solved_tk_type_peg" for="x_type_peg" class="<?php echo $solved_tk_edit->LeftColumnClass ?>"><?php echo $solved_tk_edit->type_peg->caption() ?><?php echo $solved_tk_edit->type_peg->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $solved_tk_edit->RightColumnClass ?>"><div <?php echo $solved_tk_edit->type_peg->cellAttributes() ?>>
<span id="el_solved_tk_type_peg">
<input type="text" data-table="solved_tk" data-field="x_type_peg" name="x_type_peg" id="x_type_peg" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($solved_tk_edit->type_peg->getPlaceHolder()) ?>" value="<?php echo $solved_tk_edit->type_peg->EditValue ?>"<?php echo $solved_tk_edit->type_peg->editAttributes() ?>>
</span>
<?php echo $solved_tk_edit->type_peg->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($solved_tk_edit->unit->Visible) { // unit ?>
	<div id="r_unit" class="form-group row">
		<label id="elh_solved_tk_unit" for="x_unit" class="<?php echo $solved_tk_edit->LeftColumnClass ?>"><?php echo $solved_tk_edit->unit->caption() ?><?php echo $solved_tk_edit->unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $solved_tk_edit->RightColumnClass ?>"><div <?php echo $solved_tk_edit->unit->cellAttributes() ?>>
<span id="el_solved_tk_unit">
<input type="text" data-table="solved_tk" data-field="x_unit" name="x_unit" id="x_unit" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($solved_tk_edit->unit->getPlaceHolder()) ?>" value="<?php echo $solved_tk_edit->unit->EditValue ?>"<?php echo $solved_tk_edit->unit->editAttributes() ?>>
</span>
<?php echo $solved_tk_edit->unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($solved_tk_edit->tanggal->Visible) { // tanggal ?>
	<div id="r_tanggal" class="form-group row">
		<label id="elh_solved_tk_tanggal" for="x_tanggal" class="<?php echo $solved_tk_edit->LeftColumnClass ?>"><?php echo $solved_tk_edit->tanggal->caption() ?><?php echo $solved_tk_edit->tanggal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $solved_tk_edit->RightColumnClass ?>"><div <?php echo $solved_tk_edit->tanggal->cellAttributes() ?>>
<span id="el_solved_tk_tanggal">
<input type="text" data-table="solved_tk" data-field="x_tanggal" name="x_tanggal" id="x_tanggal" maxlength="10" placeholder="<?php echo HtmlEncode($solved_tk_edit->tanggal->getPlaceHolder()) ?>" value="<?php echo $solved_tk_edit->tanggal->EditValue ?>"<?php echo $solved_tk_edit->tanggal->editAttributes() ?>>
<?php if (!$solved_tk_edit->tanggal->ReadOnly && !$solved_tk_edit->tanggal->Disabled && !isset($solved_tk_edit->tanggal->EditAttrs["readonly"]) && !isset($solved_tk_edit->tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsolved_tkedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fsolved_tkedit", "x_tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $solved_tk_edit->tanggal->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$solved_tk_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $solved_tk_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $solved_tk_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$solved_tk_edit->showPageFooter();
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
$solved_tk_edit->terminate();
?>