<!DOCTYPE html>
<html>
<head>
<?php
include 'db1.php';
if(isset($_POST['homepage']))
  header("location:index.php");
if (isset($_POST['submit1']))
{
  $jobtitle=$_POST['types1'];
  $name=$_POST['desp'];
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
  $bulkWrite=new MongoDB\Driver\BulkWrite;
  $doc1=[
    "_id"=>new MongoDB\BSON\ObjectID,
    "jobtitle"=>$jobtitle,
    "personaldetails"=>[
      "name"=>$name,
      "email"=>$email,
      "gender"=>$gender,
      "dob"=>$dob,
      "address"=>$address,
      "phoneno"=>$phoneno
    ],
    "educationqualification"=>[
      "level"=>$level,
      "degree"=>$degree,
      "Specialization"=>$spec,
      "mode"=>$mode,
      "college"=>$college,
      "collegeloc"=>$collegeloc
    ],
      "resumehighlight"=>[
        "currentemployment"=>$currentemployment,
      "currentdesignation"=>$currentdesignation,
      "currentjobloc"=>$currentjobloc,
      "totalexperience"=>$totalexperience,
      "functionalarea"=>$functionalarea,
      "functionalrole"=>$functionalrole,
      "keyskill"=>$keyskill
      ]
      ];
      $bulkWrite->insert($doc1);
      $mng1->executeBulkWrite('jp.public', $bulkWrite); 
      if($mng1)
      {
        echo "<script> alert('Inserted Successfully');window.location.href='index.php';</script>";
        exit;
      
      }

}
?>


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
input[type=radio], select 
{
  width: 10%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=date], select 
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



<div>
<form  method="POST">
<input type="submit" name="homepage" value="Homepage"></div> <br>
<h3>Selected JOB</h3>
<p>Job type<input type="text" disabled="disabled" name="types1" value="<?php echo $_GET['jobtype']; ?>"></p>
<h3>Personal Details</h3>
 
    
<p>Name:<input type="text"  name="desp" ></p>
<p> Email:<input type="text" name="email"></p>
<p> Gender:<input type="radio" name="gender" value="male"> Male
      <input type="radio" name="gender" value="female"> Female
      <input type="radio" name="gender" value="other"> Other<br></p>
<p> DOB:<input type="date" name="bday"></p>
<p>Address:<input type="text" name="add"></p>
<p>Phone No:<input type="text" name="phn">   

<h3>Education Qualification</h3>
<p>Level:<input type="text" name="level"placeholder="eg:PG,Graduate,Mphil,etc"></p>
<p>Degree:<input type="text" name="degree"placeholder="eg:Btech,Bcom,etc"></p>
<p>Specialization:<input type="text" name="spec"placeholder="eg:CSE,Chemical,Civil,etc"></p>
<p>Mode: Full Time<input type="radio" name="mode" value="full">
                        Part Time<input type="radio" name="mode" value="part">
                        Distance<input type="radio" name="mode" value="dist"><br></p>
<p>College/Institute Name:<input type="text" name="clg"></p>
<p>College/Institute location:<input type="text" name="clgloc"></p>   

<h3>Resume Highlight</h3>
 <p> Current Employment:Yes<input type="radio" name="emp" value="yes">
                        No<input type="radio" name="emp" value="no"><br>
</p>
<p>Current Designation:<input type="text" name="desg"></p>
<p>Current Job location:<input type="text" name="loc"></p>
<p>Total Experience:<input type="text" name="exp" placeholder="eg:xy months,xy years"></p> 
<p></p>  
<p>Functional Area  :<input type="text" name="area"></p>
<p>Functional Role:<input type="text" name="role"></p>
<p>Key skill:<input type="text" name="skill"></p>
<input type="submit" name="submit1" value="Submit">
<!-- <input type="submit" name="submit" value="Update">
<input type="submit" name="submit" value="Delete"> -->
  </form>
</div>

</body>
</html>
