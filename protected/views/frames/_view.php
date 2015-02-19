<?php
/* @var $this FramesController */
/* @var $data Frames */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_frame')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_frame), array('view', 'id'=>$data->id_frame)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_examplar')); ?>:</b>
	<?php echo CHtml::encode($data->id_examplar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mark')); ?>:</b>
	<?php echo CHtml::encode($data->id_mark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('frame_name')); ?>:</b>
	<?php echo CHtml::encode($data->frame_name); ?>
	<br />


</div>