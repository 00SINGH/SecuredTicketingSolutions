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
<!-- Fetches Name -->
<script type="text/javascript">

	function getcontact (value)
	{
		$.post("fetch_gpon_cust_contact.php", {search_acc_no:value}, function(data)
		{
			$("#gpon_cust_contact_no").val(data);
		}); 
    }	
</script>
<!-- Fetches contact -->
<script type="text/javascript">

	function getaddress (value)
	{
		$.post("fetch_gpon_cust_address.php", {search_acc_no:value}, function(data)
		{
			$("#gpon_cust_address").val(data);
		});
    }	
</script>
<!-- Fetches address -->
<script type="text/javascript">

	function getpin (value)
	{
		$.post("fetch_gpon_cust_pin_code.php", {search_acc_no:value}, function(data)
		{
			$("#gpon_cust_pin_code").val(data);
		});
    }	
</script>
<!-- Fetches pin -->
<script type="text/javascript">

	function getswitch (value)
	{
		$.post("fetch_gpon_cust_switch.php", {search_acc_no:value}, function(data)
		{
			$("#gpon_cust_switch").val(data);
		});
    }	
</script>
<!-- Fetches switch -->
<script type="text/javascript">
	function getlcoCode (value)
	{
		$.post("fetch_gpon_lco_code.php", {search_acc_no:value}, function(data)
		{
			$("#gpon_lco_code").val(data);
		});
    }
