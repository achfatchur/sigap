<?php
namespace PHPMaker2020\sigap;
?>
<?php if ($m_penyesuaian->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_m_penyesuaianmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($m_penyesuaian->bulan->Visible) { // bulan ?>
		<tr id="r_bulan">
			<td class="<?php echo $m_penyesuaian->TableLeftColumnClass ?>"><?php echo $m_penyesuaian->bulan->caption() ?></td>
			<td <?php echo $m_penyesuaian->bulan->cellAttributes() ?>>
<span id="el_m_penyesuaian_bulan">
<span<?php echo $m_penyesuaian->bulan->viewAttributes() ?>><?php echo $m_penyesuaian->bulan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_penyesuaian->tahun->Visible) { // tahun ?>
		<tr id="r_tahun">
			<td class="<?php echo $m_penyesuaian->TableLeftColumnClass ?>"><?php echo $m_penyesuaian->tahun->caption() ?></td>
			<td <?php echo $m_penyesuaian->tahun->cellAttributes() ?>>
<span id="el_m_penyesuaian_tahun">
<span<?php echo $m_penyesuaian->tahun->viewAttributes() ?>><?php echo $m_penyesuaian->tahun->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>