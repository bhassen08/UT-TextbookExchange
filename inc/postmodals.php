
<!-- Selling Book Modal -->
<div class="modal fade" id="listSellModal" tabindex="-1" role="dialog" aria-labelledby="listSellModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="listSellModalLabel">For Sale</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">
                    <div class="form-group row col-sm-12">
                        <label for="isbnSell" class="col-sm-3 col-form-label">ISBN13:</label>
                        <input type="text" id="isbnSell" name="isbnSell" class="form-control col-sm-9" placeholder="" required>
                    </div>
                    <div class="form-group row col-sm-12">
                        <label for="priceSell" class="col-sm-3 col-form-label">Price:</label>
                        <input type="number" min="0.00" max="9999.99" step="0.01" id="priceSell" name="priceSell" class="form-control col-sm-9" placeholder="Enter in USD ($ not required)" required>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-legend col-sm-3">Condition:</legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="conditionSellRadio" id="greatCondition" value="5" checked>
                                        Looks brand new.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="conditionSellRadio" id="goodCondition" value="4">
                                        Slight visible wear.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="conditionSellRadio" id="okCondition" value="3">
                                        Average, small tears or folded pages.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="conditionSellRadio" id="badCondition" value="2">
                                        Stained, some tears, or rounded edges.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="conditionSellRadio" id="terribleCondition" value="1">
                                        Beat. Rounded edges, tears, but no missing pages or covers.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="sellSubmit" class="btn btn-primary">List</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Putting Book Up For Rent Modal -->
<div class="modal fade" id="listRentModal" tabindex="-1" role="dialog" aria-labelledby="listRentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="listRentModalLabel">For Rent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">
                    <div class="form-group row col-sm-12">
                        <label for="isbnRent" class="col-sm-3 col-form-label">ISBN13:</label>
                        <input type="text" id="isbnRent" name="isbnRent" class="form-control col-sm-9" placeholder="" required>
                    </div>
                    <div class="form-group row col-sm-12">
                        <label for="priceRent" class="col-sm-3 col-form-label">Price:</label>
                        <input type="number" min="0.00" max="9999.99" step="0.01" id="priceRent" name="priceRent" class="form-control col-sm-9" placeholder="Enter in USD ($ not required)" required>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-legend col-sm-3">Condition:</legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="conditionRentRadio" id="greatCondition" value="5" checked>
                                        Looks brand new.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="conditionRentRadio" id="goodCondition" value="4">
                                        Slight visible wear.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="conditionRentRadio" id="okCondition" value="3">
                                        Average, small tears or folded pages.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="conditionRentRadio" id="badCondition" value="2">
                                        Stained, some tears, or rounded edges.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="conditionRentRadio" id="terribleCondition" value="1">
                                        Beat. Rounded edges, tears, but no missing pages or covers.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label for="rentSemesters">Which semesters would you like to list this book for rent?</label>
                        <select multiple class="form-control" id="rentSemesters">
                            <option>Spring 2018</option>
                            <option>Summer 2018</option>
                            <option>Fall 2018</option>
                            <option>Spring 2019</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="rentSubmit" class="btn btn-primary">List</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Putting Book Up For Trade Modal  --> 