</script>
<!-- Fetches lco Code -->
<script type="text/javascript">
	function getlcoName (value)
	{
		$.post("fetch_gpon_lco_name.php", {search_acc_no:value}, function(data)
		{
			$("#gpon_lco_name").val(data);
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
		if (!isset($_GET['update']) || $_GET['update']==NULL)
		{
			echo "<script>window.open('view_gpon_workorder.php?msg=Error occurred!','_self')</script>";
		}
		else
		{
			$update_id=$_GET['update'];

			$query="SELECT * FROM cust_gpon_workorder WHERE gpon_id='$update_id'";
			$result=$db->select($query);

			$value=$result->fetch_assoc();
			$date=$value['gpon_creation_date'];
			$work_order=$value['gpon_ttid'];
			$creator=$value['gpon_creator'];
			$account=$value['gpon_cust_account_no']; 
			$name=$value['gpon_cust_name'];
			$con_no=$value['gpon_cust_contact_no'];
			$address=$value['gpon_cust_address'];
			$pin=$value['gpon_cust_pin_code'];
			$switch=$value['gpon_cust_switch'];
			$lco_code=$value['gpon_lco_code'];
			$lco_name=$value['gpon_lco_name'];
			$source=$value['gpon_cust_source'];
			$team=$value['gpon_cust_team'];
			$complain=$value['gpon_cust_category'];
			$status=$value['gpon_cust_status'];
			$mode=$value['gpon_cust_mode'];
			//$starttime=$value['start_time'];
			$remarks=$value['gpon_cust_remarks'];
		}
	 ?>
	 
	<?php 
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
			$switch=$fm->inputValidation($_POST['gpon_cust_switch']);
			$lco_code=$fm->inputValidation($_POST['gpon_lco_code']);
			$lco_name=$fm->inputValidation($_POST['gpon_lco_name']);
			$source=$fm->inputValidation($_POST['gpon_cust_source']);
			$team=$fm->inputValidation($_POST['gpon_cust_team']);
			$complain=$fm->inputValidation($_POST['gpon_cust_category']);
			$status=$fm->inputValidation($_POST['gpon_cust_status']);
			$mode=$fm->inputValidation($_POST['gpon_cust_mode']);
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
			$switch=mysqli_real_escape_string($db->link, $switch);
			$lco_code=mysqli_real_escape_string($db->link, $lco_code);
			$lco_name=mysqli_real_escape_string($db->link, $lco_name);
			$source=mysqli_real_escape_string($db->link, $source);
			$team=mysqli_real_escape_string($db->link, $team);
			$complain=mysqli_real_escape_string($db->link, $complain);
			$status=mysqli_real_escape_string($db->link, $status);
			$mode=mysqli_real_escape_string($db->link, $mode);
			//$starttime=mysqli_real_escape_string($db->link, $starttime);
			$remarks=mysqli_real_escape_string($db->link, $remarks);

			if ($date=="" || $work_order=="" || $creator=="" || $account=="" || $name=="" || $con_no=="" || $address=="" || $pin=="" || $switch=="" || $lco_code=="" || $lco_name=="" || $source=="" || $team=="" || $complain=="" || $status=="" || $mode=="" || $remarks=="" )
			{
				echo "Field must not be empty!";
			}
			else
			{
				$query="UPDATE cust_gpon_workorder SET gpon_creation_date ='$date', gpon_ttid='$work_order', gpon_cust_account_no='$account', gpon_creator='$creator', gpon_cust_name='$name', gpon_cust_address='$address', gpon_cust_pin_code='$pin', gpon_cust_switch='$switch', gpon_lco_code='$lco_code', gpon_cust_source='$source', gpon_lco_name='$lco_name', gpon_cust_team='$team', gpon_cust_mode='$mode', gpon_cust_category='$complain', gpon_cust_status='$status', gpon_cust_close_remarks='$remarks' WHERE gpon_id='$update_id";
				$update=$db->update($query);
				if ($update)
				{
					echo "<script>window.open('view_gpon_workorder.php?msg=Work Order updated successfully!','_self')</script>";
				}
				else
				{
					echo "<script>window.open('view_gpon_workorder.php?msg=Work Order Updation Failed!','_self')</script>";
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
			<input type="text" class="form-control" name="gpon_creation_date" value="<?php echo Date('Y-m-d H:i:s'); ?>" autocomplete="off" readonly>
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
		<!--end of col-sm-6  || Creator(CCE) Name--> 
		
		
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Account No</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-th-large"></span></div>
			<input type="text" class="form-control" name="gpon_cust_account_no" id="gpon_cust_account_no" placeholder="Customer Account No." value="<?php echo $account; ?>" autocomplete="off" oninput="getname(this.value) , getcontact(this.value) , getaddress(this.value) , getpin(this.value) , getswitch (this.value) , getlcoCode (this.value), getlcoName (this.value)" maxlength="10" readonly>
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
			<input type="text" class="form-control" id="gpon_lco_code" name="gpon_lco_code" placeholder="  " autocomplete="off" value="<?php echo $lco_code; ?>" onkeydown="getNames(this.value)" required readonly>
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
			<input type="text" class="form-control" name="gpon_cust_name" id="gpon_cust_name" placeholder="" autocomplete="off" value="<?php echo $name; ?>" required readonly />
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
			<input type="text" class="form-control" id="gpon_lco_name" name="gpon_lco_name" placeholder="" autocomplete="off" value="<?php echo $lco_name; ?>" required readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div>
		<!--end of col-sm-6   || Fetching LCO Name-->

		
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Contact No</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-bookmark"></span></div>
			<input type="text" class="form-control" id="gpon_cust_contact_no" name="gpon_cust_contact_no" placeholder="" autocomplete="off" maxlength="10" value="<?php echo $con_no; ?>" required readonly>
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
			<input type="text" class="form-control" id="gpon_cust_switch" name="gpon_cust_switch" placeholder="  " autocomplete="off" value="<?php echo $switch; ?>" readonly required>
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
			<input type="text" class="form-control" id="gpon_cust_address" name="gpon_cust_address" placeholder="  " autocomplete="off" value="<?php echo $address; ?>" readonly required>
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
			<input type="text" class="form-control" name="gpon_cust_source" value="<?php echo $source; ?>" readonly>
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
			<input type="text" class="form-control" id="gpon_cust_pin_code" name="gpon_cust_pin_code" placeholder="  " autocomplete="off" value="<?php echo $pin; ?>" readonly required>
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
			<select class="form-control" name="gpon_cust_category" value="<?php echo $complain; ?>" required>
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
			<select class="form-control" name="gpon_cust_status" required>
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
			<select class="form-control" name="gpon_cust_team" required>
			<option value="" disabled selected><?php echo $team ?></option>
			<?php
				$query="SELECT * FROM cust_gpon_team";
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
			<input type="text" class="form-control" id="gpon_ttid" name="gpon_ttid" value="<?php echo $work_order; ?>" readonly>
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
			<input type="text" class="form-control" name="gpon_cust_mode" value="<?php echo $mode;?>" readonly>
			</div>
			</div>
		</div>
		</div>
		<!--end of col-sm-6   || Mode Selection-->

		 
		<div class="col-sm-12">
		<div class="form-group">

			<label class="control-label col-sm-2">Notes</label>
			<div class="col-sm-10">
			
			
			<textarea class="form-control" placeholder="Remarks" name="gpon_cust_remarks" maxlength="500" required></textarea>
			
			</div>
		</div>
		</div>
		<!--end of col-sm-6   || Notes Collection-->
		
		<div class="col-sm-6">
		<div class="form-group">
		<div class="col-sm-offset-5">			
			<button type="submit" class="btn btn-success" name="update">Update</button>
			<button type="reset" class="btn btn-warning" name="reset">Reset</button>
			<a href="view_workorder.php"><button type="button" class="btn btn-info">Back</button></a>
		</div>
		</div>
		</div> <!--end of col-sm-6-->
		</div> <!--end of row-->		
	</form>

	<hr>

<?php include "inc/footer.php"; ?>