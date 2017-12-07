
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
                        <select multiple class="form-control" id="rentSemesters" name="rentSemesters[]">
                            <option value="1">Spring 2018</option>
                            <option value="2">Summer 2018</option>
                            <option value="3">Fall 2018</option>
                            <option value="4">Spring 2019</option>
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
                        <input type="text" id="isbnTrade" name="isbnTrade" class="form-control col-sm-9" placeholder="" required>
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
                        <select multiple class="form-control" id="tradeSemesters" name="tradeSemesters[]">
                            <option value="1">Spring 2018</option>
                            <option value="2">Summer 2018</option>
                            <option value="3">Fall 2018</option>
                            <option value="4">Spring 2019</option>
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
    
    require_once(__DIR__ . '/connect.php');
    $db = DbConnection::getConnection();
    $api = ApiConnection::getConnection();
    
    if (isset($_POST['sellSubmit']))
        {
            $isbn = $db->real_escape_string($_POST['isbnSell']);
            $sellPrice = $db->real_escape_string($_POST['priceSell']);
            $condition = $db->real_escape_string($_POST['conditionSellRadio']);
            $userName = $db->real_escape_string($_SESSION['user']);
            
            // GET USER ID
            $getUserIdQuery = "SELECT users.id FROM users WHERE username = '$userName'";
            $userIdResult = $db->query($getUserIdQuery) or die("BAD SQL: $getUserIdQuery");
            
            if ($userIdResult->num_rows !== 1)
                {
                    echo "Sorry, could not find user";
                }
            else
                {
                    $optParams = array('maxResults' => 1);
                    $apiResults = $api->volumes->listVolumes($isbn, $optParams);
                    
                    if ($apiResults[0]['volumeInfo']['industryIdentifiers'][0]['identifier'] != $isbn)
                        {
                            echo 'ERROR: ISBN DOES NOT BELONG TO A BOOK.  BOOK WAS NOT ADDED TO DATABASE.';
                        }
                    else
                        {
                            $userId = $userIdResult->fetch_row();
                    
                            $addBookToDbQuery = "INSERT INTO keeper (userid, available, bookcondition, sellprice, isbn13) VALUES ('$userId[0]', 1, '$condition', '$sellPrice', '$isbn');";
                            $db->query($addBookToDbQuery) or die("BAD SQL: $addBookToDbQuery");
                        }
                }
        }
        
        if (isset($_POST['rentSubmit']))
        {
            $isbn = $db->real_escape_string($_POST['isbnRent']);
            $rentPrice = $db->real_escape_string($_POST['priceRent']);
            $condition = $db->real_escape_string($_POST['conditionRentRadio']);
            $userName = $db->real_escape_string($_SESSION['user']);
            
            // GET USER ID
            $getUserIdQuery = "SELECT users.id FROM users WHERE username = '$userName'";
            $userIdResult = $db->query($getUserIdQuery) or die("BAD SQL: $getUserIdQuery");
            
            if ($userIdResult->num_rows !== 1)
                {
                    echo "Sorry, could not find user";
                }
            else
                {
                    $userId = $userIdResult->fetch_row();

                    // Instantiating a new array with 4 values (for each semester) at default 0 (0 means not available).
                    $semesterAvailability = array_fill(0, 4, 0);

                    foreach ($_POST['rentSemesters'] as $semester)
                        {
                            switch ($semester)
                                {
                                    case 1:
                                        // Setting the first index for Spring 2018 to 1 (available).
                                        $semesterAvailability[0] = 1;
                                        break;
                                    case 2: 
                                        // Setting the second index for Summer 2018 to 1 (available).
                                        $semesterAvailability[1] = 1;
                                        break;
                                    case 3:
                                        // Setting the third index for Fall 2018 to 1 (available).
                                        $semesterAvailability[2] = 1;
                                        break;
                                    case 4:
                                        // Setting the fourth index for Spring 2019 to 1 (available).
                                        $semesterAvailability[3] = 1;
                                        break;
                                    default:
                                        break;
                                }
                        }

                    // Insert semester availability data into database.
                    $addSemesterAvailQuery = "INSERT INTO semester_avail (spring2018, summer2018, fall2018, spring2019) VALUES ('$semesterAvailability[0]', '$semesterAvailability[1]', '$semesterAvailability[2]', '$semesterAvailability[3]');";
                    $db->query($addSemesterAvailQuery) or die("BAD SQL: $addSemesterAvailQuery");
                    $semesterTableId = $db->insert_id;

                    // Insert keeper data into database and includes semester availability id.
                    $addBookToDbQuery = "INSERT INTO keeper (userid, available, bookcondition, isbn13, rentPrice, rentsemesterid) VALUES ('$userId[0]', 1, '$condition', '$isbn', '$rentPrice', '$semesterTableId');";
                    $db->query($addBookToDbQuery) or die("BAD SQL: $addBookToDbQuery");
                }
        }
        
        if (isset($_POST['tradeSubmit']))
        {
            $isbn = $db->real_escape_string($_POST['isbnTrade']);
            $condition = $db->real_escape_string($_POST['conditionTradeRadio']);
            $userName = $db->real_escape_string($_SESSION['user']);
            
            // GET USER ID
            $getUserIdQuery = "SELECT users.id FROM users WHERE username = '$userName'";
            $userIdResult = $db->query($getUserIdQuery) or die("BAD SQL: $getUserIdQuery");
            
            if ($userIdResult->num_rows !== 1)
                {
                    echo "Sorry, could not find user";
                }
            else
                {
                    $userId = $userIdResult->fetch_row();

                    // Instantiating a new array with 4 values (for each semester) at default 0 (0 means not available).
                    $semesterAvailability = array_fill(0, 4, 0);

                    foreach ($_POST['tradeSemesters'] as $semester)
                        {
                            switch ($semester)
                                {
                                    case 1:
                                        // Setting the first index for Spring 2018 to 1 (available).
                                        $semesterAvailability[0] = 1;
                                        break;
                                    case 2: 
                                        // Setting the second index for Summer 2018 to 1 (available).
                                        $semesterAvailability[1] = 1;
                                        break;
                                    case 3:
                                        // Setting the third index for Fall 2018 to 1 (available).
                                        $semesterAvailability[2] = 1;
                                        break;
                                    case 4:
                                        // Setting the fourth index for Spring 2019 to 1 (available).
                                        $semesterAvailability[3] = 1;
                                        break;
                                    default:
                                        break;
                                }
                        }

                    // Insert semester availability data into database.
                    $addSemesterAvailQuery = "INSERT INTO semester_avail (spring2018, summer2018, fall2018, spring2019) VALUES ('$semesterAvailability[0]', '$semesterAvailability[1]', '$semesterAvailability[2]', '$semesterAvailability[3]');";
                    $db->query($addSemesterAvailQuery) or die("BAD SQL: $addSemesterAvailQuery");
                    $semesterTableId = $db->insert_id;

                    // Insert keeper data into database and includes semester availability id.
                    $addBookToDbQuery = "INSERT INTO keeper (userid, available, bookcondition, isbn13, fortrade, tradesemesterid) VALUES ('$userId[0]', 1, '$condition', '$isbn', 1, '$semesterTableId');";
                    $db->query($addBookToDbQuery) or die("BAD SQL: $addBookToDbQuery");
                }
        }
?>
