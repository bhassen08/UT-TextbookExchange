<?php
    function unlist()
        {
            if(isset($_POST['unlistSubmit']))
            {
                if(isset($_POST['unlistBook']))
                    {
                        $keeperId = $_POST['unlistBook'];
                        
                        require_once(__DIR__ . '/connect.php');
                        $db = DbConnection::getConnection();
                        $userName = $db->real_escape_string($_SESSION['user']);

                        // GET USER ID
                        $getUserIdQuery = "SELECT users.id FROM users WHERE username = '$userName'";
                        $userIdResult = $db->query($getUserIdQuery) or die("BAD SQL: $getUserIdQuery");

                        $userId = $userIdResult->fetch_row();

                        $unlistBookQuery = "DELETE FROM keeper WHERE keeper.id = '$keeperId' AND keeper.userid = '$userId[0]'";

                        $db->query($unlistBookQuery) or die ("BAD SQL: $unlistBookQuery");
                    }
            }
        }
        
    // Determines whether the my book content section results require the price, and if so, outputs the proper HTML.
    function priceEntry($keeperRow, $contentSection)
        {
            if ($contentSection == 'forsale')
                {
                    echo '<li><span><b>Price:</b> '.$keeperRow['sellprice'].'</span></li>';
                }
            elseif ($contentSection == 'forrent')
                {
                    echo '<li><span><b>Price:</b> '.$keeperRow['rentprice'].'</span></li>';
                }
        }
        
    function semesterAvailability($keeperRow, $contentSection)
        {
            if ($contentSection == 'forrent' || $contentSection == 'fortrade')
                {
                    $db = DbConnection::getConnection();
                
                    if ($contentSection == 'forrent')
                        {
                            $rentSemesterId = $keeperRow['rentsemesterid'];
                            
                            $availabilityQuery = "SELECT semester_avail.spring2018, semester_avail.summer2018, semester_avail.fall2018, semester_avail.spring2019
                                FROM semester_avail
                                WHERE semester_avail.id = '$rentSemesterId';";
                            $availabilityResults = $db->query($availabilityQuery) or die("BAD SQL: $availabilityQuery");
                            $row = $availabilityResults->fetch_row();
                            $semesters = getSemesters($row);
                            
                            echo '<li><span><b>Semester(s):</b> '.$semesters.'</span></li>';
                        }
                    elseif ($contentSection == 'fortrade')
                        {
                            $tradeSemesterId = $keeperRow['tradesemesterid'];
                            
                            $availabilityQuery = "SELECT semester_avail.spring2018, semester_avail.summer2018, semester_avail.fall2018, semester_avail.spring2019
                                FROM semester_avail
                                WHERE semester_avail.id = '$tradeSemesterId';";
                            
                            $availabilityResults = $db->query($availabilityQuery) or die("BAD SQL: $availabilityQuery");
                            $row = $availabilityResults->fetch_row();
                            $semesters = getSemesters($row);
                            
                            echo '<li><span><b>Semester(s):</b> '.$semesters.'</span></li>';
                        }
                }
        }
        
    function getSemesters($dbRow)
        {
            $semesters = [];
            
            if ($dbRow['0'] == 1)
                {
                    $semesters[] = "Spring 2018";
                }
            if ($dbRow['1'] == 1)
                {
                    $semesters[] = "Summer 2018";
                }
            if ($dbRow['2'] == 1)
                {
                    $semesters[] = "Fall 2018";
                }
            if ($dbRow['3'] == 1)
                {
                    $semesters[] = "Spring 2019";
                }
                
            $semestersString = implode(", ", $semesters);
            
            
            return $semestersString;
        }
        
    // Takes a string to determine which content section.  
    // 'forsale' = For Sale, 'forrent' = For Rent, 'fortrade' = For Trade
    function myBooksContent($contentSection = 'forsale')
        {
             // Unlist any book entries that the user prompted to remove.
            unlist();
                            
            $db = DbConnection::getConnection();
            $api = ApiConnection::getConnection();
            $user = $_SESSION['user'];
            
            $sqlQuery = '';
            $noContentMessage = '';
            
            // Construct content-specific query
            switch ($contentSection)
                {
                    case 'forsale':
                        $sqlQuery = "SELECT keeper.* 
                                FROM (keeper 
                                JOIN users 
                                ON keeper.userid = users.id)
                                WHERE users.username = '$user' AND keeper.sellprice IS NOT NULL;";
                        $noContentMessage = "Whoops... it looks like you have nothing for sale.";
                        break;
                    case 'forrent':
                        $sqlQuery = "SELECT keeper.*  
                                FROM (keeper 
                                JOIN users 
                                ON keeper.userid = users.id)
                                WHERE users.username = '$user' AND keeper.rentprice IS NOT NULL;";
                        $noContentMessage = "Whoops... it looks like you have nothing for rent.";
                        break;
                    case 'fortrade':
                        $sqlQuery = "SELECT keeper.* 
                                FROM (keeper 
                                JOIN users 
                                ON keeper.userid = users.id)
                                WHERE users.username = '$user' AND keeper.fortrade = '1';";
                        $noContentMessage = "Whoops... it looks like you have nothing for trade.";
                        break;
                    default: 
                        // Throw an exception here?
                        break;
                }
                
            $contentDbResults = $db->query($sqlQuery) or die("BAD SQL: $sqlQuery");
            
            if ($contentDbResults->num_rows > 0)
                {
                    echo '<section class="col-xs-12 col-sm-6 col-md-12">';
                    while ($row = $contentDbResults->fetch_assoc())
                        {
                            
                            require_once(__DIR__ . '/connect.php');
            
                            $optParams = array('maxResults' => 1);
                            $apiResults = $api->volumes->listVolumes($row['isbn13'], $optParams);

                            echo '<article class="search-result row">';
                            echo '<div class="col-xs-12 col-sm-12 col-md-2">';

                            if (isset($apiResults[0]['volumeInfo']['imageLinks']['smallThumbnail']) && isset($apiResults[0]['volumeInfo']['previewLink']))
                                {
                                    echo '<a href="'.$apiResults[0]['volumeInfo']['previewLink'].'" class="thumbnail"><img class="mx-auto d-block" src="'.$apiResults[0]['volumeInfo']['imageLinks']['smallThumbnail'].'" alt="Lorem ipsum" /></a>';
                                }
                            elseif (isset($apiResults[0]['volumeInfo']['imageLinks']['smallThumbnail']))
                                {
                                    echo '<img class="mx-auto d-block" src="'.$apiResults[0]['volumeInfo']['imageLinks']['smallThumbnail'].'" alt="Lorem ipsum" />';
                                }

                            echo '</div>';
                            echo '<div class="col-xs-12 col-sm-12 col-md-3">';
                            echo '<ul class="meta-search">';
                            
                            priceEntry($row, $contentSection);
                            semesterAvailability($row, $contentSection);

                            if (isset($apiResults[0]['volumeInfo']['title']))
                                {
                                    echo '<li><span><b>Title:</b> ' . $apiResults[0]['volumeInfo']['title'] . '</span></li>';
                                }
                            else
                                {
                                    echo '<li><span><b>Title:</b> N/A';
                                }

                            if (isset($apiResults[0]['volumeInfo']['authors']))
                                {
                                    echo '<li><span><b>Author:</b>  ' . implode(",", $apiResults[0]['volumeInfo']['authors']) . '</span></li>';
                                }
                            else
                                {
                                    echo '<li><span><b>Author:</b> N/A';
                                }

                            if (isset($apiResults[0]['volumeInfo']['publisher']))
                                {
                                    echo '<li><span><b>Publisher:</b>  ' . $apiResults[0]['volumeInfo']['publisher'] . '</span></li>';
                                }
                            else
                                {
                                    echo '<li><span><b>Publisher:</b> N/A';
                                }

                            if (isset($apiResults[0]['volumeInfo']['industryIdentifiers'][0]['identifier']))
                                {
                                    echo '<li><span><b>ISBN13:</b>  ' . $apiResults[0]['volumeInfo']['industryIdentifiers'][0]['identifier'] . '</span></li>';
                                }

                            if (isset($apiResults[0]['volumeInfo']['industryIdentifiers'][1]['identifier']))
                                {
                                    echo '<li><span><b>ISBN10:</b>  ' . $apiResults[0]['volumeInfo']['industryIdentifiers'][1]['identifier'] . '</span></li>';
                                }
                                
                            //require_once "inc/miscmodals.php";
                            
                            echo '<form method="POST" action"mybooks.php">';
                            echo '<input type="hidden" name="unlistBook" value="'.$row['id'].'">';
                            echo '<li><span><input type="submit" name="unlistSubmit" class="btn btn-primary" value="Unlist"></button></span></li>';
                            echo '</form>';
                            
                            echo '</ul>';
                            echo '</div>';
                            echo '<div class="col-xs-12 col-sm-12 col-md-7 excerpet">';
                            echo '<h3><a href="#" title="">Description</a></h3>';

                            if (isset($apiResults[0]['volumeInfo']['description']))
                                {
                                    echo '<p>' . $apiResults[0]['volumeInfo']['description'] . '</p>';
                                }

                            echo '</div>';
                            echo '</article>';

                        }
                    echo '</section>';
                }
            else
                {
                    echo '<div class="row justify-content-sm-center">';
                    echo '<h3>'.$noContentMessage.'</h3>';
                    echo '</div>';
                }
        }
?>
