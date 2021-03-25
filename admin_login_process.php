<?php
session_start();
require_once("connection.php");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM car_adminlogin WHERE username = '$username'";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

if($query->num_rows == 0){
    echo "<script type='text/javascript'>alert('Please fill username & password!')</script>";
    echo "<script language='javascript' type='text/javascript'> location.href='admin_login.php' </script>";
}else if($username <> $result['username'] || $password <> $result['password']){
    echo "<script type='text/javascript'>alert('Wrong username/password!')</script>";
    echo "<script language='javascript' type='text/javascript'> location.href='admin_login.php' </script>";
}else{
    $_SESSION['username'] = $result['username'];
    echo "<script language='javascript' type='text/javascript'> location.href='admin_add.php' </script>";
}
?>
