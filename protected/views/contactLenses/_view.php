<?php
/* @var $this ContactLensesController */
/* @var $data ContactLenses */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_contactlenses')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_contactlenses), array('view', 'id'=>$data->id_contactlenses)); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('idLaboratory.laboratory_name')); ?>:</b>
	<?php echo CHtml::encode(($data->id_laboratory != null)?$data->idLaboratory->laboratory_name:"no asignado"); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('idMaterial.material_name')); ?>:</b>
	<?php echo CHtml::encode($data->idMaterial->material_name); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('base_curve')); ?>:</b>
	<?php echo CHtml::encode($data->base_curve); ?>
	<br />
        

	<b><?php echo CHtml::encode($data->getAttributeLabel('dk')); ?>:</b>
	<?php echo CHtml::encode($data->dk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sphere')); ?>:</b>
	<?php echo CHtml::encode($data->sphere); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cylinder')); ?>:</b>
	<?php echo CHtml::encode($data->cylinder); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('critical_stock')); ?>:</b>
	<?php echo CHtml::encode($data->critical_stock); ?>
	<br />

	*/ ?>

</div>