<?php
/* @var $this FrameMaterialController */
/* @var $model FrameMaterial */

$this->breadcrumbs=array(
	Yii::t('database','Frame Materials')=>array('index'),
	$model->id_frame_material,
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','FrameMaterial'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','FrameMaterial'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." ". Yii::t('database','FrameMaterial'), 'url'=>array('update', 'id'=>$model->id_frame_material)),
	array('label'=>Yii::t('actions','Delete')." ". Yii::t('database','FrameMaterial'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_frame_material),'confirm'=>Yii::t('validation','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','FrameMaterial'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','View')?> <?php echo Yii::t('database','FrameMaterial')?> #<?php echo $model->id_frame_material; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_frame_material',
		'frame_material_name',
	),
)); ?>
