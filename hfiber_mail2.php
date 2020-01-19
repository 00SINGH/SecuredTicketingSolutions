<?php include "inc/header.php"; ?>

<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii:ss"
    });
</script>

<style type="text/css">   	
#note
{
   	color: red;
}
</style>

<hr>
<?php 

	date_default_timezone_set("Asia/Kolkata");
	if ($_SERVER['REQUEST_METHOD']=='POST')
	{
		$source_id=$fm->inputValidation($_POST['mail_source_id']);
		$source_date=$fm->inputValidation($_POST['mail_source_date']);
		$source_team=$fm->inputValidation($_POST['mail_source_team']);
		$source_pr=$fm->inputValidation($_POST['mail_source_person']);
		$source_pr=$fm->inputValidation($_POST['mail_source_person']);
		
		
		$date=mysqli_real_escape_string($db->link, $date );
		$work_order=mysqli_real_escape_string($db->link, $work_order);

		

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
					echo " ENRTY DONE !!";
				}
				else
				{
					echo "Something Went WRONG";
				}
			}
		}
?>
		
		
		
		
<form role="from" class="form-horizontal" action="" method="post">
	<div class="row">

	<div class="col-sm-6">
	<div class="form-group">

		<label class="control-label col-sm-3">Mail Date</label>
		<div class="col-sm-9">
		<div class="input-group">
		<div class="input-group-addon"><span class="glyphicon glyphicon-calender"></span></div>
		<input type="text" class="form-control" name="hfiber_creation_date" autocomplete="off" readonly required> 
		<!-- <div class="input-append date form_datetime">
			<input size="16" type="text" value="" readonly>
			<span class="add-on"><i class="icon-th"></i></span>
		</div> -->
		<div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>   <!-- -->
		</div>
		</div>
	</div>
	</div> 
	<!--end of col-sm-6  || Creation Date-->
</form>




<?php include "inc/footer.php"; ?>