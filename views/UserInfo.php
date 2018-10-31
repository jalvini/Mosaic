<!DOCTYPE html>
<html>
<head>
    <?php require_once('../includes/tags.php'); ?>
</head>
<body>
<?php require_once '../includes/header.php'; ?>
<section id="body">
<form method="post">

    <div id="section" style="border: 1px solid #0993; margin-bottom: 15px; padding: 7px;">
        <h3>First &amp; Last Name</h3>
        <table cellspacing="0">
            <tr>
                <td>
                    <input type="text" name="firstName" placeholder="First Name" required="required" />
                </td>
                <td>
                    <input type="text" name="lastName" placeholder="Last Name"  required="required" />
                </td>
                <td>
                    <input type="submit" name="Submit">
                </td>
            </tr>
        </table>
    </div>
</section>
<?php require_once '../includes/footer.php'; ?>
</body>
</html>