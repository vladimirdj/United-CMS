<?php

function getBlog(){
  $get = file_get_contents('blog.json');
$blog = json_decode($get,true);

return $blog;
}

function addBlog($blog){
    $add = json_encode($blog, JSON_PRETTY_PRINT);
    file_put_contents('blog.json', $add);
}

function getBlogById($id){

  $blog = getBlog();

    $now = null;
    foreach ($blog as $b){
          if ($b['id'] == $id){
            $now = $b;
        }
    }
    return $now;

}
function editBlog($value,$id){
    $editBlog = [];
    $blog = getBlog();
    foreach ($blog as $i => $blog){
        if($blog['id']==$id){
            $blog[$i] = $editBlog = array_merge($blog,$value);
            break;
        }
    }
    getBlog($blog);
    return $editBlog;
}
?>
