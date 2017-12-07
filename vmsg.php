<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>View Message - University of Toledo Textbook Exchange</title>
        <link rel="stylesheet" type="text/css" href="indexstyles.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
		
    </head>
    <body>
        <!-- Include navigation bar -->
        <?php
        include "./inc/navbar.php";
        require_once "vendor/autoload.php";
        ?>

        <div class="wrapper">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 style="color: #003e7e;" class="display-4">Inbox</h1>
                    <p class="lead">"It's the decisions you make—when you have no time to make them—that define who you are." - Teh_Masterer</p>
                </div>
            </div>

<?php
$id=$_GET['id'];
//$action=$_GET['a'];

if(ctype_digit($id)){
	$userisloggedin=1;  // TODO: lol
	if($userisloggedin=1){ // user log in check here
		require_once(__DIR__ . '/inc/connect.php');
		$connect = DbConnection::getConnection();
		
		$q=$connect->query("SELECT * FROM `messages` WHERE `id`='$id';") or die(mysql_error());
		if(mysqli_num_rows($q)==1){
			$msg=mysqli_fetch_array($q);
			$suid=$msg['1'];
			$q=$connect->query("SELECT `username` FROM `users` WHERE `id`='$suid';") or die(mysql_error());
			$user=mysqli_fetch_array($q);
			echo "From: " . $user['0'] . "<br />";
			echo $msg['3'] . "<br /><br /><br />";
			echo "<a href=\"./send.php?id=" . $id . "&amp;a=1\"><button type=\"button\" class=\"btn btn-info\">Reply</button></a> &nbsp; &nbsp; &nbsp; ";
			echo "<a href=\"./vmsg.php?id=" . $id . "&amp;a=1\"><button type=\"button\" class=\"btn btn-info\">Accept Trade Request</button></a> <br /?<br /><br />";
			
			// Mark as read.
			$connect->query("UPDATE `messages` SET `readreceipt`='1' WHERE `id`='$id';") or die(mysql_error());
		}
		mysqli_close($connect);
		
	}else{
		echo "Session failure.";
	}
	
}elseif(ctype_digit($action)){
	if($id){
		echo $action . "<br />" . $id;
		// action get exists
		// id exists.
	}else{
		echo "Missing message ID.";
	}
	
	
}else{
	echo "Invalid messageID";
}




			

            include "./inc/postmodals.php";
            include "./inc/footer.php";
?>
        </div>
    </body>
</html>