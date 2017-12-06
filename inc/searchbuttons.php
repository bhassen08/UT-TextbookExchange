<?php
$trade=0;
$rent=0;
$sell=0;
if($results){
	$isbn13=$results[0]['volumeInfo']['industryIdentifiers'][0]['identifier'];
	$q = "SELECT * FROM `keeper` WHERE `isbn13`='$isbn13' && `available`='1';";
	$tradeq = $db->query($q) or die("BAD SQL: ");
	$trade=$tradeq->num_rows;
	echo "trade" . $trade;
}else{ //item foreach statement
	$isbn13=$item['volumeInfo']['industryIdentifiers'][0]['identifier'];
	$q = "SELECT * FROM `keeper` WHERE `isbn13`='$isbn13' && `available`='1';";
	$tradeq = $db->query($q) or die("BAD SQL: ");
	$trade=$tradeq->num_rows;
}


echo "<a href=\"./send.php?i=" . $isbn13 . "\"><button type=\"button\" class=\"btn btn-info\">Trade (" . $trade . ")</button></a> ";
echo "<button type=\"button\" class=\"btn btn-info\">Rent (" . $rent . ")</button> ";
echo "<button type=\"button\" class=\"btn btn-info\">Purchase (" . $sell . ")</button>";

?>