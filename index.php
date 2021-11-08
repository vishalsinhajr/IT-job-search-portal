<!DOCTYPE html>
<html>
<head>
  <?php 
  include 'db.php';
  		
  		if(isset($_POST['apply']))
    	header("location:user.php");

  		if(isset($_POST['admin']))
    	header("location:admin1.php");
    if(isset($_POST['search']))
    	header("location:search.php");

	?>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>



<form method="POST" > 
<div>

	<input type="submit" name="admin" value="Admin">
  <center><div class="a"><h1>IT Job Search</h1></div></center>
 

<!-- <select id="types" name="types1">
        <option value="">Choose a Catagory</option>
              <option value="1"> Information Security Analyst</option>
              <option value="2">Web Developer</option>
              <option value="3">Cloud Solutions Architect</option>
              <option value="4">Applications Architect</option>
              <option value="5">Development Operations (DevOps) Engineer</option>
              <option value="6"> Data Scientist</option>
              <option value="7">Information Technology Manager</option>
              <option value="8">Business Intelligence Developer </option>
              <option value="9">Database Administrator</option>
              <option value="10">User Interface Designer</option>
              <option value="11"> Software Engineer</option>
              <option value="12">Computer Systems Analyst</option>
              <option value="13">Site Reliability Engineer</option>
              <option value="14">Computer Technical Support Specialist</option>
              <option value="15">Computer Network Architect</option>
              <option value="16">Solutions Architect</option>
              <option value="17"> Data Architect</option>
              <option value="18">Network Administrator  </option>
              <option value="19">Hardware Engineer</option>
              <option value="20">Tester</option>
              <option value="21">Cyber security</option>
              <option value="22">Mobile Application Developer</option>
    </select> -->

<center><input type="submit" value="Click to search job" name="search">
		
</center>

  </form>
</div>

<div class="show">

                                    <?php
                                    $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                                    $query=new MongoDB\Driver\Query([]);
                                   echo "<div><center><table border=2 ></center></div>
                                         
                                        <tr>
                                            <tr>
                  
            
                 
              
              <th>Job Type</th>
              <th>Job Description</th>
              <th>No. of vacancy</th>
              <th>Job location</th>
              <th>Last date of applying</th>
              
                   <th>Edit</th>
                </tr>
                                        </tr>";
                                       

 

              foreach ($rows as $row){
                $name = $row->jobtype;
                echo"<tr>";
                  
                
                  echo"<td>".$row->jobtype."</td>";
                  echo"<td>".$row->jobdescription."</td>";
                  echo"<td>".$row->jobvacancy."</td>";
                  echo"<td>".$row->joblocation."</td>";
                  echo"<td>".$row->joblastdate."</td>";
                 echo"<td ><a class=\"btn\" href='user.php?id=".$row->_id.
                 "&jobtype=".$row->jobtype."'>Apply</a></td>";
                 
                
                

                echo "</tr>";
              }
              echo "</table>";
              ?>


</div>


</body>
</html>
