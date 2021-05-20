<?php

require_once 'fun_user.php';
$user_id = $_GET['user_id'];

$korisnik = getUser();

foreach ($korisnik as $i => $osoba) {
if ($osoba['user_id'] == $user_id) {
array_splice($korisnik, $i, 1);
}
}

addUser($korisnik);

header('location: users.php');
?>
