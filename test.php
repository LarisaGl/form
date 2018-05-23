<?php $json = file_get_contents('t1.json');
$decode = json_decode($json, true);
?>


<?php foreach ($decode as $key => $value) { ?>
	<form action="test.php" method="POST">	
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

<?php echo $_POST ['name']; ?>