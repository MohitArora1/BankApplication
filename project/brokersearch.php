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
		<script>
			$(document).ready(function(){
				$("select").change(function(){
					var option=$(this).val();
					switch(option){
						case "name":
							$("#search").show();
							$("#city").hide();
							$("#broker_type").hide();
							break;
						case "brokerid":
							$("#search").show();
							$("#city").hide();
							$("#broker_type").hide();
							break;
						case "city":
							$("#search").hide();
							$("#city").show();
							$("#broker_type").hide();
							break;
						case "brokertype":
							$("#search").hide();
							$("#city").hide();
							$("#broker_type").show();
							break;
					}
				});
			});
		</script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
		<?php include('header.php'); ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 di " >
					<div class="page-header text-center">
						<h2>Broker Search</h2>
						<i class="fa fa-5x fa-user-circle" aria-hidden="true"></i>
					</div>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="form-group">
							<label>Select Search By</label>
							<select name="type" class="form-control" required>
								<option>--SELECT OPTION--</option>
								<option value="name">Name</option>
								<option value="brokerid">Broker ID</option>
								<option value="city">City</option>
								<option value="brokertype">Broker Type</option>
							</select>
						</div>
						<div class="form-group" id="search" style="display:none;">
							<label>Search</label>
							<input type="text" name="search" placeholder="SEARCH" class="form-control">
						</div>
						<div class="form-group" id="broker_type" style="display:none;">
							<label>Search</label>
							<?php
								echo '<select  name="broker_type" class="form-control" >';
								$sql="select id,broker_type from broker_type";
								$result=mysqli_query($conn,$sql);
								echo '<option>--SELECT BROKER TYPE--</option>';
								while($row=mysqli_fetch_assoc($result)){
									echo "<option value=".$row['id'].">".$row['broker_type']."</option>";
								}
								echo "</select>";
							?>
						</div>
						<div class="form-group" id="city" style="display:none;">
							<label>Search</label>
							<?php
								echo '<select  name="city" class="form-control">';
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
							<input type="submit" class="btn btn-success">
						</div>
					</form>
				</div>
				<br>
				<br>
				<br>
				<br>
				<div class="col-md-8 col-md-offset-2 di">
					<div class="page-header text-center">
						<h2>Broker List</h2>
					</div>
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead class="bg-info">
								<tr>
									<th>S.no</th>
									<th>Broker Name</th>
									<th>Broker Id</th>
									<th>Broker Contact NO</th>
									<th>Broker Address</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if($_SERVER["REQUEST_METHOD"] == "POST"){
										$type=test_input($_POST['type']);
										$sql="";
										if($type=="name"){
											$search=test_input($_POST['search']);
											$sql="select members.*,broker.id as broker_id from members,broker where members.id = broker.member_id AND members.member_name LIKE '%$search%'";
										}else if($type=="brokerid"){
											$id=test_input($_POST['search']);
											$sql="select members.*,broker.id as broker_id from members,broker where members.id=broker.member_id and broker.id='$id'";
										}else if($type=="city"){
											$city=test_input($_POST['city']);
											$sql="select members.*,broker.id as broker_id from members,broker where members.id=broker.member_id and members.city='$city'";
										}else if($type=="brokertype"){
											$broker_type=test_input($_POST['broker_type']);
											$sql="select members.*,broker.id as broker_id from members,broker where members.id=broker.member_id and broker.broker_type='$broker_type'";
										}else {
											$sql="select members.*,broker.id as broker_id from members,broker where members.id=broker.member_id"; 
										}
										$result=mysqli_query($conn,$sql);
										$count=mysqli_num_rows($result);
										if($count>0){
											$a=1;
											while($row=mysqli_fetch_assoc($result)){
												echo "<tr>
														<td>".$a."</td>
														<td>".$row['member_name']."</td>
														<td>".$row['broker_id']."</td>
														<td>".$row['contact_no']."</td>
														<td>".$row['address']."</td>
														<td>".$row['status']."</td>
													</tr>";
											}
										}
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
		</div>
		
		<footer>copyright &copy; 2017 Loan</footer>
	</body>
</html>





