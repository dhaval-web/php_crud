<?php
$msgErr = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <a href="display_user.php">view user data</a>
        <h1>Registration</h1>
        <form  action="add_users.php" method="post" enctype="multipart/form-data">
            <label style="font-size: 40px;"> Name:</label>
            <input type="text" name="name" id=""><br><br>
            <label style="font-size: 40px;"> Email:</label>
            <input type="text" name="email" id="" required><br><br>
            <label style="font-size: 40px;">Website:</label>
            <input type="text" name="website" id=""><br><br>
            <label style="font-size: 40px;">Comment: </label>
            <textarea name="comment" id="" cols="30" rows="5"></textarea><br><br>
            <label class="container">Gender:
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="other">Other
            </label><br><br>

            <label style="font-size:40px;">Upload File:</label>
            <input type="file" name="userfile" value="">
            <br><br>

            <label style="font-size:40px;">confirm all </label>
            <input type="checkbox" value="confirm" name="confirm" id=""><br><br>
            <input type="submit" value="add_user"><br>
            <span style="color:red">* <?php echo $msgErr;?></span>
        </form>
    </center>
</body>

</html>