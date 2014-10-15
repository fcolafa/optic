<?php
/* @var $this ExamplarController */
/* @var $data Examplar */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_examplar')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_examplar), array('view', 'id'=>$data->id_examplar)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mark')); ?>:</b>
	<?php echo CHtml::encode($data->id_mark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('examplar_name')); ?>:</b>
	<?php echo CHtml::encode($data->examplar_name); ?>
	<br />


</div>