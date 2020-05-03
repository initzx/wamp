<?php
$target_dir = "./uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if ($_FILES["fileToUpload"]["tmp_name"]){
    $response = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
?>

<!DOCTYPE html>
<html>
    <body>
        <p>See files <a href="fileList.php">here</a></p>
        <?php include './upload.php';  ?>
        <?php
        if (!isset($response)) {
            return;
        }

        if ($response) {
            echo "<p>Your file has been uploaded</p>";
        } else {
            echo "<p>Sorry, there was an error uploading your file.</p>";
        }
        ?>
    </body>
</html>

