<?php
/* @var $this CityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    Yii::t('database','Cities'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','City'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Cities'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('database','Cities')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
