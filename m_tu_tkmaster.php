<?php
namespace PHPMaker2020\sigap;
?>
<?php if ($m_tu_tk->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_m_tu_tkmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($m_tu_tk->tahun->Visible) { // tahun ?>
		<tr id="r_tahun">
			<td class="<?php echo $m_tu_tk->TableLeftColumnClass ?>"><?php echo $m_tu_tk->tahun->caption() ?></td>
			<td <?php echo $m_tu_tk->tahun->cellAttributes() ?>>
<span id="el_m_tu_tk_tahun">
<span<?php echo $m_tu_tk->tahun->viewAttributes() ?>><?php echo $m_tu_tk->tahun->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($m_tu_tk->bulan->Visible) { // bulan ?>
		<tr id="r_bulan">
			<td class="<?php echo $m_tu_tk->TableLeftColumnClass ?>"><?php echo $m_tu_tk->bulan->caption() ?></td>
			<td <?php echo $m_tu_tk->bulan->cellAttributes() ?>>
<span id="el_m_tu_tk_bulan">
<span<?php echo $m_tu_tk->bulan->viewAttributes() ?>><?php echo $m_tu_tk->bulan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>