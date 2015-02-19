

<h1> Reporte Detallado <?php echo $office->office_name ?></h1>
    <table style="border: 1px solid #000;">
        <tr>        
          <?php 
          $titles=array('Monto','Tipo','Nombre Cliente', 'Apellido Cliente','Fecha de Venta','Usuario','Armazon');
          foreach($titles as $t){
              echo "<td bgcolor='#8fcc14' style='font-weight:bold;'>".$t."</td>";
          }
?>
            
                    <?php 
                        $command = Yii::app()->db->createCommand(" call rangereport(". $office->id_office .",'".$initdate."','".$endate ."') ");
                        $range = $command->queryAll();
                        $total=0;
                         
                        foreach($range as $r){
                              echo $total%2==0?"<tr bgcolor='#d8efa7'>":"<tr bgcolor='#bcf959'>";
                              echo "<td style='font-weight:bold'>".$r['pay']."</td>";
                              echo "<td style='font-weight:bold'>".$r['type']."</td>";
                              echo "<td style='font-weight:bold'>".$r['client_name']."</td>";
                              echo "<td style='font-weight:bold'>".$r['client_lastname']."</td>";
                              echo "<td style='font-weight:bold'>".$r['date']."</td>";
                              echo "<td style='font-weight:bold'>".$r['user_name']."</td>";
                              echo "<td style='font-weight:bold'>".$r['frame_name']."</td>";
                              echo  "</tr>";  
                              $total+=1;
                             }
                             
                        ?>  
          
           
               
        </tr>          
    <br>
    </table>

        
    



