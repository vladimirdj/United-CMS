<?php
session_start();
if ($_SESSION['user']){
$_SESSION['user'] = base64_decode($_GET['user']);

function uzmiUser(){
$get = file_get_contents('user.json');
$u = json_decode($get,true);

return $u ;
}

$u = uzmiUser();

$user_id='0';

foreach($u as $us){

if($_SESSION['user'] == $us['user']){


$ur = file_get_contents('settings.json');
$se = json_decode($ur,true);
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
<h2>Profile</h2>
</div>

<div class="container3">
<table class="responsive-table">

<thead>

<tr>

<th scope="col">Id</th>
<th scope="col">First name</th>
<th scope="col">Last name</th>
<th scope="col">User</a></th>
<th scope="col">Email</a></th>
<th scope="col">Role</th>
<th scope="col">Password</th>
<th scope="col">Action</th>


</tr>

</thead>


<tbody>
<tr>
<td data-title="user_id"><?php echo $us['user_id']; ?></td>
<td data-title="first_name"><?php echo $us['first_name']; ?></td>
<td data-title="last_name"><?php echo $us['last_name']; ?></td>
<td data-title="user"><?php echo $us['user']; ?></td>
<td data-title="email"><?php echo $us['email']; ?></td>
<td data-title="role"><?php echo $us['role']; ?></td>
<td data-title="password"><?php echo $us['password']; ?></td>
<td data-title="action">
<a href="e_u.php?user_id=<?php echo $user_id; ?>"><button class="btn-2">Edit acaunt</button></a>
<a href="d_u.php?user_id=<?php echo $user_id; ?>" onClick="return confirm('Delete ?')"><button class="btn-5">Delete acaunt</button></a>
<a href="logout.php"><button class="btn-3">Logout</button></a>
</td>

<?php      $user_id++; ?>
</tbody>

</table>
</div>
<br>
<div align="center">
<h2>Blog</h2>
</div>

<div class="container3">
<table class="responsive-table">

<thead>

<tr>

<th scope="col">Id</th>
<th scope="col">Title</th>
<th scope="col">Subcet</th>
<th scope="col">Date</a></th>

<th scope="col">Action</th>


</tr>

</thead>


<tbody>
<?php

function uzmiBlog(){

$gets = file_get_contents('blog.json');

$bl = json_decode($gets,true);

return $bl ;

}

$bl = uzmiBlog();

$id='0';
foreach($bl as $us2) {
if($_SESSION['user'] == $us2['user']){


?>
<tr>
<td data-title="id"><?php echo $us2['id']; ?></td>
<td data-title="title"><?php echo  $us2['title']; ?></td>
<td data-title="subject"><?php echo $us2['subject']; ?></td>
<td data-title="date"><?php echo $us2['date']; ?></td>

<td data-title="action">

<a href="e_b.php?id=<?php echo $id; ?>"  style="margin-left: auto;" class="link-unstyled" title="Make a change"><i class="fa fa-pencil"></i></a>

<a href="d_b.php?id=<?php echo $id; ?>"  style="margin-left: auto;" class="link-unstyled" title="Make a change"><i class="fa fa-trash"></i></a>

</td>

<?php
$id++;
};
}

?>


</tbody>

</table>
</div>
</div>
</div>
<br><br>


<div class="footer">
Copyright @ <?php echo $se['footer']; ?>
<?php echo date("Y");?>. All Rights Reserved.
</div>
<?php }

} }

} else {
echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
}

?>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/united.js"></script>
</script>
</body>
</htm>
