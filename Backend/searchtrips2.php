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

// $city1 = input_test($_POST['selectedcity1']);
$city2 = input_test($_POST['selectedcity2']);




$sql4 = "SELECT  s.schedule_id, s.starting_point, s.destination, s.schedule_date, s.departure_time, s.estimated_arrival_time, s.fare_amount, s.status, d.driver_name FROM `tbltravelschedule` as s INNER JOIN `tbldriver` as d on d.driver_id=s.driver_id
where destination= '$city2'";

$result4 = mysqli_query($conn, $sql4);




// while ($rows = mysqli_fetch_assoc($result4)) 



while ($row = mysqli_fetch_array($result4)) {


    //  echo "<tr data-toggle='collapse'data-target='#collapseOne' aria-expanded='false' aria-controls='collapseOne' class='collapsed'>";
    echo "<tr data-toggle='collapse'data-target=' #collapseOne' aria-expanded='false' aria-controls='collapseOne' class='collapsed'>";
    echo "<th scope='row'>" . $row['schedule_id'] . "</th>";
    echo "<td>" . $row['starting_point'] . "</td>";
    echo "<td>" . $row['destination'] . "</td>";
    echo "<td>" . $row['schedule_date'] . "</td>";
    echo "<td>" . $row['departure_time'] . "</td>";
    echo "<td>" . $row['fare_amount'] . "$</td>";

    echo "<td ><span style='color:#3f3f3f;font-weight: bold; background-color:rgb(255, 255, 117); border-radius: 5px; width:5rem; padding: 1rem;'>" . $row['status'] . " seats available</span> </td>";

    echo '   <td> <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal" onclick="book(this)"  id="book"  >Book Now</a></td> </tr>';
    echo '  <div class="modal" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
    echo '    <div class="modal-dialog  modal-dialog-centered "  role="document">';
    echo '      <div class="modal-content ">';
    echo '       <div class="modal-header border-bottom-0">';
    echo '    <h4 class="modal-title" id="myModalLabel">Confirmation Check</h4>';
    echo '         <button type="button" class="close" data-dismiss="modal" aria-label="Close">';
    echo '          <span aria-hidden="true">&times;</span>';
    echo '       </button>';
    echo '       </div>';
    echo '      <div id="demo"></div>';
    echo '      </div>';
    echo '     </div>';
    echo '     </div>';



    echo "<tr>";
    echo "<td colspan='8' id='collapseOne' class='collapse acc' data-parent='#accordion' >";
    echo "<div class='listInfo' >											";
    echo "<div class='Timeline' >";

    echo "<svg height='5' width='50'>";
    echo "<line x1='0' y1='0' x2='200' y2='0' style='stroke:#3f3f3f ;stroke-width:4' />";
    // Sorry, your browser does not support inline SVG.
    echo "</svg>";

    echo "<div class='event1'>";

    echo "<div class='event1Bubble'>";
    echo "<div class='eventTime'>";
    echo "<div class='DayDigit'>" . $row['departure_time'] . "</div>													  ";
    echo "</div>";
    echo "</div>";
    echo "<svg height='20' width='20'>";
    echo "<circle cx='10' cy='11' r='4' fill='#528cf7 ' />";
    echo "</svg>";
    echo "<div class='time1'>" . $row['starting_point'] . "</div>";

    echo "</div>";

    echo "<svg height='5' width='300'>";
    echo "<line x1='0' y1='0' x2='300' y2='0' style='stroke:#3f3f3f ;stroke-width:4' />";
    // Sorry, your browser does not support inline SVG.
    echo "</svg>";

    echo "<div class='event2'>";

    echo "<div class='event2Bubble'>";
    echo "<div class='eventTime'>";
    echo "<div class='DayDigit'>" . $row['estimated_arrival_time'] . "</div>													  ";
    echo "</div>";
    echo "</div>";
    echo "<svg height='20' width='20'>";
    echo "<circle cx='10' cy='11' r='4' fill='#528cf7' />";
    "</svg>";
    echo "<div class='time2'>" . $row['destination'] . "</div>";
    echo "</div>";

    echo "<svg height='5' width='50'>";
    echo "<line x1='0' y1='0' x2='50' y2='0' style='stroke:#3f3f3f ;stroke-width:4' />";
    // Sorry, your browser does not support inline SVG.
    echo " </svg>";
    echo " </div>";

    echo "<div class='iconClass'> ";
    echo "<div class='iconFlex'><span class='iconify' data-icon='mdi:air-conditioner'  data-width='25' data-height='25' style='color:#3f3f3f'></span></div>";
    echo "<div class='iconFlex'><span class='iconify' data-icon='akar-icons:wifi' data-width='25' data-height='25' style='color:#3f3f3f'></span></div>";
    echo "<div class='iconFlex'><span class='iconify' data-icon='dashicons:food' data-width='25' data-height='25' style='color:#3f3f3f''></span></div>";
    echo "<div class='iconFlex'><span class='iconify' data-icon='ic:baseline-airline-seat-recline-normal' data-width='25' data-height='25' style='color:#3f3f3f'></span></div>";
    echo "<div><span class='iconify' id='locationPath' onclick='myFunction()' data-icon='logos:google-maps' data-width='25' data-height='25' style='margin-top: 1em;'></span><br><span style='color:rgb(63, 63, 63)  ; position: relative;top: 5px;'>Click To Show Path</span></div>	";
    echo "</div>";
    echo "<div class='driverProfile'>";
    echo "<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'>";
    echo "<div class='container'>";
    echo "<div class='row'>   ";
    echo "<div class='col-md-4 driver'>";
    echo "<div class='card user-card'>";
    echo "<div class='card-header'>";
    echo "<h5>Driver's Profile</h5>";
    echo "</div>";
    echo "<div class='card-block'>";
    echo "<div class='user-image'>";
    echo "<img src='https://bootdey.com/img/Content/avatar/avatar6.png' class='img-radius' alt='User-Profile-Image'>";
    echo "</div>";
    echo "<h6 class='f-w-600 m-t-25 m-b-10'>" . $row['driver_name'] . "</h6>";
    echo "<p class='text-muted'>Active | Male | Born 23.05.1992</p>";
    echo "<p class='text-muted m-t-15'>Activity Level: 87%</p>";
    echo "<ul class='list-unstyled activity-leval'>";
    echo "<li class='active'></li>";
    echo "<li class='active'></li>";
    echo "<li class='active'></li>";
    echo "<li></li>";
    echo "<li></li>";
    echo "</ul>";
    echo "<div class='row justify-content-center user-social-link'>";
    echo "<div class='col-auto'><a href='#!'><i class='fa fa-facebook text-facebook'></i></a></div>";
    echo "<div class='col-auto'><a href='#!'><i class='fa fa-twitter text-twitter'></i></a></div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</td>";
    echo "</td>";
    echo "</tr>";
}

?>


<script>
    function book(e) {
        var td = e.closest('td').parentNode.children[0].innerHTML;
        console.log(td);
        $.ajax({

            type: "POST",
            url: "../back-end/confirmation.php",
            data: {
                td: td
            },
        }).done(function(data) {

            console.log(data);
            $("#demo").html(data);
        });
    };
</script>