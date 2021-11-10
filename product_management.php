<?php
    if(!isset($_SESSION['admin']) OR $_SESSION['admin']==0)
    {
        echo '<script> alert("You are not administrator");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
    }
    else
    {
?>
<script language="javascript">
    function deleteConfirm(){
        if(confirm("Are you sure to delete?")){
            return true;
        }
        else{
            return false;
        }
    }
</script>    
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

        <form name="frm" method="post" action="">
        <h1>Product Management</h1>
        <p>
        	<img src="images1/add.png" width="16" height="16" border="0" /><a href="?page=add_product"> Add new</a>
        </p>
        <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Product ID</strong></th>
                    <th><strong>Product Name</strong></th>
                    <th><strong>Price</strong></th>
                    <th><strong>Description</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Category ID</strong></th>
                    <th><strong>Store ID</strong></th>
                    <th><strong>Image</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
				include_once("connection.php");

                if(isset($_GET["function"])=="del"){
                    if(isset($_GET["id"])){
                        $id = $_GET["id"];
                        $sq = "select pro_image from public.product where pro_id='$id'";
                        $res = mysqli_query($conn, $sq);
                        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
                        $filePic = $row['pro_image'];
                        unlink("product/".$filePic);
                        mysqli_query($conn, "Delete From public.product where pro_id='$id'");
                    }
                }

                $No=1;
                $result = mysqli_query($conn, "Select * from public.product a, public.category b, public.store c where a.cat_id = b.cat_id && a.store_id = c.store_id");
                while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    ?>
                			
			<tr>
              <td ><?php echo $No; ?></td>
              <td ><?php echo $row["pro_id"]; ?></td>
              <td><?php echo $row["productname"]; ?></td>
              <td><?php echo $row["price"]; ?></td>
              <td><?php echo $row["description"]; ?></td>
              <td ><?php echo $row["quantity"]; ?></td>
              <td><?php echo $row["categoryname"]; ?></td>
              <td><?php echo $row["store_name"]; ?></td>
             <td align='center' class='cotNutChucNang'>
                <img src='product/<?php echo $row['pro_image'] ?>' border='0' width="50" height="50"/></td>
             <td align='center' class='cotNutChucNang'><a href="?page=update_product&&function=del&&id=<?php echo $row["pro_id"];?>"><img src='images1/edit.png' border='0'/></a></td>
             <td align='center' class='cotNutChucNang'><a href="?page=product_management&&function=del&&id=<?php echo $row["pro_id"];?>" onclick="return deleteConfirm()"><img src='images1/delete.png' border='0' /></a></td>
            </tr>
            <?php
               $No++;
                }
			?>
			</tbody>
        
        </table>  

 </form>
<?php
    }
?>