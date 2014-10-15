<?php
/* @var $this FramesController */
/* @var $data Frames */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_frame')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_frame), array('view', 'id'=>$data->id_frame)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_model')); ?>:</b>
	<?php echo CHtml::encode($data->id_model); ?>
	<br />


</div>