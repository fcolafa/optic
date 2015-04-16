<?php
/* @var $this ZoneController */
/* @var $data Zone */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_zone')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_zone), array('view', 'id'=>$data->id_zone)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zone_name')); ?>:</b>
	<?php echo CHtml::encode($data->zone_name); ?>
        <br />
       <?php echo CHtml::button(Yii::t('database', 'Cities'),  array('class' => 'button grey','submit' => array('City/index', 'id'=>$data->id_zone))); ?>
	<br />


</div>