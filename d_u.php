<?php


$user_id = $_GET['user_id'];


$data = file_get_contents('user.json');
$data_array = json_decode($data);


unset($data_array[$user_id]);


$data_array = array_values($data_array);


$data = json_encode($data_array, JSON_PRETTY_PRINT);
file_put_contents('user.json', $data);

header('location: logout.php');
?>
