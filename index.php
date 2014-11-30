<!DOCTYPE HTML>
<html>

<head>
<title> Warhammer 40k Army Companion</title>

<div id="header">
  <?php include 'header.php';?>
</div>
</head>

<body>
<h1>Burn the Heretic. Kill the Mutant. Purge the Unclean!</h1>

<?php
	function add_unit_to_army($unit_id)
	{
		$conn = pg_connect("host=dbhost-pgsql.cs.missouri.edu port=5432 user= password=") or die('Could not connect: ' . pg_last_error()); //ADD SQL INFO
		$result = pg_prepare($conn, "point_query", "SELECT init_point_cost FROM warhammer.unit_list WHERE unit_id=$1");
		$result = pg_execute($conn, "point_query", array($unit_id));
		$result_a = pg_fetch_array($result,0,PGSQL_ASSOC);
		$points = $result_a["init_point_cost"];

		$result = pg_prepare($conn, "add_query", "INSERT INTO warhammer.user_army VALUES (DEFAULT,$1,null,$2)");
		$result = pg_execute($conn, "add_query", array($unit_id,$points));
		pg_free_result($result);

	}

?>
</body>

</html>
