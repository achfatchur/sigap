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
$absen_detil_preview = new absen_detil_preview();

// Run the page
$absen_detil_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$absen_detil_preview->Page_Render();
?>
<?php $absen_detil_preview->showPageHeader(); ?>
<?php if ($absen_detil_preview->TotalRecords > 0) { ?>
<div class="card ew-grid absen_detil"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$absen_detil_preview->renderListOptions();

// Render list options (header, left)
$absen_detil_preview->ListOptions->render("header", "left");
?>
<?php if ($absen_detil_preview->id->Visible) { // id ?>
	<?php if ($absen_detil->SortUrl($absen_detil_preview->id) == "") { ?>
		<th class="<?php echo $absen_detil_preview->id->headerCellClass() ?>"><?php echo $absen_detil_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $absen_detil_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($absen_detil_preview->id->Name) ?>" data-sort-order="<?php echo $absen_detil_preview->SortField == $absen_detil_preview->id->Name && $absen_detil_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_preview->SortField == $absen_detil_preview->id->Name) { ?><?php if ($absen_detil_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_preview->pid->Visible) { // pid ?>
	<?php if ($absen_detil->SortUrl($absen_detil_preview->pid) == "") { ?>
		<th class="<?php echo $absen_detil_preview->pid->headerCellClass() ?>"><?php echo $absen_detil_preview->pid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $absen_detil_preview->pid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($absen_detil_preview->pid->Name) ?>" data-sort-order="<?php echo $absen_detil_preview->SortField == $absen_detil_preview->pid->Name && $absen_detil_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_preview->pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_preview->SortField == $absen_detil_preview->pid->Name) { ?><?php if ($absen_detil_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_preview->pegawai->Visible) { // pegawai ?>
	<?php if ($absen_detil->SortUrl($absen_detil_preview->pegawai) == "") { ?>
		<th class="<?php echo $absen_detil_preview->pegawai->headerCellClass() ?>"><?php echo $absen_detil_preview->pegawai->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $absen_detil_preview->pegawai->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($absen_detil_preview->pegawai->Name) ?>" data-sort-order="<?php echo $absen_detil_preview->SortField == $absen_detil_preview->pegawai->Name && $absen_detil_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_preview->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_preview->SortField == $absen_detil_preview->pegawai->Name) { ?><?php if ($absen_detil_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_preview->jenjang->Visible) { // jenjang ?>
	<?php if ($absen_detil->SortUrl($absen_detil_preview->jenjang) == "") { ?>
		<th class="<?php echo $absen_detil_preview->jenjang->headerCellClass() ?>"><?php echo $absen_detil_preview->jenjang->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $absen_detil_preview->jenjang->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($absen_detil_preview->jenjang->Name) ?>" data-sort-order="<?php echo $absen_detil_preview->SortField == $absen_detil_preview->jenjang->Name && $absen_detil_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_preview->jenjang->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_preview->SortField == $absen_detil_preview->jenjang->Name) { ?><?php if ($absen_detil_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_preview->masuk->Visible) { // masuk ?>
	<?php if ($absen_detil->SortUrl($absen_detil_preview->masuk) == "") { ?>
		<th class="<?php echo $absen_detil_preview->masuk->headerCellClass() ?>"><?php echo $absen_detil_preview->masuk->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $absen_detil_preview->masuk->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($absen_detil_preview->masuk->Name) ?>" data-sort-order="<?php echo $absen_detil_preview->SortField == $absen_detil_preview->masuk->Name && $absen_detil_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_preview->masuk->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_preview->SortField == $absen_detil_preview->masuk->Name) { ?><?php if ($absen_detil_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_preview->absen->Visible) { // absen ?>
	<?php if ($absen_detil->SortUrl($absen_detil_preview->absen) == "") { ?>
		<th class="<?php echo $absen_detil_preview->absen->headerCellClass() ?>"><?php echo $absen_detil_preview->absen->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $absen_detil_preview->absen->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($absen_detil_preview->absen->Name) ?>" data-sort-order="<?php echo $absen_detil_preview->SortField == $absen_detil_preview->absen->Name && $absen_detil_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_preview->absen->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_preview->SortField == $absen_detil_preview->absen->Name) { ?><?php if ($absen_detil_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_preview->ijin->Visible) { // ijin ?>
	<?php if ($absen_detil->SortUrl($absen_detil_preview->ijin) == "") { ?>
		<th class="<?php echo $absen_detil_preview->ijin->headerCellClass() ?>"><?php echo $absen_detil_preview->ijin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $absen_detil_preview->ijin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($absen_detil_preview->ijin->Name) ?>" data-sort-order="<?php echo $absen_detil_preview->SortField == $absen_detil_preview->ijin->Name && $absen_detil_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_preview->ijin->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_preview->SortField == $absen_detil_preview->ijin->Name) { ?><?php if ($absen_detil_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_preview->terlambat->Visible) { // terlambat ?>
	<?php if ($absen_detil->SortUrl($absen_detil_preview->terlambat) == "") { ?>
		<th class="<?php echo $absen_detil_preview->terlambat->headerCellClass() ?>"><?php echo $absen_detil_preview->terlambat->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $absen_detil_preview->terlambat->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($absen_detil_preview->terlambat->Name) ?>" data-sort-order="<?php echo $absen_detil_preview->SortField == $absen_detil_preview->terlambat->Name && $absen_detil_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_preview->terlambat->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_preview->SortField == $absen_detil_preview->terlambat->Name) { ?><?php if ($absen_detil_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_preview->sakit->Visible) { // sakit ?>
	<?php if ($absen_detil->SortUrl($absen_detil_preview->sakit) == "") { ?>
		<th class="<?php echo $absen_detil_preview->sakit->headerCellClass() ?>"><?php echo $absen_detil_preview->sakit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $absen_detil_preview->sakit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($absen_detil_preview->sakit->Name) ?>" data-sort-order="<?php echo $absen_detil_preview->SortField == $absen_detil_preview->sakit->Name && $absen_detil_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_preview->sakit->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_preview->SortField == $absen_detil_preview->sakit->Name) { ?><?php if ($absen_detil_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_preview->pulang_cepat->Visible) { // pulang_cepat ?>
	<?php if ($absen_detil->SortUrl($absen_detil_preview->pulang_cepat) == "") { ?>
		<th class="<?php echo $absen_detil_preview->pulang_cepat->headerCellClass() ?>"><?php echo $absen_detil_preview->pulang_cepat->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $absen_detil_preview->pulang_cepat->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($absen_detil_preview->pulang_cepat->Name) ?>" data-sort-order="<?php echo $absen_detil_preview->SortField == $absen_detil_preview->pulang_cepat->Name && $absen_detil_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_preview->pulang_cepat->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_preview->SortField == $absen_detil_preview->pulang_cepat->Name) { ?><?php if ($absen_detil_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_preview->piket->Visible) { // piket ?>
	<?php if ($absen_detil->SortUrl($absen_detil_preview->piket) == "") { ?>
		<th class="<?php echo $absen_detil_preview->piket->headerCellClass() ?>"><?php echo $absen_detil_preview->piket->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $absen_detil_preview->piket->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($absen_detil_preview->piket->Name) ?>" data-sort-order="<?php echo $absen_detil_preview->SortField == $absen_detil_preview->piket->Name && $absen_detil_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_preview->piket->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_preview->SortField == $absen_detil_preview->piket->Name) { ?><?php if ($absen_detil_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_preview->inval->Visible) { // inval ?>
	<?php if ($absen_detil->SortUrl($absen_detil_preview->inval) == "") { ?>
		<th class="<?php echo $absen_detil_preview->inval->headerCellClass() ?>"><?php echo $absen_detil_preview->inval->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $absen_detil_preview->inval->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($absen_detil_preview->inval->Name) ?>" data-sort-order="<?php echo $absen_detil_preview->SortField == $absen_detil_preview->inval->Name && $absen_detil_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_preview->inval->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_preview->SortField == $absen_detil_preview->inval->Name) { ?><?php if ($absen_detil_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_preview->lembur->Visible) { // lembur ?>
	<?php if ($absen_detil->SortUrl($absen_detil_preview->lembur) == "") { ?>
		<th class="<?php echo $absen_detil_preview->lembur->headerCellClass() ?>"><?php echo $absen_detil_preview->lembur->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $absen_detil_preview->lembur->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($absen_detil_preview->lembur->Name) ?>" data-sort-order="<?php echo $absen_detil_preview->SortField == $absen_detil_preview->lembur->Name && $absen_detil_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_preview->lembur->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_preview->SortField == $absen_detil_preview->lembur->Name) { ?><?php if ($absen_detil_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($absen_detil_preview->penyesuaian->Visible) { // penyesuaian ?>
	<?php if ($absen_detil->SortUrl($absen_detil_preview->penyesuaian) == "") { ?>
		<th class="<?php echo $absen_detil_preview->penyesuaian->headerCellClass() ?>"><?php echo $absen_detil_preview->penyesuaian->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $absen_detil_preview->penyesuaian->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($absen_detil_preview->penyesuaian->Name) ?>" data-sort-order="<?php echo $absen_detil_preview->SortField == $absen_detil_preview->penyesuaian->Name && $absen_detil_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $absen_detil_preview->penyesuaian->caption() ?></span><span class="ew-table-header-sort"><?php if ($absen_detil_preview->SortField == $absen_detil_preview->penyesuaian->Name) { ?><?php if ($absen_detil_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($absen_detil_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$absen_detil_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$absen_detil_preview->RecCount = 0;
$absen_detil_preview->RowCount = 0;
while ($absen_detil_preview->Recordset && !$absen_detil_preview->Recordset->EOF) {

	// Init row class and style
	$absen_detil_preview->RecCount++;
	$absen_detil_preview->RowCount++;
	$absen_detil_preview->CssStyle = "";
	$absen_detil_preview->loadListRowValues($absen_detil_preview->Recordset);

	// Render row
	$absen_detil->RowType = ROWTYPE_PREVIEW; // Preview record
	$absen_detil_preview->resetAttributes();
	$absen_detil_preview->renderListRow();

	// Render list options
	$absen_detil_preview->renderListOptions();
?>
	<tr <?php echo $absen_detil->rowAttributes() ?>>
<?php

// Render list options (body, left)
$absen_detil_preview->ListOptions->render("body", "left", $absen_detil_preview->RowCount);
?>
<?php if ($absen_detil_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $absen_detil_preview->id->cellAttributes() ?>>
<span<?php echo $absen_detil_preview->id->viewAttributes() ?>><?php echo $absen_detil_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($absen_detil_preview->pid->Visible) { // pid ?>
		<!-- pid -->
		<td<?php echo $absen_detil_preview->pid->cellAttributes() ?>>
<span<?php echo $absen_detil_preview->pid->viewAttributes() ?>><?php echo $absen_detil_preview->pid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($absen_detil_preview->pegawai->Visible) { // pegawai ?>
		<!-- pegawai -->
		<td<?php echo $absen_detil_preview->pegawai->cellAttributes() ?>>
<span<?php echo $absen_detil_preview->pegawai->viewAttributes() ?>><?php echo $absen_detil_preview->pegawai->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($absen_detil_preview->jenjang->Visible) { // jenjang ?>
		<!-- jenjang -->
		<td<?php echo $absen_detil_preview->jenjang->cellAttributes() ?>>
<span<?php echo $absen_detil_preview->jenjang->viewAttributes() ?>><?php echo $absen_detil_preview->jenjang->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($absen_detil_preview->masuk->Visible) { // masuk ?>
		<!-- masuk -->
		<td<?php echo $absen_detil_preview->masuk->cellAttributes() ?>>
<span<?php echo $absen_detil_preview->masuk->viewAttributes() ?>><?php echo $absen_detil_preview->masuk->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($absen_detil_preview->absen->Visible) { // absen ?>
		<!-- absen -->
		<td<?php echo $absen_detil_preview->absen->cellAttributes() ?>>
<span<?php echo $absen_detil_preview->absen->viewAttributes() ?>><?php echo $absen_detil_preview->absen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($absen_detil_preview->ijin->Visible) { // ijin ?>
		<!-- ijin -->
		<td<?php echo $absen_detil_preview->ijin->cellAttributes() ?>>
<span<?php echo $absen_detil_preview->ijin->viewAttributes() ?>><?php echo $absen_detil_preview->ijin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($absen_detil_preview->terlambat->Visible) { // terlambat ?>
		<!-- terlambat -->
		<td<?php echo $absen_detil_preview->terlambat->cellAttributes() ?>>
<span<?php echo $absen_detil_preview->terlambat->viewAttributes() ?>><?php echo $absen_detil_preview->terlambat->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($absen_detil_preview->sakit->Visible) { // sakit ?>
		<!-- sakit -->
		<td<?php echo $absen_detil_preview->sakit->cellAttributes() ?>>
<span<?php echo $absen_detil_preview->sakit->viewAttributes() ?>><?php echo $absen_detil_preview->sakit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($absen_detil_preview->pulang_cepat->Visible) { // pulang_cepat ?>
		<!-- pulang_cepat -->
		<td<?php echo $absen_detil_preview->pulang_cepat->cellAttributes() ?>>
<span<?php echo $absen_detil_preview->pulang_cepat->viewAttributes() ?>><?php echo $absen_detil_preview->pulang_cepat->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($absen_detil_preview->piket->Visible) { // piket ?>
		<!-- piket -->
		<td<?php echo $absen_detil_preview->piket->cellAttributes() ?>>
<span<?php echo $absen_detil_preview->piket->viewAttributes() ?>><?php echo $absen_detil_preview->piket->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($absen_detil_preview->inval->Visible) { // inval ?>
		<!-- inval -->
		<td<?php echo $absen_detil_preview->inval->cellAttributes() ?>>
<span<?php echo $absen_detil_preview->inval->viewAttributes() ?>><?php echo $absen_detil_preview->inval->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($absen_detil_preview->lembur->Visible) { // lembur ?>
		<!-- lembur -->
		<td<?php echo $absen_detil_preview->lembur->cellAttributes() ?>>
<span<?php echo $absen_detil_preview->lembur->viewAttributes() ?>><?php echo $absen_detil_preview->lembur->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($absen_detil_preview->penyesuaian->Visible) { // penyesuaian ?>
		<!-- penyesuaian -->
		<td<?php echo $absen_detil_preview->penyesuaian->cellAttributes() ?>>
<span<?php echo $absen_detil_preview->penyesuaian->viewAttributes() ?>><?php echo $absen_detil_preview->penyesuaian->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$absen_detil_preview->ListOptions->render("body", "right", $absen_detil_preview->RowCount);
?>
	</tr>
<?php
	$absen_detil_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $absen_detil_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($absen_detil_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($absen_detil_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$absen_detil_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($absen_detil_preview->Recordset)
	$absen_detil_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$absen_detil_preview->terminate();
?>