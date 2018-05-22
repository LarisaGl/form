<!DOCTYPE html>
<html>
<head>
  <title>FORM</title>
  <meta charset="UTF-8">
</head>

<body>
<form action="admin.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="ourfile" accept="application/json">  
  <input type="submit" value="Отправить">  
</form>

<?php
if (!empty ($_FILES) && array_key_exists('ourfile', $_FILES)) {
	move_uploaded_file($_FILES['ourfile']['tmp_name'], 't1.php');

	$json = file_get_contents('t1.php');
	$decode = json_decode($json, true);
}
?>

</body>
</html>