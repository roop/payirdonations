<?php
    if ( (!array_key_exists("payir_form_name", $_REQUEST)) || ($_REQUEST['payir_form_name'] != 'bank_transfer_form')) {
        # Page was directly accessed - not through the form in Donate.php
        header('Location: /Donate.php'); # redirect to Donate.php
        return;
    }

    $nationalityString = "";
    switch ($_REQUEST['nationality']) {
        case 0: $nationalityString = "an Indian"; break;
        case 1: $nationalityString = "an NRI"; break;
        case 2: $nationalityString = "a non-Indian"; break;
        default: $nationalityString = "unknown";
    }

    # FIXME: Validate the numbers here too. What if the donor had turned off
    # javascript in his browser.

    # mail the details to donation-alert@payir.org
    $subject      = "Bank transfer from {$_REQUEST['name']} for Rs. {$_REQUEST['amount']}";
    $body         = <<<ENDOFMSG
A potential donor submitted the following bank transfer details
in the form at http://www.payir.org/Donate.php :

Name: {$_REQUEST['name']}
Email: {$_REQUEST['email']}
Address:
{$_REQUEST['address_1']}
{$_REQUEST['address_2']}
{$_REQUEST['address_3']}
{$_REQUEST['address_4']}
{$_REQUEST['address_5']}
Nationality: $nationalityString
Amount (Rs.): {$_REQUEST['amount']}
Bank name: {$_REQUEST['bankname']}

This email is not a confirmation of the transfer - just a heads-up
for a possible future transfer.
ENDOFMSG;
#    mail("roop@knurd.in", $subject, $body, "From: no-reply@payir.org");
    
    $nationality = $_REQUEST['nationality'];
    # what info should we give the donor?
    if ($nationality == 0 || $nationality == 1) {  # Indian
        $bankDetailsTitle = "Bank account for donations from Indian / NRI donors";
        $bankAccountNumber = "10465350452";
        $bankAccountType = "Savings";
    } else if ($nationality == 2) { # foreign
        $bankDetailsTitle = "Bank account for donations from foreign donors";
        $bankAccountNumber = "30750793126";
        $bankAccountType = "Current";
    }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Donation by bank transfer - Payir</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="donate.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" src="jquery.popupWindow.js"></script>
<script type="text/javascript" src="donate.js"></script>
</head>

<body>
<center>
<!--- Main block Starts -->
<table width="800" cellpadding="0" cellspacing="0" border="0" bgcolor="ffffff">
<tr>
<td>
<!--- Top shade Starts for 100% -->
<tr><td width="30" style="background: url('images/left_corner1.gif') no-repeat top"><img src="images/Leftcorner_1.gif" width="30" height="27" alt border="0"></td>
<td width="100%" style="background: url('images/top_shade.gif') repeat-y top"><img src="images/top_shade.gif" width="100%" height="27" alt border="0"></td>
<td width="30" style="background: url('images/rightcorner_1.gif') no-repeat top"><img src="images/rightcorner_1.gif" width="30" height="27" alt border="0"></td>
</tr>
<!--- Top shade ends for 100% -->

<tr> <!-- Central content area TR 3 starts  -->
<!--- Left shade starts -->
<td align="left" height="100%" style="background: url('images/Left_shade.gif') repeat-y top"><img src="images/Left_shade.gif" width="30" height="1" alt border="0"></td>

<td> <!-- central TD Starts  -->
<!--- Mid content for Logo/banner starts-->
<table align="center" width="100%" cellpadding="0" cellspacing="0" border="0">
<tr valign="bottom">
<td valign="bottom" colspan="0" align="left"><a href="/">
<img src="images/logo_banner_v2.gif" alt border="0" width="342" height="82"></a></td>
<td valign="bottom" align="right">
<div id="top-sidebar">
<a href="medianews.html">Read our newsletters</a><br>
<a href="Contribution.html">Make a donation</a><br>
<a href="contact.php">Contact us</a><br>
</div>
</td> 
</tr> 
</table>
<!--- Mid content for Logo/banner ends-->

 <!-- Central content area TABLE 2 Starts  -->
<table align="center" width="750" cellpadding="0" cellspacing="0" border="0">
<tr align="right">  <!-- TR 5 starts  -->
<td bgcolor="#666666" valign="top"><div style="background:#ffffff"><img src="images/Spacer.gif" width="1" height="4" alt></div>
<img src="images/Spacer.gif" width="1" height="27" alt><br>
<div style="background:#ffffff"><img src="images/Spacer.gif" width="1" height="9" alt></div>
</td> 

