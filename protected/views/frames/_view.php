<?php
/* @var $this FramesController */
/* @var $data Frames */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_frame')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_frame), array('view', 'id'=>$data->id_frame)); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('idMark.mark_name')); ?>:</b>
	<?php echo CHtml::encode($data->idMark->mark_name); ?>
	<br />
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('idExamplar.examplar_name')); ?>:</b>
	<?php echo CHtml::encode($data->idExamplar->examplar_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('frame_name')); ?>:</b>
	<?php echo CHtml::encode($data->frame_name); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />



</div>