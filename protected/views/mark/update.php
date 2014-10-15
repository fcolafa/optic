<?php
/* @var $this MarkController */
/* @var $model Mark */

$this->breadcrumbs=array(
	Yii::t('database','Marks')=>array('index'),
	$model->id_mark=>array('view','id'=>$model->id_mark),
	Yii::t('actions','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Mark'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Mark'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','View')." ". Yii::t('database','Mark'), 'url'=>array('view', 'id'=>$model->id_mark)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Mark'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('actions','Update')?> <?php echo Yii::t('database','Mark')?> <?php echo $model->id_mark; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>