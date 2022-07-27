<?php
// session_start();

$con = mysqli_connect('localhost','root');

mysqli_select_db($con, 'npcweb');

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$repass = $_POST['re_pass'];

$q = "select * from studentinfo where email = '$email'";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);



if($pass != $repass) {
    echo '<script type="text/javascript">';
    echo ' alert("Password error")';
    echo '</script>';
}
elseif(empty($name)){
    echo '<script type="text/javascript">';
    echo ' alert("Username field cant be empty ")';
    echo '</script>';
}
elseif(empty($email)){
    echo '<script type="text/javascript">';
    echo ' alert("Email field cant be empty")';
    echo '</script>';
}
elseif($num == 1){
    echo '<script type="text/javascript">';
    echo ' alert("Account exist")';
    echo '</script>';

}



else{
    $qy = " insert into studentinfo(username , email , password) values('$name' , '$email' , '$pass')";

    mysqli_query($con, $qy);
    header('location:signin.html');
   }
   
?>