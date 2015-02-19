<?php
/* @var $this ExamplarController */
/* @var $model Examplar */

$this->breadcrumbs=array(
	Yii::t('database','Examplars')=>array('index'),
	$model->id_examplar,
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Examplar'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Examplar'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." ". Yii::t('database','Examplar'), 'url'=>array('update', 'id'=>$model->id_examplar)),
	array('label'=>Yii::t('actions','Delete')." ". Yii::t('database','Examplar'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_examplar),'confirm'=>Yii::t('validation','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Examplar'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','View')?> <?php echo Yii::t('database','Examplar')?> #<?php echo $model->id_examplar; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_examplar',
		'idMark.mark_name',
		'examplar_name',
	),
)); ?>
