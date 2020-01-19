<?php include "inc/header.php"; ?>


<script type="text/javascript">
        
        function getNames (value) {

            $.post("fetch_lco_details.php", {searchLco:value}, function(data) {

                $("#entity_name").val(data);

            });
        }       

</script>

    <!--

    <script type="text/javascript">
        
        function getMobile (value) {

            $.post("get_mobile.php", {searchMobile:value}, function(data) {

                $("#cont_no").val(data);

            });
        }       

    </script> -->


      <script type="text/javascript">
        function getMessage (value)
		{
            $.post("get_state.php", {searchNote:value}, function(data)
			{
                $("#note").html(data);
            });
        }       

    </script>

     <script type="text/javascript">
        
        function getPhase (value)
		{
            $.post("get_phase.php", {searchPhase:value}, function(data)
			{
                $("#das").val(data);
            });
        }       

    </script>


    <style type="text/css">
    	
    #note
	{
    	color: red;
    }

    </style>



	<h5 class="w3-text-blue">Edit Workorder : <?php echo date("F j,  Y"); ?> &nbsp; &nbsp; Warning Message : <span id="note"></span> </h5>
	<hr>

	<?php 

		if (!isset($_GET['update']) || $_GET['update']==NULL) {

			echo "<script>window.open('view_workorder.php?msg=Error occurred!','_self')</script>";
		}
		else
		{

			$update_id=$_GET['update'];

			$query="SELECT * FROM cust_hfiber_workorder WHERE hfiber_ttid='$update_id'";
			$result=$db->select($query);

			$value=$result->fetch_assoc();
			$date=$value['hfiber_creation_date'];
			$workorder=$value['hfiber_ttid'];
			$requester=$value['w_requester'];
			$smc=$value['w_smc'];
			$account=$value['w_account'];
			$nds=$value['w_nds'];
			$stb=$value['w_stb'];
			$cust_type=$value['w_cstype'];
			$entity_code=$value['w_en_code'];
			$entity_name=$value['w_en_name'];
			$contact=$value['w_con_no'];
			$state1=$value['w_state'];
			$phase=$value['w_phase'];
			$mode=$value['w_mode'];
			$call_type=$value['w_calltype'];
			$complain=$value['w_complain'];
			$ticket=$value['w_ticket'];
			$resolution=$value['w_resolution'];
			$package=$value['w_package'];
			$tenure=$value['w_tenure'];
			$follow=$value['w_follow'];
			$timing=$value['w_timing'];
			$cc_name=$value['w_cc_name'];
			$start_time=$value['w_start_time'];
			$end_time=$value['w_end_time'];
			$notes=$value['w_notes'];
			$fl_notes=$value['w_fl_notes'];
			$fl_user=$value['w_fl_user'];
			



		}

	 ?>

	<?php 

		if ($_SERVER['REQUEST_METHOD']=='POST') {

			$date=$fm->inputValidation($_POST['date']);
			$work_order=$fm->inputValidation($_POST['work_order']);
			$requester=$fm->inputValidation($_POST['req_name']);
			$smc=$fm->inputValidation($_POST['smc_no']);
			$account=$fm->inputValidation($_POST['ac_no']);
			$nds=$fm->inputValidation($_POST['nds_no']);
			$stb=$fm->inputValidation($_POST['stb_no']);
			$cust_type=$fm->inputValidation($_POST['cust_type']);
			$en_code=$fm->inputValidation($_POST['entity_code']);
			$en_name=$fm->inputValidation($_POST['entity_name']);
			$con_no=$fm->inputValidation($_POST['cont_no']);
			$state=$fm->inputValidation($_POST['state']);
			$phase=$fm->inputValidation($_POST['phase']);
			$mode=$fm->inputValidation($_POST['mode']);
			$calltype=$fm->inputValidation($_POST['call_type']);
			$complain=$fm->inputValidation($_POST['comp_category']);
			$ticket=$fm->inputValidation($_POST['ticket_no']);
			$resolution=$fm->inputValidation($_POST['res_stat']);
			$package=$fm->inputValidation($_POST['pack_name']);
			$tenure=$fm->inputValidation($_POST['tenure']);
			$follow=$fm->inputValidation($_POST['follow_up']);
			$shifting=$fm->inputValidation($_POST['shift_time']);
			$cc_name=$fm->inputValidation($_POST['cce_name']);
			$starttime=$fm->inputValidation($_POST['start_time']);
			$notes=$fm->inputValidation($_POST['notes']);

			$date=mysqli_real_escape_string($db->link, $date);
			$work_order=mysqli_real_escape_string($db->link, $work_order);
			$requester=mysqli_real_escape_string($db->link, $requester);
			$smc=mysqli_real_escape_string($db->link, $smc);
			$account=mysqli_real_escape_string($db->link, $account);
			$nds=mysqli_real_escape_string($db->link, $nds);
			$stb=mysqli_real_escape_string($db->link, $stb);
			$cust_type=mysqli_real_escape_string($db->link, $cust_type);
			$en_code=mysqli_real_escape_string($db->link, $en_code);
			$en_name=mysqli_real_escape_string($db->link, $en_name);
			$con_no=mysqli_real_escape_string($db->link, $con_no);
			$state=mysqli_real_escape_string($db->link, $state);
			$phase=mysqli_real_escape_string($db->link, $phase);
			$mode=mysqli_real_escape_string($db->link, $mode);
			$calltype=mysqli_real_escape_string($db->link, $calltype);
			$complain=mysqli_real_escape_string($db->link, $complain);
			$ticket=mysqli_real_escape_string($db->link, $ticket);
			$resolution=mysqli_real_escape_string($db->link, $resolution);
			$package=mysqli_real_escape_string($db->link, $package);
			$tenure=mysqli_real_escape_string($db->link, $tenure);	
			$follow=mysqli_real_escape_string($db->link, $follow);
			$shifting=mysqli_real_escape_string($db->link, $shifting);
			$cc_name=mysqli_real_escape_string($db->link, $cc_name);
			$starttime=mysqli_real_escape_string($db->link, $starttime);
			$notes=mysqli_real_escape_string($db->link, $notes);

			if ($requester=="" || $smc=="" || $account=="" || $nds=="" || $stb=="" || $cust_type=="" || $en_code=="" || $en_name=="" || $con_no=="" || $mode=="" || $phase=="" || $calltype=="" || $complain=="" || $ticket=="" || $resolution=="" || $package=="" || $tenure=="" || $follow=="" || $shifting=="" || $notes=="") {

				echo "Field must not be empty!";

			} else {

				$query="UPDATE cust_work SET w_requester ='$requester', w_smc='$smc', w_account='$account', w_nds='$nds', w_stb='$stb', w_cstype='$cust_type', w_en_code='$en_code', w_en_name='$en_name', w_con_no='$con_no', w_phase='$phase', w_mode='$mode', w_calltype='$calltype', w_complain='$complain', w_ticket='$ticket', w_resolution='$resolution', w_package='$package', w_tenure='$tenure', w_follow='$follow', w_timing='$shifting', w_notes='$notes' WHERE w_id='$update_id'";

				$update=$db->update($query);

				if ($update) {

					echo "<script>window.open('view_workorder.php?msg=Work Order updated successfully!','_self')</script>";
				} else {

					echo "<script>window.open('view_workorder.php?msg=Work Order Updation Failed!','_self')</script>";
				}
			}


		}


	 ?>

	<form role="from" class="form-horizontal" action="" method="post">
	
		<div class="row">

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Date</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
			<input type="text" class="form-control" name="date" value="<?php echo $date; ?>" autocomplete="off" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->


		<div class="col-sm-6">
		<div class="form-group">

			<?php 

				$rand = mt_rand(1000000000, 9999999999);
				$text = 'CS';
				$randtext=$text.$rand;

			 ?>

			<label class="control-label col-sm-3">Work Order No</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
			<input type="text" class="form-control" id="work_order" name="work_order" placeholder="End Time..." value="<?php echo $workorder; ?>" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Requested By</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
			<select class="form-control" name="req_name" required>
			<option value="" disabled selected>Select Requester Name</option>

			<?php 

				$query="SELECT * FROM cust_requester";
				$result=$db->select($query);

				while ($value=$result->fetch_assoc()) {
					
				

			 ?>
			<option

				<?php if ($requester==$value['requester']) { ?>

					selected="selected"

				<?php } ?> value="<?php echo $value['requester']; ?>"><?php echo $value['requester']; ?></option>
			
			<?php } ?>

			</select>

			</div>

			</div>


		</div>
		</div> <!--end of col-sm-6-->


		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">SMC No</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-th-large"></span></div>
			<input type="text" class="form-control" name="smc_no" autocomplete="off" maxlength="12" value="<?php echo $smc; ?>" required>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Account No</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-th-large"></span></div>
			<input type="text" class="form-control" name="ac_no" autocomplete="off" maxlength="10" value="<?php echo $account; ?>" required>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">NDS No</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-th-large"></span></div>
			<input type="text" class="form-control" name="nds_no" autocomplete="off" maxlength="16" value="<?php echo $nds; ?>" required>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">STB No</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-th-large"></span></div>
			<input type="text" class="form-control" name="stb_no" autocomplete="off" maxlength="18" value="<?php echo $stb; ?>" required>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->

		
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Customer Type</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
			<select class="form-control" name="cust_type" required>
			<option value="" disabled selected>Select Customer Type</option>
			
			<?php 

				$query="SELECT * FROM cust_type";
				$result=$db->select($query);

				while ($value=$result->fetch_assoc()) {
					
				

			 ?>
			<option

				<?php if ($cust_type==$value['cust_type']) {?>

					selected="selected"

			 	<?php  } ?>	value="<?php echo $value['cust_type']; ?>"><?php echo $value['cust_type']; ?></option>
			
			<?php } ?>

			</select>

			</div>

			</div>


		</div>
		</div> <!--end of col-sm-6-->

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Entity Code</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-th-large"></span></div>
			<input type="text" class="form-control" name="entity_code" id="entity_code" placeholder="1100724961" autocomplete="off" onkeyup="getNames(this.value)" onchange="getPhase(this.value)" maxlength="10" value="<?php echo $entity_code; ?>" required />
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->

	

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Entity Name</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
			<input type="text" class="form-control" id="entity_name" name="entity_name" placeholder="PRANAB HALDER" autocomplete="off" value="<?php echo $entity_name; ?>" onkeyup="getMessage(this.value)" required>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->

		

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Contact No</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-bookmark"></span></div>
			<input type="text" class="form-control" id="cont_no" name="cont_no" placeholder="8335050957" autocomplete="off" maxlength="10" value="<?php echo $contact; ?>" required>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->

		
		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">State</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-th-large"></span></div>
			<input type="text" class="form-control" name="state" placeholder="West Bengal" autocomplete="off" value="<?php echo $state1; ?>" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->




		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Phase</label>
			<div class="col-sm-9">
			
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-refresh"></span></div>

			<input type="text" name="phase" id="das" class="form-control" value="<?php echo $phase; ?>" placeholder="Das-I" required>

			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
		
			</div>

			</div>
		</div>
		</div> <!--end of col-sm-6-->


		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Mode</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></div>
			<select class="form-control" name="mode" required>
			<option value="" disabled selected>Select Mode</option>

			<?php 

				$query="SELECT * FROM cust_mode";
				$result=$db->select($query);

				while ($value=$result->fetch_assoc()) {
					
				

			 ?>
			<option 

					<?php if ($mode==$value['mode']) {?>

						selected="selected"

			<?php } ?>	 value="<?php echo $value['mode']; ?>"><?php echo $value['mode']; ?></option>
			
			<?php } ?>

			</select>

			</select>

			</div>

			</div>


		</div>
		</div> <!--end of col-sm-6-->


		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Call Type</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-headphones"></span></div>
			<select class="form-control" name="call_type" required>
			<option value="" disabled selected>Select Call Type</option>
			
			<?php 

				$query="SELECT * FROM cust_calltype";
				$result=$db->select($query);

				while ($value=$result->fetch_assoc()) {
					
				

			 ?>
			<option

				<?php if ($call_type==$value['call_type']) {?>

					selected="selected"

			 <?php } ?>	value="<?php echo $value['call_type']; ?>"><?php echo $value['call_type']; ?></option>
			
			<?php } ?>

			</select>



			</div>

			</div>


		</div>
		</div> <!--end of col-sm-6-->


		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Comp Category</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
			<select class="form-control" name="comp_category" required>
			<option value="" disabled selected>Select Complain Category</option>
			
			<?php 

				$query="SELECT * FROM cust_complain";
				$result=$db->select($query);

				while ($value=$result->fetch_assoc()) {
					
				

			 ?>
			<option

				<?php if ($complain==$value['complain']) {?>

					selected="selected"

			<?php } ?>	 value="<?php echo $value['complain']; ?>"><?php echo $value['complain']; ?></option>
			
			<?php } ?>


			</select>

			</div>

			</div>


		</div>
		</div> <!--end of col-sm-6-->

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Ticket No</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-tag"></span></div>
			<input type="text" class="form-control" name="ticket_no" placeholder="29092016W3580558" autocomplete="off" maxlength="20" value="<?php echo $ticket; ?>" required>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->


		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Resolution Stat</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
			<select class="form-control" name="res_stat" required>
			<option value="" disabled selected>Select Resolution Status</option>
			
			<?php 

				$query="SELECT * FROM cust_resolution";
				$result=$db->select($query);

				while ($value=$result->fetch_assoc()) {
					
				

			 ?>
			<option

				<?php if($resolution==$value['resolution']) { ?>

				selected="selected"

			<?php } ?> value="<?php echo $value['resolution']; ?>"><?php echo $value['resolution']; ?></option>
			
			<?php } ?>


			</select>

			</div>

			</div>


		</div>
		</div> <!--end of col-sm-6-->

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Package Name</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-shopping-cart"></span></div>
			<select class="form-control" name="pack_name" required>
			<option value="" disabled selected>Select Package Name</option>
			
			<?php 

				$query="SELECT * FROM cust_package";
				$result=$db->select($query);

				while ($value=$result->fetch_assoc()) {
					
				

			 ?>
			<option

				<?php if ($package==$value['package']) { ?>

				selected="selected"

			<?php } ?> value="<?php echo $value['package']; ?>"><?php echo $value['package']; ?></option>
			
			<?php } ?>

			</select>

			</div>

			</div>


		</div>
		</div> <!--end of col-sm-6-->

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Tenure</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></div>
			<select class="form-control" name="tenure" required>
			<option value="" disabled selected>Select Tenure</option>
			
			<?php 

				$query="SELECT * FROM cust_tenure";
				$result=$db->select($query);

				while ($value=$result->fetch_assoc()) {
					
				

			 ?>
			<option 

				<?php if($tenure==$value['tenure']) { ?>

				selected="selected"

			<?php } ?> value="<?php echo $value['tenure']; ?>"><?php echo $value['tenure']; ?></option>
			
			<?php } ?>

			</select>

			</div>

			</div>


		</div>
		</div> <!--end of col-sm-6-->

		<div class="col-sm-6">
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

				<?php if($follow==$value['follow']) { ?>

				selected="selected"

			<?php } ?> value="<?php echo $value['follow']; ?>"><?php echo $value['follow']; ?></option>
			
			<?php } ?>

			</select>

			</div>
			</div>

		</div>
		</div> <!--end of col-sm-6-->

		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Shifting Timing</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-time"></span></div>
			<select class="form-control" name="shift_time" required>
			<option value="" disabled selected>Select Shifting Timing</option>
			
			<?php 

				$query="SELECT * FROM cust_timing";
				$result=$db->select($query);

				while ($value=$result->fetch_assoc()) {
					
				

			 ?>
			<option 

				<?php if($timing==$value['timing']) { ?>

					selected="selected"

			<?php } ?> value="<?php echo $value['timing']; ?>"><?php echo $value['timing']; ?></option>
			
			<?php } ?>

			</select>

			</div>

			</div>


		</div>
		</div> <!--end of col-sm-6-->


		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">CCE Name</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
			<input type="text" class="form-control" name="cce_name" value="<?php echo $cc_name; ?>" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->


		<div class="col-sm-6">
		<div class="form-group">

			<label class="control-label col-sm-3">Start Time</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-time"></span></div>
			<input type="text" class="form-control" name="start_time" value="<?php echo $start_time; ?>" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->




		<div class="col-sm-12">
		<div class="form-group">

			<label class="control-label col-sm-2">Notes</label>
			<div class="col-sm-10">
			
			
			<textarea class="form-control" placeholder="Remarks [255 Character]" name="notes" maxlength="254" required><?php echo $notes; ?></textarea>
			
			</div>
		

		</div>
		</div> <!--end of col-sm-6-->


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