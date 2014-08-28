<?php
/* @var $this OfficeController */
/* @var $data Office */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_office')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_office), array('view', 'id'=>$data->id_office)); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('idZone.zone_name')); ?>:</b>
	<?php echo CHtml::encode($data->idZone->zone_name); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('idCity.city_name')); ?>:</b>
	<?php echo CHtml::encode($data->idCity->city_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('office_name')); ?>:</b>
	<?php echo CHtml::encode($data->office_name); ?>
	<br />


</div>