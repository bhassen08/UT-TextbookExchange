<?php
    // Modal functionality
    require_once(__DIR__ . './connect.php');
    $db = DbConnection::getConnection();
            
    if (isset($_POST['submitSignUp']))
        {
            $userName = $db->real_escape_string($_POST['signUpInputUser']);
            $userPassword = $db->real_escape_string($_POST['signUpInputPassword']);

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
    <div style="margin-bottom: 85px;">
        <nav id="nav-bar" class="navbar navbar-expand-sm navbar-dark fixed-top">
            <!-- Brand/logo -->
            <div>
                <img class="navbar-brand" src="img/ut_logo_shield.png" onclick="window.location='index.php'"></img>
                <!-- Links -->
            </div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#" onclick="window.location='index.php'">UT Textbook Exchange</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Home</a>
                </li>
                <?php
                    if (!empty($_SESSION['user']))
                        {
                            echo    '<li class="nav-item">
                                        <a class="nav-link" href="./mybooks.php">My Books</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="./inbox.php">Inbox</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="./profile.php">Profile</a>
                                    </li>
                                    <li class="nav-item">
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
</div>