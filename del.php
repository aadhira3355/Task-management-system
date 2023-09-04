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
      <BR><BR>
      <BR>
      <br><br><br>
    <h2 style="font-family:monospace;font-size:50px"><ins>REMOVAL OF EMPLOYEE..</ins></h2>
<table style="background-color:lemonchiffon;border-radius: 50px;border:10px solid black; padding:15px;margin-bottom:100px" >
<tr><td><label>Enter the EMPID digits </label></td>
    <td><input type="text" name='ei' placeholder="EMPID"></td></tr>
    <br><br>
    <tr><td><button type='submit' name='del' class="button button1">SUBMIT</button></td></tr>
</table>    </center>
</form>
<?php
if (isset($_POST['del']))
{   
    
    $con=mysqli_connect("localhost","root","","project");
    if($con==FALSE){
        die('Error count not connect');
    }
    if (is_numeric($ei)){
        $ei="EM".$_POST["ei"];}
        else{
          $ei=$_POST["ei"];
        }
        $sql_q="DELETE FROM employee WHERE EmpID='$ei'";
        $q="DELETE FROM user WHERE EmpID='$ei'";
        mysqli_query($con,$sql_q);
            
        
        if(mysqli_query($con,$q)){
            echo "success";
          echo "<script> window.location.href='admin.php'</script>";}
        
    }
    ?>
