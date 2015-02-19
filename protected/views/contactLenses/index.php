<?php
/* @var $this ContactLensesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    Yii::t('database','Contact Lenses'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','ContactLenses'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','ContactLenses'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('database','Contact Lenses')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
