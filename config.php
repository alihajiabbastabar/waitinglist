<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'mjanir_watingu_bnvt7');
define('DB_PASSWORD', '9c7EHhiK');
define('DB_NAME', 'mjanir_wating_zxc3');

// Connect MySQL
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Test connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>