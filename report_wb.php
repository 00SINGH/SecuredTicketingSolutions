
<?php include "inc/header.php"; ?>

<?php 

	if($state!='West Bengal') {

		echo "<script>window.open('index.php','_self')</script>";
	}

 ?>


	<hr>
	<p>Reports of West Bengal:</p>
	<hr>

	<ul class="nav nav-tabs w3-blue">
		
		<li class="active"><a data-toggle="tab" href="#menu1">Work Order</a></li>
		<li><a data-toggle="tab" href="#menu2">Peding Work Order</a></li>
		<li><a data-toggle="tab" href="#menu3">Updated Work Order</a></li>

	</ul>

	<div class="tab-content">

		<div id="menu1" class="tab-pane fade in active">
			<hr>
			<p class="w3-text-green">Download Work Order Report:</p>

			<form class="form-inline" role="form" method="post" action="wb_work_download.php">
					
				<div class="form-group">
					<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
					<input type="text" id="date1" name="date1" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
					</div>
				</div>

				 <script> //--Jquery for datepicker...
                        $('input#date1').datepicker ({dateFormat:'yy-mm-dd'});
                    </script> <!--end of jquery-->


				<div class="form-group">
					<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
					<input type="text" id="date2" name="date2" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
					</div>
				</div>


				 <script> //--Jquery for datepicker...
                        $('input#date2').datepicker ({dateFormat:'yy-mm-dd'});
                    </script> <!--end of jquery-->


				<div class="form-group">
					
					<button type="submit" class="btn btn-success" name="work_down">Download</button>
				</div>


			</form>

		</div>

		<div id="menu2" class="tab-pane fade">
			<hr>
			<p class="w3-text-green">Download Pending Work Order Report:</p>


			<form class="form-inline" role="form" method="post" action="wb_p_work.php">
					
				<div class="form-group">
					<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
					<input type="text" id="date3" name="date3" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
					</div>
				</div>

				 <script> //--Jquery for datepicker...
                        $('input#date3').datepicker ({dateFormat:'yy-mm-dd'});
                    </script> <!--end of jquery-->


				<div class="form-group">
					<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
					<input type="text" id="date4" name="date4" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
					</div>
				</div>

				 <script> //--Jquery for datepicker...
                        $('input#date4').datepicker ({dateFormat:'yy-mm-dd'});
                    </script> <!--end of jquery-->


				<div class="form-group">
					
					<button type="submit" class="btn btn-success" name="work_p_down">Download</button>
				</div>


			</form>

		</div>

		<div id="menu3" class="tab-pane fade">
			<hr>
			<p class="w3-text-green">Download Updated Work Order Report:</p>


			<form class="form-inline" role="form" method="post" action="wb_u_work.php">
					
				<div class="form-group">
					<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
					<input type="text" id="date5" name="date5" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
					</div>
				</div>

				 <script> //--Jquery for datepicker...
                        $('input#date5').datepicker ({dateFormat:'yy-mm-dd'});
                    </script> <!--end of jquery-->


				<div class="form-group">
					<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
					<input type="text" id="date6" name="date6" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
					</div>
				</div>

				 <script> //--Jquery for datepicker...
                        $('input#date6').datepicker ({dateFormat:'yy-mm-dd'});
                    </script> <!--end of jquery-->


				<div class="form-group">
					
					<button type="submit" class="btn btn-success" name="work_u_down">Download</button>
				</div>


			</form>

		</div>


	</div>
	

<hr>


<?php include "inc/footer.php"; ?>