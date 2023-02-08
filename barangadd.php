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
$barang_add = new barang_add();

// Run the page
$barang_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$barang_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbarangadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fbarangadd = currentForm = new ew.Form("fbarangadd", "add");

	// Validate form
	fbarangadd.validate = function() {
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
			<?php if ($barang_add->Kode_Barang->Required) { ?>
				elm = this.getElements("x" + infix + "_Kode_Barang");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $barang_add->Kode_Barang->caption(), $barang_add->Kode_Barang->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($barang_add->Nama_Barang->Required) { ?>
				elm = this.getElements("x" + infix + "_Nama_Barang");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $barang_add->Nama_Barang->caption(), $barang_add->Nama_Barang->RequiredErrorMessage)) ?>");
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
	fbarangadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbarangadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbarangadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $barang_add->showPageHeader(); ?>
<?php
$barang_add->showMessage();
?>
<form name="fbarangadd" id="fbarangadd" class="<?php echo $barang_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="barang">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$barang_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($barang_add->Kode_Barang->Visible) { // Kode_Barang ?>
	<div id="r_Kode_Barang" class="form-group row">
		<label id="elh_barang_Kode_Barang" for="x_Kode_Barang" class="<?php echo $barang_add->LeftColumnClass ?>"><?php echo $barang_add->Kode_Barang->caption() ?><?php echo $barang_add->Kode_Barang->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $barang_add->RightColumnClass ?>"><div <?php echo $barang_add->Kode_Barang->cellAttributes() ?>>
<span id="el_barang_Kode_Barang">
<input type="text" data-table="barang" data-field="x_Kode_Barang" name="x_Kode_Barang" id="x_Kode_Barang" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($barang_add->Kode_Barang->getPlaceHolder()) ?>" value="<?php echo $barang_add->Kode_Barang->EditValue ?>"<?php echo $barang_add->Kode_Barang->editAttributes() ?>>
</span>
<?php echo $barang_add->Kode_Barang->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($barang_add->Nama_Barang->Visible) { // Nama_Barang ?>
	<div id="r_Nama_Barang" class="form-group row">
		<label id="elh_barang_Nama_Barang" for="x_Nama_Barang" class="<?php echo $barang_add->LeftColumnClass ?>"><?php echo $barang_add->Nama_Barang->caption() ?><?php echo $barang_add->Nama_Barang->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $barang_add->RightColumnClass ?>"><div <?php echo $barang_add->Nama_Barang->cellAttributes() ?>>
<span id="el_barang_Nama_Barang">
<input type="text" data-table="barang" data-field="x_Nama_Barang" name="x_Nama_Barang" id="x_Nama_Barang" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($barang_add->Nama_Barang->getPlaceHolder()) ?>" value="<?php echo $barang_add->Nama_Barang->EditValue ?>"<?php echo $barang_add->Nama_Barang->editAttributes() ?>>
</span>
<?php echo $barang_add->Nama_Barang->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$barang_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $barang_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $barang_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$barang_add->showPageFooter();
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
$barang_add->terminate();
?>