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
            ?>

            <div class="row justify-content-sm-center align-items-center" style="height: 500px;">
                    <div class="row">
                <h1 align="center" style="color: #003e7e; padding-bottom: 30px;">My Books</h1>
            </div>

            <div class="row">
                <h3 style="color: #003e7e">For Sale</h3>
                <h3 style="color: #003e7e">For Rent</h3>
            </div>

            <div class="row">
                <div class="accordion col-sm-5">
                    <h4 class="accordion-toggle" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Accordion 1</h4>
                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                        <p>
                            Cras malesuada ultrices augue molestie risus.
                        </p>
                    </div>

                    <h4 class="accordion-toggle" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Accordion 2</h4>
                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                        <p>
                            Lorem ipsum dolor sit amet mauris eu turpis.
                        </p>
                    </div>

                    <h4 class="accordion-toggle">Accordion 3</h4>
                    <div class="accordion-content">
                        <p>
                            Vivamus facilisisnibh scelerisque laoreet.
                        </p>
                    </div>
                </div>
                <div class="accordion col-sm-5">
                    <h4 class="accordion-toggle" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Accordion 1</h4>
                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                        <p>
                            Cras malesuada ultrices augue molestie risus.
                        </p>
                    </div>

                    <h4 class="accordion-toggle">Accordion 2</h4>
                    <div class="accordion-content">
                        <p>
                            Lorem ipsum dolor sit amet mauris eu turpis.
                        </p>
                    </div>

                    <h4 class="accordion-toggle">Accordion 3</h4>
                    <div class="accordion-content">
                        <p>
                            Vivamus facilisisnibh scelerisque laoreet.
                        </p>
                    </div>
                </div>
            </div>
            </div>
            
            <?php
                    include "./inc/footer.php";
            ?>
    </body>
</html>