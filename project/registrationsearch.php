<?php
include('connectdb.php');

function test_input($data){
	$data=mysqli_real_escape_string($GLOBALS['conn'],strip_tags($data));
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
				<div class="col-md-8 col-md-offset-2 di " >
					<div class="page-header text-center">
						<h2>Applicant Search</h2>
						<i class="fa fa-5x fa-user-circle" aria-hidden="true"></i>
					</div>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
						<table class="col-md-12">
							<tr>
								<div class="form-group">
									<td>
										<label>Broker ID:</label>
									</td>
									<td>
										<input name="brokerid" type="text" Placeholder="BROKER ID" class="form-control">
									</td>
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<td>
										<label>Registraion No:</label>
									</td>
									<td>
										<input name="registration_no" type="text" Placeholder="REGISTRATION NO" class="form-control">
									</td>
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<td>
										<label>Product:</label>
									</td>
									<td>
											<?php
													echo '<select id="rd_plans" name="rd_plans" class="form-control" required>';
													$sql="select id,plan_name from rd_plans";
													$result=mysqli_query($conn,$sql);
													echo '<option value="0">--SELECT PLAN--</option>';
													while($row=mysqli_fetch_assoc($result)){
														echo "<option value=".$row['id'].">".$row['plan_name']."</option>";
													}
													echo "</select>";
												?>
									</td>
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<td>
										<label>Applicant Name:</label>
									</td>
									<td>
										<input name="applicantname" type="text" Placeholder="APPLICANT NAME" class="form-control">
									</td>
								</div>
							</tr><tr>
								<div class="form-group">
									<td>
										<label>From Date:</label>
									</td>
									<td>
										<input name="fromdate" type="date" Placeholder="FROM DATE" class="form-control">
									</td>
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<td>
										<label>To Date:</label>
									</td>
									<td>
										<input name="todate" type="date" Placeholder="TO DATE" class="form-control">
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
						<h2>Applicant List</h2>
					</div>
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead class="bg-info">
								<tr>
									<th>S.no</th>
									<th>Applicant Name</th>
									<th>Applicant Id</th>
									<th>Applicant Contact NO</th>
									<th>Applicant Address</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if($_SERVER["REQUEST_METHOD"]=="POST"){
										if(isset($_POST['brokerid']) && !empty($_POST['brokerid'])){
											$broker_id=test_input($_POST['brokerid']);
											$sql="select members.*,rd_customer.id as applicant_id from members,rd_customer where members.id=rd_customer.member_id AND rd_customer.introducer_id='$broker_id'";
										}elseif(isset($_POST['registration_no']) && !empty($_POST['registration_no'])){
											$register_id=test_input($_POST['registration_no']);
											$sql="select members.*,rd_customer.id as applicant_id from members,rd_customer where members.id=rd_customer.member_id AND rd_customer.id='$register_id'";
										}elseif(isset($_POST['rd_plans']) && !empty($_POST['rd_plans'])){
											$rd_plan=test_input($_POST['rd_plans']);
											$sql="select members.*,rd_customer.id as applicant_id from members,rd_customer where members.id=rd_customer.member_id AND rd_customer.plan_name='$rd_plan'";
										}elseif(isset($_POST['applicantname']) && !empty($_POST['applicantname']) && $_POST['rd_plans']!='0'){
											$name=test_input($_POST['applicantname']);
											$sql="select members.*,rd_customer.id as applicant_id from members,rd_customer where members.id=rd_customer.member_id AND members.member_name LIKE '%$name%'";
										}elseif(isset($_POST['fromdate'],$_POST['todate']) && !empty($_POST['fromdate']) && !empty($_POST['todate'])){
											$from_date=test_input($_POST['fromdate']);
											$to_date=test_input($_POST['todate']);
											$sql="select members.*,rd_customer.id as applicant_id from members,rd_customer where members.id=rd_customer.member_id AND rd_customer.date BETWEEN '$from_date' AND '$to_date'";
										}else{
											$sql="select members.*,rd_customer.id as applicant_id from members,rd_customer where members.id=rd_customer.member_id";
										}
										$result=mysqli_query($conn,$sql);
										$a=1;
										while($row=mysqli_fetch_assoc($result)){
											echo "<tr>
													<td>".$a."</td>
													<td>".$row['member_name']."</td>
													<td>".$row['applicant_id']."</td>
													<td>".$row['contact_no']."</td>
													<td>".$row['address']."</td>
													<td>".$row['status']."</td>
												</tr>";
												$a++;
										}
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
		</div>
		
		<footer>copyright &copy; 2017 Loan</footer>
	</body>
</html>





