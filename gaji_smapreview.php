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
$gaji_sma_preview = new gaji_sma_preview();

// Run the page
$gaji_sma_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$gaji_sma_preview->Page_Render();
?>
<?php $gaji_sma_preview->showPageHeader(); ?>
<?php if ($gaji_sma_preview->TotalRecords > 0) { ?>
<div class="card ew-grid gaji_sma"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$gaji_sma_preview->renderListOptions();

// Render list options (header, left)
$gaji_sma_preview->ListOptions->render("header", "left");
?>
<?php if ($gaji_sma_preview->pegawai->Visible) { // pegawai ?>
	<?php if ($gaji_sma->SortUrl($gaji_sma_preview->pegawai) == "") { ?>
		<th class="<?php echo $gaji_sma_preview->pegawai->headerCellClass() ?>"><?php echo $gaji_sma_preview->pegawai->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_sma_preview->pegawai->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_sma_preview->pegawai->Name) ?>" data-sort-order="<?php echo $gaji_sma_preview->SortField == $gaji_sma_preview->pegawai->Name && $gaji_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_sma_preview->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_sma_preview->SortField == $gaji_sma_preview->pegawai->Name) { ?><?php if ($gaji_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_sma_preview->sub_total->Visible) { // sub_total ?>
	<?php if ($gaji_sma->SortUrl($gaji_sma_preview->sub_total) == "") { ?>
		<th class="<?php echo $gaji_sma_preview->sub_total->headerCellClass() ?>"><?php echo $gaji_sma_preview->sub_total->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_sma_preview->sub_total->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_sma_preview->sub_total->Name) ?>" data-sort-order="<?php echo $gaji_sma_preview->SortField == $gaji_sma_preview->sub_total->Name && $gaji_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_sma_preview->sub_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_sma_preview->SortField == $gaji_sma_preview->sub_total->Name) { ?><?php if ($gaji_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_sma_preview->penyesuaian->Visible) { // penyesuaian ?>
	<?php if ($gaji_sma->SortUrl($gaji_sma_preview->penyesuaian) == "") { ?>
		<th class="<?php echo $gaji_sma_preview->penyesuaian->headerCellClass() ?>"><?php echo $gaji_sma_preview->penyesuaian->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_sma_preview->penyesuaian->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_sma_preview->penyesuaian->Name) ?>" data-sort-order="<?php echo $gaji_sma_preview->SortField == $gaji_sma_preview->penyesuaian->Name && $gaji_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_sma_preview->penyesuaian->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_sma_preview->SortField == $gaji_sma_preview->penyesuaian->Name) { ?><?php if ($gaji_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_sma_preview->potongan->Visible) { // potongan ?>
	<?php if ($gaji_sma->SortUrl($gaji_sma_preview->potongan) == "") { ?>
		<th class="<?php echo $gaji_sma_preview->potongan->headerCellClass() ?>"><?php echo $gaji_sma_preview->potongan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_sma_preview->potongan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_sma_preview->potongan->Name) ?>" data-sort-order="<?php echo $gaji_sma_preview->SortField == $gaji_sma_preview->potongan->Name && $gaji_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_sma_preview->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_sma_preview->SortField == $gaji_sma_preview->potongan->Name) { ?><?php if ($gaji_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_sma_preview->total->Visible) { // total ?>
	<?php if ($gaji_sma->SortUrl($gaji_sma_preview->total) == "") { ?>
		<th class="<?php echo $gaji_sma_preview->total->headerCellClass() ?>"><?php echo $gaji_sma_preview->total->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_sma_preview->total->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_sma_preview->total->Name) ?>" data-sort-order="<?php echo $gaji_sma_preview->SortField == $gaji_sma_preview->total->Name && $gaji_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_sma_preview->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_sma_preview->SortField == $gaji_sma_preview->total->Name) { ?><?php if ($gaji_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($gaji_sma_preview->voucher->Visible) { // voucher ?>
	<?php if ($gaji_sma->SortUrl($gaji_sma_preview->voucher) == "") { ?>
		<th class="<?php echo $gaji_sma_preview->voucher->headerCellClass() ?>"><?php echo $gaji_sma_preview->voucher->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $gaji_sma_preview->voucher->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($gaji_sma_preview->voucher->Name) ?>" data-sort-order="<?php echo $gaji_sma_preview->SortField == $gaji_sma_preview->voucher->Name && $gaji_sma_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $gaji_sma_preview->voucher->caption() ?></span><span class="ew-table-header-sort"><?php if ($gaji_sma_preview->SortField == $gaji_sma_preview->voucher->Name) { ?><?php if ($gaji_sma_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($gaji_sma_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$gaji_sma_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$gaji_sma_preview->RecCount = 0;
$gaji_sma_preview->RowCount = 0;
while ($gaji_sma_preview->Recordset && !$gaji_sma_preview->Recordset->EOF) {

	// Init row class and style
	$gaji_sma_preview->RecCount++;
	$gaji_sma_preview->RowCount++;
	$gaji_sma_preview->CssStyle = "";
	$gaji_sma_preview->loadListRowValues($gaji_sma_preview->Recordset);

	// Render row
	$gaji_sma->RowType = ROWTYPE_PREVIEW; // Preview record
	$gaji_sma_preview->resetAttributes();
	$gaji_sma_preview->renderListRow();

	// Render list options
	$gaji_sma_preview->renderListOptions();
?>
	<tr <?php echo $gaji_sma->rowAttributes() ?>>
<?php

// Render list options (body, left)
$gaji_sma_preview->ListOptions->render("body", "left", $gaji_sma_preview->RowCount);
?>
<?php if ($gaji_sma_preview->pegawai->Visible) { // pegawai ?>
		<!-- pegawai -->
		<td<?php echo $gaji_sma_preview->pegawai->cellAttributes() ?>>
<span<?php echo $gaji_sma_preview->pegawai->viewAttributes() ?>><?php echo $gaji_sma_preview->pegawai->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_sma_preview->sub_total->Visible) { // sub_total ?>
		<!-- sub_total -->
		<td<?php echo $gaji_sma_preview->sub_total->cellAttributes() ?>>
<span<?php echo $gaji_sma_preview->sub_total->viewAttributes() ?>><?php echo $gaji_sma_preview->sub_total->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_sma_preview->penyesuaian->Visible) { // penyesuaian ?>
		<!-- penyesuaian -->
		<td<?php echo $gaji_sma_preview->penyesuaian->cellAttributes() ?>>
<span<?php echo $gaji_sma_preview->penyesuaian->viewAttributes() ?>><?php echo $gaji_sma_preview->penyesuaian->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_sma_preview->potongan->Visible) { // potongan ?>
		<!-- potongan -->
		<td<?php echo $gaji_sma_preview->potongan->cellAttributes() ?>>
<span<?php echo $gaji_sma_preview->potongan->viewAttributes() ?>><?php echo $gaji_sma_preview->potongan->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_sma_preview->total->Visible) { // total ?>
		<!-- total -->
		<td<?php echo $gaji_sma_preview->total->cellAttributes() ?>>
<span<?php echo $gaji_sma_preview->total->viewAttributes() ?>><?php echo $gaji_sma_preview->total->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($gaji_sma_preview->voucher->Visible) { // voucher ?>
		<!-- voucher -->
		<td<?php echo $gaji_sma_preview->voucher->cellAttributes() ?>>
<span<?php echo $gaji_sma_preview->voucher->viewAttributes() ?>><?php echo $gaji_sma_preview->voucher->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$gaji_sma_preview->ListOptions->render("body", "right", $gaji_sma_preview->RowCount);
?>
	</tr>
<?php
	$gaji_sma_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $gaji_sma_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($gaji_sma_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($gaji_sma_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$gaji_sma_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($gaji_sma_preview->Recordset)
	$gaji_sma_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$gaji_sma_preview->terminate();
?>