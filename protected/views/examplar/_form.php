<?php
/* @var $this ExamplarController */
/* @var $model Examplar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'examplar-form',
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
		<?php echo $form->dropDownList($model,'id_mark',CHtml::listData(Mark::model()->findAll(),'id_mark','mark_name'),array('prompt'=>Yii::t('actions','Select')." ".Yii::t('database','Mark')));$form->textField($model,'id_mark'); ?>
		<?php echo $form->error($model,'id_mark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'examplar_name'); ?>
		<?php echo $form->textField($model,'examplar_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'examplar_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('actions','Create') : Yii::t('actions','Save'),array('class'=>Yii::app()->params['btnclass'])); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->