<?php
/* @var $this LaboratoryController */
/* @var $model Laboratory */

$this->breadcrumbs=array(
	Yii::t('database','Laboratories')=>array('index'),
	$model->id_laboratory,
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Laboratory'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Laboratory'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." ". Yii::t('database','Laboratory'), 'url'=>array('update', 'id'=>$model->id_laboratory)),
	array('label'=>Yii::t('actions','Delete')." ". Yii::t('database','Laboratory'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_laboratory),'confirm'=>Yii::t('validation','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Laboratory'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','View')?> <?php echo Yii::t('database','Laboratory')?> #<?php echo $model->id_laboratory; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_laboratory',
		'laboratory_name',
	),
)); ?>
