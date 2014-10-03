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
?>

<h1><?php echo Yii::t('actions','View')?> <?php echo Yii::t('database','Sales')?> #<?php echo $model->id_sales; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_sales',
		
            array(
                'name'=>'id_client',
                'value'=>CHtml::link(
                        ' '.$model->idClient->client_rut.' '.
                        ' '.$model->idClient->client_name.' '.
                        ' '.$model->idClient->client_lastname.' '
                        ,array('client/view','id'=>$model->id_client)),
                'type'=>'raw',
            ),
		'idOffice.office_name',
		  array(
                'name'=>'date',
                //'value'=>'date("d M Y",strtotime($data["work_date"]))'
                'value'=>Yii::app()->dateFormatter->format("d MMMM y | HH:mm:ss",strtotime($model->date))
                ),
                'type',
                'pay',
		'price',
                array(
                  'name'=>'status',
                    'value'=>$model->status==1?"Finalizada":"Pendiente",
                ),
        
	),
)); ?>
