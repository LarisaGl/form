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
?>


<form action="" method="POST">	
    <?php
        foreach ($decode as $num => $quest) { ?>
	<fieldset>
        <legend><?php echo $quest['ask']; ?></legend>
        <?php
            foreach ($quest['answer'] as $var_ans => $ans) {?>
        <label><input type="radio" name="<?php echo $num?>" value="<?php echo $var_ans;?>"><?php echo $ans; ?></label>
    <?php } ?>
    </fieldset>
    <?php } ?>
	<input type="submit" value="Узнать результат" name="result">  
</form>

<?php
if (isset($_POST['result'])) {
	$i=0;
	foreach ($decode as $key => $value) {
		if ($value['right_answer']==$_POST[$key]) {
		$i++;
		}
	}
	echo "Правильных ответов: $i";
}
?>

</body>
</html>