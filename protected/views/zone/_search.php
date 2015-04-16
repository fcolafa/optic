<?php
/* @var $this ZoneController */
/* @var $model Zone */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_zone'); ?>
		<?php echo $form->textField($model,'id_zone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zone_name'); ?>
		<?php echo $form->textField($model,'zone_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('actions','Search'),array('class'=>Yii::app()->params['btnclass'])); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->