<?php $input= ""; ?>
<html>
<form action="" method="POST">
	<input type="text" name="input" value="<?php echo isset($_POST["$input"])?>">
	<input type="submit" value="enter">
</form>
</html>
<?php 
$compressed = "";
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$input=$_POST['input'];
	$length =strlen($input);
	$count =1;
	for($i=1;$i<$length;$i++)
	{
		if($input[$i]==$input[$i-1])
		{
			$count++;

		}
		else
		{
			if($count > 5)
			{
				$compressed .= $input[$i -1] . "/";
			}
			else
			{
				$compressed .= $input[$i -1] . ($count > 1 ? $count: "");
			}
			$count = 1; 

		}
	}
	if($count > 5)
			{
				$compressed .= $input[$i -1] . "/";
			}
			else
			{
				$compressed .= $input[$length -1] . ($count > 1 ? $count : "");
			}
	
	echo "<br>Compressed output: $compressed";
}
?>