<?php
date_default_timezone_set("Africa/Lagos");
define('DB_SERVER','us-cdbr-east-04.cleardb.com');
define('DB_USER','b345957a8898cc');
define('DB_PASS' ,'7b490f5e');
define('DB_NAME', 'heroku_940356f50cac20e');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>