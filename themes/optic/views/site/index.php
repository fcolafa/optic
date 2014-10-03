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

<h1> <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<div class="span-23 showgrid">
<div class="dashboardIcons span-16">

    <div class="dashIcon span-3">
        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-people.png" alt="Customers" /></a>
        <div class="dashIconText"><a href="#">Customers</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-chart.png" alt="Page" /></a>
        <div class="dashIconText"><a href="#">Reports</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-barcode.png" alt="Products" /></a>
        <div class="dashIconText"><a href="#">Products</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-calendar.png" alt="Calendar" /></a>
        <div class="dashIconText"><a href="#">Calendar</a></div>
    </div>
    
   
    
</div><!-- END OF .dashIcons -->

   
<div class="graphic">          
<?php
  
                           

$this->beginWidget('zii.widgets.CPortlet', array(
	'title'=>Yii::t('actions','Sales Chart'),
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
                        <th>Nomviembre</th>
                        <th>Diciembre</th>
                        
                    </tr>
                </thead>
                <tbody>
                  
                        <?php 
                        $office=Office::model()->findAll();
                        ?>
                
                        <?php 
                        foreach ($office as $o){
                        echo "<tr>";   
                        echo "<th>".$o->office_name."</th>";
                        $command = Yii::app()->db->createCommand(" call monthsales(". $o->id_office .") ");
                        $month = $command->queryAll();
                        $i=1;
                       
                        foreach($month as $m){
                            while ($i<13){
                                if($i==intval($m['month(s.date)'])){
                                 echo "<td>".intval($m['sum(s.price)']) ."</td>";
                                 $i+=1;
                                 break 1;
                                }else{
                                echo "<td></td>";
                                }
                                $i+=1;
                            }                               
                            }
                        echo "</tr>";
                        }
                        ?>                 
                </tbody>
            </table>
            
            
        </div>
    </div>
</div>
<?php $this->endWidget();?>
</div>


</div>