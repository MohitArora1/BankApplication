<?php
include('connectdb.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$error="";
	$account_no=test_input($_POST['acc_no']);
	$balance=test_input($_POST['balance']);
	$transactiontype=test_input($_POST['transactiontype']);
	$amount=test_input($_POST['amount']);
	$confirm_amount=test_input($_POST['confirm_amount']);
	$payment_mode=test_input($_POST['payment_mode']);
	$voucher_no=test_input($_POST['voucher_no']);
	$remark=test_input($_POST['remark']);
	if($amount==$confirm_amount){
		if($transactiontype=="withdral"){
			if($amount<$balance){
				$new_balance=$balance-$amount;
			}else{
				echo '<script>alert("BALANCE LOW");</script>';
			}
		}else if($transactiontype=="deposit"){
			$new_balance=$balance+$amount;
		}
		if($new_balance>0){
			$ins_sql="insert into saving_transaction (saving_id,transaction_type,before_balance,amount,after_balance,date,payment_mode,voucher_no,remarks) values('$account_no','$transactiontype','$balance','$amount','$new_balance',now(),'$payment_mode','$voucher_no','$remark')";
			$up_sql="update saving_account set balance='$new_balance'";
			if(mysqli_query($conn,$ins_sql) && mysqli_query($conn,$up_sql)){
				echo '<script>alert("Transaction SUCCESSFULL");</script>';
			}
		}
	}else{
		echo '<script>alert("AM0UNT AND CONFIRM AMOUNT NOT MATCH");</script>';
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
				$("#acc_no").change(function(){
					var acc_no=$("#acc_no").val();
					
					$.ajax({
						url: "saving_detail_fetcher.php",
						type : "get",
						data: {
							account_no : acc_no
						},
						success: function(output){
							var result=$.parseJSON(output);
							$("#account_holder").text(result[0].toString());
							$("#balance").val(result[1]);
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
						<h2>Saving Transaction</h2>
						</div>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<table>
								<tr>
									<div class="form-group">
										<td>
											<label>A/C No</label>
										</td>
										<td>
											<input type="text" name="acc_no" id="acc_no" Placeholder="A/C NO" class="form-control" required>
											<span id="account_holder"></span>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Balance</label>
										</td>
										<td>
											<input type="text" name="balance" id="balance" readonly Placeholder="" required class="form-control">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>transaction Type</label>
										</td>
										<td>
											<select name="transactiontype" required class="form-control">
												<option value="deposit">DEPOSIT</option>
												<option value="withdral">Withdral</option>
											</select>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Amount</label>
										</td>
										<td>
											<input type="number" name="amount"  Placeholder="ENTER AMOUNT" class="form-control" required>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Confirm Amount</label>
										</td>
										<td>
											<input type="number" name="confirm_amount"  Placeholder="ENTER Confirm AMOUNT" class="form-control" required>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Payment mode</label>
										</td>
										<td>
											<select name="payment_mode" required class="form-control">
												<option value="cash">CASH</option>
												<option value="check">CHECK/DD</option>
											</select>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Voucher No</label>
										</td>
										<td>
											<input type="number" name="voucher_no"  Placeholder="ENTER Voucher No" class="form-control" required>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Remarks</label>
										</td>
										<td>
											<input type="text" name="remark"  Placeholder="ENTER Remark" class="form-control">
										</td>
									</div>
								</tr>
							
							</table>
							<div class="form-group text-center">
								<input type="submit" value="pay" class="btn btn-info">
							</div>
						</form>
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





