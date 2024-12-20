<?php
// Access Session Data
session_start();

// Variables declare and empty
$error = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if any field is empty
    if (empty($_POST["country"]) || empty($_POST["province"]) || empty($_POST["city"]) || empty($_POST["address"]) || empty($_POST["phone"])) {
        $error = "All fields are required.";
    } else {
        // Check if phone number is numeric and at least 10 digits - php functions
        if (!ctype_digit($_POST["phone"]) || strlen($_POST["phone"]) < 10) {
            $error = "Phone number must be at least 10 digits and contain only numbers.";
        } else {
            // Encode any special characters in user input to prevent injection attack
            $_SESSION["country"] = htmlspecialchars($_POST["country"]);
            $_SESSION["province"] = htmlspecialchars($_POST["province"]);
            $_SESSION["city"] = htmlspecialchars($_POST["city"]);
            $_SESSION["address"] = htmlspecialchars($_POST["address"]);
            $_SESSION["phone"] = htmlspecialchars($_POST["phone"]);

            // Redirect to page3.php
            header('Location: page3.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Survey - Page 2</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding-top: 50px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .error {
            color: red;
        }
        h2 {
        padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Div With class Container to center and add padding -->
    <div class="container">
    <h2 class="text-center">Location - Page 2</h2>
        <form action="page2.php" method="post">
            <!-- mb3 increase space btwn form fields -->
            <!-- form-control class to make full width -->
            <div class="mb-3">
                <label for="country" class="form-label">Country:</label>
                <input type="text" id="country" name="country" class="form-control">
            </div>
            <div class="mb-3">
                <label for="province" class="form-label">Province/State:</label>
                <input type="text" id="province" name="province" class="form-control">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City:</label>
                <input type="text" id="city" name="city" class="form-control">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" id="address" name="address" class="form-control">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number:</label>
                <input type="tel" id="phone" name="phone" class="form-control">
            </div>
            <input type="submit" value="Next" class="btn btn-primary">
        </form>
        <!-- Error message below button -->
        <?php if (!empty($error)) { echo "<p class='error'>$error</p>"; } ?>
    </div>
</body>
</html>