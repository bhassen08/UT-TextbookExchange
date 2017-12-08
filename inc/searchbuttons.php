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
        $isbn;
        if (isset($item['volumeInfo']['industryIdentifiers'][0]['identifier']))
            {
                $isbn=$item['volumeInfo']['industryIdentifiers'][0]['identifier'];
            }
        
	//echo "<br />isbn:" . $isbn . "<br />user:" . $userId . "<br />";
	$tradeQuery = "SELECT * FROM `keeper` WHERE `isbn13`='$isbn' && `available`='1' && `fortrade`='1' && `userid`<>'$userId';";
	$tradeResult = $db->query($tradeQuery) or die("BAD SQL: $tradeQuery");
	$trade=$tradeResult->num_rows;
        
        $rentQuery = "SELECT * FROM `keeper` WHERE `isbn13`='$isbn' && `available`='1' && `rentprice` IS NOT NULL && `userid`<>'$userId';";
	$rentResult = $db->query($rentQuery) or die("BAD SQL: $rentQuery");
	$rent=$rentResult->num_rows;
        
        $sellQuery = "SELECT * FROM `keeper` WHERE `isbn13`='$isbn' && `available`='1' && `sellprice` IS NOT NULL && `userid`<>'$userId';";
	$sellResult = $db->query($sellQuery) or die("BAD SQL: $sellQuery");
	$sell=$sellResult->num_rows;
	
	echo "<a href=\"./send.php?i=" . $isbn . "\"><button type=\"button\" class=\"btn btn-info\">Trade (" . $trade . ")</button></a> ";
	echo "<a href=\"./send.php?i=" . $isbn . "\"><button type=\"button\" class=\"btn btn-info\">Rent (" . $rent . ")</button> ";
	echo "<a href=\"./send.php?i=" . $isbn . "\"><button type=\"button\" class=\"btn btn-info\">Purchase (" . $sell . ")</button><br /><br /><br /><br />";
}else{
	echo "<button type=\"button\" class=\"btn btn-default\">Login to rent/sell/trade!</button>";
}




?>