<?php
$error_current="";
$error_match="";
if(!isset($_SESSION)){
	session_start();
}
if(isset($_SESSION['login_user'])){
	$user=$_SESSION['login_user'];
}
include('connectdb.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$current_password=test_input($_POST['current_psw']);
	$new_password=test_input($_POST['new_psw']);
	$re_password=test_input($_POST['re_psw']);
	if($new_password==$re_password){
		$sql="select * from users where username='$user'";
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_assoc($result)){
			$pass=$row['password'];
			if($pass==$current_password){
				$sql1="update users set password='$new_password' ";
				if(mysqli_query($conn,$sql1)){
					echo '<script>alert("SUCESSFULLY CHANGE PASSWORD");</script>';
				}else{
					echo '<script>alert("ERROR");</script>';
				}
			}else{
				$error_current="enter correct password";
			}
		}
	}else{
		$error_match="password not match";
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
		<title>php</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
		<?php include('header.php'); ?>
		<div class="container-fluid">
			<div class="row">
					
				<div class="col-md-8 col-md-offset-2 di">
					<div class="col-md-8 col-md-offset-2">
						<div class="page-header text-center">
						<h2>Change Password</h2>
						</div>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<table>
								<tr>
									<div class="form-group">
										<td>
											<label>Current Password</label>
										</td>
										<td>
											<input type="password" name="current_psw" Placeholder="CURRENT PASSWORD" required class="form-control">
											<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error_current; ?></div>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>New Password</label>
										</td>
										<td>
											<input type="password" name="new_psw" Placeholder="NEW PASSWORD" required class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Re-Enter</label>
										</td>
										<td>
											<input type="password" name="re_psw" Placeholder="RE_ENTER" required class="form-control">
											<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error_match; ?></div>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											
										</td>
										<td>
											<div class="form-group text-center">
												<input type="submit" value="Change Password" class="btn btn-info">
											</div>
										</td>
									</div>
								</tr>					
							</table>
							
							
						</form>
						<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br> 
					</div>
				</div>
			</div>
		</div>
		
		<footer>copyright &copy; 2017 Loan</footer>
	</body>
</html>





