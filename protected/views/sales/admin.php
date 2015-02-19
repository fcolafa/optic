<?php
/* @var $this SalesController */
/* @var $model Sales */

$this->breadcrumbs=array(
	Yii::t('database',Yii::t('database','Sales'))=>array('index','ido'=>$ido),
	Yii::t('actions','Manage'),
);


if(isset($ido)){
$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','Sales'), 'url'=>array('index','ido'=>$ido)),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Sales'), 'url'=>array('create','ido'=>$ido)),
);

}else{
$this->menu=array(
        array('label'=>Yii::t('actions','List')." ". Yii::t('database','Sales'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','Sales'), 'url'=>array('create')),
	
);
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sales-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('actions','Manage')?> <?php echo Yii::t('database','Sales')?></h1>

<p>
<?php echo Yii::t('validation','You may optionally enter a comparison operator')?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
<?php echo Yii::t('validation','or')?> <b>=</b>
) <?php echo Yii::t('validation','at the beginning of each of your search values to specify how the comparison should be done')?> .
</p>

<?php echo CHtml::link(Yii::t('actions','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sales-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'ajaxUpdate'=>false,
        'afterAjaxUpdate'=>"function(){
                $.datepicker.setDefaults($.datepicker.regional['es']);
                $('#datepicker_for_due_date').datepicker({'dateFormat': 'yy-mm-dd'});

            }",  
	'columns'=>array(
		'id_sales',
                array('name'=>'idClient.client_rut',
                    'value'=>'$data->idClient->client_rut',
                    'filter'=>  CHtml::activeTextField($model, '_clientrut'),
                    ),
		array('name'=>'idClient.client_name',
                    'value'=>'$data->idClient->client_name',
                    'filter'=>  CHtml::activeTextField($model, '_clientname'),
                    ),
                array('name'=>'idClient.client_lastname',
                    'value'=>'$data->idClient->client_lastname',
                    'filter'=>  CHtml::activeTextField($model, '_clientlname'),
                    ),
            
                array(
                    'name'=>'idUser.user_name',
                    'value'=>'$data->idUser->user_name',
                    'filter'=>  CHtml::activeTextField($model, '_username'),
                    ),
            
                array(    
                    'name'=>'type',
                    'filter'=>array('Optico'=>'Optico','Contacto'=>'Contacto'),
                    'value'=>'$data->type',
      
                ),
              
          
		  array(
                'name'=>'date',
                //'value'=>'date("d M Y",strtotime($data["work_date"]))'
                'value'=>'Yii::app()->dateFormatter->format("d MMMM y \n HH:mm:ss",strtotime($data->date))'
                ),
		'price',
                array(
                    
                    'name'=>'status',
                    'filter'=>array('1'=>'Finalizada','0'=>'Pendiente'),
                    'value'=>'($data->status=="1")?("Finalizada"):("Pendiente")'
      
                ),
            
               
        
		array(
			'class'=>'CButtonColumn',
                        'buttons'=>array(
                        'view'=>array(
                            'url'=>'Yii::app()->controller->createUrl("view",array("id"=>"$data->id_sales","ido"=>"'.$ido.'"));',
                         ),
                            'update'=>array(
                            'url'=>'Yii::app()->controller->createUrl("update",array("id"=>"$data->id_sales","ido"=>"'.$ido.'"));',
                         ),
                            'delete'=>array(
                                'visible'=>'true',
                                'url'=>'Yii::app()->controller->createUrl("delete",array("id"=>"$data->id_sales"));',
                                'afterDelete'=>'function(link,success,data){ if(success) $("#flashes").html(data); }',
                            )
                        ),
		),
            
            
	),
)); 

Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
        //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
    $('#datepicker_for_due_date').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['es'],{'dateFormat':'yy-mm-dd'}));
}
");
?>
