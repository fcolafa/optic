<?php
/* @var $this LaboratoryController */
/* @var $model Laboratory */

$this->breadcrumbs=array(
	Yii::t('database','Laboratories')=>array('index'),
	$model->id_laboratory=>array('view','id'=>$model->id_laboratory),
	Yii::t('actions','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Laboratory'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Laboratory'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','View')." ". Yii::t('database','Laboratory'), 'url'=>array('view', 'id'=>$model->id_laboratory)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Laboratory'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('actions','Update')?> <?php echo Yii::t('database','Laboratory')?> <?php echo $model->id_laboratory; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>