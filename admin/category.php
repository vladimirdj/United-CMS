<?php
session_start();
if ($_SESSION['user']){
function uzmiUser(){
$get = file_get_contents('../user.json');
$u = json_decode($get,true);

return $u ;
}

$u = uzmiUser();


foreach($u  as $us){
if($_SESSION['user'] == $us['user']){
if (($_SESSION['user']== $us['user']) AND ($us['role'] == 'admin')){

$ur = file_get_contents('../settings.json');
$se = json_decode($ur,true);
foreach($se  as $se)  {
?>
<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="UTF-8">
<title><?php echo $se['title']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/united.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<style>
body {
margin: 0;
padding: 0;

max-width:  100%;
}
@media screen and (min-width: 550px) {

body {
margin-left: 200px;

}
body.non-margin {
margin-left: 0px !important;
}
.klizac {
z-index: 10;
width: 200px;
}
.klizac.aktivan {
width: 0px;
}

}


</style>
</head>
<body>

<div class="klizac">
<div class="logo">
<div align="center">
<h2><?php echo $se['title']; ?></h2>
</div>
</div>
<hr>
<div align="center">
<h2>  User:  <?php echo $_SESSION['user']; ?></h2>
<a href="../izlaz.php">Logout</a>
</div>
<hr>

<div align="center">
<h2>Menu</h2>
</div>
<hr>
<div align="card">
<div align="center">
<a href="users.php"><button class="btn-3">User</button></a>
<br><br><hr>
<a href="blog.php"><button class="btn-4">Blog</button></a>
<br><br><hr>
<a href="category.php"><button class="btn-5">Category</button></a>
<br><br><hr>
<a href="settings.php"><button class="btn-2">Settings</button></a>
<br><br><hr>
</div>
</div>
</div>




<button class="dugme">
<i class="fa fa-bars"></i>
</button>


<div clas="telo">
<header>

<nav class="gornji_meni">
<a href="#" class="toggle"><i class="fa fa-reorder"></i></a>
<div class="left">
<a href="index.php" class="link">Home</a>
<a href="../home.php" class="link">Website</a>


</div>

</nav>

</div>
</header>
<br> <br> <br>
<div align="center">
<h1><?php echo $se['title']; ?></h1>
<h2>Admin - Category</h2>

<br>
</div>
<br>
<div align="center">
<a href="a_c.php"><button class="btn-6">Add category</button></a>
</div>
</div>
<div class="container3">
<table class="responsive-table">

<thead>

<tr>

<th scope="col">Cat id</th>
<th scope="col">Cat title</th>
<th scope="col">User</th>
<th scope="col">Actiona</th>
</tr>

</thead>


<tbody>
<?php
require_once 'fun_cat.php';


$category = getCat();
$cat_id='0';
foreach($category  as $ca){


?>
<tr>

<td data-title="cat_id"><?php	echo $ca['cat_id'];?> </td>
<td data-title="cat_title"><?php echo $ca['cat_title']; ?></td>
<td data-title="cat_title"><?php echo $ca['user']; ?></td>


<td><a href="v_c.php?cat_id=<?php echo $ca['cat_id']; ?>"><button class="btn-3">View</button></a>
<a href="e_c.php?cat_id=<?php echo $cat_id; ?>"><button class="btn-2">Edit</button></a>
<a href="d_c.php?cat_id=<?php echo $ca['cat_id']; ?>" onClick="return confirm('Delete ?')"><button class="btn-5">Delete</button></a>
</td>
</tr>
<?php
$cat_id++;
}
?>

</tbody>

</table>
</div>
<br>

</div>

<br> <br> <br>
<<div class="footer">
Copyright @ <?php echo $se['footer']; ?>
<?php echo date("Y");?>. All Rights Reserved.
</div>
<?php
}

} else {
echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
}
}}

} else {
echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
}
?>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="../js/united.js"></script>
</body>
</html>
