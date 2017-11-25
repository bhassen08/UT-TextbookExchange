<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    function generateInspiredCards()
        {
            $cards = <<<HTML
            <div class="justify-content-sm-center" style="height: 500px;">
                <div>
                    <h1 align="center" style="color: #003e7e; padding: 25px;">Inspired by your shopping trends</h1>
                </div>

                <div class="row justify-content-sm-center card-deck">
                    <div class="card col-sm-3" style="width: 20px;">
                        <img style="max-width: 25%; max-height: 50%;" class="card-img-top d-block mx-auto" src="img/book.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Get it</a>
                        </div>
                    </div>
                    <div class="card col-sm-3" style="width: 20px;">
                        <img style="max-width: 25%; max-height: 50%;" class="card-img-top d-block mx-auto" src="img/book.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Get it</a>
                        </div>
                    </div>
                    <div class="card col-sm-3" style="width: 20px;">
                        <img style="max-width: 25%; max-height: 50%;" class="card-img-top d-block mx-auto" src="img/book.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Get it</a>
                        </div>
                    </div>
                    <div class="card col-sm-3" style="width: 20rem;">
                        <img style="max-width: 25%; max-height: 50%;" class="card-img-top d-block mx-auto" src="img/book.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Get it</a>
                        </div>
                    </div>
                </div>
            </div>
HTML;
                    
                    echo $cards;
        }
?>