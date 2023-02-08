<?php
namespace PHPMaker2020\sigap;
?>
<?php if ($m_potongan_smp->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_m_potongan_smpmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($m_potongan_smp->tahun->Visible) { // tahun ?>
		<tr id="r_tahun">
			<td class="<?php echo $m_potongan_smp->TableLeftColumnClass ?>"><?php echo $m_potongan_smp->tahun->caption() ?></td>
			<td <?php echo $m_potongan_smp->tahun->cellAttributes() ?>>
<span id="el_m_potongan_smp_tahun">
<span<?php echo $m_potongan_smp->tahun->viewAttributes() ?>><?php echo $m_potongan_smp->tahun->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_potongan_smp->bulan->Visible) { // bulan ?>
		<tr id="r_bulan">
			<td class="<?php echo $m_potongan_smp->TableLeftColumnClass ?>"><?php echo $m_potongan_smp->bulan->caption() ?></td>
			<td <?php echo $m_potongan_smp->bulan->cellAttributes() ?>>
<span id="el_m_potongan_smp_bulan">
<span<?php echo $m_potongan_smp->bulan->viewAttributes() ?>><?php echo $m_potongan_smp->bulan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_potongan_smp->c_by->Visible) { // c_by ?>
		<tr id="r_c_by">
			<td class="<?php echo $m_potongan_smp->TableLeftColumnClass ?>"><?php echo $m_potongan_smp->c_by->caption() ?></td>
			<td <?php echo $m_potongan_smp->c_by->cellAttributes() ?>>
<span id="el_m_potongan_smp_c_by">
<span<?php echo $m_potongan_smp->c_by->viewAttributes() ?>><?php echo $m_potongan_smp->c_by->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_potongan_smp->datetime->Visible) { // datetime ?>
		<tr id="r_datetime">
			<td class="<?php echo $m_potongan_smp->TableLeftColumnClass ?>"><?php echo $m_potongan_smp->datetime->caption() ?></td>
			<td <?php echo $m_potongan_smp->datetime->cellAttributes() ?>>
<span id="el_m_potongan_smp_datetime">
<span<?php echo $m_potongan_smp->datetime->viewAttributes() ?>><?php echo $m_potongan_smp->datetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>