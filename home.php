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

@media only screen and (max-width:480px) {
.raspon_1_of_2 {
width: 100%
}
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
<a href="index.php"  class="link">Login</a>
<a href="home.php"  class="link">Home</a>
<a href="admin/index.php"  class="link">Admin</a>
<a href="register.php"  class="link">Register</a>


</div>
<div class="right">

<a href="user.php?user=<?php echo base64_encode($_SESSION['user']) ?>"  class="link">User:<?php echo $_SESSION['user']; ?></a>

</div>
</nav>
<br>

<div class="sekcija2 grupa2">

<div class="colona2 raspon_2_of_2">
<div align="center">
<h2>Blog</h2>
<a href="a_b.php"  class="link"><button class="btn-5">Add blog</button></a>
</div>

<div class="card">

<?php
require_once 'fun_blog.php';


$bl = getBlog();


$nb_elem_per_page = 2;
$page = isset($_GET['page'])?intval($_GET['page']-1):0;
$number_of_pages = intval(count($bl)/$nb_elem_per_page)+1;
foreach (array_slice($bl, $page*$nb_elem_per_page, $nb_elem_per_page) as $b) {
?>


<h1><a href="subject.php?id=<?php echo $b['id'];?>" ><?php echo $b['title']; ?></a></h1>

<h2><?php echo $b['subject']; ?></h2>
<h2><?php echo $b['user']; ?></h2>
<h3> <?php echo $b['date'];?> </h5>

<hr>
<?php
};
?>
<div class="pagination">
<?php
if(isset($page)){


for($i=1;$i<$number_of_pages;$i++){

if($page<=1){

echo "<a href='./?page=$i' class=active>  </a><br>";
}else{
$i=$page-1;

echo"<a href='./?page=$i'><button class='btn-circle'><i class='fa fa-angle-left'></i></button></a><br>";
}
for($i=1;$i<=$number_of_pages;$i++){
if($i<>$page)
{
echo "<a href='./?page=$i'>$i </a><br>";
}else{
echo "<a href='./?page=$i' class=active>".$i." </a><br>";
}
}
if($page==$number_of_pages){
echo "<a href='./?page=$i' class=active>  </a><br>";
}else{
$i=$page+1;
}
}
}
?>
</div>
</div>
</div>
<div class="colona2 raspon_1_of_2">
<div align="center">
<h2>Category</h2>
</div>
<div class="card">
<?php
require_once 'fun_cat.php';


$category = getCat();


foreach($category  as $c){
?>
<h2><a href="category.php?cat_id=<?php echo $c['cat_id'];?>" ><?php echo $c['cat_title']; ?></a></h2>
<hr>
<?php
};
?>
</div>
<br>
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
