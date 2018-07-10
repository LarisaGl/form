<!DOCTYPE html>
<html>
<head>
  <title>FORM</title>
  <meta charset="UTF-8">
</head>

<body>
<form action="admin.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="ourfile" accept="application/json">  
  <input type="submit" value="Загрузить тест">  
</form>

<?php

$dir = 'tests/';
$files = scandir($dir);
$counts=count($files);
$num=$counts-1;
$newFilename="tests/$num.json";
if (!empty ($_FILES) && array_key_exists('ourfile', $_FILES)) {
	move_uploaded_file($_FILES['ourfile']['tmp_name'], $newFilename);
	echo "Файл сохранен с названием: $num.json";
}

?>

</body>
</html>