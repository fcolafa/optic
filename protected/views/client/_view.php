<?php
/* @var $this ClientController */
/* @var $data Client */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_client')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_client), array('view', 'id'=>$data->id_client)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_name')); ?>:</b>
	<?php echo CHtml::encode($data->client_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_lastname')); ?>:</b>
	<?php echo CHtml::encode($data->client_lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_rut')); ?>:</b>
	<?php echo CHtml::encode($data->client_rut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_phone')); ?>:</b>
	<?php echo CHtml::encode($data->client_phone); ?>
	<br />
        

	<b><?php /* echo CHtml::encode($data->getAttributeLabel('righteye_sphere')); ?>:</b>
	<?php echo CHtml::encode($data->righteye_sphere); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('righteye_cylinder')); ?>:</b>
	<?php echo CHtml::encode($data->righteye_cylinder); ?>
	<br />

	<?php 
	<b><?php echo CHtml::encode($data->getAttributeLabel('righteye_axis')); ?>:</b>
	<?php echo CHtml::encode($data->righteye_axis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lefteye_sphere')); ?>:</b>
	<?php echo CHtml::encode($data->lefteye_sphere); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lefteye_cylinder')); ?>:</b>
	<?php echo CHtml::encode($data->lefteye_cylinder); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lefteye_axis')); ?>:</b>
	<?php echo CHtml::encode($data->lefteye_axis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addition')); ?>:</b>
	<?php echo CHtml::encode($data->addition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	*/ ?>

</div>