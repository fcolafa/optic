<?php
/* @var $this ExamplarController */
/* @var $model Examplar */

$this->breadcrumbs=array(
	Yii::t('database','Examplars')=>array('index'),
	$model->id_examplar=>array('view','id'=>$model->id_examplar),
	Yii::t('actions','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Examplar'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Examplar'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','View')." ". Yii::t('database','Examplar'), 'url'=>array('view', 'id'=>$model->id_examplar)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Examplar'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('actions','Update')?> <?php echo Yii::t('database','Examplar')?> <?php echo $model->id_examplar; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>