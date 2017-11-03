<?php
include('connectdb.php');
if(isset($_GET['pay_id'])){
	
	$sql="update rd_transactions set paid=true where id='$_GET[pay_id]'";
	if(mysqli_query($conn,$sql)){
		echo '
		<script>
		window.location="renewalslip.php?registration_no='.$_GET['registration_no'].'";</script>
		';
	}
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
				<div class="col-md-8 col-md-offset-2 di " >
					<div class="page-header text-center">
						<h2>Renewal Slip</h2>
						<i class="fa fa-5x fa-user-circle" aria-hidden="true"></i>
					</div>
					<form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
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
					<div class="page-header text-center">
						<h2>Renewal slip</h2>
					</div>
					<?php
						if(isset($_GET['registration_no'])){
							$reg_id=mysqli_real_escape_string($conn,strip_tags($_GET['registration_no']));
							
							$data_sql="select member_name from members where id=(select member_id from rd_customer where id=(select rd_customer_id from rd_transactions where id='$reg_id'))";
							$result=mysqli_query($conn,$data_sql);
							$row=mysqli_fetch_assoc($result);
							$name=$row['member_name'];
							
							$sql="select * from rd_transactions where rd_customer_id='$reg_id'";
							$result=mysqli_query($conn,$sql);
						
					?>
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead class="bg-info">
								<tr>
									<th>Installment No</th>
									<th>applicant Name</th>
									<th>applicant id</th>
									<th>installment</th>
									<th>late fee</th>
									<th>due date</th>
									<th>pay</th>
								</tr>
							</thead>
							<tbody>
								<?php 
										while($row=mysqli_fetch_assoc($result)){
											echo "<tr>
													<td>".$row['installment_no']."</td>
													<td>".$name."</td>
													<td>".$row['rd_customer_id']."</td>
													<td>".$row['installment_amount']."</td>";
													if(strtotime($row['due_date']) < strtotime(date("y-m-d")) && !$row['paid']){
														echo "<td>"."50"."</td>";
													}else{
														echo "<td>".$row['late_fee']."</td>";
													}
													
													echo "<td>".$row['due_date']."</td>";
													if($row['paid']==0){
														echo "<td><a href='renewalslip.php?registration_no=$reg_id&pay_id=$row[id]' class='btn btn-info'>pay</a></td>";
													}else{
														echo "<td><a href='printrenewalslip.php?registration_no=$reg_id&pay_id=$row[id]' target='_blank' class='btn btn-primary'>print slip</a></td>";
													}	
												echo "</tr>";
										}
								?>
							</tbody>
						</table>
					</div><?php } ?>
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