
<?php  
  $baseUrl = Yii::app()->theme->baseUrl; 
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile('http://www.google.com/jsapi');
  $cs->registerCoreScript('jquery');
  $cs->registerScriptFile($baseUrl.'/js/jquery.gvChart-1.0.1.min.js');
  $cs->registerScriptFile($baseUrl.'/js/pbs.init.js');
  $cs->registerCssFile($baseUrl.'/css/jquery.css');

?>

<?php $this->pageTitle=Yii::app()->name; ?>

<h1><i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<div class="span-23 showgrid">
<div class="dashboardIcons span-16">

    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->baseurl?>/provider/"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-people.png" alt="Customers" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->baseurl?>/provider/"><?php echo Yii::t ('database','Providers') ?></a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->createUrl('/site/report') ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-chart.png" alt="Page" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->createUrl('/site/reports') ?>"><?php echo Yii::t('database','Reports')?></a></div>
    </div>
    
  
    
    <div class="dashIcon span-3">
        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-calendar.png" alt="Calendar" /></a>
        <div class="dashIconText"><a href="#">Calendar</a></div>
    </div>
  <?php if(Yii::app()->user->checkAccess('Control Total')){?>
     <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->baseurl?>/zone/"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-map2.png" alt="Calendar" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->baseurl?>/zone/"><?php echo Yii::t('database','Zones') ?></a></div>
    </div>
  <?php }?>
     
    
   
    
</div><!-- END OF .dashIcons -->

</div>
<div class="graphic">          
<?php
   
     $date=  date("Y"); 

$this->beginWidget('zii.widgets.CPortlet', array(
	'title'=>Yii::t('actions','Sales Chart')." ".$date,
));


?>
<div class="chart3">
   
    

  

       
    <div>
        <div class="text">
            <table class="myChart">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Enero</th>
                        <th>Febrero</th>
                        <th>Marzo</th>
                        <th>Abril</th>
                        <th>Mayo</th>
                        <th>Junio</th>
                        <th>Julio</th>
                        <th>Agosto</th>
                        <th>Septiembre</th>
                        <th>Octubre</th>
                        <th>Noviembre</th>
                        <th>Diciembre</th>
                        
                    </tr>
                </thead>
                <tbody>
                  
                        <?php 
                        $office=Office::model()->findAll();
                       if(isset($office)){
                        foreach ($office as $o){
                        echo "<tr>";   
                        echo "<th>".$o->office_name."</th>";
                        $command = Yii::app()->db->createCommand(" call monthsales(". $o->id_office .",'".  date("Y")."') ");
                        $month = $command->queryAll();
                        $i=1;
                        foreach($month as $m){
                          
                            while ($i<13){
                                if($i==intval($m['month(s.date)'])){
                                   
                                 echo "<td>".intval($m['sum(s.price)']) ."</td>";
                                 $i+=1;
                                 break 1;
                                }else{
                                echo "<td>0</td>";
                                }
                                $i+=1;
                            }
                            
                            }
                            
                        echo "</tr>";
                        }
                       }
                        ?>                 
                </tbody>
            </table>
            
            
        </div>
    </div>
</div>
    
<?php $this->endWidget();?>

</div>
