<?php
namespace PHPMaker2020\sigap;
?>
<?php if ($v_karyawan_sd->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_v_karyawan_sdmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($v_karyawan_sd->createby->Visible) { // createby ?>
		<tr id="r_createby">
			<td class="<?php echo $v_karyawan_sd->TableLeftColumnClass ?>"><?php echo $v_karyawan_sd->createby->caption() ?></td>
			<td <?php echo $v_karyawan_sd->createby->cellAttributes() ?>>
<span id="el_v_karyawan_sd_createby">
<span<?php echo $v_karyawan_sd->createby->viewAttributes() ?>><?php echo $v_karyawan_sd->createby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v_karyawan_sd->tahun->Visible) { // tahun ?>
		<tr id="r_tahun">
			<td class="<?php echo $v_karyawan_sd->TableLeftColumnClass ?>"><?php echo $v_karyawan_sd->tahun->caption() ?></td>
			<td <?php echo $v_karyawan_sd->tahun->cellAttributes() ?>>
<span id="el_v_karyawan_sd_tahun">
<span<?php echo $v_karyawan_sd->tahun->viewAttributes() ?>><?php echo $v_karyawan_sd->tahun->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v_karyawan_sd->bulan->Visible) { // bulan ?>
		<tr id="r_bulan">
			<td class="<?php echo $v_karyawan_sd->TableLeftColumnClass ?>"><?php echo $v_karyawan_sd->bulan->caption() ?></td>
			<td <?php echo $v_karyawan_sd->bulan->cellAttributes() ?>>
<span id="el_v_karyawan_sd_bulan">
<span<?php echo $v_karyawan_sd->bulan->viewAttributes() ?>><?php echo $v_karyawan_sd->bulan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>