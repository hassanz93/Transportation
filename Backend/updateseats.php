<?php

include "db_conn.php";
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING);

function input_test($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

 
 $status=$_POST['status'];
  
 $td=$_POST['td'];
$sql = "UPDATE tbltravelschedule SET status ='".$status."'  where schedule_id=$td ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
