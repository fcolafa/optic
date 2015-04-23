<?php
/* @var $this MaterialController */
/* @var $model Material */

$this->breadcrumbs=array(
	Yii::t('database','Materials')=>array('index'),
	$model->id_material,
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Material'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Material'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." ". Yii::t('database','Material'), 'url'=>array('update', 'id'=>$model->id_material)),
	array('label'=>Yii::t('actions','Delete')." ". Yii::t('database','Material'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_material),'confirm'=>Yii::t('validation','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Material'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','View')?> <?php echo Yii::t('database','Material')?> #<?php echo $model->id_material; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_material',
		'material_name',
	),
)); ?>
