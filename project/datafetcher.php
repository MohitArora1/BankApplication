<?php
include('connectdb.php');
if(isset($_GET['name'],$_GET['id'])){
	$name=test_input($_GET['name']);
	$id=test_input($_GET['id']);
	$member_name="";
	$guardian_name="";
	$dob="";
	$age="";
	$gender="";
	$contact_no="";
	$email="";
	$address="";
	$city="";
	$district="";
	$state="";
	$pin_code="";
	$nominee_name="";
	$nominee_age="";
	$nominee_relation="";
	$nominee_address="";
	$bank_name="";
	$branch_name="";
	$ifsc_code="";
	$account_no="";
	$pan_no="";
	if($name == "members"){
		$sql_member="select * from members where id='$id'";
		$sql_nominee="select * from nominee where member_id='$id'";
		$result=mysqli_query($conn,$sql_member);
		$count=mysqli_num_rows($result);
		if($count==1){
			$row=mysqli_fetch_assoc($result);
			$member_name=$row['member_name'];
			$guardian_name=$row['guardian_name'];
			$dob=$row['date_of_birth'];
			$age=$row['age'];
			$gender=$row['gender'];
			$contact_no=$row['contact_no'];
			$email=$row['email'];
			$address=$row['address'];
			$city=$row['city'];
			$district=$row['district'];
			$state=$row['state'];
			$pin_code=$row['pin_code'];
		}
		$result=mysqli_query($conn,$sql_nominee);
		$count=mysqli_num_rows($result);
		if($count==1){
			$row=mysqli_fetch_assoc($result);
			$nominee_name=$row['name'];
			$nominee_age=$row['age'];
			$nominee_relation=$row['relation'];
			$nominee_address=$row['address'];
			$bank_name=$row['bank_name'];
			$branch_name=$row['branch_name'];
			$ifsc_code=$row['ifsc_code'];
			$account_no=$row['account_no'];
			$pan_no=$row['pan_no'];
		}
		echo json_encode(array(
					$name,
					$member_name,
					$guardian_name,
					$dob,
					$age,
					$gender,
					$contact_no,
					$email,
					$address,
					$city,
					$district,
					$state,
					$pin_code,
					$nominee_name,
					$nominee_age,
					$nominee_relation,
					$nominee_address,
					$bank_name,
					$branch_name,
					$ifsc_code,
					$account_no,
					$pan_no
					));
	}
	else if($name == "broker"){
		$sql_broker="select member_name from members where id=(select member_id from broker where id='$id')";
		$result=mysqli_query($conn,$sql_broker);
		$count=mysqli_num_rows($result);
		if($count==1){
			$row=mysqli_fetch_assoc($result);
			$broker_name=$row['member_name'];
			echo json_encode($broker_name);
		}
	}
}
if(isset($_GET['reg_id'],$_GET['type'])){
	if($_GET['type']=="rd"){
		$id=test_input($_GET['reg_id']);
		$sql="select members.member_name,rd_customer.maturity_amount from members,rd_customer where members.id=(select member_id from rd_customer where id='$id') and rd_customer.id='$id'";
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_assoc($result)){
			$name=$row['member_name'];
			$maturity_amount=$row['maturity_amount'];
			echo json_encode(array($name,$maturity_amount));
		}
		
	}else if($_GET['type']=="fd"){
		$id=test_input($_GET['reg_id']);
		$sql="select members.member_name,fd_customer.maturity_amount from members,fd_customer where members.id=(select member_id from fd_customer where id='$id')  and fd_customer.id='$id'";
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_assoc($result)){
			$name=$row['member_name'];
			$maturity_amount=$row['maturity_amount'];
			echo json_encode(array($name,$maturity_amount));
		}
	}
}
function test_input($data) {
	  $data = mysqli_real_escape_string($GLOBALS['conn'],strip_tags($data));
	  return $data;
}
?>