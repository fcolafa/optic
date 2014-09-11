<?php
/* @var $this GlassController */
/* @var $model Glass */

$this->breadcrumbs=array(
	Yii::t('database','Glasses')=>array('index'),
	Yii::t('actions','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ".Yii::t('database','Glass'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Glass'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','Create')?> <?php echo Yii::t('database','Glass')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>