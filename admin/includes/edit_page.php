<?php

    if(isset($_GET['page_id'])){
    
    $the_page_id =  escape($_GET['page_id']);

    }


    $query = "SELECT * FROM pages WHERE page_id = $the_page_id  ";
    $select_pages_by_id = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_pages_by_id)) {
        $page_id            = $row['page_id'];
        $page_title         = $row['page_title'];
        $page_content       = $row['page_content'];
        $page_position=$row['page_position'];
               
         }


    if(isset($_POST['update_post'])) {
        
        
        
        $page_title          =  escape($_POST['page_title']);
        $page_content        =  $_POST['page_content'];
        $page_position           =  escape($_POST['page_position']);

        
        

        $page_title = mysqli_real_escape_string($connection, $page_title);

        
          $query = "UPDATE pages SET ";
          $query .="page_title  = '{$page_title}', ";
          $query .="page_position = '{$page_position}', ";
          $query .="page_content= '{$page_content}' ";
          $query .= "WHERE page_id = {$the_page_id} ";
        
        $update_page = mysqli_query($connection,$query);
        
        confirm($update_page);
        
        echo "<p class='bg-success'>Page Updated. <a href='../page.php?page_id={$the_page_id}'>View Page </a> or <a href='pages.php'>Edit More Pages</a></p>";
    
    }
?>


<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Page Title</label>
        <input value="<?php echo htmlspecialchars(stripslashes($page_title)); ?>" type="text" class="form-control"
            name="page_title">
    </div>



    <div class="form-group">
        <label for="page_position">Page Position</label>
        <input value="<?php echo $page_position; ?>" type="text" class="form-control" name="page_position">
    </div>

    <div class="form-group">
        <label for="page_content">Page Content</label>
        <textarea class="form-control " name="page_content" id="body" cols="30" rows="10"><?php echo $page_content; ?>
         
        
         </textarea>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Page">
    </div>


</form>