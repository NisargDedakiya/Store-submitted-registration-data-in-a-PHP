<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars(trim($_POST["password"]));
    $gender = isset($_POST["gender"]) ? htmlspecialchars($_POST["gender"]) : "";
    $hobbies = isset($_POST["hobbies"]) ? array_map("htmlspecialchars", $_POST["hobbies"]) : [];
    $address = htmlspecialchars(trim($_POST["address"]));

    // Validation
    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password) && !empty($gender) && !empty($address)) {
        // Convert hobbies array to string
        $hobbiesStr = !empty($hobbies) ? implode(", ", $hobbies) : "None";

        // Store data in file
        $data = "Name: $name | Email: $email | Password: $password | Gender: $gender | Hobbies: $hobbiesStr | Address: $address\n";
        file_put_contents("data.txt", $data, FILE_APPEND);

        // Redirect to success page
        header("Location: success.php?name=" . urlencode($name));
        exit;
    } else {
        echo "<h3 style='color:red;'>Error: Please fill all required fields correctly.</h3>";
    }
} else {
    echo "Invalid Request.";
}
?>
