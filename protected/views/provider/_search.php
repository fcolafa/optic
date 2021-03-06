<?php
/* @var $this ProviderController */
/* @var $model Provider */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_provider'); ?>
		<?php echo $form->textField($model,'id_provider'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'provider_name'); ?>
		<?php echo $form->textField($model,'provider_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_provider'); ?>
		<?php echo $form->textField($model,'email_provider',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'upper'); ?>
		<?php echo $form->textField($model,'upper'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lower'); ?>
		<?php echo $form->textField($model,'lower'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_type'); ?>
		<?php echo $form->textField($model,'id_type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('actions','Search'),array('class'=>Yii::app()->params['btnclass'])); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->