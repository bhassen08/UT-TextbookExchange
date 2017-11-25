<?
// Connect to the DB
//	Connect and check if we are connected to the MySQL DB
$connect=new mysqli('localhost', 'xbucketo_tt', 'blaff22laff13', 'xbucketo_tt');
if ($connect->connect_errno){
	printf("Connect failed: %s\n", $connect->connect_error);
	exit();
}
?>