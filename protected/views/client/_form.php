<?php
/* @var $this ClientController */
/* @var $model Client */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-form',
     
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
     
)); ?>

	<p class="note"> <?php echo Yii::t('validation','Fields with')?> <span class="required">*</span> <?php echo Yii::t('validation','are required')?> </p>

	<?php echo $form->errorSummary($model); ?>
        <table>
            <tr>
                <td>
                    <div class="row">
            
		<?php echo $form->labelEx($model,'client_name'); ?>
		<?php echo $form->textField($model,'client_name',array('size'=>20,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'client_name'); ?>
                    </div>
                </td>
                <td>
                     <div class="row">
                        <?php echo $form->labelEx($model,'client_lastname'); ?>
                        <?php echo $form->textField($model,'client_lastname',array('size'=>20,'maxlength'=>45)); ?>
                        <?php echo $form->error($model,'client_lastname'); ?>
                        </div>
                </td>
            </tr>
            <tr>
     
                <td>
                    <div class="row">
                        <?php echo $form->labelEx($model,'client_rut'); ?>
                        <?php echo $form->textField($model,'client_rut',array('size'=>20,'maxlength'=>20)); ?>
                        <?php echo $form->error($model,'client_rut'); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                            <?php echo $form->labelEx($model,'client_phone'); ?>
                            <?php echo $form->textField($model,'client_phone'); ?>
                            <?php echo $form->error($model,'client_phone'); ?>
                    </div>
                </td>
        </tr>
	 <tr>
            <td>
                  <div class="row">
                        <?php echo $form->labelEx($model,'righteye_sphere'); ?>
                        <?php echo $form->numberField($model,'righteye_sphere',array('step'=>0.25)); ?>
                        <?php echo $form->error($model,'righteye_sphere'); ?>
                </div>
           </td>
            <td>
                <div class="row">
		<?php echo $form->labelEx($model,'righteye_cylinder'); ?>
		<?php echo $form->numberField($model,'righteye_cylinder',array('step'=>0.25)); ?>
		<?php echo $form->error($model,'righteye_cylinder'); ?>
            </div>
           
            </td>
            <td>
                <div class="row">
		<?php echo $form->labelEx($model,'righteye_axis'); ?>
		<?php echo $form->numberField($model,'righteye_axis'); ?>
		<?php echo $form->error($model,'righteye_axis'); ?>
            </div>
                
            </td>

        </tr>
        <tr>
            <td>
                <div class="row">
                        <?php echo $form->labelEx($model,'lefteye_sphere'); ?>
                        <?php echo $form->numberField($model,'lefteye_sphere',array('step'=>0.25)); ?>
                        <?php echo $form->error($model,'lefteye_sphere'); ?>
                </div>
            </td>
            <td>
                <div class="row">
                        <?php echo $form->labelEx($model,'lefteye_cylinder'); ?>
                        <?php echo $form->numberField($model,'lefteye_cylinder',array('step'=>0.25)); ?>
                        <?php echo $form->error($model,'lefteye_cylinder'); ?>
                </div>
              
            </td>
            <td>
                <div class="row">
		<?php echo $form->labelEx($model,'lefteye_axis'); ?>
		<?php echo $form->numberField($model,'lefteye_axis'); ?>
		<?php echo $form->error($model,'lefteye_axis'); ?>
                </div>
            </td>
        </tr>
       
	
        
           <tr>
            <td>
                <div class="row">
                        <?php echo $form->labelEx($model,'pupillary_distance'); ?>
                        <?php echo $form->textField($model,'pupillary_distance'); ?>
                        <?php echo $form->error($model,'pupillary_distance'); ?>
                </div>
            </td>
        </tr>

	

	
        <tr>
            <td>
                <div class="row">
                        <?php echo $form->labelEx($model,'addition'); ?>
                        <?php echo $form->numberField($model,'addition',array('step'=>0.1)); ?>
                        <?php echo $form->error($model,'addition'); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="row">
                        <?php echo $form->labelEx($model,'height'); ?>
                        <?php echo $form->numberField($model,'height',array('step'=>0.1)); ?>
                        <?php echo $form->error($model,'height'); ?>
                </div>
            </td>
        </tr>
      
        <tr>
            <td>
                <div class="row">
                        <?php echo $form->labelEx($model,'comment'); ?>
                        <?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>20)); ?>
                        <?php echo $form->error($model,'comment'); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('actions','Create') : Yii::t('actions','Save'),array('class'=>Yii::app()->params['btnclass'])); ?>
                        
                </div>
            </td>
        </tr>
        </table>
         

<?php $this->endWidget(); ?>

</div><!-- form -->