<?php
// Access Session Data
session_start();

// Map session names to display names
$displayNames = [
    "fname" => "First Name",
    "lname" => "Last Name",
    "bday" => "Birthday",
    "country" => "Country",
    "province" => "Province/State",
    "city" => "City",
    "address" => "Address",
    "phone" => "Phone Number",
    "dietType" => "Type of Diet",
    "exercise" => "Exercise Frequency",
    "diabetic" => "Diabetic",
    "stairs" => "Ability to Climb Stairs",
    "smoking" => "Smoking",
    "alcohol" => "Alcohol Consumption",
    "allergies" => "Known Allergies",
    "sleep" => "Average Sleep Duration"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Survey - Summary</title>
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
        h2 {
        padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Div With class Container to center and add padding -->
    <div class="container">
    <h2 class="text-center">Summary of Information Entered</h2>

        <?php
        // Loop over associative array $displayNames - key value
        // Concatenate the display name with the session response in the array - key value
        foreach ($displayNames as $key => $displayName) {
            echo "<p><strong>" . $displayName . ":</strong> " . $_SESSION[$key] . "</p>";
        }
        ?>
        
        <form action="thankYou.php" method="post">
            <input type="submit" value="Complete" class="btn btn-primary">
        </form>
    </div>
</body>
</html>