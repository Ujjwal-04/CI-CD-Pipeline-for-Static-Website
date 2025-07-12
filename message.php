<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "message";


$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); 
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = isset($_POST['FullName']) ? $_POST['FullName'] : '';
    $email = isset($_POST['Email']) ? $_POST['Email'] : '';
    $phoneno = isset($_POST['PhoneNumber']) ? $_POST['PhoneNumber'] : '';
    $sub = isset($_POST['Subject']) ? $_POST['Subject'] : '';
    $msg = isset($_POST['YourMessage']) ? $_POST['YourMessage'] : '';

    $sql = "INSERT INTO `msg` (`FullName`, `Email`, `PhoneNumber`, `Subject`, `YourMessage`) 
            VALUES ('$name', '$email', '$phoneno', '$$sub', '$msg')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Data submitted successfully.";
    } else {
        echo "Query failed: " . mysqli_error($conn); 
    }
}
?>
