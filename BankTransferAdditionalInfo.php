<?php
    if ( (!array_key_exists("payir_form_name", $_REQUEST)) || ($_REQUEST['payir_form_name'] != 'bank_transfer_additional_info_form')) {
        # Page was directly accessed - not through the form in BankTransferInfo.php
        header('Location: /Donate.php'); # redirect to Donate.php
        return;
    }

    # mail the details to donation-alert@payir.org
    $subject      = "Donation: Additional info on bank transfer";
    $body         = <<<ENDOFMSG
The potential donor submitted additional information:

Payir Transaction Id: {$_REQUEST['payir_transaction_id']}
Additional information:
{$_REQUEST['bank_transfer_additional_info']}

ENDOFMSG;
    mail("donations@payir.org", $subject, $body, "From: no-reply@payir.org");
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
<tr><td width="30" style="background: url('images/left_corner1.gif') no-repeat top"><img src="images/Leftcorner_1.gif" width="30" height="27" alt="" border="0"></td>
<td width="100%" style="background: url('images/top_shade.gif') repeat-y top"><img src="images/top_shade.gif" width="100%" height="27" alt="" border="0"></td>
<td width="30" style="background: url('images/rightcorner_1.gif') no-repeat top"><img src="images/rightcorner_1.gif" width="30" height="27" alt="" border="0"></td>
</tr>
<!--- Top shade ends for 100% -->

<tr> <!-- Central content area TR 3 starts  -->
<!--- Left shade starts -->
<td align="left" height="100%" style="background: url('images/Left_shade.gif') repeat-y top"><img src="images/Left_shade.gif" width="30" height="1" alt="" border="0"></td>

<td> <!-- central TD Starts  -->
<!--- Mid content for Logo/banner starts-->
<table align="center" width="100%" cellpadding="0" cellspacing="0" border="0">
<tr valign="bottom">
<td valign="bottom" colspan="0" align="left"><a href="/">
<img src="images/logo_banner_v2.gif" alt="" border="0" width="342" height="82"></a></td>
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
<td bgcolor="#666666" valign="top"><div style="background:#ffffff"><img src="images/Spacer.gif" width="1" height="4" alt=""></div>
<img src="images/Spacer.gif" width="1" height="27" alt=""><br>
<div style="background:#ffffff"><img src="images/Spacer.gif" width="1" height="9" alt=""></div>
</td> 

<td style="background: #68A700 url('images/ab_corner_ShadowGreen.jpg') repeat-x top;" align="center">
<table align="center" width="596" cellpadding="0" cellspacing="0" border="0">
<tr> 
<td width="118"><a href="home.html" target="_self"><img src="images/menu_home_off.gif" width="118" height="35" alt="" border="0"></a></td>
<td width="118"><a href="projects.html" target="_self"><img src="images/menu_projects_off.gif" width="118" height="35" alt="" border="0"></a></td>
<td width="118"><a href="http://blog.payir.org/" target="_self"><img src="images/menu_blog_off.gif" width="118" height="35" alt="" border="0"></a></td>
<td width="118"><a href="medianews.html" target="_self"><img src="images/menu_news_off.gif" width="118" height="35" alt="" border="0"></a></td>
<td width="118"><a href="vision.html" target="_self"><img src="images/menu_whoweare_off.gif" width="118" height="35" alt="" border="0"></a></td>
</tr>  
<tr>
<td style="background: #68A700 url('images/ab_green_shadow.jpg') repeat-x top"><img src="images/Spacer.gif" width="1" height="5" alt="" border="0"></td>
<td style="background: #68A700 url('images/ab_green_shadow.jpg') repeat-x top"><img src="images/Spacer.gif" width="1" height="5" alt="" border="0"></td>
<td style="background: #68A700 url('images/ab_green_shadow.jpg') repeat-x top"><img src="images/Spacer.gif" width="1" height="5" alt="" border="0"></td>
<td style="background: #68A700;"><img src="images/Spacer.gif" width="1" height="1" alt=""></td>
<td style="background: #68A700 url('images/ab_green_shadow.jpg') repeat-x top"><img src="images/Spacer.gif" width="1" height="5" alt="" border="0"></td>
</tr>
</table>
</td>

<td bgcolor="#666666" valign="top">
<div style="background:#ffffff"><img src="images/Spacer.gif" width="1" height="4" alt=""></div>
<img src="images/Spacer.gif" width="1" height="27" alt=""><br>
<div style="background:#ffffff"><img src="images/Spacer.gif" width="1" height="9" alt=""></div>
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
<p align="center"><img src="images/contribute.gif" width="152" height="152" alt="" border="0"><br><br><i><font size="-1">The influence of a beautiful, helpful character is contagious, and may revolutionize a whole town...</font></i>

</p>
<div id="nav_btm"></div>
</div>
</td>
<td width="10" align="left">&nbsp;</td>
<td align="justify">
<div id="TopText">
<br>
<br>
    <p>
       Thank you again for your donation to Payir by bank transfer.
       The additional information you provided has been recorded.
    </p>
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
<td height="100%" style="background: url('images/right_shade.gif') repeat-y top"><img src="images/right_shade.gif" width="30" height="1" alt="" border="0"></td>
</tr> <!-- Central content area TR 3 ends  -->

<!--- Bottom shade starts for 100% -->
<tr>
<td align="left" width="30" style="background: url('images/left_corner2.gif') no-repeat top"><img src="images/Leftcorner_2.gif" width="30" height="27" alt="" border="0"></td>
<td align="center" width="100%" style="background: url('images/bottom_shade.gif') repeat-y top"><img src="images/bottom_shade.gif" width="100%" height="27" alt="" border="0"></td>
<td align="right" width="30" style="background: url('images/rightcorner_2.gif') no-repeat top"><img src="images/rightcorner_2.gif" width="30" height="27" alt="" border="0"></td>
</tr>
<!--- Bottom shade ends for 100% -->


</table> <!--- Main block ends -->
</center>
</body>
</html>
