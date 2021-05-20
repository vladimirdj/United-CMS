
<?php
//klasa
//class Mojcrud {

  //funkcija koaj uzma korisnike iz baze
function getCat(){
  $get = file_get_contents('../category.json');
$category = json_decode($get,true);

return $category;
}

    //funkcija dodaj korisnika u json
function addCat($category){
    $add = json_encode($category, JSON_PRETTY_PRINT);
    file_put_contents('../category.json', $add);
}

function getCatById($cat_id){
//   $korisnik = new Mojcrud();
  $category = getCat();

    $now = null;
    foreach ($category as $c){
          if ($c['cat_id'] == $cat_id){
            $now = $c;
        }
    }
    return $now;
    //  return null;
}
function editCat($value,$cat_id){
    //შესაბამის მომხმარებელს მივანიჭოთ განახლებული მონაცემები
 //$editCat = [];
    $category = getCat();
    foreach ($category as $i => $c){
        if($c['cat_id']==$cat_id){
            $c[$i] = $editCat = array_merge($c,$value);
            break;
        }
    }
    //addCat($c);
    return $editCat;
}
//}

?>
