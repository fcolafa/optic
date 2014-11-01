<?php
/* @var $this GlassController */
/* @var $model Glass */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'glass-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"> <?php echo Yii::t('validation','Fields with')?> <span class="required">*</span> <?php echo Yii::t('validation','are required')?> </p>

	<?php echo $form->errorSummary($model); ?>

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