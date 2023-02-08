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
$hapus_barangnew_add = new hapus_barangnew_add();

// Run the page
$hapus_barangnew_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hapus_barangnew_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fhapus_barangnewadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fhapus_barangnewadd = currentForm = new ew.Form("fhapus_barangnewadd", "add");

	// Validate form
	fhapus_barangnewadd.validate = function() {
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
			<?php if ($hapus_barangnew_add->kode_barang->Required) { ?>
				elm = this.getElements("x" + infix + "_kode_barang");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hapus_barangnew_add->kode_barang->caption(), $hapus_barangnew_add->kode_barang->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hapus_barangnew_add->nama_barang->Required) { ?>
				elm = this.getElements("x" + infix + "_nama_barang");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hapus_barangnew_add->nama_barang->caption(), $hapus_barangnew_add->nama_barang->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hapus_barangnew_add->keterangan->Required) { ?>
				elm = this.getElements("x" + infix + "_keterangan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hapus_barangnew_add->keterangan->caption(), $hapus_barangnew_add->keterangan->RequiredErrorMessage)) ?>");
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
	fhapus_barangnewadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fhapus_barangnewadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fhapus_barangnewadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $hapus_barangnew_add->showPageHeader(); ?>
<?php
$hapus_barangnew_add->showMessage();
?>
<form name="fhapus_barangnewadd" id="fhapus_barangnewadd" class="<?php echo $hapus_barangnew_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hapus_barangnew">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$hapus_barangnew_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($hapus_barangnew_add->kode_barang->Visible) { // kode_barang ?>
	<div id="r_kode_barang" class="form-group row">
		<label id="elh_hapus_barangnew_kode_barang" for="x_kode_barang" class="<?php echo $hapus_barangnew_add->LeftColumnClass ?>"><?php echo $hapus_barangnew_add->kode_barang->caption() ?><?php echo $hapus_barangnew_add->kode_barang->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hapus_barangnew_add->RightColumnClass ?>"><div <?php echo $hapus_barangnew_add->kode_barang->cellAttributes() ?>>
<span id="el_hapus_barangnew_kode_barang">
<input type="text" data-table="hapus_barangnew" data-field="x_kode_barang" name="x_kode_barang" id="x_kode_barang" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hapus_barangnew_add->kode_barang->getPlaceHolder()) ?>" value="<?php echo $hapus_barangnew_add->kode_barang->EditValue ?>"<?php echo $hapus_barangnew_add->kode_barang->editAttributes() ?>>
</span>
<?php echo $hapus_barangnew_add->kode_barang->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hapus_barangnew_add->nama_barang->Visible) { // nama_barang ?>
	<div id="r_nama_barang" class="form-group row">
		<label id="elh_hapus_barangnew_nama_barang" for="x_nama_barang" class="<?php echo $hapus_barangnew_add->LeftColumnClass ?>"><?php echo $hapus_barangnew_add->nama_barang->caption() ?><?php echo $hapus_barangnew_add->nama_barang->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hapus_barangnew_add->RightColumnClass ?>"><div <?php echo $hapus_barangnew_add->nama_barang->cellAttributes() ?>>
<span id="el_hapus_barangnew_nama_barang">
<input type="text" data-table="hapus_barangnew" data-field="x_nama_barang" name="x_nama_barang" id="x_nama_barang" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hapus_barangnew_add->nama_barang->getPlaceHolder()) ?>" value="<?php echo $hapus_barangnew_add->nama_barang->EditValue ?>"<?php echo $hapus_barangnew_add->nama_barang->editAttributes() ?>>
</span>
<?php echo $hapus_barangnew_add->nama_barang->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hapus_barangnew_add->keterangan->Visible) { // keterangan ?>
	<div id="r_keterangan" class="form-group row">
		<label id="elh_hapus_barangnew_keterangan" for="x_keterangan" class="<?php echo $hapus_barangnew_add->LeftColumnClass ?>"><?php echo $hapus_barangnew_add->keterangan->caption() ?><?php echo $hapus_barangnew_add->keterangan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hapus_barangnew_add->RightColumnClass ?>"><div <?php echo $hapus_barangnew_add->keterangan->cellAttributes() ?>>
<span id="el_hapus_barangnew_keterangan">
<textarea data-table="hapus_barangnew" data-field="x_keterangan" name="x_keterangan" id="x_keterangan" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hapus_barangnew_add->keterangan->getPlaceHolder()) ?>"<?php echo $hapus_barangnew_add->keterangan->editAttributes() ?>><?php echo $hapus_barangnew_add->keterangan->EditValue ?></textarea>
</span>
<?php echo $hapus_barangnew_add->keterangan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hapus_barangnew_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hapus_barangnew_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hapus_barangnew_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hapus_barangnew_add->showPageFooter();
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
$hapus_barangnew_add->terminate();
?>