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
				<div class="col-md-8 col-md-offset-2 di " >
					<div class="page-header text-center">
						<h2>PAY DD</h2>
						<i class="fa fa-5x fa-user-circle" aria-hidden="true"></i>
					</div>
					<form>
						<table class="col-md-12">
							<tr>
								<div class="form-group">
									<td>
										<label>REGISTRAION NO:</label>
									</td>
									<td>
										<input name="registration_no" type="text" Placeholder="REGISTRAION NO" class="form-control">
									</td>
								</div>
							</tr>
						</table>
						
						<div class="form-group text-center">
							<input type="submit" class="btn btn-success">
						</div>
					</form>
				</div>
				<br>
				<div class="col-md-8 col-md-offset-2 di">
					
					<div class="col-md-8 col-md-offset-2">
						<div class="page-header">
						<h2>PAY INSTALLMENT</h2>
						</div>
						<form>
							<table>
								<tr>
									<div class="form-group">
										<td>
											<label>Select Date</label>
										</td>
										<td>
											<input type="date" name="date" required>
										</td>
									</div>
								</tr>
							</table>
							<input type="submit" value="pay" class="btn btn-info">
							
						</form>
					</div>
					<br>
					<br>
					<br>
					<br>
					<br>
				</div>
				
			</div>
		</div>
		
		<footer>copyright &copy; 2017 Loan</footer>
	</body>
</html>





