
<?php include "inc/header.php"; ?>

<?php 

	if (custSession::get('user_role')=='Agent') {

		echo "<script>window.open('index.php','_self')</script>";
	}

 ?>


	<style type="text/css">
		
		th {

			color:  #1a5276 !important;
		}

	</style>


	<hr>
	<p>View User Details:</p>

	<hr>

	<?php 

		if (!isset($_GET['view']) || $_GET['view']==NULL) {

			echo "<script>window.open('view_users.php?msg=Some error happened!','_self')</script>";
		} else {

			$view_id=$_GET['view'];

			$query="SELECT * FROM cust_users WHERE id='$view_id'";
			$result=$db->select($query);

			$value=$result->fetch_assoc();

			$username=$value['user_name'];
			$fullname=$value['user_full_name'];
			$email=$value['user_email'];
			$contact=$value['user_contact'];
			$role=$value['user_role'];
			$level=$value['user_level'];
			$date=$value['user_cr_date'];
			$creator=$value['user_creator'];


		}


	 ?>

	<div class="table-responsive">

		<table class="table table-bordered">
			<tr>
				<th id="view">User Name</th>
				<td id="content"><?php echo $username; ?></td>
				<td id="space"></td>
				<th id="view">Full Name</th>
				<td id="content2"><?php echo $fullname; ?></td>
			</tr>


			<tr>
				<th>Email Id</th>
				<td><?php echo $email; ?></td>
				<td></td>
				<th>Contact No</th>
				<td><?php echo $contact; ?></td>
			</tr>

			<tr>
				<th>Role</th>
				<td><?php echo $role; ?></td>
				<td></td>
				<th>Level</th>
				<td><?php echo $level; ?></td>
			</tr>

			<tr>
				<th>Creation Date</th>
				<td><?php echo $date; ?></td>
				<td></td>
				<th>Created By</th>
				<td><?php echo $creator; ?></td>
			</tr>
		</table>

	</div>

	<a href="view_users.php"><button type="button" class="btn btn-info">Back</button></a>

	<hr>


<?php include "inc/footer.php"; ?>