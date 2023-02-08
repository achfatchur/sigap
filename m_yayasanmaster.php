<?php
namespace PHPMaker2020\sigap;
?>
<?php if ($m_yayasan->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_m_yayasanmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($m_yayasan->bulan->Visible) { // bulan ?>
		<tr id="r_bulan">
			<td class="<?php echo $m_yayasan->TableLeftColumnClass ?>"><?php echo $m_yayasan->bulan->caption() ?></td>
			<td <?php echo $m_yayasan->bulan->cellAttributes() ?>>
<span id="el_m_yayasan_bulan">
<span<?php echo $m_yayasan->bulan->viewAttributes() ?>><?php echo $m_yayasan->bulan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_yayasan->tahun->Visible) { // tahun ?>
		<tr id="r_tahun">
			<td class="<?php echo $m_yayasan->TableLeftColumnClass ?>"><?php echo $m_yayasan->tahun->caption() ?></td>
			<td <?php echo $m_yayasan->tahun->cellAttributes() ?>>
<span id="el_m_yayasan_tahun">
<span<?php echo $m_yayasan->tahun->viewAttributes() ?>><?php echo $m_yayasan->tahun->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>