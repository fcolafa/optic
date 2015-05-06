<?php
/* @var $this FrameMaterialController */
/* @var $model FrameMaterial */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_frame_material'); ?>
		<?php echo $form->textField($model,'id_frame_material'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'frame_material_name'); ?>
		<?php echo $form->textField($model,'frame_material_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('actions','Search'),array('class'=>Yii::app()->params['btnclass'])); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->