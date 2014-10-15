<?php
/* @var $this ExamplarController */
/* @var $model Examplar */

$this->breadcrumbs=array(
	Yii::t('database','Examplars')=>array('index'),
	Yii::t('actions','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ".Yii::t('database','Examplar'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Examplar'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','Create')?> <?php echo Yii::t('database','Examplar')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>