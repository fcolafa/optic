
<?php
$x=0;

if(isset($office)){?>
<h1> Reporte de ventas Anuales <?php echo $year ?> </h1>
    <table style="border: 1px solid #000;">
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
            <th>Total anual</th>
        </tr>
        <?php foreach ($office as $o){?>
        <tr>
            <td style="font-weight:bold"><?php echo $o->office_name;?></td>
                
                
                    <?php 
                        $command = Yii::app()->db->createCommand(" call monthsales(". $o->id_office .",'".$year."-01-01') ");
                        $month = $command->queryAll();
                        $i=1;
                        $total=0;
                        
                        foreach($month as $m){
                            while ($i<14){
                                if($i==intval($m['month(s.date)'])){
                                 echo "<td>".intval($m['sum(s.price)']) ."</td>";
                                 $total+=intval($m['sum(s.price)']);
                                 $i+=1;
                               
                                }else{
                                    if($i==13){
                                        echo "<td>".$total."</td>";
                                    }else
                                     echo "<td>0</td>";
                                }
                                $i+=1;
                                
                                
                                
                            }                               
                            }
                        ?>  
               
    </tr>          
    <br>
    <tr><td>ñe<td></tr>
        <?php } ?>
    </table>
<?php } ?>
        
    



