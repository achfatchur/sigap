<?php
namespace PHPMaker2020\sigap;
?>
<?php if ($m_potongan_sma->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_m_potongan_smamaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($m_potongan_sma->tahun->Visible) { // tahun ?>
		<tr id="r_tahun">
			<td class="<?php echo $m_potongan_sma->TableLeftColumnClass ?>"><?php echo $m_potongan_sma->tahun->caption() ?></td>
			<td <?php echo $m_potongan_sma->tahun->cellAttributes() ?>>
<span id="el_m_potongan_sma_tahun">
<span<?php echo $m_potongan_sma->tahun->viewAttributes() ?>><?php echo $m_potongan_sma->tahun->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_potongan_sma->bulan->Visible) { // bulan ?>
		<tr id="r_bulan">
			<td class="<?php echo $m_potongan_sma->TableLeftColumnClass ?>"><?php echo $m_potongan_sma->bulan->caption() ?></td>
			<td <?php echo $m_potongan_sma->bulan->cellAttributes() ?>>
<span id="el_m_potongan_sma_bulan">
<span<?php echo $m_potongan_sma->bulan->viewAttributes() ?>><?php echo $m_potongan_sma->bulan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_potongan_sma->c_by->Visible) { // c_by ?>
		<tr id="r_c_by">
			<td class="<?php echo $m_potongan_sma->TableLeftColumnClass ?>"><?php echo $m_potongan_sma->c_by->caption() ?></td>
			<td <?php echo $m_potongan_sma->c_by->cellAttributes() ?>>
<span id="el_m_potongan_sma_c_by">
<span<?php echo $m_potongan_sma->c_by->viewAttributes() ?>><?php echo $m_potongan_sma->c_by->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_potongan_sma->datetime->Visible) { // datetime ?>
		<tr id="r_datetime">
			<td class="<?php echo $m_potongan_sma->TableLeftColumnClass ?>"><?php echo $m_potongan_sma->datetime->caption() ?></td>
			<td <?php echo $m_potongan_sma->datetime->cellAttributes() ?>>
<span id="el_m_potongan_sma_datetime">
<span<?php echo $m_potongan_sma->datetime->viewAttributes() ?>><?php echo $m_potongan_sma->datetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>