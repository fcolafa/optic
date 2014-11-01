<?php
/* @var $this GlassController */
/* @var $model Glass */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_glass'); ?>
		<?php echo $form->textField($model,'id_glass'); ?>
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