<?php
	require('dbconn.php');
	session_start();

	if($_SESSION['name'] == '')
		header("Location:index.php");

	if(isset($_POST['submit']))
	{
		$post = $_POST['post'];		
		$uid = $_SESSION['id'];

		$query = "INSERT INTO post(uid, post) VALUES('$uid', '$post')";		
		if(mysqli_query($conn, $query)){
			echo "<script> alert('Posted Successfully'); </script>";
		}
		else
			echo "<script> alert('Please Try Again'); </script>";				
	}
?>	
<!DOCTYPE html>
<html>
	<head> 	
		<title>New Post</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    
	</head>
	<body class="bg-dark">
    
    <div class="container">    	
    	<div class="card mx-auto mt-5" style="width: 40%;">
    		<div class="card-header text-center">	
		 	<h3>New Post</h3>
		 	</div>
		  	<div class="card-body">
				<form method="POST" action="">
				  <div class="form-group">
				    <label>Write your Post here</label>
				    <textarea class="form-control" placeholder="Start writing" name="post" required></textarea>	   
				  </div>
				  <a href="index.php" class="btn btn-danger">Cancel</a>
				  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>				  
				</form>
		  	</div>
		</div>
    </div>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>

	</body>
</html>