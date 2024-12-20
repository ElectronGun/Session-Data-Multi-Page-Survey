<?php
// Access Session Data
session_start();

// Variables declare and empty
$error = "";
$fname = $lname = $bday = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["bday"])) {
        $error = "All fields are required";
    } else {
        $bday = $_POST["bday"];
        // Check if the birthday is in the future
        if (strtotime($bday) > time()) {
            $error = "Date of birth cannot be in the future";
        } else {
            // Encode any special characters in user input to prevent injection attack before sending in session
            $_SESSION["fname"] = htmlspecialchars($_POST["fname"]);
            $_SESSION["lname"] = htmlspecialchars($_POST["lname"]);
            $_SESSION["bday"] = htmlspecialchars($bday);
            header('Location: page2.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Survey - Start</title>
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
            color: #FF0000;
        }
    </style>
</head>
<body>
    <!-- Div With class Container to center and add padding -->
    <div class="container">
        <h1 class="text-center mb-4">Welcome to the Basic Health Survey!</h1>
        <form action="start.php" method="post">
            <!-- mb3 increase space btwn form fields -->
            <!-- form-control class to make full width -->
            <div class="mb-3">
                <label for="fname" class="form-label">First Name:</label>
                <input type="text" id="fname" name="fname" class="form-control">
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last Name:</label>
                <input type="text" id="lname" name="lname" class="form-control">
            </div>
            <div class="mb-3">
                <label for="bday" class="form-label">Birthday:</label>
                <input type="date" id="bday" name="bday" class="form-control">
            </div>
            <input type="submit" value="Next" class="btn btn-primary">
            <!-- display error message when birthday in future or blank entry -->
            <span class="error"><?php echo $error;?></span>
        </form>
    </div>
</body>
</html>