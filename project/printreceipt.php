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
						<h2>Print Receipt</h2>
						</div>
						<form>
							<table>
								<tr>
									<div class="form-group">
										<td>
											<label>Branch</label>
										</td>
										<td>
											<select name="city" class="form-control">
												<option>KARNAL</option>
											</select>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Registration No</label>
										</td>
										<td>
											<input type="text" name="reg_no" Placeholder="REGISTRATION NO" required class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Receipt No</label>
										</td>
										<td>
											<input type="text" name="receipt_no" Placeholder="RECEIPT NO" required class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>From Date</label>
										</td>
										<td>
											<input type="date" name="from_date" Placeholder="FROM DATE" required class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>To Date</label>
										</td>
										<td>
											<input type="date" name="to_date" Placeholder="TO DATE" required class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<div class="form-group text-center">
												<input type="submit" value="Get Details" class="btn btn-info">
											</div>
										</td>
										<td>
											<div class="form-group text-center">
												<input type="submit" value="Print selected" class="btn btn-info">
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





