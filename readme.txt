=== Enhanced Paypal Shortcodes ===

Contributors: CharlyLeetham
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DXBKBP7Q5FSGC
Tags: paypal, shortcode, buy now, subscribe
Requires at least: 2.8
Tested up to: 2.9.2
Stable tag: trunk

Description:  Easily embed a fully functional paypal buy now, subscribe or hosted button using shortcodes. Supports Wishlist Member

== Description ==Easily embed a fully functional paypal buy now, subscribe or hosted button using shortcodes. Supports Wishlist Member and provides integration with iDev Affiliate and JRox JAM.
Copyright (C) Ask Charly Leetham (A Leetham Trust Project)This program is free software; you can redistribute it and/ormodify it under the terms of the GNU General Public Licenseas published by the Free Software Foundation; either version 2of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful,but WITHOUT ANY WARRANTY; without even the implied warranty ofMERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See theGNU General Public License for more details.
You should have received a copy of the GNU General Public Licensealong with this program; if not, write to the Free SoftwareFoundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
== Installation ==
1. Install Enhanced Paypal Shortcodes from the Wordpress Repository
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place [paypal type="paynow" amount="12.99" email="payments@arvoreentreasures.com" item_no="12345657" name="Description" no_shipping="1" no_note="1" currency_code="USD" imageurl="https://www.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif" rm="2" notifyurl="http://notifyurl.com" notifyurl2="http://notifyurl.com" returnurl="http://returnurl.com" scriptcode="scriptcode" imagewidth="100px"]in your post or page where you want your button to appear
== Frequently Asked Questions ==1. What Paypal parameters are supported and how do I use them?
Parameters for Shortcode for all Paypal buttonstype = paynow, subscribe or hostedFor Hosted Buttons:buttonid = the button id number from your paypal codeFor All Button Types:imageurl = The location of the image for the button. Use full web address for the image - e.g http://domainname.com/mybuynowbutton.jpg.Default is https://www.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif
imagewidth = the width of the paypal imageFor PayNow and Subscribe Buttons:email = the email address of the paypal accountitemno = A unique identifier for your product / service
name = Description of product / service
noshipping = Prompt for Shipping address      0 is prompt, but don't require      1 is don't prompt       2 is prompt and require the shipping address      defaults to 0
nonote = Prompt payers to include a note (Paynow buttons only)      0 is show the note box and prompt the user      1 is hide the note box and do not prompt the user      defaults to 0
currencycode = The currency for the transaction      Australian Dollar AUD      Canadian Dollar CAD      Czech Koruna CZK      Danish Krone DKK      Euro EUR      Hong Kong Dollar HKD      Hungarian Forint HUF      Israeli New Sheqel ILS      Japanese Yen JPY      Mexican Peso MXN      Norwegian Krone NOK      New Zealand Dollar NZD      Polish Zloty PLN      Pound Sterling GBP      Singapore Dollar SGD      Swedish Krona SEK      Swiss Franc CHF      U.S. Dollar USD      Default is USD
rm = The return method. This will only work if returnurl is also set. This variable is often required by membership type software0 – all shopping cart transactions use the GET method1 – the payer’s browser is redirected to the return URL by the GET method, and no transaction variables are sent2 – the payer’s browser is redirected to the return URL by the POST method, and all transaction variables are also posted The default is 0.
notifyurl = The URL to send payment advice too. Often required for IPN or other notificationsIf this parameter is not used, no notifyurl value is added to the buttonnotifyurl2 = Allowance for a 2nd notify url. Often needed when using IPN and an affiliate programIf this parameter is not used, no notifyurl value is added to the button
returnurl = The URL to which the payer’s browser is redirected after completing the payment; for example, a URL on your site that displays a “Thank you for your payment” page.Default – The browser is redirected to a PayPal web page.cancelurl = The URL to which the payer’s browser is redirected if the purchaser cancels the payment transaction before completing the process
scriptcode = the link to any script code that you may need to include.  e.g For Jrox JAM, some script code is added to the paypal buttons. Usage /foldername/scriptcode.phpIf this parameter is not used, no notifyurl value is added to the button
Paynow Button only parametersamount = the amount to charge (for Paynow buttons only)
Subscribe Button only parameters
Trial Period 1:a1 = The value to charge for the first trial period p1 = The duration of the first trial. t1 = The units of duration. 
D for Days, allowable entries for p1: 1 to 90W for Weeks, allowable entries for p1: 1 to 52M for Months, allowable entries for p1: 1 to 24Y for Years, allowable entries for p1: 1 to 5
Trial Period 2:a2 = The value to charge for the second trial period p2 = The duration of the second trial. t2 = The units of duration. 
D for Days, allowable entries for p2: 1 to 90W for Weeks, allowable entries for p2: 1 to 52M for Months, allowable entries for p2: 1 to 24Y for Years, allowable entries for p2: 1 to 5
The full subscription Payment:a3 = The value to charge p3 = The duration between charging t3 = The units of duration. 
D for Days, allowable entries for p3: 1 to 90W for Weeks, allowable entries for p3: 1 to 52M for Months, allowable entries for p3: 1 to 24Y for Years, allowable entries for p3: 1 to 5src = Recurring payments. Subscription payments recur unless subscribers cancel their subscriptions before the end of the current billing cycle or you limit the number of times that payments recur with the value that you specify for srt.Allowable values:0 – subscription payments do not recur1 – subscription payments recurThe default is 0.srt = Recurring times. Number of times that subscription payments recur. Specify an integer above 1. Valid only if you specify src="1".Allowable values:an integer above 1.
sra = Reattempt on failure. If a recurring payment fails, PayPal attempts to collect the payment two more times before canceling the subscription.Allowable values:0 – do not reattempt failed recurring payments1 – reattempt failed recurring payments before cancelingThe default is 0FormattingThe plugin will wrap the paypal button in a <div> tag.  The formatting options available are:divwidth = the width of the div.  This should be at least the width of the image.Default - 100%
textalign = the alignment of the image / text within the divAllowable values:left - text is left justifiedright - text is right justifiedcenter - text is centeredNo default, taken from page format
float = position of the div on the pageleft - the div 'floats' on the leftright - the div 'floats' on the rightDefault - if this value is missing, the div is centered on the page
marginleft = the amount of space between the div and the text to the left of the div (particularly good to use when using float=right)Default - if this value is missing, the page format is used
marginright = the amount of space between the div and the text to the right of the div(particularly good to use when using float=left)Default - if this value is missing, the page format is usedmargintop = the amount of space to the line above the divDefault = 10px;
marginbottom = the amount of space to the line below the divDefault = 10px;Sample Usage:Buy Now Button:[paypal type="paynow" amount="12.99" email="payments@arvoreentreasures.com" itemno="12345657" name="Description" noshipping="1" no_note="1" currencycode="USD" imageurl="https://www.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif" rm="2" notifyurl="http://notifyurl.com" notifyurl2="http://notifyurl.com" returnurl="http://returnurl.com" scriptcode="scriptcode" imagewidth="100px"]
Subscribe Button with 2 trial periods and recurring Monthly payments.[paypal type="subscribe" email="payments@arvoreentreasures.com" itemno="12345657" name="Description" noshipping="1" currencycode="USD" imageurl="https://www.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif" a1="1" p1="7" t1="D" a2="3" p2="1" t3="M" a3="47" p3="1" t3="M" rm="2" notifyurl="http://notifyurl.com" notifyurl2="http://notifyurl.com" returnurl="http://returnurl.com" scriptcode="scriptcode" imagewidth="100px"]
Hosted Button[paypal type="hosted" buttonid="1234456" imageurl="https://www.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif"]
Adding formatting to Hosted ButtonTo use your own custom image hosted on your site, that is 200px wide, center the button in the line and leave 20px space above and 10px space below:[paypal type="hosted" buttonid="1234456" imageurl="http://yourdomainname.com/images/buynow.jpg" imagewidth="200px" divwidth="200px" margintop="20px" marginbottom="10px"]
All formatting options work on three button types.= What about foo bar? =
== Screenshots ==
None
== Changelog ==
0.1 - Initial release0.2 - Updated 22 February 2010 to include hosted buttons and fix some formatting issues0.3 - Updated 10 April 2010 to fix typos0.4 - 17 April 2010, modified code to use return url correctly in subscription buttons, added code to implement cancel url
== Upgrade Notice ==0.2 - adds hosted paypal buttons support and formatting works correctly.0.3 - required, certain typos in code caused problems with button creation.0.4 - required modified code to use return url correctly in subscription buttons, added code to implement cancel url== Other Notes ==I have provided the details about how to use this plugin with Wishlist Member and iDevAffiliate and paypal at:http://thewpwarrior.com/642/wishlist-member-idevaffiliate-paypal