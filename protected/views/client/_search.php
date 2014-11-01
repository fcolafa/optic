<?php
/* @var $this ClientController */
/* @var $model Client */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_client'); ?>
		<?php echo $form->textField($model,'id_client'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_name'); ?>
		<?php echo $form->textField($model,'client_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_lastname'); ?>
		<?php echo $form->textField($model,'client_lastname',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_rut'); ?>
		<?php echo $form->textField($model,'client_rut',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_phone'); ?>
		<?php echo $form->textField($model,'client_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'righteye_sphere'); ?>
		<?php echo $form->textField($model,'righteye_sphere'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'righteye_cylinder'); ?>
		<?php echo $form->textField($model,'righteye_cylinder'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'righteye_axis'); ?>
		<?php echo $form->textField($model,'righteye_axis'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lefteye_sphere'); ?>
		<?php echo $form->textField($model,'lefteye_sphere'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lefteye_cylinder'); ?>
		<?php echo $form->textField($model,'lefteye_cylinder'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lefteye_axis'); ?>
		<?php echo $form->textField($model,'lefteye_axis'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'addition'); ?>
		<?php echo $form->textField($model,'addition'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'height'); ?>
		<?php echo $form->textField($model,'height'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pupillary_distance'); ?>
		<?php echo $form->textField($model,'pupillary_distance'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('actions','Search'),array('class'=>Yii::app()->params['btnclass'])); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->