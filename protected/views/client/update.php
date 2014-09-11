<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	Yii::t('database','Clients')=>array('index'),
	$model->id_client=>array('view','id'=>$model->id_client),
	Yii::t('actions','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Client'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Client'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','View')." ". Yii::t('database','Client'), 'url'=>array('view', 'id'=>$model->id_client)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Client'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('actions','Update')?> <?php echo Yii::t('database','Client')?> <?php echo $model->id_client; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>