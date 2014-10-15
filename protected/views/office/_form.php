<?php
/* @var $this OfficeController */
/* @var $model Office */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'office-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"> <?php echo Yii::t('validation','Fields with')?> <span class="required">*</span> <?php echo Yii::t('validation','are required')?> </p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="row">
		<?php echo $form->labelEx($model,'id_zone'); ?>
                <?php echo $form->dropDownList($model,'id_zone' ,CHtml::listData(Zone::model()->findAll(),'id_zone','zone_name'),
			array(
                                'prompt'=>Yii::t('actions','Select')." ".Yii::t("database", "Zone"),
				'ajax'=>array(
				'type'=>'POST',
				'url'=>CController::createUrl('Office/fillcity'),
				'update'=>'#'.CHtml::activeId($model,'id_city'),
				)
			)
			);?>
		<?php echo $form->error($model,'id_zone'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'id_city'); ?>
		<?php echo $form->dropDownList($model,'id_city',CHtml::listData(City::model()->findAll('id_zone=:id_zone',array(':id_zone'=>$model->id_zone)),'id_city','city_name'),array('prompt'=>Yii::t('actions','Select')." ".Yii::t('database','City'))); ?>
		<?php echo $form->error($model,'id_city'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'office_name'); ?>
		<?php echo $form->textField($model,'office_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'office_name'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'office_address'); ?>
		<?php echo $form->textField($model,'office_address',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'office_address'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('actions','Create') : Yii::t('actions','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->