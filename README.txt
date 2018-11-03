*******************************************REASONS ORIGINAL CODE IS NOT CORRECT***************************************************

First and Foremost, the code should be implemented with an OO (Object Oriented) design pattern. So, my example in this repo is how I would change the code to improve functionality and readability.

The developer didn't produce any type of form validation on the backend. My form validation is minimal and can be improved upon
but in a production environment I would sanitize and check against every variable.

Another important point to mention is that the developer is using deprecated mysql parameters inside of their statements an updated
version is mysqli. I find mysqli to be a bit outgunned by PDO (for now), so I prefer using PDO.

The Developer never checked any data before entering it into the database. This can cause many problems. Again, in my code I did not check the data as much as I should have but again this is just a sample and in a production environment I would not do this.

Which brings me to my next point, at the very least the dev should have used prepared statements to protect against SQL injections. I use prepared statements regardless of whether I am working in a testing or production environment because they are very easy to use and should never be disregarded or put off until later. SQL injections are a serious attack that can cost people their identity and cost the company a lot of money.

A big red flag that comes up inside of this code is the fact that CC info is being saved as clear text. That alone could be devastating to any company but coupled with the notes above would almost ensure a company being sued out of existence from disgruntled customers whom had their CC info stolen.

The developer is using tables. While some still use tables to layout data, DIVS are easier to work with and scale much easier to different devices

The developer has many grammatical errors such as _Session which are easy enough to debug but can still be an issue.

My final note is that this code is a classic example of spaghetti code. This is common among newer PHP developers. PHP is a very forgiving language and very easy to develop bad habits in. I personally faced a bigger struggle when moving on to other programming languages because my first language was PHP. During my time using it I developed bad habits which I later broke out of but nonetheless it was difficult.

My advice to people who are beginners and just learning to write code is to not start with PHP and looking at this code is a classic example why.

**************************************************CODE NOTES***************************************************************

While I know my code is far from perfect I just wanted to give s small example of how I write code. This code is far from production ready. I just wanted to show how enthusiastic I am about what I do and give you guys a small interpretation of my programming style.



************************************************USER ACTIVITY  DIAGRAM*******************************************************

![alt text](https://image.ibb.co/h97Tq0/Flow-Chart.jpg)


THE CODE BELOW IS NOT MY CODE. TO VIEW MY CODE PLEASE VIEW THE REPO. THIS IS THE ORIGINAL CODE INCLUDED AS A REFERENCE.

****************************************************************************************************************************

******************************************************ORIGINAL CODE**********************************************************

<?php
/* Display a form to the user, and process their submission for credit card payment. */

if (isset($_POST["submit"])) {
	// Get amount.
	$amount = $_POST["amount"];

	// Get card input.
	$cardName = $_POST["cardName"]; // card holder name
	$cardNo = $_POST["cardNo"];
	$cardCode = $_POST["cardCode"];
	$exMo = $_POST["exMo"]; // expiration month
	$exYr = $_POST["exYr"]; // expiration year

	// Get name input.
	$fname = $_POST["fname"]; // first name
	$lname = $_POST["lname"]; // last name
	$company = $_POST["company"];

	// Get address input.
	$addy1 = $_POST["addy1"]; // address, line 1
	$addy2 = $_POST["addy2"]; // line 2
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zip = $_POST["zip"];


	// Submit the CC information.
	require 'cc.php';
	$ccSubmitted = submitCc($amount, $cardName, $cardNo, $cardCode, $exMo, $exYr, $addy1, $addy2, $city, $state, $zip);
	if ($ccSubmitted) {
		// Connect to DB.
		$db = mysql_connect('db.myhost.com', 'root', 'p@ssw0rd');
		if (!$db) {
			die('Could not connect to DB: ' . mysql_error());
		}

		$q1 = mysql_query("update order set timesubmitted = '" . time() . "' where id = " . $_SESSION["orderId"]);
		$q2 = mysql_query("insert into payment (orderid, amount, timecreated, name, ccnumber, cccode, ccexmo, ccexyr, company, line1, line2, city, state, zipcode) values (" . $_SESSION["orderId"] . ", {$amount}, '" . time() . "', '{$cardName}', '{$cardNo}', '{$cardCode}', '{$company}', '{$line1}', '{$line2}', '{$city}', '{$state}', '{$zip}')");

		header("Location: order-complete.php");
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment Information</title>
	
	<script src="/js/jquery.min.js"></script>
	<script src="/js/underscore.js"></script>
	<script src="/scripts/angular.js"></script>
	<script src="/js/jquery-overlay.js"></script>
	<script src="/js/jquery.ui.js"></script>
	<script src="/scripts/common.js"></script>
	<script src="/scripts/messaging.js"></script>

	<style type="text/css">
		.instructions {
			font-style: italic;
		}

		table td {
			padding-right: 10px;
		}

		.required {
			font-weight: bold;
		}
	</style>
</head>
<body>
	<?php require 'header.php'; ?>

	<h1>Payment Information</h1>
	<div class="instructions">Please, fill out the following form to submit your payment.</div>

	<script>
		$('table td:last').css('padding-right', 0);
	</script>

	<form method="post">
		<input type="hidden" name="amount" value='<?php echo $_SESSION["orderAmount"]; ?>' />

		<div id="section" style="border: 1px solid #0993; margin-bottom: 15px; padding: 7px;">
			<h3>Credit Card Information</h3>
			
			<div class="label required">Cardholder Name</div>
			<input type="text" name="cardName" />

			<table cellspacing="0">
				<tr>
					<td>
						<div class="label" style="font-weight: bold;">Card Number:</div>
						<input type="text" name="cardNo" required="required" />
					</td>
					<td>
						<div class="label" style="font-weight: bold;">Card Code</div>
						<input type="text" name="cardCode" required="required" />
					</td>
					<td>
						<div class="label" style="font-weight: bold;">Expiration:</div>
						<input type="text" name="exMo" required="required" /> / <input type="text" name="exYr" required="required" />
					</td>
				</tr>
			</table>
		</div>

		<div id="section" style="border: 1px solid #066; margin-bottom: 16px; padding: 10px;">
			<h3>Billing Information</h3>
			
			<table cellspacing="0">
				<tr>
					<td>
						<div class="label required">First Name:</div>
						<input type="text" name="fname" value='<?php echo _SESSION["firstName"]; ?>' required />
					</td>
					<td style="padding-right: 0">
						<div class="label required">Last Name</div>
						<input type="text" name="lname" value='<?php echo _SESSION["lastName"]; ?>' required />
					</td>
				</tr>
			</table>

			<div class="label">Company</div>
			<input type="text" name="company" />

			<div class="label" style="font-weight: bold;">Address</div>
			<input type="text" name="addy1" required="required" />
			<input type="text" name="addy2" />

			<table cellspacing="0">
				<tr>
					<td>
						<input type="text" name="city" />
					</td>
					<td>
						<input type="text" name="state" />
					</td>
					<td>
						<input type="text" name="zip" />
					</td>
				</tr>
			</table>
		</div>

		<input type="submit" name="submit" value="Submit Payment" />
	</form>

	<?php require 'footer.php'; ?>
</body>
</html>
