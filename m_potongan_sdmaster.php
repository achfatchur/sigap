<?php
namespace PHPMaker2020\sigap;
?>
<?php if ($m_potongan_sd->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_m_potongan_sdmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($m_potongan_sd->tahun->Visible) { // tahun ?>
		<tr id="r_tahun">
			<td class="<?php echo $m_potongan_sd->TableLeftColumnClass ?>"><?php echo $m_potongan_sd->tahun->caption() ?></td>
			<td <?php echo $m_potongan_sd->tahun->cellAttributes() ?>>
<span id="el_m_potongan_sd_tahun">
<span<?php echo $m_potongan_sd->tahun->viewAttributes() ?>><?php echo $m_potongan_sd->tahun->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_potongan_sd->bulan->Visible) { // bulan ?>
		<tr id="r_bulan">
			<td class="<?php echo $m_potongan_sd->TableLeftColumnClass ?>"><?php echo $m_potongan_sd->bulan->caption() ?></td>
			<td <?php echo $m_potongan_sd->bulan->cellAttributes() ?>>
<span id="el_m_potongan_sd_bulan">
<span<?php echo $m_potongan_sd->bulan->viewAttributes() ?>><?php echo $m_potongan_sd->bulan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_potongan_sd->c_by->Visible) { // c_by ?>
		<tr id="r_c_by">
			<td class="<?php echo $m_potongan_sd->TableLeftColumnClass ?>"><?php echo $m_potongan_sd->c_by->caption() ?></td>
			<td <?php echo $m_potongan_sd->c_by->cellAttributes() ?>>
<span id="el_m_potongan_sd_c_by">
<span<?php echo $m_potongan_sd->c_by->viewAttributes() ?>><?php echo $m_potongan_sd->c_by->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_potongan_sd->datetime->Visible) { // datetime ?>
		<tr id="r_datetime">
			<td class="<?php echo $m_potongan_sd->TableLeftColumnClass ?>"><?php echo $m_potongan_sd->datetime->caption() ?></td>
			<td <?php echo $m_potongan_sd->datetime->cellAttributes() ?>>
<span id="el_m_potongan_sd_datetime">
<span<?php echo $m_potongan_sd->datetime->viewAttributes() ?>><?php echo $m_potongan_sd->datetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>