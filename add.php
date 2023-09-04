<!DOCTYPE html>
<html>
  <head>
    <style>
        .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 12px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 1px;
    transition-duration: 0.4s;
    cursor: pointer;
  }
  .button1 {
    background-color: white; 
    color: black; 
    border: 2px solid blueviolet;
  }
  
  .button1:hover {
    background-color: blueviolet;
    color: white;
  }
  
    </style>

    <body>
<form action="" method="POST"> 
    <center>
      
    <h2 style="font-family:monospace;font-size:50px"><ins>LET'S ADD NEWBIES..</ins></h2>
<table style="background-color:lemonchiffon;border-radius: 50px;border:10px solid black; padding:15px;margin-bottom:100px" >
<tr><td><label>Enter the EMPID digits </label></td>
    <td><input type="text" name='ei'required></td></tr>
    <br><br>
    <tr><td><label>Enter name:</label></td>
    <td><input type="text" name='nm' required></td></tr> 
    <br>
    <tr><td><label>Enter Phone number:</label></td>
    <td><input type="number" name='pn' required> </td></tr>
    <br>
    <tr><td><label>Enter Address:  </label></td>
    <td><textarea rows="6" cols="16" name='add' required></textarea></td></tr><br>
    <tr><td><label>Enter availability: </label></td>
    <td><input type="text" name='ava' required></td></tr><br>
    <tr><td><label>Enter Password: </label></td>
    <td><input type="text" name='pass' required></td></tr><br>
    <tr><td><label>Enter DOB:  </label></td>
    <td><input type="date" name='dob' required></td></tr><br>
    <tr><td><label>Enter Email </label></td>
    <td><input type="email" name='em' required></td></tr><br>
    <tr><td><label>Enter role </label></td>
    <td><input type="text" name='role' required></td></tr><br>

<tr><td><button type='submit' name='ins' class="button button1">SUBMIT</button></td></tr>
</table>    </center>
</form>
<?php
if (isset($_POST['ins']))
{   
    
    $con=mysqli_connect("localhost","root","","project");
    if($con==FALSE){
        die('Error count not connect');
    }
        if (is_numeric($_POST["ei"])){
        $ei="EM".$_POST["ei"];}
        else{
          $ei=$_POST["ei"];
        }
        $nm=$_POST["nm"];
        $add=$_POST["add"];
        $ava=$_POST["ava"];
        $dob=$_POST["dob"];
        $em=$_POST["em"];
        $pn=$_POST['pn'];
        $role=$_POST["role"];
        $pass=$_POST["pass"];
        $sql_q="INSERT INTO employee(EmpID,Name,Availability,role,password) values('$ei','$nm','$ava','$role','$pass')";
        $q="INSERT INTO user(EmpID,Name,Address,Phone_number,DOB,Email) values('$ei','$nm','$add','$pn','$dob','$em')";
        mysqli_query($con,$sql_q);
            
        
        if(mysqli_query($con,$q)){
            echo "success";}
        
    }
    
echo " <br><br><br><br><br>";
    
?>
</body>