<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
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
        <div id="wrapper">
            
            <?php
            // Include navigation bar
            include "./inc/navbar.php";
            
            // Includes the libraries installed by Composer.
            require_once "vendor/autoload.php";
            ?>
            
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 style="color: #003e7e;" class="display-4">Search Results</h1>
                    <p class="lead">"I'll have what she's having." -Woman in diner</p>
                </div>
            </div>
            
            <?php
            
            $configIni = parse_ini_file(__DIR__.'/private/config.ini');
            
            $API_KEY = $configIni["apikey"];
            
            // Set up the Google API Client.
            $client = new Google_Client();
            $client->setApplicationName("UTTE");
            $client->setDeveloperKey($API_KEY);
            
            // Get instance of Google Books Client.
            $service = new Google_Service_Books($client);
            
            // No optional parameters.
            $optParams = [];
            
            // Add input validation here
            $searchValue = $_POST['search'];
            
            // Is this an ISBN #?
            $searchValidated = preg_replace("/[^a-zA-Z0-9]+/", "", $searchValue);
            
			// If search term is detected as an ISBN, then append "isbn:" to the prefix of the search term to limit the search to only isbn.
			if(ctype_digit($searchValidated)){
				$searchIsbn="isbn:";
				$searchIsbn.=$searchValidated;
				$searchValidated=$searchIsbn;
			}
            $results = $service->volumes->listVolumes($searchValidated, $optParams);
					
                    echo '<hgroup class="mb20"><h2 class="lead"><strong class="text-danger">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ' . count($results) .'</strong> results were found for <strong class="text-danger">"' . $searchValue . '"</strong></h2></hgroup><br /><br /><br />';
                    echo '<section class="col-xs-12 col-sm-6 col-md-12">';

                    foreach ($results as $item)
                    {
                        echo '<article class="search-result row">';
                        echo '<div class="col-xs-12 col-sm-12 col-md-2">';
                        if (isset($item['volumeInfo']['imageLinks']['smallThumbnail']) && isset($item['volumeInfo']['previewLink']))
                            {
                                echo '<a href="'.$item['volumeInfo']['previewLink'].'" class="thumbnail"><img class="mx-auto d-block" src="'.$item['volumeInfo']['imageLinks']['smallThumbnail'].'" alt="Lorem ipsum" /></a>';
                            }
                        elseif (isset($item['volumeInfo']['imageLinks']['smallThumbnail']))
                            {
                                echo '<img class="mx-auto d-block" src="'.$item['volumeInfo']['imageLinks']['smallThumbnail'].'" alt="Lorem ipsum" />';
                            }
                        echo '</div>';
                        echo '<div class="col-xs-12 col-sm-12 col-md-3">';
                        echo '<ul class="meta-search">';
                        if (isset($item['volumeInfo']['title']))
                            {
                                echo '<li><span><b>Title:</b> ' . $item['volumeInfo']['title'] . '</span></li>';
                            }
                        else
                            {
                                echo '<li><span><b>Title:</b> N/A';
                            }
                        if (isset($item['volumeInfo']['authors']))
                            {
                                echo '<li><span><b>Author:</b>  ' . implode(",", $item['volumeInfo']['authors']) . '</span></li>';
                            }
                        else
                            {
                                echo '<li><span><b>Author:</b> N/A';
                            }
                        if (isset($item['volumeInfo']['publisher']))
                            {
                                echo '<li><span><b>Publisher:</b>  ' . $item['volumeInfo']['publisher'] . '</span></li>';
                            }
                        else
                            {
                                echo '<li><span><b>Publisher:</b> N/A';
                            }
                         if (isset($item['volumeInfo']['industryIdentifiers'][0]['identifier']))
                            {
                                echo '<li><span><b>ISBN13:</b>  ' . $item['volumeInfo']['industryIdentifiers'][0]['identifier'] . '</span></li>';
                            }
                        if (isset($item['volumeInfo']['industryIdentifiers'][1]['identifier']))
                            {
                                echo '<li><span><b>ISBN10:</b>  ' . $item['volumeInfo']['industryIdentifiers'][1]['identifier'] . '</span></li>';
                            }
                        echo '</ul>';
                        echo '</div>';
                        echo '<div class="col-xs-12 col-sm-12 col-md-7 excerpet">';
                        echo '<h3><a href="#" title="">Description</a></h3>';
                        if (isset($item['volumeInfo']['description']))
                                {
                                    echo '<p>' . $item['volumeInfo']['description'] . '</p>';
                                }
                        // Search buttons (i.e. Trade(1), Rent (1), Purchase (0)...
                        include("./inc/searchbuttons.php");
                        echo '</div>';
                        echo '</article>';
                    }

                    echo '</section>';
              // }
            ?>
            <?php
            include "./inc/footer.php";
            ?>
        </div> 
    </body>
</html>