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
	//returns the array of the army as such 0: Army ID 1: Assault 2: Heavy 3: Melee 4: Transport 5: Heavy Support
	function simpArmy($army)
	{
		$army_makeup[] = 0;
		
		$army_makeup[0] = $army;
		
		if($army = 1)
		{
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 1 AND (weapon_id = 4 OR weapon_id = 5 OR weapon_id = 6 OR weapon_id = 12 OR weapon_id = 13
			OR weapon_id = 15 OR weapon_id = 17 OR weapon_id = 18 OR weapon_id = 20 OR weapon_id = 21 OR weapon_id = 23 OR weapon_id = 27 OR weapon_id = 28 OR weapon_id = 30
			OR weapon_id = 32 OR weapon_id = 34)");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[1] = $result_a[0];
			
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 1 AND (weapon_id = 1 OR weapon_id = 2 OR weapon_id = 3 OR weapon_id = 9 OR weapon_id = 10 OR weapon_id = 11 OR weapon_id = 14
			OR weapon_id = 16 OR weapon_id = 19 OR weapon_id = 22 OR weapon_id = 24 OR weapon_id = 25 OR weapon_id = 26 OR weapon_id = 26 OR weapon_id = 31 OR weapon_id =  33 OR weapon_id = 34)");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[2] = $result_a[0];
			
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 1 AND (weapon_id = 7 OR weapon_id = 8 OR weapon_id = 29)");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[3] = $result_a[0];
		}
		else if($army = 2)
		{
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 2 AND (weapon_id = 1 OR weapon_id = 3 OR weapon_id = 4 OR weapon_id = 5 OR weapon_id = 6 OR weapon_id = 8 OR weapon_id = 12
			OR weapon_id = 15 OR weapon_id = 16 OR weapon_id = 17 OR weapon_id = 18 OR weapon_id = 19 OR weapon_id = 20)");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[1] = $result_a[0];
			
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 2 AND (weapon_id = 2 OR weapon_id = 7 OR weapon_id = 9 OR weapon_id = 10 OR weapon_id = 11 OR weapon_id = 13  OR weapon_id = 21)");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[2] = $result_a[0];
			
			$result = pg_query("SELECT SUM(point_cost) FROM warhammer.user_army LEFT OUTER JOIN warhammer.unit_list WHERE army_id = 2 AND weapon_id = 14");
			
			$result_a = pg_fetch_array($result, 0 , PGSQL_NUM);
			
			$army_makeup[3] = $result_a[0];
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
				$multi1[] = array(0, 10, 10, 2.5, 15, 20);
			}
			else if($terrain == 2)
			{
				$multi1[] = array(0, 7.5, 7.5, 5, 10, 15);
			}
			else if ($terrain == 3)
			{
				$multi1[] = array(0, 5, 5, 7.5, 15, 20);
			}
		}
		else
		{
			if($terrain == 1)
			{
				$multi1[] = array(0, 7.5, 7.5, 10, 15, 20);
			}
			else if($terrain == 2)
			{
				$multi1[] = array(0, 5, 5, 10, 10, 15);
			}
			else if ($terrain == 3)
			{
				$multi1[] = array(0, 5, 5, 15, 15, 20);
			}
		}
		
		if($type2 == 1)
		{
			if($terrain == 1)
			{
				$multi2[] = array(0, 10, 10, 2.5, 15, 20);
			}
			else if($terrain == 2)
			{
				$multi2[] = array(0, 7.5, 7.5, 5, 10, 15);
			}
			else if ($terrain == 3)
			{
				$multi2[] = array(0, 5, 5, 7.5, 15, 20);
			}
		}
		else
		{
			if($terrain == 1)
			{
				$multi2[] = array(0, 7.5, 7.5, 10, 15, 20);
			}
			else if($terrain == 2)
			{
				$multi2[] = array(0, 5, 5, 10, 10, 15);
			}
			else if ($terrain == 3)
			{
				$multi2[] = array(0, 5, 5, 15, 15, 20);
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
		$conn = pg_connect("host=dbhost-pgsql.cs.missouri.edu port=5432 user= password= ") or die('Could not connect: ' . pg_last_error()); //ADD SQL INFO
		
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
