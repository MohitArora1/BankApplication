<?php
include('connectdb.php');
if(isset($_GET['user_delete'])){
	$user_delete_id=$_GET['user_delete'];
	$user_delete_sql="delete from users where id='$user_delete_id'";
	if(mysqli_query($conn,$user_delete_sql)){
		
	}
}
if(isset($_GET['pending_loan_id'])){
	$pending_loan_id=$_GET['pending_loan_id'];
	$sql_update="update loan_customers set status='approved' where id='$pending_loan_id'";
	if(mysqli_query($conn,$sql_update)){
		
	}
}
if(isset($_POST['editstate'])){
	$edit_state_id=$_POST['edit_state_id'];
	$edit_state_name=strtoupper($_POST['edit_state_name']);
	$edit_state_sql="update state set state_name='$edit_state_name' where id='$edit_state_id' ";
	if(mysqli_query($conn,$edit_state_sql)){
		
	}
}

if(isset($_POST['addstate'])){
	$add_state_name=strtoupper($_POST['add_state_name']);
	$add_state_name_sql="insert into state (state_name) values('$add_state_name')";
	if(mysqli_query($conn,$add_state_name_sql)){
		
	}
}
if(isset($_POST['addcity'])){
	$add_city_name=strtoupper($_POST['add_city_name']);
	$add_city_state=$_POST['add_city_state'];
	$add_city_name_sql="insert into city (state_id,city_name) values('$add_city_state','$add_city_name')";
	if(mysqli_query($conn,$add_city_name_sql)){
		
	}
}
if(isset($_POST['editcity'])){
	$edit_city_name=strtoupper($_POST['edit_city_name']);
	$edit_city_state=$_POST['edit_city_state'];
	$edit_city_id=$_POST['edit_city_id'];
	$edit_city_name_sql="update city set state_id='$edit_city_state' , city_name='$edit_city_name' where id='$edit_city_id'";
	if(mysqli_query($conn,$edit_city_name_sql)){
		
	}
}
if(isset($_POST['addledger'])){
	$add_ledger=strtoupper($_POST['add_ledger']);
	$add_ledger_sql="insert into ledger (ledger) values('$add_ledger')";
	if(mysqli_query($conn,$add_ledger_sql)){
		
	}
}
if(isset($_POST['editledger'])){
	$edit_ledger=strtoupper($_POST['edit_ledger']);
	$edit_ledger_id=$_POST['edit_ledger_id'];
	$edit_ledger_sql="update ledger set ledger='$edit_ledger' where id='$edit_ledger_id'";
	if(mysqli_query($conn,$edit_ledger_sql)){
		
	}else{
		echo mysqli_error($conn);
	}
}
if(isset($_POST['addbrokertype'])){
	$add_broker_type=strtoupper($_POST['add_broker_type']);
	$add_broker_commission=$_POST['add_broker_commission'];
	$add_broker_sql="insert into broker_type (broker_type,commission) values('$add_broker_type','$add_broker_commission')";
	if(mysqli_query($conn,$add_broker_sql)){
		
	}
}
if(isset($_POST['editbrokertype'])){
	$edit_broker_type=strtoupper($_POST['edit_broker_type']);
	$edit_broker_commission=$_POST['edit_broker_commission'];
	$edit_broker_id=$_POST['edit_broker_id'];
	$edit_broker_sql="update broker_type set broker_type='$edit_broker_type' , commission='$edit_broker_commission' where id='$edit_broker_id'";
	if(mysqli_query($conn,$edit_broker_sql)){
		
	}
}
if(isset($_POST['addfdplan'])){
	$add_fd_plan_name=strtoupper($_POST['add_fd_plan_name']);
	$add_fd_plan_time_period=$_POST['add_fd_plan_time_period'];
	$add_fd_plan_maturity=$_POST['add_fd_plan_maturity'];
	$add_fd_plan_rate=$_POST['add_fd_plan_rate'];
	$add_fd_plan_sql="insert into fd_plans (plan_name,time_period,maturity_time,rate) values('$add_fd_plan_name','$add_fd_plan_time_period','$add_fd_plan_maturity','$add_fd_plan_rate')";
	if(mysqli_query($conn,$add_fd_plan_sql)){
		
	}
}
if(isset($_POST['editfdplan'])){
	$edit_fd_plan_name=strtoupper($_POST['edit_fd_plan_name']);
	$edit_fd_plan_id=$_POST['edit_fd_plan_id'];
	$edit_fd_plan_time_period=$_POST['edit_fd_plan_time_period'];
	$edit_fd_plan_maturity=$_POST['edit_fd_plan_maturity'];
	$edit_fd_plan_rate=$_POST['edit_fd_plan_rate'];
	$edit_fd_plan_sql="update fd_plans set plan_name='$edit_fd_plan_name' , time_period='$edit_fd_plan_time_period' , maturity_time='$edit_fd_plan_maturity' , rate='$edit_fd_plan_rate' where id='$edit_fd_plan_id'";
	if(mysqli_query($conn,$edit_fd_plan_sql)){
		
	}
}
if(isset($_POST['addloanplan'])){
	$add_loan_plan_name=strtoupper($_POST['add_loan_plan_name']);
	$add_loan_plan_time_period=$_POST['add_loan_plan_time_period'];
	$add_loan_plan_sql="insert into loan_plans (plan_name,time_period) values('$add_loan_plan_name','$add_loan_plan_time_period')";
	if(mysqli_query($conn,$add_loan_plan_sql)){
		
	}
}
if(isset($_POST['editloanplan'])){
	$edit_loan_plan_name=strtoupper($_POST['edit_loan_plan_name']);
	$edit_loan_plan_id=$_POST['edit_loan_plan_id'];
	$edit_loan_plan_time_period=$_POST['edit_loan_plan_time_period'];
	$edit_loan_plan_sql="update loan_plans set plan_name='$edit_loan_plan_name',time_period='$edit_loan_plan_time_period' where id='$edit_loan_plan_id'";
	if(mysqli_query($conn,$edit_loan_plan_sql)){
		
	}
}
if(isset($_POST['addloantype'])){
	$add_loan_type_name=strtoupper($_POST['add_loan_type_name']);
	$add_loan_type_rate=$_POST['add_loan_type_rate'];
	$add_loan_type_sql="insert into loan_type (plan_name,rate) values('$add_loan_type_name','$add_loan_type_rate')";
	if(mysqli_query($conn,$add_loan_type_sql)){
		
	}
}
if(isset($_POST['editloantype'])){
	$edit_loan_type_name=strtoupper($_POST['edit_loan_type_name']);
	$edit_loan_type_id=$_POST['edit_loan_type_id'];
	$edit_loan_type_rate=$_POST['edit_loan_type_rate'];
	$edit_loan_type_sql="update loan_type set plan_name='$edit_loan_type_name',rate='$edit_loan_type_rate' where id='$edit_loan_type_id'";
	if(mysqli_query($conn,$edit_loan_type_sql)){
		
	}
}
if(isset($_POST['addrdplan'])){
	$add_rd_plan_name=strtoupper($_POST['add_rd_plan_name']);
	$add_rd_plan_time_period=$_POST['add_rd_plan_time_period'];
	$add_rd_plan_rate=$_POST['add_rd_plan_rate'];
	$add_rd_plan_sql="insert into rd_plans (plan_name,time_period,rate) values('$add_rd_plan_name','$add_rd_plan_time_period','$add_rd_plan_rate')";
	if(mysqli_query($conn,$add_rd_plan_sql)){
		
	}
}
if(isset($_POST['editrdplan'])){
	$edit_rd_plan_name=strtoupper($_POST['edit_rd_plan_name']);
	$edit_rd_plan_id=$_POST['edit_rd_plan_id'];
	$edit_rd_plan_time_period=$_POST['edit_rd_plan_time_period'];
	$edit_rd_plan_rate=$_POST['edit_rd_plan_rate'];
	$edit_rd_plan_sql="update rd_plans set plan_name='$edit_rd_plan_name',time_period='$edit_rd_plan_time_period', rate='$edit_rd_plan_rate' where id='$edit_rd_plan_id'";
	if(mysqli_query($conn,$edit_rd_plan_sql)){
		
	}
}

