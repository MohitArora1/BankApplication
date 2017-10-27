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
		<div class="container">
			<div class="row">
				
				<div class="col-md-6 bg-warning" style="height:600px">
					<div class="page-header text-center">
						<h3>Due Loan EMI for This Week</h3>
					</div>
					<div class="col-md-12">
					<?php
					
						$date=date("y-m-d");
						$date1="10-01-01";
						$date2=date("y-m-d",strtotime("+1 month",strtotime($date)));
						$sql_emi="select * from loan_transactions where is_paid=false and installment_date between '$date1' and '$date2'";
						$result_emi=mysqli_query($conn,$sql_emi);
						echo '
						<div table-responsive col-md-12">
								<table class="table  table-striped table-bordered table-hover">
									<thead class="bg-info">
										<tr>
											<th>S.no</th>
											<th>APPLICANT</th>
											<th>Contact No</th>
											<th>Date</th>
											<th>Installment</th>
										</tr>
									</thead>
									<tbody>
									';
									$i=1;
						while($row_emi=mysqli_fetch_assoc($result_emi)){
							$sql_member="select member_name, contact_no from members where id=(select member_id from loan_customers where id='$row_emi[loan_customer_id]')";
							$result_member=mysqli_query($conn,$sql_member);
							$row_member=mysqli_fetch_assoc($result_member);
							$member_name=$row_member['member_name'];
							$contact_no=$row_member['contact_no'];
							echo '
								<tr>
									<td>'.$i.'</td>
									<td>'.$member_name.'</td>
									<td>'.$contact_no.'</td>
									<td>'.$row_emi['installment_date'].'</td>
									<td>'.$row_emi['installment_amount'].'</td>
								</tr>
							';
						$i++;
						}
						echo '
							</tbody>
							</table>
						';
					?>
						
					</div>
					</div>
				</div>
				<div class="col-md-6 bg-success" style="height:600px">
					<div class="page-header text-center">
						<h3>Renewal for This Month</h3>
					</div>
					<div class="col-md-12">
					<?php
					
						$date=date("y-m-d");
						$date1="10-01-01";
						$date2=date("y-m-d",strtotime("+1 month",strtotime($date)));
						$sql_renewal="select * from rd_transactions where paid=false and due_date between '$date1' and '$date2'";
						$result_renewal=mysqli_query($conn,$sql_renewal);
						echo '
						<div table-responsive col-md-12">
								<table class="table  table-striped table-bordered table-hover">
									<thead class="bg-info">
										<tr>
											<th>S.no</th>
											<th>APPLICANT</th>
											<th>Contact No</th>
											<th>Date</th>
											<th>Installment</th>
										</tr>
									</thead>
									<tbody>
									';
									$i=1;
						while($row_renewal=mysqli_fetch_assoc($result_renewal)){
							$sql_member1="select member_name, contact_no from members where id=(select member_id from rd_customer where id='$row_renewal[rd_customer_id]')";
							$result_member1=mysqli_query($conn,$sql_member1);
							$row_member1=mysqli_fetch_assoc($result_member1);
							$member_name1=$row_member1['member_name'];
							$contact_no1=$row_member1['contact_no'];
							echo '
								<tr>
									<td>'.$i.'</td>
									<td>'.$member_name1.'</td>
									<td>'.$contact_no1.'</td>
									<td>'.$row_renewal['due_date'].'</td>
									<td>'.$row_renewal['installment_amount'].'</td>
								</tr>
							';
						$i++;
						}
						echo '
							</tbody>
							</table>
						';
					?>
						
					</div>
					</div>
				</div>
			</div>
		</div>
		
		<footer>copyright &copy; 2017 Loan</footer>
	</body>
</html>





