<!DOCTYPE HTML>
<html>

<head>
<title>Automated Dice Roller</title>


</head>

<body>
<h1>Roll Dice here:</h1>
<br>
<form action="../GroupProject/dice.php" method='post'>
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
		
		echo "<br>Dice Results:<br>";
		echo "<br>1's: " . $diceCount[1] . "  <br>2's: " . $diceCount[2] . "  <br>3's: " . $diceCount[3] . "
		  <br>4's: " . $diceCount[4] . "  <br>5's: " . $diceCount[5] . "  <br>6's: " . $diceCount[6];
	}
?>
</body>

</html>
