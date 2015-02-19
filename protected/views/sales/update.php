<?php
/* @var $this SalesController */
/* @var $model Sales */

$this->breadcrumbs=array(
	Yii::t('database','Sales')=>array('index'),
	$model->id_sales=>array('view','id'=>$model->id_sales),
	Yii::t('actions','Update'),
);

$this->menu=array(
        array('label'=>Yii::t('actions','List')." ". Yii::t('database','Sales'), 'url'=>array('index','ido'=>$ido)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Sales'), 'url'=>array('admin','ido'=>$ido)),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Sales'), 'url'=>array('create','ido'=>$ido)),
	array('label'=>Yii::t('actions','View')." ". Yii::t('database','Sales'), 'url'=>array('view', 'id'=>$model->id_sales, 'ido'=>$ido)),
);
?>

<h1> <?php echo Yii::t('actions','Update')?> <?php echo Yii::t('database','Sales')?> <?php echo $model->id_sales; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>