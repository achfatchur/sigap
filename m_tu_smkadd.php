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
$m_tu_smk_add = new m_tu_smk_add();

// Run the page
$m_tu_smk_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$m_tu_smk_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fm_tu_smkadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fm_tu_smkadd = currentForm = new ew.Form("fm_tu_smkadd", "add");

	// Validate form
	fm_tu_smkadd.validate = function() {
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
			<?php if ($m_tu_smk_add->datetime->Required) { ?>
				elm = this.getElements("x" + infix + "_datetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_tu_smk_add->datetime->caption(), $m_tu_smk_add->datetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_tu_smk_add->createby->Required) { ?>
				elm = this.getElements("x" + infix + "_createby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_tu_smk_add->createby->caption(), $m_tu_smk_add->createby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($m_tu_smk_add->tahun->Required) { ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_tu_smk_add->tahun->caption(), $m_tu_smk_add->tahun->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tahun");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($m_tu_smk_add->tahun->errorMessage()) ?>");
			<?php if ($m_tu_smk_add->bulan->Required) { ?>
				elm = this.getElements("x" + infix + "_bulan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $m_tu_smk_add->bulan->caption(), $m_tu_smk_add->bulan->RequiredErrorMessage)) ?>");
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
	fm_tu_smkadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fm_tu_smkadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fm_tu_smkadd.lists["x_createby"] = <?php echo $m_tu_smk_add->createby->Lookup->toClientList($m_tu_smk_add) ?>;
	fm_tu_smkadd.lists["x_createby"].options = <?php echo JsonEncode($m_tu_smk_add->createby->lookupOptions()) ?>;
	fm_tu_smkadd.autoSuggests["x_createby"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fm_tu_smkadd.lists["x_bulan"] = <?php echo $m_tu_smk_add->bulan->Lookup->toClientList($m_tu_smk_add) ?>;
	fm_tu_smkadd.lists["x_bulan"].options = <?php echo JsonEncode($m_tu_smk_add->bulan->lookupOptions()) ?>;
	loadjs.done("fm_tu_smkadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$("th[data-name=value_lembur]").css({display:"none"}),$("th[data-name=gapok]").css({display:"none"}),$("th[data-name=total]").css({display:"none"}),$("th[data-name=sub_total]").css({display:"none"}),$("th[data-name=potongan]").css({display:"none"}),$("th[data-name=value_inval]").css({display:"none"}),$("th[data-name=tugastambahan]").css({display:"none"}),$("th[data-name=tunjangan_periode]").css({display:"none"}),$("th[data-name=total_gapok]").css({display:"none"}),$("th[data-name=tj_jabatan]").css({display:"none"}),$("th[data-name=value_piket]").css({display:"none"}),$("th[data-name=value_kehadiran]").css({display:"none"}),$("th[data-name=tahun]").css({display:"none"}),$("th[data-name=bulan]").css({display:"none"});var date=(new Date).getFullYear();$("input#x_tahun").val(date);
});
</script>
<?php $m_tu_smk_add->showPageHeader(); ?>
<?php
$m_tu_smk_add->showMessage();
?>
<form name="fm_tu_smkadd" id="fm_tu_smkadd" class="<?php echo $m_tu_smk_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="m_tu_smk">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$m_tu_smk_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($m_tu_smk_add->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_m_tu_smk_tahun" for="x_tahun" class="<?php echo $m_tu_smk_add->LeftColumnClass ?>"><?php echo $m_tu_smk_add->tahun->caption() ?><?php echo $m_tu_smk_add->tahun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_tu_smk_add->RightColumnClass ?>"><div <?php echo $m_tu_smk_add->tahun->cellAttributes() ?>>
<span id="el_m_tu_smk_tahun">
<input type="text" data-table="m_tu_smk" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($m_tu_smk_add->tahun->getPlaceHolder()) ?>" value="<?php echo $m_tu_smk_add->tahun->EditValue ?>"<?php echo $m_tu_smk_add->tahun->editAttributes() ?>>
</span>
<?php echo $m_tu_smk_add->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($m_tu_smk_add->bulan->Visible) { // bulan ?>
	<div id="r_bulan" class="form-group row">
		<label id="elh_m_tu_smk_bulan" for="x_bulan" class="<?php echo $m_tu_smk_add->LeftColumnClass ?>"><?php echo $m_tu_smk_add->bulan->caption() ?><?php echo $m_tu_smk_add->bulan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $m_tu_smk_add->RightColumnClass ?>"><div <?php echo $m_tu_smk_add->bulan->cellAttributes() ?>>
<span id="el_m_tu_smk_bulan">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="m_tu_smk" data-field="x_bulan" data-value-separator="<?php echo $m_tu_smk_add->bulan->displayValueSeparatorAttribute() ?>" id="x_bulan" name="x_bulan"<?php echo $m_tu_smk_add->bulan->editAttributes() ?>>
			<?php echo $m_tu_smk_add->bulan->selectOptionListHtml("x_bulan") ?>
		</select>
</div>
<?php echo $m_tu_smk_add->bulan->Lookup->getParamTag($m_tu_smk_add, "p_x_bulan") ?>
</span>
<?php echo $m_tu_smk_add->bulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("gaji_tu_smk", explode(",", $m_tu_smk->getCurrentDetailTable())) && $gaji_tu_smk->DetailAdd) {
?>
<?php if ($m_tu_smk->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("gaji_tu_smk", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "gaji_tu_smkgrid.php" ?>
<?php } ?>
<?php if (!$m_tu_smk_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $m_tu_smk_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $m_tu_smk_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$m_tu_smk_add->showPageFooter();
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
$m_tu_smk_add->terminate();
?>