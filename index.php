<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">
<div class="all">
    <div class="row">

        <!-- Blog Entries Column -->

        

            <?php

             $per_page = 10;

            if(isset($_GET['page'])) {

            $page = $_GET['page'];

            } else {


                $page = "";
            }

            if($page == "" || $page == 1) {

                $page_1 = 0;

            } else {

                $page_1 = ($page * $per_page) - $per_page;

            }


         if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ) {


        $post_query_count = "SELECT * FROM posts";


         } else {

            

         $post_query_count = "SELECT * FROM `posts` ORDER BY `post_date` ASC";
         }   

        $find_count = mysqli_query($connection,$post_query_count);
        $count = mysqli_num_rows($find_count);

        if($count < 1) {


            echo "<h3 class='text-center'>не са налични статии</h3>";

        } else {

        $count  = ceil($count /$per_page);

        $query = "SELECT * FROM posts LIMIT $page_1, $per_page ";
        $select_all_posts_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content=mb_substr($row['post_content'],0,400, 'utf-8');
        $post_status = $row['post_status'];
        ?>



            <!-- First Blog Post -->


            <h3>Блог</h3>
           

<div class="col-md-6">
            <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-fluid" src="img/<?php echo $post_image;?>" alt="">
            </a>
        </div>

 
            <div class="col-md-6">
            <h4>
                <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title ?></a>
            </h4>
            <p>
                от <a
                    href="author_posts.php?author=<?php echo $post_author;?>&p_id=<?php echo $post_id;?>"><?php echo $post_author ?></a>, на дата/ час <span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?>
            </p>
            <hr class="tight">
            <div class="exc"><?php echo $post_content?> ...</div>
            <a class="btn btn-primary block" href="post.php?p_id=<?php echo $post_id; ?>">Прочети... <span
                    class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
            <hr>


            <?php }  } ?>

        

        <!-- Blog Sidebar Widgets Column -->

        <?php include "includes/sidebar.php";?>

    </div>
    <!-- /.row -->

    
    <ul class="pager pagination pagination-sm">

        <?php 

        $number_list = array();

        for($i =1; $i <= $count; $i++) {

        if($i == $page) {

             echo "<li class='page-item active' aria-current='page'><a class='page-link' href='blog.php?page={$i}'>{$i}</a></li>";

        }  else {

            echo "<li class='page-item'><a href='blog.php?page={$i}' class='page-link'>{$i}</a></li>";
        }
        }
         ?>
         
    </ul>
    </div>

<?php include "includes/footer.php";?>