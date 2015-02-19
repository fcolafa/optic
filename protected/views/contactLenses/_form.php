<?php
/* @var $this ContactLensesController */
/* @var $model ContactLenses */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-lenses-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"> <?php echo Yii::t('validation','Fields with')?> <span class="required">*</span> <?php echo Yii::t('validation','are required')?> </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_contactlenses'); ?>
		<?php echo $form->textField($model,'id_contactlenses'); ?>
		<?php echo $form->error($model,'id_contactlenses'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'base_curve'); ?>
		<?php echo $form->textField($model,'base_curve'); ?>
		<?php echo $form->error($model,'base_curve'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'material'); ?>
		<?php echo $form->textField($model,'material',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'material'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'laboratory'); ?>
		<?php echo $form->textField($model,'laboratory',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'laboratory'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dk'); ?>
		<?php echo $form->numberField($model,'dk'); ?>
		<?php echo $form->error($model,'dk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sphere'); ?>
		<?php echo $form->numberField($model,'sphere',array('step'=>0.25)); ?>
		<?php echo $form->error($model,'sphere'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cylinder'); ?>
		<?php echo $form->numberField($model,'cylinder',array('step'=>0.25)); ?>
		<?php echo $form->error($model,'cylinder'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->numberField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'critical_stock'); ?>
		<?php echo $form->numberField($model, 'critical_stock') ;?>
		<?php echo $form->error($model,'critical_stock'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('actions','Create') : Yii::t('actions','Save'),array('class'=>Yii::app()->params['btnclass'])); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->