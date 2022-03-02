<?php
include "db_conn.php";
$sql3 = "SELECT s.schedule_id, s.starting_point, s.destination, s.schedule_date, s.departure_time, s.estimated_arrival_time, s.fare_amount, s.status, d.driver_name FROM `tbltravelschedule` as s INNER JOIN `tbldriver` as d on d.driver_id=s.driver_id";
$result3 = mysqli_query($conn, $sql3);
$row = mysqli_fetch_all($result3, MYSQLI_ASSOC);

exit(json_encode($row));
