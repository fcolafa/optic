<?php
/* @var $this TypeController */
/* @var $data Type */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_type')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_type), array('view', 'id'=>$data->id_type)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_name')); ?>:</b>
	<?php echo CHtml::encode($data->type_name); ?>
	<br />


</div>