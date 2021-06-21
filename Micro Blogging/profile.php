<?php  
	require('dbconn.php');
	session_start();

	if($_SESSION['name'] == '')
		header("Location:index.php");

	if(isset($_POST['logout'])){
		$_SESSION['name'] = '';
        header("Location:index.php");        
	}
?>
<!DOCTYPE html>
<html>
	<head> 	
		<title>Profile</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   
	</head>
	<body>    
    
    <?php include('include/navbar.php'); ?>    

    <div class="card mx-auto my-2 " style="width: 90%;">
    	<div class="card-header">Your Profile</div>
    	<div class="card-body">
    		<div class="row text-center">

    		<?php  
    			$id = $_SESSION['id'];
    			$query = "SELECT * FROM author WHERE id='$id'";
				$res = mysqli_query($conn, $query);		
				$row = mysqli_fetch_array($res);				
    		?>
    			<div class="col-md-4"><b>First Name: </b> <?php echo $row['fname']; ?></div>
    			<div class="col-md-4"><b>Last Name: </b> <?php echo $row['lname']; ?></div>
    			<div class="col-md-4"><b>Email ID: </b> <?php echo $row['email']; ?></div>
    		</div>
    	</div>
    </div>

    <div class="card mx-auto my-2 " style="width: 90%;">
    	<div class="card-header"><?php echo $row['fname']; ?>,  your Previous Posts</div>
    	<div class="card-body">
    		<?php  
    			$query = "SELECT * FROM post WHERE uid='$id'";
    			$res = mysqli_query($conn, $query);
    			while ($row = mysqli_fetch_array($res)) {
    				$uid = $row['uid'];    				
    				
    				$query1 = "SELECT * FROM author WHERE id = '$uid'";
    				$res1 = mysqli_query($conn, $query1);    				
    				$row1 = mysqli_fetch_array($res1);    				    				
    				$fname = $row1['fname'];
    				$lname = $row1['lname'];

			?>    				
    				<div class="card mx-1 my-1" style="width: 100%;">				    	
				    	<div class="card-body">
				    		<div class="row">
				    			<div class="col-md-2"><?php echo $fname," ", $lname; ?></div>
				    			<div class="col-md-10"><?php echo $row['post']; ?></div>
				    		</div>
				    	</div>
				    </div>		
			<?php
    			}
    		?>    		
    	</div>
    </div>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

	</body>
</html>