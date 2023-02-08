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
$m_jp_pegawai_edit = new m_jp_pegawai_edit();

// Run the page
$m_jp_pegawai_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_jp_pegawai_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_jp_pegawaiedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fm_jp_pegawaiedit = currentForm = new ew.Form("fm_jp_pegawaiedit", "edit");

	// Validate form
	fm_jp_pegawaiedit.validate = function() {
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
			<?php if ($m_jp_pegawai_edit->jenjang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenjang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_jp_pegawai_edit->jenjang_id->caption(), $m_jp_pegawai_edit->jenjang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_jp_pegawai_edit->nip->Required) { ?>
				elm = this.getElements("x" + infix + "_nip");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_jp_pegawai_edit->nip->caption(), $m_jp_pegawai_edit->nip->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_jp_pegawai_edit->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_jp_pegawai_edit->nama->caption(), $m_jp_pegawai_edit->nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_jp_pegawai_edit->kehadiran->Required) { ?>
				elm = this.getElements("x" + infix + "_kehadiran");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_jp_pegawai_edit->kehadiran->caption(), $m_jp_pegawai_edit->kehadiran->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_kehadiran");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_jp_pegawai_edit->kehadiran->errorMessage()) ?>");
			<?php if ($m_jp_pegawai_edit->jjm->Required) { ?>
				elm = this.getElements("x" + infix + "_jjm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_jp_pegawai_edit->jjm->caption(), $m_jp_pegawai_edit->jjm->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jjm");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_jp_pegawai_edit->jjm->errorMessage()) ?>");

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
	fm_jp_pegawaiedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fm_jp_pegawaiedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fm_jp_pegawaiedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $m_jp_pegawai_edit->showPageHeader(); ?>
<?php
$m_jp_pegawai_edit->showMessage();
?>
<form name="fm_jp_pegawaiedit" id="fm_jp_pegawaiedit" class="<?php echo $m_jp_pegawai_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_jp_pegawai">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$m_jp_pegawai_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($m_jp_pegawai_edit->jenjang_id->Visible) { // jenjang_id ?>
	<div id="r_jenjang_id" class="form-group row">
		<label id="elh_m_jp_pegawai_jenjang_id" for="x_jenjang_id" class="<?php echo $m_jp_pegawai_edit->LeftColumnClass ?>"><?php echo $m_jp_pegawai_edit->jenjang_id->caption() ?><?php echo $m_jp_pegawai_edit->jenjang_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_jp_pegawai_edit->RightColumnClass ?>"><div <?php echo $m_jp_pegawai_edit->jenjang_id->cellAttributes() ?>>
<span id="el_m_jp_pegawai_jenjang_id">
<span<?php echo $m_jp_pegawai_edit->jenjang_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($m_jp_pegawai_edit->jenjang_id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="m_jp_pegawai" data-field="x_jenjang_id" name="x_jenjang_id" id="x_jenjang_id" value="<?php echo HtmlEncode($m_jp_pegawai_edit->jenjang_id->CurrentValue) ?>">
<?php echo $m_jp_pegawai_edit->jenjang_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_jp_pegawai_edit->nip->Visible) { // nip ?>
	<div id="r_nip" class="form-group row">
		<label id="elh_m_jp_pegawai_nip" for="x_nip" class="<?php echo $m_jp_pegawai_edit->LeftColumnClass ?>"><?php echo $m_jp_pegawai_edit->nip->caption() ?><?php echo $m_jp_pegawai_edit->nip->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_jp_pegawai_edit->RightColumnClass ?>"><div <?php echo $m_jp_pegawai_edit->nip->cellAttributes() ?>>
<span id="el_m_jp_pegawai_nip">
<span<?php echo $m_jp_pegawai_edit->nip->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($m_jp_pegawai_edit->nip->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="m_jp_pegawai" data-field="x_nip" name="x_nip" id="x_nip" value="<?php echo HtmlEncode($m_jp_pegawai_edit->nip->CurrentValue) ?>">
<?php echo $m_jp_pegawai_edit->nip->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_jp_pegawai_edit->nama->Visible) { // nama ?>
	<div id="r_nama" class="form-group row">
		<label id="elh_m_jp_pegawai_nama" for="x_nama" class="<?php echo $m_jp_pegawai_edit->LeftColumnClass ?>"><?php echo $m_jp_pegawai_edit->nama->caption() ?><?php echo $m_jp_pegawai_edit->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_jp_pegawai_edit->RightColumnClass ?>"><div <?php echo $m_jp_pegawai_edit->nama->cellAttributes() ?>>
<span id="el_m_jp_pegawai_nama">
<span<?php echo $m_jp_pegawai_edit->nama->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($m_jp_pegawai_edit->nama->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="m_jp_pegawai" data-field="x_nama" name="x_nama" id="x_nama" value="<?php echo HtmlEncode($m_jp_pegawai_edit->nama->CurrentValue) ?>">
<?php echo $m_jp_pegawai_edit->nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_jp_pegawai_edit->kehadiran->Visible) { // kehadiran ?>
	<div id="r_kehadiran" class="form-group row">
		<label id="elh_m_jp_pegawai_kehadiran" for="x_kehadiran" class="<?php echo $m_jp_pegawai_edit->LeftColumnClass ?>"><?php echo $m_jp_pegawai_edit->kehadiran->caption() ?><?php echo $m_jp_pegawai_edit->kehadiran->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_jp_pegawai_edit->RightColumnClass ?>"><div <?php echo $m_jp_pegawai_edit->kehadiran->cellAttributes() ?>>
<span id="el_m_jp_pegawai_kehadiran">
<input type="text" data-table="m_jp_pegawai" data-field="x_kehadiran" name="x_kehadiran" id="x_kehadiran" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($m_jp_pegawai_edit->kehadiran->getPlaceHolder()) ?>" value="<?php echo $m_jp_pegawai_edit->kehadiran->EditValue ?>"<?php echo $m_jp_pegawai_edit->kehadiran->editAttributes() ?>>
</span>
<?php echo $m_jp_pegawai_edit->kehadiran->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_jp_pegawai_edit->jjm->Visible) { // jjm ?>
	<div id="r_jjm" class="form-group row">
		<label id="elh_m_jp_pegawai_jjm" for="x_jjm" class="<?php echo $m_jp_pegawai_edit->LeftColumnClass ?>"><?php echo $m_jp_pegawai_edit->jjm->caption() ?><?php echo $m_jp_pegawai_edit->jjm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_jp_pegawai_edit->RightColumnClass ?>"><div <?php echo $m_jp_pegawai_edit->jjm->cellAttributes() ?>>
<span id="el_m_jp_pegawai_jjm">
<input type="text" data-table="m_jp_pegawai" data-field="x_jjm" name="x_jjm" id="x_jjm" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($m_jp_pegawai_edit->jjm->getPlaceHolder()) ?>" value="<?php echo $m_jp_pegawai_edit->jjm->EditValue ?>"<?php echo $m_jp_pegawai_edit->jjm->editAttributes() ?>>
</span>
<?php echo $m_jp_pegawai_edit->jjm->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="m_jp_pegawai" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($m_jp_pegawai_edit->id->CurrentValue) ?>">
<?php if (!$m_jp_pegawai_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $m_jp_pegawai_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_jp_pegawai_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$m_jp_pegawai_edit->showPageFooter();
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
$m_jp_pegawai_edit->terminate();
?>