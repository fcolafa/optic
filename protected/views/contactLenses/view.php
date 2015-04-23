<?php
/* @var $this ContactLensesController */
/* @var $model ContactLenses */

$this->breadcrumbs=array(
	Yii::t('database','Contact Lenses')=>array('index'),
	$model->id_contactlenses,
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." ". Yii::t('database','ContactLenses'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." ". Yii::t('database','ContactLenses'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." ". Yii::t('database','ContactLenses'), 'url'=>array('update', 'id'=>$model->id_contactlenses)),
	array('label'=>Yii::t('actions','Delete')." ". Yii::t('database','ContactLenses'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_contactlenses),'confirm'=>Yii::t('validation','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','ContactLenses'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('actions','View')?> <?php echo Yii::t('database','ContactLenses')?> #<?php echo $model->id_contactlenses; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_contactlenses',
		'idLaboratory.laboratory_name',
		'idMaterial.material_name',
                'base_curve',
		'dk',
		'sphere',
		'cylinder',
		'amount',
		'critical_stock',
	),
)); ?>
