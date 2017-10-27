<?php
include('connectdb.php');
if(isset($_GET['pay_id'],$_GET['registration_no'])){
	$pay_id=test_input($_GET['pay_id']);
	$reg_id=test_input($_GET['registration_no']);
	$sql="select member_name, address, date from members where id=(select member_id from rd_customer where id=(select rd_customer_id from rd_transactions where id='$reg_id'))";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	echo '
		<center>
			<pre>
Renewal Slip
				
				`
name: '.$row['member_name'].'			plan:     		Date of Commencement: '.$row['date'].'
address: '.$row['address'].'		
			</pre>
		</center>
	';
}
function test_input($data) {
	  $data = mysqli_real_escape_string($GLOBALS['conn'],strip_tags($data));
	  return $data;
}
?>