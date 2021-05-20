<?php
session_start();
function getUser(){
$get = file_get_contents('user.json');
$u = json_decode($get,true);

return $u ;
}

$u =  getUser();


foreach($u  as $row){
$_SESSION['user'] =$row['user'];
}
$u = file_get_contents('settings.json');
$se = json_decode($u,true);
foreach($se  as $se)  {
?>
<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="UTF-8">
<title><?php echo $se['title']; ?></title>
<link rel="shortcut icon" href="http://www.sensationenergy.com/favicon.ico" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/united.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
.raspon_1_of_2{
width: 33.4%;
}
</style>
</head>
<body>

<div class="zaglavlje">
<!--  <div class="vl7"> -->
<h1>Welcome to <?php echo $se['title']; ?></h1>

<h2><?php echo $se['slogan']; ?></h2>
</div>
<nav class="gornji_meni">
<a href="#" class="toggle"><i class="fa fa-reorder"></i></a>
<div class="left">
<a href="index.php"  class="link">Login</a>
<a href="home.php"  class="link">Home</a>
<a href="admin/index.php"  class="link">Admin</a>


</div>
<div class="right">
<a href="profile/<?php echo $_SESSION['user']; ?>"  class="link">User:<?php echo $_SESSION['user']; ?></a>

</div>
</nav>
<br>

<div class="card">
<?php

function getBlog(){
$get = file_get_contents('blog.json');
$blog = json_decode($get,true);
return $blog;
}
$category = getBlog();
foreach($category  as $c){
if(isset($_GET['cat_id'])){
$cat_id = $_GET['cat_id'];
}
if ($c['cat_id'] == $cat_id){
$c = $c;
?>
<div align="center">
<h1>Category</h1>
</div>
<div class="card">

<h2><?php echo $c['title']; ?></h2>
<h2><?php echo $c['user']; ?></h2>
<h2><?php echo $c['subject']; ?></h2>
<h2><?php echo $c['date']; ?></h2>

<hr>
<?php
}
};
?>
</div>
</div>
<br>

<div class="footer">
Copyright @ <?php echo $se['footer']; ?>
<?php echo date("Y");?>. All Rights Reserved.
</div>
<?php } ?>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/united.js"></script>
</body>
</htm>
