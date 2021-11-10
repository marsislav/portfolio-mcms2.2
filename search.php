<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">
<div class="all">
    <div class="row">
    <h1>Резултат: </h1>
    
    <?php

                

                if(isset($_POST['submit'])){
                    
                $search = $_POST['search'];
                    
                    
                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                $search_query = mysqli_query($connection, $query);

                if(!$search_query) {

                    die("QUERY FAILED" . mysqli_error($connection));

                }

                $count = mysqli_num_rows($search_query);

                if($count == 0) {

                    echo "<p>Не са открити резултати.</p>";

                } else {

        while($row = mysqli_fetch_assoc($search_query)) {
            $post_title = $row['post_title'];
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content=mb_substr($row['post_content'],0,400, 'utf-8');

            ?>

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
        </div>
        
            <hr>


            <?php } } } ?>

       <div class="marginBottom"> 
            <h4>Ново търсене:</h4>
            <form action="search.php" method="post">
                <div class="input-group">
                    <input name="search" type="text" class="form-control">
                    <span class="input-group-btn">
                    <button name="submit" class="btn btn-primary" type="submit">
                        Търси
                    </button>
                    </span>
                </div>
            </form>
        </div>
        <!-- Sidebar Widgets Column -->

        <?php include "includes/sidebar.php";?>
    


<?php include "includes/footer.php";?>