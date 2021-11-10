<?php 
    if (isset($_POST['create_post'])){
        $post_title=$_POST['title'];
        $post_author=$_POST['author'];
        $post_category_id=$_POST['post_category'];
        $post_status=$_POST['post_status'];
        $post_image=$_FILES['image']['name'];
        $post_image_temp=$_FILES['image']['tmp_name'];
        $post_tags=$_POST['post_tags'];
        $post_content=$_POST['post_content'];
        $post_date=date('d-m-y');
        //$post_comment_count=555;

        move_uploaded_file($post_image_temp,"../img/$post_image");
        $query="INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
        $query.="VALUES({$post_category_id},'{$post_title}', '{$post_author}', now(), '{$post_image}','{$post_content}', '{$post_tags}', '{$post_status}')";
$connection->set_charset("utf8");
        $create_post_query=mysqli_query($connection, $query);
        
        confirm($create_post_query, 'set names utf8');
        //pull out last created id :
        $the_post_id=mysqli_insert_id($connection);
        echo "<p class='bg-success'>Статията е създадена. <a href='../post.php?p_id={$the_post_id}' target='_blank'>Преглед </a> ИЛИ <a href='posts.php'>редактиране на други статии?</a></p>";
    }
?>

<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Заглавие</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="category">Категория</label>
        <select name="post_category" id="">

            <?php

        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection,$query);
        
        confirm($select_categories);


        while($row = mysqli_fetch_assoc($select_categories )) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
            
            
            echo "<option value='$cat_id'>{$cat_title}</option>";
         
            
        }

?>


        </select>

    </div>


    <div class="form-group">
        <label for="author">Автор</label>
        <select name="author" id="post_author">
            <?php
            $query="SELECT * FROM users";
            $select_users=mysqli_query($connection, $query);
            confirm($select_users);
            while ($row=mysqli_fetch_assoc($select_users)) {
                $author_id=$row['user_id'];
                $author_username=$row['username'];
                echo "<option value='{$author_username}'>{$author_username}</option>";
            }
        ?>
        </select>
    </div>
    <!-- <div class="form-group">
        <label for="users">Post Author</label>
        <select name="post_user" id="">

            <?php

        //$users_query = "SELECT * FROM users";
        //$select_users = mysqli_query($connection,$users_query);
        
        //confirm($select_users);


       // while($row = mysqli_fetch_assoc($select_users)) {
       // $user_id = $row['user_id'];
       // $username = $row['username'];
            
            
           // echo "<option value='{$username}'>{$username}</option>";
         
            
        //}

?>


        </select>

    </div>-->





    <!-- <div class="form-group">
         <label for="title">Post Author</label>
          <input type="text" class="form-control" name="author">
      </div> -->



    <div class="form-group">
        <select name="post_status" id="">
            <option value="draft">Състояние</option>
            <option value="published">Публикувана</option>
            <option value="draft">Чернова</option>
        </select>
    </div>



    <div class="form-group">
        <label for="post_image">Заглавна снимка</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Етикети</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Съдържание</label>
        <textarea class="form-control " name="post_content" id="body" cols="30" rows="10">
         </textarea>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Публикуване">
    </div>


</form>