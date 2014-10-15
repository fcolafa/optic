<?php
/* @var $this FramesController */
/* @var $model Frames */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_frame'); ?>
		<?php echo $form->textField($model,'id_frame'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_model'); ?>
		<?php echo $form->textField($model,'id_model'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->