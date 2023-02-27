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
$gaji_karyawan_tk_preview = new gaji_karyawan_tk_preview();

// Run the page
$gaji_karyawan_tk_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_karyawan_tk_preview->Page_Render();
?>
<?php $gaji_karyawan_tk_preview->showPageHeader(); ?>
<?php if ($gaji_karyawan_tk_preview->TotalRecords > 0) { ?>
<div class="card ew-grid gaji_karyawan_tk"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$gaji_karyawan_tk_preview->renderListOptions();

// Render list options (header, left)
$gaji_karyawan_tk_preview->ListOptions->render("header", "left");
?>
<?php if ($gaji_karyawan_tk_preview->pegawai->Visible) { // pegawai ?>
	<?php if ($gaji_karyawan_tk->SortUrl($gaji_karyawan_tk_preview->pegawai) == "") { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->pegawai->headerCellClass() ?>"><?php echo $gaji_karyawan_tk_preview->pegawai->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->pegawai->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_karyawan_tk_preview->pegawai->Name) ?>" data-sort-order="<?php echo $gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->pegawai->Name && $gaji_karyawan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_karyawan_tk_preview->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->pegawai->Name) { ?><?php if ($gaji_karyawan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_karyawan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->sub_total->Visible) { // sub_total ?>
	<?php if ($gaji_karyawan_tk->SortUrl($gaji_karyawan_tk_preview->sub_total) == "") { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->sub_total->headerCellClass() ?>"><?php echo $gaji_karyawan_tk_preview->sub_total->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->sub_total->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_karyawan_tk_preview->sub_total->Name) ?>" data-sort-order="<?php echo $gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->sub_total->Name && $gaji_karyawan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_karyawan_tk_preview->sub_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->sub_total->Name) { ?><?php if ($gaji_karyawan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_karyawan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->potongan->Visible) { // potongan ?>
	<?php if ($gaji_karyawan_tk->SortUrl($gaji_karyawan_tk_preview->potongan) == "") { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->potongan->headerCellClass() ?>"><?php echo $gaji_karyawan_tk_preview->potongan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->potongan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_karyawan_tk_preview->potongan->Name) ?>" data-sort-order="<?php echo $gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->potongan->Name && $gaji_karyawan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_karyawan_tk_preview->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->potongan->Name) { ?><?php if ($gaji_karyawan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_karyawan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->penyesuaian->Visible) { // penyesuaian ?>
	<?php if ($gaji_karyawan_tk->SortUrl($gaji_karyawan_tk_preview->penyesuaian) == "") { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->penyesuaian->headerCellClass() ?>"><?php echo $gaji_karyawan_tk_preview->penyesuaian->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->penyesuaian->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_karyawan_tk_preview->penyesuaian->Name) ?>" data-sort-order="<?php echo $gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->penyesuaian->Name && $gaji_karyawan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_karyawan_tk_preview->penyesuaian->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->penyesuaian->Name) { ?><?php if ($gaji_karyawan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_karyawan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->potongan_bendahara->Visible) { // potongan_bendahara ?>
	<?php if ($gaji_karyawan_tk->SortUrl($gaji_karyawan_tk_preview->potongan_bendahara) == "") { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->potongan_bendahara->headerCellClass() ?>"><?php echo $gaji_karyawan_tk_preview->potongan_bendahara->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->potongan_bendahara->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_karyawan_tk_preview->potongan_bendahara->Name) ?>" data-sort-order="<?php echo $gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->potongan_bendahara->Name && $gaji_karyawan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_karyawan_tk_preview->potongan_bendahara->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->potongan_bendahara->Name) { ?><?php if ($gaji_karyawan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_karyawan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->total->Visible) { // total ?>
	<?php if ($gaji_karyawan_tk->SortUrl($gaji_karyawan_tk_preview->total) == "") { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->total->headerCellClass() ?>"><?php echo $gaji_karyawan_tk_preview->total->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->total->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_karyawan_tk_preview->total->Name) ?>" data-sort-order="<?php echo $gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->total->Name && $gaji_karyawan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_karyawan_tk_preview->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->total->Name) { ?><?php if ($gaji_karyawan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_karyawan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->voucher->Visible) { // voucher ?>
	<?php if ($gaji_karyawan_tk->SortUrl($gaji_karyawan_tk_preview->voucher) == "") { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->voucher->headerCellClass() ?>"><?php echo $gaji_karyawan_tk_preview->voucher->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->voucher->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_karyawan_tk_preview->voucher->Name) ?>" data-sort-order="<?php echo $gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->voucher->Name && $gaji_karyawan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_karyawan_tk_preview->voucher->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->voucher->Name) { ?><?php if ($gaji_karyawan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_karyawan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->jaminan_pensiun->Visible) { // jaminan_pensiun ?>
	<?php if ($gaji_karyawan_tk->SortUrl($gaji_karyawan_tk_preview->jaminan_pensiun) == "") { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->jaminan_pensiun->headerCellClass() ?>"><?php echo $gaji_karyawan_tk_preview->jaminan_pensiun->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->jaminan_pensiun->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_karyawan_tk_preview->jaminan_pensiun->Name) ?>" data-sort-order="<?php echo $gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->jaminan_pensiun->Name && $gaji_karyawan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_karyawan_tk_preview->jaminan_pensiun->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->jaminan_pensiun->Name) { ?><?php if ($gaji_karyawan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_karyawan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->jaminan_hari_tua->Visible) { // jaminan_hari_tua ?>
	<?php if ($gaji_karyawan_tk->SortUrl($gaji_karyawan_tk_preview->jaminan_hari_tua) == "") { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->jaminan_hari_tua->headerCellClass() ?>"><?php echo $gaji_karyawan_tk_preview->jaminan_hari_tua->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->jaminan_hari_tua->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_karyawan_tk_preview->jaminan_hari_tua->Name) ?>" data-sort-order="<?php echo $gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->jaminan_hari_tua->Name && $gaji_karyawan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_karyawan_tk_preview->jaminan_hari_tua->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->jaminan_hari_tua->Name) { ?><?php if ($gaji_karyawan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_karyawan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->total_pph21->Visible) { // total_pph21 ?>
	<?php if ($gaji_karyawan_tk->SortUrl($gaji_karyawan_tk_preview->total_pph21) == "") { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->total_pph21->headerCellClass() ?>"><?php echo $gaji_karyawan_tk_preview->total_pph21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->total_pph21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_karyawan_tk_preview->total_pph21->Name) ?>" data-sort-order="<?php echo $gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->total_pph21->Name && $gaji_karyawan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_karyawan_tk_preview->total_pph21->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->total_pph21->Name) { ?><?php if ($gaji_karyawan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_karyawan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->bpjs_kesehatan->Visible) { // bpjs_kesehatan ?>
	<?php if ($gaji_karyawan_tk->SortUrl($gaji_karyawan_tk_preview->bpjs_kesehatan) == "") { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->bpjs_kesehatan->headerCellClass() ?>"><?php echo $gaji_karyawan_tk_preview->bpjs_kesehatan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->bpjs_kesehatan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_karyawan_tk_preview->bpjs_kesehatan->Name) ?>" data-sort-order="<?php echo $gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->bpjs_kesehatan->Name && $gaji_karyawan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_karyawan_tk_preview->bpjs_kesehatan->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->bpjs_kesehatan->Name) { ?><?php if ($gaji_karyawan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_karyawan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->status_npwp->Visible) { // status_npwp ?>
	<?php if ($gaji_karyawan_tk->SortUrl($gaji_karyawan_tk_preview->status_npwp) == "") { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->status_npwp->headerCellClass() ?>"><?php echo $gaji_karyawan_tk_preview->status_npwp->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_karyawan_tk_preview->status_npwp->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_karyawan_tk_preview->status_npwp->Name) ?>" data-sort-order="<?php echo $gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->status_npwp->Name && $gaji_karyawan_tk_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_karyawan_tk_preview->status_npwp->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_karyawan_tk_preview->SortField == $gaji_karyawan_tk_preview->status_npwp->Name) { ?><?php if ($gaji_karyawan_tk_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_karyawan_tk_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$gaji_karyawan_tk_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$gaji_karyawan_tk_preview->RecCount = 0;
$gaji_karyawan_tk_preview->RowCount = 0;
while ($gaji_karyawan_tk_preview->Recordset && !$gaji_karyawan_tk_preview->Recordset->EOF) {

	// Init row class and style
	$gaji_karyawan_tk_preview->RecCount++;
	$gaji_karyawan_tk_preview->RowCount++;
	$gaji_karyawan_tk_preview->CssStyle = "";
	$gaji_karyawan_tk_preview->loadListRowValues($gaji_karyawan_tk_preview->Recordset);

	// Render row
	$gaji_karyawan_tk->RowType = ROWTYPE_PREVIEW; // Preview record
	$gaji_karyawan_tk_preview->resetAttributes();
	$gaji_karyawan_tk_preview->renderListRow();

	// Render list options
	$gaji_karyawan_tk_preview->renderListOptions();
?>
	<tr <?php echo $gaji_karyawan_tk->rowAttributes() ?>>
<?php

// Render list options (body, left)
$gaji_karyawan_tk_preview->ListOptions->render("body", "left", $gaji_karyawan_tk_preview->RowCount);
?>
<?php if ($gaji_karyawan_tk_preview->pegawai->Visible) { // pegawai ?>
		<!-- pegawai -->
		<td<?php echo $gaji_karyawan_tk_preview->pegawai->cellAttributes() ?>>
<span<?php echo $gaji_karyawan_tk_preview->pegawai->viewAttributes() ?>><?php echo $gaji_karyawan_tk_preview->pegawai->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->sub_total->Visible) { // sub_total ?>
		<!-- sub_total -->
		<td<?php echo $gaji_karyawan_tk_preview->sub_total->cellAttributes() ?>>
<span<?php echo $gaji_karyawan_tk_preview->sub_total->viewAttributes() ?>><?php echo $gaji_karyawan_tk_preview->sub_total->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->potongan->Visible) { // potongan ?>
		<!-- potongan -->
		<td<?php echo $gaji_karyawan_tk_preview->potongan->cellAttributes() ?>>
<span<?php echo $gaji_karyawan_tk_preview->potongan->viewAttributes() ?>><?php echo $gaji_karyawan_tk_preview->potongan->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->penyesuaian->Visible) { // penyesuaian ?>
		<!-- penyesuaian -->
		<td<?php echo $gaji_karyawan_tk_preview->penyesuaian->cellAttributes() ?>>
<span<?php echo $gaji_karyawan_tk_preview->penyesuaian->viewAttributes() ?>><?php echo $gaji_karyawan_tk_preview->penyesuaian->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->potongan_bendahara->Visible) { // potongan_bendahara ?>
		<!-- potongan_bendahara -->
		<td<?php echo $gaji_karyawan_tk_preview->potongan_bendahara->cellAttributes() ?>>
<span<?php echo $gaji_karyawan_tk_preview->potongan_bendahara->viewAttributes() ?>><?php echo $gaji_karyawan_tk_preview->potongan_bendahara->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->total->Visible) { // total ?>
		<!-- total -->
		<td<?php echo $gaji_karyawan_tk_preview->total->cellAttributes() ?>>
<span<?php echo $gaji_karyawan_tk_preview->total->viewAttributes() ?>><?php echo $gaji_karyawan_tk_preview->total->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->voucher->Visible) { // voucher ?>
		<!-- voucher -->
		<td<?php echo $gaji_karyawan_tk_preview->voucher->cellAttributes() ?>>
<span<?php echo $gaji_karyawan_tk_preview->voucher->viewAttributes() ?>><?php echo $gaji_karyawan_tk_preview->voucher->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->jaminan_pensiun->Visible) { // jaminan_pensiun ?>
		<!-- jaminan_pensiun -->
		<td<?php echo $gaji_karyawan_tk_preview->jaminan_pensiun->cellAttributes() ?>>
<span<?php echo $gaji_karyawan_tk_preview->jaminan_pensiun->viewAttributes() ?>><?php echo $gaji_karyawan_tk_preview->jaminan_pensiun->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->jaminan_hari_tua->Visible) { // jaminan_hari_tua ?>
		<!-- jaminan_hari_tua -->
		<td<?php echo $gaji_karyawan_tk_preview->jaminan_hari_tua->cellAttributes() ?>>
<span<?php echo $gaji_karyawan_tk_preview->jaminan_hari_tua->viewAttributes() ?>><?php echo $gaji_karyawan_tk_preview->jaminan_hari_tua->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->total_pph21->Visible) { // total_pph21 ?>
		<!-- total_pph21 -->
		<td<?php echo $gaji_karyawan_tk_preview->total_pph21->cellAttributes() ?>>
<span<?php echo $gaji_karyawan_tk_preview->total_pph21->viewAttributes() ?>><?php echo $gaji_karyawan_tk_preview->total_pph21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->bpjs_kesehatan->Visible) { // bpjs_kesehatan ?>
		<!-- bpjs_kesehatan -->
		<td<?php echo $gaji_karyawan_tk_preview->bpjs_kesehatan->cellAttributes() ?>>
<span<?php echo $gaji_karyawan_tk_preview->bpjs_kesehatan->viewAttributes() ?>><?php echo $gaji_karyawan_tk_preview->bpjs_kesehatan->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_karyawan_tk_preview->status_npwp->Visible) { // status_npwp ?>
		<!-- status_npwp -->
		<td<?php echo $gaji_karyawan_tk_preview->status_npwp->cellAttributes() ?>>
<span<?php echo $gaji_karyawan_tk_preview->status_npwp->viewAttributes() ?>><?php echo $gaji_karyawan_tk_preview->status_npwp->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$gaji_karyawan_tk_preview->ListOptions->render("body", "right", $gaji_karyawan_tk_preview->RowCount);
?>
	</tr>
<?php
	$gaji_karyawan_tk_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $gaji_karyawan_tk_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($gaji_karyawan_tk_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($gaji_karyawan_tk_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$gaji_karyawan_tk_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($gaji_karyawan_tk_preview->Recordset)
	$gaji_karyawan_tk_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$gaji_karyawan_tk_preview->terminate();
?>