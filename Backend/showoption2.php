<?php

include "db_conn.php";
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING);


function input_test($data1)
{
    $data1 = trim($data1);
    $data1 = stripslashes($data1);
    $data1 = htmlspecialchars($data1);
    return $data1;
}

$city1 = input_test($_POST['selectedcity1']);




$sql4 = "SELECT s.schedule_id, s.starting_point, s.destination, s.schedule_date, s.departure_time, s.estimated_arrival_time, s.fare_amount, s.status, d.driver_name FROM `tbltravelschedule` as s INNER JOIN `tbldriver` as d on d.driver_id=s.driver_id
where starting_point= '$city1'";

$result4 = mysqli_query($conn, $sql4);




// while ($rows = mysqli_fetch_assoc($result4)) 



while ($row = mysqli_fetch_array($result4)) {

    echo ' <option> <td>' . $row['destination'] . '</td> </option> ';
}
