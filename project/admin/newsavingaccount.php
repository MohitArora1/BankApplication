<?php
include('connectdb.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$member_id=test_input($_POST['member_id']);
	$introducer=test_input($_POST['intro_id']);
	$status="active";
	$balance=0;
	$sql_saving="insert into saving_account (member_id,introducer_id,balance,status,date)
				values('$member_id','$introducer','$balance','$status',now())";
	if(mysqli_query($conn,$sql_saving)){
		echo '<script>alert("SECCESSFULLY CREATED ACCOUNT")</script>';
	}else{
		echo '<script>alert("ERROR")</script>';
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
					console.log(textStatus)
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
				<div class="col-md-4 div1" >
					<div class="page-header text-center">
						<h2>Add Saving Account</h2>
						<i class="fa fa-5x fa-user-circle" aria-hidden="true"></i>
					</div>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="form-group">
							<label>Member Id</label>
							<input type="text" placeholder="ENTER MEMBER ID" required id="member" name="member_id" required class="form-control">
						</div>
						<div class="form-group">
							<label>Introducer Id</label>
							<input type="text" placeholder="ENTER INDRODUCER ID" required name="intro_id" id="introducer" required class="form-control">
							<span id="brokerspan"></span>
						</div>
						<div class="form-group">
							<label>City</label>
							<?php
								echo '<select id="city" name="city" class="form-control"required>';
								$sql="select id,city_name from city";
								$result=mysqli_query($conn,$sql);
								echo '<option>--SELECT CITY--</option>';
								while($row=mysqli_fetch_assoc($result)){
									echo "<option value=".$row['id'].">".$row['city_name']."</option>";
								}
								echo "</select>";
							?>
						</div>
						<div class="form-group">
							<label>Member Name</label>
							
							<input type="text" placeholder="ENTER MEMBER NAME" id="member_name" required name="member_name" required class="form-control">
						</div>
						<div class="form-group">
						<label>GUARDIAN Name</label>
							<input type="text" placeholder="ENTER GUARDIAN NAME" id="guardian_name" required name="guardian_name" required class="form-control">
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
								<option value="male">MALE</option>
								<option value="female">FEMALE</option>
							</select>
						</div>
						<div class="form-group">
							<label>Member Contact No.</label>
							<input type="number" id="contact_no" required placeholder="ENTER CONTACT NO" name="contact_no" required class="form-control">
						</div>
						<div class="form-group">
							<label>E-Mail Id</label>
							<input type="email" id="email" placeholder="ENTER E-MAIL" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea name="address" id="address" placeholder="ENTER ADDRESS" required class="form-control" rows="3" ></textarea>
						</div>
						<div class="form-group">
							<label>District</label>
							<input type="text" placeholder="ENTER DISTRICT" required id="district" name="district" class="form-control">
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
							<input type="text" id="nominee_name" name="nominee_name" placeholder="ENTER NOMINEE NAME" required class="form-control">
						</div>
						<div class="form-group">
							<label>Nominee Age</label>
							<input type="number" id="nominee_age" name="nominee_age" placeholder="ENTER NOMINEE AGE" required class="form-control">
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
					<div class="page-header text-center">
						<h2>Saving Account</h2>
					</div>
				</div>
			</div>
		</div>
	
		
		<footer>copyright &copy; 2017 Loan</footer>
	</body>
</html>





