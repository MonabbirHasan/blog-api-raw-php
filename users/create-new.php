<?php 
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization,X-Requested-With");

include("../src/config.php");
$GLOBALS['conn'] =$conn;

$URL_DATA=json_decode(file_get_contents("php://input"),true);
$name=$URL_DATA['name'];
$email=$URL_DATA['email'];
$phone=$URL_DATA['phone'];
$address=$URL_DATA['address'];
$biodata=$URL_DATA['biodata'];
$image=$URL_DATA['image'];
$status=$URL_DATA['status'];
$user_type=$URL_DATA['type'];

$sql="INSERT INTO `users`(`name`, `email`, `phone`, `address`, `biodata`, `image`, `type`, `status`) 
				VALUES ('{$name}','{$email}','{$phone}','{$address}','{$biodata}','{$image}',{$user_type},{$status})";
if(mysqli_query($conn,$sql)){
	echo json_encode(array("message"=>"DATA IS CREATED SUCCESSFULL","status"=>true));
}else{
	echo json_encode(array("message"=>"DATA IS NOT CREATED SUCCESSFULL","status"=>false));
}

 ?>