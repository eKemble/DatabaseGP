<!DOCTYPE HTML>
<html>
<head>
<meta charset=UTF-8>
<title>Battle Predictor</title>
</head>
<body>
	<form method="POST" action="calculator.php">
		<select name="army1">
			<option value="1" >Space Marines</option>
			<option value="2" >Orks</option>
		</select>
		<select name="army2">
			<option value="1" >Space Marines</option>
			<option value="2" >Orks</option>
		</select>
		<select name="terrain">
			<option value="1" >Field</option>
			<option value="2" >Forest</option>
			<option value="3" >Urban</option>
		</select>
		<input type="submit" name="submit" value="Execute" />
		
<?php
	//used to simplify each army into an array of the types of units it contains
	//returns the array of the army as such 0: Army ID 1: HQ 2: Troops 3: Elites 4: Fast Attack 5: Heavy Support 6: Transport
	function simpArmy($army)
	{
		$army_makeup[] = 0;
		
		$army_makeup[0] = $army;
		
		if($army == 1)
		{
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 1 AND unit_profile LIKE 'HQ'");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[1] = $result_a[0];
			
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 1 AND unit_profile LIKE 'Troops'");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[2] = $result_a[0];
			
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 1 AND unit_profile LIKE 'Elites'");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[3] = $result_a[0];
			
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 1 AND unit_profile LIKE 'Fast Attack'");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[4] = $result_a[0];
			
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 1 AND unit_profile LIKE 'Heavy Support'");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[5] = $result_a[0];
			
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 1 AND unit_profile LIKE 'Transport'");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[6] = $result_a[0];
		}
		else if($army == 2)
		{
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 2 AND unit_profile LIKE 'HQ'");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[1] = $result_a[0];
			
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 2 AND unit_profile LIKE 'Troops'");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[2] = $result_a[0];
			
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 2 AND unit_profile LIKE 'Elites'");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[3] = $result_a[0];
			
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 2 AND unit_profile LIKE 'Fast Attack'");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[4] = $result_a[0];
			
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 2 AND unit_profile LIKE 'Heavy Support'");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[5] = $result_a[0];
			
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 2 AND unit_profile LIKE 'Transport'");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[6] = $result_a[0];
		}
		
		pg_free_result($result);
		
		return $army_makeup;
	}
	
	//compares the 2 simplified armies in array form and returns the predicted result:
	// 1: Army 1 wins, 2: Army 2 wins, 0: Draw
	function compArmy($army1, $army2)
	{
		$type1 = $army1[0];
		$type2 = $army2[0];
		
		$score1 = 0;
		$score2 = 0;
		
		$terrain = $_POST['terrain'];
		
		if($type1 == 1)
		{
			if($terrain == 1)
			{
				$multi1[] = array(0, 10, 7.5, 10, 5, 20, 15);
			}
			else if($terrain == 2)
			{
				$multi1[] = array(0, 10, 10, 10, 7.5, 15, 10);
			}
			else if ($terrain == 3)
			{
				$multi1[] = array(0, 10, 12.5, 10, 10, 10, 10);
			}
		}
		else
		{
			if($terrain == 1)
			{
				$multi1[] = array(0, 10, 5, 10, 10, 20, 15);
			}
			else if($terrain == 2)
			{
				$multi1[] = array(0, 10, 7.5, 10, 12.5, 15, 10);
			}
			else if ($terrain == 3)
			{
				$multi1[] = array(0, 10, 10, 10, 15, 10, 10);
			}
		}
		
		if($type2 == 1)
		{
			if($terrain == 1)
			{
				$multi1[] = array(0, 10, 5, 10, 7.5, 20, 15);
			}
			else if($terrain == 2)
			{
				$multi1[] = array(0, 10, 7.5, 10, 10, 15, 10);
			}
			else if ($terrain == 3)
			{
				$multi1[] = array(0, 10, 10, 10, 12.5, 10, 10);
			}
		}
		else
		{
			if($terrain == 1)
			{
				$multi1[] = array(0, 10, 5, 10, 10, 20, 15);
			}
			else if($terrain == 2)
			{
				$multi1[] = array(0, 10, 7.5, 10, 12.5, 15, 10);
			}
			else if ($terrain == 3)
			{
				$multi1[] = array(0, 10, 10, 10, 15, 10, 10);
			}
		}
		
		$i = 0;
		
		for ($i=1;$i<5;$i++)
		{
			$score1 += $army1[$i] * $multi1[$i];
			$score2 += $army2[$i] * $multi2[$i];
		}
		
		if($score1 > $score2)
		{
			return 1;
		}
		else if ($score2 > $score1)
		{
			return 2;
		}
		else
		{
			return 0;
		} 
	}
	
	if(isset($_POST['submit']))
	{
		include("../../secure/database.php");
		$conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD) or die('Could not connect: ' . pg_last_error());
		
		$army1 = $_POST['army1'];
		$army2 = $_POST['army2'];
		
		$simparmy1[] = simpArmy($army1);
		$simparmy2[] = simpArmy($army2);
		
		$result = compArmy($simparmy1, $simparmy2);
		
		if($result == 1)
			echo "The first army would win.";
		else if ($result == 2)
			echo "The second army would win.";
		else
			echo "It would be a draw.";
	} 
?>
	</form>
</body>
</html>
