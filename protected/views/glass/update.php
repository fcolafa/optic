<?php
/* @var $this GlassController */
/* @var $model Glass */

$this->breadcrumbs=array(
	Yii::t('database','Glasses')=>array('index'),
	$model->id_glass=>array('view','id'=>$model->id_glass),
	Yii::t('actions','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Glass'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Glass'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','View')." ". Yii::t('database','Glass'), 'url'=>array('view', 'id'=>$model->id_glass)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Glass'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('actions','Update')?> <?php echo Yii::t('database','Glass')?> <?php echo $model->id_glass; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>