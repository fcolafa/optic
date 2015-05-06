<?php
/* @var $this FrameMaterialController */
/* @var $model FrameMaterial */

$this->breadcrumbs=array(
	Yii::t('database','Frame Materials')=>array('index'),
	Yii::t('actions','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ".Yii::t('database','FrameMaterial'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','FrameMaterial'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','Create')?> <?php echo Yii::t('database','FrameMaterial')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>