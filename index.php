<?php include "inc/header.php" ?>
	<div class="w3-container w3-card-2">

		<?php if((CustSession::Get('user_role') == 'CS') || (CustSession::Get('user_role') == 'L2')) { ?>
		<h3 class="w3-center w3-text-red">News Board</h3>
            <hr>
            <?php 

                    $per_page=10;
                    $adjacents=10;

                    $query="SELECT COUNT(id) FROM cust_info";
                    $result=$db->select($query);
                    $row=mysqli_fetch_row($result);
                    $rows= $row[0];

                    //get total number of pages to be shown from total result
                    $pages=ceil($rows/$per_page);

                    //get current page from URL, if not present set it to 1
                    $page=(isset($_GET['page'])) ? (int)$_GET ['page']: 1;

                    //calculate actual start page with respect to MYSQL
                    $start= ($page-1)* $per_page;

                    //execute a mysql query to retrieve all result from current page by LIMIT keyword in MSQL
                    $query=("SELECT * FROM cust_info ORDER BY id DESC LIMIT $start, $per_page");
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
                    for($x=$lpage; $x<=$upage; $x++) {

                        $pagination.=($x==$page) ?'<strong>'.$x.'</strong>': '<a href="?page='.$x.'">'.$x.'</a>';     
                    }

                    //we show next link and last link if user doesn't on the last page

                    if ($page!=$pages AND $pages>1) { 

                        $pagination.='<a href="?page='.$next_page.'">Next</a>';

                    } else {

                    }

                    if ($page!=$pages AND $pages>1) { 

                        $pagination.='<a href="?page='.$pages.'">Last</a>';

                    } else
					{


                    }
		


                ?>
   

                <?php 
                   if ($result)
				   {
					while ($value=$result->fetch_assoc())
					{
                ?>

                    <h5 id="sub" class="w3-text-blue"><?php echo $value['subject']; ?></h5>
                    <h6 class="w3-text-green">Date : <?php echo $value['i_date']; ?></h6>
                    
                    <div class="w3-medium w3-justify"><?php echo $value['body']; ?></div>
                    <h6 class="w3-text-purple">Posted By : <?php echo $value['creator']; ?></h6>
                    <hr>

	<?php } } }?>


                    <br>

       
                <nav id="brain">
                        <ul class="pager">
                        <li><a href="#"><?php echo $pagination; ?> </a></li>
                       
                        </ul>
                </nav>

            </div> <!--end of message container-->


    <?php include "inc/footer.php" ?>

    <br>


