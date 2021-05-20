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
<h2>Edit profile</h2>
</div>
<br>
<?php


$user_id = $_GET['user_id'];

$data = file_get_contents('user.json');
$data_array= json_decode($data);


$row = $data_array[$user_id];

?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="first_name"><h2>First name</h2></label>
<input type="text" class="form-input" name="first_name" value="<?php echo $row->first_name; ?>">
</div>
<div class="form-group">
<label for="last_name"><h2>Last name</h2></label>
<input type="text" class="form-input" name="last_name" value="<?php echo $row->last_name; ?>">
</div>
<div class="form-group">
<label for="user"><h2>User</h2></label>
<input type="text" id="user" class="form-input" name="user"   value="<?php echo $row->user; ?>">

</div>

<div class="form-group">
<label for="email"><h2>Email</h2></label>
<input type="text" id="email" class="form-input" name="email"   value="<?php echo $row->email; ?>">

</div>
<div class="form-group">
<label for="password"><h2>Password</h2></label>
<input type="password" id="password" class="form-input" name="password"   value="<?php echo $row->password; ?>">

</div>
<div class="form-group">
<input type="hidden" id="user" class="form-input" name="user_id"   value="<?php echo $row->user_id; ?>">
<input type="hidden" id="role" class="form-input" name="role"   value="<?php echo $row->role; ?>">
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
'first_name' => $_POST['first_name'],
'last_name' => $_POST['last_name'],
'user' => $_POST['user'],
'role' => $_POST['role'],
'email' => $_POST['email'],
'user_id' => $_POST['user_id'],
'password' => $_POST['password']
);

$data_array[$user_id] = $input;

$data_array = array_values($data_array);

$data = json_encode($data_array, JSON_PRETTY_PRINT);
file_put_contents('user.json', $data);

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
<script  src="js/united.js"></script>
</body>
</htm>
