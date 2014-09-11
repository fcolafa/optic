<?php
/* @var $this SalesController */
/* @var $data Sales */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sales')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_sales), array('view', 'id'=>$data->id_sales,'ido'=>$data->id_office)); ?>
        <br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_client')); ?>:</b>
	<?php echo CHtml::encode($data->id_client); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_office')); ?>:</b>
	<?php echo CHtml::encode($data->id_office); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
        <?php echo CHtml::encode(Yii::app()->dateFormatter->format("d MMMM y \n HH:mm:ss",strtotime($data->date))); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />


</div>