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
        ?>

        <div class="wrapper">

            <!--                <div class="row justify-content-sm-center align-items-center">
                                <div class="col">
                                    <h1 style="color: #003e7e; text-align: center; padding-bottom: 30px;">My Books</h1>
                                </div>
                            </div>-->
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
                                <a style="text-align: center;" class="nav-link active new-posting" href="#">New Posting</a>
                            </li>
                            <li class="nav-item">
                                <a style="text-align: center;" class="nav-link for-sale" href="#">For Sale</a>
                            </li>
                            <li class="nav-item">
                                <a style="text-align: center;" class="nav-link for-rent" href="#">For Rent</a>
                            </li>
                            <li class="nav-item">
                                <a style="text-align: center;" class="nav-link trade" href="#">Trade</a>
                            </li>
                            <li class="nav-item">
                                <a style="text-align: center;" class="nav-link purchased" href="#">Purchased</a>
                            </li>
                            <li class="nav-item">
                                <a style="text-align: center;" class="nav-link im-renting" href="#">I'm Renting</a>
                            </li>
                        </ul>
                    </div>

                    <script>
                        $(function () {
                            $("a.new-posting").click(function ()
                            {
                                $(".show-trade").hide();
                                $(".show-im-renting").hide();
                                $(".show-purchased").hide();
                                $(".show-for-rent").hide();
                                $(".show-for-sale").hide();
                                $(".show-new-posting").show();
                                return false; // prevent default browser refresh on "#" link
                            });

                            $("a.for-sale").click(function ()
                            {
                                $(".show-new-posting").hide();
                                $(".show-trade").hide();
                                $(".show-im-renting").hide();
                                $(".show-purchased").hide();
                                $(".show-for-rent").hide();
                                $(".show-for-sale").show();
                                return false; // prevent default browser refresh on "#" link
                            });

                            $("a.for-rent").click(function ()
                            {
                                $(".show-new-posting").hide();
                                $(".show-trade").hide();
                                $(".show-im-renting").hide();
                                $(".show-purchased").hide();
                                $(".show-for-sale").hide();
                                $(".show-for-rent").show();
                                return false; // prevent default browser refresh on "#" link
                            });

                            $("a.trade").click(function ()
                            {
                                $(".show-im-renting").hide();
                                $(".show-purchased").hide();
                                $(".show-for-rent").hide();
                                $(".show-for-sale").hide();
                                $(".show-new-posting").hide();
                                $(".show-trade").show();
                                return false; // prevent default browser refresh on "#" link
                            });

                            $("a.purchased").click(function ()
                            {
                                $(".show-new-posting").hide();
                                $(".show-trade").hide();
                                $(".show-im-renting").hide();
                                $(".show-for-sale").hide();
                                $(".show-for-rent").hide();
                                $(".show-purchased").show();
                                return false; // prevent default browser refresh on "#" link
                            });

                            $("a.im-renting").click(function ()
                            {
                                $(".show-new-posting").hide();
                                $(".show-trade").hide();
                                $(".show-for-sale").hide();
                                $(".show-purchased").hide();
                                $(".show-for-rent").hide();
                                $(".show-im-renting").show();
                                return false; // prevent default browser refresh on "#" link
                            });
                        });
                    </script>

                    <!--                    <div class="col-sm-11 show-for-sale" style="display: none;">
                                            <p>I'm selling this...</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vitae aliquet lacus. Etiam in porta massa, sit amet aliquam libero. Nam congue dapibus rutrum. Donec lorem tellus, faucibus vitae euismod sit amet, lacinia eget orci. Nunc mattis commodo tortor nec pulvinar. Duis vehicula mi in nulla laoreet, et pulvinar elit eleifend. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut et purus at ante vulputate finibus. Donec sem nunc, hendrerit vel elit consequat, condimentum gravida ex. Nulla mattis magna sit amet sem laoreet, at tempus magna viverra. Aenean vel rhoncus neque. Donec sed leo efficitur, rutrum augue vel, semper odio. Nam ac lectus at urna gravida laoreet sit amet at justo. Ut sagittis justo gravida diam luctus, vel ultricies orci imperdiet. Quisque fringilla urna quis mollis venenatis.</p>
                                        </div>
                                        
                                        <div class="col-sm-11 show-for-rent" style="display: none;">
                                            <p>I'm renting this out...</p>
                                        </div>
                                        
                                        <div class="col-sm-11 show-im-buying" style="display: none;">
                                            <p>I'm buying this...</p>
                                        </div>
                                        
                                        <div class="col-sm-11 show-im-renting" style="display: none;">
                                            <p>I'm renting this...</p>
                                        </div>-->

                    <!-- get rid of this above crap -->
                    <div class="col-sm-10 d-flex align-items-center">

                        <!-- TODO: HOW DO I CENTER THIS???? -->
                        <div class="container show-new-posting" style="display: none;">
                            <div class="row align-items-end">
                                <div class="col-sm-4">
                                    <li class="btn btn-outline-primary">
                                        <a style="text-align: center;" data-toggle="modal" data-target="#listSellModal" class="nav-link post-sell">Sell</a>
                                    </li>
                                </div>
                                <div class="col-sm-4  justify-content-center">
                                    <li class="btn btn-outline-primary">
                                        <a style="text-align: center;" data-toggle="modal" data-target="#listRentModal" class="nav-link post-rent">Rent</a>
                                    </li>
                                </div>
                                <div class="col-sm-4  justify-content-center">
                                    <li class="btn btn-outline-primary">
                                        <a style="text-align: center;" data-toggle="modal" data-target="#listTradeModal" class="nav-link post-trade">Trade</a>
                                    </li>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-11 show-for-sale" style="display: none;">
                            <?php
                            require_once(__DIR__ . '\inc\mybookcontent.php');

                            forSale();
                            ?>
                        </div>

                        <div class="col-sm-11 show-trade" style="display: none;">
                            <p>I'm trading...</p>
                        </div>

                        <div class="col-sm-11 show-for-rent" style="display: none;">
                            <p>I'm renting this out...</p>
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