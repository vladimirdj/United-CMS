<?php
session_start();

if (isset($_POST['prijava'])) {
$user = $_POST['user'];
$password = $_POST['password'];

function getUser(){

$uzmi = file_get_contents('user.json');
$u = json_decode($uzmi,true);

return $u;
}
$u  = getUser();

foreach($u  as $us){

if($user!=$_SESSION['user']){
header('location:index.php');
}
$_SESSION['user']=$us['user'];
$role=$us['role'];

if (($user == $us['user']) AND ($password == $us['password']) AND ($role == $us['role'])){
if($role=='admin'){
header('location:admin/index.php');
}else if($role=='user'){
header('Location:user.php?user='.base64_encode($_SESSION['user']));
}
}
}
}
?>
