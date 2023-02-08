<?php
namespace PHPMaker2020\sigap;
?>
<?php if ($m_potongan->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_m_potonganmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($m_potongan->tahun->Visible) { // tahun ?>
		<tr id="r_tahun">
			<td class="<?php echo $m_potongan->TableLeftColumnClass ?>"><?php echo $m_potongan->tahun->caption() ?></td>
			<td <?php echo $m_potongan->tahun->cellAttributes() ?>>
<span id="el_m_potongan_tahun">
<span<?php echo $m_potongan->tahun->viewAttributes() ?>><?php echo $m_potongan->tahun->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_potongan->bulan->Visible) { // bulan ?>
		<tr id="r_bulan">
			<td class="<?php echo $m_potongan->TableLeftColumnClass ?>"><?php echo $m_potongan->bulan->caption() ?></td>
			<td <?php echo $m_potongan->bulan->cellAttributes() ?>>
<span id="el_m_potongan_bulan">
<span<?php echo $m_potongan->bulan->viewAttributes() ?>><?php echo $m_potongan->bulan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_potongan->c_by->Visible) { // c_by ?>
		<tr id="r_c_by">
			<td class="<?php echo $m_potongan->TableLeftColumnClass ?>"><?php echo $m_potongan->c_by->caption() ?></td>
			<td <?php echo $m_potongan->c_by->cellAttributes() ?>>
<span id="el_m_potongan_c_by">
<span<?php echo $m_potongan->c_by->viewAttributes() ?>><?php echo $m_potongan->c_by->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_potongan->datetime->Visible) { // datetime ?>
		<tr id="r_datetime">
			<td class="<?php echo $m_potongan->TableLeftColumnClass ?>"><?php echo $m_potongan->datetime->caption() ?></td>
			<td <?php echo $m_potongan->datetime->cellAttributes() ?>>
<span id="el_m_potongan_datetime">
<span<?php echo $m_potongan->datetime->viewAttributes() ?>><?php echo $m_potongan->datetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>