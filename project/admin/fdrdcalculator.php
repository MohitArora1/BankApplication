<?php
include('connectdb.php');
if(isset($_GET['name'])){
	if($_GET['name']=="rd"){
		$plan=test_input($_GET['plan']);
		$installment=test_input($_GET['installment']);
		$compounding=test_input($_GET['compounding']);
		if($compounding == "quarterly"){
			$compounding_number=4;
		}else if($compounding == "monthly"){
			$compounding_number=12;
		}else if($compounding == "halfyearly"){
			$compounding_number=2;
		}else{
			$compounding_number=1;
		}
		$sql_rd_plan="select time_period,rate from rd_plans where id='$plan'";
		$result=mysqli_query($conn,$sql_rd_plan);
		$count=mysqli_num_rows($result);
		if($count>0){
			$row=mysqli_fetch_assoc($result);
			$time_period=$row['time_period'];
			$rate=$row['rate'];
			$time=$time_period*12;
			$total_amount=$installment * $time;
			$freq=1+($rate/100)/$compounding_number;
			$maturity_amount=0;
			for($i= $time; $i>=1; $i--){
				$maturity_amount+=$installment * pow($freq , $compounding_number*calculate_month_in_year($i));
			}
			//$maturity_amount=$installment * (pow(1+ $rate/400,$freq)-1)/ (1- pow((1 + $rate/400),(-1/3)));
			$maturity_amount=round($maturity_amount);
			echo json_encode(array($time_period,$maturity_amount,$total_amount));
		}
	}
	if($_GET['name']=="fd"){
		$plan=test_input($_GET['plan']);
		$plan_amount=test_input($_GET['plan_amnt']);
		$compounding=test_input($_GET['compounding']);
		if($compounding == "quarterly"){
			$compounding_number=4;
		}else if($compounding == "monthly"){
			$compounding_number=12;
		}else if($compounding == "halfyearly"){
			$compounding_number=2;
		}else{
			$compounding_number=1;
		}
		$sql_fd_plan="select * from fd_plans where id='$plan'";
		$result=mysqli_query($conn,$sql_fd_plan);
		$count=mysqli_num_rows($result);
		if($count>0){
			$row=mysqli_fetch_assoc($result);
			$maturity_time=$row['maturity_time'];
			$time_period=$row['time_period'];
			$rate=$row['rate'];
			$time=$time_period*12;
			$freq=1+($rate/100)/$compounding_number;
			$maturity_amount=$plan_amount * pow($freq , $compounding_number*calculate_month_in_year($time));
			$maturity_time/=12;
			$maturity_time+=$time_period;
			$maturity_amount=round($maturity_amount);
			echo json_encode(array($maturity_time,$maturity_amount,$plan_amount));
		}
	}
}
function calculate_month_in_year($t){
	return $t/12;
}
function test_input($data) {
	  $data = mysqli_real_escape_string($GLOBALS['conn'],strip_tags($data));
	  return $data;
}
?>