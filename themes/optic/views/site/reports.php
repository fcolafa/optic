
<?php
$baseUrl = Yii::app()->theme->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/sitereports.js');
$this->pageTitle=Yii::app()->name .'- '. yii::t('database','Reports');
$this->breadcrumbs=array(
        yii::t('database','Reports'),
);
?>

<h1> <?php echo Yii::t('database', 'Reports') ?> </h1>

<?php if(Yii::app()->user->hasFlash('reports')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('reports'); ?>
</div>

<?php else: ?>
<div class="form">
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-form',
	'enableClientValidation'=>false,
	
    )); ?>


    

 <p class="note"> <?php echo Yii::t('validation','Fields with')?> <span class="required">*</span> <?php echo Yii::t('validation','are required')?> </p>

	<?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model,'reportype'); ?>
        <?php echo $form->dropDownList($model,'reportype',array('1'=>'Anual','2'=>'Detallado'),array('prompt'=>Yii::t('actions','Select')." ".Yii::t('database','Report Type'))); ?>
        <?php echo $form->error($model,'reporttype'); ?>
    </div>
 
 <div class="row" id="yearrow">

        <?php 
        $year="SELECT year(t.date) FROM `sales` `t` GROUP BY year(t.date)";
        $years=  Yii::app()->db->createCommand($year)->queryAll();
        $yfinal= array();
        foreach($years as $y){
           $yfinal[$y['year(t.date)']]=$y['year(t.date)'];
        }
        ?>
     
        <?php echo $form->labelEx($model,'reportyear'); ?>
        <?php echo  $form->dropDownList($model,'reportyear',$yfinal,array('prompt'=>Yii::t('actions','Select')." ".Yii::t('database','Year')));?>
        <?php echo $form->error($model,'reportyear'); ?>
     
 </div>
 <div class="row" id="range">
        
        <?php echo $form->labelEx($model,'office'); ?>
        <?php echo  $form->dropDownList($model,'office',CHtml::listData(Office::model()->findAll(),'id_office','office_name'),array('prompt'=>Yii::t('actions','Select')." ".Yii::t('database','Office')));?>
        <?php echo $form->error($model,'office'); ?>
     
        <?php echo $form->labelEx($model,'initdate'); ?>
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
        $this->widget('CJuiDateTimePicker',array(
        'model'=>$model, //Model object
        'attribute'=>'initdate', //attribute name
               'mode'=>'datetime', //use "time","date" or "datetime" (default)
        'options'=>array(
            'dateFormat'=>'dd-mm-yy',
            'maxDate' => 'today',
        ), // jquery plugin options
    ));
        
?>
     <?php echo $form->error($model,'initdate'); ?>
        <?php echo $form->labelEx($model,'endate'); ?>
        <?php $this->widget('CJuiDateTimePicker',array(
        'model'=>$model, //Model object
        'attribute'=>'endate', //attribute name
                'mode'=>'datetime', //use "time","date" or "datetime" (default)
        'options'=>array(
            'dateFormat'=>'dd-mm-yy',
            'maxDate' => 'today',
        ), // jquery plugin options
    ));
?><?php echo $form->error($model,'endate'); ?>
     
     
     
 </div>
   
 <?php if(CCaptcha::checkRequirements()): ?>
    
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha', 
                        array(
                            'buttonLabel' => "Generate another code",
                            'showRefreshButton' => false,
                            'clickableImage' => true)); 
                ?>
        <br />
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint"> <?php echo Yii::t('validation','Please enter the letters as they are shown in the image above')?>.
		<br/><?php echo Yii::t('validation','Letters are not case-sensitive.')?></div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
 
        <div class="row buttons" >
		<?php echo CHtml::submitButton(Yii::t('actions','Generate'),array('class'=>'button grey')); ?>
	</div>

    
	<?php endif; ?>
    <br>
    <!--
<div class="span-23 showgrid">
    
    <!--
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
-->
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif;