<div class="modal fade" id="listTradeModal" tabindex="-1" role="dialog" aria-labelledby="listTradeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="listTradeModalLabel">For Trade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">
                    <div class="form-group row col-sm-12">
                        <label for="isbnTrade" class="col-sm-3 col-form-label">ISBN13:</label>
                        <input type="text" id="isbnRent" name="isbnTrade" class="form-control col-sm-9" placeholder="" required>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-legend col-sm-3">Condition:</legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="conditionTradeRadio" id="greatCondition" value="5" checked>
                                        Looks brand new.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="conditionTradeRadio" id="goodCondition" value="4">
                                        Slight visible wear.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="conditionTradeRadio" id="okCondition" value="3">
                                        Average, small tears or folded pages.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="conditionTradeRadio" id="badCondition" value="2">
                                        Stained, some tears, or rounded edges.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="conditionTradeRadio" id="terribleCondition" value="1">
                                        Beat. Rounded edges, tears, but no missing pages or covers.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label for="tradeSemesters">Which semesters would you like to list this book for trade?</label>
                        <select multiple class="form-control" id="tradeSemesters">
                            <option>Spring 2018</option>
                            <option>Summer 2018</option>
                            <option>Fall 2018</option>
                            <option>Spring 2019</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="tradeSubmit" class="btn btn-primary">List</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
    
    require_once(__DIR__ . './connect.php');
    $db = DbConnection::getConnection();

    if (isset($_POST['sellSubmit']))
        {
            $isbn = $db->real_escape_string($_POST['isbnSell']);
            $sellPrice = $db->real_escape_string($_POST['priceSell']);
            $condition = $db->real_escape_string($_POST['conditionSellRadio']);
            $userName = $db->real_escape_string($_SESSION['user']);
            
            // GET USER ID
            $getUserIdQuery = "SELECT txtbk_exchange_proto.users.id FROM txtbk_exchange_proto.users WHERE username = '$userName'";
            $userIdResult = $db->query($getUserIdQuery) or die("BAD SQL: $getUserIdQuery");
            
            if ($userIdResult->num_rows !== 1)
                {
                    echo "sorry, could not find user";
                }
            else
                {
                    $userId = $userIdResult->fetch_row();
                    
                    $addBookToDbQuery = "INSERT INTO txtbk_exchange_proto.keeper (userid, available, bookcondition, sellprice, forsale, isbn13) VALUES ('$userId[0]', 1, '$condition', '$sellPrice', 1, '$isbn');";
                    $db->query($addBookToDbQuery) or die("BAD SQL: $addBookToDbQuery");
                    
                    
                    echo "congrats, you are winner.";
                }
        }
            
            
            
            
            
//            $userName = $db->real_escape_string($_POST['logInInputUser']);
//            $userPassword = $db->real_escape_string($_POST['logInInputPassword']);
//
//            $saltedPassword = "kasjdlfad;lfkjas;ldkfjasdf" . $userPassword;
//            $hashedPassword = hash('sha512', $saltedPassword);
//
//            $validateCredentialsQuery = "SELECT * FROM users WHERE username = '$userName' AND pw = '$hashedPassword'";
//
//            $validateCredentialsResult = $db->query($validateCredentialsQuery) or die("BAD SQL: $validateCredentialsQuery");
//
//            if ($validateCredentialsResult->num_rows > 0)
//                {
//                    $_SESSION['user'] = $userName;
//                    $_SESSION['successfulLogIn'] = true;
//                }
//            else
//                {
//                    $_SESSION['successfulLogIn'] = false;
//                }
        
        if (isset($_POST['rentSubmit']))
        {
            echo 'RENTTTT';
//            $userName = $db->real_escape_string($_POST['logInInputUser']);
//            $userPassword = $db->real_escape_string($_POST['logInInputPassword']);
//
//            $saltedPassword = "kasjdlfad;lfkjas;ldkfjasdf" . $userPassword;
//            $hashedPassword = hash('sha512', $saltedPassword);
//
//            $validateCredentialsQuery = "SELECT * FROM users WHERE username = '$userName' AND pw = '$hashedPassword'";
//
//            $validateCredentialsResult = $db->query($validateCredentialsQuery) or die("BAD SQL: $validateCredentialsQuery");
//
//            if ($validateCredentialsResult->num_rows > 0)
//                {
//                    $_SESSION['user'] = $userName;
//                    $_SESSION['successfulLogIn'] = true;
//                }
//            else
//                {
//                    $_SESSION['successfulLogIn'] = false;
//                }
        }
        
        if (isset($_POST['tradeSubmit']))
        {
            echo 'TRADEEE';
//            $userName = $db->real_escape_string($_POST['logInInputUser']);
//            $userPassword = $db->real_escape_string($_POST['logInInputPassword']);
//
//            $saltedPassword = "kasjdlfad;lfkjas;ldkfjasdf" . $userPassword;
//            $hashedPassword = hash('sha512', $saltedPassword);
//
//            $validateCredentialsQuery = "SELECT * FROM users WHERE username = '$userName' AND pw = '$hashedPassword'";
//
//            $validateCredentialsResult = $db->query($validateCredentialsQuery) or die("BAD SQL: $validateCredentialsQuery");
//
//            if ($validateCredentialsResult->num_rows > 0)
//                {
//                    $_SESSION['user'] = $userName;
//                    $_SESSION['successfulLogIn'] = true;
//                }
//            else
//                {
//                    $_SESSION['successfulLogIn'] = false;
//                }
        }


?>