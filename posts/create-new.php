<?php 
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization,X-Requested-With");

include("../src/config.php");
$GLOBALS['conn'] =$conn;

$URL_DATA=json_decode(file_get_contents("php://input"),true);
$title=$URL_DATA['title'];
$descrioption=$URL_DATA['descrioption'];
$date=$URL_DATA['date'];
$comment=$URL_DATA['comment'];
$author=$URL_DATA['author'];
$tags=$URL_DATA['tags'];
$image=$URL_DATA['image'];
$status=$URL_DATA['status'];


$sql="INSERT INTO `post`(`title`, `image`, `descrioption`, `date`, `comment`, `author`, `tags`, `status`) 
VALUES ('{$title}','{$descrioption}','{$date}','{$comment}','{$author}','{$tags}','{$image}','{$status}')";

if(mysqli_query($conn,$sql)){
	echo json_encode(array("message"=>"DATA IS CREATED SUCCESSFULL","status"=>true));
}else{
	echo json_encode(array("message"=>"DATA IS NOT CREATED SUCCESSFULL","status"=>false));
}

 ?>