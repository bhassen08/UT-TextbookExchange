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
<!--        <link rel="stylesheet" type="text/css" href="newCascadeStyleSheet.css">-->
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
                        <a class="nav-link" href="#help">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#signupModal">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#loginModal">Log In</a>
                    </li>
                </ul>
            </nav>
            
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group row col-sm-12">
                                    <label for="inputUser" class="col-sm-4 col-form-label">Username:</label>
                                    <input type="text" id="inputUser" class="form-control col-sm-8" placeholder="Enter username" required>
                                </div>
                                <div class="form-group row col-sm-12">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Password:</label>
                                    <input type="password" id="inputPassword" class="form-control col-sm-8" placeholder="Enter password" required>
                                </div>
                                <div class="form-check col-sm-12">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Remember Me
                                    </label>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Log In</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="signupModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group row col-sm-12">
                                    <label for="inputUser" class="col-sm-5 col-form-label">Username:</label>
                                    <input type="text" id="inputUser" class="form-control col-sm-7" placeholder="Enter username" required>
                                </div>
                                <div class="form-group row col-sm-12">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Password:</label>
                                    <input type="password" id="inputPassword" class="form-control col-sm-7" placeholder="Enter password" required>
                                </div>
                                <div class="form-group row col-sm-12">
                                    <label for="inputConfirmPassword" class="col-sm-5 col-form-label">Confirm Password:</label>
                                    <input type="password" id="inputConfirmPassword" class="form-control col-sm-7" placeholder="Enter password" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-sm-center">
                <h1 align="center" style="color: #003e7e; padding-top: 150px; padding-bottom: 30px;">My Books</h1>
            </div>
            
            <div class="row justify-content-around">
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
                
<!--            <div class="accordion">
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
            </div>-->
            
<!--            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                        </div>
                    </div>
                </div>
                <div class="col">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <div role="tab" id="headingOne">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Collapsible Group Item #1
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-columns">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-header" role="tab" id="headingTwo">
                                <div role="tab" id="headingTwo">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            Collapsible Group Item #1
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-columns">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </div>-->
            
<!--            <div id="bootstrap-overrides" role="tablist" >
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <div role="tab" id="headingOne">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Collapsible Group Item #1
                            </a>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-columns">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingTwo">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Collapsible Group Item #2
                            </a>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingThree">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Collapsible Group Item #3
                            </a>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
            </div>-->

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
