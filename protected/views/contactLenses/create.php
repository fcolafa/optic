<?php
/* @var $this ContactLensesController */
/* @var $model ContactLenses */

$this->breadcrumbs=array(
	Yii::t('database','Contact Lenses')=>array('index'),
	Yii::t('actions','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ".Yii::t('database','ContactLenses'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','ContactLenses'), 'url'=>array('admin')),
      array('label'=>Yii::t('actions','Arrange')." ". Yii::t('database','Laboratories'), 'url'=>array('laboratory/index')),
        array('label'=>Yii::t('actions','Arrange')." ". Yii::t('database','Materials'), 'url'=>array('material/index')),
      
);
?>

<h1><?php echo Yii::t('actions','Create')?> <?php echo Yii::t('database','ContactLenses')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>