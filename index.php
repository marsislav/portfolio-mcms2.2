<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>


<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">
    <div class="all page">
    <div class="row">
        <!-- Blog Entries Column -->

        <?php if (isset($_GET['page_id'])){
        $the_page_id=$_GET['page_id'];

      }
      ?>

        <?php $query = "SELECT * FROM pages WHERE page_id = $the_page_id"; 
        $select_all_pages_query=mysqli_query($connection, $query);
        while ($row=mysqli_fetch_assoc($select_all_pages_query)) {
          $page_title=$row['page_title'];
          
          $page_content=$row['page_content'];
          ?>


        <div class="col-md-12">
            <!-- Page content -->
            <h1>
                <?php echo $page_title;?>
            </h1>
            <div>
                <?php echo $page_content;?>
                <?php 
                    $url = "https://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI]; 
                    
                    $contacts = "https://marsislav.net/page.php?page_id=6";
                    if ($url==$contacts) {
                    include "includes/contact-form.php";
                    }
                    ?>
            </div>

        </div>

    </div>
    <?php
        }
        ?>


<!-- /.row -->

<hr />

<?php include "includes/footer.php";?>