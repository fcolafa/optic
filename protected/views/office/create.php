<?php
/* @var $this OfficeController */
/* @var $model Office */

$this->breadcrumbs=array(
	Yii::t('database','Offices')=>array('index'),
	Yii::t('actions','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ".Yii::t('database','Office'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Office'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','Create')?> <?php echo Yii::t('database','Office')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>