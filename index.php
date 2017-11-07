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
        <link rel="stylesheet" type="text/css" href="newCascadeStyleSheet.css">
    </head>
    <body>
        <div class="container-fluid">
            <nav id="nvbr" class="navbar navbar-expand-sm navbar-dark fixed-top">
                <!-- Brand/logo -->
                <div>
                    <img class="navbar-brand" src="img/ut_logo_shield.png"></img>
                    <!-- Links -->
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">UT Textbook Exchange</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto"
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 3</a>
                    </li>
                </ul>
            </nav>

            <div class="form-row row justify-content-sm-center align-items-center" style="height: 500px; border-bottom: 10px solid #cecece; padding-top: 81px;">
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

            <div class="justify-content-sm-center" style="height: 500px;">
                <div>
                    <h1 align="center" style="color: #003e7e; padding: 25px;">Inspired by your shopping trends</h1>
                </div>
                
                <div class="row justify-content-sm-center card-deck">
                    <div class="card col-sm-3" style="width: 20px;">
                        <?php 
                            
                        ?>
                        <img style="max-width: 25%; max-height: 50%;" class="card-img-top d-block mx-auto" src="img/book.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Get it</a>
                        </div>
                    </div>
                    <div class="card col-sm-3" style="width: 20px;">
                        <img style="max-width: 25%; max-height: 50%;" class="card-img-top d-block mx-auto" src="img/book.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Get it</a>
                        </div>
                    </div>
                    <div class="card col-sm-3" style="width: 20px;">
                        <img style="max-width: 25%; max-height: 50%;" class="card-img-top d-block mx-auto" src="img/book.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Get it</a>
                        </div>
                    </div>
                    <div class="card col-sm-3" style="width: 20rem;">
                        <img style="max-width: 25%; max-height: 50%;" class="card-img-top d-block mx-auto" src="img/book.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Get it</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
