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
        wp_enqueue_style('floor-care_styles', ESTIMATESTYLES.'cbc-estimate_styles.css', '1.0');
        wp_enqueue_script('adaptive-modal', ESTIMATESCRIPTS . 'cbc-estimate_scripts.js', '1.0');
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
            <br><br><h2>Janitorial Bidding Calculator</h2><br><table border="0" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="85%" id="AutoNumber2">
    <tr>
      <td colspan="2" width="61%">
      <p style="margin-top: 2; margin-bottom: 2" >
      <font face="Verdana" >Follow the instructions under each step to 
      complete the form. To move from one field to other, use &quot;TAB&quot; 
      key on your computer keyboard. </font></p>
      <hr color="#0000FF" size="3">
</td>
    </tr>
    <tr>
      <td colspan="2" width="61%">
      &nbsp;<div align="center">
        <center>
      <table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#0000FF" width="98%">
        <tr>
          <td width="100%">
          <div align="center">
            <center>
          <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="98%">
            <tr>
              <td width="83%" colspan="4" valign="top"><p><b><font face="Verdana">Particulars</font></b></p></td>
       <td align="right" width="2%" valign="top">
       &nbsp;</td>
       <td align="right" width="7%" valign="top">
       <p align="center"><b><font face="Verdana">Values</font></b></p></td>
       <td align="left" width="2.5%" valign="top">
       &nbsp;</td>
            </tr>
            <tr>
               <td valign = "top"  width="2.5%"><p><b><font face="Verdana" >1.</font></b></p></td>
               <td colspan="3" width="86%" valign="top"><p><b>
               <font face="Verdana" >Cleanable square footage</font></b></p></td>
               <td align="right" width="2%" valign="top"> &nbsp;</td>
               <td align="right" width="7%" valign="top">
               <input type="text" name="txSqft" onblur=Calc() id="txSqft"  size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="1"></td>
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
             </tr>            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td colspan="2" width="76%" valign="top"><p ><font  face="Verdana">Enter total cleanable square feet of 
               this location
               (ex: 20000)</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
              
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>            <tr>
               <td  valign = "top" width="2.5%"><p><b><font  face="Verdana">2.</font></b></p></td>
               <td colspan="3" width="86%" valign="top"><p ><b>
               <font  face="Verdana">Hours per 
               cleaning</font></b></p></td>
               <td width="2%" align="right" valign="top">
                            &nbsp;</td>
                              <td width="7%" valign="top" align="right">
               <input type="text" name="txHrc" id="txHrc"  onblur=valida() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="2"></td>
               
               <td width="2.5%" align="left" valign="top">
               &nbsp;</td>
             
             </tr>            
			 <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">
               &nbsp;</td>
               <td colspan="2" width="76%" valign="top">
               <p ><font  face="Verdana">Use the 
               <a target="_blank" href="http://www.thejanitorialstore.com/members/361.cfm">Production Cleaning Rates calculator</a> to estimate the number of 
               hours it will take to complete the job and enter that number here. If 
               you already know your production rate, you can skip this step and 
               go to Step 3.</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
              
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>            <tr>
               <td valign = "top"  width="2.5%"><p><b><font  face="Verdana">3.</font></b></p></td>
               <td colspan="3" width="86%" valign="top"><p ><b>
               <font  face="Verdana">Production rate (square feet per 
               hour)</font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
              
               <td align="right" width="7%" valign="top">
               <input type="text" name="txSfhr" id="txSfhr" onblur=validb() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="3"></td>
             
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
              
             </tr>            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">
               &nbsp;</td>
               <td colspan="2" width="76%" valign="top">
               <p ><font  face="Verdana">Production rate = how many square 
               feet per hour one person can clean.
               For example, 3500 square feet per hour.
               If you know your production rate, enter this number instead of 
               entering the Hours per cleaning above (this will automatically 
               calculate the estimated Hours per cleaning in Step 2 above)
               </font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
             
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
              
             </tr>            <tr>
               <td valign = "top"  width="2.5%"><p><b><font  face="Verdana">4.</font></b></p></td>
               <td colspan="3" width="86%" valign="top"><p ><b>
               <font  face="Verdana">Price per square foot</font></b></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
              
               <td align="right" width="7%" valign="top">
               <b><font  face="Verdana"><input type="text" onblur=validc() name="txPrsf" id="txPrsf"  size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="4"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">
               &nbsp;</td>
               <td colspan="2" width="76%" valign="top">
               <p ><font  face="Verdana">Enter the square 
               foot price you would like to charge (ex: 0.09).
               Square foot pricing is generally for 5 days per week service and 
               works best with buildings of at least 10,000 sq ft in size. After 
               entering the square foot price, enter the frequency of service in 
               Step 6.  If you enter 5 and you are not making a profit you need to raise the production rate or the price per square foot. If you enter any other amount other than 5 the square foot price may need to be adjusted to make a profit. This will become apparent after expenses are entered.
               If you want to estimate the price by the hour, skip this step and 
               go to Step 5</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
              
             </tr>
            <tr>
               <td valign = "top"  width="2.5%"><p><b><font  face="Verdana">5.</font></b></p></td>
               <td colspan="3" width="86%" valign="top"><p ><b>
               <font  face="Verdana">Price per hour</font></b></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="7%" valign="top">
               <b><font  face="Verdana"><input type="text" onblur=validd() name="txPrhr" id="txPrhr"  size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="5"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">
               &nbsp;</td>
               <td colspan="2" width="76%" valign="top">
               <p ><font  face="Verdana">Enter the hourly 
               rate you would like to charge if you do not plan on charging by 
               the square foot. You would use an hourly rate if you are 
               performing services less than 5 days per week and in smaller 
               buildings of less than 10,000 sq ft.</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td  valign = "top" width="2.5%"><p><b><font  face="Verdana">6.</font></b></p></td>
               <td colspan="3" width="86%" valign="top"><p ><b>
               <font  face="Verdana">Frequency of service</font></b></p></td>
               <td width="2%" align="right" valign="top">
               &nbsp;</td>
               
               <td width="7%" valign="top" align="right">
               &nbsp;</td>
               
               <td width="2.5%" align="left" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">
               <p >&nbsp;</p></td>
               <td colspan="2" width="76%" valign="top">
               <p ><font  face="Verdana">Enter 
 the number of days per week, per month, or per year. If you are pricing by the square foot, enter the number of days per week only (the calculator will not work if you enter days per month or days per year)</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td  valign = "top" width="2.5%"><p><b><font  face="Verdana">A.</font></b></p></td>
               <td width="74%" valign="top">
               <p ><b><font  face="Verdana">Days per week</font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txDy" id="txDy" onblur=valide() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="6"></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td  valign = "top" width="2.5%"><p><b><font  face="Verdana">B.</font></b></p></td>
               <td width="74%" valign="top">
               <p ><b><font  face="Verdana">Days per 
               month</font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
             
               <td align="right" width="7%" valign="top">
               <input type="text" name="txMn" id="txMn"  onblur=valide() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="7"></td>
              
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td  valign = "top" width="2.5%"><p><b><font  face="Verdana">C.</font></b></p></td>
               <td width="74%" valign="top">
               <p ><b><font  face="Verdana">Days per year</font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txYr" id="txYr"  onblur=valide() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="8"></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
              
             </tr>
            </table>
          <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="98%">
            <tr>
               <td colspan="4" width="95%" valign="top">
               <hr noshade color="#0000FF" width="98%" size="1"></td>
             
             </tr>
            <tr>
               <td width="83%" valign="top"><p ><b>
               <font  face="Verdana">Total monthly 
               charges</font></b></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="11%" valign="top">
               <input type="text" name="txTtm" id="txTtm" readonly="true" size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            </table>
          <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="98%">
            <tr>
               <td colspan="7" width="95%" valign="top">
               <hr noshade color="#0000FF" width="98%" size="1"></td>
               
             </tr>
            <tr>
               <td  valign = "top" width="2.5%"><p><b><font  face="Verdana">7.</font></b></p></td>
               <td width="86%" colspan="3" valign="top"><p ><b>
               <font  face="Verdana">Hourly wages</font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #1 </font></b></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="7%" valign="top">
               <b><font  face="Verdana"><input type="text" name="txWg1" id="txWg1" onblur=validf() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="9"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #2 </font></b></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="7%" valign="top">
               <b><font  face="Verdana"><input type="text" name="txWg2" id="txWg2" onblur=validf() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="10"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #3 </font></b></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="7%" valign="top">
               <b><font  face="Verdana"><input type="text" name="txWg3" id="txWg3" onblur=validf() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="11"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #4 </font></b></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="7%" valign="top">
               <b><font  face="Verdana"><input type="text" name="txWg4" id="txWg4" onblur=validf() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="12"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #5 </font></b></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="7%" valign="top">
               <b><font  face="Verdana"><input type="text" name="txWg5" id="txWg5"  size="10" onblur=validf() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="13"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #6 </font></b></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="7%" valign="top">
               <b><font  face="Verdana"><input type="text" name="txWg6" id="txWg6"  size="10" onblur=validf() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="14"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #7 </font></b></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="7%" valign="top">
               <b><font  face="Verdana"><input type="text" name="txWg7" id="txWg7"  size="10" onblur=validf() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="15"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
              
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #8 </font></b></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="7%" valign="top">
               <b><font  face="Verdana"><input type="text" name="txWg8" id="txWg8"  size="10" onblur=validf() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="16"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #9 </font></b></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="7%" valign="top">
               <b><font  face="Verdana"><input type="text" name="txWg9" id="txWg9"  size="10" onblur=validf() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="17"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #10 </font></b></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="7%" valign="top">
               <b><font  face="Verdana"><input type="text" name="txWg10" id="txWg10"  size="10" onblur=validf() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="18"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td  valign = "top" width="2.5%"><p><b><font  face="Verdana">8.</font></b></p></td>
               <td width="86%" colspan="3" valign="top"><p ><b>
               <font  face="Verdana">Time on the 
               job (per cleaning)</font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><font  face="Verdana">Enter the time 
               on the job for each cleaner. The total time must not exceed total 
               Hours per cleaning in Step 2.</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #1
               </font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
              
               <td align="right" width="7%" valign="top">
               <input type="text" name="txTm1" id="txTm1" disabled=true size="10" onchange=validg() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="19"></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #2
               </font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
              
               <td align="right" width="7%" valign="top">
               <input type="text" name="txTm2" id="txTm2" disabled=true size="10" onchange=validg() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="20"></td>
              
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
              
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #3
               </font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
              
               <td align="right" width="7%" valign="top">
               <input type="text" name="txTm3" id="txTm3" disabled=true size="10" onchange=validg() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="21"></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #4
               </font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txTm4" id="txTm4" disabled=true size="10" onchange=validg() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="22"></td>
              
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #5
               </font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txTm5" id="txTm5" disabled=true size="10" onchange=validg() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="23"></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #6
               </font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txTm6" id="txTm6" disabled=true size="10" onchange=validg() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="24"></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #7</font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txTm7" id="txTm7" disabled=true size="10" onchange=validg() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="25"></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #8
               </font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txTm8" id="txTm8" disabled=true size="10" onchange=validg() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="26"></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #9
               </font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txTm9" id="txTm9" disabled=true size="10" onchange=validg() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="27"></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="77%" colspan="2" valign="top">
               <p ><b><font  face="Verdana">Cleaner #10
               </font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txTm10" id="txTm10" disabled=true size="10" onchange=validg() style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="28"></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td  valign = "top" width="2.5%"><p><b><font  face="Verdana">9.
               </font></b></p></td>
               <td width="86%" colspan="3" valign="top"><p ><b>
               <font  face="Verdana">Monthly Expenses</font></b></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td valign = "top" width="1.5%"><p><font  face="Verdana">A</font></p></td>
               <td width="77%" colspan="2" valign="top">
               <p ><font face="Verdana" >Labor (cleaner's 
               wages per month)</font></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txEx1" id="txEx1" readonly=true  size="10" style="font-family: Verdana;  font-weight: bold; text-align:right"></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td valign = "top" width="1.5%"><p><font  face="Verdana">B</font></p></td>
               <td width="77%" colspan="2" valign="top">
               <p ><font  face="Verdana">FICA and 
               Medicare (7.65% for U.S.)</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txEx2" id="txEx2" onblur=Calcb() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="29"></td>
               
               <td align="left" width="2.5%" valign="top">
               <p><b><font  face="Verdana">%</font></b></p></td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="74%" valign="top">
               <p >
               <font  face="Verdana">Enter your FICA 
               and Medicare rate here. (ex: 7.65)</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
              
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
              
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td valign = "top" width="1.5%"><p><font  face="Verdana">C</font></p></td>
               <td width="77%" colspan="2" valign="top">
               <p ><font  face="Verdana">FUTA (Federal 
               Unemployment - 0.8% for U.S.)</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txEx3" id="txEx3" onblur=Calcb() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="30"></td>
               
               <td align="left" width="2.5%" valign="top">
               <p><b><font  face="Verdana">%</font></b></p></td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="2.5%" valign="top">
               &nbsp;</td>
               <td width="74%" valign="top">
               <p ><font  face="Verdana">Enter your Federal Unemployment 
               rate here. (ex: 0.8)</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td valign = "top" width="1.5%"><p><font  face="Verdana">D</font></p></td>
               <td width="77%" colspan="2" valign="top">
               <p ><font  face="Verdana">SUTA (State 
               Unemployment)</font></p></td>
               <td align="right" width="2%" valign="top">
               
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txEx4" id="txEx4" onblur=Calcb() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="31"></td>
               
               <td align="left" width="2.5%" valign="top">
               <p><b><font  face="Verdana">%</font></b></p></td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="74%" valign="top">
               <p ><font  face="Verdana">Your state sends 
               you a state unemployment rate for your company. This is the rate 
               to enter here. (ex: 1.5)</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td valign = "top" width="1.5%"><p><font face="Verdana" >E</font></p></td>
               <td width="77%" colspan="2" valign="top">
               <p ><font  face="Verdana">Other Employment 
               Taxes.</font></p></td>
               <td align="right" width="2%" valign="top">
              
               &nbsp;</td>
              
               <td align="right" width="7%" valign="top">
               <input type="text" name="txEx8" id="txEx8" onblur=Calcb() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="32"></td>
               
               <td align="left" width="2.5%" valign="top">
               <p><b><font  face="Verdana">%</font></b></p></td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="2.5%" valign="top">
               <p >&nbsp;</p></td>
               <td width="74%" valign="top">
               <p >
               <font  face="Verdana">If you pay local taxes or live in a country 
               outside the U.S., enter your employment taxes as a percentage of 
               payroll here.</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
              
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td valign = "top" width="1.5%"><p><font face="Verdana" >F</font></p></td>
               <td width="77%" colspan="2" valign="top">
               <p ><font face="Verdana" >Liability Insurance.</font></p></td>
               <td align="right" width="2%" valign="top">
          
               &nbsp;</td>
              
               <td align="right" width="7%" valign="top">
               <input type="text" name="txEx9" id="txEx9" onblur=Calcb() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="33"></td>
               
               <td align="left" width="2.5%" valign="top">
               <p><b><font  face="Verdana">%</font></b></p></td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="2.5%" valign="top">
               <p >&nbsp;</p></td>
               <td width="74%" valign="top">
               <p >
               <font  face="Verdana">Liability insurance is usually a 
               percentage per $1000 of payroll.
               (ex: 1.0)</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td valign = "top"  width="1.5%"><p><font face="Verdana" >G</font></p></td>
               <td width="77%" colspan="2" valign="top">
               <p ><font  face="Verdana">Worker's 
               Compensation</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txEx5" id="txEx5" onblur=Calcb() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="34"></td>
               
               <td align="left" width="2.5%" valign="top">
               <p><b><font  face="Verdana">%</font></b></p></td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="74%" valign="top">
               <p ><font  face="Verdana">Enter your 
               worker's compensation rate here. (ex: 9.5)</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td valign = "top"  width="1.5%"><p><font face="Verdana" >H</font></p></td>
               <td width="77%" colspan="2" valign="top">
               <p ><font  face="Verdana">Overhead</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txEx6" id="txEx6" onblur=Calcb() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="35"></td>
               
               <td align="left" width="2.5%" valign="top">
               <p><b><font  face="Verdana">%</font></b></p></td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="74%" valign="top">
               <p ><font  face="Verdana">Ongoing costs of 
               operating a business that does not generate a profit. (ex: phone, 
               utilities, rent, insurance, office supplies, administrative 
               costs, uniforms, equipment maintenance, training, etc)
               This rate varies by company. Enter your overhead as a percentage 
               of gross sales. (Ex: $60,000 in overhead divided by $225,000 in 
               yearly sales = 27% overhead)</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td valign = "top"  width="1.5%"><p><font face="Verdana" >I</font></p></td>
               <td width="77%" colspan="2" valign="top">
               <p ><font  face="Verdana">Supplies</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               <input type="text" name="txEx7" id="txEx7" onblur=Calcb() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="36"></td>
               
               <td align="left" width="2.5%" valign="top">
               <p><b><font  face="Verdana">%</font></b></p></td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="74%" valign="top">
               <p ><font  face="Verdana">Supplies needed 
               for this account - cleaning chemicals, mop heads, cleaning 
               cloths, dusters, vacuum bags, etc.
               Supply costs for general cleaning are usually around 2 - 10% of 
               sales</font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td valign = "top" width="1.5%"><p><font face="Verdana" >J</font></p></td>
               <td width="77%" colspan="2" valign="top"><p ><font face="Verdana">
               Equipment 
               monthly rental charges)</font></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="7%" valign="top">
               <b><font  face="Verdana"><input type="text" name="txEqrc" id="txEqrc" onblur=Calcb() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="37"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td valign = "top"  width="1.5%"><p><font face="Verdana" >K</font></p></td>
               <td width="77%" colspan="2" valign="top"><p ><font face="Verdana">
               Equipment
               (first year equipment purchases)</font></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="7%" valign="top">
               <b><font  face="Verdana"><input type="text" name="txEqcc" id="txEqcc" onblur=Calcb() size="10" style="font-family: Verdana;  font-weight: bold; text-align:right" tabindex="38"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="1.5%" valign="top">&nbsp;</td>
               <td width="2.5%" valign="top">&nbsp;</td>
               <td width="74%" valign="top">
               <p ><font  face="Verdana">If you purchase 
               equipment for this account, you may or may not want to include a 
               calculation here since this is not typically an ongoing expense. 
               If you enter an amount here for equipment purchases, enter the 
               total equipment cost and the calculator will divide it into 12 
               monthly periods, so you can consider it a first-year start up 
               cost, spread over the first year. </font></p></td>
               <td align="right" width="2%" valign="top">
               &nbsp;</td>
               
               <td align="right" width="7%" valign="top">
               &nbsp;</td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            </table>
          <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="98%">
            <tr>
               <td colspan="4" width="95%" valign="top">
               <hr noshade color="#0000FF" width="98%" size="1"></td>
               
             </tr>
            <tr>
               <td width="83%" valign="top"><p ><b><font face="Verdana">
               Total monthly 
               expenses for this location<br />
               (including first year equipment purchases)</font></b></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="10%" valign="top">
               <b><font  face="Verdana"><input type="text" name="txMex" id="txMex" readonly="true" size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            <tr>
               <td colspan="4" width="95%" valign="top">
               <hr noshade color="#0000FF" width="98%" size="1"></td>
               
             </tr>
            <tr>
               <td width="83%" valign="top"><p ><b><font face="Verdana">
               Total monthly 
               expenses for this location <br />
               (after first year equipment purchases)</font></b></p></td>
               <td align="right" width="2%" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
               
               <td align="right" width="10%" valign="top">
               <b><font  face="Verdana"><input type="text" name="txMexa" readonly="true" id="txMexa" size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
               
               <td align="left" width="2.5%" valign="top">
               &nbsp;</td>
               
             </tr>
            </table>
            </center>
          </div>
          </td>
        </tr>
      </table>
      <br />
      <table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#0000FF" width="98%">
        <tr>
          <td width="100%">
          <div align="center">
            <center>
            <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="98%">
              <tr>
                <td width="31%" valign="top">&nbsp;</td>
                <td width="33%" align="center" colspan="3" valign="top"><p><b><font face="Verdana">Monthly 
                (1st year)<br />
                (includes equipment purchases)</font></b></p></td>
 
                <td width="2%" align="center" valign="top">&nbsp;</td>
                <td width="36%" align="center" colspan="3" valign="top"><p><b><font face="Verdana">Yearly 
                (1st year)<br />
                (includes equipment purchases)</font></b></p></td>
              </tr>
              <tr>
                <td width="31%" valign="top"><p><b><font  face="Verdana">Income</font></b></p></td>
                <td width="7%" align="right" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana"><input type="text" name="txIncm" id="txIncm" readonly="true" size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="6%" align="left" valign="top">
               &nbsp;</td>
                <td width="2%" valign="top">&nbsp;</td>
                <td width="11%" align="right" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana"><input type="text" name="txIncy" id="txIncy" readonly="true" size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="2%" align="left" valign="top">
               &nbsp;</td>
              </tr>
              <tr>
                <td width="31%" valign="top"><p><b><font  face="Verdana">Cost</font></b></p></td>
                <td width="7%" align="right" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana"><input type="text" name="txCsm" id="txCsm" readonly="true" size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="6%" align="left" valign="top">
               &nbsp;</td>
                <td width="2%" valign="top">&nbsp;</td>
                <td width="11%" align="right" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana"><input type="text" name="txCsy" id="txCsy" readonly="true" size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="2%" align="left" valign="top">
               &nbsp;</td>
              </tr>
              <tr>
                <td width="31%" valign="top"><p><b><font  face="Verdana">Profit Dollars</font></b></p></td>
                <td width="7%" align="right" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana"><input type="text" name="txPrm" id="txPrm" readonly="true" onchange=CheckNeg(this) size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="6%" align="left" valign="top">
               &nbsp;</td>
                <td width="2%" valign="top">&nbsp;</td>
                <td width="11%" align="right" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana"><input type="text" name="txPry" id="txPry" readonly="true" onchange=CheckNeg(this) size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="2%" align="left" valign="top">
               &nbsp;</td>
              </tr>
              <tr>
                <td width="31%" valign="top"><p><b><font  face="Verdana">Profit Percent</font></b></p></td>
                <td width="7%" align="right" valign="top">
               &nbsp;</td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana">
               <input type="text" name="txPrpcm" id="txPrpcm" readonly="true" onchange=CheckNeg(this) size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="6%" align="left" valign="top">
               <p><b><font  face="Verdana">
               %</font></b></p></td>
                <td width="2%" valign="top">&nbsp;</td>
                <td width="11%" align="right" valign="top">
               &nbsp;</td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana">
               <input type="text" name="txPrpcy" id="txPrpcy" readonly="true" onchange=CheckNeg(this) size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="2%" align="left" valign="top">
               <p><b><font  face="Verdana">
               %</font></b></p></td>
              </tr>
            </table>
            </center>
          </div>
          </td>
        </tr>
      </table>
      <br />
      <table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#0000FF" width="98%">
        <tr>
          <td width="100%">
          <div align="center">
            <center>
            <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="98%">
              <tr>
                <td width="32%" valign="top">&nbsp;</td>
                <td width="6%" align="right" valign="top">&nbsp;</td>
                <td width="20%" align="center" valign="top"><p ><b><font face="Verdana">Monthly 
                 
                </font></b></p></td>
                <td width="6%" align="left" valign="top">&nbsp;</td>
                <td width="2%" align="center" valign="top">&nbsp;</td>
                <td width="12%" align="right" valign="top">&nbsp;</td>
                <td width="20%" align="center" valign="top"><p><b><font face="Verdana">Yearly 
                 
                </font></b></p></td>
                <td width="4%" align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td width="32%" valign="top"><p><b><font  face="Verdana">Income</font></b></p></td>
                <td width="6%" align="right" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana"><input type="text" name="txIncma" id="txIncma" readonly="true" size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="6%" align="left" valign="top">
               &nbsp;</td>
                <td width="2%" valign="top">&nbsp;</td>
                <td width="12%" align="right" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana"><input type="text" name="txIncya" id="txIncya" readonly="true" size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="4%" align="left" valign="top">
               &nbsp;</td>
              </tr>
              <tr>
                <td width="32%" valign="top"><p><b><font  face="Verdana">Cost</font></b></p></td>
                <td width="6%" align="right" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana"><input type="text" name="txCsma" id="txCsma" readonly="true" size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="6%" align="left" valign="top">
               &nbsp;</td>
                <td width="2%" valign="top">&nbsp;</td>
                <td width="12%" align="right" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana"><input type="text" name="txCsya" id="txCsya" readonly="true" size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="4%" align="left" valign="top">
               &nbsp;</td>
              </tr>
              <tr>
                <td width="32%" valign="top"><p><b><font  face="Verdana">Profit Dollars</font></b></p></td>
                <td width="6%" align="right" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana"><input type="text" name="txPrma" id="txPrma" readonly="true" onchange=CheckNeg(this) size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="6%" align="left" valign="top">
               &nbsp;</td>
                <td width="2%" valign="top">&nbsp;</td>
                <td width="12%" align="right" valign="top">
               <p><b><font  face="Verdana">$</font></b></p></td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana"><input type="text" name="txPrya" id="txPrya" readonly="true" onchange=CheckNeg(this) size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="4%" align="left" valign="top">
               &nbsp;</td>
              </tr>
              <tr>
                <td width="32%" valign="top"><p><b><font  face="Verdana">Profit Percent</font></b></p></td>
                <td width="6%" align="right" valign="top">
               &nbsp;</td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana">
               <input type="text" name="txPrpcma" id="txPrpcma" readonly="true" onchange=CheckNeg(this) size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="6%" align="left" valign="top">
               <p><b><font  face="Verdana">
               %</font></b></p></td>
                <td width="2%" valign="top">&nbsp;</td>
                <td width="12%" align="right" valign="top">
               &nbsp;</td>
                <td width="20%" align="center" valign="top">
               <b><font  face="Verdana">
               <input type="text" name="txPrpcya" id="txPrpcya" readonly="true" onchange=CheckNeg(this) size="15" style="font-family: Verdana;  font-weight: bold; text-align:right"></font></b></td>
                <td width="4%" align="left" valign="top">
               <p><b><font  face="Verdana">
               %</font></b></p></td>
              </tr>
            </table>
            </center>
          </div>
          </td>
        </tr>
      </table>
      <br />
        </center>
      </div>
</td>
    </tr><td colspan="2" width="61%">
      <hr color="#0000FF" size="3">
    </td>
    <tr>
      <td width="50%">
      <p align="center"><font face="Verdana"><input type="reset" value="Reset" onclick=Rst() name="B1"></font></p></td>
      <td width="50%">
      <p align="center">
      <input type="button" value=" Print " name="B2" onclick="window.print();" tabindex="39"></p></td>
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
