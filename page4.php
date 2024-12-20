<?php
// Access Session Data
session_start();

// Variables declare and empty
$error = "";
$smoking = $alcohol = $allergies = $sleep = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate if empty fields
    if (empty($_POST["smoking"]) || empty($_POST["alcohol"]) || empty($_POST["allergies"]) || empty($_POST["sleep"])) {
        $error = "All fields are required";
    } else {
        // Convert user string entry to upper case  yes --> Yes
        $smoking = strtoupper($_POST["smoking"]);
        $alcohol = strtoupper($_POST["alcohol"]);
        $allergies = strtoupper($_POST["allergies"]);
        $sleep = $_POST["sleep"];

        // Validate if correct entry, send data to summary.php
        if ($smoking != "YES" && $smoking != "NO") {
            $error = "Invalid input for smoking. Please enter 'YES' or 'NO'.";
        } elseif ($alcohol != "YES" && $alcohol != "NO") {
            $error = "Invalid input for alcohol. Please enter 'YES' or 'NO'.";
        } elseif ($allergies != "YES" && $allergies != "NO") {
            $error = "Invalid input for allergies. Please enter 'YES' or 'NO'.";
        } elseif (!is_numeric($sleep) || $sleep < 0 || $sleep > 24) {
            $error = "Invalid input for sleep. Please enter a number between 0 and 24.";
        } else {
            $_SESSION["smoking"] = $smoking;
            $_SESSION["alcohol"] = $alcohol;
            $_SESSION["allergies"] = $allergies;
            $_SESSION["sleep"] = $sleep;
            header('Location: summary.php');
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
    <title>Health Survey - Page 4</title>
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
        h2 {
        padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Div With class Container to center and add padding -->
    <div class="container">
    <h2 class="text-center">Substance Use - Page 4</h2>
        <!-- Process encoding of any user special character entry now, before sending to summary.php -->
        <form action="page4.php" method="post">
            <!-- mb3 increase space btwn form fields -->
            <!-- form-control class to make full width -->
            <div class="mb-3">
                <label for="smoking" class="form-label">Do you smoke? (yes/no)</label>
                <input type="text" id="smoking" name="smoking" class="form-control">
            </div>
            <div class="mb-3">
                <label for="alcohol" class="form-label">Do you consume alcohol? (yes/no)</label>
                <input type="text" id="alcohol" name="alcohol" class="form-control">
            </div>
            <div class="mb-3">
                <label for="allergies" class="form-label">Do you have any known allergies? (yes/no)</label>
                <input type="text" id="allergies" name="allergies" class="form-control">
            </div>
            <div class="mb-3">
                <label for="sleep" class="form-label">How many hours of sleep do you get on average per night?</label>
                <input type="number" id="sleep" name="sleep" min="0" max="24" class="form-control">
            </div>
            <input type="submit" value="Next" class="btn btn-primary">
        </form>    
        <!-- Error message below button -->
        <span class="error"><?php echo $error;?></span>
    </div>
</body>
</html>