<?php
/* @var $this ProviderController */
/* @var $model Provider */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'provider-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"> <?php echo Yii::t('validation','Fields with')?> <span class="required">*</span> <?php echo Yii::t('validation','are required')?> </p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'provider_name'); ?>
		<?php echo $form->textField($model,'provider_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'provider_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_provider'); ?>
		<?php echo $form->textField($model,'email_provider',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email_provider'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'idType.type_name'); ?>
		<?php echo $form->dropDownList($model,'id_type',CHtml::listData(Type::model()->findAll(),'id_type','type_name'),array('prompt'=>Yii::t('actions','Select')." ".Yii::t('database','Type'))); ?>
		<?php echo $form->error($model,'id_type'); ?>
	</div>
       

	<div class="row">
		<?php echo $form->labelEx($model,'upper'); ?>
		<?php echo $form->numberField($model,'upper',array('step'=>0.25)); ?>
		<?php echo $form->error($model,'upper'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lower'); ?>
		<?php echo $form->numberField($model,'lower',array('step'=>0.25)); ?>
		<?php echo $form->error($model,'lower'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('actions','Create') : Yii::t('actions','Save'),array('class'=>Yii::app()->params['btnclass'])); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->