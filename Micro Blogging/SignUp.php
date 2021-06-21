<?php
	require('dbconn.php');
	session_start();		

	if(isset($_POST['signup']))
	{		
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirmPassword'];
		if($password != $confirmPassword)
		 	echo "<script>alert('Password & Confirm Password not match');</script>";
		else
		{
			$query = "INSERT INTO author(fname, lname, email, password) VALUES('$fname', '$lname', '$email', '$password')";
			if(mysqli_query($conn, $query)){
				$_SESSION['name'] = $fname;

				$query = "SELECT * FROM author WHERE email='$email' and password='$password'";
				$res = mysqli_query($conn, $query);
				$row = mysqli_fetch_array($res);			
				$_SESSION['id'] = $row['id'];

				echo "<script>alert('Account Created Successfully !!!');</script>";				
			}
			else
				echo "<script>alert('Please try again');</script>";

		}
	}
?>	
<!DOCTYPE html>
<html>
	<head> 	
		<title>Sign Up</title>
    	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    	
	</head>
	<body class="bg-dark">
    
    <div class="container">
    	<div class="card mx-auto mt-5" style="width: 40%;">
    		<div class="card-header text-center">	
		 		<h3>Please Register youself to be an Author</h3>
		 	</div>
		  	<div class="card-body">
				<form method="POST">
					<div class="row">
						<div class="col-md-6">
						    <label>First Name</label>
						    <input type="text" class="form-control" placeholder="Enter First Name" name="fname" required>
						</div>
						<div class="col-md-6">
						    <label>Last Name</label>
						    <input type="text" class="form-control" placeholder="Enter Last Name" name="lname" required>
						</div>
				    </div>				  
				    <div class="form-group">
				    	<label>Email address</label>
				    	<input type="email" class="form-control" placeholder="Enter email" name="email" required>
				    	<small class="form-text text-muted">Your Email Address will be your Username.</small>
				  	</div>
				  	<div class="form-group">
				    	<label>Password</label>
				    	<input type="password" class="form-control" placeholder="Password" name="password" required>
				  	</div>
				  	<div class="form-group">
					    <label>Confirm Password</label>
					    <input type="password" class="form-control" placeholder="Confirm Password" name="confirmPassword" required>
					</div>
				  	<a href="index.php" class="btn btn-danger">Cancel</a>
				  	<button type="submit" class="btn btn-primary" name="signup" value="signup">Submit</button>
				</form>
		  	</div>
		</div>
    </div>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
	</body>
</html>