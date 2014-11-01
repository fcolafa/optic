<?php
$this->pageTitle=Yii::app()->name .'- '. yii::t('database','Reports');
$this->breadcrumbs=array(
        yii::t('database','Reports')
);

?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<div class="form">
<h1><?php echo Yii::t('database','Reports')?></h1>
<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

    <div class="row">
        <?php echo $form->labelEx($model,'reportype'); ?>
        <?php echo $form->dropDownList($model,'reportype',array('ñe'=>'ñe'),array('prompt'=>Yii::t('actions','Select')." ".Yii::t('database','Provider'))); ?>
        <?php echo $form->error($model,'reporttype'); ?>
    </div>
    <br>
     <div class="row">
        <select class="yeareport">
            <option value> <?php echo Yii::t('actions','Select').' '.Yii::t('database','Year')?></option>
            <option value="1">Anual</option>
            <option value="2">Mensual</option>
        </select>   
    </div>
    <?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
        <br />
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint"> <?php echo Yii::t('validation','Please enter the letters as they are shown in the image above')?>.
		<br/><?php echo Yii::t('validation','Letters are not case-sensitive.')?></div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
    <br>
<div class="span-23 showgrid">
    <div class="dashboardIcons span-16">
        
        <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->createUrl('/sales/excel') ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-file.png" alt="Page" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->createUrl('/sales/excel')?>"><?php echo Yii::t('actions','Export to')?> Excel</a></div>
        </div>
       
        <div class="dashIcon span-3">
        <a target="_blank" href="<?php echo Yii::app()->createUrl('/sales/pdf') ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-file-pdf.png" alt="Page" /></a>
                 <div class="dashIconText"><a target="_blank" href="<?php echo Yii::app()->createUrl('/sales/pdf')?>"><?php echo Yii::t('actions','Export to')?> PDF</a></div>
        </div>
        
    </div>
</div>


</div>
<?php endif; ?>
