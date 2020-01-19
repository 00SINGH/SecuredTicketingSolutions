

<?php include "lib/custSession.php";

    custSession::checkLogin();

 ?>
 
 <?php include "config/config.php"; ?>
 <?php include "lib/custData.php"; ?>
 <?php include "helper/custFormat.php"; ?>
 


 <?php 

    $db= new custData();
    $fm= new custFormat();

  ?>




<!DOCTYPE html>
<html>
<head>
	<title>Secured Ticketing Solutions</title>
    

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">

    <!--w3 css-->

    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/login_style.css">

    <!--for jQuery-->

    <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
    <script src="jquery-ui/jquery.js"></script>
    <script src="jquery-ui/jquery-ui.js"></script>

    <!--external css-->
    
  


</head>

<body style="background-image: url('img/cust.jpg');">

    <div class="container">



        <div class="row" style="">

        <div class="col-sm-2">

        </div>

        <div class="col-sm-8">

        <?php 

            if ($_SERVER['REQUEST_METHOD']=='POST') {
               
               $username= $fm->inputValidation($_POST['user_name']);
               $password= $fm->inputValidation(md5($_POST['user_pass']));

               $username= mysqli_real_escape_string($db->link, $username);
               $password= mysqli_real_escape_string($db->link, $password);

               $query="SELECT * FROM cust_users WHERE user_name='$username' AND user_pass='$password'";

               $result=$db->select($query);

               if ($result !=false) {

                    $value=mysqli_fetch_array($result);
                    $row= mysqli_num_rows($result);

                    if ($row) {

                        custSession::set('login', true);
                        custSession::set('user_name', $value['user_name']);
                        custSession::set('id', $value['id']);
                        custSession::set('user_role', $value['user_role']);

                        header('Location:index.php');

                    }
					else
					{
                        echo "No Records Found!";
                    }


               }
			   else
			   {
                    echo "User name or Password not Matched!";
               }

            }

         ?>

        <h1><center>SECURED TICKETING SOLUTIONS</center></h1>
        <hr>

        <form class="form-horizontal" role="form" action="" method="post">

            <div class="form-group">

                <label class="control-label col-sm-2"></label>
                <div class="col-sm-8">

                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                <input type="text" class="form-control" name="user_name" placeholder="User Name" autocomplete="off">
                <div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>

                </div>

                </div>

            </div> <!--end of form-group-->

            <div class="form-group">

                <label class="control-label col-sm-2"></label>
                <div class="col-sm-8">

                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input type="password" class="form-control" name="user_pass" placeholder="Password" autocomplete="off">
                <div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>

                </div>

                </div>

            </div> <!--end of form-group-->

            <div class="form-group">

                <div class="col-sm-offset-2 col-sm-8">
					<p><center>
                    <button type="submit" class="btn btn-success" name="login">LOGIN</button>
                    <button type="reset" class="btn btn-warning" name="reset">RESET</button>
					</center></p>
                </div>

            </div> <!--end of form-group-->
            
            <p><center><a href="#">Forgot Password?</a></center></p>


        </form>

        <hr>



       <p><center>Powered by SECURED SECTOR LABS</center></p>

        </div>


    </div>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery-ui/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
