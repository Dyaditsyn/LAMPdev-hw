<?php
$uploaddir = dirname(__FILE__) . DIRECTORY_SEPARATOR . "uploads";
if (!empty($_FILES)) {
    $uploadFile =  $uploaddir . DIRECTORY_SEPARATOR . basename($_FILES['file']['name']);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>PHP files</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="main_page">
        <h1>PHP uplod files </h1>
        <form enctype="multipart/form-data" method="POST" action="upload.php">
            <ul class="wrapper">
                <li class="form-row">
                    <label for="image">Image</label>
                    <input type="file" name="file">
                </li>
                <li class="form-row">
                    <input type="submit" value="Send Request">
                </li>
            </ul>
        </form>
    </div>
</body>

</html>