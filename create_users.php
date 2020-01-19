

<?php include "inc/header.php"; ?>

<?php 

	if (custSession::get('user_role')=='CCE') {

		echo "<script>window.open('index.php','_self')</script>";
	}

 ?>


	<div class="row">

		<div class="col-sm-8">
			<hr>
			<p>Create User:</p>
			<hr>

			<?php 

				if ($_SERVER['REQUEST_METHOD']=='POST') 
				{
					$username=$fm->inputValidation($_POST['user_name']);
					$pass=$fm->inputValidation(md5($_POST['user_pass']));
					$fullname=$fm->inputValidation($_POST['user_full_name']);
					$email=$fm->inputValidation($_POST['user_email']);
					$cont=$fm->inputValidation($_POST['user_contact']);
					$role=$fm->inputValidation($_POST['user_role']);
					$level=$fm->inputValidation($_POST['user_level']);
					$service=$fm->inputValidation($_POST['service_name']);
					$date=$fm->inputValidation($_POST['user_cr_date']);
					$creator=$fm->inputValidation($_POST['user_creator']);

					$username=mysqli_real_escape_string($db->link, $username);
					$pass=mysqli_real_escape_string($db->link, $pass);
					$fullname=mysqli_real_escape_string($db->link, $fullname);
					$email=mysqli_real_escape_string($db->link, $email);
					$cont=mysqli_real_escape_string($db->link, $cont);
					$role=mysqli_real_escape_string($db->link, $role);
					$level=mysqli_real_escape_string($db->link, $level);
					$service=mysqli_real_escape_string($db->link, $service);
					// $state=mysqli_real_escape_string($db->link, $state);
					$date=mysqli_real_escape_string($db->link, $date);
					$creator=mysqli_real_escape_string($db->link, $creator);

					if ($username=="" || $pass=="" || $fullname=="" || $email=="" || $cont=="" || $role=="" || $level=="" || $service=="" || $date=="" || $creator=="")
					{

						echo "Field must not be empty!"; 
					} 
					else
					{

						$query="INSERT INTO cust_users(user_name, user_pass, user_full_name, user_email, user_contact, user_role, user_level, service_name, user_cr_date, user_creator) VALUES('$username','$pass','$fullname','$email','$cont','$role','$level','$service','$date','$creator')";

						$post=$db->insert($query);

						if ($query)
						{

							echo "<script>window.open('view_users.php?msg=User created successfully!','_self')</script>";

						}
						else
						{
							echo "<script>window.open('view_users.php?msg=User creation failed!','_self')</script>";
						}
					}
				}

			 ?>

			<form class="form-horizontal" role="form" method="post" action="">
					
					<div class="form-group">
						<label class="control-label col-sm-2">User Name</label>
					<div class="col-sm-6">
						<input type="text" name="user_name" class="form-control" placeholder="User Name..." autocomplete="off" required>
					</div>
					</div>
					<!-- User Name -->
					
					
					<div class="form-group">
						<label class="control-label col-sm-2">Password</label>
					<div class="col-sm-6">
						<input type="password" name="user_pass" class="form-control" placeholder="Passowrd...." autocomplete="off" required>
					</div>
					</div>
					<!-- Password -->
					
					
					<div class="form-group">
						<label class="control-label col-sm-2">Full Name</label>
					<div class="col-sm-6">
						<input type="text" name="user_full_name" class="form-control" placeholder="Full Name" autocomplete="off" required>
					</div>
					</div>
					<!-- Full Name -->
					
					
					<div class="form-group">
						<label class="control-label col-sm-2">Email</label>
					<div class="col-sm-6">
						<input type="email" name="user_email" class="form-control" placeholder="Email...." autocomplete="off" required>
					</div>
					</div>
					<!-- Email -->

					
					<div class="form-group">
						<label class="control-label col-sm-2">Contact No</label>
					<div class="col-sm-6">
						<input type="text" name="user_contact" class="form-control" placeholder="Contact No..." autocomplete="off" required>
					</div>
					</div>
					<!-- Mobile No -->

					
					<div class="form-group">
						<label class="control-label col-sm-2">Role</label>
					<div class="col-sm-6">
						<select class="form-control" name="user_role">
							<option value="" selected disabled>Select Role</option>

							<?php 

							$query="SELECT * FROM cust_role";
							$result=$db->select($query);

								while ($value=$result->fetch_assoc()) {

							 ?>

							<option value="<?php echo $value['role']; ?>"><?php echo $value['role']; ?></option>


							<?php } ?>

						</select>

					</div>

					</div>
					
					
					<div class="form-group">
						<label class="control-label col-sm-2">Level</label>
					<div class="col-sm-6">
						<select class="form-control" name="user_level">
							<option value="" selected disabled>Select Level</option>
						<?php
							$query="SELECT * FROM cust_level";
							$result=$db->select($query);
								while ($value=$result->fetch_assoc())
								{
							?>
									<option value="<?php echo $value['level']; ?>"><?php echo $value['level']; ?></option>
						<?php 	} 
							?>
						</select>
					</div>
					</div>
					<!-- User level - Not yet dependant, manual entry needed  -->
					
					
					<div class="form-group">
						<label class="control-label col-sm-2">Service Type</label>
					<div class="col-sm-6">
						<select class="form-control" name="service_name">
							<option value="" selected disabled>Select Service Type</option>
							<?php 
								$query="SELECT * FROM cust_service";
								$service=$db->select($query);
								while ($svc=$service->fetch_assoc()) {
							 ?>

							 <option value="<?php echo $svc['service_name']; ?>"><?php echo $svc['service_name']; ?></option>

							 <?php } ?>

						</select>

					</div>

					</div>


					<!-- <div class="form-group">

						<label class="control-label col-sm-2">State</label>

					<div class="col-sm-6">

						<select class="form-control" name="state">
							
							<option value="" selected="selected" disabled>Select State</option>

								<?php 

								$query="SELECT * FROM cust_state";
								$state=$db->select($query);

								while ($stat=$state->fetch_assoc()) {
									
								
							 ?>

							 <option value="<?php echo $stat['name']; ?>"><?php echo $stat['name']; ?></option>

							 <?php } ?>



						</select>

					</div> 

					</div> -->

					<div class="form-group">

						<label class="control-label col-sm-2">Date</label>

					<div class="col-sm-6">

						<input type="text" name="user_cr_date" class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly>

					</div>

					</div>


					<div class="form-group">

						<label class="control-label col-sm-2">Creator</label>

					<div class="col-sm-6">

						<input type="text" name="user_creator" class="form-control" value="<?php echo custSession::get('user_name'); ?>" readonly>

					</div>

					</div>

					<div class="form-group">

						<div class="col-sm-offset-2 col-sm-6">

							<button type="submit" class="btn btn-success" name="create">Create User</button>
							<button type="reset" class="btn btn-warning" name="reset">Reset</button>

						</div>

					</div>



			</form>


		</div>




	</div>


	<hr>



<?php include "inc/footer.php"; ?>