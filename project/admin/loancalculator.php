<?php
include('connectdb.php');
if(isset($_GET['loan_amnt'])){
	$plan_name=$_GET['plan'];
	$loan_type=$_GET['loan_typ'];
	$loan_amount=test_input($_GET['loan_amnt']);
	$sql_plan="select time_period from loan_plans where id='$plan_name'";
	$sql_type="select rate from loan_type where id='$loan_type'";
	$result=mysqli_query($conn,$sql_plan);
	$row=mysqli_fetch_assoc($result);
	$time=$row['time_period'];
	$run=mysqli_query($conn,$sql_type);
	$row1=mysqli_fetch_assoc($run);
	$rate=$row1['rate'];
	$rate=$rate/12/100;
	$emi=$loan_amount*$rate*pow((1+$rate),$time)/(pow((1+$rate),$time)-1);
	$emi=round($emi);
	echo json_encode(array($emi,$time));
}
function test_input($data) {
	  $data = mysqli_real_escape_string($GLOBALS['conn'],strip_tags($data));
	  return $data;
}
?>