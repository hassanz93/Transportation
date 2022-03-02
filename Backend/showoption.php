<?php
include "db_conn.php";
$sql3 = "SELECT distinct starting_point FROM `tbltravelschedule` ";
$result3 = mysqli_query($conn, $sql3);
$row = mysqli_fetch_all($result3, MYSQLI_ASSOC);

exit(json_encode($row));
