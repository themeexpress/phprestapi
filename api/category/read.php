<?php 
//Header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Category.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$category = new Category($db);

//BLog Category query
$result = $category->read();
//get row count
$num = $result->rowCount();
if($num > 0){
    //Category array
    $category_arry = array();
    $category_arry['data'] = array(); 

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $category_items= array(
            'id'=>$id,
            'name'=>$name
        );
        //push the array
        array_push($category_arry['data'],$category_items);
    }
    //Turn to JSON and output it
    echo json_encode($category_arry);

}else{
//NO post
echo json_encode(
    array('message'=>'No post found')
);
}


?>