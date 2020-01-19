 <?php include "inc/header.php"; ?>


<script type="text/javascript">
	function getname (value)
	{
		$.post("fetch_gpon_cust_name.php", {search_acc_no:value}, function(data)
		{
			$("#gpon_cust_name").val(data);
		});
    }
</script>
<script type="text/javascript">

	function getcontact (value)
	{
		$.post("fetch_gpon_cust_contact.php", {search_acc_no:value}, function(data)
		{
			$("#gpon_cust_contact_no").val(data);
		});
    }	
</script>
<script type="text/javascript">

	function getaddress (value)
	{
		$.post("fetch_gpon_cust_address.php", {search_acc_no:value}, function(data)
		{
			$("#gpon_cust_address").val(data);
		});
    }	
</script>
<script type="text/javascript">

	function getpin (value)
	{
		$.post("fetch_gpon_cust_pin_code.php", {search_acc_no:value}, function(data)
		{
			$("#gpon_cust_pin_code").val(data);//,"#gpon_cust_cmts"
		});
    }	
</script>
<script type="text/javascript">

	function getcmts (value)
	{
		$.post("fetch_gpon_cust_cmts.php", {search_acc_no:value}, function(data)
		{
			$("#gpon_cust_cmts").val(data);
		});
    }	
</script>
<!-- Fetches customer Details -->





    <style type="text/css">  	
    #note
	{
    	color: red;
    }
    </style>
	<h5 class="w3-text-blue"> Workorder : <?php date_default_timezone_set("Asia/Kolkata"); echo date("d-m-Y H:i:s"); ?> &nbsp; &nbsp; Warning Message : <span id="note"></span> </h5>
	<hr>
