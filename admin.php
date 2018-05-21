<!DOCTYPE html>
<html>
<head>
  <title>FORM</title>
  <meta charset="UTF-8">
</head>

<body>
<form action="admin.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="ourfile">  
  <input type="submit" value="Отправить">  
</form>

<?php
if (!empty ($_FILES) && array_key_exists('ourfile', $_FILES)) {
	move_uploaded_file($_FILES['ourfile']['tmp_name'], 'list.php');

	$json = file_get_contents('list.php');
	$decode = json_decode($json, true);
}
?>
	
<?php foreach ($decode as $key => $value) { ?>
	<form action="test.php" method="GET">	
	<fieldset>
    <legend><?php echo $key; ?></legend>
    	<?php foreach ($value as $k => $v) {
    		foreach ($v as $e => $val) { ?>
   		<label><input type="radio" name="name"><?php echo $val?></label>
    		<?php } ?>
    	<?php } ?>
    </fieldset>	
<input type="submit" value="Отправить">  
</form>
<?php } ?>

<?php echo $_GET ['name']; ?>

</body>
</html>