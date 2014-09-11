<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	Yii::t('database','Clients')=>array('index'),
	$model->id_client,
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Client'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Client'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." ". Yii::t('database','Client'), 'url'=>array('update', 'id'=>$model->id_client)),
	array('label'=>Yii::t('actions','Delete')." ". Yii::t('database','Client'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_client),'confirm'=>Yii::t('validation','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Client'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','View')?> <?php echo Yii::t('database','Client')?> #<?php echo $model->id_client; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_client',
		'client_name',
		'client_lastname',
		'client_rut',
		'client_phone',
		'righteye_sphere',
		'righteye_cylinder',
		'righteye_axis',
		'lefteye_sphere',
		'lefteye_cylinder',
		'lefteye_axis',
		'addition',
		'height',
		'comment',
	),
)); ?>
