<!DOCTYPE html>
<html>
<head>
<?php require_once('../includes/tags.php'); ?>
</head>
<body>
<?php require_once '../includes/header.php'; ?>

<section id="body">
<h1>Payment Information</h1>
<div class="instructions">Please, fill out the following form to submit your payment.</div>

<script>
    $('table td:last').css('padding-right', 0);
</script>
<?php echo $controller->message != NULL ? $controller->message : false ?>

<form method="post">
    <input type="hidden" name="amount" id="amount" value="100" />

    <div id="section" style="border: 1px solid #0993; margin-bottom: 15px; padding: 7px;">
        <h3>Credit Card Information</h3>
        <div class="card-wrapper"></div>

        <div class="form-container active" style="margin-top: 20px; width: 100%; text-align: center;">
                <input placeholder="Card number" type="tel" name="cardNum">
                <input placeholder="Full name" type="text" name="name">
                <input placeholder="MM/YY" type="tel" name="expiration">
                <input placeholder="CVC" type="number" name="cardCode">
        </div>
    </div>
    <script src="/public/javascript/card.js"></script>
    <script>
        new Card({
            form: document.querySelector('form'),
            container: '.card-wrapper'
        });
    </script>


    <div id="section" style="border: 1px solid #0993; margin-bottom: 15px; padding: 7px;">
        <h3>Billing Information</h3>

        <table cellspacing="0">
            <tr>
                <td>
                    <div class="label required">First Name:</div>
                    <input type="text" name="fname" value='<?php echo Session::SessionFirstName()?>' required />
                </td>
                <td style="padding-right: 0">
                    <div class="label required">Last Name</div>
                    <input type="text" name="lname" value='<?php echo Session::SessionLastName()?>' required />
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
</section>
<?php require_once '../includes/footer.php'; ?>
</body>
</html>