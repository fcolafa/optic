<?php
/* @var $this GlassController */
/* @var $model Glass */

$this->breadcrumbs=array(
	Yii::t('database','Glasses')=>array('index'),
	$model->id_glass,
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Glasses'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Glass'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." ". Yii::t('database','Glass'), 'url'=>array('update', 'id'=>$model->id_glass)),
	array('label'=>Yii::t('actions','Delete')." ". Yii::t('database','Glass'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_glass),'confirm'=>Yii::t('validation','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Glasses'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','View')?> <?php echo Yii::t('database','Glass')?> #<?php echo $model->id_glass; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_glass',
		'sphere',
		'cylinder',
		'amount',
		'critical_stock',
	),
)); ?>
