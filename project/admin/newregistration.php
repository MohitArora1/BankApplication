<?php
if(!isset($_SESSION)){
	session_start();
}
include('connectdb.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
	$introducer_id=test_input($_POST['agent_name']);
	$member_id=test_input($_POST['member_no']);
	$fdrd_plan=test_input($_POST['fdrd_plan']);
	$pay_mode=test_input($_POST['pay_mode']);
	$adjustment=test_input($_POST['adjustment']);
	$time_period=test_input($_POST['time_period']);
	$total_amount=test_input($_POST['total_amount']);
	$maturity_amount=test_input($_POST['maturity_amount']);
	$status="active";
	if($fdrd_plan=="fd"){
		$fd_plan=test_input($_POST['fd_plans']);
		$plan_amount=test_input($_POST['plan_amount']);
		$compounding=test_input($_POST['compounding1']);
		$sql="insert into fd_customer (member_id,introducer_id,payment_mode,plan_name,adjustment_amount,plan_amount,compounding,payment_period,total_amount,maturity_amount,status,date) values('$member_id','$introducer_id','$pay_mode','$fd_plan','$adjustment','$plan_amount','$compounding','$time_period','$total_amount','$maturity_amount','$status',now())";
		if(mysqli_query($conn,$sql)){
			echo '<script>alert("SUCCESSFULLY CREATED");</script>';
		}else{
			echo '<script>alert("ERROR");</script>';
		}
	}else if($fdrd_plan=="rd"){
		$rd_plan=test_input($_POST['rd_plans']);
		$installment_amount=test_input($_POST['installment_amount']);
		$compounding=test_input($_POST['compounding']);
		$sql="insert into rd_customer (member_id,introducer_id,payment_mode,plan_name,adjustment_amount,installment_amount,compounding,payment_period,total_amount,maturity_amount,status,date)
			values(
				'$member_id',
				'$introducer_id',
				'$pay_mode',
				'$rd_plan',
				'$adjustment',
				'$installment_amount',
				'$compounding',
				'$time_period',
				'$total_amount',
				'$maturity_amount',
				'$status',
				now()
			)";
		if(mysqli_query($conn,$sql)){
			$mem_id=mysqli_insert_id($conn);
			$date=date("y-m-d");
			$i=1;
			$n=$time_period*12;
			$rd_transactions="insert into rd_transactions (rd_customer_id,installment_amount,installment_no,plan_name,due_date,payment_date,late_fee,total_amount,paid) values('$mem_id','$installment_amount','$i','$rd_plan','$date','','','',false);";
			for($i=2;$i<$n;$i++){
				$date=date("y-m-d",strtotime("+1 month",strtotime($date)));
				$rd_transactions .="insert into rd_transactions (rd_customer_id,installment_amount,installment_no,plan_name,due_date,payment_date,late_fee,total_amount,paid) values('$mem_id','$installment_amount','$i','$rd_plan','$date','','','',false);";
				
			}
			$date=date("y-m-d",strtotime("+1 month",strtotime($date)));
			$rd_transactions .="insert into rd_transactions (rd_customer_id,installment_amount,installment_no,plan_name,due_date,payment_date,late_fee,total_amount,paid) values('$mem_id','$installment_amount','$n','$rd_plan','$date','','','',false)";
			if(mysqli_multi_query($conn,$rd_transactions)){
				echo '<script>alert("SUCCESSFULLY CREATED RD");</script>';
			}
			echo '<script>alert("SUCCESSFULLY CREATED");</script>';
		}else{
			echo '<script>alert("ERROR");</script>';
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
		<script>
			$(document).ready(function(){
				$("select").change(function() {
					var selection = $(this).val();
					$("#fdrd").show();
					switch(selection){
						case "rd":
							$(".rd").show();
							$(".fd").hide();
							break;
						case "fd":
							$(".rd").hide();
							$(".fd").show();
							break;
					}
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
				$("#compounding").change(function(){
					if($("#rd_plans").val() && $("#installment_amount").val()){
						var compounding_type=$("#compounding").val();
						var installment_amount=$("#installment_amount").val();
						var rd_plan=$("#rd_plans").val();
						$.ajax({
							url: 'fdrdcalculator.php',
							type: 'get',
							data:{
								name: "rd",
								compounding: compounding_type, 
								installment: installment_amount,
								plan: rd_plan
							},
							success: function(output){
								var result = $.parseJSON(output);
								$("#time").val(result[0]);
								$("#maturity").val(result[1]);
								$("#total").val(result[2]);
								$("#installment").val(installment_amount);
							},
							error: function(xhr,textStatus) {
								alert(xhr.status);
								console.log(textStatus);
							}
						});
					}
				});
				$("#compounding1").change(function(){
					if($("#fd_plans").val() && $("#plan_amount").val()){
						var compounding_type=$("#compounding").val();
						var plan_amount=$("#plan_amount").val();
						var fd_plan=$("#fd_plans").val();
						$.ajax({
							url: 'fdrdcalculator.php',
							type: 'get',
							data:{
								name:"fd",
								compounding:compounding_type,
								plan_amnt: plan_amount,
								plan:fd_plan
							},
							success: function(output){
								var result = $.parseJSON(output);
								$("#time").val(result[0]);
								$("#maturity").val(result[1]);
								$("#total").val(result[2]);
							},
							error: function(xhr,textStatus){
								alert(xhr.status);
								console.log(textStatus);
							}
						});
					}
				});
			});
		</script>
	</head>
	<body>
		<?php include('header.php'); ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 di" >
					<div class="page-header text-center">
						<h2>New Registration</h2>
						<i class="fa fa-5x fa-user-circle" aria-hidden="true"></i>
					</div>
							<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
								<table class="col-md-12">
									<tr>
										<td>
											<div class="form-group">
												<label>Agent</label>
												<input type="text" id="introducer" name="agent_name" required placeholder="ENTER AGENT" class="form-control">
												<span id="brokerspan"></span>
											</div>
										</td>
										<td>
											<div class="form-group">
												<label>MemberShip No</label>
												<input type="text" id="member" name="member_no" required Placeholder="ENTER MEMNERSHIP NO" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="form-group">
												<label>FD/RD</label>
												<select name="fdrd_plan" class="form-control" required>
													<option value="0">--SELECT--</option>
													<option value="fd">FD</option>
													<option value="rd">RD</option>
												</select>
											</div>
										</td>
										<td>
											<div class="form-group">
												<label>Payment Mode</label>
												<select name="pay_mode" class="form-control" required>
													<option value="bycash">BY CASH</option>
													<option value="bycheck">BY CHECH</option>
													<option value="bydd">BY DD</option>
												</select>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="form-group rd" style="display:none">
												<label>PLAN NAME</label>
												<?php
													echo '<select id="rd_plans" name="rd_plans" class="form-control" required>';
													$sql="select id,plan_name from rd_plans";
													$result=mysqli_query($conn,$sql);
													echo '<option>--SELECT PLAN--</option>';
													while($row=mysqli_fetch_assoc($result)){
														echo "<option value=".$row['id'].">".$row['plan_name']."</option>";
													}
													echo "</select>";
												?>
											</div>
											<div class="form-group fd" style="display:none">
												<label>PLAN NAME</label>
												<?php
													echo '<select id="fd_plans" name="fd_plans" class="form-control" required>';
													$sql="select id,plan_name from fd_plans";
													$result=mysqli_query($conn,$sql);
													echo '<option>--SELECT PLAN--</option>';
													while($row=mysqli_fetch_assoc($result)){
														echo "<option value=".$row['id'].">".$row['plan_name']."</option>";
													}
													echo "</select>";
												?>
											</div>
										</td>
										<td>
											<div class="form-group">
												<label>ADJUSTMENT AMOUNT</label>
												<input name="adjustment" placeholder="ADJUSTMENT AMOUNT" required class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="form-group rd" style="display:none">
												<label>INSTALLMENT AMOUNT</label>
												<input name="installment_amount" id="installment_amount" placeholder="INSTALLMENT AMOUNT" class="form-control">
											</div>
											<div class="form-group fd" style="display:none">
												<label>PLAN AMOUNT</label>
												<input name="plan_amount" id="plan_amount" placeholder="PLAN AMOUNT" class="form-control">
											</div>
										</td>
										<td>
											<div class="form-group">
												<label>SELECT CITY</label>
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
										</td>
									</tr>
									<tr>
										<td>
											<div class="form-group rd" style="display:none">
												<label>COMPOUNDING</label>
												<select name="compounding" id="compounding" required  class="form-control">
													<option >SELECT COMPOUNDING</option>
													<option value="quarterly">QUARTERLY</option>
													<option value="monthly">MONTHLY</option>
													<option value="halfyearly">HALF YEARLY</option>
													<option value="anually">ANUALLY</option>
												</select>
											</div>
											<div class="form-group fd"style="display:none">
												<label>COMPOUNDING</label>
												<select name="compounding1" id="compounding1" required  class="form-control">
													<option >SELECT COMPOUNDING</option>
													<option value="quarterly">QUARTERLY</option>
													<option value="monthly">MONTHLY</option>
													<option value="halfyearly">HALF YEARLY</option>
													<option value="anually">ANUALLY</option>
												</select>
											</div>
										</td>
									</tr>
									
								</table>
								<hr>
								<h2>Detail of Plan</h2>
								<table class="col-md-12">
									<tr>
										<td>
											<div class="form-group">
												<label>Plan No</label>
												<input readonly placeholder="AUTOGENERATED FIELD" class="form-control">
											</div>
										</td>
										<td>
											<div class="form-group">
												<label>Payment Period(in years) </label>
												<input readonly id="time" name="time_period" placeholder="AUTOGENERATED FIELD" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="form-group">
												<label>Area(Sq. Yds.) </label>
												<input readonly placeholder="AUTOGENERATED FIELD" class="form-control">
											</div>
										</td>
										<td>
											<div class="form-group">
												<label>Total Consideration</label>
												<input readonly id="total" name="total_amount" placeholder="AUTOGENERATED FIELD" readonly class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="form-group rd " style="display:none;">
												<label>Instalment Amount</label>
												<input readonly id="installment" placeholder="AUTOGENERATED FIELD" class="form-control">
											</div>
										</td>
										<td>
											<div class="form-group">
												<label>Maturity Amount</label>
												<input readonly id="maturity" name="maturity_amount" placeholder="AUTOGENERATED FIELD" class="form-control">
											</div>
										</td>
									</tr>
								</table>
							<hr>
							<h2>Bank Details</h2>
							<table class="col-md-12">
									<tr>
										<td>
											<div class="form-group">
												<label>Pan No</label>
												<input name="pan_no" id="pan_number" placeholder="PAN NUMBER" required class="form-control">
											</div>
										</td>
										<td>
											<div class="form-group">
												<label>Bank Account No</label>
												<input name="account_no" id="account_no" placeholder="ACCOUNT NUMBER" required class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="form-group">
												<label>Bank name</label>
												<input name="Bank_name" id="bank_name" placeholder="BANK NAME" required class="form-control">
											</div>
										</td>
										<td>
											<div class="form-group">
												<label>branch</label>
												<input NAME="bank_branch" id="branch_name" placeholder="BRANCH NAME" required  class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="form-group">
												<label>IFSC Code</label>
												<input name="ifsc_code" id="ifsc_code" placeholder="IFSC CODE" required class="form-control">
											</div>
										</td>
									</tr>
							</table>
							<hr>
							<h2>Name of Applicant</h2>
							<table class="col-md-12">
									<tr>
										<td>
											<div class="form-group">
												<label>Broker Name</label>
												
												
												<input type="text" placeholder="ENTER BROKER NAME" id="member_name" name="member_name" required class="form-control">
											</div>
										</td>
										<td>
											<div class="form-group">
											<label>GUARDIAN Name</label>
												
												<input type="text" placeholder="ENTER GUARDIAN NAME" id="guardian_name" name="guardian_name" required class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="form-group">
												<label>Date Of Birth</label>
												<input type="date" placeholder="ENTER DOB" name="dob" id="dob" required class="form-control">
											</div>
										</td>
										<td>
											<div class="form-group">
												<label>Age</label>
												<input type="number" placeholder="ENTER Age" name="age" id="age" required class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="form-group">
												<label>Broker Contact No.</label>
												<input type="number" placeholder="ENTER CONTACT NO" id="contact_no" name="contact_no" required class="form-control">
											</div>
										</td>
										<td>
											<div class="form-group">
												<label>Address</label>
												<textarea style="resize:none" name="address" id="address"	placeholder="ENTER ADDRESS" required class="form-control" rows="3" ></textarea>
											</div>
										</td>
									</tr>
									
										<td>
											<div class="form-group">
												<label>District</label>
												<input type="text" placeholder="ENTER DISTRICT" id="district" name="district" required class="form-control">
											</div>
										</td>
										<td>
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
										</td>
									</tr>
										<td>
											<div class="form-group">
												<label>Pin Code</label>
												<input type="number" id="pin_code" name="pin_code" placeholder="ENTER PIN CODE" required class="form-control">
											</div>
										</td>
										<td>
											<div class="form-group">
												<label>E-Mail Id</label>
												<input type="email" placeholder="ENTER E-MAIL" id="email" name="email" class="form-control">
											</div>
										</td>
									</tr>
							</table>
							<hr>
							<h2>Nomination</h2>
							<table class="col-md-12">
									<tr>
										<td>
											<div class="form-group">
												<label>Nominee Name</label>
												<input type="text" id="nominee_name" name="nominee_name" required placeholder="ENTER NOMINEE NAME" class="form-control">
											</div>
										</td>
										<td>
											<div class="form-group">
												<label>Nominee Age</label>
												<input type="number" id="nominee_age" name="nominee_age" required placeholder="ENTER NOMINEE AGE" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>
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
										</td>
										<td>
											<div class="form-group">
												<label>Nominee Address</label>
												<input type="text" id="nominee_address" name="nominee_address" required placeholder="ENTER NOMINEE ADDRESS" class="form-control">
											</div>
										</td>
									</tr>
							</table>
							<div class="form-group">
							<input type="submit" value="Save" class="btn btn-warning btn-block">
						</div>
						</form>
				</div>
			</div>
		</div>
		<footer>copyright &copy; 2017 Loan</footer>
	</body>
</html>