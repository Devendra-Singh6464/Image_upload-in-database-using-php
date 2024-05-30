<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image upload</title>
    <link rel="stylesheet" href="image_upload.css">
</head>
<body>
    <h1>Upload an image in PHP & MySQL</h1>

    <div class="myform">
        <form method="POST" enctype="multipart/form-data">
            <div class="input-field">
                <label>Enter your name</label>
                <input type="text" name="username" required>
            </div>
            <div class="input-field">
                <label> Select image</label>
                <input type="file" name="profile" required>
            </div>
            <div class="submit-btn">
                <button type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>

    <?php
    if(isset($_POST['upload'])){
        // print_r($_FILES['profile']);
        $img_loc = $_FILES['profile']['tmp_name'];
        $img_name = $_FILES['profile']['name'];
        $uname = $_POST['username'];
        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_size = $_FILES['profile']['size']/(1024*1024);
        
        $img_des = "uploaded images/" .$uname. "." .$img_ext;
        
        if(($img_ext!='jpg') && ($img_ext!='png') && ($img_ext!='jpeg') && ($img_ext!='webp')){
            echo"<script>alert('Invalid Image Extension');</script>";
            exit();
        }        

        if($img_size>1){
            echo "<script>alert('Image size greater then 1MB);</script>";
            exit();
        }

        $q = "INSERT INTO `img_data`(`UserName`,`Profile`) VALUES ('$uname', '$img_des')";
        if(mysqli_query($conn, $q)){
            move_uploaded_file($img_loc, $img_des);
            echo"<script>alert('Successful');</script>";
        }
        else{
            echo"<script>alert('Unsuccessful');</script>";
        }

    }
    ?>  

</body>
</html>