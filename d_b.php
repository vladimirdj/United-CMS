<?php


$id = $_GET['id'];

$data = file_get_contents('blog.json');
$data_array = json_decode($data);

unset($data_array[$id]);

$data_array = array_values($data_array);

$data = json_encode($data_array, JSON_PRETTY_PRINT);
file_put_contents('blog.json', $data);

header('location: index.php');
?>
