<?php
/* @var $this ContactLensesController */
/* @var $model ContactLenses */

$this->breadcrumbs=array(
	Yii::t('database',Yii::t('database','Contact Lenses'))=>array('index'),
	Yii::t('actions','Manage'),
);

$this->menu=array(
array('label'=>Yii::t('actions','List')." ". Yii::t('database','ContactLenses'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ".Yii::t('database','ContactLenses'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#contact-lenses-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('actions','Manage')?> <?php echo Yii::t('database','Contact Lenses')?></h1>

<p>
<?php echo Yii::t('validation','You may optionally enter a comparison operator')?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
<?php echo Yii::t('validation','or')?> <b>=</b>
) <?php echo Yii::t('validation','at the beginning of each of your search values to specify how the comparison should be done')?> .
</p>

<?php // echo CHtml::link(Yii::t('actions','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contact-lenses-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'ajaxUpdate'=>false,
	'columns'=>array(
		'id_contactlenses',
                array('name'=>'idLaboratory.laboratory_name',
                    'value'=>'($data->id_laboratory != null)?($data->idLaboratory->laboratory_name):("no asignado")',
                    'filter'=>  CHtml::activeTextField($model, '_laboratoryname'),
                    ),
                    array('name'=>'idMaterial.material_name',
                    'value'=>'$data->idMaterial->material_name',
                    'filter'=>  CHtml::activeTextField($model, '_materialname'),
                    ),
		'base_curve',
		'dk',
		'sphere',
		 
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
