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
        <title>Inbox - University of Toledo Textbook Exchange</title>
        <link rel="stylesheet" type="text/css" href="indexstyles.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<style type="text/css">
			/*body {
				color: #566787;
				background: #f5f5f5;
				font-family: 'Roboto', sans-serif;
			}*/
			.table-wrapper {
				width: 850px;
				background: #fff;
				padding: 20px 30px 5px;
				margin: 30px auto;
				box-shadow: 0 0 1px 0 rgba(0,0,0,.25);
			}
			.table-title .btn-group {
				float: right;
			}
			.table-title .btn {
				min-width: 50px;
				border-radius: 2px;
				border: none;
				padding: 6px 12px;
				font-size: 95%;
				outline: none !important;
				height: 30px;
			}
			.table-title {
				border-bottom: 1px solid #e9e9e9;
				padding-bottom: 15px;
				margin-bottom: 5px;
				background: rgb(0, 50, 74);
				margin: -20px -31px 10px;
				padding: 15px 30px;
				color: #fff;
			}
			.table-title h2 {
				margin: 2px 0 0;
				font-size: 24px;
			}
			table.table tr th, table.table tr td {
				border-color: #e9e9e9;
				padding: 12px 15px;
				vertical-align: middle;
			}
			table.table tr th:first-child {
				width: 40px;
			}
			table.table tr th:last-child {
				width: 100px;
			}
			table.table-striped tbody tr:nth-of-type(odd) {
				background-color: #fcfcfc;
			}
			table.table-striped.table-hover tbody tr:hover {
				background: #f5f5f5;
			}
			table.table td a {
				color: #2196f3;
			}
			table.table td .btn.manage {
				padding: 2px 10px;
				background: #37BC9B;
				color: #fff;
				border-radius: 2px;
			}
			table.table td .btn.manage:hover {
				background: #2e9c81;		
			}
		</style>
		<script type="text/javascript">
		$(document).ready(function(){
			$(".btn-group .btn").click(function(){
				var inputValue = $(this).find("input").val();
				if(inputValue != 'all'){
					var target = $('table tr[data-status="' + inputValue + '"]');
					$("table tbody tr").not(target).hide();
					target.fadeIn();
				} else {
					$("table tbody tr").fadeIn();
				}
			});
			// Changing the class of status label to support Bootstrap 4
			var bs = $.fn.tooltip.Constructor.VERSION;
			var str = bs.split(".");
			if(str[0] == 4){
				$(".label").each(function(){
					var classStr = $(this).attr("class");
					var newClassStr = classStr.replace(/label/g, "badge");
					$(this).removeAttr("class").addClass(newClassStr);
				});
			}
		});
		</script>
		
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
	
	<!-- https://www.tutorialrepublic.com/snippets/preview.php?topic=bootstrap&file=data-table-with-filter-row-feature -->
	
	<div class="table-wrapper">
	<div class="table-title">
		<div class="row">
			<div class="col-sm-6"><h2>Messages</h2></div>
			<div class="col-sm-6">
			<!--	<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-info active">
						<input type="radio" name="status" value="all" checked="checked"> All
					</label>
					<label class="btn btn-success">
						<input type="radio" name="status" value="active"> Unread
					</label>
					<label class="btn btn-warning">
						<input type="radio" name="status" value="inactive"> Read
					</label>
					<!--<label class="btn btn-danger">
						<input type="radio" name="status" value="expired"> Expired
					</label> 				
				</div>-->
			</div>
		</div>
	</div>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>From</th>
				<th>Time&nbsp;Sent</th>
				<th>Subject</th>
				<th>Book</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
<?php
	$userName = $db->real_escape_string($_SESSION['user']);
	// GET USER ID
	$getUserIdQuery = "SELECT users.id FROM users WHERE username = '$userName'";
	$userIdResult = $db->query($getUserIdQuery) or die("BAD SQL: $getUserIdQuery");
	$userId = $userIdResult->fetch_row();
	$userId=$userId['0'];
	
	$msg=$db->query("SELECT * FROM `messages` WHERE `receiver`='$userId';") or die(mysql_error());


	while($row = $msg->fetch_array()){
		/*echo "<pre>";
		var_dump($row);
		echo "asdasd:" . $row['7'];
		echo "</pre>";
		// TODO: Clean this up, no need to fetch an array. Runs a query to x-check bookid every line.
		$bookid=$row['keeperid'];
		$q=$connect->query("SELECT `title` FROM `library` WHERE `uid`='$bookid';") or die(mysql_error());
		$booktitle=mysqli_fetch_array($q);
		// TODO: Clean this up, no need to fetch an array. Runs a query to x-check uid every line.
		$uid=$row['sender'];
		$q=$connect->query("SELECT `username` FROM `users` WHERE `uid`='$uid';") or die(mysql_error());
		$un=mysqli_fetch_array($q);*/
		
		$suid=$row['1'];
		$q=$db->query("SELECT `username` FROM `users` WHERE `id`='$suid';") or die(mysql_error());
		$user=mysqli_fetch_array($q);
		
		/*$kid=$row['5'];
		$q=$db->query("SELECT `username` FROM `users` WHERE `id`='$suid';") or die(mysql_error());
		$booktitle=mysqli_fetch_array($q);*/
		
		echo "<tr data-status=\"active\"> <!-- inactive, expired -->";
		echo "<td>" . $user['0'] . "</td>";
		echo "<td>" . $row['4'] . "</td>";
		echo "<td>n/a</td>";
		echo "<td>" . $row['5'] . "</td>";
		if(strcmp($row['7'], "0")==0){
			echo "<td><span class=\"label label-success\">Unread</span></td>";
		}else{
			echo "<td><span class=\"label label-warning\">Read</span></td>";
		}
		echo "<td><a href=\"./vmsg.php?id=" . $row['0'] . "\" class=\"btn btn-sm manage\">Open</a></td>";
		echo "</tr>";
		//echo "<tr><td>" . $un['0'] . "</td><td>" . $row['subject'] . "</td><td>" . $row['sent'] . "</td><td>" . $booktitle['0'] . "</td><td><a href=\"./?vmsg&amp;id=" . $row['uid'] . "\">View</a></td></tr>";
	}

?>
		</tbody>
	</table>
	</div>
<?php


            include "./inc/postmodals.php";
            include "./inc/footer.php";
?>
        </div>
    </body>
</html>