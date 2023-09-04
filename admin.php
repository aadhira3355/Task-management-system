<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
   <title> Admin page</title>
   <style>
    html{
      scroll-behavior: smooth;
    }
    #sec1{
      height: 600px;
    }
  #sec2{
    height: 600px;
  }
  #sec3{
    height: 700px;
  }
  #sec4{
    height: 600px;
  }
  #sec5{
    height: 600px;
  }
  #sec6{
    height: 600px;
  }
   .content table{border:solid black 3px;border-collapse: collapse; margin-bottom: 150px; }
  .content tr,th{border:solid black 3px;border-collapse: collapse; margin-bottom: 150px; }
  .content td{border:solid black 3px;border-collapse: collapse; margin-bottom: 150px; }
  .content table{background-color:bisque;}
  .content  td,th{ padding: 8px;text-align: left;}
   
  .content tr:hover{
background-color:#D6EEEE;
color:black;
}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
  }
  .button2 {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
  }
  
  .button2:hover {
    background-color: #4CAF50;
    color: white;
  }
  .main {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background-color: #f1f1f1;
}
   </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-sacle=1.0">
  <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
    <header>
      <div class="main">
        <ul>
          <li><a href="#sec2">Employee details</a></li>
          <li><a href="#sec3">Add Employee</a></li>
          <li><a href="#sec4">Delete Employee</a></li>
          <li><a href="#sec5">Create and assign task</a></li>
          <li><a href="#sec6">Task status</a></li>
          <li><a href="logout.php" class="btn">logout</a>
        </ul>
      </div>
      <div class="title" id='sec1'>
      <p style="font-size:90px;padding:200px;margin-left:150px;"><b><font color='orange' ><ins style="background-color:black;">
      Welcome <?php echo $_SESSION['adname']?>!!</ins></font></b></p>
        
      </div>
      <center>
      
        <div class='content' id="sec2" >
        <br><br><br>
        <h2 style="font-family:monospace;font-size:50px"><ins>EMPLOYEE DETAILS</ins></h2>
          <?php
          @include 'config.php';
          $select="SELECT * FROM employee WHERE role='User'";
          $result=mysqli_query($con,$select);
          if(mysqli_num_rows($result)>0){
            echo"<table><tr><th>Empid</th><th>Name</th><th>ProjectID</th><th>Project_Name</th>
            <th>Task_description</th><th>Availability</th><th>Start_Date</th><th>End_date</th><th>role</th></tr>";
            while($row=mysqli_fetch_assoc($result)){
              echo "<tr><td>".$row['Empid']."</td>";
                    echo"<td>". $row['Name']."</td>";
                    echo"<td>". $row['ProjectID']."</td>";
                    echo"<td>". $row['Project_Name']."</td>";
                    echo "<td>". $row['Task_description']."</td>";
                    echo "<td>". $row['Availability']."</td>";
                    echo "<td>". $row['Start_Date']."</td>";
                    echo "<td>".$row['End_Date']."</td>";
                    echo"<td>". $row['role']."</td></tr>";
            }
            echo "</table>";
          }
          ?>
          
        </div>
        
        <div id="sec3">
          <br>
          <br><br>
        <!-- <h2 style="font-family:monospace;font-size:50px"><ins>LET'S ADD NEWBIES..</ins></h2> -->

          <?php
        @include "add.php";
        ?>
        <br><br><br><br><br>
      </div>
      <div id="sec4">
          <?php
          @include "del.php";
          ?>
        </div>
      <div id="sec5">
        <br><br><br>
      <form action="" method="POST">
        <h2 style="font-family:monospace;font-size:50px"><ins>LET'S ASSIGN TASKS!!</ins></h2>
        <table style="background-color: aliceblue;border-radius: 50px;border:10px solid black; padding:15px">
                    <tr>
                        <td><label>Enter Empid to whom the task <br>has to be assigned: </label></td><br>
                        <td><input type="text" name="ei" placeholder="Empid" required></td>
                    </tr>
                    <tr>
                        <td><label>Enter the ProjectID:</label></td><br>
                        <td><input type="text" name="pd" placeholder="Project ID" required></td>
                    </tr>
                    <tr>
                        <td><label>Enter the Project Name:</label></td><br>
                        <td><input type="text" name='pn' placeholder="Project Name" required></td>
                    </tr>
                    <tr>
                        <td><label>Enter Task details:</label></td><br>
                        <td><textarea rows="5" cols="21" name="td" placeholder="Task details" required></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Enter Availability:</label></td><br>
                        <td><input type="text" name="ava" placeholder="Availability" required></td>
                    </tr>
                    <tr>
                        <td><label>Enter the Start date:</label></td>
                        <td><input type="date" name='sd' placeholder="Start date" required></td>
                    </tr>
                    <tr>
                        <td><label>Enter the End date:</label></td>
                        <td><input type="date" name='ed' placeholder="End date" required></td>
                    </tr>
                    <tr>
                        <td><button class="button button2" style="font-size:20px;" type="submit" name="s">SUBMIT</button></td>
                    </tr>
        </table>
    </form>
        <?php
        if(isset($_POST['s'])){
          
        $ei=$_POST["ei"];
        $pd=$_POST["pd"];
        $pn=$_POST["pn"];
        $td=$_POST["td"];
        $sd=$_POST["sd"];
        $ed=$_POST["ed"];
        $ava=$_POST["ava"];
        $con=mysqli_connect("localhost","root","","project");
        $upd=array("UPDATE employee SET ProjectID='$pd'WHERE Empid='$ei'","UPDATE employee SET Project_Name='$pn'WHERE Empid='$ei'",
        "UPDATE employee SET Task_management='$td' WHERE Empid='$ei'",
        "UPDATE employee SET Start_date='$sd' WHERE Empid='$ei'",
        "UPDATE employee SET End_date='$ed' WHERE Empid='$ei'",
        "UPDATE employee SET Availability='$ava' WHERE Empid='$ei'" );
        for($i=0;$i<count($upd);$i++){
        mysqli_query($con,$upd[$i]);}
         
        echo "Update success";
        }
        
          ?>
      </div>
      <div class='content' id="sec6">
        <br><br><br>
      <h2 style="font-family:monospace;font-size:50px"><ins>STATUS</ins></h2>
          <?php
          @include 'config.php';
          $select="SELECT Empid,Name,Task_status FROM user";
          $result=mysqli_query($con,$select);
          if(mysqli_num_rows($result)>0){
            echo"<table><tr><th>Empid</th><th>Name</th><th>Status</th></tr>";
            while($row=mysqli_fetch_assoc($result)){
              echo "<tr><td>".$row['Empid']."</td>";
                    echo"<td>". $row['Name']."</td>";
                    echo"<td>". $row['Task_status']."</td></tr>";
            }
            echo "</table>";
          }
          ?>
      </div>
      

        </form>
      </div>
      </center>
  </body>
</html>