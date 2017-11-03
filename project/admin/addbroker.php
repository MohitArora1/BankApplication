<?php
include('connectdb.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$mem_id=test_input($_POST['member_id']);
	$intro_id=test_input($_POST['introducer_id']);
	$broker_type=test_input($_POST['broker_type']);
	$status="active";
	$sql_broker="insert into broker (introducer_id,member_id,broker_type,status,date)
									values(
										'$intro_id',
										'$mem_id',
										'$broker_type',
										'$status',
										now()
									)";
	if(mysqli_query($conn,$sql_broker)){
		echo '<script>
			alert("SUCCESSFULLY CREATE BROKER");
			</script>';
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
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script>
		$(document).ready(function(){
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
					if(result[0]=="members"){
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
					}else if(result[0]=="broker"){
						
					}
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
				<div class="col-md-4 div1">
					<div class="page-header text-center">
						<h2>Add Broker</h2>
						<i class="fa fa-5x fa-user-circle" aria-hidden="true"></i>
					</div>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<div class="form-group">
								<label>Introducer Id</label>
								<input type="text" id="introducer" placeholder="ENTER INTRODUCER ID" required name="introducer_id" class="form-control">
								<span id="brokerspan"></span>
							</div>
							<div class="form-group">
								<label>Membership Id</label>
								<input type="text" id="member" placeholder="ENTER MEMBERSHIP ID" required name="member_id" class="form-control">
							</div>
							<div class="form-group">
								<label>Broker Type</label>
								<?php
								echo '<select id="broker_type" name="broker_type" class="form-control" required>';
								$sql="select id,broker_type from broker_type";
								$result=mysqli_query($conn,$sql);
								echo '<option>--SELECT BROKER TYPE--</option>';
								while($row=mysqli_fetch_assoc($result)){
									echo "<option value=".$row['id'].">".$row['broker_type']."</option>";
								}
								echo "</select>";
							?>
							</div>
							<div class="form-group">
							<label>Branch</label>
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
						<div class="form-group">
							<label>Broker Name</label>
							<input type="text" placeholder="ENTER BROKER NAME" id="member_name" name="member_name" required class="form-control">
						</div>
						<div class="form-group">
						<label>GUARDIAN Name</label>
						
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
							<label>Gender</label>
							<select id="gender" class="form-control" required>
								<option>--SELECT GENDER--</option>
								<option value="male">MALE</option>
								<option value="female">FEMALE</option>
							</select>
						</div>
						<div class="form-group">
							<label>Broker Contact No.</label>
							<input type="number" placeholder="ENTER CONTACT NO" id="contact_no" name="contact_no" required class="form-control">
						</div>
						<div class="form-group">
							<label>E-Mail Id</label>
							<input type="email" placeholder="ENTER E-MAIL" id="email" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea name="address" placeholder="ENTER ADDRESS" id="address" required class="form-control" rows="3" ></textarea>
						</div>
						<div class="form-group">
							<label>District</label>
							<input type="text" placeholder="ENTER DISTRICT" id="district" required name="district" class="form-control">
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
								<input type="number" id="pin_code" name="pin_code" placeholder="ENTER PIN CODE" required class="form-control">
							</div>
							<div class="form-group">
								<label>Pan Number</label>
								<input type="text" id="pan_number" name="pan_number" placeholder="ENTER Pan number" required class="form-control">
							</div>
							<hr>
							<h3>Nominee Details</h3>
							<div class="form-group">
								<label>Nominee Name</label>
								<input type="text" id="nominee_name" name="nominee_name" required placeholder="ENTER NOMINEE NAME" class="form-control">
							</div>
							<div class="form-group">
								<label>Nominee Age</label>
								<input type="number" id="nominee_age" name="nominee_age" required placeholder="ENTER NOMINEE AGE" class="form-control">
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
								<input type="text" id="nominee_address" name="nominee_address" required placeholder="ENTER NOMINEE ADDRESS" class="form-control">
							</div>
							<div class="form-group">
								<label>Bank Name</label>
								<input type="text" id="bank_name" name="bank_name" required placeholder="ENTER BANK NAME" class="form-control">
							</div>
							<div class="form-group">
								<label>Branch Name</label>
								<input type="text" id="branch_name" name="branch_name" required placeholder="ENTER BRANCH NAME" class="form-control">
							</div>
							<div class="form-group">
								<label>Account No</label>
								<input type="text" id="account_no" name="account_no" required placeholder="ENTER ACCOUNT NO" class="form-control">
							</div>
							<div class="form-group">
								<label>IFSC Code</label>
								<input type="text" id="ifsc_code" name="ifsc_code" required placeholder="ENTER IFSC CODE" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" value="Save" class="btn btn-warning btn-block">
							</div>
						</form>
				</div>
				<div class="col-md-7 div1">
					<div class="page-header">
						<h2>Broker List</h2>
					</div>
					<?php
							$sql="select * from broker";
							$result=mysqli_query($conn,$sql);
							echo'
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<thead class="bg-info">
										<tr>
											<th>S.no</th>
											<th>Broker Id</th>
											<th>Broker Name</th>
											<th>Introducer</th>
											<th>Broker Type</th>
											<th>Rank</th>
											<th>Status</th>
										</tr>
									</thead>';
									$i=1;
										while($row=mysqli_fetch_assoc($result)){
											$sql_member_name="select member_name from members where id='$row[member_id]'";
											$sql_introducer_name="select members.member_name from members,broker where members.id=broker.member_id and broker.id='$row[introducer_id]'";
											$sql_type="select broker_type from broker_type where id='$row[broker_type]'";
											$run1=mysqli_query($conn,$sql_member_name);
											$row1=mysqli_fetch_assoc($run1);
											$member_name=$row1['member_name'];
											$run2=mysqli_query($conn,$sql_introducer_name);
											$row2=mysqli_fetch_assoc($run2);
											$introducer_name=$row2['member_name'];
											$run3=mysqli_query($conn,$sql_type);
											$row3=mysqli_fetch_assoc($run3);
											$broker_type=$row3['broker_type'];
											echo'
												<tr>
													<td>'.$i.'</td>
													<td>'.$row['id'].'</td>
													<td>'. $member_name .'</td>
													<td>'.$row['introducer_id'].'<br>'. $introducer_name .'</td>
													<td>'.$broker_type.'</td>
													<td>'.$row['broker_type'].'</td>
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