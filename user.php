<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
   
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
    border: 2px solid burlywood;
  }
  
  .button2:hover {
    background-color:burlywood;
    color: white;
  }
  .main {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background-color:aquamarine;
}
.file{
  
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
  </style>
   <title> User page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-sacle=1.0">
  <link rel="stylesheet" type="text/css" href="stylesus.css">
  </head>
  <body>
    <header>
      <div class="main">
        <ul>
          <li><a href="#sec2">Personal details</a></li>
          <li><a href="#sec3">Task details</a></li>
          <li><a href="#sec4">Submission</a></li>
          <li><a href="#sec5">Task status</a></li>
          <li><a href="logout.php" class="btn">logout</a>
        </ul>
      </div>
      <div class="title" id='sec1'>
      <p style="font-size:90px;padding:200px;"><b><font color='orange' ><ins style="background-color:black;">
      WELCOME <?php echo $_SESSION['adname']?>!!</ins></font></b></p>
      </div>
      <center>
      <div class='content' id="sec2">
        <br><br><br>
      <h2 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:50px">
      <ins>YOUR DETAILS</ins></h2>
      <br>
          <?php
          
          
          $us=$_SESSION['empid'];
          @include 'config.php';
          
          $select="SELECT * FROM user WHERE EmpId='$us'";
          $result=mysqli_query($con,$select);
          if(mysqli_num_rows($result)>0){
            echo"<table><tr><th>Empid</th><th>Name</th><th>Address</th><th>Phone_number</th>
            <th>DOB</th><th>Email</th></tr>";
            while($row=mysqli_fetch_assoc($result)){
              echo "<tr><td>".$row['EmpId']."</td>";
                    echo"<td>". $row['Name']."</td>";
                    echo"<td>". $row['Address']."</td>";
                    echo"<td>". $row['Phone_number']."</td>";
                    echo "<td>". $row['DOB']."</td>";
                    echo "<td>". $row['Email']."</td></tr>";
            }
            echo "</table>";
          }
          ?>
          
        </div>
        <div class='content' id="sec3">
        <br><br><br>
        <h2 style="font-family:monospace;font-size:50px"><ins>YOUR TASK TO BE COMPLETED</ins></h2>
          <br>
          <?php
        $us=$_SESSION['empid'];
        @include 'config.php';
        $select="SELECT Empid,Name,ProjectID,Project_Name,Task_description,Start_date,End_date FROM employee WHERE Empid='$us'";
        $result=mysqli_query($con,$select);
        if(mysqli_num_rows($result)>0){
          echo"<table><tr><th>Empid</th><th>Name</th><th>ProjectID</th><th>Project_Name</th><th>Task_description</th>
          <th>Start_date</th><th>End_date</th></tr>";
          while($row=mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row['Empid']."</td>";
                  echo"<td>". $row['Name']."</td>";
                  echo"<td>". $row['ProjectID']."</td>";
                  echo"<td>". $row['Project_Name']."</td>";
                  echo"<td>". $row['Task_description']."</td>";
                  echo"<td>". $row['Start_date']."</td>";
                  echo"<td>". $row['End_date']."</td></tr>";
          }
          echo "</table>";
          
        }
        ?></div>
        <div id="sec4">

        <form method="post" enctype="multipart/form-data" >
        <br> <br> <br>
        <h2 style="font-family:monospace;font-size:50px"><ins>SUBMIT YOUR FILE HERE.. </ins></h2>

<!-- <input type="hidden" name="MAX_FILE_SIZE" value="1048576"> -->
<table>
  <tr>
<td><label>Insert the file</label></td>
<td><input class="file" type="file" name="file" /></tr>
<tr>
<td><button class="button button2" type="submit" name="upload">Upload</button></td></tr>
</table>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form has been submitted via POST

    // Check if there was an error during file upload
    if ($_FILES["file"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"];
    } else {
        // File details
        $file_name = $_FILES["file"]["name"];
        $file_type = $_FILES["file"]["type"];
        $file_size = $_FILES["file"]["size"];
        $file_tmp_name = $_FILES["file"]["tmp_name"];
        // You can also perform validation or checks on the file if needed.

        // Move the uploaded file to a desired location (e.g., uploads/ directory)
        $target_directory = "A:/";
        $target_path = $target_directory . $file_name;

        if (move_uploaded_file($file_tmp_name, $target_path)) {
            echo "File uploaded successfully.<br>";
            echo "File Name: " . $file_name . "<br>";
            echo "File Type: " . $file_type . "<br>";
            echo "File Size: " . $file_size . " bytes<br>";
        } else {
            echo "Error uploading file.";
        }
    }
}
?>





        </div>

<div id="sec5">

  <?php
  @include 'status.php';
  ?>
</div>

      </center>
  </body>
</html>