<?php

function uzmiUser(){
$uzmi = file_get_contents('user.json');
$korisnik = json_decode($uzmi,true);

return $korisnik;
}

function dodajUser($korisnik){
$dodaj = json_encode($korisnik, JSON_PRETTY_PRINT);
file_put_contents('user.json', $dodaj);
}

function getUserByKatUserId($user_id){

$korisnik = uzmiUser();
$trenutni = null;
foreach ($korisnik as $User){
if ($User['user_id'] == $user_id){
$trenutni = $User;
}
}
return $trenutni;

}
function urediUser($podaci,$kat_id){

$urediKategoriju = [];
$korisnici = uzmiUser();
foreach ($korisnici as $i => $korisnik){
if($korisnik['user_id']==$user_id){
$korisnici[$i] = $urediKategoriju = array_merge($korisnik,$podaci);
break;
}
}
dodajUser($korisnici);
return $urediUser;
}
?>
