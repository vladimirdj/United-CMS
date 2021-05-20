<?php

function getUser(){
$uzmi = file_get_contents('../user.json');
$korisnik = json_decode($uzmi,true);

return $korisnik;
}


function addUser($korisnik){
$dodaj = json_encode($korisnik, JSON_PRETTY_PRINT);
file_put_contents('../user.json', $dodaj);
}

function getUserById($user_id){

$korisnik = getUser();

$trenutni = null;
foreach ($korisnik as $osoba){
if ($osoba['user_id'] == $user_id){
$trenutni = $osoba;
}
}
return $trenutni;

}
function editUser($podaci,$user_id){

$urediKorisnika = [];
$korisnici = getUser();
foreach ($korisnici as $i => $korisnik){
if($korisnik['user_id']==$user_id){
$korisnici[$i] = $urediKorisnika = array_merge($korisnik,$podaci);
break;
}
}
addUser($korisnici);
return $urediKorisnika;
}
?>
