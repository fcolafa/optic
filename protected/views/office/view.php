<?php
/* @var $this OfficeController */
/* @var $model Office */

$this->breadcrumbs=array(
	Yii::t('database','Offices')=>array('index'),
	$model->id_office,
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Office'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Office'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." ". Yii::t('database','Office'), 'url'=>array('update', 'id'=>$model->id_office)),
	array('label'=>Yii::t('actions','Delete')." ". Yii::t('database','Office'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_office),'confirm'=>Yii::t('validation','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Office'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','View')?> <?php echo Yii::t('database','Office')?> #<?php echo $model->id_office; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_office',
		'id_city',
		'id_zone',
		'office_name',
	),
)); ?>
