<?php
/* @var $this MaterialController */
/* @var $model Material */

$this->breadcrumbs=array(
	Yii::t('database','Materials')=>array('index'),
	$model->id_material=>array('view','id'=>$model->id_material),
	Yii::t('actions','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Material'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Material'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','View')." ". Yii::t('database','Material'), 'url'=>array('view', 'id'=>$model->id_material)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Material'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('actions','Update')?> <?php echo Yii::t('database','Material')?> <?php echo $model->id_material; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>