<!DOCTYPE html>
<html>
<head>
<?php
include "db.php";
?>




<!-- Fror here design starts -->
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 20%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<h3>Admin</h3>

<div>
  <form method="POST" action="update.php">
    

   <!--  Job id<input type="text" name="jobid"> -->
   <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
   Job type<input type="text"  name="types1" value="<?php echo $_GET['jobtype']; ?>">
   Job Description<input type="text" name="descp" value="<?php echo $_GET['jobdescription']; ?>">
    No. of vacancy<input type="text" name="vac" value="<?php echo $_GET['jobvacancy']; ?>">
    Job location<input type="text" name="loc" value="<?php echo $_GET['joblocation']; ?>">
    Last date of applying <input type="text" name="lda" value="<?php echo $_GET['joblastdate']; ?>">
    <input type="submit" name="submit" value="Submit">
  </form>
</div>






</body>
</html>
