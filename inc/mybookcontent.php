<?php

//    class MyBookContent
//        {
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

                //            $http = new GuzzleHttp\Client(['verify' => '/path/to/cacert.pem']);

                            // Set up the Google API Client.
                            $client = new Google_Client();

                //            $client->setHttpClient($http);
                            $client->setApplicationName("UTTE");
                            $client->setDeveloperKey($API_KEY);

                            // Get instance of Google Books Client.
                            $service = new Google_Service_Books($client);

                            // No optional parameters.
                            $optParams = [];

                            $rows = $validateCredentialsResult->fetch_row();

        //                    foreach ($rows as $row)
        //                        {
        //                        
        //                        }
                                    $results = $service->volumes->listVolumes($rows[0], $optParams);

                //                    echo '<div class="row justify-content-sm-center card-deck">';
                //                    echo '<div class="card col-sm-3" style="width: 20px;">';
                //                    echo '<img style="max-width: 25%; max-height: 50%;" class="card-img-top d-block mx-auto" src="" alt="Card image cap"></img>';
                //                    echo '<div class="card-body">';
                //                    echo '<h4 class="card-title">Bad Book</h4>';
                //                    echo '<p class="card-text"><b>Author(s):</b> John Doe<br><b>ISBN13:</b> 3820423423434<br><b>ISBN10:</b> 3820423434<br><b>Publisher:</b> 1337 Publications<br><b>Description:</b> This book is not good, not joking.</p>';
                //                    echo '<div class="btn-toolbar">';
                //                    echo '<button class="btn btn-primary" onclick="unlist()">Unlist</button>';
                //                    echo '</div>';
                //                    echo '</div>';
                //                    echo '</div>';
                //                    echo '</div>';
                //                    echo '</div>';


                                    // Uncomment when done with modifying layout
                                    echo '<div class="row justify-content-sm-center card-deck">';
                                    echo '<div class="card col-sm-3" style="width: 20px;">';
                                    echo '<img style="max-width: 25%; max-height: 50%;" class="card-img-top d-block mx-auto" src="' . $results[0]['volumeInfo']['imageLinks']['smallThumbnail'] . '" alt="Card image cap"></img>';
                                    echo '<div class="card-body">';
                                    echo '<h4 class="card-title">' . $results[0]['volumeInfo']['title'] . '</h4>';
                                    echo '<p class="card-text"><b>Author(s):</b> ' . implode(",", $results[0]['volumeInfo']['authors']) . '<br><b>ISBN13:</b> ' . $results[0]['volumeInfo']['industryIdentifiers'][0]['identifier'] . '<br><b>ISBN10:</b> ' . $results[0]['volumeInfo']['industryIdentifiers'][1]['identifier'] . '<br><b>Publisher:</b> ' . $results[0]['volumeInfo']['publisher'] . '<br><b>Description:</b> ' . $results[0]['volumeInfo']['description'] . '</p>';
                                    echo '<div class="btn-toolbar">';
                                    echo '<button class="btn btn-primary" onclick="unlist()">Unlist</button>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                        }
                    else
                        {
                            echo '<div class="row justify-content-sm-center">';
                            echo '<h3>Whoops... it looks like you have nothing for sale.</h3>';
                            echo '</div>';
                        }
                    
                    
                }
//        }
?>
