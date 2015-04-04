<?php
/* @var $this ProviderController */
/* @var $data Provider */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_provider')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_provider), array('view', 'id'=>$data->id_provider)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provider_name')); ?>:</b>
	<?php echo CHtml::encode($data->provider_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_provider')); ?>:</b>
	<?php echo CHtml::encode($data->email_provider); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('idType.type_name')); ?>:</b>
	<?php echo CHtml::encode($data->idType->type_name); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('upper')); ?>:</b>
	<?php echo CHtml::encode($data->upper); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('lower')); ?>:</b>
	<?php echo CHtml::encode($data->lower); ?>
	<br />

	

</div>