if(isset($_POST['adduser'])){
	$add_user_name=$_POST['add_user_name'];
	$add_user_username=$_POST['add_user_username'];
	$add_user_password=$_POST['add_user_password'];
	$user_type=2;
	$add_user_sql="insert into users (user_type,name,username,password) values('$user_type','$add_user_name','$add_user_username','$add_user_password')";
	if(mysqli_query($conn,$add_user_sql)){
		
	}
}
if(isset($_POST['edituser'])){
	$edit_user_name=$_POST['edit_user_name'];
	$edit_user_id=$_POST['edit_user_id'];
	$edit_user_username=$_POST['edit_user_username'];
	$edit_user_password=$_POST['edit_user_password'];
	$user_type=2;
	$edit_user_sql="update users set name='$edit_user_name',username='$edit_user_username', password='$edit_user_password' where id='$edit_user_id'";
	if(mysqli_query($conn,$edit_user_sql)){
		
	}
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
				$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
					localStorage.setItem('activeTab', $(e.target).attr('href'));
				});
				var activeTab = localStorage.getItem('activeTab');
				if(activeTab){
					$('#myTab a[href="' + activeTab + '"]').tab('show');
				}
			});
		</script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
		<?php include('header.php'); ?>
		<div class="container">
				<div class="row">
				<div class="col-md-3">
					<ul id="myTab" class="nav nav-tabs nav nav-stacked  bg-success">
						  <li class="active"><a data-toggle="tab" href="#addstate">Add State</a></li>
						  <li><a data-toggle="tab" href="#addcity">Add City</a></li>
						  <li><a data-toggle="tab" href="#addledger">Add Ledger</a></li>
						  <li><a data-toggle="tab" href="#addbrokertype">Add Broker Types</a></li>
						  <li><a data-toggle="tab" href="#addfdplans">Add FD Plans</a></li>
						  <li><a data-toggle="tab" href="#addloanplans">Add Loan Plans</a></li>
						  <li><a data-toggle="tab" href="#addloantypes">Add Loan Types</a></li>
						  <li><a data-toggle="tab" href="#addrdplans">Add RD Plans</a></li>
						  <li><a data-toggle="tab" href="#createemployee">Create Employee</a></li>
						  <li><a data-toggle="tab" href="#loan_approval">Loan Approval</a></li>
						</ul>
					</div>

						<div class="tab-content col-md-9">
						  <div id="addstate" class="tab-pane fade in active">
							<h3>STATES</h3>
							<a class="btn btn-info" data-toggle="modal" data-target="#modal_addstate">Add New</a>
							<?php
								$sql_state="select * from state";
								$result_state=mysqli_query($conn,$sql_state);
								echo '
								<div class="table-responsive">
								<table class="table table-bordered table-responsive table-striped">
										<thead class="bg-info">
											<tr>
												<th>S.No</th>
												<th>State Name</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>';
										$i=1;
								while($row_state=mysqli_fetch_assoc($result_state)){
									echo '
											<tr>
												<td>'.$i.'</td>
												<td>'.$row_state['state_name'].'</td>
												<td><a href="#modal_editstate'.$i.'" data-toggle="modal" class="btn btn-info">Edit</a></td>
												<td><a class="btn btn-danger">Delete</a></td>
											</tr>';
											
											echo '<div class="modal fade" id="modal_editstate'.$i.'">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header"> 
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">ADD STATE</h4>
														</div>
														<div class="modal-body">
															<form method="post" action="dashboard.php">
																<div class="form-group">
																	<lable>Enter State</lable>
																	<input type="text" name="edit_state_name" value="'.$row_state['state_name'].'" style="text-transform:uppercase"  required class="form-control">
																	<input hidden name="edit_state_id" type="text" value="'.$row_state['id'].'">
																</div>
																<div class="form-group">
																	<input type="submit"  name="editstate" required class="form-control btn-danger">
																</div>
																
															</form>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>';
											
											$i++;
								}
								echo '</tbody>
									</table>
									</div>';
							?>
						  </div>
						  <div id="addcity" class="tab-pane fade">
							<h3>CITY</h3>
							<a class="btn btn-info " data-toggle="modal" data-target="#modal_addcity">Add New</a>
							<?php
								$sql_city="select * from city";
								$result_city=mysqli_query($conn,$sql_city);
								echo '
								<div class="table-responsive">
								<table class="table table-bordered table-responsive table-striped">
										<thead class="bg-info">
											<tr>
												<th>S.No</th>
												<th>State Name</th>
												<th>City Name</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>';
										$i=1;
								while($row_city=mysqli_fetch_assoc($result_city)){
									$sql_state_name="select state_name from state where id='$row_city[state_id]'";
									$sql_state_name1="select * from state ";
									$result_state_name=mysqli_query($conn,$sql_state_name);
									$row_state_name=mysqli_fetch_assoc($result_state_name);
									echo '
											<tr>
												<td>'.$i.'</td>
												<td>'.$row_state_name['state_name'].'</td>
												<td>'.$row_city['city_name'].'</td>
												<td><a href="#modal_editcity'.$i.'" data-toggle="modal" class="btn btn-info">Edit</a></td>
												<td><a class="btn btn-danger">Delete</a></td>
											</tr>';
											
										echo '<div class="modal fade" id="modal_editcity'.$i.'">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header"> 
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">EDIT CITY</h4>
														</div>
														<div class="modal-body">
															<form method="post" action="dashboard.php">
																<div class="form-group">
																	<lable>Select State</lable>
																	<select  name="edit_city_state"  required class="form-control">';
																	$result_state_name1=mysqli_query($conn,$sql_state_name1);
																		while($row_state_name1=mysqli_fetch_assoc($result_state_name1))
																		{
																			if($row_city['state_id']==$row_state_name1['id']){
																				echo '<option selected value="'.$row_state_name1['id'].'">'.$row_state_name1['state_name'].'</option>';
																			}else{
																				echo '<option value="'.$row_state_name1['id'].'">'.$row_state_name1['state_name'].'</option>';
																			}
																			
																		}
																		
																	echo '</select>
																</div>
																<div class="form-group">
																	<lable>Enter City</lable>
																	<input type="text" name="edit_city_name" value="'.$row_city['city_name'].'" style="text-transform:uppercase"  required class="form-control">
																	<input hidden name="edit_city_id" value="'.$row_city['id'].'">
																</div>
																<div class="form-group">
																	<input type="submit"  name="editcity" required class="form-control btn-danger">
																</div>
																
															</form>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>';	
											$i++;
								}
								echo '</tbody>
									</table>
									</div>';
							?>
						  </div>
						  <div id="addledger" class="tab-pane fade">
							<h3>LEDGER</h3>
							<a class="btn btn-info " data-toggle="modal" data-target="#modal_addledger">Add New</a>
							<?php
								$sql_ledger="select * from ledger";
								$result_ledger=mysqli_query($conn,$sql_ledger);
								echo '
								<div class="table-responsive">
								<table class="table table-bordered table-responsive table-striped">
										<thead class="bg-info">
											<tr>
												<th>S.No</th>
												<th>LEDGER</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>';
										$i=1;
								while($row_ledger=mysqli_fetch_assoc($result_ledger)){
									echo '
											<tr>
												<td>'.$i.'</td>
												<td>'.$row_ledger['ledger'].'</td>
												<td><a href="#modal_editledger'.$i.'" data-toggle="modal" class="btn btn-info">Edit</a></td>
												<td><a class="btn btn-danger">Delete</a></td>
											</tr>';
											
											echo '
												<div class="modal fade" id="modal_editledger'.$i.'">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header"> 
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">EDIT LEDGER</h4>
															</div>
															<div class="modal-body">
																<form method="post" action="dashboard.php">
																	<div class="form-group">
																		<lable>Ledger</lable>
																		<input type="text" value="'.$row_ledger['ledger'].'" name="edit_ledger" class="form-control" style="text-transform:uppercase">
																		<input type="text" hidden name="edit_ledger_id" value="'.$row_ledger['id'].'">
																	</div>
																	<div class="form-group">
																		<input type="submit" name="editledger" class="form-control btn btn-danger"> 
																	</div>
																</form>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											';
											
											$i++;
								}
								echo '</tbody>
									</table>
									</div>';
							?>
						  </div>
						  <div id="addbrokertype" class="tab-pane fade">
							<h3>BROKER TYPE</h3>
							<a class="btn btn-info " data-toggle="modal" data-target="#modal_addbrokertype">Add New</a>
							<?php
								$sql_broker_type="select * from broker_type";
								$result_broker_type=mysqli_query($conn,$sql_broker_type);
								echo '
								<div class="table-responsive">
								<table class="table table-bordered table-responsive table-striped">
										<thead class="bg-info">
											<tr>
												<th>S.No</th>
												<th>Broker Type</th>
												<th>Commission Rate</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>';
										$i=1;
								while($row_broker_type=mysqli_fetch_assoc($result_broker_type)){
									echo '
											<tr>
												<td>'.$i.'</td>
												<td>'.$row_broker_type['broker_type'].'</td>
												<td>'.$row_broker_type['commission'].'</td>
												<td><a href="#modal_editbrokertype'.$i.'" data-toggle="modal" class="btn btn-info">Edit</a></td>
												<td><a class="btn btn-danger">Delete</a></td>
											</tr>';
											
											echo '
											<div class="modal fade" id="modal_editbrokertype'.$i.'">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header"> 
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">EDIT BROKER TYPES</h4>
														</div>
														<div class="modal-body">
															<form method="post" action="dashboard.php">
																<div class="form-group">
																	<lable>Broker Type</lable>
																	<input type="text" value="'.$row_broker_type['broker_type'].'" class="form-control" name="edit_broker_type" required style="text-transform:uppercase">
																</div>
																<div class="form-group">
																	<lable>Commission</lable>
																	<input type="number" step="0.01" class="form-control" value="'.$row_broker_type['commission'].'" name="edit_broker_commission" required >
																	<input type="text" hidden name="edit_broker_id" value="'.$row_broker_type['id'].'">
																</div>
																<div class="form-group">
																	<input type="submit" name="editbrokertype" class="form-control btn btn-danger">
																</div>
															</form>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
											';
											$i++;
								}
								echo '</tbody>
									</table>
									</div>';
							?>
						  </div>
						  <div id="addfdplans" class="tab-pane fade">
							<h3>FD PLANS</h3>
							<a class="btn btn-info " data-toggle="modal" data-target="#modal_addfdplans">Add New</a>
							<?php
								$sql_fd_plans="select * from fd_plans";
								$result_fd_plans=mysqli_query($conn,$sql_fd_plans);
								echo '
								<div class="table-responsive">
								<table class="table table-bordered table-responsive table-striped">
										<thead class="bg-info">
											<tr>
												<th>S.No</th>
												<th>Plan Name</th>
												<th>Time Period</th>
												<th>Maturity Time</th>
												<th>Intrest Rate</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>';
										$i=1;
								while($row_fd_plans=mysqli_fetch_assoc($result_fd_plans)){
									echo '
											<tr>
												<td>'.$i.'</td>
												<td>'.$row_fd_plans['plan_name'].'</td>
												<td>'.$row_fd_plans['time_period'].'</td>
												<td>'.$row_fd_plans['maturity_time'].'</td>
												<td>'.$row_fd_plans['rate'].'</td>
												<td><a href="#modal_editfdplans'.$i.'" data-toggle="modal" class="btn btn-info">Edit</a></td>
												<td><a class="btn btn-danger">Delete</a></td>
											</tr>';
											
											echo '
												<div class="modal fade" id="modal_editfdplans'.$i.'">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header"> 
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">EDIT FD PLANS</h4>
															</div>
															<div class="modal-body">
																<form method="post" action="dashboard.php">
																	<div class="form-group">
																		<lable>Plan Name</lable>
																		<input type="text" value="'.$row_fd_plans['plan_name'].'" name="edit_fd_plan_name" class="form-control" style="text-transform:uppercase">
																		<input type="text" hidden value="'.$row_fd_plans['id'].'" name="edit_fd_plan_id">
																	</div>
																	<div class="form-group">
																		<lable>Time Period</lable>
																		<input type="number" value="'.$row_fd_plans['time_period'].'" name="edit_fd_plan_time_period" class="form-control">
																	</div>
																	<div class="form-group">
																		<lable>Maturity Time</lable>
																		<input type="number" value="'.$row_fd_plans['maturity_time'].'" name="edit_fd_plan_maturity" class="form-control" >
																	</div>
																	<div class="form-group">
																		<lable>Interest Rate</lable>
																		<input type="number" step="0.01" value="'.$row_fd_plans['rate'].'" name="edit_fd_plan_rate" class="form-control" >
																	</div>
																	<div class="form-group">
																		
																		<input type="submit" name="editfdplan" class="form-control btn btn-danger" >
																	</div>
																</form>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											';
											
											$i++;
								}
								echo '</tbody>
									</table>
									</div>';
							?>
						  </div>
						  <div id="addloanplans" class="tab-pane fade">
							<h3>LOAN PLANS</h3>
							<a class="btn btn-info " data-toggle="modal" data-target="#modal_addloanplans">Add New</a>
							<?php
								$sql_loan_plans="select * from loan_plans";
								$result_loan_plans=mysqli_query($conn,$sql_loan_plans);
								echo '
								<div class="table-responsive">
								<table class="table table-bordered table-responsive table-striped">
										<thead class="bg-info">
											<tr>
												<th>S.No</th>
												<th>Plan Name</th>
												<th>Time Period</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>';
										$i=1;
								while($row_loan_plans=mysqli_fetch_assoc($result_loan_plans)){
									echo '
											<tr>
												<td>'.$i.'</td>
												<td>'.$row_loan_plans['plan_name'].'</td>
												<td>'.$row_loan_plans['time_period'].'</td>
												<td><a href="#modal_editloanplans'.$i.'" data-toggle="modal" class="btn btn-info">Edit</a></td>
												<td><a class="btn btn-danger">Delete</a></td>
											</tr>';
											
											echo '
												<div class="modal fade" id="modal_editloanplans'.$i.'">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header"> 
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">EDIT LOAN PLANS</h4>
															</div>
															<div class="modal-body">
																<form method="post" action="dashboard.php">
																	<div class="form-group">
																		<lable>Plan Name</lable>
																		<input type="text" name="edit_loan_plan_name" value="'.$row_loan_plans['plan_name'].'" class="form-control" style="text-transform:uppercase">
																		<input type="text" name="edit_loan_plan_id" value="'.$row_loan_plans['id'].'" hidden>
																	</div>
																	<div class="form-group">
																		<lable>Time Period</lable>
																		<input type="number" value="'.$row_loan_plans['time_period'].'" name="edit_loan_plan_time_period" class="form-control" >
																	</div>
																	<div class="form-group">
																		<input type="submit" name="editloanplan" class="form-control btn btn-danger" >
																	</div>
																</form>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											';
											$i++;
								}
								echo '</tbody>
									</table>
									</div>';
							?>
						  </div>
						  <div id="addloantypes" class="tab-pane fade">
							<h3>LOAN TYPES</h3>
							<a class="btn btn-info " data-toggle="modal" data-target="#modal_addloantypes">Add New</a>
							<?php
								$sql_loan_type="select * from loan_type";
								$result_loan_type=mysqli_query($conn,$sql_loan_type);
								echo '
								<div class="table-responsive">
								<table class="table table-bordered table-responsive table-striped">
										<thead class="bg-info">
											<tr>
												<th>S.No</th>
												<th>Plan Name</th>
												<th>Interest Rate</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>';
										$i=1;
								while($row_loan_type=mysqli_fetch_assoc($result_loan_type)){
									echo '
											<tr>
												<td>'.$i.'</td>
												<td>'.$row_loan_type['plan_name'].'</td>
												<td>'.$row_loan_type['rate'].'</td>
												<td><a href="#modal_editloantypes'.$i.'" data-toggle="modal" class="btn btn-info">Edit</a></td>
												<td><a class="btn btn-danger">Delete</a></td>
											</tr>';
											
											echo '
												<div class="modal fade" id="modal_editloantypes'.$i.'">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header"> 
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">EDIT LOAN TYPES</h4>
															</div>
															<div class="modal-body">
																<form method="post" action="dashboard.php">
																	<div class="form-group">
																		<lable>Plan Name</lable>
																		<input type="text" value="'.$row_loan_type['plan_name'].'" name="edit_loan_type_name" class="form-control" style="text-transform:uppercase">
																		<input type="text" name="edit_loan_type_id" value="'.$row_loan_type['id'].'" hidden> 
																	</div>
																	<div class="form-group">
																		<lable>Interest</lable>
																		<input type="number" step="0.01" value="'.$row_loan_type['rate'].'" name="edit_loan_type_rate" class="form-control" >
																	</div>
																	<div class="form-group">
																		<input type="submit" name="editloantype" class="form-control btn btn-danger" >
																	</div>
																</form>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											';
											
											$i++;
								}
								echo '</tbody>
									</table>
									</div>
									';
							?>
						  </div>
						  <div id="addrdplans" class="tab-pane fade">
							<h3>RD PLANS</h3>
							<a class="btn btn-info " data-toggle="modal" data-target="#modal_addrdplans">Add New</a>
							<?php
								$sql_rd_plans="select * from rd_plans";
								$result_rd_plans=mysqli_query($conn,$sql_rd_plans);
								echo '
								<div class="table-responsive">
								<table class="table table-bordered table-responsive table-striped">
										<thead class="bg-info">
											<tr>
												<th>S.No</th>
												<th>Plan Name</th>
												<th>Time Period</th>
												<th>Rate</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>';
										$i=1;
								while($row_rd_plans=mysqli_fetch_assoc($result_rd_plans)){
									echo '
											<tr>
												<td>'.$i.'</td>
												<td>'.$row_rd_plans['plan_name'].'</td>
												<td>'.$row_rd_plans['time_period'].'</td>
												<td>'.$row_rd_plans['rate'].'</td>
												<td><a href="#modal_editrdplans'.$i.'" data-toggle="modal" class="btn btn-info">Edit</a></td>
												<td><a class="btn btn-danger">Delete</a></td>
											</tr>';
											
											echo'
												<div class="modal fade" id="modal_editrdplans'.$i.'">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header"> 
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">EDIT RD PLANS</h4>
															</div>
															<div class="modal-body">
																<form method="post" action="dashboard.php">
																	<div class="form-group">
																		<lable>Plan Name</lable>
																		<input type="text" value="'.$row_rd_plans['plan_name'].'" name="edit_rd_plan_name" class="form-control" style="text-transform:uppercase">
																		<input type="text" name="edit_rd_plan_id" value="'.$row_rd_plans['id'].'" hidden>
																	</div>
																	<div class="form-group">
																		<lable>Time Period</lable>
																		<input type="number" value="'.$row_rd_plans['time_period'].'" name="edit_rd_plan_time_period" class="form-control" >
																	</div>
																	<div class="form-group">
																		<lable>Interest</lable>
																		<input type="number" step="0.01" value="'.$row_rd_plans['rate'].'" name="edit_rd_plan_rate" class="form-control" >
																	</div>
																	<div class="form-group">
																		<input type="submit" name="editrdplan" class="form-control btn btn-danger" >
																	</div>
																</form>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											';
											
											$i++;
								}
								echo '</tbody>
									</table>
									</div>
									';
							?>
						  </div>
						  <div id="createemployee" class="tab-pane fade">
							<h3>EMPLOYEES</h3>
							<a class="btn btn-info " data-toggle="modal" data-target="#modal_createemployee">Add New</a>
							<?php
								$sql_user="select * from users";
								$result_user=mysqli_query($conn,$sql_user);
								echo '
								<div class="table-responsive">
								<table class="table table-bordered table-striped">
										<thead class="bg-info">
											<tr>
												<th>S.No</th>
												<th>Name</th>
												<th>UserName</th>
												<th>password</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>';
										$i=1;
								while($row_user=mysqli_fetch_assoc($result_user)){
									if($row_user['user_type']!=1){
										echo '
											<tr>
												<td>'.$i.'</td>
												<td>'.$row_user['name'].'</td>
												<td>'.$row_user['username'].'</td>
												<td>'.$row_user['password'].'</td>
												<td><a href="#modal_editemployee'.$i.'" data-toggle="modal" class="btn btn-info">Edit</a></td>
												<td><a href="dashboard.php?user_delete='.$row_user['id'].'" class="btn btn-danger">Delete</a></td>
											</tr>';
											
											echo'
												<div class="modal fade" id="modal_editemployee'.$i.'">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header"> 
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">EDIT EMPLOYEES</h4>
															</div>
															<div class="modal-body">
																<form method="post" action="dashboard.php">
																	<div class="form-group">
																		<lable>Name</lable>
																		<input type="text" value="'.$row_user['name'].'" name="edit_user_name" class="form-control" style="text-transform:uppercase">
																		<input type="text" name="edit_user_id" value="'.$row_user['id'].'" hidden>
																	</div>
																	<div class="form-group">
																		<lable>UserName</lable>
																		<input type="text" value="'.$row_user['username'].'" name="edit_user_username" class="form-control" >
																	</div>
																	<div class="form-group">
																		<lable>password</lable>
																		<input type="password" value="'.$row_user['password'].'" name="edit_user_password" class="form-control" >
																	</div>
																	<div class="form-group">
																		<input type="submit" name="edituser" class="form-control btn btn-danger" >
																	</div>
																</form>
															</div>
															<div class="modal-footer">
																<button type="button"  class="btn btn-danger" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											';
											
											$i++;
									}
									
								}
								echo '</tbody>
									</table>
									</div>';
							?>
						  </div>
						  <div id="loan_approval" class="tab-pane fade ">
							<h3>Loan For Approval</h3>
							<?php
								$sql="select * from loan_customers where status LIKE 'pending'";
								$result=mysqli_query($conn,$sql);
								echo'
								<div class="table-responsive">
									<table class="table table-bordered  table-striped table-hover">
										<thead class="bg-info">
											<tr>
												<th>S.no</th>
												<th>APPLICANT</th>
												<th>EMPLOYEE</th>
												<th>Date</th>
												<th>Plan Name</th>
												<th>Duration</th>
												<th>Loan Amount</th>
												<th>Status</th>
												<th>Pending</th>
											</tr>
										</thead>';
										$i=1;
											while($row=mysqli_fetch_assoc($result)){
												$sql_member_name="select member_name from members where id='$row[member_id]'";
												$sql_introducer_name="select members.member_name from members,broker where members.id=broker.member_id and broker.id='$row[introducer_id]'";
												$sql_plan="select plan_name,time_period from loan_plans where id='$row[plan_name]'";
												$run1=mysqli_query($conn,$sql_member_name);
												$row1=mysqli_fetch_assoc($run1);
												$member_name=$row1['member_name'];
												$run2=mysqli_query($conn,$sql_introducer_name);
												$row2=mysqli_fetch_assoc($run2);
												$introducer_name=$row2['member_name'];
												$run3=mysqli_query($conn,$sql_plan);
												$row3=mysqli_fetch_assoc($run3);
												$plan_name=$row3['plan_name'];
												$time_period=$row3['time_period'];
												echo'
													<tr>
														<td>'.$i.'</td>
														<td>'.$row['application_number'].'<br>'. $member_name .'</td>
														<td>'.$row['introducer_id'].'<br>'. $introducer_name .'</td>
														<td>'.$row['date'].'</td>
														<td>'.$plan_name.'</td>
														<td>'.$time_period.'</td>
														<td>'.$row['loan_amount'].'</td>
														<td>'.$row['status'].'</td>
														<td><a href="dashboard.php?pending_loan_id='.$row['id'].'" class="btn btn-danger">Approve</a></td>
													</tr>
												';
												$i++;
											}
										echo'<tbody>
										</tbody>
									</table>
									</div>
								';
							?>
						  </div>
						</div>
					</ul>
				</div>
				<br>
				<br>
			<div class="row">
				<div class="col-md-6 bg-warning" style="height:1000px">
					<div class="page-header text-center">
						<h3>Due Loan EMI for This Month</h3>
					</div>
					<div class="col-md-12">
					<?php
					
						$date=date("y-m-d");
						$date1="10-01-01";
						$date2=date("y-m-d",strtotime("+1 month",strtotime($date)));
						$sql_emi="select * from loan_transactions where is_paid=false and installment_date between '$date1' and '$date2'";
						$result_emi=mysqli_query($conn,$sql_emi);
						echo '
						<div clas="table-responsive col-md-12">
								<table class="table  table-striped table-bordered table-hover">
									<thead class="bg-info">
										<tr>
											<th>S.no</th>
											<th>APPLICANT</th>
											<th>Contact No</th>
											<th>Date</th>
											<th>Installment</th>
										</tr>
									</thead>
									<tbody>
									';
									$i=1;
						while($row_emi=mysqli_fetch_assoc($result_emi)){
							$sql_member="select member_name, contact_no from members where id=(select member_id from loan_customers where id='$row_emi[loan_customer_id]')";
							$result_member=mysqli_query($conn,$sql_member);
							$row_member=mysqli_fetch_assoc($result_member);
							$member_name=$row_member['member_name'];
							$contact_no=$row_member['contact_no'];
							echo '
								<tr>
									<td>'.$i.'</td>
									<td>'.$member_name.'</td>
									<td>'.$contact_no.'</td>
									<td>'.$row_emi['installment_date'].'</td>
									<td>'.$row_emi['installment_amount'].'</td>
								</tr>
							';
						$i++;
						}
						echo '
							</tbody>
							</table>
						';
					?>
						
					</div>
					</div>
				</div>
				<div class="col-md-6 bg-success" style="height:1000px;">
					<div class="page-header text-center">
						<h3>Renewal for This Month</h3>
					</div>
					<div class="col-md-12">
					<?php
					
						$date=date("y-m-d");
						$date1="10-01-01";
						$date2=date("y-m-d",strtotime("+1 month",strtotime($date)));
						$sql_renewal="select * from rd_transactions where paid=false and due_date between '$date1' and '$date2'";
						$result_renewal=mysqli_query($conn,$sql_renewal);
						echo '
						<div class="table-responsive col-md-12">
								<table class="table  table-striped table-bordered table-hover">
									<thead class="bg-info">
										<tr>
											<th>S.no</th>
											<th>APPLICANT</th>
											<th>Contact No</th>
											<th>Date</th>
											<th>Installment</th>
										</tr>
									</thead>
									<tbody>
									';
									$i=1;
						while($row_renewal=mysqli_fetch_assoc($result_renewal)){
							$sql_member1="select member_name, contact_no from members where id=(select member_id from rd_customer where id='$row_renewal[rd_customer_id]')";
							$result_member1=mysqli_query($conn,$sql_member1);
							$row_member1=mysqli_fetch_assoc($result_member1);
							$member_name1=$row_member1['member_name'];
							$contact_no1=$row_member1['contact_no'];
							echo '
								<tr>
									<td>'.$i.'</td>
									<td>'.$member_name1.'</td>
									<td>'.$contact_no1.'</td>
									<td>'.$row_renewal['due_date'].'</td>
									<td>'.$row_renewal['installment_amount'].'</td>
								</tr>
							';
						$i++;
						}
						echo '
							</tbody>
							</table>
						';
					?>
						
					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<!---- Modals -->
		<div class="modal fade" id="modal_addstate">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"> 
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">ADD STATE</h4>
					</div>
					<div class="modal-body">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<div class="form-group">
								<lable>Enter State</lable>
								<input type="text" name="add_state_name"  required class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" name="addstate" style="text-transform:uppercase" required class="form-control btn-danger">
							</div>
							
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!---- Modals -->
		<div class="modal fade" id="modal_addcity">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"> 
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">ADD CITY</h4>
					</div>
					<div class="modal-body">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
						<div class="form_group">
							<lable>Select State</lable>
							<select name="add_city_state" class="form-control">
							<?php
								$result_state_name2=mysqli_query($conn,$sql_state_name1);
								while($row_state_name2=mysqli_fetch_assoc($result_state_name2)){
									echo '<option value="'.$row_state_name2['id'].'">'.$row_state_name2['state_name'].'</option>';
								}
							?>
							</select>
							</div>
							<div class="form-group">
								<lable>Enter City</lable>
								<input type="text" name="add_city_name" style="text-transform:uppercase" class="form-control">
							</div>
						<div class="form-group">
								<input type="submit" name="addcity" class="form-control btn-danger">
						</div>
					</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!---- Modals -->
		<div class="modal fade" id="modal_addledger">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"> 
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">ADD LEDGER</h4>
					</div>
					<div class="modal-body">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<div class="form-group">
								<lable>Ledger</lable>
								<input type="text" name="add_ledger" required class="form-control" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<input type="submit" name="addledger" class="form-control btn btn-danger"> 
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!---- Modals -->
		<div class="modal fade" id="modal_addbrokertype">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"> 
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">ADD BROKER TYPES</h4>
					</div>
					<div class="modal-body">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<div class="form-group">
								<lable>Broker Type</lable>
								<input type="text" class="form-control" name="add_broker_type" required style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<lable>Commission</lable>
								<input type="number" step="0.01" class="form-control" name="add_broker_commission" required >
							</div>
							<div class="form-group">
								<input type="submit" name="addbrokertype" class="form-control btn btn-danger">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!---- Modals -->
		<div class="modal fade" id="modal_addfdplans">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"> 
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">ADD FD PLANS</h4>
					</div>
					<div class="modal-body">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<div class="form-group">
								<lable>Plan Name</lable>
								<input type="text" name="add_fd_plan_name" class="form-control" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<lable>Time Period</lable>
								<input type="number" name="add_fd_plan_time_period" class="form-control">
							</div>
							<div class="form-group">
								<lable>Maturity Time</lable>
								<input type="number" name="add_fd_plan_maturity" class="form-control" >
							</div>
							<div class="form-group">
								<lable>Interest Rate</lable>
								<input type="number" step="0.01" name="add_fd_plan_rate" class="form-control" >
							</div>
							<div class="form-group">
								
								<input type="submit" name="addfdplan" class="form-control btn btn-danger" >
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		
		<!---- Modals -->
		<div class="modal fade" id="modal_addloanplans">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"> 
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">ADD LOAN PLANS</h4>
					</div>
					<div class="modal-body">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<div class="form-group">
								<lable>Plan Name</lable>
								<input type="text" name="add_loan_plan_name" class="form-control" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<lable>Time Period</lable>
								<input type="number" name="add_loan_plan_time_period" class="form-control" >
							</div>
							<div class="form-group">
								<input type="submit" name="addloanplan" class="form-control btn btn-danger" >
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!---- Modals -->
		<div class="modal fade" id="modal_addloantypes">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"> 
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">ADD LOAN TYPES</h4>
					</div>
					<div class="modal-body">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<div class="form-group">
								<lable>Plan Name</lable>
								<input type="text" name="add_loan_type_name" class="form-control" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<lable>Interest</lable>
								<input type="number" step="0.01" name="add_loan_type_rate" class="form-control" >
							</div>
							<div class="form-group">
								<input type="submit" name="addloantype" class="form-control btn btn-danger" >
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!---- Modals -->
		<div class="modal fade" id="modal_addrdplans">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"> 
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">ADD RD PLANS</h4>
					</div>
					<div class="modal-body">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<div class="form-group">
								<lable>Plan Name</lable>
								<input type="text" name="add_rd_plan_name" class="form-control" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<lable>Time Period</lable>
								<input type="number" name="add_rd_plan_time_period" class="form-control" >
							</div>
							<div class="form-group">
								<lable>Interest</lable>
								<input type="number" step="0.01" name="add_rd_plan_rate" class="form-control" >
							</div>
							<div class="form-group">
								<input type="submit" name="addrdplan" class="form-control btn btn-danger" >
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!---- Modals -->
		<div class="modal fade" id="modal_createemployee">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"> 
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">CREATE EMPLOYEES</h4>
					</div>
					<div class="modal-body">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<div class="form-group">
								<lable>Name</lable>
								<input type="text" name="add_user_name" class="form-control" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<lable>UserName</lable>
								<input type="text" name="add_user_username" class="form-control" >
							</div>
							<div class="form-group">
								<lable>password</lable>
								<input type="password" name="add_user_password" class="form-control" >
							</div>
							<div class="form-group">
								<input type="submit" name="adduser" class="form-control btn btn-danger" >
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<footer>copyright &copy; 2017 Loan</footer>
	</body>
</html>