<?php
include('connectdb.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
	$date=test_input($_POST['date']);
	$ledger=test_input($_POST['ledger']);
	$in_out=test_input($_POST['in_out']);
	$money_type=test_input($_POST['money_type']);
	$narration=test_input($_POST['narration']);
	$amount=test_input($_POST['amount']);
	$sql="insert into expenses (ledger,amount,payment_mode,in_out,narration,date) values('$ledger','$amount','$money_type','$in_out','$narration',now())";
	if(mysqli_query($conn,$sql)){
		echo '<script>alert("SAVED");</script>';
	}else{
		echo '<script>alert("Error");</script>';
	}
}
function test_input($data) {
	  $data = mysqli_real_escape_string($GLOBALS['conn'],strip_tags($data));
	  return $data;
}
?><!DOCTYPE html>
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
						<h2>Payment Voucher Entry</h2>
						</div>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<table>
								<tr>
									<div class="form-group">
										<td>
											<label>Date</label>
										</td>
										<td>
											<input type="text" name="date" value="<?php echo date('d/y/m');?>" readonly  required class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Ledger</label>
										</td>
										<td>
											<select name="ledger" class="form-control">
												<?php 
													$sql_ledger="select * from ledger";
													$result=mysqli_query($conn,$sql_ledger);
													while($row=mysqli_fetch_assoc($result)){
														echo'<option value="'.$row['id'].'">'.$row['ledger'].'</option>';
													}
												?>
											</select>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>IN/OUT</label>
										</td>
										<td>
											<select name="in_out" class="form-control">
												<option value="in">IN</option>
												<option value="out">OUT</option>
											</select>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Bank/Cash</label>
										</td>
										<td>
											<select name="money_type" class="form-control">
												<option>Bank Acc</option>
												<option>Cash</option>
											</select>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Narration</label>
										</td>
										<td>
											<input type="text" name="narration" Placeholder="NARRATION" required class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Amount</label>
										</td>
										<td>
											<input type="text" name="amount" Placeholder="AMOUNT" required class="form-control">
										</td>
									</div>
								</tr>
								
								<tr>
									<div class="form-group">
										<td>
											
										</td>
										<td>
											<div class="form-group text-center">
												<input type="submit" value="Save" class="btn btn-info">
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





