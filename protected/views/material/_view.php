<?php
/* @var $this MaterialController */
/* @var $data Material */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_material')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_material), array('view', 'id'=>$data->id_material)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('material_name')); ?>:</b>
	<?php echo CHtml::encode($data->material_name); ?>
	<br />


</div>