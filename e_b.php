<?php
session_start();


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

<h1>Welcome to <?php echo $se['title']; ?></h1>

<h2><?php echo $se['slogan']; ?></h2>
</div>
<nav class="gornji_meni">
<a href="#" class="toggle"><i class="fa fa-reorder"></i></a>
<div class="left">
<a href="home.php"  class="link">Home</a>
<a href="admin/index.php"  class="link">Admin</a>


</div>
<div class="right">

<a href="user.php?user=<?php echo base64_encode($_SESSION['user']) ?>"  class="link">User:<?php echo $_SESSION['user']; ?></a>

</div>
</nav>
<br>
<br>
<div align="center">
<h2>Edit blog</h2>
</div>
<br>
<?php

$id = $_GET['id'];

$data = file_get_contents('blog.json');
$data_array= json_decode($data);

$row = $data_array[$id];
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="title"><h2>Title</h2></label>
<input type="text" class="form-input" name="title" value="<?php echo $row->title; ?>">
</div>
<div class="form-group">
<label for="subject"><h2>Subject</h2></label>
<input type="text" class="form-input" name="subject" value="<?php echo $row->subject; ?>">
</div>
<div class="form-group">
<input type="hidden" id="id" class="form-input" name="id"   value="<?php echo $row->id; ?>">
<input type="hidden" id="user" class="form-input" name="user"   value="<?php echo $row->user; ?>">
<input type="hidden" id="cat_id" class="form-input" name="cat_id"   value="<?php echo $row->cat_id; ?>">
<input type="hidden" id="title" class="form-input" name="date"   value="<?php echo $row->date; ?>">

</div>
<br>
<div align="center">

<input type="submit" class="btn-2" name="save" value="Edit Post">
</div>
</div>
</form>
<?php
if(isset($_POST['save'])){

$input = array(
'id' => $_POST['id'],
'title' => $_POST['title'],
'subject' => $_POST['subject'],
'date' => $_POST['date'],
'cat_id' => $_POST['cat_id'],
'user' => $_POST['user']
);

$data_array[$id] = $input;

$data_array = array_values($data_array);

$data = json_encode($data_array, JSON_PRETTY_PRINT);
file_put_contents('blog.json', $data);

header('Location:user.php?user='.base64_encode($_SESSION['user']));
}
?>
<br>
<div class="footer">
Copyright @ <?php echo $se['footer']; ?>
<?php echo date("Y");?>. All Rights Reserved.
</div>
<?php } ?>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/moj.js"></script>
</body>
</htm>
