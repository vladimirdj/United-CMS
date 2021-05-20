<?php
//klasa
//class Mojcrud {

  //funkcija koaj uzma korisnike iz baze
function getUser(){
  $uzmi = file_get_contents('user.json');
$korisnik = json_decode($uzmi,true);

return $korisnik;
}

    //funkcija dodaj korisnika u json
function addUser($korisnik){
    $dodaj = json_encode($korisnik, JSON_PRETTY_PRINT);
    file_put_contents('user.json', $dodaj);
}

function getUserById($user_id){
//   $korisnik = new Mojcrud();
  $korisnik = getUser();

    $trenutni = null;
    foreach ($korisnik as $osoba){
          if ($osoba['user_id'] == $user_id){
            $trenutni = $osoba;
        }
    }
    return $trenutni;
    //  return null;
}
function editUser($podaci,$user_id){
    //შესაბამის მომხმარებელს მივანიჭოთ განახლებული მონაცემები
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
//}

?>
