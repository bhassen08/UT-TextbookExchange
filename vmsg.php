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
                    <p class="lead">"It's the decisions you make—when you have no time to make them—that define who you are." -Teh_Masterer</p>
                </div>
            </div>

<?php
$id=$_GET['id'];
//$action=$_GET['a'];

if(ctype_digit($id) && empty($_GET['a'])){
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
			echo "&nbsp; &nbsp; &nbsp; &nbsp; From: " . $user['0'] . "<br />";
			echo "&nbsp; &nbsp; &nbsp; &nbsp; " . $msg['3'] . "<br /><br /><br />";
			echo "&nbsp; &nbsp; &nbsp; &nbsp; <a href=\"./vmsg.php?id=" . $id . "&amp;a=1\"><button type=\"button\" class=\"btn btn-info\">Reply</button></a> &nbsp; &nbsp; &nbsp; ";
			echo "&nbsp; &nbsp; &nbsp; &nbsp; <a href=\"./vmsg.php?id=" . $id . "&amp;a=2\"><button type=\"button\" class=\"btn btn-info\">Accept Trade Request</button></a> <br /?<br /><br />";
			
			// Mark as read.
			$connect->query("UPDATE `messages` SET `readreceipt`='1' WHERE `id`='$id';") or die(mysql_error());
		}
		mysqli_close($connect);
		
	}else{
		echo "Session failure.";
	}
	
}elseif(ctype_digit($_GET['a'])){
	$action=$_GET['a'];
	if($id){
		// action get exists
		// id exists.
			if($action=1){ //reply
				if($_GET['i']){
				?>
					<br /><br /><h2>Compose a message:</h2>
					<?php
					// sender, receiver, message, sent, keeperid, actiontype
						$isbn13=$_GET['i'];
						
						$userName = $db->real_escape_string($_SESSION['user']);
						// GET USER ID
						$getUserIdQuery = "SELECT xbucketo_utte.users.id FROM xbucketo_utte.users WHERE username = '$userName'";
						$userIdResult = $db->query($getUserIdQuery) or die("BAD SQL: $getUserIdQuery");
						$sender = $userIdResult->fetch_row();
						$sender=$sender['0'];
						$to = $db->real_escape_string($_SESSION['user']);
						// GET USER ID
						$firstavail = "SELECT `id`,`userid` FROM `keeper` WHERE `isbn13`='$isbn13' && `available`='1' LIMIT 1;";
						$to = $db->query($firstavail) or die("BAD SQL: $");
						$arr=$to->fetch_row();
						$keeperid=$arr['0'];
						$receiver=$arr['1'];
						$actiontype=1; // 0= reply 1= trade, 2= rent for $, 3= sell for $$$
						
						/* echo "<pre>";
						echo "<br> sender/whoami:" . $sender;
						echo "<br> k-id:" . $keeperid;
						echo "<br> receiever:" . $receiver;
						echo "<br> aciton type:" . $actiontype;
						echo "</pre>"; */
						
					?>
					<p><form method="POST" action="./send.php" >
						<input type="hidden" name="sender" value="<?php echo $sender; ?>" ></input>
						<input type="hidden" name="to" value="<?php echo $receiver; ?>" ></input>
						<input type="hidden" name="isbn13" value="<?php echo $isbn13; ?>" ></input>
						<input type="hidden" name="keeperid" value="<?php echo $keeperid; ?>" ></input>
						<input type="hidden" name="actiontype" value="<?php echo $actiontype; ?>" ></input>
						Message: <textarea cols="50" rows="6" name="msg"></textarea> <input type="submit" value="Send"></input>
					</form></p>
					<?php
					
			}elseif($_POST['actiontype']){ // add other variables to confirm that the message post variables are passed. 

				$sender=$_POST['sender'];
				$receiver=$_POST['to'];
				$msg=$_POST['msg'];
				$keeperid=$_POST['keeperid'];
				$actiontype=$_POST['actiontype'];
				
				// 1= trade, 2= rent for $, 3= sell for $$$	
				
				require_once(__DIR__ . '/inc/connect.php');
				$connect = DbConnection::getConnection();
				
				if($connect->query("INSERT INTO `messages` (`sender`, `receiver`, `message`, `keeperid`, `actiontype`) VALUES ('$sender', '$receiver', '$msg', '$keeperid', '$actiontype');")){
					echo "<h1>Thank you!</h1>";
					echo "<p>Your reqest has been sent to the first available student with the book you requested.<br />Once they receive your request, they can reply, and approve/deny the trade.<br /><br />";
					echo "<a href=\"./mybooks.php\">Return to myBooks page</a><br />";
					echo "<a href=\"./inbox.php\">Go to Inbox</a></p><br />";
				}else{
					echo "Message sending failed.";
				}
				
				mysqli_close($connect);	
				
			}else{
				echo "invalid request";
			}
			}elseif($action=2){ // accept the request
				echo "action 2";
			}else{
				echo "Invalid ActionID";
			}
	}else{
		echo "Missing message ID.<br />";
	}

	
}else{
	echo "Invalid ActionID";
}




			

            include "./inc/postmodals.php";
            include "./inc/footer.php";
?>
        </div>
    </body>
</html>