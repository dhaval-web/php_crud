<?php
include "conn.php";

$name = $email = $gender = $comment = $website = $file = $confirm = "";
$msgErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || empty($_POST["email"]) ||  empty($_POST["comment"]) || empty($_POST["gender"])) {
        $msgErr = "All fields are required";
    } else {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $website = test_input($_POST["website"]);
        $comment = test_input($_POST["comment"]);
        $gender = test_input($_POST["gender"]);
        $confirm = isset($_POST["confirm"]) ? 1 : 0;
  
        $file_name = $_FILES['userfile']['name'];
        $file_size = $_FILES['userfile']['size'];
        $file_tmp = $_FILES['userfile']['tmp_name'];
        $file_type = $_FILES['userfile']['type'];

        move_uploaded_file($file_tmp, "uploaded_img/" . $file_name);

        $insert = "INSERT INTO users (name, email, website, comment, gender, file, conform)
                   VALUES ('$name', '$email', '$website', '$comment', '$gender', '$file_name', '$confirm')";
       
       if (mysqli_query($con, $insert)) {
            echo '<script>
            alert("record inserted");
            window.location.href="display_user.php";
            </script>';
        } else {
            echo "Error: " . $insert . "<br>" . $conn->error;
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}
