
<?php
$x=0;

if(isset($office)){?>
    <table border="1">
        <tr>
            <th><?php echo $year ?></th>
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
            <th>Total anual</th>
        </tr>
        <?php foreach ($office as $o){?>
        <tr>
            <td><?php echo $o->office_name;?></td>
                
                
                    <?php 
                        $command = Yii::app()->db->createCommand(" call monthsales(". $o->id_office .",'".$year."-01-01') ");
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
                        ?>  
               
    </tr>
    <br>
        <?php } ?>
    </table>
<?php } ?>
        
    



