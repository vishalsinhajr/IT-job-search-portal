<!DOCTYPE html>
<html>
<head>
  <?php 
  include 'db.php';
  		
  		if(isset($_POST['apply']))
    	header("location:user.php");


  		if(isset($_POST['homepage']))
    	header("location:index.php");
	?>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>



<form method="POST" > 
<div>

	<input type="submit" name="homepage" value="Homepage">
  <center><div class="a"><h1>IT Job Search</h1></div></center>
 

<select id="types" name="types1">
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

<center><input type="submit" name="search" value="Search">
		
</center>

  </form>
</div>

<div class="show">

<?php
$mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
$query=new MongoDB\Driver\Query([]);

                                       
if(isset($_POST['search'])){
	$jobprofile = $_POST['types1'];
  $flag = 0;
  foreach ($rows as $row){
    
    if($jobprofile==$row->jobtype){
                $flag = 1;
              }
              if($flag==1){
                echo "<table border=2><tr><tr><th>Job Type</th><th>Job Description</th><th>No. of vacancy</th><th>Job location</th><th>Last date of applying</th><th>Edit</th></tr></tr>";
                echo"<tr>";        
                  echo"<td>".$row->jobtype."</td>";
                  echo"<td>".$row->jobdescription."</td>";
                  echo"<td>".$row->jobvacancy."</td>";
                  echo"<td>".$row->joblocation."</td>";
                  echo"<td>".$row->joblastdate."</td>";
                 echo"<td ><a class=\"btn\" href='user.php?id=".$row->_id.
                 "&jobtype=".$row->jobtype."'>Apply</a></td>";
                echo "</tr>";
                break;
              }
            }
            if($flag==0){
              echo "<script>alert('Oops! No search result found!');</script>";
            }
              echo "</table>";
            
            }
?>
</div>


</body>
</html>
