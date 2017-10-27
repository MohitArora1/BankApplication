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
						<h2>Pending Loan For Approval</h2>
						</div>
						<form>
							<table>
								<tr>
									<div class="form-group">
										<td>
											<label>Employee Id</label>
										</td>
										<td>
											<input type="text" name="emp_id" Placeholder="EMPLOYEE ID" required class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Loan No</label>
										</td>
										<td>
											<input type="text" name="loan No" Placeholder="LOAN NO" required class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Apllicant Name</label>
										</td>
										<td>
											<input type="text" name="applicant_name"  Placeholder="APPLICANT NAME" class="form-control" required>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>From Date</label>
										</td>
										<td>
											<input type="date" name="from_date"  Placeholder="FROM DATE" class="form-control" required>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>To Date</label>
										</td>
										<td>
											<input type="date" name="to_date"  Placeholder="TO DATE" class="form-control" required>
										</td>
									</div>
								</tr>						
							</table>
							<div class="form-group text-center">
								<input type="submit" value="Get Details" class="btn btn-info">
							</div>
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
					</div>
				</div>
			</div>
		</div>
		
		<footer>copyright &copy; 2017 Loan</footer>
	</body>
</html>





