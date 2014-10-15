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
		<?php echo $form->textField($model,'examplar_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->