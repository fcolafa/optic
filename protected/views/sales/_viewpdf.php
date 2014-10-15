<?php
/* @var $this SucursalController */
/* @var $data Sucursal */
?>

<div class="view">
   
	<br>
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_office')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_office), array('view', 'id'=>$data->id_office)); ?>
	<br>
           
	<table width="90%" border="0.3" cellspacing="2" cellpadding="20">
	<col style="width: 200px" />
	<col style="width: 150px" span="20" />
       
	
	<tr>
		<th scope="row"><?php echo $data->getAttributeLabel('office_name') ?>;</th>
		<td><?php echo CHtml::encode($data->office_name); ?></td>
           
	</tr>
	
</table>
<br><br>

</div>
