<?php
//checkbox
if (isset($_POST['checkBoxAray'])) {
    foreach ($_POST['checkBoxAray'] as $pageValueId) {
         $bulk_options= $_POST['bulk_options'];
         switch ($bulk_options) {
        case 'delete':
            $query= "DELETE FROM pages WHERE page_id = {$pageValueId} ";
            $update_to_delete_status=mysqli_query($connection, $query);
            confirm($update_to_delete_status);
            break;
         } 
    }
}
?>
<form action="" method='post'>
    <table class="table table-bordered table-hover">
        <div id="bulkOptionsContainer" class="col-xs-4">
            <select name="bulk_options" id="bulk" class="form-control">
                <option value="">Bulk actions..</option>
                <option value="delete">Delete</option>
            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" name="bulk" class="btn btn-success" value="Apply">
            <a href="pages.php?source=add_page" class='btn btn-primary'>Add New</a>
        </div>
        <thead>
            <tr>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                <th>Id</th>

                <th>Position in navigation</th>
                <th>Title</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    $query="SELECT * FROM pages ORDER BY page_position ASC";
                    $select_pages=mysqli_query($connection, $query);
                    while ($row=mysqli_fetch_assoc($select_pages)) {
                    $page_id=$row['page_id'];
                    $page_position=$row['page_position'];
                    $page_title=$row['page_title'];
                    

                    echo "<tr>"; ?>
            <td><input class='checkBoxes' type='checkbox' name='checkBoxAray[]' value='<?php echo $page_id;?>'></td>
            <?php
                    echo "<td>{$page_id}</td>";
                    echo "<td>{$page_position}</td>";
                    echo "<td>{$page_title}</td>";
                    
                    echo "<td><a href='../page.php?source&page_id={$page_id}' target='_blank'>View Page</a></td>";
                    echo "<td><a href='pages.php?source=edit_page&page_id={$page_id}'>Edit</a></td>";?>
                    <form method="post">
                        <input type="hidden" name="page_id" value="<?php echo $page_id ?>">
                            <?php   
                                echo '<td><input class="btn btn-danger" type="submit" name="delete" value="Delete"></td>';
                                ?>
                    </form>
                    <?php
                        echo "</tr>";
                    }
                    ?>
        </tbody>
    </table>
</form>
<?php
    if(isset($_POST['delete'])){
    
        $the_page_id = escape($_POST['page_id']);
        
        $query = "DELETE FROM pages WHERE page_id = {$the_page_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: /admin/pages.php");
        confirm($delete_query);
    }



/*
if (isset($_GET['delete'])){
                    $the_page_id=$_GET['delete'];
                    $query="DELETE FROM pages WHERE page_id={$the_page_id}";
                    $delete_query=mysqli_query($connection,$query);
                    confirm($delete_query);
                }; */
?>