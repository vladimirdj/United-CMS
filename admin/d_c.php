<?php

require_once 'fun_cat.php';
$cat_id = $_GET['cat_id'];

$korisnik = getCat();

foreach ($korisnik as $i => $osoba) {
if ($osoba['cat_id'] == $cat_id) {
array_splice($korisnik, $i, 1);
}
}

addCat($korisnik);

header('location: category.php');
?>
