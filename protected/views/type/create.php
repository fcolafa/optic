<?php
/* @var $this TypeController */
/* @var $model Type */

$this->breadcrumbs=array(
	Yii::t('database','Types')=>array('index'),
	Yii::t('actions','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ".Yii::t('database','Type'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Type'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','Create')?> <?php echo Yii::t('database','Type')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>