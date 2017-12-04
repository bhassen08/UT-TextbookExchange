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
        <!-- Include navigation bar -->


        <div id="wrapper">
            <?php
            include "./inc/navbar.php";
            require_once "vendor/autoload.php";
            ?>
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 style="color: #003e7e;" class="display-4">Search Results</h1>
                    <p class="lead">"I'll have what she's having." - Woman in diner</p>
                </div>
            </div>
            
<!--            <div class="row justify-content-sm-center align-items-center">
                <div class="col">
                    <h1 style="color: #003e7e; text-align: center; padding-bottom: 30px;">Search Results</h1>
                </div>
            </div>-->
            
<!--            <div class="row">
                <div class="col">
                    <p style="color: #003e7e; padding-bottom: 30px;">1-1 of 1 result(s) for "9780262033848"</p>
                </div>
            </div>-->
            
            <?php
            
//             echo var_dump(openssl_get_cert_locations());
            
            $configIni = parse_ini_file(__DIR__.'/private/config.ini');
            
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
            
            // Add input validation here
            $searchValue = $_POST['search'];
            $searchValidated = preg_replace("/[^a-zA-Z0-9]+/", "", $searchValue);
            
            $results = $service->volumes->listVolumes($searchValidated, $optParams);
            
            // Return only one result if ISBN, we don't care about similar numbers here.
            if (is_numeric($searchValidated))
                {
                    echo '<div class="row">';
                    echo '<div class="col">';
                    echo '<p style="color: #003e7e; padding-bottom: 30px;">1-1 of 1 result(s) for "' . $searchValue . '"</p>';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="justify-content-sm-center align-items-center" style="height: 500px;">';
                    echo '<div class="row justify-content-sm-center card-deck">';
                    echo '<div class="card col-sm-3" style="width: 20px;">';
                    echo '<img style="max-width: 25%; max-height: 50%;" class="card-img-top d-block mx-auto" src="' . $results[0]['volumeInfo']['imageLinks']['smallThumbnail'] . '" alt="Card image cap"></img>';
                    echo '<div class="card-body">';
                    echo '<h4 class="card-title">' . $results[0]['volumeInfo']['title'] . '</h4>';
                    echo '<p class="card-text"><b>Author(s):</b> ' . implode(",", $results[0]['volumeInfo']['authors']) . '<br><b>ISBN13:</b> ' . $results[0]['volumeInfo']['industryIdentifiers'][0]['identifier'] . '<br><b>ISBN10:</b> ' . $results[0]['volumeInfo']['industryIdentifiers'][1]['identifier'] . '<br><b>Publisher:</b> ' . $results[0]['volumeInfo']['publisher'] . '<br><b>Description:</b> ' . $results[0]['volumeInfo']['description'] . '</p>';
                    echo '<div class="row">';
                    echo '<div class="col-sm-4">';
                    echo '<button type="button" class="btn btn-primary btn-sm" onclick="">(2) For Sale</button>';
                    echo '</div>';
                    echo '<div class="col-sm-4">';
                    echo '<button type="button" class="btn btn-secondary btn-sm" onclick="">(0) For Rent</button>';
                    echo '</div>';
                    echo '<div class="col-sm-4">';
                    echo '<button type="button" class="btn btn-secondary btn-sm" onclick="">(0) For Trade</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            else
                {
                    foreach ($results as $item)
                    {
    //                    $imgLink = $item['volumeinfo']['imageLinks']['smallThumbnail'];
    ////                    echo "<li>";
    //                    echo $item['volumeinfo']['title'], "<br /> \n";
    ////                    echo $item['volumeinfo']['imageLinks']['smallThumbnail'];
    //                    echo "<img src='$imgLink'>";
    //                    echo '<a href="' . $item['volumeInfo']['previewLink'] . '">' . $item['volumeInfo']['previewLink'] . '</a>';
                        echo '<img src="' . $item['volumeInfo']['imageLinks']['smallThumbnail'] . '"></img>';
    //                    echo '<pre>';
    //                    // useful for debugging and checking which fields actually are in each item of the response
    //                    var_dump($item);
    //                    echo '</pre>';
                    }
                }
            
//            echo "</ul></p>";
            ?>
            <?php
            include "./inc/footer.php";
            ?>
        </div> 
    </body>
</html>