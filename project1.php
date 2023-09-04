<!DOCTYPE html>
<htm>
    <head>
        <title>SCHEDULE</title>
        <style>
             label{color:darkslategrey;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 20px;}
            body{margin-top: 200px;margin:100px;}
            button{background-color:lavenderblush;font-size:20px;border:5px solid black;}
        </style>
    </head>
    <body style="background-image: url(project2.jpg);">
        
        <form action="admin.php" method="post">
            <center>
            <h1>TASK MANAGEMENT SYSTEM</h1>
        <table style="background-color:cadetblue;border-radius: 20px;border:12px solid black; padding: 50px;">
        <tr>
            <td><h2><ins>Login</ins>    </h2></td>
        </tr>
        <tr>
        <td><img src="person-workspace.svg" width="50px"></td>    
        <td><button type="submit"style="padding: 12px 50px;border-radius:50px;" >Admin</button></td>
            </tr>
        </form>
        <td><br></td>
        <td><br></td>
        <tr>
        <form action="user.php" method="post">
        <td><img src="person-circle.svg" width="50px"></td> 
        <td><button type="submit" style="padding: 12px 50px; border-radius:50px;">Employee</button></td>
            </tr>
        </form>
        </body>

</htm>