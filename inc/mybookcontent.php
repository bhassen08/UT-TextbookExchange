<?php
    function unlist()
        {

        }
        
    function myBooksContent($arg = 'forsale')
        {
            require_once(__DIR__ . '.\connect.php');
            $db = DbConnection::getConnection();
            $api = ApiConnection::getConnection();
            $user = $_SESSION['user'];
            
            $sqlQuery = '';
            $noContentMessage = '';
            
            // Construct content-specific query
            switch ($arg)
                {
                    case 'forsale':
                        $sqlQuery = "SELECT keeper.isbn13 
                                FROM (keeper 
                                JOIN users 
                                ON keeper.userid = users.id)
                                WHERE users.username = '$user' AND keeper.sellprice IS NOT NULL;";
                        $noContentMessage = "Whoops... it looks like you have nothing for sale.";
                        break;
                    case 'forrent':
                        $sqlQuery = "SELECT keeper.isbn13 
                                FROM (keeper 
                                JOIN users 
                                ON keeper.userid = users.id)
                                WHERE users.username = '$user' AND keeper.rentprice IS NOT NULL;";
                        $noContentMessage = "Whoops... it looks like you have nothing for rent.";
                        break;
                    case 'fortrade':
                        $sqlQuery = "SELECT keeper.isbn13 
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
                            $optParams = array('maxResults' => 1);
                            $apiResults = $api->volumes->listVolumes($row['isbn13'], $optParams);

                            echo '<article class="search-result row">';
                            echo '<div class="col-xs-12 col-sm-12 col-md-2">';

                            if (isset($apiResults[0]['volumeInfo']['imageLinks']['smallThumbnail']))
                                {
                                    echo '<a href="#" title="Lorem ipsum" class="thumbnail"><img class="mx-auto d-block" src="' . $apiResults[0]['volumeInfo']['imageLinks']['smallThumbnail'] . '" alt="Lorem ipsum" /></a>';
                                }

                            echo '</div>';
                            echo '<div class="col-xs-12 col-sm-12 col-md-3">';
                            echo '<ul class="meta-search">';

                            if (isset($apiResults[0]['volumeInfo']['title']))
                                {
                                    echo '<li><span>Title: ' . $apiResults[0]['volumeInfo']['title'] . '</span></li>';
                                }
                            else
                                {
                                    echo '<li><span>Title: N/A';
                                }

                            if (isset($apiResults[0]['volumeInfo']['authors']))
                                {
                                    echo '<li><span>Author:  ' . implode(",", $apiResults[0]['volumeInfo']['authors']) . '</span></li>';
                                }
                            else
                                {
                                    echo '<li><span>Author: N/A';
                                }

                            if (isset($apiResults[0]['volumeInfo']['publisher']))
                                {
                                    echo '<li><span>Publisher:  ' . $apiResults[0]['volumeInfo']['publisher'] . '</span></li>';
                                }
                            else
                                {
                                    echo '<li><span>Publisher: N/A';
                                }

                            if (isset($apiResults[0]['volumeInfo']['industryIdentifiers'][0]['identifier']))
                                {
                                    echo '<li><span>ISBN13:  ' . $apiResults[0]['volumeInfo']['industryIdentifiers'][0]['identifier'] . '</span></li>';
                                }

                            if (isset($apiResults[0]['volumeInfo']['industryIdentifiers'][1]['identifier']))
                                {
                                    echo '<li><span>ISBN10:  ' . $apiResults[0]['volumeInfo']['industryIdentifiers'][1]['identifier'] . '</span></li>';
                                }

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
