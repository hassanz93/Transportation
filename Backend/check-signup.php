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

$signupemail = input_test($_POST['signupemail']);
$signuppassword = input_test($_POST['signuppassword']);
$re_password = input_test($_POST['re_password']);
$name = input_test($_POST['name']);
$username = input_test($_POST['username']);
$phone = input_test($_POST['phone']);



if (empty($signupemail)) {
    echo '<p>Email is required</p>';;
} else if (!filter_var($signupemail, FILTER_VALIDATE_EMAIL)) {
    echo ("<p>Invalid email format</p>");
}
//strong password


else if (empty($signuppassword)) {
    echo ("<p>Password is required</p>");;
}
$uppercase = preg_match('@[A-Z]@', $signuppassword);
$lowercase = preg_match('@[a-z]@', $signuppassword);
$number    = preg_match('@[0-9]@', $signuppassword);
$specialChars = preg_match('@[^\w]@', $signuppassword);

if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($signuppassword) < 8) {
    echo ("<p>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p>");;
} else if (empty($re_password)) {
    echo ("<p>Re Password is required</p>");;
} else if (empty($name)) {
    echo ("<p>Name is required</p>");;
} else if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
    echo ("<p>Only letters and white space allowed in Name</p>");
} else if ($signuppassword !== $re_password) {
    echo ("<p>The confirmation password  does not match</p>");;
} else if (empty($username)) {
    echo ("<p>UserName is required</p>");;
} else if (empty($phone)) {
    echo ("<p>Phone number is required</p>");
} else {

    // distinct username
    $sql4 = "SELECT * FROM tbluser WHERE phone='$phone' ";
    $result4 = mysqli_query($conn, $sql4);

    if (mysqli_num_rows($result4) > 0 /* or =1 */) {
        echo ("<p>Phone number already exists</p>");;
    }




    // distinct username
    $sql3 = "SELECT * FROM tbluser WHERE username='$username' ";
    $result3 = mysqli_query($conn, $sql3);

    if (mysqli_num_rows($result3) > 0 /* or =1 */) {
        echo ("<p>Username already exists</p>");;
    } else {

        // hashing the password

        // distinct email
        $sql = "SELECT * FROM tbluser WHERE email='$signupemail' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0 /* or =1 */) {
            echo ("<p>Email already exists</p>");
        } else {
            $sql2 = "INSERT INTO tbluser (email, password, name, username, phone, Role) VALUES('$signupemail', '$signuppassword', '$name', '$username', '$phone', 'user')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {


                session_start();
                $_SESSION['email'] = $signupemail;
                $_SESSION['name'] = $name;

                $_SESSION['username'] = $username;
                $_SESSION['phone'] = $phone;
                $_SESSION['role'] = $Role;


                echo ("Location: ../html/main.php");
            } else {
                echo ("unknown error occurred");;
            }
        }
    }
}
	
// }else{
// 	echo("Location: ../html/signup.php");
// 	;
// }