<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>University of Toledo Textbook Exchange</title>
        <link rel="stylesheet" type="text/css" href="indexstyles.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            
            <!-- Include navigation bar -->
            <?php
                include "./inc/navbar.php";
            ?>
            
                <div class="row justify-content-sm-center">
                    <!-- Display Sign Up or Log In Result -->
                    <?php
                    if (isset($_SESSION['successfulSignUp']))
                        {
                            if ($_SESSION['successfulSignUp'] == false)
                                {
                                    echo "<h1 align='center' style='color: #003e7e; padding-bottom: 30px;'>Sorry, this username already exists.</h1>";
                                    unset($_SESSION['successfulSignUp']);
                                }
                            elseif ($_SESSION['successfulSignUp'] == true)
                                {
                                    echo "<h1 align='center' style='color: #003e7e; padding-bottom: 30px;'>Your username has been created!</h1>";
                                    unset($_SESSION['successfulSignUp']);
                                }
                        }

                    if (isset($_SESSION['successfulLogIn']))
                        {
                            if ($_SESSION['successfulLogIn'] == false)
                                {
                                    echo "<h1 align='center' style='color: #003e7e; padding-bottom: 30px;'>Invalid credentials.</h1>";
                                    unset($_SESSION['successfulLogIn']);
                                }
                            elseif ($_SESSION['successfulLogIn'] == true)
                                {
                                    echo "<h1 align='center' style='color: #003e7e; padding-bottom: 30px;'>You have successfully logged in!</h1>";
                                    unset($_SESSION['successfulLogIn']);
                                }
                        }
                    ?>
                </div>

                <div class="form-row row justify-content-sm-center align-items-center" style="height: 500px;">
                    <div class="form-group col-sm-4">
                        <input type="search" class="form-control" placeholder="Search">
                    </div>
                    <div class="form-group col-sm-1">
                        <select class="custom-select">
                            <option selected>ISBN13</option>
                            <option value="2">Author</option>
                            <option value="3">Title</option>
                        </select>
                    </div>
                </div>

                <?php
                if (!empty($_SESSION['user']))
                    {
                        require_once(__DIR__ . '/inc/InspiredTrends.php');
                        generateInspiredCards();
                    }
                ?>

                <hr class="content-divider">

                <?php
                    include "./inc/footer.php";
                ?>
            </div>
        </div>
    </body>
</html>