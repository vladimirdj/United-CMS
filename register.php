
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>United CMS</title>
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
   <h1>Welcome to United Cms</h1>

           <h2>United Cms</h2>
     </div>
     <nav class="gornji_meni">
   <a href="#" class="toggle"><i class="fa fa-reorder"></i></a>
       <div class="left">
            <a href="index.php"  class="link">Home</a>

                     <a href="register.php"  class="link">Register</a>


   </div>

     </nav>
<br>
<?php
require_once 'fun_user.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
$jsonUsers = getUser();
while(true){
    $check = true;
    $random=rand(1,2000);
    foreach($jsonUsers as $i=>$User){
        if($jsonUsers[$i]['user_id']==$random){
            $check=false;
            break;
        }
    }
    if($check) break;
}


$user_id=$random;
    //შევქმნათ ახალი მასივი მონახემებით და დავამატოთ json მასივში
    $data['user_id']=$user_id;
    $data['first_name']=$_POST['first_name'];
    $data['last_name']=$_POST['last_name'];
  $data['user']=$_POST['user'];
    $data['email']=$_POST['email'];
      $data['password']=$_POST['password'];
      $data['role']=$_POST['role'];




  //  $data['extension'] = $extension;

    $jsonUsers[sizeof($jsonUsers)] = $data;


  addUser($jsonUsers);


    header("Location: index.php");
}
?>

      <form action="" method="post">

    <br>
    <div align="center">
         <h2>Register user</h2>
       </div>
  	<div class="form-group">
         <label for="first_name"><h2>First name:</h2></label>
    <input type="text" name="first_name"  class="form-input" />
    </div>
    <div class="form-group">
         <label for="last_name"><h2>Last name:</h2></label>
    <input type="text" name="last_name" class="form-input" />
    </div>

    <div class="form-group">
         <label for="user"><h2>User:</h2></label>
    <input type="text" name="user" class="form-input" />
    </div>

    <div class="form-group">
         <label for="email"><h2>Email:</h2></label>
    <input type="text" name="email" class="form-input" />
    </div>

    <div class="form-group">
         <label for="password"><h2>Password:</h2></label>
    <input type="password" name="password" class="form-input" />
    </div>
<div class="form-group">
  <input type="hidden" name="role" value="user">
  </div>
  <br>
      <div align="center">
    <div class="btn-group">
    		<button type="submit" class="btn-3" >POST</button>
   <input type="button" class="btn-2" onclick="location.href='index.php';" value="Cancel" />
    	</div>
      	</div>
    </form>
    <br>

         <div class="footer">
    Copyright @ File Flat - United Cms
            <?php echo date("Y");?>. All Rights Reserved.
    </div>

      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script  src="js/unted.js"></script>
    </body>
    </htm>
