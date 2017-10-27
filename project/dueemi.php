<?php
include('connectdb.php');
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
						<div class="col-md-8 col-md-offset-2 ">
								<div class="page-header text-center">
								<h2>Due EMI</h2>
								</div>
								<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
									<table>
										<tr>
											<div class="form-group">
												<td>
													<label>Broker Id</label>
												</td>
												<td>
													<input type="text" name="broker_id" Placeholder="BROKER ID" class="form-control">
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
													<input type="date" name="from_date" placeholder="From Date" class="form-control" >
												</td>
											</div>
										</tr>
										<tr>
											<div class="form-group">
												<td>
													<label>To Date</label>
												</td>
												<td>
													<input type="date" name="to_date" placeholder="To Date"   class="form-control" >
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
							$add="";
							if(isset($_POST['broker_id']) && !empty($_POST['broker_id'])){
								$broker_id=test_input($_POST['broker_id']);
								$add.="and loan_customers.introducer_id='$broker_id'";
							}
							if(isset($_POST['loan_no']) && !empty($_POST['loan_no'])){
								$loan_no=test_input($_POST['loan_no']);
								$add.="and loan_transactions.loan_customer_id='$loan_no'";
							}
							if(isset($_POST['from_date']) && !empty($_POST['from_date']) && isset($_POST['to_date']) && !empty($_POST['to_date'])){
								$from_date=test_input($_POST['from_date']);
								$to_date=test_input($_POST['to_date']);
								$add.="and loan_transactions.installment_date between '$from_date' and '$to_date' ";
							}
							  $sql="select loan_customers.*,count(loan_transactions.loan_customer_id) as no_of_installment from loan_customers left join loan_transactions on (loan_transactions.loan_customer_id=loan_customers.id ) where loan_transactions.is_paid=false $add group by loan_customers.id";
							 $result=mysqli_query($conn,$sql);
							echo'
							<div class="table-responsive col-md-12">
								<table class="table table-striped table-bordered table-hover">
									<thead class="bg-info">
										<tr>
											<th>S.no</th>
											<th>APPLICANT</th>
											<th>EMPLOYEE</th>
											<th>Date</th>
											<th>Plan Name</th>
											<th>Duration</th>
											<th>Loan Amount</th>
											<th>Installment</th>
											<th>No Of Installments</th>
											<th>Total</th>
										</tr>
									</thead>';
									$i=1;
									$grand_total=0;
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
											if($row['no_of_installment']>0){
												$total=$row['installment']*$row['no_of_installment'];
												echo'
												<tbody>
												<tr>
													<td>'.$i.'</td>
													<td>'.$row['application_number'].'<br>'. $member_name .'</td>
													<td>'.$row['introducer_id'].'<br>'. $introducer_name .'</td>
													<td>'.$row['date'].'</td>
													<td>'.$plan_name.'</td>
													<td>'.$time_period.'</td>
													<td>'.$row['loan_amount'].'</td>
													<td>'.$row['installment'].'</td>
													<td>'.$row['no_of_installment'].'</td>
													<td>'.$total.'</td>
													
												</tr>
											';
											$grand_total+=$total;
											$i++;
											}
										}
									echo'
									<tr>
									<td>TOTAL</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td class="text-right pull-right" >'.$grand_total.'</td>
									</tr>
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