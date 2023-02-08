<?php
namespace PHPMaker2020\sigap;
?>
<?php if ($m_potongan_smk->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_m_potongan_smkmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($m_potongan_smk->tahun->Visible) { // tahun ?>
		<tr id="r_tahun">
			<td class="<?php echo $m_potongan_smk->TableLeftColumnClass ?>"><?php echo $m_potongan_smk->tahun->caption() ?></td>
			<td <?php echo $m_potongan_smk->tahun->cellAttributes() ?>>
<span id="el_m_potongan_smk_tahun">
<span<?php echo $m_potongan_smk->tahun->viewAttributes() ?>><?php echo $m_potongan_smk->tahun->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_potongan_smk->bulan->Visible) { // bulan ?>
		<tr id="r_bulan">
			<td class="<?php echo $m_potongan_smk->TableLeftColumnClass ?>"><?php echo $m_potongan_smk->bulan->caption() ?></td>
			<td <?php echo $m_potongan_smk->bulan->cellAttributes() ?>>
<span id="el_m_potongan_smk_bulan">
<span<?php echo $m_potongan_smk->bulan->viewAttributes() ?>><?php echo $m_potongan_smk->bulan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_potongan_smk->c_by->Visible) { // c_by ?>
		<tr id="r_c_by">
			<td class="<?php echo $m_potongan_smk->TableLeftColumnClass ?>"><?php echo $m_potongan_smk->c_by->caption() ?></td>
			<td <?php echo $m_potongan_smk->c_by->cellAttributes() ?>>
<span id="el_m_potongan_smk_c_by">
<span<?php echo $m_potongan_smk->c_by->viewAttributes() ?>><?php echo $m_potongan_smk->c_by->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_potongan_smk->datetime->Visible) { // datetime ?>
		<tr id="r_datetime">
			<td class="<?php echo $m_potongan_smk->TableLeftColumnClass ?>"><?php echo $m_potongan_smk->datetime->caption() ?></td>
			<td <?php echo $m_potongan_smk->datetime->cellAttributes() ?>>
<span id="el_m_potongan_smk_datetime">
<span<?php echo $m_potongan_smk->datetime->viewAttributes() ?>><?php echo $m_potongan_smk->datetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>