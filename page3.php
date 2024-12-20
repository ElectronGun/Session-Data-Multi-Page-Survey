<?php
// Access Session Data
session_start();

// Variables declare and empty
$error = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if any field is empty, exercise can be zero but not empty
    if (empty($_POST["dietType"]) || $_POST["exercise"] === "" || empty($_POST["diabetic"]) || empty($_POST["stairs"])) {
        $error = "All fields are required.";
    } else {
        // Encode any special characters in user input to prevent injection attack -> store session
        $_SESSION["dietType"] = htmlspecialchars($_POST["dietType"]);
        $_SESSION["exercise"] = htmlspecialchars($_POST["exercise"]);
        $_SESSION["diabetic"] = htmlspecialchars($_POST["diabetic"]);
        $_SESSION["stairs"] = htmlspecialchars($_POST["stairs"]);

        // Redirect to page4.php
        header('Location: page4.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Survey - Page 3</title>
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
    <h2 class="text-center">Diet & Exercise - Page 3</h2>
    <form action="page3.php" method="post">
            <!-- mb3 increase space btwn form fields -->
            <!-- form-control class to make full width -->
            <div class="mb-3">
                <label for="dietType" class="form-label">Type of diet (e.g., Vegetarian, Vegan, Omnivore):</label>
                <input type="text" id="dietType" name="dietType" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exercise" class="form-label">How often do you exercise in a week?</label>
                <input type="number" id="exercise" name="exercise" min="0" max="7" class="form-control">
            </div>
            <div class="mb-3">
                <label for="diabetic" class="form-label">Are you diabetic?</label>
                <select id="diabetic" name="diabetic" class="form-control">
                    <option value="">Select...</option>
                    <option value="YES">Yes</option>
                    <option value="NO">No</option>
                    <option value="MAYBE">Maybe</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="stairs" class="form-label">Can you walk 2 flights of stairs without feeling dizzy?</label>
                <select id="stairs" name="stairs" class="form-control">
                    <option value="">Select...</option>
                    <option value="YES">Yes</option>
                    <option value="NO">No</option>
                </select>
            </div>
            <input type="submit" value="Next" class="btn btn-primary">
        </form>
        <!-- Error message below button -->
        <?php if (!empty($error)) { echo "<p class='error'>$error</p>"; } ?>
    </div>
</body>
</html>