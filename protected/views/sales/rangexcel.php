

<h1> Reporte Detallado <?php echo  $office->office_name?> </h1>
    <table style="border: 1px solid #000;">
        <tr>        
          <?php 
          $titles=array('Nombre Cliente', 'Apellido Cliente','Tipo de producto','Medio de Pago','Fecha de Venta','Monto de Venta','Usuario');
          foreach($titles as $t){
              echo "<td bgcolor='#8fcc14' style='font-weight:bold;'>".$t."</td>";
          }
?>
            
                    <?php 
                        $total=0;
                      
                        foreach($range as $r){
                              echo $total%2==0?"<tr bgcolor='#d8efa7'>":"<tr bgcolor='#bcf959'>";    
                              echo "<td style='font-weight:bold'>".$r['client_name']."</td>";
                              echo "<td style='font-weight:bold'>".$r['client_lastname']."</td>";
                              echo "<td style='font-weight:bold'>".$r['type_name']."</td>";
                              echo "<td style='font-weight:bold'>".Yii::app()->dateFormatter->format('d MMMM y HH:mm:ss',strtotime($r['date']))."</td>";   
                              echo "<td style='font-weight:bold'>".$r['payment_method']."</td>";
                              echo "<td style='font-weight:bold'>".$r['price']."</td>";
                              echo "<td style='font-weight:bold'>".$r['user_name']."</td>";
                              echo  "</tr>";  
                              $total+=1;
                             }
                             
                        ?>  
          
           
               
        </tr>          
    <br>
    </table>

        
    



