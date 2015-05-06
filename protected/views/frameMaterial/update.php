<?php
/* @var $this FrameMaterialController */
/* @var $model FrameMaterial */

$this->breadcrumbs=array(
	Yii::t('database','Frame Materials')=>array('index'),
	$model->id_frame_material=>array('view','id'=>$model->id_frame_material),
	Yii::t('actions','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','FrameMaterial'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','FrameMaterial'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','View')." ". Yii::t('database','FrameMaterial'), 'url'=>array('view', 'id'=>$model->id_frame_material)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','FrameMaterial'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('actions','Update')?> <?php echo Yii::t('database','FrameMaterial')?> <?php echo $model->id_frame_material; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>