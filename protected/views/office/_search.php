<?php
/* @var $this OfficeController */
/* @var $model Office */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_office'); ?>
		<?php echo $form->textField($model,'id_office'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_city'); ?>
		<?php echo $form->textField($model,'id_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_zone'); ?>
		<?php echo $form->textField($model,'id_zone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'office_name'); ?>
		<?php echo $form->textField($model,'office_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'office_address'); ?>
		<?php echo $form->textField($model,'office_address',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('actions','Search'),array('class'=>Yii::app()->params['btnclass'])); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->