<!-- Work Order Time -->
	
	
	<?php 
	
		date_default_timezone_set("Asia/Kolkata");
		if ($_SERVER['REQUEST_METHOD']=='POST')
		{
			$date=$fm->inputValidation($_POST['gpon_creation_date']);
			$work_order=$fm->inputValidation($_POST['gpon_ttid']);
			$creator=$fm->inputValidation($_POST['gpon_creator']);
			$account=$fm->inputValidation($_POST['gpon_cust_account_no']); 
			$name=$fm->inputValidation($_POST['gpon_cust_name']);
			$con_no=$fm->inputValidation($_POST['gpon_cust_contact_no']);
			$address=$fm->inputValidation($_POST['gpon_cust_address']);
			$pin=$fm->inputValidation($_POST['gpon_cust_pin_code']);
			$cmts=$fm->inputValidation($_POST['gpon_cust_cmts']);
			$team=$fm->inputValidation($_POST['gpon_cust_team']);
			$complain=$fm->inputValidation($_POST['gpon_cust_category']);
			$status=$fm->inputValidation($_POST['gpon_cust_status']);
			//$starttime=$fm->inputValidation($_POST['start_time']);
			$remarks=$fm->inputValidation($_POST['gpon_cust_remarks']);

			$date=mysqli_real_escape_string($db->link, $date );
			$work_order=mysqli_real_escape_string($db->link, $work_order);
			$creator=mysqli_real_escape_string($db->link, $creator);
			$account=mysqli_real_escape_string($db->link, $account);
			$name=mysqli_real_escape_string($db->link, $name);
			$con_no=mysqli_real_escape_string($db->link, $con_no);
			$address=mysqli_real_escape_string($db->link, $address);
			$pin=mysqli_real_escape_string($db->link, $pin);
			$cmts=mysqli_real_escape_string($db->link, $cmts);
			$team=mysqli_real_escape_string($db->link, $team);
			$complain=mysqli_real_escape_string($db->link, $complain);
			$status=mysqli_real_escape_string($db->link, $status);
			//$starttime=mysqli_real_escape_string($db->link, $starttime);
			$remarks=mysqli_real_escape_string($db->link, $remarks);

			
			if ($date=="" || $work_order=="" || $creator=="" || $account=="" || $name=="" || $con_no=="" || $address=="" || $pin=="" || $cmts=="" || $team=="" || $complain=="" || $status=="" || $remarks=="" )
			{
				echo "Field must not be empty!";
			}
			else
			{
				$query="INSERT INTO cust_gpon_workorder(gpon_creation_date, gpon_ttid, gpon_creator, gpon_cust_account_no, gpon_cust_name, gpon_cust_contact_no, gpon_cust_address, gpon_cust_pin_code, gpon_cust_cmts, gpon_cust_team, gpon_cust_category, gpon_cust_status, gpon_cust_remarks) VALUES('$date', '$work_order','$creator','$account','$name','$con_no','$address','$pin','$cmts','$team','$complain','$status','$remarks')";
				$post=$db->insert($query);
				if ($post)
				{
					echo "Work Order Creation Successful !!!";
				} 
				else
				{
					echo "<script>window.open('gpon_workorder.php?msg=Work Order Creation Failed!','_self')</script>";
				}
			}
		}


	 ?>
	 <!-- db connection -->

	 
	<form role="from" class="form-horizontal" action="" method="post">
	
		<div class="row">

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Creation Date :</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
			<input type="text" class="form-control" name="gpon_creation_date" value="<?php echo date('Y-m-d H:i:s'); ?>" autocomplete="off" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>
			
		</div>
		</div>
		<!--end of col-sm-6  || Creation Date--> 

		
		
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">CCE Name</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
			<input type="text" class="form-control" name="gpon_creator" value="<?php echo custSession::get('user_name'); ?>" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>

		</div>
		</div>
		<!--end of col-sm-6  || Creator Name--> 

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Account No</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-th-large"></span></div>
			<input type="text" class="form-control" name="gpon_cust_account_no" id="gpon_cust_account_no" placeholder="Customer Account No." value="" autocomplete="off" oninput="getname(this.value) , getcontact(this.value) , getaddress(this.value) , getpin(this.value) , getcmts (this.value)" maxlength="10" required>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>

		</div>
		</div> 
		<!--end of col-sm-6  || Customer Account No. -->
		

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Customer Name :</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
			<input type="text" name="gpon_cust_name" id="gpon_cust_name" class="form-control" placeholder=" " autocomplete="off" value=""  readonly required>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>

		</div>
		</div>
		<!--end of col-sm-6   || Fetchng customer name-->


		<div class="col-sm-6">
		<div class="form-group">
			
			<label class="control-label col-sm-3">Contact No</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-bookmark"></span></div>
			<input type="text" class="form-control" id="gpon_cust_contact_no" name="gpon_cust_contact_no" placeholder="" value="" autocomplete="off" maxlength="10" readonly required>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>

		</div>
		</div>
		<!--end of col-sm-6   || Fetchng customer mobile no-->

		
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Address</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-th-large"></span></div>
			<input type="text" class="form-control" id="gpon_cust_address" name="gpon_cust_address" placeholder="" autocomplete="off" value="" required readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>

		</div>
		</div> 
		<!--end of col-sm-6   || Fetching Customer Address-->


		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">PIN CODE</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-refresh"></span></div>
			<input type="text" class="form-control" id="gpon_cust_pin_code" name="gpon_cust_pin_code" placeholder="" autocomplete="off" value="" required readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>

		</div>
		</div>
		<!--end of col-sm-6   || Fetching Customer PIN CODE-->

		
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">CMTS</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-refresh"></span></div>
			<input type="text" class="form-control" id="gpon_cust_cmts" name="gpon_cust_cmts" placeholder="" autocomplete="off" value="" onkeydown="getCMTS(this.value)" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>
		
		</div>
		</div>
		 <!--end of col-sm-6   || Fetching Customer CMTS-->
		 
		 
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">TEAM : </label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-headphones"></span></div>
			<select class="form-control" name="gpon_cust_team" value="" required>
			
			<?php 

				$query="SELECT * FROM cust_role WHERE `cust_role`.`id` != 1";
				$result=$db->select($query);

				while ($value=$result->fetch_assoc()) {
				?>
			<option

				<?php if($value['role']=='Select Assigned Team') {?>

					selected="selected"

			<?php } ?> value="<?php echo $value['role']; ?>"><?php echo $value['role']; ?></option>
			<?php } ?>


			</select>

			</div>
			</div>

		</div>
		</div> 
		<!--end of col-sm-6  ||  Fetching User Role-->


		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Category</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
			<select class="form-control" name="gpon_cust_category" required>
			<option value="" disabled selected>Select Complain Category</option>
			
			<?php 

				$query="SELECT * FROM cust_complain";
				$result=$db->select($query);

				while ($value=$result->fetch_assoc()) {
					
				

			 ?>
			<option

				<?php if($value['complain']=='Error 4') {?>

					selected="selected"

			<?php } ?> value="<?php echo $value['complain']; ?>"><?php echo $value['complain']; ?></option>
			
			<?php } ?>


			</select>
			</div>
			</div>

		</div>
		</div> <!--end of col-sm-6-->


		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Status</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
			<select class="form-control" name="gpon_cust_status" required>
			
			<?php 

				$query="SELECT * FROM cust_resolution";
				$result=$db->select($query);

				while ($value=$result->fetch_assoc()) {
					
				

			 ?>
			<option

				<?php if($value['resolution']=='In-Progress') {?>

					selected="selected"

			<?php } ?> value="<?php echo $value['resolution']; ?>"><?php echo $value['resolution']; ?></option>
			
			<?php } ?>

			</select>
			</div>
			</div>

		</div>
		</div> 
		<!--end of col-sm-6   ||  Resolution Status-->

		
		<div class="col-sm-6">
		<div class="form-group">

			<?php 

				$rand = mt_rand(100000, 999999);
				$text = 'W';
				$date = date('dmy');
				$randtext=$date.$text.$rand.'_1';

			 ?>

			<label class="control-label col-sm-3">Work Order ID</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
			<input type="text" class="form-control" id="work_order" name="gpon_ttid" placeholder="End Time..." value="<?php echo $randtext; ?>" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>

		</div>
		</div> 
		<!--end of col-sm-6 TT No. Generation -->

		
		

		<!-- <div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Follow Up</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-flag"></span></div>
			<select class="form-control" name="follow_up" required>
			<option value="" disabled selected>Select Follow Up Status</option>
			
			<?php 

				$query="SELECT * FROM cust_follow";
				$result=$db->select($query);

				while ($value=$result->fetch_assoc()) {
					
				

			 ?>
			<option

			<?php if($value['follow']=='No') {?>

				selected="selected"

			<?php } ?> value="<?php echo $value['follow']; ?>"><?php echo $value['follow']; ?></option>
			
			<?php } ?>

			</select>

			</div>
			</div>

		</div>
		</div> <!--end of col-sm-6-->



		<!-- <div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Start Time</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-time"></span></div>
			<input type="text" class="form-control" name="start_time" value="<?php echo date('d-m-Y h:m:s'); ?>" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->




		<div class="col-sm-12">
		<div class="form-group">

			<label class="control-label col-sm-2">Notes</label>
			<div class="col-sm-10">
			
			
			<textarea class="form-control" placeholder="Remarks" name="gpon_cust_remarks" maxlength="500" required></textarea>
			
			</div>
		

		</div>
		</div>
		<!--end of col-sm-6   || Notes Section -->
		
		


		<div class="col-sm-6">
		<div class="form-group">

		<div class="col-sm-offset-5">			

			<button type="submit" class="btn btn-success" name="create">Create</button>
			<button type="reset" class="btn btn-warning" name="reset">Reset</button>

		</div>

		</div>
		</div>
		<!--end of col-sm-6   ||  Buttons -->
		


		</div> <!--end of row-->		


	</form>

	<!-- <script type="text/javascript">
		
		function getHistory(value)
		{
			$.post('smc_history.php', {searchHistory:value}, function(data)
			{ 
				$('#records').html(data);

			});
		}



	</script>


	<hr>

	<p>Previous Call History:</p>
	<p id="records"></p> -->




<?php include "inc/footer.php"; ?>

<br>