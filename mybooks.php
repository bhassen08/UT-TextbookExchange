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
        <title>University of Toledo Textbook Exchange</title>
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
        
        require_once(__DIR__ . '/inc/mybookcontent.php');
        ?>

        <div class="wrapper">

            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 style="color: #003e7e;" class="display-4">My Books</h1>
                    <p class="lead">"It's the decisions you make—when you have no time to make them—that define who you are." - Teh_Masterer</p>
                </div>
            </div>
            <div style="padding-bottom: 100px; padding-top: 100px;">
                <div class="row justify-content-sm-between">
                    <div class="col-sm-2">
                        <ul class="nav flex-column nav-pills">
                            <li class="nav-item">
                                <a style="text-align: center;" class="nav-link active new-posting" href="mybooks.php">New Posting</a>
                            </li>
                            <li class="nav-item">
                                <a style="text-align: center;" class="nav-link for-sale" href="mybooks.php?forsale=true">For Sale</a>
                            </li>
                            <li class="nav-item">
                                <a style="text-align: center;" class="nav-link for-rent" href="mybooks.php?forrent=true">For Rent</a>
                            </li>
                            <li class="nav-item">
                                <a style="text-align: center;" class="nav-link trade" href="mybooks.php?fortrade=true">For Trade</a>
                            </li>
                            <li class="nav-item">
                                <a style="text-align: center;" class="nav-link purchased" href="mybooks.php?purchased=true">Purchased</a>
                            </li>
                            <li class="nav-item">
                                <a style="text-align: center;" class="nav-link im-renting" href="mybooks.php?renting=true">I'm Renting</a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="col-sm-10 d-flex align-items-center">
                        <div class="col-sm-11 show-for-sale">
                            <?php
                                require_once(__DIR__ . '/inc/mybookcontent.php');
                                
                                if (isset($_GET['forsale']))
                                    {
                                        echo '<script>';
                                        echo '$("div ul li a").removeClass("active");';
                                        echo '$("a.for-sale").addClass("active");';
                                        echo '</script>';
                                        
                                        myBooksContent('forsale');
                                    }
                                elseif (isset($_GET['forrent']))
                                    {
                                        echo '<script>';
                                        echo '$("div ul li a").removeClass("active");';
                                        echo '$("a.for-rent").addClass("active");';
                                        echo '</script>';
                                        
                                        myBooksContent('forrent');
                                    }
                                elseif (isset($_GET['fortrade']))
                                    {
                                        echo '<script>';
                                        echo '$("div ul li a").removeClass("active");';
                                        echo '$("a.trade").addClass("active");';
                                        echo '</script>';
                                        
                                        myBooksContent('fortrade');
                                    }
                                elseif (isset($_GET['purchased']))
                                    {
                                        echo '<script>';
                                        echo '$("div ul li a").removeClass("active");';
                                        echo '$("a.purchased").addClass("active");';
                                        echo '</script>';
                                    }
                                elseif (isset($_GET['renting']))
                                    {
                                        echo '<script>';
                                        echo '$("div ul li a").removeClass("active");';
                                        echo '$("a.im-renting").addClass("active");';
                                        echo '</script>';
                                    }
                                else
                                    {
                                        echo '<script>';
                                        echo '$("div ul li a").removeClass("active");';
                                        echo '$("a.new-posting").addClass("active");';
                                        echo '</script>';
                                        
                                        echo '<div class="container show-new-posting">';
                                        echo '<div class="row align-items-end">';
                                        echo '<div class="col-sm-4">';
                                        echo '<li class="btn btn-outline-primary">';
                                        echo '<a style="text-align: center;" data-toggle="modal" data-target="#listSellModal" class="nav-link post-sell">Sell</a>';
                                        echo '</li>';
                                        echo '</div>';
                                        echo '<div class="col-sm-4  justify-content-center">';
                                        echo '<li class="btn btn-outline-primary">';
                                        echo '<a style="text-align: center;" data-toggle="modal" data-target="#listRentModal" class="nav-link post-rent">Rent</a>';
                                        echo '</li>';
                                        echo '</div>';
                                        echo '<div class="col-sm-4  justify-content-center">';
                                        echo '<li class="btn btn-outline-primary">';
                                        echo '<a style="text-align: center;" data-toggle="modal" data-target="#listTradeModal" class="nav-link post-trade">Trade</a>';
                                        echo '</li>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                            ?>
                        </div>

                        <div class="col-sm-11 show-purchased" style="display: none;">
                            <p>I'm buying this...</p>
                        </div>

                        <div class="col-sm-11 show-im-renting" style="display: none;">
                            <p>I'm renting this...</p>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            include "./inc/postmodals.php";
            include "./inc/footer.php";
            ?>
        </div>
    </body>
</html>