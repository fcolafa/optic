<?php
/* @var $this GlassController */
/* @var $data Glass */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_glass')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_glass), array('view', 'id'=>$data->id_glass)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sphere')); ?>:</b>
	<?php echo CHtml::encode($data->sphere); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cylinder')); ?>:</b>
	<?php echo CHtml::encode($data->cylinder); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('critical_stock')); ?>:</b>
	<?php echo CHtml::encode($data->critical_stock); ?>
	<br />


</div>