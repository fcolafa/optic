<?php
/* @var $this SalesController */
/* @var $model Sales */

$this->breadcrumbs=array(
	Yii::t('database','Sales')=>array('index'),
	$model->id_sales,
);
if(isset($ido))
    $this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Sales'), 'url'=>array('index','ido'=>$ido)),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Sales'), 'url'=>array('create','ido'=>$ido)),
	array('label'=>Yii::t('actions','Update')." ". Yii::t('database','Sales'), 'url'=>array('update', 'id'=>$model->id_sales,'ido'=>$ido)),
	array('label'=>Yii::t('actions','Delete')." ". Yii::t('database','Sales'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_sales),'confirm'=>Yii::t('validation','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Sales'), 'url'=>array('admin','ido'=>$ido)),
);
else{

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Sales'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Sales'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." ". Yii::t('database','Sales'), 'url'=>array('update', 'id'=>$model->id_sales)),
	array('label'=>Yii::t('actions','Delete')." ". Yii::t('database','Sales'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_sales),'confirm'=>Yii::t('validation','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Sales'), 'url'=>array('admin')),
);
}
?>

<h1><?php echo Yii::t('actions','View')?> <?php echo Yii::t('database','Sales')?> #<?php echo $model->id_sales; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_sales',
		'id_client',
		'id_office',
		  array(
                'name'=>'date',
                //'value'=>'date("d M Y",strtotime($data["work_date"]))'
                'value'=>Yii::app()->dateFormatter->format("d MMMM y | HH:mm:ss",strtotime($model->date))
                ),
		'price',
        
	),
)); ?>
