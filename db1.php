<?php
$mng1=new MongoDB\Driver\Manager("mongodb://localhost:27017");
$query=new MongoDB\Driver\Query([]);

$rows=$mng1->executeQuery("jp.public",$query);


?>