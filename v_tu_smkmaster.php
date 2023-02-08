<?php
namespace PHPMaker2020\sigap;
?>
<?php if ($v_tu_smk->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_v_tu_smkmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($v_tu_smk->createby->Visible) { // createby ?>
		<tr id="r_createby">
			<td class="<?php echo $v_tu_smk->TableLeftColumnClass ?>"><?php echo $v_tu_smk->createby->caption() ?></td>
			<td <?php echo $v_tu_smk->createby->cellAttributes() ?>>
<span id="el_v_tu_smk_createby">
<span<?php echo $v_tu_smk->createby->viewAttributes() ?>><?php echo $v_tu_smk->createby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v_tu_smk->tahun->Visible) { // tahun ?>
		<tr id="r_tahun">
			<td class="<?php echo $v_tu_smk->TableLeftColumnClass ?>"><?php echo $v_tu_smk->tahun->caption() ?></td>
			<td <?php echo $v_tu_smk->tahun->cellAttributes() ?>>
<span id="el_v_tu_smk_tahun">
<span<?php echo $v_tu_smk->tahun->viewAttributes() ?>><?php echo $v_tu_smk->tahun->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v_tu_smk->bulan->Visible) { // bulan ?>
		<tr id="r_bulan">
			<td class="<?php echo $v_tu_smk->TableLeftColumnClass ?>"><?php echo $v_tu_smk->bulan->caption() ?></td>
			<td <?php echo $v_tu_smk->bulan->cellAttributes() ?>>
<span id="el_v_tu_smk_bulan">
<span<?php echo $v_tu_smk->bulan->viewAttributes() ?>><?php echo $v_tu_smk->bulan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>