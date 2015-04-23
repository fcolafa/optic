<?php
/* @var $this MaterialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    Yii::t('database','Materials'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Material'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Material'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('database','Materials')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
