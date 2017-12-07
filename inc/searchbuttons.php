<?php
$trade=0;
$rent=0;
$sell=0;



if(isset($_SESSION['user'])){ //user is logged in
	$userName = $db->real_escape_string($_SESSION['user']);
	// GET USER ID
	$getUserIdQuery = "SELECT users.id FROM users WHERE username = '$userName'";
	$userIdResult = $db->query($getUserIdQuery) or die("BAD SQL: $getUserIdQuery");
	$userId = $userIdResult->fetch_row();
	$userId=$userId['0'];

	$isbn=$item['volumeInfo']['industryIdentifiers'][0]['identifier'];
	//echo "<br />isbn:" . $isbn . "<br />user:" . $userId . "<br />";
	$q = "SELECT * FROM `keeper` WHERE `isbn13`='$isbn' && `available`='1' && `fortrade`='1' && `userid`<>'$userId';";
	$tradeq = $db->query($q) or die("BAD SQL: ");
	$trade=$tradeq->num_rows;
	
	echo "<a href=\"./send.php?i=" . $isbn . "\"><button type=\"button\" class=\"btn btn-info\">Trade (" . $trade . ")</button></a> ";
	echo "<button type=\"button\" class=\"btn btn-info\">Rent (" . $rent . ")</button> ";
	echo "<button type=\"button\" class=\"btn btn-info\">Purchase (" . $sell . ")</button><br /><br /><br /><br />";
}else{
	echo "<button type=\"button\" class=\"btn btn-default\">Login to rent/sell/trade!</button>";
}




?>