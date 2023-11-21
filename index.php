<?php

function checkDetails() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["givenName"]) || isset($_POST["surname"]) || isset($_POST["email"])) {
            //echo "<h3>Not all fields are filled in or are correctly filled in</h3>";
            if (preg_match("/^[a-zA-Z-' ]*$/", $_POST["givenName"]) && preg_match("/^[a-zA-Z-' ]*$/", $_POST["surname"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                echo "<h3>Success</h3>";
            } else {
                echo "<h3>Not all fields are filled in or are correctly filled in</h3>";
            }
        }
    }
}
?>

<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="style.css" />
    <title>Practice Form Page</title>
</head>

<body>
    <div>
        <h1>Sign up sheet</h1>
        <br />
        <p>Just enter in some details and we will get back to you.</p>
    </div>

    <br />

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h4>Given Name:&nbsp&nbsp&nbsp</h4><br /><input type="text" name="givenName" placeholder="given name" />
        <br />
        <br />
        <h4>Surname:&nbsp&nbsp&nbsp</h4><br /><input type="text" name="surname" placeholder="surname" />
        <br />
        <br />
        <h4>Email:&nbsp&nbsp&nbsp</h4><br /><input type="text" name="email" placeholder="email" />
        <br />
        <button type="submit">Confirm details</button>
        <br />
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            checkDetails();
        }
        ?>
    </form>
</body>

</html>

<script src="/javascript/script.js"></script>