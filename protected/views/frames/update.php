<?php
/* @var $this FramesController */
/* @var $model Frames */

$this->breadcrumbs=array(
	Yii::t('database','Frames')=>array('index'),
	$model->id_frame=>array('view','id'=>$model->id_frame),
	Yii::t('actions','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Frames'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Frames'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','View')." ". Yii::t('database','Frames'), 'url'=>array('view', 'id'=>$model->id_frame)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Frames'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('actions','Update')?> <?php echo Yii::t('database','Frames')?> <?php echo $model->id_frame; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>