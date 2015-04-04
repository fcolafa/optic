<?php
/* @var $this TypeController */
/* @var $model Type */

$this->breadcrumbs=array(
	Yii::t('database','Types')=>array('index'),
	$model->id_type,
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Type'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Type'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." ". Yii::t('database','Type'), 'url'=>array('update', 'id'=>$model->id_type)),
	array('label'=>Yii::t('actions','Delete')." ". Yii::t('database','Type'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_type),'confirm'=>Yii::t('validation','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Type'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','View')?> <?php echo Yii::t('database','Type')?> #<?php echo $model->id_type; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_type',
		'type_name',
	),
)); ?>
