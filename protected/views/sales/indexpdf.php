<?php
/* @var $this SucursalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'PDF',
);
?>
<img src="C:\xampp\htdocs\optic\themes\optic\images\logo.png" /> 
<h1 align="center">Informe de Sucursales</h1>
<br>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$office,
	'itemView'=>'_viewpdf',
)); ?>


