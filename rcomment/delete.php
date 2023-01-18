<?php 
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization,X-Requested-With");

include("../src/config.php");
$GLOBALS['conn'] =$conn;

$URL_DATA=json_decode(file_get_contents("php://input"),true);
$user_id=$URL_DATA['id'];

$sql="DELETE FROM rcomment WHERE id={$user_id}";

if(mysqli_query($conn,$sql)){
	echo json_encode(array("message"=>"DATA IS DELETED SUCCESSFULL","status"=>true));
}else{
	echo json_encode(array("message"=>"DATA IS NOT DELETED SUCCESSFULL","status"=>false));
}
exit();
?>