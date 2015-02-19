<?php
/* @var $this FramesController */
/* @var $model Frames */

$this->breadcrumbs=array(
	Yii::t('database','Frames')=>array('index'),
	$model->id_frame,
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Frames'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Frames'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." ". Yii::t('database','Frames'), 'url'=>array('update', 'id'=>$model->id_frame)),
	array('label'=>Yii::t('actions','Delete')." ". Yii::t('database','Frames'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_frame),'confirm'=>Yii::t('validation','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Frames'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','View')?> <?php echo Yii::t('database','Frames')?> #<?php echo $model->id_frame; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_frame',
		'id_examplar',
		'id_mark',
                'frame_name',
	),
)); ?>
