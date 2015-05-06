<?php
/* @var $this FrameMaterialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    Yii::t('database','Frame Materials'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','FrameMaterial'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','FrameMaterial'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('database','Frame Materials')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
