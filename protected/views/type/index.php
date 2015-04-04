<?php
/* @var $this TypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    Yii::t('database','Types'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Type'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Type'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('database','Types')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
