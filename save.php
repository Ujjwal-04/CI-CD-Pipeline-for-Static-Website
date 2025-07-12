<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); 
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = isset($_POST['username']) ? $_POST['username'] : '';
    $phoneno = isset($_POST['phone']) ? $_POST['phone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';
    $cpassword = isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : '';

    $sql = "INSERT INTO `user` (`username`, `phone no`, `email`, `password`, `confirmpassword`) 
            VALUES ('$name', '$phoneno', '$email', '$pass', '$cpassword')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Data submitted successfully.";
    } else {
        echo "Query failed: " . mysqli_error($conn); 
    }
}
?>
