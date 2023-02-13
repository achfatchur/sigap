<?php
namespace PHPMaker2020\sigap;
?>
<?php if ($jabatan->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_jabatanmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($jabatan->nama_jabatan->Visible) { // nama_jabatan ?>
		<tr id="r_nama_jabatan">
			<td class="<?php echo $jabatan->TableLeftColumnClass ?>"><?php echo $jabatan->nama_jabatan->caption() ?></td>
			<td <?php echo $jabatan->nama_jabatan->cellAttributes() ?>>
<span id="el_jabatan_nama_jabatan">
<span<?php echo $jabatan->nama_jabatan->viewAttributes() ?>><?php echo $jabatan->nama_jabatan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($jabatan->type_jabatan->Visible) { // type_jabatan ?>
		<tr id="r_type_jabatan">
			<td class="<?php echo $jabatan->TableLeftColumnClass ?>"><?php echo $jabatan->type_jabatan->caption() ?></td>
			<td <?php echo $jabatan->type_jabatan->cellAttributes() ?>>
<span id="el_jabatan_type_jabatan">
<span<?php echo $jabatan->type_jabatan->viewAttributes() ?>><?php echo $jabatan->type_jabatan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($jabatan->jenjang->Visible) { // jenjang ?>
		<tr id="r_jenjang">
			<td class="<?php echo $jabatan->TableLeftColumnClass ?>"><?php echo $jabatan->jenjang->caption() ?></td>
			<td <?php echo $jabatan->jenjang->cellAttributes() ?>>
<span id="el_jabatan_jenjang">
<span<?php echo $jabatan->jenjang->viewAttributes() ?>><?php echo $jabatan->jenjang->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($jabatan->keterangan->Visible) { // keterangan ?>
		<tr id="r_keterangan">
			<td class="<?php echo $jabatan->TableLeftColumnClass ?>"><?php echo $jabatan->keterangan->caption() ?></td>
			<td <?php echo $jabatan->keterangan->cellAttributes() ?>>
<span id="el_jabatan_keterangan">
<span<?php echo $jabatan->keterangan->viewAttributes() ?>><?php echo $jabatan->keterangan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>