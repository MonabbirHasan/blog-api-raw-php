<?php 
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:PUT");
header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Authontication,X-Requested-With");


include("../src/config.php");

$GLOBALS['conn'] = $conn;

$URL_DATA=json_decode(file_get_contents("php://input"),true);
$user_id=$URL_DATA['id'];
$name=$URL_DATA['name'];
$email=$URL_DATA['email'];
$phone=$URL_DATA['phone'];
$address=$URL_DATA['address'];
$biodata=$URL_DATA['biodata'];
$image=$URL_DATA['image'];
$status=$URL_DATA['status'];
$user_type=$URL_DATA['type'];

$sql="UPDATE users SET name='{$name}', email='{$email}', phone='{$phone}', address='{$address}', biodata='{$biodata}', image='{$image}', type={$user_type}, status={$status} WHERE id={$user_id}";

if(mysqli_query($conn,$sql)){
	echo json_encode(array("message"=>"DATA IS UPDATED SUCCESSFULL",'status'=>true));
}else{
	echo json_encode(array("message"=>"DATA IS NOT UPDATED SUCCESSFULL",'status'=>false));
}




 ?>