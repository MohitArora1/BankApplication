<?php
include('connectdb.php');

if(isset($_GET['account_no'])){
	$id=test_input($_GET['account_no']);
	$sql="select members.member_name,saving_account.balance from members,saving_account where saving_account.member_id = members.id and saving_account.id= '$id'";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_assoc($result)){
		//echo $row['member_name'];
		echo json_encode(array($row['member_name'],$row['balance']));
	}
}
function test_input($data) {
	  $data = mysqli_real_escape_string($GLOBALS['conn'],strip_tags($data));
	  return $data;
}
?>