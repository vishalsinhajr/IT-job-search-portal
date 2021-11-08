<!DOCTYPE html>
<html>
<head>
<?php
  
  include 'db.php';
  if(isset($_POST['applied']))
  header("location:applied.php");

  if(isset($_POST['homepage']))
  header("location:index.php");

 if (isset($_POST['submit']))
{
  $jobtype=$_POST['types1'];
  $jobdesc=$_POST['descp'];
  $jobvac=$_POST['vac'];
  $jobloc=$_POST['loc'];
  $joblstdt=$_POST['lda'];

  /*$name=$_POST['desp'];
  $email=$_POST['email'];
  $gender=$_POST['gender'];
  $dob=$_POST['bday'];
  $address=$_POST['add'];
  $phoneno=$_POST['phn'];
  $level=$_POST['level'];
  $degree=$_POST['degree'];
  $spec=$_POST['spec'];
  $mode=$_POST['mode'];
  $college=$_POST['clg'];
  $collegeloc=$_POST['clgloc'];
  $currentemployment=$_POST['emp'];
  $currentdesignation=$_POST['desg'];
  $currentjobloc=$_POST['loc'];
  $totalexperience=$_POST['exp'];
  $functionalarea=$_POST['area'];
  $functionalrole=$_POST['role'];
  $keyskill=$_POST['skill'];
  */




  $bulkWrite=new MongoDB\Driver\BulkWrite;
  $doc=[
  "_id"=>new MongoDB\BSON\ObjectID,
  "jobtype"=>$jobtype,
  "jobdescription"=>$jobdesc,
  "jobvacancy"=>$jobvac,
  "joblocation"=>$jobloc,
  "joblastdate"=>$joblstdt
  /*"personaldetails"=>["name"=>$name,"email"=>$email,"gender"=>$gender,"dob"=>$dob,"address"=>$address,"phoneno"=>$phoneno],
  "educationqualification"=>["level"=>$level,"degree"=>$degree,"Specialization"=>$spec,"mode"=>$mode,"college"=>$college,"collegeloc"=>$collegeloc],"resumehighlight"=>["currentemployment"=>$currentemployment,"currentdesignation"=>$currentdesignation,"currentjobloc"=>$currentjobloc,"totalexperience"=>$totalexperience,"functionalarea"=>$functionalarea,"functionalrole"=>$functionalrole,"keyskill"=>$keyskill]*/
  ];
  $bulkWrite->insert($doc);
  $mng->executeBulkWrite('jp.user', $bulkWrite); 
  if($mng)
  {
    echo "<script> alert('Inserted Successfully');window.location.href='admin1.php';</script>";
    exit;

  }
}
?>

<!-- Fro here design starts -->
<style>
input[type=text], select 
{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] 
{
  width: 20%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover 
{
  background-color: #45a049;
}

div 
{
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<h3>Admin</h3>

<div>
  <form method="POST" action="">
    <div align="right"> <input type="submit" name="applied" value="Applicants">
	<input type="submit" name="homepage" value="Homepage"></div> <br>
   <!--  Job id<input type="text" name="jobid"> -->
   <input type="hidden" name="id">
    Job Type<select id="types" name="types1">
              <option value="">Choose a Catagory</option>
              <option value="Information Security Analyst"> Information Security Analyst</option>
              <option value="Web Developer">Web Developer</option>
              <option value="Cloud Solutions Architect">Cloud Solutions Architect</option>
              <option value="Applications Architect">Applications Architect</option>
              <option value="Development Operations (DevOps) Engineer">Development Operations (DevOps) Engineer</option>
              <option value="Data Scientist">Data Scientist</option>
              <option value="Information Technology Manager">Information Technology Manager</option>
              <option value="Business Intelligence Developer">Business Intelligence Developer</option>
              <option value="Database Administrator">Database Administrator</option>
              <option value="User Interface Designer">User Interface Designer</option>
              <option value="Software Engineer"> Software Engineer</option>
              <option value="Computer Systems Analyst">Computer Systems Analyst</option>
              <option value="Site Reliability Engineer">Site Reliability Engineer</option>
              <option value="Computer Technical Support Specialist">Computer Technical Support Specialist</option>
              <option value="Computer Network Architect">Computer Network Architect</option>
              <option value="Solutions Architect">Solutions Architect</option>
              <option value="Data Architect">Data Architect</option>
              <option value="Network Administrator">Network Administrator</option>
              <option value="Hardware Engineer">Hardware Engineer</option>
              <option value="Tester">Tester</option>
              <option value="Cyber security">Cyber security</option>
              <option value="Mobile Application Developer">Mobile Application Developer</option>
            </select>
  
    Job Description<input type="text" name="descp" placeholder="Description..">
    No. of vacancy<input type="text" name="vac">
    Job location<input type="text" name="loc">
    Last date of applying<input type="text" name="lda">
    <input type="submit" name="submit" value="Submit">
    <!-- <input type="submit" name="update" value="Update"  onClick="window.location='search.php';"> -->
  </form>
</div>


<div class="show">

<?php
  $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
  $query=new MongoDB\Driver\Query([]);
  //  $bulk=new MongoDB\Driver\BulkWrite;
  // $userid = $_GET['id'];
  // $_SESSION['userid']=$userid;
  // $bulk->findOne(array(['_id'=>new MongoDB\BSON\ObjectId($id)]));
  // $res=$mng->executeBulkWrite('avms.user',$bulk);
  echo "<div><center><table border=2 ></center></div>
                                         
  <tr>
    <tr>
                  
      <th>Job Type</th>
      <th>Job Description</th>
      <th>No. of vacancy</th>
      <th>Job location</th>
      <th>Last date of applying</th>
              
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </tr>";
                                       

 

  foreach ($rows as $row)
  {
    $name = $row->jobtype;
    echo"<tr>";
    //echo"<td>".$row->no."</td>";
    echo"<td>".$row->jobtype."</td>";
    echo"<td>".$row->jobdescription."</td>";
    echo"<td>".$row->jobvacancy."</td>";
    echo"<td>".$row->joblocation."</td>";
    echo"<td>".$row->joblastdate."</td>";
    echo"<td ><a class=\"btn\" href='editadmin.php?id=".$row->_id.
                 "&jobtype=".$row->jobtype.
                 "&jobdescription=".$row->jobdescription.
                 "&jobvacancy=".$row->jobvacancy.
                 "&joblocation=".$row->joblocation.
                 "&joblastdate=".$row->joblastdate."'>Edit</a></td>";
    echo"<td><a href=\"delete.php?id=$row->_id\">Delete</a></td>";
    // <td><a href="visitor-detail.php?editid=<?php echo $row['ID'];
    echo "</tr>";
  }
  echo "</table>";
?>


</div>



</body>
</html>
