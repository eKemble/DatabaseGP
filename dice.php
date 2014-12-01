<!DOCTYPE HTML>
<html>

<head>
<title>Automated Dice Roller</title>
<div id="header">
  <?php include 'header.php';?>
</div>


</head>

<body>
<h1>Roll Dice here:</h1>
<br>
<form action="dice.php" method='post'>
			  <label for="dice">Number of dice:</label>
			  <input type="number" name="dice" id="dice" min="1" max="1000" >
			  <br>
			  <br>
			  <input type="submit" name="submit" value="Roll!">
		  </form> 
<?php
	if(isset($_POST['submit']))
	{
		$dice = $_POST['dice'];
		
		$i = 0;
		
		$diceCount[] = 0;
		for($i=0;$i<$dice;$i++)
		{
			$diceCount[rand(1,6)]++;
		}
		
		echo "<table border=\"1\">\n";
		echo "<tr><th>#</th><th>Rolled</th></tr>";
		echo "<tr><td>1's:</td><td>" . $diceCount[1] . "\n</td></tr><tr><td>2's:</td><td>" . $diceCount[2] . "\n</td></tr><tr><td>3's:</td><td>" . $diceCount[3] . "\n</td></tr><tr><td>4's:</td><td>" . $diceCount[4] . "\n</td></tr><tr><td>5's:</td><td>" . $diceCount[5] . "\n</td></tr><tr><td>6's:</td><td>" . $diceCount[6] . "\n</td></tr>";
		echo "</table>\n";
	}
?>
</body>

</html>
