<!DOCTYPE html>
<html>
<head>
<style>

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
</style>
</head>
<body>
<div class="show">
<?php
include 'db1.php';
if(isset($_POST['back']))
header("location:admin1.php");

//   $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
//   $query=new MongoDB\Driver\Query([]);
 ?> 
<form method="POST"> 
<div>

  <input type="submit" name="back" value="Back">
</div>
</form>
<?php
  echo "<table border=2>
                                         
  <tr>
    <tr>
                  
      <th>jobtitle</th>
      <th>name</th>
      <th>email</th>
      <th>gender</th>
      <th>dob</th>
      <th>address</th>
      <th>phoneno</th>
      <th>level</th>
      <th>degree</th>
      <th>Specialization</th>
      <th>mode</th>
      <th>college</th>
      <th>collegeloc</th>
      <th>currentemployment</th>
      <th>currentdesignation</th>
      <th>currentjobloc</th>
      <th>totalexperience</th>
      <th>functionalarea</th>
      <th>functionalrole</th>
      <th>keyskill</th>
    </tr>
  </tr>";
    foreach ($rows as $row)
  {
   
    echo"<tr>";
    echo"<td>".$row->jobtitle."</td>";
    echo"<td>".$row->personaldetails->name."</td>";
    echo"<td>".$row->personaldetails->email."</td>";
    echo"<td>".$row->personaldetails->gender."</td>";
    echo"<td>".$row->personaldetails->dob."</td>";
    echo"<td>".$row->personaldetails->address."</td>";
    echo"<td>".$row->personaldetails->phoneno."</td>";
    echo"<td>".$row->educationqualification->level."</td>";
    echo"<td>".$row->educationqualification->degree."</td>";
    echo"<td>".$row->educationqualification->Specialization."</td>";
    echo"<td>".$row->educationqualification->mode."</td>";
    echo"<td>".$row->educationqualification->college."</td>";
    echo"<td>".$row->educationqualification->collegeloc."</td>";
    echo"<td>".$row->resumehighlight->currentemployment."</td>";
    echo"<td>".$row->resumehighlight->currentdesignation."</td>";
    echo"<td>".$row->resumehighlight->currentjobloc."</td>";
    echo"<td>".$row->resumehighlight->totalexperience."</td>";
    echo"<td>".$row->resumehighlight->functionalarea."</td>";
    echo"<td>".$row->resumehighlight->functionalrole."</td>";
    echo"<td>".$row->resumehighlight->keyskill."</td>";
    
    echo "</tr>";
  }
  echo "</table>";

  ?>

</div>

</body>
</html>

