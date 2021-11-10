<?php
ob_start();
$db['db_host'] ='localhost';
$db['db_user'] ='marsisl1_portfolio-mcms';
$db['db_password'] ='   ';
$db['db_name'] ='  ';



foreach ($db as $key=>$value) {
define (strtoupper($key),$value);
}
$connection=mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$connection) {
    die (mysqli_error($connection));
}

mysqli_set_charset($connection, "utf8");

 
?>