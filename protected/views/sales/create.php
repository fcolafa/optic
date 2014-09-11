<?php
/* @var $this SalesController */
/* @var $model Sales */

$this->breadcrumbs=array(
	Yii::t('database','Sales')=>array('index'),
	Yii::t('actions','Create'),
);

if(isset($ido)){
$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Sales'), 'url'=>array('index','ido'=>$ido)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Sales'), 'url'=>array('admin','ido'=>$ido)),
);

}else{
$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Sales'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Sales'), 'url'=>array('admin')),
);
}
?>

<h1><?php echo Yii::t('actions','Create')?> <?php echo Yii::t('database','Sales')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'ido'=>$ido)); ?>