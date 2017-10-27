<?php
include('connectdb.php');
if(isset($_GET['id'])){
	$id=test_input($_GET['id']);
	$installment=test_input($_GET['amount']);
	$time=test_input($_GET['time']);
	$sql_update="update loan_customers set status='disburse' where id='$id'";
	if(mysqli_query($conn,$sql_update)){
		$date=date("y-m-d");
		$date=date("y-m-d",strtotime("+1 month",strtotime($date)));
		$i=1;
		$sql_loan_transactions="insert into loan_transactions (loan_customer_id,installment_no,installment_amount,installment_date,is_paid) values('$id','$i','$installment','$date',false);";
		for($i=2;$i<$time;$i++){
			$date=date("y-m-d",strtotime("+1 month",strtotime($date)));
			$sql_loan_transactions.="insert into loan_transactions (loan_customer_id,installment_no,installment_amount,installment_date,is_paid) values('$id','$i','$installment','$date',false);";
		}
		$date=date("y-m-d",strtotime("+1 month",strtotime($date)));
			$sql_loan_transactions.="insert into loan_transactions (loan_customer_id,installment_no,installment_amount,installment_date,is_paid) values('$id','$i','$installment','$date',false)";
			if(mysqli_multi_query($conn,$sql_loan_transactions)){
				echo'<script>
				alert("SUCCESS");
				window.location="disbursedloan.php";
				</script>';
			}
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
					<div class="col-md-12 ">
						<div class="col-md-8 col-md-offset-2">
							<div class="page-header text-center">
							<h2>Pending Loan For Disburse</h2>
							</div>
							<form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
								<table>
									<tr>
										<div class="form-group">
											<td>
												<label>Employee Id</label>
											</td>
											<td>
												<input type="text" name="emp_id" Placeholder="EMPLOYEE ID"  class="form-control">
											</td>
										</div>
									</tr>
									<tr>
										<div class="form-group">
											<td>
												<label>Loan No</label>
											</td>
											<td>
												<input type="text" name="loan_no" Placeholder="LOAN NO"  class="form-control">
											</td>
										</div>
									</tr>
									<tr>
										<div class="form-group">
											<td>
												<label>From Date</label>
											</td>
											<td>
												<input type="date" name="from_date"  Placeholder="FROM DATE" class="form-control" >
											</td>
										</div>
									</tr>
									<tr>
										<div class="form-group">
											<td>
												<label>To Date</label>
											</td>
											<td>
												<input type="date" name="to_date"  Placeholder="TO DATE" class="form-control" >
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
						
					
					<?php
						if($_SERVER["REQUEST_METHOD"]=="POST"){
							$employee_id=test_input($_POST['emp_id']);
							$loan_no=test_input($_POST['loan_no']);
							$from_date=test_input($_POST['from_date']);
							$to_date=test_input($_POST['to_date']);
							$sql="select * from loan_customers where status LIKE 'approved'";
							if(isset($_POST['emp_id']) && !empty($_POST['emp_id'])){
								$sql.="and introducer_id='$employee_id'";
							}
							if(isset($_POST['loan_no']) && !empty($_POST['loan_no'])){
								$sql.="and application_number='$loan_no'";
							}
							if(isset($_POST['from_date']) && !empty($_POST['from_date']) && isset($_POST['to_date']) && !empty($_POST['to_date'])){
								$sql.="(date between '$from_date' and '$to_date' )";
							}
							
							$result=mysqli_query($conn,$sql);
							echo'
							<div class="table-responsive col-md-12">
								<table class="table table-bordered table-striped table-hover">
									<thead class="bg-info">
										<tr>
											<th>S.no</th>
											<th>APPLICANT</th>
											<th>EMPLOYEE</th>
											<th>Date</th>
											<th>Plan Name</th>
											<th>Duration</th>
											<th>Loan Amount</th>
											<th>Status</th>
											<th>Disburse</th>
										</tr>
									</thead>';
									$i=1;
										while($row=mysqli_fetch_assoc($result)){
											$sql_member_name="select member_name from members where id='$row[member_id]'";
											$sql_introducer_name="select members.member_name from members,broker where members.id=broker.member_id and broker.id='$row[introducer_id]'";
											$sql_plan="select plan_name,time_period from loan_plans where id='$row[plan_name]'";
											$run1=mysqli_query($conn,$sql_member_name);
											$row1=mysqli_fetch_assoc($run1);
											$member_name=$row1['member_name'];
											$run2=mysqli_query($conn,$sql_introducer_name);
											$row2=mysqli_fetch_assoc($run2);
											$introducer_name=$row2['member_name'];
											$run3=mysqli_query($conn,$sql_plan);
											$row3=mysqli_fetch_assoc($run3);
											$plan_name=$row3['plan_name'];
											$time_period=$row3['time_period'];
											echo'
												<tr>
													<td>'.$i.'</td>
													<td>'.$row['application_number'].'<br>'. $member_name .'</td>
													<td>'.$row['introducer_id'].'<br>'. $introducer_name .'</td>
													<td>'.$row['date'].'</td>
													<td>'.$plan_name.'</td>
													<td>'.$time_period.'</td>
													<td>'.$row['loan_amount'].'</td>
													<td>'.$row['status'].'</td>
													<td><a href="disbursedloan.php?id='.$row['id'].'&amount='.$row['installment'].'&time='.$time_period.'" class="btn btn-danger">Disburse</a></td>
												</tr>
											';
											$i++;
										}
									echo'<tbody>
									</tbody>
								</table>
							</div>
							';
						}
					?>
					
					</div>
				</div>
			</div>
		</div>
		
		<footer>copyright &copy; 2017 Loan</footer>
	</body>
</html>