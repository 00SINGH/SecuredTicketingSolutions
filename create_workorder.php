
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
        
        function getMessage (value) {

            $.post("get_state.php", {searchNote:value}, function(data) {

                $("#note").html(data);

            });
        }       

    </script>

    <script type="text/javascript">
        
        function getPhase (value) {

            $.post("get_phase.php", {searchPhase:value}, function(data) {

                $("#das").val(data);

            });
        }       

    </script>


    <style type="text/css">
    	
    #note {

    	color: red;
    }

    </style>



	<h5 class="w3-text-blue">Workorder : <?php echo date("F j,  Y"); ?> &nbsp; &nbsp; Warning Message : <span id="note"></span> </h5>
	<hr>

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

			if ($date=="" || $work_order=="" || $requester=="" || $smc=="" || $account=="" || $nds=="" || $stb=="" || $cust_type=="" || $en_code=="" || $en_name=="" || $con_no=="" || $state=="" || $mode=="" || $phase=="" || $calltype=="" || $complain=="" || $ticket=="" || $resolution=="" || $package=="" || $tenure=="" || $follow=="" || $shifting=="" || $cc_name=="" || $starttime=="" || $notes=="" ) {

				echo "Field must not be empty!";
			} else {

				$query="INSERT INTO cust_work(w_date, w_work, w_requester, w_smc, w_account, w_nds, w_stb, w_cstype, w_en_code, w_en_name, w_con_no, w_state, w_phase, w_mode, w_calltype, w_complain, w_ticket, w_resolution, w_package, w_tenure, w_follow, w_timing, w_cc_name, w_start_time, w_notes) VALUES('$date','$work_order','$requester','$smc','$account','$nds','$stb','$cust_type','$en_code','$en_name','$con_no','$state','$phase','$mode','$calltype','$complain','$ticket','$resolution','$package','$tenure','$follow','$shifting','$cc_name','$starttime','$notes')";

				$post=$db->insert($query);

				if ($post) {

					echo "<script>window.open('create_workorder.php?msg=Work Order Created Successfully!','_self')</script>";
				} else {

					echo "<script>window.open('create_workorder.php?msg=Work Order Creation Failed!','_self')</script>";
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
			<input type="text" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" autocomplete="off" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->


		<div class="col-sm-6">
		<div class="form-group">

			<?php 

				$rand = mt_rand(1000000, 9999999);
				$text = 'CS';
				$date = date('dmy');
				$randtext=$text.$date.$rand;

			 ?>

			<label class="control-label col-sm-3">Work Order No</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
			<input type="text" class="form-control" id="work_order" name="work_order" placeholder="End Time..." value="<?php echo $randtext; ?>" readonly>
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

				<?php if($value['requester']=='Lco') {?>

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
			<input type="text" class="form-control" name="smc_no" placeholder="000083704825" onkeyup="getHistory(this.value)" autocomplete="off" maxlength="12" required>
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
			<input type="text" class="form-control" name="ac_no" placeholder="1077355092" value="NA" autocomplete="off" maxlength="10" required>
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
			<input type="text" class="form-control" name="nds_no" placeholder="5944627811228145" value="NA" autocomplete="off" maxlength="16" required>
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
			<input type="text" class="form-control" name="stb_no" placeholder="C900013021647802" value="NA" autocomplete="off" maxlength="18" required>
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

				<?php if ($value['cust_type']=='Secondary') {?>

			 		selected="selected"

			 	<?php } ?> value="<?php echo $value['cust_type']; ?>"><?php echo $value['cust_type']; ?></option>
			
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
			<input type="text" class="form-control" name="entity_code" id="entity_code" placeholder="1077357652" autocomplete="off" onkeyup="getNames(this.value)" onchange="getPhase(this.value)"  maxlength="10"  required />
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
			<input type="text" class="form-control" id="entity_name" name="entity_name" placeholder="ABHIJIT SARKAR" autocomplete="off" value="" onkeydown="getMessage(this.value)" required>
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
			<input type="text" class="form-control" id="cont_no" name="cont_no" placeholder="8335050957" autocomplete="off" maxlength="10" required>
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
			<input type="text" class="form-control" name="state" placeholder="West Bengal" autocomplete="off" value="<?php echo $state; ?>" readonly>
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

			<input type="text" name="phase" id="das" class="form-control" placeholder="Das-I" required>

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

				<?php if($value['mode']=='CALL') {?>

					selected="selected"
			 
			 <?php } ?> value="<?php echo $value['mode']; ?>"><?php echo $value['mode']; ?></option>
			
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

				<?php if($value['call_type']=='Inbound') {?>

					selected="selected"

			 <?php } ?> value="<?php echo $value['call_type']; ?>"><?php echo $value['call_type']; ?></option>
			
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

			<label class="control-label col-sm-3">Ticket No</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-tag"></span></div>
			<input type="text" class="form-control" name="ticket_no" placeholder="29092016W3580558" autocomplete="off" maxlength="20" required>
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

				<?php if($value['resolution']=='Resolved') {?>

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

			<?php if ($value['package']=="None") {?>

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

				<?php if($value['tenure']=='None') {?>

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

			<?php if($value['follow']=='No') {?>

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
			<option value="<?php echo $value['timing']; ?>"><?php echo $value['timing']; ?></option>
			
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
			<input type="text" class="form-control" name="cce_name" value="<?php echo custSession::get('user_name'); ?>" readonly>
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
			<input type="text" class="form-control" name="start_time" value="<?php echo date('Y-m-d G:i:s'); ?>" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>


		</div>
		</div> <!--end of col-sm-6-->




		<div class="col-sm-12">
		<div class="form-group">

			<label class="control-label col-sm-2">Notes</label>
			<div class="col-sm-10">
			
			
			<textarea class="form-control" placeholder="Remarks [255 Character]" name="notes" maxlength="254" required></textarea>
			
			</div>
		

		</div>
		</div> <!--end of col-sm-6-->


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
		
		function getHistory(value) {

			$.post('smc_history.php', {searchHistory:value}, function(data){ 

				$('#records').html(data);

			});
		}



	</script>


	<hr>

	<p>Previous Call History:</p>
	<p id="records"></p>




<?php include "inc/footer.php"; ?>

<br>