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
  .button3 {
    background-color: white; 
    color: black; 
    border: 2px solid blueviolet;
  }
  
  .button3:hover {
    background-color: blueviolet;
    color: white;
  }
  
    </style>

    <body>
<form action="" method="POST"> 
<br> <br> <br>
    <center>
    <h2 style="font-family:monospace;font-size:50px"><ins>UPDATE YOUR TASK STATUS..</ins></h2>

    <table style="background-color:lemonchiffon;border-radius: 50px;border:10px solid black; padding:15px">
    <tr><td><label>Enter your Task completion status: </label></td>
    <td><select  name='tc'>
    <option value="-">-</option>
    <option value="Completed">Completed</option>
    <option value="In progress">In Progress</option>
    <option value="None">Null</option></td>
</select>
    <tr><td><button type="submit" name='s' class="button button3">Submit</button></td></tr>
    </table>
    </center>
</form>
<?php
if(isset($_POST['s'])){
    $us=$_SESSION['empid'];
    
    @include 'config.php';
    $tc=$_POST['tc'];
    $sql_q="UPDATE user SET Task_status='$tc' WHERE EmpId='$us'";
    if (mysqli_query($con,$sql_q)){
        echo "success";
    }
    if($tc=='Completed'){
        
        $up=["UPDATE employee SET Availability='Yes' WHERE EmpId='$us'",
      
        "UPDATE employee SET ProjectID=' ' WHERE EmpId='$us'",
        "UPDATE employee SET Project_Name=' ' WHERE EmpId='$us'",
        "UPDATE employee SET Task_description=' ' WHERE EmpId='$us'",
        "UPDATE employee SET Start_Date=' ' WHERE EmpId='$us'",
        "UPDATE employee SET End_Date=' ' WHERE EmpId='$us'" ];
      for($i=0;$i<count($up);$i++){
        mysqli_query($con,$up[$i]);}
    }
}
?>