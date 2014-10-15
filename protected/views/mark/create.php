<?php
/* @var $this MarkController */
/* @var $model Mark */

$this->breadcrumbs=array(
	Yii::t('database','Marks')=>array('index'),
	Yii::t('actions','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ".Yii::t('database','Mark'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Mark'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','Create')?> <?php echo Yii::t('database','Mark')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>