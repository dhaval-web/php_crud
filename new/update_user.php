<?php
include "conn.php";

$id = $_GET['edit'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $comment = $_POST['comment'];
    $gender = $_POST['gender'];
    

    $file_name = $_FILES['userfile']['name'];
    $file_size =$_FILES['userfile']['size'];
    $file_tmp =$_FILES['userfile']['tmp_name'];
    $file_type=$_FILES['userfile']['type'];

    move_uploaded_file($file_tmp,"uploaded_img/".$file_name);

    $update_data = "UPDATE users SET name='$name', email='$email', website='$website', comment='$comment', gender='$gender', file='$file_name'  WHERE id = '$id'";
    $upload = mysqli_query($con, $update_data);

    if ($upload) {
        echo '<script>
        alert("record updated");
        window.location.href="display_user.php";
        </script>';
    } else {
      
        echo "something wrong!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <h1>Update User</h1>
        <?php
        $select = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'");
        while ($row = mysqli_fetch_assoc($select)) {
        ?>
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label style="font-size: 40px;">Name:</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
                <label style="font-size: 40px;">Email:</label>
                <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
                <label style="font-size: 40px;">Website:</label>
                <input type="text" name="website" value="<?php echo $row['website']; ?>"><br><br>
                <label style="font-size: 40px;">Comment:</label><br>
                <textarea name="comment" cols="30" rows="5"><?php echo $row['comment']; ?></textarea><br><br>
                <label class="container">Gender:
                    <input type="radio" name="gender" value="female" <?php if ($row['gender'] == 'female') echo 'checked'; ?>> Female
                    <input type="radio" name="gender" value="male" <?php if ($row['gender'] == 'male') echo 'checked'; ?>> Male
                    <input type="radio" name="gender" value="other" <?php if ($row['gender'] == 'other') echo 'checked'; ?>> Other
                </label><br><br>
                <label style="font-size:40px;">Upload File:</label>
                <input type="file" name="userfile" value="<?php echo $row['file']; ?>"><br><br>
                <input type="submit" value="Update">
            </form>
        <?php }; ?>
    </center>
</body>

</html>