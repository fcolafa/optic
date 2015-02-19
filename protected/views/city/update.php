<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	Yii::t('database','Cities')=>array('index'),
	$model->id_city=>array('view','id'=>$model->id_city),
	Yii::t('actions','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Cities'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','City'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','View')." ". Yii::t('database','City'), 'url'=>array('view', 'id'=>$model->id_city)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Cities'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('actions','Update')?> <?php echo Yii::t('database','City')?> <?php echo $model->id_city; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>