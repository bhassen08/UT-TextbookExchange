<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    function GenerateMyBooks()
        {
            $generateHTML = <<<HTML
            <div class="row justify-content-sm-center">
                <h1 align="center" style="color: #003e7e; padding-bottom: 30px;">My Books</h1>
            </div>

            <div class="row justify-content-around">
                <h3 style="color: #003e7e">For Sale</h3>
                <h3 style="color: #003e7e">For Rent</h3>
            </div>

            <div class="row">
                <div class="accordion col-sm-5">
                    <h4 class="accordion-toggle" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Accordion 1</h4>
                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                        <p>
                            Cras malesuada ultrices augue molestie risus.
                        </p>
                    </div>

                    <h4 class="accordion-toggle" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Accordion 2</h4>
                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                        <p>
                            Lorem ipsum dolor sit amet mauris eu turpis.
                        </p>
                    </div>

                    <h4 class="accordion-toggle">Accordion 3</h4>
                    <div class="accordion-content">
                        <p>
                            Vivamus facilisisnibh scelerisque laoreet.
                        </p>
                    </div>
                </div>
                <div class="accordion col-sm-5">
                    <h4 class="accordion-toggle" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Accordion 1</h4>
                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                        <p>
                            Cras malesuada ultrices augue molestie risus.
                        </p>
                    </div>

                    <h4 class="accordion-toggle">Accordion 2</h4>
                    <div class="accordion-content">
                        <p>
                            Lorem ipsum dolor sit amet mauris eu turpis.
                        </p>
                    </div>

                    <h4 class="accordion-toggle">Accordion 3</h4>
                    <div class="accordion-content">
                        <p>
                            Vivamus facilisisnibh scelerisque laoreet.
                        </p>
                    </div>
                </div>
            </div>
HTML;
            echo $generateHTML;
        }

?>