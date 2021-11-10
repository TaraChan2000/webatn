<?php
if(isset($_SESSION['admin']) && $_SESSION['admin']==1)
{
?>
<!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>
<?php
	include_once("connection.php");
	function bind_Category_List($conn,$selectedValue){
		$sqlstring="SELECT cat_id, categoryname from public.category";
		$result=mysqli_query($conn,$sqlstring);
		echo"<Select name='CategoryList' class='form-control'>
			<option value='0'>Choose category</option>";
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				if($row['cat_id']==$selectedValue){
					echo"<option value='". $row['cat_id']."' selected>".$row['categoryname']."</option>";
				}
				else{
					echo"<option value='". $row['cat_id']."'>".$row['categoryname']."</option>";
				}
			}
	echo"</select>";
	}
	function bind_Store_List($conn,$selectedValue){
		$sqlstring="SELECT store_id, store_name from public.store";
		$result=mysqli_query($conn,$sqlstring);
		echo"<Select name='StoreList' class='form-control'>
			<option value='0'>Choose store</option>";
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				if($row['cat_id']==$selectedValue){
					echo"<option value='". $row['store_id']."' selected>".$row['store_name']."</option>";
				}
				else{
					echo"<option value='". $row['store_id']."'>".$row['store_name']."</option>";
				}
			}
	echo"</select>";
	}
	if(isset($_GET["id"])){
		$id=$_GET["id"];
		$sqlstring="SELECT store_id, cat_id, productname, price, pro_image, quantity, description,
		from public.product where pro_id='$id'";
		$result = mysqli_query($conn,$sqlstring);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $storeid=$row["store_id"];
        $category=$row["cat_id"];
		$proname=$row["productname"];
		$price=$row['price'];
		$pic=$row['pro_image'];
        $qty=$row['quantity'];
        $description=$row['description'];
?>
<div class="container">
	<h2>Updating Product</h2>

	 	<form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
				<div class="form-group">
					<label for="txtTen" class="col-sm-2 control-label">Product ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" 
								  placeholder="Product ID" readonly value='<?php echo $id; ?>'/>
							</div>
				</div> 
				<div class="form-group"> 
					<label for="txtTen" class="col-sm-2 control-label">Product Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" 
								  placeholder="Product Name" value='<?php echo $proname; ?>'/>
							</div>
                </div>   
                <div class="form-group">   
                    <label for="" class="col-sm-2 control-label">Product category(*):  </label>
							<div class="col-sm-10">
							    <?php bind_Category_List($conn, $category); ?>
							</div>
                </div> 
                <div class="form-group">   
                    <label for="" class="col-sm-2 control-label">Product store(*):  </label>
							<div class="col-sm-10">
							    <?php bind_Store_List($conn, $storeid); ?>
							</div>
                </div> 
                          
                <div class="form-group">  
                    <label for="lblGia" class="col-sm-2 control-label">Price(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value='<?php echo $price; ?>'/>
							</div>
                 </div>  

				 <div class="form-group">   
                    <label for="lblShort" class="col-sm-2 control-label">Description(*):  </label>
							<div class="col-sm-10">
<input type="text" name="txtdescription" id="txtdescription" class="form-control" placeholder="Description" value='<?php echo $description; ?>'/>
							</div>
                </div>
                           
                            
            	<div class="form-group">  
                    <label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*):  </label>
							<div class="col-sm-10">
							      <input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value="<?php echo $qty; ?>"/>
							</div>
                </div>
 
				<div class="form-group">  
	                <label for="sphinhanh" class="col-sm-2 control-label">Image(*):  </label>
							<div class="col-sm-10">
						      	<img src='product/<?php echo $pic; ?>' border='0' width="50" height="50"  />
                                <input type="file" name="txtImage" id="txtImage" class="form-control" value=""/>
							</div>
                </div>
                        
				<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
                              	
						</div>
				</div>
			</form>
</div>
<?php
	}
	else{
		echo'<meta http-equiv="refresh" content="0;URL=?page=product_management"/>';
	}
?>
<?php	
	if(isset($_POST["btnUpdate"]))
	{
		$id=$_POST["txtID"];
    	$proname=$_POST["txtName"];
	    $description=$_POST["txtdescription"];
    	$price=$_POST["txtPrice"];
	    $qty=$_POST["txtQty"];
	    $pic=$_FILES['txtImage'];
	    $store=$_POST['StoreList'];
	    $category=$_POST['CategoryList'];
		$err="";
		if(trim($id)==""){
			$err.="<li>Enter product ID, please</li>";
		}
		if(trim($proname)==""){
			$err.="<li>Enter product name, please</li>";
		}
		if(!is_numeric($price)){
			$err.="<li>Product price must be number</li>";
		}
		if(!is_numeric($qty)){
			$err.="<li>Product price must be number</li>";
		}
		if($err!=""){
			echo "<ul>$err</ul>";
		}
		else{
			if($pic['name']!="")
			{
			    if($pic['type']=="image/jpg" || $pic['type']=="image/jpeg" ||$pic['type']=="image/png"
			        ||$pic['type']=="image/gif"){
				    if($pic['size']<= 614400){
                        $sq="SELECT * from public.product where pro_id != '$id' or productname='$proname'";
					    $result=mysqli_query($conn,$sq);
					    if(mysqli_num_rows($result)==0)
                        {
						        copy($pic['tmp_name'], "product/".$pic['name']);
						        $filePic = $pic['name'];
						        $sqlstring="UPDATE public.product set store_id = '$store', cat_id = '$category', productname = '$proname', 
                                price = '$price', pro_image = '$filePic', quantity = '$qty', description = '$description'
						        WHERE pro_id='$id'";
						        mysqli_query($conn,$sqlstring);
						        echo '<meta http-equiv="refresh" content="0;URL=?page=product_management"/>';
					        }

					        else{
						        echo "<li>Duplicate product Name</li>";
					        }
				        }
				        else{
					        echo "Size of image too big";
				        }
			        }
			        else{
				        echo "Image format is not correct";
			        }		
		    }
		    else{
				$sq="SELECT * from public.product where pro_id != '$id' and productname='$proname'";
				$result=mysqli_query($conn,$sq);
				if(mysqli_num_rows($result)==0){
					$sqlstring="UPDATE public.product set 
                    store_id = '$store', cat_id = '$category', productname = '$proname', 
                    price = '$price', pro_image = '$filePic', quantity = '$qty', description = '$description'
			        WHERE pro_id='$id'";
					mysqli_query($conn,$sqlstring);
                    echo '<meta http-equiv="refresh" content="0;URL=?page=product_management"/>';
				}
				else{
					echo "<li>Duplicate product Name</li>";
				}
			}		
	    }
	}	
?>
<?php
}
else 
{
    echo '<script>alert("You are not administrator")</script>';
    echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
}
?>