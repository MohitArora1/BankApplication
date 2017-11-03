<?php
include('connectdb.php');
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
		<div id="print">
			<?php
				if(isset($_GET['id'])){
					$id=test_input($_GET['id']);
							$sql="select * from loan_transactions where loan_customer_id='$id'";
							$sql2="select member_name from members where id=(select member_id from loan_customers where id='$id')";
							$run=mysqli_query($conn,$sql2);
							$row1=mysqli_fetch_assoc($run);
							$name=$row1['member_name'];
							$result=mysqli_query($conn,$sql);
							echo '
							<div class="table-responsive col-md-12">
								<table class="table table-striped table-bordered table-hover text-center">
									<thead class="bg-info">
										<tr>
											<th>S.NO</th>
											<th>Name</th>
											<th>loan Id</th>
											<th>installment</th>
											<th>Due Date</th>
											<th>Today Date</th>
											<th>Signature</th>
										</tr>
									</thead>';
										while($row=mysqli_fetch_assoc($result)){
											echo'<tr>
													<td>'.$row['installment_no'].'</td>
													<td>'.$name.'</td>
													<td>'.$row['loan_customer_id'].'</td>
													<td>'.$row['installment_amount'].'</td>
													<td>'.$row['installment_date'].'</td>
													<td></td>
													<td></td>
												</tr>';
										}
										
									echo '<tbody>
									</tbody>
								</table>
							</div>
							';
				}
			?>
		</div>
	</body>
</html>