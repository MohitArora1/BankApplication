<?php
include('connectdb.php');

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
						<h2>Day book</h2>
						</div>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<table>
									<div class="form-group">
										<td>
											<label>From Date</label>
										</td>
										<td>
											<input type="date" name="from_date" Placeholder="FROM DATE"  class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>To Date</label>
										</td>
										<td>
											<input type="date" name="to_date" Placeholder="TO DATE"  class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											
										</td>
										<td>
											<div class="form-group text-center">
												<input type="submit" value="Get Details" class="btn btn-info">
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
					</div>
					<?php
						if($_SERVER['REQUEST_METHOD']=='POST'){
							
							$sql="select * from expenses where in_out LIKE 'out'";
							if(isset($_POST['from_date']) && !empty($_POST['from_date']) && isset($_POST['to_date']) && !empty($_POST['to_date'])){
								$from_date=$_POST['from_date'];
								$to_date=$_POST['to_date'];
								$sql.="and date between from_date and to_date";
							}
							$result=mysqli_query($conn,$sql);
							echo '
							<div class="table-responsive col-md-12">
								<table class="table table-striped table-hover table-bordered table-responsive">
									<thead class="bg-info">
										<tr>
											<th>S.NO</th>
											<th>DATE</th>
											<th>Ledger Name</th>
											<th>Voucher Type</th>
											<th>Amount</th>
											<th>Remarks</th>
										</tr>
									</thead>
									<tbody>
							';
							$i=1;
							while($row=mysqli_fetch_assoc($result)){
								$sql_ledger="select ledger from ledger where id='$row[ledger]'";
								$result1=mysqli_query($conn,$sql_ledger);
								$row1=mysqli_fetch_assoc($result1);
								$ledger=$row1['ledger'];
								echo '
								<tr>
									<td>'.$i.'</td>
									<td>'.$row['date'].'</td>
									<td>'.$ledger.'</td>
									<td>'.'Payment'.'</td>
									<td>'.$row['amount'].'</td>
									<td>'.$row['narration'].'</td>
								</tr>
								';
								$i++;
							}
							echo '
								<tbody>
							</table>
							</div>
							';
						}
					?>
					<br>
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





