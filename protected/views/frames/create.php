<?php
/* @var $this FramesController */
/* @var $model Frames */

$this->breadcrumbs=array(
	Yii::t('database','Frames')=>array('index'),
	Yii::t('actions','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ".Yii::t('database','Frames'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Frames'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','Create')?> <?php echo Yii::t('database','Frames')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>