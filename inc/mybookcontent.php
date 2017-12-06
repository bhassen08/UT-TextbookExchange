<?php
    function unlist()
        {

        }

    function forSale()
        {
            require_once(__DIR__ . '.\connect.php');
            $db = DbConnection::getConnection();
            $user = $_SESSION['user'];

            $getForSaleQuery = "SELECT txtbk_exchange_proto.keeper.isbn13 FROM (txtbk_exchange_proto.keeper 
                    JOIN txtbk_exchange_proto.users 
                            ON txtbk_exchange_proto.keeper.userid = txtbk_exchange_proto.users.id)
            WHERE txtbk_exchange_proto.users.username = '$user';";

            $validateCredentialsResult = $db->query($getForSaleQuery) or die("BAD SQL: $getForSaleQuery");

            if ($validateCredentialsResult->num_rows > 0)
                {
                        // Uncomment when done
                    $configIni = parse_ini_file(__DIR__.'/../private/config.ini');

                    $API_KEY = $configIni["apikey"];

                    // Includes the libraries installed by Composer.

                    // Set up the Google API Client.
                    $client = new Google_Client();
                    $client->setApplicationName("UTTE");
                    $client->setDeveloperKey($API_KEY);

                    // Get instance of Google Books Client.
                    $service = new Google_Service_Books($client);

                    // No optional parameters.
                    $optParams = array('maxResults' => 1);

                    echo '<section class="col-xs-12 col-sm-6 col-md-12">';
                    while ($row = $validateCredentialsResult->fetch_assoc())
                        {
                            $result = $service->volumes->listVolumes($row['isbn13'], $optParams);

                            echo '<article class="search-result row">';
                            echo '<div class="col-xs-12 col-sm-12 col-md-2">';

                            if (isset($result[0]['volumeInfo']['imageLinks']['smallThumbnail']))
                                {
                                    echo '<a href="#" title="Lorem ipsum" class="thumbnail"><img class="mx-auto d-block" src="' . $result[0]['volumeInfo']['imageLinks']['smallThumbnail'] . '" alt="Lorem ipsum" /></a>';
                                }

                            echo '</div>';
                            echo '<div class="col-xs-12 col-sm-12 col-md-3">';
                            echo '<ul class="meta-search">';

                            if (isset($result[0]['volumeInfo']['title']))
                                {
                                    echo '<li><span>Title: ' . $result[0]['volumeInfo']['title'] . '</span></li>';
                                }
                            else
                                {
                                    echo '<li><span>Title: N/A';
                                }

                            if (isset($result[0]['volumeInfo']['authors']))
                                {
                                    echo '<li><span>Author:  ' . implode(",", $result[0]['volumeInfo']['authors']) . '</span></li>';
                                }
                            else
                                {
                                    echo '<li><span>Author: N/A';
                                }

                            if (isset($result[0]['volumeInfo']['publisher']))
                                {
                                    echo '<li><span>Publisher:  ' . $result[0]['volumeInfo']['publisher'] . '</span></li>';
                                }
                            else
                                {
                                    echo '<li><span>Publisher: N/A';
                                }

                            if (isset($result[0]['volumeInfo']['industryIdentifiers'][0]['identifier']))
                                {
                                    echo '<li><span>ISBN13:  ' . $result[0]['volumeInfo']['industryIdentifiers'][0]['identifier'] . '</span></li>';
                                }

                            if (isset($result[0]['volumeInfo']['industryIdentifiers'][1]['identifier']))
                                {
                                    echo '<li><span>ISBN10:  ' . $result[0]['volumeInfo']['industryIdentifiers'][1]['identifier'] . '</span></li>';
                                }

                            echo '</ul>';
                            echo '</div>';
                            echo '<div class="col-xs-12 col-sm-12 col-md-7 excerpet">';
                            echo '<h3><a href="#" title="">Description</a></h3>';

                            if (isset($result[0]['volumeInfo']['description']))
                                {
                                    echo '<p>' . $result[0]['volumeInfo']['description'] . '</p>';
                                }

                            echo '</div>';
                            echo '</article>';

                        }
                    echo '</section>';
                }
            else
                {
                    echo '<div class="row justify-content-sm-center">';
                    echo '<h3>Whoops... it looks like you have nothing for sale.</h3>';
                    echo '</div>';
                }
        }
?>
