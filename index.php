<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>University of Toledo Textbook Exchange</title>
        <link rel="stylesheet" type="text/css" href="indexstyles.css">
    </head>
    <body>
        <div id="searchBarDiv">
            <label for="searchBox">Search for your book here: </label> 
            <input id="searchBox" type="search" placeholder="Search..." >
        </div>
        <video align="center" playsinline autoplay muted loop poster="books.jpg" id="bgVid">
            <source src="books.webm" type="video/webm">
            <source src="books.mp4" type="video/mp4">
        </video>
        <?php
        echo '<p>Hello World</p>';
        ?>
    </body>
</html>
