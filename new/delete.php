<?php
include "conn.php";

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM users WHERE id = $id");
    echo '<script>
            alert("are you sure want to delete?");
            window.location.href="display_user.php";
            </script>';
   };
?>
