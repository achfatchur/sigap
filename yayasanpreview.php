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
$yayasan_preview = new yayasan_preview();

// Run the page
$yayasan_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$yayasan_preview->Page_Render();
?>
<?php $yayasan_preview->showPageHeader(); ?>
<?php if ($yayasan_preview->TotalRecords > 0) { ?>
<div class="card ew-grid yayasan"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$yayasan_preview->renderListOptions();

// Render list options (header, left)
$yayasan_preview->ListOptions->render("header", "left");
?>
<?php if ($yayasan_preview->id_pegawai->Visible) { // id_pegawai ?>
	<?php if ($yayasan->SortUrl($yayasan_preview->id_pegawai) == "") { ?>
		<th class="<?php echo $yayasan_preview->id_pegawai->headerCellClass() ?>"><?php echo $yayasan_preview->id_pegawai->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $yayasan_preview->id_pegawai->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($yayasan_preview->id_pegawai->Name) ?>" data-sort-order="<?php echo $yayasan_preview->SortField == $yayasan_preview->id_pegawai->Name && $yayasan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $yayasan_preview->id_pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($yayasan_preview->SortField == $yayasan_preview->id_pegawai->Name) { ?><?php if ($yayasan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($yayasan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($yayasan_preview->gaji_pokok->Visible) { // gaji_pokok ?>
	<?php if ($yayasan->SortUrl($yayasan_preview->gaji_pokok) == "") { ?>
		<th class="<?php echo $yayasan_preview->gaji_pokok->headerCellClass() ?>"><?php echo $yayasan_preview->gaji_pokok->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $yayasan_preview->gaji_pokok->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($yayasan_preview->gaji_pokok->Name) ?>" data-sort-order="<?php echo $yayasan_preview->SortField == $yayasan_preview->gaji_pokok->Name && $yayasan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $yayasan_preview->gaji_pokok->caption() ?></span><span class="ew-table-header-sort"><?php if ($yayasan_preview->SortField == $yayasan_preview->gaji_pokok->Name) { ?><?php if ($yayasan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($yayasan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($yayasan_preview->potongan->Visible) { // potongan ?>
	<?php if ($yayasan->SortUrl($yayasan_preview->potongan) == "") { ?>
		<th class="<?php echo $yayasan_preview->potongan->headerCellClass() ?>"><?php echo $yayasan_preview->potongan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $yayasan_preview->potongan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($yayasan_preview->potongan->Name) ?>" data-sort-order="<?php echo $yayasan_preview->SortField == $yayasan_preview->potongan->Name && $yayasan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $yayasan_preview->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($yayasan_preview->SortField == $yayasan_preview->potongan->Name) { ?><?php if ($yayasan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($yayasan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($yayasan_preview->total->Visible) { // total ?>
	<?php if ($yayasan->SortUrl($yayasan_preview->total) == "") { ?>
		<th class="<?php echo $yayasan_preview->total->headerCellClass() ?>"><?php echo $yayasan_preview->total->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $yayasan_preview->total->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($yayasan_preview->total->Name) ?>" data-sort-order="<?php echo $yayasan_preview->SortField == $yayasan_preview->total->Name && $yayasan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $yayasan_preview->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($yayasan_preview->SortField == $yayasan_preview->total->Name) { ?><?php if ($yayasan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($yayasan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$yayasan_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$yayasan_preview->RecCount = 0;
$yayasan_preview->RowCount = 0;
while ($yayasan_preview->Recordset && !$yayasan_preview->Recordset->EOF) {

	// Init row class and style
	$yayasan_preview->RecCount++;
	$yayasan_preview->RowCount++;
	$yayasan_preview->CssStyle = "";
	$yayasan_preview->loadListRowValues($yayasan_preview->Recordset);

	// Render row
	$yayasan->RowType = ROWTYPE_PREVIEW; // Preview record
	$yayasan_preview->resetAttributes();
	$yayasan_preview->renderListRow();

	// Render list options
	$yayasan_preview->renderListOptions();
?>
	<tr <?php echo $yayasan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$yayasan_preview->ListOptions->render("body", "left", $yayasan_preview->RowCount);
?>
<?php if ($yayasan_preview->id_pegawai->Visible) { // id_pegawai ?>
		<!-- id_pegawai -->
		<td<?php echo $yayasan_preview->id_pegawai->cellAttributes() ?>>
<span<?php echo $yayasan_preview->id_pegawai->viewAttributes() ?>><?php echo $yayasan_preview->id_pegawai->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($yayasan_preview->gaji_pokok->Visible) { // gaji_pokok ?>
		<!-- gaji_pokok -->
		<td<?php echo $yayasan_preview->gaji_pokok->cellAttributes() ?>>
<span<?php echo $yayasan_preview->gaji_pokok->viewAttributes() ?>><?php echo $yayasan_preview->gaji_pokok->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($yayasan_preview->potongan->Visible) { // potongan ?>
		<!-- potongan -->
		<td<?php echo $yayasan_preview->potongan->cellAttributes() ?>>
<span<?php echo $yayasan_preview->potongan->viewAttributes() ?>><?php echo $yayasan_preview->potongan->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($yayasan_preview->total->Visible) { // total ?>
		<!-- total -->
		<td<?php echo $yayasan_preview->total->cellAttributes() ?>>
<span<?php echo $yayasan_preview->total->viewAttributes() ?>><?php echo $yayasan_preview->total->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$yayasan_preview->ListOptions->render("body", "right", $yayasan_preview->RowCount);
?>
	</tr>
<?php
	$yayasan_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $yayasan_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($yayasan_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($yayasan_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$yayasan_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($yayasan_preview->Recordset)
	$yayasan_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$yayasan_preview->terminate();
?>