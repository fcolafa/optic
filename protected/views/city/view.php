<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	Yii::t('database','Cities')=>array('index'),
	$model->id_city,
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','City'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','City'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." ". Yii::t('database','City'), 'url'=>array('update', 'id'=>$model->id_city)),
	array('label'=>Yii::t('actions','Delete')." ". Yii::t('database','City'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_city),'confirm'=>Yii::t('validation','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','City'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','View')?> <?php echo Yii::t('database','City')?> #<?php echo $model->id_city; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_city',
		'id_zone',
		'city_name',
	),
)); ?>
