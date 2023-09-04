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
    <center>
    <table style="background-color:lemonchiffon;border-radius: 50px;border:10px solid black; padding:15px">
<tr><td><label>Enter your Task completion status: </label></td>
    <td><select  name='tc'></td></tr>
    <tr><td><option value="-">-</option></td></tr>
    <br>
    <tr><td><option value="Completed">Completed</option></td></tr>
    <br>
    <tr><td><option value="In progress">In Progress</option></td></tr>
    <br>
    <tr><td><option value="None">Null</option></td></tr>
    <br>
    </table>
    </center>
</form>