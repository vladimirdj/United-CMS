<?php
session_start();

base64_decode($_SESSION['user']) == $_SESSION['user'];
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

<h1>Welcome to United Cms</h1>

<h2>Add blog</h2>
</div>
<nav class="gornji_meni">
<a href="#" class="toggle"><i class="fa fa-reorder"></i></a>
<div class="left">
<a href="index.php"  class="link">Home</a>
<a href="admin/index.php"  class="link">Admin</a>


</div>
<div class="right">
<a href="user.php?user=<?php echo base64_encode($_SESSION['user']) ?>"  class="link">User:<?php echo $_SESSION['user']; ?></a>

</div>
</nav>
<br>

<div class="card">
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>S. E. T. Fuction 7 JSON v2 Add</title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link rel="shortcut icon" href="http://www.sensationenergy.com/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="css/united.css">

<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<?php
require_once 'fun_blog.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
$jsonUsers = getBlog();

while(true){
$check = true;
$random=rand(1,2000);
foreach($jsonUsers as $i=>$osoba){
if($jsonUsers[$i]['id']==$random){
$check=false;
break;
}
}
if($check) break;
}


$id=$random;


$data['id']=$id;
$data['cat_id']=$_POST['cat_id'];
$data['user']=$_POST["user"];
$data['title']=$_POST['title'];
$data['subject']=$_POST['subject'];
$data['date']=$_POST['date'];


//  $data['extension'] = $extension;

$jsonUsers[sizeof($jsonUsers)] = $data;


addBlog($jsonUsers);


header("Location: index.php");
}
?>
<?php


?>
<form action="" method="post">

<br>

<div class="form-group">
<input type="hidden" id="user" class="form-input" name="user" value="<?php echo $_SESSION["user"];?>">
</div>
<div class="form-group">
<label for="title">Title:</label>
<input type="text" name="title" class="form-input" />
</div>
<br>

<br>

<div class="form-group">
<label for="subject">Subject:</label>
<textarea type="text" name="subject" class="form-input"></textarea>
</div>
<br>
<div class="form-group">
<label for="datr">Date</label>
<input type="date" name="date" class="form-input">

</div>
<br>
<div class="form-group">
<label for="cat_id">Categoty</label>
<div>
<select name="cat_id" id="cat_id" class="form-input">
<?php

$uzmi = file_get_contents('category.json');
$test = json_decode($uzmi,true);


foreach($test  as $vlada){

echo "<option value='$vlada[cat_id]'>$vlada[cat_title]</option>";

}
?>
</select>
</div>
</div>
<br>
<div class="btn-group">
<button type="submit" class="btn-3" >POST</button>
<input type="button" class="btn-2" onclick="location.href='index.php';" value="Cancel" />
</div>
</form>
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
