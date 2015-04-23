<?php
/* @var $this MaterialController */
/* @var $model Material */

$this->breadcrumbs=array(
	Yii::t('database','Materials')=>array('index'),
	Yii::t('actions','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ".Yii::t('database','Material'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Material'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','Create')?> <?php echo Yii::t('database','Material')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>