<?php 
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization,X-Requested-With");

include("../src/config.php");
$GLOBALS['conn'] =$conn;

$URL_DATA=json_decode(file_get_contents("php://input"),true);
$user_id=$URL_DATA['id'];
$title=$URL_DATA['title'];
$descrioption=$URL_DATA['descrioption'];
$date=$URL_DATA['date'];
$comment=$URL_DATA['comment'];
$author=$URL_DATA['author'];
$tags=$URL_DATA['tags'];
$image=$URL_DATA['image'];
$status=$URL_DATA['status'];


$sql="UPDATE `post` SET `title`='{$title}',`image`='{$image}',`descrioption`='{$descrioption}',`date`='{$date}',`comment`='{$comment}',`author`='{$author}',`tags`='{$tags}',`status`='{$status}' WHERE id={$user_id}";

if(mysqli_query($conn,$sql)){
	echo json_encode(array("message"=>"DATA IS UPDATED SUCCESSFULL","status"=>true));
}else{
	echo json_encode(array("message"=>"DATA IS NOT UPDATED SUCCESSFULL","status"=>false));
}

 ?>