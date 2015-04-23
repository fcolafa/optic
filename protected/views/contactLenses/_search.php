<?php
/* @var $this ContactLensesController */
/* @var $model ContactLenses */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_contactlenses'); ?>
		<?php echo $form->textField($model,'id_contactlenses'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'base_curve'); ?>
		<?php echo $form->textField($model,'base_curve'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dk'); ?>
		<?php echo $form->textField($model,'dk'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sphere'); ?>
		<?php echo $form->textField($model,'sphere'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cylinder'); ?>
		<?php echo $form->textField($model,'cylinder'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'critical_stock'); ?>
		<?php echo $form->textField($model,'critical_stock'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('actions','Search'),array('class'=>Yii::app()->params['btnclass'])); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->