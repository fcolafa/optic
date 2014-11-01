<?php
/* @var $this ExamplarController */
/* @var $model Examplar */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_examplar'); ?>
		<?php echo $form->textField($model,'id_examplar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_mark'); ?>
		<?php echo $form->textField($model,'id_mark'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'examplar_name'); ?>
		<?php echo $form->textField($model,'examplar_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('actions','Search'),array('class'=>Yii::app()->params['btnclass'])); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->