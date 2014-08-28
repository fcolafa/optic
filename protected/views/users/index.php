<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    Yii::t('database','Users'),
);

$this->menu=array(
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Users'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Users'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('database','Users')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
