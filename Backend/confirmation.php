<?php
include "db_conn.php";
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING);

function input_test($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$td = input_test($_POST['td']);
$seats = $_POST['seats'];
$sql3 = "SELECT schedule_id, starting_point, destination, schedule_date, departure_time, estimated_arrival_time, fare_amount, status FROM `tbltravelschedule`  where schedule_id=$td ";
$result3 = mysqli_query($conn, $sql3);
while ($row = mysqli_fetch_array($result3)) {
    $pr = $row['fare_amount'];
    $stts = $row['status'];
    echo ' <div class="modal-body">';
    echo ' <div class="form-group col-lg-8">    <input type="number" required class="form-control seats" name="seats" id="seats" placeholder="Number of seats" min=1 max=' . $row['status'] . ' >';
    echo '    </div> ';



    echo ' <div class="pay-wrapper">
                 ';
    echo ' <div class="bill">
      
      ';
    echo ' <div class="bill-cell">
 
 ';
    echo ' <div class="bill-item">
 
 ';
    echo ' <div class="bill-unit">
 
 ';
    echo ' Date :';
    echo '  <span>' . $row['schedule_date'] . '</span>';
    echo '     </div>';

    echo '     </div>';
    echo ' <div class="bill-item">
 
 ';
    echo ' <div class="bill-unit">
 
 ';
    echo '   Time :';
    echo '  <span>' . $row['departure_time'] . '</span>';
    echo '     </div>';
    echo '     </div>';

    echo ' <div class="bill-item">
 
 ';
    echo ' <div class="bill-unit">
 
 ';
    echo ' From :';
    echo '  <span>' . $row['starting_point'] . '</span>';
    echo '     </div>';

    echo '     </div>';
    echo ' <div class="bill-item ">
';
    echo ' <div class="bill-unit">
 
 ';
    echo ' To :';
    echo '  <span>' . $row['destination'] . '</span>';
    echo '     </div>';
    echo '     </div>';

    echo ' <div class="bill-item total-price"> ';
    echo ' <div class="bill-unit"> ';

    echo '  Price : ';

    echo '   <span class="price">' . $row['fare_amount'] . '$
                            </span> ';
    echo '     </div>';
    echo '     </div>';


    echo ' <div class="bill-item" id="demo0"   style="display: none; color:#528cf7 ">
 
                     ';
    echo ' <div class="bill-unit" style="margin-right:0.5rem" >
                     
                     ';
    echo '  Seats :';
    echo '  <span id="demo1"></span>';
    echo '     </div>';
    echo ' <div class="bill-unit"  >';
    echo '  Total Price :';
    echo '  <span id="demo3"></span>';
    echo '     </div>';




    ';                           
                     ';



    echo '     </div>';
    echo '     </div>';
    echo '     </div>';
    echo '     </div>';
    echo '     </div>';

    echo '   <div class="modal-footer"> ';
    echo '    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
    echo ' <button type="button" class="btn btn-primary" onclick="addseats(this)">Confirm</button> ';
    echo ' </div>  ';
}
?>

<script>
    function addseats(e) {
        var seats = $(".seats").val();
        console.log(seats);

        var price = '<?= $pr ?>';
        console.log(price);

        var tot = '<?= $pr ?>' * seats;
        console.log(tot);

        document.getElementById("demo0").style.display = "flex";
        document.getElementById("demo0").style.justifyContent = "center";
        $("#demo1").html(seats);

        $("#demo3").html(tot + "$");

        var status = '<?= $stts ?>' - seats;
        console.log(status);
        var td = '<?= $td ?>';
        $.ajax({
            type: "POST",
            url: "../back-end/updateseats.php",
            data: {
                status: status,
                td: td
            },
        }).done(function(data) {
            setTimeout(() => {
                document.location.reload();
            }, 2500);

        });
    }
</script>