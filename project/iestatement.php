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
						<h2>I/E Statement</h2>
						</div>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<table>
									<div class="form-group">
										<td>
											<label>From Date</label>
										</td>
										<td>
											<input type="date" name="from_date" Placeholder="FROM DATE" class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>To Date</label>
										</td>
										<td>
											<input type="date" name="to_date" Placeholder="TO DATE" class="form-control">
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
					<br>
					<br>
					<br>
					<br>
					<br> 
					</div>
					<div class="col-md-12">
					<div class="row">
					<?php
						if($_SERVER['REQUEST_METHOD']=='POST'){
							$sql1="";
								if(isset($_POST['from_date']) && !empty($_POST['from_date']) && isset($_POST['to_date']) && !empty($_POST['to_date'])){
								$from_date=$_POST['from_date'];
								$to_date=$_POST['to_date'];
								$sql1="and expenses.date between from_date and to_date";
							}
						
						$sql="select sum(amount) as amount ,expenses.ledger from expenses left join ledger on (expenses.ledger=ledger.id) where expenses.in_out='in' $sql1 group by ledger.id";
						$sql2="select sum(amount) as amount ,expenses.ledger from expenses left join ledger on (expenses.ledger=ledger.id) where expenses.in_out='out' $sql1 group by ledger.id";
						$result=mysqli_query($conn,$sql);
						$result2=mysqli_query($conn,$sql2);
						echo '
						<div class="table-responsive col-md-12">
							<table class="table col-md-12">
								<td>
						';
						echo '
							<table class="table table-striped table-bordered table-responsive ">
								<thead class="bg-info">
									<tr>
										<th>S.NO</th>
										<th>Income Head</th>
										<th>Amount</th>
									</tr>
								</thead>
								<tbody>
						';
						$i=1;
						$income=0;
						while($row=mysqli_fetch_assoc($result)){
								$sql_ledger="select ledger from ledger where id='$row[ledger]'";
								$result1=mysqli_query($conn,$sql_ledger);
								$row1=mysqli_fetch_assoc($result1);
								$ledger=$row1['ledger'];
							echo '
								<tr>
									<td>'.$i.'</td>
									<td>'.$ledger.'</td>
									<td>'.$row['amount'].'</td>
								</tr>
								';
								$i++;
								$income+=$row['amount'];
						}
						echo '
							</tbody>
						</table>
						</td>
						<td>
						';
						echo '
							<table class="table table-striped table-bordered table-responsive ">
								<thead class="bg-info">
									<tr>
										<th>S.NO</th>
										<th>Expense Head</th>
										<th>Amount</th>
									</tr>
								</thead>
								<tbody>
						';
						$i=1;
						$outgoing=0;
						while($row2=mysqli_fetch_assoc($result2)){
								$sql_ledger1="select ledger from ledger where id='$row2[ledger]'";
								$result3=mysqli_query($conn,$sql_ledger1);
								$row3=mysqli_fetch_assoc($result3);
								$ledger1=$row3['ledger'];
							echo '
								<tr>
									<td>'.$i.'</td>
									<td>'.$ledger1.'</td>
									<td>'.$row2['amount'].'</td>
								</tr>
								';
								$i++;
								$outgoing+=$row2['amount'];
						}
						$balance=$income-$outgoing;
						echo '
							</tbody>
						</table>
						</td>
						<tr>
						<td>Balance</td>
							<td class="pull-right text-right">
							'.$balance.'
							<td>
						</tr>
						</table>
					</div>
						';
					}
					?>
					</div>
					</div>
					</div>
			</div>
		</div>
		
		<footer>copyright &copy; <?php echo date("Y"); ?> Loan</footer>
	</body>
</html>





