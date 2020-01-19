<?php include "inc/header.php"; ?>

<script type="text/javascript">
	function getname (value)
	{
		$.post("fetch_hfiber_cust_name.php", {search_acc_no:value}, function(data)
		{
			$("#hfiber_cust_name").val(data);
		});
    }
</script>
<!-- Fetches Name -->
<script type="text/javascript">

	function getcontact (value)
	{
		$.post("fetch_hfiber_cust_contact.php", {search_acc_no:value}, function(data)
		{
			$("#hfiber_cust_contact_no").val(data);
		});
    }	
</script>
<!-- Fetches contact -->
<script type="text/javascript">

	function getaddress (value)
	{
		$.post("fetch_hfiber_cust_address.php", {search_acc_no:value}, function(data)
		{
			$("#hfiber_cust_address").val(data);
		});
    }	
</script>
<!-- Fetches address -->
<script type="text/javascript">

	function getpin (value)
	{
		$.post("fetch_hfiber_cust_pin_code.php", {search_acc_no:value}, function(data)
		{
			$("#hfiber_cust_pin_code").val(data);
		});
    }	
</script>
<!-- Fetches pin -->
<script type="text/javascript">

	function getswitch (value)
	{
		$.post("fetch_hfiber_cust_switch.php", {search_acc_no:value}, function(data)
		{
			$("#hfiber_cust_switch").val(data);
		});
    }	
</script>
<!-- Fetches switch -->
<script type="text/javascript">
	function getlcoCode (value)
	{
		$.post("fetch_hfiber_lco_code.php", {search_acc_no:value}, function(data)
		{
			$("#hfiber_lco_code").val(data);
		});
    }
</script>
<!-- Fetches lco Code -->
<script type="text/javascript">
	function getlcoName (value)
	{
		$.post("fetch_hfiber_lco_name.php", {search_acc_no:value}, function(data)
		{
			$("#hfiber_lco_name").val(data);
		});
    }
</script>
<!-- Fetches lco name -->
<!-- Fetches customer Details -->

