<?php
$dir = new DirectoryIterator('./uploads');

$filename = $_GET['file'];

if ($filename) {
    $filePath = "./uploads/$filename";
    $fileName = basename($filePath);
    $fileSize = filesize($filePath);
    header("Cache-Control: private");
    header("Content-Type: application/stream");
    header("Content-Length: ".$fileSize);
    header("Content-Disposition: attachment; filename=".$fileName);
    readfile($filePath);
}
?>
<!DOCTYPE html>
<html>
<body>
    <p>Files in uploads directory</p>
    <ul>
    <?php
    foreach ($dir as $fileinfo) {
        if (!$fileinfo->isDot()){
            $name = $fileinfo->getFilename();
            echo "<li><a href='fileList.php?file=$name'>$name</a></li>";
        }
    }
    ?>
    </ul>
</body>
</html>
