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
$penyesuaian_preview = new penyesuaian_preview();

// Run the page
$penyesuaian_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$penyesuaian_preview->Page_Render();
?>
<?php $penyesuaian_preview->showPageHeader(); ?>
<?php if ($penyesuaian_preview->TotalRecords > 0) { ?>
<div class="card ew-grid penyesuaian"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$penyesuaian_preview->renderListOptions();

// Render list options (header, left)
$penyesuaian_preview->ListOptions->render("header", "left");
?>
<?php if ($penyesuaian_preview->nip->Visible) { // nip ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->nip) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->nip->headerCellClass() ?>"><?php echo $penyesuaian_preview->nip->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->nip->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->nip->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->nip->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->nip->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->nip->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_preview->jenjang_id->Visible) { // jenjang_id ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->jenjang_id) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->jenjang_id->headerCellClass() ?>"><?php echo $penyesuaian_preview->jenjang_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->jenjang_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->jenjang_id->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->jenjang_id->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->jenjang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->jenjang_id->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_preview->absen->Visible) { // absen ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->absen) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->absen->headerCellClass() ?>"><?php echo $penyesuaian_preview->absen->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->absen->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->absen->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->absen->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->absen->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->absen->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_preview->absen_jam->Visible) { // absen_jam ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->absen_jam) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->absen_jam->headerCellClass() ?>"><?php echo $penyesuaian_preview->absen_jam->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->absen_jam->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->absen_jam->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->absen_jam->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->absen_jam->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->absen_jam->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_preview->izin->Visible) { // izin ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->izin) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->izin->headerCellClass() ?>"><?php echo $penyesuaian_preview->izin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->izin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->izin->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->izin->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->izin->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->izin->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_preview->izin_jam->Visible) { // izin_jam ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->izin_jam) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->izin_jam->headerCellClass() ?>"><?php echo $penyesuaian_preview->izin_jam->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->izin_jam->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->izin_jam->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->izin_jam->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->izin_jam->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->izin_jam->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_preview->sakit->Visible) { // sakit ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->sakit) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->sakit->headerCellClass() ?>"><?php echo $penyesuaian_preview->sakit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->sakit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->sakit->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->sakit->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->sakit->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->sakit->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_preview->sakit_jam->Visible) { // sakit_jam ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->sakit_jam) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->sakit_jam->headerCellClass() ?>"><?php echo $penyesuaian_preview->sakit_jam->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->sakit_jam->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->sakit_jam->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->sakit_jam->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->sakit_jam->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->sakit_jam->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_preview->terlambat->Visible) { // terlambat ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->terlambat) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->terlambat->headerCellClass() ?>"><?php echo $penyesuaian_preview->terlambat->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->terlambat->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->terlambat->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->terlambat->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->terlambat->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->terlambat->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_preview->pulang_cepat->Visible) { // pulang_cepat ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->pulang_cepat) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->pulang_cepat->headerCellClass() ?>"><?php echo $penyesuaian_preview->pulang_cepat->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->pulang_cepat->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->pulang_cepat->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->pulang_cepat->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->pulang_cepat->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->pulang_cepat->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_preview->piket->Visible) { // piket ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->piket) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->piket->headerCellClass() ?>"><?php echo $penyesuaian_preview->piket->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->piket->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->piket->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->piket->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->piket->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->piket->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_preview->inval->Visible) { // inval ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->inval) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->inval->headerCellClass() ?>"><?php echo $penyesuaian_preview->inval->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->inval->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->inval->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->inval->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->inval->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->inval->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_preview->lembur->Visible) { // lembur ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->lembur) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->lembur->headerCellClass() ?>"><?php echo $penyesuaian_preview->lembur->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->lembur->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->lembur->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->lembur->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->lembur->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->lembur->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_preview->voucher->Visible) { // voucher ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->voucher) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->voucher->headerCellClass() ?>"><?php echo $penyesuaian_preview->voucher->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->voucher->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->voucher->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->voucher->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->voucher->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->voucher->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_preview->total->Visible) { // total ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->total) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->total->headerCellClass() ?>"><?php echo $penyesuaian_preview->total->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->total->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->total->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->total->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->total->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($penyesuaian_preview->total2->Visible) { // total2 ?>
	<?php if ($penyesuaian->SortUrl($penyesuaian_preview->total2) == "") { ?>
		<th class="<?php echo $penyesuaian_preview->total2->headerCellClass() ?>"><?php echo $penyesuaian_preview->total2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $penyesuaian_preview->total2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($penyesuaian_preview->total2->Name) ?>" data-sort-order="<?php echo $penyesuaian_preview->SortField == $penyesuaian_preview->total2->Name && $penyesuaian_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $penyesuaian_preview->total2->caption() ?></span><span class="ew-table-header-sort"><?php if ($penyesuaian_preview->SortField == $penyesuaian_preview->total2->Name) { ?><?php if ($penyesuaian_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($penyesuaian_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$penyesuaian_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$penyesuaian_preview->RecCount = 0;
$penyesuaian_preview->RowCount = 0;
while ($penyesuaian_preview->Recordset && !$penyesuaian_preview->Recordset->EOF) {

	// Init row class and style
	$penyesuaian_preview->RecCount++;
	$penyesuaian_preview->RowCount++;
	$penyesuaian_preview->CssStyle = "";
	$penyesuaian_preview->loadListRowValues($penyesuaian_preview->Recordset);

	// Render row
	$penyesuaian->RowType = ROWTYPE_PREVIEW; // Preview record
	$penyesuaian_preview->resetAttributes();
	$penyesuaian_preview->renderListRow();

	// Render list options
	$penyesuaian_preview->renderListOptions();
?>
	<tr <?php echo $penyesuaian->rowAttributes() ?>>
<?php

// Render list options (body, left)
$penyesuaian_preview->ListOptions->render("body", "left", $penyesuaian_preview->RowCount);
?>
<?php if ($penyesuaian_preview->nip->Visible) { // nip ?>
		<!-- nip -->
		<td<?php echo $penyesuaian_preview->nip->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->nip->viewAttributes() ?>><?php echo $penyesuaian_preview->nip->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($penyesuaian_preview->jenjang_id->Visible) { // jenjang_id ?>
		<!-- jenjang_id -->
		<td<?php echo $penyesuaian_preview->jenjang_id->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->jenjang_id->viewAttributes() ?>><?php echo $penyesuaian_preview->jenjang_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($penyesuaian_preview->absen->Visible) { // absen ?>
		<!-- absen -->
		<td<?php echo $penyesuaian_preview->absen->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->absen->viewAttributes() ?>><?php echo $penyesuaian_preview->absen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($penyesuaian_preview->absen_jam->Visible) { // absen_jam ?>
		<!-- absen_jam -->
		<td<?php echo $penyesuaian_preview->absen_jam->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->absen_jam->viewAttributes() ?>><?php echo $penyesuaian_preview->absen_jam->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($penyesuaian_preview->izin->Visible) { // izin ?>
		<!-- izin -->
		<td<?php echo $penyesuaian_preview->izin->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->izin->viewAttributes() ?>><?php echo $penyesuaian_preview->izin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($penyesuaian_preview->izin_jam->Visible) { // izin_jam ?>
		<!-- izin_jam -->
		<td<?php echo $penyesuaian_preview->izin_jam->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->izin_jam->viewAttributes() ?>><?php echo $penyesuaian_preview->izin_jam->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($penyesuaian_preview->sakit->Visible) { // sakit ?>
		<!-- sakit -->
		<td<?php echo $penyesuaian_preview->sakit->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->sakit->viewAttributes() ?>><?php echo $penyesuaian_preview->sakit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($penyesuaian_preview->sakit_jam->Visible) { // sakit_jam ?>
		<!-- sakit_jam -->
		<td<?php echo $penyesuaian_preview->sakit_jam->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->sakit_jam->viewAttributes() ?>><?php echo $penyesuaian_preview->sakit_jam->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($penyesuaian_preview->terlambat->Visible) { // terlambat ?>
		<!-- terlambat -->
		<td<?php echo $penyesuaian_preview->terlambat->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->terlambat->viewAttributes() ?>><?php echo $penyesuaian_preview->terlambat->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($penyesuaian_preview->pulang_cepat->Visible) { // pulang_cepat ?>
		<!-- pulang_cepat -->
		<td<?php echo $penyesuaian_preview->pulang_cepat->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->pulang_cepat->viewAttributes() ?>><?php echo $penyesuaian_preview->pulang_cepat->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($penyesuaian_preview->piket->Visible) { // piket ?>
		<!-- piket -->
		<td<?php echo $penyesuaian_preview->piket->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->piket->viewAttributes() ?>><?php echo $penyesuaian_preview->piket->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($penyesuaian_preview->inval->Visible) { // inval ?>
		<!-- inval -->
		<td<?php echo $penyesuaian_preview->inval->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->inval->viewAttributes() ?>><?php echo $penyesuaian_preview->inval->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($penyesuaian_preview->lembur->Visible) { // lembur ?>
		<!-- lembur -->
		<td<?php echo $penyesuaian_preview->lembur->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->lembur->viewAttributes() ?>><?php echo $penyesuaian_preview->lembur->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($penyesuaian_preview->voucher->Visible) { // voucher ?>
		<!-- voucher -->
		<td<?php echo $penyesuaian_preview->voucher->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->voucher->viewAttributes() ?>><?php echo $penyesuaian_preview->voucher->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($penyesuaian_preview->total->Visible) { // total ?>
		<!-- total -->
		<td<?php echo $penyesuaian_preview->total->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->total->viewAttributes() ?>><?php echo $penyesuaian_preview->total->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($penyesuaian_preview->total2->Visible) { // total2 ?>
		<!-- total2 -->
		<td<?php echo $penyesuaian_preview->total2->cellAttributes() ?>>
<span<?php echo $penyesuaian_preview->total2->viewAttributes() ?>><?php echo $penyesuaian_preview->total2->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$penyesuaian_preview->ListOptions->render("body", "right", $penyesuaian_preview->RowCount);
?>
	</tr>
<?php
	$penyesuaian_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $penyesuaian_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($penyesuaian_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($penyesuaian_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$penyesuaian_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($penyesuaian_preview->Recordset)
	$penyesuaian_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$penyesuaian_preview->terminate();
?>