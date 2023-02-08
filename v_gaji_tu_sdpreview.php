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
$v_gaji_tu_sd_preview = new v_gaji_tu_sd_preview();

// Run the page
$v_gaji_tu_sd_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_gaji_tu_sd_preview->Page_Render();
?>
<?php $v_gaji_tu_sd_preview->showPageHeader(); ?>
<?php if ($v_gaji_tu_sd_preview->TotalRecords > 0) { ?>
<div class="card ew-grid v_gaji_tu_sd"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$v_gaji_tu_sd_preview->renderListOptions();

// Render list options (header, left)
$v_gaji_tu_sd_preview->ListOptions->render("header", "left");
?>
<?php if ($v_gaji_tu_sd_preview->pegawai->Visible) { // pegawai ?>
	<?php if ($v_gaji_tu_sd->SortUrl($v_gaji_tu_sd_preview->pegawai) == "") { ?>
		<th class="<?php echo $v_gaji_tu_sd_preview->pegawai->headerCellClass() ?>"><?php echo $v_gaji_tu_sd_preview->pegawai->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $v_gaji_tu_sd_preview->pegawai->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($v_gaji_tu_sd_preview->pegawai->Name) ?>" data-sort-order="<?php echo $v_gaji_tu_sd_preview->SortField == $v_gaji_tu_sd_preview->pegawai->Name && $v_gaji_tu_sd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_tu_sd_preview->pegawai->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_tu_sd_preview->SortField == $v_gaji_tu_sd_preview->pegawai->Name) { ?><?php if ($v_gaji_tu_sd_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_tu_sd_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gaji_tu_sd_preview->rekbank->Visible) { // rekbank ?>
	<?php if ($v_gaji_tu_sd->SortUrl($v_gaji_tu_sd_preview->rekbank) == "") { ?>
		<th class="<?php echo $v_gaji_tu_sd_preview->rekbank->headerCellClass() ?>"><?php echo $v_gaji_tu_sd_preview->rekbank->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $v_gaji_tu_sd_preview->rekbank->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($v_gaji_tu_sd_preview->rekbank->Name) ?>" data-sort-order="<?php echo $v_gaji_tu_sd_preview->SortField == $v_gaji_tu_sd_preview->rekbank->Name && $v_gaji_tu_sd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_tu_sd_preview->rekbank->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_tu_sd_preview->SortField == $v_gaji_tu_sd_preview->rekbank->Name) { ?><?php if ($v_gaji_tu_sd_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_tu_sd_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gaji_tu_sd_preview->total->Visible) { // total ?>
	<?php if ($v_gaji_tu_sd->SortUrl($v_gaji_tu_sd_preview->total) == "") { ?>
		<th class="<?php echo $v_gaji_tu_sd_preview->total->headerCellClass() ?>"><?php echo $v_gaji_tu_sd_preview->total->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $v_gaji_tu_sd_preview->total->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($v_gaji_tu_sd_preview->total->Name) ?>" data-sort-order="<?php echo $v_gaji_tu_sd_preview->SortField == $v_gaji_tu_sd_preview->total->Name && $v_gaji_tu_sd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_tu_sd_preview->total->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_tu_sd_preview->SortField == $v_gaji_tu_sd_preview->total->Name) { ?><?php if ($v_gaji_tu_sd_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_tu_sd_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_gaji_tu_sd_preview->potongan->Visible) { // potongan ?>
	<?php if ($v_gaji_tu_sd->SortUrl($v_gaji_tu_sd_preview->potongan) == "") { ?>
		<th class="<?php echo $v_gaji_tu_sd_preview->potongan->headerCellClass() ?>"><?php echo $v_gaji_tu_sd_preview->potongan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $v_gaji_tu_sd_preview->potongan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($v_gaji_tu_sd_preview->potongan->Name) ?>" data-sort-order="<?php echo $v_gaji_tu_sd_preview->SortField == $v_gaji_tu_sd_preview->potongan->Name && $v_gaji_tu_sd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_gaji_tu_sd_preview->potongan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_gaji_tu_sd_preview->SortField == $v_gaji_tu_sd_preview->potongan->Name) { ?><?php if ($v_gaji_tu_sd_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v_gaji_tu_sd_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v_gaji_tu_sd_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$v_gaji_tu_sd_preview->RecCount = 0;
$v_gaji_tu_sd_preview->RowCount = 0;
while ($v_gaji_tu_sd_preview->Recordset && !$v_gaji_tu_sd_preview->Recordset->EOF) {

	// Init row class and style
	$v_gaji_tu_sd_preview->RecCount++;
	$v_gaji_tu_sd_preview->RowCount++;
	$v_gaji_tu_sd_preview->CssStyle = "";
	$v_gaji_tu_sd_preview->loadListRowValues($v_gaji_tu_sd_preview->Recordset);

	// Render row
	$v_gaji_tu_sd->RowType = ROWTYPE_PREVIEW; // Preview record
	$v_gaji_tu_sd_preview->resetAttributes();
	$v_gaji_tu_sd_preview->renderListRow();

	// Render list options
	$v_gaji_tu_sd_preview->renderListOptions();
?>
	<tr <?php echo $v_gaji_tu_sd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_gaji_tu_sd_preview->ListOptions->render("body", "left", $v_gaji_tu_sd_preview->RowCount);
?>
<?php if ($v_gaji_tu_sd_preview->pegawai->Visible) { // pegawai ?>
		<!-- pegawai -->
		<td<?php echo $v_gaji_tu_sd_preview->pegawai->cellAttributes() ?>>
<span<?php echo $v_gaji_tu_sd_preview->pegawai->viewAttributes() ?>><?php echo $v_gaji_tu_sd_preview->pegawai->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($v_gaji_tu_sd_preview->rekbank->Visible) { // rekbank ?>
		<!-- rekbank -->
		<td<?php echo $v_gaji_tu_sd_preview->rekbank->cellAttributes() ?>>
<span<?php echo $v_gaji_tu_sd_preview->rekbank->viewAttributes() ?>><?php echo $v_gaji_tu_sd_preview->rekbank->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($v_gaji_tu_sd_preview->total->Visible) { // total ?>
		<!-- total -->
		<td<?php echo $v_gaji_tu_sd_preview->total->cellAttributes() ?>>
<span<?php echo $v_gaji_tu_sd_preview->total->viewAttributes() ?>><?php echo $v_gaji_tu_sd_preview->total->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($v_gaji_tu_sd_preview->potongan->Visible) { // potongan ?>
		<!-- potongan -->
		<td<?php echo $v_gaji_tu_sd_preview->potongan->cellAttributes() ?>>
<span<?php echo $v_gaji_tu_sd_preview->potongan->viewAttributes() ?>><?php echo $v_gaji_tu_sd_preview->potongan->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$v_gaji_tu_sd_preview->ListOptions->render("body", "right", $v_gaji_tu_sd_preview->RowCount);
?>
	</tr>
<?php
	$v_gaji_tu_sd_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $v_gaji_tu_sd_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($v_gaji_tu_sd_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($v_gaji_tu_sd_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$v_gaji_tu_sd_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($v_gaji_tu_sd_preview->Recordset)
	$v_gaji_tu_sd_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$v_gaji_tu_sd_preview->terminate();
?>