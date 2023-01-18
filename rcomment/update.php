<?php 
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization,X-Requested-With");

include("../src/config.php");
$GLOBALS['conn'] =$conn;

$URL_DATA=json_decode(file_get_contents("php://input"),true);
$user_id=$URL_DATA['id'];
$name=$URL_DATA['name'];
$email=$URL_DATA['email'];
$phone=$URL_DATA['phone'];
$address=$URL_DATA['address'];
$image=$URL_DATA['image'];
$status=$URL_DATA['status'];
$comment=$URL_DATA['comment'];
$rcomment=$URL_DATA['rcomment'];

$sql="UPDATE `rcomment` SET `name`='{$name}',`email`='{$email}',`phone`='{$phone}',`address`='{$address}',`image`='{$image}',`comment`='{$comment}',`rcomment`='{$rcomment}',`status`='{$status}' WHERE id={$user_id}";

if(mysqli_query($conn,$sql)){
	echo json_encode(array("message"=>"DATA IS UPDATED SUCCESSFULL","status"=>true));
}else{
	echo json_encode(array("message"=>"DATA IS NOT UPDATED SUCCESSFULL","status"=>false));
}

 ?>