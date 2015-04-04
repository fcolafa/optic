<?php
/* @var $this TypeController */
/* @var $model Type */

$this->breadcrumbs=array(
	Yii::t('database','Types')=>array('index'),
	$model->id_type=>array('view','id'=>$model->id_type),
	Yii::t('actions','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Type'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Type'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','View')." ". Yii::t('database','Type'), 'url'=>array('view', 'id'=>$model->id_type)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Type'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('actions','Update')?> <?php echo Yii::t('database','Type')?> <?php echo $model->id_type; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>