<?php
/* @var $this ProviderController */
/* @var $model Provider */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'provider-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"> <?php echo Yii::t('validation','Fields with')?> <span class="required">*</span> <?php echo Yii::t('validation','are required')?> </p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'provider_name'); ?>
		<?php echo $form->textField($model,'provider_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'provider_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_provider'); ?>
		<?php echo $form->textField($model,'email_provider',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email_provider'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'upper'); ?>
		<?php echo $form->numberField($model,'upper',array('step'=>0.25)); ?>
		<?php echo $form->error($model,'upper'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lower'); ?>
		<?php echo $form->numberField($model,'lower',array('step'=>0.25)); ?>
		<?php echo $form->error($model,'lower'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('actions','Create') : Yii::t('actions','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->