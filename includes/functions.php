<?php 
    function mainNavigation() {
        global $connection;
        $query = "SELECT * FROM pages WHERE page_position != '0' ORDER BY page_position ASC";
        $select_all_pages_query = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_all_pages_query)) {
            $page_title = $row['page_title'];
            $page_id = $row['page_id'];
            echo "<li class='nav-item'>
                    <a href='page.php?page_id=$page_id' class='nav-link'>{$page_title} </a><i></i>
                </li>";
                
                $url = "https://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI]; 
                $localhost = "https://marsislav.net/page.php?page_id=5";
                if ($url == $localhost){
                header( 'Location: https://marsislav.net/blog.php' );
                }
        }
    }          
