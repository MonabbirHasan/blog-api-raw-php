<?php 
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization,X-Requested-With");

include("../src/config.php");
$GLOBALS['conn'] =$conn;

$URL_DATA=json_decode(file_get_contents("php://input"),true);
$name=$URL_DATA['name'];
$image=$URL_DATA['image'];
$is_sub=$URL_DATA['is_sub'];
$status=$URL_DATA['status'];

$sql="INSERT INTO `category`(`name`, `is_sub`, `image`, `status`) 
					VALUES ('{$name}','{$is_sub}','{$image}','{$status}')";

if(mysqli_query($conn,$sql)){
	echo json_encode(array("message"=>"DATA IS CREATED SUCCESSFULL","status"=>true));
}else{
	echo json_encode(array("message"=>"DATA IS NOT CREATED SUCCESSFULL","status"=>false));
}

 ?>