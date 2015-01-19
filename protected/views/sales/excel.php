
<?php
$x=0;
$amonth=array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre','Total Anual');
if(isset($office)){?>

 <h1> Reporte de ventas Anuales <?php echo $year ?> </h1>

    <table  style='border: solid 1px'>
        <tr>
            <th bgcolor="#8fcc14"> </th>
          <?php foreach($amonth as $am){
              echo "<td bgcolor='#8fcc14' style='font-weight:bold;'>".$am."</td>";
          }
?>
        </tr>
        <?php foreach ($office as $o){
            echo "<tr bgcolor='#bcf959'>";?>
        
            <td style="font-weight:bold;" ><?php echo $o->office_name;?></td>
                
                
                    <?php 
                        $command = Yii::app()->db->createCommand(" call monthsales(". $o->id_office .",".$year.") ");
                        $month = $command->queryAll();
                        $total=0;
                        $sales=array_fill(1,13,0);
                        foreach($month as $m){
                           for($i=1;$i<13;$i++){
                                if($i==intval($m['month(s.date)'])){
                                    $sales[$i]=intval($m['sum(s.price)']);
                                    $total+=intval($m['sum(s.price)']);
                                    }
                                }
                                $sales[13]=$total; 
                            }
                             foreach($sales as $sale){
                                    echo "<td style='font-weight:bold'>".$sale."</td>";
                             }
                            echo  "</tr>";
                            echo "<br>";
                                 $cmdtype = Yii::app()->db->createCommand(" call typemonthsales(". $o->id_office .",".$year.") ");
                                 $type = $cmdtype->queryAll();
                                 $totalc=0;
                                 $totalo=0;
                                 $contact=  array_fill(1, 13, 0);
                                 $optic= array_fill(1, 13, 0);
                                 foreach ($type as $ty){
                                     for($i=1;$i<13;$i++){
                                          if($i==intval($ty['month(s.date)'])&&$ty['type']=="Optico" ){
                                             $optic[$i]=intval($ty['sum(s.price)']);
                                             $totalo+=intval($ty['sum(s.price)']);
                                            }
                                            if($i==intval($ty['month(s.date)'])&&$ty['type']=="Contacto" ){
                                             $contact[$i]=intval($ty['sum(s.price)']);
                                             $totalc+=intval($ty['sum(s.price)']);
                                            }
                                  }
                                  $contact[13]=$totalc;
                                  $optic[13]=$totalo;
                                 }
                                  echo "<tr bgcolor='#d8efa7'>";
                                  echo "<td>Opticos</td>";
                                     foreach($optic as $op){
                                            echo "<td>".$op."</td>";
                                     }
                                     echo "</tr>";
                                     echo "<tr>";
                                      echo "<td>Contacto</td>";
                                     foreach($contact as $co){
                                            echo "<td>".$co."</td>";
                                     }
                                     echo "</tr>";   
                            }
                         ?>  
  
    </table>
   <br>
   <table style='border: solid 1px'>
       <?php 
       $user=  Users::model()->findAll();
       $color=1;
       foreach($user as $u){
       $usermonthsales = Yii::app()->db->createCommand(" call usersmonthsales(".$u->id_user.",".$year.") ")->queryAll();
       $totalu=0;
       
       $salesusers=array_fill(1,13,0);
       foreach($usermonthsales as $ums){
         for($i=1;$i<13;$i++){
            if($i==intval($ums['month(s.date)'])){
                $salesusers[$i]=intval($ums['sum(s.price)']);
                $totalu+=intval($ums['sum(s.price)']);
                }
            }
            $salesusers[13]=$totalu; 
          }
          
          echo $color%2==0?"<tr bgcolor='#d8efa7'>":"<tr bgcolor='#bcf959'>";
          $color+=1;
          echo "<td bgcolor='#bcf959' style='font-weight:bold'>".$u->user_name."</td>";
          foreach($salesusers as $su){
             echo  "<td>".$su."</td>";
          }
        }
        ?>
       
   </table>
         
       
<?php } ?>
        
    



