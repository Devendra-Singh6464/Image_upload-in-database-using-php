<?php
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images Dispaly</title>
    <link rel="stylesheet" href="image_dispaly.css">
</head>

<body>
    <h1>Fatching Data from MySQL Database using php</h1>

    <div class="data">
        <table>
            <thead>
                <th>Serial No</th>
                <th>Name</th>
                <th>Profile</th>
            </thead>
            <tbody>
                <?php
                $q = "SELECT * FROM `img_data`";
                $result = mysqli_query($conn, $q);
                while ($row_fetch = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                        <td>$row_fetch[sr_no]</td>
                        <td>$row_fetch[UserName]</td>
                        <td><img src='$row_fetch[Profile]' width='150px'></td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>