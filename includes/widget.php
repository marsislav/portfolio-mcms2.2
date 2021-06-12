<div class="card card-body bg-light">
    <h4>Popular posts:</h4>
    <?php
                $query="SELECT * FROM posts ORDER BY post_views_count ASC LIMIT 5 ";
                $select_all_navigation_query=mysqli_query($connection, $query);
                while ($row=mysqli_fetch_assoc($select_all_navigation_query)) {
                  $post_title=$row['post_title'];
                  $post_id=$row['post_id'];
                  echo "<li><a href='post.php?p_id=$post_id'> {$post_title}</a></li>";
                }
                
              ?>
</div>