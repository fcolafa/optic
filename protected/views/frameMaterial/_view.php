<?php
/* @var $this FrameMaterialController */
/* @var $data FrameMaterial */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_frame_material')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_frame_material), array('view', 'id'=>$data->id_frame_material)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('frame_material_name')); ?>:</b>
	<?php echo CHtml::encode($data->frame_material_name); ?>
	<br />


</div>