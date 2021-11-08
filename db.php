<?php
$mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
$query=new MongoDB\Driver\Query([]);

$rows=$mng->executeQuery("jp.user",$query);


?>