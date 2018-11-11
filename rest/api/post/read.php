<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../../config/DatabaseFile.php');
include_once ('../../models/Post.php');

$database = new DatabaseFile();
$db = $database->connect();

$post = new Post($db);

$result = $post->read();
$num = $result->rowCount();

if ($num > 0){
    $posts_arr = array();
    $posts_arr['data'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'id'    => $id,
            'title' =>  $title,
            'body'  =>  html_entity_decode($body),
            'author'    =>  $author,
            'category_id'   =>  $category_id
        );
        array_push($posts_arr['data'],$post_item);
    }
    echo json_encode($posts_arr);
}else{
    echo json_encode(
        array('message' => 'No post found')
    );
}