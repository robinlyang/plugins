<?php

/* 
 Plugin Name: Clean Brite Canada Estimate Calculator
 Plugin URI: https://robinyang.me/
 Description: This plugin calculate various janitorial estimates.
 Author: Robin Yang
 Verions: 1.0
 Author URI: https://robinyang.me/

Clean Brite Canada Estimate Calculator is free software: you can redistribute it 
and/or modify it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Clean Brite Canada Estimate Calculator is distributed in the hope that it will 
be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
*/

define( 'ESTIMATEROOT', plugins_url( '', __FILE__ ) );
define( 'ESTIMATESTYLES', ESTIMATEROOT . '/css/' );
define( 'ESTIMATESCRIPTS', ESTIMATEROOT . '/js/' );

//Overide them styles for Estimates page only.
function override_scripts() {
    if(is_page(6229)) {
        wp_enqueue_style('floor-care_styles', ESTIMATESTYLES.'cbc-estimate_styles.css');
    }   
}
add_action('wp_enqueue_scripts','override_scripts');

//Estimates content and functionality
function estimate() {
    //$loginPage = "/login/";
    //$currentPage = $_SERVER['REQUEST_URI'];
    if(is_page(6229))
    {   
        
        $txtSqFt = $hrPrCleaning = $prRate = $prPrSqFoot = $prPrHour 
                = $frOfSrWeek = $frOfSrMonth = $frOfSrYear = $TlMnCharges = "";
        $cSFoot = $hPClean = $pRate = $pPSFoot = $pPHour = $fOSWeek = $fOSMonth
                = $fOSYear = $TMCharges = 0;
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST["calculate"]){
                $SqFt = $_POST["$txtSqFt"];
                $hrPrCleaning = $_POST["hrPrCleaning"];
                $prRate = $_POST["prRate"];
                $prPrSqFoot = $_POST["prPrSqFoot"];
                $prPrHour = $_POST["prPrHour"];
                $frOfSrWeek = $_POST["frOfSrWeek"];
                $frOfSrMonth = $_POST["frOfSrMonth"];
                $frOfSrYear = $_POST["frOfSrYear"];
                $TlMnCharges = $_POST["TlMnCharges"];

                $cSFoot = intval($clSqFootage);
                $hPClean = intval($hrPrCleaning);
                $pRate = intval($prRate);
                $pPSFoot = intval($prPrSqFoot);
                $pPHour = intval($prPrHour);
                $fOSWeek = intval($frOfSrWeek);
                $fOSMonth = intval($frOfSrMonth);
                $fOSYear = intval($frOfSrYear);
                $TMCharges = intval($TlMnCharges);

                $result = $sqFootage + $hrPerCleaning + $testResult;
                echo $result . '<br>';
            }
            if($_POST["clear"]){
                
                echo '<br>CLEARED<br>';
            }
        }
            
        ?>
            <br><br><h2>Janitorial Bidding Calculator</h2><br>
            <table>
                <tr>
                    <td>
                <table class="borderless-table">
                    <form method="post">
                        <tr class="borderless-th">
                            <td class="borderless-td"><strong>Particulars</strong></td>
                            <td><strong>Values</strong></td>
                        </tr>  
                        <tr>
                            <td class="align-left"><strong>1. Cleanable square 
                            footage</strong><br>
                            Enter total cleanable square feet of this location 
                            (e.g., 20000)</td>
                            <td nowrap>&nbsp;&nbsp;<input type="text" name="txtSqFt"></td>
                        </tr>  
                        <tr>
                            <td class="align-left"><stong>2. Hours per cleaning</stong><br>
                            Use the <a href="">Production Cleaning Rates 
                            calculator </a>to estimate the number of hours it 
                            will take to complete the job and enter that number 
                            here. If you already know your production rate, you 
                            can skip this step and go to Step 3.</td>
                            <td nowrap>&nbsp;&nbsp;<input type="text" name="hrPrCleaning"></td>
                        </tr> 
                        <tr>
                            <td class="align-left"><strong>3. Production rate (square feet 
                            per hour)</strong><br>
                            Production rate = how many square feet per hour one 
                            person can clean. For example, 3500 square feet per 
                            hour. If you know your production rate, enter this 
                            number instead of entering the Hours per cleaning 
                            above (this will automatically calculate the estimated 
                            Hours per cleaning in Step 2 above)</td>
                            <td nowrap>&nbsp;&nbsp;<input type="text" name="prRate"></td>
                        </tr>
                        <tr>
                            <td class="align-left"><strong>4. Price per square 
                            foot</strong><br>
                            Enter the square foot price you would like to charge 
                            (ex: 0.09). Square foot pricing is generally for 5 
                            days per week service and works best with buildings 
                            of at least 10,000 sq ft in size. After entering the 
                            square foot price, enter the frequency of service in 
                            Step 6. If you enter 5 and you are not making a profit 
                            you need to raise the production rate or the price 
                            per square foot. If you enter any other amount other 
                            than 5 the square foot price may need to be adjusted 
                            to make a profit. This will become apparent after 
                            expenses are entered. If you want to estimate the price 
                            by the hour, skip this step and go to Step 5</td>
                            <td nowrap>$&nbsp;<input type="text" name="prPrSqFoot"></td>
                        </tr>
                        <tr>
                            <td class="align-left"><strong>5. Price per hour</strong><br>
                            Enter the hourly rate you would like to charge if you 
                            do not plan on charging by the square foot. You would 
                            use an hourly rate if you are performing services less 
                            than 5 days per week and in smaller buildings of less 
                            than 10,000 square feet</td>
                            <td nowrap>$&nbsp;<input type="text" name="prPrHour"></td>
                        </tr>
                        <tr>
                            <td class="align-left"><strong>6. Frequency of service</strong><br>
                            Enter the number of days per week, per month, or per 
                            year. If you are pricing by the square foot, enter the 
                            number of days per week only (the calculator will not 
                            work if you enter days per month or days per year)</td>
                            <tr>
                                <td class="align-left"><strong>A. Days per week</strong></td>
                                <td nowrap>&nbsp;&nbsp;<input type="text" name="frOfSrWeek"></td>
                            </tr>
                            <tr>
                                <td class="align-left"><strong>B. Days per month</strong></td>
                                <td nowrap>&nbsp;&nbsp;<input type="text" name="frOfSrMonth"></td>
                            </tr>
                            <tr>
                                <td class="align-left"><strong>C. Days per year</strong></td>
                                <td nowrap>&nbsp;&nbsp;<input type="text" name="frOfSrYear"></td>
                            </tr>
                        </tr>
                        <tr>
                            <td class="align-left"><strong>Total monthly charges</strong></td>
                            <td>$&nbsp;<input type="text" name="TlMnCharges"></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2"><input type="submit" name="calculate" value="Calculate">
                            &nbsp;&nbsp;&nbsp;<input type="submit" name="clear" value="Clear"></td>
                        </tr>
                    </form>   
                </table>  
                    </td>
                </tr>
            </table>

        <?php
        
        /*
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
                . '</form>'
                . '</table>';
        */
    }
    
}

add_filter('the_content', 'estimate');

?>
