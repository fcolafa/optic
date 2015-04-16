<?php
/* @var $this ZoneController */
/* @var $model Zone */

$this->breadcrumbs=array(
	Yii::t('database','Zones')=>array('index'),
	$model->id_zone,
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Zone'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Zone'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." ". Yii::t('database','Zone'), 'url'=>array('update', 'id'=>$model->id_zone)),
	array('label'=>Yii::t('actions','Delete')." ". Yii::t('database','Zone'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_zone),'confirm'=>Yii::t('validation','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Zone'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','View')?> <?php echo Yii::t('database','Zone')?> #<?php echo $model->id_zone; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_zone',
		'zone_name',
	),
)); ?>
