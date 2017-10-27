<?php
include('connectdb.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$employee_id=test_input($_POST['employee_id']);
	$member_id=test_input($_POST['member_id']);
	$application_id=test_input($_POST['application_id']);
	$loan_type=test_input($_POST['loan_type']);
	$plan_name=test_input($_POST['plan_name']);
	$loan_amount=test_input($_POST['loan_amount']);
	$installment=test_input($_POST['installment']);
	$time=test_input($_POST['time']);
	$status="pending";
	$sql_loan="insert into loan_customers (introducer_id,member_id,application_number,loan_type,plan_name,loan_amount,installment,status,date) values('$employee_id','$member_id','$application_id','$loan_type','$plan_name','$loan_amount','$installment','$status',now())";
	if(mysqli_query($conn,$sql_loan)){
		echo '<script>alert("SUCCESS");</script>';
	}else{
		echo mysqli_error($conn);
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
		<script>
			$(document).ready(function(){
				
				$("#loan_amount").blur(function(){
					var loan_amount=$("#loan_amount").val();
					var loan_type=$("#loan_type").val();
					var plan_name=$("#plan_name").val();
					$.ajax({
					  url: "loancalculator.php",
					  type: "get", //send it through get method
					  data: { 
						loan_amnt : loan_amount,
						loan_typ : loan_type,
						plan:plan_name
					  },
					  success: function(output) {
						  var result = $.parseJSON(output);
						$("#installment").val(result[0]);
						$("#time").val(result[1]);
						
					  },
					  error: function(xhr,textStatus) {
						alert(xhr.status);
						console.log(textStatus)
					  }
					});
				});
				
				$("#introducer").change(function(){
					var broker_id = $(this).val();
					$.ajax({
					  url: "datafetcher.php",
					  type: "get", //send it through get method
					  data: { 
						name : "broker",
						id : broker_id
					  },
					  success: function(output) {
						  var result = $.parseJSON(output);
						$("#brokerspan").text(result.toString());
						
					  },
					  error: function(xhr,textStatus) {
						alert(xhr.status);
						console.log(textStatus)
					  }
					});
				});
				$("#member").change(function(){
				var member_id = $(this).val();
				
				$.ajax({
				  url: "datafetcher.php",
				  type: "get", //send it through get method
				  
				  data: { 
					name : "members",
					id : member_id
				  },
				  success: function(output) {
					var result = $.parseJSON(output);
						$("#city").val(result[9]);
						$("#member_name").val(result[1]);
						$("#guardian_name").val(result[2]);
						$("#dob").val(result[3]);
						$("#age").val(result[4]);
						$("#gender").val(result[5].toString());
						$("#contact_no").val(result[6]);
						$("#email").val(result[7]);
						$("#address").val(result[8]);
						$("#district").val(result[10]);
						$("#state").val(result[11]);
						$("#pin_code").val(result[12]);
						$("#pan_number").val(result[21]);
						$("#nominee_name").val(result[13]);
						$("#nominee_age").val(result[14]);
						$("#relation").val(result[15]);
						$("#nominee_address").val(result[16]);
						$("#bank_name").val(result[17]);
						$("#branch_name").val(result[18]);
						$("#account_no").val(result[20]);
						$("#ifsc_code").val(result[19]);
				  },
				  error: function(xhr,textStatus) {
					alert(xhr.status);
					console.log(textStatus);
				  }
				});
				
			});
			});
		</script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
		<?php include('header.php'); ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 div1">
					<div class="page-header text-center">
						<h2>Apply For Loan</h2>
						<i class="fa fa-5x fa-user-circle" aria-hidden="true"></i>
					</div>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<div class="form-group">
								<label>Emploee Number</label>
								<input type="text" placeholder="ENTER Employee ID" id="introducer" name="employee_id" class="form-control">
								<span id="brokerspan"></span>
							</div>
							<div class="form-group">
								<label>Membership Id</label>
								<input type="text" placeholder="ENTER MEMBERSHIP ID" id="member" name="member_id" class="form-control">
							</div>
							<div class="form-group">
								<label>Application No</label>
								<input type="text" placeholder="ENTER APPLICATION NO" name="application_id" class="form-control">
							</div>
							<div class="form-group">
								<label>Loan Type</label>
								<select id="loan_type" name="loan_type" class="form-control">
								<?php 
									$sql="select * from loan_type";
									$result=mysqli_query($conn,$sql);
									while($row=mysqli_fetch_assoc($result)){
										echo '<option value="'.$row['id'].'">'.$row['plan_name'].'</option>';
									}
								?>
								</select>
							</div>
							<div class="form-group">
								<label>Plan Name</label>
								<select name="plan_name" id="plan_name" class="form-control">	
									<?php 
									$sql="select * from loan_plans";
									$result=mysqli_query($conn,$sql);
									while($row=mysqli_fetch_assoc($result)){
										echo '<option value="'.$row['id'].'">'.$row['plan_name'].'</option>';
									}
								?>
								</select>
							</div>
							<div class="form-group">
								<label>Loan Amount</label>
								<input type="text" placeholder="ENTER LOAN AMOUNT" id="loan_amount" name="loan_amount" class="form-control">
							</div>
							<div class="form-group">
								<label>Installment</label>
								<input type="text" id="installment" placeholder="AUTO GENERATED" readonly required name="installment" class="form-control">
								<input type="number" id="time" hidden  required name="time">
							</div>
							<div class="form-group">
								<label>City</label>
								<?php
									echo '<select id="city" name="city" class="form-control" required>';
									$sql="select id,city_name from city";
									$result=mysqli_query($conn,$sql);
									echo '<option>--SELECT BRANCH--</option>';
									while($row=mysqli_fetch_assoc($result)){
										echo "<option value=".$row['id'].">".$row['city_name']."</option>";
									}
									echo "</select>";
								?>
							</div>
							
							<table>
							<hr>
							<h2>Bank Details</h2>
											<div class="form-group">
												<label>Pan No</label>
												<input name="pan_no" id="pan_number" placeholder="PAN NUMBER" class="form-control">
											</div>
									
											<div class="form-group">
												<label>Bank Account No</label>
												<input name="account_no" id="account_no" placeholder="ACCOUNT NUMBER" class="form-control">
											</div>
											<div class="form-group">
												<label>Bank name</label>
												<input name="Bank_name" id="bank_name" placeholder="BANK NAME" class="form-control">
											</div>
											<div class="form-group">
												<label>branch</label>
												<input NAME="bank_branch" id="branch_name" placeholder="BRANCH NAME"  class="form-control">
											</div>
											<div class="form-group">
												<label>IFSC Code</label>
												<input name="ifsc_code" id="ifsc_code" placeholder="IFSC CODE" class="form-control">
											</div>
									
							<hr>
							<h2>Name of Applicant</h2>
											<div class="form-group">
												<div class="col-md-6"><label>Applicant Name</label></div>
												<input type="text" placeholder="ENTER Applicant NAME" id="member_name" name="member_name" required class="form-control">
											</div>
											<div class="form-group">
											<div class="col-md-6"><label>GUARDIAN Name</label></div>
												<input type="text" placeholder="ENTER GUARDIAN NAME" id="guardian_name" name="guardian_name" required class="form-control">
											</div>
											<div class="form-group">
												<label>Date Of Birth</label>
												<input type="date" placeholder="ENTER DOB" id="dob" name="dob" required class="form-control">
											</div>
											<div class="form-group">
												<label>Age</label>
												<input type="number" placeholder="ENTER Age" id="age" name="age" required class="form-control">
											</div>
											<div class="form-group">
												<label>Broker Contact No.</label>
												<input type="number" placeholder="ENTER CONTACT NO" id="contact_no" name="contact_no" required class="form-control">
											</div>
											<div class="form-group">
												<label>Address</label>
												<textarea style="resize:none" name="address" id="address" placeholder="ENTER ADDRESS" required class="form-control" rows="3" ></textarea>
											</div>
											<div class="form-group">
												<label>District</label>
												<input type="text" placeholder="ENTER DISTRICT" id="district" name="district" class="form-control">
											</div>
											<div class="form-group">
											<label>State</label>
											<?php
												echo '<select name="state" id="state" class="form-control" required>';
												$sql="select id,state_name from state";
												$result=mysqli_query($conn,$sql);
												echo '<option>--SELECT STATE--</option>';
												while($row=mysqli_fetch_assoc($result)){
													echo "<option value=".$row['id'].">".$row['state_name']."</option>";
												}
												echo "</select>";
											?>
											</div>
											<div class="form-group">
												<label>Pin Code</label>
												<input type="number" name="pin_code" id="pin_code" placeholder="ENTER PIN CODE" required class="form-control">
											</div>
											<div class="form-group">
												<label>E-Mail Id</label>
												<input type="email" placeholder="ENTER E-MAIL" id="email" name="email" class="form-control">
											</div>
							<hr>
							<h2>Nomination</h2>
							<table class="col-md-12">
											<div class="form-group">
												<label>Nominee Name</label>
												<input type="text" name="nominee_name" id="nominee_name" placeholder="ENTER NOMINEE NAME" class="form-control">
											</div>
											<div class="form-group">
												<label>Nominee Age</label>
												<input type="number" name="nominee_age" id="nominee_age" placeholder="ENTER NOMINEE AGE" class="form-control">
											</div>
											<div class="form-group">
												<label>Relationship</label>
												<?php
													echo '<select name="relation" id="relation" class="form-control" required>';
													$sql="select id,relation from relations";
													$result=mysqli_query($conn,$sql);
													echo '<option>--SELECT RELATTION--</option>';
													while($row=mysqli_fetch_assoc($result)){
														echo "<option value=".$row['id'].">".$row['relation']."</option>";
													}
													echo "</select>";
												?>
											</div>
											<div class="form-group">
												<label>Nominee Address</label>
												<input type="text" name="nominee_address" id="nominee_address" placeholder="ENTER NOMINEE ADDRESS" class="form-control">
											</div>
							</table>
							<div class="form-group">
								<input type="submit" value="Save" class="btn btn-warning btn-block">
							</div>
						</form>
				</div>
				<div class="col-md-7 div1">
					<div class="page-header">
						<h2>Loan List</h2>
					</div>
					<?php
							$sql="select * from loan_customers";
							$result=mysqli_query($conn,$sql);
							echo'
							<div class="table-responsive">
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
											<th>Status</th>
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
													<td>'.$row['id'].'<br>'. $member_name .'</td>
													<td>'.$row['introducer_id'].'<br>'. $introducer_name .'</td>
													<td>'.$row['date'].'</td>
													<td>'.$plan_name.'</td>
													<td>'.$time_period.'</td>
													<td>'.$row['loan_amount'].'</td>
													<td>'.$row['status'].'</td>
												</tr>
											';
											$i++;
										}
									echo'<tbody>
									</tbody>
								</table>
							</div>
							';
					?>
				</div>
			</div>
		</div>
		<footer>copyright &copy; 2017 Loan</footer>
	</body>
</html>