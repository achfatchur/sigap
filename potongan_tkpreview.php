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
WriteHeader(FALSE, "utf-8");

// Create page object
$potongan_tk_preview = new potongan_tk_preview();

// Run the page
$potongan_tk_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$potongan_tk_preview->Page_Render();
?>
<?php $potongan_tk_preview->showPageHeader(); ?>
<?php if ($potongan_tk_preview->TotalRecords > 0) { ?>
<div class="card ew-grid potongan_tk"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$potongan_tk_preview->renderListOptions();

// Render list options (header, left)
$potongan_tk_preview->ListOptions->render("header", "left");
?>
<?php if ($potongan_tk_preview->datetime->Visible) { // datetime ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->datetime) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->datetime->headerCellClass() ?>"><?php echo $potongan_tk_preview->datetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->datetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->datetime->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->datetime->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->datetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->datetime->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->u_by->Visible) { // u_by ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->u_by) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->u_by->headerCellClass() ?>"><?php echo $potongan_tk_preview->u_by->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->u_by->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->u_by->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->u_by->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->u_by->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->u_by->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->tahun->Visible) { // tahun ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->tahun) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->tahun->headerCellClass() ?>"><?php echo $potongan_tk_preview->tahun->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->tahun->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->tahun->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->tahun->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->tahun->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->bulan->Visible) { // bulan ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->bulan) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->bulan->headerCellClass() ?>"><?php echo $potongan_tk_preview->bulan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->bulan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->bulan->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->bulan->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->bulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->bulan->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->nama->Visible) { // nama ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->nama) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->nama->headerCellClass() ?>"><?php echo $potongan_tk_preview->nama->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->nama->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->nama->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->nama->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->nama->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->nama->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->jenjang_id->Visible) { // jenjang_id ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->jenjang_id) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->jenjang_id->headerCellClass() ?>"><?php echo $potongan_tk_preview->jenjang_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->jenjang_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->jenjang_id->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->jenjang_id->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->jenjang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->jenjang_id->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->jabatan_id->Visible) { // jabatan_id ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->jabatan_id) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->jabatan_id->headerCellClass() ?>"><?php echo $potongan_tk_preview->jabatan_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->jabatan_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->jabatan_id->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->jabatan_id->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->jabatan_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->jabatan_id->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->sertif->Visible) { // sertif ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->sertif) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->sertif->headerCellClass() ?>"><?php echo $potongan_tk_preview->sertif->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->sertif->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->sertif->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->sertif->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->sertif->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->sertif->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->terlambat->Visible) { // terlambat ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->terlambat) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->terlambat->headerCellClass() ?>"><?php echo $potongan_tk_preview->terlambat->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->terlambat->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->terlambat->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->terlambat->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->terlambat->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->terlambat->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->value_terlambat->Visible) { // value_terlambat ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->value_terlambat) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->value_terlambat->headerCellClass() ?>"><?php echo $potongan_tk_preview->value_terlambat->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->value_terlambat->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->value_terlambat->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->value_terlambat->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->value_terlambat->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->value_terlambat->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->izin->Visible) { // izin ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->izin) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->izin->headerCellClass() ?>"><?php echo $potongan_tk_preview->izin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->izin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->izin->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->izin->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->izin->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->izin->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->value_izin->Visible) { // value_izin ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->value_izin) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->value_izin->headerCellClass() ?>"><?php echo $potongan_tk_preview->value_izin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->value_izin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->value_izin->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->value_izin->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->value_izin->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->value_izin->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->izinperjam->Visible) { // izinperjam ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->izinperjam) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->izinperjam->headerCellClass() ?>"><?php echo $potongan_tk_preview->izinperjam->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->izinperjam->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->izinperjam->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->izinperjam->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->izinperjam->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->izinperjam->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->izinperjamvalue->Visible) { // izinperjamvalue ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->izinperjamvalue) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->izinperjamvalue->headerCellClass() ?>"><?php echo $potongan_tk_preview->izinperjamvalue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->izinperjamvalue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->izinperjamvalue->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->izinperjamvalue->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->izinperjamvalue->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->izinperjamvalue->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->sakitperjam->Visible) { // sakitperjam ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->sakitperjam) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->sakitperjam->headerCellClass() ?>"><?php echo $potongan_tk_preview->sakitperjam->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->sakitperjam->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->sakitperjam->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->sakitperjam->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->sakitperjam->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->sakitperjam->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->sakitperjamvalue->Visible) { // sakitperjamvalue ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->sakitperjamvalue) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->sakitperjamvalue->headerCellClass() ?>"><?php echo $potongan_tk_preview->sakitperjamvalue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->sakitperjamvalue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->sakitperjamvalue->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->sakitperjamvalue->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->sakitperjamvalue->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->sakitperjamvalue->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->pulcep->Visible) { // pulcep ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->pulcep) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->pulcep->headerCellClass() ?>"><?php echo $potongan_tk_preview->pulcep->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->pulcep->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->pulcep->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->pulcep->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->pulcep->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->pulcep->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->value_pulcep->Visible) { // value_pulcep ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->value_pulcep) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->value_pulcep->headerCellClass() ?>"><?php echo $potongan_tk_preview->value_pulcep->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->value_pulcep->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->value_pulcep->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->value_pulcep->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->value_pulcep->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->value_pulcep->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->tidakhadirjam->Visible) { // tidakhadirjam ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->tidakhadirjam) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->tidakhadirjam->headerCellClass() ?>"><?php echo $potongan_tk_preview->tidakhadirjam->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->tidakhadirjam->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->tidakhadirjam->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->tidakhadirjam->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->tidakhadirjam->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->tidakhadirjam->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->tidakhadirjamvalue->Visible) { // tidakhadirjamvalue ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->tidakhadirjamvalue) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->tidakhadirjamvalue->headerCellClass() ?>"><?php echo $potongan_tk_preview->tidakhadirjamvalue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->tidakhadirjamvalue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->tidakhadirjamvalue->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->tidakhadirjamvalue->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->tidakhadirjamvalue->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->tidakhadirjamvalue->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($potongan_tk_preview->totalpotongan->Visible) { // totalpotongan ?>
	<?php if ($potongan_tk->SortUrl($potongan_tk_preview->totalpotongan) == "") { ?>
		<th class="<?php echo $potongan_tk_preview->totalpotongan->headerCellClass() ?>"><?php echo $potongan_tk_preview->totalpotongan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $potongan_tk_preview->totalpotongan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($potongan_tk_preview->totalpotongan->Name) ?>" data-sort-order="<?php echo $potongan_tk_preview->SortField == $potongan_tk_preview->totalpotongan->Name && $potongan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $potongan_tk_preview->totalpotongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($potongan_tk_preview->SortField == $potongan_tk_preview->totalpotongan->Name) { ?><?php if ($potongan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($potongan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$potongan_tk_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$potongan_tk_preview->RecCount = 0;
$potongan_tk_preview->RowCount = 0;
while ($potongan_tk_preview->Recordset && !$potongan_tk_preview->Recordset->EOF) {

	// Init row class and style
	$potongan_tk_preview->RecCount++;
	$potongan_tk_preview->RowCount++;
	$potongan_tk_preview->CssStyle = "";
	$potongan_tk_preview->loadListRowValues($potongan_tk_preview->Recordset);

	// Render row
	$potongan_tk->RowType = ROWTYPE_PREVIEW; // Preview record
	$potongan_tk_preview->resetAttributes();
	$potongan_tk_preview->renderListRow();

	// Render list options
	$potongan_tk_preview->renderListOptions();
?>
	<tr <?php echo $potongan_tk->rowAttributes() ?>>
<?php

// Render list options (body, left)
$potongan_tk_preview->ListOptions->render("body", "left", $potongan_tk_preview->RowCount);
?>
<?php if ($potongan_tk_preview->datetime->Visible) { // datetime ?>
		<!-- datetime -->
		<td<?php echo $potongan_tk_preview->datetime->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->datetime->viewAttributes() ?>><?php echo $potongan_tk_preview->datetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->u_by->Visible) { // u_by ?>
		<!-- u_by -->
		<td<?php echo $potongan_tk_preview->u_by->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->u_by->viewAttributes() ?>><?php echo $potongan_tk_preview->u_by->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->tahun->Visible) { // tahun ?>
		<!-- tahun -->
		<td<?php echo $potongan_tk_preview->tahun->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->tahun->viewAttributes() ?>><?php echo $potongan_tk_preview->tahun->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->bulan->Visible) { // bulan ?>
		<!-- bulan -->
		<td<?php echo $potongan_tk_preview->bulan->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->bulan->viewAttributes() ?>><?php echo $potongan_tk_preview->bulan->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->nama->Visible) { // nama ?>
		<!-- nama -->
		<td<?php echo $potongan_tk_preview->nama->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->nama->viewAttributes() ?>><?php echo $potongan_tk_preview->nama->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->jenjang_id->Visible) { // jenjang_id ?>
		<!-- jenjang_id -->
		<td<?php echo $potongan_tk_preview->jenjang_id->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->jenjang_id->viewAttributes() ?>><?php echo $potongan_tk_preview->jenjang_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->jabatan_id->Visible) { // jabatan_id ?>
		<!-- jabatan_id -->
		<td<?php echo $potongan_tk_preview->jabatan_id->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->jabatan_id->viewAttributes() ?>><?php echo $potongan_tk_preview->jabatan_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->sertif->Visible) { // sertif ?>
		<!-- sertif -->
		<td<?php echo $potongan_tk_preview->sertif->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->sertif->viewAttributes() ?>><?php echo $potongan_tk_preview->sertif->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->terlambat->Visible) { // terlambat ?>
		<!-- terlambat -->
		<td<?php echo $potongan_tk_preview->terlambat->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->terlambat->viewAttributes() ?>><?php echo $potongan_tk_preview->terlambat->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->value_terlambat->Visible) { // value_terlambat ?>
		<!-- value_terlambat -->
		<td<?php echo $potongan_tk_preview->value_terlambat->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->value_terlambat->viewAttributes() ?>><?php echo $potongan_tk_preview->value_terlambat->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->izin->Visible) { // izin ?>
		<!-- izin -->
		<td<?php echo $potongan_tk_preview->izin->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->izin->viewAttributes() ?>><?php echo $potongan_tk_preview->izin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->value_izin->Visible) { // value_izin ?>
		<!-- value_izin -->
		<td<?php echo $potongan_tk_preview->value_izin->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->value_izin->viewAttributes() ?>><?php echo $potongan_tk_preview->value_izin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->izinperjam->Visible) { // izinperjam ?>
		<!-- izinperjam -->
		<td<?php echo $potongan_tk_preview->izinperjam->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->izinperjam->viewAttributes() ?>><?php echo $potongan_tk_preview->izinperjam->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->izinperjamvalue->Visible) { // izinperjamvalue ?>
		<!-- izinperjamvalue -->
		<td<?php echo $potongan_tk_preview->izinperjamvalue->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->izinperjamvalue->viewAttributes() ?>><?php echo $potongan_tk_preview->izinperjamvalue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->sakitperjam->Visible) { // sakitperjam ?>
		<!-- sakitperjam -->
		<td<?php echo $potongan_tk_preview->sakitperjam->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->sakitperjam->viewAttributes() ?>><?php echo $potongan_tk_preview->sakitperjam->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->sakitperjamvalue->Visible) { // sakitperjamvalue ?>
		<!-- sakitperjamvalue -->
		<td<?php echo $potongan_tk_preview->sakitperjamvalue->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->sakitperjamvalue->viewAttributes() ?>><?php echo $potongan_tk_preview->sakitperjamvalue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->pulcep->Visible) { // pulcep ?>
		<!-- pulcep -->
		<td<?php echo $potongan_tk_preview->pulcep->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->pulcep->viewAttributes() ?>><?php echo $potongan_tk_preview->pulcep->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->value_pulcep->Visible) { // value_pulcep ?>
		<!-- value_pulcep -->
		<td<?php echo $potongan_tk_preview->value_pulcep->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->value_pulcep->viewAttributes() ?>><?php echo $potongan_tk_preview->value_pulcep->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->tidakhadirjam->Visible) { // tidakhadirjam ?>
		<!-- tidakhadirjam -->
		<td<?php echo $potongan_tk_preview->tidakhadirjam->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->tidakhadirjam->viewAttributes() ?>><?php echo $potongan_tk_preview->tidakhadirjam->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->tidakhadirjamvalue->Visible) { // tidakhadirjamvalue ?>
		<!-- tidakhadirjamvalue -->
		<td<?php echo $potongan_tk_preview->tidakhadirjamvalue->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->tidakhadirjamvalue->viewAttributes() ?>><?php echo $potongan_tk_preview->tidakhadirjamvalue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($potongan_tk_preview->totalpotongan->Visible) { // totalpotongan ?>
		<!-- totalpotongan -->
		<td<?php echo $potongan_tk_preview->totalpotongan->cellAttributes() ?>>
<span<?php echo $potongan_tk_preview->totalpotongan->viewAttributes() ?>><?php echo $potongan_tk_preview->totalpotongan->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$potongan_tk_preview->ListOptions->render("body", "right", $potongan_tk_preview->RowCount);
?>
	</tr>
<?php
	$potongan_tk_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $potongan_tk_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($potongan_tk_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($potongan_tk_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$potongan_tk_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($potongan_tk_preview->Recordset)
	$potongan_tk_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$potongan_tk_preview->terminate();
?>