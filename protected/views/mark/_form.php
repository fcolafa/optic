<?php
/* @var $this MarkController */
/* @var $model Mark */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mark-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"> <?php echo Yii::t('validation','Fields with')?> <span class="required">*</span> <?php echo Yii::t('validation','are required')?> </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_mark'); ?>
		<?php echo $form->textField($model,'id_mark'); ?>
		<?php echo $form->error($model,'id_mark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mark_name'); ?>
		<?php echo $form->textField($model,'mark_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'mark_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('actions','Create') : Yii::t('actions','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->