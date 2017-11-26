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
        <!-- Modals Functionality -->
        <?php
            require_once(__DIR__ . '/inc/connect.php');
            $db = DbConnection::getConnection();

            if (isset($_POST['submitSignUp']))
                {
                    $userName = $db->real_escape_string($_POST['signUpInputUser']);
                    $userPassword = $db-> real_escape_string($_POST['signUpInputPassword']);

                    $checkIfUserUniqueQuery = "SELECT * FROM users WHERE username ='$userName'";
                    $userUniqueResult = $db->query($checkIfUserUniqueQuery) or die("BAD SQL: $checkIfUserUniqueQuery");

                    if ($userUniqueResult->num_rows > 0)
                        {
                            $_SESSION['successfulSignUp'] = false;
                        }
                    else
                        {
                            $saltedPassword = "kasjdlfad;lfkjas;ldkfjasdf" . $userPassword;
                            $hashedPassword = hash('sha512', $saltedPassword);
                            $addUserQuery = "INSERT INTO users (username, pw) VALUES ('$userName', '$hashedPassword')";

                            $addUserResult = $db->query($addUserQuery) or die("BAD SQL: $addUserQuery");

                            if ($addUserResult)
                                {
                                    $_SESSION['successfulSignUp'] = true;
                                }
                            else
                                {
                                    $_SESSION['successfulSignUp'] = false;
                                }
                            }
                }

            if (isset($_POST['submitLogIn']))
                    {
                        $userName = $db->real_escape_string($_POST['logInInputUser']);
                        $userPassword = $db->real_escape_string($_POST['logInInputPassword']);

                        $saltedPassword = "kasjdlfad;lfkjas;ldkfjasdf" . $userPassword;
                        $hashedPassword = hash('sha512', $saltedPassword);

                        $validateCredentialsQuery = "SELECT * FROM users WHERE username = '$userName' AND pw = '$hashedPassword'";

                        $validateCredentialsResult = $db->query($validateCredentialsQuery) or die("BAD SQL: $validateCredentialsQuery");

                        if ($validateCredentialsResult->num_rows > 0)
                            {
                                $_SESSION['user'] = $userName;
                                $_SESSION['successfulLogIn'] = true;
                            }
                        else
                            {
                                $_SESSION['successfulLogIn'] = false;
                            }
                    }
        ?>  
        
        <div class="container-fluid">
            <div style="padding-bottom: 85px;">
                <nav id="nav-bar" class="navbar navbar-expand-sm navbar-dark fixed-top">
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
                    <ul class="navbar-nav ml-auto">
                        <?php
                            if (!empty($_SESSION['user']))
                                {
                                    echo    '<li class="nav-item">
                                                <a class="nav-link" href="./logout.php">Log Out</a>
                                            </li>';
                                }
                            else
                                {
                                    echo    '<li class="nav-item">
                                                <a class="nav-link" data-toggle="modal" data-target="#signupModal">Sign Up</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="modal" data-target="#loginModal">Log In</a>
                                            </li>';
                                }
                        ?>
                    </ul>
                </nav>
            </div>

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
                            <form method="POST" action="">
                                <div class="form-group row col-sm-12">
                                    <label for="inputUser" class="col-sm-4 col-form-label">Username:</label>
                                    <input type="text" id="logInInputUser" name="logInInputUser" class="form-control col-sm-8" placeholder="Enter username" required>
                                </div>
                                <div class="form-group row col-sm-12">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Password:</label>
                                    <input type="password" id="logInInputPassword" name="logInInputPassword" class="form-control col-sm-8" placeholder="Enter password" required>
                                </div>
                                <div class="form-check col-sm-12">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="logInRemember" class="form-check-input">
                                        Remember Me
                                    </label>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="submitLogIn">
                        </div>
                        </form>
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
                        <form method="POST" action="">
                            <div class="modal-body">
                                <div class="form-group row col-sm-12">
                                    <label for="signUpInputUser" class="col-sm-5 col-form-label">Username:</label>
                                    <input type="text" id="signUpInputUser" name="signUpInputUser" class="form-control col-sm-7" placeholder="Enter username" required>
                                </div>
                                <div class="form-group row col-sm-12">
                                    <label for="signUpInputPassword" class="col-sm-5 col-form-label">Password:</label>
                                    <input type="password" id="signUpInputPassword" name="signUpInputPassword" class="form-control col-sm-7" placeholder="Enter password" required>
                                </div>
                                <div class="form-group row col-sm-12">
                                    <label for="signUpInputConfirmPassword" class="col-sm-5 col-form-label">Confirm Password:</label>
                                    <input type="password" id="signUpInputConfirmPassword" class="form-control col-sm-7" placeholder="Enter password" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" name="submitSignUp">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

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
            
            <footer>
                <div id="footer">
                    <div class="navbar navbar-fixed-bottom navbar-expand-sm navbar-dark" style="padding-top: 50px; padding-bottom: 50px; background-color: #003e7e;">
                        <ul class="nav navbar-nav mx-auto">
                            <li><a class="footer-menu-items nav-link" href="#">About</a></li>
                            <li><a class="footer-menu-items nav-link" href="#">Help</a></li>
                            <li><a class="footer-menu-items nav-link" href="#">Contact</a></li>
                            <li><a class="footer-menu-items nav-link" href="#">Blog</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>