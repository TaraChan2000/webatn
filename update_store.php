<!DOCTYPE html >
<!--  Website template by freewebsitetemplates.com  -->
<html>

<head>
	<title>ATN</title>
	<meta  charset="iso-8859-1" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<!--[if IE 6]>
		<link href="css/ie6.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<!--[if IE 7]>
        <link href="css/ie7.css" rel="stylesheet" type="text/css" />  
	<![endif]-->
</head>

	<!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
   <?php
    include_once("connection.php");
	if(isset($_GET["id"]))
	        {
	            $id = $_GET["id"];
		        $result = pg_query($conn, "SELECT * FROM public.store WHERE store_id='$id'");
	        	$row = pg_fetch_array($result, NULL,PGSQL_ASSOC);
	        	$cat_id = $row['store_id'];
		        $cat_name = $row['store_name'];
	        	$cat_des = $row['store_des'];
                $cat_addr = $row['store_address'];

	?>
<div class="container">
	<h2>Updating Store</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Store ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Store ID" readonly 
								  value='<?php echo $cat_id; ?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Store Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Store Name" 
								  value='<?php echo $cat_name; ?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Description(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" 
								  value='<?php echo $cat_des; ?>'>
							</div>
					</div>
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Address(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtaddr" id="txtaddr" class="form-control" placeholder="Address" 
								  value='<?php echo $cat_addr; ?>'>
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
	else
	{
        echo '<meta http-equiv="refresh" content="0; URL=?page=store_management"/>';
	}
	?>


	<?php
       if(isset($_POST["btnUpdate"]))
	   {
		   $id = $_POST["txtID"];
		   $name = $_POST["txtName"];
		   $des = $_POST["txtDes"];
		   $err="";
		   if($name=="")
		   {
			   $err.="<li>Enter Store Name, Please</li>";
		   }
		   if($err!="")
		   {
			   echo "<ul>$err</ul>";
		   }
		   else
		   {
			   $sq="Select * from public.store where store_id != '$id' and store_name='$name'";
			   $result = pg_query($conn, $sq);
			   if(pg_num_rows($result)==0)
			   {
				   pg_query($conn, "Update public.store SET store_name = '$name', store_des='$des' WHERE store_id='$id'");
				   echo '<meta http-equiv="refresh" content="0; URL=?page=store_management"/>';
			   }
			   else
			   {
				   echo "<li>Duplicate category Name</li>";
			   }
		   }
	   }
    ?>
      
	</div>
	</body>
</html>
 