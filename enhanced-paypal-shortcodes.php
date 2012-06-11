<?php

/*

Plugin Name: Enhanced Paypal Shortcodes

Plugin URI: http://thewpwarrior.com/596/enhanced-paypal-shortcodes

Description:  Use shortcodes to easily embed a fully functional paypal button on your wordpress website. 

Can be used for Buy Now and Subscription buttons. <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DXBKBP7Q5FSGC" target="_blank">Make a Donation</a>. 
Designed with using iDevAffiliate or JROX Jam affiliate management programs which require additional code added to the button.

This plugin was inspired by Paypal Shortcodes by Pixline.

Author: Charly Leetham

Version: 0.4

Author URI: http://askcharlyleetham.com

Copyright (C) Ask Charly Leetham (A Leetham Trust Project)

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

*/

define('TWPW_NAME', 'Enhanced Paypal Shortcodes');	// Name of the Plugin

define('TWPW_VERSION', '0.4');			// Current version of the Plugin

define("ALT_ADD","Add to cart (Paypal)");	// alternate text for "Add to cart" image

define("ALT_VIEW","View Paypal cart");		// alternate text for "View cart" image

define("ALT_SUBS", "Subscribe Now (Paypal)");   // alternate text for "Subscribe" image


/* Parameters for Shortcode for all Paypal buttons

type = paynow, subscribe or hosted

For Hosted Buttons:
buttonid = the button id number from your paypal code

For All Button Types:

imageurl = The location of the image for the button. Use full web address for the image - e.g http://domainname.com/mybuynowbutton.jpg.
Default is https://www.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif

imagewidth = the width of the paypal image

For PayNow and Subscribe Buttons:

email = the email address of the paypal account

itemno = A unique identifier for your product / service

name = Description of product / service

noshipping = Prompt for Shipping address
      0 is prompt, but don't require
      1 is don't prompt 
      2 is prompt and require the shipping address
      defaults to 0

nonote = Prompt payers to include a note (Paynow buttons only)
      0 is show the note box and prompt the user
      1 is hide the note box and do not prompt the user
      defaults to 0

currencycode = The currency for the transaction
      Australian Dollar AUD
      Canadian Dollar CAD
      Czech Koruna CZK
      Danish Krone DKK
      Euro EUR
      Hong Kong Dollar HKD
      Hungarian Forint HUF
      Israeli New Sheqel ILS
      Japanese Yen JPY
      Mexican Peso MXN
      Norwegian Krone NOK
      New Zealand Dollar NZD
      Polish Zloty PLN
      Pound Sterling GBP
      Singapore Dollar SGD
      Swedish Krona SEK
      Swiss Franc CHF
      U.S. Dollar USD
      Default is USD

rm = The return method. This will only work if returnurl is also set. This variable is often required by membership type software
0 – all shopping cart transactions use the GET method
1 – the payer’s browser is redirected to the return URL by the GET method, and no transaction variables are sent
2 – the payer’s browser is redirected to the return URL by the POST method, and all transaction variables are also posted 
The default is 0.

notifyurl = The URL to send payment advice too. Often required for IPN or other notifications
If this parameter is not used, no notifyurl value is added to the button

notifyurl2 = Allowance for a 2nd notify url. Often needed when using IPN and an affiliate program
If this parameter is not used, no notifyurl value is added to the button

returnurl = The URL to which the payer’s browser is redirected after completing the payment; for example, a URL on your site that displays a “Thank you for your payment” page.
Default – The browser is redirected to a PayPal web page.cancelurl = The URL to which the payer’s browser is redirected if the purchaser cancels the process;

scriptcode = the link to any script code that you may need to include.  e.g For Jrox JAM, some script code is added to the paypal buttons. Usage /foldername/scriptcode.php

If this parameter is not used, no notifyurl value is added to the button

Paynow Button only parameters

amount = the amount to charge (for Paynow buttons only)

Subscribe Button only parameters

Trial Period 1:
a1 = The value to charge for the first trial period 
p1 = The duration of the first trial. 
t1 = The units of duration. 

D for Days, allowable entries for p1: 1 to 90
W for Weeks, allowable entries for p1: 1 to 52
M for Months, allowable entries for p1: 1 to 24
Y for Years, allowable entries for p1: 1 to 5

Trial Period 2:
a2 = The value to charge for the second trial period 
p2 = The duration of the second trial. 
t2 = The units of duration. 

D for Days, allowable entries for p2: 1 to 90
W for Weeks, allowable entries for p2: 1 to 52
M for Months, allowable entries for p2: 1 to 24
Y for Years, allowable entries for p2: 1 to 5

The full subscription Payment:
a3 = The value to charge 
p3 = The duration between charging 
t3 = The units of duration. 

D for Days, allowable entries for p3: 1 to 90
W for Weeks, allowable entries for p3: 1 to 52
M for Months, allowable entries for p3: 1 to 24
Y for Years, allowable entries for p3: 1 to 5

src = Recurring payments. Subscription payments recur unless subscribers cancel their subscriptions before the end of the current billing cycle or you limit the number of times that payments recur with the value that you specify for srt.
Allowable values:

0 – subscription payments do not recur
1 – subscription payments recur
The default is 0.

srt = Recurring times. Number of times that subscription payments recur. Specify an integer above 1. Valid only if you specify src="1".
Allowable values:an integer above 1.

sra = Reattempt on failure. If a recurring payment fails, PayPal attempts to collect the payment two more times before canceling the subscription.
Allowable values:
0 – do not reattempt failed recurring payments
1 – reattempt failed recurring payments before canceling
The default is 0


Formatting
The plugin will wrap the paypal button in a <div> tag.  The formatting options available are:

divwidth = the width of the div.  This should be at least the width of the image.
Default - 100%

text-align = the alignment of the image / text within the div
Allowable values:
left - text is left justified
right - text is right justified
center - text is centered

No default, taken from page format

float = position of the div on the page
left - the div 'floats' on the left
right - the div 'floats' on the right
Default - if this value is missing, the div is centered on the page

marginleft = the amount of space between the div and the text to the left of the div (particularly good to use when using float=right)
Default - if this value is missing, the page format is used

marginright = the amount of space between the div and the text to the right of the div
(particularly good to use when using float=left)
Default - if this value is missing, the page format is used

margintop = the amount of space to the line above the div
Default = 10px;

marginbottom = the amount of space to the line below the div
Default = 10px;




Sample Usage:

Buy Now Button:
[paypal type="paynow" amount="12.99" email="payments@arvoreentreasures.com" itemno="12345657" name="Description" noshipping="1" no_note="1" currencycode="USD" imageurl="https://www.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif" rm="2" notifyurl="http://notifyurl.com" notifyurl2="http://notifyurl.com" returnurl="http://returnurl.com" scriptcode="scriptcode" ]


Subscribe Button with 2 trial periods and recurring Monthly payments.
[paypal type="subscribe" email="payments@arvoreentreasures.com" itemno="12345657" name="Description" noshipping="1" currencycode="USD" imageurl="https://www.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif" a1="1" p1="7" t1="D" a2="3" p2="1" t3="M" a3="47" p3="1" t3="M" rm="2" notifyurl="http://notifyurl.com" notifyurl2="http://notifyurl.com" returnurl="http://returnurl.com" scriptcode="scriptcode"]

Hosted Button
[paypal type="hosted" buttonid="1234456" imageurl="https://www.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif"]

*/

