<?php 
//Header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);

//BLog post query
$result = $post->read();
//get row count
$num = $result->rowCount();
if($num > 0){
    //Post array
    $posts_arry = array();
    $posts_arry['data'] = array(); 

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $post_items= array(
            'id'=>$id,
            'title'=>$title,
            'body'=>html_entity_decode($body),
            'author'=>$author,
            'category_id'=>$category_id,
            'category_name'=>$category_name
        );
        //push the array
        array_push($posts_arry['data'],$post_items);
    }
    //Turn to JSON and output it
    echo json_encode($posts_arry);

}else{
//NO post
echo json_encode(
    array('message'=>'No post found')
);
}


?>