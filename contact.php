
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TechMedical - Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="./assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="./assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="./assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="./assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="./index.html">TechMedical</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="./index.html">Home</a></li>
			  <li><a href="./product.html">Product</a></li>
			  <li><a href="./gallery.html">Gallery</a></li>
			  <li><a href="./testimonials.html">Testimonials</a></li>
			  <li><a href="./about.html">About Us</a></li>
			  <li class="active"><a href="./contact.html">Contact Us</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

<?php
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "jerryliu@techmedinc.com";
    $email_subject = "Contact Us Message";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please ";
	echo "<a href=\"javascript:history.go(-1)\">Go Back</a>";
	echo " and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
?>
<div class="messagetext">Thank you for writing to us. We will be in touch with you as soon as possible.</div><br /><br />
 
 
<?php
}
?>
      <h1>Contact Us</h1>
      <p>TechMedical Incorporated would love to hear any comments or suggestions.</p>
      <p>Please call <strong>1-519-749-5498</strong> or use this email form to contact us.</p><br />
      <form class="mobile" name="contactform" method="post" action="contact.php">
	    <table width="450px">
  	      <tr>
			<td valign="top">
			  <label for="first_name">First Name *</label>
			</td>
		  <tr>
		  </tr>
			<td valign="top">
			  <input type="text" name="first_name" maxlength="50" size="30">
			</td>
		  </tr>
		  <tr>
			<td valign="top">
			  <label for="last_name">Last Name *</label>
			</td>
		  <tr>
		  </tr>
			<td valign="top">
			  <input type="text" name="last_name" maxlength="50" size="30">
			</td>
		  </tr>
		  <tr>
			<td valign="top">
			  <label for="email">Email Address *</label>
			</td>
		  <tr>
		  </tr>
			<td valign="top">
			  <input type="text" name="email" maxlength="80" size="30">
			</td>
		  </tr>
		  <tr>
			<td valign="top">
			  <label for="telephone">Telephone Number</label>
			</td>
		  <tr>
		  </tr>
			<td valign="top">
			  <input type="text" name="telephone" maxlength="30" size="30">
			</td>
		  </tr>
		  <tr>
			<td valign="top">
			  <label for="comments">Comments *</label>
			</td>
		  <tr>
		  </tr>
			<td valign="top">
			  <textarea name="comments" maxlength="1000" cols="25" rows="6"></textarea>
			</td>
		  </tr>
		  <tr>
			<td colspan="2" style="text-align:left">
			  <input type="submit" value="Submit"> 
			</td>
		  </tr>
		</table>
	  </form>
	  
	  
	  <form class="desktop" name="contactform" method="post" action="contact.php">
	    <table width="450px">
  	      <tr>
			<td valign="top">
			  <label for="first_name">First Name *</label>
			</td>
			<td valign="top">
			  <input type="text" name="first_name" maxlength="50" size="30">
			</td>
		  </tr>
		  <tr>
			<td valign="top">
			  <label for="last_name">Last Name *</label>
			</td>
			<td valign="top">
			  <input type="text" name="last_name" maxlength="50" size="30">
			</td>
		  </tr>
		  <tr>
			<td valign="top">
			  <label for="email">Email Address *</label>
			</td>
			<td valign="top">
			  <input type="text" name="email" maxlength="80" size="30">
			</td>
		  </tr>
		  <tr>
			<td valign="top">
			  <label for="telephone">Telephone Number</label>
			</td>
			<td valign="top">
			  <input type="text" name="telephone" maxlength="30" size="30">
			</td>
		  </tr>
		  <tr>
			<td valign="top">
			  <label for="comments">Comments *</label>
			</td>
			<td valign="top">
			  <textarea name="comments" maxlength="1000" cols="25" rows="6"></textarea>
			</td>
		  </tr>
		  <tr>
			<td></td>
			<td colspan="2" style="text-align:left">
			  <input type="submit" value="Submit"> 
			</td>
		  </tr>
		</table>
	  </form>
    </div> <!-- /container -->
	<style type="text/css">
	  @media (max-width: 979px) {
	    .mobile {
		display : block;
		}
		.desktop {
		display : none;
		}
	  }
	  @media (min-width: 980px) {
	    .mobile {
		display : none;
		}
		.desktop {
		display : block;
		}
	  }
	</style>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./assets/js/jquery.js"></script>
	<script src="./assets/js/bootstrap.js"></script>
  </body>
</html>
