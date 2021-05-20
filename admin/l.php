<?php
session_start();

base64_decode($_SESSION['user']) == $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="UTF-8">
<title>United CMS</title>
<link rel="shortcut icon" href="http://www.sensationenergy.com/favicon.ico" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/united.css">
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

<h2>United Cms</h2>
</div>
<nav class="gornji_meni">
<a href="#" class="toggle"><i class="fa fa-reorder"></i></a>
<div class="left">
<a href="../index.php"  class="link">Home</a>


</div>

</nav>
<div align="center">
<h2>Login</h2>
</div>
<div class="card">
<form action="login.php" method="post">


<div class="form-group">
<label for="user"><h3>User:</h3></label>
<input type="text" name="user"  class="form-input" value="vlada"/>
</div>
<div class="form-group">
<label for="password"><h3>Password:</h3></label>
<input type="password" name="password" class="form-input" value="vlada" />
</div>


<div class="btn-group">
<button type="submit" name="prijava" class="btn-3" >POST</button>

</div>
</form>
</div>

<br>

<div class="footer">
Copyright @ File Flat - United Cms
<?php echo date("Y");?>. All Rights Reserved.
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="../js/united.js"></script>
</body>
</htm>
