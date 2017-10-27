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
				<div class="col-md-4 div1">
					<div class="page-header text-center">
						<h2>Loan Group</h2>
						<i class="fa fa-5x fa-user-circle" aria-hidden="true"></i>
					</div>
						<form>
							<div class="form-group">
								<label>Loan Group</label>
								<input type="text" placeholder="ENTER GROUP NAME" name="group_name" class="form-control">
							</div>
							<div class="form-group">
								<label>Village</label>
								<input type="text" placeholder="ENTER VILLAGE" name="village" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" value="Save" class="btn btn-warning btn-block">
							</div>
						</form>
				</div>
				<div class="col-md-7 div1">
					<div class="page-header">
						<h2>Loan Group</h2>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<footer>copyright &copy; 2017 Loan</footer>
	</body>
</html>