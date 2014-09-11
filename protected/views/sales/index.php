<?php
/* @var $this SalesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    Yii::t('database','Sales'),
);
if(isset($ido)){
$this->menu=array(
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Sales'), 'url'=>array('create','ido'=>$ido)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Sales'), 'url'=>array('admin','ido'=>$ido)),
);

}else{
$this->menu=array(
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Sales'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Sales'), 'url'=>array('admin')),
);
}
?>
<h1> <?php echo Yii::t('database','Sales')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>