<?php
$user="";
if(!isset($_SESSION)){
	session_start();
}
if(isset($_SESSION['login_user']) && $_SESSION['user_type']==2){
	$user=$_SESSION['login_user'];
}else{
	echo '<script> window.location="index.php";</script>';
}
?>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
						<a class="navbar-brand" href="#"><img style="width:100px; height:80px;"src="images/logo.jpg" alt="Loan"></a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
						<!--<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-book" aria-hidden="true"></i> Reports<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Member Report</a></li>
								<li><a href="#">Saving AC Report</a></li>
								<li><a href="#">Broker Ledger</a></li>
								<li><a href="#">Broker LIst</a></li>
								<li><a href="#">Registration List</a></li>
								<li><a href="#">Registration Report</a></li>
								<li><a href="#">CA Report</a></li>
								<li><a href="#">ORC Payment Details</a></li>
								<li><a href="#">ORC List</a></li>
								<li><a href="#">Broker Chain Registration</a></li>
								<li><a href="#">Broker Chain Joinings</a></li>
								<li><a href="#">Broker Registration</a></li>
								<li><a href="#">Broker Tree</a></li>
								<li><a href="#">Quota Collection</a></li>
								<li><a href="#">Broker TDS</a></li>
								<li><a href="#">Circular Master</a></li>
								<li><a href="#">Due Installments</a></li>
								<li><a href="#">Maturity Details</a></li>
								<li><a href="#">Maturity Paid Details</a></li>
								</ul>
						</li>
						<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-book" aria-hidden="true"></i> Business Reports<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Business Details</a></li>
								<li><a href="#">Saving Business</a></li>
								<li><a href="#">CSS Wise Business Report</a></li>
								<li><a href="#">Broker PlanWise Business</a></li>
								<li><a href="#">DateWise Business</a></li>
								<li><a href="#">Broker Chain Business</a></li>
								<li><a href="#">Broker BranchWise Business</a></li>
							</ul>
						</li>-->
						<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Accounts<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="daybook.php">Day Book</a></li>
								<li><a href="iestatement.php">I/E Statement</a></li>
								<li><a href="paymentvoucher.php">Payment Voucher</a></li>
								<li><a href="receiptvoucher.php">Receipt Voucher</a></li>
							</ul>
						</li>
						<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-inr" aria-hidden="true"></i> Transactions<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="addmember.php">Membership</a></li>
								<li><a href="addbroker.php">New Broker</a></li>
								<li><a href="newregistration.php">New Registration</a></li>
								<li><a href=" newsavingaccount.php">New Saving Account</a></li>
								<li><a href="brokersearch.php">Broker Search</a></li>
								<li><a href="registrationsearch.php">Registration Search</a></li>
								<li><a href="renewalslip.php">Renewal Slip</a></li>
								<li><a href="paydd.php">Pay DD</a></li>
								<li><a href="savingtransaction.php">Saving Transaction</a></li>
								<li><a href="registrationdetails.php">Registration Account Details</a></li>
								<li><a href="orccashupdate.php">ORC Payment</a></li>
								<li><a href="paymaturity.php">Pay maturity</a></li>
							</ul>
						</li>
						<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-globe" aria-hidden="true"></i> Loan<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="loangroup.php">Add Group</a></li>
								<li><a href="loanreport.php">Loan Report</a></li>
								<li><a href="applyloan.php">Apply Loan</a></li>
								<li><a href="disbursedloan.php">Disburse Loan</a></li>
								<li><a href="payemi.php">Pay EMI</a></li>
								<li><a href="dueemi.php">Due EMI</a></li>
								<li><a href="loandetails.php">Loan Details</a></li>
							</ul>
						</li>
						<!--<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-cog" aria-hidden="true"></i> Tools<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Broker FormUpload</a></li>
								<li><a href="#">Registration FormUpload</a></li>
								<li><a href="#">Complaint</a></li>
								<li><a href="#">Complaint View</a></li>
							</ul>
						</li>
						</li>-->
						<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-wrench" aria-hidden="true"></i> Setting<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="changepassword.php">Change Password</a></li>
							</ul>
						</li>
						<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-file" aria-hidden="true"></i> Document<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="brokerorb.php">Broker ORB</a></li>
								<li><a href="printbond.php">Print Bond</a></li>
								<li><a href="printreceipt.php">Print Receipt</a></li>
								<li><a href="combinedreceipt.php">Combined Reciept</a></li>
								<li><a href="printidentitycard.php">Broker Identity Card</a></li>
							</ul>
						</li>
						<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-address-book" aria-hidden="true"></i> Passbook<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="printrddetails.php">Print RD Details</a></li>
								<li><a href="printsavingdetails.php">Print Saving Details</a></li>
								<li><a href="images/rdcolumn.pdf" target="_blank">Print Column</a></li>
								<li><a href="printrdtransaction.php">Print RD Transaction</a></li>
								<li><a href="printsavingtransaction.php">Print Saving Transation</a></li>
							</ul>
						</li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-user-circle" aria-hidden="true"></i><?php echo $user; ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>