<script type='text/javascript'>
       $(document).ready(function(){

  var droplist = $('#Sales_id_type');
  if(droplist.val()!='2')
       $('#frame').hide();
  droplist.change(function(e){
    if (droplist.val() == '2') {
      $('#frame').show();
    }
    else {
      $('#frame').hide();
    }
  })
});
 
</script>
<?php
/* @var $this SalesController */
/* @var $model Sales */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sales-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"> <?php echo Yii::t('validation','Fields with')?> <span class="required">*</span> <?php echo Yii::t('validation','are required')?> </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row"> 
         <?php echo $form->labelEx($model,'id_client'); ?>
         <?php
           
             if ($model->id_client&& $model->id_client!=0)
             {
                 $value=($model->idClient->client_name.' '.$model->idClient->client_lastname .' ('.$model->idClient->client_rut.')');
             }
             else {
                 $value='';
             }
             echo $form->hiddenField($model, 'id_client' ,array());

             $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
             'name'=>'client_name',
             'model'=>$model,
             'value'=>$value,
             'sourceUrl'=>$this->createUrl('listclient'),
             'options'=>array(
             'minLength'=>'2',
             'showAnim'=>'fold',
             'select' => 'js:function(event, ui)
             { jQuery("#Sales_id_client").val(ui.item["id"]); }',
             'search'=> 'js:function(event, ui)
             { jQuery("#Sales_id_client").val(0); }'
             ),
             ));
         ?>
	</div>
        <?php if(!isset($ido)){?> 
	<div class="row">
		<?php echo $form->labelEx($model,'id_office'); ?>
		<?php echo $form->dropDownList($model,'id_office',  CHtml::listData(Office::model()->findAll(), 'id_office', 'office_name')); ?>
		<?php echo $form->error($model,'id_office'); ?>
	</div>
        <?php } ?>
              <div class="row">
		<?php echo $form->labelEx($model,'id_type'); ?>
		<?php echo $form->dropDownList($model,'id_type',CHtml::listData(Type::model()->findAll(),'id_type','type_name'),array('prompt'=>Yii::t('actions','Select')." ".Yii::t('database','Type'))); ?>
		<?php echo $form->error($model,'id_type'); ?>
	</div>
       
         
        <div class="row" id="frame">
		<?php echo $form->labelEx($model,'id_frame'); ?>
		<?php echo $form->dropDownList($model,'id_frame',CHtml::listData(Frames::model()->findAll(),'id_frame','frame_name'),array('prompt'=>Yii::t('actions','Select')." ".Yii::t('database','Frame'))); ?>
		<?php echo $form->error($model,'id_frame'); ?>
	</div>
         <div class="row">
		<?php echo $form->labelEx($model,'payment_method'); ?>
		<?php echo $form->dropDownList($model,'payment_method',array('Efectivo'=>'Efectivo','Cheque'=>'Cheque','TransBank'=>'Transbank'),array('prompt'=>'Seleccione Medio de Pago')); ?>
		<?php echo $form->error($model,'payment_method'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pay'); ?>
		<?php echo $form->textField($model,'pay'); ?>
		<?php echo $form->error($model,'pay'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>
  

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('actions','Create') : Yii::t('actions','Save'),array('class'=>Yii::app()->params['btnclass'])); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->