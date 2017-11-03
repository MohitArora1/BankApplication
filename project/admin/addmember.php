<?php
include('connectdb.php');

function namefetcher($id){
	$sql="select member_id from broker where='$id'";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_assoc($result)){
		
	}
}	
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$introducer=test_input($_POST['intro_id']);
	$city=test_input($_POST['city']);
	$prefix=test_input($_POST['prefix']);
	$member_name=test_input($_POST['member_name']);
	$member_name=$prefix ." " .$member_name;
	$relation=test_input($_POST['rel']);
	$guardian_name=test_input($_POST['guardian_name']);
	$guardian_name=$relation." " . $guardian_name;
	$dob=test_input($_POST['dob']);
	$age=test_input($_POST['age']);
	$gender=test_input($_POST['gender']);
	$contact_no=test_input($_POST['contact_no']);
	$email=test_input($_POST['email']);
	$address=test_input($_POST['address']);
	$district=test_input($_POST['district']);
	$state=test_input($_POST['state']);
	$pin_code=test_input($_POST['pin_code']);
	$status="active";
	
	$nominee_name=test_input($_POST['nominee_name']);
	$nominee_age=test_input($_POST['nominee_age']);
	$nominee_ralation=test_input($_POST['relation']);
	$nominee_address=test_input($_POST['nominee_address']);
	$bank_name=test_input($_POST['bank_name']);
	$branch=test_input($_POST['branch_name']);
	$account_no=test_input($_POST['account_no']);
	$ifsc_code=test_input($_POST['ifsc_code']);
	$pan_number=test_input($_POST['pan_number']);
	$member_id="";
	
	$sql_member="insert into members (introducer_id,member_name,guardian_name,date_of_birth,age,gender,contact_no,email,address,city,district,state,pin_code,status,date) 
					values(
					'$introducer',
					'$member_name',
					'$guardian_name',
					'$dob',
					'$age',
					'$gender',
					'$contact_no',
					'$email',
					'$address',
					'$city',
					'$district',
					'$state',
					'$pin_code',
					'$status',
					now()
					)";
	
	if(mysqli_query($conn,$sql_member)){
		$member_id=mysqli_insert_id($conn);
		$sql_nominee="insert into nominee (member_id,name,age,relation,address,bank_name,branch_name,ifsc_code,account_no,pan_no)
					values(
					'$member_id',
					'$nominee_name',
					'$nominee_age',
					'$nominee_ralation',
					'$nominee_address',
					'$bank_name',
					'$branch',
					'$ifsc_code',
					'$account_no',
					'$pan_number'
					)";
		if(mysqli_query($conn,$sql_nominee)){
			echo '<script>alert("SUCCESSFULLY CREATE MEMBER");</script>';
			header ("Location: addmember.php");
		}else{
			echo "error in nominee". mysqli_error($conn);
		}
	}else{
			echo "error in member". mysqli_error($conn);
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
						console.log(textStatus);
					  }
					});
				});
			});
		</script>
	</head>
	<body>
		<?php include('header.php'); ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 div1" >
					<div class="page-header text-center">
						<h2>Add Member</h2>
						<i class="fa fa-5x fa-user-circle" aria-hidden="true"></i>
					</div>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="form-group">
							<label for="intro">Introducer Id</label>
							<input id="introducer" type="text" placeholder="ENTER INDRODUCER ID" name="intro_id" required class="form-control">
							<span id="brokerspan"></span>
						</div>
						<div class="form-group">
							<label>City</label>
							<?php
								echo '<select name="city" class="form-control" required>';
								$sql="select id,city_name from city";
								$result=mysqli_query($conn,$sql);
								while($row=mysqli_fetch_assoc($result)){
									echo "<option value=".$row['id'].">".$row['city_name']."</option>";
								}
								echo "</select>";
							?>
						</div>
						<div class="form-group">
							<div class="col-md-6"><label>Member Name</label></div>
							<div class="col-md-6">
								<select name="prefix" class="form-control">
									<option value="Mr">Mr.</option>
									<option value="Ms">Ms.</option>
									<option value="Mrs">Mrs.</option>
								</select>
							</div>
							<input type="text" placeholder="ENTER MEMBER NAME" name="member_name" required class="form-control">
						</div>
						<div class="form-group">
						<div class="col-md-6"><label>GUARDIAN Name</label></div>
							<div class="col-md-6">
								<select name="rel" class="form-control">
									<option value="s/o">S/O</option>
									<option value="w/o">W/O</option>
									<option value="d/o">D/O</option>
								</select>
							</div>
							<input type="text" placeholder="ENTER GUARDIAN NAME" name="guardian_name" required class="form-control">
						</div>
						<div class="form-group">
							<label>Date Of Birth</label>
							<input type="date" placeholder="ENTER DOB" name="dob" required class="form-control">
						</div>
						<div class="form-group">
							<label>Age</label>
							<input type="number" placeholder="ENTER Age" name="age" required class="form-control">
						</div>
						<div class="form-group">
							<label>Gender</label>
							<select name="gender" class="form-control">
								<option value="male">MALE</option>
								<option value="female">FEMALE</option>
							</select>
						</div>
						<div class="form-group">
							<label>Member Contact No.</label>
							<input type="number" placeholder="ENTER CONTACT NO" name="contact_no" required class="form-control">
						</div>
						<div class="form-group">
							<label>E-Mail Id</label>
							<input type="email" placeholder="ENTER E-MAIL" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea name="address" placeholder="ENTER ADDRESS" required class="form-control" rows="3" ></textarea>
						</div>
						<div class="form-group">
							<label>District</label>
							<input type="text" placeholder="ENTER DISTRICT" name="district" required class="form-control">
						</div>
						<div class="form-group">
							<label>State</label>
							<?php
								echo '<select name="state" class="form-control" required>';
								$sql="select id,state_name from state";
								$result=mysqli_query($conn,$sql);
								while($row=mysqli_fetch_assoc($result)){
									echo "<option value=".$row['id'].">".$row['state_name']."</option>";
								}
								echo "</select>";
							?>
						</div>
						<div class="form-group">
							<label>Pin Code</label>
							<input type="number" name="pin_code" placeholder="ENTER PIN CODE" required class="form-control">
						</div>
						<hr>
						<h3>Nominee Details</h3>
						<div class="form-group">
							<label>Nominee Name</label>
							<input type="text" name="nominee_name" placeholder="ENTER NOMINEE NAME" required class="form-control">
						</div>
						<div class="form-group">
							<label>Nominee Age</label>
							<input type="number" name="nominee_age" placeholder="ENTER NOMINEE AGE" required class="form-control">
						</div>
						<div class="form-group">
							<label>Relationship</label>
							<?php
								echo '<select name="relation" id="relation" required class="form-control">';
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
							<input type="text" name="nominee_address" required placeholder="ENTER NOMINEE ADDRESS" class="form-control">
						</div>
						<div class="form-group">
							<label>Bank Name</label>
							<input type="text" name="bank_name" placeholder="ENTER BANK NAME" required class="form-control">
						</div>
						<div class="form-group">
							<label>Branch Name</label>
							<input type="text" name="branch_name" placeholder="ENTER BRANCH NAME" required class="form-control">
						</div>
						<div class="form-group">
							<label>Account No</label>
							<input type="text" name="account_no" placeholder="ENTER ACCOUNT NO" required class="form-control">
						</div>
						<div class="form-group">
							<label>IFSC Code</label>
							<input type="text" name="ifsc_code" placeholder="ENTER IFSC CODE" required class="form-control">
						</div>
						<div class="form-group">
							<label>Pan Number</label>
							<input type="text" name="pan_number" placeholder="ENTER Pan number" required class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" value="Save" class="btn btn-warning btn-block">
						</div>
					</form>
					
				</div>
				
				<div class="col-md-7 div1">
					<div class="page-header text-center">
						<h2>Member List</h2>
					</div>
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead class="bg-info">
								<tr>
									<th>S.no</th>
									<th>Member Name</th>
									<th>Member Id</th>
									<th>Member Contact NO</th>
									<th>Member Address</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sql="select * from members";
									$result=mysqli_query($conn,$sql);
									$count=mysqli_num_rows($result);
									if($count>0){
										$a=1;
										for($i=0;$i<$count;$i++){
											$row=mysqli_fetch_assoc($result);
											echo "<tr>
												<td>". $a ."</td>
												<td>".$row['member_name']."</td>
												<td>".$row['id']."</td>
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





