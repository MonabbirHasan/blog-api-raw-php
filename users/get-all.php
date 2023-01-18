<?php 
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization,X-Requested-With");
include("../src/config.php");
$GLOBALS['conn'] = $conn;

$sql="SELECT * FROM users";

$result=mysqli_query($conn,$sql)or die("GET ALL DATA IS NOT WORKING");

if(mysqli_num_rows($result)>0){
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array("message"=>"DATA NOT FOUND!","status"=>false));
}


 ?>