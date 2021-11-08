<?php 

//including the database connection file
include("db.php");
 $bulk=new MongoDB\Driver\BulkWrite;
 
//getting id of the data from url
try{
$id = $_GET['id'];

 
 $bulk->delete(['_id'=>new MongoDB\BSON\ObjectId($id)]);
 $res=$mng->executeBulkWrite('jp.user',$bulk);
if($res)

{
	 echo "<script> alert('Deleted Successfully');window.location.href='admin1.php';</script>";
exit;
header("Location: admin1.php");

}

}
catch(MongoDB\Driver\Exception\Exception $e){
	die("Error exixts".$e);
}



 ?>