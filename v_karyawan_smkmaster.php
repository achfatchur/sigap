<?php
namespace PHPMaker2020\sigap;
?>
<?php if ($v_karyawan_smk->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_v_karyawan_smkmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($v_karyawan_smk->createby->Visible) { // createby ?>
		<tr id="r_createby">
			<td class="<?php echo $v_karyawan_smk->TableLeftColumnClass ?>"><?php echo $v_karyawan_smk->createby->caption() ?></td>
			<td <?php echo $v_karyawan_smk->createby->cellAttributes() ?>>
<span id="el_v_karyawan_smk_createby">
<span<?php echo $v_karyawan_smk->createby->viewAttributes() ?>><?php echo $v_karyawan_smk->createby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v_karyawan_smk->tahun->Visible) { // tahun ?>
		<tr id="r_tahun">
			<td class="<?php echo $v_karyawan_smk->TableLeftColumnClass ?>"><?php echo $v_karyawan_smk->tahun->caption() ?></td>
			<td <?php echo $v_karyawan_smk->tahun->cellAttributes() ?>>
<span id="el_v_karyawan_smk_tahun">
<span<?php echo $v_karyawan_smk->tahun->viewAttributes() ?>><?php echo $v_karyawan_smk->tahun->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v_karyawan_smk->bulan->Visible) { // bulan ?>
		<tr id="r_bulan">
			<td class="<?php echo $v_karyawan_smk->TableLeftColumnClass ?>"><?php echo $v_karyawan_smk->bulan->caption() ?></td>
			<td <?php echo $v_karyawan_smk->bulan->cellAttributes() ?>>
<span id="el_v_karyawan_smk_bulan">
<span<?php echo $v_karyawan_smk->bulan->viewAttributes() ?>><?php echo $v_karyawan_smk->bulan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>