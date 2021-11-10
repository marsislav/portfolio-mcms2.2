<?php session_start();
  //header("Content-Type: text/html; charset=utf-8");

?>
<?php include "admin/functions.php"; ?>
<?php include "includes/functions.php"; ?>
<?php if (isset($_GET['page_id'])){
        $the_page_id=$_GET['page_id'];

      
         $query = "SELECT * FROM pages WHERE page_id = $the_page_id"; 
        $select_all_pages_query=mysqli_query($connection, $query);
        while ($row=mysqli_fetch_assoc($select_all_pages_query)) {
          $document_title=$row['page_title'] . " - Мирослав Костадинов (Marsislav)";
        }
    }
    else if (isset($_GET['p_id'])){
    
        $the_post_id = $_GET['p_id'];
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id"; 
        $select_all_posts_query=mysqli_query($connection, $query);
        while ($row=mysqli_fetch_assoc($select_all_posts_query)) {
          $document_title=$row['post_title'] . " - Мирослав Костадинов (Marsislav)";
        }
    
    }
    else {
      $document_title="Портфолио - Мирослав Костадинов (Marsislav)";
    }
          ?>
<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $document_title ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap-icons.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<?php if(isset($_SESSION['username']) && is_admin($_SESSION['username'])){
    echo "<div class='admin_tools'>
        <p>Admin tools!</p>
        <p><a href='admin' title='Go to Administration'><i class='bi bi-wrench'></i></a></p>";?>


    <?php if(isset($_GET['p_id'])) {

$the_post_id = $_GET['p_id'];

echo "<p><a href='admin/posts.php?source=edit_post&p_id={$the_post_id}' title='Edit post'><i class='bi bi-pencil-fill'></i></a></p>";

};?>

<?php if(isset($_GET['page_id'])) {

$the_page_id = $_GET['page_id'];

echo "<p><a href='admin/pages.php?source=edit_page&page_id={$the_page_id}' title='Edit page'><i class='bi bi-pencil-fill'></i></a></p>";

};?>


    <?php echo "<p><a href='includes/logout.php' title='Logout'><i class='bi bi-power'></i></a></p>";
        
    
    echo "</div>";}
    ?>
