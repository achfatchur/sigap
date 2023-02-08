<?php
namespace PHPMaker2020\sigap;
?>
<?php if ($v_tu_smp->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_v_tu_smpmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($v_tu_smp->createby->Visible) { // createby ?>
		<tr id="r_createby">
			<td class="<?php echo $v_tu_smp->TableLeftColumnClass ?>"><?php echo $v_tu_smp->createby->caption() ?></td>
			<td <?php echo $v_tu_smp->createby->cellAttributes() ?>>
<span id="el_v_tu_smp_createby">
<span<?php echo $v_tu_smp->createby->viewAttributes() ?>><?php echo $v_tu_smp->createby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v_tu_smp->tahun->Visible) { // tahun ?>
		<tr id="r_tahun">
			<td class="<?php echo $v_tu_smp->TableLeftColumnClass ?>"><?php echo $v_tu_smp->tahun->caption() ?></td>
			<td <?php echo $v_tu_smp->tahun->cellAttributes() ?>>
<span id="el_v_tu_smp_tahun">
<span<?php echo $v_tu_smp->tahun->viewAttributes() ?>><?php echo $v_tu_smp->tahun->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v_tu_smp->bulan->Visible) { // bulan ?>
		<tr id="r_bulan">
			<td class="<?php echo $v_tu_smp->TableLeftColumnClass ?>"><?php echo $v_tu_smp->bulan->caption() ?></td>
			<td <?php echo $v_tu_smp->bulan->cellAttributes() ?>>
<span id="el_v_tu_smp_bulan">
<span<?php echo $v_tu_smp->bulan->viewAttributes() ?>><?php echo $v_tu_smp->bulan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>