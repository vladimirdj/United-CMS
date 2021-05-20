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


?>
<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="UTF-8">
<title>United Cms Admin</title>
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
<h2>Sensation Energy</h2>
</div>
</div>
<hr>
<div align="center">

<h2>   <a href="../user.php?user=<?php echo base64_encode($_SESSION['user']) ?>"  class="link">User: <?php echo $_SESSION['user']; ?></a> </h2>

<a href="../logout.php">Logout</a>
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
<br><hr>
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
<div align="center">
<h1>United Cms</h1>
<h2>Admin</h2>
<br> <br> <br>
</div>
<br> <br> <br>
<div align="center">
<div class="card">

<?php
require_once 'fun_cat.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
$jsonUsers = getCat();

while(true){
$check = true;
$random=rand(1,2000);
foreach($jsonUsers as $i=>$osoba){
if($jsonUsers[$i]['cat_id']==$random){
$check=false;
break;
}
}
if($check) break;
}


$cat_id=$random;

$data['cat_id']=$cat_id;
$data['user']=$_POST['user'];
$data['cat_title']=$_POST['cat_title'];




$jsonUsers[sizeof($jsonUsers)] = $data;


addCat($jsonUsers);


header("Location: category.php");
}
?>

<form action="" method="post">

<br>

<div class="form-group">

<input type="hidden" id="user" class="form-input" name="user" value="<?php echo $_SESSION["user"];?>">
</div>
<div class="form-group">
<label for="thread_title">Title:</label>
<input type="text" name="cat_title" class="form-input" />
</div>

<div class="btn-group">
<button type="submit" class="btn-3" >POST</button>
<input type="button" class="btn-2" onclick="location.href='category.php';" value="Cancel" />
</div>
</form>


</div>

<br> <br> <br>
</div>
</div>
<br> <br> <br>
<div class="footer">
Copyright @ File Flat - United Cms
<?php echo date("Y");?>. All Rights Reserved.
</div>
<?php

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






<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="../../../js/moj.js"></script>

</body>
</html>

</html>
