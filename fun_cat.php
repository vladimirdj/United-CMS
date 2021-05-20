<?php

function getCat(){
$get = file_get_contents('category.json');
$category = json_decode($get,true);

return $category;
}

function addCat($category){
$add = json_encode($category, JSON_PRETTY_PRINT);
file_put_contents('category.json', $add);
}

function getCatById($cat_id){

$category = getCat();

$now = null;
foreach ($category as $c){
if ($c['cat_id'] == $cat_id){
$now = $c;
}
}
return $now;

}
function editCat($value,$cat_id){

$editCat = [];
$category = getCat();
foreach ($category as $i => $category){
if($category['cat_id']==$cat_id){
$category[$i] = $editCat = array_merge($category,$value);
break;
}
}
addCat($category);
return $editCat;
}
?>