function enhanced_paypal_shortcode($atts) {

switch($atts['type']):

	case "paynow":
	$code = '
        <div style="';
        if ($atts['textalign']) {
              $code.='text-align: '.$atts['textalign'].';';
        }

        if ($atts['divwidth'] > 0) {
               $code.='width: '.$atts['divwidth'].';';
        }

        if ($atts['float']) {
               $code.='float: '.$atts['float'].';';
        } else {
               $code.='margin:0 auto;';
        }

        if ($atts['marginleft'] > -1 ) {
               $code.='margin-left: '.$atts['marginleft'].';';
        } 

        if ($atts['marginright'] > -1 ) {
               $code.='margin-right: '.$atts['marginright'].';';
        } else {
               $code.='margin-top: 10px;';
        }

        if ($atts['margintop'] > -1 ) {
               $code.='margin-top: '.$atts['margintop'].';';
        } else {
               $code.='margin-top: 10px;';
        }

        if ($atts['marginbottom'] > -1 ) {
               $code.='margin-bottom: '.$atts['marginbottom'].';';
        } else {
               $code.='margin-bottom: 10px;';
        }      

        $code.='"><form name="buynow" action="https://www.paypal.com/cgi-bin/webscr" method="post">

        <input type="hidden" name="cmd" value="_xclick" />
	<input type="image" src="https://www.paypal.com/en_US/i/scr/pixel.gif" border="0" alt="" width="1" height="1">
	<input type="hidden" name="bn" value="PP-BuyNowBF" />
	<input type="hidden" name="business" value="'.$atts[email].'">
	<input type="hidden" name="currency_code" value="'.$atts[currencycode].'">
	<input type="hidden" name="item_number" value="'.$atts['itemno'].'">
	<input type="hidden" name="item_name" value="'.$atts['name'].'">
	<input type="hidden" name="amount" value="'.$atts['amount'].'">';
        if ($atts['imageurl']) { 
                $code.='<input type="image" src="'.$atts['imageurl'].'" border="0" name="submit" alt="'.ALT_ADD.'"';
                if ($atts['imagewidth']){
                         $code.=' width="'.$atts['imagewidth'].'"';
                 }
                $code.='>';
         } else {
                $code.='<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="'.ALT_ADD.'">';
         }

         if ($atts['noshipping'] > -1) { 
                $code.='
		<input type="hidden" name="no_shipping" value="'.$atts['noshipping'].'">';
         } 

         if ($atts['nonote'] > -1) { 
		$code.='
                <input type="hidden" name="no_note" value="'.$atts['nonote'].'" />';
         }

         if ($atts['rm'] > -1) { 
                $code.='
		<input type="hidden" name="rm" value="'.$atts['rm'].'">';
         } 

        if ($atts['notifyurl']) { 
		$code.='<input type="hidden" name="notify_url" value="'.$atts['notifyurl'].'">';
        }

        if ($atts['notifyurl2']) { 
		$code.='<input type="hidden" name="notify_url" value="'.$atts['notifyurl2'].'">';
        }

        if ($atts['returnurl']) { 
		$code.='<input type="hidden" name="return" value="'.$atts['returnurl'].'">';
        }
        if ($atts['cancelurl']) {	    $code.='<input type="hidden" name="cancel_return" value="'.$atts['cancelurl'].'">';        }	
       if ($atts['scriptcode']) { 
                $code.='<script src="'.$atts['scriptcode'].'" type="text/javascript"></script>';
       }

       $code.='</form></div>';
       break;

case "subscribe":
	$code = '
        <div style="';
        if ($atts['textalign']) {               $code.='text-align: '.$atts['textalign'].';';        }
        if ($atts['divwidth'] > 0) {
               $code.='width: '.$atts['divwidth'].';';
        }
        if ($atts['float']) {
               $code.='float: '.$atts['float'].';';
        } else {
               $code.='margin:0 auto;';
        }

        if ($atts['marginleft'] > -1 ) {
               $code.='margin-left: '.$atts['marginleft'].';';
        } 

        if ($atts['marginright'] > -1 ) {
               $code.='margin-right: '.$atts['marginright'].';';
        } else {
               $code.='margin-top: 10px;';
        }

        if ($atts['margintop'] > -1 ) {
               $code.='margin-top: '.$atts['margintop'].';';
        } else {
               $code.='margin-top: 10px;';
        }

        if ($atts['marginbottom'] > -1 ) {
               $code.='margin-bottom: '.$atts['marginbottom'].';';
        } else {
               $code.='margin-bottom: 10px;';
        }      

        $code.='"><form name="subscribewithpaypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">

        <input type="hidden" name="cmd" value="_xclick-subscriptions" />
	<input type="image" src="https://www.paypal.com/en_US/i/scr/pixel.gif" border="0" alt="" width="1" height="1">';
        if ($atts['imageurl']) { 
            $code.='<input type="image" src="'.$atts['imageurl'].'" border="0" name="submit" alt="'.ALT_ADD.'"';
            if ($atts['imagewidth']){
               $code.=' width="'.$atts['imagewidth'].'"';
            }
        $code.='>';
        } else {
            $code.='<input type="image" src="https://www.paypal.com/en_AU/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">';
	}
        if ($atts['email']) {
             $code.='<input type="hidden" name="business" value="'.$atts[email].'">';
        }

        if ($atts['currencycode']) {
  	     $code.='<input type="hidden" name="currency_code" value="'.$atts[currencycode].'">';
        }

        if ($atts['itemno']) {
	     $code.='<input type="hidden" name="item_number" value="'.$atts['itemno'].'">';
        }

        if ($atts['name']) {
	    $code.='<input type="hidden" name="item_name" value="'.$atts['name'].'">';
        }

        if ($atts['amount']) {
  	    $code.='<input type="hidden" name="amount" value="'.$atts['amount'].'">';
        }

        if ($atts['noshipping'] >-1 ) {
 	    $code.='<input type="hidden" name="no_shipping" value="'.$atts['noshipping'].'" />';
        }

	$code.='<input type="hidden" name="no_note" value="1" />';

        /*Trial 1 settings */

        if ($atts['a1'] > -1) {
	    $code.='<input type="hidden" name="a1" value="'.$atts['a1'].'">';
        }

        if ($atts['p1'] > 0) {
	    $code.='<input type="hidden" name="p1" value="'.$atts['p1'].'">';
        }

        if ($atts['t1']) {
	    $code.='<input type="hidden" name="t1" value="'.$atts['t1'].'">';
        }

        /*Trial 2 settings */

        if ($atts['a2'] > -1) {
 	    $code.='<input type="hidden" name="a2" value="'.$atts['a2'].'">';
        }

        if ($atts['p2'] > 0 ) {
 	    $code.='<input type="hidden" name="p2" value="'.$atts['p2'].'">';
        }

        if ($atts['t2']) {
	    $code.='<input type="hidden" name="t2" value="'.$atts['t2'].'">';
         }

        /*Ongoing subscription*/

        if ($atts['a3'] > 0) {
	    $code.='<input type="hidden" name="a3" value="'.$atts['a3'].'">';
        }

        if ($atts['p3'] > 0) {
	    $code.='<input type="hidden" name="p3" value="'.$atts['p3'].'">';
        }

        if ($atts['t3']) {
	    $code.='<input type="hidden" name="t3" value="'.$atts['t3'].'">';
        }

        /* SRC - are payments recurring? 0 = No, 1 = Yes */

        if ($atts['src']==0) {
	    $code.='<input type="hidden" name="src" value="0">';
        } else {
	    $code.='<input type="hidden" name="src" value="1">';
        }		

        /* SRT - no of time payments recur?  */

        if ($atts['srt']>1) {
	    $code.='<input type="hidden" name="srt" value="'.$atts['srt'].'">';          
        }		
        /* SRA - re-attempt if fail?  0 = No, 1 = Yes */

        if ($atts['sra']==0) {
            $code.='<input type="hidden" name="sra" value="0">';
        } else {
	    $code.='<input type="hidden" name="sra" value="1">';
        }

        if ($atts['rm'] > -1) {
 	   $code.='<input type="hidden" name="rm" value="'.$atts['rm'].'">';
        }

        if ($atts['notifyurl']) {
	   $code.='<input type="hidden" name="notify_url" value="'.$atts['notifyurl'].'">';
        }

        if ($atts['notifyurl2']) {
	    $code.='<input type="hidden" name="notify_url" value="'.$atts['notifyurl2'].'">';
        }

        if ($atts['returnurl']) {
	    $code.='<input type="hidden" name="return" value="'.$atts['returnurl'].'">';
        }		        if ($atts['cancelurl']) {	    $code.='<input type="hidden" name="cancel_return" value="'.$atts['cancelurl'].'">';        }		

        if ($atts['scriptcode']) { 
            $code.='<script src="'.$atts['scriptcode'].'" type="text/javascript"></script>';
        }

	$code.='</form></div>';

	break;	

case "hosted":	

       $code = '
       <div style="';        

       if ($atts['textalign']) {               
                $code.='text-align: '.$atts['textalign'].';';        
       }

       if ($atts['divwidth'] > 0) {               
                $code.='width: '.$atts['divwidth'].';';
       }

       if ($atts['float']) {               
                $code.='float: '.$atts['float'].';';        
       } else {
               $code.='margin:0 auto;';
       }

       if ($atts['marginleft'] > -1 ) {
               $code.='margin-left: '.$atts['marginleft'].';';
        } 

        if ($atts['marginright'] > -1 ) { 
              $code.='margin-right: '.$atts['marginright'].';';
        } else {
               $code.='margin-top: 10px;';
        }

        if ($atts['margintop'] > -1 ) { 
              $code.='margin-top: '.$atts['margintop'].';';
        } else {
               $code.='margin-top: 10px;';
        }

        if ($atts['marginbottom'] > -1 ) {
               $code.='margin-bottom: '.$atts['marginbottom'].';';
        } else {
               $code.='margin-bottom: 10px;';
        }

        $code.='"><form name="" action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="'.$atts['buttonid'].'">
   	<input type="image" src="https://www.paypal.com/en_US/i/scr/pixel.gif" border="0" alt="" width="1" height="1">';

        if ($atts['imageurl']) {
 		$code.='<input type="image" src="'.$atts['imageurl'].'" border="0" name="submit" alt="'.ALT_ADD.'"';

               if ($atts['imagewidth']){
                      $code.=' width="'.$atts['imagewidth'].'"';
               }
               $code.='>';
        } else {
	       $code.='<input type="image" src="https://www.paypal.com/en_AU/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">';
        } 

       $code.='<img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
       </form></div>';
break;

endswitch;

return $code;

}
add_shortcode('paypal', 'enhanced_paypal_shortcode');

?>