<div>
    <h4 class="popularPosts">Популярни статии в блога:</h4>
    <ul>
    <?php
                $query="SELECT * FROM posts ORDER BY post_views_count ASC LIMIT 5 ";
                $select_all_navigation_query=mysqli_query($connection, $query);
                while ($row=mysqli_fetch_assoc($select_all_navigation_query)) {
                  $post_title=$row['post_title'];
                  $post_id=$row['post_id'];
                  echo "<li class='marginBtw'><a href='post.php?p_id=$post_id'> {$post_title}</a></li>";
                }
                
              ?>
    </ul>
</div>