<?php
/* @var $this CityController */
/* @var $data City */
?>

<div class="view">

    
        <b><?php echo CHtml::encode($data->getAttributeLabel('Región')); ?>:</b>
	<?php echo CHtml::encode($data->idZone->zone_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_city')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_city), array('view', 'id'=>$data->id_city)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('city_name')); ?>:</b>
	<?php echo CHtml::encode($data->city_name); ?>
	<br />
	<?php echo CHtml::button('Sucursales',  array('submit' => array('Office/index', 'id'=>$data->id_city))); ?>
	<br />


</div>