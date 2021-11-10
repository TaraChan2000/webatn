<?php
	if(isset($_POST['search'])){
        include_once("connection.php");
		$search = $_POST['search'];
	}
   
    if($search ==''){
		echo "Sorry this Product doesn't exist";
		die();
	}else{
		$result= pg_query($conn,"SELECT * from public.product where productname LIKE '%".$search."%'");
	if(pg_num_rows($result) ==0){
		echo "Sorry this Product doesn't exist";
	}
    elseif ($result) {
        
    }else
        echo "Sorry this Product doesn't exist";
	}
	
?>

<form name="frm" method="post" action="">
	<h3>Key Words Searching: <?php echo $_POST['search']; ?></h3>
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
					<th><strong>No.</strong></th>
                    <th><strong>Product ID</strong></th>
                    <th><strong>Product Name</strong></th>
                    <th><strong>Product Description</strong></th>
                    <th><strong>Price($)</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Image</strong></th>
                </tr>
             </thead>

			<tbody>
				<?php
				$No=1;
				while($row=pg_fetch_array($result,NULL,PGSQL_ASSOC)){	
				?>
				<tr>
				<td ><?php echo $No; ?></td>
				<td ><?php echo $row["pro_id"];  ?></td>
				<td><?php echo $row["productname"];  ?></td>
				<td><?php echo $row["description"];  ?></td>
				<td><?php echo $row["price"];   ?></td>
				<td ><?php echo $row["quantity"]; ?></td>
				<td align='center' class='cotNutChucNang'>
					<img src='product/<?php echo $row['pro_image'] ?>' border='0' width="50" height="50"  /></td>
				
				</tr>
				<?php
				$No++;
				}
				?>
			</tbody>
        </table>  
 </form>
