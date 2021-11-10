<script language="javascript"> 
        function deleteConfirm(){ 
            if(confirm("Are you sure to delete!")){ 
                return true; 
            else{ 
                return false;  
            }
        }
    </script>
    <?php
    
               include_once("connection.php");
               $No=1;
               $result = pg_query($conn, "SELECT * FROM public.category");
               while($row=pg_fetch_array($result, NULL,PGSQL_ASSOC))
               {
            ?>
			<tr>
              <td class="cotCheckBox"></td>
              <td><?php echo $row["categoryame"]; ?></td>
              <td><?php echo $row["cat_des"]; ?></td>
              <td style='text-align:center'><a href="update_category.php?id=<?php echo $row["cat_id"]; ?>">
              <img src= 'images/edit.png' border='0' /></a></td>
              <td style='text-align:center'><a href="category_management.php?function=del&&id=<?php echo $row["cat_id"]; ?>" onclick="return deleteConfirm()">
              <img src='images/delete.png' border='0' /></td>
            </tr>
            <?php
               $No++;
               }
               ?>
			</tbody>
        </table>  