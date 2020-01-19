

<?php include "inc/header.php"; ?>


<?php 

	if (custSession::get('user_role')=='Agent') {

		echo "<script>window.open('index.php','_self')</script>";
	}

 ?>


	<div class="row">

		<div class="col-sm-8">
			<hr>
			<p>Edit User:</p>
			<hr>

			<?php 

				if (!isset($_GET['edit']) || $_GET['edit']==NULL) {

					echo "<script>window.open('view_users.php?msg=Some error happened!','_self')</script>";

				} else {

					$edit_id=$_GET['edit'];

					$query="SELECT * FROM cust_users WHERE id='$edit_id'";
					$result=$db->select($query);

					$value=$result->fetch_assoc();

					$user_name=$value['user_name'];
					$full_name=$value['user_full_name'];
					$user_email=$value['user_email'];
					$user_contact=$value['user_contact'];
					$user_role=$value['user_role'];
					$user_level=$value['user_level'];
					$user_cr_date=$value['user_cr_date'];
					$user_creator=$value['user_creator'];

				}


			 ?>

			<?php 

				if ($_SERVER['REQUEST_METHOD']=='POST') {

					$username=$fm->inputValidation($_POST['user_name']);
					$fullname=$fm->inputValidation($_POST['full_name']);
					$email=$fm->inputValidation($_POST['email']);
					$cont=$fm->inputValidation($_POST['contact_no']);
					$role=$fm->inputValidation($_POST['role']);
					$level=$fm->inputValidation($_POST['level']);

					$username=mysqli_real_escape_string($db->link, $username);
					$fullname=mysqli_real_escape_string($db->link, $fullname);
					$email=mysqli_real_escape_string($db->link, $email);
					$cont=mysqli_real_escape_string($db->link, $cont);
					$role=mysqli_real_escape_string($db->link, $role);
					$level=mysqli_real_escape_string($db->link, $level);
					
					if ($username=="" || $fullname=="" || $email=="" || $cont=="" || $role=="" || $level=="" )
					{
						echo "Field must not be empty!";
					}
					else
					{
						$query="UPDATE cust_users SET user_name='$username', user_full_name='$fullname', user_email='$email', user_contact='$cont', user_role='$role', user_level='$level' WHERE id='$edit_id'";

						$update=$db->update($query);

						if ($update)
						{
							echo "<script>window.open('view_users.php?msg=User updated successfully!','_self')</script>";
						}
						else
						{
							echo "<script>window.open('view_users.php?msg=User updation failed!','_self')</script>";
						}
					}
				}

			 ?>

			<form class="form-horizontal" role="form" method="post" action="">
					
					<div class="form-group">

						<label class="control-label col-sm-2">User Name</label>

					<div class="col-sm-6">

						<input type="text" name="user_name" class="form-control" value="<?php echo $user_name; ?>" placeholder="User Name..." autocomplete="off" required>

					</div>

					</div>


					<div class="form-group">

						<label class="control-label col-sm-2">Full Name</label>

					<div class="col-sm-6">

						<input type="text" name="full_name" class="form-control" value="<?php echo $full_name; ?>" placeholder="Full Name" autocomplete="off" required>

					</div>

					</div>

					<div class="form-group">

						<label class="control-label col-sm-2">Email</label>

					<div class="col-sm-6">

						<input type="email" name="email" class="form-control" value="<?php echo $user_email; ?>" placeholder="Email...." autocomplete="off" required>

					</div>

					</div>


					<div class="form-group">

						<label class="control-label col-sm-2">Contact No</label>

					<div class="col-sm-6">

						<input type="text" name="contact_no" class="form-control" value="<?php echo $user_contact; ?>" placeholder="Contact No..." autocomplete="off" required>

					</div>

					</div>


					<div class="form-group">

						<label class="control-label col-sm-2">Role</label>

					<div class="col-sm-6">

						<select class="form-control" name="role">
							
							<option value="" selected disabled>Select Role</option>

							<?php 

							$query="SELECT * FROM cust_role";
							$result=$db->select($query);

								while ($value=$result->fetch_assoc()) {

							 ?>

							<option
								<?php if($user_role==$value['role']) {?>
									selected="selected"
								<?php } ?> value="<?php echo $value['role']; ?>"><?php echo $value['role']; ?></option>
								<?php } ?>

						</select>

					</div>

					</div>


					<div class="form-group">

						<label class="control-label col-sm-2">Level</label>

					<div class="col-sm-6">

						<select class="form-control" name="level">
							
							<option value="" selected disabled>Select Level</option>

							<?php 

								$query="SELECT * FROM cust_level";
								$level=$db->select($query);

								while ($lvl=$level->fetch_assoc()) {
									
								
							 ?>

							 <option 

							 	<?php if($user_level==$lvl['level']) {?>

							 		selected="selected"

							 <?php } ?> value="<?php echo $lvl['level']; ?>"><?php echo $lvl['level']; ?></option>

							 <?php } ?>

						</select>

					</div>

					</div>
					
					<div class="form-group">

						<div class="col-sm-offset-2 col-sm-6">

							<button type="submit" class="btn btn-success" name="create">Update User</button>
							<button type="reset" class="btn btn-warning" name="reset">Reset</button>
							<a href="view_users.php"><button type="button" class="btn btn-info" name="back">Back</button></a>

						</div>

					</div>



			</form>


		</div>




	</div>






<?php include "inc/footer.php"; ?>