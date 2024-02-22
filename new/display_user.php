
<?php include "conn.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display users list</title>
</head>
<style>
table, th, td {
  border:1px solid black;
  align-items: center;
}
</style>
<body>
    <table style="width:90%">
        <tr>
           <th>Id</th>
            <th>Name</th>
            <th>email</th>
            <th>Website</th>
            <th>Comment</th>
            <th>Gender</th>
            <th>File_Uploaded</th>
            <th colspan="2">Action</th>
       </tr>
        <?php

           $display = mysqli_query($con,"SELECT * FROM users");
           while($row = mysqli_fetch_array($display)){
            echo "<tr>";

            echo "<td>" . $row['id'] . "</td>";
          
            echo "<td>" . $row['name'] . "</td>";
          
            echo "<td>" . $row['email'] . "</td>";
          
            echo "<td>" . $row['website'] . "</td>";

            echo "<td>" . $row['comment'] . "</td>";

            echo "<td>" . $row['gender'] . "</td>";

            echo "<td> <img src='uploaded_img/" . $row['file'] . "' height='100'> </td>";

            ?>
            <td><a href="delete.php?delete=<?php echo $row['id']; ?>">Delete</a></td>
            <td><a href="update_user.php?edit=<?php echo $row['id']; ?>">update</a></td>
           <?php
           }
           ?>
          <h2> <a href="form.php">Form Page</a></h2>
    </table>
</body>
</html>