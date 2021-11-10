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
               $result = mysqli_query($conn, "SELECT * FROM category");
               while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
               {
            ?>
			<tr>
              <td class="cotCheckBox"></td>
              <td><?php echo $row["Cat_Name"]; ?></td>
              <td><?php echo $row["Cat_Des"]; ?></td>
              <td style='text-align:center'><a href="Update_Category.php?id=<?php echo $row["Cat_ID"]; ?>">
              <img src= 'images/edit.png' border='0' /></a></td>
              <td style='text-align:center'><a href="Category_Management.php?function=del&&id=<?php echo $row["Cat_ID"]; ?>" onclick="return deleteConfirm()">
              <img src='images/delete.png' border='0' /></td>
            </tr>
            <?php
               $No++;
               }
               ?>
			</tbody>
        </table>  