<?php
/* @var $this LaboratoryController */
/* @var $model Laboratory */

$this->breadcrumbs=array(
	Yii::t('database','Laboratories')=>array('index'),
	Yii::t('actions','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ".Yii::t('database','Laboratory'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Laboratory'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','Create')?> <?php echo Yii::t('database','Laboratory')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>