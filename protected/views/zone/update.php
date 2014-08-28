<?php
/* @var $this ZoneController */
/* @var $model Zone */

$this->breadcrumbs=array(
	Yii::t('database','Zones')=>array('index'),
	$model->id_zone=>array('view','id'=>$model->id_zone),
	Yii::t('actions','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Zone'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Zone'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','View')." ". Yii::t('database','Zone'), 'url'=>array('view', 'id'=>$model->id_zone)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Zone'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('actions','Update')?> <?php echo Yii::t('database','Zone')?> <?php echo $model->id_zone; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>