<td style="background: #68A700 url('images/ab_corner_ShadowGreen.jpg') repeat-x top;" align="center">
<table align="center" width="596" cellpadding="0" cellspacing="0" border="0">
<tr> 
<td width="118"><a href="home.html" target="_self"><img src="images/menu_home_off.gif" width="118" height="35" alt border="0"></a></td>
<td width="118"><a href="projects.html" target="_self"><img src="images/menu_projects_off.gif" width="118" height="35" alt border="0"></a></td>
<td width="118"><a href="http://blog.payir.org/" target="_self"><img src="images/menu_blog_off.gif" width="118" height="35" alt border="0"></a></td>
<td width="118"><a href="medianews.html" target="_self"><img src="images/menu_news_off.gif" width="118" height="35" alt border="0"></a></td>
<td width="118"><a href="vision.html" target="_self"><img src="images/menu_whoweare_off.gif" width="118" height="35" alt border="0"></a></td>
</tr>  
<tr>
<td style="background: #68A700 url('images/ab_green_shadow.jpg') repeat-x top"><img src="images/Spacer.gif" width="1" height="5" alt border="0"></td>
<td style="background: #68A700 url('images/ab_green_shadow.jpg') repeat-x top"><img src="images/Spacer.gif" width="1" height="5" alt border="0"></td>
<td style="background: #68A700 url('images/ab_green_shadow.jpg') repeat-x top"><img src="images/Spacer.gif" width="1" height="5" alt border="0"></td>
<td style="background: #68A700;"><img src="images/Spacer.gif" width="1" height="1" alt></td>
<td style="background: #68A700 url('images/ab_green_shadow.jpg') repeat-x top"><img src="images/Spacer.gif" width="1" height="5" alt border="0"></td>
</tr>
</table>
</td>

<td bgcolor="#666666" valign="top">
<div style="background:#ffffff"><img src="images/Spacer.gif" width="1" height="4" alt></div>
<img src="images/Spacer.gif" width="1" height="27" alt><br>
<div style="background:#ffffff"><img src="images/Spacer.gif" width="1" height="9" alt></div>
</td>

</tr> <!-- TR 5 ends-  -->
</table>  <!-- Central content area TABLE 2 ends  -->

<!--- Payir content starts -->
<table width="700" cellpadding="0" cellspacing="0" border="0">
<tr><td colspan="3">&nbsp;</td></tr>
<tr>
<td width="225" align="left" valign="top">
<div id="menu">
<div id="nav_top"></div>
<h3>CONTACT US</h3>
<p>&nbsp;</p>
<ul>
<li><a href="ouraddress.html"  target="_self">Our Address</a></li>										
<li><a href="contact.php"  target="_self">Contact Us</a></li>			
<li><a href="locateus.html"  target="_self">Locate Us</a></li>								
<li><a href="Careers.html"  target="_self">Careers</a></li>												
<li><a href="Contribution.html" target="_self"><b><U>Contribute</U></b></a></li>					
</ul>	
<p>&nbsp;</p>
<p align="center"><img src="images/contribute.gif" width="152" height="152" alt border="0"><br><br><i><font size="-1">The influence of a beautiful, helpful character is contagious, and may revolutionize a whole town...</font></i>
<!--<br><br><i><font size="-1">&nbsp;&nbsp;&nbsp;&nbsp;You can view our current&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></i>
<i><font size="-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;wish list...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></i>
&nbsp; 
<a href="https://spreadsheets.google.com/a/payir.org/ccc?key=0AgstJCloYAdqcHRvTUdjMm1HcThubzNwTk9lUXU3RHc&hl=en&authkey=CMTUpeUL#gid=0f#exactline" target="_blank" ><i><font size="-1"  COLOR="#0000FF">here&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></i></a></p><br>

<p><i><span style="font-size: 9pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; For electronic fund transfer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;details Read <a href="pdf/BankDetailsforEFT.pdf#exactline" target="_blank"><i><font  COLOR="#0000FF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;this </font> </i> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document...</span></i></p>-->


</p>
<div id="nav_btm"></div>
</div>
</td>
<td width="10" align="left">&nbsp;</td>
<td align="justify">
<div id="TopText">
<br>
<h4>Support Payir: Donate by bank transfer</h4>
<br/>
    <p>
       Thank you for deciding to donate to Payir by bank transfer.
       Please find our bank account information below:
    </p>
    <blockquote class="roundedrect">
        <h3><?php echo $bankDetailsTitle ?></h3>
        <table><tbody>
        <tr><th>Bank name:</th><td>State Bank of India</td></tr>
        <tr><th>Bank branch:</th><td>Srirangam</td></tr>
        <tr><th>Bank address:</th><td>1 South Uthra Street, Srirangam, <br/>
                                      Tiruchy, Tamil Nadu, India, 620006</td></tr>
        <tr><th>IFSC code:</th><td>SBIN0001983<span>(for transfers within India)</span></td></tr>
        <tr><th>SWIFT code:</th><td>SBININBB246<span>(if your bank is outside India)</span></td></tr>
        <tr><th>Account number:</th><td><?php echo $bankAccountNumber ?></td></tr>
        <tr><th>Account name:</td><td>Payir Trust</td></tr>
        <tr><th>Account type:</th><td><?php echo $bankAccountType ?></td></tr>
        </tbody></table>
    </blockquote>
    <br/>
    <?php
        if ($nationality == 0 || $nationality == 1) {
            echo <<<END
    <p>
       In case you use one of these Indian banks, we have step-by-step instructions to help you in your transfer.
    </p>
    <br/>
    <select class="select" id="bank_transfer_instructions_bank_select" name="bank_transfer_instructions_bank_select"> 
        <option value="0" >Citibank India</option>
        <option value="1" >ICICI Bank</option>
        <option value="2" >State Bank of India</option>
        <option value="3" selected>Other</option>
    </select>
    &nbsp; &nbsp;
    <span class="bank_transfer_instructions" id="bank_transfer_instructions_bank0" style="display: none;">
        <a class="bank_transfer_instructions_link"
           href="http://docs.google.com/View?id=dgf963vj_0f3fdd3cc">Transferring from CitiBank India</a>
        <small>(popup)</small>
    </span>
    <span class="bank_transfer_instructions" id="bank_transfer_instructions_bank1" style="display: none;">
        <a class="bank_transfer_instructions_link"
           href="https://docs.google.com/document/pub?id=1VwbIjKxQyoMXxm3QReFvBqbKVffiLTLkLwhI3zucp08">Transferring from ICICI Bank</a>
        <small>(popup)</small>
    </span>
    <span class="bank_transfer_instructions" id="bank_transfer_instructions_bank2" style="display: none;">
        <a class="bank_transfer_instructions_link"
           href="http://docs.google.com/a/payir.org/View?id=d3fgfhx_1cccvjknb">Transferring from State Bank of India</a>
        <small>(popup)</small>
    </span>
    <span class="bank_transfer_instructions" id="bank_transfer_instructions_bank3" style="display: inline;">
        <small>No instructions available</small>
    </span>
    &nbsp;
    <br/>
END;
    }
    echo <<<END
    <input type="hidden" id="bank_transfer_info_bankname" value="{$_REQUEST['bankname']}" />