<style type="text/css">   	
#note
{
   	color: red;
}
</style>



	<h5 class="w3-text-blue"><!--Workorder : <?php echo date("d-m-y [h]:m:s"); ?> &nbsp; &nbsp; --> Warning Message : <span id="note"></span> </h5>
	<hr>
	
	<?php 
	
		date_default_timezone_set("Asia/Kolkata");
		if ($_SERVER['REQUEST_METHOD']=='POST')
		{
			$date=$fm->inputValidation($_POST['hfiber_creation_date']);
			$work_order=$fm->inputValidation($_POST['hfiber_ttid']);
			$creator=$fm->inputValidation($_POST['hfiber_creator']);
			$account=$fm->inputValidation($_POST['hfiber_cust_account_no']); 
			$name=$fm->inputValidation($_POST['hfiber_cust_name']);
			$con_no=$fm->inputValidation($_POST['hfiber_cust_contact_no']);
			$address=$fm->inputValidation($_POST['hfiber_cust_address']);
			$pin=$fm->inputValidation($_POST['hfiber_cust_pin_code']);
			$switch=$fm->inputValidation($_POST['hfiber_cust_switch']);
			$lcocode=$fm->inputValidation($_POST['hfiber_lco_code']);
			$lconame=$fm->inputValidation($_POST['hfiber_lco_name']);
			$source=$fm->inputValidation($_POST['hfiber_cust_source']);
			$team=$fm->inputValidation($_POST['hfiber_cust_team']);
			$complain=$fm->inputValidation($_POST['hfiber_cust_category']);
			$status=$fm->inputValidation($_POST['hfiber_cust_status']);
			$mode=$fm->inputValidation($_POST['hfiber_cust_mode']);
			//$starttime=$fm->inputValidation($_POST['start_time']);
			$remarks=$fm->inputValidation($_POST['hfiber_cust_remarks']);

			$date=mysqli_real_escape_string($db->link, $date );
			$work_order=mysqli_real_escape_string($db->link, $work_order);
			$creator=mysqli_real_escape_string($db->link, $creator);
			$account=mysqli_real_escape_string($db->link, $account);
			$name=mysqli_real_escape_string($db->link, $name);
			$con_no=mysqli_real_escape_string($db->link, $con_no);
			$address=mysqli_real_escape_string($db->link, $address);
			$pin=mysqli_real_escape_string($db->link, $pin);
			$switch=mysqli_real_escape_string($db->link, $switch);
			$lcocode=mysqli_real_escape_string($db->link, $lcocode);
			$lconame=mysqli_real_escape_string($db->link, $lconame);
			$source=mysqli_real_escape_string($db->link, $source);
			$team=mysqli_real_escape_string($db->link, $team);
			$complain=mysqli_real_escape_string($db->link, $complain);
			$status=mysqli_real_escape_string($db->link, $status);
			$mode=mysqli_real_escape_string($db->link, $mode);
			//$starttime=mysqli_real_escape_string($db->link, $starttime);
			$remarks=mysqli_real_escape_string($db->link, $remarks);

			if ($date=="" || $work_order=="" || $creator=="" || $account=="" || $name=="" || $con_no=="" || $address=="" || $pin=="" || $switch=="" || $lcocode=="" || $lconame=="" || $source=="" || $team=="" || $complain=="" || $status=="" || $mode=="" || $remarks=="" )
			{
				echo "Field must not be empty!";
			}
			else
			{

				$query="INSERT INTO cust_hfiber_workorder(hfiber_creation_date, hfiber_ttid, hfiber_creator, hfiber_cust_account_no, hfiber_cust_name, hfiber_cust_contact_no, hfiber_cust_address, hfiber_cust_pin_code, hfiber_cust_switch, hfiber_lco_code, hfiber_lco_name, hfiber_cust_source, hfiber_cust_team, hfiber_cust_category, hfiber_cust_status, hfiber_cust_mode, hfiber_cust_remarks) VALUES('$date', '$work_order','$creator','$account','$name','$con_no','$address','$pin','$switch','$lcocode','$lconame','$source','$team','$complain','$status','$mode','$remarks')";

				$post=$db->insert($query);

				if ($post)
				{
					echo " Creation SUCCESSFUL !!";
				}
				else
				{
					echo "Work Order Creation Failed  !!";
				}
			}
		}


	 ?>

	<form role="from" class="form-horizontal" action="" method="post">
	
		<div class="row">

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Creation Date</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
			<input type="text" class="form-control" name="hfiber_creation_date" value="<?php echo Date('Y-m-d H:i:s'); ?>" autocomplete="off" readonly>
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
			<input type="text" class="form-control" name="hfiber_creator" value="<?php echo custSession::get('user_name'); ?>" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div>
		<!--end of col-sm-6  || Creator(CCE) Name--> 
		
		
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Account No</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-th-large"></span></div>
			<input type="text" class="form-control" name="hfiber_cust_account_no" id="hfiber_cust_account_no" placeholder="Customer Account No." value="" autocomplete="off" oninput="getname(this.value) , getcontact(this.value) , getaddress(this.value) , getpin(this.value) , getswitch (this.value) , getlcoCode (this.value), getlcoName (this.value)" maxlength="10" required>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> 
		<!--end of col-sm-6  Account No-->
		
		
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">LCO Code</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
			<input type="text" class="form-control" id="hfiber_lco_code" name="hfiber_lco_code" placeholder="  " autocomplete="off" value="" onkeydown="getNames(this.value)" required readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div>
		<!--end of col-sm-6   || Fetching LCO Code-->		
				
		
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Name</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-th-large"></span></div>
			<input type="text" class="form-control" name="hfiber_cust_name" id="hfiber_cust_name" placeholder="" autocomplete="off" required readonly />
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> 
		<!--end of col-sm-6   || Fetching Customer Name-->

	
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">LCO Name</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
			<input type="text" class="form-control" id="hfiber_lco_name" name="hfiber_lco_name" placeholder="" autocomplete="off" value="" required readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div>
		<!--end of col-sm-6 || Fetching LCO Name-->

		
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Contact No</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-bookmark"></span></div>
			<input type="text" class="form-control" id="hfiber_cust_contact_no" name="hfiber_cust_contact_no" placeholder="" autocomplete="off" maxlength="10" required readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> 
		<!--end of col-sm-6   || Fetching Customer Contact No.-->

		
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">SWITCH</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-th-large"></span></div>
			<input type="text" class="form-control" id="hfiber_cust_switch" name="hfiber_cust_switch" placeholder="  " autocomplete="off" value="" readonly required>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div>
		<!--end of col-sm-6   || Fetching Switch Details-->


		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Address</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-refresh"></span></div>
			<input type="text" class="form-control" id="hfiber_cust_address" name="hfiber_cust_address" placeholder="  " autocomplete="off" value="" readonly required>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>

		</div>
		</div> 
		<!--end of col-sm-6   || Fetching Customer Address-->
		
		
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Complaint Source</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></div>
			<select class="form-control" name="hfiber_cust_source" required>
			<option value="" disabled selected>Select Complain Source</option>

			<?php 

				$query="SELECT * FROM cust_complain_source";
				$result=$db->select($query);

				while ($value=$result->fetch_assoc()) {
					
				

			 ?>
			<option

				<?php if($value['complain_source']=='CALL') {?>

					selected="selected"
			 
			 <?php } ?> value="<?php echo $value['complain_source']; ?>"><?php echo $value['complain_source']; ?></option>
			
			<?php } ?>

			</select>

			</select>

			</div>

			</div>


		</div>
		</div> <!--end of col-sm-6   || Complaint Source-->


		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">PIN CODE</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-refresh"></span></div>
			<input type="text" class="form-control" id="hfiber_cust_pin_code" name="hfiber_cust_pin_code" placeholder="  " autocomplete="off" value="" readonly required>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>

		</div>
		</div> 
		<!--end of col-sm-6   || Fetching PIN CODE-->
		
		
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">CATEGORY</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></div>
			<select class="form-control" name="hfiber_cust_category" required>
			<option value="" disabled selected>Select Complain CATEGORY</option>

			<?php 

				$query="SELECT * FROM cust_complain_category";
				$result=$db->select($query);

				while ($value=$result->fetch_assoc()) {
					
				

			 ?>
			<option

				<?php if($value['category']=='Select Complain CATEGORY') {?>

					selected="selected"
			 
			 <?php } ?> value="<?php echo $value['category']; ?>"><?php echo $value['category']; ?></option>
			
			<?php } ?>
			</select>
			</select>
			</div>
			</div>
		</div>
		</div>
		<!--end of col-sm-6   || Complaint CATEGORY-->
		
		
		<div class="col-sm-6">
		<div class="form-group">
			<label class="control-label col-sm-3">Status</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></div>
			<select class="form-control" name="hfiber_cust_status" required>
			<option value="" disabled selected>WIP</option>
			<?php
				$query="SELECT * FROM cust_complain_status";
				$result=$db->select($query);
				while ($value=$result->fetch_assoc()) 
			{?>
			<option
				<?php if($value['c_status']=='WIP')
				{?>
					selected="selected"
					<?php
				}?>
				value="<?php echo $value['c_status']; ?>"><?php echo $value['c_status'];
				?>
			</option>
			<?php
			}?>
			</select>
			</select>
			</div>
			</div>
		</div>
		</div>
		<!--end of col-sm-6   || Complaint Status-->
		
		
		
		<div class="col-sm-6">
		<div class="form-group">
			<label class="control-label col-sm-3">Assigned To :</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></div>
			<select class="form-control" name="hfiber_cust_team" required>
			<option value="" disabled selected>Select Team</option>
			<?php
				$query="SELECT * FROM cust_hfiber_team";
				$result=$db->select($query);
				while ($value=$result->fetch_assoc()) 
			{?>
			<option
				<?php if($value['team']=='Select Team')
				{?>
					selected="selected"
					<?php
				}?>
				value="<?php echo $value['team']; ?>"><?php echo $value['team'];
				?>
			</option>
			<?php
			}?>
			</select>
			</select>
			</div>
			</div>
		</div>
		</div>
		<!--end of col-sm-6   || Assigned Team-->
		
		
		<div class="col-sm-6">
		<div class="form-group">

			<?php 

				$rand = mt_rand(100000, 999999);
				$text = 'HF';
				$date = date('dmy');
				$randtext=$date.$text.$rand;

			 ?>

			<label class="control-label col-sm-3">Work Order ID</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
			<input type="text" class="form-control" id="hfiber_ttid" name="hfiber_ttid" value="<?php echo $randtext; ?>" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>
			
			
		</div>
		</div> 
		<!--end of col-sm-6   || Work Order ID Generation-->
		
		
		<div class="col-sm-6">
		<div class="form-group">
			<label class="control-label col-sm-3">Complain Mode</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></div>
			<select class="form-control" name="hfiber_cust_mode" required>
			<option value="" disabled selected>Select Mode of Complaint</option>
			<?php
				$query="SELECT * FROM cust_hfiber_mode";
				$result=$db->select($query);
				while ($value=$result->fetch_assoc()) 
			{?>
			<option
				<?php if($value['c_mode']=='Select Mode of Complaint')
				{?>
					selected="selected"
					<?php
				}?>
				value="<?php echo $value['c_mode']; ?>"><?php echo $value['c_mode'];
				?>
			</option>
			<?php
			}?>
			</select>
			</select>
			</div>
			</div>
		</div>
		</div>
		<!--end of col-sm-6   || Mode Selection-->
		
		</div>
		</div> <!--end of col-sm-6-->

		
		<div class="col-sm-12">
		<div class="form-group">

			<label class="control-label col-sm-2">Notes</label>
			<div class="col-sm-10">
			
			
			<textarea class="form-control" placeholder="Remarks" name="hfiber_cust_remarks" maxlength="500" required></textarea>
			
			</div>
		

		</div>
		</div>
		<!--end of col-sm-6   || Notes Collection-->
		
		
		


		<div class="col-sm-6">
		<div class="form-group">

		<div class="col-sm-offset-5">			

			<button type="submit" class="btn btn-success" name="create">Create</button>
			<button type="reset" class="btn btn-warning" name="reset">Reset</button>

		</div>

		</div>
		</div> <!--end of col-sm-6-->
		


		</div> <!--end of row-->		


	</form>

	<script type="text/javascript">
		
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
	<p id="records"></p>




<?php include "inc/footer.php"; ?>

<br>