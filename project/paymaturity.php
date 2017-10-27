<?php 
include('connectdb.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$id=test_input($_POST['reg_no']);
	$c_type=$_POST['c_type'];
	$ledger=$_POST['ledger'];
	$money_type=$_POST['money_type'];
	$narration=test_input($_POST['narration']);
	$amount=test_input($_POST['amount']);
	$out="out";
	if($_POST['c_type']=="rd"){
		$check_sql="select status from rd_customer where id='$id'";
		$result=mysqli_query($conn,$check_sql);
		$row=mysqli_fetch_assoc($result);
		if($row['status']=="active"){
			$ins_sql="insert into expenses (ledger,customer_id,customer_type,amount,payment_mode,in_out,narration,date) values('$ledger','$id','$c_type','$amount','$money_type','$out','$narration',now())";
			$update_sql="update rd_customer set status='deactive' where id='$id'";
			if(mysqli_query($conn,$ins_sql) && mysqli_query($conn,$update_sql)){
				echo '<script>alert("SUCCESS")</script>';
			}
		}else{
			echo '<script>alert("ALREADY PAID")</script>';
		}
	}else if($_POST['c_type']=="fd"){
		if($row['status']=="active"){
			$ins_sql="insert into expenses (ledger,customer_id,customer_type,amount,payment_mode,in_out,narration,date) values('$ledger','$id','$c_type','$amount','$money_type','$out','$narration',now())";
			$update_sql="update fd_customer set status='deactive' where id='$id'";
			if(mysqli_query($conn,$ins_sql) && mysqli_query($conn,$update_sql)){
				echo '<script>alert("SUCCESS")</script>';
			}
		}else{
			echo '<script>alert("ALREADY PAID")</script>';
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
		<script>
			$(document).ready(function(){
				$("#reg_no").change(function(){
					var reg_no=$(this).val();
					var c_type=$("#c_type").val();
					$.ajax({
						url: "datafetcher.php",
					  type: "get", //send it through get method
					  
					  data: { 
						reg_id : reg_no,
						type : c_type
					  },
					  success: function(output) {
						  var result = $.parseJSON(output);
						  $("#name").text(result[0].toString());
						  $("#amount").val(result[1]);
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
					
				<div class="col-md-8 col-md-offset-2 di">
					<div class="col-md-8 col-md-offset-2">
						<div class="page-header text-center">
						<h2>Pay Maturity</h2>
						</div>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<table>
							<tr>
									<div class="form-group">
										<td>
											<label>Customer Type</label>
										</td>
										<td>
											<select id="c_type" name="c_type"class="form-control">
												<option value="rd">RD</option>
												<option value="fd">FD</option>
											</select>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Registration No</label>
										</td>
										<td>
											<input type="text" id="reg_no" name="reg_no" Placeholder="REGISTRATION NO" required class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Account Holder Name</label>
										</td>
										<td>
											<span id="name"></span>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Date</label>
										</td>
										<td>
											<input type="text" name="date" readonly placeholder="<?php echo date('d/m/y'); ?>" required class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Ledger</label>
										</td>
										<td>
											<select name="ledger" class="form-control">
												<?php 
													$sql_ledger="select * from ledger";
													$result=mysqli_query($conn,$sql_ledger);
													while($row=mysqli_fetch_assoc($result)){
														echo'<option value="'.$row['id'].'">'.$row['ledger'].'</option>';
													}
												?>
											</select>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Bank/Cash</label>
										</td>
										<td>
											<select name="money_type" class="form-control">
												<option value="bank_acc">Bank Acc</option>
												<option value="cash">Cash</option>
											</select>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Narration</label>
										</td>
										<td>
											<input type="text" name="narration" Placeholder="NARRATION" required class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Amount</label>
										</td>
										<td>
											<input type="text" id="amount" name="amount" Placeholder="AMOUNT" required class="form-control">
										</td>
									</div>
								</tr>
								
								<tr>
									<div class="form-group">
										<td>
											
										</td>
										<td>
											<div class="form-group text-center">
												<input type="submit" value="Pay" class="btn btn-info">
											</div>
										</td>
									</div>
								</tr>					
							</table>
							
							
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
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br> 
					</div>
				</div>
			</div>
		</div>
		
		<footer>copyright &copy; 2017 Loan</footer>
	</body>
</html>