END;
    ?>
    <br/>
    Thank you for your donation. Once we receive the bank transfer,
    we will send you the following to the postal address you have specified: <br/>
    <ul>
        <li>A receipt for your donation</li>
        <li>A donation certificate for claiming your tax benefit on your donation under Section 80G of the Indian Income Tax Act </li>
    </ul>
    <br/>
    We will also send you our newsletter by email (once a year) to keep you informed of how your money was utilized.<br/>
    <br/>
    </p>
    <p>
       <br/>
       The details you had furnished are summarized below:<br/>
       <blockquote class="lightweight">
           <b>About you</b><br/>
           <p class="indent">
           <?php
echo <<<END
           {$_REQUEST['name']} &nbsp; &lt;{$_REQUEST['email']}&gt; <br/>
           {$_REQUEST['address_1']} <br/>
           {$_REQUEST['address_2']} &nbsp; {$_REQUEST['address_3']}<br/>
           {$_REQUEST['address_4']} &nbsp; {$_REQUEST['address_5']}<br/>
           You are {$nationalityString}<br/>
END;
           ?>
           </p>
           <br/>
           <b>About your transfer</b><br/>
           <p class="indent">
           <?php
echo <<<END
           You intend to transfer an amount of {$_REQUEST['amount']}
           (in INR, unless otherwise specified)
           from bank {$_REQUEST['bankname']}
END;
            ?>
           </p>
       </blockquote>
       <br/>
       <p>
       If you have any further information about your donation (like transaction id)
       or would like to amend the information you'd provided, you can let us
       know here:</br>
       <form name="bank_transfer_additional_info_form" method="post" action="BankTransferAdditionalInfo.php">
           <input type="hidden" name="payir_form_name" value="donate_bank_transfer_additional_info_form" />
           <input type="hidden" id="payir_transaction_id" <?php echo "value=\"{$_REQUEST['payir_transaction_id']}\"" ?> />
           <textarea rows="4" id="bank_transfer_additional_info" name="bank_transfer_additional_info"></textarea>
       </form>
       <input id="submitAdditionalBankTransferInfo" class="button_text" type="submit" name="submit" value="Submit additional info"/>
       </p>
    </p>
</div> <!-- div class="section" -->
</div> <!-- TopText -->
</td>
</tr>
<tr>
<td width="225" align="left" valign="top">
&nbsp;</td>
<td width="10" align="left">&nbsp;</td>
<td align="justify">
&nbsp;</td>
</tr></table>
<!--- Payir content ends -->

</td><!-- central TD ends  -->



<!--- Right shade starts for 100% -->
<td height="100%" style="background: url('images/right_shade.gif') repeat-y top"><img src="images/right_shade.gif" width="30" height="1" alt border="0"></td>
</tr> <!-- Central content area TR 3 ends  -->

<!--- Bottom shade starts for 100% -->
<tr>
<td align="left" width="30" style="background: url('images/left_corner2.gif') no-repeat top"><img src="images/Leftcorner_2.gif" width="30" height="27" alt border="0"></td>
<td align="center" width="100%" style="background: url('images/bottom_shade.gif') repeat-y top"><img src="images/bottom_shade.gif" width="100%" height="27" alt border="0"></td>
<td align="right" width="30" style="background: url('images/rightcorner_2.gif') no-repeat top"><img src="images/rightcorner_2.gif" width="30" height="27" alt border="0"></td>
</tr>
<!--- Bottom shade ends for 100% -->


</table> <!--- Main block ends -->
</center>
</body>
</html>
