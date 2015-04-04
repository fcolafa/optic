<?php
/* @var $this SalesController */
/* @var $data Sales */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sales')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_sales), array('view', 'id'=>$data->id_sales,'ido'=>$data->id_office)); ?>
        <br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_client')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idClient->client_rut),array('client/view','id'=>$data->id_client)); ?>
        <?php echo CHtml::encode($data->idClient->client_name); ?>
        <?php echo CHtml::encode($data->idClient->client_lastname); ?>
      
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_office')); ?>:</b>
	<?php echo CHtml::encode($data->idOffice->office_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
        <?php echo CHtml::encode(Yii::app()->dateFormatter->format("d MMMM y  HH:mm:ss",strtotime($data->date))); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status==1?'finalizada':'pendiente'); ?>
	<br />
         <b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->idUser->user_name); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('delivered')); ?>:</b>
        <?php if($data->delivered==1){?>
        <?php echo CHtml::image(Yii::app()->theme->baseUrl.'/images/checked.png', 'DORE');
        }else {
         echo CHtml::image(Yii::app()->theme->baseUrl.'/images/unchecked.png', 'DORE');      
            }?>
	<br />
          
              
          

</div>