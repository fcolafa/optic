<?php
/* @var $this LaboratoryController */
/* @var $data Laboratory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_laboratory')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_laboratory), array('view', 'id'=>$data->id_laboratory)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('laboratory_name')); ?>:</b>
	<?php echo CHtml::encode($data->laboratory_name); ?>
	<br />


</div>