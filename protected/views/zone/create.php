<?php
/* @var $this ZoneController */
/* @var $model Zone */

$this->breadcrumbs=array(
	Yii::t('database','Zones')=>array('index'),
	Yii::t('actions','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ".Yii::t('database','Zone'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Zone'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','Create')?> <?php echo Yii::t('database','Zone')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>