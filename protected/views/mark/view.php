<?php
/* @var $this MarkController */
/* @var $model Mark */

$this->breadcrumbs=array(
	Yii::t('database','Marks')=>array('index'),
	$model->id_mark,
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Mark'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Mark'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." ". Yii::t('database','Mark'), 'url'=>array('update', 'id'=>$model->id_mark)),
	array('label'=>Yii::t('actions','Delete')." ". Yii::t('database','Mark'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_mark),'confirm'=>Yii::t('validation','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Mark'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','View')?> <?php echo Yii::t('database','Mark')?> #<?php echo $model->id_mark; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_mark',
		'mark_name',
	),
)); ?>
