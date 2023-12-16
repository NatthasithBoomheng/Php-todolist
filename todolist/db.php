<?php
$hostname = '127.0.0.1';
$username = 'root';
$password = 'mix12345';
$database = 'todo';
$port = 3306;

mysqli_report(MYSQLI_REPORT_OFF);
$connection = mysqli_connect($hostname,$username,$password,$database,$port);
 if (!$connection) {
     echo "ไม่รอด";
}
 else {
}

?>
