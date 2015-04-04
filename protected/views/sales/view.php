<?php
/* @var $this SalesController */
/* @var $model Sales */

$this->breadcrumbs=array(
	Yii::t('database','Sales')=>array('sales/index','ido'=>$ido),
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
                'idUser.user_name',
		  array(
                'name'=>'date',
                //'value'=>'date("d M Y",strtotime($data["work_date"]))'
                'value'=>Yii::app()->dateFormatter->format("d MMMM y | HH:mm:ss",strtotime($model->date))
                ),
                'idType.type_name',
                'pay',
		'price',
              
                array(
                  'name'=>  'idFrame.frame_name',
                  'value'=>empty($model->idFrame)?"No asignado":$model->idFrame->frame_name.", ".$model->idFrame->idExamplar->examplar_name." de ".$model->idFrame->idMark->mark_name,
                ),
                array(
                  'name'=>'delivered',
                  'value'=>$model->delivered==1?"Si":"No",
                ),
                array(
                  'name'=>'status',
                  'value'=>$model->status==1?"Finalizada":"Pendiente",
                ),
               
        
	),
)); ?>
<br>
    <?php echo CHtml::link($model->delivered==1? "Asignar Producto No Entregado":"Asignar Producto Entregado",array("sales/assign",'id'=>$model->id_sales),array('confirm'=>$model->delivered==0?'Confirma Entrega de Producto?':'Anulación de Producto Entregado?','class'=>$model->delivered==1?'button red':'button green')); ?>
