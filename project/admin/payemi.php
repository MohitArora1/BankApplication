<?php
include('connectdb.php');
if(isset($_GET['id'])){
	$sql3="update loan_transactions set is_paid=true where id='$_GET[id]'";
	if(mysqli_query($conn,$sql3)){
		echo '<script>alert("SUCCESS");
					window.location="payemi.php?loan_no='.$_GET['loan_no1'].'";
			</script>';
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
	</head>
	<body>
		<?php include('header.php'); ?>
		<div class="container-fluid">
			<div class="row">
					
				<div class="col-md-8 col-md-offset-2 di">
					<div class="col-md-12 ">
						<div class="page-header text-center">
						<h2>Pay EMI</h2>
						</div>
						<div class="col-md-8 col-md-offset-2">
						<form>
							<table>
								<tr>
									<div class="form-group">
										<td>
											<label>Loan No</label>
										</td>
										<td>
											<input type="text" name="loan_no" Placeholder="LOAN NO" required class="form-control">
										</td>
									</div>
								</tr>
														
							</table>
							<div class="form-group text-center">
								<input type="submit" value="Get Details" class="btn btn-info">
							</div>
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
					</div>
					<?php
						if(isset($_GET['loan_no'])){
							$loan_customer_id=test_input($_GET['loan_no']);
							$sql="select * from loan_transactions where loan_customer_id='$loan_customer_id'";
							$sql2="select member_name from members where id=(select member_id from loan_customers where id='$loan_customer_id')";
							$run=mysqli_query($conn,$sql2);
							$row1=mysqli_fetch_assoc($run);
							$name=$row1['member_name'];
							$result=mysqli_query($conn,$sql);
							echo '
							<div class="table-responsive col-md-12">
								<table class="table table-striped table-bordered table-hover text-center">
									<thead class="bg-info">
										<tr>
											<th>installment_no</th>
											<th>Name</th>
											<th>loan_no</th>
											<th>installment</th>
											<th>Due Date</th>
											<th>total Amount</th>
											<th>pay</th>
										</tr>
									</thead>';
										while($row=mysqli_fetch_assoc($result)){
											echo'<tr>
													<td>'.$row['installment_no'].'</td>
													<td>'.$name.'</td>
													<td>'.$row['loan_customer_id'].'</td>
													<td>'.$row['installment_amount'].'</td>
													<td>'.$row['installment_date'].'</td>
													<td>'.$row['installment_amount'].'</td>';
												if($row['is_paid']){
													echo'<td></td>';
												}else{
													echo "<td><a href='payemi.php?id=$row[id]&loan_no1=$loan_customer_id' class='btn btn-danger'>Pay</a></td>";
												}	
													
											echo'	</tr>';
										}
										
									echo '<tbody>
									</tbody>
								</table>
							</div>
							';
						}
						
					?>
					
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<footer>copyright &copy; 2017 Loan</footer>
	</body>
</html>





