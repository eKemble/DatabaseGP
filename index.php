<!DOCTYPE HTML>
<html>

<head>
<title> Warhammer 40k Army Companion</title>

<div id="header">
  <?php include 'header.php';?>
</div>


<h1 id="quote">Burn the Heretic. Kill the Mutant. Purge the Unclean!</h1>
</head>

<body>
<p>Army List Builder:</p>
<br>





<?php
	//$conn = pg_connect("host=dbhost-pgsql.cs.missouri.edu port=5432 user= password= ") or die('Could not connect: ' . pg_last_error());
	include("../../secure/database.php");
    $conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD) or die('Could not connect: ' . pg_last_error());
	$budget = 2000;
	if(isset($_POST['submit'])){
		add_unit_to_army($_POST['unit']);
	}
	if(isset($_POST['clear'])){
		pg_query("DELETE FROM warhammer.user_army");
	}


   if ($_POST['army'] == 1){
      	echo "<form action=\"index.php\" method='post'>
           <select name=\"unit\">\n";
       	$result = pg_query("SELECT unit_id,unit_name,init_point_cost FROM warhammer.unit_list WHERE army_id=1") or die('Query failed: ' . pg_last_error());
		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC))
		{
			echo "\t\t<option value=\"" . $line["unit_id"] . "\" selected=\"selected\">" . $line["unit_name"] ." - ". $line["init_point_cost"] ."</option>\n";
        }	
        echo "</select>\n";
  // loop the above option tag to have a drop down selecter for the available army units
 		echo "	<input type=\"submit\" name=\"submit\" value=\"Add Unit\">\n";
 		echo "	<input type=\"submit\" name=\"clear\" value=\"Clear All\">\n";
		echo "		</form>\n";
	//}
	
	print_army_table();

	echo "<br>\nTotal Point Value: " . get_army_value() . "/" . $budget;

	if(get_army_value() > $budget) {echo " (OVER BUDGET)\n";} else {echo "\n";}
	pg_free_result($result);
   }
   
      if ($_POST['army'] == 2){
      	echo "<form action=\"index.php\" method='post'>
           <select name=\"unit\">\n";
       	$result = pg_query("SELECT unit_id,unit_name,init_point_cost FROM warhammer.unit_list WHERE army_id=2") or die('Query failed: ' . pg_last_error());
		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC))
		{
			echo "\t\t<option value=\"" . $line["unit_id"] . "\" selected=\"selected\">" . $line["unit_name"] ." - ". $line["init_point_cost"] ."</option>\n";
        }	
        echo "</select>\n";
  // loop the above option tag to have a drop down selecter for the available army units
 		echo "	<input type=\"submit\" name=\"submit\" value=\"Add Unit\">\n";
 		echo "	<input type=\"submit\" name=\"clear\" value=\"Clear All\">\n";
		echo "		</form>\n";
	//}
	
	print_army_table();

	echo "<br>\nTotal Point Value: " . get_army_value() . "/" . $budget;

	if(get_army_value() > $budget) {echo " (OVER BUDGET)\n";} else {echo "\n";}
	pg_free_result($result);
   }
   
   else{
        echo "
        <form action=\"index.php\" method='post'>
        <select name=\"army\">
        <option value=\"1\" selected=\"selected\">Space Marines</option>
        <option value=\"2\">Orks</option>
        </select> <br>";
        echo "	<input type=\"submit\" name=\"submit\" value=\"Select\">\n";
   }

	function add_unit_to_army($unit_id)
	{
		$result = pg_prepare("point_query", "SELECT init_point_cost FROM warhammer.unit_list WHERE unit_id=$1");
		$result = pg_execute("point_query", array($unit_id));
		$result_a = pg_fetch_array($result,0,PGSQL_ASSOC);
		$points = $result_a["init_point_cost"];
		$result = pg_prepare("add_query", "INSERT INTO warhammer.user_army VALUES (DEFAULT,$1,null,$2)");
		$result = pg_execute("add_query", array($unit_id,$points));
		pg_free_result($result);
	}

	function get_army_value()
	{
		$result = pg_query("SELECT sum(point_cost) as point_total FROM warhammer.user_army");
		$result_a = pg_fetch_array($result,0,PGSQL_ASSOC);
		return $result_a["point_total"];
	}

	function print_army_table()
	{
		//this query is pretty disgusting but the code isn't due yet
        $result = pg_query("SELECT unit_name as \"Name\",unit_composition as \"Composition\",unit_list.strength as \"Strength\",toughness as \"Toughness\",wounds as \"Wounds\",initiative as \"Initiative\",attacks as \"Attacks\",leadership as \"Leadership\",save as \"Save\", weapon_name as \"Weapon Name\",range as \"Weapon Range\",weapons.strength as \"Weapon Strength\",armor_penetration as \"Armor Penetration\",user_army.point_cost as \"Point Cost\" FROM warhammer.user_army INNER JOIN warhammer.unit_list ON (warhammer.user_army.unit_id = warhammer.unit_list.unit_id) LEFT JOIN warhammer.weapons ON (warhammer.user_army.weapon_id = warhammer.weapons.weapon_id) ORDER BY point_cost DESC, unit_composition ASC") or die('Query failed: ' . pg_last_error());		// Printing results in HTML
		echo "<table border=\"1\">\n";
		echo "\t<tr>\n";
		for ($i = 0; $i < pg_num_fields($result); $i++)
		{
			$colname = pg_field_name($result,$i);
			echo "\t\t<th>$colname</th>\n";
		}
		echo "\t</tr>\n";
		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC))
		{
			echo "\t<tr>\n";
			foreach ($line as $col_value)
			{
				echo "\t\t<td>$col_value</td>\n";
			}
			echo "\t</tr>\n";
		}
		echo "</table>\n";
	}
?>
</body>

</html>
