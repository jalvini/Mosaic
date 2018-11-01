<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php require_once('../includes/tags.php'); ?>
</head>
<body>
<div class="container-fluid">
    <?php require_once(HEADER); ?>
    <div class="row">
        <div class="col-12 col-md-5">
            <section class="body">
                <div class="section">
                    <form method="post">
                        <h3>First &amp; Last Name</h3>
                        <input type="text" name="firstName" style="margin-top:20px;" placeholder="First Name" class="form-control" required="required" />
                        <input type="text" name="lastName"  style="margin-top:20px;" placeholder="Last Name" class="form-control"  required="required" />
                        <div class="form-container">
                            <input type="submit"  class="btn form-one-submit" name="Submit">
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <div class="col-12 col-md-7">
            <section class="body">
                <div class="section" style="padding-bottom:50px; margin-bottom:120px;">
                    <h2>Sample Item</h2>
                    <h3 style="color:green;">Item Price: $100</h3>
                    <h5>Item Description</h5>
                    <p>
                        This is some sample data for an item.This is where the description would go were this a real item.
                        However it is not a real item so there is no description for it.
                    </p>
                </div>
            </section>
        </div>
    </div>
    <?php require_once(FOOTER); ?>
</div>
</body>
</html>