<?php
include('connectdb.php');
$error="";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$user=test_input($_POST['user']);
		$password=test_input($_POST['password']);
		$sql= "SELECT * FROM users WHERE username = '$user' and password = '$password'";
		
			$result=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($result);
				if($count==1){
					$row=mysqli_fetch_assoc($result);
					session_start();
					//session_register("myusername");
					$_SESSION['login_user']=$user;
					$_SESSION['user_type']=$row['user_type'];
					if($row['user_type']==1){
						echo '<script>window.location="admin/dashboard.php";</script>';
					}else if($row['user_type']==2){
						echo '<script>window.location="dashboard.php";</script>';
					}
					
				}else{
					$error="Wrong username or password";
				}
	}
	function test_input($data) {
	  $data = mysqli_real_escape_string($GLOBALS['conn'],strip_tags($data));
	  return $data;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Loan</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php"><img style="width:100px; height:80px;"src="images/logo.jpg" alt="Loan"></a>
				</div>
			</div>
		</nav>
		<div class="container">
			<div id="login" class="col-md-4 col-md-offset-4	">
				<div class="page-header text-center">
					<h2>User Login</h2>
					<i class="fa fa-5x fa-user-circle" aria-hidden="true"></i>
				</div>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="form-group">
						<label for="username">UserName</label>
						<input id="username" name="user" type="text" class="form-control" autofocus required>
					</div>
					<div class="form-group">
						<label for="psw">password</label>
						<input id="psw" name="password" type="password" class="form-control" required>
					</div>
					<div class="form-group">
						<input name="submit" type="submit" class="btn btn-danger btn-block">
					</div>
				</form>
				<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<footer>copyright &copy; 2017 Loan</footer>
	</body>
</html>
