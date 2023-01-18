<?php 
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET");
header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Authontication,X-Requested-With");

include("../src/config.php");
$GLOBALS['conn'] = $conn;

$URL_DATA=json_decode(file_get_contents("php://input"),true);
$user_id=$URL_DATA['id'];

$sql="SELECT * FROM comment WHERE id={$user_id}";

$result=mysqli_query($conn,$sql) or die("SINGLE DATA QUERY FEILD");

if(mysqli_num_rows($result)>0){
	$output=mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo json_encode($output);
}else{
	echo json_encode(array("message"=>"DATA NOT FOUND","status"=>false));
}

 ?>