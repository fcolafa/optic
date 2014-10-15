<?php
/* @var $this MarkController */
/* @var $data Mark */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mark')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_mark), array('view', 'id'=>$data->id_mark)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mark_name')); ?>:</b>
	<?php echo CHtml::encode($data->mark_name); ?>
	<br />


</div>