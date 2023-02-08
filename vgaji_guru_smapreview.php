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
$vgaji_guru_sma_preview = new vgaji_guru_sma_preview();

// Run the page
$vgaji_guru_sma_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vgaji_guru_sma_preview->Page_Render();
?>
<?php $vgaji_guru_sma_preview->showPageHeader(); ?>
<?php if ($vgaji_guru_sma_preview->TotalRecords > 0) { ?>
<div class="card ew-grid vgaji_guru_sma"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$vgaji_guru_sma_preview->renderListOptions();

// Render list options (header, left)
$vgaji_guru_sma_preview->ListOptions->render("header", "left");
?>
<?php if ($vgaji_guru_sma_preview->pegawai->Visible) { // pegawai ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->pegawai) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->pegawai->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->pegawai->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->pegawai->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->pegawai->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->pegawai->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->pegawai->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->jenjang_id->Visible) { // jenjang_id ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->jenjang_id) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->jenjang_id->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->jenjang_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->jenjang_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->jenjang_id->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->jenjang_id->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->jenjang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->jenjang_id->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->jabatan_id->Visible) { // jabatan_id ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->jabatan_id) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->jabatan_id->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->jabatan_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->jabatan_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->jabatan_id->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->jabatan_id->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->jabatan_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->jabatan_id->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->lama_kerja->Visible) { // lama_kerja ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->lama_kerja) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->lama_kerja->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->lama_kerja->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->lama_kerja->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->lama_kerja->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->lama_kerja->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->lama_kerja->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->lama_kerja->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->type->Visible) { // type ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->type) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->type->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->type->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->type->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->type->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->type->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->jenis_guru->Visible) { // jenis_guru ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->jenis_guru) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->jenis_guru->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->jenis_guru->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->jenis_guru->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->jenis_guru->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->jenis_guru->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->jenis_guru->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->jenis_guru->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->tambahan->Visible) { // tambahan ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->tambahan) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->tambahan->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->tambahan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->tambahan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->tambahan->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->tambahan->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->tambahan->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->tambahan->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->periode->Visible) { // periode ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->periode) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->periode->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->periode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->periode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->periode->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->periode->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->periode->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->periode->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->tunjangan_periode->Visible) { // tunjangan_periode ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->tunjangan_periode) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->tunjangan_periode->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->tunjangan_periode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->tunjangan_periode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->tunjangan_periode->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->tunjangan_periode->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->tunjangan_periode->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->tunjangan_periode->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->kehadiran->Visible) { // kehadiran ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->kehadiran) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->kehadiran->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->kehadiran->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->kehadiran->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->kehadiran->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->kehadiran->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->kehadiran->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->kehadiran->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->value_kehadiran->Visible) { // value_kehadiran ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->value_kehadiran) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->value_kehadiran->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->value_kehadiran->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->value_kehadiran->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->value_kehadiran->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->value_kehadiran->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->value_kehadiran->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->value_kehadiran->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->lembur->Visible) { // lembur ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->lembur) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->lembur->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->lembur->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->lembur->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->lembur->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->lembur->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->lembur->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->lembur->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->value_lembur->Visible) { // value_lembur ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->value_lembur) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->value_lembur->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->value_lembur->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->value_lembur->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->value_lembur->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->value_lembur->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->value_lembur->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->value_lembur->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->jp->Visible) { // jp ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->jp) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->jp->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->jp->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->jp->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->jp->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->jp->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->jp->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->jp->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->gapok->Visible) { // gapok ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->gapok) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->gapok->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->gapok->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->gapok->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->gapok->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->gapok->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->gapok->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->gapok->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->total_gapok->Visible) { // total_gapok ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->total_gapok) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->total_gapok->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->total_gapok->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->total_gapok->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->total_gapok->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->total_gapok->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->total_gapok->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->total_gapok->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->value_reward->Visible) { // value_reward ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->value_reward) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->value_reward->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->value_reward->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->value_reward->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->value_reward->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->value_reward->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->value_reward->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->value_reward->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->value_inval->Visible) { // value_inval ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->value_inval) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->value_inval->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->value_inval->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->value_inval->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->value_inval->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->value_inval->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->value_inval->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->value_inval->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->piket_count->Visible) { // piket_count ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->piket_count) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->piket_count->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->piket_count->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->piket_count->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->piket_count->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->piket_count->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->piket_count->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->piket_count->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->value_piket->Visible) { // value_piket ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->value_piket) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->value_piket->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->value_piket->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->value_piket->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->value_piket->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->value_piket->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->value_piket->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->value_piket->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->tugastambahan->Visible) { // tugastambahan ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->tugastambahan) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->tugastambahan->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->tugastambahan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->tugastambahan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->tugastambahan->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->tugastambahan->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->tugastambahan->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->tugastambahan->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->tj_jabatan->Visible) { // tj_jabatan ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->tj_jabatan) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->tj_jabatan->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->tj_jabatan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->tj_jabatan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->tj_jabatan->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->tj_jabatan->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->tj_jabatan->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->tj_jabatan->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->sub_total->Visible) { // sub_total ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->sub_total) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->sub_total->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->sub_total->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->sub_total->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->sub_total->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->sub_total->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->sub_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->sub_total->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->potongan->Visible) { // potongan ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->potongan) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->potongan->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->potongan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->potongan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->potongan->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->potongan->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->potongan->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->penyesuaian->Visible) { // penyesuaian ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->penyesuaian) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->penyesuaian->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->penyesuaian->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->penyesuaian->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->penyesuaian->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->penyesuaian->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->penyesuaian->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->penyesuaian->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->total->Visible) { // total ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->total) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->total->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->total->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->total->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->total->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->total->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->total->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->voucher->Visible) { // voucher ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->voucher) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->voucher->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->voucher->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->voucher->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->voucher->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->voucher->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->voucher->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->voucher->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->pid->Visible) { // pid ?>
	<?php if ($vgaji_guru_sma->SortUrl($vgaji_guru_sma_preview->pid) == "") { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->pid->headerCellClass() ?>"><?php echo $vgaji_guru_sma_preview->pid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vgaji_guru_sma_preview->pid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($vgaji_guru_sma_preview->pid->Name) ?>" data-sort-order="<?php echo $vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->pid->Name && $vgaji_guru_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vgaji_guru_sma_preview->pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($vgaji_guru_sma_preview->SortField == $vgaji_guru_sma_preview->pid->Name) { ?><?php if ($vgaji_guru_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vgaji_guru_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vgaji_guru_sma_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$vgaji_guru_sma_preview->RecCount = 0;
$vgaji_guru_sma_preview->RowCount = 0;
while ($vgaji_guru_sma_preview->Recordset && !$vgaji_guru_sma_preview->Recordset->EOF) {

	// Init row class and style
	$vgaji_guru_sma_preview->RecCount++;
	$vgaji_guru_sma_preview->RowCount++;
	$vgaji_guru_sma_preview->CssStyle = "";
	$vgaji_guru_sma_preview->loadListRowValues($vgaji_guru_sma_preview->Recordset);

	// Render row
	$vgaji_guru_sma->RowType = ROWTYPE_PREVIEW; // Preview record
	$vgaji_guru_sma_preview->resetAttributes();
	$vgaji_guru_sma_preview->renderListRow();

	// Render list options
	$vgaji_guru_sma_preview->renderListOptions();
?>
	<tr <?php echo $vgaji_guru_sma->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vgaji_guru_sma_preview->ListOptions->render("body", "left", $vgaji_guru_sma_preview->RowCount);
?>
<?php if ($vgaji_guru_sma_preview->pegawai->Visible) { // pegawai ?>
		<!-- pegawai -->
		<td<?php echo $vgaji_guru_sma_preview->pegawai->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->pegawai->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->pegawai->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->jenjang_id->Visible) { // jenjang_id ?>
		<!-- jenjang_id -->
		<td<?php echo $vgaji_guru_sma_preview->jenjang_id->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->jenjang_id->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->jenjang_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->jabatan_id->Visible) { // jabatan_id ?>
		<!-- jabatan_id -->
		<td<?php echo $vgaji_guru_sma_preview->jabatan_id->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->jabatan_id->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->jabatan_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->lama_kerja->Visible) { // lama_kerja ?>
		<!-- lama_kerja -->
		<td<?php echo $vgaji_guru_sma_preview->lama_kerja->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->lama_kerja->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->lama_kerja->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->type->Visible) { // type ?>
		<!-- type -->
		<td<?php echo $vgaji_guru_sma_preview->type->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->type->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->jenis_guru->Visible) { // jenis_guru ?>
		<!-- jenis_guru -->
		<td<?php echo $vgaji_guru_sma_preview->jenis_guru->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->jenis_guru->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->jenis_guru->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->tambahan->Visible) { // tambahan ?>
		<!-- tambahan -->
		<td<?php echo $vgaji_guru_sma_preview->tambahan->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->tambahan->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->tambahan->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->periode->Visible) { // periode ?>
		<!-- periode -->
		<td<?php echo $vgaji_guru_sma_preview->periode->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->periode->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->periode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->tunjangan_periode->Visible) { // tunjangan_periode ?>
		<!-- tunjangan_periode -->
		<td<?php echo $vgaji_guru_sma_preview->tunjangan_periode->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->tunjangan_periode->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->tunjangan_periode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->kehadiran->Visible) { // kehadiran ?>
		<!-- kehadiran -->
		<td<?php echo $vgaji_guru_sma_preview->kehadiran->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->kehadiran->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->kehadiran->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->value_kehadiran->Visible) { // value_kehadiran ?>
		<!-- value_kehadiran -->
		<td<?php echo $vgaji_guru_sma_preview->value_kehadiran->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->value_kehadiran->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->value_kehadiran->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->lembur->Visible) { // lembur ?>
		<!-- lembur -->
		<td<?php echo $vgaji_guru_sma_preview->lembur->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->lembur->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->lembur->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->value_lembur->Visible) { // value_lembur ?>
		<!-- value_lembur -->
		<td<?php echo $vgaji_guru_sma_preview->value_lembur->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->value_lembur->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->value_lembur->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->jp->Visible) { // jp ?>
		<!-- jp -->
		<td<?php echo $vgaji_guru_sma_preview->jp->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->jp->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->jp->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->gapok->Visible) { // gapok ?>
		<!-- gapok -->
		<td<?php echo $vgaji_guru_sma_preview->gapok->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->gapok->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->gapok->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->total_gapok->Visible) { // total_gapok ?>
		<!-- total_gapok -->
		<td<?php echo $vgaji_guru_sma_preview->total_gapok->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->total_gapok->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->total_gapok->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->value_reward->Visible) { // value_reward ?>
		<!-- value_reward -->
		<td<?php echo $vgaji_guru_sma_preview->value_reward->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->value_reward->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->value_reward->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->value_inval->Visible) { // value_inval ?>
		<!-- value_inval -->
		<td<?php echo $vgaji_guru_sma_preview->value_inval->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->value_inval->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->value_inval->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->piket_count->Visible) { // piket_count ?>
		<!-- piket_count -->
		<td<?php echo $vgaji_guru_sma_preview->piket_count->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->piket_count->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->piket_count->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->value_piket->Visible) { // value_piket ?>
		<!-- value_piket -->
		<td<?php echo $vgaji_guru_sma_preview->value_piket->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->value_piket->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->value_piket->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->tugastambahan->Visible) { // tugastambahan ?>
		<!-- tugastambahan -->
		<td<?php echo $vgaji_guru_sma_preview->tugastambahan->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->tugastambahan->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->tugastambahan->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->tj_jabatan->Visible) { // tj_jabatan ?>
		<!-- tj_jabatan -->
		<td<?php echo $vgaji_guru_sma_preview->tj_jabatan->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->tj_jabatan->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->tj_jabatan->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->sub_total->Visible) { // sub_total ?>
		<!-- sub_total -->
		<td<?php echo $vgaji_guru_sma_preview->sub_total->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->sub_total->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->sub_total->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->potongan->Visible) { // potongan ?>
		<!-- potongan -->
		<td<?php echo $vgaji_guru_sma_preview->potongan->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->potongan->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->potongan->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->penyesuaian->Visible) { // penyesuaian ?>
		<!-- penyesuaian -->
		<td<?php echo $vgaji_guru_sma_preview->penyesuaian->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->penyesuaian->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->penyesuaian->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->total->Visible) { // total ?>
		<!-- total -->
		<td<?php echo $vgaji_guru_sma_preview->total->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->total->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->total->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->voucher->Visible) { // voucher ?>
		<!-- voucher -->
		<td<?php echo $vgaji_guru_sma_preview->voucher->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->voucher->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->voucher->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vgaji_guru_sma_preview->pid->Visible) { // pid ?>
		<!-- pid -->
		<td<?php echo $vgaji_guru_sma_preview->pid->cellAttributes() ?>>
<span<?php echo $vgaji_guru_sma_preview->pid->viewAttributes() ?>><?php echo $vgaji_guru_sma_preview->pid->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$vgaji_guru_sma_preview->ListOptions->render("body", "right", $vgaji_guru_sma_preview->RowCount);
?>
	</tr>
<?php
	$vgaji_guru_sma_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $vgaji_guru_sma_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($vgaji_guru_sma_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($vgaji_guru_sma_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$vgaji_guru_sma_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($vgaji_guru_sma_preview->Recordset)
	$vgaji_guru_sma_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$vgaji_guru_sma_preview->terminate();
?>