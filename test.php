<!DOCTYPE html>
<html>
<head>
  <title>TEST</title>
  <meta charset="UTF-8">
</head>

<body>

<?php
$filename=$_GET['test'];
$json = file_get_contents("tests/$filename");
$decode = json_decode($json, true);
$i=1;
?>


<form action="test.php" method="POST">	
	<?php
	foreach ($decode as $num) {
		foreach ($num as $quest) {
			$i=$i+1;?>
	<fieldset>
	<legend><?php echo $quest['ask']; ?></legend>
	<?php
	foreach ($quest as $var) {
		if (is_array($var)) {
			foreach ($var as $var_ans) {
				foreach ($var_ans as $ans) { ?>
    <label><input type="radio" name="name_<?php echo $i?>"><?php echo $ans;?></label>
     <?php
 	}
 		}
			}
    			} ?>
    </fieldset>
    <?php
	}
		} ?>
	<input type="submit" value="Отправить">  
</form>

</body>
</html>