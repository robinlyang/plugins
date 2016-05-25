<?php

/* 
 Plugin Name: Robin's first Widget
 Plugin URI: https://robinyang.me/
 Description: This is a plugin
 Author: Robin Yang
 Verions: 1.0
 Author URI: https://robinyang.me/

Robin's first Widget is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Robin's first Widget is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/

/*TEST*/
function override_css() {
    if(is_page(6229)) {
        ?>
            <style type="text/css">
                table {
                    border:none;
                }
                td {
                    
                }
                .align-right {
                    text-align: right;
                }
                .align-left {
                    text-align: left;
                }
                .align-center {
                    text-align: center;
                }
                .bb {
                    border-bottom: 2px solid grey !important;
                }
                .tb {
                    border-top: 2px sold grey !important;
                }
                
            </style>
        <?php
    }
}
add_action('wp_head','override_css');


function test() {
    //$loginPage = "/login/";
    //$currentPage = $_SERVER['REQUEST_URI'];
    if(is_page(6229))
    {        
        $squareFootage = $hoursPerCleaning = $productionRate = $pricePSquareFoot 
                = $freqOfServiceWk = "";
        $result = $sqFootage = $hrPerCleaning =  $pdRate = $pPSquareFoot 
                = $fOfServiceWk = 0;
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST["calculate"]){
                $squareFootage = $_POST["squareFootage"];
                $hoursPerCleaning = $_POST["hoursPerCleaning"];
                $pricePSquareFoot = $_POST["pricePSquareFoot"];
                $freqOfServiceWk = $_POST["freqOfServiceWk"];

                $sqFootage = intval($squareFootage);
                $hrPerCleaning = intval($hoursPerCleaning);
                $pPSquareFoot = intval($pricePSquareFoot);
                $fOfServiceWk = intval($freqOfServiceWk);

                $result = $sqFootage + $hrPerCleaning;
                echo $result . '<br>';
            }
            if($_POST["clear"]){
                
                echo '<br>CLEARED<br>';
            }

        }        
        
        echo '<br><br><h2>Floor Care Estimate</h2><br>';
        echo '<table>'
            . '<form method="post">'
                . '<tr>'
                    . '<td>Particulars</td>'
                    . '<td>Values</td>'
                . '</tr>'
                . '<tr>'
                    . '<td class="align-left">1. Cleanable square footage<br>'
                    . 'Enter total cleanable square feet of this location (ex: 20000)</td>'
                    . '<td><input type="text" name="squareFootage"></td>'
                . '</tr>'
                . '<tr>'
                    . '<td class="align-left">2. Hours per cleaning<br>'
                    . 'Use the Floor Care Production Rates calculator to estimate '
                    . 'the number of hours it will take to complete the job and '
                    . 'enter that number here (this will automatically calculate '
                    . 'the Production Rate below). If you already know your production '
                    . 'rate, you can skip this step and go to Step 3.</td>'
                    . '<td><input type="text" name="hoursPerCleaning"></td>'
                . '</tr>'
                . '<tr>'
                    . '<td class="align-left">3. Production rate (square feet per hour)<br>'
                    . 'Production rate = how many square feet per hour one person '
                . 'can clean for a particular floor care service. For example, 500 '
                . 'square feet per hour. If you know your production rate, enter '
                . 'this number instead of entering the Hours per cleaning above '
                . '(this will automatically calculate the estimated Hours per '
                . 'cleaning in Step 2 above)</td>'
                    . '<td><input type="text" name="productionRate"></td>'
                . '</tr>'
                . '<tr>'
                    . '<td class="align-left">4. Price per square foot<br>'
                    . 'Enter the square foot price you would like to charge for '
                    . 'this service (ex: 0.35). If you want to estimate the price '
                    . 'by the hour, skip this step and go to Step 5.</td>'
                    . '<td><input type="text" name="pricePSquareFoot"></td>'
                . '</tr>'
                . '<tr>'
                    . '<td class="align-left">5. Price per hour<br>'
                    . '	Enter the price per hour you would like to charge if you '
                    . 'do not plan on charging by the square foot.</td>'
                    . '<td><input type="text" name="pricePSquareFoot"></td>'
                . '</tr>'
                . '<tr class="bb">'
                    . '<td class="align-left">6. Frequency of service<br>'
                    . 'Enter the number of days per week, per month, or per year<br>'
                    . '&nbsp;&nbsp;&nbsp;A. Days per week<br>'
                    . '&nbsp;&nbsp;&nbsp;B. Days per month<br>'
                    . '&nbsp;&nbsp;&nbsp;C. Days per year (enter 1 if this is a '
                        . 'one time service)</td>'
                    . '<td><br><input type="text" name="freqOfServiceWk"><br>'
                    . '<input type="text" name="freqOfServiceMn"><br>'
                    . '<input type="text" name="freqOfServiceYr"></td>'
                . '</tr>'
                . '<tr class="bb">'
                    . '<td class="align-left">Total per service charges</td>'
                    . '<td><input type="text" name="totalPerSerCharge"></td>'
                . '</tr>'
                . '<tr>'
                    . '<td class="align-left">7. Hourly wages<br>'
                    . '&nbsp;&nbsp;&nbsp;Cleaner #1</td>'
                    . '<td><input type="text" name="pricePSquareFoot"></td>'
                . '</tr>'
                
                
                
                
                . '<tr>'
                    . '<td colspan="2"><input type="submit" name="calculate" value="Calculate">'
                    . '&nbsp;&nbsp;&nbsp;<input type="submit" name="clear" value="Clear"></td>'
                . '</tr>'
                . '</table>';
        
    }
    
}

add_filter('the_content', 'test');
