<?php
/* @var $this OfficeController */
/* @var $model Office */

$this->breadcrumbs=array(
	Yii::t('database','Offices')=>array('index'),
	$model->id_office=>array('view','id'=>$model->id_office),
	Yii::t('actions','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Office'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Office'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','View')." ". Yii::t('database','Office'), 'url'=>array('view', 'id'=>$model->id_office)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Office'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('actions','Update')?> <?php echo Yii::t('database','Office')?> <?php echo $model->id_office; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>