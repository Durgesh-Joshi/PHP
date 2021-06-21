<?php  
	require('dbconn.php');

	if($_SESSION['name'] == '')
		session_start();

	if(isset($_POST['login']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];		

		$query = "SELECT * FROM author WHERE email='$username' and password='$password'";
		$res = mysqli_query($conn, $query);		
		$count = mysqli_num_rows($res);	
		if($count == 1)
		{
			$row = mysqli_fetch_array($res);			
			$id = $row['id'];
			$fname = $row['fname'];			
			session_start();			
			$_SESSION['name'] = $fname;
			$_SESSION['id'] = $id;
		}
		else
			echo "<script>alert('Please create an Account first');</script>";		
	}

	if(isset($_POST['logout'])){
		$_SESSION['name'] = '';
	}
?>

<!DOCTYPE html>
<html>
	<head> 	
		<title>MicroBlog</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   
	</head>
	<body>    
    
    <?php include('include/navbar.php'); ?>    

    <div class="card mx-auto my-2 " style="width: 90%;">
    	<div class="card-header">All Posts</div>
    	<div class="card-body">
    		<?php  
    			$query = "SELECT * FROM post";
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