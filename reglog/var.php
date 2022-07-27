<?php
session_start();


$con = mysqli_connect('localhost','root');

mysqli_select_db($con, 'npcweb');

$email = $_POST['email'];
$pass = $_POST['pass'];

$q = "select * from studentinfo where email = '$email' && password = '$pass'";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if($num == 1){
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['logedin'] = true;
    header('location:../index2.php');

}
else{
    echo '<script type="text/javascript">';
    echo ' alert("Acount not found please create one first")';
    echo '</script>';
}
?>