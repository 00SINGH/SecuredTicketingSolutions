<?php include "inc/header.php"; ?>

<style type="text/css">   	
#note
{
   	color: red;
}
</style>



	<h5 class="w3-text-blue">Warning Message : <span id="note"></span> </h5>
	<hr>

	<?php 
		if (!isset($_GET['update']) || $_GET['update']==NULL)
		{
			echo "<script>window.open('view_hfiber_workorder.php?msg=Error occurred!','_self')</script>";
		}
		else
		{
			$update_id=$_GET['update'];

			$query="SELECT * FROM cust_hfiber_workorder WHERE hfiber_ttid='$update_id'";
			$result=$db->select($query);
			$value=$result->fetch_assoc();
			$date=$value['hfiber_creation_date'];
			$creator=$value['hfiber_creator'];
			$account=$value['hfiber_cust_account_no']; 
			$lco_code=$value['hfiber_lco_code'];
			$name=$value['hfiber_cust_name'];
			$lco_name=$value['hfiber_lco_name'];
			$con_no=$value['hfiber_cust_contact_no'];
			$switch=$value['hfiber_cust_switch'];
			$address=$value['hfiber_cust_address'];
			$source=$value['hfiber_cust_source'];
			$pin=$value['hfiber_cust_pin_code'];
			$category=$value['hfiber_cust_category']; //*** 11
			$status=$value['hfiber_cust_status']; //*** 11
			$team=$value['hfiber_cust_team']; //*** 11
			$mode=$value['hfiber_cust_mode'];
			$engg=$value['hfiber_closure_engg']; //*** 11
			$work_order=$value['hfiber_ttid'];
			$c_date=$value['hfiber_closure_date']; //*** 11
			$remarks=$value['hfiber_cust_remarks'];
			$c_remarks=$value['hfiber_closure_remarks']; //*** 11
			$c_cood=custSession::get('user_name');
		}
	 ?>
	 
	<?php 
		if ($_SERVER['REQUEST_METHOD']=='POST')
		{
			$category=$fm->inputValidation($_POST['hfiber_cust_category']);
			$status=$fm->inputValidation($_POST['hfiber_cust_status']);
			$team=$fm->inputValidation($_POST['hfiber_cust_team']);
			$engg=$fm->inputValidation($_POST['hfiber_closure_engg']);
			$c_date=$fm->inputValidation($_POST['hfiber_closure_date']);
			$c_remarks=$fm->inputValidation($_POST['hfiber_closure_remarks']);
			
			
			$category=mysqli_real_escape_string($db->link, $category);
			$status=mysqli_real_escape_string($db->link, $status);
			$team=mysqli_real_escape_string($db->link, $team);
			$engg=mysqli_real_escape_string($db->link, $engg);
			$c_date=mysqli_real_escape_string($db->link, $c_date);
			$c_remarks=mysqli_real_escape_string($db->link, $c_remarks);
			
			
			if ($category=="" ||  $status=="" || $team=="" || $engg=="" || $c_date=="" || $c_remarks=="" )
			{
				echo "Field must not be empty!";
			}
			else
			{
				$query="UPDATE cust_hfiber_workorder SET hfiber_cust_category='$category', hfiber_cust_status='$status', hfiber_cust_team='$team', hfiber_closure_engg='$engg', hfiber_closure_date='$c_date', hfiber_closure_remarks='$c_remarks', hfiber_closure_cood='$c_cood' WHERE hfiber_ttid='$update_id' ";
				$update=$db->update($query);
				if ($update)
				{
					//echo Date('Y-m-d H:i:s');
					echo "<script>window.open('hfiber_dashboard.php?msg=Work Order updated SUCCESSFULLY !!!','_self')</script>";
				}
				else
				{
					echo "<script>window.open('hfiber_dashboard.php?msg=Work Order Updation FAILED !!!','_self')</script>";
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
			<input type="text" class="form-control" name="hfiber_creation_date" value="<?php echo ("$date"); ?>" required readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>
		</div>
		</div> 
		<!--end of col-sm-6  || Creation Date-->
		
		
		<div class="col-sm-6">
		<div class="form-group">
			<label class="control-label col-sm-3">Created BY </label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
			<input type="text" class="form-control" name="hfiber_creator" placeholder="" value="<?php echo ("$creator"); ?>" required readonly>
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
			<input type="text" class="form-control" name="hfiber_cust_account_no" placeholder="" value="<?php echo $account; ?>" required readonly>
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
			<input type="text" class="form-control" name="hfiber_lco_code" placeholder="" value="<?php echo $lco_code; ?>" required readonly>
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
			<input type="text" class="form-control" name="hfiber_cust_name" id="hfiber_cust_name" placeholder="" autocomplete="off" value="<?php echo $name; ?>" required readonly>
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
			<input type="text" class="form-control" placeholder="" name="hfiber_lco_name" value="<?php echo $lco_name; ?>" required readonly>
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
			<input type="text" class="form-control" name="hfiber_cust_contact_no" placeholder="" autocomplete="off" maxlength="10" value="<?php echo $con_no; ?>" required readonly>
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
			<input type="text" class="form-control" id="hfiber_cust_switch" name="hfiber_cust_switch" placeholder="  " autocomplete="off" value="<?php echo $switch; ?>" readonly required>
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
			<input type="text" class="form-control" id="hfiber_cust_address" name="hfiber_cust_address" placeholder="  " autocomplete="off" value="<?php echo $address; ?>" readonly required>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>

		</div>
		</div> 
		<!--end of col-sm-6   || Fetching Customer Address-->
		
		
		<div class="col-sm-6">
		<div class="form-group">
			<label class="control-label col-sm-3">Source</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></div>
			<input type="text" class="form-control" name="hfiber_cust_source" value="<?php echo $source; ?>" readonly>
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
			<input type="text" class="form-control" id="hfiber_cust_pin_code" name="hfiber_cust_pin_code" placeholder="  " autocomplete="off" value="<?php echo $pin; ?>" readonly required>
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
			<select class="form-control" name="hfiber_cust_category" value="<?php echo $category; ?>" required>
			<option value="" disabled selected><?php echo $category; ?></option>

			<?php
				$query="SELECT * FROM cust_hfiber_category";
				$result=$db->select($query);
				while ($value=$result->fetch_assoc()) {
			 ?>
			<option
				<?php if($value['category']==$category) {?>
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
			<label class="control-label col-sm-3">STATUS</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></div>
			<select class="form-control" name="hfiber_cust_status" required>
			<option value="" disabled selected><?php echo $status; ?></option>
			<?php
				$query="SELECT * FROM cust_complain_status";
				$result=$db->select($query);
				while ($value=$result->fetch_assoc()) 
			{?>
			<option
				<?php if($value['c_status']==$status)
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
			<label class="control-label col-sm-3">Assigned Team </label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></div>
			<select class="form-control" name="hfiber_cust_team" required>
			<option value="" disabled selected><?php echo $team; ?></option>
			<?php
				$query="SELECT * FROM cust_hfiber_team";
				$result=$db->select($query);
				while ($value=$result->fetch_assoc()) 
			{?>
			<option
				<?php if($value['team']==$team)
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
			<label class="control-label col-sm-3">Complain Mode</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></div>
			<input type="text" class="form-control" name="hfiber_cust_mode" value="<?php echo $mode;?>" readonly>
			</div>
			</div>
		</div>
		</div>
		<!--end of col-sm-6   || Mode Selection-->		


		<div class="col-sm-6">
		<div class="form-group">
			<label class="control-label col-sm-3">Assigned Engineer </label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></div>
			<select class="form-control" name="hfiber_closure_engg" required>
			<option value="" disabled selected><?php echo $engg; ?></option>

			<?php
				$role=custSession::get('user_role');
				$query= "SELECT * FROM cust_users WHERE user_role='$role' AND user_level='Engineer' AND service_name IN ('ISP' , 'H-Fiber')" ;
				$result=$db->select($query);
				while ($value=$result->fetch_assoc())
			{?>
			<option
				<?php if($value['user_full_name']==$engg)
				{?>
					selected="selected"
					<?php
				}?>
				value="<?php echo $value['user_full_name']; ?>"><?php echo $value['user_full_name'];
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
		<!--end of col-sm-6   || Engineer Selection-->		


		<div class="col-sm-6">
		<div class="form-group">
			<label class="control-label col-sm-3">Work Order ID</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
			<input type="text" class="form-control" id="hfiber_ttid" name="hfiber_ttid" value="<?php echo $work_order; ?>" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
			</div>
			</div>
		</div>
		</div> 
		<!--end of col-sm-6   || Work Order ID -->		
		
		
		<div class="col-sm-6">
		<div class="form-group">
			<label class="control-label col-sm-3">Update Time</label>
			<div class="col-sm-9">
			<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
			<input type="text" class="form-control" id="hfiber_closure_date" name="hfiber_closure_date" value="<?php date_default_timezone_set("Asia/Kolkata"); echo Date('Y-m-d H:i:s'); ?>" readonly>
			<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
		</div>
		</div>
		</div>
		</div> 
		<!--end of col-sm-6   || Update Time-->
		
		
		<div class="col-sm-6">
		<div class="form-group">
			<label class="control-label col-sm-3">Caller Notes</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" name="hfiber_cust_remarks" value="<?php echo ("$remarks"); ?>" required readonly>
			</div>
		</div>
		</div> 
		<!--end of col-sm-6  Caller Notes-->
		
		
		<div class="col-sm-6">
		<div class="form-group">
			<label class="control-label col-sm-3">Closure Notes</label>
			<div class="col-sm-9">
			<textarea class="form-control" placeholder="Remarks" name="hfiber_closure_remarks" maxlength="500" required></textarea>
			</div>
		</div>
		</div>
		<!--end of col-sm-6   || Notes Collection-->
		
		
		
		<div class="col-sm-10">
		<div class="form-group">
		<div class="col-sm-offset-6">			
			<button type="submit" class="btn btn-success" name="update">SAVE</button>
			<a href="hfiber_dashboard.php"><button type="button" class="btn btn-info">Back</button></a>
		</div>
		</div>
		</div> <!--end of col-sm-6-->
	</div> <!--end of row-->		
</form>

	<hr> 

	
<?php include "inc/footer.php"; ?> 