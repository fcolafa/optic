<?php
/* @var $this FramesController */
/* @var $model Frames */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frames-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"> <?php echo Yii::t('validation','Fields with')?> <span class="required">*</span> <?php echo Yii::t('validation','are required')?> </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_frame'); ?>
		<?php echo $form->textField($model,'id_frame'); ?>
		<?php echo $form->error($model,'id_frame'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_model'); ?>
		<?php echo $form->textField($model,'id_model'); ?>
		<?php echo $form->error($model,'id_model'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('actions','Create') : Yii::t('actions','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->