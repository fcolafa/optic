<?php
/* @var $this FramesController */
/* @var $model Frames */

$this->breadcrumbs=array(
	Yii::t('database',Yii::t('database','Frames'))=>array('index'),
	Yii::t('actions','Manage'),
);

$this->menu=array(
array('label'=>Yii::t('actions','List')." ". Yii::t('database','Frames'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ".Yii::t('database','Frames'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#frames-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('actions','Manage')?> <?php echo Yii::t('database','Frames')?></h1>

<p>
<?php echo Yii::t('validation','You may optionally enter a comparison operator')?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
<?php echo Yii::t('validation','or')?> <b>=</b>
) <?php echo Yii::t('validation','at the beginning of each of your search values to specify how the comparison should be done')?> .
</p>

<?php //echo CHtml::link(Yii::t('actions','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'frames-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'ajaxUpdate'=>false,
	'columns'=>array(
		'frame_description',
                array(
                    'name'=>'idMark.mark_name',
                    'value'=>'$data->idMark->mark_name',
                    'filter'=>  CHtml::activeTextField($model, '_markname'),
                    ),
		
                array(
                    'name'=>'idExamplar.examplar_name',
                    'value'=>'$data->idExamplar->examplar_name',
                    'filter'=>  CHtml::activeTextField($model, '_examplarname'),
                    ),
             array(
                    'name'=>'idFrameMaterial.frame_material_name',
                    'value'=>'$data->idFrameMaterial->frame_material_name',
                    'filter'=>  CHtml::activeTextField($model, '_materialname'),
                    ),
            'amount',
            'critical_stock',
           
                
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
