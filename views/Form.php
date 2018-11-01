<!DOCTYPE html>
<html>
    <head>
        <?php require_once(TAGS); ?>
    </head>
    <body>
    <div class="container-fluid">
        <?php require_once(HEADER); ?>
            <div class="row">
                <div class="col-lg">
                    <section id="body">
                        <h1>Payment Information</h1>
                        <div class="instructions">Please, fill out the following form to submit your payment.</div>
                        <?php echo $controller->message != NULL ? $controller->message : false ?>
                        <form method="post">
                            <input type="hidden" name="amount" id="amount" value="100" />
                            <div class="section">
                                <h3>Credit Card Information</h3>
                                <div class="card-wrapper"></div>
                                <div class="form-container active">
                                    <input placeholder="Card number" type="tel" name="cardNum" class="form-control small margin-top">
                                    <input placeholder="Full name" type="text" name="name" class="form-control small margin-top">
                                    <input placeholder="MM/YY" type="tel" name="expiration" class="form-control small margin-top">
                                    <input placeholder="CVC" type="number" name="cardCode" class="form-control small margin-top">
                                </div>
                            </div>
                            <div class="section">
                                <h3>Billing Information</h3>
                                <input type="text" name="fname" class="form-control form-two" style="width:49%; margin-right:2%; float:left;" placeholder="First Name" value='<?php echo Session::SessionFirstName()?>' required />
                                <input type="text" name="lname" class="form-control form-two" style="width:49%" placeholder="Last Name" value='<?php echo Session::SessionLastName()?>' required />
                                <input type="text" name="company" class="form-control form-two" style="width:100%;"  placeholder="Company Name"/>
                                <input type="text" name="addy1" class="form-control form-two" style="width:100%;" placeholder="Address" required />
                                <input type="text" name="city" class="form-control form-two" style="width:59%; margin-right:1%;" placeholder="City" required />
                                <input type="text" name="state" class="form-control form-two" style="width:19%; margin-right:1%;" placeholder="State" required />
                                <input type="text" name="zip" class="form-control form-two" style="width:20%;" placeholder="Zip Code" required />
                            </div>
                            <input type="submit" name="submit" value="Submit Payment" class="btn" style="background: red; color:white; float:right; width: 30%;"/>
                        </form>
                    </section>
                </div>
            </div>
            <?php require_once(FOOTER); ?>
        </div>
    <script src="/public/javascript/card.js"></script>
    <script>
            new Card({
            form: document.querySelector('form'),
            container: '.card-wrapper'
        });
    </script>
    </body>
</html>