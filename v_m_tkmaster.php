<?php
namespace PHPMaker2020\sigap;
?>
<?php if ($v_m_tk->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_v_m_tkmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($v_m_tk->createby->Visible) { // createby ?>
		<tr id="r_createby">
			<td class="<?php echo $v_m_tk->TableLeftColumnClass ?>"><?php echo $v_m_tk->createby->caption() ?></td>
			<td <?php echo $v_m_tk->createby->cellAttributes() ?>>
<span id="el_v_m_tk_createby">
<span<?php echo $v_m_tk->createby->viewAttributes() ?>><?php echo $v_m_tk->createby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v_m_tk->tahun->Visible) { // tahun ?>
		<tr id="r_tahun">
			<td class="<?php echo $v_m_tk->TableLeftColumnClass ?>"><?php echo $v_m_tk->tahun->caption() ?></td>
			<td <?php echo $v_m_tk->tahun->cellAttributes() ?>>
<span id="el_v_m_tk_tahun">
<span<?php echo $v_m_tk->tahun->viewAttributes() ?>><?php echo $v_m_tk->tahun->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v_m_tk->bulan->Visible) { // bulan ?>
		<tr id="r_bulan">
			<td class="<?php echo $v_m_tk->TableLeftColumnClass ?>"><?php echo $v_m_tk->bulan->caption() ?></td>
			<td <?php echo $v_m_tk->bulan->cellAttributes() ?>>
<span id="el_v_m_tk_bulan">
<span<?php echo $v_m_tk->bulan->viewAttributes() ?>><?php echo $v_m_tk->bulan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>