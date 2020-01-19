<?php include "inc/header.php"; ?>
<?php 
    if (custSession::get('user_role')=='Agent')
	{
        echo "<script>window.open('index.php','_self')</script>";
    }
?>

	<div class="row">
	<hr>
	<p>User List:</p>
	<hr>

		 <?php 

                    $per_page=4;
                    $adjacents=4;

                    $query="SELECT COUNT(id) FROM cust_users";
                    $result=$db->select($query);
                    $row=mysqli_fetch_row($result);
                    $rows= $row[0];

                    //get totol number of pages to be shown from total result
                    $pages=ceil($rows/$per_page);

                    //get current page from URL, if not present set it to 1
                    $page=(isset($_GET['page'])) ? (int)$_GET ['page']: 1;

                    //calculate actual start page with respect to MYSQL
                    $start= ($page-1)* $per_page;

                    //execute a mysql query to retrieve all result from current page by LIMIT keyword in MSQL
                    //$query=("SELECT * FROM cust_users ORDER BY id DESC LIMIT $start, $per_page");

					//if (custSession::get('user_role') == 'ADMIN' )
					//{
						//$query=("SELECT COUNT(id) FROM cust_users ORDER BY id DESC LIMIT $start, $per_page");
					//}
					//else
					//{
						$query=("SELECT COUNT(id) FROM cust_users WHERE 'user_role'=$role ORDER BY id DESC LIMIT $start, $per_page");
					//}
					
					$result=$db->select($query);
                    $i=1;

                    $pagination="Information ";

                    //if current page is first show first only else reduce 1 by current page
                    $prev_page=($page==1)?1:$page-1;

                    //if current page is last show last only else add 1 to current page
                   
                    $next_page=($page>=$pages)?$page:$page+1;

                   

                    //if we are not on the first page show first link
                    if($page!=1) $pagination.='<a href="?page=1">First</a>';
                    //if we are not on the first page show previous link
                    if($page!=1) $pagination.='<a href="?page='.$prev_page.'">Previous</a>';

                    //we are going to display 5 links on pagination bar
                    $numberOfLinks=5;

                    //find the number of the links to show the right of the current page
                    $upage=ceil(($page)/$numberOfLinks)*$numberOfLinks;

                    //find the number of the link to show the left of the current page
                    $lpage=floor(($page)/$numberOfLinks)*$numberOfLinks;

                    //if number of links on the left of the current page are zero we start from 1
                    $lpage=($lpage==0)?1:$lpage;

                    //find the number of the links to show on the right of the current page and make sure it must be less than total number of the pages.
                    $upage=($lpage==$upage)?$upage+$numberOfLinks:$upage;
                    if ($upage>$pages)$upage=($pages-1);

                    //start building links from the left to right of the current page
                    for($x=$lpage; $x<=$upage; $x++)
					{
                        $pagination.=($x==$page) ?'<strong>'.$x.'</strong>': '<a href="?page='.$x.'">'.$x.'</a>';     
                    }

                    //we show next link and last link if user doesn't on the last page

                    if ($page!=$pages AND $pages>1)
					{ 
                        $pagination.='<a href="?page='.$next_page.'">Next</a>';
                    }
					else
					{
						
						
                    }

                    if ($page!=$pages AND $pages>1) 
					{
                        $pagination.='<a href="?page='.$pages.'">Last</a>';
                    }
					else
					{


                    }
                ?>


	<div class="table-responsive">

		<table class="table table-bordered">
			
			<tr class="w3-green">
				
				<th>SL No.</th>
				<th>User Name</th>
				<th>Name</th>
				<th>Email Id</th>
				<th>User Role</th>
				<th>Level</th>
				<th>Action</th>

			</tr>

			<?php 

			
				if ($result) {

					$i=0;
					while ($value=$result->fetch_assoc()) {
					$i++;
			 	?>

			 	<tr>
			 		<td><?php echo $i; ?></td>
			 		<td><?php echo $value['user_name']?></td>
			 		<td><?php echo $value['user_full_name']?></td>
			 		<td><?php echo $value['user_email']?></td>
			 		<td><?php echo $value['user_role']?></td>
			 		<td><?php echo $value['user_level']?></td>
			 		<td> <a href="view_users_details.php?view=<?php echo $value['id']; ?>">View</a> || <a href="edit_users.php?edit=<?php echo $value['id']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete?')" href="del_users.php?del=<?php echo $value['id']; ?>">Delete</a></td>

			 	</tr>


			 	<?php } } ?>

		</table>

	</div>

	  			<nav id="brain">
                        <ul class="pager">
                        <li><a href="#"><?php echo $pagination; ?> </a></li>
                       
                        </ul>
                </nav>


	</div>


    <script type="text/javascript">
        
        function getWork(value) {

            $.post("search_user.php", {searchWork:value}, function(data){

                $("#results").html(data);

            });
        }

    </script>

    <p>Search User:</p>

    <div class="row">
        <div class="col-sm-4">

            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
               <input type="text" name="search" class="form-control" autocomplete="off" placeholder="Search by user name..." onkeyup="getWork(this.value)" >
               </div>

            </div>

        </div>


    </div>

    <div id="results"></div>

    





<?php include "inc/footer.php"; ?>
