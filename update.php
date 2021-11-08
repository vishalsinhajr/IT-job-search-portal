<?php
include 'db.php';
if(isset($_POST['submit'])){
$bulk=new MongoDB\Driver\BulkWrite;
$id=$_POST['id'];
$jobtype=$_POST['types1'];
$jobdesc=$_POST['descp'];
$jobvac=$_POST['vac'];
$jobloc=$_POST['loc'];
$joblstdt=$_POST['lda'];

try{
   $bulk->update (['_id'=> new MongoDB\BSON\ObjectId($id)],
   [
       'jobtype'=>$jobtype,
       'jobdescription'=>$jobdesc,
       'jobvacancy'=>$jobvac,
       'joblocation'=>$jobloc,
       'joblastdate'=>$joblstdt
   ]);  
    $mng=new MongoDB\Driver\Manager('mongodb://localhost:27017');
    $res=$mng->executeBulkWrite('jp.user',$bulk);
    header("Location: admin1.php?");
}
catch(MongoDB\Driver\Exception\Exception $e){
    die("error".$e);
}
}
?>